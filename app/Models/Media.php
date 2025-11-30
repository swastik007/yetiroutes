<?php

namespace App\Models;

use App\Core\Model;

class Media extends Model
{
    protected string $table = 'media_library';
    protected array $fillable = [
        'filename', 'original_path', 'variants', 'mime_type',
        'alt_text', 'uploaded_by', 'visibility'
    ];

    /**
     * Get all media with uploader info
     */
    public function getAllWithUploader(): array
    {
        $sql = "SELECT m.*, u.full_name as uploaded_by_name
                FROM {$this->table} m
                LEFT JOIN users u ON m.uploaded_by = u.id
                ORDER BY m.created_at DESC";

        return $this->query($sql);
    }

    /**
     * Attach media to entity
     */
    public function attachToEntity(int $mediaId, string $entityType, int $entityId, bool $isFeatured = false): bool
    {
        $sql = "INSERT INTO media_attachments (media_id, entity_type, entity_id, is_featured)
                VALUES (:media_id, :entity_type, :entity_id, :is_featured)
                ON DUPLICATE KEY UPDATE is_featured = :is_featured";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'media_id' => $mediaId,
                'entity_type' => $entityType,
                'entity_id' => $entityId,
                'is_featured' => $isFeatured ? 1 : 0
            ]);
        } catch (\PDOException $e) {
            error_log("Media Attachment Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get media for entity
     */
    public function getForEntity(string $entityType, int $entityId): array
    {
        $sql = "SELECT m.* FROM {$this->table} m
                JOIN media_attachments ma ON m.id = ma.media_id
                WHERE ma.entity_type = :entity_type AND ma.entity_id = :entity_id
                ORDER BY ma.is_featured DESC, ma.sort_order ASC";

        return $this->query($sql, [
            'entity_type' => $entityType,
            'entity_id' => $entityId
        ]);
    }
}
