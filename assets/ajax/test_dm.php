<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');

// if ($user && $data_user['id'] > 0) {

    $type_play =2;
    $id = 1852;
    $sql_count = "SELECT * FROM accounts  WHERE id = ' " . $id . "'";
    if ($db->num_rows($sql_count)) {
        $data_count = $db->fetch_assoc($sql_count, 1);
    }
    if ($data_count[$type_play] < 1) {
        $mess = [
            'status' => 2,
        ];
    } else {
        $random = rand(1, 1000);
        $sql = "SELECT * FROM `gift` WHERE type = '$type_play' AND vip > 0";
        $arr_gift = $db->fetch_assoc($sql, 0);
        $tam = 0;
        $count = count($arr_gift);
        $i = 0;
        $type_gift = 0;
        foreach ($arr_gift as $key => $val) {
            if ($random > $tam && $random <= $tam + $val['vip'] * 10) {
                if ($val['type_item'] != 12) {// nếu = 12 là thêm lượt quay nên không trừ lượt quay
                    $db->query("UPDATE `accounts` SET   $type_play = $type_play - '1'  WHERE `id` = '$id'"); // trừ lượt quay
                }
                if ($val['type_item'] == 0) {
                    $db->query("UPDATE `accounts` SET  zen = zen + '{$val['zen']}'  WHERE `id` = '$id'"); // cộng zen
                } else if ($val['type_item'] == 5) {
                    $sql_acc = "SELECT * FROM `posts` WHERE price = '{$val['value']}' AND status = 0 ORDER BY RAND() LIMIT 1";
                    $acc_active = $db->fetch_assoc($sql_acc, 1);
                    $type_gift = $acc_active['id_post'];
                    $db->query("UPDATE `posts` SET `status` = '2' WHERE `id_post` = '$type_gift' LIMIT 1"); // status
                }
                $date = time();
                $vip = $val['id'];
                $sql_add_post = "INSERT INTO history_gift (id_user,id_gift,created_at,type) VALUES (
                        '$id',
                        '$vip',
                        '$date',
                        '$type_gift'
                    )";
                $db->query($sql_add_post);
                $mess = [
                    'status' => 1,
                    'stt' => $val['stt'],
                    'img_vip' => $val['image'],
                    'name' => $val['name'],
                    'random' => $random,
                    'type_gift' => $val['type_item'],
                    'vip' => $val['vip']
                ];
            }
            $i++;
            $tam +=  $val['vip'] * 10;
        }
    }
// } else {
//     $mess = [
//         'status' => 0,
//     ];
// }

echo json_encode($mess);
