<link rel="stylesheet" href="/css/zendo_css/zendo.css">

<div class="post_freefire_random">
  <ul class="nav nav-tabs nav-tabs-alt tit_lmht mb20 ml50" data-toggle="tabs">
    <li class="active">
      <a href="#lmht">FREE FIRE RANDOM</a>
    </li>
  </ul>

  <div class="mb20 ml50">Nhập list acc theo định dạng ( tk|pass và mỗi dòng 1 là acc ) </div>
  <form id="data" method="post">

    <div class="form-group padding_chung">
      <div class="col-xs-12">
        <textarea class="mb20 input_acc_random" type="text" name="list_acc" style="background: #c9c9c9;border: 1px solid;">Nhập List acc</textarea><br>
        <input class="mb10" type="radio" name="type_account" value="Free Fire Random 20k"> Free Fire Random 20k<br>
        <input class="mb10" type="radio" name="type_account" value="Free Fire Random 70k"> Free Fire Random 70k<br>
        <input class="mb10" type="radio" name="type_account" value="Free Fire Random 100k"> Free Fire Random 100k<br>
        <input class="mb10" type="radio" name="type_account" value="Free Fire Random 200k"> Free Fire Random 200k<br>
        <input class="mt20" type="submit" value="Submit">

      </div>


    </div>
</div>
<?php

if ($user && $data_user['admin'] > 0) {
  $list_acc = $_POST['list_acc'];

  $result = explode("\n", $list_acc);
  foreach ($result as $key => $value) {

    $array_list = explode('|', $value);

    $total_gem = 0;
    $total_champs = 0;
    $thumb = count($_FILES["thumb"]["name"]);
    $username = $array_list[0];

    $password = $array_list[1];

    $price_atm = $price * 0.75;
    $skins_count = 0;
    $skins = 0;
    $champs_count = 0;
    $champs = 0;
    $rank = 0;
    $frame = 0;
    $ip_count = 0;
    $note = "";
    $type_post = 0;
    $type_account = $_POST['type_account'];
    if ($type_account == "Free Fire Random 20k") {
      $price = 20000;
      $check_page = 7;
    } else if ($type_account == "Free Fire Random 70k") {
      $price = 70000;
      $check_page = 8;
    } else if ($type_account == "Free Fire Random 100k") {
      $price = 100000;
      $check_page = 9;
    } else if ($type_account == "Free Fire Random 200k") {
      $price = 200000;
      $check_page = 10;
    }
    if (empty($username) || empty($type_account)) {
      break;
    }



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
                            'null'
                        )";
    $db->query($sql_add_post); // insert vào csdl
    $id_new = $db->insert_id();
  }
} else {
  echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
