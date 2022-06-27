<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
if (!$user|| $data_user['admin'] < 1) {
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
$username = $input->input_post("username");
$idus = $input->input_post("idus");

if (!empty($username)) {
$sql_username = "AND name LIKE '%$username%'";
}
if (!empty($idus)) {
$sql_id = "AND( id LIKE '%$idus%' OR id LIKE '%$idus%' )";
}
$total_record = $db->fetch_row("SELECT COUNT(id) FROM accounts WHERE id != '0' $sql_username $sql_id LIMIT 1");
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
    $sql_get_list_mem = "SELECT * FROM `accounts` WHERE id != '0' $sql_username $sql_id ORDER BY `time` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                        <table  class="table table-bordered">
                             <thead><tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Cash</th>
                                    <th>Ngày tạo</th>
                                    <th class="text-center" style="width: 100px;">Thao tác</th>
                                </tr></thead>
                        <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get_list_mem, 0) as $key => $data){ 
?>


                             <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td><a href="http://facebook.com/<?php echo $data['username']; ?>" target="_blank" style="<?php echo($data['admin']=='1') ? "color: red;font-weight: bold;":""; ?>"><?php echo $data['name']; ?></a></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo number_format($data['cash'], 0, '.', '.'); ?><sup>vnđ</sup></td>
                                    <td><?php echo $data['time']; ?></td>
                                    <td class="text-center">
                                    <div class="btn-group"><a href="?act=edit&id=<?php echo $data['id']; ?>" target="_blank">
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sửa người dùng"><i class="fa fa-pencil"></i>Sửa</button>
                                    </a></div>
                                    </td>
                            </tr>



<?php 
$i++;
}
?>
                        </tbody>
                        
                        </table>
                    
<?php                     
echo $paging->html_member(); // page
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Không tìm thấy thành viên</p>
<?php
}
?>




