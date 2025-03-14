<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studio"; // Thay bằng tên database của bạn

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra khi nhấn nút submit
if (isset($_POST['submit'])) {
    // Lấy dữ liệu từ form và xử lý escape chuỗi
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT); // Mã hóa mật khẩu

    // Kiểm tra người dùng đã tồn tại
    $select = "SELECT * FROM user WHERE phone = '$phone'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        // Thêm thông báo lỗi nếu người dùng đã tồn tại
        $error[] = 'Người dùng đã tồn tại!';
    } else {
        // Chèn người dùng mới vào database
        $insert = "INSERT INTO user( name, date, phone, password) VALUES($name', '$date', '$phone', '$pass')";
        if (mysqli_query($conn, $insert)) {
            header('location: ?page=LoginModal');
            exit();
        } else {
            $error[] = 'Lỗi khi đăng ký tài khoản, vui lòng thử lại.';
        }
    }
}
?>


<main class="mainwrapper">
    <div class="container">
        <div class="registerModal --modalRegister">
            <div class="close-btn">
                <img src="img/icon/close-icon.svg" alt="">
            </div>
            <div class="registerModal__heading">
                <img src="img/logo-modal.svg" alt="">
            </div>
            <div class="registerModal__content">
                <div class="content">
                    <p>Đăng ký</p>
                    <p class="description">GBOX luôn sẵn sàng với căn hộ đầy đủ tiện ích cho bạn!</p>
                </div>
                <form action="" class="registerMainForm" method="post">
                    <?php
                    if (isset($error)) {
                        foreach ($error as $msg) {
                            echo '<span class="error-msg">' . $msg . '</span>';
                        }
                    }
                    ?>
                    <div class="user-name">
                        <label for="name">Họ và tên*</label>
                        <input type="text" id="name" name="name" placeholder="Nguyễn Văn A" required>
                    </div>
                    <div class="birthday">
                        <label for="birthday">Ngày sinh*</label>
                        <div class="input-wrapper">
                            <input id="birthday" name="date" type="date" required>
                            <span class="calendar-icon"><img src="img/icon/calender.svg" alt=""></span>
                        </div>
                    </div>
                    <div class="phone">
                        <label for="phone">Số điện thoại*</label>
                        <input type="text" id="phone" name="phone" placeholder="0123456789" required>
                    </div>
                    <div class="password">
                        <label for="password">Nhập mật khẩu*</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>
                    <div class="select-privacy">
                        <input type="checkbox" required>
                        <label for=""> Tôi đồng ý với Chính sách Bảo mật và Các Điều khoản.</label>
                    </div>
                    <div class="button">
                        <button type="submit" name="submit">Đăng Ký</button>
                        <div class="sub-btn">
                            <span>Bạn đã có tài khoản</span>
                            <a href="?page=loginModal">Đăng nhập</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>