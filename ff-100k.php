<?php
 
// Require database & th么ng tin chung
require_once 'core/init.php';
new Redirect('/shop-free-fire/'); // Trở về trang index
exit;
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
require_once 'templates/products/ff-random-100k.php'; 

// Require footer
require_once 'includes/footer.php';
 
?>