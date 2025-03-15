<?php
require_once '../../app/admin/modal/database.php';

class AdminProductModal
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng dữ liệu
    }

    // Lấy sản phẩm theo ID
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        return $this->fetchOne($sql, [$id]);
    }

    // Thêm sản phẩm
    public function addProduct($name, $location, $price, $availability, $imagePath)
    {
        $sql = "INSERT INTO products (name, location, price, availability, image) 
                VALUES (:name, :location, :price, :availability, :image)";

        $stmt = $this->db->prepare($sql);

        // Bind các tham số
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':availability', $availability);
        $stmt->bindParam(':image', $imagePath);

        return $stmt->execute();
    }

    // Cập nhật sản phẩm
    public function updateProduct($id, $name, $location, $price, $availability, $image, $views)
    {
        $sql = "UPDATE products SET name = ?, location = ?, price = ?, availability = ?, image = ?, view = ? WHERE product_id = ?";
        return $this->execute($sql, [$name, $location, $price, $availability, $image, $views, $id]);
    }

    // Xóa sản phẩm
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE product_id = ?";
        return $this->execute($sql, [$id]);
    }

    // Lấy tất cả người dùng
    public function getAllDataUser()
    {
        $sql = "SELECT * FROM user";
        return $this->fetchAll($sql);
    }

    // Lấy tổng số người dùng
    public function getTotalUser()
    {
        $sql = "SELECT COUNT(DISTINCT user_id) AS user FROM user";
        $result = $this->fetchOne($sql);
        return $result['user'];
    }

    // Phương thức thực thi truy vấn SELECT trả về một hàng dữ liệu
    private function fetchOne($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if ($params) {
            $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Phương thức thực thi truy vấn SELECT trả về tất cả kết quả
    private function fetchAll($sql, $params = [])
    {
        try {
            // Gọi phương thức getConnection() để lấy đối tượng PDO và gọi prepare trên đó
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Trả về kết quả dưới dạng mảng
        } catch (PDOException $e) {
            // Log lỗi nếu có
            $this->logError($e);
            return [];
        }
    }

    // Phương thức thực thi truy vấn UPDATE/INSERT/DELETE
    private function execute($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if ($params) {
            $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        }
        return $stmt->execute();
    }
}
?>