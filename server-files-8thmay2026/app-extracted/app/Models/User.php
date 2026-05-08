<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected string $table = 'users';
    protected array $fillable = [
        'role_id', 'email', 'password_hash', 'full_name', 'phone',
        'whatsapp_number', 'two_factor_secret', 'is_active',
        'preferred_language', 'avatar_media_id', 'loyalty_points_balance'
    ];

    /**
     * Find user by email
     */
    public function findByEmail(string $email): ?object
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(\PDO::FETCH_OBJ);
        return $result ?: null;
    }

    /**
     * Verify user password
     */
    public function verifyPassword(string $email, string $password): ?object
    {
        $user = $this->findByEmail($email);

        if ($user && password_verify($password, $user->password_hash)) {
            return $user;
        }

        return null;
    }

    /**
     * Create user with hashed password
     */
    public function createUser(array $data): int|bool
    {
        if (isset($data['password'])) {
            $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            unset($data['password']);
        }

        return $this->create($data);
    }

    /**
     * Get users with role name
     */
    public function getAllWithRoles(): array
    {
        $sql = "SELECT u.*, r.name as role_name
                FROM {$this->table} u
                LEFT JOIN roles r ON u.role_id = r.id
                WHERE u.deleted_at IS NULL
                ORDER BY u.created_at DESC";

        return $this->query($sql);
    }

    /**
     * Update loyalty points
     */
    public function updateLoyaltyPoints(int $userId, int $points, string $description, ?int $bookingId = null): bool
    {
        // Start transaction
        $this->db->beginTransaction();

        try {
            // Update user balance
            $sql = "UPDATE {$this->table}
                    SET loyalty_points_balance = loyalty_points_balance + :points
                    WHERE id = :user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['points' => $points, 'user_id' => $userId]);

            // Log transaction
            $sql = "INSERT INTO loyalty_transactions (user_id, points, description, reference_booking_id)
                    VALUES (:user_id, :points, :description, :booking_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'user_id' => $userId,
                'points' => $points,
                'description' => $description,
                'booking_id' => $bookingId
            ]);

            $this->db->commit();
            return true;
        } catch (\PDOException $e) {
            $this->db->rollBack();
            error_log("Loyalty Points Error: " . $e->getMessage());
            return false;
        }
    }
}
