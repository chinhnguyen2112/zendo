<?php
// Kết nối database và thông tin chung//
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');


$id = $_POST['id'];

$sql_delete = "DELETE FROM cayrank WHERE id = '$id'";

$db->query($sql_delete);
$db->close();
$response = [
    'status' => 1,
    'mess' => 'Cập nhật thành công!',
];
echo json_encode($response);
?>