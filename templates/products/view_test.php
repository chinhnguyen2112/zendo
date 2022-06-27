<?php
$url = $_SERVER['REQUEST_URI'];
$id = trim(addslashes(htmlspecialchars($_GET['id'])));
if ($url != '/tai-khoan-' . $id . '/') {
    new Redirect('https://zendo.vn/tai-khoan-' . $id . '/'); // về trang chủ
    exit;
}
// Lấy dữ liệu tài khoản
if ($data_user['id'] == 1373 || $data_user['id'] == 1572) {
    $sql_id = "";
} else {
    $sql_id = "AND type_post != 4";
}
$sql_get_data = "SELECT * FROM posts WHERE id_post = '{$id}' $sql_id LIMIT 1";
if ($db->num_rows($sql_get_data) < 1) {
    new Redirect($_DOMAIN); // về trang chủ
    exit;
}
$info = $db->fetch_assoc($sql_get_data, 1);
$get_info = new Info;

// check đặt cọc
$sql_get_pre = "SELECT * FROM `pre_order` WHERE id_post = '{$id}' AND `status` = '0' LIMIT 1";
$get_pre = $db->fetch_assoc($sql_get_pre, 1);

$check_page = $info['check_page'];
$sql_av = "SELECT * FROM setting_random  WHERE id ='$check_page'";
if ($db->num_rows($sql_av)) {
    $data_av = $db->fetch_assoc($sql_av, 1);
}
$price = $info["price"];
$id_u = $data_user['id'];
$sql = "SELECT history_gift.*,name,image,value FROM history_gift INNER JOIN gift ON history_gift.id_gift = gift.id   WHERE id_user = $id_u AND gift.type_item = 2 AND gift.value_use <= '$price' AND history_gift.type = 0  ORDER BY created_at DESC ";
$history_luotquay = $db->fetch_assoc($sql, 0);
// check xem loại acc nào
$type_account = 1; // 1 là liên quân
if ($info['type_account'] == 'Free Fire') {
    $type_account = 2;
} elseif ($info['type_account'] == 'Liên Minh Huyền Thoại') {
    $type_account = 3;
} elseif ($info['type_account'] == 'Tốc Chiến') {
    $type_account = 4;
} elseif ($info['type_account'] == 'Pubg') {
    $type_account = 5;
} elseif ($info['type_account'] == 'Fifa') {
    $type_account = 6;
} elseif ($info['type_account'] == 'CF') {
    $type_account = 7;
}
?>
<link rel="stylesheet" href="/assets/css/sanacc/reset.css">
<link rel="stylesheet" href="/assets/css/sanacc/css_detail_acc.css?v=<?= time() ?>">
<div class="content">
    <div class="content_child">
        <div class="breadcrump">
            <a class="home_ic" href="/">
                <img src="/images/sanacc/detail/ic_home.svg" alt="breadcums">
            </a>
            <img src="/images/sanacc/detail/ic_next_home.svg" class="ic_next" alt="next icon">
            <span class="text_bread"><?php if ($type_account == 1) {
                                            echo "Shop acc liên quân";
                                        } else if ($type_account == 2) {
                                            echo "Shop acc free fire";
                                        } else if ($type_account == 3) {
                                            echo "Shop acc liên minh huyền thoại";
                                        } else if ($type_account == 4) {
                                            echo "Shop acc liên minh tốc chiến";
                                        } else if ($type_account == 5) {
                                            echo "Shop acc pubg mobile";
                                        } else if ($type_account == 6) {
                                            echo "Shop acc fifa online 4";
                                        } else if ($type_account == 7) {
                                            echo "Shop acc đột kích";
                                        }      ?></span>
            <img src="/images/sanacc/detail/ic_next_home.svg" class="ic_next" alt="next icon">
            <span class="text_bread">Mã số: <?= $info['id_post']; ?></span>
        </div>
        <h1 class="h1">Mã số: #<?= $info['id_post']; ?></h1>
        <div class="detail_acc">
            <div class="detail_acc_left">
                <h2 class="h2">Mã số #<?= $info['id_post']; ?></h2>
                <div class="content_detail_left">
                    <div class="img_left">
                        <?php if ($check_page < 14) { ?>
                            <img src="/<?= $data_av['avatar']; ?>" alt="rank">
                            <?php } else {
                            if ($type_account == 6 || $type_account == 7) { ?>
                                <img class="nen_rank lazyload" src="/images/load.gif" data-src="/<?php echo $get_info->get_thumb($info['id_post']); ?>" alt="chi tiết acc">
                            <?php } else { ?>
                                <img class="nen_rank" src="/images/sanacc/img_list_vq.png" alt="rank">
                                <div class="ab_detail"><img class="img_rank lazyload" src="/images/load.gif" data-src="<?php if ($type_account == 1) {
                                                                                                                            echo $get_info->get_icon_rank($info['rank']);
                                                                                                                        } else if ($type_account == 2) {
                                                                                                                            echo $get_info->get_icon_rank($info['rank'], 'FF');
                                                                                                                        } else if ($type_account == 3) {
                                                                                                                            echo $get_info->get_icon_rank($info['rank'], 'LMHT');
                                                                                                                        } else if ($type_account == 4) {
                                                                                                                            echo $get_info->get_icon_rank($info['rank'], 'LMTC');
                                                                                                                        } else if ($type_account == 5) {
                                                                                                                            echo $get_info->get_icon_rank($info['rank'], 'PUBG');
                                                                                                                        }  ?>"></div>
                        <?php }
                        } ?>
                    </div>
                    <div class="child_right_detail">
                        <ul class="child_right_detail_ul">
                            <?php if ($type_account == 7) { ?>
                                <li class="child_right_detail_li">
                                    <div class="left">
                                        <img src="/images/sanacc/detail/note.svg" alt="note">
                                        <label>Ghi chú</label>
                                    </div>
                                    <p class="p_green p_right"><?php echo ($info['note']); ?></p>
                                </li>
                            <?php } else { ?>
                                <li class="child_right_detail_li">
                                    <div class="left">
                                        <img src="/images/sanacc/detail/champ.svg" alt="champ">
                                        <label><?php if ($type_account == 1 || $type_account == 4) {
                                                    echo "Tướng";
                                                } else if ($type_account == 2 || $type_account == 5) {
                                                    echo "Đăng ký";
                                                } else if ($type_account == 3) {
                                                    echo "Server";
                                                } else if ($type_account == 6) {
                                                    echo "GTĐH";
                                                }  ?></label>
                                    </div>
                                    <p class="p_right"><?php if ($type_account == 1 || $type_account == 4) {
                                                            echo number_format($info["champs_count"], 0, '.', '.') . ' tướng';
                                                        } else if ($type_account == 2) {
                                                            echo source_signup($info['source']);
                                                        } else if ($type_account == 3) {
                                                            echo source_signup($info['source'], 'LMHT');
                                                        } else if ($type_account == 5) {
                                                            echo source_signup($info['source'], 'PUBG');
                                                        } else if ($type_account == 6) {
                                                            echo $info['skins'];
                                                        }  ?> </p>
                                </li>
                                <?php if ($type_account == 3) { ?>
                                    <li class="child_right_detail_li">
                                        <div class="left">
                                            <img src="/images/sanacc/detail/champ.svg" alt="champ">
                                            <label>Tướng</label>
                                        </div>
                                        <p class="p_right"><?= number_format($info["champs_count"], 0, '.', '.') . ' tướng'; ?> </p>
                                    </li>
                                <?php } elseif ($type_account == 5) { ?>
                                    <li class="child_right_detail_li">
                                        <div class="left">
                                            <img src="/images/sanacc/detail/champ.svg" alt="champ">
                                            <label>Skin súng</label>
                                        </div>
                                        <p class="p_right"><?= number_format($info["champs_count"], 0, '.', '.'); ?> </p>
                                    </li>
                                    <li class="child_right_detail_li">
                                        <div class="left">
                                            <img src="/images/sanacc/detail/champ.svg" alt="champ">
                                            <label>Trang phục</label>
                                        </div>
                                        <p class="p_right"><?= number_format($info["skins_count"], 0, '.', '.'); ?> </p>
                                    </li>
                                <?php } ?>
                                <li class="child_right_detail_li">
                                    <div class="left">
                                        <img src="/images/sanacc/detail/skin.svg" alt="skin">
                                        <label><?php if ($type_account == 1 || $type_account == 3 || $type_account == 4) {
                                                    echo "Trang phục";
                                                } else if ($type_account == 6) {
                                                    echo "BP";
                                                } else {
                                                    echo "Pet";
                                                } ?></label>
                                    </div>
                                    <p class="p_right"><?php if ($type_account == 1 || $type_account == 3 || $type_account == 4) {
                                                            echo number_format($info["skins_count"], 0, '.', '.'); ?> trang phục <?php } else if ($type_account == 6) {
                                                                                                                                    echo $info['champs'];
                                                                                                                                } else {
                                                                                                                                    echo ($info['pet'] == 1) ? 'Có' : 'Không';
                                                                                                                                } ?></p>
                                </li>
                                <?php if ($type_account != 6) { ?>
                                    <li class="child_right_detail_li">
                                        <div class="left">
                                            <img src="/images/sanacc/detail/rank.svg" alt="rank">
                                            <label>Rank</label>
                                        </div>
                                        <p class="p_right"><?php if ($type_account == 1) {
                                                                echo $get_info->get_string_rank($info['rank']);
                                                            } else if ($type_account == 2) {
                                                                echo str_replace('Cao Thủ', 'Huyền Thoại', $get_info->get_string_rank($info['rank']));
                                                            } else if ($type_account == 3) {
                                                                echo str_replace('Khung', '', $get_info->get_string_frame($info['rank']));
                                                            } else if ($type_account == 4) {
                                                                echo $get_info->get_string_rank($info['rank'], 'LMTC');
                                                            } else if ($type_account == 5) {
                                                                echo $get_info->get_string_rank($info['rank'], 'PUBG');
                                                            }  ?></p>
                                    </li>
                                <?php } ?>
                                <?php if ($type_account == 2) { ?>
                                    <li class="child_right_detail_li">
                                        <div class="left">
                                            <img src="/images/sanacc/detail/rank.svg" alt="rank">
                                            <label>Thẻ vô cực</label>
                                        </div>
                                        <p class="p_right"><?php if ($info['card_infinity'] == 1) {
                                                                echo "Có";
                                                            } else {
                                                                echo "Không";
                                                            } ?></p>
                                    </li>
                                <?php } ?>
                                <li class="child_right_detail_li">
                                    <div class="left">
                                        <img src="/images/sanacc/detail/note.svg" alt="note">
                                        <label>Ghi chú</label>
                                    </div>
                                    <p class="p_green p_right"><?php echo ($info['note']); ?></p>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="detail_acc_right">
                <div class="right_uudai">
                    <div class="div_uudai">
                        <div class="box_title_uudai">
                            <img class="img_icon_uudai" src="/images/sanacc/detail/gift.png" alt="ưu đãi">
                            <span class="span_text_uudai">Ưu đãi</span>
                        </div>
                        <div class="list_uudai">
                            <div class="box_uudai">
                                <img class="img_box_uudai" src="/images/sanacc/detail/send.svg" alt="ưu đãi 1">
                                <p class="p_box_uudai">Thu cũ đổi mới <span class="span_box_uudai" style="cursor: pointer;" onclick="window.location.href = '/doi-acc-cu-len-doi-acc-moi/'">(Xem chi tiết).</span></p>
                            </div>
                            <div class="box_uudai">
                                <img class="img_box_uudai" src="/images/sanacc/detail/send.svg" alt="ưu đãi 1">
                                <p class="p_box_uudai">Ưu đãi <span class="span_box_uudai">10%</span> thanh toán qua <span class="span_box_uudai">ATM/MOMO.</span></p>
                            </div>
                            <div class="box_uudai">
                                <img class="img_box_uudai" src="/images/sanacc/detail/send.svg" alt="ưu đãi 1">
                                <p class="p_box_uudai">Nhận thêm <span class="span_box_uudai">5</span> vòng quay quân huy cho đơn hàng <span class="span_box_uudai">500.000đ.</span></p>
                            </div>
                            <div class="box_uudai">
                                <img class="img_box_uudai" src="/images/sanacc/detail/send.svg" alt="ưu đãi 1">
                                <p class="p_box_uudai">Nhập mã <span class="span_box_uudai">Zendo Shop</span> giảm đến <span class="span_box_uudai">200.000đ</span> cho đơn hàng <span class="span_box_uudai">1.000.000đ.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right_detail_ul">
                    <div class="box_top_right_detail">
                        <div class="right_detail_li right_detail_li_first ">
                            <p class="money"><?php echo number_format($info["price"], 0, '.', '.'); ?> VNĐ</p>
                            <p class="p_green">Thanh toán bằng thẻ cào</p>
                        </div>
                        <div class="right_detail_li">
                            <p class="money money_atm"><?php echo number_format($info["price_atm"], 0, '.', '.'); ?> VNĐ</p>
                            <p class="p_green">Thanh toán bằng MOMO/ATM</p>
                        </div>
                    </div>
                    <!-- <div class="box_top_right_detail">
                        <div class="right_detail_li voucher_append ">
                            <div class="box_voucher" onclick="show_popup()">
                                <img class="img_voucher" src="/images/sanacc/voucher_1.png" alt="Mã giảm giá">
                                <span class="span_voucher">Chọn Voucher</span>
                            </div>
                            <div class="box_voucher box_voucher_2">
                                <input type="text" class="inp_voucher" placeholder="Nhập mã giảm giá">
                                <span class="span_voucher_2" onclick="apdung_voucher()">Áp dụng</span>
                            </div>
                        </div>
                    </div> -->
                    <div class="right_detail_li right_detail_li_buy">
                        <button onclick="test_cart(<?php echo ($info['id_post']); ?>)"> Mua ngay</button>

                    </div>
                    <div class="right_detail_li right_detail_li_type">
                        <img src="/images/sanacc/detail/atm_banking.png" alt="atm">
                        <img src="/images/sanacc/detail/visa.png" alt="visa">
                        <img src="/images/sanacc/detail/paypal.png" alt="paypal">
                        <img src="/images/sanacc/detail/momo.png" alt="momo">
                    </div>
                </div>
            </div>
        </div>
        <div class="change_content">
            <ul class="change_content_ul">
                <li class="change_content_li active" data-active="1">HÌNH ẢNH</li>
                <?php if ($type_account == 1) { ?>
                    <li class="change_content_li" data-active="2">TƯỚNG</li>
                    <li class="change_content_li" data-active="3">TRANG PHỤC</li>
                <?php } ?>
            </ul>
            <div class="main_change">
                <div class="description">
                    <?php if ($check_page < 14) { ?>
                        <img src="/<?= $data_av['avatar'] ?>" />
                    <?php } ?>



                    <?php
                    $arr_album = glob("assets/files/post/" . $id . "-*");
                    if ($arr_album) {
                        foreach ($arr_album as $img) {
                    ?>
                            <img src="/<?php echo $img; ?>" />
                        <?php
                        }
                    }

                    $arr_gem = glob("assets/files/gem/" . $id . "-*");
                    if ($arr_gem) {
                        foreach ($arr_gem as $img) {
                        ?>
                            <img src="/<?php echo $img; ?>" />
                    <?php
                        }
                    }

                    ?>
                </div>
                <div class="champ" style="display:none;">

                    <?php if ($info['type_account'] == 'Liên Quân Mobile') : ?>

                        <?php $image = explode("|", $info['champs']);

                        ?>

                        <?php
                        foreach ($image as $row) : ?>
                            <?php $champs1 = explode('-', $row); ?>
                            <div class="detail_champ">
                                <img src="/assets/data/8/champ/<?= $champs1[0] ?>.jpg" alt="<?= $champs1[1] ?>">
                                <p class="name_champ"><?= $champs1[1] ?></p>
                            </div>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>
                <div class="skin" style="display:none">
                    <?php if ($info['type_account'] == 'Liên Quân Mobile') : ?>
                        <?php $image2 = explode("|", $info['skins']);
                        ?>
                        <?php
                        foreach ($image2 as $row) : ?>
                            <?php $skins1 = explode('-', $row); ?>

                            <div class="detail_skin">
                                <img src="/assets/data/8/skins/img_skill/<?= $skins1[0] ?>.png" alt="<?= $skins1[1] ?>">
                                <div class="name_skin">
                                    <p><?= $skins1[1] ?></p>
                                    <p></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <h2 class="h2" style="display:none">
            Danh sách acc game
        </h2>
        <div class="list_acc" style="display:none">
            <?php for ($i = 0; $i < 8; $i++) { ?>
                <div class="acc">
                    <img src="/images/sanacc/detail/acc.png" alt="acc">
                    <div class="box_detail_acc">
                        <p class="count_acc">
                            <span>Đã bán: <span class="num_count">151.800</span> </span>
                            <span>Số tài khoản: <span class="num_count">27</span> </span>
                        </p>
                        <ul>
                            <li>100% acc trắng thông tin</li>
                            <li>100% acc từ 30 tướng trở lên</li>
                            <li>30% acc 4x tướng</li>
                            <li>30% acc 50 đến 108 tướng</li>
                        </ul>
                    </div>
                    <div class="box_price_acc">
                        <span>100.000 Đ</span>
                        <img src="/images/sanacc/detail/wheel.png" alt="vqmm">
                    </div>
                    <button class="btn_buy" onclick="buy_list(100000)">MUA NGAY</button>
                </div>
            <?php } ?>
        </div>

    </div>
</div>

<!-- thông báo chọn voucher -->
<div class="box_noti_gif popup_voucher">
    <div class="body_gif">
        <div class="title_noti_gif">
            <span class="noti_title_gif">Chọn voucher</span>
        </div>
        <div class="body_noti_gif">
            <div class="body_gif_nav">
                <?php foreach ($history_luotquay as $key => $val) { ?>
                    <div class="box_text_noti_gif">
                        <input type="checkbox" class="check_voucher" name="" id="">
                        <div class="box_voucher" style="width:100%  !important" data-id="<?= $val['id'] ?>" data-value="<?= $val['value'] ?>">
                            <img class="img_voucher_3" src="/<?= $val['image'] ?>" alt="mã giảm giá">
                            <p><?= $val['name'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="box_close_gif">
            <span class="span_close_gif" onclick="$('.popup_voucher').hide();">Đóng</span>
            <span class="span_close_gif btn_lg" style="background: #e67300 " onclick="append_voucher()">Áp dụng</span>
        </div>
    </div>
</div>
<input type="" name="" id="id_voucher" value="" hidden>
<input type="" name="" id="val_voucher" value="" hidden>
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->
<script>
    $('.change_content_li').click(function() {
        let id_active = $(this).data('active')
        switch (id_active) {
            case 1:
                $('.description').show()
                $('.champ').hide()
                $('.skin').hide()
                $('.active').removeClass('active')
                $(this).addClass('active')
                break;
            case 2:
                $('.champ').show()
                $('.description').hide()
                $('.skin').hide()
                $('.active').removeClass('active')
                $(this).addClass('active')
                break;
            case 3:
                $('.skin').show()
                $('.description').hide()
                $('.champ').hide()
                $('.active').removeClass('active')
                $(this).addClass('active')
                break;
            default:
                break;
        }
    })
</script>

<script>
    var id_user = '<?= $data_user['id'] ?>';
    var id_voucher = 0;
    var val_voucher = 0;

    function show_popup() {
        if (parseInt(id_user) > 0) {
            $('.popup_voucher').show();
        } else {
            swal({
                title: "Có lỗi xảy ra",
                type: "error",
                text: "Bạn chưa đăng nhập!"
            }, function() {
                window.location = '/dang-nhap/';
            });
        }
    }

    function append_voucher() {
        if (parseInt(id_user) > 0) {
            var text_money = <?= $price ?> - val_voucher;
            $('.right_detail_li_first').find('.money').text(text_money.toLocaleString(window.document.documentElement.lang) + " VNĐ")
            $('.money_atm').text((text_money * 0.8).toLocaleString(window.document.documentElement.lang) + " VNĐ")
            $('.popup_voucher').hide();

        } else {
            swal({
                title: "Có lỗi xảy ra",
                type: "error",
                text: "Bạn chưa đăng nhập!"
            }, function() {
                window.location = '/dang-nhap/';
            });
        }
    }
    $(".inp_voucher").on('keypress', function(e) {
        if (e.which == 13) {
            apdung_voucher();
        }
    });

    function apdung_voucher() {

        if ($('.inp_voucher').val() == 'Zendo Shop') {
            if (<?= $price ?> >= 1000000) {
                $(".check_voucher").prop('checked', false);
                val_voucher = 200000;
                var text_money = <?= $price ?> - val_voucher;
                $('.right_detail_li_first').find('.money').text(text_money.toLocaleString(window.document.documentElement.lang) + " VNĐ")
                $('.money_atm').text((text_money * 0.8).toLocaleString(window.document.documentElement.lang) + " VNĐ")
                $('.popup_voucher').hide();
            } else {
                swal({
                    title: "Có lỗi xảy ra",
                    type: "error",
                    text: "Mã giảm giá này áp dụng cho đơn hàng từ 1.000.000đ trở lên!"
                }, function() {});
            }


        } else {
            swal({
                title: "Có lỗi xảy ra",
                type: "error",
                text: "Mã giảm giá không tồn tại sai!"
            }, function() {});
        }

    }
    $(document).ready(function() {
        $('.box_text_noti_gif').click(function() {
            $(this).find('.check_voucher').click();
        })
        $('.check_voucher').click(function() {
            if ($(this).prop('checked')) {
                $('.inp_voucher').val('');
                $('.active_voucher').removeClass('active_voucher');
                $(".check_voucher").prop('checked', false);
                $(this).prop('checked', true);
                $(this).parents('.box_text_noti_gif').addClass('active_voucher');
                id_voucher = $(this).next('.box_voucher').data('id');
                val_voucher = $(this).next('.box_voucher').data('value');
                $('#id_voucher').val(id_voucher)
                $('#val_voucher').val(val_voucher)
            } else {
                $('.active_voucher').removeClass('active_voucher');
                id_voucher = 0;
                val_voucher = 0;
                $('#id_voucher').val('0')
                $('#val_voucher').val('0')
            }
        })
        $('.days-preorder').change(function(e) {
            e.preventDefault();

            if ($(this).val() == '') {
                $('input[name=hieucms]').val('');
            }

            $.getJSON('/assets/ajax/GetCostPreOrder.php', {
                id: $(this).attr('data-id'),
                days: $(this).val()
            }, function(res) {
                if (res.cost) {
                    $('input[name=hieucms]').val(res.cost);
                } else {
                    swal("Có lỗi xảy ra!", "Không thể lấy dữ liệu");
                }
            });

        });

        $("#hieucms").validate({
            rules: {
                days: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
            },
            messages: {
                days: 'Bạn vui lòng chọn số ngày đặt cọc'
            },
            submitHandler: function(e) {

                if (!$('#hieucms').hasClass('isPosting')) {

                    $('#hieucms').addClass('isPosting');
                    $('#hieucms button[type="submit"]').text('Đang đặt cọc...');

                    $.post('/assets/ajax/PreOrderAcc.php', $('#hieucms').serialize(), function(res) {
                        if (res.error == 1) {
                            swal("Thành công!", res.message, "success");
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        } else {
                            swal("Thất bại", res.message, "error");
                        }

                    }, "json").complete(function() {
                        $('#anthien').removeClass('isPosting');
                        $('#anthien button[type="submit"]').text('ĐẶT CỌC');
                    });

                }

                return false;
            }
        });

        $(".account_menu ul.left li").click(function() {
            $(".account_menu ul.left li").removeClass("active");
            $(this).addClass("active");
            target = $(this).attr("target");
            $(".account_info .detail_account").hide()
            $("#" + target).show();
        });
    });


    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];

    function strtonum(num) {
        return parseInt(num, 10);
    }

    mini_des_more = 4;

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                this_url = e.target.result;
                $("#public_image_" + get_target).hide();
                $("#image_preview_" + get_target + " img").attr("src", this_url);
                $("#image_preview_" + get_target).show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function format_price(div) {
        x = $(div).val();
        x = x.replace(/\./g, '');
        num = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        $(div).val(num);
    }

    // function alert_acc(id) {
    //     swal({
    //         title: "Tài Khoản Số #" + id,
    //         text: "Bạn có chắc chắn muốn mua tài khoản này ?",
    //         type: "info",
    //         showCancelButton: true,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Có",
    //         cancelButtonText: "Không",
    //         closeOnConfirm: false,
    //         showLoaderOnConfirm: true
    //     }, function() {
    //         $.post("/assets/ajax/check_buy.php", {
    //             id: id,
    //             id_voucher: $('#id_voucher').val(),
    //             val_voucher: $('#val_voucher').val()
    //         }, function(data) {
    //             if (data.status == "success") {
    //                 swal(data.title, data.message, data.status);
    //                 setTimeout(function() {
    //                     window.location.href = "/lich-su-mua-hang/";
    //                 }, 3000);
    //             } else {
    //                 swal({
    //                     title: "Có lỗi xảy ra",
    //                     type: "error",
    //                     text: data.message
    //                 }, function() {
    //                     window.location = data.link;
    //                 });
    //             }
    //         }, "json");
    //     });
    // }

    function test_cart(id) {
        swal({
            title: "Tài Khoản Số #" + id,
            text: "Bạn có chắc chắn muốn mua tài khoản này ?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Có",
            cancelButtonText: "Không",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function() {
            $.post("/assets/ajax/check_buy.php", {
                id: id,
                id_voucher: $('#id_voucher').val(),
                val_voucher: $('#val_voucher').val(),
                gio_hang: 4
            }, function(data) {
                if (data.status == 1) {
                    window.location.href = "/gio-hang/";
                } else {
                    swal({
                        title: "Có lỗi xảy ra",
                        type: "error",
                        text: data.message
                    }, function() {
                        if (data.status == 0) {
                            window.location.href = "/gio-hang/";
                        } else {
                            window.location.href = "/dang-nhap/";
                        }
                    });
                }
            }, "json");
        });
    }

    function setCookies(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    setCookies('id_acc', <?= $id ?>, 1);
</script>