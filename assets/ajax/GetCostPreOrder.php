<?php
    // Kết nối database và thông tin chung
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');

    $id = trim(addslashes(htmlspecialchars($_GET['id'])));
    $sql_get_data = "SELECT * FROM posts WHERE id_post = '{$id}' AND `status` = '0' LIMIT 1";
    $info = $db->fetch_assoc($sql_get_data, 1); 
    if ($db->num_rows($sql_get_data) > 0) {
    switch ($_GET['days']) {
    	case '2':
    		$phantram = 20;
    		break;
    	case '3':
    		$phantram = 30;
    		break;
    	case '5':
    		$phantram = 40;
    		break;
    	case '7':
    		$phantram = 50;
    		break;			
    	default:
    		$phantram = 100;
    		break;
    }

    $price = ($phantram / 100) * $info['price']; /// số tiền trả trước
    $show = number_format(round($price), 0, '.', '.');

    echo json_encode(array('error' => "false", 'cost' => $show));
	}else{
    echo json_encode(array('error' => "true"));   		
	}