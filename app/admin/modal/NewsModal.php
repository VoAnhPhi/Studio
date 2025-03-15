<?php
require_once '../../app/admin/modal/database.php';

class NewsModal
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Lấy tất cả sản phẩm
     */
    public function getAllNews()
    {
        $sql = "SELECT * FROM post";
        return $this->db->getAll($sql);
    }
    /**
     * Lấy sản phẩm theo id
     */
    public function getNewsById($id)
    {
        require_once MODEL_PATH . 'NewsModal.php';
        $NewsModal = new NewsModal();
        $news = $NewsModal->getNewsById($id);

        if (!$news) {
            echo "Không tìm thấy tin tức.";
            return;
        }

        require_once VIEW_PATH . 'NewsAdmin/NewsUpdate.php';
    }
    /**
     * Thêm sản phẩm mới
     */
    public function addNews($data)
    {
        $sql = "INSERT INTO post (title, content, status,image,published_date) 
                VALUES (:title, :content, :status,:image, NOW())";

        return $this->db->execute($sql, [
            ':title' => $data['title'],
            ':content' => $data['content'],
            ':status' => $data['status'],
            ':image' => $data['image'],
        ]);
    }
    /**
     * Thêm sản phẩm mới
     */
    public function updateNews($data)
    {
        $sql = "UPDATE post 
        SET title = :title, 
            content = :content, 
            published_date = :published_date, 
            user_id = :user_id, 
            status = :status, 
            image = :image, 
            views = :views 
        WHERE post_id = :post_id";

        return $this->db->execute($sql, [
            ':post_id ' => $data['post_id'],
            ':title' => $data['title'],
            ':content' => $data['content'],
            ':published_date' => $data['published_date'],
            ':user_id ' => $data['user_id '],
            ':status' => $data['status'],
            ':image' => $data['image'],
            ':views' => $data['views']
        ]);
    }

    /**
     * Xóa sản phẩm theo ID.
     * @param int $productId
     * @return bool
     */
    public function deleteNewsModal($postId)
    {
        $sql = "DELETE FROM post WHERE post_id = :postId";
        $result = $this->db->execute($sql, ['postId' => $postId]);
        return $result;
    }
}
