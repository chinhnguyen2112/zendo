  <?php    // Require database & th么ng tin chung
    require_once 'core/init.php';

    $title = 'Đăng ký';
    // Require header
    require_once 'includes/header-thu-van-may-9k.php';

    if (isset($data_user) && isset($data_user['id']) && $data_user['id'] > 0) {
        echo '<script>location.href="/";</script>';
    }
    ?>
  <style>
      html,
      body {
          height: 100vh;
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
          margin-top: 100px;
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
          margin: 10px 0px;
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
          margin: 10px 0px;
          display: flex;
          align-content: center;
          justify-content: center;
          color: #000;
      }

      .box_fb {
          background: #3A66FF;
          box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
          border-radius: 10px;
          padding: 10px;
          text-align: center;
      }

      .redirect_lg {
          margin-top: 10px;
          font-style: normal;
          font-weight: normal;
          font-size: 16px;
          line-height: 24px;
          /* identical to box height */
          color: #000000;
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
              margin-top: 0px;
          }

          .title_login {
              margin-bottom: 10px;
          }

          .img_login {
              padding: 20px 0px;
          }
      }
  </style>
  <div class="content-box" style="    height: 100vh;">
      <div class="container_login" style="    height: 100vh;">
          <div class="img_login">
              <div class="box_login">
                  <div class="box_lg">
                      <form id="register">
                          <div class="title_login"><span>ĐĂNG KÝ</span></div>
                          <div class="content_login">
                              <div class="form_login">
                                  <div class="form_inp" style="margin-bottom: 10px;">
                                      <input type="text" id="email" name="email" placeholder="Email...">
                                      <span class="error error_email"></span>
                                      <img class="img_email" src="/assets/sanacc/email.svg" alt="email">
                                  </div>
                                  <div class="form_inp">
                                      <input type="text" id="username" name="username" placeholder="Tên đăng nhập...">
                                      <span class="error error_name"></span>
                                      <img class="img_email" src="/images/sanacc/user.svg" alt="tên đăng nhập">
                                  </div>
                                  <div class="form_inp div_mr">
                                      <input type="password" name="password" id="password" placeholder="Mật khẩu...">
                                      <span class="error error_pass"></span>
                                      <img class="img_pass" src="/assets/sanacc/pass.svg" alt="password">
                                      <img class="img_pass_show" src="/assets/sanacc/show.svg" alt="password">
                                  </div>
                                  <div class="form_inp div_mr">
                                      <input type="password" name="password_confirmation" id="re_password" placeholder="Nhập lại mật khẩu...">
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
              </div>
          </div>
      </div>
  </div>
  <script>
      function setCookies(cname, cvalue, exdays) {
          const d = new Date();
          d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
          let expires = "expires=" + d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }

      function getCookie(cname) {
          let name = cname + "=";
          let decodedCookie = decodeURIComponent(document.cookie);
          let ca = decodedCookie.split(';');
          for (let i = 0; i < ca.length; i++) {
              let c = ca[i];
              while (c.charAt(0) == ' ') {
                  c = c.substring(1);
              }
              if (c.indexOf(name) == 0) {
                  return c.substring(name.length, c.length);
              }
          }
          return "";
      }
      $("#register").validate({
          onclick: false,
          rules: {
              "email": {
                  required: true,
                  email:true
              },
              "username": {
                  required: true,
              },
              "password": {
                  required: true,
                  minlength: 6,
              },
              "password_confirmation": {
                  required: true,
                  minlength: 6,
                  equalTo: "#password",
              },
          },
          messages: {
              "email": {
                  required: "Vui lòng nhập email.",
                  email:'Định dạng email không chính xác.'
              },
              "username": {
                  required: "Vui lòng nhập tên tài khoản.",
              },
              "password": {
                  required: 'Vui lòng nhập nhật khẩu.',
                  minlength: 'Mật khẩu ít nhất chứa 6 ký tự.'
              },
              "password_confirmation": {
                  required: "Bạn chưa nhập lại mật khẩu.",
                  equalTo: "Nhập lại mật khẩu không chính xác.",
              },
          },
          errorPlacement: function(error, element) {
              if (element.attr("name") == "email") {
                  $(".error_email").html(error);
              }
              if (element.attr("name") == "username") {
                  $(".error_name").html(error);
              }
              if (element.attr("name") == "password") {
                  $(".error_pass").html(error);
              }
              if (element.attr("name") == "password_confirmation") {
                  $(".error_re_pass").html(error);
              }
          },
          submitHandler: function(form) {

              var name = $('#username').val();
              var pass = $('#password').val();
              var email = $('#email').val();
              var data = new FormData();
              data.append('email', email);
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
                    if (response.status == 2) {
                          $(".error_email").html(response.mess);
                          $('.error_email').click(function() {
                              $(".error_email").html('');
                          })
                      }else if (response.status == 0) {
                          $(".error_name").html(response.mess);
                          $('.error_name').click(function() {
                              $(".error_name").html('');
                          })
                      } else {
                              window.location.href = "/xac-thuc-tai-khoan/";
                            //   window.location.href = "/";
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
  <?php
    // Require footer
    require_once 'includes/footer.php';

    ?>