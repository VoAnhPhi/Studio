<?php
require_once 'app/modal/database.php';

class CheckOutModal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Khởi tạo đối tượng Database
    }

    public function insertPayment($name, $phone, $paymentMethod, $status)
    {
        // Chuẩn bị câu lệnh SQL để chèn dữ liệu vào bảng payment
        $sql = "INSERT INTO payment (name, phone, payment_method, status) VALUES (:name, :phone, :payment_method, :status)";

        // Mảng tham số để truyền vào câu lệnh SQL
        $param = [
            ':name' => $name,
            ':phone' => $phone,
            ':payment_method' => $paymentMethod,
            ':status' => $status
        ];

        // Gọi phương thức insert từ Database để thực thi câu lệnh SQL
        $lastInsertId = $this->db->insert($sql, $param);

        // Kiểm tra xem có chèn thành công hay không
        return $lastInsertId ? true : false;
    }
}
