<?php
require_once 'app/modal/database.php';

class NewsModal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllNews()
    {
        $query = "SELECT * FROM news";
        // return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($id)
    {
        $query = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        // return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>