<?php


// Require database & th么ng tin chung
require_once 'core/init.php';


$title = "Vòng Quay Liên Quân Mobile";
// Require header
require_once 'includes/header-thu-van-may-cao-cap.php';
// luot quay
$luotquay = "SELECT * FROM gift WHERE type = 'luotquay' ";
$gif_luotquay = $db->fetch_assoc($luotquay, 0);
// 9k
$luotquay9k = "SELECT * FROM gift WHERE type = 'luotquay9k' ";
$gif_luotquay9k = $db->fetch_assoc($luotquay9k, 0);
// 20k
$luotquay20k = "SELECT * FROM gift WHERE type = 'luotquay20k' ";
$gif_luotquay20k = $db->fetch_assoc($luotquay20k, 0);
// 50k
$luotquay50k = "SELECT * FROM gift WHERE type = 'luotquay50k' ";
$gif_luotquay50k = $db->fetch_assoc($luotquay50k, 0);
// 100k
$luotquay100k = "SELECT * FROM gift WHERE type = 'luotquay100k' ";
$gif_luotquay100k = $db->fetch_assoc($luotquay100k, 0);
// 200k
$luotquay200k = "SELECT * FROM gift WHERE type = 'luotquay200k' ";
$gif_luotquay200k = $db->fetch_assoc($luotquay200k, 0);
// 500k
$luotquay500k = "SELECT * FROM gift WHERE type = 'luotquay500k' ";
$gif_luotquay500k = $db->fetch_assoc($luotquay500k, 0);
setcookie('luotquay', ($data_user['luotquay'] < 0) ? 0 : $data_user['luotquay'], time() + 86400, '/');
setcookie('luotquay9k', ($data_user['luotquay9k'] < 0) ? 0 : $data_user['luotquay9k'], time() + 86400, '/');
setcookie('luotquay20k', ($data_user['luotquay20k'] < 0) ? 0 : $data_user['luotquay20k'], time() + 86400, '/');
setcookie('luotquay50k', ($data_user['luotquay50k'] < 0) ? 0 : $data_user['luotquay50k'], time() + 86400, '/');
setcookie('luotquay100k', ($data_user['luotquay100k'] < 0) ? 0 : $data_user['luotquay100k'], time() + 86400, '/');
setcookie('luotquay200k', ($data_user['luotquay200k'] < 0) ? 0 : $data_user['luotquay200k'], time() + 86400, '/');
setcookie('luotquay500k', ($data_user['luotquay500k'] < 0) ? 0 : $data_user['luotquay500k'], time() + 86400, '/');
setcookie('url_301', '', time() + 86400, '/');
$id = $data_user['id'];
$sql = "SELECT * FROM history_luotquay_free  WHERE user_id = $id ORDER BY created_at DESC LIMIT 1 ";
$history_luotquay_free = $db->fetch_assoc($sql, 0);
// $h = date('H', $history_luotquay_free[0]['created_at']);
// $i = date('i', $history_luotquay_free[0]['created_at']);
// $s = date('s', $history_luotquay_free[0]['created_at']);
// $d = date('d', $history_luotquay_free[0]['created_at']);
// $m = date('m', $history_luotquay_free[0]['created_at']);
// $y = date('Y', $history_luotquay_free[0]['created_at']);
$day_new = date('d-m-Y', $history_luotquay_free[0]['created_at'] + 86400);
$day = date('d-m-Y', $history_luotquay_free[0]['created_at']);
// echo time() - 86000;
$tgian = 86400 - (time() - $history_luotquay_free[0]['created_at']);
date_default_timezone_set("UTC");
$h = date('H', $tgian);
$i = date('i', $tgian);
$s = date('s', $tgian);

?>

<link rel="stylesheet" href="/assets/css/slick.css?v=1">
<link rel="stylesheet" href="/assets/css/sanacc/css_vqlq.css?v=<?= time() ?>">
<div id="main">

    <div class="div_close">
        <span class="close_page" onclick=" window.location.href = '/';">Về trang chủ</span>
    </div>

    <!-- begin notice bar -->
    <!-- <div class="notice_bar">
        <div class="icon_notice">
            <img src="/images/sanacc/vqlq/notice-icon.svg" alt="notice-icon">
            <img src="/images/sanacc/vqlq/notice-icon.svg" alt="notice-icon">
            <img src="/images/sanacc/vqlq/notice-icon.svg" alt="notice-icon">
        </div>

        <span>PHẠM NGỌC MẠNH ĐÃ QUAY ĐƯỢC PHẦN THƯỞNG BẠCH KIM - 1000 QUÂN HUY</span>

        <div class="icon_notice">
            <img src="/images/sanacc/vqlq/notice-icon.svg" alt="notice-icon">
            <img src="/images/sanacc/vqlq/notice-icon.svg" alt="notice-icon">
            <img src="/images/sanacc/vqlq/notice-icon.svg" alt="notice-icon">
        </div>
    </div> -->
    <!-- end notice bar -->

    <!-- begin content -->
    <div class="content">
        <!-- thoát -->
        <!-- begin title box -->
        <div class="title_box">
            <div class="title_box_container">
                <span onclick="show_popup(1)" class="span_list_btn">HƯỚNG DẪN</span>
                <span onclick="show_popup(2)" class="span_list_btn">PHẦN THƯỞNG</span>
                <span onclick="show_popup(3)" class="span_list_btn">LỊCH SỬ QUAY</span>
                <span onclick="show_popup(4)" class="span_list_btn">NHIỆM VỤ</span>
            </div>
        </div>
        <!-- end title box -->


        <!-- choose spin tablet -->
        <div class="choose_spin_tablet">
            <select name="" id="change_type">
                <option value="luotquay">VÒNG QUAY LIÊN QUÂN 1.000đ</option>
                <option value="luotquay9k">VÒNG QUAY LIÊN QUÂN 9.000đ</option>
                <option value="luotquay20k">VÒNG QUAY LIÊN QUÂN 20.000đ</option>
                <option value="luotquay50k">VÒNG QUAY LIÊN QUÂN 50.000đ</option>
                <option value="luotquay100k">VÒNG QUAY LIÊN QUÂN 100.000đ</option>
                <option value="luotquay200k">VÒNG QUAY LIÊN QUÂN 200.000đ</option>
                <option value="luotquay500k">VÒNG QUAY LIÊN QUÂN 500.000đ</option>
            </select>
        </div>

        <!-- box spin -->
        <div class="box_spin">
            <div class="box-left">
                <!-- col 1 -->
                <div class="header-title">
                    <div class="get-free-spin" onclick="show_popup(5)">

                        <div class="nav_noti_add ">
                            <span>1</span>
                        </div>
                        <img src="/images/sanacc/vqlq/gift.svg" alt="gift">
                        <div class="text">
                            <p>
                                <span class="span_them_luot">NHẬN LƯỢT</span>
                            </p>
                            <p>
                                <span class="span_them_luot">QUAY MIỄN PHÍ</span>
                            </p>
                        </div>
                    </div>

                    <!-- <div class="headphone-icon" data-id="1">
                        <img src="/images/sanacc/vqlq/headphone.svg" alt="headphone">
                        <img class="mute_audio" src="/images/sanacc/vqlq/line.svg" alt="muted">
                    </div> -->

                    <!-- col 2 -->
                    <!-- <div class="text-col2">
                        <p>MAY MẮN: <span>20%</span></p>
                        <a href="">XEM QUY TẮC</a>
                    </div> -->

                    <!-- buy turn tablet -->
                    <div class="buy-turn-tablet">
                        <div class="buy-turn">
                            <span class="buy_luot" onclick="show_popup(6)">MUA THÊM LƯỢT QUAY</span>
                        </div>
                    </div>

                </div>

                <!-- rotation box -->

                <div class="rotation_box">
                    <div class="spin-img">
                        <img class="img_spin_img" src="/images/sanacc/vqlq/rotation.png" alt="rotation">
                        <div class="muiten_quay">
                            <img class="img_muiten" src="/images/sanacc/vqlq/muiten.png" alt="Mũi tên">
                        </div>
                        <div class="text-spin">
                            <p>MIỄN PHÍ SAU</p>
                            <h1><span id="h">00</span>:<span id="m">00</span>:<span id="s">00</span></h1>
                            <p>SỐ LƯỢT QUAY CÒN LẠI: <span class="span_count_play"><?= (isset($data_user) && $data_user['luotquay'] >= 0) ? $data_user['luotquay'] : 0 ?></span></p>
                            <div disabled class=" spin-btn ">
                                <span disabled>QUAY NGAY</span>
                            </div>
                            <!-- <div class="check-box">
                                <input type="checkbox" name="" id="">
                                <span>QUAY LIÊN TỤC</span>
                            </div> -->
                        </div>
                    </div>

                </div>
                <!-- end rotation -->
            </div>

            <div class="box-right">
                <div class="choose_spin">
                    <div class="game-board">
                        <p>CHỌN THỂ LOẠI VÒNG QUAY MAY MẮN</p>
                        <li class="li_type_lq backg-orange" data-type="luotquay"><span class="span_type_lq">VÒNG QUAY LIÊN QUÂN 1.000đ</span></li>
                        <li class="li_type_lq" data-type="luotquay9k"><span class="span_type_lq">VÒNG QUAY LIÊN QUÂN 9.000đ</span></li>
                        <li class="li_type_lq" data-type="luotquay20k"><span class="span_type_lq">VÒNG QUAY LIÊN QUÂN 20.000đ</span></li>
                        <li class="li_type_lq" data-type="luotquay50k"><span class="span_type_lq">VÒNG QUAY LIÊN QUÂN 50.000đ</span></li>
                        <li class="li_type_lq" data-type="luotquay100k"><span class="span_type_lq">VÒNG QUAY LIÊN QUÂN 100.000đ</span></li>
                        <li class="li_type_lq" data-type="luotquay200k"><span class="span_type_lq">VÒNG QUAY LIÊN QUÂN 200.000đ</span></li>
                        <li class="li_type_lq" data-type="luotquay500k"><span class="span_type_lq">VÒNG QUAY LIÊN QUÂN 500.000đ</span></li>
                    </div>
                    <!-- <div class="row_next_page">
                        <a href="">
                            <img src="/images/sanacc/vqlq/arrow-left.svg" alt="arrow-left">
                        </a>
                        <p>1 / 2</p>
                        <a href="">
                            <img src="/images/sanacc/vqlq/arrow-right.svg" alt="arrow-right">
                        </a>
                    </div> -->

                    <div class="buy-turn" onclick="show_popup(6)">
                        <span class="buy_luot">MUA THÊM LƯỢT QUAY</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="box-gift">
            <div class="active_gif"></div>
            <!-- 1k -->
            <?php if ($gif_luotquay != null) { ?>
                <div class="box-gift-items gift_luotquay show_slick">

                    <?php foreach ($gif_luotquay as $val) { ?>
                        <div class="gift-item">
                            <img class="img_hide img_one" src="/<?= $val['image'] ?>" alt="diamond">
                            <!-- <p><?= $val['name'] ?></p> -->
                        </div>
                    <?php } ?>


                </div>
            <?php } ?>
            <!-- 9k -->
            <?php if ($gif_luotquay9k != null) { ?>
                <div class="box-gift-items gift_luotquay9k show_slick">

                    <?php foreach ($gif_luotquay9k as $val) { ?>
                        <div class="gift-item">
                            <img class="img_hide img_one" src="/<?= $val['image'] ?>" alt="diamond">
                            <!-- <p><?= $val['name'] ?></p> -->
                        </div>
                    <?php } ?>


                </div>
            <?php } ?>
            <!-- 20k -->
            <?php if ($gif_luotquay20k != null) { ?>
                <div class="box-gift-items gift_luotquay20k show_slick">

                    <?php foreach ($gif_luotquay20k as $val) { ?>
                        <div class="gift-item">
                            <img class="img_hide img_one" src="/<?= $val['image'] ?>" alt="diamond">
                            <!-- <p><?= $val['name'] ?></p> -->
                        </div>
                    <?php } ?>


                </div>
            <?php } ?>
            <!-- 50k -->
            <?php if ($gif_luotquay50k != null) { ?>
                <div class="box-gift-items gift_luotquay50k show_slick">

                    <?php foreach ($gif_luotquay50k as $val) { ?>
                        <div class="gift-item">
                            <img class="img_hide img_one" src="/<?= $val['image'] ?>" alt="diamond">
                            <!-- <p><?= $val['name'] ?></p> -->
                        </div>
                    <?php } ?>


                </div>
            <?php } ?>
            <!-- 100k -->
            <?php if ($gif_luotquay100k != null) { ?>
                <div class="box-gift-items gift_luotquay100k show_slick">

                    <?php foreach ($gif_luotquay100k as $val) { ?>
                        <div class="gift-item">
                            <img class="img_hide img_one" src="/<?= $val['image'] ?>" alt="diamond">
                            <!-- <p><?= $val['name'] ?></p> -->
                        </div>
                    <?php } ?>


                </div>
            <?php } ?>
            <!-- 200k -->
            <?php if ($gif_luotquay200k != null) { ?>
                <div class="box-gift-items gift_luotquay200k show_slick">

                    <?php foreach ($gif_luotquay200k as $val) { ?>
                        <div class="gift-item">
                            <img class="img_hide img_one" src="/<?= $val['image'] ?>" alt="diamond">
                            <!-- <p><?= $val['name'] ?></p> -->
                        </div>
                    <?php } ?>


                </div>
            <?php } ?>
            <!-- 500k -->
            <?php if ($gif_luotquay500k != null) { ?>
                <div class="box-gift-items gift_luotquay500k show_slick">

                    <?php foreach ($gif_luotquay500k as $val) { ?>
                        <div class="gift-item">
                            <img class="img_hide img_one" src="/<?= $val['image'] ?>" alt="diamond">
                            <!-- <p><?= $val['name'] ?></p> -->
                        </div>
                    <?php } ?>


                </div>
            <?php } ?>
        </div>
    </div>
    <!-- thông báo trúng thưởng -->
    <div class="box_noti_gif popup_noti">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">Phần thưởng !</span>
            </div>
            <div class="body_noti_gif">
                <div class="body_gif_nav">
                    <div class="box_this_gif">
                        <img class="img_gif_this" src="/images/sanacc/danhmuc/ct_right.png" alt="phần thưởng">
                    </div>
                    <div class="div_img_noti">
                        <div class="box_left_img">
                            <div class="box_img_free">
                                <img class="img-small" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                            </div>
                            <div class="box_img_free">
                                <img class="img_big" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                            </div>
                        </div>
                        <div class="box_left_img">
                            <div class="box_img_free">
                                <img class="img_big" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                            </div>
                            <div class="box_img_free">
                                <img class="img-small" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                            </div>
                        </div>
                    </div>
                    <div class="box_text_noti_gif">
                        <div class="type_gif">
                            <p class="happy_gif">XIN CHÚC MỪNG</p>
                            <p class="detail_gif">BẠN ĐÃ TRÚNG GIẢI THƯỞNG KIM CƯƠNG</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.box_noti_gif').hide();">Đóng</span>
            </div>
        </div>
    </div>
    <!-- popup lịch sử quay -->
    <div class="box_noti_gif popup_hisory">
        <div class="body_gif history_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">LỊCH SỬ QUAY</span>
            </div>
            <div class="body_noti_gif body_history_gif">
                <table class="table_his">
                    <thead class="thead_his">
                        <tr>
                            <td class="td_stt">STT</td>
                            <td>Loại vòng quay</td>
                            <td>Giải thưởng</td>
                            <td>Ngày chơi</td>
                        </tr>
                    </thead>
                    <tbody class="tbody_his">
                    </tbody>
                </table>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$(this).parents('.box_noti_gif').hide();">Đóng</span>
            </div>
        </div>
    </div>
    <!-- thông báo nhận lượt quay free -->
    <div class="box_noti_gif popup_free">
        <div class="body_gif">
            <!-- <div class="title_noti_gif">
                <span class="noti_title_gif">Luwoj t !</span>
            </div> -->
            <div class="body_noti_gif">
                <div class="body_gif_nav">
                    <div class="box_text_noti_gif">
                        <div class="div_img_noti">
                            <div class="box_left_img">
                                <div class="box_img_free">
                                    <img class="img-small" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                                </div>
                                <div class="box_img_free">
                                    <img class="img_big" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                                </div>
                            </div>
                            <div class="box_left_img">
                                <div class="box_img_free">
                                    <img class="img_big" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                                </div>
                                <div class="box_img_free">
                                    <img class="img-small" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                                </div>
                            </div>
                        </div>
                        <div class="type_gif">
                            <p class="happy_gif">XIN CHÚC MỪNG</p>
                            <p class="detail_gif">BẠN ĐÃ NHẬN ĐƯỢC 1 LƯỢT QUAY 1.000đ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.popup_free').hide();">Đóng</span>
            </div>
        </div>
    </div>
    <!-- Hướng dẫn -->
    <div class="box_noti_gif popup_huong_dan">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">HƯỚNG DẪN</span>
            </div>
            <div class="body_noti_gif">
                <div class="body_gif_nav">
                    <div class="box_text_noti">
                        <p class="cac_buoc">Bước 1: <span>Đăng ký tài khoản.</span></p>
                        <p class="text_cacbuoc">- Tại Zendo có hai cách đăng ký tài khoản đó là: Facebook và Tên đăng nhập.</p>
                        <p class="cac_buoc">Bước 2: <span>Tham gia chơi vòng quay may mắn.</span></p>
                        <p class="text_cacbuoc">- Sau khi đã có tài khoản game, tại trang chủ của Zendo bạn chọn “Mini game => Liên quân mobile” để chơi vòng quay may mắn. Bạn sẽ chọn thể loại vòng quay mà bạn thích và nhấn giữ chọn góc quay mà bạn mong muốn. Sau khi kim dừng lại thì phần quà của bạn sẽ hiện ra ở giữa màn hình.</p>
                    </div>
                </div>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.popup_huong_dan').hide();">Đóng</span>
            </div>
        </div>
    </div>
    <!-- Phần quy tắc -->
    <div class="box_noti_gif popup_quy_tac">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">QUY TẮC</span>
            </div>
            <div class="body_noti_gif">
                <div class="body_gif_nav">
                    <div class="box_text_noti">
                        <p class="cac_buoc">Phần thưởng: <span>các bạn sẽ được nhận ngẫu nhiên theo may mắn các phần thưởng. Các bạn sẽ quy đổi phần thưởng như sau:
                            </span></p>
                        <p class="nav_cac_buoc">Zen: <span>sử dụng mua các sản phẩm trong shop Zendo.</span></p>
                        <p class="nav_cac_buoc">Phiếu phần thưởng:</p>
                        <p class="nav_nav_cac_buoc">Đổi được vòng quay:</p>
                        <p class="nav_nav_text_cac_buoc">- 10 phiếu 1 vòng quay 20.000đ.</p>
                        <p class="nav_nav_text_cac_buoc">- 30 phiếu: 2 vòng quay 50.000đ hoặc 5 vòng quay 20.000đ.</p>
                        <p class="nav_nav_text_cac_buoc">- 50 phiếu: 2 vòng quay 100.000đ hoặc 4 vòng quay 50.000đ hoặc 10 vòng quay 20.000đ.</p>
                        <p class="nav_nav_text_cac_buoc">- 10 phiếu 1 vòng quay 20.000đ.</p>
                        <p class="nav_nav_cac_buoc">Đổi skin: </p>
                        <p class="nav_nav_text_cac_buoc">- 20 phiếu = skin bậc A 49-99 quân huy.</p>
                        <p class="nav_nav_text_cac_buoc">- 30 phiếu = skin bậc S 159 quân huy.</p>
                        <p class="nav_nav_text_cac_buoc">- 50 phiếu = skin bậc S+ 279 quân huy.</p>
                        <p class="nav_nav_text_cac_buoc">- 100 phiếu = skin bậc SS 799 quân huy.</p>
                        <p class="nav_nav_cac_buoc">Đổi tượng Liên Quân: </p>
                        <p class="nav_nav_text_cac_buoc">- 150 phiếu.</p>
                        <p class="nav_nav_cac_buoc">Đổi Zen: </p>
                        <p class="nav_nav_text_cac_buoc">- 1 phiếu = 2.000 Zen.</p>
                        <p class="nav_nav_cac_buoc">Đổi Phiếu Cày rank: </p>
                        <p class="nav_nav_text_cac_buoc">- 100 phiếu = phiếu cày rank 80.000đ.</p>
                        <p class="nav_nav_text_cac_buoc">- 300 phiếu = phiếu cày rank 200.000đ.</p>
                        <p class="nav_nav_text_cac_buoc">- 499 phiếu = phiếu cày rank 500.000đ.</p>
                        <p class="nav_cac_buoc">Mảnh ghép skin: <span>bạn tích được 50 mảnh ghép skin sẽ đổi được 1 skin 150.000đ.</span></p>
                    </div>
                </div>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.popup_quy_tac').hide();">Đóng</span>
            </div>
        </div>
    </div>
    <!-- Nhiệm vụ -->
    <div class="box_noti_gif popup_nhiem_vu">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">NHIỆM VỤ</span>
            </div>
            <div class="body_noti_gif">
                <div class="body_gif_nav">
                    <div class="box_text_noti">
                        <p>Giới thiệu 1 bạn chơi mới nhận ngay vòng quay 20.000đ miễn phí.</span></p>
                        <p>Đăng kí ngay kênh Youtube của Zendo nhận ngay lượt quay miễn phí 9.000đ.</p>
                        <p>Khi mua acc từ 200.000đ được tặng 1 vòng quay 20.000đ.</p>
                        <p>Tích điểm sau mỗi lần mua acc, đủ 20 điểm khách hàng sẽ được tặng 1 vòng quay 20.000đ.</p>
                    </div>
                </div>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.popup_nhiem_vu').hide();">Đóng</span>
            </div>
        </div>
    </div>
    <!-- mua lượt quay -->
    <div class="box_noti_gif popup_buy_turn">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">MUA THÊM LƯỢT QUAY</span>
            </div>
            <div class="body_noti_gif">
                <div class="body_gif_nav">
                    <div class="box_text_noti">
                        <div class="box_select">
                            <select name="" id="select_luot">
                                <option value="0">Lượt quay 1.000đ</option>
                                <option value="1">Lượt quay 9.000đ</option>
                                <option value="2">Lượt quay 20.000đ</option>
                                <option value="3">Lượt quay 50.000đ</option>
                                <option value="4">Lượt quay 100.000đ</option>
                                <option value="5">Lượt quay 200.000đ</option>
                                <option value="6">Lượt quay 500.000đ</option>
                            </select>
                        </div>
                        <div class="box_type_buy " data-type="0" data-id="luotquay">
                            <div class="box_list_buy" data-id="1" data-val="1000"><span> <input type="checkbox" name="" class="inp_ck" id=""> 1 lượt</span> <span>1.000đ/10.000 Zen</span></div>
                            <div class="box_list_buy" data-id="5" data-val="4500"><span> <input type="checkbox" name="" class="inp_ck" id=""> 5 lượt</span> <span>4.500đ/45.000 Zen</span></div>
                            <div class="box_list_buy" data-id="10" data-val="8500"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 10 lượt</span> <span>8.500đ/85.000 Zen</span></div>
                        </div>
                        <div class="box_type_buy " data-type="1" data-id="luotquay9k">
                            <div class="box_list_buy" data-id="1" data-val="9000"><span> <input type="checkbox" name="" class="inp_ck" id=""> 1 lượt</span> <span>9.000đ/90.000 Zen</span></div>
                            <div class="box_list_buy" data-id="3" data-val="25000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 3 lượt</span> <span>25.000đ/250.000 Zen</span></div>
                            <div class="box_list_buy" data-id="5" data-val="40000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 5 lượt</span> <span>40.000đ/400.000 Zen</span></div>
                            <div class="box_list_buy" data-id="8" data-val="65000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 8 lượt</span> <span>65.000đ/650.000 Zen</span></div>
                            <div class="box_list_buy" data-id="10" data-val="75000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 10 lượt</span> <span>75.000đ/750.000 Zen</span></div>
                        </div>
                        <div class="box_type_buy " data-type="2" data-id="luotquay20k">
                            <div class="box_list_buy" data-id="1" data-val="20000"><span> <input type="checkbox" name="" class="inp_ck" id=""> 1 lượt</span> <span>20.000đ/200.000 Zen</span></div>
                            <div class="box_list_buy" data-id="3" data-val="50000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 3 lượt</span> <span>50.000đ/500.000 Zen</span></div>
                            <div class="box_list_buy" data-id="5" data-val="80000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 5 lượt</span> <span>80.000đ/800.000 Zen</span></div>
                            <div class="box_list_buy" data-id="8" data-val="140000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 8 lượt</span> <span>140.000đ/1.400.000 Zen</span></div>
                            <div class="box_list_buy" data-id="10" data-val="150000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 10 lượt</span> <span>150.000đ/1.500.000 Zen</span></div>
                        </div>
                        <div class="box_type_buy " data-type="3" data-id="luotquay50k">
                            <div class="box_list_buy" data-id="1" data-val="50000"><span> <input type="checkbox" name="" class="inp_ck" id=""> 1 lượt</span> <span>50.000đ/500.000 Zen</span></div>
                            <div class="box_list_buy" data-id="3" data-val="130000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 3 lượt</span> <span>130.000đ/1.300.000 Zen</span></div>
                            <div class="box_list_buy" data-id="5" data-val="230000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 5 lượt</span> <span>230.000đ/2.300.000 Zen</span></div>
                            <div class="box_list_buy" data-id="8" data-val="370000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 8 lượt</span> <span>370.000đ/3.700.000 Zen</span></div>
                            <div class="box_list_buy" data-id="10" data-val="450000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 10 lượt</span> <span>450.000đ/4.500.000 Zen</span></div>
                        </div>
                        <div class="box_type_buy " data-type="4" data-id="luotquay100k">
                            <div class="box_list_buy" data-id="1" data-val="100000"><span> <input type="checkbox" name="" class="inp_ck" id=""> 1 lượt</span> <span>100.000đ/1.000.000 Zen</span></div>
                            <div class="box_list_buy" data-id="3" data-val="280000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 3 lượt</span> <span>280.000đ/2.800.000 Zen</span></div>
                            <div class="box_list_buy" data-id="5" data-val="440000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 5 lượt</span> <span>440.000đ/4.400.000 Zen</span></div>
                            <div class="box_list_buy" data-id="8" data-val="710000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 8 lượt</span> <span>710.000đ/7.100.000 Zen</span></div>
                            <div class="box_list_buy" data-id="10" data-val="870000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 10 lượt</span> <span>870.000đ/8.700.000 Zen</span></div>
                        </div>
                        <div class="box_type_buy " data-type="5" data-id="luotquay200k">
                            <div class="box_list_buy" data-id="1" data-val="200000"><span> <input type="checkbox" name="" class="inp_ck" id=""> 1 lượt</span> <span>200.000đ/2.000.000 Zen</span></div>
                            <div class="box_list_buy" data-id="3" data-val="580000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 3 lượt</span> <span>580.000đ/5.800.000 Zen</span></div>
                            <div class="box_list_buy" data-id="5" data-val="960000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 5 lượt</span> <span>960.000đ/9.600.000 Zen</span></div>
                            <div class="box_list_buy" data-id="8" data-val="1530000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 8 lượt</span> <span>1.530.000đ/15.300.000 Zen</span></div>
                            <div class="box_list_buy" data-id="10" data-val="1910000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 10 lượt</span> <span>1.910.000đ/19.100.000 Zen</span></div>
                        </div>
                        <div class="box_type_buy " data-type="6" data-id="luotquay500k">
                            <div class="box_list_buy" data-id="1" data-val="500000"><span> <input type="checkbox" name="" class="inp_ck" id=""> 1 lượt</span> <span>500.000đ/5.000.000 Zen</span></div>
                            <div class="box_list_buy" data-id="3" data-val="1480000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 3 lượt</span> <span>1.480.000đ/14.800.000 Zen</span></div>
                            <div class="box_list_buy" data-id="5" data-val="2460000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 5 lượt</span> <span>2.460.000đ/24.600.000 Zen</span></div>
                            <div class="box_list_buy" data-id="8" data-val="3940000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 8 lượt</span> <span>3.940.000đ/39.400.000 Zen</span></div>
                            <div class="box_list_buy" data-id="10" data-val="4910000"> <span> <input type="checkbox" name="" class="inp_ck" id=""> 10 lượt</span> <span>4.910.000đ/49.100.000 Zen</span></div>
                        </div>
                        <input type="text" id="type_buy" value="" hidden>
                        <input type="text" id="count_buy" value="" hidden>
                        <input type="text" id="val_buy" value="" hidden>

                    </div>
                </div>
            </div>
            <div class="box_close_gif box_close_gif_buy">
                <span class="span_close_gif buy_now">Mua bằng VNĐ</span>
                <span class="span_close_gif buy_zen">Mua bằng Zen</span>
                <span class="span_close_gif" onclick="$('.popup_buy_turn').hide();">Đóng</span>
            </div>
        </div>
    </div>
    <!--  loading....-->
    <div class="box_noti_gif popup_load">
        <div class="body_gif loading_body">
            <img src="/images/sanacc/vqlq/loading-4.gif" alt="loading...">
        </div>
    </div>
    <!-- thông báo mua lượt quay thành công -->
    <div class="box_noti_gif popup_sucess">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">THÀNH CÔNG</span>
            </div>
            <div class="body_noti_gif">
                <div class="body_gif_nav">
                    <div class="div_img_noti">
                        <div class="box_left_img">
                            <div class="box_img_free">
                                <img class="img-small" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                            </div>
                            <div class="box_img_free">
                                <img class="img_big" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                            </div>
                        </div>
                        <div class="box_left_img">
                            <div class="box_img_free">
                                <img class="img_big" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                            </div>
                            <div class="box_img_free">
                                <img class="img-small" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                            </div>
                        </div>
                    </div>
                    <div class="box_text_noti_gif">
                        <div class="type_gif">
                            <p class="happy_gif">Mua Lượt quay hành công</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.popup_sucess').hide();">Đóng</span>
            </div>
        </div>
    </div>
    <!-- thông báo thất bại -->
    <div class="box_noti_gif popup_error">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">THẤT BẠI</span>
            </div>
            <div class="body_noti_gif">
                <div class="body_gif_nav">
                    <img class="img_error" src="/images/sanacc/vqlq/error.svg" alt="lỗi">
                    <div class="box_text_noti_gif">
                        <div class="type_gif">
                            <p class="happy_gif">Bạn chưa đăng nhập. Vui lòng đăng nhập!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.popup_error').hide();">Đóng</span>
                <span class="span_close_gif btn_lg" style="background: #e67300 " onclick="window.location.href = '/dang-nhap/'">Đăng nhập</span>
            </div>
        </div>
    </div>
    <!-- thông báo thất bại -->
    <div class="box_noti_gif popup_confirm">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">THẤT BẠI</span>
            </div>
            <div class="body_noti_gif">
                <div class="body_gif_nav">
                    <img class="img_error" src="/images/sanacc/vqlq/error.svg" alt="lỗi">
                    <div class="box_text_noti_gif">
                        <div class="type_gif">
                            <p class="happy_gif">Bạn chưa đăng nhập. Vui lòng đăng nhập!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.popup_confirm').hide();">Đóng</span>
                <span class="span_close_gif btn_lg" style="background: #e67300 " onclick="buy_now(1)">Xác nhận</span>
            </div>
        </div>
    </div>



</div>
<style>
    .slick-track {
        width: max-content !important;
    }

    .select2-search--dropdown {
        display: none !important;
    }

    .select2-selection__clear {
        display: none !important;
    }


    .select2-container--default .select2-selection--single {
        background: #e67300 !important;
        text-align: center;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        font-weight: 500 !important;
        color: #fff !important;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background: #e67300;
    }
</style>
<?php
// Require footer
require_once 'includes/footer.php';

?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/keyframes.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>
    $("#change_type,#select_luot").select2({
        width: '100%',
        allowClear: true
    });

    var type_play = 'luotquay';
    var val_type = getCookie('luotquay');
    var tam_type = ".gift_luotquay";
    var w_auto = 0;
    $('.li_type_lq').click(function() {
        if (tam_type != '.gift_' + $(this).data('type')) {
            $('.popup_load').show()
        }
        w_auto = $(tam_type).find('.gift-item').width();
        $('.backg-orange').removeClass('backg-orange');
        $(this).addClass('backg-orange');
        type_play = $(this).data('type');

        setCookies('this_play', type_play, 1)
        val_type = getCookie(type_play);
        $('.span_count_play').text(val_type);
        $(tam_type).hide();
        tam_type = '.gift_' + type_play;
        $(tam_type).css({
            'display': 'flex',
        });
        $(tam_type).find('.gift-item').css({
            'width': w_auto,
        });
        $('.show_slick').slick('slickGoTo', parseInt(0));
        $('.slick-list').css({
            'width': 'max-content'
        });
        setTimeout(function() {
            $('.popup_load').hide()
        }, 500);
        setCookies('this_play', type_play, 1)
        if (type_play == 'luotquay') {
            $('#select_luot').val('0').change();
        } else if (type_play == 'luotquay9k') {
            $('#select_luot').val('1').change();
        } else if (type_play == 'luotquay20k') {
            $('#select_luot').val('2').change();
        } else if (type_play == 'luotquay50k') {
            $('#select_luot').val('3').change();
        } else if (type_play == 'luotquay100k') {
            $('#select_luot').val('4').change();
        } else if (type_play == 'luotquay200k') {
            $('#select_luot').val('5').change();
        } else if (type_play == 'luotquay500k') {
            $('#select_luot').val('6').change();
        }

    });
    $('#change_type').change(function() {

        if (tam_type != '.gift_' + $(this).val()) {
            $('.popup_load').show()
        }
        w_auto = $(tam_type).find('.gift-item').width();
        $('.backg-orange').removeClass('backg-orange');
        // $(this).addClass('backg-orange');
        type_play = $(this).val();
        val_type = getCookie(type_play);
        $('.span_count_play').text(val_type);
        $(tam_type).hide();
        tam_type = '.gift_' + type_play;
        $(tam_type).css({
            'display': 'flex',
        });
        $(tam_type).find('.gift-item').css({
            'width': w_auto,
        });
        $('.show_slick').slick('slickGoTo', parseInt(0));
        $('.slick-list').css({
            'width': 'max-content'
        });
        setTimeout(function() {
            $('.popup_load').hide()
        }, 500);

        setCookies('this_play', type_play, 1)
        setCookies('this_play', type_play, 1)
        if (type_play == 'luotquay') {
            $('#select_luot').val('0').change();
        } else if (type_play == 'luotquay9k') {
            $('#select_luot').val('1').change();
        } else if (type_play == 'luotquay20k') {
            $('#select_luot').val('2').change();
        } else if (type_play == 'luotquay50k') {
            $('#select_luot').val('3').change();
        } else if (type_play == 'luotquay100k') {
            $('#select_luot').val('4').change();
        } else if (type_play == 'luotquay200k') {
            $('#select_luot').val('5').change();
        } else if (type_play == 'luotquay500k') {
            $('#select_luot').val('6').change();
        }
    })

    function getRndInteger(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }
    timeOut = 0;
    myVar = 0;
    my_gocquay = 0;
    random_vq = 0;

    var i = -20;
    var test_time = 0;
    var goc_quay = -20;
    var img_flip = '';
    var name = "";
    var vtri_slick = 1;
    var type_run = 0;
    var rm_time = 0;
    var check_click = 0;
    var a = -20;
    var type_gift = "";
    setCookies('this_play', 'luotquay', 1)

    clearInterval(timeOut);
    $('.spin-btn').click(function() {
        i = -20;
        type_run = 0;
        val_type = getCookie(type_play);
        setCookies('this_play', type_play, 1)
        if ($('.spin-btn').hasClass('spin_btn_none') == true) {
            return false;
        } else {
            $('.spin-btn').removeClass('spin_btn_none');
            $.ajax({
                url: '/assets/ajax/random_lucky.php',
                type: 'POST',
                data: 1,
                async: true,
                dataType: 'json',
                success: function(data) { // 
                    if (data.status == 0) {

                        setCookies('url_301', 'https://zendo.vn/vong-quay-lien-quan/', 1)
                        $('.popup_error').find('.happy_gif').text('Bạn chưa đăng nhập. Vui lòng đăng nhập!');
                        $('.popup_error').find('.btn_lg').show();
                        $('.popup_error').show()
                        type_run = 0;
                        return false;
                    } else if (data.status == 2) {

                        $('.popup_error').find('.happy_gif').text('Số lượt quay của bạn đã hết, vui lòng kiểm tra lại !');
                        $('.popup_error').find('.btn_lg').hide();
                        $('.popup_error').show()
                        // window.location.reload();
                        type_run = 0;
                        return false;
                    } else {
                        $('.spin-btn').addClass('tam_play');
                        type_run = 1;
                        vtri_slick = data.stt;
                        random_vq = 140;
                        type_gift = data.type_gift;
                        setCookies(type_play, (val_type - 1), 1)
                        $('.span_count_play').text((val_type - 1))
                        val_type = val_type - 1;
                        img_flip = data.img_vip;
                        name = data.name;


                        goc_quay = 200;
                        // luot_quay = a;
                        $.keyframe.define([{
                            name: 'mymove',
                            '0%': {
                                'transform': 'rotate(' + 200 + 'deg)',
                            }
                        }]);
                        $('.muiten_quay').css({
                            'transform': 'rotate(' + 200 + 'deg)',
                        })

                        check_click = 1;
                        clearInterval(timeOut);
                        clearInterval(myVar);
                        clearInterval(my_gocquay);
                        test_time = 0;
                        myVar = setInterval(myTimer, 50);
                        my_gocquay = setInterval(function() {
                            goc_quay--;
                            if (goc_quay < -20) {
                                // clearInterval(my_gocquay);
                                goc_quay = -20;
                                $('.muiten_quay').css({
                                    'transform': 'rotate(-20deg)',
                                })
                            } else {
                                $('.muiten_quay').css({
                                    'transform': 'rotate(' + goc_quay + 'deg)',
                                })
                            }
                        }, 20);
                        check_click = 0;
                        $('.spin-btn').addClass('spin_btn_none');


                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    })
    // $('.spin-btn').on('click ', function(e) {
    //     i = -20;
    //     type_run = 0;
    //     val_type = getCookie(type_play);
    //     setCookies('this_play', type_play, 1)
    //     if ($('.spin-btn').hasClass('spin_btn_none') == true) {
    //         return false;
    //     } else {
    //         $('.spin-btn').removeClass('spin_btn_none');
    //         $.ajax({
    //             url: '/assets/ajax/random_lucky.php',
    //             type: 'POST',
    //             data: 1,
    //             async: true,
    //             dataType: 'json',
    //             success: function(data) { // 
    //                 if (data.status == 0) {

    //                     setCookies('url_301', 'https://zendo.vn/vong-quay-lien-quan/', 1)
    //                     $('.popup_error').find('.happy_gif').text('Bạn chưa đăng nhập. Vui lòng đăng nhập!');
    //                     $('.popup_error').find('.btn_lg').show();
    //                     $('.popup_error').show()
    //                     type_run = 0;
    //                     return false;
    //                 } else if (data.status == 2) {

    //                     $('.popup_error').find('.happy_gif').text('Số lượt quay của bạn đã hết, vui lòng kiểm tra lại !');
    //                     $('.popup_error').find('.btn_lg').hide();
    //                     $('.popup_error').show()
    //                     // window.location.reload();
    //                     type_run = 0;
    //                     return false;
    //                 } else {
    //                     $('.spin-btn').addClass('tam_play');
    //                     type_run = 1;
    //                     vtri_slick = data.stt;
    //                     random_vq = 140;
    //                     setCookies(type_play, (val_type - 1), 1)
    //                     $('.span_count_play').text((val_type - 1))
    //                     val_type = val_type - 1;
    //                     img_flip = data.img_vip;
    //                     name = data.name;
    //                     timeOut = setInterval(function() {
    //                         a = i++;
    //                         goc_quay = a;
    //                         // luot_quay = a;
    //                         $.keyframe.define([{
    //                             name: 'mymove',
    //                             '0%': {
    //                                 'transform': 'rotate(' + i + 'deg)',
    //                             }
    //                         }]);
    //                         $('.muiten_quay').css({
    //                             'transform': 'rotate(' + i + 'deg)',
    //                         })
    //                         if (a > 200) {
    //                             a = 200;
    //                             check_click = 1;
    //                             clearInterval(timeOut);
    //                             clearInterval(myVar);
    //                             clearInterval(my_gocquay);
    //                             test_time = 0;
    //                             myVar = setInterval(myTimer, 50);
    //                             my_gocquay = setInterval(rm_gocquay, 20);
    //                             check_click = 0;
    //                             $('.spin-btn').addClass('spin_btn_none');
    //                             return false;
    //                         }

    //                     }, 20);
    //                     return false
    //                 }
    //             },
    //             cache: false,
    //             contentType: false,
    //             processData: false
    //         });
    //     }
    // }).bind('mouseup  touchend ', function() {
    //     if ($('.spin-btn').hasClass('spin_btn_none')) {
    //         return false;
    //     } else {
    //         if (check_click != 1) {
    //             clearInterval(timeOut);
    //             clearInterval(myVar);
    //             clearInterval(my_gocquay);
    //             i = -20;
    //             test_time = 0;
    //             a = -20
    //             $('.spin-btn').addClass('spin_btn_none');
    //             if (type_run == 1) {
    //                 myVar = setInterval(myTimer, 50);
    //                 my_gocquay = setInterval(rm_gocquay, 20);
    //             }
    //         }

    //     }

    // });
    $('.show_slick').slick({
        centerMode: true,
        // centerPadding: '60px',
        slidesToShow: 5,
        prevArrow: ` <img src="/images/sanacc/vqlq/arrow-left.svg" alt="arrow-left">`,
        nextArrow: ` <img src="/images/sanacc/vqlq/arrow-right.svg" class="next_slick" alt="arrow-right">`,
        autoplaySpeed: 1,
        speed: 50,
        draggable: false,
        // pauseOnHover: false,
        // pauseOnFocus: false,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1025,
            settings: {
                centerPadding: '-200px',
                centerMode: true,
                slidesToShow: 3,
            },
        }, ]

    });

    function run() {
        $('.show_slick').slick('slickGoTo', parseInt(vtri_slick - 1));
    }

    function myTimer() {
        if (test_time >= random_vq) {
            run()
            clearInterval(myVar);
            $('.img_gif_this').attr('src', '/' + img_flip);
            $('.name_gif').text(name);
            $('.detail_gif').text('BẠN ĐÃ TRÚNG GIẢI THƯỞNG ' + name)
            $('.popup_noti').show();
            $('.spin-btn').removeClass('spin_btn_none');
            $('.spin-btn').removeClass('tam_play');
            i = -20;
            a = -20
            i = -20;
            if (type_gift == 4) {
                setCookies(type_play, parseInt(val_type + 1), 1)
                $('.span_count_play').text(parseInt(val_type + 1))
            }
        } else {
            $('.next_slick').click();
        }
        test_time++;
    }

    // function rm_gocquay() {

    // }

    function setCookies(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function show_popup(type) {
        var data = new FormData();
        data.append('type', type)
        if (type == 3) {
            $.ajax({
                url: '/assets/ajax/get_history_gift.php',
                type: 'POST',
                data: data,
                async: true,
                dataType: 'json',
                success: function(data) { // 
                    $('.tbody_his').html(data.html);
                    $('.popup_hisory').show();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else if (type == 5) {
            var data = new FormData();
            data.append('type', type)
            $.ajax({
                url: '/assets/ajax/get_history_gift.php',
                type: 'POST',
                data: data,
                async: true,
                dataType: 'json',
                success: function(data) {
                    if (data.status == 1) {
                        $('.popup_free .happy_gif').text("XIN CHÚC MỪNG");
                        $('.popup_free .detail_gif').text("BẠN ĐÃ NHẬN ĐƯỢC 1 LƯỢT QUAY 1.000đ");
                        $('.popup_free').show();
                        setCookies('luotquay', (parseInt(getCookie('luotquay')) + 1), 1)
                        $('.span_count_play').text((parseInt(getCookie('luotquay'))));
                        h = null; // Giờ
                        m = null; // Phút
                        s = null;

                        $('.nav_noti_add').hide();
                        start(1);
                    } else {
                        $('.popup_free .happy_gif').text("THÔNG BÁO");
                        $('.popup_free .detail_gif').text("BẠN ĐÃ NHẬN THƯỞNG RỒI!");
                        $('.popup_free').show();

                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else if (type == 1) {
            $('.popup_huong_dan').show();
        } else if (type == 2) {
            $('.popup_quy_tac').show();
        } else if (type == 4) {
            $('.popup_nhiem_vu').show();
        } else if (type == 6) {
            $('.popup_buy_turn').show();
        }
    }



    $(document).ready(function() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', '/images/sanacc/vqlq/xsmb.mp3');
        // audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.setAttribute('loop', 'loop');
        //audioElement.load()
        $.get();
        // audioElement.play();
        $('.headphone-icon').click(function() {
            // alert(1)
            if ($(this).data('id') == 1) {
                audioElement.play();
                $(this).data('id', 2)
                $('.mute_audio').hide();
            } else {
                audioElement.pause();
                $(this).data('id', 1)
                $('.mute_audio').show();
            }
            // audioElement.play();
        });



    });
    var h = null; // Giờ
    var m = null; // Phút
    var s = null; // Giây
    var time_now = new Date();
    var day = time_now.getDate();
    var month = time_now.getMonth() + 1;
    if (month < 10) {
        month = '0' + month;
    }
    var year = time_now.getFullYear();
    var day_old = '<?= $d ?>';
    var month_old = '<?= $d ?>';
    var year_old = '<?= $d ?>';
    var timeout = null; // Timeout
    var fullday = day + '-' + month + '-' + year;

    function start(type) {

        $('.nav_noti_add').hide();
        /*BƯỚC 1: LẤY GIÁ TRỊ BAN ĐẦU*/
        if (h === null) {
            if (type == 1) {
                h = 23;
                m = 59;
                s = 59;
            } else {
                h = <?= $h ?>;
                m = <?= $i ?>;
                s = <?= $s ?>;
            }
            // h = 23;
            // m = 59;
            // s = 59;
        }

        /*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
        // Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
        //  - giảm số phút xuống 1 đơn vị
        //  - thiết lập số giây lại 59
        if (s === -1) {
            m -= 1;
            s = 59;
        }

        // Nếu số phút = -1 tức là đã chạy ngược hết số phút, lúc này:
        //  - giảm số giờ xuống 1 đơn vị
        //  - thiết lập số phút lại 59
        if (m === -1) {
            h -= 1;
            m = 59;
        }

        // Nếu số giờ = -1 tức là đã hết giờ, lúc này:
        //  - Dừng chương trình
        if (h == -1) {
            h = null; // Giờ
            m = null; // Phút
            s = null; // Giây
            clearTimeout(timeout);
            return false;
        }

        /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/

        $('#h').text((h < 10) ? '0' + h : h);
        $('#m').text((m < 10) ? '0' + m : m);
        $('#s').text((s < 10) ? '0' + s : s);
        /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
        if (h < 1 && m < 1 && s < 1 || h > 23) {
            $('.nav_noti_add').show();
            $('.popup_free .happy_gif').text("XIN CHÚC MỪNG");
            $('.popup_free .detail_gif').text("BẠN ĐÃ NHẬN ĐƯỢC 1 LƯỢT QUAY 1.000đ");
        } else {
            timeout = setTimeout(function() {
                s--;
                start(0);
            }, 1000);
        }

    }
    var id = '<?= $id ?>';
    if (parseInt(id) > 0) {
        if (parseInt(<?= $tgian ?>) > 0) {
            $('.nav_noti_add').hide();
            start(0);
        } else {
            $('.nav_noti_add').show();
        }
    }
    if ($('.box_type_buy').data('type') == 0) {
        $(this).show();
    }
    $(".box_type_buy").each(function(index) {
        if ($(this).data('type') == 0) {
            $(this).show();
        }
    });
    $('#select_luot').change(function() {
        var val = $(this).val();
        $('.box_type_buy').hide();
        $(".box_type_buy").each(function(index) {
            if ($(this).data('type') == val) {
                $(this).show();
            }
        })
    });
    $('.inp_ck').click(function() {
        if ($(this).prop('checked')) {
            $(".inp_ck").prop('checked', false);
            $(this).prop('checked', true);
            var val_buy = $(this).parents('.box_type_buy').data('id');
            $('#type_buy').val(val_buy);
            $('#count_buy').val($(this).parents('.box_list_buy').data('id'));
            $('#val_buy').val($(this).parents('.box_list_buy').data('val'));

        }
    })
    $('.buy_now').click(function() {
        if ($('#count_buy').val() == 0) {
            // alert('Bạn chưa chọn số lượng lượt mua!');
            $('.popup_error').find('.happy_gif').text('Bạn chưa chọn số lượng lượt mua!');
            $('.popup_error').find('.btn_lg').hide();
            $('.popup_error').show()
        } else {
            $('.popup_confirm').find('.happy_gif').text('Bạn muốn mua ' + $('#count_buy').val() + ' với ' + $('#val_buy').val().toLocaleString(window.document.documentElement.lang) + ' VNĐ');
            $('.popup_confirm').find('.btn_lg').attr('onclick', 'buy_now(1)');
            $('.popup_confirm').show()
        }
    })
    $('.buy_zen').click(function() {
        if ($('#count_buy').val() == 0) {
            // alert('Bạn chưa chọn số lượng lượt mua!');
            $('.popup_error').find('.happy_gif').text('Bạn chưa chọn số lượng lượt mua!');
            $('.popup_error').find('.btn_lg').hide();
            $('.popup_error').show()
        } else {
            $('.popup_confirm').find('.happy_gif').text('Bạn muốn mua ' + $('#count_buy').val() + ' với ' + ($('#val_buy').val() * 10).toLocaleString(window.document.documentElement.lang) + ' Zen');
            $('.popup_confirm').find('.btn_lg').attr('onclick', 'buy_now(2)');
            $('.popup_confirm').show()
        }
    })


    function buy_now(type) {
        if (parseInt(id) > 0) {
            var data = new FormData();
            data.append('val', $('#type_buy').val());
            data.append('count', $('#count_buy').val());
            data.append('price', $('#val_buy').val());
            data.append('type', 1);
            data.append('type_buy', type);
            if ($('#count_buy').val() == 0) {
                // alert('Bạn chưa chọn số lượng lượt mua!');
                $('.popup_error').find('.happy_gif').text('Bạn chưa chọn số lượng lượt mua!');
                $('.popup_error').find('.btn_lg').hide();
                $('.popup_error').show()
                $('.popup_confirm').hide()
            } else {

                $.ajax({
                    url: '/assets/ajax/get_history_gift.php',
                    type: 'POST',
                    data: data,
                    async: true,
                    dataType: 'json',
                    success: function(data) { // 
                        if (data.status == 0) {
                            $('.popup_error').find('.happy_gif').text('Tài khoản bạn không đủ tiền. Vui lòng kiểm tra lại!');
                            $('.popup_error').find('.btn_lg').hide();
                            $('.popup_error').show()
                            $('.popup_confirm').hide()
                        } else {

                            // alert('Mua lượt quay thành công!');
                            $('.popup_sucess').show();
                            $('.popup_confirm').hide()
                            setCookies($('#type_buy').val(), parseInt(getCookie($('#type_buy').val())) + parseInt($('#count_buy').val()), 1)

                            if (getCookie('this_play') == $('#type_buy').val()) {
                                $('.span_count_play').text(getCookie($('#type_buy').val()))
                            }
                            $('#count_buy').val(0);
                            $(".inp_ck").prop('checked', false);
                            $('.popup_buy_turn').hide();
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        } else {
            $('.popup_confirm').hide()
            setCookies('url_301', 'https://zendo.vn/vong-quay-lien-quan/', 1)
            $('.popup_error').find('.btn_lg').show();
            $('.popup_error').find('.happy_gif').text('Bạn chưa đăng nhập. Vui lòng đăng nhập!');
            $('.popup_error').show()
            // alert('Bạn chưa đăng nhập. Vui lòng đăng nhập!');
            // window.location.href = '/dang-nhap/';

        }
    }
</script>