<?php
/**
 * Generates a targeted migration SQL file for the live server.
 * Only updates blog posts and changed routes — does NOT touch
 * live inquiries, bookings, or user accounts.
 */
$pdo = new PDO('mysql:host=127.0.0.1;dbname=yetiroutes;charset=utf8mb4', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = [];
$sql[] = "-- Yeti Routes: Migration SQL";
$sql[] = "-- Generated: " . date('Y-m-d H:i:s');
$sql[] = "-- Apply via phpMyAdmin > SQL tab on your live server";
$sql[] = "-- Safe to run multiple times (all UPDATEs and INSERT IGNORE)";
$sql[] = "SET NAMES utf8mb4;";
$sql[] = "SET foreign_key_checks = 0;";
$sql[] = "";

// ── Blog posts ─────────────────────────────────────────────────────────────
$sql[] = "-- ================================================================";
$sql[] = "-- BLOG POSTS (content, excerpt, meta)";
$sql[] = "-- ================================================================";
$posts = $pdo->query("SELECT id, slug, title, content, excerpt, meta_title, meta_description, status, published_at, author_id, category_id FROM blog_posts ORDER BY id")->fetchAll(PDO::FETCH_OBJ);

foreach ($posts as $p) {
    $content   = $pdo->quote($p->content ?? '');
    $excerpt   = $pdo->quote($p->excerpt ?? '');
    $metaTitle = $pdo->quote($p->meta_title ?? '');
    $metaDesc  = $pdo->quote($p->meta_description ?? '');
    $slug      = $pdo->quote($p->slug);
    $title     = $pdo->quote($p->title);
    $status    = $pdo->quote($p->status ?? 'published');
    $pubAt     = $p->published_at ? $pdo->quote($p->published_at) : 'NOW()';

    // INSERT IGNORE so it only inserts if the post doesn't exist yet on live
    $sql[] = "INSERT INTO blog_posts (id, author_id, category_id, title, slug, content, excerpt, meta_title, meta_description, status, published_at)";
    $sql[] = "  VALUES ({$p->id}, {$p->author_id}, {$p->category_id}, {$title}, {$slug}, {$content}, {$excerpt}, {$metaTitle}, {$metaDesc}, {$status}, {$pubAt})";
    $sql[] = "  ON DUPLICATE KEY UPDATE";
    $sql[] = "    content = VALUES(content),";
    $sql[] = "    excerpt = VALUES(excerpt),";
    $sql[] = "    meta_title = VALUES(meta_title),";
    $sql[] = "    meta_description = VALUES(meta_description),";
    $sql[] = "    status = VALUES(status);";
    $sql[] = "";
}

// ── Routes ─────────────────────────────────────────────────────────────────
$sql[] = "-- ================================================================";
$sql[] = "-- ROUTES (highlights, inclusions, exclusions, meta, active flags)";
$sql[] = "-- ================================================================";
$routeIds = [1, 2, 3, 4, 20, 26, 34, 36, 52];
$in = implode(',', $routeIds);
$routes = $pdo->query("SELECT id, slug, highlights, inclusions, exclusions, best_season, meta_title, meta_description, is_active, is_featured, location_id FROM routes WHERE id IN ($in) ORDER BY id")->fetchAll(PDO::FETCH_OBJ);

foreach ($routes as $r) {
    $highlights  = $pdo->quote($r->highlights ?? '');
    $inclusions  = $pdo->quote($r->inclusions ?? '');
    $exclusions  = $pdo->quote($r->exclusions ?? '');
    $bestSeason  = $pdo->quote($r->best_season ?? '');
    $metaTitle   = $pdo->quote($r->meta_title ?? '');
    $metaDesc    = $pdo->quote($r->meta_description ?? '');
    $isActive    = (int)$r->is_active;
    $isFeatured  = (int)$r->is_featured;
    $locationId  = (int)$r->location_id;

    $sql[] = "UPDATE routes SET";
    $sql[] = "  highlights = {$highlights},";
    $sql[] = "  inclusions = {$inclusions},";
    $sql[] = "  exclusions = {$exclusions},";
    $sql[] = "  best_season = {$bestSeason},";
    $sql[] = "  meta_title = {$metaTitle},";
    $sql[] = "  meta_description = {$metaDesc},";
    $sql[] = "  is_active = {$isActive},";
    $sql[] = "  is_featured = {$isFeatured},";
    $sql[] = "  location_id = {$locationId}";
    $sql[] = "WHERE id = {$r->id};";
    $sql[] = "";
}

$sql[] = "SET foreign_key_checks = 1;";
$sql[] = "-- Migration complete";

$output = implode("\n", $sql);
file_put_contents(__DIR__ . '/migration-live.sql', $output);
echo "Generated: Planning/migration-live.sql\n";
echo "File size: " . number_format(strlen($output) / 1024, 1) . " KB\n";
