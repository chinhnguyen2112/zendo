<?php
// liên quân 9k
$sql_1 = "SELECT * FROM setting_random  WHERE page ='lq-9k'";
if ($db->num_rows($sql_1)) {
    $data_lq_9k = $db->fetch_assoc($sql_1, 1);
}
// liên quân 20k
$sql_2 = "SELECT * FROM setting_random  WHERE page ='lq-20k'";
if ($db->num_rows($sql_2)) {
    $data_lq_20k = $db->fetch_assoc($sql_2, 1);
}
// liên quân 50k
$sql_3 = "SELECT * FROM setting_random  WHERE page ='lq-50k'";
if ($db->num_rows($sql_3)) {
    $data_lq_50k = $db->fetch_assoc($sql_3, 1);
}
// liên quân 100k
$sql_4 = "SELECT * FROM setting_random  WHERE page ='lq-100k'";
if ($db->num_rows($sql_4)) {
    $data_lq_100k = $db->fetch_assoc($sql_4, 1);
}
// liên quân 200k
$sql_5 = "SELECT * FROM setting_random  WHERE page ='lq-200k'";
if ($db->num_rows($sql_5)) {
    $data_lq_200k = $db->fetch_assoc($sql_5, 1);
}
// liên quân 500k
$sql_6 = "SELECT * FROM setting_random  WHERE page ='lq-500k'";
if ($db->num_rows($sql_6)) {
    $data_lq_500k = $db->fetch_assoc($sql_6, 1);
}
// free fire 20k
$sql_7 = "SELECT * FROM setting_random  WHERE page ='ff-20k'";
if ($db->num_rows($sql_7)) {
    $data_ff_20k = $db->fetch_assoc($sql_7, 1);
}
// free fire 70k
$sql_8 = "SELECT * FROM setting_random  WHERE page ='ff-70k'";
if ($db->num_rows($sql_8)) {
    $data_ff_70k = $db->fetch_assoc($sql_8, 1);
}
// free fire 100k
$sql_9 = "SELECT * FROM setting_random  WHERE page ='ff-100k'";
if ($db->num_rows($sql_9)) {
    $data_ff_100k = $db->fetch_assoc($sql_9, 1);
}
// free fire 200k
$sql_10 = "SELECT * FROM setting_random  WHERE page ='ff-200k'";
if ($db->num_rows($sql_10)) {
    $data_ff_200k = $db->fetch_assoc($sql_10, 1);
}
// tốc chiến 20k
$sql_11 = "SELECT * FROM setting_random  WHERE page ='tc-20k'";
if ($db->num_rows($sql_11)) {
    $data_tc_20k = $db->fetch_assoc($sql_11, 1);
}
// tốc chiến 50k
$sql_12 = "SELECT * FROM setting_random  WHERE page ='tc-50k'";
if ($db->num_rows($sql_12)) {
    $data_tc_50k = $db->fetch_assoc($sql_12, 1);
}
// tốc chiến 100k
$sql_13 = "SELECT * FROM setting_random  WHERE page ='tc-100k'";
if ($db->num_rows($sql_13)) {
    $data_tc_100k = $db->fetch_assoc($sql_13, 1);
}
?>
<div class="block block-themed">
    <div class="block-header bg-info">
        <h3 class="block-title">Cài đặt chung Random</h3>
    </div>
    <!-- -------------------------------Liên quân ---------------------------------- -->
    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="lq-9k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Liên Quân Random 9k</label>
                <div class="content-anh">
                    <img src="/<?= $data_lq_9k['avatar'] ?>" id="img_pre_lq_9k" alt="Img" class="q-header-logo img-max">
                    <input id="img_lq_9k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_lq_9k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="lq_9k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_9k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_9k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_lq_9k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_lq_9k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#lq-9k','#img_lq_9k','#lq_9k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="lq-20k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Liên Quân Random 20k</label>
                <div class="content-anh">
                    <img src="/<?= $data_lq_20k['avatar'] ?>" alt="Img" id="img_pre_lq_20k" class="q-header-logo img-max">
                    <input id="img_lq_20k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_lq_20k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="lq_20k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_20k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_20k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_lq_20k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_lq_20k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#lq-20k','#img_lq_20k','#lq_20k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="lq-50k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Liên Quân Random 50k</label>
                <div class="content-anh">
                    <img src="/<?= $data_lq_50k['avatar'] ?>" alt="Img" id="img_pre_lq_50k" class="q-header-logo img-max">
                    <input id="img_lq_50k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_lq_50k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="lq_50k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_50k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_50k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_lq_50k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_lq_50k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#lq-50k','#img_lq_50k','#lq_50k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="lq-100k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Liên Quân Random 100k</label>
                <div class="content-anh">
                    <img src="/<?= $data_lq_100k['avatar'] ?>" alt="Img" id="img_pre_lq_100k" class="q-header-logo img-max">
                    <input id="img_lq_100k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_lq_100k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="lq_100k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_100k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_100k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_lq_100k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_lq_100k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#lq-100k','#img_lq_100k','#lq_100k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="lq-200k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Liên Quân Random 200k</label>
                <div class="content-anh">
                    <img src="/<?= $data_lq_200k['avatar'] ?>" alt="Img" id="img_pre_lq_200k" class="q-header-logo img-max">
                    <input id="img_lq_200k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_lq_200k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="lq_200k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_200k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_200k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_lq_200k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_lq_200k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#lq-200k','#img_lq_200k','#lq_200k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="lq-500k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Liên Quân Random 500k</label>
                <div class="content-anh">
                    <img src="/<?= $data_lq_500k['avatar'] ?>" alt="Img" id="img_pre_lq_500k" class="q-header-logo img-max">
                    <input id="img_lq_500k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_lq_500k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="lq_500k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_500k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_lq_500k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_lq_500k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_lq_500k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#lq-500k','#img_lq_500k','#lq_500k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
    <!--------------------------Free Fire------------------------------ -->
    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="ff-20k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Free Fire Random 20k</label>
                <div class="content-anh">
                    <img src="/<?= $data_ff_20k['avatar'] ?>" alt="Img" id="img_pre_ff_20k" class="q-header-logo img-max">
                    <input id="img_ff_20k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_ff_20k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="ff_20k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc Free Fire giá rẻ)"><?= $data_ff_20k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_ff_20k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_ff_20k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_ff_20k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#ff-20k','#img_ff_20k','#ff_20k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="ff-70k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Free Fire Random 70k</label>
                <div class="content-anh">
                    <img src="/<?= $data_ff_70k['avatar'] ?>" alt="Img" id="img_pre_ff_70k" class="q-header-logo img-max">
                    <input id="img_ff_70k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_ff_70k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="ff_70k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_ff_70k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_ff_70k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_ff_70k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_ff_70k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#ff-70k','#img_ff_70k','#ff_70k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="ff-100k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Free Fire Random 100k</label>
                <div class="content-anh">
                    <img src="/<?= $data_ff_100k['avatar'] ?>" alt="Img" id="img_pre_ff_100k" class="q-header-logo img-max">
                    <input id="img_ff_100k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_ff_100k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="ff_100k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_ff_100k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_ff_100k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_ff_100k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_ff_100k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#ff-100k','#img_ff_100k','#ff_100k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>

    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="ff-200k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Free Fire Random 20k</label>
                <div class="content-anh">
                    <img src="/<?= $data_ff_200k['avatar'] ?>" alt="Img" id="img_pre_ff_200k" class="q-header-logo img-max">
                    <input id="img_ff_200k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_ff_200k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="ff_200k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_ff_200k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_ff_200k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_ff_200k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_ff_200k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#ff-200k','#img_ff_200k','#ff_200k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
    <!-- ---------------------Tốc chiến----------------------------------->
    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="tc-20k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Liên Minh Tốc Chiến Random 20k</label>
                <div class="content-anh">
                    <img src="/<?= $data_tc_20k['avatar'] ?>" alt="Img" id="img_pre_tc_20k" class="q-header-logo img-max">
                    <input id="img_tc_20k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_tc_20k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="tc_20k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_tc_20k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_tc_20k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_tc_20k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_tc_20k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#tc-20k','#img_tc_20k','#tc_20k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>


    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="tc-50k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Liên Minh tốc Chiến Random 50k</label>
                <div class="content-anh">
                    <img src="/<?= $data_tc_50k['avatar'] ?>" alt="Img" id="img_pre_tc_50k" class="q-header-logo img-max">
                    <input id="img_tc_50k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_tc_50k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="tc_50k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_tc_100k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_tc_100k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_tc_100k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_tc_100k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#tc-50k','#img_tc_50k','#tc_50k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>


    <div class="block-content c_box">
        <form class="form-horizontal push-5-t" id="tc-100k">

            <div class="form-group">
                <label class="col-xs-12 c_random" for="title">Liên Minh tốc Chiến Random 100k</label>
                <div class="content-anh">
                    <img src="/<?= $data_tc_100k['avatar'] ?>" alt="Img" id="img_pre_tc_100k" class="q-header-logo img-max">
                    <input id="img_tc_100k" name="img_random" class="fileupload img_random" onchange="preview_image(event, this,'#img_pre_tc_100k');" type="file">

                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả trong page</label>
                    <textarea class="form-control des" id="tc_100k_des" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_tc_100k['des'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Mô tả ngoài page</label>
                    <textarea class="form-control des_pre" name="des" rows="7" placeholder="Nhập giới thiệu trang page (demo: Bán acc liên minh giá rẻ)"><?= $data_tc_100k['des_pre'] ?></textarea>
                </div>

                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Title</label>
                    <textarea class="form-control meta_title" name="des" rows="7" placeholder="Nhập meta Title)"><?= $data_tc_100k['meta_title'] ?></textarea>
                </div>
                <div class="col-xs-12">
                    <label class="col-xs-12 c_random_nav" for="title">Meta Des</label>
                    <textarea class="form-control meta_des" name="des" rows="7" placeholder="Nhập meta Des"><?= $data_tc_100k['meta_des'] ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" onclick="update(this,'#tc-100k','#img_tc_100k','#tc_100k_des')">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>


</div>
</div>
<script type="text/javascript">
    function preview_image(e, element, img_pre) {
        var _URL = window.URL || window.webkitURL;
        var file, img;
        preview_before_upload(e, element, img_pre);
    }

    function update(evt, page, img, desc) {
        var meta_des = $(page).find('.meta_des').val();
        var meta_title = $(page).find('.meta_title').val();
        var des_pre = $(page).find('.des_pre').val();
        $(page).validate({

            submitHandler: function() {
                var fd = new FormData();
                var files = $(img)[0].files;
                var dess = $(desc).val();

                // Check file selected or not
                fd.append('file', files[0]);
                fd.append('des', dess);
                fd.append('des_pre', des_pre);
                fd.append('page', page.replace("#", ""));
                fd.append('meta_des', meta_des);
                fd.append('meta_title', meta_title);

                $.ajax({
                    url: '/assets/ajax/setting_random.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert('Cập nhật thành công');
                    },
                });

                return false;
            }
        });
    }

    function preview_before_upload(event, elem, img_pre) {
        if (typeof FileReader == "undefined") return true;
        var elem = $(elem);
        var files = event.target.files;
        for (var i = 0, file; file = files[i]; i++) {
            if (file.type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(event) {
                        var image = event.target.result;
                        $(img_pre).attr("src", image);
                    };
                })(file);
                reader.readAsDataURL(file);
            }
        }
    }
</script>