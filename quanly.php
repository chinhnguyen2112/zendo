<?php
$title = "Quản lý tài khoản";
// Require database & thông tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
// Danh sach account

if ($user) {
    
} else {
    new Redirect($_DOMAIN); // Trở về trang index
}
$user_name = $data_user['username'];
$id_user = $data_user['id'];
$sql = "SELECT count(*) FROM history_buy WHERE username LIKE '$user_name'";
$count = $db->fetch_row($sql);

$sql_cart = "SELECT * FROM giohang WHERE id_user = '$id_user'";
$row = $db->num_rows($sql_cart);


?>
<link rel="stylesheet" href="/assets/css/sanacc/css_quanly.css">

<div id="main">
    <div class="content">
        <!-- banner -->
        <div class="banner">
            <div class="slider">
                <img src="/images/sanacc/quanly/slider.png" alt="slider-img">
            </div>

            <div class="header-content">
                <div class="simple-info">
                    <img class="avt_main" src="<?php if (isset($data_user['avatar']) && $data_user['avatar'] !== "") {
                                                    echo '/' . $data_user['avatar'];
                                                } else {
                                                    echo '/images/sanacc/quanly/avt1.png';
                                                }
                                                ?>" alt="avt1">
                    <div class="text">
                        <h2> <?php echo $data_user['name']; ?> </h2>

                        <p>
                            <?php
                            if ($data_user['email'] != "") {
                                echo $data_user['email'];
                            } else {
                                echo 'Chưa cập nhật';
                            }
                            ?>
                        </p>

                        <div class="money">
                            <img src="/images/sanacc/quanly/coin.svg" alt="coin">
                            <p> Số dư: <span> <?php echo number_format($data_user['cash']); ?>đ </span></p>
                        </div>
                        <div class="money">
                            <img src="/assets/img_gift/coins 1.png" alt="Zen">
                            <p> Số dư: <span> <?php echo number_format($data_user['zen']); ?> Zen </span></p>
                        </div>
                    </div>
                </div>

                <div class="amount-buy">
                    <div class="bought">
                        <p><?php echo $count ?></p>
                        <span>Đã mua</span>
                    </div>
                    <div onclick="window.location.href = '/gio-hang/';" class="cart" style="cursor: pointer;">
                        <p><?php echo $row ?></p>
                        <span>Giỏ hàng</span>
                    </div>

                </div>
            </div>
        </div>

        <!-- main-content -->
        <div class="main-content">

            <!-- main info -->
            <div class="box-title">
                <div class="title">
                    <li class="title-li hien active-info-box">
                        <img class="dot-green appear" src="/images/sanacc/quanly/dot-green.svg" alt="dot-green">
                        <span>Thông tin cơ bản</span>
                    </li>

                    <!-- <li class="title-li hien active-history-spin none-on-mobile">
                        <img class="dot-green" src="/images/sanacc/quanly/dot-green.svg" alt="dot-green">
                        <span>Lịch sử chơi game</span>
                    </li> -->

                    <!-- <li class="title-li hien none-on-mobile">
                        <img class="dot-green" src="/images/sanacc/quanly/dot-green.svg" alt="dot-green">
                        <span>Rút vật phẩm</span>
                    </li> -->

                    <li class="title-li none-on-respon">
                        <img class="dot-green" src="/images/sanacc/quanly/dot-green.svg" alt="dot-green">
                        <a href="https://zendo.vn/nap-the/" target="_blank">Nạp thẻ</a>
                    </li>

                    <li class="title-li active-change-pass none-on-respon">
                        <img class="dot-green" src="/images/sanacc/quanly/dot-green.svg" alt="dot-green">
                        <span>Đổi mật khẩu</span>
                    </li>

                    <li class="title-li none-on-respon">
                        <img class="dot-green" src="/images/sanacc/quanly/dot-green.svg" alt="dot-green">
                        <a href="https://zendo.vn/kho-do/" target="_blank">Kho đồ</a>
                    </li>

                    <li class="title-li active-code none-on-respon">
                        <img class="dot-green" src="/images/sanacc/quanly/dot-green.svg" alt="dot-green">
                        <span>Mã giới thiệu</span>
                    </li>

                    <!-- <li class="li-btn arrow_left">
                        <span>
                            < </span>
                    </li>

                    <li class="li-btn arrow_right">
                        <span>></span>
                    </li> -->

                    <span class="a-arrow-down">
                        <img src="/images/sanacc/quanly/arrow-down.svg" alt="arrow-down">
                    </span>

                </div>

                <!-- menu li -->
                <div class="menu-li">
                    <select name="" id="" onchange="" class="menu-select">
                        <option value="1">Thông tin cơ bản</option>
                        <!-- <option value="2">Lịch sử chơi game</option>
                        <option value="3">Rút thưởng</option> -->
                        <option value="4">Nạp thẻ</option>
                        <option value="5">Đối mật khẩu</option>
                        <option value="6">Kho đồ</option>
                        <option value="7">Mã giới thiệu</option>
                    </select>
                </div>
            </div>

            <!-- body info -->
            <div class="body-info active">
                <form id="update_info" enctype="multipart/form-data">
                    <div class="box-info">
                        <div class="box-left">
                            <div class="row">
                                <label for="">
                                    <p>HỌ VÀ TÊN</p>
                                </label>
                                <input type="text" name="fullname" id="fullname" placeholder="Tên của bạn" value="<?php echo $data_user['name']; ?>">
                            </div>

                            <div class="row">
                                <label for="">
                                    <p>TÊN TÀI KHOẢN</p>
                                </label>
                                <input type="text" name="" placeholder="Tên tài khoản" disabled id="" value="<?php echo $data_user['username']; ?>">
                            </div>

                            <div class="row-special">
                                <label for="">
                                    <p>GIỚI TÍNH</p>
                                </label>
                                <div class="choose-sex">
                                    <div class="male">
                                        <input type="checkbox" class="check_gt" data-id="1" name="sex" <?php
                                                                                                        if ($data_user['sex'] == 1) {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                                        <p>Nam</p>
                                    </div>

                                    <div class="female">
                                        <input type="checkbox" class="check_gt" data-id="2" name="sex" <?php
                                                                                                        if ($data_user['sex'] == 2) {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                                        <p>Nữ</p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="" id="sex" value="<?php echo $data_user['sex'] ?>">


                            <div class="row">
                                <label for="">
                                    <p>EMAIL</p>
                                </label>
                                <input type="email" name="email" id="email" placeholder="Email của bạn" value="<?php
                                                                                                                if ($data_user['email'] != "") {
                                                                                                                    echo $data_user['email'];
                                                                                                                }
                                                                                                                ?>">
                            </div>

                            <div class="row">
                                <label for="">
                                    <p>SỐ ĐIỆN THOẠI</p>
                                </label>
                                <input type="text" name="phonenumber" id="phonenumber" placeholder="Số điện thoại của bạn" value="<?php
                                                                                                                                    if ($data_user['phone'] != null) {
                                                                                                                                        echo $data_user['phone'];
                                                                                                                                    } ?>">
                            </div>

                            <div class="row">
                                <label for="">
                                    <p>NGÀY SINH</p>
                                </label>
                                <input type="date" name="birthday" id="birthday" placeholder="Ngày sinh của bạn" value="<?php
                                                                                                                        if ($data_user['birthday'] != "") {
                                                                                                                            echo date('Y-m-d', $data_user['birthday']);
                                                                                                                        } ?>">
                            </div>

                            <div class="row ">
                                <label for="">
                                    <p>ĐỊA CHỈ</p>
                                </label>
                                <input type="text" name="address" id="address" placeholder="Địa chỉ của bạn" value="<?php
                                                                                                                    if ($data_user['address'] != "") {
                                                                                                                        echo $data_user['address'];
                                                                                                                    } ?>">
                            </div>

                        </div>

                        <div class="box-right">
                            <div class="avatar">
                                <div class="avatar-img">
                                    <h3>ẢNH ĐẠI DIỆN</h3>
                                    <img src="<?php if (isset($data_user['avatar']) && $data_user['avatar'] !== "") {
                                                    echo '/' . $data_user['avatar'];
                                                } else {
                                                    echo '/images/sanacc/quanly/avt2.png';
                                                }
                                                ?>" class="img_avt" alt="avt2">
                                </div>
                                <div class="text-avatar">
                                    <p class="upload_btn">
                                        Đăng tải ảnh đại diện của bạn
                                    </p>
                                    <input onchange="preview_image(event,this)" type="file" name="avatar" id="avatar" hidden>
                                    <span>Tải lên ảnh từ thiết bị của bạn. Ảnh nên cắt thành hình vuông, kích thước ít nhất 184px x 184px.</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="last-row">
                        <div class="last-btn">
                            <!-- <button class="cancel-btn">Hủy bỏ</button> -->
                            <button class="save-btn">Lưu</button>
                        </div>
                    </div>

                </form>
            </div>

            <!-- spin history -->
            <div class="spin-history-box">
                <div class="spin-history-container">
                    <table>
                        <tr class="head-table">
                            <td class="stt">
                                <p>#</p>
                            </td>
                            <td>
                                <p>LOẠI VÒNG QUAY</p>
                            </td>
                            <td>
                                <p>GIẢI THƯỞNG</p>
                            </td>
                            <td>
                                <p>THỜI GIAN QUAY</p>
                            </td>
                        </tr>

                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                        ?>

                            <tr class="body-table">
                                <td class="stt">
                                    <p>1</p>
                                </td>
                                <td>
                                    <p class="green">VÒNG QUAY CÔNG NGHỆ</p>
                                </td>
                                <td>
                                    <p class="green">9999 QUÂN HUY</p>
                                </td>
                                <td>
                                    <p>00:00:00 31/03/2022</p>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>

                </div>
            </div>

            <!-- change pass page -->

            <div class="box_change_pass">
                <div class="change_pass_container">
                    <form id="change_pass">
                        <div class="row_change_pass">
                            <label for="">
                                <p>MẬT KHẨU CŨ</p>
                            </label>

                            <input type="password" name="old_pass" id="old_pass" value="">
                        </div>

                        <div class="row_change_pass">
                            <label for="">
                                <p>MẬT KHẨU MỚI</p>
                            </label>

                            <input type="password" id="new_pass" name="new_pass" value="">
                        </div>

                        <div class="row_change_pass">
                            <label for="">
                                <p>XÁC NHẬN MẬT KHẨU MỚI</p>
                            </label>

                            <input type="password" name="re_pass" value="">

                        </div>

                        <div class="change_pass_btn">
                            <div class="last-btn">
                                <!-- <button class="cancel-btn">Hủy bỏ</button> -->
                                <button class="save-btn">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- mã giới thiệu-->

            <div class="box_code">
                <div class="change_pass_container">
                    <form id="inp_code_gt">
                        <div class="row_change_pass">
                            <label for="">
                                <span class="span_code">Mã giới thiệu của bạn: </span><span class=" span_code span_text_code"><?php echo $data_user['username']; ?></span>
                            </label>


                        </div>

                        <div class="row_change_pass">
                            <label for="">
                                <p>Nhập nhã giới thiệu</p>
                            </label>

                            <input type="text" placeholder="Nhập mã giới thiệu của bạn bè" id="code_gt" name="code_gt" value="">
                        </div>
                        <div class="change_pass_btn">
                            <div class="last-btn">
                                <button class="save-btn">Nhận quà</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




        </div>
    </div>
</div>
<!-- thông báo chọn voucher -->
<div class="box_noti_gif popup_voucher">
    <div class="body_gif">
        <div class="title_noti_gif">
            <span class="noti_title_gif">THẤT BẠI</span>
        </div>
        <div class="body_noti_gif">
            <div class="body_gif_nav">
                <img class="img_error" src="/images/sanacc/vqlq/error.svg" alt="lỗi">
                <div class="div_img_noti">
                    <div class="box_left_img">
                        <div class="box_img_free">
                            <img class="img-small" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                        </div>
                        <div class="box_img_free">
                            <img class="img_big" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                        </div>
                    </div>
                    <div class="box_left_img">
                        <div class="box_img_free">
                            <img class="img_big" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                        </div>
                        <div class="box_img_free">
                            <img class="img-small" src="/images/sanacc/vqlq/star.svg" alt="chúc mừng">
                        </div>
                    </div>
                </div>
                <div class="box_text_noti_gif">
                    <div class="type_gif">
                        <p class="happy_gif">Bạn chưa đăng nhập. Vui lòng đăng nhập!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box_close_gif">
            <span class="span_close_gif" onclick="$('.popup_voucher').hide();">Đóng</span>
            <span class="span_close_gif btn_lg" style="background: #e67300 " onclick="window.location.href = '/vong-quay-lien-quan/'">Đến vòng quay</span>
        </div>
    </div>
</div>

<!-- js chuyen tab -->
<script src="https://zendo.vn/assets/js/core/jquery.min.js"></script>


<?php
// Require footer
require_once 'includes/footer.php';

?>
<script src="/assets/js/jquery.validate.min.js"></script>
<script>
    // js nut p thanh submit
    $('.upload_btn').click(function() {
        $('#avatar').click();
    });

    // xem truoc anh truoc khi upload

    function preview_image(e, element) {
        var _URL = window.URL || window.webkitURL;
        var file, img;
        preview_before_upload(e, element);
    }

    function preview_before_upload(event, elem) {
        if (typeof FileReader == "undefined") return true;
        var elem = $(elem);
        var files = event.target.files;
        for (var i = 0, file; file = files[i]; i++) {
            if (file.type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(event) {
                        var image = event.target.result;
                        $('.img_avt').attr("src", image);
                    };
                })(file);
                reader.readAsDataURL(file);
            }
        }
    }

    // check gioi tinh

    $('.check_gt').click(function() {
        if ($(this).prop('checked')) {
            $(".check_gt").prop('checked', false);
            $(this).prop('checked', true);
            var id = $(this).data('id');
            $('#sex').val(id);

        }
    });

    // <!-- chuyen tab -->
    $('.active-info-box').click(function() {
        $('.active').removeClass('active')
        $('.appear').removeClass('appear')
        $('.body-info').addClass('active')
        $(this).find('img').addClass('appear')

    })

    $('.active-history-spin').click(function() {
        $('.active').removeClass('active')
        $('.appear').removeClass('appear')
        $('.spin-history-box').addClass('active')
        $(this).find('img').addClass('appear')

    })

    $('.active-change-pass').click(function() {
        $('.active').removeClass('active')
        $('.appear').removeClass('appear')
        $('.box_change_pass').addClass('active')
        $(this).find('img').addClass('appear')
    })

    $('.active-code').click(function() {
        $('.active').removeClass('active')
        $('.appear').removeClass('appear')
        $('.box_code').addClass('active')
        $(this).find('img').addClass('appear')
    })

    //next menu
    $('.arrow_right').click(function() {
        $('.li-active').removeClass('li-active')
        $('.title').find('li').addClass('none')
        $('.none-on-respon').addClass('li-active')
        $('.none-on-respon').removeClass('none')
        $('.li-btn').addClass('li-active')
    })

    $('.arrow_left').click(function() {
        $('.none-on-respon').removeClass('li-active')
        $('.none-on-respon').addClass('none')
        $('.hien').addClass('li-active')
    })
    $('.menu-select').change(function() {
        var value_select = $('.menu-select').val();
        if (value_select == 1) {
            $('.active').removeClass('active')
            $('.appear').removeClass('appear')
            $('.body-info').addClass('active')
            $(this).find('img').addClass('appear')
        } else
        if (value_select == 2) {
            $('.active').removeClass('active')
            $('.appear').removeClass('appear')
            $('.spin-history-box').addClass('active')
            $(this).find('img').addClass('appear')
        } else if (value_select == 4) {
            window.location.href = "https://zendo.vn/nap-the/";
        } else
        if (value_select == 5) {
            $('.active').removeClass('active')
            $('.appear').removeClass('appear')
            $('.box_change_pass').addClass('active')
            $(this).find('img').addClass('appear')
        } else if (value_select == 6) {
            window.location.href = "https://zendo.vn/kho-do/";
        } else if (value_select == 7) {
            $('.active').removeClass('active')
            $('.appear').removeClass('appear')
            $('.box_code').addClass('active')
            $(this).find('img').addClass('appear')
        }
    })

    // validate nhập mã giới thiệu
    $("#inp_code_gt").validate({
        onclick: false,
        rules: {
            "code_gt": {
                required: true,
            }
        },
        messages: {
            "code_gt": {
                required: "Bạn chưa nhập mã giới thiệu!",
            }
        },

        submitHandler: function() {
            var data = new FormData();
            data.append('code', $('#code_gt').val());
            data.append('type', 3);

            $.ajax({
                type: 'post',
                url: '/assets/ajax/change_pass.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: data,

                success: function(feedback) {
                    if (feedback.status == 1) {
                        $('.popup_voucher').find('.happy_gif').text(feedback.mess);
                        $('.div_img_noti').show();
                        $('.img_error').hide();
                        $('.popup_voucher').find('.btn_lg').show();
                        $('.popup_voucher').show()
                    } else {
                        $('.popup_voucher').find('.happy_gif').text(feedback.mess);
                        $('.div_img_noti').hide();
                        $('.img_error').show();
                        $('.popup_voucher').find('.btn_lg').hide();
                        $('.popup_voucher').show()
                    }

                }
            })
        }

    });

    // validate change password
    $("#change_pass").validate({
        onclick: false,
        rules: {
            "old_pass": {
                required: true,
            },
            "new_pass": {
                required: true,
                minlength: 6,
            },
            "re_pass": {
                required: true,
                minlength: 6,
                equalTo: "#new_pass",
            },
        },
        messages: {
            "old_pass": {
                required: "Vui lòng nhập tên tài khoản.",
            },
            "new_pass": {
                required: "Vui lòng nhập nhật khẩu.",
                minlength: "Mật khẩu ít nhất chứa 6 ký tự.",
            },
            "re_pass": {
                required: "Bạn chưa nhập lại mật khẩu.",
                equalTo: "Nhập lại mật khẩu không chính xác.",
            },
        },

        submitHandler: function() {
            var data = new FormData();
            data.append('oldpass', $('#old_pass').val());
            data.append('newpass', $('#new_pass').val());
            data.append('type', 1);

            $.ajax({
                type: 'post',
                url: '/assets/ajax/change_pass.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: data,

                success: function(feedback) {
                    if (feedback.status == 0) {
                        alert(feedback.mess)
                    } else {
                        alert(feedback.mess)
                        window.location.reload();
                    }

                }
            })
        }

    });

    // update info
    $("#update_info").validate({
        onclick: false,
        rules: {
            "fullname": {
                required: true,
            },

            "email": {
                required: true,
                email: true,
            },

            "sex": {
                required: true,
            },

            "phonenumber": {
                required: true,
                number: true,
                minlength: 10
            },

            "birthday": {
                required: true,
            },
        },
        messages: {
            "fullname": {
                required: "Bạn chưa nhập họ tên đầy đủ.",
            },

            "email": {
                required: "Bạn chưa nhập email.",
                email: "Định dạng email chưa đúng.",
            },

            "sex": {
                required: "Bạn chưa chọn giới tính"
            },

            "phonenumber": {
                required: "Bạn chưa nhập số điện thoại.",
                number: "Số điện thoại phải là số.",
                minlength: "Số điện thoại phải tối thiểu 10 số.",
            },

            "birthday": {
                required: "Bạn chưa chọn ngày sinh.",
            },
        },

        submitHandler: function() {
            var data = new FormData();
            var files = $('#avatar')[0].files;
            console.log(files);
            data.append('fullname', $('#fullname').val());
            data.append('email', $('#email').val());
            data.append('phonenumber', $('#phonenumber').val());
            data.append('birthday', $('#birthday').val());
            data.append('address', $('#address').val());
            data.append('sex', $('#sex').val());
            data.append('file', files[0]);
            data.append('type', 2);

            $.ajax({
                type: 'post',
                url: '/assets/ajax/change_pass.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: data,

                success: function(feedback) {
                    if (feedback.status == 0) {
                        alert(feedback.mess)
                    } else {
                        alert(feedback.mess)
                        $('.avt_main').attr('src', '/' + feedback.url)
                        $('.img_avatar_user').find('img').attr('src', '/' + feedback.url)
                    }

                }
            })
        }

    });
</script>