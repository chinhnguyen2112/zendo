<?php

// Require database & th么ng tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
$id = $data_user['id'];
$sql = "SELECT * FROM cayrank WHERE user_id = '$id'";
$count = $db->fetch_assoc($sql, 0);
?>
<link rel="stylesheet" href="/assets/css/sanacc/tiendo_cayrank.css?v=<?= time() ?>">
<div id="progress_ranking">
    <div class="progress_box">
        <!-- header box -->
        <div class="progress_box_header">
            <h2>THEO DÕI TIẾN ĐỘ CÀY THUÊ</h2>
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
                    <p class="content_title">NGÀY YÊU CẦU</p>

                </div>

                <div class="content_4">
                    <p class="content_title">RANK HIỆN TẠI</p>

                </div>

                <div class="content_5">
                    <p class="content_title">RANK KẾT THÚC</p>
                </div>

                <div class="content_6">
                    <p class="content_title">LỊCH CÀY</p>
                </div>

                <div class="content_7">
                    <p class="content_title">BOOSTER</p>

                </div>

                <div class="content_8">
                    <p class="content_title">CHỌN TƯỚNG</p>

                </div>

                <div class="content_9">
                    <p class="content_title">CÀY SIÊU TỐC</p>

                </div>

                <div class="content_10">
                    <p class="content_title">CHƠI CÙNG BOOSTER</p>

                </div>

                <div class="content_11">
                    <p class="content_title">GIÁ TIỀN</p>

                </div>

                <div class="content_12">
                    <p class="content_title">TIẾN ĐỘ CÀY</p>

                </div>

                <!-- <div class="content_13">
                    <p class="content_title">HÀNH ĐỘNG</p>
                </div> -->
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
                        <p><?= date('d-m-Y', $val['created_at']) ?></p>

                    </div>

                    <div class="content_4">
                        <p><?= $val['rank_now'] ?></p>

                    </div>

                    <div class="content_5">
                        <p><?= $val['rank_hire'] ?></p>
                    </div>


                    <div class="content_6">
                        <p><?= date('d-m-Y', $val['time_start']) ?> : <?= date('d-m-Y', $val['time_end']) ?></p>
                    </div>

                    <div class="content_7">
                        <p><?php if ($val['name_booster'] != "") {
                                echo $val['name_booster'];
                            } else {
                                echo '<img src="/images/sanacc/cayrank/close-circle.svg" alt="close-circle">';
                            } ?></p>
                    </div>

                    <div class="content_8">
                        <p><?php if ($val['champ'] != "") {
                                echo $val['champ'];
                            } else {
                                echo '<img src="/images/sanacc/cayrank/close-circle.svg" alt="close-circle">';
                            } ?></p>
                    </div>

                    <div class="content_9">
                        <p><?php if ($val['flash_play'] == 0) {
                                echo '<img src="/images/sanacc/cayrank/close-circle.svg" alt="close-circle">';
                            } else {
                                echo '<img src="/images/sanacc/cayrank/tick-circle.svg" alt="tick-circle">';
                            } ?></p>
                    </div>

                    <div class="content_10">
                        <p><?php if ($val['dual_booster'] == 0) {
                                echo '<img src="/images/sanacc/cayrank/close-circle.svg" alt="close-circle">';
                            } else {
                                echo '<img src="/images/sanacc/cayrank/tick-circle.svg" alt="tick-circle">';
                            } ?></p>
                    </div>

                    <div class="content_11">
                        <p><?= $val['price'] . ' ' . 'VND' ?></p>
                    </div>

                    <div class="content_12">
                        <p></p>
                    </div>

                    <!-- <div class="content_13">
                        <div class="progress_action">
                            <img class="edit_btn" data-id="<?= $val['id'] ?>" src="/images/sanacc/cayrank/edit.svg" alt="edit_icon">
                            <img class="trash_btn" data-id="<?= $val['id'] ?>" src="/images/sanacc/cayrank/trash.svg" alt="trash_icon">
                        </div>
                    </div> -->
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
    $('.trash_btn').click(function() {
        // confirm('Bạn có chắc muốn xóa đơn hàng này không');
        if(confirm('Bạn có chắc muốn xóa đơn hàng này không') == true) {
        var data = new FormData();
        var id = $(this).data('id');
        data.append('id', id);
        $.ajax({
            type: 'post',
            url: '/assets/ajax/progress_ranking.php',
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
                        // window.location.reload();
                    }
            }
        });
    } else {
        return false;
    }
    });
</Script>