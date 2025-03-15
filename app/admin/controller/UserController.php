<?php require_once '../../app/admin/modal/UserModal.php';

class UserController
{
    private $userModal;

    public function __construct()
    {
        $this->userModal = new UserModal();
    }

    /* Lấy danh sách người dùng */
    public function listUsers()
    {
        $users = $this->userModal->getAllUsers();
        // var_dump($users); // Check what is being returned
        return $users;
    }
    /* Cập nhật người dùng */
    public function editUser($userId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST; // Get all form data from POST
            $data['user_id'] = $userId; // Add the user ID to the data array

            // Handle the image file if uploaded
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                $imagePath = 'uploads/' . $_FILES['avatar']['name']; // Define the path to save the image
                move_uploaded_file($_FILES['avatar']['tmp_name'], $imagePath); // Move the uploaded image to the folder
                $data['image'] = $imagePath; // Add the image path to the data array
            }

            // Update the user information in the database
            $updateResult = $this->userModal->updateUser($data);

            if ($updateResult) {
                // Redirect to the list of users after a successful update
                header("Location: ?action=list-users");
                exit();
            } else {
                echo "Cập nhật thất bại.";
            }
        } else {
            // Fetch the user data for editing
            $user = $this->userModal->getUserById($userId);
            require 'view/User/UpdateUser.php'; // Load the form for editing user
        }
    }
}
