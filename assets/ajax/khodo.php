<?php
//error_reporting( E_ALL );
//ini_set('display_errors', 1);

// Kết nối database và thông tin chung//
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
$type = $_POST['type'];
$type_item = $_POST['type_item'];
$name = $_POST['name'];
$id = $data_user['id'];
$id_user = $_POST['id_user'];
$id_item = $_POST['id_item'];
$count_item = $_POST['count_item'];
$created_at = time();
$updated_at = time();
$zen_total = $data_user['zen'];
$qty = $_POST['qty'];
$last_count = $count_item - $qty;


//lấy giá zen của vật phẩm
$sql_get_zen = "SELECT zen 
FROM gift
WHERE type_item = '$type_item' ";
$get_zen = $db->fetch_assoc($sql_get_zen, 1);



$zen = $get_zen['zen'];
$sell = $zen_total + $zen * $qty;
$sql_count = "SELECT SUM(value) as val_item
FROM history_gift
INNER JOIN gift
ON history_gift.id_gift=gift.id
WHERE id_user = '$id' AND gift.type_item = 1  GROUP BY  type_item";
$count_1 = $db->fetch_assoc($sql_count, 1);

$sql_vp = "SELECT SUM(history_vp.count) as count_vp
FROM history_vp
INNER JOIN gift
ON history_vp.id_item=gift.id
WHERE id_user = '$id' AND gift.type_item = 1  GROUP BY  type_item";
$count_vp = $db->fetch_assoc($sql_vp, 1);

if ($type == 1) { //do ra so luong vat pham tren html
    $sql = "SELECT history_gift.*, gift.name, gift.image, gift.type_item, gift.zen, gift.des, gift.value_use, COUNT(*) as count_item
FROM history_gift
INNER JOIN gift
ON history_gift.id_gift=gift.id
WHERE id_user = '$id' AND history_gift.type = 0 AND gift.type_item !=0 AND name LIKE '%$name%' GROUP BY type_item";

    $count = $db->fetch_assoc($sql, 0);
    $html = '';
    // trừ số lượng rút hoặc bán quân huy
    foreach ($count as $key => $val) { // xóa item quân huy khi số lượng bằng 0
        if ($val['type_item'] == 1 && ($count_1['val_item'] - $count_vp['count_vp']) <= 0) {
            array_splice($count, $key, 1); 
        }
    }
    foreach ($count as $key => $val) {

        if ($key == 0) {
            $class  = 'border_item';
        } else {
            $class = "";
        }

        if ($val['count_item'] > 1) {
            $count_item = $val['count_item'];
        } else {
            $count_item = "";
        }

        if ($val['type_item'] != 0 && $val['type_item'] != 5 && $val['type_item'] != 12) {
            if ($val['type_item'] == 1) {

                $html .= '<div  onclick="click_img(this)" class="item_bag  ' . $class . '" data-type="' . $val['type_item'] . '" data-zen="' . $val['zen'] . '" data-des="' . $val['des'] . '" data-value_use="' . $val['value_use'] . '" data-count="' . $val['count_item'] . '" data-count_qh="' . $count_1['val_item'] . '">
                            <span class="quantity">' . ($count_1['val_item'] - $count_vp['count_vp']) . '</span>
                            <img class="img_item" data-name="' . $val['name'] . '" data-id="' . $val['id_gift'] . '" src="/' . $val['image'] . '" alt="item_img">
                        </div>';
            } else {

                $html .= '<div  onclick="click_img(this)" class="item_bag  ' . $class . '" data-type="' . $val['type_item'] . '" data-zen="' . $val['zen'] . '" data-des="' . $val['des'] . '" data-value_use="' . $val['value_use'] . '" data-count="' . $val['count_item'] . '" data-count_qh="' . $count_1['val_item'] . '">
                    <span class="quantity">' . $count_item . '</span>
                    <img class="img_item" data-name="' . $val['name'] . '" data-id="' . $val['id_gift'] . '" src="/' . $val['image'] . '" alt="item_img">
                </div>';
            }
        }
    }
    $response = [
        'status' => 1,
        'html' => $html,
        'name' => $count[0]['name'], // trả về thông tin vật phẩm đầu tiên, hiển thị bên cột phải khi tìm kiếm
        'qhuy' => ($count_1['val_item'] - $count_vp['count_vp']),
        'des' => $count[0]['des'],
        'zen' => $count[0]['zen'],
        'image' => $count[0]['image'],
        'type_item' => $count[0]['type_item']
    ];
    if (count($count) < 1) {
        $response = [
            'status' => 0,
        ];
    }
} else if ($type == 2) { //rut vat pham

    if ($type_item == 1) {
    } else {
        $value_use = $_POST['value_use'];
        $sql_gift = "SELECT * FROM  gift WHERE type_item = '$type_item'";
        $data_gift  =  $db->fetch_assoc($sql_gift, 0);
        $html_where = "";
        foreach ($data_gift as $key => $val) {
            if ($key == 0) {
                $cn = "";
            } else {
                $cn =  " OR ";
            }
            $html_where .= ' ' . $cn . ' id_gift = ' . $val['id'] . ' ';
        }
        $sql_his_gift = "SELECT * FROM  history_gift WHERE id_user = '$id' AND type = 0 AND ($html_where)";
        $data_his_gift  =  $db->fetch_assoc($sql_his_gift, 0);
        foreach ($data_his_gift as $key => $val) {
            if ($key < $qty) {
                $sql_update_count = "UPDATE history_gift SET
            type = 1
            WHERE id = '{$val['id']}' AND id_user = $id";
                // echo $sql_update_count;
                $db->query($sql_update_count);
            }
        }
    }

    // luu lich su rut
    $sql = "INSERT INTO history_vp (id_user, id_item, count, created_at, updated_at, type)
        VALUES ($id, $id_item, $qty, $created_at, $updated_at, 0)
        ";

    $db->query($sql);

    $response = [
        'status' => 1,
        'mess' => 'Cập nhật thành công!',
        'last_count' => $last_count,
    ];
} else { //ban vat pham
    $id_item = $_POST['id'];
    $id_type =  $db->fetch_assoc($sql_new, 1);
    $id_new = $id_type['id'];
    $count_qh = $_POST['count_qh'];
    $price = $zen * $qty;

    if ($type_item == 1) { // nếu là quân huy
        $sql_count = "SELECT SUM(value) as val_item
FROM history_gift
INNER JOIN gift
ON history_gift.id_gift=gift.id
WHERE id_user = '$id' AND gift.type_item = 1  GROUP BY  type_item";
        $count_1 = $db->fetch_assoc($sql_count, 1); // đến số lượng quân huy quay được


        $sql_vp = "SELECT SUM(history_vp.count) as count_vp
FROM history_vp
INNER JOIN gift
ON history_vp.id_item=gift.id
WHERE id_user = '$id' AND gift.type_item = 1  GROUP BY  type_item";
        $count_vp = $db->fetch_assoc($sql_vp, 1); // đến số lượng quân huy đã bán hoặc rút
        $count_sl = ($count_1['val_item'] - $count_vp['count_vp']); // đây là lấy hiệu số còn lại sau khi bán hoặc rút
    } else { // nếu không là quân huy
        $sql = "SELECT history_gift.id
FROM history_gift
INNER JOIN gift
ON history_gift.id_gift=gift.id
WHERE id_user = '$id' AND gift.type_item = $type_item AND history_gift.type = 0";
        $count = $db->fetch_assoc($sql, 0);
        $count_sl =  count($count);
    }


    if ($qty <=  $count_sl) { // nếu số lượng nhập vào nhỏ hơn số lượng hiện có
        //luu lich su ban
        $sql = "INSERT INTO history_vp (id_user, id_item, count, price, created_at, updated_at, type)
         VALUES ($id, $id_item, $qty, $price, $created_at, $updated_at, 1)
         ";
        $db->query($sql);

        // update zen
        $sql_zen = "UPDATE accounts SET
 zen = '$sell'
 WHERE id = '$id'
 ";
        $db->query($sql_zen);

        // update so luong sau khi ban
        if ($type_item != 1) {

            $sql_gift = "SELECT * FROM  gift WHERE type_item = '$type_item'";
            $data_gift  =  $db->fetch_assoc($sql_gift, 0);
            $html_where = "";
            foreach ($data_gift as $key => $val) {
                if ($key == 0) {
                    $cn = "";
                } else {
                    $cn =  " OR ";
                }
                $html_where .= ' ' . $cn . ' id_gift = ' . $val['id'] . ' ';
            }
            $sql_his_gift = "SELECT * FROM  history_gift WHERE id_user = '$id' AND type = 0 AND ($html_where)";
            $data_his_gift  =  $db->fetch_assoc($sql_his_gift, 0);
            foreach ($data_his_gift as $key => $val) {
                if ($key < $qty) {
                    $sql_update_count = "UPDATE history_gift SET
     type = 1
     WHERE id = '{$val['id']}' AND id_user = $id";
                    // echo $sql_update_count;
                    $db->query($sql_update_count);
                }
            }
        }
        $response = [
            'status' => 1,
            'mess' => 'Cập nhật thành công!',
            'last_count' => $last_count,
            'zen' => $sell,
        ];
    } else {
        $response = [
            'status' => 0,
            'mess' => 'Số lượng không phù hợp!',

        ];
    }
}
echo json_encode($response);
