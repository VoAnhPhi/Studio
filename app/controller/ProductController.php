<?php
require_once 'app/modal/ProductModal.php';

class ProductController
{
    private $productModal;

    public function __construct()
    {
        // Khởi tạo ProductModal
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
     * Hiển thị danh sách sản phẩm
     * Hiển thị top sản phẩm
     */
    public function show()
    {
        $data['products'] = $this->productModal->getProducts();
        $data['topProduct'] = $this->productModal->getTopProducts();
        $this->renderView('Product/Product', $data);
    }

    /**
     * Hiển thị chi tiết sản phẩm
     * @param int $id
     */
    public function showProductsDetail($id)
    {
        $productList = $this->productModal->getProductById($id);
        $this->renderView('Detail/DetailProduct', ['productId' => $productList]);
    }
}
