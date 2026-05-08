<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\BlogPost;

class BlogController extends Controller
{
    private BlogPost $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogPost();
    }

    /**
     * List all blog posts (Admin)
     */
    public function index(): void
    {
        $this->requireAuth();

        $posts = $this->blogModel->getAllWithDetails();

        $this->view('admin.blog.index', [
            'posts' => $posts,
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Frontend blog listing
     */
    public function frontendIndex(): void
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 9;

        $filters = [
            'category' => $_GET['category'] ?? '',
            'search' => $_GET['search'] ?? '',
            'status' => 'published'
        ];

        // Get posts with pagination
        $allPosts = $this->blogModel->getPublished($filters);
        $total = count($allPosts);
        $totalPages = ceil($total / $perPage);

        $offset = ($page - 1) * $perPage;
        $posts = array_slice($allPosts, $offset, $perPage);

        // Get popular posts for sidebar
        $popularPosts = $this->blogModel->getPopular(5);

        // Get category counts
        $categoryCounts = $this->blogModel->getCategoryCounts();

        // Get popular tags
        $popularTags = $this->blogModel->getPopularTags(15);

        $this->view('frontend.blog', [
            'posts' => $posts,
            'total_posts' => $total,
            'current_page' => $page,
            'total_pages' => $totalPages,
            'popular_posts' => $popularPosts,
            'category_counts' => $categoryCounts,
            'popular_tags' => $popularTags
        ]);
    }

    /**
     * Frontend blog article detail
     */
    public function show(): void
    {
        $slug = $_GET['slug'] ?? '';

        if (empty($slug)) {
            $this->redirect('/blog');
        }

        $post = $this->blogModel->findBySlug($slug);

        if (!$post || $post->status !== 'published') {
            http_response_code(404);
            die("Article not found");
        }

        // Get related posts
        $relatedPosts = $this->blogModel->getRelated($post->id, $post->category, 4);

        $this->view('frontend.blog-article', [
            'post' => $post,
            'related_posts' => $relatedPosts
        ]);
    }

    /**
     * Track blog post view
     */
    public function trackView(): void
    {
        $postId = $_GET['id'] ?? 0;

        if ($postId) {
            $this->blogModel->incrementViews($postId);
        }

        echo json_encode(['success' => true]);
    }

    /**
     * Create new post
     */
    public function create(): void
    {
        $this->requireAuth();

        $this->view('admin.blog.create', [
            'csrf_token' => $this->generateCsrf(),
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Store new post
     */
    public function store(): void
    {
        $this->requireAuth();

        // Process tags
        $tags = !empty($_POST['tags'])
            ? array_map('trim', explode(',', $_POST['tags']))
            : [];

        // Calculate read time if not provided
        $readTime = $_POST['read_time'] ?? $this->calculateReadTime($_POST['content'] ?? '');

        $data = [
            'author_id' => $_SESSION['user_id'],
            'title' => $_POST['title'] ?? '',
            'slug' => $this->generateSlug($_POST['title'] ?? ''),
            'content' => $_POST['content'] ?? '',
            'excerpt' => $_POST['excerpt'] ?? '',
            'category' => $_POST['category'] ?? null,
            'tags' => json_encode($tags),
            'read_time' => $readTime,
            'status' => $_POST['status'] ?? 'draft',
            'published_at' => ($_POST['status'] === 'published') ? date('Y-m-d H:i:s') : null,
            'meta_title' => $_POST['meta_title'] ?? '',
            'meta_description' => $_POST['meta_description'] ?? ''
        ];

        if ($this->blogModel->create($data)) {
            $_SESSION['success'] = 'Blog post created successfully!';
        } else {
            $_SESSION['error'] = 'Failed to create post';
        }

        $this->redirect('/admin/blog');
    }

    /**
     * Edit post
     */
    public function edit(): void
    {
        $this->requireAuth();

        $id = $_GET['id'] ?? 0;
        $post = $this->blogModel->find((int)$id);

        if (!$post) {
            $_SESSION['error'] = 'Post not found';
            $this->redirect('/admin/blog');
        }

        $this->view('admin.blog.edit', [
            'post' => $post,
            'csrf_token' => $this->generateCsrf(),
            'current_user' => $this->getCurrentUser()
        ]);
    }

    /**
     * Update post
     */
    public function update(): void
    {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/blog');
        }

        $id = $_POST['id'] ?? 0;

        // Process tags
        $tags = !empty($_POST['tags'])
            ? array_map('trim', explode(',', $_POST['tags']))
            : [];

        // Calculate read time if not provided
        $readTime = $_POST['read_time'] ?? $this->calculateReadTime($_POST['content'] ?? '');

        $data = [
            'title' => $_POST['title'] ?? '',
            'content' => $_POST['content'] ?? '',
            'excerpt' => $_POST['excerpt'] ?? '',
            'category' => $_POST['category'] ?? null,
            'tags' => json_encode($tags),
            'read_time' => $readTime,
            'status' => $_POST['status'] ?? 'draft',
            'published_at' => ($_POST['status'] === 'published') ? date('Y-m-d H:i:s') : null,
            'meta_title' => $_POST['meta_title'] ?? '',
            'meta_description' => $_POST['meta_description'] ?? ''
        ];

        if ($this->blogModel->update((int)$id, $data)) {
            $_SESSION['success'] = 'Blog post updated successfully!';
        } else {
            $_SESSION['error'] = 'Failed to update post';
        }

        $this->redirect('/admin/blog');
    }

    /**
     * Delete post
     */
    public function delete(): void
    {
        $this->requireAuth();

        $id = $_POST['id'] ?? 0;

        if ($this->blogModel->delete((int)$id)) {
            $_SESSION['success'] = 'Blog post deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete post';
        }

        $this->redirect('/admin/blog');
    }

    /**
     * Calculate read time based on content
     */
    private function calculateReadTime(string $content): int
    {
        $wordCount = str_word_count(strip_tags($content));
        $readTime = ceil($wordCount / 200); // Average reading speed: 200 words per minute
        return max(1, $readTime); // Minimum 1 minute
    }

    private function generateSlug(string $title): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    }
}
