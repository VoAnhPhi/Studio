<?php
require_once 'app/modal/database.php';

class ProductModal
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

    public function getProducts()
    {
        $sql = "SELECT product_id, name, location, description, price, image FROM products";
        return $this->db->getAll($sql);
    }

    /**
     * Lấy chi tiết bài viết theo ID
     * @param int $id
     * @return array|false
     */
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE product_id = :id";
        return $this->db->getOne($sql, ['id' => $id]);
    }

    public function getTopProducts()
    {
        $sql = "SELECT product_id, name, location, description, price, image FROM products ORDER BY product_id DESC LIMIT 3";
        return $this->db->getAll($sql);
    }

}

?>