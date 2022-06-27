<?php
 
// Require database & thông tin chung
require_once 'core/init.php';
// new Redirect('/shop-lien-minh-huyen-thoai/'); // Trở về trang index
// exit;
// Require header
$title="Shop Liên Minh Tốc Chiến - Uy tín - Chất lượng";
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account

$xss = new Anti_xss;

// $act = $xss->clean_up($_GET['act']);

require_once 'templates/products/lmtc.php'; 

// Require footer
require_once 'includes/footer.php';
 
?>