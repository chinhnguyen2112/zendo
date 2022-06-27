<?php
error_reporting(0);
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$iduser = $data_user['username'];
$name = addslashes($data_user['name']);
define('CORE_API_HTTP_USR', 'merchant_19002');
define('CORE_API_HTTP_PWD', '19002mQ2L8ifR11axUuCN9PMqJrlAHFS04o');

$bk = 'http://napngay.com/services/restFul/send';



//Mã MerchantID dang kí trên Bảo Kim
$merchant_id = '33102';
//Api username 
$api_username = 'lienquanmobilevn';
//Api Pwd d
$api_password = 'PdxDBFDtV5F6fCNzhf6z';
//Mã TransactionId 
$transaction_id = time();
//mat khau di kem ma website dang kí trên B?o Kim
$secure_code = '393780eb1889fec3';



if (!$user) {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập"));
} else {
    

        if (!$_GET['type']) {
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Chưa chọn loại nhà mạng"));
        }elseif (!$_GET['code']) {
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Chưa nhập mã thẻ"));
        }elseif (!$_GET['serial']) {
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Chưa nhập mã seri"));
        }else if(strlen($_GET['serial']) < 7){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Độ dài ko hợp lệ"));
        }else if(strlen($_GET['code']) < 7){

          echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Độ dài ko hợp lệ"));

        } else {


    
    

        $TxtCard  = $_GET['type'];
        $TxtMaThe = $_GET['code'];
        $TxtSeri  = $_GET['serial'];
        
        
        
        
 
$arrayPost = array(
	'merchant_id'=>$merchant_id,
	'api_username'=>$api_username,
	'api_password'=>$api_password,
	'transaction_id'=>$transaction_id,
	'card_id'=>$TxtCard,
	'pin_field'=>$TxtMaThe,
	'seri_field'=>$TxtSeri,
	'algo_mode'=>'hmac'
);

ksort($arrayPost);

$data_sign = hash_hmac('SHA1',implode('',$arrayPost),$secure_code);

$arrayPost['data_sign'] = $data_sign;

$curl = curl_init($bk);

curl_setopt_array($curl, array(
	CURLOPT_POST=>true,
	CURLOPT_HEADER=>false,
	CURLINFO_HEADER_OUT=>true,
	CURLOPT_TIMEOUT=>30,
	CURLOPT_RETURNTRANSFER=>true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTPAUTH=>CURLAUTH_DIGEST|CURLAUTH_BASIC,
	CURLOPT_USERPWD=>CORE_API_HTTP_USR.':'.CORE_API_HTTP_PWD,
	CURLOPT_POSTFIELDS=>http_build_query($arrayPost)
));

$data = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$result = json_decode($data,true);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = time();
//$time = time();
if($status==200){
    $info_card = $result['amount'];

 
    // nap the thanh cong

            if($info_card == 10000){
                $vnd = 10000;
            }elseif($info_card == 20000){
                $vnd = 20000;
            }elseif($info_card == 30000){
                $vnd = 30000;
            }elseif($info_card == 50000){
                $vnd = 50000;
            }elseif($info_card == 100000){
                $vnd = 100000;
            }elseif($info_card == 200000){
                $vnd = 200000;
            }elseif($info_card == 300000){
                $vnd = 300000;
            }elseif($info_card == 500000){
                $vnd = 500000;
            }elseif($info_card == 1000000){
                $vnd = 1000000;
            }else{
                $vnd = 0;
            }
            if($info_card == 50000){
        	$db->query("UPDATE `accounts` SET `point` = `point` + '1' WHERE `username` = '{$iduser}'");
            }elseif($info_card == 100000){
        	$db->query("UPDATE `accounts` SET `point` = `point` + '2' WHERE `username` = '{$iduser}'");
            }elseif($info_card == 200000){
        	$db->query("UPDATE `accounts` SET `point` = `point` + '4' WHERE `username` = '{$iduser}'");
            }elseif($info_card == 500000){
        	$db->query("UPDATE `accounts` SET `point` = `point` + '10' WHERE `username` = '{$iduser}'");
            }elseif($info_card == 1000000){
        	$db->query("UPDATE `accounts` SET `point` = `point` + '30' WHERE `username` = '{$iduser}'");
            }else{
            #nothing    
            }
            $now = getdate();
        	$db->query("UPDATE `accounts` SET `cash` = `cash` + $vnd WHERE `username` = $iduser");// cộng tiền
            $db->query("INSERT INTO `history_card` (username,name,type_card,count_card,time) VALUES ('$iduser','$name','$TxtCard','$vnd','$date_current')");// lịch sử
            
        echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "Nạp thẻ thành công"));
    }
    else {
        $err = isset($msg) ? $msg : 'Loi khong xac dinh';
        echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' =>  $result['errorMessage']));
    
    }
    
}
}
?>