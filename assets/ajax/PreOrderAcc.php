<?php
        // Kết nối database và thông tin chung
        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
        $id = trim(addslashes(htmlspecialchars($_POST['id'])));
        
$fb = new Facebook\Facebook([
'app_id' => $app_id,
'app_secret' => $app_secret,
'default_graph_version' => 'v2.4',
'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : $default_access_token
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];  // set the permissions. 
$loginUrl = $helper->getLoginUrl(''.$_DOMAIN.'/login.php', $permissions);
        
        // check đặt cọc
        $iduser = $data_user['username'];
        $name = $data_user['name'];        
        
        $sql_get_pre = "SELECT * FROM `pre_order` WHERE id_post = '{$id}' AND `status` = '0' LIMIT 1";
        $check_pre = $db->fetch_assoc($sql_get_pre, 1); 
        
        // điều kiện hết hạn
        if($check_pre['time'] - time() <= 0){
        $db->query("UPDATE `pre_order` SET `status` = '2' WHERE `id_post` = '{$id}' LIMIT 1");// status    
        }
        
        $sql_get_data = "SELECT * FROM posts WHERE id_post = '{$id}' AND `status` = '0' LIMIT 1";
        $info = $db->fetch_assoc($sql_get_data, 1);  
        $day = addslashes(htmlspecialchars($_POST['days']));
        $arr_day = array(2,3,5,7);
         switch ($day) {
          case '2':// 5 ngày
            $phantram = 20;
            $time = time()+172800;
            $phantu = 0;
            break;
          case '3':// 7 ngày
            $phantram = 30;
            $time = time()+259200;   
            $phantu = 1;
            break;
          case '5':// 10 ngày
            $phantram = 40;
            $time = time()+432000;  
            $phantu = 2;
            break;
          case '7':// 14 ngày
            $phantram = 50;
            $time = time()+604800;  
            $phantu = 3;
            break;      
          default:
            $phantram = 100;
            $phantu = 4;
            break;
        }    
        $loaiacc = $info['type_account'];
        $price = round(($phantram / 100) * $info['price']); /// số tiền trả trước     
        // phần thông báo
        if (!$user) {
        echo json_encode(array('error' => "0", 'message' => "Vui lòng nhấn nút đăng nhập trước khi đặt cọc"));
        }else if ($db->num_rows($sql_get_pre) >= 1) {
        echo json_encode(array('error' => "0", 'message' => "Tài khoản này đã được đặt cọc trước."));
        }else if ($db->num_rows($sql_get_data) < 1) {
        echo json_encode(array('error' => "0", 'message' => "Tài khoản này không tồn tại hoặc đã được bán."));
        }else if ($data_site['status']==0) {
        echo json_encode(array('error' => "0", 'message' => "Trang web đang bảo trì"));
        }else if(!isset($arr_day[$phantu])){
        echo json_encode(array('error' => "0", 'message' => "CHÀO MỪNG BẠN ĐẾN VỚI VIỆT NAM :)"));          
        }else if ($data_user['cash'] < $price) {
        echo json_encode(array('error' => "0", 'message' => "Bạn không đủ tiền để trả trước."));
        }else{
        echo json_encode(array('error' => "1", 'message' => "Đặt cọc thành công, hãy quay lại trong thời gian sớm nhất để thanh toán")); 
        $db->query("UPDATE `accounts` SET `cash` = `cash` - '{$price}' WHERE `username` = '{$iduser}'");// trừ tiền trả trước
        $db->query("INSERT INTO `pre_order` (username,name,id_post,type_account,price,days,status,time,date) VALUES ('$iduser','$name','$id', '$loaiacc','$price','$day','0','$time','$date_current')");// lịch sử
        }
