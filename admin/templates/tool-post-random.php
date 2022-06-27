<?php
$select = new Info;
?>

<?php

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
$path = '../files/'; // patch lưu file

?>
<div>Nhập list acc theo định dạng ( tk|pass và mỗi dòng 1 là acc ) </div>
<form id="data" method="post">

    <div class="form-group">
        <div class="col-xs-12">
            <textarea type="text" name="list_acc" style="background: #c9c9c9;border: 1px solid;">Nhập List acc</textarea><br>
            <input type="radio" name="type_account" value="Liên Quân Mobile Random 9k"> Liên Quân Mobile Random 9k<br>
            <input type="radio" name="type_account" value="Liên Quân Mobile Random 20k"> Liên Quân Mobile Random 20k<br>
            <input type="radio" name="type_account" value="Liên Quân Mobile Random 50k"> Liên Quân Mobile Random 50k<br>
            <input type="radio" name="type_account" value="Liên Quân Mobile Random 100k"> Liên Quân Mobile Random 100k<br>
            <input type="radio" name="type_account" value="Liên Quân Mobile Random 200k"> Liên Quân Mobile Random 200k<br>
            <input type="radio" name="type_account" value="Liên Quân Mobile Random 500k"> Liên Quân Mobile Random 500k<br>
            <input type="submit" value="Submit">

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
            if ($type_account == "Liên Quân Mobile Random 9k") {
                $price = 9000;
                $check_page = 1;
            } else if ($type_account == "Liên Quân Mobile Random 20k") {
                $price = 20000;
                $check_page = 2;
            } else if ($type_account == "Liên Quân Mobile Random 50k") {
                $price = 50000;
                $check_page = 3;
            } else if ($type_account == "Liên Quân Mobile Random 100k") {
                $price = 100000;
                $check_page = 4;
            } else if ($type_account == "Liên Quân Mobile Random 200k") {
                $price = 200000;
                $check_page = 5;
            } else if ($type_account == "Liên Quân Mobile Random 500k") {
                $price = 500000;
                $check_page = 6;
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
