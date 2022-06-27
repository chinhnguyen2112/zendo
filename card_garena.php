<?php
$title = "Thẻ Garena chiết khấu cao";
// Require database & thông tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account

?>
<link rel="stylesheet" href="/assets/css/sanacc/css_card_garena.css">

<div class="main_garena">
    <div class="detail_acc">
        <div class="content_gr">
            <!-- banner -->
            <div class="title_gr">
                <span class="span_title_gr">Thẻ game GARENA</span>
            </div>

            <!-- main-content -->
            <div class="container_gr">

                <div class="list_card">
                    <div class="box_card active_card" data-val="20000">
                        <div class="name_card">
                            <span class="span_name_crad">Garena 20.000đ</span>
                        </div>
                        <div class="box_price">
                            <p class="text_pr">Giá bán:</p>
                            <span class="box_pr_2">
                                <span class="span_price price_atm">19.000đ ATM</span>
                            </span>
                        </div>
                    </div>
                    <div class="box_card" data-val="50000">
                        <div class="name_card">
                            <span class="span_name_crad">Garena 50.000đ</span>
                        </div>
                        <div class="box_price">
                            <p class="text_pr">Giá bán:</p>
                            <span class="box_pr_2">
                                <span class="span_price price_atm">47.500đ ATM</span>
                            </span>
                        </div>
                    </div>
                    <div class="box_card" data-val="100000">
                        <div class="name_card">
                            <span class="span_name_crad">Garena 100.000đ</span>
                        </div>
                        <div class="box_price">
                            <p class="text_pr">Giá bán:</p>
                            <span class="box_pr_2">
                                <span class="span_price price_atm">95.000đ ATM</span>
                            </span>
                        </div>
                    </div>
                    <div class="box_card" data-val="200000">
                        <div class="name_card">
                            <span class="span_name_crad">Garena 200.000đ</span>
                        </div>
                        <div class="box_price">
                            <p class="text_pr">Giá bán:</p>
                            <span class="box_pr_2">
                                <span class="span_price price_atm">190.000đ ATM</span>
                            </span>
                        </div>
                    </div>
                    <div class="box_card" data-val="500000">
                        <div class="name_card">
                            <span class="span_name_crad">Garena 500.000đ</span>
                        </div>
                        <div class="box_price">
                            <p class="text_pr">Giá bán:</p>
                            <span class="box_pr_2">
                                <span class="span_price price_atm">475.000đ ATM</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="box_count">
                    <p>Số lượng: (Tối đa 1000)</p>
                    <div class="box_inp_count">
                        <button class="btn_change_inp" onclick="down_val(this)">-</button>
                        <input type="number" name="count" value="1" id="count_card">
                        <button class="btn_change_inp" onclick="up_val(this)">+</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail_acc_right">
            <div class="right_uudai">
                <div class="div_uudai">
                    <div class="box_title_uudai">
                        <img class="img_icon_uudai" src="/images/sanacc/detail/gift.png" alt="ưu đãi">
                        <span class="span_text_uudai">Hướng dẫn mua thẻ</span>
                    </div>
                    <div class="text_momo">
                        <p class="nd_ck">Ngân hàng: Techcombank</p>
                        <p class="data_mono pd_25"><img src="/images/sanacc/cash/icon_crow.svg" alt="chỉ mục">Số tài khoản: 1902 9151 126 668</p>
                        <p class="data_mono pd_25"><img src="/images/sanacc/cash/icon_crow.svg" alt="chỉ mục">Tên tài khoản: Chu Thị Ngọc Anh</p>
                        <p class="nd_ck ">Nội dung chuyển khoản: Số điện thoại - Giá trị thẻ - Số lượng</p>
                        <p class="nd_ck ">Ví dụ mua 10 thẻ mệnh giá 20.000đ: 0358888888 - 20000 - 10</p>
                    </div>
                </div>
            </div>
            <div class="right_detail_ul">
                <div class="box_top_right_detail">
                    
                    <div class="right_detail_li">
                        <p class="money money_atm">19.000 VNĐ</p>
                        <p class="p_green">Giá bán bằng MOMO/ATM</p>
                    </div>
                </div>
                <div class="right_detail_li right_detail_li_buy">
                    <p class="nd_ck">Chỉ nhận chuyển khoản qua ATM để khách hàng nhận được ưu đãi tốt nhất. Liên hệ với shop để được hỗ trợ!</p>

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
</div>




<?php
// Require footer
require_once 'includes/footer.php';

?>
<script>
    $('.box_card').click(function() {
        if ($(this).hasClass('active_card')) {} else {
            $('#count_card').val(1);
            var type = $(this).data('val');
            var val_atm = type * 0.95;
            var val_card = val_atm * 1.25;
            $('.money_card').text(val_card.toLocaleString('en-US') + ' VNĐ');
            $('.money_atm').text(val_atm.toLocaleString('en-US') + ' VNĐ');
        }
        $('.active_card').removeClass('active_card');
        $(this).addClass('active_card');
    })
    $('#count_card').keypress(function() {
        if ($(this).val() > 1000) {
            $('#count_card').val(1000)
        } else if ($(this).val() < 1) {
            $('#count_card').val(1)
        }
        var val_ap = $('#count_card').val();
        var type = $('.active_card').data('val');
        var val_atm = type * 0.95 * val_ap;
        var val_card = val_atm * 1.25;
        $('.money_card').text(val_card.toLocaleString('en-US') + ' VNĐ');
        $('.money_atm').text(val_atm.toLocaleString('en-US') + ' VNĐ');
    })

    function up_val(e) {
        var amount = $('#count_card').val();
        var val_ap = parseInt(parseInt(amount) + 1);
        if (amount <= 999) {
            $('#count_card').val(val_ap)
            var type = $('.active_card').data('val');
            var val_atm = type * 0.95 * val_ap;
            var val_card = val_atm * 1.25;
            $('.money_card').text(val_card.toLocaleString('en-US') + ' VNĐ');
            $('.money_atm').text(val_atm.toLocaleString('en-US') + ' VNĐ');
        }
    }

    function down_val(e) {
        var amount = $('#count_card').val();
        var val_ap = parseInt(parseInt(amount) - 1);
        if (amount > 1) {
            $('#count_card').val(val_ap)
            var type = $('.active_card').data('val');
            var val_atm = type * 0.95 * val_ap;
            var val_card = val_atm * 1.25;
            $('.money_card').text(val_card.toLocaleString('en-US') + ' VNĐ');
            $('.money_atm').text(val_atm.toLocaleString('en-US') + ' VNĐ');
        }
    }

    var id_user = '<?= $data_user['id'] ?>';
    $('.buy_card').click(function() {
        if (confirm('Bạn muốn mua đơn hàng này?')) {
            if (parseInt(id_user) > 0) {
                var type = $('.active_card').data('val');
                var amount = $('#count_card').val();
                data = new FormData();
                data.append('type', type);
                data.append('amount', amount);

                $.ajax({
                    type: 'post',
                    url: '/assets/ajax/buy_garena.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: data,

                    success: function(feedback) {
                        if (feedback.status == 1) {
                            swal({
                                title: "Thành công",
                                type: "success",
                                text: feedback.msg
                            }, function() {
                                window.location = '/lich-su-mua-hang/';
                            });
                        } else if (feedback.status == 2) {
                            swal({
                                title: "Có lỗi xảy ra",
                                type: "error",
                                text: "Bạn chưa đăng nhập!"
                            }, function() {
                                window.location = '/dang-nhap/';
                            });
                        }else{
                            swal({
                                title: "Có lỗi xảy ra",
                                type: "error",
                                text: feedback.msg
                            }, function() {
                            });
                        }

                    }
                });
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
    })
</script>