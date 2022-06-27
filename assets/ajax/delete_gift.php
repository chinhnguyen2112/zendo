<?php


// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
// Nếu đăng nhập
if ($user && $data_user['admin'] > 0) {
    $id = $_GET['id'];
  $sql = "DELETE FROM gift WHERE id = '$id'";
    $db->query($sql);
    $db->close();
   
new Redirect("/admin/index.php/?act=gift"); 
} else {
new Redirect("/admin/index.php/?act=gift"); 
    
}
