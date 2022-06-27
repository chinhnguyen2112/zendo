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
                        <table  class="table table-bordered">
                             <thead><tr>
                                 <th>Hành động</th>
                                    <th class="text-center" style="width: 50px;">Mã</th>
                                    <!--<th>Mã tài khoản</th>-->
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Giá tiền</th>
                                    <th>Thời gian</th>
                                    

                                </tr></thead>
                        <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data_buy){ 
    $info = $db->fetch_assoc("SELECT * FROM posts WHERE id_post = '".$data_buy['id_post']."' LIMIT 1", 1); 
    $status =  $data_buy['status'];
?>
 

                             <tr><td>
                                        <?php if($data_buy['status'] == 0){?>
                                            
                                        
                                        <button type="submit" data-pass="<?=preg_replace('/\s+/','',$info['password'])?>" data-ida="<?=$data_buy['id_post']; ?>" id="sub" form="form1" class="btn btn-sm btn-success"><i class="fa fa-plus push-5-r"></i> Check Acc</button>
                                        
                                        <?php } ?>
                                        <?php if($data_buy['status'] == 1){?>
                                            
                                        
                                       <?php echo("Đã check xong")?>
                                        
                                        <?php } ?>
                                        
                                        </td>
                                    <!--<td class="text-center"><?php echo $i; ?></td>-->
                                    <td>
                                        <!--<?php echo $info['type_account']; ?> -->
                                        #<?php echo $data_buy['id_post']; ?></td>
                                    <?php /*echo ($status == 0 ? "Vui lòng  nhấn check acc" : ($status == 1 ? $info['username'] : "Acc lỗi vui lòng pm admin")); */?>
                                    <td><?php  echo ($status == 0 ? "Vui lòng  ấn check acc" : ($status == 1 ? $info['username'] :
                                   "Acc lỗi vui lòng nhắn tin Admin để được hoàn lại tiền"
                                    )); ?></td>
                                                                        <td><?php  echo ($status == 0 ? "Vui lòng  nhấn check acc" : ($status == 1 ? $info['password'] :"Acc lỗi vui lòng nhắn tin Admin để được hoàn lại tiền"
                                                                        )); ?></td>

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
<p class="content-mini content-mini-full bg-info text-white">Bạn chưa có giao dịch nào</p>
<?php
}
?>


<script src="/assets/garenaweb-utils.min.js"></script>

<script type="text/javascript">
function RSA(plaintext) {
    var before = new Date();
    var rsa = new RSAKey();
    var n = 'D1EC51E7CEA07CB3233ADA6009006EF3EBF89EFD5CF77AAD211051D008077DC7142872B8C36EE971D4B368C79C13A6BBCB89B551A8308C68F71764C1519DEAD90B560E126B365375700CC5A2E6CF81E2A0FEEA31B53C1F8D3F3AE522DF9AB19B5C0C391D997D6DE56807328B9BBD5F6D08EA47614060177E12F65BDB95D5D6E3';
    var e = '10001';
    rsa.setPublic(n, e);
    var currentTime = new Date()
    var timestamp = currentTime.getTime();
    var plain_dict = new Object();
    plain_dict['timestamp'] = parseInt(timestamp / 1000, 10);
    plain_dict['password'] = plaintext;
    var res = rsa.encrypt(JSON.stringify(plain_dict));
    return res;
}



</script>


<script>
        $(document).on('click', '#sub',function (e){
          e.preventDefault();
    
          var $target = $(e.target);
          
          var idacc = $target.data('ida');
          var pass = $target.data('pass');

             swal({   
                title: "Vui lòng đợi",   
                text: "Hệ thống đang kiểm tra tài khoản. Vui lòng không tắt trình duyệt",   
                type: "warning",   
                showConfirmButton:false,

             });
                $.post('/assets/ajax/check-pass.php?action=check_login&id=', {
                    id: idacc,
                    rsapass: RSA(pass)
                }, function(res) {
                    //swal.close(); 
                    $.post('/assets/ajax/check-pass.php?action=update_acc&id=' + idacc, {
                        error: res.err
                    }, function(data1) {
                        
                        if(data1.err == 1){
                             swal({
                                title: 'THÔNG TIN TÀI KHOẢN CHƯA ĐÚNG',
                                type: 'error',
                                text: "VUI LÒNG LIÊN HỆ ADMIN"
                               
                               
                            });
                           
                        } else if(data1.err == 0) {
                                         swal({
                                     title: 'Giao dịch hoàn tất',
                                                        type: 'success',
                                                        text: "Giao dịch đã được duyệt, hãy load lại trang để nhận tài khoản và mật khẩu !"
                                         }, function() {
                                window.location = "https://lienquanmobile.vn/transaction.html";
                            });
                                                    
                                                    
                        }               
     
                    }, 'json');
                    
                }, 'json');
                
  
                



        
            
        });

</script>



