<?php
require_once 'app/modal/ProductModal.php';
class ProductController
{
    private $listProduct = [];
    private $data = [];

    public function __construct(){
        $productModal = new ProductModal();
        $this->listProduct = $productModal->getProducts();
    }
    public function renderView($data)
    {
        extract($data);
        require_once 'app/view/Detail/DetailProduct.php';
    }

}
?>