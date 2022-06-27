<?php
error_reporting(0);
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$iduser = $data_user['username'];
$name = addslashes($data_user['name']);

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

function curl($url,$post = false,$ref = '', $cookie = false,$headers = false,$cookies = false,$header = true,$follow = false)
{
    $ch=curl_init($url);
    if($cookie){
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if($post){
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    }
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
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
        // }else if(strlen($_GET['serial']) < 7){
        //     echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Độ dài ko hợp lệ"));
        }else if(strlen($_GET['code']) < 7){

          echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "không đúng định dạng"));

        } else {


    function remove_n($num){
    return preg_replace( '/[^0-9]/', '', $num);
}
    

        $TxtCard  = $_GET['type'];
        $menhgia  = $_GET['menhgia'];
        $TxtMaThe = $_GET['code'];
        $TxtSeri  = $_GET['serial'];
          if (!$_GET['type']) {
            echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Chưa chọn loại nhà mạng"));
                              die();

                }elseif (!$_GET['code']) {
                    echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Chưa nhập mã thẻ"));
                                      die();

                }elseif (!$_GET['serial']) {
                    echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Chưa nhập mã seri"));
                                      die();

                }else if(strlen($_GET['serial']) < 7){
                    echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Độ dài ko hợp lệ"));
                                      die();

                }else if(strlen($_GET['code']) < 7){
        
                  echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Độ dài ko hợp lệ"));
                  die();
        
                } else if($_GET['type'] != '4' && (!is_numeric($_GET['code']) || !is_numeric($_GET['serial']))){
                  echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Độ dài ko hợp lệ"));
                                      
                  die();
        
                    
                }
        $count = $db->fetch_row("SELECT COUNT(id) FROM history_card WHERE seri = '{$TxtSeri}' AND code = '{$TxtMaThe}' LIMIT 1");
        


	$post = 'type='.$TxtCard.'&code='.$TxtMaThe.'&serial='.$TxtSeri;
    $result = curl('https://doicard.vn/nap/mphamngoc95.html');
    $cookie = getcookie($result[0]);
    $result = curl('https://doicard.vn/nap/mphamngoc95.html',$post,'',$cookie);
    
    preg_match_all('/<div class="alert alert-info">(.+?)<button aria-hidden="true" data-dismiss="alert" class="close" type="button">x<\/button>(.+?)<\/div>/s',$result[1],$matches);
    $status = 0;
    
    if(preg_match('<br>',$matches[0][0])) $status = 1;
    $ok =  $matches[2][0];



	
	
        if( $count == 0 && $status == 1) { 
 
    // nap the thanh cong
        preg_match_all('/<div class="alert alert-info">(.+?)<button aria-hidden="true" data-dismiss="alert" class="close" type="button">x<\/button>(.+?)<br>/s',$result[1],$matches1);
        $info_card =  implode('',number_in_string($matches1[2][0]));
        $menhgia = $info_card;

	
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
            $db->query("INSERT INTO `history_card` (username,seri,code,name,menhgia,type_card,count_card,time,status) VALUES ('$iduser','$TxtSeri','$TxtMaThe','$name','$menhgia','$TxtCard','$vnd','$date_current','')");// lịch sử
            
        echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "Nạp thẻ thành công".$vnd));
    }
    else {
        $db->query("INSERT INTO `history_card` (username,seri,code,name,menhgia,type_card,count_card,time,status) VALUES ('$iduser','$TxtSeri','$TxtMaThe','$name','$menhgia','$TxtCard','$vnd','$date_current','thẻ lỗi')");// lịch sử

        $err = isset($ok) ? $ok : 'Thẻ bị trùng, vui lòng nhập thẻ khác';
        echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' =>$err));
    
    }
    
}
}
?>