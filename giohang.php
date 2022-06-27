<?php

// Require database & th么ng tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
$get_info = new Info;
$id_user = $data_user['id'];

if ($id_user == "") {
    new Redirect('/dang-nhap/');
}

$sql = "SELECT giohang.*, posts.price, posts.id_post FROM giohang INNER JOIN posts ON giohang.id_account = posts.id_post WHERE id_user = $id_user ORDER BY id DESC";
$count = $db->fetch_assoc($sql, 0);
$row = $db->num_rows($sql);
$count_price = $db->fetch_assoc($sql, 1);
?>

<link rel="stylesheet" href="/assets/css/sanacc/giohang.css">

<div id="main_cart">
    <div class="main_cart">
        <span class="tit_cart">THÔNG TIN GIỎ HÀNG</span>

        <div class="body_cart">
            <div class="box_body_cart">

                <!-- box left -->
                <div class="box_left_cart">
                    <div class="left_cart_container">
                        <div class="tit_left_cart">
                            <span>CHI TIẾT GIỎ HÀNG</span>
                        </div>

                        <?php
                        foreach ($count as $key => $val) {
                            $id_account = $val['id_account'];
                            $sql_echo_account = "SELECT * FROM posts WHERE id_post = $id_account";
                            $echo_account = $db->fetch_assoc($sql_echo_account, 1);
                            $status = $echo_account['status'];
                            if ($status == 0) { ?>
                                <div class="items_cart">
                                    <div class="info_order">
                                        <div class="action_cart">

                                            <input type="checkbox" <?php if ($val['id_account'] == $_COOKIE['id_acc']) {
                                                                        echo 'checked';
                                                                    } ?> name="choose_order" class="choose_order" data-id="<?= $val['id_account'] ?>" data-price="<?= $val['price'] ?>">
                                        </div>
                                        <img class="avata_acc" src="/<?php echo $get_info->get_thumb($val['id_post']); ?>" />
                                        <div class="des_order" style="cursor: pointer;">
                                            <p class="ma_acc" data-id_post="<?= $val['id_post'] ?>">Mã số tài khoản: #<?= $val['id_account'] ?> </p>
                                            <div class="detail_order">
                                                <a href="/tai-khoan-<?= $val['id_account'] ?>/" target="blank">Chi tiết acc</a>
                                                <img src="/images/sanacc/cayrank/export.svg" alt="export_icon">
                                            </div>
                                            <div class="info_price info_price_mobile">
                                                <p>Giá tiền : <span><?= number_format($val['price']) ?> VNĐ</span></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="info_price">
                                        <div class="text_money">
                                            <p>Giá tiền: <?= number_format($val['price']) ?> VNĐ</p>

                                        </div>
                                        <img style="cursor: pointer;" class="delete_cart delete_cart_pc" onclick="delete_cart(this)" data-id_cart="<?= $val['id'] ?>" src="/images/sanacc/cayrank/trash.svg" alt="trash_btn">
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>
                <!-- end box left -->

                <!-- box right -->
                <div class="box_right_cart">
                    <div class="box_right_container">
                        <div class="header_right_cart">
                            <p>THÔNG TIN THANH TOÁN</p>
                            <div class="logo_zendo">
                                <img src="https://zendo.vn/images/logo.png" alt="logo_zendo">
                            </div>
                        </div>

                        <div class="body_right_cart">
                            <div class="right_cart_box">
                                <div class="right_detail_li voucher_append voucher_right_cart">
                                    <div class="box_voucher" onclick="show_popup()">
                                        <img class="img_voucher" src="https://zendo.vn/images/sanacc/voucher_1.png" alt="Mã giảm giá">
                                        <span class="span_voucher">Chọn Voucher</span>
                                    </div>
                                    <p class="text_choose_voucher"></span></p>
                                    <div class="box_voucher_2">
                                        <input type="text" class="inp_voucher" placeholder="Nhập mã giảm giá" value="">
                                        <div class="span_voucher_2" onclick="apdung_voucher()">
                                            <span class="">Áp dụng</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row_info_price">
                                    <div class="row_detail">
                                        <span>Vật phẩm trong giỏ</span>
                                        <span><?= $row ?></span>
                                    </div>

                                    <div class="row_detail">
                                        <span>Tổng chi phí</span>
                                        <span class="total_price">0 VNĐ</span>
                                    </div>

                                    <div class="row_detail">
                                        <span>Tổng giảm giá</span>
                                        <span class="discount">0 VNĐ</span>
                                    </div>
                                </div>

                                <div class="row_detail">
                                    <span>Tổng thanh toán</span>
                                    <span class="last_price">0 VNĐ</span>
                                </div>
                            </div>

                        </div>


                        <div class="footer_right_cart">
                            <div class="pay_cart_btn">
                                <span>THANH TOÁN</span>
                            </div>
                            <div class="list_social">
                                <img src="https://zendo.vn/images/sanacc/detail/atm_banking.png" alt="img_social">
                                <img src="https://zendo.vn/images/sanacc/detail/visa.png" alt="img_social">
                                <img src="https://zendo.vn/images/sanacc/detail/paypal.png" alt="img_social">
                                <img src="https://zendo.vn/images/sanacc/detail/momo.png" alt="img_social">
                            </div>
                            <div class="see_more">
                                <a href="/shop-lien-quan/" target="blank">Xem thêm sản phẩm</a>
                                <!-- <img src="" alt="arrow_left"> -->
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end box right -->

            </div>
        </div>
    </div>
</div>

<!-- thông báo chọn voucher -->
<div class="box_noti_gif popup_voucher" style="display: none;">
    <div class="body_gif">
        <div class="title_noti_gif">
            <span class="noti_title_gif">Chọn voucher</span>
        </div>
        <div class="body_noti_gif">
            <div class="body_gif_nav">


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


<?php
// Require footer
require_once 'includes/footer.php';

?>


<script>
    // tinh tien khi checkbox
    var tong_tien_tam = tong_tien = last_price = 0;
    var mess_text = '';
    $('.avata_acc, .des_order').click(function() {
        $(this).prevAll('.action_cart').find('.choose_order').click();

    })
    $('.choose_order').each(function() {
        if ($(this).prop('checked')) {
            $(this).each(function() {
                var price = $(this).data('price')
                tong_tien = tong_tien_tam += price;
            })


        }
        $('.total_price').text(tong_tien.toLocaleString('en-US') + ' VNĐ')
        apdung_voucher()
    })
    $('.choose_order').click(function() {
        if ($(this).prop('checked')) {
            $(this).each(function() {
                var price = $(this).data('price')
                tong_tien = tong_tien_tam += price;
            })


        } else {
            $(this).each(function() {
                var price = $(this).data('price');
                if (tong_tien != 0) {
                    tong_tien = tong_tien_tam -= price;
                }
            })


        }
        $('.total_price').text(tong_tien.toLocaleString('en-US') + ' VNĐ')
        apdung_voucher()
    });

    // chon voucher
    var id_user = '<?= $data_user['id'] ?>';
    var id_voucher = "";
    var val_voucher = 0;

    function show_popup() {
        last_price = tong_tien_tam;


        if (parseInt(id_user) > 0) {
            if (tong_tien > 0) {
                $('.popup_voucher').show();
                data = new FormData();
                data.append('last_price', last_price);
                data.append('gio_hang', 1);

                $.ajax({
                    type: 'post',
                    url: '/assets/ajax/check_buy.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: data,

                    success: function(feedback) {
                        if (feedback.status == 1) {
                            $('.body_gif_nav').html(feedback.html)
                        } else {

                        }

                    }
                });

            } else {
                swal({
                    title: "Có lỗi xảy ra",
                    text: 'Bạn chưa chọn đơn hàng!',
                    type: "error",
                }, function() {

                });
            }


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

    //    tính tiền khi chọn voucher


    id_voucher_tam = 0;
    var name_voucher = "";


    function choose_voucher(e) {
        $(e).prev('.check_voucher').click();
        if ($(e).prev('.check_voucher').prop('checked')) {

            $('.inp_voucher').val('');
            $('.active_voucher').removeClass('active_voucher');
            $(".check_voucher").prop('checked', false);
            $(e).prev('.check_voucher').prop('checked', true);
            id_voucher_tam = $(e).data('id');
            val_voucher_tam = $(e).data('value');
            $('#id_voucher').val(id_voucher)
            $('#val_voucher').val(val_voucher)

        } else {
            $('.active_voucher').addClass('active_voucher');
            id_voucher_tam = 0;
            val_voucher_tam = 0;
            $('#id_voucher').val('0')
            $('#val_voucher').val('0')
        }

        if ($(e).hasClass('active_voucher')) {
            $(e).removeClass('active_voucher')
        } else {
            $(e).addClass('active_voucher')
        }
    }

    function check_voucher(e) {
        if ($(e).prop('checked')) {

            $('.inp_voucher').val('');
            $('.active_voucher').removeClass('active_voucher');
            $(".check_voucher").prop('checked', false);
            $(e).prop('checked', true);
            $(e).parents('.box_text_noti_gif').removeClass('active_voucher');
            id_voucher_tam = $(e).next('.box_voucher').data('id');
            val_voucher_tam = $(e).next('.box_voucher').data('value');
            name_voucher = $(e).next('.box_voucher').data('name');
            $('#id_voucher').val(id_voucher)
            $('#val_voucher').val(val_voucher)

        } else {
            $('.active_voucher').addClass('active_voucher');
            id_voucher_tam = 0;
            val_voucher_tam = 0;
            $('#id_voucher').val('0')
            $('#val_voucher').val('0')
        }

        if ($(e).hasClass('active_voucher')) {
            $(e).removeClass('active_voucher')
        } else {
            $(e).addClass('active_voucher')
        }
    }

    function append_voucher() {
        console.log(name_voucher);
        val_voucher = val_voucher_tam;
        last_price_tam = tong_tien_tam;

        last_price = last_price_tam - val_voucher;

        $('.last_price').text(last_price.toLocaleString('en-US') + ' VNĐ')
        $('.discount').text(val_voucher.toLocaleString('en-US') + ' VNĐ')
        $('.popup_voucher').hide();
        $('.text_choose_voucher').text("Bạn đã chọn \"" + name_voucher + "\"");

    }
    $('.inp_voucher').keypress(function(e) {
        if (event.keyCode == 13 || event.which == 13) {
            apdung_voucher()
        }
    })

    // tinh tien khi chon uu dai
    function apdung_voucher() {
        $('.text_choose_voucher').text('');
        var discount = $('.inp_voucher').val()
        if (discount != "") {
            data = new FormData();
            data.append('discount', discount);
            data.append('gio_hang', 2);

            $.ajax({
                type: 'post',
                url: '/assets/ajax/check_buy.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: data,

                success: function(feedback) {
                    if (feedback.status == 0) {
                        swal({
                            title: "Có lỗi xảy ra",
                            text: feedback.message,
                            type: "error",
                        }, function() {
                            $('.inp_voucher').val('');
                            $('.discount').text('0 VNĐ');
                            $('.last_price').text(tong_tien_tam.toLocaleString('en-US') + ' VNĐ')
                        });
                    } else {
                        if (feedback.val_use > tong_tien) {
                            swal({
                                title: "Có lỗi xảy ra",
                                text: 'Mã giảm giá này chỉ áp dụng cho đơn hàng từ ' + feedback.val_use + ' VNĐ trở lên!',
                                type: "error",
                            }, function() {
                                $('.inp_voucher').val('');
                                $('.discount').text('0 VNĐ');
                            });
                        } else {
                            last_price = tong_tien_tam - feedback.val;
                            $('.discount').text((feedback.val).toLocaleString('en-US') + ' VNĐ');
                            $('.last_price').text(last_price.toLocaleString('en-US') + ' VNĐ')
                        }
                    }

                }
            });

        } else {
            $('.inp_voucher').val('');
            $('.discount').text('0 VNĐ');
            $('.last_price').text(tong_tien_tam.toLocaleString('en-US') + ' VNĐ')
        }


    }


    // nhấn thanh toán
    $('.pay_cart_btn').click(function() {

        var cash = '<?php echo $data_user['cash'] ?>';
        var discount = $('.inp_voucher').val();
        var id_account = [];
        var str_id = '';
        id_voucher = id_voucher_tam;
        tong_tien = tong_tien_tam;
        if (tong_tien > 0) {
            $('.choose_order').each(function() {
                if ($(this).prop('checked')) {
                    id_account.push($(this).data('id'));
                    str_id += '#' + $(this).data('id') + ', ';

                }
            })

            swal({
                title: "Thanh toán giỏ hàng",
                text: "Bạn có chắc chắn muốn mua tài khoản " + str_id.slice(0, -2) + ' ?',
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Có",
                cancelButtonText: "Không",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function() {
                data = new FormData();
                data.append('id_account', id_account);
                data.append('last_price', last_price);
                data.append('discount', discount);
                data.append('id_voucher', id_voucher);
                data.append('gio_hang', 3);
                if(discount != "") {
                    data.append('type', 1);
                }else if(id_voucher != "") {
                    data.append('type', 2);
                }else if(discount != "" && id_voucher != "") {
                    data.append('type', 3);
                }


                $.ajax({
                    type: 'post',
                    url: '/assets/ajax/check_buy.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: data,

                    success: function(feedback) {
                        if (feedback.status == 0) {
                            swal({
                                title: "Có lỗi xảy ra",
                                type: "error",
                                text: feedback.message
                            }, function() {
                                window.location.href = "/nap-the/";
                            });
                        } else {
                            $('.inp_voucher').val('');
                            $('.discount').text('0 VNĐ');
                            $('.last_price').text(' 0 VNĐ');
                            tong_tien_tam = tong_tien = last_price = 0;
                            $('.choose_order').each(function() {
                                $(this).prop('checked', false)
                            })
                            swal({
                                title: "Thành Công",
                                type: "success",
                                text: feedback.message
                            }, function() {
                                window.location.href = "/lich-su-mua-hang/"
                            });
                        }

                    }
                });


            });

        } else {
            swal({
                title: "Có lỗi xảy ra",
                text: 'Bạn chưa chọn đơn hàng!',
                type: "error",
            }, function() {

            });
        }
    })

    function sw() {
        swal({
            title: "Có lỗi xảy ra",
            text: 'Tài khoản của bạn không đủ để thực hiện giao dịch này nè!',
            type: "error"
        }, function() {
            window.location.href = "/nap-the/";
        });
    }

    function setCookies(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    setCookies('id_acc', '', 1);


    // xóa giỏ hàng 
    function delete_cart(e) {

        var id_cart = $('.delete_cart').data('id_cart');
        var id_post = $('.ma_acc').data('id_post');
        data = new FormData();
        data.append('id_cart', id_cart);
        data.append('gio_hang', 5);


        swal({
            title: "Thanh toán giỏ hàng",
            text: "Bạn có chắc chắn muốn xóa tài khoản #" + id_post + ' khỏi giỏ hàng?',
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Có",
            cancelButtonText: "Không",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function() {

            $.ajax({
                type: 'post',
                url: '/assets/ajax/check_buy.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: data,

                success: function(feedback) {
                    if (feedback.status == 0) {
                        swal({
                            title: "Có lỗi xảy ra",
                            type: "error",
                            text: feedback.message
                        }, function() {});
                    } else {
                        swal({
                            title: "Thành Công",
                            type: "success",
                            text: feedback.message
                        }, function() {
                            $(e).parents('.items_cart').remove();
                        });
                    }

                }
            });

        });

    }
</script>