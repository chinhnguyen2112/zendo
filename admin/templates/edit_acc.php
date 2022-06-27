<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">
<link href="/admin/assets/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/admin/assets/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<style>
    ul.thumbnails.image_picker_selector {
        margin-top: 20px !important;
    }

    ul.thumbnails.image_picker_selector li .thumbnail {
        padding: 4px !important;
    }

    ul.thumbnails.image_picker_selector li .thumbnail p {
        padding-top: 5px;
        margin-bottom: 0px;
        font-weight: 700;
        text-align: center;
    }

    .thumbnail {
        margin-bottom: 0px;
    }

    ul.thumbnails.image_picker_selector li .thumbnail.selected {
        background: #F50057 !important;
        color: #fff !important;
        font-weight: 700;
    }

    ul.thumbnails.image_picker_selector li .thumbnail img {
        height: 75px;
    }
</style>
<?php

$select = new Info;
$input = new Input;
$id = (int)$input->input_get("id");
$sql_get = "SELECT * FROM posts where `id_post` = {$id} LIMIT 1";
if ($db->num_rows($sql_get)) {
    $data = $db->fetch_assoc($sql_get, 1);
} else {
    new Redirect("/admin/?act=list");
}
$skinss = explode('|', $data['skins']);
foreach ($skinss as $row) {
    $skins1 = explode('-', $row);
    $arr_skin[] = $skins1[0];
}
$fc_skin = arr_skin();

$champss = explode('|', $data['champs']);
foreach ($champss as $row) {
    $champs1 = explode('-', $row);
    $arr_champ[] = $champs1[0];
}

?>
<div class="block block-themed row_edit_acc padding_chung">
    <div class="block-header bg-info">
        <h3 class="block-title">Chỉnh sửa - Mã số <?php echo $data['id_post']; ?> - <?php echo $data['type_account']; ?></h3>
    </div>
    <div class="block-content">

        <form id="data" method="post" enctype="multipart/form-data" class="form-horizontal push-5-t" novalidate="novalidate">

            <div class="col-xs-6">
                <label for="thumb">Ảnh minh hoạ</label>
                <div class="form-group">
                    <input class="currency form-control" type="file" name="thumb" />
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="champs">Hình ảnh thông tin</label>
                    <input class="currency form-control" type="file" name="champs[]" multiple />
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-4">
                    <label for="username">Tên đăng nhập</label>
                    <input class="form-control" type="text" id="username" name="username" placeholder="Tên đăng nhập Garena" value="<?php echo $data['username']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="password">Mật khẩu</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="*****" value="<?php echo $data['password']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="price">Giá tiền</label>
                    <input class="currency form-control" type="number" id="price" name="price" value="<?php echo $data['price']; ?>">
                </div>
            </div>
            <div class="col-xs-4">
                <label for="price">Bậc ngọc</label>
                <input class="currency form-control" type="number" id="ngoc" name="ngoc" value="<?php echo $data['ip_count']; ?>">
            </div>

            <div class="form-group">
                <div class="col-xs-4">
                    <label for="skins_count">Số skin</label>
                    <input class="form-control" type="number" id="skins_count" name="skins_count" placeholder="" value="<?php echo $data['skins_count']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="champs_count">Số tướng</label>
                    <input class="form-control" type="champs_count" id="champs_count" name="champs_count" placeholder="" value="<?php echo $data['champs_count']; ?>">
                </div>

                <div class="col-xs-4">
                    <label for="price_atm">Giá tền ATM</label>
                    <input class="currency form-control" type="number" id="price_atm" name="price_atm" value="<?php echo $data['price_atm']; ?>">
                </div>
            </div>


            <div class="form-group">
                <div class="col-xs-<?= ($data["type_account"] == 'Liên Quân Mobile') ? '6' : '4'; ?>"><label for="rank">Rank</label>
                    <select class="form-control" name="rank">
                        <?php
                        for ($i = 0; $i < 10; $i++) {
                            if ($i == $data['rank']) :
                                echo '<option value="' . $i . '" selected>' . $select->get_string_rank($i) . '</option>';
                            else :
                                echo '<option value="' . $i . '">' . $select->get_string_rank($i) . '</option>';
                            endif;
                        }
                        ?>
                    </select>
                </div>
                <?php if ($data["type_account"] == 'Liên Minh Huyền Thoại') { ?>
                    <div class="col-xs-4"><label for="frame">Khung</label>
                        <select class="form-control" name="frame">
                            <?php
                            for ($i = 0; $i < 7; $i++) {
                                if ($i == $data['frame']) :
                                    echo '<option value="' . $i . '" selected>' . $select->get_string_frame($i) . '</option>';
                                else :
                                    echo '<option value="' . $i . '">' . $select->get_string_frame($i) . '</option>';
                                endif;
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-xs-<?= ($data["type_account"] == 'Liên Quân Mobile') ? '6' : '4'; ?>">
                        <label for="ip_count"><?php echo ($data["type_account"] == 'Liên Minh Huyền Thoại') ? 'IP' : 'Ngọc'; ?> hiện có</label>
                        <input class="currency form-control" type="number" id="ip_count" name="ip_count" value="<?php echo $data['ip_count']; ?>">

                    </div>
            </div>
        <?php } ?>









        <?php if ($data["type_account"] == 'Liên Minh Huyền Thoại' || $data["type_account"] == 'Liên Quân Mobile') : ?>
            <div class="form-group">
                <label class="col-xs-12" for="skins">Nhập danh sách tên Skins <b data-toggle="tooltip" data-placement="right" title="Enter xuống dòng"><i class="fa fa-question-circle"></i></b></label>

                <div class="col-xs-12">
                    <select id="skin" name="skin[]" class="form-control select2-multiple m-b-20 selectiamges" multiple onchange="count_skin(this);">
                        <?php foreach ($fc_skin as $key => $val) { ?>
                            <option value="<?= ($key + 1); ?>" <?= in_array($key + 1, $arr_skin) ? 'selected' : '' ?> data-img-src="/assets/data/8/skins/img_skill/<?= ($key + 1); ?>.png"><?= $val; ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="champs">Nhập danh sách tên Champs <b data-toggle="tooltip" data-placement="right" title="Enter xuống dòng"><i class="fa fa-question-circle"></i></b></label>
                <div class="col-xs-12">
                    <select id="champ" name="champ[]" class="form-control select2-multiple m-b-20 selectiamges" multiple onchange="count_champ(this);">
                        <option value="37" data-img-src="/assets/data/8/champ/37.jpg" <?= in_array(37, $arr_champ) ? 'selected' : '' ?>>Valhein</option>
                        <option value="34" data-img-src="/assets/data/8/champ/34.jpg" <?= in_array(34, $arr_champ) ? 'selected' : '' ?>>Thane</option>
                        <option value="38" data-img-src="/assets/data/8/champ/38.jpg" <?= in_array(38, $arr_champ) ? 'selected' : '' ?>>Veera</option>
                        <option value="17" data-img-src="/assets/data/8/champ/17.jpg" <?= in_array(17, $arr_champ) ? 'selected' : '' ?>>Lữ Bố</option>
                        <option value="21" data-img-src="/assets/data/8/champ/21.jpg" <?= in_array(21, $arr_champ) ? 'selected' : '' ?>>Mina</option>
                        <option value="15" data-img-src="/assets/data/8/champ/15.jpg" <?= in_array(15, $arr_champ) ? 'selected' : '' ?>>Krixi</option>
                        <option value="20" data-img-src="/assets/data/8/champ/20.jpg" <?= in_array(20, $arr_champ) ? 'selected' : '' ?>>Mganga</option>
                        <option value="36" data-img-src="/assets/data/8/champ/36.jpg" <?= in_array(36, $arr_champ) ? 'selected' : '' ?> selected>Triệu Vân</option>
                        <option value="26" data-img-src="/assets/data/8/champ/26.jpg" <?= in_array(3726, $arr_champ) ? 'selected' : '' ?>>Omega</option>
                        <option value="13" data-img-src="/assets/data/8/champ/13.jpg" <?= in_array(13, $arr_champ) ? 'selected' : '' ?>>Kahlii</option>
                        <option value="41" data-img-src="/assets/data/8/champ/41.jpg" <?= in_array(41, $arr_champ) ? 'selected' : '' ?>>Zephys</option>
                        <option value="7" data-img-src="/assets/data/8/champ/7.jpg" <?= in_array(7, $arr_champ) ? 'selected' : '' ?>>Điêu Thuyền</option>
                        <option value="5" data-img-src="/assets/data/8/champ/5.jpg" <?= in_array(5, $arr_champ) ? 'selected' : '' ?>>Chaugnar</option>
                        <option value="39" data-img-src="/assets/data/8/champ/39.jpg" <?= in_array(39, $arr_champ) ? 'selected' : '' ?>>Violet</option>
                        <option value="4" data-img-src="/assets/data/8/champ/4.jpg" <?= in_array(4, $arr_champ) ? 'selected' : '' ?>>Butterfly</option>
                        <option value="27" data-img-src="/assets/data/8/champ/27.jpg" <?= in_array(27, $arr_champ) ? 'selected' : '' ?>>Ormarr</option>
                        <option value="3" data-img-src="/assets/data/8/champ/3.jpg" <?= in_array(3, $arr_champ) ? 'selected' : '' ?>>Azzen'Ka</option>
                        <option value="2" data-img-src="/assets/data/8/champ/2.jpg" <?= in_array(2, $arr_champ) ? 'selected' : '' ?>>Alice</option>
                        <option value="9" data-img-src="/assets/data/8/champ/9.jpg" <?= in_array(9, $arr_champ) ? 'selected' : '' ?>>Gildur</option>
                        <option value="40" data-img-src="/assets/data/8/champ/40.jpg" <?= in_array(40, $arr_champ) ? 'selected' : '' ?>>Yorn</option>
                        <option value="35" data-img-src="/assets/data/8/champ/35.jpg" <?= in_array(35, $arr_champ) ? 'selected' : '' ?>>Toro</option>
                        <option value="33" data-img-src="/assets/data/8/champ/33.jpg" <?= in_array(33, $arr_champ) ? 'selected' : '' ?>>Taara</option>
                        <option value="23" data-img-src="/assets/data/8/champ/23.jpg" <?= in_array(23, $arr_champ) ? 'selected' : '' ?>>Nakroth</option>
                        <option value="10" data-img-src="/assets/data/8/champ/10.jpg" <?= in_array(10, $arr_champ) ? 'selected' : '' ?>>Grakk</option>
                        <option value="1" data-img-src="/assets/data/8/champ/1.jpg" <?= in_array(1, $arr_champ) ? 'selected' : '' ?>>Aleister</option>
                        <option value="8" data-img-src="/assets/data/8/champ/8.jpg" <?= in_array(8, $arr_champ) ? 'selected' : '' ?>>Fennik</option>
                        <option value="18" data-img-src="/assets/data/8/champ/18.jpg" <?= in_array(18, $arr_champ) ? 'selected' : '' ?>>Lumburr</option>
                        <option value="24" data-img-src="/assets/data/8/champ/24.jpg" <?= in_array(24, $arr_champ) ? 'selected' : '' ?>>Natalya</option>
                        <option value="6" data-img-src="/assets/data/8/champ/6.jpg" <?= in_array(6, $arr_champ) ? 'selected' : '' ?>>Cresht</option>
                        <option value="12" data-img-src="/assets/data/8/champ/12.jpg" <?= in_array(12, $arr_champ) ? 'selected' : '' ?>>Jinna</option>
                        <option value="28" data-img-src="/assets/data/8/champ/28.jpg" <?= in_array(28, $arr_champ) ? 'selected' : '' ?>>Payna</option>
                        <option value="19" data-img-src="/assets/data/8/champ/19.jpg" <?= in_array(19, $arr_champ) ? 'selected' : '' ?>>Maloch</option>
                        <option value="25" data-img-src="/assets/data/8/champ/25.jpg" <?= in_array(25, $arr_champ) ? 'selected' : '' ?>>Ngộ Không</option>
                        <option value="14" data-img-src="/assets/data/8/champ/14.jpg" <?= in_array(14, $arr_champ) ? 'selected' : '' ?>>Kriknak</option>
                        <option value="22" data-img-src="/assets/data/8/champ/22.jpg" <?= in_array(22, $arr_champ) ? 'selected' : '' ?>>Arthur</option>
                        <option value="32" data-img-src="/assets/data/8/champ/32.jpg" <?= in_array(32, $arr_champ) ? 'selected' : '' ?>>Slimz</option>
                        <option value="11" data-img-src="/assets/data/8/champ/11.jpg" <?= in_array(11, $arr_champ) ? 'selected' : '' ?>>Ilumia</option>
                        <option value="29" data-img-src="/assets/data/8/champ/29.jpg" <?= in_array(29, $arr_champ) ? 'selected' : '' ?>>Preyta</option>
                        <option value="31" data-img-src="/assets/data/8/champ/31.jpg" <?= in_array(31, $arr_champ) ? 'selected' : '' ?>>Skud</option>
                        <option value="30" data-img-src="/assets/data/8/champ/30.jpg" <?= in_array(30, $arr_champ) ? 'selected' : '' ?>>Raz</option>
                        <option value="16" data-img-src="/assets/data/8/champ/16.jpg" <?= in_array(16, $arr_champ) ? 'selected' : '' ?>>Lauriel</option>
                        <option value="42" data-img-src="/assets/data/8/champ/42.jpg" <?= in_array(42, $arr_champ) ? 'selected' : '' ?>>Batman</option>
                        <option value="43" data-img-src="/assets/data/8/champ/43.jpg" <?= in_array(43, $arr_champ) ? 'selected' : '' ?>>Airi</option>
                        <option value="44" data-img-src="/assets/data/8/champ/44.jpg" <?= in_array(44, $arr_champ) ? 'selected' : '' ?>>Zuka</option>
                        <option value="45" data-img-src="/assets/data/8/champ/45.jpg" <?= in_array(45, $arr_champ) ? 'selected' : '' ?>>Ignis</option>
                        <option value="46" data-img-src="/assets/data/8/champ/46.jpg" <?= in_array(46, $arr_champ) ? 'selected' : '' ?>>Murad</option>
                        <option value="47" data-img-src="/assets/data/8/champ/47.jpg" <?= in_array(47, $arr_champ) ? 'selected' : '' ?>>Zill</option>
                        <option value="48" data-img-src="/assets/data/8/champ/48.jpg" <?= in_array(48, $arr_champ) ? 'selected' : '' ?>>Arduin</option>
                        <option value="49" data-img-src="/assets/data/8/champ/49.jpg" <?= in_array(49, $arr_champ) ? 'selected' : '' ?>>Joker</option>
                        <option value="50" data-img-src="/assets/data/8/champ/50.jpg" <?= in_array(50, $arr_champ) ? 'selected' : '' ?>>Ryoma</option>
                        <option value="51" data-img-src="/assets/data/8/champ/51.jpg" <?= in_array(51, $arr_champ) ? 'selected' : '' ?>>Astrid</option>
                        <option value="52" data-img-src="/assets/data/8/champ/52.jpg" <?= in_array(52, $arr_champ) ? 'selected' : '' ?>>Tel'Annas</option>
                        <option value="53" data-img-src="/assets/data/8/champ/53.jpg" <?= in_array(53, $arr_champ) ? 'selected' : '' ?>>Superman</option>
                        <option value="54" data-img-src="/assets/data/8/champ/54.jpg" <?= in_array(54, $arr_champ) ? 'selected' : '' ?>>Wonder Woman</option>
                        <option value="55" data-img-src="/assets/data/8/champ/55.jpg" <?= in_array(55, $arr_champ) ? 'selected' : '' ?>>Xeniel</option>
                        <option value="56" data-img-src="/assets/data/8/champ/56.jpg" <?= in_array(56, $arr_champ) ? 'selected' : '' ?>>Kil'Groth</option>
                        <option value="57" data-img-src="/assets/data/8/champ/57.jpg" <?= in_array(57, $arr_champ) ? 'selected' : '' ?>>Moren</option>
                        <option value="58" data-img-src="/assets/data/8/champ/58.jpg" <?= in_array(58, $arr_champ) ? 'selected' : '' ?>>TeeMee</option>
                        <option value="59" data-img-src="/assets/data/8/champ/59.jpg" <?= in_array(59, $arr_champ) ? 'selected' : '' ?>>Lindis</option>
                        <option value="60" data-img-src="/assets/data/8/champ/60.jpg" <?= in_array(60, $arr_champ) ? 'selected' : '' ?>>Omen</option>
                        <option value="61" data-img-src="/assets/data/8/champ/61.jpg" <?= in_array(61, $arr_champ) ? 'selected' : '' ?>>Tulen</option>
                        <option value="62" data-img-src="/assets/data/8/champ/62.jpg" <?= in_array(62, $arr_champ) ? 'selected' : '' ?>>Liliana</option>
                        <option value="63" data-img-src="/assets/data/8/champ/63.jpg" <?= in_array(63, $arr_champ) ? 'selected' : '' ?>>Max</option>
                        <option value="64" data-img-src="/assets/data/8/champ/64.jpg" <?= in_array(64, $arr_champ) ? 'selected' : '' ?>>The Flash</option>
                        <option value="65" data-img-src="/assets/data/8/champ/65.jpg" <?= in_array(65, $arr_champ) ? 'selected' : '' ?>>Wisp</option>
                        <option value="66" data-img-src="/assets/data/8/champ/66.jpg" <?= in_array(66, $arr_champ) ? 'selected' : '' ?>>Arum</option>
                        <option value="67" data-img-src="/assets/data/8/champ/67.jpg" <?= in_array(67, $arr_champ) ? 'selected' : '' ?>>Rourke</option>
                        <option value="68" data-img-src="/assets/data/8/champ/68.jpg" <?= in_array(68, $arr_champ) ? 'selected' : '' ?>>Marja</option>
                        <option value="69" data-img-src="/assets/data/8/champ/69.jpg" <?= in_array(69, $arr_champ) ? 'selected' : '' ?>>Roxie</option>
                        <option value="70" data-img-src="/assets/data/8/champ/70.jpg" <?= in_array(70, $arr_champ) ? 'selected' : '' ?>>Baldum</option>
                        <option value="71" data-img-src="/assets/data/8/champ/71.jpg" <?= in_array(71, $arr_champ) ? 'selected' : '' ?>>Annette</option>
                        <option value="72" data-img-src="/assets/data/8/champ/72.jpg" <?= in_array(72, $arr_champ) ? 'selected' : '' ?>>Amily</option>
                        <option value="73" data-img-src="/assets/data/8/champ/73.jpg" <?= in_array(73, $arr_champ) ? 'selected' : '' ?>>Y'bneth</option>
                        <option value="74" data-img-src="/assets/data/8/champ/74.jpg" <?= in_array(74, $arr_champ) ? 'selected' : '' ?>>Elsu</option>
                        <option value="77" data-img-src="/assets/data/8/champ/77.jpg" <?= in_array(77, $arr_champ) ? 'selected' : '' ?>>Richter</option>
                        <option value="80" data-img-src="/assets/data/8/champ/80.jpg" <?= in_array(80, $arr_champ) ? 'selected' : '' ?>>Wiro</option>
                        <option value="75" data-img-src="/assets/data/8/champ/75.jpg" <?= in_array(75, $arr_champ) ? 'selected' : '' ?>>Quillen</option>
                        <option value="76" data-img-src="/assets/data/8/champ/76.jpg" <?= in_array(76, $arr_champ) ? 'selected' : '' ?>>Sephera</option>
                        <option value="78" data-img-src="/assets/data/8/champ/78.jpg" <?= in_array(78, $arr_champ) ? 'selected' : '' ?>>Florentino</option>
                        <option value="82" data-img-src="/assets/data/8/champ/82.jpg" <?= in_array(82, $arr_champ) ? 'selected' : '' ?>>Veres</option>
                        <option value="79" data-img-src="/assets/data/8/champ/79.jpg" <?= in_array(79, $arr_champ) ? 'selected' : '' ?>>D'Arcy</option>
                        <option value="83" data-img-src="/assets/data/8/champ/83.jpg" <?= in_array(83, $arr_champ) ? 'selected' : '' ?>>Hayate</option>
                        <option value="84" data-img-src="/assets/data/8/champ/84.jpg" <?= in_array(84, $arr_champ) ? 'selected' : '' ?>>Capheny</option>
                        <option value="85" data-img-src="/assets/data/8/champ/85.jpg" <?= in_array(85, $arr_champ) ? 'selected' : '' ?>>Errol</option>
                        <option value="86" data-img-src="/assets/data/8/champ/86.jpg" <?= in_array(86, $arr_champ) ? 'selected' : '' ?>>Yena</option>
                        <option value="87" data-img-src="/assets/data/8/champ/87.jpg" <?= in_array(87, $arr_champ) ? 'selected' : '' ?>>Enzo</option>
                        <option value="88" data-img-src="/assets/data/8/champ/88.jpg" <?= in_array(88, $arr_champ) ? 'selected' : '' ?>>Zip</option>
                        <option value="89" data-img-src="/assets/data/8/champ/89.jpg" <?= in_array(89, $arr_champ) ? 'selected' : '' ?>>Qi</option>
                        <option value="90" data-img-src="/assets/data/8/champ/90.jpg" <?= in_array(90, $arr_champ) ? 'selected' : '' ?>>Celica</option>
                        <option value="91" data-img-src="/assets/data/8/champ/91.jpg" <?= in_array(91, $arr_champ) ? 'selected' : '' ?>>Volkath</option>
                        <option value="92" data-img-src="/assets/data/8/champ/92.jpg" <?= in_array(92, $arr_champ) ? 'selected' : '' ?>>Krizzix</option>
                        <option value="93" data-img-src="/assets/data/8/champ/93.jpg" <?= in_array(93, $arr_champ) ? 'selected' : '' ?>>Eland'orr</option>
                        <option value="94" data-img-src="/assets/data/8/champ/94.jpg" <?= in_array(94, $arr_champ) ? 'selected' : '' ?>>Ishar</option>
                        <option value="95" data-img-src="/assets/data/8/champ/95.jpg" <?= in_array(95, $arr_champ) ? 'selected' : '' ?>>Dirak</option>
                        <option value="96" data-img-src="/assets/data/8/champ/96.jpg" <?= in_array(96, $arr_champ) ? 'selected' : '' ?>>Keera</option>
                        <option value="97" data-img-src="/assets/data/8/champ/97.jpg" <?= in_array(97, $arr_champ) ? 'selected' : '' ?>>Ata</option>
                        <option value="98" data-img-src="/assets/data/8/champ/98.jpg" <?= in_array(98, $arr_champ) ? 'selected' : '' ?>>Paine</option>
                        <option value="99" data-img-src="/assets/data/8/champ/99.jpg" <?= in_array(99, $arr_champ) ? 'selected' : '' ?>>Laville</option>
                        <option value="100" data-img-src="/assets/data/8/champ/100.jpg" <?= in_array(100, $arr_champ) ? 'selected' : '' ?>>Rouie</option>
                        <option value="101" data-img-src="/assets/data/8/champ/101.jpg" <?= in_array(101, $arr_champ) ? 'selected' : '' ?>>Zata</option>
                        <option value="102" data-img-src="/assets/data/8/champ/102.jpg" <?= in_array(102, $arr_champ) ? 'selected' : '' ?>>Allain</option>
                        <option value="103" data-img-src="/assets/data/8/champ/103.jpg" <?= in_array(103, $arr_champ) ? 'selected' : '' ?>>Thorne</option>
                        <option value="104" data-img-src="/assets/data/8/champ/104.jpg" <?= in_array(104, $arr_champ) ? 'selected' : '' ?>>Sinestrea</option>
                        <option value="105" data-img-src="/assets/data/8/champ/105.jpg" <?= in_array(105, $arr_champ) ? 'selected' : '' ?>>Dextra</option>
                        <option value="106" data-img-src="/assets/data/8/champ/106.jpg" <?= in_array(106, $arr_champ) ? 'selected' : '' ?>>Lorion</option>
                        <option value="107" data-img-src="/assets/data/8/champ/107.jpg" <?= in_array(107, $arr_champ) ? 'selected' : '' ?>>Bright</option>
                        <option value="108" data-img-src="/assets/data/8/champ/108.jpg" <?= in_array(108, $arr_champ) ? 'selected' : '' ?>>IGGY</option>
                        <option value="109" data-img-src="/assets/data/8/champ/109.jpg" <?= in_array(109, $arr_champ) ? 'selected' : '' ?>>AOI</option>
                        <option value="110" data-img-src="/assets/data/8/champ/110.jpg" <?= in_array(110, $arr_champ) ? 'selected' : '' ?>>Aya</option>
                        <option value="111" data-img-src="/assets/data/8/champ/111.jpg" <?= in_array(111, $arr_champ) ? 'selected' : '' ?>>Tachi</option>
                        <option value="112" data-img-src="/assets/data/8/champ/112.jpg" <?= in_array(112, $arr_champ) ? 'selected' : '' ?>>Yue</option>
                        <option value="81" data-img-src="/assets/data/8/champ/81.jpg" <?= in_array(81, $arr_champ) ? 'selected' : '' ?>>Yan</option>




                    </select>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label class="col-xs-12" for="note">Ghi chú <b data-toggle="tooltip" data-placement="right" title="Hiển thị ở trang chủ khi để chuột vào"><i class="fa fa-question-circle"></i></b></label>
                <div class="col-xs-12">
                    <textarea class="form-control" id="note" name="note" rows="4" placeholder="Enter để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"><?php echo $data['note']; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="type_post">Loại</label>
                <div class="col-xs-12">
                    <label class="css-input css-radio css-radio-warning push-10-r">
                        <input type="radio" name="type_post" value="3" <?php echo ($data['type_post'] == 3) ? 'checked' : ''; ?>><span></span> Bình thường</label>
                    <label class="css-input css-radio css-radio-warning">
                        <input type="radio" name="type_post" value="0" <?php echo ($data['type_post'] == 0) ? 'checked' : ''; ?>><span></span> Quảng Cáo</label>
                    <label class="css-input css-radio css-radio-warning">
                        <input type="radio" name="type_post" value="2" <?php echo ($data['type_post'] == 2) ? 'checked' : ''; ?>><span></span> Acc NGON</label>
                    <label class="css-input css-radio css-radio-warning">
                        <input type="radio" name="type_post" value="1" <?php echo ($data['type_post'] == 1) ? 'checked' : ''; ?>><span></span> Acc VIP</label>
                    <label class="css-input css-radio css-radio-warning">
                        <input type="radio" name="type_post" value="4" <?php echo ($data['type_post'] == 4) ? 'checked' : ''; ?>><span></span> Acc chưa định giá</label>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="type_account" value="<?php echo $data['type_account']; ?>">

            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" type="submit" id="submit">Sửa</button>
                </div>
            </div>
        </form>

    </div>
</div>
</div>
<script src="/admin/assets/js/js.cookie.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="/admin/assets/js/magnific.js" type="text/javascript"></script>
<script src="/admin/assets/js/bootstrap-table.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/bootstrap-table-export.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/table_export.js" type="text/javascript"></script>

<script src="/admin/assets/js/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="/admin/assets/js/select2.full.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/jquery.bootstrap-growl.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/autosize.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>


<script src="/admin/assets/js/app.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/components-select2.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/table-bootstrap.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/layout.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/demo.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/quick-nav.min.js" type="text/javascript"></script>
<script>
    $("form#data").submit(function() {

        var formData = new FormData($(this)[0]);

        $("#submit").prop('disabled', true);
        $.ajax({
            url: '/assets/ajax/edit_acc.php',
            type: 'POST',
            data: formData,
            async: false,
            dataType: 'json',
            success: function(data) {
                swal(data.title, data.msg, data.status);
                setTimeout(function() {
                    window.location.href = "/admin/?act=edit_acc";
                }, 3000);
            },
            cache: false,
            contentType: false,
            processData: false
        });


        return false;
    });

    function count_champ(input) {
        var options = input.options;
        var count = 0;
        for (var i = 0; i < options.length; i++) {
            if (options[i].selected) {
                count++;
            }
        }

        document.getElementById('champs_count').value = count;
    }

    function count_skin(input) {
        var options = input.options;
        var count = 0;
        for (var i = 0; i < options.length; i++) {
            if (options[i].selected)
                count++;
        }
        document.getElementById('skins_count').value = count;
    }
</script>
<link rel="stylesheet" type="text/css" href="https://rvera.github.io/image-picker/image-picker/image-picker.css">
<script src="https://rvera.github.io/image-picker/image-picker/image-picker.js" type="text/javascript"></script>

<script>
    jQuery(".selectiamges").imagepicker({
        hide_select: false,
        show_label: true,
    });

    //            $("input").change(function () {
    //                alert("The text has been changed.");
    //            });
    //
    //
    //            var count = $('#foo option:selected').length;
    //
    //            $("#test3").val("Dolly Duck");
</script>