<?php
session_start();
ob_start();

require_once 'app/modal/database.php';
require_once 'app/controller/HomeController.php';
require_once 'app/controller/ProductController.php';
require_once 'app/controller/UserController.php';
require_once 'app/controller/CategoryController.php';
require_once 'app/controller/NewsController.php';
require_once 'app/view/Header/Header.php';

$data = [];

if (isset($_GET['page'])) {
    $page = $_GET['page'] ?? '';
    $id = $_GET['id'] ?? '';
    switch ($page) {
        case 'products':
            require_once 'app/view/Product/Product.php';
            break;
        case 'newspage':
            require_once 'app/view/News/NewsPage.php';
            break;
        case 'detail':
            $detail = new ProductController();
            $detail->detail();
            break;
        case 'genre':
            $genre = new UserController();
            $genre->viewMovieGenre('genre');
            break;
        case 'coming':
            $comingUp = new UserController();
            $comingUp->viewComingUp('coming');
            break;
        case 'tvshow':
            $tvshow = new UserController();
            $tvshow->viewTvShows('tvshow');
            break;

        case 'news':
            $news = new NewsController();
            if (!empty($id)) {
                $news->viewNewsDetail($id);
            } else {
                $news->news();
            }
            break;
        case 'detailProduct':
            require_once 'app/view/Detail/DetailProduct.php';
            break;
        case 'detailProduct1':
            require_once 'app/view/Detail/DetailProduct1.php';
            break;
        case 'detailProduct2':
            require_once 'app/view/Detail/DetailProduct2.php';
            break;
        case 'detailProduct3':
            require_once 'app/view/Detail/DetailProduct3.php';
            break;
        case 'detailProduct4':
            require_once 'app/view/Detail/DetailProduct4.php';
            break;
        case 'detailProduct5':
            require_once 'app/view/Detail/DetailProduct5.php';
            break;
        case 'detailProduct6':
            require_once 'app/view/Detail/DetailProduct6.php';
        case 'detailProduct?id=1':
            require_once 'app/view/Detail/DetailProductid=1.php';
            break;
        case 'detailProduct?id=2':
            require_once 'app/view/Detail/DetailProductid=2.php';
            break;
        case 'detailProduct?id=3':
            require_once 'app/view/Detail/DetailProductid=3.php';
            break;
        case 'detailProduct?id=4':
            require_once 'app/view/Detail/DetailProductid=4.php';
            break;
        case 'detailProduct?id=5':
            require_once 'app/view/Detail/DetailProductid=5.php';
            break;
        case 'service_page':
            require_once 'app/view/Service/Service.php';
            break;
        case 'detailNews':
            require_once 'app/view/DetailNews/NewsDetail.php';
            break;

        case 'account_page':
            require_once 'app/view/Account/Account.php';
            break;
        case 'Change_Password_page':
            require_once 'app/view/Account/Change_Password.php';
            break;
        case 'Payment_Information_page':
            require_once 'app/view/Account/Payment_Information.php';
            break;
        case 'Delete_Account_page':
            require_once 'app/view/Account/Delete_Account.php';
            break;

        case 'order_page':
            require_once 'app/view/Order/Order.php';
            break;
        case 'checkout_page':
            require_once 'app/view/CheckOutPage/CheckOutPage.php';
            break;
        case 'contact_page':
            require_once 'app/view/ContactPage/ContactPage.php';
            break;
        case 'product_page':
            require_once 'app/view/Product/Product.php';
            break;
        case 'categorymovie':
            $categorymovie = new CategoryController();
            $categorymovie->index();
            break;
        case 'category':
            $categoryController = new CategoryController();
            if ($id) {
                $categoryController->showMoviesByCategoryId($id);
            } else {
                $categoryController->index();
            }
            break;
        case 'contact':
            require_once 'app/view/ContactPage/ContactPage.php';
            break;
        case 'cart':
            require_once 'app/view/Cart/cart.php';
            break;
        case 'checkout':
            require_once 'app/view/CheckOutPage/CheckOutPage.php';
            break;
        case 'login':
            $userController = new UserController();
            $userController->viewSign();
            break;
        case 'signout':
            session_unset();
            header('location:index.php');
            break;
        case 'admin':
            if (!isset($_SESSION['userID']) || $_SESSION['role'] != 1) {
                header('Location: index.php');
                exit;
            }
            require_once 'public/admin/index.php';
            break;
        //Test Layout Modal
        case 'paymentSuccess':
            require_once 'app/view/PopUpModal/PaymentSuccess.php';
            break;
        case 'requiredeleteacc':
            require_once 'app/view/PopUpModal/RequireDeleteAcc.php';
            break;
        case 'deleteaccountsuccess':
            require_once 'app/view/PopUpModal/DeleteAccountSuccess.php';
            break;
        case 'registerModal':
            require_once 'app/view/RegisterModal/RegisterModal.php';
            break;
        case 'loginModal':
            require_once 'app/view/LoginModal/LoginModal.php';
            break;
        case 'forgetPassword':
            require_once 'app/view/ForgetPassword/ForgetPassword.php';
            break;
        case 'capchaAccess':
            require_once 'app/view/ForgetPassword/CapchaAccess.php';
            break;
        case 'resetPassword':
            require_once 'app/view/ForgetPassword/ResetPassword.php';
            break;
        case 'changePassSuccess':
            require_once 'app/view/ForgetPassword/ChangePassSuccess.php';
            break;
        default:
            $home = new HomeController();
            $home->home();
            break;
    }
} else {
    $home = new HomeController();
    $home->view($data);
}

require_once 'app/view/Footer/Footer.php';
