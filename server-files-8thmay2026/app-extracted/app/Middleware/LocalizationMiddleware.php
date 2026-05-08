<?php

namespace App\Middleware;

use App\Core\Database;
use PDO;

/**
 * Localization Middleware
 * Handles multi-language content translation based on URL or session
 */
class LocalizationMiddleware
{
    private PDO $db;
    private string $currentLanguage = 'en';
    private array $supportedLanguages = ['en', 'fr', 'de'];

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
        $this->detectLanguage();
    }

    /**
     * Detect language from URL or session
     */
    private function detectLanguage(): void
    {
        // Check URL for language code (e.g., /fr/route-name)
        $uri = $_SERVER['REQUEST_URI'];
        $uriParts = explode('/', trim($uri, '/'));

        if (!empty($uriParts[0]) && in_array($uriParts[0], $this->supportedLanguages)) {
            $this->currentLanguage = $uriParts[0];
            $_SESSION['language'] = $this->currentLanguage;
            return;
        }

        // Check session
        if (isset($_SESSION['language']) && in_array($_SESSION['language'], $this->supportedLanguages)) {
            $this->currentLanguage = $_SESSION['language'];
            return;
        }

        // Check user preference (if logged in)
        if (isset($_SESSION['user_id'])) {
            $sql = "SELECT preferred_language FROM users WHERE id = :user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['user_id' => $_SESSION['user_id']]);
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            if ($user && in_array($user->preferred_language, $this->supportedLanguages)) {
                $this->currentLanguage = $user->preferred_language;
                $_SESSION['language'] = $this->currentLanguage;
            }
        }
    }

    /**
     * Get current language
     */
    public function getCurrentLanguage(): string
    {
        return $this->currentLanguage;
    }

    /**
     * Translate entity content
     *
     * @param string $entityType The entity type (route, blog_post, faq, etc.)
     * @param int $entityId The entity ID
     * @param object $entity The entity object to translate
     * @return object Translated entity
     */
    public function translate(string $entityType, int $entityId, object $entity): object
    {
        // If English, no translation needed
        if ($this->currentLanguage === 'en') {
            return $entity;
        }

        // Fetch translations
        $sql = "SELECT field_name, translation_value
                FROM content_translations
                WHERE entity_type = :entity_type
                AND entity_id = :entity_id
                AND language_code = :language_code";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'entity_type' => $entityType,
            'entity_id' => $entityId,
            'language_code' => $this->currentLanguage
        ]);

        $translations = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Apply translations to entity
        foreach ($translations as $translation) {
            $fieldName = $translation->field_name;
            if (property_exists($entity, $fieldName)) {
                $entity->$fieldName = $translation->translation_value;
            }
        }

        return $entity;
    }

    /**
     * Translate multiple entities
     *
     * @param string $entityType
     * @param array $entities Array of entities
     * @return array Translated entities
     */
    public function translateMany(string $entityType, array $entities): array
    {
        if ($this->currentLanguage === 'en' || empty($entities)) {
            return $entities;
        }

        $entityIds = array_map(function($entity) {
            return $entity->id;
        }, $entities);

        // Fetch all translations for these entities
        $placeholders = implode(',', array_fill(0, count($entityIds), '?'));
        $sql = "SELECT entity_id, field_name, translation_value
                FROM content_translations
                WHERE entity_type = ?
                AND entity_id IN ($placeholders)
                AND language_code = ?";

        $params = array_merge([$entityType], $entityIds, [$this->currentLanguage]);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $translations = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Group translations by entity_id
        $translationMap = [];
        foreach ($translations as $translation) {
            if (!isset($translationMap[$translation->entity_id])) {
                $translationMap[$translation->entity_id] = [];
            }
            $translationMap[$translation->entity_id][$translation->field_name] = $translation->translation_value;
        }

        // Apply translations to entities
        foreach ($entities as &$entity) {
            if (isset($translationMap[$entity->id])) {
                foreach ($translationMap[$entity->id] as $field => $value) {
                    if (property_exists($entity, $field)) {
                        $entity->$field = $value;
                    }
                }
            }
        }

        return $entities;
    }

    /**
     * Save translation for an entity
     *
     * @param string $entityType
     * @param int $entityId
     * @param string $languageCode
     * @param string $fieldName
     * @param string $translationValue
     * @return bool
     */
    public function saveTranslation(
        string $entityType,
        int $entityId,
        string $languageCode,
        string $fieldName,
        string $translationValue
    ): bool {
        $sql = "INSERT INTO content_translations
                (entity_type, entity_id, language_code, field_name, translation_value)
                VALUES (:entity_type, :entity_id, :language_code, :field_name, :translation_value)
                ON DUPLICATE KEY UPDATE
                translation_value = :translation_value,
                updated_at = CURRENT_TIMESTAMP";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'entity_type' => $entityType,
                'entity_id' => $entityId,
                'language_code' => $languageCode,
                'field_name' => $fieldName,
                'translation_value' => $translationValue
            ]);
        } catch (\PDOException $e) {
            error_log("Translation Save Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get all active languages
     */
    public function getActiveLanguages(): array
    {
        $sql = "SELECT * FROM languages WHERE is_active = 1 ORDER BY is_default DESC, name ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get language URL prefix
     */
    public function getLanguagePrefix(): string
    {
        return $this->currentLanguage === 'en' ? '' : '/' . $this->currentLanguage;
    }

    /**
     * Generate localized URL
     */
    public function url(string $path): string
    {
        $prefix = $this->getLanguagePrefix();
        return $prefix . $path;
    }
}
