<?php
require_once '../../app/admin/controller/AdminController.php';
class AdminCategoryModal
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM category";
        return $this->db->getAll($sql);
    }
    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM category WHERE $id = cateID";
        return $this->db->getOne($sql);
    }
    public function addCategory($genre)
    {
        $sql = "INSERT INTO category (genre) VALUES (:genre)";
        $params = array(':genre' => $genre);
        return $this->db->execute($sql, $params);
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE cateID = :id";
        $params = array(':id' => $id);
        return $this->db->execute($sql, $params);
    }

    public function updateCategory($id, $genre)
    {
        $sql = "UPDATE category SET genre = :genre WHERE cateID = :id";
        $params = array(':genre' => $genre, ':id' => $id);
        return $this->db->execute($sql, $params);
    }
}
