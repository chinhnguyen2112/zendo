<?php

// Require các thư viện PHP
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/classes/DB.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/classes/Session.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/classes/Functions.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/classes/Pagination.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/classes/Facebook/autoload.php');
 require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/classes/Firewall.php');
//  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/classes/simple_html_dom.php');
 require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/classes/simple_html_dom_helper.php');

// Kết nối database
$db = new DB();
$db->connect();
$db->set_char('utf8');

// Facebook config
$app_id ='931228257497467';
$app_secret ='8240aa0d9e08e25b80ba5033b9b5a548';
$default_access_token ='931228257497467|8240aa0d9e08e25b80ba5033b9b5a548'; // appid|secret

// Thông tin chung
$_DOMAIN = 'https://zendo.vn/';


date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$date_current = '';
$date_current = date("Y-m-d H:i:sa");


// Khởi tạo session
$session = new Session();
$session->start();
 
// Kiểm tra session
if ($session->get() != '')
{
    $user = $session->get();
}
else
{
    $user = '';
}
// Nếu đăng nhập
if ($user)
{
    // Lấy dữ liệu tài khoản
    $sql_get_data_user = "SELECT * FROM accounts WHERE username = '$user'";
    if ($db->num_rows($sql_get_data_user))
    {
        $data_user = $db->fetch_assoc($sql_get_data_user, 1);
    }
} 

    // Lấy dữ liệu thông tin trang web đã cài đặt
    $sql_get_data_site = "SELECT * FROM settings";
    if ($db->num_rows($sql_get_data_site))
    {
        $data_site = $db->fetch_assoc($sql_get_data_site, 1);
    }
