<?php
// liên quân 
$sql_1 = "SELECT * FROM setting_random  WHERE page ='lq'";
if ($db->num_rows($sql_1)) {
    $data_lq = $db->fetch_assoc($sql_1, 1);
}
// free fire
$sql_2 = "SELECT * FROM setting_random  WHERE page ='ff'";
if ($db->num_rows($sql_2)) {
    $data_ff = $db->fetch_assoc($sql_2, 1);
}
// tốc chiến
$sql_3 = "SELECT * FROM setting_random  WHERE page ='tc'";
if ($db->num_rows($sql_3)) {
    $data_tc = $db->fetch_assoc($sql_3, 1);
}

// trang chủ
$sql_4 = "SELECT * FROM setting_random  WHERE page ='home'";
if ($db->num_rows($sql_4)) {
    $data_home = $db->fetch_assoc($sql_4, 1);
}
?>
<div class="block block-themed">
    <div class="block-header bg-info">
        <h3 class="block-title">Cài đặt</h3>
    </div>
    <!-- -------------------------------Trang Chủ ---------------------------------- -->
    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="home">

            <div class="form-group">
                <label class="col-xs-12 c_random " style="margin-bottom:20px" for="title">Trang chủ</label>

                <!-- <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="lq_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq['des_pre'] ?></textarea>
                </div> -->

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_home['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_home['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#home','#home_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
    <!-- -------------------------------Liên quân ---------------------------------- -->
    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="lq">

            <div class="form-group">
                <label class="col-xs-12 c_random " style="margin-bottom:20px" for="title">Page acc Liên Quân</label>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="lq_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_lq['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_lq['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#lq','#lq_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="ff">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Page Acc Free Fire</label>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong</label>
                    <textarea class="form-control des" id="ff_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_ff['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_ff['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_ff['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_ff['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#ff','#ff_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="tc">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Page Acc Liêm Minh Tốc Chiến</label>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong</label>
                    <textarea class="form-control des" id="tc_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_tc['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_tc['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_tc['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_tc['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#tc','#tc_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>



</div>
</div>
<script type="text/javascript">
    function update(evt, page, desc) {
        var meta_des = $(page).find('.meta_des').val();
        var meta_title = $(page).find('.meta_title').val();
        var des_pre = $(page).find('.des_pre').val();
        $(page).validate({

            submitHandler: function() {
                var fd = new FormData();
                var dess = $(desc).val();

                // Check file selected or not
                if (page != '#home') {
                    fd.append('des', dess);
                    fd.append('des_pre', des_pre);
                }
                    fd.append('page', page.replace("#", ""));
                fd.append('meta_des', meta_des);
                fd.append('meta_title', meta_title);

                $.ajax({
                    url: '/assets/ajax/setting_page.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert('Cậo nhật thành công');
                    },
                });

                return false;
            }
        });
    }
</script>