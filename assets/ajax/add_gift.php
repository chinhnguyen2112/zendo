<?php


// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
// Nếu đăng nhập
if ($user && $data_user['admin'] > 0) {
    $id = trim(htmlspecialchars(addslashes($_POST['id'])));
    $name_gift = trim(htmlspecialchars(addslashes($_POST['name'])));
    $type = trim(htmlspecialchars(addslashes($_POST['type'])));
    $vip = trim(htmlspecialchars(addslashes($_POST['vip'])));
    $stt = trim(htmlspecialchars(addslashes($_POST['stt'])));
    $zen = trim(htmlspecialchars(addslashes($_POST['zen'])));
    $value = trim(htmlspecialchars(addslashes($_POST['value'])));
    $value_use = trim(htmlspecialchars(addslashes($_POST['value_use'])));
    $type_item = trim(htmlspecialchars(addslashes($_POST['type_item'])));
    $des = trim(htmlspecialchars(addslashes($_POST['des'])));
    if ($id > 0) {
        $sql_1 = "SELECT * FROM gift  WHERE id ='$id'";
        if ($db->num_rows($sql_1)) {
            $data_1 = $db->fetch_assoc($sql_1, 1);
            $url_img = $data_1['image'];
        }
    }
    if (isset($_FILES['image']) && $_FILES['image']['name'] !== "") {
        $path = '../img_gift/'; // patch lưu file
        $tmp_name = $_FILES["image"]["tmp_name"];
        $name = $_FILES["image"]["name"];
        $temp            = explode('.', $name);
        move_uploaded_file($_FILES["image"]["tmp_name"], $path . "$name");
        $url_img = 'assets/img_gift/' . $name;
    }
    if ($id > 0) {
        $sql_add_post = "UPDATE gift SET 
            name = '$name_gift',
            image = '$url_img',
            type = '$type',
            vip = '$vip',
            stt = '$stt',
            type_item = '$type_item',
            value = '$value',
            value_use = '$value_use',
            zen = '$zen',
            des = '$des'
        WHERE id = '$id'
    ";
    } else {
        $sql_add_post = "INSERT INTO gift (name,image,type,vip,stt,type_item,value,value_use,zen,des) VALUES (
                        '$name_gift',
                        '$url_img',
                        '$type',
                        '$vip',
                        '$stt',
                        '$type_item',
                        '$value',
                        '$value_use',
                        '$zen',
                        '$des'
                    )";
    }
    $db->query($sql_add_post);
    $db->close();
    new Redirect("/admin?act=gift");
} else {
    new Redirect("/admin?act=gift");
}
