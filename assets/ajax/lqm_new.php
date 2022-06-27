<?php
//error_reporting( E_ALL );
//ini_set('display_errors', 1);

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');


$input = new Input;
// biến truyền vào
$page = (int)$input->input_post("page");
/* $_POST */
$min_price = !empty($_POST['min_price']) ? (int)$_POST['min_price'] : 0;
$max_price = !empty($_POST['max_price']) ? (int)$_POST['max_price'] : 10000000;
$price = !empty($_POST['max_price']) ? (int)$_POST['price'] : 0;
$ms = !empty($_POST['ms']) ? (int)$_POST['ms'] : 0;
$ngoc = !empty($_POST['ngoc']) ? (int)$_POST['ngoc'] : 0;
$tuong = !empty($_POST['int_1']) ? str_replace('.', '', $_POST['int_1']) : 0;
$skin = !empty($_POST['int_2']) ? str_replace('.', '', $_POST['int_2']) : 0;
$ip = !empty($_POST['int_3']) ? str_replace('.', '', $_POST['int_3']) : 0;
$bangngoc = !empty($_POST['int_4']) ? str_replace('.', '', $_POST['int_4']) : 0;
$rank = !empty($_POST['int_5']) ? str_replace('.', '', $_POST['int_5']) : 1;
$gia = !empty($_POST['int_6']) ? str_replace('.', '', $_POST['int_6']) : 1;
$khung = !empty($_POST['varchar_1']) ? $_POST['varchar_1'] : -1;

$order = !empty($_POST['order']) ? (int)$_POST['order'] : 0;



/* Xử lý tìm kiếm skin */
$list_skin = !empty($_POST['longtext_1']) ? trim($_POST['longtext_1']) : "";
$arr_skin = explode(',', $list_skin);
$str_result = "";
foreach ($arr_skin as $value) {
    if ($value != "") {

        $str_result .= "(";
        $value = trim($value);
        $str_result .= "skins LIKE '%$value%'";
        $str_result .= ") AND ";
    }
}

$str_result = trim($str_result, "AND ");
if ($str_result == "") {
    $sql_skin = "";
} else {
    $str_result .= " AND ";
    $sql_skin = $str_result;
}
$html = '';
if ($ms != 0) {
    $html .= "AND id_post = '" . $ms . "'";
}
if ($price != 0) {
    $html .= "AND price = '" . $price . "'";
}

if ($ngoc == 1) {
    $html .= "AND ip_count != '90'";
} else if ($ngoc > 1) {
    $html .= "AND ip_count = '" . $ngoc . "'";
}


/* Xử lý tìm kiếm champ */
$list_champs = !empty($_POST['longtext_2']) ? trim($_POST['longtext_2']) : "";
$str_result2 = "";
$arr_champs = explode(',', $list_champs);
foreach ($arr_champs as $value2) {
    if($value2 != ""){
        $str_result2 .= "(";
    $value2 = trim($value2);
    $str_result2 .= "champs LIKE '%$value2%' ";
    $str_result2 .= ") AND";
    }
}

$str_result2 = trim($str_result2, "AND ");
if ($str_result2 == "") {
    $sql_champs = "";
} else {
    $str_result2 .= " AND ";
    $sql_champs = $str_result2;
}
/* END */
if ($khung == -1) {
    $sql_khung = "";
} else if ($khung == -2) {
    $sql_khung = "frame = 0 AND ";
} else {
    $sql_khung = "frame = $khung AND ";
}

if ($rank == -1) {
    $rank = 0;
    /* Phân ra rank */
    $sql_rank = "";
}
if ($rank == 1) {
    $sql_rank = "";
} else {
    $sql_rank = "rank = $rank AND";
}

/* END */
if ($gia == -1) $gia = 0;
/* Phân ra giá */
$sql_gia = "";
if ($gia == 1) {
    $sql_gia = "";
} else if ($gia == 2) {
    $sql_gia = " price <= 50000 AND ";
} elseif ($gia == 3) {
    $sql_gia = "price BETWEEN 50000 AND 100000 AND";
} elseif ($gia == 4) {
    $sql_gia = "price BETWEEN 100000 AND 500000 AND";
} elseif ($gia == 5) {
    $sql_gia = "price BETWEEN 500000 AND 1000000 AND";
} elseif ($gia == 6) {
    $sql_gia = "price >= 1000000 AND";
}
if($data_user['id'] == 1373 || $data_user['id'] == 1572){
    $sql_id = "";
}else{
    $sql_id ="type_post != 4 AND";
}
/* END */
$total_record = $db->fetch_row("SELECT COUNT(id_post) FROM posts WHERE
      status = 0 AND
      type_account = 'Liên Quân Mobile' AND
      $sql_id 
      price BETWEEN $min_price AND $max_price AND 
      $sql_rank
       $sql_gia
      gem_count >= $bangngoc AND 
      skins_count >= $skin AND 
      champs_count >= $tuong AND 
      $sql_skin
      $sql_champs
      $sql_khung 
      ip_count >= $ip 
      $html
    "); // đếm hàng


// config phân trang
$config = array(
    "current_page" => $page,
    "total_record" => $total_record,
    "limit" => "15",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page={page}"
);
$so_lg= $total_record. ' kết quả';
$paging = new Pagination;
$get_info = new Info;
$paging->init($config);

if($order == 1){
    $html_order = "ORDER BY price ASC ";
}else if($order == 2){
    $html_order = "ORDER BY price DESC ";
}else{
     $html_order = "ORDER BY price ASC ";
}
// echo "SELECT * FROM posts WHERE
//       status = 0 AND
//       type_account = 'Liên Quân Mobile' AND
//       price BETWEEN $min_price AND $max_price AND 
//       $sql_rank
//       $sql_gia
//       gem_count >= $bangngoc AND 
//       skins_count >= $skin AND 
//       champs_count >= $tuong AND 
//       $sql_skin
//       $sql_champs
//       $sql_khung 
//       ip_count >= $ip
      
//       $html
//     $html_order
//     LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
$sql_get_list_acc = "SELECT * FROM posts WHERE
      status = 0 AND
      type_account = 'Liên Quân Mobile' AND
      $sql_id 
      price BETWEEN $min_price AND $max_price AND 
      $sql_rank
       $sql_gia
      gem_count >= $bangngoc AND 
      skins_count >= $skin AND 
      champs_count >= $tuong AND 
      $sql_skin
      $sql_champs
      $sql_khung 
      ip_count >= $ip
      
      $html
    $html_order
    LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có tai khoan
if ($total_record) {
    foreach ($db->fetch_assoc($sql_get_list_acc, 0) as $key => $data_post) {

        $sql_get_pre = "SELECT * FROM pre_order WHERE status = '0' AND id_post = {$data_post['id_post']}";

?>

        <div class="box__list_danhmuc"><a href="/tai-khoan-<?php echo $data_post['id_post']; ?>.html">
                <img src="/<?php echo $get_info->get_thumb($data_post['id_post']); ?>" alt="chi tiết acc">
                <?php if ($db->num_rows($sql_get_pre) < 1) : ?>
                    <?php if ($data_post['type_post'] == '0') : ?>
                        <div class="tag"><img src="/assets/img/tag_ads.png" /></div>
                    <?php elseif ($data_post['type_post'] == '2') : ?>
                        <div class="tag"><img src="/assets/img/tag.png" /></div>
                    <?php elseif ($data_post['type_post'] == '1') : ?>
                        <div class="tag"><img src="/assets/img/tag_vip.png" /></div>
                    <?php else : ?>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="tag"><img src="/assets/img/tag_coc.png" /></div>
                <?php endif; ?>
                <div class="box_detail_danhmuc">
                    <p class="count_acc">
                        <span>Mã số: <span class="num_count"><?php echo $data_post['id_post']; ?></span> </span>
                        <span>Giá: <span class="num_count"><?php echo number_format($data_post["price"], 0, '.', '.'); ?>đ</span> </span>
                    </p>
                    <ul>
                        <li class="li_ac"><?php echo $data_post['champs_count']; ?> tướng</li>
                        <li class="li_ac"><?php echo $data_post['skins_count']; ?> trang phục</li>
                        <li class="li_ac">Rank <?php echo $get_info->get_string_rank($data_post['rank']); ?></li>
                        <li class="li_ac">Ngọc <?php echo $data_post['ip_count']; ?> </li>
                    </ul>
                </div>
                <div class="box_price_danhmuc">
                    <span><?php echo number_format($data_post["price"], 0, '.', '.'); ?>đ</span>
                    <img src="/images/sanacc/danhmuc/vqmm.svg" alt="vqmm">
                </div>
                <p><span class="btn_buy">MUA NGAY</span></p>
            </a>
        </div>


    <?php
    } // end show acc
    ?>
    
    <div class="clear"></div>
    <!--<h2 style="color:#313131;width: 100%;float:none;text-align:center;font-size:16px;text-transform: uppercase;margin:0;">ACC LIÊN QUÂN UPDATE HÀNG NGÀY</h2>-->
    <?php
    echo $paging->html_site(); // page
    ?>

    <div class="clear"></div>
<?php

} else {
?>
    <div class="clear"></div>
    <p style="color:#FFF;width: 100%;float:none;text-align:center;font-size:20px;text-transform: uppercase;margin:0;">Không có tài khoản phù hợp với điều kiện tìm kiếm
    <p>




    <?php
}
    ?>
<p class="tam_count" style="display:none"><?= $so_lg ?></p>