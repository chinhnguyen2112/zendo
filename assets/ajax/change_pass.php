<?php
//error_reporting( E_ALL );
//ini_set('display_errors', 1);

// Kết nối database và thông tin chung//
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
$type = $_POST['type'];
$id = $data_user['id'];
if ($type == 1) {

    $oldpass = md5($_POST['oldpass']);
    $newpass = md5($_POST['newpass']);
    $id = $data_user['id'];
    if ($oldpass == $data_user['password']) {
        $sql = "UPDATE accounts SET 
    password = '$newpass'
    WHERE id = '$id'
";
        $db->query($sql);
        $db->close();
        $response = [
            'status' => 1,
            'mess' => 'Cập nhật thành công!',
        ];
    } else {
        $response = [
            'status' => 0,
            'mess' => 'Sai mật khẩu',
        ];
    }
} else if ($type == 2) {
    $id = $data_user['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $birthday = strtotime($_POST['birthday']);
    $address = $_POST['address'];
    $sex = $_POST['sex'];

    $url_img = $data_user['avatar'];
    if (isset($_FILES['file'])   && $_FILES['file']['name'] !== "") {
        $path = '../user/'; // patch lưu file
        $tmp_name = $_FILES["file"]["tmp_name"];
        $name = $_FILES["file"]["name"];
        $temp            = explode('.', $name);
        $name = 'user_'.$id.'.'.$temp[1];
        move_uploaded_file($_FILES["file"]["tmp_name"], $path . "$name");
        $url_img = 'assets/user/' . $name;
    }

    $sql = "UPDATE accounts SET 
            name = '$fullname',
            email = '$email' ,
            phone = '$phonenumber',
            birthday = '$birthday',
            address = '$address',
            sex = '$sex',
            avatar = '$url_img'
        WHERE id = '$id'
        ";


    $db->query($sql);
    $db->close();
    $response = [
        'status' => 1,
        'mess' => 'Cập nhật thành công!',
        'url' => $url_img
    ];
} else if ($type == 3) {
    $code = $_POST['code'];
    $date = time();
    if ($code == $data_user['username']) {
        $response = [
            'status' => 0,
            'mess' => 'Bạn không được nhập mã giới thiệu của chính bạn!. Vui lòng mời bạn bè đăng ký tài khoải tại Zendo Shop để có mã giới thiệu!',
        ];
    } else {
        $check_2 = "SELECT * FROM code_introduce  WHERE id_user = $id AND type = 0";
        $count_code = $db->num_rows($check_2);
        if ($count_code < 4) {
            $sql_check = "SELECT * FROM code_introduce  WHERE code_introduce ='$code'";
            $count_in_code = $db->num_rows($sql_check);
            $sql_check_code = "SELECT * FROM accounts  WHERE username ='$code' AND active = 1 AND source = '$_source'";
            $check_code = $db->num_rows($sql_check_code);
            if ($count_in_code == 0 && $check_code > 0) {
                $sql_code = "INSERT INTO code_introduce (id_user,code_introduce,created_at,type) VALUES (
                    '$id',
                    '$code',
                    '$date',
                    '1'
                 )";
                $db->query("UPDATE `accounts` SET   luotquay_free = luotquay_free + '1'  WHERE `id` = '$id'"); // cộng lượt quay
                $response = [
                    'status' => 1,
                    'mess' => 'Bạn được cộng 1 lượt quay vòng quay nhiệm vụ',
                ];
            } else {
                $sql_code = "INSERT INTO code_introduce (id_user,code_introduce,created_at,type) VALUES (
                '$id',
                '$code',
                '$date',
                '0'
                 )";
                $response = [
                    'status' => 2,
                    'mess' => 'Mã giới thiệu sai. Bạn còn ' . (4 - $count_code) . ' lần nhập sai!',
                ];
            }
        } elseif ($count_code == 4) {
            $sql_check = "SELECT * FROM code_introduce  WHERE code_introduce ='$code'";
            $count_in_code = $db->num_rows($sql_check);
            $sql_check_code = "SELECT * FROM accounts  WHERE username ='$code'";
            $check_code = $db->num_rows($sql_check_code);
            if ($count_in_code == 0 && $check_code > 0) {
                $sql_code = "INSERT INTO code_introduce (id_user,code_introduce,created_at,type) VALUES (
                    '$id',
                    '$code',
                    '$date',
                    '1'
                 )";
                $db->query("UPDATE `accounts` SET   luotquay_free = luotquay_free + '1'  WHERE `id` = '$id'"); // cộng lượt quay
                $response = [
                    'status' => 1,
                    'mess' => 'Bạn được cộng 1 lượt quay vòng quay nhiệm vụ',
                ];
            } else {
                $sql_code = "INSERT INTO code_introduce (id_user,code_introduce,created_at,type) VALUES (
                '$id',
                '$code',
                '$date', 
                '0'
                 )";
                $response = [
                    'status' => 2,
                    'mess' => 'Mã giới thiệu sai. Tính năng này đã bị khóa trên tài khoản cửa bạn. Liên hệ Fanpage để mở khóa!',
                ];
            }
        } else {
            $response = [
                'status' => 3,
                'mess' => 'Tính năng này đã bị khóa trên tài khoản của bạn. Liên hệ Fanpage để mở khóa!',
            ];
        }

        $db->query($sql_code);
    }
}

echo json_encode($response);
