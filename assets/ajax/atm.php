<?php
error_reporting(0);
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$iduser = $data_user['username'];
$name = addslashes($data_user['name']);

function verifyResponseUrl($url_params = array())
	{
		if(empty($url_params['checksum'])){
			echo "invalid parameters: checksum is missing";
			return FALSE;
		}

		$checksum = $url_params['checksum'];
		unset($url_params['checksum']);

		ksort($url_params);

		if(strcasecmp($checksum,hash_hmac('SHA1',implode('',$url_params),'393780eb1889fec3'))===0)
			return TRUE;
		else
			return FALSE;
}
	
	
	

    if (!$user) {
        
        echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập"));
    } else {
    if(verifyResponseUrl($_GET)){
    echo 'Nạp tiền thành công';    

    $uid = substr($_GET['customer_phone'], 2);
    
    if($_GET['transaction_status'] == 4){
        $count = $db->fetch_row("SELECT COUNT(id) FROM history_card WHERE seri = '{$_GET['transaction_id']}' LIMIT 1");

        if($count == 0){
        $date = date("H:i Y-m-d");
        $TxtMaThe = $_GET['order_id'];
        $TxtSeri = $_GET['transaction_id'];
        $amount = $_GET['net_amount'] + $_GET['fee_amount'];
        $thucnhan = $amount * 100 / 80;

        $db->query("UPDATE `accounts` SET `cash` = `cash` + $thucnhan WHERE `username` = $iduser");// cộng tiền
        $db->query("INSERT INTO `history_card` (username,seri,code,name,menhgia,type_card,count_card,time) VALUES ('$iduser','$TxtSeri','$TxtMaThe','$name','$amount','ATM','$amount','$date_current')");// lịch sử
        }
    }
    }
    }





?>