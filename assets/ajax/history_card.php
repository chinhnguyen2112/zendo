<?php
error_reporting( E_ALL );
ini_set('display_errors', 1);

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
$page = (int)$input->input_post("page2");


$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_card WHERE username = '{$iduser}' LIMIT 1");
    // config phân trang
    $config = array(
      "current_page" => $page,
      "total_record" => $total_record,
      "limit" => "10",
      "range" => "5",
      "link_first" => "",
      "link_full" => "?page2={page}"
    );
    
    $paging = new Pagination;
    $paging->init($config);
    $sql_get_list_buy = "SELECT * FROM `history_card` WHERE username = '{$iduser}' ORDER BY `time` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                        <table  class="table_cash">
                             <thead><tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Loại thẻ</th>
                                    <th>Mã thẻ</th>
                                    <th>Tình Trạng Thẻ</th>
                                    <th>Mệnh giá</th>
                                    <!--th>Seri</th>-->
                                    <!--<th>Mã thẻ</th>-->

                                    
                                    <!--<th>Thời gian</th>-->
                                </tr></thead>
                        <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data_card){ 
?>


                             <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td><?php echo $data_card['type_card']; ?></td>
                                      <td><?php echo $data_card['code']; ?></td>
                                     <td><?php echo ($data_card['status'] == '5' ? 'Đã cộng tiền' : ($data_card['status'] == '2' ? 'Sai mã thẻ hoặc seri, vui lòng kiểm tra lại' : 'Vui lòng đợi 2 đến 5 phú để xử lý thẻ')); ?></td>
                                   
                                           
                                    <td><?php echo number_format($data_card['menhgia']); ?>đ</td>                            
                                  

                                    <!--<td><?php echo $data_card['code']; ?>đ</td>-->

                                    <!--<td><?php echo $data_card['time']; ?></td>-->
                            </tr>



<?php 
$i++;
}
?>
                        </tbody>
                        
                        </table>
                    
<?php                     
echo $paging->html_card(); // page
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Bạn chưa có giao dịch nào</p>
<?php
}
?>




