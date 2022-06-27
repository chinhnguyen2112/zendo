<style>
    .box_img_skin {
        width: 100%;
    }

    .c_list_skin {
        display: grid;
        grid-template-columns: 15% 15% 15% 15% 15% 15%;
        grid-template-rows: auto;
        grid-gap: 17px;
    }

    .img_skin_rp {
        height: auto !IMPORTANT;
        margin: auto;
    }

    .none_page {
        display: none;
    }

    @media (min-width: 1199px) {
        img.img-responsive.thumbnail {
            width: 115px;
            height: 115px;
        }
    }

    @media (max-width: 540px) {
        .c_list_skin {
            grid-template-columns: 50% 50%;
        }
    }
</style>
<link rel="stylesheet" href="/assets/css/detail_acc.css">
<link rel="stylesheet" href="/assets/css/list_acc.css">
<?php
$id = trim(addslashes(htmlspecialchars($_GET['id'])));
// Lấy dữ liệu tài khoản
$sql_get_data = "SELECT * FROM posts WHERE id_post = '{$id}' LIMIT 1";
if ($db->num_rows($sql_get_data) < 1) {
    new Redirect($_DOMAIN); // về trang chủ
    exit;
}
$info = $db->fetch_assoc($sql_get_data, 1);
$get_info = new Info;

// check đặt cọc
$sql_get_pre = "SELECT * FROM `pre_order` WHERE id_post = '{$id}' AND `status` = '0' LIMIT 1";
$get_pre = $db->fetch_assoc($sql_get_pre, 1);

//     $check_page = $info['check_page'];
//  $sql_av = "SELECT * FROM setting_random  WHERE id ='$check_page'";
// if ($db->num_rows($sql_av)) {
//     $data_av = $db->fetch_assoc($sql_av, 1);
// }

?>

<script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css"="assets/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox-thumbs').fancybox({
            prevEffect: 'none',
            nextEffect: 'none',

            closeBtn: false,
            arrows: false,
            nextClick: true,

            helpers: {
                thumbs: {
                    width: 50,
                    height: 50
                }
            }
        });
    });
</script>

<div class="all content content-boxed">

    <div class="content account_page">
        <div class="account_detail">
            <div class="flx_center " style="margin-bottom:20px">
                <div class="w_49">
                    <div class="slideshow-container">
                        <ul>
                            <img src="/<?php echo $get_info->get_thumb($info['id_post']); ?>" style="width:100%">


                        </ul>

                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>

                </div>
                <div class="tw-col-span-12 md:tw-col-span-6 w_49">
                    <div class="
            tw-my-3
            md:tw-mb-3 md:tw-mt-0
            tw-bg-red-700 tw-text-white tw-py-1 tw-px-2  dpl_flex space_bw
          ">
                        <div class=" tw-font-bold  ">
                            Mã số: <?= $info['id_post'] ?>
                        </div>
                        <div class="
              tw-text-xs
              tw-text-red-100
              tw-relative
              tw-font-medium
            ">
                            Mục: <?= $info["type_account"] ?>
                        </div>
                    </div>
                    <div class="box-price-container">
                        <div class="box-price price-card">
                            <p class="price special"><?php echo number_format($info["price"], 0, '.', '.'); ?></p>
                            <p class="text-price">Thẻ cào</p>
                            <input type="text" name="quantity" value="1" size="2" data-min-value="1" id="input-quantity" class="form-control" style="display:none">
                            <input type="hidden" name="product_id" value="11583">
                        </div>
                        <div class="box-price price-atm">
                            <p class="price special"><?php echo number_format($info["price_atm"], 0, '.', '.'); ?></p>
                            <p class="text-price">ATM/MOMO</p>
                        </div>
                    </div>

                    <!--                  <div class="-->


                    <!--  tw-bg-red-100-->
                    <!--  tw-py-2-->
                    <!--  tw-px-2-->
                    <!--  tw-flex-->
                    <!--  tw-justify-between-->
                    <!--  tw-items-center-->
                    <!--  tw-relative-->
                    <!--" style="background-color: #1f2228">-->
                    <!--                      <div class="text_fff" >-->
                    <!--                          <div class="tw-relative tw-text-sm tw-font-semibold" style="top: 2px"><small><b class="tw-font-bold">THẺ CÀO</b></small></div> <b class="tw-text-2xl"><?php echo number_format($info["price"], 0, '.', '.'); ?><small>đ</small></b>-->
                    <!--                      </div>-->
                    <!--                      <div class="tw-text-xs tw-font-bold text_fff"><small style="font-size:19px">hoặc</small></div>-->
                    <!--                      <div class="text_fff">-->
                    <!--                          <div class="tw-relative tw-text-sm tw-font-semibold" style="top: 2px"><small><b class="tw-font-bold">ATM/MOMO</b> chỉ cần</small></div> <b class="tw-text-2xl"><?php echo number_format($info["price_atm"], 0, '.', '.'); ?><small>đ</small></b>-->
                    <!--                      </div>-->
                    <!--                  </div>-->
                    <div style="border-width:1px">
                        <!---->
                        <div class="tw-mb-3 tw-border ">
                            <div class="tw-grid tw-grid-cols-12 tw-gap-2 tw-py-1 tw-border-b text_fff">
                                <div class="tw-col-span-5"><i class="tw-relative bx bx-caret-right" style="top: 1px"></i>
                                    Tướng
                                </div>
                                <div class="tw-col-span-7 tw-font-semibold tw-capitalize"><span><?php echo number_format($info["champs_count"], 0, '.', '.'); ?></span></div>
                            </div>
                            <div class="tw-grid tw-grid-cols-12 tw-gap-2 tw-py-1 tw-border-b text_fff">
                                <div class="tw-col-span-5"><i class="tw-relative bx bx-caret-right" style="top: 1px"></i>
                                    Trang phục
                                </div>
                                <div class="tw-col-span-7 tw-font-semibold tw-capitalize"><span><?php echo number_format($info["skins_count"], 0, '.', '.'); ?></span></div>
                            </div>
                            <div class="tw-grid tw-grid-cols-12 tw-gap-2 tw-py-1 tw-border-b text_fff">
                                <div class="tw-col-span-5"><i class="tw-relative bx bx-caret-right" style="top: 1px"></i>
                                    Rank
                                </div>
                                <div class="tw-col-span-7 tw-font-semibold tw-capitalize"><span><?php echo $get_info->get_string_rank($info['rank']); ?></span></div>
                            </div>
                            <div class="tw-grid tw-grid-cols-12 tw-gap-2 tw-py-1 tw-border-b text_fff">
                                <div class="tw-col-span-5"><i class="tw-relative bx bx-caret-right" style="top: 1px"></i>
                                    Ghi chú
                                </div>
                                <div class="tw-col-span-7 tw-font-semibold tw-capitalize"><span><?php echo ($info['note']); ?></span></span></div>
                            </div>
                            <!---->
                        </div>
                        <!---->
                    </div>
                    <div class="dpl_flex" style="position:unset;flex-direction: column;">
                        <button class="
            tw-sticky
            tw-top-14
            tw-my-3
            tw-px-3
            
            tw-py-2
            tw-text-xl
            tw-text-white
            tw-font-bold
            tw-bg-red-600
            hover:tw-bg-red-500
            tw-w-full tw-z-50
            w_50w bgr_buy_now
          " onclick="alert_acc(<?php echo $id; ?>);"><span class="tw-relative tw-pl-8" style="padding-left:0px">
                                <?php if ($info["status"] == 0) {  ?>
                                    <?php if ($db->num_rows($sql_get_pre) < 1) { ?>
                                        <span class="status_1" onclick="alert_acc(<?php echo $id; ?>);">MUA NGAY</span>
                                    <?php } else { ?>
                                        <?php if ($get_pre['username'] == $data_user['username']) { ?>
                                            <span class="status_2" onclick="alert_acc(<?php echo $id; ?>);">Thanh toán <?php echo number_format(($info["price"] - $get_pre["price"]), 0, '.', '.'); ?>VNĐ Còn Thiếu</span>
                                        <?php } else { ?>
                                            <span class="status_2">Đã được đặt cọc</span>
                                    <?php }
                                    } ?>

                                <?php } else { ?>
                                    <span class="status_2">Đã bán</span>
                                <?php } ?>

                            </span></button>
                        <div class="box-button-container" style="display:flex;flex-wrap:wrap">
                            <p class="text-hot">Nạp tiền tự động qua:</p>
                        </div>
                        <div class="contact w_50w dpl_gird" style="width:100%;font-size: 20px;font-weight: 600;">
                            <a class="a_item" href="/recharge.html">
                                <div class="button-item">THẺ CÀO</div>
                            </a>
                            <a class="a_item" href="/recharge.html">
                                <div class="button-item">MOMO</div>
                            </a>
                            <a class="a_item" href="/recharge.html">
                                <div class="button-item">NGÂN HÀNG</div>
                            </a>
                        </div>
                    </div>



                </div>
            </div>



            <div class="account_menu">
                <ul class="left">
                    <li target="detail_account" target="detail_account" class="active">Chi tiết</li>
                    <li onclick="video_autobuy.pause();" target="skin_list" class="champs_c">Trang phục</li>
                    <li onclick="video_autobuy.pause();" target="champ_list" class="">Tướng</li>
                    <?php if ($info["type_account"] == 'Liên Minh Huyền Thoại'  || $info["type_account"] == 'Liên Quân Mobile' || $info["type_account"] == 'Liên Minh Huyền Thoại Hàn' || $info["type_account"] == 'Liên Minh Huyền Thoại PBE') : ?>

                    <?php endif; ?>
                    <?php if ($info["status"] == 0) : ?>
                        <!--<li onclick="video_autobuy.play();" class="div_pay_now" target="pay_now">Mua Online</li>--><?php endif; ?>

                    <li style="display: none;" target="payment">Chuyển khoản</li>
                    <div class="clear"></div>
                </ul>

            </div>
            <div class="flx_space">
                <div class="account_info">
                    <div id="detail_account" class="detail_account">
                        <!--<p>Tướng: <span><?php echo number_format($info["champs_count"], 0, '.', '.'); ?></span></p>-->
                        <!--<p>Trang phục: <span><?php echo number_format($info["skins_count"], 0, '.', '.'); ?></span></p>-->
                        <!--<p><?php echo ($info["type_account"] == 'Liên Minh Huyền Thoại ' || $info["type_account"] == 'Liên Minh Huyền Thoại Hàn') ? 'Bảng ngọc' : 'Bảng ngọc'; ?>: <span><?php echo number_format($info["ip_count"]); ?></span></p>-->
                        <!--<?php if ($info["type_account"] == 'Liên Minh Huyền Thoại' || $info["type_account"] == 'Liên Minh Huyền Thoại Hàn' || $info["type_account"] == 'Liên Minh Huyền Thoại Hàn') : ?>-->
                        <!--    <p>Khung: <span><?php echo $get_info->get_string_frame($info['frame']); ?></span></p>-->
                        <!--<?php endif; ?>-->
                        <!--<p>Rank: <span><?php echo $get_info->get_string_rank($info['rank']); ?></span></p>-->
                        <!--<p>Ghi chú: <span><?php echo ($info['note']); ?></span></p>-->
                        <p></p>
                        <?php if ($info['status'] != 1) :
                        ?>
                            <div class="album_show">
                                <?php if ($check_page < 14) {

                                ?>
                                    <img src="/<?= $data_av['avatar'] ?>" />
                                <?php } ?>



                                <?php
                                $arr_album = glob("assets/files/post/" . $id . "-*");

                                if ($arr_album) {
                                    foreach ($arr_album as $img) {
                                ?>
                                        <img src="<?php echo $img; ?>" />
                                    <?php
                                    }
                                }

                                $arr_gem = glob("/assets/files/gem/" . $id . "-*");

                                if ($arr_gem) {
                                    foreach ($arr_gem as $img) {
                                    ?>
                                        <img src="<?php echo $img; ?>" />
                                <?php
                                    }
                                }

                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div style="display: none;" id="skin_list" class="detail_account">
                        <p>Nhấn <span>Ctrl + F</span> để tìm kiếm trang phục</p>
                        <?php if ($info['type_account'] == 'Liên Quân Mobile') : ?>
                            <?php $image2 = explode("|", $info['skins']);
                            ?>
                            <ul class="hide-bullets c_list_skin">
                                <?php
                                foreach ($image2 as $row) : ?>
                                    <?php $skins1 = explode('-', $row); ?>
                                    <li class="col-xs-6 col-sm-3 box_img_skin" style="padding-left:0px;padding-right:0px">
                                        <div class="featured-article">
                                            <img class="img-responsive thumbnail img_skin_rp" src="/assets/data/8/skins/img_skill/<?= $skins1[0] ?>.png" alt="<?= $skins1[1] ?>" title="<?= $skins1[1] ?>">
                                            <div class="block-title text-center"><?= $skins1[1] ?></div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <ul class="hide-bullets">
                                <?php
                                $image2 = explode("|", $info['skins']);
                                foreach ($image2 as $row) : ?>
                                    <?php $skins1 = explode('=', $row); ?>
                                    <li class="col-xs-6 col-sm-2">
                                        <div class="featured-article">
                                            <img class="img-responsive thumbnail" src="https://acclmht.vn/assets/skins/<?= explode('-', $skins1[0])[0] ?>.jpg" alt="<?= $skins1[1] ?>" title="<?= $skins1[1] ?>">
                                            <div class="block-title text-center"><?= $skins1[1] ?></div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div style="display: none;" id="champ_list" class="detail_account">
                        <p>Nhấn <span>Ctrl + F</span> để tìm kiếm tướng</p>
                        <?php if ($info['type_account'] == 'Liên Quân Mobile') : ?>

                            <?php $image = explode("|", $info['champs']);

                            ?>

                            <ul class="hide-bullets c_list_skin">
                                <?php
                                foreach ($image as $row) : ?>
                                    <?php $champs1 = explode('-', $row); ?>
                                    <li class="col-xs-4 col-sm-2 box_img_skin" style="padding-left:0px;padding-right:0px">
                                        <div class="featured-article">
                                            <img class="img-responsive thumbnail" src="/assets/data/8/champ/<?= $champs1[0] ?>.jpg" alt="<?= $champs1[1] ?>" title="<?= $champs1[1] ?>">
                                            <div class="block-title text-center"><?= $champs1[1] ?></div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p>
                                List Tướng:
                                <?php $image = explode("|", $info['champs']);
                                foreach ($image as $row) :
                                    $champs1 = explode('-', $row);
                                    echo $champs1[1] . ', ';
                                endforeach;
                                ?>
                            </p>
                            <ul class="hide-bullets">
                                <?php
                                foreach ($image as $row) : ?>
                                    <?php $champs1 = explode('-', $row); ?>
                                    <li class="col-xs-4 col-sm-2">
                                        <div class="featured-article">
                                            <img class="img-responsive thumbnail" src="https://acclmht.vn/assets/champs/<?= $champs1[0] ?>_Web_0.jpg" alt="<?= $champs1[1] ?>" title="<?= $champs1[1] ?>">
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div style="display: none;" id="pay_now" class="detail_account">
                        <p>Giao dịch nhanh chóng, chỉ trong <span>5 giây</span> với hệ thống thanh toán tự động</p>
                        <video id="video_autobuy" style="margin-top: 20px;" width="100%" controls="">
                            <source src="<?php echo $data_site['video_guide']; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <script>
                            video_autobuy = document.getElementById("video_autobuy");
                        </script>
                    </div>
                    <div style="display: none;" id="dat_coc" class="detail_account">
                        <form id="hieucms">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <div class="form-group">
                                <label>Thời hạn đặt cọc:</label>
                                <select class="form-control days-preorder" name="days" data-id="<?php echo $id; ?>">
                                    <option value="">Số ngày</option>
                                    <option value="5">5 ngày</option>
                                    <option value="7">7 ngày</option>
                                    <option value="10">10 ngày</option>
                                    <option value="14">14 ngày</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Số tiền cần trả trước:</label>
                                <input type="text" class="form-control cost-preorder" placeholder="Số tiền" id="cost-preorder" name="hieucms">
                            </div>
                            <button type="submit" class="btn btn-default">Đặt cọc</button>
                        </form>
                        <hr />
                        <p class="content-mini content-mini-full bg-info text-white">
                            <b>Lưu ý:</b> Nếu quá hạn mà vẫn chưa thanh toán sẽ bị hủy cọc. Sau khi đặt cọc, bạn chỉ cần thanh toán số còn lại là nhận được tài khoản.<br />Ví Dụ: Khi bạn đặt cọc 20%, trong thời hạn bạn thanh toán thêm 80% là đủ.
                        </p>

                    </div>

                    <div style="display: none;" id="account_information" class="detail_account">
                    </div>
                </div>

                <div class="right_bar" style="padding-left: 0px;">
                    <h4 style="margin-top:0px">Liên hệ mua tài khoản</h4>
                    <div class="contact">
                        <ul>
                            <li onclick="window.open('https://www.messenger.com/t/109873108267713')" style="width:100%;margin-bottom:10px;"><i class="fa fa-facebook-square" aria-hidden="true"></i> Inbox Fanpage</li>
                            <li style="width:100%;"><i class="fa fa-phone-square" aria-hidden="true"></i> 0328.395.635</li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                    <h4>Có thể bạn đang tìm</h4>
                    <div style="width: 100%;margin-top:0;" class="list_account">
                        <?php
                        $sql_get_list_acc = "SELECT * FROM posts WHERE status ='0' AND `type_account` = '" . $info["type_account"] . "' ORDER BY RAND() DESC LIMIT 5";
                        if ($db->num_rows($sql_get_list_acc)) {
                            foreach ($db->fetch_assoc($sql_get_list_acc, 0) as $key => $data_post) {
                        ?>
                                <ul>


                                    <li style="width: 100%;margin-right:0;float:none;">
                                        <div class="flip-container">

                                            <div class="flipper">
                                                <div class="front"><a href="/tai-khoan-<?php echo $data_post['id_post']; ?>.html" titel="xem chi tiết acc ">
                                                        <div class="account_image">
                                                            <?php if ($check_page < 14) { ?>
                                                                <img src="/<?= $data_av['avatar'] ?>" />
                                                            <?php } else { ?>


                                                                <img src="<?php echo $get_info->get_thumb($data_post['id_post']); ?>" />
                                                            <?php } ?>
                                                        </div>
                                                        <span class="ms">MS:&nbsp <?php echo $data_post['id_post']; ?></span>
                                                        <!--<div class="account_id">-->
                                                        <!--    <div class="left">MS: <?php echo $data_post['id_post']; ?></div>-->
                                                        <!--    <div class="right"><?php echo date('d-m-Y', strtotime($data_post['date_posted'])); ?></div>-->
                                                        <!--    <div class="clear"></div>-->
                                                        <!--</div>-->
                                                        <div class="account_info">
                                                            <ul>
                                                                <li class="li_ac"><?php echo $data_post['champs_count']; ?> tướng</li>
                                                                <li class="li_ac"><?php echo $data_post['skins_count']; ?> trang phục</li>
                                                                <li class="li_ac">Rank <?php echo $get_info->get_string_rank($data_post['rank']); ?></li>
                                                                <li class="li_ac">Ngọc <?php echo $data_post['ip_count']; ?> </li>
                                                            </ul>


                                                            <div class="account_icon">
                                                                <img src="<?php echo $get_info->get_icon_rank($data_post['rank']); ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="dpl_flex">
                                                            <span class="c_price"><?php echo number_format($data_post["price"], 0, '.', '.'); ?>đ</span>
                                                            <span class="link_ct">Xem chi tiết</span>
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                            <?php
                            }
                        } // end show acc
                            ?>
                                </ul>
                                <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>


            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.days-preorder').change(function(e) {
            e.preventDefault();

            if ($(this).val() == '') {
                $('input[name=hieucms]').val('');
            }

            $.getJSON('/assets/ajax/GetCostPreOrder.php', {
                id: $(this).attr('data-id'),
                days: $(this).val()
            }, function(res) {
                if (res.cost) {
                    $('input[name=hieucms]').val(res.cost);
                } else {
                    swal("Có lỗi xảy ra!", "Không thể lấy dữ liệu");
                }
            });

        });

        $("#hieucms").validate({
            rules: {
                days: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
            },
            messages: {
                days: 'Bạn vui lòng chọn số ngày đặt cọc'
            },
            submitHandler: function(e) {

                if (!$('#hieucms').hasClass('isPosting')) {

                    $('#hieucms').addClass('isPosting');
                    $('#hieucms button[type="submit"]').text('Đang đặt cọc...');

                    $.post('/assets/ajax/PreOrderAcc.php', $('#hieucms').serialize(), function(res) {
                        if (res.error == 1) {
                            swal("Thành công!", res.message, "success");
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        } else {
                            swal("Thất bại", res.message, "error");
                        }

                    }, "json").complete(function() {
                        $('#anthien').removeClass('isPosting');
                        $('#anthien button[type="submit"]').text('ĐẶT CỌC');
                    });

                }

                return false;
            }
        });

        $(".account_menu ul.left li").click(function() {
            $(".account_menu ul.left li").removeClass("active");
            $(this).addClass("active");
            target = $(this).attr("target");
            $(".account_info .detail_account").hide()
            $("#" + target).show();
        });
    });


    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];

    function strtonum(num) {
        return parseInt(num, 10);
    }

    mini_des_more = 4;

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                this_url = e.target.result;
                $("#public_image_" + get_target).hide();
                $("#image_preview_" + get_target + " img").attr("src", this_url);
                $("#image_preview_" + get_target).show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function format_price(div) {
        x = $(div).val();
        x = x.replace(/\./g, '');
        num = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        $(div).val(num);
    }

    function alert_acc(id) {
        swal({
            title: "Tài Khoản Số #" + id,
            text: "Bạn có chắc chắn muốn mua tài khoản này ?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Có",
            cancelButtonText: "Không",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function() {
            $.post("/assets/ajax/check_buy.php", {
                id: id
            }, function(data) {
                if (data.status == "success") {
                    swal(data.title, data.message, data.status);
                    setTimeout(function() {
                        window.location.href = "/transaction.html";
                    }, 3000);
                } else {
                    swal({
                        title: "Có lỗi xảy ra",
                        type: "error",
                        text: data.message
                    }, function() {
                        window.location = data.link;
                    });
                }
            }, "json");
        });
    }
</script>