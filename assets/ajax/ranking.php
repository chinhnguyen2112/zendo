<?php
// Kết nối database và thông tin chung//
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
$user_id = $data_user['id'];
$type_rank = $_POST['type_rank'];
$star_now = $_POST['star_now'];
$star_end = $_POST['star_end'];
$time_start = strtotime($_POST['time_start']);
$time_end = strtotime($_POST['time_end']);
$champ = $_POST['champ'];
$flash_play = $_POST['flash_play'];
$dual_booster = $_POST['dual_booster'];
$name_booster = $_POST['name_booster'];
$your_account = $_POST['your_account'];
$your_password = $_POST['your_password'];
$style_account = $_POST['style_account'];
$price = $_POST['price'];
$pay = $data_user['cash'] - $price;
$id = $data_user['id'];
$created_at = time();
$arr_rank = rank_arr();

$rank_now = $arr_rank[$_POST['rank_now']];
$rank_end = $arr_rank[$_POST['rank_end']];

// $arr_name_booster = name_booster_arr();
// $name_booster = $arr_name_booster[$_POST['name_booster']];




    if($data_user['username'] != "") {

        $sql_update = "UPDATE accounts SET
            cash = '$pay'
            WHERE id = '$id'
        ";




        $sql = "INSERT INTO cayrank (
            user_id, 
            facebook,
            zalo,
            rank_now,
            rank_hire,
            star_now,
            star_end,
            time_start,
            time_end,
            champ,
            flash_play,
            name_booster,
            dual_booster,
            price,
            created_at,
            type_rank

        ) VALUE (
            '$user_id',
            '$your_account',
            '$your_password',
            '$rank_now',
            '$rank_end',
            '$star_now',
            '$star_end',
            '$time_start',
            '$time_end',
            '$champ',
            '$flash_play',
            '$name_booster',
            '$dual_booster',
            '$price',
            $created_at,
            $type_rank
        )


        ";     
        $db->query($sql);
        $db->query($sql_update);
        $db->close();
        $response = [
            'status' => 1,
            'mess' => 'Cập nhật thành công!',
        ];
    } else {
        die();
    }

    echo json_encode($response);


?>