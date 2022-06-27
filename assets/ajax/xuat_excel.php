<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');


$iduser = $data_user['username'];



    $sql_get_list_buy =  $_SESSION['sql_get_list_buy'];
    
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=hehe.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo '<table border="1px solid black">';
        echo '<tr>';
        echo '<td><strong> STT </strong></td>';
        echo '<td><strong> Mã số </strong></td>';
        echo '<td><strong> Tên tài khoản </strong></td>';
        echo '<td><strong> Mật khẩu </strong></td>';
        echo '<td><strong> Giá </strong></td>';
        echo '<td><strong> Số skin </strong></td>';
        echo '<td><strong> Số tướng </strong></td>';
        echo '<td><strong> Loại acc </strong></td>';
        echo '</tr>';
       foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data){ 
    $info = $db->fetch_assoc("SELECT * FROM posts WHERE id_post = '".$data['id_post']."' LIMIT 1", 1);
            
            echo '<tr>';
            echo '<td>' . ++$key . '</td>';
            echo '<td>' . $data['id_post'] . '</td>';
            echo '<td>' . $info['username'] . '</td>';
            echo '<td>' . $info['password'] . '</td>';
            echo '<td>' . number_format($data['price'], 0, '.', '.') . '</td>';
            echo '<td>' . $info['skins_count'] . '</td>';
            echo '<td>' . $info['champs_count'] . '</td>';
            echo '<td>' . $info['type_account'] . '</td>';

            echo '</tr>';
        }
        echo '</table>';

?>




