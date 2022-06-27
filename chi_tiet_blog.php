<?php
 
// Require database & th么ng tin chung
require_once 'core/init.php';
// Danh sach account


require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$alias = str_replace('/','', $_SERVER['REQUEST_URI']);
$blog =  $db->fetch_assoc("SELECT * FROM baiviet WHERE alias = '$alias' LIMIT 1", 1); 
if(count($blog) == 0){
   new Redirect($_DOMAIN); // Trở về trang index
        exit;
}
$title = $blog['title'];
$img_head = 'https://zendo.vn'.$blog['image'];
$data_seo = $blog;
// Require header
require_once 'includes/header-thu-van-may-9k.php';
require_once 'templates/products/chi_tiet_blog.php';

// Require footer
require_once 'includes/footer.php';
 
?>