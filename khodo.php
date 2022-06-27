<?php
$title = "Kho đồ";
// Require database & thong tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
$id = $data_user['id'];

// check đăng nhập
if ($id == "") {
    new Redirect('/dang-nhap/');
}

// lấy database từ lịch sử quay
$sql = "SELECT history_gift.*, gift.name, gift.image, gift.type_item, gift.zen, gift.des, gift.value_use, COUNT(*) as count_item
FROM history_gift
INNER JOIN gift
ON history_gift.id_gift=gift.id
WHERE id_user = '$id' AND gift.type_item != 0 AND gift.type_item != 5 AND gift.type_item != 12 AND history_gift.type = 0 GROUP BY  type_item";
$count = $db->fetch_assoc($sql, 0);

// count số lượng quân huy
$sql_count = "SELECT SUM(value) as val_item
FROM history_gift
INNER JOIN gift
ON history_gift.id_gift=gift.id
WHERE id_user = '$id' AND gift.type_item = 1  GROUP BY  type_item";
$count_1 = $db->fetch_assoc($sql_count, 1);

// lấy số lượng quân huy rút hoặc bán từ bảng history vật phẩm
$sql_vp = "SELECT SUM(history_vp.count) as count_vp
FROM history_vp
INNER JOIN gift
ON history_vp.id_item=gift.id
WHERE id_user = '$id' AND gift.type_item = 1  GROUP BY  type_item";
$count_vp = $db->fetch_assoc($sql_vp, 1);


// trừ số lượng rút hoặc bán quân huy
foreach ($count as $key => $val) {
    if ($val['type_item'] == 1 && ($count_1['val_item'] - $count_vp['count_vp']) <= 0) {
        array_splice($count, $key, 1);
    }
}


?>
<link rel="stylesheet" href="/assets/css/sanacc/khodo.css?v=<?= time() ?>">
<div id="items_bag">
    <div class="items_bag">
        <h2>KHO VẬT PHẨM</h2>

        <div class="list_game_bag">
            <div class="game_bag_container">
                <div class="lq_bag game_bag ml16">
                    <img src="/images/sanacc/khodo/lq_img_small.png" alt="game_icon">
                    <div class="name_game_bag">
                        <p>LIÊN QUÂN MOBILE </p>
                        <span>[<?= count($count); ?>]</span>
                    </div>
                </div>
                <div class="lm_bag game_bag" onclick="$('.popup_no_click').show();">
                    <img src="/images/sanacc/khodo/lm_img_small.png" alt="game_icon">
                    <div class="name_game_bag">
                        <p>LIÊN MINH HUYỀN THOẠI</p>
                        <span>[0]</span>
                    </div>
                </div>
                <div class="ffire_bag game_bag" onclick="$('.popup_no_click').show();">
                    <img src="/images/sanacc/khodo/ffire_img_small.png" alt="game_icon">
                    <div class="name_game_bag">
                        <p>FREE FIRE</p>
                        <span>[0]</span>
                    </div>
                </div>
                <div class="pubg_bag game_bag" onclick="$('.popup_no_click').show();">
                    <img src="/images/sanacc/khodo/pubg_img_small.png" alt="game_icon">
                    <div class="name_game_bag">
                        <p>PUBG MOBILE</p>
                        <span>[0]</span>
                    </div>
                </div>
                <div class="fifa_bag game_bag" onclick="$('.popup_no_click').show();">
                    <img src="/images/sanacc/logo_fifa.png" alt="game_icon">
                    <div class="name_game_bag">
                        <p>FIFA ONLINE 4</p>
                        <span>[0]</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_items_bag">
            <img src="/images/sanacc/khodo/lq_img.png" alt="game_icon">

            <div class="search_item">
                <p>Tìm kiếm một vật phẩm cụ thể</p>
                <div class="search_item_input">
                    <div onclick="search_item()" class="search_item_img">
                        <img src="/images/sanacc/cayrank/icon_search.svg" alt="search_icon">
                    </div>
                    <input class="inp_search_item" type="text" name="" placeholder="Gõ tên vật phẩm bạn muốn tìm..." id="search_item">
                </div>
            </div>

            <div class="box_items_bag">
                <div class="list_items_container">
                    <div class="list_items_bag">
                        <p class="not_item" style="display: none;">Không có vật phẩm nào</p>
                        <?php foreach ($count as $key => $val) {
                            if ($val['count_item'] > 0) { ?>
                                <div onclick="click_img(this)" class="item_bag <?php if ($key == 0) {
                                                                                    echo 'border_item';
                                                                                } ?>" data-type="<?= $val['type_item'] ?>" data-zen="<?= $val['zen'] ?>" data-des="<?= $val['des'] ?>" data-value_use="<?= $val['value_use'] ?>" data-count="<?= $val['count_item'] ?> " data-count_qh="<?= $count_1['val_item'] ?> ">
                                    <span class="quantity" data-count="<?php if ($val['count_item'] > 0) {
                                                                            if ($val['type_item'] == 1) {
                                                                                echo ($count_1['val_item'] - $count_vp['count_vp']);
                                                                            } else {
                                                                                echo $val['count_item'];
                                                                            }
                                                                        } ?>"><?php if ($val['count_item'] > 1) {
                                                                                    if ($val['type_item'] == 1) {
                                                                                        echo ($count_1['val_item'] - $count_vp['count_vp']);
                                                                                    } else {
                                                                                        echo $val['count_item'];
                                                                                    }
                                                                                }
                                                                                if ($val['count_item'] == 1 && $val['type_item'] == 1) {
                                                                                    echo (($count_1['val_item'] - $count_vp['count_vp']) == 1) ? "" : $count_1['val_item'] - $count_vp['count_vp'];
                                                                                }
                                                                                ?></span>
                                    <img class="img_item" data-name="<?= $val['name'] ?>" data-id="<?= $val['id_gift'] ?>" src="/<?= $val['image'] ?>" alt="item_img">
                                </div>
                        <?php   }
                        } ?>
                    </div>
                </div>

                <div class="des_item des_none">
                    <?php if (isset($data_user['username'])) { ?>
                        <div class="img_des_item">
                            <img class="des_img_item" src="/<?php if(count($count) > 0) {
                                echo $count[0]['image'];
                            }else {
                                echo 'images/sanacc/khodo/lq_img.png';
                            } ?>" alt="item_img">
                        </div>

                        <span class="item_name"><?php if ($count[0]['type_item'] == 1) {
                                                    echo ($count_1['val_item'] - $count_vp['count_vp']) . ' quân huy';
                                                } else {
                                                    echo $count[0]['name'];
                                                } ?></span>

                        <div class="level_item">
                            <img src="/images/sanacc/khodo/lq_img_small.png" alt="game_icon">

                            <div class="text_level_item">
                                <p>Liên Quân Mobile</p>
                                <span class="type_item"></span>
                            </div>
                        </div>

                        <div class="text_des_item">
                            <p class="des"><?php echo $count[0]['des']; ?></p>

                        </div>

                        <div class="send_item" style="<?php if(count($count) <= 0) {
                            echo 'display: none;';
                        }else {
                            echo '';
                        } ?>">
                            <p class="sell_item_btn">BÁN (<span class="zen_item"><?php echo number_format($count[0]['zen']); ?></span> Zen)</p>
                            <p class="send_item_btn">RÚT VẬT PHẨM</p>
                        </div>

                    <?php } ?>


                </div>

            </div>

        </div>

    </div>
</div>

<div class="des_items_popup des_popup_none">
    <div class="des_item">
        <div class="close_des_popup">
            <img src="/images/sanacc/khodo/close-circle.svg" alt="close-btn">
        </div>
        <div class="img_des_item">
            <img class="des_img_item" src="/<?php echo $count[0]['image']; ?>" alt="item_img">
        </div>

        <span class="item_name_popup"><?php echo $count[0]['name']; ?></span>
        <div class="level_item">
            <img src="/images/sanacc/khodo/lq_img_small.png" alt="game_icon">

            <div class="text_level_item">
                <p>Liên Quân Mobile</p>
            </div>
        </div>

        <div class="text_des_item">
            <p class="des"></p>

        </div>

        <div class="send_item">
            <p class="sell_item_btn">BÁN (<span class="zen_item"><?php echo number_format($count[0]['zen']); ?></span>
                Zen)</p>
            <p class="send_item_btn">RÚT VẬT PHẨM</p>
        </div>


    </div>

</div>

<!-- popup thong bao chung -->
<div class=" popup_notice_chung popup_lienhe popup_notice_none">
    <div class="content_popup">
        <div class="title_popup">THÀNH CÔNG</div>
        <div class="body_pupup">
            <p>Bây giờ bạn hãy liên hệ fanpage để cập nhật về đơn hàng</p>
        </div>
        <div class="close_popup_gt">
            <a href="https://www.facebook.com/Zendoshopvn/">LIÊN HỆ FANPAGE</a>
            <p class="close_notice_btn close_popup_lienhe">ĐÓNG LẠI</p>
        </div>
    </div>
</div>

<div class="popup_notice_chung popup_sell_item popup_notice_none">
    <div class="content_popup">
        <div class="title_popup">BÁN VẬT PHẨM</div>
        <div class="body_pupup">
            <p>Nhập số lượng mà bạn muốn bán</p>
            <div class="buttons_added">
                <input class="minus is-form" type="button" value="-">
                <input aria-label="quantity" class="input-qty input_qty_ban" max="999" min="1" name="" type="number" value="1">
                <input class="plus is-form" type="button" value="+">
            </div>
        </div>
        <div class="close_popup_gt">
            <p class="confirm_notice_btn confirm_sell_item">BÁN</p>
            <p class="close_notice_btn close_popup_sell">ĐÓNG</p>
        </div>
    </div>
</div>

<div class="popup_notice_chung popup_count_amount popup_notice_none">
    <div class="content_popup">
        <div class="title_popup">THẤT BẠI</div>
        <div class="body_pupup">
            <p>Số lượng vật phẩm không không phù hợp!</p>
        </div>
        <div class="close_popup_gt">
            <p class="close_notice_btn close_count_amount">ĐÓNG</p>
        </div>
    </div>
</div>

<div class="popup_notice_chung popup_disable_item popup_notice_none">
    <div class="content_popup">
        <div class="title_popup">THẤT BẠI</div>
        <div class="body_pupup">
            <p>Vật phẩm này không thể rút!</p>
        </div>
        <div class="close_popup_gt">
            <p class="close_notice_btn close_disable_item">ĐÓNG</p>
        </div>
    </div>
</div>

<div class="popup_notice_chung popup_rut_vp popup_notice_none">
    <div class="content_popup">
        <div class="title_popup">RÚT VẬT PHẨM</div>
        <div class="body_pupup">
            <p>Nhập số lượng mà bạn muốn rút</p>
            <p class="notice_value_use"></p>
            <div class="buttons_added">
                <input class="minus is-form" type="button" value="-">
                <input aria-label="quantity" class="input-qty input_qty_rut" max="999" min="1" name="" type="number" value="1">
                <input class="plus is-form" type="button" value="+">
            </div>
        </div>
        <div class="close_popup_gt">
            <p class="confirm_notice_btn confirm_rut_vp">RÚT</p>
            <p class="close_notice_btn close_rut_vp">ĐÓNG</p>
        </div>
    </div>
</div>

<?php
// Require footer
require_once 'includes/footer.php';
?>

<script src="https://zendo.vn/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
<script src="/assets/js/jquery-ui.min.js"></script>

<script>
    // dong popup des
    $('.close_des_popup').click(function() {
        $('.des_items_popup').removeClass('des_popup_open')
        $('.des_items_popup').addClass('des_popup_none')
    });

    // dong popup lienhe
    $('.close_popup_lienhe').click(function() {
        $('.popup_lienhe').removeClass('popup_notice_open')
        $('.popup_lienhe').addClass('popup_notice_none')
    });

    // dong popup ban vat pham
    $('.close_popup_sell').click(function() {
        $('.popup_sell_item').removeClass('popup_notice_open')
        $('.popup_sell_item').addClass('popup_notice_none')
    });

    // dong pup rut vat pham
    $('.close_rut_vp').click(function() {
        $('.popup_rut_vp').removeClass('popup_notice_open')
        $('.popup_rut_vp').addClass('popup_notice_none')
    });
    // dong popup thong bao khong the rut vat pham
    $('.close_disable_item').click(function() {
        $('.popup_disable_item').removeClass('popup_notice_open')
        $('.popup_disable_item').addClass('popup_notice_none')
    });

    // dong popup thong bao khong du so luong de rut vat pham
    $('.close_count_amount').click(function() {
        $('.popup_count_amount').removeClass('popup_notice_open')
        $('.popup_count_amount').addClass('popup_notice_none')
    });


    // lay thuoc tinh src cua anh
    var type_item = "";

    function click_img(e) {
        $('.border_item').removeClass('border_item')
        $(e).addClass('border_item')
        $('.des_items_popup').removeClass('des_popup_none')
        $('.des_items_popup').addClass('des_popup_open')
        var src_img_item = $(e).find('.img_item').attr('src')
        var item_name = $(e).find('.img_item').data('name');
        type_item = $(e).data('type')
        var count_item = $(e).find('.quantity').text();
        var count_qh = '<?php echo $count_1['val_item'] - $count_vp['count_vp'] ?>'
        $('.des_img_item').attr('src', src_img_item)
        if (type_item == 1) {
            $('.item_name').text(count_qh + ' quân huy')
            $('.item_name_popup').text(count_qh + ' quân huy')
        } else {
            $('.item_name').text(item_name)
            $('.item_name_popup').text(item_name)
        }
        if (count_item != 0) {
            $('.count_item').text(count_item)

        } else {
            $('.count_item').text('x1')
        }

        var zen = $(e).data('zen');
        var des_item = $(e).data('des');
        console.log(des_item)
        $('.zen_item').text(zen.toLocaleString('en-US'));
        $('.des').text(des_item);
    }

    // chuc nang tim kiem
    function search_item() {
        var data = new FormData();
        data.append('name', $('#search_item').val());
        data.append('type', 1);
        $.ajax({
            type: 'post',
            url: '/assets/ajax/khodo.php',
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            data: data,

            success: function(feedback) {
                if (feedback.status == 1) {
                    $('.list_items_bag').html(feedback.html);
                    $('.des_img_item').attr('src', '/' + feedback.image);
                    if (feedback.type_item == 1) {
                        $('.item_name').text(feedback.qhuy + ' quân huy')
                    } else {
                        $('.item_name').text(feedback.name);
                    }
                    $('.des').text(feedback.des);
                    $('.zen_item').text(feedback.zen);
                    $('.send_item').show();
                }else {
                    $('.list_items_bag').html('');
                    $('.des_img_item').attr('src', '/images/sanacc/khodo/lq_img.png');
                    $('.des').text('');
                    $('.zen_item').text('');
                    $('.item_name').text('');
                    $('.send_item').hide();
                }
            }
        });
    }

    // thay đổi sự kiện click bằng enter cho chức năng tìm kiếm
    $('.inp_search_item').keypress(function(event) {
        if (event.keyCode == 13 || event.which == 13) {
            search_item()
        }
    });

    // gui du lieu len database

    $('.send_item_btn').click(function() {

        var count_item = $('.border_item').find('.quantity').data('count');
        var value_use = $('.border_item').data('value_use')
        if (value_use > 1) {
            $('.notice_value_use').text('(Số lượng vật phẩm rút phải chia hết cho ' + value_use + ')')
        } else {
            $('.notice_value_use').text('(Bạn có thể rút số lượng tùy thích)')
        }
        if (value_use > 50) {
            $('.popup_disable_item').removeClass('popup_notice_none')
            $('.popup_disable_item').addClass('popup_notice_open')
        } else {
            if (count_item >= value_use) {
                $('.popup_rut_vp').removeClass('popup_notice_none')
                $('.popup_rut_vp').addClass('popup_notice_open')
            } else {

                $('.popup_count_amount').removeClass('popup_notice_none')
                $('.popup_count_amount').addClass('popup_notice_open')
            }
        }

    });

    $('.confirm_rut_vp').click(function() {
        $('.popup_rut_vp').removeClass('popup_notice_open')
        $('.popup_rut_vp').addClass('popup_notice_none')
        var data = new FormData();
        var id_item = $('.border_item').find('.img_item').data('id');
        var count_item = $('.border_item').find('.quantity').data('count');
        var value_use = $('.border_item').data('value_use');
        var type_item = $('.border_item').data('type');
        var qty = $('.input_qty_rut').val();
        var boi_so = qty % value_use;
        console.log(boi_so)

        if (qty > count_item) {
            $('.popup_count_amount').removeClass('popup_notice_none')
            $('.popup_count_amount').addClass('popup_notice_open')
        } else {

            if (boi_so == 0) {
                data.append('id_item', id_item);
                data.append('name', name);
                data.append('count_item', count_item);
                data.append('value_use', value_use);
                data.append('id', $('.border_item').find('.img_item').data('id'));
                data.append('type_item', type_item);
                data.append('qty', qty);
                data.append('type', 2);
                console.log(qty);
                $.ajax({
                    type: 'post',
                    url: '/assets/ajax/khodo.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    data: data,

                    success: function(feedback) {
                        if (feedback.status == 0) {
                            alert(feedback.mess)
                        } else {
                            $('.border_item').find('.quantity').text(feedback.last_count)
                            $('.popup_lienhe').removeClass('popup_notice_none')
                            $('.popup_lienhe').addClass('popup_notice_open')
                            $('.des_items_popup').removeClass('des_popup_open')
                            $('.des_items_popup').addClass('des_popup_none')
                            // $('.close_popup_lienhe').click(function() {
                            //     window.location.reload()
                            // });
                        }
                    }
                });
            } else {
                $('.popup_count_amount').removeClass('popup_notice_none')
                $('.popup_count_amount').addClass('popup_notice_open')
            }
        }
    })

    // ban vat pham
    $('.sell_item_btn').click(function() {
        $('.popup_sell_item').removeClass('popup_notice_none')
        $('.popup_sell_item').addClass('popup_notice_open')
    });

    $('.confirm_sell_item').click(function() {
        var count_item = parseInt($('.border_item').find('.quantity').text());
        var qty = $('.input_qty_ban').val();
        var data = new FormData();
        var zen = $('.border_item').data('zen');
        var type_item = $('.border_item').data('type');
        var count_qh = $('.border_item').data('val_item');
        // var count_item = $('.border_item').find('.quantity').text();
        // var qty = $('.input_qty_ban').val();
        data.append('zen', zen);
        data.append('qty', qty);
        data.append('type_item', type_item); 
        data.append('count_item', count_item);  
        data.append('count_qh', count_qh);
        data.append('type', 3);
        data.append('id', $('.border_item').find('.img_item').data('id'));

        $.ajax({
            type: 'post',
            url: '/assets/ajax/khodo.php',
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            data: data,

            success: function(feedback) {
                if (feedback.status == 0) {
                    $('.popup_count_amount').removeClass('popup_notice_none')
                    $('.popup_count_amount').addClass('popup_notice_open')
                } else {
                    $('.popup_sell_item').removeClass('popup_notice_open')
                    $('.popup_sell_item').addClass('popup_notice_none')
                    $('.border_item').find('.quantity').text(feedback.last_count)
                    $('.total_zen').text('Zen: ' + feedback.zen)
                    if (feedback.last_count <= 0) {
                        $('.border_item').removeClass('open_item')
                        $('.border_item').addClass('none_item')
                    } else {
                        $('.border_item').removeClass('none_item')
                        $('.border_item').addClass('open_item')
                    }
                }
            }
        });
    })

    // js input tang giam so luong
    $('input.input-qty').each(function() {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function() {
            if ($(this).hasClass('minus')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
    })
</script>