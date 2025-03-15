<?php
require_once 'controller/AdminController.php';
require_once 'controller/PageController.php';
require_once 'controller/NewsController.php';
require_once 'controller/BookingController.php';
require_once 'controller/ProductController.php';
require_once 'controller/ServiceController.php';
require_once 'controller/UserController.php';

$controllers = [
    'admin' => new AdminController(),
    'page' => new PageController(),
    'news' => new NewsController(),
    'booking' => new BookingController(),
    'product' => new ProductController(),
    'service' => new ServiceController(),
    'user' => new UserController(),
];

require_once 'view/HeaderAdmin/Header.php';

function renderSidebar($action)
{
    if (!in_array($action, ['login', 'add-news', 'add-product', 'editProduct'])) {
        require_once 'view/SidebarAdmin/Sidebar.php';
    }
}

// Chỗ này dùng để xử lý các action hành động (Effect từ Modal -> Controller -> Render Site)
function handleProductActions($action, $controller)
{
    switch ($action) {
        case 'product':
            $controller->listProducts();
            break;
        case 'add-product':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddProduct'])) {
                $controller->addProduct($_POST, $_FILES);
            } else {
                $controller->renderView('ProductAdmin', 'AddProduct');
            }
            break;
        case 'update-product':
            $controller->updateProduct();
            break;
        case 'editProduct':
            $controller->editProduct();
            break;
        case 'deleteProduct':
            $controller->deleteProduct();
            break;
        case 'addCategory':
            $controller->addCategory();
            break;
        case 'deleteCategory':
            $controller->deleteCategory();
            break;
        case 'editCategory':
            $controller->editCategory();
            break;
    }
}
function handleNewsActions($action, $controller)
{

    switch ($action) {
        case 'news':
            $controller->listNews();
            break;
        case 'add-news':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnAddNews'])) {
                $controller->addNews($_POST, $_FILES);
            } else {
                require_once VIEW_PATH . 'NewsAdmin/NewsAdd.php';
            }
            break;
        case 'update-news':
            if (isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];
                $controller->editNewsForm($post_id);
            } else {
                echo "Không tìm thấy ID sản phẩm!";
            }
            break;
        // case 'deleteNews':
        //     $controller->deleteNews();
        //     break;
        // case 'editProduct1':
        //     $controller->renderView('ProductAdmin', 'UpdateProduct');
        //     break;
    }
}

function handleAdminActions($action, $controller)
{
    switch ($action) {
        case 'dashboard':
            $controller->dashboard();
            break;
        case 'orderpage':
            $controller->orderPage();
            break;
        case 'revenue':
            $controller->revenuePage();
            break;
        case 'notice':
            $controller->noticePage();
            break;
    }
}

// Xử lý Logic + haystack các call eventloop + Callstack query_string
$action = $_GET['action'] ?? '';
renderSidebar($action);

// Xử lý các action cho từng controller
switch (true) {
    case str_contains($action, 'product'):
        handleProductActions($action, $controllers['product']);
        break;
    case str_contains($action, 'admin'):
        handleAdminActions($action, $controllers['admin']);
        break;
    case str_contains($action, 'news'):
        handleNewsActions($action, $controllers['news']);
        break;
    case $action === 'page-manage':
        $controllers['page']->managePages();
        break;
    // case $action === 'news-manage':
    //     $controllers['news']->manageNews();
    //     break;
    // case $action === 'add-news':
    //     $controllers['news']->addNews();
    //     break;
    case $action === 'booking':
        $controllers['booking']->manageBooking();
        break;
    case $action === 'services':
        $controllers['service']->listServices();
        break;
    case $action === 'add-services':
        $controllers['service']->addService();
        break;
    case $action === 'edit-services':
        $controllers['service']->editService();
        break;
    case $action === 'user':
        $controllers['user']->listUsers();
        require_once './view/User/InfoUser.php';
        break;
    case $action === 'edit-info-user':
        if (isset($_GET['id'])) {  // Sử dụng 'id' thay vì 'user_id'
            $userId = $_GET['id'];
            $controllers['user']->editUser($userId);  // Hiển thị form chỉnh sửa
        } else {
            echo "ID người dùng không hợp lệ!";
        }
        break;
    case $action === 'listuser':
        $controllers['user']->listUsers();
        break;
    default:
        require_once 'view/DashboardAdmin/dashboard.php';
        break;
}