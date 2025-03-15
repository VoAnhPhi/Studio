<?php
require_once 'app/modal/UserModal.php';

class UserController
{
    private $userModal;

    public function __construct()
    {
        $this->userModal = new UserModal();
    }

    /**
     * Hiển thị trang thông tin tài khoản
     */
    public function viewAccount()
    {
        $error = null;
        if (!isset($_SESSION['user'])) {
            $error = "Vui lòng đăng nhập.";
            require 'app/view/Account/Account.php';
            return;
        }

        $userId = $_SESSION['user']['user_id'] ?? null;
        if (!$userId) {
            $error = "Session user_id không tồn tại.";
            require 'app/view/Account/Account.php';
            return;
        }

        $user = $this->userModal->getUserById($userId);
        if (!$user) {
            $error = "Không tìm thấy thông tin người dùng trong database. ID: $userId";
            require 'app/view/Account/Account.php';
            return;
        }

        $fullname = $user['name'];
        $email = $user['email'];
        $phone = $user['phone'];
        $dob = $user['date_of_birth'];
        $image = $user['image'];

        require 'app/view/Account/Account.php';
    }

    /**
     * Cập nhật thông tin người dùng
     */
    public function updateAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['user_id'] ?? null;

            if (!$userId) {
                $_SESSION['error'] = "Bạn cần đăng nhập để cập nhật thông tin.";
                header("Location: index.php?page=account_page");
                exit();
            }

            $data = [
                'name' => htmlspecialchars(trim($_POST['fullname'] ?? '')),
                'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
                'phone' => preg_replace('/[^0-9]/', '', $_POST['phone'] ?? ''),
                'date_of_birth' => $_POST['dob'] ?? '',
                'image' => $_POST['image'] ?? 'default.jpg'
            ];

            // Kiểm tra lỗi
            if (empty($data['name']) || !$data['email'] || !$data['phone']) {
                $_SESSION['error'] = "Dữ liệu không hợp lệ. Vui lòng kiểm tra lại.";
                header("Location: index.php?page=account_page");
                return;
            }

            if (strlen($data['phone']) !== 10) {
                $_SESSION['error'] = "Số điện thoại phải là 10 chữ số.";
                header("Location: index.php?page=account_page");
                return;
            }

            // Kiểm tra số điện thoại trùng lặp
            if ($this->userModal->isPhoneDuplicated($data['phone'], $userId)) {
                $_SESSION['error'] = "Số điện thoại đã được sử dụng.";
                header("Location: index.php?page=account_page");
                return;
            }

            // Cập nhật thông tin
            if ($this->userModal->updateUser($userId, $data)) {
                $_SESSION['success'] = "Cập nhật thông tin thành công.";
            } else {
                $_SESSION['error'] = "Cập nhật thông tin thất bại.";
            }

            header("Location: index.php?page=account_page");
            exit();
        }
    }

    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['user_id'] ?? null;

            if (!$userId) {
                $_SESSION['error'] = "Bạn cần đăng nhập để đổi mật khẩu.";
                header("Location: index.php?page=account_page");
                exit();
            }

            $oldPassword = $_POST['old_password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            // Kiểm tra lỗi nhập liệu
            if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
                $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin.";
                header("Location: index.php?page=account_page");
                return;
            }

            if (strlen($newPassword) < 6) {
                $_SESSION['error'] = "Mật khẩu mới phải có ít nhất 6 ký tự.";
                header("Location: index.php?page=change_password");
                return;
            }

            if ($newPassword !== $confirmPassword) {
                $_SESSION['error'] = "Mật khẩu mới và xác nhận mật khẩu không khớp.";
                header("Location: index.php?page=account_page");
                return;
            }

            $user = $this->userModal->getUserById($userId);
            if (!$user) {
                $_SESSION['error'] = "Không tìm thấy thông tin người dùng.";
                header("Location: index.php?page=account_page");
                return;
            }

            // Kiểm tra mật khẩu cũ
            if (!password_verify($oldPassword, $user['password'])) {
                $_SESSION['error'] = "Mật khẩu cũ không đúng.";
                header("Location: index.php?page=account_page");
                return;
            }

            // Mã hóa mật khẩu mới
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Cập nhật mật khẩu
            if ($this->userModal->updatePassword($userId, $hashedPassword)) {
                $_SESSION['success'] = "Đổi mật khẩu thành công.";
                header("Location: index.php?page=account_page");
                exit();
            } else {
                $_SESSION['error'] = "Đổi mật khẩu thất bại.";
                header("Location: index.php?page=account_page");
                return;
            }
        }
    }
    // update thông tin thanh toán
    // public function updatePayment()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $userId = $_SESSION['user']['user_id'];
    //         $data = [
    //             'account_owner' => htmlspecialchars($_POST['fullname']),
    //             'account_number' => preg_replace('/[^0-9]/', '', $_POST['account_number']),
    //             'swift_code' => htmlspecialchars($_POST['swift_code']),
    //             'bank_name' => htmlspecialchars($_POST['bank_name'])
    //         ];

    //         if ($this->userModal->updatePaymentInfo($userId, $data)) {
    //             header("Location: index.php?page=account");
    //             exit();
    //         } else {
    //             echo "Cập nhật thông tin thanh toán thất bại.";
    //         }
    //     }
    // }

    public function deleteAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['user_id'] ?? null;

            if (!$userId) {
                $_SESSION['error'] = "Bạn cần đăng nhập để xóa tài khoản.";
                header("Location: index.php?page=loginModal");
                exit();
            }

            // Lấy thông tin người dùng
            $user = $this->userModal->getUserById($userId);
            if (!$user) {
                $_SESSION['error'] = "Không tìm thấy người dùng.";
                header("Location: index.php?page=account_page");
                exit();
            }

            $confirmName = $_POST['fullname'] ?? ''; // Tên để xác nhận xóa tài khoản

            // Kiểm tra tên xác nhận có khớp với tên người dùng không
            if (empty($confirmName)) {
                $_SESSION['error'] = "Vui lòng nhập tên để xác nhận việc xóa tài khoản.";
                header("Location: index.php?page=account_page");
                return;
            }

            if ($confirmName !== $user['name']) {
                $_SESSION['error'] = "Tên xác nhận không khớp.";
                header("Location: index.php?page=account_page");
                return;
            }

            // Xóa tài khoản
            if ($this->userModal->deleteUser($userId)) {
                session_destroy(); // Xóa session sau khi tài khoản bị xóa
                $_SESSION['success'] = "Tài khoản đã được xóa thành công.";
                header("Location: index.php?page=loginModal");
                exit();
            } else {
                $_SESSION['error'] = "Xóa tài khoản thất bại.";
                header("Location: index.php?page=account_page");
                return;
            }
        }
    }
}
