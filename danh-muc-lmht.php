<?php

// Require database & th么ng tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account

$xss = new Anti_xss;

// $act = $xss->clean_up($_GET['act']);

$sql_count_tc = "SELECT id_post FROM posts  WHERE type_account ='Liên Minh Huyền Thoại'";
$count_tc = $db->num_rows($sql_count_tc);

$sql_count_tc_20k = "SELECT id_post FROM posts  WHERE type_account ='Liên Minh Huyền Thoại Random 20k'";
$count_tc_20k = $db->num_rows($sql_count_tc_20k);

$sql_count_tc_50k = "SELECT id_post FROM posts  WHERE type_account ='Liên Minh Huyền Thoại Random 50k'";
$count_tc_50k = $db->num_rows($sql_count_tc_50k);

$sql_count_tc_100k = "SELECT id_post FROM posts  WHERE type_account ='Liên Minh Huyền Thoại Random 100k'";
$count_tc_100k = $db->num_rows($sql_count_tc_100k);
?>

<link rel="stylesheet" href="/assets/css/css_danh_muc.css">
<style>
    .content_shop{
        pointer-events: none;
    }

    .dpl_flex {
        display: flex;
        position: absolute;
        margin-top: 3px;
        border-bottom-right-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
        justify-content: space-between;
        width: 100%;
        bottom: 0;
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
        background: #cd9a34;
        text-align: center;
        width: 50%;
    }

    .tw-col-span-12.tw-px-2.tw-py-3.tw-h-28.tw-relative.c_content_des {
        padding-bottom: 53px;
    }

    @media only screen and (max-width: 540PX) {
        .tw-grid-cols-12 {
            grid-template-columns: 100%;
            gap: unset !important;
            row-gap: 20PX !important;
        }
    }
</style>
<div class="content_shop">
    <div class="breadcrumbs">
        <span class="breadcrumb_home">Trang chủ</span>
        <span class="breadcrumb_next">|</span>
        <span class="breadcrumb_page">Shop acc Liên Minh Huyền Thoại</span>
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
      " style="z-index: 2; background:#000">
            <h3 class="tw-uppercase tw-font-bold tw-text-red-600">
                Danh mục acc Liên Minh Huyền Thoại
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
                    <!----> <a href="/shop-acc-lmht-viet/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/assets/images/shop-acc-lien-minh-toc-chien.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Minh Huyền Thoại Việt
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">11.800</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lmht_v) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lmht_v['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lmht_v['des_pre']);
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
                    <!----> <a href="/shop-acc-lmht-han-quoc/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/assets/images/shop-acc-lien-minh-toc-chien.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Minh Huyền Thoại Hàn Quốc
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">21.200</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lmht_h) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lmht_h['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lmht_h['des_pre']);
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
                    <!----> <a href="/shop-acc-lmht-na/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/assets/images/shop-acc-lien-minh-toc-chien.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Minh Huyền Thoại NA
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">2.200</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lmht_na) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lmht_na['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lmht_na['des_pre']);
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
                    <!----> <a href="/shop-acc-lmht-pbe/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/assets/images/shop-acc-lien-minh-toc-chien.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Minh Huyền Thoại PBE
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">21.200</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lmht_pbe) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lmht_pbe['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lmht_pbe['des_pre']);
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
                    <!----> <a href="/thu-van-may-lmht-9k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/assets/images/thu-van-may-lien-quan-9k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Minh Huyền Thoại 9k
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">1.200</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lmht_9k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lmht_9k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lmht_9k['des_pre']);
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
                    <!----> <a href="/thu-van-may-lmht-20k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/assets/images/thu-van-may-lien-quan-20k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Minh Huyền Thoại 20k
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">1.260</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lmht_20k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lmht_20k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lmht_20k['des_pre']);
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
                    <!----> <a href="/thu-van-may-lmht-50k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/assets/images/thu-van-may-lien-quan-50k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Minh Huyền Thoại 50k
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">3.208</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lmht_50k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lmht_50k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lmht_50k['des_pre']);
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
                <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative tw-bg-gray-100
          ">
                    <!----> <a href="/thu-van-may-lmht-100k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/assets/images/thu-van-may-lien-quan-100k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Minh Huyền Thoại 100k
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">8.800</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lmht_100k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lmht_100k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lmht_100k['des_pre']);
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
                    <!----> <a href="/thu-van-may-lmht-200k/" class="">
                        <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/assets/images/thu-van-may-lien-quan-200k.gif"></div>
                        <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative c_content_des">
                            <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                Acc Liên Minh Huyền Thoại 200k
                            </h4>
                            <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                    Đã bán:
                                    <b class="">4.100</b></span>
                                <!---->
                                <span> Số tài khoản: <b style=""> <?= number_format($count_lmht_200k) ?></b> </span>
                            </div>
                            <div class="box_text_shop">
                                <ul>
                                    <?php if (isset($data_page_lmht_200k['des_pre'])) {
                                        $des_pre = explode('|', $data_page_lmht_200k['des_pre']);
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