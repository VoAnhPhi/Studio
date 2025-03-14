<?php
// require_once '../../app/modal/database.php';
// require_once '../../config.php';
// require_once '../../app/admin/controller/AdminController.php';

// require_once '../../app/admin/view/sidebar.php';
//Cấu trúc dùng chung một Admin Controller cho All Module
// $adminController = new AdminController();
//Thay đổi cấu trúc urlHTTP resquest sang thành action Callback() module

//Default Sync Page Admin
require_once 'view/HeaderAdmin/Header.php';

if (isset($_GET['action'])) {
    $page = $_GET['action'] ?? '';
    switch ($page) {
        case 'dashboard':
            // $adminController->dashboard();
            require_once 'view/SidebarAdmin/Sidebar.php';
            require_once 'view/DashboardAdmin/Dashboard.php';
            break;
        case 'page-manage':
            require_once 'view/SidebarAdmin/Sidebar.php';
            require_once 'view/PageAdmin/PagesManagement.php';
            break;
        case 'news-manage':
            require_once 'view/SidebarAdmin/Sidebar.php';
            require_once 'view/NewsAdmin/NewsManagement.php';
            break;
        case 'add-news':
            require_once 'view/NewsAdmin/NewsAdd.php';
            break;
        case 'booking':
            require_once 'view/SidebarAdmin/Sidebar.php';
            require_once 'view/BookingAdmin/Booking.php';
            break;
        case 'product':
            // $adminController->homeproduct();
            require_once 'view/SidebarAdmin/Sidebar.php';
            require_once 'view/ProductAdmin/Products.php';
            break;
        case 'add-product':
            // $adminController->homeproduct();
            require_once 'view/ProductAdmin/AddProduct.php';
            break;
        case 'update-product':
            // $adminController->homeproduct();
            require_once 'view/ProductAdmin/UpdateProduct.php';
            break;
        case 'services':
            // $adminController->categoryadminPro();
            require_once 'view/SidebarAdmin/Sidebar.php';
            require_once 'view/ServicesAdmin/Services.php';
            break;
        case 'add-services':
            // $adminController->categoryadminPro();
            require_once 'view/ServicesAdmin/AddServices.php';
            break;
        case 'edit-services':
            // $adminController->categoryadminPro();
            require_once 'view/ServicesAdmin/EditServices.php';
            break;
        case 'user':
            require_once 'view/SidebarAdmin/Sidebar.php';
            require_once 'view/User/InfoUser.php';
            break;
        case 'edit-info-user':
            // $adminController->adminchart();
            require_once 'view/User/UpdateUser.php';
            break;
        case 'listuser':
            $adminController->listuser();
            break;
        case 'orderpage':
            $adminController->orderpage();
            break;
        case 'revenue':
            $adminController->revenuepage();
            break;
        case 'notice':
            $adminController->noticepage();
            break;
        case 'addproduct':
            $adminController->addProduct();
            break;
        case 'editProduct':
            $adminController->editProduct();
            break;
        case 'deleteProduct':
            $adminController->deleteProduct();
            break;
        case 'addCategory':
            $adminController->addCategory();
            break;
        case 'deleteCategory':
            $adminController->deleteCategory();
            break;
        case 'editCategory':
            $adminController->editCategory();
            break;
        case 'handle_form_submission':
            require_once '../../app/admin/view/handle_form_submission.php';
            break;
        default:
            // $adminController->dashboard();
            require_once 'view/SidebarAdmin/Sidebar.php';
            require_once 'view/DashboardAdmin/Dashboard.php';
            break;
    }
} else {
    require_once 'view/LoginPage/Login.php';
}
// require_once '../../app/admin/view/footer.php';
?>