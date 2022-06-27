<?php
 
// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');

$input = new Input;
$id = (int)$input->input_post("id");

// Nếu đăng nhập
if ($user && $data_user['admin'] > 0) 
{
    $name = trim(htmlspecialchars(addslashes($_POST['name'])));
    $admin = trim(htmlspecialchars(addslashes($_POST['admin'])));
    $email = trim(htmlspecialchars(addslashes($_POST['email'])));
    $cash = trim(htmlspecialchars(addslashes($_POST['cash'])));
    $free_spin = trim(htmlspecialchars(addslashes($_POST['free_spin'])));

 
    $sql_info = "UPDATE accounts SET 
        name = '$name',
        admin = '$admin',
        email= '$email',
        cash= '$cash',
        luotquay_free = '$free_spin'
        WHERE `id` ='$id'";
    $db->query($sql_info);
    $db->close();
    
    echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "Thành công"));
}
else {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>