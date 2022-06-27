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


$total_record = $db->fetch_row("SELECT COUNT(id) FROM pre_order WHERE username = '{$iduser}' LIMIT 1");
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
    $sql_get_list_coc = "SELECT * FROM `pre_order` WHERE username = '{$iduser}' ORDER BY `time` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
    

// Nếu có 
if ($total_record){
?>
                        <table  class="table_cash">
                             <thead>
                                 <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Mã tài khoản</th>
                                    <th>Số Tiền Cọc</th>
                                    <th>Còn Thiếu </th>
                                    <th>Số Ngày Cọc</th>
                                    <th>Thời Gian Cọc</th>
                                    <th>Trạng Thái</th>
                                </tr>
                            </thead>
                        <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get_list_coc, 0) as $key => $data_buy){ 
    $info = $db->fetch_assoc("SELECT * FROM pre_order WHERE id_post = '".$data_buy['id_post']."' LIMIT 1", 1); 
    $sql_get_data = "SELECT * FROM posts WHERE id_post = '{$info['id_post']}' LIMIT 1";
    $a = $db->fetch_assoc($sql_get_data, 1);
?>


                             <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td><a href="/<?php echo $info['id_post']; ?>.html"><?php echo $info['type_account']; ?> #<?php echo $info['id_post']; ?></a></td>
                                    <td><?php echo number_format($info['price'], 0, '.', '.'); ?>đ</td>
                                    <td><?php echo number_format(($a["price"]-$info["price"]), 0, '.', '.'); ?></td>
                                    <td><?php echo $info['days']; ?> Ngày</td>
                                    <td><?php echo $info['date']; ?></td>
                                    <td> <?=($info['status'] == 1) ? 'Đã Thanh Toán Đủ' : 'Chưa Thanh Toán Xong'?></td>
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




