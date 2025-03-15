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
                <form action="index.php?page=loginModal" class="loginMainForm" method="post">
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
                        <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="password">
                        <label for="password">Nhập mật khẩu*</label>
                        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
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