<?php
require_once 'app/modal/LoginModal.php';

class LoginController
{
    private $login;

    public function __construct()
    {
        $this->login = new LoginModal();
    }

    public function viewLogin()
    {
        $error_message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error_message = $this->isLogin();
        }

        require 'app/view/Account/LoginForm.php';
    }

    public function isLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phone = $_POST['phone'] ?? '';
            $password = $_POST['password'] ?? '';

            // Kiểm tra dữ liệu đầu vào
            if (empty($phone) || empty($password)) {
                return "Vui lòng nhập đầy đủ thông tin.";
            }

            // Kiểm tra thông tin đăng nhập
            $result = $this->login->checkLogin($phone, $password);

            if ($result) {
                // Lưu thông tin người dùng vào session (ngoại trừ mật khẩu)
                unset($result['password']); // Loại bỏ mật khẩu khỏi dữ liệu lưu trữ
                $_SESSION['user'] = $result;

                // Chuyển hướng sau khi đăng nhập thành công
                header("Location: index.php");
                exit();
            }

            // Đăng nhập thất bại
            return "Số điện thoại hoặc mật khẩu không chính xác.";
        }
    }
}
?>
