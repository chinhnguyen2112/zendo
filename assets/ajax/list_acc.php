<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
if (!$user || $data_user['admin'] < 1) {
?>
    <p class="content-mini content-mini-full bg-warning text-white">Bạn chưa đăng nhập, không thể lấy thông tin</p>
<?php
    exit;
} elseif (!$_POST) {
    exit;
}

$iduser = $data_user['username'];
$input = new Input;
$page = (int)$input->input_post("page");
$id_post = $input->input_post("id");
$type_acc = $input->input_post("type_acc");
$name_acc = $input->input_post("name");



if (!empty($id_post)) {
    $sql_id = "AND id_post = '$id_post'";
}
if (!empty($type_acc)) {
    $sql_type = "AND type_account LIKE '%$type_acc%'";
}
if (!empty($name_acc)) {
    $sql_name = "AND username LIKE '%$name_acc%'";
}

$total_record = $db->fetch_row("SELECT COUNT(id_post) FROM posts WHERE status = '0' $sql_id $sql_type $sql_name LIMIT 1");
// config phân trang
$config = array(
    "current_page" => $page,
    "total_record" => $total_record,
    "limit" => "20",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page={page}"
);

$paging = new Pagination;
$paging->init($config);
$sql_get_list_buy = "SELECT * FROM `posts` WHERE status = '0' $sql_id $sql_type $sql_name ORDER BY `date_posted` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
$_SESSION['sql_get_list_buy'] =  "SELECT * FROM `posts` WHERE status = '0' $sql_id $sql_type $sql_name ORDER BY `date_posted` DESC ";
// Nếu có 
if ($total_record) {
?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th style="width: 90px;">Mã Số</th>
                <th class="text-center" style="width: 70px;">Username/Pwd</th>
                <th>Loại</th>
                <th>Giá bán</th>
                <th style="width: 100px;">Ngày đăng</th>
                <th class="text-center" style="width: 100px;">Thao tác</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data) {
                $info = $db->fetch_assoc("SELECT * FROM posts WHERE id_post = '" . $data['id_post'] . "' LIMIT 1", 1);
            ?>


                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><a href="<?php echo $_DOMAIN; ?>tai-khoan-<?php echo $data['id_post']; ?>/" title="<?php echo $info['type_account']; ?>" target="_blank">#<?php echo $data['id_post']; ?></a></td>
                    <td><?php echo $info['username']; ?>/<?php echo $info['password']; ?></td>
                    <td><a href="<?php echo $_DOMAIN; ?>tai-khoan-<?php echo $data['id_post']; ?>/" target="_blank"><?php echo $info['type_account']; ?></a></td>
                    <td><?php echo number_format($data['price'], 0, '.', '.'); ?>đ</td>
                    <td><?php echo $data['date_posted']; ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="?act=edit_acc&id=<?php echo $data['id_post']; ?>" target="_blank">
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sửa tài khoản"><i class="fa fa-pencil"></i>Sửa</button>
                            </a>
                            <a href="#" onclick="delete_acc(<?php echo $data['id_post']; ?>)">
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Xóa tài khoản"><i class="fa fa-times"></i>Xóa</button>
                            </a>
                        </div>
                    </td>
                </tr>



            <?php
                $i++;
            }
            ?>
        </tbody>

    </table>

<?php
    echo $paging->html_acc(); // page
} else {
?>
    <p class="content-mini content-mini-full bg-info text-white">Không tìm thấy tài khoản</p>
<?php
}
?>