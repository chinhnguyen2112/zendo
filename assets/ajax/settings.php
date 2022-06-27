<?php

 
// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
// Nếu đăng nhập
if ($user && $data_user['admin'] > 0) 
{
    $title_web = trim(htmlspecialchars(addslashes($_POST['title'])));
    $descr_web = trim(htmlspecialchars(addslashes($_POST['descr'])));
    $keywords_web = trim(htmlspecialchars(addslashes($_POST['keywords'])));
    $status = trim(htmlspecialchars(addslashes($_POST['status'])));
    $name_admin = trim(htmlspecialchars(addslashes($_POST['name_admin'])));
    $fb_admin = trim(htmlspecialchars(addslashes($_POST['fb_admin'])));
    $fanpage = trim(htmlspecialchars(addslashes($_POST['fanpage'])));
    $phone_admin = trim(htmlspecialchars(addslashes($_POST['phone_admin'])));
    $video_home = trim(htmlspecialchars(addslashes($_POST['video_home'])));
    $phone_admin = trim(htmlspecialchars(addslashes($_POST['phone_admin'])));
    $video_guide = trim(htmlspecialchars(addslashes($_POST['video_guide'])));
 
    $sql_info_web = "UPDATE settings SET 
        title = '$title_web',
        descr = '$descr_web',
        keywords = '$keywords_web',
        name_admin = '$name_admin',
        fb_admin = '$fb_admin',
        fanpage = '$fanpage',
        phone_admin = '$phone_admin',
        video_home = '$video_home',
        video_guide = '$video_guide',
        status= '$status'
    ";
    $db->query($sql_info_web);
    $db->close();
    echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "Lưu cài đặt thành công"));
}
else {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>