<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
$id = trim(htmlspecialchars(addslashes($_POST['id'])));
$name_category = trim(htmlspecialchars(addslashes($_POST['name_category'])));
$alias = trim(htmlspecialchars(addslashes($_POST['alias'])));
$created_at = $updated_at = time();

if (isset($_FILES['image'])   && $_FILES['image']['name'] !== "") {
    $path = '../user/chuyenmuc/'; // patch lưu file
    $tmp_name = $_FILES["image"]["tmp_name"];
    $name = $_FILES["image"]["name"];
    $temp            = explode('.', $name);
    move_uploaded_file($_FILES["image"]["tmp_name"], $path . "$name");
    $url_img = 'assets/user/chuyenmuc/' . $name;
}

if ($id > 0) {
    $sql = "UPDATE chuyenmuc SET
    name = '$name_category',
    alias = '$alias',
    image = '$url_img',
    updated_at = '$updated_at'
    WHERE id = $id
    ";
    $db->query($sql);
    $db->close();
    $response = [
        'status' => 1,
        'mess' => 'Cập nhật thành công!',
    ];
    

} else {
    $sql = "INSERT INTO chuyenmuc (name, alias, image, created_at, updated_at) VALUES ('$name_category', '$alias', '$url_img', '$created_at', '$updated_at')";
    $db->query($sql);
    $db->close();
    $response = [
        'status' => 1,
        'mess' => 'Cập nhật thành công!',
    ];
}

new Redirect('/admin/?act=category'); // về danh sách
