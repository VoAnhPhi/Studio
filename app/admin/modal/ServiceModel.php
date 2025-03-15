<?php
require_once '../../app/admin/modal/database.php';

class ServiceModal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Lấy tất cả sản phẩm
     */
    public function getAllServices()
    {
        $sql = "SELECT * FROM services";
        return $this->db->getAll($sql);
    }

    /**
     * Thêm sản phẩm mới
     */
    public function addService($data)
    {
        $sql = "INSERT INTO services (name, price, description, created_at, availability, image, date, studio) 
                VALUES (:name, :price, :date, :description, :created_at, :availability, :image, :studio)";

        return $this->db->execute($sql, [
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':date' => $data['date'],
            ':description' => $data['description'],
            ':created_at' => $data['created_at'],
            ':studio' => $data['studio'],
            ':date' => $data['date'],
            ':availability' => $data['availability'],
            ':image' => $data['image']
            // ':additional_images' => $data['additional_images']
        ]);
    }

    /**
     * Xóa sản phẩm theo ID.
     * @param int $serviceId
     * @return bool
     */
    public function deleteService($serviceId)
    {
        $sql = "DELETE FROM services WHERE service_id = :service_id";
        $result = $this->db->execute($sql, ['service_id' => $serviceId]);

        // Kiểm tra kết quả xóa
        // var_dump($result); // Xem kết quả của quá trình xóa
        // return $result;
    }
    /**
     * Summary of updateProduct
     * @param mixed $serviceData
     * @return mixed
     */
    public function editService($serviceData)
    {
        // Prepare SQL query for updating the product
        $query = "UPDATE services SET 
              name = :name, 
              price = :price, 
              date = :date, 
              description = :description, 
              created_at = :created_at, 
              availability = :availability, 
              image = :image, 
              studio = :studio 
              WHERE service_id = :service_id";

        // Thực thi câu lệnh SQL với tham số
        return $this->db->execute($query, [
            ':name' => $serviceData['name'],
            ':price' => $serviceData['price'],
            ':created_at' => $serviceData['created_at'],
            ':description' => $serviceData['description'],
            ':date' => $serviceData['date'],
            ':availability' => $serviceData['availability'],
            ':image' => $serviceData['image'],
            ':studio' => $serviceData['studio'],
            ':service_id' => $serviceData['service_id']
        ]);
    }

    /**
     * Lấy thông tin sản phẩm theo ID.
     * @param int $service_id
     * @return array|false
     */
    public function getServiceById($service_id)
    {
        // Kiểm tra kết nối cơ sở dữ liệu
        if ($this->db) {
            // Câu lệnh SELECT lấy sản phẩm theo product_id
            $sql = "SELECT * FROM services WHERE service_id = :service_id";

            // Thực thi câu lệnh SQL với tham số truyền vào
            $params = ['service_id' => $service_id];
            $result = $this->db->getOne($sql, $params);

            // Trả về kết quả (sản phẩm hoặc false nếu không tìm thấy)
            return $result ?: false;
        } else {
            throw new Exception("Database connection is not available.");
        }
    }
}
?>