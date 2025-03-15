<?php
require_once 'app/modal/database.php';

class ServiceModal
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    /**
     * Lấy danh sách tất cả bài viết
     * @return array
     */

    public function getTopService()
    {
        $sql = "SELECT * FROM service ORDER BY service_id ASC LIMIT 3";
        return $this->db->getAll($sql);
    }
}
?>