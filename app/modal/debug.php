<?php
require_once('app/modal/database.php');

$database = new Database();
$sql = "SELECT phone, password FROM user WHERE phone = ?";
$user = $database->getOne($sql, ['0397903621']);

if ($user) {
    echo "Kết quả truy vấn: ";
    print_r($user);
} else {
    echo "Không tìm thấy số điện thoại.";
}
?>