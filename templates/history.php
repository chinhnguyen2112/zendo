<style>
    .list_atm {
        margin: 20px auto;
        padding: 20px;
        background: #bfd7f5;
        width: max-content;
        border-radius: 10px;
    }

    .none_page {
        display: none;
    }

    body,
    html {
        height: 100%;
        position: relative;
    }

    .main_content {
        background: #1f2334;
    }

    .list_buy {
        overflow: auto;
        max-height: 800px;
    }

    footer {
        width: 100%;
    }

    .content.content-boxed {
        min-height: 500px;
    }
</style>
<?php
//if(!$user){
//new Redirect($_DOMAIN); // về trang chu
//exit;
//}̉
?>
<script>
    page = 1;
    page2 = 1;
</script>

<link rel="stylesheet" href="/assets/css/sanacc/cash.css">
<style>
    .active {
        border-top: none;
    }
</style>
<div class="content content-boxed">
    <div class=" block-themed">

        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
            <li class="active">
                <a href="#buy">Tài Khoản đã mua</a>
            </li>
            <li>
                <a href="#coc">Tài Khoản đã cọc</a>
            </li>
            <li>
                <a href="#card">Thẻ cào đã nạp</a>
            </li>
            <!-- <li>
                <a href="#garena">Thẻ Garena đã mua</a>
            </li> -->

            <!--<li>-->
            <!--<a href="#atm">ATM</a>-->
            <!--</li>-->
        </ul>


        <div class="block-content tab-content" style="padding-top: 0px;">

            <div class="tab-pane active" id="buy">
                <div style="display: block;    overflow: auto;" class="list_buy"></div>
                <div id="loading">
                    <img src="/assets/images/loading.gif" />
                </div>
            </div>

            <div class="tab-pane" id="coc">
                <div style="display: block;" class="list_coc"></div>
                <div id="loading">
                    <img src="/assets/images/loading.gif" />
                </div>
            </div>

            <div class="tab-pane fade" id="card">
                <div style="display: block;" class="list_card"></div>
                <div id="loading">
                    <img src="/assets/images/loading.gif" />
                </div>
            </div>
            <!-- <div class="tab-pane fade" id="garena">
                <div style="display: block;" class="list_garena"></div>
                <div id="loading">
                    <img src="/assets/images/loading.gif" />
                </div>
            </div> -->

            <!--<div class="tab-pane fade" id="atm">-->
            <!--                <div style="display: block;" class="list_atm">-->
            <!--                    <p class="bank">Ngân hàng: <b>BIDV</b></p>-->
            <!--                    <p class="bank">Chủ tài khoản: <b>Phạm Ngọc Mạnh</b></p>-->
            <!--                    <p class="bank">Số tài khoản: <b>0123456789</b></p>-->
            <!--                    <p class="bank">Nội dung chuyển khoản: <b>%Số điện thoại% MUA ACC %ID acc% </b></p>-->
            <!--                    <p class="bank">Ví dụ: <b>0358888888 MUA ACC 123</b></p>-->
            <!--                </div>-->
            <!--                <div id="loading">-->
            <!--                    <img src="assets/images/loading.gif" />-->
            <!--            </div>-->
            <!--</div>-->



        </div>
    </div>

</div>

<script>
    // var h_head = $('.header').height();
    // var h_ft = $('footer').height();
    // $('.content.content-boxed').css({
    //     'min-height' = ""
    // })
    // alert(h_head);
    function load_history_buy() {
        $(".list_buy").hide();
        $("#loading").show();
        $.post("../assets/ajax/history_buy.php", {
                page: page
            })
            .done(function(data) {
                $(".list_buy").html('');
                $('.list_buy').empty().append(data);
                $("#loading").hide();
                $(".list_buy").show();
            });
    }


    function load_history_coc() {
        $(".list_coc").hide();
        $('#coc').find("#loading").show();
        $.post("../assets/ajax/history_coc.php", {
                page: page
            })
            .done(function(data) {
                $(".list_coc").html('');
                $('.list_coc').empty().append(data);
                $('#coc').find("#loading").hide();
                $(".list_coc").show();
            });
    }


    function load_history_card() {
        $(".list_card").hide();
        $('#card').find("#loading").show();
        $.post("../assets/ajax/history_card.php", {
                page2: page2
            })
            .done(function(data) {
                $(".list_card").html('');
                $('.list_card').empty().append(data);
                $('#card').find("#loading").hide();
                $(".list_card").show();
            });
    }

    function load_history_garena() {
        $(".list_garena").hide();
        $('#garena').find("#loading").show();
        $.post("../assets/ajax/history_garena.php", {
                page2: page2,
            })
            .done(function(data) {
                $(".list_garena").html('');
                $('.list_garena').empty().append(data);
                $('#garena').find("#loading").hide();
                $(".list_garena").show();
            });
    }
    load_history_buy();
    load_history_coc();
    load_history_card();
    // load_history_garena();
</script>