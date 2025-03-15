<?php

class OrderModal
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db; // Kết nối cơ sở dữ liệu
    }

    // Lấy danh sách đơn hàng của người dùng
    public function getOrdersByUserId($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm đơn hàng mới
    public function createOrder($userId, $productId, $quantity, $totalPrice, $status)
    {
        $stmt = $this->db->prepare("
            INSERT INTO orders (user_id, product_id, quantity, total_price, status, created_at)
            VALUES (:user_id, :product_id, :quantity, :total_price, :status, NOW())
        ");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':total_price', $totalPrice, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Xóa đơn hàng
    public function deleteOrder($orderId, $userId)
    {
        $stmt = $this->db->prepare("DELETE FROM orders WHERE id = :order_id AND user_id = :user_id");
        $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
