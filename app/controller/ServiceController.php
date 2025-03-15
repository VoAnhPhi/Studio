<?php
require_once 'app/modal/ServiceModal.php';

class ServiceController
{
    private $servicemodal;

    public function __construct()
    {
        // Khởi tạo servcie
        $this->servicemodal = new ServiceModal();
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
        $data['TopService'] = $this->servicemodal->getTopService(); 
        $this->renderView('Service/Service', $data); 
    }
}
?>
