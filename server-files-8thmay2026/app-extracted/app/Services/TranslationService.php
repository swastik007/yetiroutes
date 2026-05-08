<?php

namespace App\Services;

use App\Core\Database;

class TranslationService
{
    private $db;
    private $currentLang;

    public function __construct(string $lang = 'en')
    {
        $this->db = Database::getInstance()->getConnection();
        $this->currentLang = $lang;
    }

    /**
     * Overlay translations onto an object or array of objects
     * 
     * @param object|array $entity The entity or array of entities to translate
     * @param string $type The entity type (e.g., 'route', 'blog_post')
     * @param string|null $lang Optional language code override
     * @return object|array The translated entity/entities
     */
    public function translate($entity, string $type, ?string $lang = null)
    {
        $lang = $lang ?? $this->currentLang;

        // If default language, return as is
        if ($lang === 'en') {
            return $entity;
        }

        if (is_array($entity)) {
            foreach ($entity as $key => $item) {
                $entity[$key] = $this->translateSingle($item, $type, $lang);
            }
            return $entity;
        }

        return $this->translateSingle($entity, $type, $lang);
    }

    /**
     * Translate a single object
     */
    private function translateSingle($object, string $type, string $lang)
    {
        if (!is_object($object) || !isset($object->id)) {
            return $object;
        }

        // Fetch translations for this entity
        $sql = "SELECT field_name, translation_value 
                FROM content_translations 
                WHERE entity_type = :type 
                AND entity_id = :id 
                AND language_code = :lang";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'type' => $type,
            'id' => $object->id,
            'lang' => $lang
        ]);

        $translations = $stmt->fetchAll();

        // Overlay properties
        foreach ($translations as $t) {
            $field = $t->field_name;
            // Only update if property exists to avoid magic property creation issues if undesired
            // or just force update:
            $object->$field = $t->translation_value;
        }

        return $object;
    }

    /**
     * Save or update a translation
     */
    public function saveTranslation(string $type, int $id, string $lang, string $field, string $value): bool
    {
        $sql = "INSERT INTO content_translations (entity_type, entity_id, language_code, field_name, translation_value)
                VALUES (:type, :id, :lang, :field, :value)
                ON DUPLICATE KEY UPDATE translation_value = :value";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'type' => $type,
            'id' => $id,
            'lang' => $lang,
            'field' => $field,
            'value' => $value
        ]);
    }
}
