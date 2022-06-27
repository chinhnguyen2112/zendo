<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if ($user && $data_user['id'] > 0) {
    $id = $data_user['id'];
    $date = time();
    if ($_POST['type'] == 3) {
        $sql = "SELECT history_gift.*,name,gift.type as gift_type,zen FROM history_gift INNER JOIN gift ON history_gift.id_gift = gift.id WHERE history_gift.id_user = '$id' AND type_use = 0 ORDER BY history_gift.id DESC ";
        $list_his = $db->fetch_assoc($sql, 0);
        $html = "";
        foreach ($list_his as $key => $val) {
            if ($val['gift_type'] == 'luotquay') {
                $type =   " Vòng quay siêu phẩm";
            } else if ($val['gift_type'] == 'luotquay9k') {
                $type =   " Vòng quay quân huy";
            } else if ($val['gift_type'] == 'luotquay20k') {
                $type =   " Vòng quay trang phục";
            }else if ($val['gift_type'] == 'luotquay_free') {
                $type =   " Vòng quay nhiệm vụ";
            }
            $btn = "";
            if ($val['type'] > 1) {
                $sql_acc = "SELECT * FROM `posts` WHERE id_post = '{$val['type']}' ";
                $acc_active = $db->fetch_assoc($sql_acc, 1);
                if ($acc_active['status'] == 2) {
                    $btn = '<span onclick="buy_acc(0,' . $val['type'] . ',' . $val['id_gift'] . ',this)">Bán lại</span><span style="background:#e67300" onclick="buy_acc(1,' . $val['type'] . ',' . $val['id_gift'] . ',this)">Nhận acc</span>';
                    $val['name'] = '<a target="_blank" href="/tai-khoan-' . $val['type'] . '.html">Tài khoản mã số #' . $val['type'] . '</a>';
                } else {
                    $val['name'] = 'Tài khoản:' . $acc_active['username'] . ' | Mật khẩu: ' . $acc_active['password'];
                }
            }
            $html .= '<tr>
            <td class="td_stt">' . $key++ . '</td>
            <td>' . $type . '</td>
            <td data-val="'.$val['zen'].'">' . $val['name'] . $btn . '</td>
            <td>' . date('d-m-Y H:i:s', $val['created_at']) . '</td>
        </tr>';
        }
        $mess = [
            'status' => 1,
            'html' => $html
        ];
    } elseif ($_POST['type'] == 5) {
        $sql = "SELECT * FROM history_luotquay_free  WHERE user_id = $id ORDER BY created_at DESC LIMIT 1 ";
        $history_luotquay_free = $db->fetch_assoc($sql, 0);
        if (count($history_luotquay_free) == 0) {
            $sql_add_post = "INSERT INTO history_luotquay_free (user_id,created_at) VALUES (
                '$id',
                '$date'
            )";
            $db->query($sql_add_post);
            $db->query("UPDATE `accounts` SET   `luotquay_free` = `luotquay_free` + '1'  WHERE `id` = '$id'");
            $mess = [
                'status' => 1,
            ];
        } elseif (count($history_luotquay_free) > 0 && $history_luotquay_free[0]['created_at'] + 86400 <= time()) {
            $sql_add_post = "INSERT INTO history_luotquay_free (user_id,created_at) VALUES (
                '$id',
                '$date'
            )";
            $db->query($sql_add_post);
            $db->query("UPDATE `accounts` SET   `luotquay_free` = `luotquay_free` + '1'  WHERE `id` = '$id'");
            $mess = [
                'status' => 1,
            ];
        } else {
            $mess = [
                'status' => 0,
            ];
        }
    } elseif ($_POST['type'] == 1) {
        $type_buy = $_POST['val'];
        $price = $_POST['price'];
        $count = $_POST['count'];
        $type_mua = $_POST['type_buy'];
        //giá lượt quay
        if($count == 1){
            $price = 10000;
        }else if($count == 3){
            $price = 28000;
        }else if($count == 5){
            $price = 44000;
        }else if($count == 8){
            $price = 73000;
        }else if($count == 10){
            $price = 91000;
        }
        if ($type_mua == 1) {
            if ($price > $data_user['cash']) {
                $mess = [
                    'status' => 0,
                ];
            } else {

                $db->query("UPDATE `accounts` SET    $type_buy =  $type_buy + $count  WHERE `id` = '$id'");

                $db->query("UPDATE `accounts` SET    cash =  cash - $price  WHERE `id` = '$id'");
                $mess = [
                    'status' => 1,
                ];
            }
        } else {
            $price = ($price / 200) + ($price/100);
            if ($price > $data_user['zen']) {
                $mess = [
                    'status' => 0,
                ];
            } else {

                $db->query("UPDATE `accounts` SET    $type_buy =  $type_buy + $count  WHERE `id` = '$id'");

                $db->query("UPDATE `accounts` SET    zen =  zen - $price  WHERE `id` = '$id'");
                $mess = [
                    'status' => 1,
                ];
            }
        }
    } elseif ($_POST['type'] == 2) {
        $type_buy = $_POST['type_buy'];
        $id_acc = $_POST['id_acc'];
        $id_gift = $_POST['id_gift'];
        $sql_count = "SELECT * FROM history_gift  WHERE type = $id_acc AND id_user = $id";
        if ($db->num_rows($sql_count)) {
            if ($type_buy == 0) {
                $db->query("UPDATE `posts` SET `status` = '0' WHERE `id_post` = '$id_acc' LIMIT 1"); // status
                $sql_buy_gift = "SELECT zen FROM `gift` WHERE id = '$id_gift' ";
                $gift_buy = $db->fetch_assoc($sql_buy_gift, 1);
                $db->query("UPDATE `accounts` SET  zen = zen + '{$gift_buy['zen']}'  WHERE `id` = '$id'"); // cộng zen
                $db->query("UPDATE `history_gift` SET  type_use = 1  WHERE type = $id_acc AND id_user = $id"); // đổi thành trạng thái đã bán zen
                $mess = [
                    'status' => 1,
                    'mess' => 'Bán lại thành công, tài khoản của bạn được cộng ' . $gift_buy['zen'] . ' zen',
                ];
            } else {
                $db->query("UPDATE `posts` SET `status` = '1' WHERE `id_post` = '$id_acc' LIMIT 1"); // status
                $sql_this = "SELECT id_post,username,password FROM `posts` WHERE id_post = '$id_acc' ";
                $gift_this = $db->fetch_assoc($sql_this, 1);
                $mess = [
                    'status' => 2,
                    'mess' => 'Nhận acc thành công!',
                    'text' => 'Tài khoản:' . $gift_this['username'] . ' | Mật khẩu: ' . $gift_this['password'],
                ];
            }
        } else {
            $mess = [
                'status' => 0,
            ];
        }
    }

    echo json_encode($mess);
} else {
    $mess = [
        'status' => 0,
    ];
    echo json_encode($mess);
}
