<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');

$id = trim(htmlspecialchars(addslashes($_POST['id'])));
$name_discount = trim(htmlspecialchars(addslashes($_POST['name_discount'])));
$value = trim(htmlspecialchars(addslashes($_POST['value'])));
$value_use = trim(htmlspecialchars(addslashes($_POST['value_use'])));
$amount = ($_POST['amount'] == '')? null :$_POST['amount'];
$created_at = $updated_at = time();

if ($id > 0) {
    $sql = "UPDATE discount SET
    name = '$name_discount',
    amount = '$amount',
    value = '$value',
    value_use = '$value_use',
    updated_at = '$updated_at'
    WHERE id = $id
    ";
    $db->query($sql);
    $response = [
        'status' => 1,
        'mess' => 'Cập nhật thành công!',
    ];
    

} else {
    $sql = "INSERT INTO discount (name, amount, value, value_use, created_at, updated_at) VALUES ('$name_discount', '$amount', '$value', '$value_use', '$created_at', '$updated_at')";
    $db->query($sql);
    $response = [
        'status' => 1,
        'mess' => 'Cập nhật thành công!',
    ];
}

new Redirect('/admin/?act=discount'); // về danh sách
