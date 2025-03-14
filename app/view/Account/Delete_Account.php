<div class="container">
    <div class="breadcrumb">
        <a href="#">Trang chủ</a>
        <img src="img/icon/arrow-right-2.svg" alt="">
        <a href="#">Tài khoản</a>
        <img src="img/icon/arrow-right-2.svg" alt="">
        <span>Xóa tài khoản</span>
    </div>
    <div class="account-container">
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
                    <li><a href="#">Đổi mật khẩu</a></li>
                    <li><a href="#">Thông tin thanh toán</a></li>
                    <li class="active"><a href="#">Xóa tài khoản</a></li>
                    <li><a href="#">Đăng xuất</a></li>
                </ul>
            </div>

            <!-- Menu đơn hàng -->
            <a class="order-menu-group" href="#">
                <h3>Đơn hàng</h3>
                <img src="img/icon/file_text.svg" alt="Đơn hàng icon">
            </a>
        </div>

        <div class="account-content">
            <h1>XÓA TÀI KHOẢN</h1>
            <hr class="custom-line">
            <form class="profile-form">
                <span>Thẻ ATM/ Tài khoản ngân hàng</span>
                <div class="form-row">
                    <div class="form-group">
                        <label for="fullname">Tên chủ tài khoản</label>
                        <input type="text" id="fullname" class="input-account-owner" placeholder="Tên chủ tài khoản">
                    </div>
                    <div class="form-group">
                        <label for="dob">Số tài khoản</label>
                        <input type="number" id="account-number" class="input-account-number"
                            placeholder="Số tài khoản">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Mã SWIFT</label>
                        <input type="munber" id="swift-code" class="input-swift-code" placeholder="Mã SWIFT">
                    </div>
                    <div class="form-group">
                        <label for="phone">Ngân hàng</label>
                        <input type="tel" id="bank-name" class="input-bank-name" placeholder="Ngân hàng">
                    </div>
                </div>

                <button type="submit" class="btn-update">Xóa tài khoản</button>
            </form>

        </div>
    </div>
</div>