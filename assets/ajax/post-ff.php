aa<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
$path = '../files/'; // patch lưu file

// Nếu đăng nhập và là admin
if ($user && $data_user['admin'] > 0) {

    $total_gem = count($_FILES["gem"]["name"]);
    $total_champs = count($_FILES["champs"]["name"]);
    $thumb = count($_FILES["thumb"]["name"]);
    $username = addslashes(htmlspecialchars($_POST['username']));
    $password = addslashes(htmlspecialchars($_POST['password']));
    $skins_count = addslashes(htmlspecialchars($_POST['skins_count']));
    $skins = addslashes(htmlspecialchars($_POST['skins']));
    $champs_count = addslashes(htmlspecialchars($_POST['champs_count']));
    $champs = addslashes(htmlspecialchars($_POST['champs']));
    $rank = addslashes(htmlspecialchars($_POST['rank']));
    $frame = addslashes(htmlspecialchars($_POST['frame']));
    $ip_count = addslashes(htmlspecialchars($_POST['ip_count']));
    $note = addslashes(htmlspecialchars($_POST['note']));
    $price = trim($_POST['price']);
    $price_atm = $price*0.8;
    $pet = addslashes(htmlspecialchars($_POST['pet']));
    $code_2fa = addslashes(htmlspecialchars($_POST['code']));
    $token = $_SESSION["facebook_access_token"]; 
    $signup = addslashes(htmlspecialchars($_POST['signup']));
    $card_infinity = addslashes(htmlspecialchars($_POST['card_infinity']));
    $type_post = addslashes(htmlspecialchars($_POST['type_post']));

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
                        'Free Fire',
                        '$date_current',
                        '0',
                        '15',
                        '$pet',
                        '$code_2fa',
                        '$token',
                        '$signup',
                        '$card_infinity'
                    )";
        $db->query($sql_add_post); // insert vào csdl
        $id_new = $db->insert_id();
    

        // ảnh thông tin
        for ($i = 0; $i < $total_champs; $i++) {
            if ($_FILES["champs"]["error"][$i] == 0) {
                $arr = explode(".", $_FILES["champs"]["name"][$i]);
                resize_image_upload($_FILES["champs"]["tmp_name"][$i], $id_new . "-" . ($i + 1) . "." . end($arr), $id_new . "-" . ($i + 1) . ".jpg", 700, 700, 100, $type = "", $path . "post/");
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
        setcookie('url_sitemap', '/admin/?act=post_freefire', time() + 86400, '/');
        echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "Đăng tài khoản #$id_new thành công"));
        $db->close(); // Giải phóng

    }
} else {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
