<?php

// Require database
require_once '../core/init.php';

// Require header
require_once '../includes/header.php';
$select = new Info;

// Nếu đăng nhập
if ($user) {
    // Nếu tài khoản không phải là admin
    if ($data_user['admin'] == 0) {
        new Redirect($_DOMAIN); // Trở về trang index
        exit;
    }
    echo '<div class="content content-boxed"><div class="col-sm-5 col-sm-push-7 col-lg-4 col-lg-push-8">';
    require_once 'templates/sidebar.php';
    echo '</div><div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">';
    $act = isset($_GET['act']) ? $_GET['act'] : '';
    switch ($act) {
        case 'setting':
            require_once 'templates/settings.php';
            break;
        case 'setting_random':
            require_once 'templates/settings_random.php';
            break;
        case 'setting_page':
            require_once 'templates/setting_page_acc.php';
            break;
        case 'blog':
            require_once 'templates/manager_blog.php';
            break;
        case 'add_blog':
            require_once 'templates/add_blog.php';
            break;
        case 'gift':
            require_once 'templates/gift.php';
            break;
        case 'add_gift':
            require_once 'templates/add_gift.php';
            break;
        case 'post':
            require_once 'templates/post.php';
            break;
        case 'tool-post-random-lmht':
            require_once 'templates/tool-post-random-lmht.php';
            break;
        case 'tool-post-random-fifa':
            require_once 'templates/tool-post-random-fifa.php';
            break;
        case 'tool-post-random':
            require_once 'templates/tool-post-random.php';
            break;
        case 'tool-post-random-toc-chien':
            require_once 'templates/tool-post-random-toc-chien.php';
            break;
        case 'tool-post-random-free-fire':
            require_once 'templates/tool-post-random-free-fire.php';
            break;
        case 'post-lmtc':
            require_once 'templates/post-lmtc.php';
            break;
        case 'post-freefire':
            require_once 'templates/post-freefire.php';
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
            require_once 'templates/list.php';
            break;
        case 'edit_acc':
            require_once 'templates/edit_acc.php';
            break;
        case 'log':
            require_once 'templates/log.php';
            break;
        case 'member':
            require_once 'templates/member.php';
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
        default:
            require_once 'templates/main.php';
            break;
    }
    echo '</div></div>';
} else {
    new Redirect($_DOMAIN); // Trở về trang index
}
?>
</div>
<div class="clear"></div>
<style>
    .content-boxed{
        color:#000;
    }
</style>

<?php
// Require footer
require_once '../includes/footer.php';
?>