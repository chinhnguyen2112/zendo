 <?php

    // Kết nối database và thông tin chung
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');

    if ($user && $data_user['id'] > 0) {

        $type_play = $_COOKIE['this_play'];
        $id = $data_user['id'];
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
            $date_check = date('H:i:s', time());
            $sql_his = "SELECT created_at,type FROM `history_gift` WHERE id_user = '$id' AND type > 1 ORDER BY id DESC";
            $check_his = $db->fetch_assoc($sql_his, 1);
            if ($type_play == 'luotquay_free') {
                $event = 1; // quay được acc vào hôm trước hoặc chưa quay được
            }
            if (count($check_his) > 0) {
                if (date('d-m-Y', $check_his['created_at']) == date('d-m-Y', time())) {
                    $event = 0; // quay được acc vào hôm nay rồi
                }
            }
            // check xem còn acc free hay không
            $sql_check_acc_free  = "SELECT * FROM `posts` WHERE type_account = 'Liên Quân Free' AND status = 0 ORDER BY RAND() LIMIT 1";
            $check_acc_free = $db->fetch_assoc($sql_check_acc_free, 0);
            if (count($check_acc_free) != 1) {
                $event = 0;
            }
            /// nếu quay free vào khung giờ vàng và  quay được acc vào hôm trước hoặc chưa quay được
            if ($event == 1 && $type_play == 'luotquay_free' && (($date_check >= '11:00:00' && $date_check < '12:00:00') || ($date_check >= '20:00:00' && $date_check < '21:00:00'))) {
                $random = rand(1, 20);
                if ($random > 2) { // nếu quayk trúng acc thì random các phần thưởng khác
                    $random = rand(3, 1000);
                }
            } elseif ($event == 0 && $type_play == 'luotquay_free') {
                $random = rand(3, 1000);
            }
            $sql = "SELECT * FROM `gift` WHERE type = '$type_play' AND vip > 0 ORDER BY vip ASC";
            $arr_gift = $db->fetch_assoc($sql, 0);
            $tam = 0;
            $count = count($arr_gift);
            $i = 0;
            $type_gift = 0;
            foreach ($arr_gift as $key => $val) {
                if ($random > $tam && $random <= $tam + $val['vip'] * 10) {

                    if ($val['type_item'] != 12) { // nếu = 12 là thêm lượt quay nên không trừ lượt quay
                        $db->query("UPDATE `accounts` SET   $type_play = $type_play - '1'  WHERE `id` = '$id'"); // trừ lượt quay
                    }
                    if ($val['type_item'] == 0) {
                        $db->query("UPDATE `accounts` SET  zen = zen + '{$val['zen']}'  WHERE `id` = '$id'"); // cộng zen
                    } else if ($val['type_item'] == 5) {
                        if ($event == 1  && $type_play == 'luotquay_free') {
                            $sql_acc = "SELECT * FROM `posts` WHERE type_account = 'Liên Quân Free' AND status = 0 ORDER BY RAND() LIMIT 1";
                        } else {
                            $sql_acc = "SELECT * FROM `posts` WHERE price = '{$val['value']}' AND status = 0 AND type_account LIKE '%Liên Quân%' ORDER BY RAND() LIMIT 1";
                        }
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
    } else {
        $mess = [
            'status' => 0,
        ];
    }

    echo json_encode($mess);
