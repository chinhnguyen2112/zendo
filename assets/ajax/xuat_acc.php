<?php
//error_reporting( E_ALL );
//ini_set('display_errors', 1);

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');





$sql_get_list_acc = "SELECT * FROM accounts WHERE time > '2022-03-12 00:00:00'";
   
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=hehe.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo '<table border="1px solid black">';
        echo '<tr>';
        echo '<td><strong> STT </strong></td>';
        echo '<td><strong> ID </strong></td>';
        echo '<td><strong> Tên tài khoản </strong></td>';
        echo '<td><strong> Ngày đăng ký </strong></td>';
        echo '</tr>';
       foreach ($db->fetch_assoc($sql_get_list_acc, 0) as $key => $data){ 
            
            echo '<tr>';
            echo '<td>' . ++$key . '</td>';
            echo '<td>' . $data['id'] . '</td>';
            echo '<td>' . $data['username'] . '</td>';
            echo '<td>' . $data['time'] . '</td>';

            echo '</tr>';
        }
        echo '</table>';