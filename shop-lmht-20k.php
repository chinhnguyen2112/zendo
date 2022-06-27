<?php
 
// Require database & th么ng tin chung
require_once 'core/init.php';
new Redirect('/vong-quay-lien-quan/'); // Trở về trang index
exit;
// Require header
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account

$xss = new Anti_xss;

// $act = $xss->clean_up($_GET['act']);

require_once 'templates/products/lmht-20k.php'; 

// Require footer
require_once 'includes/footer.php';
 
?>