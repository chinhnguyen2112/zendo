<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
if (!$user) {
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


$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_buy WHERE username = '{$iduser}' LIMIT 1");
    // config phân trang
    $config = array(
      "current_page" => $page,
      "total_record" => $total_record,
      "limit" => "10",
      "range" => "5",
      "link_first" => "",
      "link_full" => "?page={page}"
    );
    
    $paging = new Pagination;
    $paging->init($config);
    $sql_get_list_buy = "SELECT * FROM `history_buy` WHERE username = '{$iduser}' ORDER BY `time` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                        <table  class="table_cash">
                             <thead><tr >
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Mã tài khoản</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Giá tiền</th>
                                    <th>Thời gian</th>
                                    <th>Mã 2fa</th>
                                    <th>Token</th>
                                </tr></thead>
                        <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data_buy){ 
    $info = $db->fetch_assoc("SELECT * FROM posts WHERE id_post = '".$data_buy['id_post']."' LIMIT 1", 1); 
?>


                             <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td><?php echo $info['type_account']; ?> #<?php echo $data_buy['id_post']; ?></td>
                                    <td><?php echo $info['username']; ?></td>
                                    <td><?php echo $info['password']; ?></td>
                                    <td><?php echo number_format($data_buy['price'], 0, '.', '.'); ?>đ</td>
                                    <td><?php echo $data_buy['time']; ?></td>
                                    <td><?php echo $info['2fa']; ?></td>
                                    <td><?php echo $info['token']; ?></td>
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
<p class="content-mini content-mini-full bg-info text-white">Bạn chưa có giao dịch nào</p>
<?php
}
?>




