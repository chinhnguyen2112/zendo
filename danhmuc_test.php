<?php

// Require database & th么ng tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account

$xss = new Anti_xss;

// $act = $xss->clean_up($_GET['act']);
$sql_count_lq = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile'";
$count_lq = $db->num_rows($sql_count_lq);

$sql_count_lq_9k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 9k'";
$count_lq_9k = $db->num_rows($sql_count_lq_9k);

$sql_count_lq_20k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 20k'";
$count_lq_20k = $db->num_rows($sql_count_lq_20k);

$sql_count_lq_50k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 50k'";
$count_lq_50k = $db->num_rows($sql_count_lq_50k);

$sql_count_lq_100k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 100k'";
$count_lq_100k = $db->num_rows($sql_count_lq_100k);

$sql_count_lq_200k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 200k'";
$count_lq_200k = $db->num_rows($sql_count_lq_200k);

$sql_count_lq_500k = "SELECT id_post FROM posts  WHERE type_account ='Liên Quân Mobile Random 500k'";
$count_lq_500k = $db->num_rows($sql_count_lq_500k);
?>

<link rel="stylesheet" href="/assets/css/css_danh_muc.css">
<style>
    .dpl_flex {
        display: flex;
        position:absolute;
        margin-top: 3px;
        border-bottom-right-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
        justify-content: space-between;
        width:100%;
        bottom:0;
    }

   span.c_price {
        border: 1px solid #30343c;
        border-top-width: 0px;
        border-right-width: 0px;
        padding: 10px 15px;
        color: #fff;
        background: #ff4642;
        text-align: center;
        width: 50%;
    }
    span.link_ct {
    border: 1px solid #30343c;
    border-top-width: 0px;
    border-left-width: 0px;
    padding: 10px 15px;
    color: #fff;
    background:  #cd9a34;
    text-align: center;
    width: 50%;
}
    .tw-col-span-12.tw-px-2.tw-py-3.tw-h-28.tw-relative.c_content_des {
    padding-bottom: 53px;
}
@media only screen and (max-width: 540PX) {
    .tw-grid-cols-12{
        grid-template-columns: 100%;
        gap:unset !important;
        row-gap: 20PX !important;
    }
}
</style>
<div class="content_shop">
    <div class="breadcrumbs">
        <span class="breadcrumb_home">Trang chủ</span>
        <span class="breadcrumb_next">|</span>
        <span class="breadcrumb_page">Shop acc Liên Quân</span>
    </div>
    <div class="tw-bg-white tw-mb-3 tw-rounded main_color">
        <div class="
        tw-header-sub-interface tw-sticky tw-top-12
        md:tw-top-14
        tw-bg-white tw-p-2
        md:tw-py-4
        tw-block tw-text-base
        md:tw-text-xl
        tw-border-b
        w-max
        tw-rounded-t
      " style="z-index: 999; background:#000">
            <h3 class="tw-uppercase tw-font-bold tw-text-red-600">
                Danh mục acc Liên Quân
            </h3>
        </div>
        <div class=" tw-p-2 md:tw-py-4">
            <div class="tw-grid tw-grid-cols-12 tw-gap-2 md:tw-gap-4">
                <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative tw-bg-gray-100
          ">
                    <!----> <a href="/acc-lien-quan-tu-chon/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="https://chonaccngon.com/assets/images/shop-lien-quan.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Quân tự chọn
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">151.800</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lq) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lq['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lq['des_pre']);
                                        foreach ($des_pre as $val) { ?>
                                            <li><?= $val; ?></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                            <div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>
                                <!---->
                            </div>
                        </div>
                        <div class="dpl_flex">
                            <span class="c_price">Tự chọn</span>
                            <span class="link_ct">Chi tiết</span>
                        </div>
                    </a>
                </div>
                <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative tw-bg-gray-100
          ">
                    <!----> <a href="/thu-van-may-lien-quan-9k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="https://chonaccngon.com/assets/images/thu-van-may-lien-quan-9k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Quân 9.000
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">27.200</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lq_9k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lq_9k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lq_9k['des_pre']);
                                        foreach ($des_pre as $val) { ?>
                                            <li><?= $val; ?></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                            <div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>
                                <!---->
                            </div>
                        </div>
                        <div class="dpl_flex">
                            <span class="c_price">9.000đ</span>
                            <span class="link_ct">Quay thử</span>
                        </div>
                    </a>
                </div>
                <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative tw-bg-gray-100
          ">
                    <!----> <a href="/thu-van-may-lien-quan-20k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="https://chonaccngon.com/assets/images/thu-van-may-lien-quan-20k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Quân 20.000
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">11.200</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lq_20k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lq_20k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lq_20k['des_pre']);
                                        foreach ($des_pre as $val) { ?>
                                            <li><?= $val; ?></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                            <div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>
                                <!---->
                            </div>
                        </div>
                        <div class="dpl_flex">
                            <span class="c_price">20.000đ</span>
                            <span class="link_ct">Quay thử</span>
                        </div>
                    </a>
                </div>
                <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative tw-bg-gray-100
          ">
                    <!----> <a href="/thu-van-may-lien-quan-50k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="https://chonaccngon.com/assets/images/thu-van-may-lien-quan-50k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Quân 50.000
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">13.300</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lq_50k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lq_50k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lq_50k['des_pre']);
                                        foreach ($des_pre as $val) { ?>
                                            <li><?= $val; ?></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                            <div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>
                                <!---->
                            </div>
                        </div>
                        <div class="dpl_flex">
                            <span class="c_price">50.000đ</span>
                            <span class="link_ct">Quay thử</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class=" tw-p-2 md:tw-py-4">
            <div class="tw-grid tw-grid-cols-12 tw-gap-2 md:tw-gap-4">

                <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative tw-bg-gray-100
          ">
                    <!----> <a href="/thu-van-may-lien-quan-100k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="https://chonaccngon.com/assets/images/thu-van-may-lien-quan-100k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Quân 100.000
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">27.200</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lq_100k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lq_100k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lq_100k['des_pre']);
                                        foreach ($des_pre as $val) { ?>
                                            <li><?= $val; ?></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                            <div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>
                                <!---->
                            </div>
                        </div>
                        <div class="dpl_flex">
                            <span class="c_price">100.000đ</span>
                            <span class="link_ct">Quay thử</span>
                        </div>
                    </a>
                </div>
                <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative tw-bg-gray-100
          ">
                    <!----> <a href="/thu-van-may-lien-quan-200k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="https://chonaccngon.com/assets/images/thu-van-may-lien-quan-200k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Quân 200.000
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">11.200</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lq_200k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lq_200k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lq_200k['des_pre']);
                                        foreach ($des_pre as $val) { ?>
                                            <li><?= $val; ?></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                            <div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>
                                <!---->
                            </div>
                        </div>
                        <div class="dpl_flex">
                            <span class="c_price">200.000đ</span>
                            <span class="link_ct">Quay thử</span>
                        </div>
                    </a>
                </div>
                <div class=" 
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative tw-bg-gray-100
          ">
                    <!----> <a href="/thu-van-may-lien-quan-500k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="https://chonaccngon.com/assets/images/500k.jpg"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Quân 500.000
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">13.300</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lq_500k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lq_500k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lq_500k['des_pre']);
                                        foreach ($des_pre as $val) { ?>
                                            <li><?= $val; ?></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>
                            <!---->
                        </div>
                        <div class="dpl_flex">
                            <span class="c_price">500.000đ</span>
                            <span class="link_ct">Quay thử</span>
                        </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<style>
.tw-bg-gray-100 {
    --tw-bg-opacity: 1;
    background-color: #eaeaea;
    border: 1px solid #30343c;
}
</style>
<?php
// Require footer
require_once 'includes/footer.php';

?>