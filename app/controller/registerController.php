<?php
require_once 'app/modal/RegisterModal.php';

class RegisterController
{
    private $modal;

    public function __construct()
    {
        $this->modal = new RegisterModal();
    }

    /**
     * Hiển thị trang đăng ký.
     */
    public function viewRegister()
    {
        $errors = [];

        // Xử lý dữ liệu khi người dùng gửi form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = $this->handleRegister($_POST);
        }

        // Truyền dữ liệu qua view
        require_once 'app/view/RegisterModal/RegisterModal.php';
    }

    /**
     * Xử lý đăng ký người dùng.
     * @param array $data Dữ liệu từ form
     * @return array Danh sách lỗi nếu có
     */
    private function handleRegister($data)
    {
        $errors = $this->validateRegisterData($data);

        if (empty($errors)) {
            $isInserted = $this->modal->addUser([
                'name' => $data['name'],
                'date' => $data['date'],
                'phone' => $data['phone'],
                'password' => $data['password'],
            ]);

            if (!$isInserted) {
                $errors[] = "Đăng ký thất bại. Vui lòng thử lại.";
            } else {
                header("Location: index.php?page=loginModal");
                exit;
            }
        }

        return $errors;
    }

    /**
     * Kiểm tra tính hợp lệ của dữ liệu đăng ký.
     * @param array $data Dữ liệu từ form
     * @return array Danh sách lỗi
     */
    private function validateRegisterData($data)
    {
        $errors = [];

        // Kiểm tra họ và tên
        if (empty($data['name'])) {
            $errors[] = "Họ và tên không được để trống.";
        }

        // Kiểm tra ngày sinh
        if (empty($data['date'])) {
            $errors[] = "Ngày sinh không được để trống.";
        }

        // Kiểm tra số điện thoại
        if (empty($data['phone'])) {
            $errors[] = "Số điện thoại không được để trống.";
        } elseif (!preg_match('/^[0-9]{10}$/', $data['phone'])) {
            $errors[] = "Số điện thoại phải là 10 chữ số.";
        } elseif ($this->modal->checkPhoneExists($data['phone'])) {
            $errors[] = "Số điện thoại đã tồn tại. Vui lòng sử dụng số khác.";
        }

        // Kiểm tra mật khẩu
        if (empty($data['password'])) {
            $errors[] = "Mật khẩu không được để trống.";
        } elseif (strlen($data['password']) < 6) {
            $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
        }

        return $errors;
    }

}
