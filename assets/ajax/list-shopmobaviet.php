<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
if (!$user && $data_user['admin'] < 1) {
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
$id_post = $input->input_post("id");
$type_acc = $input->input_post("type_acc");



if (!empty($id_post)) {
$sql_id = "AND id_post = '$id_post'";
}
if (!empty($username)) {
$sql_type = "AND type_account = '$username'";
}


$total_record = $db->fetch_row("SELECT COUNT(id_post) FROM posts WHERE status = '0' $sql_id $sql_type LIMIT 1");
    // config phân trang
    $config = array(
      "current_page" => $page,
      "total_record" => $total_record,
      "limit" => "100",
      "range" => "5",
      "link_first" => "",
      "link_full" => "?page={page}"
    );
    
    $paging = new Pagination;
    $paging->init($config);
    $sql_get_list_buy = "SELECT * FROM `posts` WHERE status = '0' AND type_account='Liên Quân Mobile SHOP MOBAVIET' $sql_id $sql_type ORDER BY `date_posted` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
// Nếu có 
if ($total_record){
?>
                        <table  class="table table-bordered">
                             <thead><tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th style="width: 90px;">Mã Số</th>
                                    <th class="text-center" style="width: 70px;">Username</th>
                                    <th>LIST SKIN</th>
                                    <th>Giá tiền</th>
                                    <th style="width: 100px;">Ngày đăng</th>
                                    <th class="text-center" style="width: 100px;">Thao tác</th>
                        
                                </tr></thead>
                     <tbody> <p>  
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data){ 
    $info = $db->fetch_assoc("SELECT * FROM posts WHERE id_post = '".$data['id_post']."' LIMIT 1", 1); 
?>
    
        <?php
            echo $info['username']."|".$info['skins_count']."|".$info['ip_count']."|".$info[skins]."<br>";
        
        ?>
        
        
    

                            



<?php 
$i++;
}
?>
                       </p> </tbody>
                        
                        </table>
                    
<?php                     
echo $paging->html_acc(); // page
}else {
?>
<p class="content-mini content-mini-full bg-info text-white">Không tìm thấy tài khoản</p>
<?php
}
?>




