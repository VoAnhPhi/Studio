<?php
require_once 'app/modal/database.php';

class ProductModal
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM product";
        return $this->db->getAll($sql);
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM product WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductByCategory($productId, $categoryId)
    {
        $sql = "SELECT * FROM productId = :productId AND categoryId = :categoryId";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->bindParam(':productId', $productId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStudiosByGenre($genre)
    {
        $sql = "SELECT * FROM product WHERE genre = :genre";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':genre', $genre);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>