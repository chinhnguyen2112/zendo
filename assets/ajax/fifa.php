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
$max_price = !empty($_POST['max_price']) ? (int)$_POST['max_price'] : 100000000;
$ms = !empty($_POST['ms']) ? (int)$_POST['ms'] : 0;




if ($data_user['id'] == 1373 || $data_user['id'] == 1572) {
  $sql_id = "";
} else {
  $sql_id = "AND type_post != 4 ";
}

if ($order == 1) {
  $html_order = "ORDER BY price ASC ";
} else if ($order == 2) {
  $html_order = "ORDER BY price DESC ";
} else {
  $html_order = "ORDER BY price ASC ";
}
// config phân trang
$config = array(
  "current_page" => $page,
  "total_record" => $total_record,
  "limit" => "15",
  "range" => "5",
  "link_first" => "",
  "link_full" => "?page={page}"
);
$paging = new Pagination;
$get_info = new Info;
$paging->init($config);
if ($ms > 0) { // nếu tìm theo id
  $sql_count = "SELECT COUNT(id_post) FROM posts WHERE status = 0 AND type_account = 'Fifa' AND id_post = $ms $sql_id";
  $sql_get_list_acc = "SELECT * FROM posts WHERE status = 0 AND type_account = 'Fifa' AND  id_post = $ms $sql_id $html_order LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
} else {

  $sql_count = "SELECT COUNT(id_post) FROM posts WHERE status = 0 AND type_account = 'Fifa' AND  price BETWEEN $min_price AND $max_price $sql_id  ";
  $sql_get_list_acc = "SELECT * FROM posts WHERE status = 0 AND type_account = 'Fifa' AND  price BETWEEN $min_price AND $max_price $sql_id  $html_order LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
}
/* END */
$total_record = $db->fetch_row($sql_count); // đếm hàng


$so_lg = $total_record . ' kết quả';

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
            <li class="li_ac">GTĐH: <?= $data_post['skins']; ?></li>
            <li class="li_ac">RP: <?= $data_post['champs']; ?></li>
            <li class="li_ac">Ghi chú: <?= $data_post['note']; ?></li>
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