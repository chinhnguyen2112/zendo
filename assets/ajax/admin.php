<?php
// Kết nối database và thông tin chung//
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');

$id = $_POST['id'];
$type = $_POST['type'];
$updated_at = time();

if($type == 1) {
    $sql = "UPDATE history_vp SET
    type = 1,
    updated_at = $updated_at
    WHERE id = $id ";
    $db->query($sql);
    $response = [
        'status' => 1,
        'mess' => 'Cập nhật thành công!',
    ];

}else {
    $sql = "UPDATE history_vp SET
    type = 2,
    updated_at = $updated_at
    WHERE id = $id ";

$db->query($sql);
$db->close();
$response = [
    'status' => 1,
    'mess' => 'Cập nhật thành công!',
];
}

echo json_encode($response);

?>