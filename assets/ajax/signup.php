
<?php
//error_reporting( E_ALL );
//ini_set('display_errors', 1);

// Kết nối database và thông tin chung//
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
$name = $_POST['name'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$type = $_POST['type'];

$date_check = date('H:i:s', time());
$str_time = time();
if ($type == 1) {
    $sql_1 = "SELECT * FROM accounts  WHERE username ='$name'";
    $sql_2 = "SELECT * FROM accounts  WHERE email ='$email'";
    if ($db->num_rows($sql_2)) {
        $response = [
            'status' => 2,
            'mess' => 'Email đã được sử dụng, vui lòng kiểm tra lại.'
        ];
        echo json_encode($response);
    } elseif ($db->num_rows($sql_1)) {
        $response = [
            'status' => 0,
            'mess' => 'Tên tài khoản đã tồn tại, vui lòng kiểm tra lại.'
        ];
        echo json_encode($response);
    } else {
        $code = rand(100000, 999999);
        $count = 1; // nếu không vào khung giờ vàng tặng 1 lượt
        if (($date_check >= '11:00:00' && $date_check < '12:00:00') || ($date_check > '20:00:00' && $date_check < '21:00:00')) { // check đăng ký có vào khung giờ vàng hay không
            $count = 3; // nếu vào khung giờ vàng tặng 3 lượt quay

        }
        $date = date('Y-m-d H-i-s', time());
        $sql_add_post = "INSERT INTO `accounts`(`username`, `name`, `password`, `email`,`code`, `cash`, `luotquay_free`, `block`, `admin`, `time`, `point`, `type_account`) VALUES ('$name','','$pass','$email','$code',0,'$count',0,0, '$date',0,1)";

        $db->query($sql_add_post); // insert vào csdl
        $id_new = $db->insert_id();
        if ($id_new > 0) {
            $sql_add_free = "INSERT INTO `history_luotquay_free`(`user_id`, `count`, `created_at`) VALUES ('$id_new','$count', '$str_time')";

            $db->query($sql_add_free); // insert vào bảng lượt quay free

            $session->send($name); //lưu session id fb
            $body_email = file_get_contents('https://zendo.vn/email_tmp/dangky.html');
            $body_email = str_replace('%name%', $name, $body_email);
            $body_email = str_replace('%email%', $email, $body_email);
            $body_email = str_replace('%code%', $code, $body_email);
            sendEmail($email, $name, 'Email thông báo đăng ký thành công tài khoản', $body_email);
            $db->close(); // Giải phóng
            $response = [
                'status' => 1,
                'mess' => 'Đăng ký thành công.'
            ];
            echo json_encode($response);
        }
    }
} else if ($type == 3) { // xác thực tài khoản
    $code = $_POST['code'];
    if (strlen($code) == 6) {
        $id = $data_user['id'];
        $sql_check_code =  "SELECT * FROM accounts  WHERE id ='$id' AND code = '$code'";
        if ($db->num_rows($sql_check_code)) {
            $db->query("UPDATE `accounts` SET   `active` = '1'  WHERE `id` = '$id'");
            $response = [
                'status' => 1,
                'mess' => 'Xác thực thành công!'
            ];
        } else {
            $response = [
                'status' => 0,
                'mess' => 'Mã xác thực không đúng vui lòng kiểm tra lại email !'
            ];
        }
    } else {
        $response = [
            'status' => 0,
            'mess' => 'Mã code không hợp lệ'
        ];
    }
    echo json_encode($response);
} else if ($type == 4) { // gửi lại mail xác thực
    $code = rand(100000, 999999);
    $id = $data_user['id'];
    $db->query("UPDATE `accounts` SET   `code` = '$code'  WHERE `id` = '$id'");
    $body_email = file_get_contents('https://zendo.vn/email_tmp/dangky.html');
    $body_email = str_replace('%name%', $data_user['username'], $body_email);
    $body_email = str_replace('%email%', $data_user['email'], $body_email);
    $body_email = str_replace('%code%', $code, $body_email);
    sendEmail($data_user['email'], $data_user['username'], 'Email thông báo đăng ký thành công tài khoản', $body_email);
    $response = [
        'status' => 1,
        'mess' => 'Xác thực thành công!'
    ];


    echo json_encode($response);
} else {
    $sql_check =  "SELECT * FROM accounts  WHERE username ='$name' AND password = '$pass' AND block = 0 AND source IS NULL ";
    if ($db->num_rows($sql_check)) {
        // nếu đăng nhập vào giờ vàng
        $data_u = $db->fetch_assoc($sql_check, 1);
        $id = $data_u['id'];
        $event = 0;
        $sql_his = "SELECT created_at,count FROM `history_luotquay_free`  WHERE `user_id` = $id AND `count` = 3 ORDER BY id DESC";
        $check_his = $db->fetch_assoc($sql_his, 1);
        if ($date_check >= '11:00:00' && $date_check < '12:00:00') { // nếu đang vào khung giờ vàng đâu tiên
            if (count($check_his) > 0) { // nếu đã có data
                $event = 0;
                if (date('d-m-Y', $check_his['created_at']) < date('d-m-Y', time())) { // nếu hôm nay chưa nhận
                    $event = 1; //  
                } elseif (date('d-m-Y', $check_his['created_at']) == date('d-m-Y', time())) { // nếu hôm nay đã nhận

                    if (date('H:i:s', $check_his['created_at']) < '12:00:00' && date('H:i:s', $check_his['created_at']) >= '11:00:00') { // nếu hôm nay đã nhận khung giờ vàng thứ nhất
                        $event = 0; // 
                    } else { // nếu chưa nhận vào khung giờ vàng đầu tiên
                        $event = 1; // 
                    }
                }
            } else { // nếu chưa có data
                $event = 1;
            }
        } elseif ($date_check >= '20:00:00' && $date_check < '21:00:00') { // nếu đang vào khung giờ vàng thứ 2
            if (count($check_his) > 0) { // nếu đã có data
                $event = 0;
                if (date('d-m-Y', $check_his['created_at']) < date('d-m-Y', time())) { // nếu hôm nay chưa nhận
                    $event = 1; //  
                } elseif (date('d-m-Y', $check_his['created_at']) == date('d-m-Y', time())) { // nếu hôm nay đã nhận

                    if (date('H:i:s', $check_his['created_at']) < '21:00:00' && date('H:i:s', $check_his['created_at']) >= '20:00:00') { // nếu hôm nay đã nhận khung giờ vàng thứ hai
                        $event = 0; // 
                    } else { // nếu chưa nhận vào khung giờ vàng  thứ 2
                        $event = 1; // 
                    }
                }
            } else { // nếu chưa có data
                $event = 1;
            }
        }
        if ($event == 1) {

            $sql_add_free = "INSERT INTO `history_luotquay_free`(`user_id`, `count`, `created_at`) VALUES ('$id',3, '$str_time')";
            $db->query($sql_add_free); // insert vào bảng lượt quay free
            $db->query("UPDATE `accounts` SET   `luotquay_free` = `luotquay_free` + '3'  WHERE `username` = '$name'");
        }
        $session->send($name); //lưu session id fb
        $response = [
            'status' => 1,
            'mess' => 'Đăng nhập thành công.'
        ];
        echo json_encode($response);
    } else {
        $response = [
            'status' => 0,
            'mess' => 'Sai tài khoản hoặc mật khẩu.'
        ];
        echo json_encode($response);
    }
}
