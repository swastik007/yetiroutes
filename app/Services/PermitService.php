<?php

namespace App\Services;

use App\Core\Database;
use PDO;

/**
 * Permit Logic Service
 * Handles permit cost calculations based on nationality and route requirements
 */
class PermitService
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Calculate permit costs for a route based on nationality
     *
     * @param int $routeId The route ID
     * @param string $nationality The nationality code (e.g., 'SAARC', 'Other')
     * @return array Array of permits with costs
     */
    public function calculatePermitCosts(int $routeId, string $nationality): array
    {
        // Get all permits required for this route
        $sql = "SELECT p.* FROM permits p
                INNER JOIN route_permits rp ON p.id = rp.permit_id
                WHERE rp.route_id = :route_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['route_id' => $routeId]);
        $permits = $stmt->fetchAll(PDO::FETCH_OBJ);

        $permitCosts = [];

        foreach ($permits as $permit) {
            $nationalityRules = json_decode($permit->nationality_price_rules, true);

            // Parse JSON rules to find matching nationality cost
            $cost = $this->extractCostForNationality($nationalityRules, $nationality);

            $permitCosts[] = [
                'permit_id' => $permit->id,
                'permit_name' => $permit->name,
                'cost' => $cost,
                'requires_fnrts' => (bool) $permit->is_fnrts_required,
                'currency' => 'USD'
            ];
        }

        return $permitCosts;
    }

    /**
     * Extract cost from nationality price rules JSON
     *
     * @param array $rules The nationality price rules
     * @param string $nationality The nationality to match
     * @return float The cost
     */
    private function extractCostForNationality(array $rules, string $nationality): float
    {
        // Example JSON structure:
        // {
        //   "SAARC": 30.00,
        //   "Chinese": 120.00,
        //   "Other": 90.00
        // }

        if (isset($rules[$nationality])) {
            return (float) $rules[$nationality];
        }

        // Default to "Other" if specific nationality not found
        return isset($rules['Other']) ? (float) $rules['Other'] : 0.00;
    }

    /**
     * Get total permit cost for a route and nationality
     *
     * @param int $routeId
     * @param string $nationality
     * @return float Total cost
     */
    public function getTotalPermitCost(int $routeId, string $nationality): float
    {
        $permits = $this->calculatePermitCosts($routeId, $nationality);

        return array_reduce($permits, function($total, $permit) {
            return $total + $permit['cost'];
        }, 0.00);
    }

    /**
     * Check if route requires FNRTS (Free Individual Traveler Information Management System)
     *
     * @param int $routeId
     * @return bool
     */
    public function requiresFNRTS(int $routeId): bool
    {
        $sql = "SELECT COUNT(*) as count FROM permits p
                INNER JOIN route_permits rp ON p.id = rp.permit_id
                WHERE rp.route_id = :route_id AND p.is_fnrts_required = 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['route_id' => $routeId]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result->count > 0;
    }

    /**
     * Get all permits for a route with details
     *
     * @param int $routeId
     * @return array
     */
    public function getRoutePermits(int $routeId): array
    {
        $sql = "SELECT p.* FROM permits p
                INNER JOIN route_permits rp ON p.id = rp.permit_id
                WHERE rp.route_id = :route_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['route_id' => $routeId]);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Add permit to route
     *
     * @param int $routeId
     * @param int $permitId
     * @return bool
     */
    public function attachPermitToRoute(int $routeId, int $permitId): bool
    {
        $sql = "INSERT INTO route_permits (route_id, permit_id) VALUES (:route_id, :permit_id)
                ON DUPLICATE KEY UPDATE route_id = route_id";

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'route_id' => $routeId,
                'permit_id' => $permitId
            ]);
        } catch (\PDOException $e) {
            error_log("Permit Attachment Error: " . $e->getMessage());
            return false;
        }
    }
}
