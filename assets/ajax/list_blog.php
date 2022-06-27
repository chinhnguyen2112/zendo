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
$id_category = $input->input_post("id_category");

if ($id_category == 0) {
    $total_record = $db->fetch_row("SELECT COUNT(id) FROM baiviet");
} else {
    $total_record = $db->fetch_row("SELECT COUNT(id) FROM baiviet WHERE chuyenmuc = '$id_category'");
}

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
if ($id_category == 0) {
    $sql_get_list_buy = "SELECT * FROM `baiviet` ORDER BY `id` DESC  LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
} else {
    $sql_get_list_buy = "SELECT * FROM `baiviet` WHERE chuyenmuc = '$id_category' ORDER BY `id` DESC  LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
}
// $_SESSION['sql_get_list_buy'] =  "SELECT * FROM `baiviet`  ORDER BY `id` DESC ";
// Nếu có 
if ($total_record) {
?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">STT</th>
                <th style="width: 90px;">ID</th>
                <th class="text-center" style="width: 70px;">Title</th>
                <th style="width: 100px;"> ID Chuyên mục</th>
                <th style="width: 100px;">Ngày đăng</th>
                <th style="width: 30px;">Sửa</th>

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
                    <td class="text-center"><?php echo $data['id']; ?></td>
                    <td><a href="/<?= $data['alias']; ?>/" target="_blank"><?= $data['title'] ?></a></td>
                    <td><?= $data['chuyenmuc'] ?></td>
                    <td><?php echo date('d/m/Y', $data['created_at']) ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="?act=add_blog&id=<?php echo $data['id']; ?>" target="_blank">
                                <button style="font-size: 16px;" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sửa tài khoản"><i class="fa fa-pencil"></i> Sửa</button>
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