<?php

class OrderController
{
    private $orderModal;

    public function __construct($orderModal)
    {
        $this->orderModal = $orderModal;
    }

    // Hiển thị danh sách đơn hàng của người dùng
    public function listOrders($userId)
    {
        $orders = $this->orderModal->getOrdersByUserId($userId);
        require_once "views/order_list.php"; // Gửi danh sách đơn hàng đến view
    }

    // Thêm đơn hàng mới
    public function addOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['user_id']; // ID người dùng hiện tại
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $totalPrice = $_POST['total_price'];
            $status = "Chưa thanh toán";

            if ($this->orderModal->createOrder($userId, $productId, $quantity, $totalPrice, $status)) {
                header("Location: index.php?page=orders");
                exit();
            } else {
                echo "Thêm đơn hàng thất bại.";
            }
        }
    }

    // Xóa đơn hàng
    public function deleteOrder()
    {
        if (isset($_GET['id'])) {
            $orderId = $_GET['id'];
            $userId = $_SESSION['user']['user_id'];

            if ($this->orderModal->deleteOrder($orderId, $userId)) {
                header("Location: index.php?page=orders");
                exit();
            } else {
                echo "Xóa đơn hàng thất bại.";
            }
        }
    }
}
