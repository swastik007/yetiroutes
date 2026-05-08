<?php

namespace App\Models;

use App\Core\Model;

class Booking extends Model
{
    protected string $table = 'bookings';
    protected array $fillable = [
        'booking_reference', 'user_id', 'departure_id', 'customer_email',
        'booking_status', 'payment_status', 'total_amount', 'currency',
        'exchange_rate_to_usd', 'carbon_offset_project_id'
    ];

    /**
     * Get all bookings with departure and route info
     */
    public function getAllWithDetails(): array
    {
        $sql = "SELECT b.*, d.start_date, d.end_date, r.title as route_title, u.full_name as customer_name
                FROM {$this->table} b
                LEFT JOIN departures d ON b.departure_id = d.id
                LEFT JOIN routes r ON d.route_id = r.id
                LEFT JOIN users u ON b.user_id = u.id
                ORDER BY b.created_at DESC";

        return $this->query($sql);
    }

    /**
     * Get booking with full details
     */
    public function getFullDetails(int $id): ?array
    {
        $booking = $this->find($id);
        if (!$booking) {
            return null;
        }

        // Get line items
        $sql = "SELECT * FROM booking_line_items WHERE booking_id = :booking_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['booking_id' => $id]);
        $lineItems = $stmt->fetchAll(\PDO::FETCH_OBJ);

        // Get payments
        $sql = "SELECT * FROM booking_payments WHERE booking_id = :booking_id ORDER BY paid_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['booking_id' => $id]);
        $payments = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return [
            'booking' => $booking,
            'line_items' => $lineItems,
            'payments' => $payments
        ];
    }

    /**
     * Generate unique booking reference
     */
    public function generateReference(): string
    {
        do {
            $reference = 'YR-' . date('Y') . '-' . strtoupper(substr(md5(uniqid()), 0, 6));
            $exists = $this->where('booking_reference', $reference);
        } while (!empty($exists));

        return $reference;
    }

    /**
     * Create booking with line items
     */
    public function createBookingWithItems(array $bookingData, array $lineItems): int|bool
    {
        $this->db->beginTransaction();

        try {
            // Create booking
            $bookingId = $this->create($bookingData);

            // Create line items
            $sql = "INSERT INTO booking_line_items (booking_id, item_type, item_name, quantity, unit_price, total_price)
                    VALUES (:booking_id, :item_type, :item_name, :quantity, :unit_price, :total_price)";
            $stmt = $this->db->prepare($sql);

            foreach ($lineItems as $item) {
                $stmt->execute([
                    'booking_id' => $bookingId,
                    'item_type' => $item['item_type'],
                    'item_name' => $item['item_name'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['total_price']
                ]);
            }

            $this->db->commit();
            return $bookingId;
        } catch (\PDOException $e) {
            $this->db->rollBack();
            error_log("Booking Creation Error: " . $e->getMessage());
            return false;
        }
    }
}
