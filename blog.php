<?php

// Require database & th么ng tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account


$sql_count = "SELECT * FROM baiviet";
$row = $db->num_rows($sql_count);

$sql_category = "SELECT * FROM chuyenmuc";
$count_category = $db->fetch_assoc($sql_category, 0);



?>

<link rel="stylesheet" href="/assets/css/sanacc/blog.css">

<div id="main_blog">
    <div class="main_blog">
        <div class="t_detail_link">
            <a class="t_link_detail" href="/">Trang chủ</a>
            <i class=" t_icon"></i>
            <a class="t_link_detail" href="/blog/">Blog</a>
        </div>

        <div class="blog_header">
            <h2>BLOG</h2>
            <div class="count_blog mb20">
                <img class="edit_btn" src="/images/sanacc/cayrank/edit.svg" alt="edit_icon">
                <span style="padding-left: 10px;"><?= $row ?> Bài viết</span>
            </div>

            <div class="des_header">
                <p>Zendo Blog mang đến cho bạn mọi thông tin, thủ thuật, mẹo chơi game của những tựa game hàng đầu như Liên Quân, Liên Minh, Fifa, Free Fire...</p>
            </div>
        </div>


        <div class="body_blog">
            <div class="content_blog">
                <div class="box_nav_list_dm">
                    <?php
                    foreach ($count_category as $key => $val) {
                        $sql_count_blog = "SELECT id FROM baiviet WHERE chuyenmuc = '{$val['id']}'";
                        $count_blog = $db->num_rows($sql_count_blog);
                    ?>
                        <div class="box_dm">
                            <a href="/blog/<?= $val['alias'] ?>" target="blank">
                                <img class="icon_category" src="/<?= $val['image'] ?>" alt="blog_img">
                                <p class="tit_category"><?= $val['name'] ?></p>
                                <div class="count_blog">
                                    <img class="edit_btn" src="/images/sanacc/cayrank/edit.svg" alt="edit_icon">
                                    <span style="padding-left: 10px;"><?= $count_blog ?> bài viết</span>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="title_box"><span>BÀI VIẾT MỚI NHẤT</span></div>

                <div class="box_list_blog">
                </div>

        

            </div>
        </div>

    </div>
</div>

<script>
    var page = 1;
    load_blog();

    function load_blog() {
        $.post("../assets/ajax/load_blog.php", {
                page: page,
            })
            .done(function(data) {
                $(".box_list_blog").html('');
                $('.box_list_blog').empty().append(data);
                $("#loading").hide();
                $(".box_list_blog").show();
            });
    }
</script>
<?php
// Require footer
require_once 'includes/footer.php';

?>