<div class="container">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="#">Trang chủ</a>
        <img src="img/icon/arrow-right-2.svg" alt="">
        <a href="#">Tài khoản</a>
        <img src="img/icon/arrow-right-2.svg" alt="">
        <span>Đổi mật khẩu</span>
    </div>

    <div class="account-container">
        <!-- Sidebar -->
        <div class="account-sidebar">
            <div class="profile-info">
                <img src="img/banner/avatar.png" alt="Avatar" class="profile-avatar">
                <h2>Nguyen Phuong</h2>
                <p>dsun.agency@gmail.com</p>
            </div>

            <div class="account-menu-group">
                <div class="account-item">
                    <h3>Tài khoản</h3>
                    <img src="img/user.svg" alt="">
                </div>
                <ul class="account-menu">
                    <li><a href="#">Thông tin cá nhân</a></li>
                    <li class="active"><a href="#">Đổi mật khẩu</a></li>
                    <li><a href="#">Thông tin thanh toán</a></li>
                    <li><a href="#">Xóa tài khoản</a></li>
                    <li><a href="#">Đăng xuất</a></li>
                </ul>
            </div>

            <!-- Menu đơn hàng -->
            <a class="order-menu-group" href="#">
                <h3>Đơn hàng</h3>
                <img src="img/icon/file_text.svg" alt="Đơn hàng icon">
            </a>
        </div>

        <!-- Content: Đổi mật khẩu -->
        <div class="account-content">
            <h1>ĐỔI MẬT KHẨU</h1>
            <hr class="custom-line">
            <form class="password-form">
                <!-- Mật khẩu cũ -->
                <div class="form-group">
                    <label for="old-password">Mật khẩu cũ</label>
                    <div class="input-container">
                        <input type="password" id="old-password" placeholder="Nhập mật khẩu cũ" required>
                        <img class="toggle-password" src="img/icon/eye.svg" alt="Mật khẩu icon">
                    </div>
                </div>

                <!-- Mật khẩu mới -->
                <div class="form-group">
                    <label for="new-password">Mật khẩu mới</label>
                    <div class="input-container">
                        <input type="password" id="new-password" placeholder="Nhập mật khẩu mới" required>
                        <img class="toggle-password" src="img/icon/eye.svg" alt="Mật khẩu icon">
                    </div>
                </div>

                <!-- Nhập lại mật khẩu mới -->
                <div class="form-group">
                    <label for="confirm-password">Nhập lại mật khẩu mới</label>
                    <div class="input-container">
                        <input type="password" id="confirm-password" placeholder="Nhập lại mật khẩu mới" required>
                        <img class="toggle-password" src="img/icon/eye.svg" alt="Mật khẩu icon">
                    </div>
                </div>

                <button type="submit" class="btn-update">Cập nhật</button>
            </form>
        </div>
    </div>
</div>