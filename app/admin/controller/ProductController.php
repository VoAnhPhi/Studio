<?php
require_once '../../app/admin/modal/ProductModal.php';
require_once '../../app/admin/controller/ImageUploader.php';

class ProductController
{
    private $productModal;
    private $imageUploader;

    public function __construct()
    {
        $this->productModal = new ProductModal();
        $this->imageUploader = new ImageUploader();
    }

    /**
     * Lấy danh sách sản phẩm
     */
    public function listProducts()
    {
        $products = $this->productModal->getAllProducts();

        if (empty($products)) {
            return [];
        } else {
            $data = ['products' => $products];
            $this->renderView('ProductAdmin', 'Products', $data);
        }
        return $products;
    }

    /**
     * Thêm sản phẩm mới
     */
    public function addProduct($data, $files)
    {
        $productData = $this->validateProductData($data);
        $mainImage = $this->imageUploader->uploadSingleImage($files['mainImage']);
        if (!$mainImage) {
            echo "Lỗi khi tải lên ảnh chính!";
            exit;
        }
        $productData['image'] = $mainImage;

        if ($this->productModal->addProduct($productData)) {
            header('Location: index.php?action=product');
            exit;
        } else {
            echo "Lỗi khi thêm sản phẩm vào cơ sở dữ liệu!";
        }
    }

    /**
     * Sửa sản phẩm
     */
    public function editProduct($data, $files)
    {
        $productId = intval($data['product_id']);
        $productData = $this->validateProductData($data);

        // Handle image update
        if (isset($files['mainImage']) && $files['mainImage']['error'] === UPLOAD_ERR_OK) {
            $mainImage = $this->imageUploader->uploadSingleImage($files['mainImage']);
            if ($mainImage) {
                $productData['image'] = $mainImage;
            }
        } else {
            $productData['image'] = $data['mainImage']; 
        }

        // Update product
        $productData['product_id'] = $productId;
        if ($this->productModal->editProduct($productData)) {
            header('Location: index.php?action=product');
            exit;
        } else {
            echo "Lỗi khi cập nhật sản phẩm!";
        }
    }

    /**
     * Xóa sản phẩm
     */
    public function deleteProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnDeleteProduct'])) {
            $productId = $_POST['product_id'];
            if ($this->productModal->deleteProduct($productId)) {
                echo "<script>alert('Sản phẩm đã được xóa thành công');</script>";
            } else {
                echo "<script>alert('Xóa sản phẩm không thành công');</script>";
            }
        }
    }

    /**
     * Kiểm tra và xử lý dữ liệu sản phẩm
     */
    private function validateProductData($data)
    {
        return [
            'name' => htmlspecialchars($data['productName']),
            'price' => floatval($data['productPrice']),
            'category' => htmlspecialchars($data['productCategory']),
            'description' => htmlspecialchars($data['productDescription']),
            'location' => htmlspecialchars($data['locationTitle']),
            'availability' => htmlspecialchars($data['availability']),
        ];
    }

    /**
     * Lấy thông tin sản phẩm theo ID
     */
    public function getProductById($productId)
    {
        return $this->productModal->getProductById($productId);
    }

    /**
     * Hiển thị form sửa sản phẩm
     */
    public function editProductForm($productId)
    {
        $product = $this->productModal->getProductById($productId);
        if ($product) {
            $this->renderView('ProductAdmin', 'UpdateProduct', ['product' => $product]);
        } else {
            echo "Không tìm thấy sản phẩm!";
        }
    }

    /**
     * Render view.
     */
    public function renderView($folder, $view, $data = [])
    {
        extract($data);
        require_once("../../app/admin/view/{$folder}/{$view}.php");
    }
}
