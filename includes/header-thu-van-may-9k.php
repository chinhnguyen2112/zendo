<!DOCTYPE html>
<html lang="vi">
<?php
$id  = "";
if (isset($_GET['id'])) {
    $id = trim(addslashes(htmlspecialchars($_GET['id'])));
}
// Lấy dữ liệu tài khoản


function hide_infocontact($text)
{
    $string = trim($text);
    $string = nl2br($string);


    return $string;
}
$tam = $_SERVER['REQUEST_URI'];

if ($tam != '/dang-nhap/' && $tam != '/dang-ky/' && $tam != '/xac-thuc-tai-khoan/') {
    setcookie('url_301', $tam, time() + 86400, '/');
}


$where_seo = "";
if ($tam == '/') {
    $where_seo = 'home';
} else if ($tam == '/shop-lien-quan/') {
    $where_seo = 'lq';
} else if ($tam == '/thu-van-may-lien-quan-9k/') {
    $where_seo = 'lq-9k';
} else if ($tam == '/thu-van-may-lien-quan-20k/') {
    $where_seo = 'lq-20k';
} else if ($tam == '/thu-van-may-lien-quan-50k/') {
    $where_seo = 'lq-50k';
} else if ($tam == '/thu-van-may-lien-quan-100k/') {
    $where_seo = 'lq-100k';
} else if ($tam == '/thu-van-may-lien-quan-200k/') {
    $where_seo = 'lq-200k';
} else if ($tam == '/thu-van-may-lien-quan-500k/') {
    $where_seo = 'lq-500k';
} else if ($tam == '/shop-acc-free-fire/') {
    $where_seo = 'ff';
} else if ($tam == '/thu-van-may-free-fire-20k/') {
    $where_seo = 'ff-20k';
} else if ($tam == '/thu-van-may-free-fire-70k/') {
    $where_seo = 'ff-70k';
} else if ($tam == '/thu-van-may-free-fire-100k/') {
    $where_seo = 'lq';
} else if ($tam == '/shop-lien-quan') {
    $where_seo = 'ff-100k';
} else if ($tam == '/thu-van-may-free-fire-200k/') {
    $where_seo = 'ff-200k';
} else if ($tam == '/shop-acc-lien-minh-toc-chien/') {
    $where_seo = 'tc';
} else if ($tam == '/thu-van-may-lien-minh-toc-chien-20k/') {
    $where_seo = 'tc-20k';
} else if ($tam == '/thu-van-may-lien-minh-toc-chien-50k/') {
    $where_seo = 'tc-50k';
} else if ($tam == '/thu-van-may-lien-minh-toc-chien-100k/') {
    $where_seo = 'tc-100k';
}
if ($where_seo != "") {
    $sql_seo = "SELECT * FROM setting_random  WHERE page ='$where_seo'";
    if ($db->num_rows($sql_seo)) {
        $data_seo = $db->fetch_assoc($sql_seo, 1);
    }
}

require_once 'core/init.php';
// config facebook
$fb = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_secret,
    'default_graph_version' => 'v2.4',
    'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : $default_access_token
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];  // set the permissions. 
$loginUrl = $helper->getLoginUrl('' . $_DOMAIN . '/login.php', $permissions);



try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    //echo 'Graph returned an error: ' . $e->getMessage();
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    //echo 'Facebook SDK returned an error: ' . $e->getMessage();
}


if (isset($accessToken)) { // đã lấy được token, đăng nhập thành công
    $_SESSION['facebook_access_token'] = (string) $accessToken; // lưu token vào session
    // Lưu session
    $response = $fb->get('/me?fields=id,name,email', $accessToken);
    //$getname = $response->getGraphUser()['name'];
    $name = trim(addslashes(htmlspecialchars($response->getGraphUser()['name'])));
    $email = $response->getGraphUser()['email'];
    $iduser = $response->getGraphUser()['id'];


    //kiểm tra người dùng có trong hệ thống
    if ($db->num_rows("SELECT username FROM accounts WHERE username = '$iduser'") < 1) {
        // Thực thi tạo người dùng
        $db->query("INSERT INTO `accounts` (username,name,email,cash,point,admin,block,time,avatar) VALUES ('$iduser','$name','$email',0,0,0,0,'$date_current','https://graph.facebook.com/' . $iduser . '/picture')");
    }
    $session->send($iduser); //lưu session id fb
    $index = 2;
    $db->close(); // Giải phóng

} elseif ($helper->getError()) {
    // The user denied the request
}
if ($tam == '/dang-ky/' || $tam == '/dang-nhap/') {
    $index = 1;
}
$get_info = new Info;
if (!isset($img_head) || $img_head == "") {
    $img_head =  $_DOMAIN . "assets/img_blog/photo_2022-03-04_17-33-06.jpg";
}
if ($id > 0) {
    $sql_get_data = "SELECT * FROM posts WHERE id_post = '{$id}' LIMIT 1";
    $info = $db->fetch_assoc($sql_get_data, 1);
    $check_page = $info['check_page'];

    $sql_av = "SELECT * FROM setting_random  WHERE id ='$check_page'";
    if ($db->num_rows($sql_av)) {
        $data_av = $db->fetch_assoc($sql_av, 1);
        $img_head = $_DOMAIN . $data_av['avatar'];
    }
    if ($check_page >= 14) {
        $img_head = $_DOMAIN . $get_info->get_thumb($id);
    }
}


// check xác thựuc
if (isset($data_user) && $data_user['active'] == 0 && $tam != '/xac-thuc-tai-khoan/') {
    new Redirect('/xac-thuc-tai-khoan/');
}
?>

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


    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/oneui.css">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/c0f19a2.css">

    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/core.css">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/style.css?v=1">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/css/sweetalert.css">
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>assets/js/plugins/magnific-popup/magnific-popup.min.css">
    <script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo $_DOMAIN; ?>assets/slider/freshslider.min.js"></script>
    <link href="<?php echo $_DOMAIN; ?>assets/slider/freshslider.min.css" type="text/css" rel="stylesheet" />

    <link data-n-head="ssr" rel="icon" type="image/x-icon" href="/images/fav.png">
    <!-- <link data-n-head="ssr" rel="preconnect" href="https://fonts.googleapis.com">
    <link data-n-head="ssr" rel="preconnect" href="https://fonts.gstatic.com" crossorigin="true"> -->
    <!-- <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&amp;display=swap">
    <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&amp;display=swap"> -->

    <link rel="stylesheet" href="/assets/css/9d13ef7.css">
    <link rel="stylesheet" href="/assets/css/b1743af.css">
    <link rel="stylesheet" href="/assets/css/a87e9a3.css">
    <link rel="stylesheet" href="/assets/css/94b25bf.css">
    <link rel="stylesheet" href="/assets/css/55377ee.css">
    <link rel="stylesheet" href="/assets/css/acd0ee7.css">
    <link rel="stylesheet" href="/assets/css/css2.css?v=1">
    <link rel="stylesheet" href="/assets/css/popup.css">
    <link rel="stylesheet" href="/assets/css/sanacc/css_home.css?v=1">
    <link rel="stylesheet" href="/assets/css/sanacc/css_header.css?v=1">
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
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "129292529024923");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v14.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
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

            .close_free_acc .now_btn {
                padding: 10px 40px;
                margin-right: 10px;

            }

            @media (max-width: 540px) {
                .box_nt {
                    width: 90%;
                    padding: 10px;
                    border-radius: 10px;
                }

                .close_free_acc {
                    display: flex;
                    justify-content: space-between;
                }

                .close_tb span {
                    font-size: 16px;
                    padding: 10px;
                    width: 49%;
                }

                .close_free_acc .now_btn {
                    padding: 10px;
                }
            }
        </style>
        <!-- header  -->
        <div class="header">
            <div class="box_header">
                <div class="header_logo">
                    <img class="header_logo_tablet " onclick="show_menu(1)" src="/images/sanacc/menu.svg" alt="menu">
                    <a href="/"><img src="/images/load.gif" data-src="/images/logo.png" class="header_logo_pc lazyload" alt="Logo sanacc"></a>
                    <div class="header_list_tablet">
                        <div class="top_menu_tablet">
                            <span class="text_menu_tablet">Menu</span>
                            <span class="span_logo_tablet"><img onclick="show_menu(2)" class="header_logo_tablet " src="/images/sanacc/menu.svg" alt="menu"></span>
                        </div>
                        <div class="header_menu_tablet">
                            <div class="list_menu">
                                <img class="icon_list_menu_tablet " src="/images/sanacc/dsgame.svg" alt="Danh sách game"><span><a href="/">Trang chủ</a></span>
                            </div>
                            <div class="list_menu" onclick="click_menu_con(this,1)"><img class="icon_list_menu_tablet " src="/images/sanacc/cup.png" alt="Danh sách game"><span>Cửa hàng</span><img class="img_down " src="/images/sanacc/arrow-bottom.png" alt="xem thêm"></div>
                            <div class="menu_con">
                                <p><span><a href="/shop-lien-quan/"><img class="img_icon_game " src="/images/sanacc/icon_lq.png" alt="game liên quân mobile"><span>Liên Quân Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/shop-free-fire/"><img class="img_icon_game " src="/images/sanacc/icon_ff.png" alt="game liên quân mobile"><span>Free Fire</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/shop-lien-minh-huyen-thoai/"><img class="img_icon_game " src="/images/sanacc/icon_lmht.png" alt="game liên quân mobile"><span>Liên Minh Huyền Thoại</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/shop-pubg-mobile/"><img class="img_icon_game " src="/images/sanacc/icon_pubg.png" alt="game liên quân mobile"><span>PUBG Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                            <div class="list_menu" onclick="click_menu_con(this,1)"><img class="icon_list_menu_tablet " src="/images/sanacc/level.svg" alt="Danh sách game"><span>Mini game</span><img class="img_down " src="/images/sanacc/arrow-bottom.png" alt="xem thêm"></div>
                            <div class="menu_con">
                                <p><span><a href="/vong-quay-lien-quan/"><img class="img_icon_game lazyload" src="/images/load.gif" data-src="/images/sanacc/icon_vqlq.png" alt="game liên quân mobile"><span>Liên Quân Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game lazyload" src="/images/load.gif" data-src="/images/sanacc/icon_vq_ff.png" alt="game liên quân mobile"><span>Free Fire</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game " src="/images/sanacc/icon_vqpubg.png" alt="game liên quân mobile"><span>PUBG Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                            <div class="list_menu" onclick="click_menu_con(this,1)"><img class="icon_list_menu_tablet " src="/images/sanacc/level.svg" alt="Danh sách game"><span>Dịch vụ</span><img class="img_down " src="/images/sanacc/arrow-bottom.png" alt="xem thêm"></div>
                            <div class="menu_con">
                                <p><span><a href="/the-game-garena/"><img class="img_icon_game " src="/images/sanacc/garena.png" alt="game liên quân mobile"><span>Thẻ game Garena</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/cay-thue-lien-quan/"><img class="img_icon_game " src="/images/sanacc/icon_lq.png" alt="game liên quân mobile"><span>Cày thuê Liên Quân</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game " src="/images/sanacc/icon_ff.png" alt="game liên quân mobile"><span>Cày thuê Free Fire</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game " src="/images/sanacc/icon_pubg.png" alt="game liên quân mobile"><span>Cày thuê PUBG Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                            <div class="list_menu"><img class="icon_list_menu_tablet " src="/images/sanacc/naptien.svg" alt="Nạp tiền"><span><a href="/nap-the/">Nạp thẻ</a></span></div>
                            <div class="list_menu" onclick="click_menu_con(this,1)"><img class="icon_list_menu_tablet " src="/images/sanacc/level.svg" alt="Danh sách game"><span>Blog</span><img class="img_down " src="/images/sanacc/arrow-bottom.png" alt="xem thêm"></div>
                            <div class="menu_con">
                                <p><span><a href="/blog/garena-blog/"><span>Garena</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/lien-quan-blog/"><span>Liên quân mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/fifa-blog/"><span>Fifa online 4</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/lien-minh-toc-chien-blog/"><span>Liên minh tốc chiến</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/lien-minh-huyen-thoai-blog/"><span>Liên minh huyền thoại</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/su-kien/"><span>Sự kiện</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                            <?php if (isset($data_user['id']) && $data_user['id'] > 0) { ?>
                                <div class="header_btn data_mb" onclick="click_menu_con(this,1)" style="    margin-top: -23px;">
                                    <span class="img_avatar_user"><img  class="lazyload"  src="/images/load.gif" data-src="<?php if (isset($data_user['avatar']) && $data_user['avatar'] !== "") {

                                                                                echo '/' . $data_user['avatar'];
                                                                            } else {
                                                                                echo '/assets/img/avatars/avt.png';
                                                                            } ?>"></span>
                                    <span></span>
                                    <span class="list_data_u">
                                        <p>VNĐ: <?= number_format($data_user['cash']) ?>đ </p>
                                        <p class="total_zen">Zen: <?= number_format($data_user['zen']) ?></p>
                                    </span>
                                </div>
                                <div class="menu_con">
                                    <p><span><a href="/quan-ly-tai-khoan/"><span>Quản lý tài khoản</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                    <p><span><a href="/lich-su-mua-hang/"><span>Lịch sử mua hàng</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                    <p><span><a href="/kho-do/"><span>Kho đồ</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                    <p><span><a href="/logout.html"><span>Đăng xuất</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
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
                                <span><img class="icon_list_menu_tablet " src="/images/sanacc/icon_fb.svg" alt="Facebook"></span>
                                <span><img class="icon_list_menu_tablet " src="/images/sanacc/icon_tw.svg" alt="Twitter"></span>
                                <span><img class="icon_list_menu_tablet " src="/images/sanacc/icon_ytb.svg" alt="Youtube"></span>

                            </div>
                            <p class="text_bot">Copyright © <span>Zendo Vietnam Co.,LTD.</span> All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <div class="header_list">
                    <div class="header_menu">
                        <div class="list_menu"><span><a href="/">Trang chủ</a></span></div>
                        <div class="list_menu"><span><a href="#">Cửa hàng</a></span>
                            <div class="menu_con">
                                <p><span><a href="/shop-lien-quan/"><img class="img_icon_game " src="/images/sanacc/icon_lq.png" alt="game liên quân mobile"><span>Liên Quân Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/shop-free-fire/"><img class="img_icon_game " src="/images/sanacc/icon_ff.png" alt="game free fire"> <span>Free Fire</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/shop-lien-minh-huyen-thoai/"><img class="img_icon_game " src="/images/sanacc/icon_lmht.png" alt="game liên minh huyền thoại"><span>Liên Minh Huyền Thoại</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/shop-pubg-mobile/"><img class="img_icon_game " src="/images/sanacc/icon_pubg.png" alt="game pung mobile"><span>PUBG Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                        </div>
                        <div class="list_menu"><span><a href="#">Mini game</a></span>
                            <div class="menu_con">
                                <p><span><a href="/vong-quay-lien-quan/"><img class="img_icon_game lazyload" src="/images/load.gif" data-src="/images/sanacc/icon_vqlq.png" alt="game liên quân mobile"><span>Liên Quân Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/shop-acc-free-fire/"><img class="img_icon_game lazyload" src="/images/load.gif" data-src="/images/sanacc/icon_vq_ff.png" alt="game liên minh huyền thoại"><span>Free Fire</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game " src="/images/sanacc/icon_vqpubg.png" alt="game liên minh huyền thoại"><span>PUBG Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                        </div>
                        <div class="list_menu"><span><a href="#">Dịch vụ</a></span>
                            <div class="menu_con">
                                <p><span><a href="/the-game-garena/"><img class="img_icon_game " src="/images/sanacc/garena.png" alt="game liên quân mobile"><span>Thẻ game Garena</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/cay-thue-lien-quan/"><img class="img_icon_game " src="/images/sanacc/icon_lq.png" alt="game liên quân mobile"><span>Cày thuê Liên Quân</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game " src="/images/sanacc/icon_ff.png" alt="game liên minh huyền thoại"><span>Cày thuê Free Fire</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a onclick="$('.popup_no_click').show();" href="#"><img class="img_icon_game " src="/images/sanacc/icon_pubg.png" alt="game liên minh huyền thoại"><span>Cày thuê PUBG Mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                        </div>
                        <div class="list_menu"><span><a href="/nap-the/">Nạp thẻ</a></span></div>

                        <div class="list_menu"><span><a href="/blog/">Blog</a></span>
                            <div class="menu_con">
                                <p><span><a href="/blog/garena-blog/"><span> Garena</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/lien-quan-blog/"><span>Liên quân mobile</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/fifa-blog/"><span>FiFa online 4</span><img class="img_goto_link "src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/lien-minh-toc-chien-blog/"><span> Liên minh tốc chiến</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/lien-minh-huyen-thoai-blog/"><span> Liên minh huyền thoại</span><img class="img_goto_link "src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/blog/su-kien/"><span> Sự kiện</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($data_user['id']) && $data_user['id'] > 0) { ?>
                        <div class="header_btn data_mb">
                            <span class="img_avatar_user"><img class="lazyload" src="/images/load.gif" data-src="<?php if (isset($data_user['avatar']) && $data_user['avatar'] !== "") {

                                                                        echo '/' . $data_user['avatar'];
                                                                    } else {
                                                                        echo '/assets/img/avatars/avt.png';
                                                                    } ?>"></span>
                            <span></span>
                            <span class="list_data_u">
                                <p>VNĐ: <?= number_format($data_user['cash']) ?>đ </p>
                                <p class="total_zen">Zen: <?= number_format($data_user['zen']) ?> </p>
                            </span>
                            <div class="menu_con">
                                <p><span><a href="/quan-ly-tai-khoan/"><span>Quản lý tài khoản</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/lich-su-mua-hang/"><span>Lịch sử mua hàng</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/kho-do/"><span>Kho đồ</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                                <p><span><a href="/logout.html"><span>Đăng xuất</span><img class="img_goto_link " src="/images/sanacc/arrow-right.svg" alt="đi tới"></a></span></p>
                            </div>
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
        <!-- popup sale -->
        <div class="
      tw-preview
      tw-fixed
      tw-top-0
      tw-right-0
      tw-left-0
      tw-bottom-0
      tw-flex
      tw-items-center
      tw-justify-center
      tw-p-2
      uudai
     " style="z-index: 99002; background: rgba(93, 93, 93, 0.77);font-size:16px ">

            <div class="box_nt box_free_acc" style="display: block;">

                <div class="img_tb">
                    <img class="lazyload" src="/images/load.gif" data-src="/assets/images/img_tb.png" atl="Thông báo">
                </div>
                <div class="title_tb">
                    <span>THÔNG BÁO</span>
                </div>
                <div class="content_tb" style="height: 150px !important;">
                    <p class="name_tb">GIỜ VÀNG SĂN ACC FREE 0đ với ZENDO</p>
                    <p class="text_tb">Với chương trình này bạn sẽ có cơ hội nhận acc miễn phí tại Zendo.vn.</p>
                    <div class="box_tex_no">
                        <p class="text_tb">※&nbsp;</p>
                        <p class="text_tb">Thời gian: từ thứ 2 đến thứ 7.</p>
                    </div>
                    <div class="box_tex_no">
                        <p class="text_tb">※&nbsp;</p>
                        <p class="text_tb"> Khung giờ: 11h-12h và 20h-21h mỗi ngày.</p>
                    </div>
                </div>
                <div class="close_tb close_free_acc">
                    <span class="now_btn">CHƠI NGAY</span>
                    <span onclick="close_uudai()">ĐÓNG</span>

                </div>


            </div>
        </div>
        <?php require_once 'includes/popup_gt.php'; ?>
        <!-- end popup -->

        <script>
            $('.now_btn').click(function() {
                window.location.href = "/vong-quay-lien-quan/";
            })
        </script>