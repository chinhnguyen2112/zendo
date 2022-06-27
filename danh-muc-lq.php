<?php

// Require database & th么ng tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account

$xss = new Anti_xss;

// $act = $xss->clean_up($_GET['act']);
$sql_count_lq = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile'";
$count_lq = $db->num_rows($sql_count_lq);

$sql_count_lq_9k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 9k'";
$count_lq_9k = $db->num_rows($sql_count_lq_9k);

$sql_count_lq_20k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 20k'";
$count_lq_20k = $db->num_rows($sql_count_lq_20k);

$sql_count_lq_50k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 50k'";
$count_lq_50k = $db->num_rows($sql_count_lq_50k);

$sql_count_lq_100k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 100k'";
$count_lq_100k = $db->num_rows($sql_count_lq_100k);

$sql_count_lq_200k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 200k'";
$count_lq_200k = $db->num_rows($sql_count_lq_200k);

$sql_count_lq_500k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 500k'";
$count_lq_500k = $db->num_rows($sql_count_lq_500k);
?>

<link rel="stylesheet" href="/assets/css/sanacc/css_danhmuc.css">

<?php
//include body
require_once 'danhmuc.php';
// Require footer
require_once 'includes/footer.php';

?>