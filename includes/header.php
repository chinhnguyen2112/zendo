<!DOCTYPE html>
<html lang="vi">


<head>
    <meta charset="UTF-8" />
    <?php if ($index == 1) { ?>
        <meta name="robots" content="noindex,nofollow" />
    <?php } else { ?>
        <meta name="robots" content="index,follow" />
    <?php } ?>
    <title><?= isset($data_seo['meta_title']) ? $data_seo['meta_title'] : $title ?></title>
    <meta content="<?= isset($data_seo['meta_title']) ? $data_seo['meta_title'] : "" ?>" name="keywords">
    <meta content="<?= isset($data_seo['meta_des']) ? $data_seo['meta_des'] : "" ?>" name="description">
    <meta content="<?= isset($data_seo['meta_des']) ? $data_seo['meta_des'] : "" ?>" name="msvalidate.01">
    <meta property="fb:app_id" content="401488830285503" />
    <meta property="fb:admins" content="100013408156322" />
    <link rel="canonical" href="<?= $_DOMAIN . substr($_SERVER['REQUEST_URI'], 1); ?>" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $_DOMAIN . substr($_SERVER['REQUEST_URI'], 1); ?>" />
    <meta property="og:title" content="<?= isset($data_seo['meta_title']) ? $data_seo['meta_title'] : "" ?>" />
    <meta property="og:image" content="<?= $img_head ?>" />
    <meta property="og:image:secure_url" content="<?= $img_head ?>" />
    <meta property="og:site_name" content="Shop Liên Quân 9k - Thử Vận May 9k Ra Acc Liên Quân Trắng Cực Ngon" />
    <meta property="og:description" content="<?= isset($data_seo['meta_des']) ? $data_seo['meta_des'] : "" ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?= isset($data_seo['meta_des']) ? $data_seo['meta_des'] : "" ?>" />
    <meta name="twitter:title" content="<?= isset($data_seo['meta_title']) ? $data_seo['meta_title'] : "" ?>" />
    <!--<meta name="twitter:image" content="https://sanacc.vn/assets/img/logo.png" />-->
    <link rel="shortcut icon" href="/images/fav.png">


    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/oneui.css">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/core.css">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/style.css?v=1">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/sweetalert.css">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/js/plugins/magnific-popup/magnific-popup.min.css">
    <script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo $_DOMAIN; ?>assets/slider/freshslider.min.js"></script>
    <link href="<?php echo $_DOMAIN; ?>assets/slider/freshslider.min.css" type="text/css" rel="stylesheet" />

    <link data-n-head="ssr" rel="icon" type="image/x-icon" href="/images/fav.png">
    <link data-n-head="ssr" rel="preconnect" href="https://fonts.googleapis.com">
    <link data-n-head="ssr" rel="preconnect" href="https://fonts.gstatic.com" crossorigin="true">
    <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&amp;display=swap">
    <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&amp;display=swap">
    <link data-n-head="ssr" rel="stylesheet" href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css">

    <link rel="stylesheet" href="/assets/css/9d13ef7.css">
    <link rel="stylesheet" href="/assets/css/b1743af.css">
    <link rel="stylesheet" href="/assets/css/c0f19a2.css">
    <link rel="stylesheet" href="/assets/css/a87e9a3.css">
    <link rel="stylesheet" href="/assets/css/94b25bf.css">
    <link rel="stylesheet" href="/assets/css/55377ee.css">
    <link rel="stylesheet" href="/assets/css/acd0ee7.css">
    <link rel="stylesheet" href="/assets/css/css2.css?v=1">
    <link rel="stylesheet" href="/assets/css/popup.css">
    <link rel="stylesheet" href="/assets/css/sanacc/css_home.css?v=1">
    <link rel="stylesheet" href="/assets/css/sanacc/css_header.css?v=1">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <script async src='/cdn-cgi/challenge-platform/h/b/scripts/invisible.js'></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WT5HLK3');
    </script>
    <!-- End Google Tag Manager -->


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WT5HLK3" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MP030Z45P9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-MP030Z45P9');
    </script>

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WT5HLK3" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="main_content">
        <style>
            #main-container {
                background-color: #101113 !important;
            }

            .uudai {
                display: none;
            }
        </style>
        <?php
        if (!isset($_SESSION['uudai']) || $_SESSION['uudai'] != 1) {
            $_SESSION['uudai'] = 1;
        ?>
            <style>
                .uudai {
                    display: flex;
                }
            </style>
        <?php } ?>


        <!--css thông báo -->
        <style>
            .box_nt {
                width: 450px;
                padding: 20px;
                background: #1F2334;
                color: #000;
                border-radius: 10px;
            }



            .img_tb img {
                margin: auto;
                width: 186px;
                display: block;
            }

            .title_tb {
                font-style: normal;
                font-weight: 700;
                font-size: 22px;
                line-height: 39px;
                text-align: center;
                text-transform: uppercase;
                color: #FA8C04;
                margin: 0px 0px;
            }

            p.name_tb {
                font-style: normal;
                font-weight: 700;
                font-size: 16px;
                line-height: 30px;
                /* identical to box height */
                text-align: center;
                color: #4DA11E;
            }

            p.text_tb {
                font-style: normal;
                font-weight: 400;
                font-size: 14px;
                line-height: 22px;
                color: #fff;
            }

            p.text_tb.dk {
                font-style: normal;
                font-weight: 600;
                font-size: 16px;
                line-height: 30px;
                /* identical to box height */
                text-align: center;
                color: #FA8C04;
            }

            .close_tb span {
                background: #73B009;
                border-radius: 5px;
                font-style: normal;
                font-weight: 700;
                font-size: 20px;
                line-height: 26px;
                /* identical to box height */
                text-transform: uppercase;
                color: #FFFFFF;
                padding: 10px 60px;
            }

            .close_tb {
                text-align: center;
                margin-top: 20px;
                cursor: pointer;
                margin-bottom: 20px;
            }

            .content_tb {
                overflow-y: auto;
                height: 300px;
            }

            .box_tex_no {
                display: flex;
                align-items: center;
            }

            @media (max-width: 540px) {
                .box_nt {
                    width: 90%;
                    padding: 10px;
                    border-radius: 10px;
                }
            }
        </style>
        <!-- header  -->
        <div class="header">
            <div class="box_header">
                <div class="header_logo">
                    <img class="header_logo_tablet" onclick="show_menu(1)" src="/images/sanacc/menu.svg" alt="menu">
                    <a href="/"><img src="/images/logo.png" class="header_logo_pc" alt="Logo sanacc"></a>
                    <div class="header_list_tablet">
                        <div class="top_menu_tablet">
                            <span class="text_menu_tablet">Menu</span>
                            <span class="span_logo_tablet"><img onclick="show_menu(2)" class="header_logo_tablet" src="/images/sanacc/menu.svg" alt="menu"></span>
                        </div>
                        <div class="header_menu_tablet">
                            <div class="list_menu">
                                <img class="icon_list_menu_tablet" src="/images/sanacc/dsgame.svg" alt="Danh sách game"><span><a href="/">Trang chủ</a></span>
                            </div>
                            <div class="list_menu" onclick="click_menu_con(this,1)"><img class="icon_list_menu_tablet" src="/images/sanacc/cup.png" alt="Danh sách game"><span>Cửa hàng</span><img class="img_down" src="/images/sanacc/arrow-bottom.png" alt="xem thêm"></div>
                            <div class="menu_con">
                                <p><span><a href="/shop-lien-quan/"><img class="img_icon_game" src="/images/sanacc/icon_lq.svg" alt="game liên quân mobile"><span>Liên Quân Mobile</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_ff.svg" alt="game liên quân mobile"><span>Free Fire</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_lmht.svg" alt="game liên quân mobile"><span>Liên Minh Huyền Thoại</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_pubg.svg" alt="game liên quân mobile"><span>PUBG Mobile</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                            <div class="list_menu" onclick="click_menu_con(this,1)"><img class="icon_list_menu_tablet" src="/images/sanacc/level.svg" alt="Danh sách game"><span>Mini game</span><img class="img_down" src="/images/sanacc/arrow-bottom.png" alt="xem thêm"></div>
                            <div class="menu_con">
                                <p><span><a href="/thu-van-may-lien-quan/"><img class="img_icon_game" src="/images/sanacc/icon_vqlq.svg" alt="game liên quân mobile"><span>Liên Quân Mobile</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_vq_ff.png" alt="game liên quân mobile"><span>Free Fire</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_vqpubg.svg" alt="game liên quân mobile"><span>PUBG Mobile</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                            <div class="list_menu"><img class="icon_list_menu_tablet" src="/images/sanacc/lichsu.svg" alt="Lịch sử"><span><a href="/lich-su-mua-hang/">Lịch sử</a></span></div>
                            <div class="list_menu"><img class="icon_list_menu_tablet" src="/images/sanacc/naptien.svg" alt="Nạp tiền"><span><a href="/nap-the/">Nạp thẻ</a></span></div>
                            <?php if (isset($data_user['id']) && $data_user['id'] > 0) { ?>
                                <div class="header_btn data_mb">
                                    <a href="/logout.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Đăng xuất">
                                        <i class="si si-arrow-right"></i></a>
                                    <span class="img_avatar_user"><img src="<?php if ($data_user['username'] > 1000000) {
                                                                                echo 'https://graph.facebook.com/' . $data_user['username'] . '/picture';
                                                                            } else {
                                                                                echo '/assets/img/avatars/avt.png';
                                                                            } ?>"></span>
                                    <span></span>
                                    <span class="list_data_u">
                                        <p><?= $data_user['username'] ?> </p>
                                        <p><?= number_format($data_user['cash']) ?>đ </p>
                                    </span>
                                </div>
                            <?php } else { ?>
                                <div class="header_btn">
                                    <button class="header_bnt header_btn_login"><span><a href="/dang-nhap/">ĐĂNG NHẬP</a></span></button>

                                    <button class="header_bnt"><span><a href="/dang-ky/">ĐĂNG KÝ</a></span></button>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="bot_menu_tablet">
                            <div class="list_icon_bot">
                                <span><img class="icon_list_menu_tablet" src="/images/sanacc/icon_fb.svg" alt="Facebook"></span>
                                <span><img class="icon_list_menu_tablet" src="/images/sanacc/icon_tw.svg" alt="Twitter"></span>
                                <span><img class="icon_list_menu_tablet" src="/images/sanacc/icon_ytb.svg" alt="Youtube"></span>

                            </div>
                            <p class="text_bot">Copyright © <span>Zendo Vietnam Co.,LTD.</span> All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <div class="header_list">
                    <div class="header_menu">
                        <div class="list_menu"><span><a href="/">Trang chủ</a></span></div>
                        <div class="list_menu"><span><a href="#">Cửa hàng <img class="img_down" src="/images/sanacc/arrow-bottom.png" alt="xem thêm"></a></span>
                            <div class="menu_con">
                                <p><span><a href="/shop-lien-quan/"><img class="img_icon_game" src="/images/sanacc/icon_lq.svg" alt="game liên quân mobile"><span>Liên Quân Mobile</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_ff.svg" alt="game free fire"> <span>Free Fire</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_lmht.svg" alt="game liên minh huyền thoại"><span>Liên Minh Huyền Thoại</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_pubg.svg" alt="game pung mobile"><span>PUBG Mobile</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                        </div>
                        <div class="list_menu"><span><a href="#">Mini game <img class="img_down" src="/images/sanacc/arrow-bottom.png" alt="xem thêm"></a></span>
                            <div class="menu_con">
                                <p><span><a href="/thu-van-may-lien-quan/"><img class="img_icon_game" src="/images/sanacc/icon_vqlq.svg" alt="game liên quân mobile"><span>Liên Quân Mobile</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_vq_ff.png" alt="game liên minh huyền thoại"><span>Free Fire</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p> 
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game" src="/images/sanacc/icon_vqpubg.svg" alt="game liên minh huyền thoại"><span>PUBG Mobile</span><img class="img_goto_link" src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                        </div>
                        <div class="list_menu"><span><a href="/lich-su-mua-hang/">Lịch sử</a></span></div>
                        <div class="list_menu"><span><a href="/nap-the/">Nạp thẻ</a></span></div>
                    </div>
                    <?php if (isset($data_user['id']) && $data_user['id'] > 0) { ?>
                        <div class="header_btn data_mb">
                            <a href="/logout.html" data-toggle="tooltip" data-placement="right" title="" data-original-title="Đăng xuất">
                                <i class="si si-arrow-right"></i></a>
                            <span class="img_avatar_user"><img src="<?php if ($data_user['username'] > 1000000) {
                                                                        echo 'https://graph.facebook.com/' . $data_user['username'] . '/picture';
                                                                    } else {
                                                                        echo '/assets/img/avatars/avt.png';
                                                                    } ?>"></span>
                            <span></span>
                            <span class="list_data_u">
                                <p><?= $data_user['username'] ?> </p>
                                <p><?= number_format($data_user['cash']) ?>đ </p>
                            </span>
                        </div>
                    <?php } else { ?>
                        <div class="header_btn">
                            <button class="header_bnt header_btn_login"><span><a href="/dang-nhap/">ĐĂNG NHẬP</a></span></button>

                            <button class="header_bnt"><span><a href="/dang-ky/">ĐĂNG KÝ</a></span></button>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <!-- end popup -->