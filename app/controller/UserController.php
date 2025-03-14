<?php
class UserController {
    private $user;
    function __construct(){
        $this->user = new UserModal();
    }
    function renderView($view, $data= null){
        $view = 'app/view/' . $view . '.php';
        require_once $view;
    }

    function viewSignin() {
        $this->renderView('signin');
    }

    function viewResign() {
        $this->renderView('resign');
    }

    function viewSignout() {
        $this->renderView('signout');
    }

    function check(){
        if(isset($_POST['sub'])){
            $user = $_POST['name'];
            $pass = $_POST['pass'];
            $result = $this->user->checkUser($user, $pass);
            if(is_array($result)){
                if($result['role'] == 1){
                    $_SESSION['admin'] = $result['admin'];
                    header('location:admin/index.php');
                } else {
                    $_SESSION['user'] = $result['name'];
                    header('location:index.php');
                }
            } else {
                echo '<script> alert("sai tên đăng nhập hoặc mật khẩu") </script>';
                echo '<script> location.href="index.php?page=signin"</script>';
            }
        }
    }

    function addUser(){
        if(isset($_POST['sub'])){
            $data = [];
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['pass'] = $_POST['pass'];
            $repass = $_POST['repass'];
            if($data['pass'] === $repass){
                $result = $this->user->checkEmail($data['email']);
                if($result){
                    echo '<script> alert("Email đã bị trùng hoặc có lỗi") </script>';
                    echo '<script> location.href="index.php?page=resign"</script>';
                } else {
                    $this->user->insertUser($data);
                    echo '<script> alert("Đăng kí thành công")</script>';
                    echo '<script> location.href="index.php?page=signin"</script>';
                }

            }else {
                echo '<script> alert("Đăng kí thất bại thử lại nhé") </script>';
                echo '<script> location.href="index.php?page=resign"</script>';
            }
        }        
    }
}


