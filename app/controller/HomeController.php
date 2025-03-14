<?php
require_once 'app/modal/CategoryModal.php';
require_once 'app/modal/ProductModal.php';
class HomeController
{
    private $category;
    private $data = [];
    function __construct()
    {
        $this->category = new CategoryModal();
    }
    public function view($data)
    {
        if (is_array($data)) {
            require_once 'app/view/HomePage/main.php';
        } else {
            echo "Lỗi không điền đúng tham số á.";
        }
    }

    public function home()
    {
        $this->data['dsdm'] = $this->category->getCate();
        $this->view($this->data);
    }
}
?>