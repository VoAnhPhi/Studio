<?php
require_once '../../app/admin/modal/AdminCategoryModal.php';
require_once '../../app/admin/modal/AdminProductModal.php';

class AdminController
{
    private $productModel;
    private $categoryModel;
    public function __construct()
    {
        $this->productModel = new AdminProductModal();
        $this->categoryModel = new AdminCategoryModal();
    }
    public function dashboard()
    {
        $products = $this->productModel->getAllProducts();
        $categories = $this->categoryModel->getAllCategories();
        $data = [
            'products' => $products,
            'categories' => $categories
        ];
        $this->remderView('dashboard', $data);
    }
    public function homeproduct()
    {
        $products = $this->productModel->getAllProducts();
        $data = [
            'products' => $products,
        ];
        $this->renderView('adminproduct', $data);
    }
    public function categoryadminPro()
    {
        $categories = $this->categoryModel->getAllCategories();
        $data = [
            'categories' => $categories,
        ];
        $this->renderView('admincategory', $data);
    }

    private function renderView($view, $data = [])
    {
        extract($data);
        require_once BASE_PATH . "/app/admin/view/{$view}.php";
    }
    public function adminchart()
    {
        // Lấy tất cả dữ liệu từ bảng userstudiopass
        $dataUserStudioPass = $this->productModel->getAllDataUserStudioPass();

        // Chuyển đổi dữ liệu thành định dạng JSON
        $dataUserStudioPassJSON = json_encode($dataUserStudioPass);

        // Lấy tổng số người dùng
        $user = $this->productModel->getTotalUsers(); // Điều này phụ thuộc vào cách bạn đã triển khai trong model của mình

        // Truyền dữ liệu đến view
        // $this->renderView('adminchart', [
        //     'dataUserMoviePass' => $dataUserMoviePassJSON,
        //     'totalUsers' => $totalUsers,
        //     'totalMoviePass' => $totalMoviePass,
        //     'mostPurchasedMoviePass' => $mostPurchasedMoviePass
        // ]);
    }




    // echo "<pre>";
    // var_dump($dataUserMoviePassJSON);
    // echo "</pre>";
    public function listuser()
    {
        $this->renderView('listuser', $data = []);
    }
    public function orderpage()
    {
        $this->renderView('adminorder', $data = []);
    }
    public function revenuepage()
    {
        $this->renderView('adminrevenue', $data = []);
    }
    public function noticepage()
    {
        $this->renderView('adminnotice', $data = []);
    }
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $genre = $_POST['genre'];
            $img = $_FILES['img']['name'];
            $img_temp = $_FILES['img']['tmp_name'];
            $views = $_POST['views'];

            $upload_dir1 = "../../upload/img/" . $img;
            $upload_dir2 = "../../img/" . $img;
            if (move_uploaded_file($img_temp, $upload_dir1)) {
                if (copy($upload_dir1, $upload_dir2)) {
                    $this->productModel->addProduct($name, $genre, $img, $views);
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="index.php?action=dashboard";';
                    echo '</script>';
                } else {
                    echo "Lỗi khi sao chép file vào thư mục thứ hai!";
                }
            } else {
                echo "Lỗi khi upload file vào thư mục đầu tiên!";
            }
        } else {
            $categories = $this->categoryModel->getAllCategories();
            $this->renderView('add_product', ['categories' => $categories]);
        }
    }

    public function editProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_GET['movieID'];
            $name = $_POST['name'];
            $views = $_POST['views'];

            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                $img = $_FILES['img']['name'];
                $img_temp = $_FILES['img']['tmp_name'];

                $upload_dir1 = "../../upload/img/" . $img;
                $upload_dir2 = "../../img/" . $img;
                if (move_uploaded_file($img_temp, $upload_dir1)) {
                    if (!copy($upload_dir1, $upload_dir2)) {
                        echo "Lỗi khi sao chép file vào thư mục thứ hai!";
                    }
                } else {
                    echo "Lỗi khi upload file vào thư mục đầu tiên!";
                }
            } else {
                $product = $this->productModel->getProductById($id);
                $img = $product['img'];
            }

            $this->productModel->updateProduct($id, $name, $img, $views);
            echo '<script type="text/javascript">';
            echo 'window.location.href="index.php?action=dashboard";';
            echo '</script>';
        } else {
            $id = $_GET['movieID'];
            $product = $this->productModel->getProductById($id);
            $categories = $this->categoryModel->getAllCategories();
            $this->renderView('edit_product', ['product' => $product, 'categories' => $categories]);
        }
    }


    public function deleteProduct()
    {
        $id = $_GET['movieID'];
        $result = $this->productModel->deleteProduct($id);
        if ($result) {
            echo '<script type="text/javascript">';
            echo 'window.location.href="index.php?action=dashboard";';
            echo '</script>';
        } else {
            echo "Xóa sản phẩm không thành công!";
        }
    }


    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genre = $_POST['genre'];
            $this->categoryModel->addCategory($genre);
            echo '<script type="text/javascript">';
            echo 'window.location.href="index.php?action=dashboard";';
            echo '</script>';
        } else {
            $this->renderView('add_category');
        }
    }

    public function deleteCategory()
    {
        $id = $_GET['cateID'];
        $result = $this->categoryModel->deleteCategory($id);
        if ($result) {
            echo '<script type="text/javascript">';
            echo 'window.location.href="index.php?action=admincategory";';
            echo '</script>';
        } else {
            echo "Xóa danh mục không thành công!";
        }
    }

    public function editCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cateID'])) {
            $id = $_GET['cateID'];
            $category = $this->categoryModel->getCategoryById($id);
            if ($category) {
                $categories = $this->categoryModel->getAllCategories();
                $this->renderView('editCategory', ['category' => $category, 'categories' => $categories]);
            } else {
                echo "Category not found!";
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['cateID'];
            $genre = $_POST['genre'];
            $result = $this->categoryModel->updateCategory($id, $genre);
            if ($result) {
                header("Location: index.php?action=dashboard");
                exit();
            } else {
                echo "Update failed!";
            }
        } else {
            echo "Invalid request!";
        }
    }
}
