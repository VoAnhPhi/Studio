<?php
require_once('app/modal/database.php');

class LoginModal
{
    private $db;

    public function __construct()
    {
        // Khởi tạo kết nối đến cơ sở dữ liệu
        $this->db = new Database();
    }

    /**
     * Kiểm tra thông tin đăng nhập của người dùng
     * @param string $phone Số điện thoại
     * @param string $password Mật khẩu (đã hash)
     * @return array|false Trả về thông tin người dùng nếu đăng nhập thành công, ngược lại trả về false
     */
    public function checkLogin($phone, $password)
    {
        // Kiểm tra số điện thoại và mật khẩu trong database
        $sql = "SELECT * FROM user WHERE phone = ?";
        $user = $this->db->getOne($sql, [$phone]);
        if ($user) {
            // Debug dữ liệu lấy được
            echo "Dữ liệu từ DB: ";
            print_r($user);

            // Kiểm tra mật khẩu
            if (password_verify($password, $user['password'])) {
                return $user; // Đăng nhập thành công
            } else {
                echo "Mật khẩu không đúng.";
            }
        } else {
            echo "Số điện thoại không tồn tại.";
        }
        return false; // Đăng nhập thất bại
    }
}
