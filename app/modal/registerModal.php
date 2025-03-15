<?php
require_once 'app/modal/database.php';

class RegisterModal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Thêm người dùng mới vào cơ sở dữ liệu.
     * @param array $data Dữ liệu người dùng
     * @return bool Thành công hay thất bại
     */
    public function addUser($data)
    {
        $sql = "INSERT INTO user (name, date_of_birth, phone, password) 
                VALUES (:name, :date_of_birth, :phone, :password)";
        $params = [
            ':name' => $data['name'],
            ':date_of_birth' => $data['date'],
            ':phone' => $data['phone'],
            ':password' => password_hash($data['password'], PASSWORD_BCRYPT),
        ];

        return $this->db->insert($sql, $params);
    }
    
    public function checkPhoneExists($phone)
    {
        $sql = "SELECT COUNT(*) as count FROM user WHERE phone = ?";
        $result = $this->db->getOne($sql, [$phone]);

        return $result['count'] > 0; 
    }

}
