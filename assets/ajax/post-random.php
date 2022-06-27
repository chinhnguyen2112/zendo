<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$path = '../files/'; // patch lưu file

// Nếu đăng nhập và là admin
if ($user && $data_user['admin'] > 0) {

    $total_gem = count($_FILES["gem"]["name"]);
    $total_champs = count($_FILES["champs"]["name"]);
    $thumb = count($_FILES["thumb"]["name"]);
    $username = addslashes(htmlspecialchars($_POST['username']));
    $password = addslashes(htmlspecialchars($_POST['password']));
    
    $price_atm = $price*0.75;
    $skins_count = addslashes(htmlspecialchars($_POST['skins_count']));
    $skins = addslashes(htmlspecialchars($_POST['skins']));
    $champs_count = addslashes(htmlspecialchars($_POST['champs_count']));
    $champs = addslashes(htmlspecialchars($_POST['champs']));
    $rank = addslashes(htmlspecialchars($_POST['rank']));
    $frame = addslashes(htmlspecialchars($_POST['frame']));
    $ip_count = addslashes(htmlspecialchars($_POST['ip_count']));
    $note = addslashes(htmlspecialchars($_POST['note']));
    $type_post = addslashes(htmlspecialchars($_POST['type_post']));
     $type_account = addslashes(htmlspecialchars($_POST['type_account']));
     if( $type_account=="Liên Quân Mobile Random"){
         $price = 9000;
     }
     else if ($type_account=="Liên Quân Mobile Random Sơ Cấp"){
         $price = 20000;
     }
      else if ($type_account=="Liên Quân Mobile Random Trung Cấp"){
         $price = 50000;
     }
      else if ($type_account=="Liên Quân Mobile Random Cao Cấp"){
         $price = 100000;
     }
      else if ($type_account=="Liên Quân Mobile Random Siêu Cấp"){
         $price = 250000;
     }
     
      // điều kiện post
      if (empty($username)){
      echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Chưa Nhập đủ thông tin"));
      }else{

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
                        '14',
                        '0',
                        'null',
                        'null',
                        'null',
                        'null'
                    )";
        $db->query($sql_add_post); // insert vào csdl
        $id_new = $db->insert_id();
        // ảnh bảng ngọc
        for ($i = 0; $i < $total_gem; $i++) {
          if ($_FILES["gem"]["error"][$i] == 0) {
             $arr = explode(".", $_FILES["gem"]["name"][$i]);
             move_uploaded_file($_FILES["gem"]["tmp_name"][$i], $path."gem/".$id_new."-".($i + 1).".".end($arr));
          }
       }

        // ảnh tướng
        for ($i = 0; $i < $total_champs; $i++) {
          if ($_FILES["champs"]["error"][$i] == 0) {
             $arr = explode(".", $_FILES["champs"]["name"][$i]);
             move_uploaded_file($_FILES["champs"]["tmp_name"][$i], $path."post/".$id_new."-".($i + 1).".".end($arr));
          }
       } 
       
       // ảnh index
        if ($_FILES["thumb"]["error"] == 0) {
            $arr = explode(".", $_FILES["thumb"]["name"]);
            move_uploaded_file($_FILES["thumb"]["tmp_name"], $path."thumb/".$id_new.".".end($arr));
        }

        echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "Đăng tài khoản #$id_new thành công"));
        

      }

} else {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}