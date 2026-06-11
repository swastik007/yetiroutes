<?php
$pageTitle = htmlspecialchars($post->title) . ' - Yeti Routes Blog';
$metaDescription = htmlspecialchars($post->meta_description ?? substr(strip_tags($post->content), 0, 160));
$ogImage = $post->featured_image ?? 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&q=80';
$ogType  = 'article';
$pageSchema = [
    '@context'         => 'https://schema.org',
    '@type'            => 'BlogPosting',
    'headline'         => $post->title,
    'description'      => strip_tags($post->meta_description ?? substr(strip_tags($post->content), 0, 160)),
    'image'            => $ogImage,
    'url'              => 'https://yetiroutes.com/blog/article?slug=' . ($post->slug ?? ''),
    'datePublished'    => $post->published_at ?? $post->created_at ?? date('Y-m-d'),
    'dateModified'     => $post->updated_at ?? $post->published_at ?? date('Y-m-d'),
    'author'           => ['@type' => 'Person', 'name' => $post->author_name ?? 'Yeti Routes'],
    'publisher'        => ['@type' => 'Organization', 'name' => 'Yeti Routes', 'url' => 'https://yetiroutes.com'],
    'mainEntityOfPage' => ['@type' => '@id', '@id' => 'https://yetiroutes.com/blog/article?slug=' . ($post->slug ?? '')],
];
$breadcrumbs = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Blog', 'url' => '/blog'],
    ['name' => $post->title, 'url' => '/blog/article?slug=' . ($post->slug ?? '')],
];
ob_start();
?>

<!-- Article Header -->
<article class="bg-white">
    <!-- Hero Image -->
    <div class="relative h-96 lg:h-[500px]">
        <img src="<?= $post->featured_image ?? 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200' ?>" alt="<?= htmlspecialchars($post->title) ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

        <!-- Breadcrumb -->
        <div class="absolute top-6 left-0 right-0">
            <div class="container mx-auto px-4">
                <nav class="text-white text-sm">
                    <a href="/" class="hover:underline">Home</a>
                    <span class="mx-2">/</span>
                    <a href="/blog" class="hover:underline">Blog</a>
                    <span class="mx-2">/</span>
                    <?php if ($post->category): ?>
                        <a href="/blog?category=<?= $post->category ?>" class="hover:underline"><?= ucfirst(str_replace('-', ' ', $post->category)) ?></a>
                        <span class="mx-2">/</span>
                    <?php endif; ?>
                    <span class="opacity-75"><?= htmlspecialchars($post->title) ?></span>
                </nav>
            </div>
        </div>

        <!-- Title Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl">
                    <?php if ($post->category): ?>
                        <span class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold inline-block mb-4">
                            <?= ucfirst(str_replace('-', ' ', $post->category)) ?>
                        </span>
                    <?php endif; ?>
                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4"><?= htmlspecialchars($post->title) ?></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Article Meta -->
    <div class="border-b border-gray-200 bg-gray-50">
        <div class="container mx-auto px-4 py-6">
            <div class="max-w-4xl mx-auto flex flex-wrap items-center justify-between text-sm text-gray-600">
                <div class="flex items-center space-x-6 mb-3 md:mb-0">
                    <div class="flex items-center">
                        <i class="fas fa-user-circle text-2xl text-blue-600 mr-2"></i>
                        <div>
                            <p class="font-semibold text-gray-800"><?= htmlspecialchars($post->author_name ?? 'Yeti Routes') ?></p>
                            <p class="text-xs"><?= $post->author_role ?? 'Trek Specialist' ?></p>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-calendar mr-2"></i>
                        <?= date('F d, Y', strtotime($post->published_at ?? $post->created_at)) ?>
                    </div>
                    <div>
                        <i class="fas fa-clock mr-2"></i>
                        <?= $post->read_time ?? 5 ?> min read
                    </div>
                    <div>
                        <i class="fas fa-eye mr-2"></i>
                        <?= number_format($post->views ?? 0) ?> views
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="flex items-center space-x-3">
                    <span class="text-gray-500">Share:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://yetiroutes.com/blog/article?slug=' . $post->slug) ?>" target="_blank" class="w-8 h-8 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode('https://yetiroutes.com/blog/article?slug=' . $post->slug) ?>&text=<?= urlencode($post->title) ?>" target="_blank" class="w-8 h-8 bg-blue-400 hover:bg-blue-500 text-white rounded-full flex items-center justify-center">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode('https://yetiroutes.com/blog/article?slug=' . $post->slug) ?>" target="_blank" class="w-8 h-8 bg-blue-700 hover:bg-blue-800 text-white rounded-full flex items-center justify-center">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/?text=<?= urlencode($post->title . ' - https://yetiroutes.com/blog/article?slug=' . $post->slug) ?>" target="_blank" class="w-8 h-8 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <button onclick="copyToClipboard()" class="w-8 h-8 bg-gray-600 hover:bg-gray-700 text-white rounded-full flex items-center justify-center" title="Copy link">
                        <i class="fas fa-link"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- Main Content -->
            <div class="lg:col-span-3">
                <div class="max-w-4xl prose prose-lg">
                    <?php if ($post->excerpt): ?>
                        <p class="text-xl text-gray-600 font-medium leading-relaxed mb-8">
                            <?= htmlspecialchars($post->excerpt) ?>
                        </p>
                    <?php endif; ?>

                    <!-- Article Body -->
                    <div class="article-content">
                        <?= $post->content ?>
                    </div>

                    <!-- Tags -->
                    <?php if (!empty($post->tags)):
                        $tags = is_string($post->tags) ? json_decode($post->tags, true) : $post->tags;
                        if (!empty($tags)):
                    ?>
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <h3 class="text-lg font-bold mb-4">Tags:</h3>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($tags as $tag): ?>
                                    <a href="/blog?search=<?= urlencode($tag) ?>" class="bg-gray-100 hover:bg-blue-100 text-gray-700 hover:text-blue-600 px-4 py-2 rounded-full text-sm transition">
                                        #<?= htmlspecialchars($tag) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; endif; ?>

                    <!-- Author Bio -->
                    <div class="mt-12 p-8 bg-gray-50 rounded-xl">
                        <div class="flex items-start">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($post->author_name ?? 'Yeti Routes') ?>&size=100&background=4A5FFF&color=fff" alt="<?= htmlspecialchars($post->author_name ?? 'Yeti Routes') ?>" class="w-20 h-20 rounded-full mr-6">
                            <div>
                                <h3 class="text-xl font-bold mb-2">About <?= htmlspecialchars($post->author_name ?? 'Yeti Routes') ?></h3>
                                <p class="text-gray-600 mb-3">
                                    <?= $post->author_bio ?? 'Experienced trek guide and travel writer passionate about sharing the beauty of Nepal and the Himalayas with the world.' ?>
                                </p>
                                <div class="flex space-x-3">
                                    <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-facebook"></i></a>
                                    <a href="#" class="text-blue-400 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="text-pink-600 hover:text-pink-800"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    <?php if (!empty($related_posts)): ?>
                        <div class="mt-12">
                            <h2 class="text-3xl font-bold mb-6">You Might Also Like</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <?php foreach (array_slice($related_posts, 0, 2) as $related): ?>
                                    <a href="/blog/article?slug=<?= htmlspecialchars($related->slug) ?>" class="group">
                                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover-scale">
                                            <img src="<?= $related->featured_image ?? 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600' ?>" alt="<?= htmlspecialchars($related->title) ?>" loading="lazy" class="w-full h-48 object-cover">
                                            <div class="p-6">
                                                <h3 class="font-bold text-lg mb-2 group-hover:text-blue-600"><?= htmlspecialchars($related->title) ?></h3>
                                                <p class="text-gray-600 text-sm line-clamp-2"><?= htmlspecialchars($related->excerpt ?? $related->meta_description) ?></p>
                                                <p class="text-blue-600 text-sm font-semibold mt-3">
                                                    Read More <i class="fas fa-arrow-right ml-1"></i>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Comments Section (Future Implementation) -->
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <h2 class="text-3xl font-bold mb-6">Comments</h2>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 text-center">
                            <i class="fas fa-comments text-4xl text-blue-300 mb-3"></i>
                            <p class="text-gray-600">Comments are coming soon! For now, share your thoughts with us on social media.</p>
                            <div class="flex justify-center space-x-4 mt-4">
                                <a href="https://facebook.com/yetiroutes" target="_blank" class="text-blue-600 hover:text-blue-800">
                                    <i class="fab fa-facebook text-2xl"></i>
                                </a>
                                <a href="https://instagram.com/yetiroutes" target="_blank" class="text-pink-600 hover:text-pink-800">
                                    <i class="fab fa-instagram text-2xl"></i>
                                </a>
                                <a href="https://twitter.com/yetiroutes" target="_blank" class="text-blue-400 hover:text-blue-600">
                                    <i class="fab fa-twitter text-2xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Table of Contents (if headings exist) -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8 sticky top-24">
                    <h3 class="text-lg font-bold mb-4">In This Article</h3>
                    <nav id="tableOfContents" class="space-y-2 text-sm">
                        <!-- Generated by JavaScript -->
                        <p class="text-gray-500 italic">Loading...</p>
                    </nav>
                </div>

                <!-- CTA Card -->
                <div class="bg-gradient-to-br from-blue-600 to-purple-600 text-white rounded-xl shadow-lg p-6 mb-8">
                    <h3 class="text-xl font-bold mb-3">Interested in This Trek?</h3>
                    <p class="text-sm mb-4 opacity-90">Get a custom itinerary and quote for your adventure</p>
                    <a href="/contact" class="block w-full bg-white text-blue-600 hover:bg-gray-100 text-center py-3 rounded-lg font-semibold transition">
                        Contact Us
                    </a>
                </div>

                <!-- Newsletter -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-lg font-bold mb-3">Get More Stories</h3>
                    <p class="text-sm text-gray-600 mb-4">Subscribe for weekly trekking tips and travel inspiration</p>
                    <form method="POST" action="/newsletter/subscribe">
                        <input type="email" name="email" placeholder="Your email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</article>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Experience This Adventure?</h2>
        <p class="text-xl mb-8">Browse our trek packages or contact us for a personalized itinerary</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/treks" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold transition">
                <i class="fas fa-mountain mr-2"></i> View All Treks
            </a>
            <a href="https://wa.me/9779843183934?text=Hi%2C%20I%27m%20interested%20in%20<?= urlencode($post->title) ?>" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full text-lg font-semibold transition">
                <i class="fab fa-whatsapp mr-2"></i> WhatsApp Us
            </a>
        </div>
    </div>
</section>

<style>
/* Article content styling */
.article-content {
    line-height: 1.8;
}

.article-content h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #1f2937;
}

.article-content h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    color: #374151;
}

.article-content p {
    margin-bottom: 1.25rem;
    color: #4b5563;
}

.article-content ul, .article-content ol {
    margin-bottom: 1.25rem;
    padding-left: 2rem;
}

.article-content li {
    margin-bottom: 0.5rem;
    color: #4b5563;
}

.article-content img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 2rem 0;
}

.article-content blockquote {
    border-left: 4px solid #4A5FFF;
    padding-left: 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    color: #6b7280;
    background: #f9fafb;
    padding: 1.5rem;
    border-radius: 0.5rem;
}

.article-content a {
    color: #4A5FFF;
    text-decoration: underline;
}

.article-content a:hover {
    color: #764BA2;
}

.article-content code {
    background: #f3f4f6;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-family: monospace;
    font-size: 0.9em;
}

.article-content pre {
    background: #1f2937;
    color: #f9fafb;
    padding: 1.5rem;
    border-radius: 0.5rem;
    overflow-x: auto;
    margin: 1.5rem 0;
}

.article-content pre code {
    background: transparent;
    color: inherit;
    padding: 0;
}
</style>

<script>
// Generate Table of Contents from H2 and H3 tags
document.addEventListener('DOMContentLoaded', () => {
    const content = document.querySelector('.article-content');
    const toc = document.getElementById('tableOfContents');
    const headings = content.querySelectorAll('h2, h3');

    if (headings.length === 0) {
        toc.innerHTML = '<p class="text-gray-500 italic text-xs">No sections</p>';
        return;
    }

    let tocHTML = '<ul class="space-y-2">';
    headings.forEach((heading, index) => {
        const id = `section-${index}`;
        heading.id = id;

        const level = heading.tagName === 'H2' ? '' : 'ml-4';
        const text = heading.textContent;

        tocHTML += `
            <li class="${level}">
                <a href="#${id}" class="text-blue-600 hover:text-blue-800 hover:underline block">${text}</a>
            </li>
        `;
    });
    tocHTML += '</ul>';

    toc.innerHTML = tocHTML;
});

// Smooth scroll for TOC links
document.addEventListener('click', (e) => {
    if (e.target.matches('#tableOfContents a')) {
        e.preventDefault();
        const targetId = e.target.getAttribute('href').substring(1);
        const target = document.getElementById(targetId);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
});

// Copy link to clipboard
function copyToClipboard() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
        alert('Link copied to clipboard!');
    }).catch(() => {
        alert('Failed to copy link');
    });
}

// Track view
fetch('/blog/track-view/<?= $post->id ?>', { method: 'POST' }).catch(() => {});
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layouts/frontend.php';
?>
