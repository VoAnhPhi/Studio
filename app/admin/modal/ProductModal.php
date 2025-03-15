<?php
require_once '../../app/admin/modal/database.php';

class ProductModal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Lấy tất cả sản phẩm
     */
    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        return $this->db->getAll($sql);
    }

    /**
     * Thêm sản phẩm mới
     */
    public function addProduct($data)
    {
        $sql = "INSERT INTO products (name, price, category, description, location, availability, image) 
                VALUES (:name, :price, :category, :description, :location, :availability, :image)";

        return $this->db->execute($sql, [
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':category' => $data['category'],
            ':description' => $data['description'],
            ':location' => $data['location'],
            ':availability' => $data['availability'],
            ':image' => $data['image']
        ]);
    }

    /**
     * Xóa sản phẩm theo ID.
     * @param int $productId
     * @return bool
     */
    public function deleteProduct($productId)
    {
        $sql = "DELETE FROM products WHERE product_id = :product_id";
        $result = $this->db->execute($sql, ['product_id' => $productId]);

        // Kiểm tra kết quả xóa
        // var_dump($result); // Xem kết quả của quá trình xóa
        // return $result;
    }
    /**
     * Summary of updateProduct
     * @param mixed $productData
     * @return mixed
     */
    public function editProduct($productData)
    {
        $query = "UPDATE products SET 
              name = :name, 
              price = :price, 
              category = :category, 
              description = :description, 
              location = :location, 
              availability = :availability, 
              image = :image, 
              capacity = :capacity 
              WHERE product_id = :product_id";

        // Thực thi câu lệnh SQL với tham số
        return $this->db->execute($query, [
            ':name' => $productData['name'],
            ':price' => $productData['price'],
            ':category' => $productData['category'],
            ':description' => $productData['description'],
            ':location' => $productData['location'],
            ':availability' => $productData['availability'],
            ':image' => $productData['image'],
            ':capacity' => $productData['capacity'],
            ':product_id' => $productData['product_id']
        ]);
    }

    /**
     * Lấy thông tin sản phẩm theo ID.
     * @param int $product_id
     * @return array|false
     */
    public function getProductById($product_id)
    {
        if ($this->db) {
            $sql = "SELECT * FROM products WHERE product_id = :product_id";

            $params = ['product_id' => $product_id];
            $result = $this->db->getOne($sql, $params);

            return $result ?: false;
        } else {
            throw new Exception("Database connection is not available.");
        }
    }
}
?>