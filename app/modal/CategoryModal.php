<?php
require_once 'app/modal/database.php';

class CategoryModal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM category";
        return $this->db->getAll($sql);
    }

    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM category WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>