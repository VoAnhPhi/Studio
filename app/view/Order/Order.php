<body>
    <div class="container">
        <div class="breadcrumb">
            <a href="#">Trang chủ</a>
            <img src="img/icon/arrow-right-2.svg" alt="">
            <a href="#">Tài khoản</a>
            <img src="img/icon/arrow-right-2.svg" alt="">
            <span>Đơn hàng</span>
        </div>
        <div class="account-container">
            <div class="account-sidebar">
                <div class="profile-info">
                    <img class="list-product-img" src="img/user/<?php echo htmlspecialchars($image ?? 'avatar.png'); ?>"
                        alt="Image">
                    <h2><?php echo htmlspecialchars($fullname); ?></h2>
                    <p><?php echo htmlspecialchars($email); ?></p>
                </div>
                <div class="account-menu-group">
                    <div class="account-item">
                        <h3>Tài khoản</h3>
                        <img src="img/user.svg" alt="">
                    </div>
                    <a class="order-menu-group" href="#">
                        <h3>Đơn hàng</h3>
                        <img src="img/icon/file_text.svg" alt="Đơn hàng icon">
                    </a>
                    <ul class="account-menu">
                        <li class="active"><a href="#">Tất cả</a></li>
                        <li><a href="#">1 tuần trước</a></li>
                        <li><a href="#">1 tháng trước</a></li>
                    </ul>
                </div>
            </div>
            <div class="account-content">
                <h1>ĐƠN HÀNG</h1>
                <hr class="custom-line">
                <div class="studio-list">
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <div class="studio-item">
                                <h3>Đơn hàng #<?php echo htmlspecialchars($order['id']); ?></h3>
                                <p>Sản phẩm ID: <?php echo htmlspecialchars($order['product_id']); ?></p>
                                <p>Số lượng: <?php echo htmlspecialchars($order['quantity']); ?></p>
                                <p>Tổng tiền: <?php echo htmlspecialchars($order['total_price']); ?>đ</p>
                                <p
                                    class="payment-status <?php echo $order['status'] === 'Đã thanh toán' ? 'paid' : 'unpaid'; ?>">
                                    <?php echo htmlspecialchars($order['status']); ?>
                                </p>
                                <button onclick="location.href='index.php?page=order_delete&id=<?php echo $order['id']; ?>'"
                                    class="btn btn-delete">Xóa</button>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Không có đơn hàng nào.</p>
                    <?php endif; ?>
                </div>

                <!-- <div class="pagination">
                    <button class="pagination-arrow prev"><img src="img/icon/arrow-right-3.svg" alt=""></button>
                    <ul class="pagination-list">
                        <li class="pagination-item active">01</li>
                        <li class="pagination-item">02</li>
                        <li class="pagination-item">03</li>
                    </ul>
                    <button class="pagination-arrow next"><img src="img/icon/arrow-right-2.svg" alt=""></button>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>