<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');

$input = new Input;
$page = (int)$input->input_post("page");




$total_record = $db->fetch_row("SELECT COUNT(baiviet.id) FROM baiviet  ORDER BY id DESC ");
// config phân trang
$config = array(
    "current_page" => $page,
    "total_record" => $total_record,
    "limit" => "8",
    "range" => "5",
    "link_first" => "",
    "link_full" => "?page={page}"
);
$paging = new Pagination;
$paging->init($config);
$sql = "SELECT * FROM baiviet   ORDER BY id DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";


foreach ($db->fetch_assoc($sql, 0) as $key => $val) {

?>
        <a href="/<?= $val['alias'] ?>/" target="blank">
            <div class="box_blog">
                <div class="thumb_log">
                    <img src="<?php if($val['image'] != null){
                        echo $val['image'];
                    }else{
                        echo '/images/sanacc/bgr_home.jpg';
                    } ?>" alt="blog-img">
                </div>
                <div class="title_blog">
                    <p><?= $val['title'] ?></p>
                </div>
                <div class="des_blog">
                    <p><?= $val['meta_title'] ?></p>
                </div>
            </div>
        </a>






<?php }

echo $paging->html_blog(); // page


?>