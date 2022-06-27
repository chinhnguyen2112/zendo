<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
if (!$user || $data_user['admin'] < 1) {
?>
  <p class="content-mini content-mini-full bg-warning text-white">Bạn chưa đăng nhập, không thể lấy thông tin</p>
<?php
  exit;
} elseif (!$_POST) {
  exit;
}

$iduser = $data_user['username'];
$input = new Input;
$page = (int)$input->input_post("page2");
$username = $input->input_post("username");
if (!empty($username)) {
  $sql_username = "AND name LIKE '%$username%'";
}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_card WHERE id != '0' $sql_username LIMIT 1");
// config phân trang
$config = array(
  "current_page" => $page,
  "total_record" => $total_record,
  "limit" => "20",
  "range" => "5",
  "link_first" => "",
  "link_full" => "?page2={page}"
);

$paging = new Pagination;
$paging->init($config);
$sql_get_list_buy = "SELECT * FROM `history_card` WHERE id != '0' $sql_username ORDER BY `time` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
// Nếu có 
if ($total_record) {
?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center" style="width: 50px;">#</th>
        <th>Người nạp</th>
        <th>Loại thẻ</th>
        <th>Seri</th>
        <th>Mathe</th>


        <th>Mệnh giá</th>
        <th>Thời gian</th>
        <th>Xu li</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;

      foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data_card) {
      ?>


        <tr>
          <td class="text-center"><?php echo $i; ?></td>
          <td><a href="http://facebook.com/<?php echo $data_card['username']; ?>" target="_blank"><?php echo $data_card['name']; ?></a></td>
          <td><?php echo $data_card['type_card']; ?></td>
          <td><?php echo $data_card['seri']; ?></td>
          <td><?php echo $data_card['code']; ?></td>


          <td><?php echo number_format($data_card['menhgia'], 0, '.', '.'); ?>đ</td>
          <td><?php echo $data_card['time']; ?></td>
          <td><?php echo $data_card['status']; ?></td>

        </tr>



      <?php
        $i++;
      }
      ?>
    </tbody>

  </table>

<?php
  echo $paging->html_card(); // page
} else {
?>
  <p class="content-mini content-mini-full bg-info text-white">Không tìm thấy giao dịch</p>
<?php
}
?>