<?php
// Kiểm tra và lấy dữ liệu từ session
$bookingData = $_SESSION['booking_data'] ?? null;
// if ($_GET) {
//     echo '<pre>';
//     var_dump($_GET); // Hiển thị tất cả các tham số GET từ URL
//     echo '</pre>';
// }
if ($bookingData) {
    echo "<h1>Thông tin đặt phòng</h1>";
    echo "<p>Ngày nhận phòng: " . htmlspecialchars($bookingData['checkin']) . "</p>";
    echo "<p>Ngày trả phòng: " . htmlspecialchars($bookingData['checkout']) . "</p>";
    echo "<p>Số phòng: " . htmlspecialchars($bookingData['rooms']) . "</p>";
    echo "<p>Người lớn: " . htmlspecialchars($bookingData['adults']) . "</p>";
    echo "<p>Trẻ nhỏ: " . htmlspecialchars($bookingData['children']) . "</p>";
    echo "<p>Dịch vụ: " . htmlspecialchars($bookingData['service']) . "</p>";
} else {
    // echo "Không có dữ liệu đặt phòng!";
}
?>
<main class="mainwrapper">
    <div class="controlCheckOutPage">
        <section class="titleCheckOut --ptop --title">
            <div class="container">
                <h2>Đặt nhà tiện ích của bạn</h2>
                <div class="primary__title-description">
                    <p>Hãy đảm bảo tất cả thông tin đều chính xác trước khi tiến hành thanh toán.</p>
                </div>
            </div>
        </section>
        <div class="container">
            <section class="primary --pbtm">
                <div class="primary__contact">
                    <h3 class="primary__contact-title">Thông tin liên hệ</h3>
                    <p class="primary__contact-description">Hãy điền chính xác tất cả thông tin để đảm bảo bạn nhận
                        được
                        Phiếu xác nhận đặt phòng (E-voucher) qua email của mình.</p>
                    <div class="primary__contact-form">
                        <form action="">
                            <div class="name">
                                <label for="name">Họ và tên</label>
                                <input type="text" name="name" required>
                            </div>
                            <div class="email">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="phone">
                                <label for="phone">Số điện thoại</label>
                                <div class="prefix">
                                    <select name="prefix" id="prefix">
                                        <option value="VN">+84</option>
                                    </select>
                                    <input type="text" name="phone" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="primary__utilities">
                    <h3 class="primary__utilities-title">Tiện ích bổ sung cho kỳ nghỉ của bạn</h3>
                    <div class="primary__utilities-detail">
                        <div class="checkBox">
                            <form action="">
                                <input type="checkbox">
                                <label for="">Bảo hiểm Du lịch Chubb - Hotel Protect</label>
                            </form>
                            <div class="descriptionInfo">
                                Bảo vệ kỳ nghỉ của Quý khách khỏi rủi ro bị hủy, mất đặt phòng khách sạn, và hơn thế
                                nữa.
                            </div>
                        </div>
                        <div class="listInformation">
                            <ul>
                                <li><img src="img/icon/stick_stroke.svg" alt=""> Bảo hiểm lên đến tối đa VND
                                    850,000/phòng/đêm cho Quyền lợi Hủy hoặc Gián đoạn
                                    Đặt phòng khách sạn.</li>
                                <li><img src="img/icon/stick_stroke.svg" alt=""> Bảo hiểm lên đến tối đa VND
                                    850,000/phòng/đêm cho Quyền lợi Đặt phòng khách sạn.
                                </li>
                                <li><img src="img/icon/stick_stroke.svg" alt=""> Bảo hiểm lên đến VND 210,000,000 cho
                                    Quyền lợi Tai nạn cá nhân.</li>
                                <li><img src="img/icon/stick_stroke.svg" alt=""> Bảo hiểm lên đến VND 20,000,000 cho
                                    Quyền lợi Mất hoặc hư hại hành lý, quần áo và
                                    vật dụng cá nhân.</li>
                            </ul>
                            <div class="listInformation-price">
                                <span>30.000 VNĐ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="primary__paymentMethod">
                    <h3 class="primary__paymentMethod-title">Phương thức thanh toán</h3>
                    <p class="primary__paymentMethod-description">
                        Sau khi hoàn tất thanh toán, mã xác nhận phòng sẽ được gửi ngay qua SMS và Email của bạn.
                    </p>
                    <div class="primary__paymentMethod-selectBox">

                        <div class="ATM">
                            <label>
                                <input type="radio" name="payment_method" value="ATM"> Thẻ ATM/ Tài khoản ngân hàng
                            </label>
                        </div>
                        <div class="QRPay">
                            <label>
                                <input type="radio" name="payment_method" value="QRPay"> QR Pay
                            </label>
                        </div>
                        <div class="Credit">
                            <label>
                                <input type="radio" name="payment_method" value="Credit"> Credit/Debit Card
                            </label>
                        </div>
                        <div class="Paypal">
                            <label>
                                <input type="radio" name="payment_method" value="Paypal"> Thanh toán Paypal
                            </label>
                        </div>

                    </div>
                </div>
                <div class="primary__couponCode">
                    <div class="primary__couponCode-labeling">
                        <h3 class="title"><img src="img/icon/sale_tag.svg" alt=""> Thêm mã giảm</h3>
                        <div class="addButton">
                            <a href="#">Thêm mã</a>
                        </div>
                    </div>
                    <div class="primary__couponCode-input">Enter coupon code or select available coupon(s)</div>
                </div>
                <div class="primary__detailPrice">
                    <div class="primary__detailPrice-heading">
                        <h3 class="title">Chi tiết giá</h3>
                    </div>
                    <div class="primary__detailPrice-alert">
                        <img src="img/icon/alert-circle.svg" alt="">
                        <p>
                            Thuế và phí là các khoản được Traveloka chuyển trả cho khách sạn. Mọi thắc mắc về thuế và
                            hóa
                            đơn, vui lòng tham khảo Điều khoản và Điều kiện của Traveloka để được giải đáp
                        </p>
                    </div>
                    <div class="primary__detailPrice-price">
                        <div class="title"><span>Giá
                                phòng</span><?= !empty($data['checkout']['price']) ? htmlspecialchars($data['checkout']['price']) : "0 đ"; ?>
                        </div>
                        <div class="detailRoom">(1x) Le Premier (1 đêm)</div>
                    </div>
                    <div class="primary__detailPrice-services"><span>Dịch vụ thuê phòng ở</span> 100.000 VND</div>
                    <div class="primary__detailPrice-taxs"><span>Thuế và phí</span> 31.990 VND</div>
                    <hr />
                    <div class="primary__detailPrice-total"><span>Tổng
                            giá</span><?= !empty($data['price']) ? htmlspecialchars($data['price']) : "131.99 đ"; ?>
                    </div>
                    <div class="primary__detailPrice-paymentBtn">
                        <a href="javascript:void(0)" id="payNowBtn">
                            Thanh toán ngay
                        </a>
                    </div>
                    <div class="primary__detailPrice-privacy">Bằng việc chấp nhận thanh toán, bạn đã đồng ý với
                        <a href="#">Điều khoản & Điều kiện</a>, <a href="#">Chính sách quyền riêng tư</a> và <a
                            href="#">Quy trình hoàn tiền</a> chỗ ở của GBOX.
                    </div>
                </div>
            </section>


            <section class="advertisement">
                <div class="advertisement__wrapper">
                    <div class="advertisement__wrapper-heading">
                        <img src="img/icon/thumbs-up.svg" alt="">
                        <p> Bạn có lựa chọn tuyệt vời cho kỳ nghỉ của mình. </p>
                    </div>
                    <div class="advertisement__wrapper-title"><?= htmlspecialchars($product['name']); ?></div>
                    <div class="advertisement__wrapper-descript"><?= htmlspecialchars($product['name']); ?></div>
                    <div class="advertisement__wrapper-rating">
                        <div class="star"><img src="img/icon/star.svg" alt=""></div>
                        <div class="point">5.0</div>
                        <div class="totalComment">(1103)</div>
                        <div class="recommend">Xếp hạng cao trong danh mục Vị trí</div>
                    </div>
                    <div class="advertisement__wrapper-imgDescript --imgDescript">
                        <img src="app/admin/lib/upload/<?= htmlspecialchars($product['image']); ?>" alt="">
                    </div>
                    <div class="advertisement__wrapper-pickup">
                        <div class="pick-room">
                            <span class="title">Nhận phòng</span>
                            <span class="calender">
                                <?= !empty($bookingData['checkin']) ? htmlspecialchars($bookingData['checkin']) : "Không có ngày nhận phòng"; ?>
                            </span>
                            <span class="timePick">Từ 14:00</span>
                        </div>
                        <div class="duringTime">
                            <span>1 đêm</span>
                            <span class="crossLine"><img src="img/icon/duringLine.svg" alt=""></span>
                        </div>
                        <div class="checkout">
                            <span class="title">Trả phòng</span>
                            <span class="calender">
                                <?= !empty($bookingData['checkin']) ? htmlspecialchars($bookingData['checkin']) : "Không có ngày trả phòng"; ?>
                            </span>
                            <span class="timeCheckOut">Trước 12:00</span>
                        </div>
                    </div>
                    <div class="advertisement__wrapper-infoRoom">
                        <div class="title"><span class="quality">(1x)</span>
                            <?= !empty($bookingData['service']) ? htmlspecialchars($bookingData['service']) : "1 phòng"; ?>
                        </div>
                        <div class="capacity"><img src="img/icon/users.svg" alt=""> <span>Không giới hạn</span></div>
                        <div class="internet"><img src="img/icon/internet.svg" alt=""><span>Miễn phí</span></div>
                        <div class="ruleSmoke"><img src="img/icon/smoking-ban.svg" alt=""><span>Không được hút
                                thuốc</span></div>
                    </div>
                    <hr />
                    <div class="advertisement__wrapper-footing">
                        <div class="wrapperRight">
                            <div class="title">Tổng giá phòng</div>
                            <span class="mainPrice"></span>
                        </div>
                        <div class="wrapperLeft">
                            <div class="description"><span
                                    class="qualityRoom"><?= htmlspecialchars($bookingData['rooms']); ?></span> phòng,
                                <span class="spendDay">1</span> đêm
                            </div>
                            <span class="lastPrice"><?= number_format($bookingData['totalPrice']); ?></span>
                        </div>
                    </div>
                </div>
                <div class="advertisement__privacy">
                    <div class="advertisement__privacy-title">Chính sách hủy và đổi lịch</div>
                    <div class="advertisement__privacy-role">Bạn có được sự linh hoạt cao nhất với phòng này!</div>
                    <div class="advertisement__privacy-denyRoom"><img src="img/icon/check_circle.svg" alt=""> Miễn phí
                        hủy phòng trước 03-thg 12-2024</div>
                    <div class="advertisement__privacy-changeCalender"><img src="img/icon/check_circle.svg" alt="">Có
                        thể đổi lịch trước 03-thg 12-2024</div>
                    <div class="advertisement__privacy-button">
                        <a href="#">Xem chi tiết </a>
                    </div>
                </div>
            </section>

        </div>

    </div>

</main>
<script>
    document.getElementById('payNowBtn').addEventListener('click', function () {
        // Hiển thị thông báo
        alert('Đơn hàng của bạn đang được xử lý...');

        // Dữ liệu đơn hàng (giả lập)
        const orderData = {
            orderId: 'ORD123456',
            customerName: 'Nguyen Van A',
            totalPrice: 500000,
            items: [
                { name: 'Sản phẩm A', quantity: 1, price: 200000 },
                { name: 'Sản phẩm B', quantity: 2, price: 150000 },
            ],
        };

        // Gửi dữ liệu lên server
        fetch('/api/orders', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(orderData),
        })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Có lỗi xảy ra khi xử lý đơn hàng.');
                }
            })
            .then(data => {
                console.log('Đơn hàng đã được lưu:', data);
                // Thông báo thành công (nếu cần)
                alert('Đơn hàng đã được gửi thành công!');
            })
            .catch(error => {
                console.error('Lỗi:', error);
                alert('Không thể xử lý đơn hàng. Vui lòng thử lại!');
            });
    });
</script>