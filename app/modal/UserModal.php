<?php
require_once 'app/modal/database.php';

class UserModal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Lấy thông tin người dùng theo ID.
     * @param int $userId
     * @return array|false Thông tin người dùng hoặc false nếu không tồn tại
     */
    public function getUserById($userId)
    {
        $sql = "SELECT * FROM user WHERE user_id = ?";
        return $this->db->getOne($sql, [$userId]); // getOne trả về 1 dòng kết quả
    }

    public function updateUser($userId, $data)
    {
        $sql = "UPDATE user SET name = ?, email = ?, phone = ?, date_of_birth = ?, image = ? WHERE user_id = ?";
        return $this->db->update($sql, [
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['date_of_birth'],
            $data['image'],
            $userId
        ]);
    }
    public function isPhoneDuplicated($phone, $userId)
    {
        $sql = "SELECT COUNT(*) as count FROM user WHERE phone = ? AND user_id != ?";
        $result = $this->db->getOne($sql, [$phone, $userId]);
        return $result['count'] > 0;
    }

    public function updatePassword($userId, $hashedPassword)
    {
        $sql = "UPDATE user SET password = :password WHERE user_id = :user_id";
        $params = [
            ':password' => $hashedPassword,
            ':user_id' => $userId
        ];
        return $this->db->execute($sql, $params);
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM user WHERE user_id = ?";
        return $this->db->delete($sql, [$userId]);
    }
}
