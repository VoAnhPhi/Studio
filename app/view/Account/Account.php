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
                <img class="list-product-img" src="img/user/<?php echo htmlspecialchars($image ?? 'avatar.png'); ?>"
                    alt="Image">
                <h2><?php echo htmlspecialchars($fullname); ?></h2>
                <p><?php echo htmlspecialchars($email); ?></p>
            </div>

            <div class="account-menu-group">
                <div class="account-item">
                    <h3>Tài khoản</h3>
                </div>
                <ul class="account-menu">
                    <li class="active"><a href="#">Thông tin cá nhân</a></li>
                    <li><a href="#">Đổi mật khẩu</a></li>
                    <li><a href="#">Thông tin thanh toán</a></li>
                    <li><a href="#">Xóa tài khoản</a></li>
                    <li><a href="index.php?page=logout">Đăng xuất</a></li>
                </ul>
            </div>

            <!-- Menu đơn hàng -->
            <a class="order-menu-group" href="index.php?page=order_page">
                <h3>Đơn hàng</h3>
                <img src="img/icon/file_text.svg" alt="Đơn hàng icon">
            </a>
        </div>

        <div class="account-content">
            <h1>THÔNG TIN CÁ NHÂN</h1>
            <hr class="custom-line">
            <?php if (!empty($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            
            <form class="profile-form" method="POST" action="index.php?page=updateAccount">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" id="fullname" name="fullname"
                            value="<?php echo htmlspecialchars($fullname); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Ngày sinh</label>
                        <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>"
                            required>
                        <span id="phone-error" style="color: red;"></span>
                        <?php if (!empty($_SESSION['error'])): ?>
                            <small class="text-danger"><?= $_SESSION['error']; ?></small>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <button type="submit" class="btn-update">Cập nhật</button>
            </form>
        </div>
        <div class="account-content">
            <h1>ĐỔI MẬT KHẨU</h1>
            <hr class="custom-line">

            <form class="password-form" method="POST" action="index.php?page=changePassword">
                <!-- Mật khẩu cũ -->
                <div class="form-group">
                    <label for="old-password">Mật khẩu cũ</label>
                    <div class="input-container">
                        <input type="password" id="old_password" name="old_password" placeholder="Nhập mật khẩu cũ"
                            required>
                        <img class="toggle-password" src="img/icon/eye.svg" alt="Mật khẩu icon">
                    </div>
                </div>

                <!-- Mật khẩu mới -->
                <div class="form-group">
                    <label for="new-password">Mật khẩu mới</label>
                    <div class="input-container">
                        <input type="password" id="new_password" name="new_password" placeholder="Nhập mật khẩu mới"
                            required>
                        <img class="toggle-password" src="img/icon/eye.svg" alt="Mật khẩu icon">
                    </div>
                </div>

                <!-- Nhập lại mật khẩu mới -->
                <div class="form-group">
                    <label for="confirm-password">Nhập lại mật khẩu mới</label>
                    <div class="input-container">
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Nhập lại mật khẩu mới" required>
                        <img class="toggle-password" src="img/icon/eye.svg" alt="Mật khẩu icon">
                    </div>
                </div>
                <?php if (!empty($_SESSION['error'])): ?>
                    <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <?php if (!empty($_SESSION['success'])): ?>
                    <div class="alert alert-success"><?= $_SESSION['success']; ?></div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
                <button type="submit" class="btn-update">Cập nhật</button>
            </form>
        </div>
        <div class="account-content">
            <h1>THÔNG TIN THANH TOÁN</h1>
            <hr class="custom-line">
            <form class="profile-form" method="POST" action="index.php?page=updatePayment">
                <span>Thẻ ATM/ Tài khoản ngân hàng</span>
                <div class="form-row">
                    <div class="form-group">
                        <label for="fullname">Tên chủ tài khoản</label>
                        <input type="text" id="fullname" class="input-account-owner" placeholder="Tên chủ tài khoản">
                    </div>
                    <div class="form-group">
                        <label for="account-number">Số tài khoản</label>
                        <input type="number" id="account-number" class="input-account-number"
                            placeholder="Số tài khoản">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="swift-code">Mã SWIFT</label>
                        <input type="munber" id="swift-code" class="input-swift-code" placeholder="Mã SWIFT">
                    </div>
                    <div class="form-group">
                        <label for="bank-name">Ngân hàng</label>
                        <input type="tel" id="bank-name" class="input-bank-name" placeholder="Ngân hàng">
                    </div>
                </div>

                <button type="submit" class="btn-update">Cập nhật</button>
            </form>
        </div>
        <div class="account-content">
            <h1>XÓA TÀI KHOẢN</h1>
            <hr class="custom-line">
            <form class="profile-form" method="POST" action="index.php?page=deleteAccount">
                <div class="form-row">
                    <?php if (!empty($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    <?php if (!empty($_SESSION['success'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['success']; ?></div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="fullname">Nhập Họ và Tên</label>
                        <input type="text" id="fullname" name="fullname" class="input-account-owner"
                            placeholder="Tên chủ tài khoản">
                    </div>
                    <div class="form-group">
                        <label for="dob">Ngày sinh</label>
                        <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($dob); ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Nhập email của bạn</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>"
                            required>
                    </div>
                </div>

                <button type="submit" class="btn-update">Xóa tài khoản</button>
            </form>
        </div>
    </div>
</div>