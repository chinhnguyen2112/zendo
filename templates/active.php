<?php

// Require database & th么ng tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';

?>

<style>

    #page_active {
        background: #fff;
    }
    
    .page_active {
        padding-top: 50px;
        text-align: center;
        max-width: 750px;
        margin: 0 auto;
    }

    .box_page_active {
        padding: 20px;
        box-shadow: 0px 0px 10px rgb(0 0 0 / 25%);
    }

    .img_page_active img {
        width: 355px;
        height: auto;
    }

    .body_page_active .main_text {
        padding: 0 50px;
    }

    .body_page_active .main_tit {
        font-size: 30px;
        color: #3e3ed5;
        margin: 10px 0;
    }

    .body_page_active .main_text span {
        color: #3e3ed5;
    }

    .enter_code {
        margin-bottom: 20px;
    }

    .enter_code input {
        padding: 10px;
        outline: none;
        width: 300px;
    }


    .active_btn button {
        padding: 10px 20px;
        background: #407bff;
        color: #Fff;
        font-size: 18px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    @media only screen and (max-width: 540px) {
        .page_active {
            padding: 0 100px;
        }
    }

    @media only screen and (max-width: 425px) {
        .page_active {
            padding: 0 50px;
        }
    }
</style>

<div id="page_active">
    <div class="page_active">
        <div class="box_page_active">
            <div class="img_page_active">
                <img src="/images/sanacc/active.png" alt="img">
            </div>
            <div class="body_page_active">
                <p class="main_tit">Xác thực tài khoản</p>
                <p class="main_text">Mã xác thực của bạn đã được gửi đến email đăng ký của bạn. Vui lòng kiểm tra email. Nếu bạn chưa nhận được mã xác thực, hãy bấm vào nút “ <span>Gửi lại Email xác thực</span> ” dưới đây:</p>
            </div>

            <div class="enter_code">
                <input type="number" name="" id="" placeholder="Nhập mã từ email">
            </div>

            <div class="active_btn">
                <button>Gửi email xác thực</button>
            </div>
        </div>
    </div>
</div>


<?php
// Require footer
require_once 'includes/footer.php';

?>