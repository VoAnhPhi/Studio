<?php

class PageController
{
    /**
     * Hiển thị danh sách các trang
     */
    public function listPages()
    {
        // Gọi model để lấy dữ liệu
        require_once MODEL_PATH . 'PageModel.php';
        $pageModel = new PageModel();
        $pages = $pageModel->getAllPages();

        // Gọi view để hiển thị danh sách
        require_once VIEW_PATH . 'PageAdmin/PagesManagement.php';
    }

    /**
     * Hiển thị form thêm mới trang
     */
    public function addPageForm()
    {
        // Gọi view form thêm trang
        require_once VIEW_PATH . 'PageAdmin/AddPage.php';
    }

    /**
     * Xử lý thêm mới trang
     */
    public function addPage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $status = $_POST['status'] ?? 'draft';

            // Gọi model để thêm dữ liệu
            require_once MODEL_PATH . 'PageModel.php';
            $pageModel = new PageModel();
            $result = $pageModel->insertPage($title, $content, $status);

            if ($result) {
                header('Location: index.php?action=page-manage');
                exit();
            } else {
                echo "Có lỗi xảy ra khi thêm trang!";
            }
        }
    }

    /**
     * Hiển thị form chỉnh sửa trang
     */
    public function editPageForm($id)
    {
        // Gọi model để lấy dữ liệu trang
        require_once MODEL_PATH . 'PageModel.php';
        $pageModel = new PageModel();
        $page = $pageModel->getPageById($id);

        // Gọi view chỉnh sửa trang
        require_once VIEW_PATH . 'PageAdmin/EditPage.php';
    }

    /**
     * Xử lý chỉnh sửa trang
     */
    public function editPage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? 0;
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $status = $_POST['status'] ?? 'draft';

            // Gọi model để cập nhật dữ liệu
            require_once MODEL_PATH . 'PageModel.php';
            $pageModel = new PageModel();
            $result = $pageModel->updatePage($id, $title, $content, $status);

            if ($result) {
                header('Location: index.php?action=page-manage');
                exit();
            } else {
                echo "Có lỗi xảy ra khi cập nhật trang!";
            }
        }
    }

    /**
     * Xóa trang
     */
    public function deletePage($id)
    {
        // Gọi model để xóa dữ liệu
        require_once MODEL_PATH . 'PageModel.php';
        $pageModel = new PageModel();
        $result = $pageModel->deletePage($id);

        if ($result) {
            header('Location: index.php?action=page-manage');
            exit();
        } else {
            echo "Có lỗi xảy ra khi xóa trang!";
        }
    }
}
