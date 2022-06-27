<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
$path = '../files/'; // patch lưu file

// Nếu đăng nhập và là admin
if ($user && $data_user['admin'] > 0) {

    $total_gem = 0;
    $total_champs = count($_FILES["data"]["name"]);
    $thumb = count($_FILES["thumb"]["name"]);
    $username = addslashes(htmlspecialchars($_POST['username']));
    $password = addslashes(htmlspecialchars($_POST['password']));
    $price = addslashes(htmlspecialchars($_POST['price']));
    $price_atm =  $price - (20 / 100 * $price);
    $skins_count = addslashes(htmlspecialchars($_POST['skins_count']));
    $skins = addslashes(htmlspecialchars($_POST['skins']));
    $champs_count = addslashes(htmlspecialchars($_POST['champs_count']));
    $champs = addslashes(htmlspecialchars($_POST['champs']));
    $rank = addslashes(htmlspecialchars($_POST['rank']));
    $frame = addslashes(htmlspecialchars($_POST['frame']));
    $ip_count = addslashes(htmlspecialchars($_POST['ip_count']));
    $note = addslashes(htmlspecialchars($_POST['note']));
    $type_post = addslashes(htmlspecialchars($_POST['type_post']));
    $source = addslashes(htmlspecialchars($_POST['source']));
    $type_account = 'Liên Minh Huyền Thoại';
    if ($source == 0) {
        $check_page = 18;
    } else if ($source == 1) {
        $check_page = 19;
    } else if ($source == 2) {
        $check_page = 20;
    } else if ($source == 3) {
        $check_page = 21;
    }
    // điều kiện post
    if (empty($username)) {
        echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Chưa Nhập đủ thông tin"));
    } else {

        $sql_add_post = "INSERT INTO posts VALUES (
                        '',
                        '$username',
                        '$password',
                        '$price',
                        '$price_atm',
                        '$total_gem',
                        '$skins_count',
                        '$skins',
                        '$champs_count', 
                        '$champs',
                        '$rank',
                        '$frame',
                        '$ip_count',
                        '$note',
                        '$type_post',
                        '$type_account',
                        '$date_current',
                        '0',
                        '$check_page',
                        '0',
                        'null',
                        'null',
                        '$source',
                        ''
                    )";
        $db->query($sql_add_post); // insert vào csdl
        $id_new = $db->insert_id();

        // ảnh tướng
        for ($i = 0; $i < $total_champs; $i++) {
            if ($_FILES["data"]["error"][$i] == 0) {
                $arr = explode(".", $_FILES["data"]["name"][$i]);
                resize_image_upload($_FILES["data"]["tmp_name"][$i], $id_new . "-" . ($i + 1) . "." . end($arr), $id_new . "-" . ($i + 1) . ".jpg", 700, 700, 100, $type = "", $path . "post/");
                $url_img = 'assets/files/post/' . $id_new . "-" . ($i + 1) . ".jpg";
                $sql_add_thumb = "INSERT INTO `thumb_acc`(`id_acc`, `img`) VALUES ('$id_new','$url_img')";
                $db->query($sql_add_thumb); // insert vào csdl
            }
        }
        // ảnh index
        if ($_FILES["thumb"]["error"] == 0) {
            $arr = explode(".", $_FILES["thumb"]["name"]);
            resize_image_upload($_FILES["thumb"]["tmp_name"], $id_new . "." . end($arr), $id_new . ".jpg", 375, 200, 100, $type = "index", $path . "thumb/");
        }
        setcookie('url_sitemap', '/admin/?act=post_lmht', time() + 86400, '/');
        echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "Đăng tài khoản #$id_new  thành công"));
        $db->close(); // Giải phóng


    }
} else {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
