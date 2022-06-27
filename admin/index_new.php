<!DOCTYPE html>
<html lang="vi">
<?php

require_once '../core/init.php';
// $ac = new Facebook\Facebook([
//     'app_id' => $app_id,
//     'app_secret' => $app_secret,
//     'default_graph_version' => 'v2.4',
//     'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : $default_access_token
// ]);

// $helper = $ac->getRedirectLoginHelper();
// $permissions = ['email'];  // set the permissions. 
// $loginUrl = $helper->getLoginUrl('' . $_DOMAIN . '/login.php', $permissions);

// echo $loginUrl;

?>

<head>
  <meta charset="UTF-8" />
  <meta name="robots" content="noindex,nofollow" />
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
  <link rel="shortcut icon" href="/images/fav.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <script src="/assets/js/core/jquery.min.js"></script>
  <script src="/assets/js/jquery.validate.min.js"></script>
  <script src="https://zendo.vn/assets/slider/freshslider.min.js"></script>
  <link rel="stylesheet" href="/assets/css/admin/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="/assets/css/admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/assets/css/admin/vertical-layout-light/style.css">

  <link rel="stylesheet" href="/assets/css/sweetalert.css">
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
<Style>
  nav#sidebar {
    background: #ffffff !IMPORTANT;
    position: UNSET !IMPORTANT;
  }

  .navbar-breadcrumb {
    margin-top: 0px;
  }

  footer {
    display: none;
  }

  /* .content-inner1{
    width: max-content !important;
  } */
  .padding_chung {
    overflow: auto;
  }
  .lienhe{
    display: none !important;
  }

  @media only screen and (max-width: 768px) {
    .page-body-wrapper {
      display: block;
    }

    #sidebar {
      opacity: 1 !important;
      margin: auto;
      min-height: unset;
      height: auto;
    }

    .list_buy {
      overflow: auto;
    }

    .content-wrapper {
      padding: 1.5rem 0px;
    }

  }
</Style>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WT5HLK3" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->



  <i class="typcn typcn-delete-outline icon_none" id="bannerClose"></i>
  <!-- partial -->
  <nav class="navbar-breadcrumb">

    <div class="navbar-menu-wrapper d-flex align-items-center">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item ml-0">
          <h4 class="mb-0">Admin</h4>
        </li>
        <li class="nav-item">
          <div class="d-flex align-items-baseline">
            <p class="mb-0">Home</p>
            <i class="typcn typcn-chevron-right"></i>
            <p class="mb-0">Admin</p>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid page-body-wrapper">
    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">

        <li class="nav-item nav_dashboard">
          <a class="nav-link" href="?act=main">
            <i class="typcn typcn-device-desktop menu-icon"></i>
            <span class="menu-title">Dashboard</span>

          </a>

        </li>
        <li class="nav-item nav_manager_post">
          <a class="nav-link">
            <i class="typcn typcn-film menu-icon"></i>
            <span class="menu-title">Quản Lý Bài Viết</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="?act=blog">Danh Sách Bài Viết</a></li>
              <li class="nav-item"><a class="nav-link" href="?act=add_blog">Thêm Bài Viết</a></li>
              <li class="nav-item"><a class="nav-link" href="?act=category">Danh Sách Chuyên Mục</a></li>
              <li class="nav-item"><a class="nav-link" href="?act=add_category">Thêm Chuyên Mục</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav_manager_gift">
          <a class="nav-link">
            <i class="typcn typcn-film menu-icon"></i>
            <span class="menu-title">Quản Lý Phần Quà</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="?act=gift">Danh Sách Phần Quà</a></li>
              <li class="nav-item"><a class="nav-link" href="?act=add_gift">Thêm Phần Quà</a></li>
              <li class="nav-item"><a class="nav-link" href="?act=add_discount">Thêm Mã Giảm Giá</a></li>
              <li class="nav-item"><a class="nav-link" href="?act=discount">Danh Sách Mã Giảm Giá</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item nav_post_acc">
          <a class="nav-link">
            <i class="typcn typcn-chart-pie-outline menu-icon"></i>
            <span class="menu-title">Đăng Acc</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="charts">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="?act=post_lmht">Đăng Acc LMHT</a></li>
              <li class="nav-item"> <a class="nav-link" href="?act=post_lq">Đăng Liên Quân</a></li>
              <li class="nav-item"> <a class="nav-link" href="?act=tool-post-random">Đăng Random Liên Quân</a></li>
              <li class="nav-item"> <a class="nav-link" href="?act=post_fifa">Đăng FIFA</a></li>
              <li class="nav-item"> <a class="nav-link" href="?act=post_lmtc">Đăng Liên Minh Tốc Chiến</a></li>
              <li class="nav-item"> <a class="nav-link" href="?act=post_freefire">Đăng Free Fire</a></li>
              <li class="nav-item"> <a class="nav-link" href="?act=post_pubg">Đăng Pubg</a></li>
              <li class="nav-item"> <a class="nav-link" href="?act=post_cf">Đăng CF</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item nav_post_acc">
          <a class="nav-link">
            <i class="typcn typcn-chart-pie-outline menu-icon"></i>
            <span class="menu-title">Thẻ garena</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="charts">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="?act=post_garena">Thêm thẻ garena</a></li>
              <li class="nav-item"> <a class="nav-link" href="?act=list_garena">Danh sách thẻ garena</a></li>
              <li class="nav-item"> <a class="nav-link" href="?act=buy_garena">Lịch sử mua thẻ garena</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item nav_account">
          <a class="nav-link" href="?act=list">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
            <span class="menu-title">Danh Sách Acc</span>
          </a>
        </li>

        <li class="nav-item nav_transaction">
          <a class="nav-link" href="?act=log">
            <i class="typcn typcn-compass menu-icon"></i>
            <span class="menu-title">Giao Dịch</span>

          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="?act=ls_quay">
            <i class="typcn typcn-mortar-board menu-icon"></i>
            <span class="menu-title">Lịch Sử Quay</span>
          </a>
        </li>

        <li class="nav-item nav_member">
          <a class="nav-link" href="?act=member">
            <i class="typcn typcn-user-add-outline menu-icon"></i>
            <span class="menu-title">Thành Viên</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <?php
    $select = new Info;

    // Nếu đăng nhập
    if ($user) {
      // Nếu tài khoản không phải là admin
      if ($data_user['admin'] == 0) {
        new Redirect($_DOMAIN); // Trở về trang index
        exit;
      }
      $act = isset($_GET['act']) ? $_GET['act'] : '';
      switch ($act) {
        case 'setting':
          require_once 'templates/new/settings.php';
          break;
        case 'setting_random':
          require_once 'templates/new/settings_random.php';
          break;
        case 'setting_page':
          require_once 'templates/new/setting_page_acc.php';
          break;
        case 'blog':
          require_once 'templates/new/manager_blog.php';
          break;
        case 'add_blog':
          require_once 'templates/new/add_blog.php';
          break;
        case 'category':
          require_once 'templates/new/category.php';
          break;
        case 'add_category':
          require_once 'templates/new/add_category.php';
          break;
        case 'edit_category':
          require_once 'templates/new/edit_category.php';
          break;
        case 'gift':
          require_once 'templates/new/gift.php';
          break;
        case 'add_gift':
          require_once 'templates/new/add_gift.php';
          break;
        case 'discount':
          require_once 'templates/new/discount.php';
          break;
        case 'add_discount':
          require_once 'templates/new/add_discount.php';
          break;
        case 'post_lq':
          require_once 'templates/new/post_lq.php';
          break;
        case 'post_lmht':
          require_once 'templates/new/post_lm.php';
          break;
        case 'tool-post-random':
          require_once 'templates/new/post_lq_random.php';
          break;
        case 'post_lmtc':
          require_once 'templates/new/post_lmtc.php';
          break;
        case 'post_freefire':
          require_once 'templates/new/post_freefire.php';
          break;
        case 'post_pubg':
          require_once 'templates/new/post_pubg.php';
          break;
        case 'post_fifa':
          require_once 'templates/new/post_fifa.php';
          break;
          case 'post_cf':
            require_once 'templates/new/post_cf.php';
            break;
        case 'list':
          if (isset($_GET['tt']) == 'delete_acc') {
            $id = addslashes(htmlspecialchars($_GET['id']));
            $db->query("DELETE FROM `posts` WHERE `id_post` ='{$id}'");
            $arr_delete = array();
            $avatar = glob("../assets/files/thumb/" . $id . ".*");
            $arr_delete[] = $avatar[0];
            $gem = glob("../assets/files/gem/" . $id . "-*");
            foreach ($gem as $link_gem) {
              $arr_delete[] = $link_gem;
            }
            $post = glob("../assets/files/post/" . $id . "-*");
            foreach ($post as $link_post) {
              $arr_delete[] = $link_post;
            }
            foreach ($arr_delete as $link) {
              @unlink($link);
            }
          }
          require_once 'templates/new/list.php';
          break;
        case 'edit_acc':
          require_once 'templates/edit_acc.php';
          break;
        case 'log':
          require_once 'templates/new/log.php';
          break;
        case 'ls_quay':
          require_once 'templates/new/ls_quay.php';
          break;
        case 'member':
          require_once 'templates/new/member.php';
          break;
        case 'edit':
          require_once 'templates/edit.php';
          break;
        case 'list-shopmobaviet':
          require_once 'templates/list-shopmobaviet.php';
          break;
        case 'post-random':
          require_once 'templates/post-random.php';
          break;

        case 'post-random':
          require_once 'templates/post-random.php';
          break;
          case 'post_garena':
            require_once 'templates/new/add_garena.php';
            break;
            case 'list_garena':
              require_once 'templates/new/list_garena.php';
              break;
              case 'by_garena':
                require_once 'templates/new/buy_garena.php';
                break;
        default:
          require_once 'templates/new/main.php';
          break;
      }
    } else {
      new Redirect($_DOMAIN); // Trở về trang index
    }
    ?>



    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php
  if ($act == 'post_lq' || $act == 'edit_acc') {
    echo '
    <script src="/assets/js/admin/off-canvas.js"></script> 
    <script src="/assets/js/admin/hoverable-collapse.js"></script>
    <script src="/assets/js/admin/template.js"></script>
    <script src="/assets/js/admin/settings.js"></script>
    <script src="/assets/js/admin/todolist.js"></script>
   <script src="/assets/js/admin/dashboard.js"></script>';
  } else {
    echo '
  <script src="https://zendo.vn/assets/js/core/jquery.min.js"></script>
  <script src="https://zendo.vn/assets/js/jquery.validate.min.js"></script>
  <script src="https://zendo.vn/assets/js/jquery-ui.min.js"></script>
  <script src="https://zendo.vn/assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
  ';
  }
  // Require footer
  require_once '../includes/footer.php';

  ?>

  <script>
    $('.nav_manager_post, .nav_manager_gift, .nav_post_acc').click(function() {
      if ($(this).find('.collapse').hasClass('show')) {
        $(this).find('.collapse').removeClass('show')
      } else {
        $(this).find('.collapse').addClass('show')
      }

    })
  </script>