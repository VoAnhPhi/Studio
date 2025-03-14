<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studio";  // Thay thế bằng tên database của bạn


// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem người dùng có gửi form không
if (isset($_POST['submit'])) {
    // Lấy dữ liệu từ form và sử dụng mysqli_real_escape_string với kết nối $conn
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);  // Sử dụng mật khẩu không mã hóa nếu lưu trong database

    // Kiểm tra người dùng có tồn tại không
    $select = "SELECT * FROM user WHERE phone = '$phone' AND password = '$pass'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['id'];

        // Kiểm tra loại người dùng và chuyển hướng
        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location:?page=account_page');
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            header('location:?page=account_page');
        }
    } else {
        // Nếu không tìm thấy kết quả
        $error[] = 'Số điện thoại hoặc mật khẩu không chính xác';
    }
}
?>

<main class="mainwrapper">
    <div class="container">
        <div class="loginModal --modalRegister">
            <div class="close-btn">
                <img src="img/icon/close-icon.svg" alt="">
            </div>
            <div class="loginModal__heading">
                <img src="img/logo-modal.svg" alt="">
            </div>
            <div class="loginModal__content">
                <div class="content">
                    <p>Đăng nhập</p>
                    <p class="description">GBOX luôn sẵn sàng với căn hộ đầy đủ tiện ích cho bạn!</p>
                </div>
                <form action="" class="loginMainForm" method="post">
                    <?php
                    // Hiển thị thông báo lỗi nếu có
                    if (isset($error)) {
                        foreach ($error as $msg) {
                            echo '<span class="error-msg">' . $msg . '</span>';
                        }
                    }
                    ?>
                    <div class="user-name">
                        <label for="phone">Số điện thoại*</label>
                        <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="password">
                        <label for="password">Nhập mật khẩu*</label>
                        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="select-privacy">
                        <div class="hold-login">
                            <input type="checkbox" name="remember">
                            <label for="">Duy trì đăng nhập</label>
                        </div>
                        <div class="forget-password">
                            <label for="">Quên mật khẩu?</label>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit" name="submit">Đăng Nhập</button>
                        <div class="sub-btn">
                            <span>Bạn chưa có tài khoản</span>
                            <a href="?page=registerModal">Đăng ký</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>