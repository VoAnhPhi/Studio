<?php
require_once 'app/modal/ProductModal.php';

class CheckoutController
{
    private $productModal;

    public function __construct()
    {
        $this->productModal = new ProductModal();
    }

    /**
     * Hàm render view
     * @param string $view Tên file view
     * @param array $data Dữ liệu truyền vào view
     */
    private function renderView($view, $data = [])
    {
        $view = 'app/view/' . $view . '.php';
        if (file_exists($view)) {
            extract($data);
            require_once $view;
        } else {
            echo "View không tồn tại!";
        }
    }

    /**
     * Hiển thị trang thanh toán
     * @param int $id ID sản phẩm
     */
    public function showCheckoutPage($id)
    {
        $product = $this->productModal->getProductById($id);
        if ($product) {
            $this->renderView('CheckOutPage/CheckOutPage', ['product' => $product]);
        } else {
            echo 'Sản phẩm không tồn tại!';
        }
    }

    /**
     * Xử lý đặt phòng
     */
    public function processBooking()
    {
        session_start();

        // Kiểm tra người dùng đã đăng nhập
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?page=login");
            exit();
        }

        // Kiểm tra yêu cầu POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
            $rooms = $_POST['rooms'];
            $adults = $_POST['adults'];
            $children = $_POST['children'];
            $service = $_POST['service'];

            // Tính tổng tiền
            $totalPrice = $this->productModal->calculatePrice($checkin, $checkout, $rooms, $service);

            // Lưu thông tin đặt phòng vào session
            $_SESSION['booking_data'] = [
                'checkin' => $checkin,
                'checkout' => $checkout,
                'rooms' => $rooms,
                'adults' => $adults,
                'children' => $children,
                'service' => $service,
                'totalPrice' => $totalPrice,
            ];

            // Chuyển hướng đến trang thanh toán
            header("Location: index.php?page=checkout_page&id=" . $_POST['product_id']);
            exit();
        }
    }
}
