<?php
require_once '../../app/admin/modal/ServiceModel.php';
require_once '../../app/admin/controller/ImageUploader.php';

class ServiceController
{
    private $serviceModal;
    private $imageUploader;

    public function __construct()
    {
        $this->serviceModal = new ServiceModal();
        $this->imageUploader = new ImageUploader();
    }

    /**
     * Lấy danh sách sản phẩm
     */
    public function listServices()
    {
        $services = $this->serviceModal->getAllServices();

        if (empty($services)) {
            return [];
        } else {
            $data = ['services' => $services];
            $this->renderView('ServiceAdmin', 'Services', $data);
        }
        return $services;
    }

    /**
     * Thêm sản phẩm mới
     */
    public function addServices($data, $files)
    {
        $serviceData = $this->validateServiceData($data);

        $mainImage = $this->imageUploader->uploadSingleImage($files['mainImage']);
        if (!$mainImage) {
            echo "Lỗi khi tải lên ảnh chính!";
            exit;
        }
        $serviceData['image'] = $mainImage;

        if ($this->serviceModal->addServices($serviceData)) {
            header('Location: index.php?action=service');
            exit;
        } else {
            echo "Lỗi khi thêm danh mục vào cơ sở dữ liệu!";
        }
    }

    /**
     * Sửa sản phẩm
     */
    public function editServices($data, $files)
    {
        $serviceId = intval($data['service_id']);
        $serviceData = $this->validateServiceData($data);

        if (isset($files['mainImage']) && $files['mainImage']['error'] === UPLOAD_ERR_OK) {
            $mainImage = $this->imageUploader->uploadSingleImage($files['mainImage']);
            if ($mainImage) {
                $serviceData['image'] = $mainImage;
            }
        } else {
            $serviceData['image'] = $data['mainImage']; 
        }

        $serviceData['service_id'] = $serviceId;
        if ($this->serviceModal->editService($serviceData)) {
            header('Location: index.php?action=service');
            exit;
        } else {
            echo "Lỗi khi cập nhật danh mục!";
        }
    }

    /**
     * Xóa sản phẩm
     */
    public function deleteService()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnDeleteService'])) {
            $serviceId = $_POST['service_id'];
            if ($this->serviceModal->deleteService($serviceId)) {
                echo "<script>alert('Xóa danh mục không thành công');</script>";
            } else {
                echo "<script>alert('Danh mục đã được xóa thành công');</script>";
            }
        }
    }

    /**
     * Kiểm tra và xử lý dữ liệu sản phẩm
     */
    private function validateServiceData($data)
    {
        return [
            'name' => htmlspecialchars($data['serviceName']),
            'price' => floatval($data['servicePrice']),
            'studio' => htmlspecialchars($data['serviceStudio']),
            'date' => htmlspecialchars($data['date']),
            'created_at' => htmlspecialchars($data['created_at']),
            'availability' => htmlspecialchars($data['availability']),
        ];
    }

    /**
     * Lấy thông tin sản phẩm theo ID
     */
    public function getServiceById($serviceId)
    {
        return $this->serviceModal->getServiceById($serviceId);
    }

    /**
     * Hiển thị form sửa sản phẩm
     */
    public function editServiceForm($serviceId)
    {
        $services = $this->serviceModal->getServiceById($serviceId);
        if ($services) {
            $this->renderView('ServicesAdmin', 'EditServices', ['service' => $services], $data);
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
        $folder = ($folder === 'ServiceAdmin') ? 'ServicesAdmin' : $folder; 
        require_once("../../app/admin/view/{$folder}/{$view}.php");
    }
}
