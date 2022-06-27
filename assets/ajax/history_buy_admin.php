<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
if (!$user || $data_user['admin'] < 1) {
?>
<p class="content-mini content-mini-full bg-warning text-white">Bạn chưa đăng nhập, không thể lấy thông tin</p>
<?php
exit;
}elseif(!$_POST){
exit;
}

$iduser = $data_user['username'];
$input = new Input;
$page = (int)$input->input_post("page");
$id_post = $input->input_post("id_post");
$username = $input->input_post("username");



if (!empty($id_post)) {
$sql_id = "AND id_post = '$id_post'";
}
if (!empty($username)) {
$sql_username = "AND name LIKE '%$username%'";
}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_buy WHERE id != '0' $sql_username $sql_id LIMIT 1");
    // config phân trang
    $config = array(
      "current_page" => $page,
      "total_record" => $total_record,
      "limit" => "20",
      "range" => "5",
      "link_first" => "",
      "link_full" => "?page={page}"
    );
    
    $paging = new Pagination;
    $paging->init($config);
    $sql_get_list_buy = "SELECT * FROM `history_buy` WHERE id != '0' $sql_username $sql_id ORDER BY `time` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
// Nếu có 
if ($total_record){
?>
                        <table  class="table table-bordered">
                             <thead><tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th><?php echo $username; ?></th>
                                    <th>Username/Pwd</th>
                                    <th>Người mua</th>
                                    <th>Giá tiền</th>
                                    <th>Thời gian</th>
                                </tr></thead>
                        <tbody>
<?php                            
$i=1;

foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data_buy){ 
    $info = $db->fetch_assoc("SELECT * FROM posts WHERE id_post = '".$data_buy['id_post']."' LIMIT 1", 1); 
?>


                             <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td><a href="<?php echo $_DOMAIN; ?><?php echo $data_buy['id_post']; ?>.html" title="<?php echo $info['type_account']; ?>" target="_blank">#<?php echo $data_buy['id_post']; ?></a></td>
                                    <td><?php echo $info['username']; ?>/<?php echo $info['password']; ?></td>
                                    <td><a href="http://facebook.com/<?php echo $data_buy['username']; ?>" target="_blank"><?php echo $data_buy['name']; ?></a></td>
                                    <td><?php echo number_format($data_buy['price'], 0, '.', '.'); ?>đ</td>
                                    <td><?php echo $data_buy['time']; ?></td>
                            </tr>



<?php 
$i++;
}
?>
                        </tbody>
                        
                        </table>
                    
<?php                     
echo $paging->html_buy(); // page
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Không tìm thấy giao dịch</p>
<?php
}
?>




