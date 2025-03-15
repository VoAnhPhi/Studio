<main class="mainwrapper">
    <div class="container">
        <div class="registerModal --modalRegister">
            <div class="close-btn">
                <img src="img/icon/close-icon.svg" alt="Close Icon">
            </div>
            <div class="registerModal__heading">
                <img src="img/logo-modal.svg" alt="Logo">
            </div>
            <div class="registerModal__content">
                <div class="content">
                    <p>Đăng ký</p>
                    <p class="description">GBOX luôn sẵn sàng với căn hộ đầy đủ tiện ích cho bạn!</p>
                </div>
                <form action="?page=registerModal" method="post" class="registerMainForm">
                    <?php
                    if (!empty($errors)) {
                        foreach ($errors as $msg) {
                            echo '<span class="error-msg">' . htmlspecialchars($msg) . '</span>';
                        }
                    }
                    ?>
                    <div class="user-name">
                        <label for="name">Họ và tên*</label>
                        <input type="text" id="name" name="name" placeholder="Nguyễn Văn A"
                            value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
                    </div>
                    <div class="birthday">
                        <label for="birthday">Ngày sinh*</label>
                        <div class="input-wrapper">
                            <input id="birthday" name="date" type="date"
                                value="<?= htmlspecialchars($_POST['date'] ?? '') ?>" required>
                            <span class="calendar-icon"><img src="img/icon/calender.svg" alt="Calendar Icon"></span>
                        </div>
                    </div>
                    <div class="phone">
                        <label for="phone">Số điện thoại*</label>
                        <input type="text" id="phone" name="phone" placeholder="VD: 0123456789"
                            value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" required>
                    </div>
                    <div class="password">
                        <label for="password">Nhập mật khẩu*</label>
                        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu của bạn ít nhất 6 ký tự" required>
                    </div>
                    <div class="select-privacy">
                        <input type="checkbox" id="privacy" required>
                        <label for="privacy"> Tôi đồng ý với Chính sách Bảo mật và Các Điều khoản.</label>
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