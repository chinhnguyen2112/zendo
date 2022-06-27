<?php
 
// Require database & thông tin chung
require_once 'core/init.php';
// Require header
$title="Shop Fifa Online - Uy tín - Chất lượng";
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account

$xss = new Anti_xss;

// $act = $xss->clean_up($_GET['act']);

require_once 'templates/products/fifa.php'; 

// Require footer
require_once 'includes/footer.php';
 
?>