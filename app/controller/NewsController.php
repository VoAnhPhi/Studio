<?php
require_once 'app/modal/NewsModal.php';

class NewsController
{
    private $newsCategories;
    private $newsModel;
    private $data = [];

    function __construct()
    {
        $this->newsCategories = new CategoryModal();
        $this->newsModel = new NewsModal();
    }

    public function getAllNews()
    {
        $this->data['news'] = $this->newsModel->getAllNews();
        $this->viewNews($this->data);
    }

    public function viewNewsDetail($newsId)
    {
        $newsDetail = $this->newsModel->getNewsById($newsId);
        if ($newsDetail) {
            $this->data['newsDetail'] = $newsDetail;
            require_once 'app/view/DetailNews/NewsDetail.php';
        } else {
            echo "Không tìm thấy tin tức!";
        }
    }

    public function viewNews($data)
    {
        if (is_array($data)) {
            require_once 'app/view/News/NewsPage.php';
        } else {
            echo "Lỗi: Tham số không hợp lệ!";
        }
    }

    public function news()
    {
        $this->getAllNews();
    }
}

?>