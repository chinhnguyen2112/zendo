<script language="javascript" type="text/javascript" src="https://thecaosieure.com/images/md5.js"></script>
<script type="text/javascript" src="/assets/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="/assets/en.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Base64/1.0.1/base64.min.js"></script>

<script src="https://sanacc.vn/assets/js/sweetalert.min.js"></script>

<script>
    page = 1;
    page2 = 1;
</script>

<link rel="stylesheet" href="/assets/css/sanacc/cash.css">
<div class="content_cash">
    <div class="top_cash">
        <div class="form_content_cash">
            <div class="left_cash">
                <div class="type_cash" data-toggle="tabs">
                    <span onclick="change_type(this,'card')" class="span_cash active"><a href="#card">NẠP THẺ</a> </span>
                    <span onclick="change_type(this,'atm')" class="span_cash"><a href="#atm">ATM</a></span>
                    <span onclick="change_type(this,'momo')" class="span_cash"><a href="#momo">MOMO</a></span>
                </div>
                <div class="form_left_cash card">
                    <span class="title_form_cash">Chọn loại thẻ</span>
                    <div class="box_type_cash">
                        <img class="img_type_card" onclick="val_type(this,'VINAPHONE')" src="/images/sanacc/cash/vina.png" alt="vina phone">
                        <img class="img_type_card"  onclick="val_type(this,'VIETTEL')" src="/images/sanacc/cash/viettel.png" alt="viettel">
                        <!-- <img src="/images/sanacc/cash/gmobile.png" alt="g mobile"> -->
                        <img class="img_type_card"  onclick="val_type(this,'MOBIFONE')" src="/images/sanacc/cash/mobi.png" alt="mobile phone">
                        <!-- <img src="/images/sanacc/cash/vienam.png" alt="vietnammobile"> -->
                    </div>
                    <div class="form_input">
                        <span class="title_form_input">Nhập thông tin thẻ</span>
                        <form id="form" novalidate="novalidate">
                            <input id="type" class="hi" hidden name="type" type=text value="">
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
                                    <select name="menhgia" id="menhgia" class="form-control">
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
                                <button type="submit">Nạp tiền</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="form_left_cash momo">
                    <div class="img_momo">
                        <img src="/images/sanacc/cash/mono.png" alt="momo">
                    </div>
                    <div class="text_momo">
                        <p class="nd_ck">Ví điện tử MOMO</p>
                        <p class="data_mono pd_25"><img src="/images/sanacc/cash/icon_crow.svg" alt="chỉ mục">Số điện thoại: 0976615309</p>
                        <p class="data_mono pd_25"><img src="/images/sanacc/cash/icon_crow.svg" alt="chỉ mục">Tên tài khoản: Chu Thị Ngọc Anh</p>
                        <p class="nd_ck ">Nội dung chuyển khoản: Số điện thoại - ID tài khoản</p>
                        <p class="nd_ck ">Ví dụ: 0358888888 - #1815</p>
                    </div>
                </div>
                <div class="form_left_cash atm">
                    <div class="img_atm">
                        <img src="/images/sanacc/cash/atm.png" alt="atm">
                    </div>
                    <div class="text_momo">
                        <p class="nd_ck">Ngân hàng: Techcombank</p>
                        <p class="data_mono pd_25"><img src="/images/sanacc/cash/icon_crow.svg" alt="chỉ mục">Số tài khoản: 1902 9151 126 668</p>
                        <p class="data_mono pd_25"><img src="/images/sanacc/cash/icon_crow.svg" alt="chỉ mục">Tên tài khoản: Chu Thị Ngọc Anh</p>
                        <p class="nd_ck ">Nội dung chuyển khoản: Số điện thoại - ID tài khoản</p>
                        <p class="nd_ck ">Ví dụ: 0358888888 - #1815</p>
                    </div>
                </div>
                <div class="form_left_cash bot_atm_momo">
                    <div class="text_atm_momo">
                        <p class="text_title_bot_atm_momo"><img src="/images/sanacc/cash/icon_crow.svg" alt="chỉ mục"><span>Hệ thống nạp<span class="span_bot_atm_momo">&nbspATM/MOMO tự động 24/24</span>, Nạp 100.000đ nhận 125.000đ tiền Shop.</span></p>
                        
                        <p class="text_title_bot_atm_momo"><img src="/images/sanacc/cash/icon_crow.svg" alt="chỉ mục"><span><span class="span_bot_atm_momo">Lưu ý:</span> Chuyển tiền nhanh 24/7 để tránh bị treo, chậm tiền!<br> Nếu gửi đúng stk và nội dung mà 30 phút không nhận được tiền hoặc chuyển ghi sai nội dung vui lòng liên hệ page để được hỗ trợ. </span></p>
                        <div class="box_example_cash">
                            <p class="text_ex_cash">QUY ĐỔI TIỀN NẠP ATM/MOMO</p>
                            <div class="box_ex_cash">
                                <div class="box_nav_cash">
                                    <span class="span_tt_cash">Số tiền bạn chuyển</span>
                                    <span class="span_num_cash">100.000đ</span>
                                </div>
                                <img class="img_repaet_cash" src="/images/sanacc/cash/repeat.svg" alt="chuyển đổi">
                                <div class="box_nav_cash">
                                    <span class="span_tt_cash">Số tiền bạn nhận</span>
                                    <span class="span_num_cash">125.000đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form_right_cash">
                <div class="detail_acc_cash">
                    <span class="title_acc_cash">Chi tiết tài khoản</span>
                    <div class="data_user_cash">
                        <img src="<?php if ($data_user['username'] >1000000) {
                                                                    echo 'https://graph.facebook.com/'.$data_user['username'].'/picture';
                                                                } else {
                                                                    echo '/assets/img/avatars/avt.png';
                                                                } ?>" alt="ảnh đại diện">
                        <div class="mane_id_acc">
                            <p class="name_acc_cash"><?= $data_user['name'] ?></p>
                            <p class="id_acc_cash">ID: <?= $data_user['id'] ?></p>
                        </div>
                    </div>
                    <div class="so_du">
                        <p class="p_so_du">Số dư tài khoản <span class="span_so_du">[VNĐ]</span></p>
                        <p class="p_mun_du"><?= number_format($data_user['cash']) ?> VNĐ</p>
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
    function load_history_card() {
        $(".list_card").hide();
        $("#loading").show();
        $.post("/assets/ajax/history_card.php", {
                page2: page2
            })
            .done(function(data) {
                $(".box_table_cash").html('');
                $('.box_table_cash').empty().append(data);
                $("#loading").hide();
                $(".box_table_cash").show();
            });
    }
    load_history_card();
    $(document).ready(function() {


        $('input[name="option_payment"]').bind('click', function() {
            $('.list-content li').removeClass('active');
            $(this).parent().parent('li').addClass('active');
        });
    });
    var type = "";

    function val_type(e,type_val) {
        $('.img_active').removeClass('img_active');
        $(e).addClass('img_active');
        $('.hi').val(type_val);
        type = type_val;
    }
    function change_type(e,type){
        if($(e).hasClass('active')){
            
        }else{
            $('.active').removeClass('active');
            $(e).addClass('active');
            $('.card,.atm,.momo').css({
                'display': 'none'
            });
            
            $('.bot_atm_momo').hide();
            if(type == "card"){
                $('.card').css({
                    'display': 'block'
                });
            }else{
                $('.'+type).css({
                    'display': 'flex'
                });
                $('.bot_atm_momo').show();
            }
        }
    }
    $(document).ready(function() {
        $("#form").validate({
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
                type: 'Bạn chưa chọn loại thẻ',
                serial: 'Bạn vui lòng nhập serial của thẻ',
                code: 'Bạn vui lòng nhập mã thẻ'
            },
            submitHandler: function(e) {
                if (type == "") {
                    alert('Bạn chưa chọn loại thẻ');
                    return false;
                }
                $('button[type="submit"]').html("ĐANG XỬ LÝ...");
                var data = new FormData();
                data.append("type", type);
                data.append("serial", $('#serial').val());
                data.append("code", $('#code').val());
                data.append("menhgia", $('#menhgia').val());
                $.ajax({
                    url: "/assets/ajax/card.php",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    data: data,
                    success: function(response) {
                        $('button[type="submit"]').html("NẠP THẺ");
                        swal(response.title, response.msg, response.status);
                        // swal({
                        //   title: "SweetAlert!",
                        //   text: "Here's my sweet alert!",
                        //   type: "error",
                        //   confirmButtonText: "Cool"
                        // });
                    },
                    error: function(xhr) {
                        alert("Thất bại");
                    },
                });
                return false;
            }
            //   $('button[type="submit"]').html("ĐANG XỬ LÝ...");
            //   $.post("/assets/ajax/card.php", $('#card-recharing1').serialize(), function(data) {
            //       $('button[type="submit"]').html("NẠP THẺ");
            //         swal(data.title, data.msg, data.status);
            //   }, "json");
            //       return false;
            //   }
        });
    });
</script>