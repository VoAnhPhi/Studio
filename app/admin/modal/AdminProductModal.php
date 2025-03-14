<?php
require_once '../../app/admin/controller/AdminController.php';
require_once '../app/admin/view/dbd.php';

class AdminProductModal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM studio";
        return $this->db->getAll($sql);
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM studio WHERE studio_id = $id";  // Sửa 'id' thành 'movieID'
        return $this->db->getOne($sql);
    }

    public function addProduct($name, $location, $price, $availability, $image)
    {
        $sql = "INSERT INTO studio (name, location, price, availability, image ) VALUES (:name, :location, :price, :availability, :image)";
        $params = array(':name' => $name, ':location' => $location, ':price' => $price, ':availability' => $availability, ':image' => $image);
        return $this->db->execute($sql, $params);
    }

    public function updateProduct($id, $name, $location, $price, $availability, $image)
    {
        $sql = "UPDATE studio SET name = :name, location = :location, price = :price, availability = :availability, image= :image, view = :views WHERE studio_id = :id";  // Sửa 'views' thành 'view'
        $params = array(':name' => $name, ':location' => $location, ':price' => $price, ':availability' => $availability, ':image' => $image, ':views' => $views, ':id' => $id);
        return $this->db->execute($sql, $params);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM studio WHERE studio_id = :id";
        $params = array(':id' => $id);
        return $this->db->execute($sql, $params);
    }

    // New method to get all data from usermoviepass
    public function getAllDataUser()
    {
        $sql = "SELECT * FROM user";
        return $this->db->getAll($sql);
    }
    public function getTotalUser()
    {
        $sql = "SELECT COUNT(DISTINCT user_id) AS user FROM user";
        $result = $this->db->getOne($sql);
        return $result['user'];
    }
}
