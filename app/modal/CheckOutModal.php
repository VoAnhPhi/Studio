<?php
require_once 'app/modal/database.php';

class ProductModal
{
    private $db;
    private $roomPrice = 1000; // Giá mỗi phòng (có thể thay đổi theo database)
    private $servicePrice = 500; // Giá dịch vụ (có thể thay đổi theo database)

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Tính tổng tiền
     */
    public function calculatePrice($checkin, $checkout, $rooms, $service)
    {
        $totalDays = (strtotime($checkout) - strtotime($checkin)) / 86400;

        // Tính tổng giá
        $totalPrice = ($this->roomPrice * $rooms + $this->servicePrice) * $totalDays;

        return $totalPrice;
    }

    /**
     * Lấy danh sách sản phẩm
     */
    public function getProducts()
    {
        $sql = "SELECT studio_id, name, location, description, price, image FROM studiocategory";
        return $this->db->getAll($sql);
    }

    /**
     * Lấy chi tiết sản phẩm theo ID
     */
    public function getProductById($id)
    {
        $sql = "SELECT * FROM studiocategory WHERE studio_id = :id";
        return $this->db->getOne($sql, ['id' => $id]);
    }
}
?>
