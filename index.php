<?php
session_start();
ob_start();

require_once 'app/modal/database.php';
require_once 'app/controller/HomeController.php';
require_once 'app/controller/ProductController.php';
require_once 'app/controller/NewsController.php';
require_once 'app/controller/UserController.php';
// require_once 'app/controller/CategoryController.php';
require_once 'app/controller/NewsController.php';
require_once 'app/controller/registerController.php';
require_once 'app/controller/LoginController.php';
require_once 'app/controller/CheckOutController.php';
require_once 'app/controller/ServiceController.php';
require_once 'app/view/Header/Header.php';


$data = [];

$page = $_GET['page'] ?? '';
$id = $_GET['id'] ?? '';

function loadView($viewPath, $data = [])
{
    if (file_exists($viewPath)) {
        include $viewPath;
    } else {
        echo "Trang bạn yêu cầu không tồn tại!";
    }
}

switch ($page) {
    case 'product_page':
        $productController = new ProductController();
        $productController->show();
        break;

    case 'detailProduct':
        if (!empty($id)) {
            $productController = new ProductController();
            $productController->showProductsDetail($id);
        } else {
            echo 'Sản phẩm đã bị xóa';
        }
        break;

    case 'News_page':
        $newController = new NewsController();
        $newController->showNews();
        break;

    case 'detailNews':
        if (!empty($id)) {
            $newsController = new NewsController();
            $newsController->showDetail($id);
        } else {
            echo 'Tin tức này đã bị xóa';
        }
        break;

    // Trang mẫu tin tức
    case 'detailNews?id=0':
        loadView('app/view/DetailNews/CaseNews.php');
        break;

    // Trang dịch vụ
    case 'service_page':
        $service = new ServiceController();
        $service->show();
        break;

    // Trang tài khoản
    case 'account_page':
        $controller = new UserController();
        $controller->viewAccount();
        break;
    case 'updateAccount':
        $controller = new UserController();
        $controller->updateAccount();
        break;

    case 'changePassword':
        $controller = new UserController();
        $controller->changePassword();
        break;

    case 'updatePayment':
        $controller = new UserController();
        $controller->updatePayment();
        break;

    case 'deleteAccount':
        $controller = new UserController();
        $controller->deleteAccount();
        break;


    case 'logout':
        session_start();
        session_unset(); // Xóa tất cả các biến session
        session_destroy(); // Hủy session
        header("Location: index.php?page=loginModal"); // Chuyển hướng về trang đăng nhập
        // exit();
        break;

    // Trang đơn hàng
    case 'order_page':
        $orderModal = new OrderModal($db);
        $orderController = new OrderController($orderModal);
        $orderController->listOrders($_SESSION['user']['user_id']);
        break;

    case 'order_add':
        $orderModal = new OrderModal($db);
        $orderController = new OrderController($orderModal);
        $orderController->addOrder();
        break;

    case 'order_delete':
        $orderModal = new OrderModal($db);
        $orderController = new OrderController($orderModal);
        $orderController->deleteOrder();
        break;


    // Trang thanh toán
    case 'checkout_page':
        $id = $_GET['id'] ?? 0;
        $controller = new CheckoutController();
        $controller->showCheckoutPage($id);
        break;

    // case 'process_booking':
    //     $controller = new CheckoutController();
    //     $controller->processBooking();
    //     break;

    // Trang liên hệ
    case 'contact_page':
    case 'contact':
        loadView('app/view/ContactPage/ContactPage.php');
        break;

    // Modal đăng ký và đăng nhập
    case 'registerModal':
        $controller = new RegisterController();
        $controller->viewRegister();
        break;

    case 'loginModal':
        $userController = new LoginController();
        $userController->viewLogin();
        break;

    // Modal thanh toán và xóa tài khoản
    case 'paymentSuccess':
        loadView('app/view/PopUpModal/PaymentSuccess.php');
        break;

    case 'requiredeleteacc':
        loadView('app/view/PopUpModal/RequireDeleteAcc.php');
        break;

    case 'deleteaccountsuccess':
        loadView('app/view/PopUpModal/DeleteAccountSuccess.php');
        break;

    // Quên mật khẩu
    case 'forgetPassword':
        loadView('app/view/ForgetPassword/ForgetPassword.php');
        break;

    case 'capchaAccess':
        loadView('app/view/ForgetPassword/CapchaAccess.php');
        break;

    case 'resetPassword':
        loadView('app/view/ForgetPassword/ResetPassword.php');
        break;

    case 'changePassSuccess':
        loadView('app/view/ForgetPassword/ChangePassSuccess.php');
        break;

    // Trang chủ
    default:
        $home = new HomeController();
        $home->view($data);
        break;
}

require_once 'app/view/Footer/Footer.php';
