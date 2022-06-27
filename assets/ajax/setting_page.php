<?php


// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
// Nếu đăng nhập
if ($user && $data_user['admin'] > 0) {
    $page = trim(htmlspecialchars(addslashes($_POST['page'])));
    $des = trim(htmlspecialchars(addslashes($_POST['des'])));
    $des_pre = trim(htmlspecialchars(addslashes($_POST['des_pre'])));
    $meta_des = trim(htmlspecialchars(addslashes($_POST['meta_des'])));
    $meta_title = trim(htmlspecialchars(addslashes($_POST['meta_title'])));
    $url_img = "";
    if($page == 'home'){
        $des = "";
    $des_pre = "";
    }

    $sql_c = "UPDATE setting_random SET 
        des = '$des',
        avatar = '$url_img',
        des_pre = '$des_pre',
        meta_des = '$meta_des',
        meta_title = '$meta_title'
    WHERE page = '$page'
    ";
    $db->query($sql_c);
    $db->close();
    echo json_encode(array('status' => 1, 'title' => "Thành công", 'msg' => "Lưu cài đặt thành công"));
} else {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
