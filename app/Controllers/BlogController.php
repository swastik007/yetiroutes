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
     * List all blog posts
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

        $data = [
            'author_id' => $_SESSION['user_id'],
            'title' => $_POST['title'] ?? '',
            'slug' => $this->generateSlug($_POST['title'] ?? ''),
            'content' => $_POST['content'] ?? '',
            'excerpt' => $_POST['excerpt'] ?? '',
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

    private function generateSlug(string $title): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    }
}
