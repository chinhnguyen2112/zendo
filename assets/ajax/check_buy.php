<?php
// Kết nối database và thông tin chung

use function PHPSTORM_META\elementType;

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');


//             echo json_encode(array('status' => "error", 'link' => "/transaction.html", 'title' => "Lỗi", 'message' => "Tạm thời bào trì. vui lòng thử lại sau"));

// die();
//         $id = trim(addslashes(htmlspecialchars($_POST['id'])));
//         $sql_get_data = "SELECT * FROM posts WHERE id_post = '{$id}' AND `status` = '0' LIMIT 1";
//         $info = $db->fetch_assoc($sql_get_data, 1);  
//         $iduser = $data_user['username'];
//         $name = addslashes($data_user['name']);
$fb = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_secret,
    'default_graph_version' => 'v2.4',
    'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : $default_access_token
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];  // set the permissions. 
$loginUrl = $helper->getLoginUrl('' . $_DOMAIN . '/login.php', $permissions);


$iduser = $data_user['username'];
$name = addslashes($data_user['name']);
$gio_hang = trim(addslashes(htmlspecialchars($_POST['gio_hang'])));
if ($gio_hang == 1) {
    $id_user = $data_user['id'];
    $last_price = trim(addslashes(htmlspecialchars($_POST['last_price'])));

    // Đổ ra voucher
    $sql_his_gift = "SELECT history_gift.*, gift.value, gift.value_use, gift.image, gift.name FROM history_gift INNER JOIN gift ON history_gift.id_gift = gift.id WHERE id_user = $id_user AND gift.type_item = 2 AND gift.value_use <= '$last_price' AND history_gift.type = 0";
    $his_gift = $db->fetch_assoc($sql_his_gift, 0);
    $html = '';
    foreach ($his_gift as $key => $val) {
        $html .= '<div class="box_text_noti_gif">
        <input type="checkbox" class="check_voucher"  onclick="check_voucher(this)" name="" id="">
        <div class="box_voucher" style="width:100%  !important" data-id="' . $val['id'] . '" data-name="' . $val['name'] . '" data-value="' . $val['value'] . '" onclick="choose_voucher(this)">
            <img class="img_voucher_3" src="/' . $val['image'] . '" alt="mã giảm giá">
            <p>' . $val['name'] . '</p>
        </div>
    </div>';
    };

    echo json_encode(array('status' => "1", 'html' => $html));
} else
if ($gio_hang == 2) {
    $discount = trim(addslashes(htmlspecialchars($_POST['discount'])));
    $sql_discount = "SELECT * FROM discount WHERE name LIKE '$discount' AND type_discount = 0";
    $info_discount = $db->fetch_assoc($sql_discount, 1);
    $text_discount = $info_discount['name'];
    $amount = $info_discount['amount'];

    if ($amount > 0 || $amount == "") {
        if ($text_discount == $discount) {
            echo json_encode(array('status' => "1", 'title' => "Thành công", 'message' => "Áp dụng mã thành công", 'val_use' => $info_discount['value_use'], 'val' => $info_discount['value']));
        } else {
            echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Mã giảm giá không đúng. Vui lòng kiểm tra lại!"));
        }
    } else {
        echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Mã giảm giá đã hết!"));
    }
} else if ($gio_hang == 3) {
    $id_account = trim(addslashes(htmlspecialchars($_POST['id_account'])));
    $discount = trim(addslashes(htmlspecialchars($_POST['discount'])));
    $id_voucher = trim(addslashes(htmlspecialchars($_POST['id_voucher'])));
    $type = trim(addslashes(htmlspecialchars($_POST['type'])));
    $arr_id_account = explode(',', $id_account);
    $val_check = 0;
    $last_price = 0;
    $check_discount = 1;
    $val_use_discount = 0;
    $val_discount = 0;
    $text_discount = '';

    foreach ($arr_id_account as $key => $val) {
        $sql_check_data = "SELECT * FROM posts WHERE id_post = '{$val}' AND `status` = '0' LIMIT 1";
        $info_check = $db->num_rows($sql_check_data);
        $info_price = $db->fetch_assoc($sql_check_data, 1);
        $last_price  += $info_price['price'];
        if ($info_check <= 0) {
            $val_check = 1;
        }
    }

    if ($type == 1) {
        $id_voucher = "";
        if ($discount != '') {
            $sql_discount = "SELECT * FROM discount WHERE name LIKE '$discount' AND type_discount = 0";
            $info_discount = $db->fetch_assoc($sql_discount, 1);
            $val_discount = $info_discount['value'];
            $val_use_discount =  $info_discount['value_use'];
            $check_discount = count(($info_discount));
            $text_discount = $info_discount['name'];
            $amount = $info_discount['amount'];
        }

        if ($check_discount <= 0 ||  $text_discount != $discount) {
            echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Mã giảm giá không đúng. Vui lòng kiểm tra lại!"));
        } else {

            if ($val_check == 1) {
                echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Có thao tác bất thường. Vui lòng kiểm tra lại!"));
            } else {
                if ($val_use_discount <= $last_price) {
                    $last_price = $last_price - $val_discount;
                    if ($amount != "" && $amount > 0) {
                        $last_amount = $amount - 1;
                    }
                } else {
                    echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Mã giảm giá áp dụng cho đơn hàng từ " . number_format($val_use_discount) . " VNĐ"));
                }
            }
        }
    } else if ($type == 2) {
        $discount = "";
        if ($id_voucher != '') {
            $sql_voucher = "SELECT history_gift.*, gift.value, gift.value_use FROM history_gift INNER JOIN gift ON history_gift.id_gift = gift.id WHERE history_gift.id = '$id_voucher' AND history_gift.type = 0";
            $info_voucher = $db->fetch_assoc($sql_voucher, 1);
            $val_voucher = $info_voucher['value'];
            $val_use_voucher =  $info_voucher['value_use'];
            $check_voucher = count(($info_voucher));
        }

        if ($check_voucher <= 0) {
            echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Voucher không tồn tại!"));
        } else {

            if ($val_check == 1) {
                echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Có thao tác bất thường. Vui lòng kiểm tra lại!"));
            } else {
                if ($val_use_voucher <= $last_price) {
                    $last_price = $last_price - $val_voucher;
                } else {
                    echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Mã giảm giá áp dụng cho đơn hàng từ " . number_format($val_use_voucher) . " VNĐ"));
                }
            }
        }
    } else {
    }

    if ($last_price > $data_user['cash']) {
        echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Tài khoản không đủ để thực hiện chức năng này!"));
    } else if ($last_price == 0) {
        echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Bạn chưa chọn tài khoản!"));
    } else {
        $db->query("UPDATE `accounts` SET `cash` = `cash` - '{$last_price}' WHERE `username` = '{$iduser}'"); // trừ tiền

        foreach ($arr_id_account as $key => $val) {
            $sql_get_data = "SELECT * FROM posts WHERE id_post = '{$val}' AND `status` = '0' LIMIT 1";
            $info = $db->fetch_assoc($sql_get_data, 1);
            $price = $info['price'];
            if ($last_price >= 500000) {
                $db->query("UPDATE `accounts` SET `luotquay9k` = `luotquay9k` + '5' WHERE `username` = '{$iduser}'"); // tặng lượt quay
            }
            $db->query("UPDATE `posts` SET `status` = '1' WHERE `id_post` = '{$val}' LIMIT 1"); // status
            $db->query("INSERT INTO `history_buy` (username,name,id_post,price,time) VALUES ('$iduser','$name','$val','$price','$date_current')"); // lịch sử
            $db->query("UPDATE `history_gift` SET type = 1  WHERE id = '$id_voucher'"); // bỏ voucher
            $db->query("DELETE FROM `giohang` WHERE id_account = '$val'"); // xóa giỏ hàng
            $db->query("UPDATE `discount` SET amount = '$last_amount' WHERE name LIKE '$discount' AND type_discount = 0"); // trừ số lượng mã giảm gía 

        }
        echo json_encode(array('status' => "success", 'link' => "/lich-su-mua-hang/", 'title' => "Thành công", 'message' => "Giao dịch thành công"));
    }
} else if ($gio_hang == 4) {
    $id = trim(addslashes(htmlspecialchars($_POST['id'])));
    $id_user = $data_user['id'];
    $created_at = $updated_at = time();
    $sql_id = "SELECT id_account FROM giohang WHERE id_account = $id AND id_user = $id_user";
    $row = $db->num_rows($sql_id);

    if ($id_user != "") {
        if ($row <= 0) {
            $sql = "INSERT INTO giohang (id_user, id_account, created_at, updated_at) VALUES ($id_user, $id, $created_at, $updated_at)";
            $db->query($sql);

            echo json_encode(array('status' => "1", 'title' => "Thành công", 'message' => "Tài khoản này đã được thêm vào giỏ hàng!"));
        } else {
            echo json_encode(array('status' => "0", 'title' => "Thất bại", 'message' => "Tài khoản này đã có trong giỏ hàng!"));
        }
    } else {
        echo json_encode(array('status' => "2", 'title' => "Thất bại", 'message' => "Bạn chưa đăng nhập!"));
    }
} else if ($gio_hang == 5) {
    $id_cart = $id = trim(addslashes(htmlspecialchars($_POST['id_cart'])));
    $sql = "DELETE FROM `giohang` WHERE id = '$id_cart'";
    $db->query($sql);
    echo json_encode(array('status' => "1", 'title' => "Thành công", 'message' => "Tài khoản đã bị xóa khỏi giỏ hàng!"));
} 
// else {
//     $id = trim(addslashes(htmlspecialchars($_POST['id'])));
//     $id_voucher = trim(addslashes(htmlspecialchars($_POST['id_voucher'])));
//     $val_voucher = trim(addslashes(htmlspecialchars($_POST['val_voucher'])));
//     $sql_get_data = "SELECT * FROM posts WHERE id_post = '{$id}' AND `status` = '0' LIMIT 1";
//     $info = $db->fetch_assoc($sql_get_data, 1);

//     // check đặt cọc
//     $sql_get_pre = "SELECT * FROM `pre_order` WHERE id_post = '{$id}' AND `username` = '{$iduser}' AND `status` = '0' LIMIT 1";
//     $sql_check_pre = "SELECT * FROM `pre_order` WHERE id_post = '{$id}' AND `username` != '{$iduser}' AND `status` = '0' LIMIT 1";
//     $get_pre = $db->fetch_assoc($sql_get_pre, 1);
//     // get 
//     $pre = $db->fetch_assoc("SELECT * FROM pre_order WHERE id_post = '" . $get_pre['id_post'] . "' AND `username` = '{$iduser}' AND `status` = '0' LIMIT 1", 1);
//     // điều kiện hết hạn
//     if ($pre['time'] - time() <= 0) {
//         $db->query("UPDATE `pre_order` SET `status` = '2' WHERE `id_post` = '{$id}' LIMIT 1"); // status    
//     }

//     if ($db->num_rows($sql_get_pre) >= 1) { //nếu có đặt cọc và id username là id hiện tại
//         $price = $info['price'] - $pre['price'];
//     } else {

//         $price = $info['price'];
//     }

//     if (!$user) {
//         echo json_encode(array('status' => "error", 'link' => "/dang-nhap/", 'title' => "Lỗi", 'message' => "Bạn chưa đăng nhập"));
//     } else if (!$id) {
//         echo json_encode(array('status' => "error", 'link' => "/index.php", 'title' => "Lỗi", 'message' => "Bạn chưa chọn tài khoản"));
//     } else if ($db->num_rows($sql_check_pre) >= 1) {
//         echo json_encode(array('status' => "error", 'link' => "/index.php", 'title' => "Lỗi", 'message' => "Tài khoản này đã được đặt cọc bởi người khác"));
//     } else if ($data_site['status'] == 0) {
//         echo json_encode(array('status' => "error", 'link' => "/$id.html", 'title' => "Lỗi", 'message' => "Trang web của chúng tôi đang tạm dừng giao dịch, quay lại sau"));
//     } else if (!$_POST) {
//         echo json_encode(array('status' => "error", 'link' => "/index.php", 'title' => "Lỗi", 'message' => "Vui lòng xác minh lại giao thức"));
//     } else if ($db->num_rows($sql_get_data) < 1) {
//         echo json_encode(array('status' => "error", 'link' => "/index.php", 'title' => "Lỗi", 'message' => "Tài khoản bạn chọn không tồn tại hoặc đã bị mua bởi người khác"));
//     } else if ($data_user['cash'] < $price - $val_voucher) {
//         echo json_encode(array('status' => "error", 'link' => "/nap-the/", 'title' => "Lỗi", 'message' => "Bạn không đủ tiền để mua, vui lòng nạp thêm"));
//     } else {

//         $db->query("UPDATE `posts` SET `status` = '1' WHERE `id_post` = '{$id}' LIMIT 1"); // status

//         $if_price = $info['price'] - $val_voucher;
//         if ($db->num_rows($sql_get_pre) >= 1) { //nếu có đặt cọc và id username là id hiện tại
//             $price = $info['price'] - $pre['price'];
//             $db->query("UPDATE `accounts` SET `cash` = `cash` - '{$price}' WHERE `username` = '{$iduser}'"); // trừ tiền chưa cọc còn lại
//             $db->query("UPDATE `pre_order` SET `price` = `price` + '{$price}', `status` = '1' WHERE `id_post` = '{$id}' LIMIT 1"); // status
//         } else {
//             $price = $info['price'];
//             $db->query("UPDATE `accounts` SET `cash` = `cash` - '{$if_price}' WHERE `username` = '{$iduser}'"); // trừ tiền
//             if ($price >= 500000) {
//                 $db->query("UPDATE `accounts` SET `luotquay9k` = `luotquay9k` + '5' WHERE `username` = '{$iduser}'"); // trừ tiền
//             }
//         }
//         $price_show = $info['price'];
//         $db->query("INSERT INTO `history_buy` (username,name,id_post,price,time) VALUES ('$iduser','$name','$id','$price_show','$date_current')"); // lịch sử
//         $db->query("UPDATE `history_gift` SET type = 1  WHERE id = '$id_voucher'"); // bỏ voucher
//         echo json_encode(array('status' => "success", 'link' => "/lich-su-mua-hang/", 'title' => "Thành công", 'message' => "Giao dịch thành công"));

//         // // xóa ảnh
//         // $arr_delete = array();
//         // $avatar = glob("../files/thumb/".$id.".*");
//         // $arr_delete[] = $avatar[0];
//         // $gem = glob("../files/gem/".$id."-*");
//         // foreach ($gem as $link_gem) {
//         // $arr_delete[] = $link_gem;
//         // }
//         // $post = glob("../files/post/".$id."-*");
//         // foreach ($post as $link_post) {
//         // $arr_delete[] = $link_post;
//         // }
//         // foreach ($arr_delete as $link) {
//         // @unlink($link);
//         // }


//     }
// }
