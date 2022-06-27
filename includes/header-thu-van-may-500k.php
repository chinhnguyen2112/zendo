<!DOCTYPE html>
<html lang="vi">
<?php

require_once 'core/init.php';
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
// $tam = $_SERVER['REQUEST_URI'];

//     $tam1 = $tam.'/';
//     $tam1 = str_replace('//','/',$tam1);
//     if($tam != $tam1){
//         new Redirect($tam1);
//     }

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

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
 
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WT5HLK3');</script>
<!-- End Google Tag Manager -->


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WT5HLK3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MP030Z45P9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MP030Z45P9');
</script>

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WT5HLK3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->