<?php

namespace App\Services;

/**
 * SEO Service - Centralized SEO management
 * Handles meta tags, structured data, and SEO optimization
 */
class SeoService
{
    private array $meta = [];
    private array $structuredData = [];
    private string $baseUrl;
    private string $siteName = 'Yeti Routes';

    // Social Media Verification & Configuration
    private ?string $facebookAppId = null; // Add your FB App ID here: '1234567890123456'
    private ?string $pinterestVerify = null; // Add your Pinterest verification code here
    private string $twitterHandle = '@yetiroutes'; // Your Twitter handle
    private string $facebookPage = 'https://facebook.com/yetiroutes';

    public function __construct()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'yetiroutes.com';
        $this->baseUrl = "$protocol://$host";
    }

    /**
     * Set page meta data
     */
    public function setMeta(array $data): void
    {
        $defaults = [
            'title' => 'Yeti Routes - Authentic Himalayan Adventures',
            'description' => 'Experience the Himalayas with Yeti Routes - Expert guides, authentic treks, fair prices.',
            'keywords' => 'nepal trekking, everest base camp, annapurna trek, himalayan adventures',
            'image' => $this->baseUrl . '/images/og-default.jpg',
            'url' => $this->baseUrl . $_SERVER['REQUEST_URI'],
            'type' => 'website',
            'author' => 'Yeti Routes',
            'published_time' => null,
            'modified_time' => null,
        ];

        $this->meta = array_merge($defaults, $data);
    }

    /**
     * Generate all meta tags
     */
    public function renderMetaTags(): string
    {
        if (empty($this->meta)) {
            $this->setMeta([]);
        }

        $canonical = $this->getCanonicalUrl();
        $title = $this->meta['title'];
        $description = $this->meta['description'];
        $image = $this->meta['image'];
        $url = $canonical;

        // Get image alt text from meta or generate from title
        $imageAlt = $this->meta['image_alt'] ?? $title;

        // Standard OG image dimensions (recommended: 1200x630)
        $imageWidth = $this->meta['image_width'] ?? '1200';
        $imageHeight = $this->meta['image_height'] ?? '630';

        $html = "
    <!-- Primary Meta Tags -->
    <title>{$title}</title>
    <meta name=\"title\" content=\"{$title}\">
    <meta name=\"description\" content=\"{$description}\">
    <meta name=\"keywords\" content=\"{$this->meta['keywords']}\">
    <meta name=\"author\" content=\"{$this->meta['author']}\">
    <meta name=\"robots\" content=\"index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1\">
    <link rel=\"canonical\" href=\"{$canonical}\">
";

        // Pinterest verification (if configured)
        if ($this->pinterestVerify) {
            $html .= "    <meta name=\"p:domain_verify\" content=\"{$this->pinterestVerify}\">\n";
        }

        // Open Graph / Facebook
        $html .= "
    <!-- Open Graph / Facebook -->
    <meta property=\"og:type\" content=\"{$this->meta['type']}\">
    <meta property=\"og:url\" content=\"{$url}\">
    <meta property=\"og:title\" content=\"{$title}\">
    <meta property=\"og:description\" content=\"{$description}\">
    <meta property=\"og:image\" content=\"{$image}\">
    <meta property=\"og:image:secure_url\" content=\"{$image}\">
    <meta property=\"og:image:width\" content=\"{$imageWidth}\">
    <meta property=\"og:image:height\" content=\"{$imageHeight}\">
    <meta property=\"og:image:alt\" content=\"{$imageAlt}\">
    <meta property=\"og:image:type\" content=\"image/jpeg\">
    <meta property=\"og:site_name\" content=\"{$this->siteName}\">
    <meta property=\"og:locale\" content=\"en_US\">
    <meta property=\"og:locale:alternate\" content=\"fr_FR\">
    <meta property=\"og:locale:alternate\" content=\"de_DE\">
";

        // Facebook App ID (if configured)
        if ($this->facebookAppId) {
            $html .= "    <meta property=\"fb:app_id\" content=\"{$this->facebookAppId}\">\n";
        }

        // Facebook Page (for verification and insights)
        $html .= "    <meta property=\"article:publisher\" content=\"{$this->facebookPage}\">\n";

        // Article-specific tags
        if ($this->meta['published_time']) {
            $html .= "    <meta property=\"article:published_time\" content=\"{$this->meta['published_time']}\">\n";
        }
        if ($this->meta['modified_time']) {
            $html .= "    <meta property=\"article:modified_time\" content=\"{$this->meta['modified_time']}\">\n";
        }

        // Twitter Card
        $html .= "
    <!-- Twitter -->
    <meta name=\"twitter:card\" content=\"summary_large_image\">
    <meta name=\"twitter:site\" content=\"{$this->twitterHandle}\">
    <meta name=\"twitter:creator\" content=\"{$this->twitterHandle}\">
    <meta name=\"twitter:url\" content=\"{$url}\">
    <meta name=\"twitter:title\" content=\"{$title}\">
    <meta name=\"twitter:description\" content=\"{$description}\">
    <meta name=\"twitter:image\" content=\"{$image}\">
    <meta name=\"twitter:image:alt\" content=\"{$imageAlt}\">

    <!-- Mobile Optimization -->
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=5\">
    <meta name=\"format-detection\" content=\"telephone=no\">
    <meta name=\"theme-color\" content=\"#c6f432\">

    <!-- Additional SEO -->
    <meta name=\"google\" content=\"nositelinkssearchbox\">
    <meta name=\"google-site-verification\" content=\"\"><!-- Add Google Search Console verification code -->
";

        return $html;
    }

    /**
     * Generate canonical URL (clean, without query params for SEO)
     */
    public function getCanonicalUrl(): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        $path = strtok($uri, '?');

        // Remove language prefix for canonical
        $path = preg_replace('#^/(fr|de)/#', '/', $path);

        return $this->baseUrl . $path;
    }

    /**
     * Generate hreflang tags for multi-language
     */
    public function renderHreflangTags(): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        $cleanPath = preg_replace('#^/(fr|de)(/|$)#', '$2', strtok($uri, '?'));
        $cleanPath = $cleanPath ?: '/';

        $languages = [
            'en' => $this->baseUrl . $cleanPath,
            'fr' => $this->baseUrl . '/fr' . $cleanPath,
            'de' => $this->baseUrl . '/de' . $cleanPath,
        ];

        $html = "\n    <!-- Hreflang Tags -->\n";
        foreach ($languages as $lang => $url) {
            $html .= "    <link rel=\"alternate\" hreflang=\"{$lang}\" href=\"{$url}\">\n";
        }
        $html .= "    <link rel=\"alternate\" hreflang=\"x-default\" href=\"{$languages['en']}\">\n";

        return $html;
    }

    /**
     * Add Trek/Tour Structured Data (Schema.org)
     */
    public function addTrekSchema(object $route): void
    {
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "TouristTrip",
            "name" => $route->title,
            "description" => $route->short_description ?? $route->full_description,
            "image" => $route->featured_image_path ?? $this->baseUrl . '/images/default-trek.jpg',
            "url" => $this->baseUrl . "/trek/" . $route->slug,
            "provider" => [
                "@type" => "Organization",
                "name" => "Yeti Routes",
                "url" => $this->baseUrl,
                "logo" => $this->baseUrl . "/images/logo.png",
                "sameAs" => [
                    "https://facebook.com/yetiroutes",
                    "https://instagram.com/yetiroutes"
                ]
            ],
            "itinerary" => [
                "@type" => "ItemList",
                "numberOfItems" => $route->duration_days
            ],
            "touristType" => "Adventure Travelers",
            "offers" => [
                "@type" => "Offer",
                "price" => $route->base_price,
                "priceCurrency" => "USD",
                "availability" => "https://schema.org/InStock",
                "validFrom" => date('Y-m-d'),
                "priceValidUntil" => date('Y-12-31'),
                "url" => $this->baseUrl . "/trek/" . $route->slug
            ]
        ];

        // Add trek-specific data
        if (isset($route->max_altitude_meters)) {
            $schema["touristType"] = "Trekking Enthusiasts";
            $schema["maximumAttendeeCapacity"] = 12;
        }

        $this->structuredData[] = $schema;
    }

    /**
     * Add Organization Schema
     */
    public function addOrganizationSchema(): void
    {
        $schema = [
            "@context" => "https://schema.org",
            "@type" => "TravelAgency",
            "name" => "Yeti Routes",
            "description" => "Premium trekking and tour operator in Nepal specializing in Everest, Annapurna, Langtang, and Manaslu region treks",
            "url" => $this->baseUrl,
            "logo" => $this->baseUrl . "/images/logo.png",
            "image" => $this->baseUrl . "/images/og-default.jpg",
            "telephone" => "+977-9843-183934",
            "email" => "info@yetiroutes.com",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "Thamel",
                "addressLocality" => "Kathmandu",
                "addressRegion" => "Bagmati",
                "postalCode" => "44600",
                "addressCountry" => "NP"
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => "27.7172",
                "longitude" => "85.3240"
            ],
            "sameAs" => [
                "https://facebook.com/yetiroutes",
                "https://instagram.com/yetiroutes",
                "https://twitter.com/yetiroutes"
            ],
            // TODO: Implement real review system before enabling aggregateRating
            // Hardcoded ratings violate Google's structured data guidelines and can result in penalties
            // See SEO-NEXT-PHASE-PLAN.md (Week 9-10) for implementation guide
            /*
            "aggregateRating" => [
                "@type" => "AggregateRating",
                "ratingValue" => "4.9",  // Replace with actual calculated average
                "reviewCount" => "150",   // Replace with actual count from database
                "bestRating" => "5",
                "worstRating" => "1"
            ],
            */
            "priceRange" => "$$-$$$"
        ];

        $this->structuredData[] = $schema;
    }

    /**
     * Add Breadcrumb Schema
     */
    public function addBreadcrumbSchema(array $breadcrumbs): void
    {
        $items = [];
        $position = 1;

        foreach ($breadcrumbs as $item) {
            $items[] = [
                "@type" => "ListItem",
                "position" => $position++,
                "name" => $item['name'],
                "item" => $this->baseUrl . $item['url']
            ];
        }

        $schema = [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => $items
        ];

        $this->structuredData[] = $schema;
    }

    /**
     * Add FAQ Schema
     */
    public function addFaqSchema(array $faqs): void
    {
        $items = [];

        foreach ($faqs as $faq) {
            $items[] = [
                "@type" => "Question",
                "name" => $faq['question'],
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => $faq['answer']
                ]
            ];
        }

        $schema = [
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => $items
        ];

        $this->structuredData[] = $schema;
    }

    /**
     * Add BlogPosting Schema for blog articles
     *
     * @param object $article Blog post object with title, content, author, dates, etc.
     */
    public function addBlogPostingSchema(object $article): void
    {
        // Extract article data
        $headline = $article->title ?? '';
        $description = $article->excerpt ?? $article->meta_description ?? '';
        $image = $article->featured_image_path ?? $this->baseUrl . '/images/og-default.jpg';
        $author = $article->author_name ?? 'Yeti Routes';
        $datePublished = $article->published_at ?? $article->created_at ?? date('c');
        $dateModified = $article->updated_at ?? $datePublished;
        $articleUrl = $this->baseUrl . "/blog/" . ($article->slug ?? '');

        // Format dates to ISO 8601 if they're not already
        if (!str_contains($datePublished, 'T')) {
            $datePublished = date('c', strtotime($datePublished));
        }
        if (!str_contains($dateModified, 'T')) {
            $dateModified = date('c', strtotime($dateModified));
        }

        $schema = [
            "@context" => "https://schema.org",
            "@type" => "BlogPosting",
            "headline" => $headline,
            "description" => $description,
            "image" => [
                "@type" => "ImageObject",
                "url" => $image,
                "width" => 1200,
                "height" => 630
            ],
            "author" => [
                "@type" => "Person",
                "name" => $author,
                "url" => $this->baseUrl . "/about"
            ],
            "publisher" => [
                "@type" => "Organization",
                "name" => "Yeti Routes",
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => $this->baseUrl . "/images/logo.png",
                    "width" => 200,
                    "height" => 60
                ]
            ],
            "datePublished" => $datePublished,
            "dateModified" => $dateModified,
            "mainEntityOfPage" => [
                "@type" => "WebPage",
                "@id" => $articleUrl
            ],
            "articleSection" => $article->category ?? "Trekking & Adventure",
            "keywords" => $article->keywords ?? "nepal trekking, himalayan adventures",
            "inLanguage" => "en-US",
            "url" => $articleUrl
        ];

        // Add word count if available
        if (isset($article->content)) {
            $wordCount = str_word_count(strip_tags($article->content));
            $schema["wordCount"] = $wordCount;
        }

        // Add comment count if available
        if (isset($article->comment_count)) {
            $schema["commentCount"] = $article->comment_count;
        }

        $this->structuredData[] = $schema;
    }

    /**
     * Render all structured data as JSON-LD
     */
    public function renderStructuredData(): string
    {
        if (empty($this->structuredData)) {
            return '';
        }

        $html = "\n    <!-- Structured Data (Schema.org) -->\n";
        foreach ($this->structuredData as $data) {
            $json = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            $html .= "    <script type=\"application/ld+json\">\n{$json}\n    </script>\n";
        }

        return $html;
    }

    /**
     * Render breadcrumbs HTML
     */
    public function renderBreadcrumbs(array $breadcrumbs): string
    {
        $html = '<nav class="bg-gray-50 py-3 px-6 mb-6 rounded-lg" aria-label="Breadcrumb">
            <ol class="flex items-center gap-2 text-sm">';

        $count = count($breadcrumbs);
        foreach ($breadcrumbs as $index => $item) {
            $isLast = ($index === $count - 1);

            if ($isLast) {
                $html .= '<li class="text-gray-600 font-medium" aria-current="page">' .
                         htmlspecialchars($item['name']) . '</li>';
            } else {
                $html .= '<li>
                    <a href="' . htmlspecialchars($item['url']) . '"
                       class="text-blue-600 hover:text-blue-800 transition">
                        ' . htmlspecialchars($item['name']) . '
                    </a>
                </li>
                <li class="text-gray-400">/</li>';
            }
        }

        $html .= '</ol></nav>';

        return $html;
    }
}
