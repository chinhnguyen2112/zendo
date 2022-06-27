<?php
// Kết nối database và thông tin chung//
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');

$type = $_POST['type'];
$id = $data_user['id'];
$tien_chon_rank = $_POST['tien_chon_rank'];
    if($type == 1) {
        $sql = "SELECT * FROM cayrank WHERE user_id = $id ";
        $row = $db->fetch_assoc($sql, 0);
        if(count($row) == 0) {
            $dis_20k = $tien_chon_rank - 20000;
            
            $response = [
                'status' => 1,
                'dis_20k' => $dis_20k,
            ];
        }else {
            $response = [
                'status' => 0,
            ];
        }
    }

    
    echo json_encode($response);
?>