<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem đã truyền $user_id từ GET hay POST
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];  
} else {
    echo "Không có user_id!";
    exit(); 
}

// Truy vấn thông tin người dùng từ cơ sở dữ liệu
$stmt = $conn->prepare("SELECT * FROM user WHERE user_id = ?");
if ($stmt === false) {
    die('Error preparing the SQL statement: ' . $conn->error);
}

$stmt->bind_param("i", $user_id); // "i" là kiểu dữ liệu integer
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra xem có dữ liệu người dùng hay không
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
    $fullname = $row['name'];  
    $email = $row['email'];
    $image = $row['image'];
} else {
    echo 'Không tìm thấy thông tin người dùng';
    exit(); // Dừng mã nếu không tìm thấy người dùng
}

// Tiến hành xử lý dữ liệu sau khi lấy thông tin
?>



<div class="container">
    <div class="breadcrumb">
        <a href="#">Trang chủ</a>
        <img src="img/icon/arrow-right-2.svg" alt="">
        <a href="#">Tài khoản</a>
        <img src="img/icon/arrow-right-2.svg" alt="">
        <span>Thông tin cá nhân</span>
    </div>
    <div class="account-container">
        <div class="account-sidebar">
            <div class="profile-info">
                <!-- Hiển thị ảnh đại diện nếu có, nếu không thì dùng ảnh mặc định -->
                <img class="list-product-img" src="img/<?php echo isset($image) ? $image : 'avatar.png'; ?>" alt="Image" class="profile-image">
                <!-- Hiển thị tên người dùng -->
                <h2><?php echo htmlspecialchars($fullname); ?></h2>
                <p><?php echo htmlspecialchars($email); ?></p>
            </div>

            <div class="account-menu-group">
                <div class="account-item">
                    <h3>Tài khoản</h3>
                    <img src="img/user.svg" alt="Tài khoản">
                </div>
                <ul class="account-menu">
                    <li class="active"><a href="#">Thông tin cá nhân</a></li>
                    <li><a href="#">Đổi mật khẩu</a></li>
                    <li><a href="#">Thông tin thanh toán</a></li>
                    <li><a href="#">Xóa tài khoản</a></li>
                    <li><a href="logout.php">Đăng xuất</a></li> <!-- Link đăng xuất -->
                </ul>
            </div>

            <!-- Menu đơn hàng -->
            <a class="order-menu-group" href="#">
                <h3>Đơn hàng</h3>
                <img src="img/icon/file_text.svg" alt="Đơn hàng icon">
            </a>
        </div>

        <div class="account-content">
<h1>THÔNG TIN CÁ NHÂN</h1>
            <hr class="custom-line">
            <form class="profile-form" method="POST" action="update_profile.php">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="dob">Ngày sinh</label>
                        <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" value="<?php echo htmlspecialchars($phone); ?>">
                    </div>
                </div>

                <button type="submit" class="btn-update">Cập nhật</button>
            </form>
        </div>
    </div>
</div>