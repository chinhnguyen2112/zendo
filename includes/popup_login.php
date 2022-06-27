    <style>
        html,
        body {
            height: 100vh;
        }

        .dang_nhap,
        .dang_ky {
            display: none;
        }

        .box_noti_gif {
            position: fixed;
            background: rgba(93, 93, 93, 0.77);
            top: 0px;
            padding-top: 50px;
            width: 100%;
            height: 100vh;
            margin: auto;
            z-index: 4;
            display: none;
        }

        .body_gif {
            width: 500px;
            margin: auto;
            background: #212333;
            color: #fbfbfb;
            max-height: 80%;
            border-radius: 10px;
            position: relative;
            display: flex;
            justify-content: center;
            /* width: 720px; */
            height: auto;
            /* background: #FBFBFB; */
            margin: 0 auto;
            box-shadow: 0px 24px 32px 8px rgb(0 0 0 / 5%);
            flex-direction: column;
        }

        .title_noti_gif {
            background: #0040ff;
            text-align: center;
            /* margin-bottom: 20px; */
            padding: 10px 20px;
            background: #73b009;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            color: #fff;
            line-height: 30px;
            border-radius: 10px 10px 0px 0px;
            font-weight: 700;
        }

        span.noti_title_gif {
            padding: 20px;
            margin-bottom: 20px;
        }

        .body_noti_gif {
            padding: 10px 10px 50px 10px;
            background: #212333;
            max-height: 88%;
            /* min-width: 800px; */
            overflow: auto;
        }

        .box_close_gif {
            /* background: #73b009; */
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            padding: 20px 50px;
            font-size: 20px;
            color: #fff;
        }

        span.span_close_gif {
            background: #73b009;
            padding: 10px 50px;
            cursor: pointer;
            border-radius: 5px;
        }

        .login_now {
            background: #73b009;
            padding: 12px 24px;
            cursor: pointer;
            border-radius: 5px;
            /* border-radius: 8px; */
            font-weight: 600;
            text-align: center;
            /* padding: 20px 50px; */
            border: navajowhite;
            font-size: 20px;
            color: #fff;
        }

        .login_now {
            background: #73b009;
            padding: 12px 24px;
            cursor: pointer;
            border-radius: 5px;
            /* border-radius: 8px; */
            font-weight: 600;
            text-align: center;
            /* padding: 20px 50px; */
            border: navajowhite;
            font-size: 20px;
            color: #fff;
        }

        .main_content {
            height: 100vh;
        }

        .img_login {
            background: url('/assets/sanacc/dang_nhap.png');
            padding: 50px 0px;
            width: 100%;
            height: 100%;
        }

        .box_login {
            width: 100%;
        }

        .box_lg {
            background: #FFFFFF;
            box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            width: 410px;
            margin: auto;
            margin-top: 5%;
            padding: 20px 20px;
        }

        .title_login {
            font-style: normal;
            font-weight: 700;
            font-size: 27px;
            line-height: 30px;
            margin-bottom: 20px;
            color: #FD4D2C;
            text-align: center;
        }

        .form_inp input {
            width: 100%;
            height: 40px;
            padding: 0px 35px;
            border: 1px solid #CCCCCC;
            box-sizing: border-box;
            outline: none;
            border-radius: 6px;
            color: #000;
            margin: 0px;
        }

        .form_inp {
            position: relative;
        }

        .img_email {
            position: absolute;
            left: 10px;
            top: 13px;
        }

        .img_pass {
            position: absolute;
            left: 10px;
            top: 11px;
        }

        .img_pass_show {
            position: absolute;
            right: 7px;
            top: 7px;
        }

        .div_mr {
            margin: 20px 0px;
        }

        button.btn_login {
            padding: 6px;
            background: #FD4D2C;
            border-radius: 10px;
            width: 100%;
            border: navajowhite;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 27px;
            /* identical to box height */
            text-align: center;
            color: #fff;
        }

        .line_connect {
            margin: 20px 0px;
            display: flex;
            align-content: center;
            justify-content: center;
            color: #fff;
        }

        .box_fb {
            background: #3A66FF;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            padding: 10px;
            text-align: center;
        }

        .redirect_lg {
            margin-top: 30px;
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
            line-height: 24px;
            /* identical to box height */
            color: #ffffff;
        }

        a.link_lg {
            color: #fd4d2c;
            font-weight: 600;
        }

        .none_page {
            display: none;
        }

        .error {
            color: red;
        }

        footer {
            display: none;
        }

        body {
            height: 100%;
            overflow: hidden;
        }

        .notify_auto {
            display: none !important;
        }

        .uudai {
            display: none !important;
        }

        .box_fb a {
            color: #fff;
        }

        .content_login {
            margin-top: 20px;
        }

        @media (min-width: 568px) and (max-width: 991.98px) and (max-height: 599px) {
            .img_login {
                padding: 2vh 0;
            }

            .box_lg {
                width: 73vh;
                margin-top: 0vh;
                padding: 2vh;
            }

            .title_login {
                font-size: 5vh;
                margin-bottom: 2vh;
                line-height: 7.2vh;
            }

            .form_inp {
                margin: 1vh 0;
            }

            .form_inp input {
                height: 8vh;
            }

            button.btn_login {
                font-size: 4vh;
                padding: 1vh;
            }

            .line_connect {
                margin: 1vh 0;
                margin-top: 0vh;
            }

            img.img_pass_show {
                width: 5vh;
                top: 1.5vh;
            }

            .box_fb {
                padding: 1vh;
            }

            img.img_pass {
                top: 1vh;
            }

            .redirect_lg {
                margin-top: 1vh;
                font-size: 4vh;
            }
        }

        @media only screen and (max-width: 540px) {
            .box_lg {
                width: 75%;
                padding: 10px 10px;
            }

            .title_login {
                margin-bottom: 10px;
            }

            .img_login {
                padding: 20px 0px;
            }
        }
    </style>
    <!-- popup login-->
    <div class="box_noti_gif dang_nhap">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">ĐĂNG NHẬP</span>
            </div>
            <div class="body_noti_gif">
                <form id="register">
                    <!-- <div class="title_login"><span>ĐĂNG NHẬP</span></div> -->
                    <div class="content_login">
                        <div class="form_login">
                            <div class="form_inp">
                                <input type="text" id="username" name="username" placeholder="Tên đăng nhập...">
                                <span class="error error_name"></span>
                                <img class="img_email" src="/assets/sanacc/email.svg" alt="email">
                            </div>
                            <div class="form_inp div_mr">
                                <input type="password" name="password" id="password" placeholder="Mật khẩu...">
                                <span class="error error_pass"></span>
                                <img class="img_pass" src="/assets/sanacc/pass.svg" alt="password">
                                <img class="img_pass_show" src="/assets/sanacc/show.svg" alt="password">
                            </div>
                            <div class="form_inp">
                                <button class="btn_login">Đăng nhập</button>
                            </div>
                        </div>
                    </div>
                    <div class="line_connect">
                        <img src="/assets/sanacc/gach.svg" alt="nối">
                        <span>&nbsp;Hoặc&nbsp;</span>
                        <img src="/assets/sanacc/gach.svg" alt="nối">
                    </div>
                    <div class="box_fb">
                        <a href="<?= $loginUrl ?>"><i class="fa fa-facebook ic_fb" style="margin-right:10px"></i>Đăng nhập bằng Facebook</a>
                    </div>
                    <div class="redirect_lg">
                        <span>Bạn chưa có tài khoản ? <a onclick="
                        $('.dang_nhap').hide(); $('.dang_ky').show();" class="link_lg">Đăng ký</a></span>
                    </div>
                </form>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.dang_nhap').hide();">Đóng</span>
                <!-- <button class="span_close_gif login_now">Đăng nhập</button> -->
            </div>
        </div>
    </div>
    <!-- popup signup-->
    <div class="box_noti_gif dang_ky">
        <div class="body_gif">
            <div class="title_noti_gif">
                <span class="noti_title_gif">ĐĂNG KÝ</span>
            </div>
            <div class="body_noti_gif">
                <form id="signup">
                    <!-- <div class="title_login"><span>ĐĂNG KÝ</span></div> -->
                    <div class="content_login">
                        <div class="form_login">
                            <div class="form_inp">
                                <input type="text" id="usernames" name="usernames" placeholder="Tên đăng nhập...">
                                <span class="error error_name"></span>
                                <img class="img_email" src="/assets/sanacc/email.svg" alt="email">
                            </div>
                            <div class="form_inp div_mr">
                                <input type="password" name="passwords" id="passwords" placeholder="Mật khẩu...">
                                <span class="error error_pass"></span>
                                <img class="img_pass" src="/assets/sanacc/pass.svg" alt="password">
                                <img class="img_pass_show" src="/assets/sanacc/show.svg" alt="password">
                            </div>
                            <div class="form_inp div_mr">
                                <input type="password" name="password_confirmations" id="re_passwords" placeholder="Nhập lại mật khẩu...">
                                <span class="error error_re_pass"></span>
                                <img class="img_pass" src="/assets/sanacc/pass.svg" alt="password">
                                <img class="img_pass_show" src="/assets/sanacc/show.svg" alt="password">
                            </div>
                            <div class="form_inp">
                                <button class="btn_login">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                    <div class="line_connect">
                        <img src="/assets/sanacc/gach.svg" alt="nối">
                        <span>&nbsp;Hoặc&nbsp;</span>
                        <img src="/assets/sanacc/gach.svg" alt="nối">
                    </div>
                    <div class="box_fb">
                        <a href="<?= $loginUrl ?>"><i class="fa fa-facebook ic_fb" style="margin-right:10px"></i>Đăng nhập bằng Facebook</a>
                    </div>
                    <div class="redirect_lg">
                        <span>Bạn đã có tài khoản ? <a href="/dang-nhap/" class="link_lg">Đăng nhập</a></span>
                    </div>
                </form>
            </div>
            <div class="box_close_gif">
                <span class="span_close_gif" onclick="$('.dang_nhap').hide();">Đóng</span>
                <!-- <button class="span_close_gif login_now">Đăng nhập</button> -->
            </div>
        </div>
    </div>

    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>


    <script src="https://zendo.vn/assets/js/core/bootstrap.min.js"></script>

    <script src="https://zendo.vn/assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script>
        $("#register").validate({
            onclick: false,
            rules: {
                "username": {
                    required: true,
                },
                "password": {
                    required: true,
                    minlength: 6
                },
            },
            messages: {
                "username": {
                    required: "Vui lòng nhập tên tài khoản.",
                },
                "password": {
                    required: 'Vui lòng nhập nhật khẩu.',
                    minlength: 'Mật khẩu ít nhất chứa 6 ký tự.'
                },
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "username") {
                    $(".error_name").html(error);
                }
                if (element.attr("name") == "password") {
                    $(".error_pass").html(error);
                }
            },
            submitHandler: function(form) {

                var name = $('#username').val();
                var pass = $('#password').val();
                var data = new FormData();
                data.append('name', name);
                data.append('pass', pass);
                data.append('type', 2);

                // return false;
                $.ajax({
                    url: '/assets/ajax/signup.php',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    data: data,
                    success: function(response) {
                        if (response.status == 0) {
                            alert(response.mess);
                        } else {
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert('Thất bại');

                    }
                });
                return false;
            }
        });

        $("#signup").validate({
            onclick: false,
            rules: {
                "usernames": {
                    required: true,
                },
                "passwords": {
                    required: true,
                    minlength: 6,
                },
                "password_confirmations": {
                    required: true,
                    minlength: 6,
                    equalTo: "#passwords",
                },
            },
            messages: {
                "usernames": {
                    required: "Vui lòng nhập tên tài khoản.",
                },
                "passwords": {
                    required: 'Vui lòng nhập nhật khẩu.',
                    minlength: 'Mật khẩu ít nhất chứa 6 ký tự.'
                },
                "password_confirmations": {
                    required: "Bạn chưa nhập lại mật khẩu.",
                    equalTo: "Nhập lại mật khẩu không chính xác.",
                },
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "usernames") {
                    $(".error_name").html(error);
                }
                if (element.attr("name") == "passwords") {
                    $(".error_pass").html(error);
                }
                if (element.attr("name") == "password_confirmations") {
                    $(".error_re_pass").html(error);
                }
            },
            submitHandler: function(form) {

                var name = $('#usernames').val();
                var pass = $('#passwords').val();
                var data = new FormData();
                data.append('name', name);
                data.append('pass', pass);
                data.append('type', 1);

                // return false;
                $.ajax({
                    url: '/assets/ajax/signup.php',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    data: data,
                    success: function(response) {
                        if (response.status == 0) {
                            $(".error_name").html(response.mess);
                            $('.error_name').click(function() {
                                $(".error_name").html('');
                            })
                        } else {
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        alert('Thất bại');

                    }
                });
                return false;
            }
        });
    </script>