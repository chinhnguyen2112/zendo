<?php

// Require database & th么ng tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
$id = $data_user['id'];
$sql = "SELECT history_vp.*, gift.name, gift.id as id_gift
FROM history_vp
INNER JOIN gift
ON history_vp.id_item=gift.id";
$count = $db->fetch_assoc($sql, 0);

?>
<link rel="stylesheet" href="/assets/css/sanacc/admin.css?v=<?= time() ?>">
<div id="progress_ranking">
    <div class="progress_box">
        <!-- header box -->
        <div class="progress_box_header">
            <h2>THEO DÕI THÔNG TIN ĐƠN HÀNG </h2>
            <div class="progress_search">
                <input type="text" name="" placeholder="Tìm kiếm" id="">
                <img src="/images/sanacc/cayrank/icon_search.svg" alt="icon_search">
            </div>
        </div>

        <!-- body box -->
        <div class="progress_box_main">
            <div class="progress_box_title">
                <div class="content_1">
                    <p class="content_title">#</p>
                </div>

                <div class="content_2">
                    <p class="content_title">ID</p>

                </div>

                <div class="content_3">
                    <p class="content_title">USERNAME</p>

                </div>

                <div class="content_4">
                    <p class="content_title">ID VẬT PHẨM</p>

                </div>

                <div class="content_5">
                    <p class="content_title">TÊN VẬT PHẨM</p>
                </div>

                <div class="content_6">
                    <p class="content_title">SỐ LƯỢNG</p>
                </div>

                <div class="content_7">
                    <p class="content_title">NGÀY YÊU CẦU</p>

                </div>

                <div class="content_8">
                    <p class="content_title">NGÀY CẬP NHẬT</p>

                </div>

              <!--   <div class="content_9">
                    <p class="content_title">CÀY SIÊU TỐC</p>

                </div>

                <div class="content_10">
                    <p class="content_title">CHƠI CÙNG BOOSTER</p>

                </div> -->

                <div class="content_11">
                    <p class="content_title">TRẠNG THÁI</p>

                </div>

                <!-- <div class="content_12">
                    <p class="content_title">TIẾN ĐỘ CÀY</p>

                </div> -->

                <div class="content_13">
                    <p class="content_title">HÀNH ĐỘNG</p>
                </div>
            </div>
            <?php foreach ($count as $key => $val) { ?>
                <div class="progress_box_body">
                    <div class="content_1">
                        <p><?= ++$key ?></p>

                    </div>

                    <div class="content_2">
                        <p><?= $val['id'] ?></p>

                    </div>

                    <div class="content_3">
                    <p><?= $val['id_user'] ?></p>

                    </div>

                    <div class="content_4">
                        <p><?= $val['id_item'] ?></p>

                    </div>

                    <div class="content_5">
                    <p><?= $val['name'] ?></p>
                    </div>


                    <div class="content_6">
                        <p><?= $val['count'] ?></p>
                    </div>

                    <div class="content_7">
                        <p><?= date('d-m-Y', $val['created_at']) ?></p>
                    </div>

                    <div class="content_8">
                        <p><?= date('d-m-Y', $val['updated_at']) ?></p>
                    </div>

                   <!--  <div class="content_9">
                        <p></p>
                    </div>

                    <div class="content_10">
                        <p></p>
                    </div> -->

                    <div class="content_11">
                        <p><?php if ($val['type'] == 0) {
                                        echo 'Chưa duyệt';
                                    } else if($val['type'] == 1) {
                                        echo 'Đã duyệt';
                                    }else {
                                        echo 'Từ chối';
                                    } ?></p>
                    </div>

                    <!-- <div class="content_12">
                        <p></p>
                    </div> -->

                    <div class="content_13">
                        <div class="progress_action">
                            <img class="edit_btn" data-id="<?= $val['id'] ?>" src="/images/sanacc/cayrank/tick-circle.svg" alt="edit_icon">
                            <img class="trash_btn" data-id="<?= $val['id'] ?>" src="/images/sanacc/cayrank/close-circle.svg" alt="trash_icon">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>


    </div>
</div>

<?php
// Require footer
require_once 'includes/footer.php';

?>


<script src="https://zendo.vn/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
<script src="/assets/js/jquery-ui.min.js"></script>
<Script>
    $('.edit_btn').click(function(){
        var data = new FormData();
        var id = $(this).data('id');
        data.append('id', id);
        data.append('type', 1)
        $.ajax({
            type: 'post',
            url: '/assets/ajax/admin.php',
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            data: data,
            
            success: function(feedback) {
                if (feedback.status == 0) {
                    alert(feedback.mess)
                } else {
                        alert(feedback.mess)
                        window.location.reload();
                    }
            }
        });
    });

    $('.trash_btn').click(function(){
        var data = new FormData();
        var id = $(this).data('id');
        data.append('id', id);
        data.append('type', 2)
        $.ajax({
            type: 'post',
            url: '/assets/ajax/admin.php',
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            data: data,
            
            success: function(feedback) {
                if (feedback.status == 0) {
                    alert(feedback.mess)
                } else {
                        alert(feedback.mess)
                        window.location.reload();
                    }
            }
        });
    });
</Script>