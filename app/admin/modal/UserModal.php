 <?php
    require_once 'database.php';
    class UserModal
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
        /*Lấy tất cả người dùng*/
        public function getAllUsers()
        {
            $sql = "SELECT * FROM user";
            return $this->db->getAll($sql);
        }
        public function getUserById($userId)
        {
            $sql = "SELECT * FROM user WHERE user_id = :user_id";
            return $this->db->getOne($sql, ['user_id' => $userId]);
        }


        /* Cập nhật thông tin người dùng */
        public function updateUser($data)
        {
            $sql = "UPDATE user SET 
                        name = :name,
                        username = :username,
                        email = :email,
                        password = :password,
                        phone = :phone,
                        address = :address,
                        registration_date = :registration_date,
                        date_of_birth = :date_of_birth,
                        user_type = :user_type,
                        rating = :rating,
                        image = :image
                    WHERE user_id = :user_id";

            return $this->db->execute($sql, $data);
        }
    }
