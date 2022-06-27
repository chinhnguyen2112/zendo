<?php
$sql_count_lq = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page   WHERE type_account ='Liên Quân Mobile'";
$count_lq = $db->num_rows($sql_count_lq);
$av_lq = $db->fetch_assoc($sql_count_lq, 1);

$sql_count_lq_9k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Quân Mobile Random 9k'";
$count_lq_9k = $db->num_rows($sql_count_lq_9k);
$av_lq_9 = $db->fetch_assoc($sql_count_lq_9k, 1);

$sql_count_lq_20k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Quân Mobile Random 20k'";
$count_lq_20k = $db->num_rows($sql_count_lq_20k);
$av_lq_20 = $db->fetch_assoc($sql_count_lq_20k, 1);

$sql_count_lq_50k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Quân Mobile Random 50k'";
$count_lq_50k = $db->num_rows($sql_count_lq_50k);
$av_lq_50 = $db->fetch_assoc($sql_count_lq_50k, 1);

$sql_count_lq_100k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Quân Mobile Random 100k'";
$count_lq_100k = $db->num_rows($sql_count_lq_100k);
$av_lq_100 = $db->fetch_assoc($sql_count_lq_100k, 1);

$sql_count_lq_200k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Quân Mobile Random 200k'";
$count_lq_200k = $db->num_rows($sql_count_lq_200k);
$av_lq_200 = $db->fetch_assoc($sql_count_lq_200k, 1);

$sql_count_lq_500k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Quân Mobile Random 500k'";
$count_lq_500k = $db->num_rows($sql_count_lq_500k);
$av_lq_500 = $db->fetch_assoc($sql_count_lq_500k, 1);

// $sql_count_ff = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Free Fire'";
// $count_ff = $db->num_rows($sql_count_ff);
// $av_ff = $db->fetch_assoc($sql_count_ff, 1);

// $sql_count_ff_20k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Free Fire Random 20k'";
// $count_ff_20k = $db->num_rows($sql_count_ff_20k);
// $av_ff_20 = $db->fetch_assoc($sql_count_ff_20k, 1);

// $sql_count_ff_70k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Free Fire Random 70k'";
// $count_ff_70k = $db->num_rows($sql_count_ff_70k);
// $av_ff_70 = $db->fetch_assoc($sql_count_ff_70k, 1);

// $sql_count_ff_100k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Free Fire Random 100k'";
// $count_ff_100k = $db->num_rows($sql_count_ff_100k);
// $av_ff_100 = $db->fetch_assoc($sql_count_ff_100k, 1);

// $sql_count_ff_200k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Free Fire Random 200k'";
// $count_ff_200k = $db->num_rows($sql_count_ff_200k);
// $av_ff_200 = $db->fetch_assoc($sql_count_ff_200k, 1);

// $sql_count_tc = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Minh Tốc Chiến'";
// $count_tc = $db->num_rows($sql_count_tc);
// $av_tc = $db->fetch_assoc($sql_count_tc, 1);

// $sql_count_tc_20k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Minh Tốc Chiến Random 20k'";
// $count_tc_20k = $db->num_rows($sql_count_tc_20k);
// $av_tc_20 = $db->fetch_assoc($sql_count_tc_20k, 1);

// $sql_count_tc_50k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Minh Tốc Chiến Random 50k'";
// $count_tc_50k = $db->num_rows($sql_count_tc_50k);
// $av_tc_50 = $db->fetch_assoc($sql_count_tc_50k, 1);

// $sql_count_tc_100k = "SELECT *  FROM posts INNER JOIN setting_random ON setting_random.id=posts.check_page  WHERE type_account ='Liên Minh Tốc Chiến Random 100k'";
// $count_tc_100k = $db->num_rows($sql_count_tc_100k);
// $av_tc_100 = $db->fetch_assoc($sql_count_tc_100k, 1);


?>
<style>
    #card-recharing1 .form-control{
        height:46px;
        margin-top:0px;
        margin-bottom:0px;
    }
    #card{
        width: 100%;
        background: #101113;
        padding: 0px 10px;
    }
    .error{
        color: red;
        font-size: 12px;    
    }
    .color_bgr_b {
        border: 1px solid #fcd053;
        background: #000;
    }
    .tw-px-2 {
        padding-left: 7px;
        padding-right: 7px;
    }
    .tw-py-3 {
        padding-top: 10px;
    }
    h4{
        text-transform: unset !important
    }
    .dpl_flex {
        display: flex;
        width: 100%;
        height:42px;
    }
    span.c_price {
        padding: 10px 15px;
        width: 100%;
        color: #fff;
        background: #ff4642;
        text-align: center;
    }
    a .tw-col-span-5 {
        height: 165px;
    }
    .tw-col-span-5 img {
        height: 100%;
    }
@media only screen and (max-width: 540px) {
    .tw-grid-cols-12 {
        grid-template-columns: auto;
    }
}
</style>
<body style=" overflow: auto; position: static;" class="" data-n-head="%7B%22style%22:%7B%22ssr%22:%22background:%20url(https://cdns.diongame.com/static/image-8df099be-fdf3-4fd9-94cc-3242c943cdea.jpeg)%20fixed%20bottom%20no-repeat;%20background-size:%20cover;%22%7D,%22class%22:%7B%22ssr%22:%22%22%7D%7D">
    <div id="__nuxt">
        <div id="__layout">
            <div id="element">
                <section class="tw-fullscreen">
                    <div class="tw-max-w-6xl tw-mx-auto">
                        <?php require_once 'includes/banner.php';?>
                        <div class="tw-rounded " >
                            <div class="tw-bg-white tw-mb-3  color_bgr_b">
                                <div class="
        tw-header-sub-interface tw-sticky tw-top-12
        md:tw-top-14
        tw-bg-white tw-p-2
        md:tw-p-3
        tw-block tw-text-base
        md:tw-text-xl
        tw-border-b
        w-max
        color_bgr h_color
      " style="z-index: 999;border-block-width: 1px;border-bottom-color: rgb(252, 208, 83);border-bottom-style: solid;">
                                    <h3 class="tw-uppercase tw-font-bold tw-text-red-600 h_color">
                                        SHOP LIÊN QUÂN MOBILE
                                    </h3>
                                </div>
                                <div class=" tw-p-2 md:tw-py-4">
                                    <div class="tw-grid tw-grid-cols-12 tw-gap-2 md:tw-gap-4">
                                        
          <!--                              <div class="-->
          <!--  tw-col-span-6-->
          <!--  sm:tw-col-span-6-->
          <!--  md:tw-col-span-3-->
          <!--  tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border-->
          <!--  md:tw-border-0 md:tw-rounded-b-->
          <!--  tw-relative color_des-->
          <!--"
                                           <a href="https://sanacc.vn/lat-hinh/" class="">
          <!--                                      <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="https://sanacc.vn/assets/img_blog/lat-bai-trung-thuong.png"></div>-->
          <!--                                      <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28  c_content_des">-->
          <!--                                          <h4 class="-->
          <!--        tw-sub-interface-title-->
          <!--        tw-uppercase-->
          <!--        tw-text-xs-->
          <!--        tw-font-semibold-->
          <!--        tw-text-gray-800-->
          <!--        tw-mb-0-->
          <!--      ">-->
          <!--                                             LẬT BÀI TRÚNG THƯỞNG-->
          <!--                                          </h4>-->
                                                 
          <!--                                          <div class="box_text_shop">-->
          <!--                                              <div style="color:red;background-color:#FFF;text-align:center;"> -->
          <!--                                                 <b> Lật bài trúng thưởng là sự kiện MIỄN PHÍ do SANACC kết hợp với "THƯ ANH NGUYỄN" tổ chức vào từ 18:00 đến 19:00 vào 04/03. Click chơi ngay!</b>-->
          <!--                                              </div>-->
          <!--                                          </div>-->

                                                    <!--<div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2 c_sale"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>-->
                                                        <!---->
                                                    <!--</div>-->
          <!--                                      </div>-->
          <!--                                  </a>-->
          <!--                              </div>-->
                                        <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative color_des
          ">
                                            <a href="/acc-lien-quan-tu-chon/" class="">
                                                <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="https://sanacc.vn/assets/images/shop-lien-quan.gif"></div>
                                                <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28  c_content_des">
                                                    <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                                        ACC LIÊN QUÂN TỰ CHỌN
                                                    </h4>
                                                    <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                                            Đã bán:
                                                            <b class="">151.800</b></span>
                                                        <!---->
                                                        <span> Số tài khoản: <b > <?= number_format($count_lq) ?></b> </span>
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

                                                    <!--<div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2 c_sale"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>-->
                                                        <!---->
                                                    <!--</div>-->
                                                </div>
                                                <div class="dpl_flex">
                                                    <span class="c_price" style="width:100%">Mua ngay</span>
                                                </div>
                                            </a>
                                        </div>
                                        
                                        <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative color_des
          ">
                                            <!----> <a href="/thu-van-may-lien-quan-9k/" class="">
                                                <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/<?= $av_lq_9['avatar']; ?>"></div>
                                                <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28  c_content_des">
                                                    <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                                        THỬ VẬN MAY LIÊN QUÂN 9.000đ
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
                                                    <!--<div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2 c_sale"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>-->
                                                        <!---->
                                                    <!--</div>-->
                                                </div>
                                                <div class="dpl_flex">
                                                    <span class="c_price" style="width:100%">Chơi luôn</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative color_des
          ">
                                            <!----> <a href="/thu-van-may-lien-quan-20k/" class="">
                                                <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/<?= $av_lq_20['avatar']; ?>"></div>
                                                <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28  c_content_des">
                                                    <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                                       THỬ VẬN MAY LIÊN QUÂN 20.000đ
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
                                                    <!--<div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2 c_sale"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>-->
                                                        <!---->
                                                    <!--</div>-->
                                                </div>
                                                <div class="dpl_flex">
                                                    <span class="c_price" style="width:100%">Chơi luôn</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative color_des
          ">
                                            <!----> <a href="/thu-van-may-lien-quan-50k/" class="">
                                                <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/<?= $av_lq_50['avatar']; ?>"></div>
                                                <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28  c_content_des">
                                                    <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                                       THỬ VẬN MAY LIÊN QUÂN 50.000đ
                                                    </h4>
                                                    <div class="
                  tw-my-1 tw-text-xs tw-text-gray-600 tw-sub-interface-info c_count_acc
                "><span>
                                                            Đã bán:
                                                            <b class="">13.300</b></span>
                                                              <span> Số tài khoản: <b style=""> <?= number_format($count_lq_20k) ?></b> </span>
                                                        <!---->
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
                                                    <!--<div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2 c_sale"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>-->
                                                        <!---->
                                                    <!--</div>-->
                                                </div>
                                                <div class="dpl_flex">
                                                    <span class="c_price" style="width:100%">Chơi luôn</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative color_des
          ">
                                            <!----> <a href="/thu-van-may-lien-quan-100k/" class="">
                                                <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/<?= $av_lq_100['avatar']; ?>"></div>
                                                <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28  c_content_des">
                                                    <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                                        THỬ VẬN MAY LIÊN QUÂN 100.000đ
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
                                                    <!--<div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2 c_sale"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>-->
                                                        <!---->
                                                    <!--</div>-->
                                                </div>
                                                <div class="dpl_flex">
                                                    <span class="c_price" style="width:100%">Chơi luôn</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative color_des
          ">
                                            <!----> <a href="/thu-van-may-lien-quan-200k/" class="">
                                                <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/<?= $av_lq_200['avatar']; ?>"></div>
                                                <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28  c_content_des">
                                                    <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                                       THỬ VẬN MAY LIÊN QUÂN 200.000đ
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
                                                    <!--<div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2 c_sale"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>-->
                                                        <!---->
                                                    <!--</div>-->
                                                </div>
                                                <div class="dpl_flex">
                                                    <span class="c_price" style="width:100%">Chơi luôn</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="
            tw-col-span-6
            sm:tw-col-span-6
            md:tw-col-span-3
            tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border
            md:tw-border-0 md:tw-rounded-b
            tw-relative color_des
          ">
                                            <!----> <a href="/thu-van-may-lien-quan-500k/" class="">
                                                <div class="tw-col-span-5"><img class="tw-w-full  lazyLoad isLoaded" src="/<?= $av_lq_500['avatar']; ?>"></div>
                                                <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28  c_content_des">
                                                    <h4 class="
                  tw-sub-interface-title
                  tw-uppercase
                  tw-text-xs
                  tw-font-semibold
                  tw-text-gray-800
                  tw-mb-0
                ">
                                                        THỬ VẬN MAY LIÊN QUÂN 500.000đ
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
                                                    <!--<div class="tw-absolute tw-bottom-2 tw-right-2 tw-left-2 tw-mt-2 c_sale"><button class="eKJDZl tw-new tw-text-xs tw-border tw-px-1.5"><span> Đang Giảm Giá 30% </span></button>-->
                                                        <!---->
                                                    <!--</div>-->
                                                </div>
                                                <div class="dpl_flex">
                                                    <span class="c_price" style="width:100%">Chơi luôn</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                           
                              
                </section>
                

<script src="/assets/js/jquery.validate.min.js"></script>
<script>

  $(document).ready(function () {
      $("#card-recharing1").validate({
          rules: {
              type: {
                  required: true
              },
              serial: {
                  required: true,
                  minlength: 6
              },
              code: {
                  required: true,
                  minlength: 6
              },
              menhgia: {
                  required:true
                  
              }
          },
          messages: {
              type: 'Bạn vui lòng chọn loại thẻ',
              serial: 'Bạn vui lòng nhập serial của thẻ',
              code: 'Bạn vui lòng nhập mã thẻ'
          },
          submitHandler: function (e) {
          $('button[type="submit"]').html("ĐANG XỬ LÝ...");
          $.post("/assets/ajax/card.php", $('#card-recharing1').serialize(), function(data) {
              $('button[type="submit"]').html("NẠP THẺ");
                swal(data.title, data.msg, data.status);
          }, "json");
              return false;
          }
      });
  });


</script>