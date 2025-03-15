<?php
require_once "./base_path.php";
require_once '../../app/admin/modal/NewsModal.php';
class NewsController
{
    private $newsModal;
    public function __construct()
    {
        $this->newsModal = new NewsModal();
    }
    /**
     * Hiển thị danh sách các bài viết tin tức
     */
    public function listNews()
    {
        $news = $this->newsModal->getAllNews();

        if (empty($news)) {
            return [];
        } else {
            $data = ['news' => $news];
            $this->renderView('NewsAdmin', 'NewsManagement', $data);
        }
        return $news;
    }

    /**
     * Hiển thị form thêm mới tin tức
     */
    public function addNewsForm()
    {
        // Gọi view form thêm tin tức
        require_once VIEW_PATH . 'NewsAdmin/NewsAdd.php';
    }

    private function uploadImage($file)
    {
        if ($file['error'] === UPLOAD_ERR_OK) {
            $targetDir = "../../app/admin/lib/upload/";
            $fileName = uniqid() . "_" . basename($file['name']);
            $targetFilePath = $targetDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $fileName;
            }
        }
        return null;
    }

    /**
     * Xử lý thêm mới tin tức
     */
    public function addNews($data, $files)
    {

        // Validate input data
        $title = htmlspecialchars($data['title'] ?? '');
        $content = htmlspecialchars($data['content'] ?? '');
        $status = htmlspecialchars($data['status'] ?? 'draft');

        $mainImage = $this->uploadImage($files['mainImage']);
        // // Nếu bạn có thêm hình ảnh khác, bạn có thể xử lý ở đây

        if (!$mainImage) {
            echo "Lỗi khi tải lên ảnh chính!";
            exit;
        }

        // Prepare data to insert
        $newsData = [
            'title' => $title,
            'content' => $content,
            'status' => $status,
            'image' => $mainImage, // Gán hình ảnh đã tải lên
        ];

        // Gọi model để thêm tin tức mới
        require_once MODEL_PATH . 'NewsModal.php';
        $NewsModal = new NewsModal();
        $result = $NewsModal->addNews($newsData); // Truyền mảng dữ liệu

        if ($result) {
            header('Location: index.php?action=news');
            exit();
        } else {
            echo "Có lỗi xảy ra khi thêm tin tức!";
        }
    }

    /**
     * Hiển thị form chỉnh sửa tin tức
     */
    public function editNewsForm($id)
    {
        require_once MODEL_PATH . 'NewsModal.php';

        $NewsModal = new NewsModal();
        $news = $NewsModal->getNewsById($id);
        if ($news) {
            $this->renderView('NewsAdmin', 'NewsUpdate', ['news' => $news]);
        } else {
            echo "Không tìm thấy sản phẩm!";
        }
    }

    /**
     * Xử lý chỉnh sửa tin tức
     */
    public function editNews()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? 0;
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $status = $_POST['status'] ?? 'draft';
            $author = $_POST['author'] ?? '';

            require_once MODEL_PATH . 'NewsModal.php';
            $NewsModal = new NewsModal();
            $result = $NewsModal->updateNews($id, $title, $content, $status, $author);

            if ($result) {
                header('Location: index.php?action=news-manage');
                exit();
            } else {
                echo "Có lỗi xảy ra khi cập nhật tin tức!";
            }
        }
    }

    /**
     * Xóa tin tức
     */
    public function deleteNews()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnDeleteNews'])) {
            $newsId = $_POST['post_id'];
            $result = $this->newsModal->deleteNewsModal($newsId);
            if ($result) {
                echo "<script>alert('Tin tức đã được xóa thành công');</script>";
            } else {
                echo "<script>alert('Xóa tin tức không thành công');</script>";
            }
        }
    }

    public function renderView($folder, $view, $data = [])
    {
        extract($data);
        require_once("../../app/admin/view/{$folder}/{$view}.php");
    }
}
