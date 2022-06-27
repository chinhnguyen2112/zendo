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
$id_user = $input->input_post("id_user");
$name_gift = $input->input_post("name_gift");


if (!empty($id_user)) {
    $sql_id = "AND id_user = '$id_user'";
}
if (!empty($name_gift)) {
    $sql_name = "AND name LIKE '%$name_gift%'";
}

$total_record = $db->fetch_row("SELECT COUNT(history_gift.id) FROM history_gift INNER JOIN gift ON history_gift.id_gift = gift.id WHERE  1=1 $sql_id $sql_name ORDER BY history_gift.id DESC ");
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
$sql = "SELECT history_gift.*,name, gift.type as gift_type,zen FROM history_gift INNER JOIN gift ON history_gift.id_gift = gift.id WHERE 1=1    $sql_id $sql_name  ORDER BY history_gift.id DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record) {
?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th style="width: 90px;">ID</th>
                <th class="text-center" style="width: 70px;">Loại vòng quay</th>
                <th>Phần thưởng</th>
                <th style="width: 100px;">ID Gift</th>
                <th class="text-center" style="width: 100px;">Thời gian quay</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($db->fetch_assoc($sql, 0) as $key => $val) {
                if ($val['gift_type'] == 'luotquay') {
                    $type =   " Vòng quay siêu phẩm";
                } else if ($val['gift_type'] == 'luotquay_free') {
                    $type =   " Vòng quay nhiệm vụ";
                } else if ($val['gift_type'] == 'luotquay9k') {
                    $type =   " Vòng quay quân huy";
                } else if ($val['gift_type'] == 'luotquay20k') {
                    $type =   " Vòng quay trang phục";
                }
            ?>


                <tr>
                    <td class="td_stt"><?= ++$key ?></td>
                    <td><?= $val['id_user'] ?></td>
                    <td><?= $type ?></td>
                    <td><?= $val['name'] ?> <?= $btn ?> </td>
                    <td><?= $val['id_gift'] ?></td>
                    <td><?= date('d-m-Y H:i:s', $val['created_at']) ?></td>
                </tr>



            <?php
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