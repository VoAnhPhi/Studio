<?php
require_once '../../app/admin/modal/AdminCategoryModal.php';
require_once '../../app/admin/modal/ProductModal.php';

class AdminController
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModal();
        $this->categoryModel = new AdminCategoryModal();
    }

    public function dashboard()
    {
        $data = [
            'products' => $this->productModel->getAllProducts(),
            'categories' => $this->categoryModel->getAllCategories()
        ];
        $this->renderView('DashboardAdmin', 'dashboard', $data);
    }

    public function manageProducts()
    {
        $data = ['products' => $this->productModel->getAllProducts()];
        $this->renderView('ProductAdmin', 'product_list', $data);
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $this->sanitizeInput($_POST['name']);
            $genre = $this->sanitizeInput($_POST['genre']);
            $views = (int) $this->sanitizeInput($_POST['views']);
            $img = $this->handleFileUpload($_FILES['img']);

            if ($img) {
                $this->productModel->addProduct($name, $genre, $img, $views);
                $this->redirect('index.php?action=dashboard');
            } else {
                $this->renderError('Lỗi tải lên hình ảnh.');
            }
        } else {
            $data = ['categories' => $this->categoryModel->getAllCategories()];
            $this->renderView('DashboardAdmin', 'add_product', $data);
        }
    }

    public function editProduct()
    {
        $id = (int) $_GET['productID'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $this->sanitizeInput($_POST['name']);
            $views = (int) $this->sanitizeInput($_POST['views']);

            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                $img = $this->handleFileUpload($_FILES['img']);
            } else {
                $img = $this->productModel->getProductById($id)['img'];
            }

            $this->productModel->editProduct($id, $name, $img, $views);
            $this->redirect('index.php?action=dashboard');
        } else {
            $data = [
                'product' => $this->productModel->getProductById($id),
                'categories' => $this->categoryModel->getAllCategories()
            ];
            $this->renderView('DashboardAdmin', 'update-product', $data);
        }
    }

    public function deleteProduct()
    {
        $id = (int) $_GET['productID'];
        if ($this->productModel->deleteProduct($id)) {
            $this->redirect('index.php?action=dashboard');
        } else {
            $this->renderError('Xóa sản phẩm không thành công.');
        }
    }

    private function renderView($folder, $view, $data = [])
    {
        extract($data);
        require_once("../../app/admin/view/{$folder}/{$view}.php");
    }

    private function redirect($url)
    {
        header("Location: $url");
        exit();
    }

    private function renderError($message)
    {
        echo "<script>alert('$message');</script>";
    }

    private function sanitizeInput($input)
    {
        return htmlspecialchars(trim($input));
    }

    private function handleFileUpload($file)
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileName = $file['name'];
        $fileTemp = $file['tmp_name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowedExtensions)) {
            return false;
        }

        $uploadPath = "../../upload/img/" . basename($fileName);
        if (move_uploaded_file($fileTemp, $uploadPath)) {
            return $fileName;
        }

        return false;
    }
}
