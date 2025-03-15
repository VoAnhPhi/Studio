<?php
require_once 'app/controller/LoginController.php';

$loginController = new LoginController();
$error_message = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error_message = $loginController->isLogin();
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
                <div class="loginModal__content">
                    <div class="content">
                        <p>Đăng nhập</p>
                        <p class="description">GBOX luôn sẵn sàng với căn hộ đầy đủ tiện ích cho bạn!</p>
                    </div>
                    <form action="index.php?page=loginModal" class="loginMainForm" method="post">
                        <div class="user-name">
                            <label for="loginPhone">Số điện thoại*</label>
                            <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại"
                                value="<?= $error_message ?: '' ?>"
                                style="border-color: <?= $error_message ? 'red' : ' #D1D1D1' ?>; color: <?= $error_message ? 'red' : 'initial' ?>">
                        </div>
                        <div class="password">
                            <label for="password">Nhập mật khẩu*</label>
                            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu"
                                value="<?= $error_message ?: '' ?>"
                                style="border-color: <?= $error_message ? 'red' : ' #D1D1D1' ?>; color: <?= $error_message ? 'red' : 'initial' ?>">
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
    </div>
</main>