<?php

// config facebook
$fb = new Facebook\Facebook([
'app_id' => $app_id,
'app_secret' => $app_secret,
'default_graph_version' => 'v2.12',
'default_access_token' => isset($_SESSION['facebook_access_token']) ? $_SESSION['facebook_access_token'] : $default_access_token
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];  // set the permissions. 
$loginUrl = $helper->getLoginUrl(''.$_DOMAIN.'/login.php', $permissions);

?>
<div class="block pull-r-l"><div class="bg-gray-lighter block-header"><ul class=block-options><li><button type=button data-action=content_toggle data-toggle=block-option></button></ul><p class=block-title>Đăng nhập</p></div><div class=block-content><p class=text-info>Để sử dụng các tính năng trên hệ thống của chúng tôi, vui lòng bấm nút đăng nhập phía dưới</p><a href="<?php echo $loginUrl; ?>"><button type=button class="btn btn-block btn-primary push-10"><i class="fa fa-facebook pull-left"></i> Đăng nhập bằng Facebook</button></a></div></div>