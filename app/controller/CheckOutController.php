<?php
require_once 'app/modal/CheckOutModal.php';

class CheckoutController
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Kết nối đến Database khi khởi tạo lớp
    }

    public function addOrder()
    {
        // Kiểm tra và lấy thông tin người dùng từ session
        if (!isset($_SESSION['objuser']['user_id'])) {
            // Xử lý nếu người dùng chưa đăng nhập (tuỳ vào ứng dụng của bạn)
            return false;
        }

        // Thêm vào bảng orders
        $sql = "INSERT INTO orders (`is_paid`, `payment_method`, `user_id`) 
                VALUES (0, :payment_method, :user_id)";
        $params = [
            ':payment_method' => 'Cash', // Hoặc lấy từ form POST nếu có
            ':user_id' => $_SESSION['objuser']['user_id']
        ];

        $orderId = $this->db->insert($sql, $params); // Gọi phương thức insert và lấy ID đơn hàng mới

        // Kiểm tra nếu giỏ hàng có sản phẩm
        if (isset($_SESSION['cart'])) {
            // Duyệt qua giỏ hàng và thêm chi tiết vào bảng orders_detail
            foreach ($_SESSION['cart'] as $id => $item) {
                $sqlDetail = "INSERT INTO orders_detail (`amount`, `order_id`, `product_id`) 
                              VALUES (:amount, :order_id, :product_id)";
                $paramsDetail = [
                    ':amount' => $item['price'],
                    ':order_id' => $orderId,
                    ':product_id' => $id
                ];
                $this->db->insert($sqlDetail, $paramsDetail); // Thực thi câu lệnh insert cho từng sản phẩm
            }
            // Xóa giỏ hàng sau khi thêm vào cơ sở dữ liệu
            unset($_SESSION['cart']);
        }

        return $orderId; // Trả về ID của đơn hàng mới tạo
    }
}
