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
<script language="javascript" type="text/javascript" src="https://thecaosieure.com/images/md5.js"></script>
<script type="text/javascript" src="/assets/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="/assets/en.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Base64/1.0.1/base64.min.js"></script>


<script>
    page = 1;
    page2 = 1;
</script>
<link rel="stylesheet" href="/assets/css/sanacc/cash.css">
<div class="content_cash">
    <div class="top_cash">
        <div class="type_cash" data-toggle="tabs">
            <span class="span_cash active"><a href="#card">NẠP THẺ</a> </span>
            <span class="span_cash"><a href="#atm">ATM</a></span>
            <span class="span_cash"><a href="#momo">MOMO</a></span>
        </div>
        <div class="form_content_cash">
            <div class="form_left_cash">
                <span class="title_form_cash">Chọn loại thẻ</span>
                <div class="box_type_cash">
                    <img onclick="val_type('VINAPHONE')" src="/images/sanacc/cash/vina.png" alt="vina phone">
                    <img onclick="val_type('VIETTEL')" src="/images/sanacc/cash/viettel.png" alt="viettel">
                    <!-- <img src="/images/sanacc/cash/gmobile.png" alt="g mobile"> -->
                    <img onclick="val_type('MOBIFONE')" src="/images/sanacc/cash/mobi.png" alt="mobile phone">
                    <!-- <img src="/images/sanacc/cash/vienam.png" alt="vietnammobile"> -->
                </div>
                <div class="form_input">
                    <span class="title_form_input">Nhập thông tin thẻ</span>
                    <form id="form">
                        <div class="inp_control">
                            <div class="box_inp">
                                <span>Mã thẻ</span>
                                <input type="text" name="code" id="code">
                            </div>
                            <div class="box_inp">
                                <span>Số seri</span>
                                <input type="text" name="serial" id="serial">
                            </div>
                        </div>
                        <div class="inp_control">
                            <div class="box_inp">
                                <span>Mệnh giá thẻ</span>
                                <select name="menhgia" class="form-control">
                                    <option value="chuachon">Mệnh Giá Thẻ</option>

                                    <option value="10000">Thẻ 10.000</option>
                                    <option value="20000">Thẻ 20.000</option>
                                    <option value="30000">Thẻ 30.000</option>
                                    <option value="50000">Thẻ 50.000</option>
                                    <option value="100000">Thẻ 100.000</option>
                                    <option value="200000">Thẻ 200.000</option>
                                    <option value="300000">Thẻ 300.000</option>
                                    <option value="500000">Thẻ 500.000</option>
                                    <option value="1000000">Thẻ 1.000.000</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="inp_control">
                            <button>Nạp tiền</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="form_right_cash">
                <div class="detail_acc_cash">
                    <span class="title_acc_cash">Chi tiết tài khoản</span>
                    <div class="data_user_cash">
                        <img src="/assets/img/avatars/avt.png" alt="ảnh đại diện">
                        <div class="mane_id_acc">
                            <p class="name_acc_cash">Nguyễn Văn A</p>
                            <p class="id_acc_cash">ID: 69889</p>
                        </div>
                    </div>
                    <div class="so_du">
                        <p class="p_so_du">Số dư tài khoản <span class="span_so_du">[VNĐ]</span></p>
                        <p class="p_mun_du">10000000 VNĐ</p>
                    </div>
                </div>
                <div class="noti_cash">
                    <p class="title_noti_cash">We value your Privacy
                    </p>
                    <p>We will not sell or distribute your in formation. Read our Privacy Policy.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bot_cash">
        <div class="type_cash">
            <span class="span_cash">LỊCH SỬ</span>
        </div>
        <div class="box_table_cash">

        </div>
    </div>
</div>
<script src="/assets/js/jquery.validate.min.js"></script>
<script>
    var type = "";
    function val_type(e){
        type = e;
        alert(type);
    }
    function load_history_card() {
        $(".list_card").hide();
        $("#loading").show();
        $.post("/assets/ajax/history_card.php", {
                page2: page2
            })
            .done(function(data) {
                $(".list_card").html('');
                $('.list_card').empty().append(data);
                $("#loading").hide();
                $(".list_card").show();
            });
    }
    load_history_card();
    $(document).ready(function() {


        $('input[name="option_payment"]').bind('click', function() {
            $('.list-content li').removeClass('active');
            $(this).parent().parent('li').addClass('active');
        });
    });
    $(document).ready(function() {
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
                    required: true

                }
            },
            messages: {
                type: 'Bạn vui lòng chọn loại thẻ',
                serial: 'Bạn vui lòng nhập serial của thẻ',
                code: 'Bạn vui lòng nhập mã thẻ'
            },
            submitHandler: function(e) {
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
<?php
//include body
// Require footer
require_once 'includes/footer.php';

?>