<?php
error_reporting(0);
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$iduser = $data_user['username'];
$name = addslashes($data_user['name']);

function curl($url,$post = false,$ref = '', $cookie = false,$follow = false,$cookies = false,$header = true,$headers = false)
{
    $ch=curl_init($url);
    if($ref != '') {
        curl_setopt($ch, CURLOPT_REFERER, $ref);
    }
    if($cookie){
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if($cookies)
    {
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookies);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies);
    }
    if($post){
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    }
    if($follow) curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    if($header)     curl_setopt($ch, CURLOPT_HEADER, 1);
    if($headers)        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        //curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    $result[0] = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $result[1] = substr($result[0], $header_size);
    curl_close($ch);
    return $result;

}
function curl1($url,$post = false,$ref = '', $cookie = false,$cookies = false,$header = true,$headers = false,$follow = false)
{
    $ch=curl_init($url);
    if($ref != '') {
        curl_setopt($ch, CURLOPT_REFERER, $ref);
    }
    if($cookie){
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if($cookies)
    {
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookies);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies);
    }
    if($post){
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    }
      curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        //curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    $result[0] = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $result[1] = substr($result[0], $header_size);
    curl_close($ch);
    return $result;

}


function getcookie($content){
    preg_match_all('/Set-Cookie: (.*);/U',$content,$temp);
    $cookie = $temp[1];
    $cookies = "";
    $a = array();
    foreach($cookie as $c){
        $pos = strpos($c, "=");
        $key = substr($c, 0, $pos);
        $val = substr($c, $pos+1);
        $a[$key] = $val;
    }
    foreach($a as $b => $c){
        $cookies .= "{$b}={$c};";
    }
    return $cookies;
}
function remove_n($num){
    return preg_replace( '/[^0-9]/', '', $num);
}
function number_in_string($string){

	    try {

	        if (!is_string($string))
	            throw new Exception("Error : Param Type");


	        preg_match_all("/\d+/", $string, $matches);

	        // Return the all coincidences
	        return $matches[0];

	    } catch (Exception $e) {
	        echo $e->getMessage();
	    }

}

function card_type($stt){
	switch ($stt) {
		case "Vinaphone":
			$text = "VNP";
		break;
		case "Mobifone":
			$text = "VMS";
		break;
		case "Viettel":
			$text = "VTT";
		break;
		case "Gate":
			$text = "Gate";
		break;						
		default:
			// code...
		break;
	}
	return $text;
}





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


    
    

        $TxtCard  = remove_n($_GET['type']);
        $TxtMaThe = remove_n($_GET['code']);
        $TxtSeri  = remove_n($_GET['serial']);
        
        
        
        
 


		$result = curl("https://thecaosieure.com/dang-nhap?username=".$_GET['username']."&pass=".$_GET['pass']."&_=".$_GET['_']."",false,'',$_GET['cook'],true);
		if(!empty($result[1]) && $result[1] == "4"){
			$cookie = getcookie($result[0]);
			$result = curl("https://thecaosieure.com/null",false,'',$_GET['cook'],true);
			
/*			$result = curl("https://thecaosieure.com/home",false,'',$_GET['cook'],true);
*/


			$post = 'cardMerchantType='.$TxtCard.'&cardPinCode='.$TxtSeri.'&cardSerialNumber='.$TxtSeri.'';

			$result = curl('https://thecaosieure.com/nap-the-vien-thong',$post,'',$_GET['cook'],false);
			preg_match_all('/<span style = "color:Red;" >(.+?)<\/span>/', $result[1], $match);
			
			   
			if(!empty($match[1][0])){
				// Trả về trạng thái thẻ lỗi
				//$return = array('code'=>0,'message'=>$match[1][0]);
				$code = 0;
				$msg = $match[1][0];
			} else {
				// Trả về trạng thái thẻ đúng
				$matches = null;
				$returnValue = preg_match_all('/<span style = "color:Green; font-size: 13px;" >(.+?)<\\/span>/', $result[1], $matches);
				$str =  strip_tags($matches[1][0]);
				$explode = explode(".",$str);
				$cash = number_in_string($explode[0])[0];


				/*
				*     Ở đây chèn 1 hàm để cộng tiền
				*
 				*/
/*				$return = array('code'=>'01','message'=>$match[1][0],'data'=>array('price'=>$cash));
*/				$code = 1;
				$msg = $match[1][0];
				$tien = $cash;
				

			}

		} else {
		    $code = 0;
		    $msg = 'khong xac dinh';
		}


        

        
        

        
        
       
        


        if( $code == '01') { 
 
    // nap the thanh cong

            $info_card = $tien;
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
        echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => $err));
    
    }
    
}
}
?>