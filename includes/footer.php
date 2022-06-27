<?php

$user_count = $db->fetch_row("SELECT COUNT(*) FROM accounts LIMIT 1"); // all
$buy_count = $db->fetch_row("SELECT COUNT(*) FROM posts where `status` ='1' LIMIT 1"); // đã bán
$sell_count = $db->fetch_row("SELECT COUNT(*) FROM posts where `status` ='0' LIMIT 1"); // chưa bán
// đếm time hoạt động
$startTimeStamp = strtotime("2017/02/01"); // ngày mở web
$endTimeStamp = strtotime(date("Y/m/d"));
$timeDiff = abs($endTimeStamp - $startTimeStamp);
$numberDays = $timeDiff / 86400;  // 86400 seconds in one day
$numberDays = intval($numberDays);
?>
<link rel="stylesheet" href="/assets/css/sanacc/css_footer.css?v=1">
<footer>
    <!-- <div id="fb-root"></div> -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=455128569494578&autoLogAppEvents=1" nonce="m2edGbvO"></script>
    <div class="content_footer">
        <div class="content_ft_1">
            <img class="logo_footer lazyload" src="/images/load.gif" data-src="/images/logo.png" alt="logo sanacc">
            <div class="container_box_1">
                <div class="title_footer_1">
                    <span class="span_name_cty">CÔNG TY CỔ PHẦN PHÁT HÀNH GAME ZENDO VIỆT NAM</span>
                    <div class="address_cty">
                        <img src="/images/sanacc/footer/location.svg" alt="trụ sở">
                        <div class="text_diachi">
                            <p><span class="tru_so">Miền Bắc:&nbsp</span> <span>CT1, KĐT Chức Năng Tây Mỗ, 272 Hữu Hưng, Tây Mỗ, Hà Nội</span></p>
                            <p><span class="chi_nhanh">Miền Nam:</span> <span>47/90 Đ. Trần Quốc Toản, Phường 8, Quận 3, TP.HCM</span></p>
                        </div>
                    </div>
                    <div class="call_email">
                        <div class="call_ft"><img src="/images/sanacc/footer/call.svg" alt="điện thoại">
                            <p>0328 395 635</p>
                        </div>
                        <div class="email_ft"><img src="/images/sanacc/footer/sms.svg" alt="điện thoại">
                            <p>support@zendo.vn</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_ft_2">
            <div class="title_ft_2">
                <span>Về chúng tôi</span>
            </div>
            <div class="text_ft_2">
                <p onclick="$('.popup_gt').show();">Giới thiệu</p>
                <p onclick="$('.popup_tc').show();">Tiêu chí bán hàng</p>
                <p>Tuyển dụng</p>
                <p onclick="$('.popup_lh').show();">Liên hệ</p>
            </div>
        </div>
        <div class="content_ft_3">
            <div class="title_ft_2">
                <span>Hướng dẫn</span>
            </div>
            <div class="text_ft_2  text_ft_3">
                <p onclick="$('.popup_dk').show();">Điều khoản</p>
                <p onclick="$('.popup_qd').show();">Quy định</p>
                <p onclick="$('.popup_bm').show();">Bảo mật</p>
                <p onclick="window.location.href='https://zendo.vn/huong-dan-mua-hang/'">Hướng dẫn mua hàng</p>
            </div>
        </div>
        <div class="content_ft_4">
            <div class="title_ft_2 title_ft_4">
                <span>Fanpage</span>
            </div>
            <div class="fb-page" data-href="https://www.facebook.com/Zendo-Shop-129292529024923?gidzl=tDUD1AMDMmNMo8K7gPjU0D32WWIrdWa9oSRV2hJ8KGp6beO8lPWF3yQHqGA-omW1nfZN13bBQ-yqfObR20" data-tabs="timeline" data-width="254" data-height="130" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/Zendo-Shop-129292529024923?gidzl=tDUD1AMDMmNMo8K7gPjU0D32WWIrdWa9oSRV2hJ8KGp6beO8lPWF3yQHqGA-omW1nfZN13bBQ-yqfObR20" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Zendo-Shop-129292529024923?gidzl=tDUD1AMDMmNMo8K7gPjU0D32WWIrdWa9oSRV2hJ8KGp6beO8lPWF3yQHqGA-omW1nfZN13bBQ-yqfObR20">Zendo Shop</a></blockquote>
            </div>
        </div>
    </div>
    <div class="ft_bot">
        <span>Copyright © Zendo Vietnam Co.,LTD. All rights reserved.</span>
        <div class="list_icon_bot">
            <span><img class="icon_list_menu_tablet " src="/images/sanacc/icon_fb.svg" alt="Facebook"></span>
            <span><img class="icon_list_menu_tablet " src="/images/sanacc/icon_tw.svg" alt="Twitter"></span>
            <span><img class="icon_list_menu_tablet " src="/images/sanacc/icon_ytb.svg" alt="Youtube"></span>
        </div>
    </div>
</footer>
<div class="lienhe">
    <div class="lh_call lh_mess">
        <span>Messenger</span>
    </div>
    <div class="lh_call">
        <a href="https://zalo.me/0328395635" taget="_blank"><img class=" lazyload" src="/images/load.gif" data-src="/images/zalo.png" alt="số điện thoại" onclick="show_call(this,1)"></a>
        <span>Zalo</span>
    </div>
    <div class="lh_call">
        <a href="tel:0976615309" taget="_blank"><img class=" lazyload" src="/images/load.gif" data-src="/images/call.png" alt="số điện thoại" onclick="show_call(this,1)"></a>
        <span>Gọi ngay</span>
    </div>
</div>

</div>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/sweetalert.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/pages/base_ui_widgets.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/plugins/slick/slick.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.appear.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.countTo.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.placeholder.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/js.cookie.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/bootstrap3-typeahead.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/accountSC.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/filter.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/app.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/plugins/magnific-popup/magnific-popup.min.js"></script>

<script src="/assets/js/lazysizes.min.js"></script>

<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('#v_footer_all_top').fadeIn(800)
        } else {
            $('#v_footer_all_top').fadeOut(800)
        }
    });
    $('.c_ontop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 500)
    });

    function show_call(e, type) {
        if (type == 1) {
            $('.mun_call').show(200);
            $(e).attr('onclick', 'show_call(this,2)');
        } else {
            $('.mun_call').hide(200);
            $(e).attr('onclick', 'show_call(this,1)');
        }
    }

    $(document).click(function(event) {
        $target = $(event.target);
        if (!$target.closest('.nav_hover').length && $('.nav_hover').is(":visible") && !$target.closest('.menu_active_hover').length) {
            $('.nav_hover').hide(100);
            $('.menu_active_hover').removeClass('menu_active_hover');
        }

    });
    var type = "";
    $('.tw_menu_nav').hover(function() {
        if ($(this).find('.nav_hover').length > 0) {
            evt_click_menu(this, type);
        } else {
            $(type).removeClass('menu_active_hover');
            $(type).find('.nav_hover').hide(100);
        }
        type = this;
    })
    $('.tw_menu_nav').mouseup(function() {
        if ($(this).find('.nav_hover').length > 0) {
            evt_click_menu(this, type);
        }
        type = this;
    })

    function show_menu(e) {
        if (e == 1) {
            $('.tw_menu_tablet').attr("onclick", "show_menu(2)");
            $('.tw_menu_right').show(500);
        } else {
            $('.tw_menu_tablet').attr("onclick", "show_menu(1)");
            $('.nav_hover').hide(100);
            $('.menu_active_hover').removeClass('menu_active_hover');
            $('.tw_menu_right').hide(500);
        }

    }

    function evt_click_menu(e, type) {
        if (e == type) {
            var check_clas = $(e).hasClass('menu_active_hover');
            if (check_clas) {} else {

                $(e).addClass('menu_active_hover');
            }
            $(e).find('.nav_hover').show(500);
        } else {
            $(e).find('.nav_hover').show(500);
            $(e).addClass('menu_active_hover');
            $(type).removeClass('menu_active_hover');
            $(type).find('.nav_hover').hide(100);
        }
    }
</script>
<script defer>
    function show_call(e, type) {
        if (type == 1) {
            $('.mun_call').show(200);
            $(e).attr('onclick', 'show_call(this,2)');
        } else {
            $('.mun_call').hide(200);
            $(e).attr('onclick', 'show_call(this,1)');
        }
    }

    function close_uudai() {
        $('.uudai').hide();
    }
</script>

<script>
    $(document).click(function(event) {
        $target = $(event.target);
        if (!$target.closest('.header_list_tablet').length && $('.header_list_tablet').is(":visible") && !$target.closest('.header_logo_tablet').length) {
            $('.header_list_tablet').hide(200);
        }

    });

    function show_menu(e) {
        if (e == 1) {
            $('.header_list_tablet').show(200);
        } else {
            $('.header_list_tablet').hide(200);
        }
    }
    var width = $('.box_vqmm').width();
    $('.box_vqmm').css({
        'height': width
    })
    var tam = "";
    var tam_img = "";

    function click_img(id, e) {
        //ẩn cái cũ
        $('.text_' + tam).hide(100);
        $(tam_img).find('img').removeClass('img_active');
        $(tam_img).find('p').removeClass('p_active');


        // show cái mới
        $(e).find('p').addClass('p_active');
        $(e).find('img').addClass('img_active');
        $('.text_' + id).show(100);
        tam = id;
        tam_img = e;
    }

    function click_menu_con(e, type) {
        if (type == 1) {
            $(e).next().show(100);
            $(e).attr('onclick', 'click_menu_con(this,2)');
        } else {
            $(e).next().hide(100);
            $(e).attr('onclick', 'click_menu_con(this,1)');
        }
    }
</script>

</body>

</html>