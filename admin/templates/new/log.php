<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">


<div class="row row_transaction">
    <div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">
        <script>  
            page = 1;
            page2 = 1;
            username = "";
            username2 = "";
            id_post = "";
        </script>
        <div class="content content-boxed">
            <div class="block block-themed">

                <ul class="nav nav-tabs nav-tabs-alt" style="padding-bottom: 6px ;" data-toggle="tabs">
                    <li class="active">
                        <a class="acc_sold tab_tit mr20" href="#buy">Tài Khoản đã bán</a>
                    </li>
                    <li>
                        <a class="card_paid tab_tit" href="#card">Thẻ được nạp</a>
                    </li>
                </ul>


                <div class="block-content tab-content mt20 tab_gd">

                    <div class="active" id="buy">
                        <div class="row flex_center">
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Tên người mua" id="username" name="username" value="">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Mã số" id="id_post" name="id_post">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->

                            <span class="input-group-btn mt7">
                                <button class="btn btn-default white_text" type="button" onclick="fitler();"><i class="si si-magnifier"></i>Tìm kiếm</button>
                            </span>
                        </div><!-- /.row -->
                        <hr>

                        <div style="display: block;" class="list_buy">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th></th>
                                        <th>Username/Pwd</th>
                                        <th>Người mua</th>
                                        <th>Giá tiền</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>




                                </tbody>

                            </table>

                            <div class="page_account">
                                <p onclick="page=1;load_history_buy()" class="active">1</p>
                                <p onclick="page=2;load_history_buy()">2</p>
                                <p onclick="page=3;load_history_buy()">3</p>
                                <p onclick="page=4;load_history_buy()">4</p>
                                <p onclick="page=5;load_history_buy()">5</p>
                                <p onclick="page=21;load_history_buy()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                            </div>



                        </div>

                        <div class="list_card none">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Người nạp</th>
                                        <th>Loại thẻ</th>
                                        <th>Seri</th>
                                        <th>Mathe</th>
                                        <th>Mệnh giá</th>
                                        <th>Thời gian</th>
                                        <th>Xu li</th>

                                    </tr>
                                </thead>
                                <tbody>



                                </tbody>

                            </table>

                            <div class="page_account">
                                <p onclick="page=1;load_history_buy()" class="active">1</p>
                                <p onclick="page=2;load_history_buy()">2</p>
                                <p onclick="page=3;load_history_buy()">3</p>
                                <p onclick="page=4;load_history_buy()">4</p>
                                <p onclick="page=5;load_history_buy()">5</p>
                                <p onclick="page=21;load_history_buy()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                            </div>



                        </div>

                        <div id="loading" style="display: none;">
                            <img src="../assets/images/loading.gif">
                        </div>
                    </div>

                    <div class="fade" id="card">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Tên người mua" id="username2" name="username2" value="">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" onclick="fitler2();"><i class="si si-magnifier"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Loại thẻ" id="type_card" name="type_card">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" onclick="fitler3();"><i class="si si-magnifier"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        <hr>
                        <div id="loading2" style="display: none;">
                            <img src="../assets/images/loading.gif">
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <script>
            function load_history_buy() {
                $(".list_buy").hide();
                $("#loading").show();
                $.post("../assets/ajax/history_buy_admin.php", {
                        page: page,
                        username: username,
                        id_post: id_post
                    })
                    .done(function(data) {
                        $(".list_buy").html('');
                        $('.list_buy').empty().append(data);
                        $("#loading").hide();
                        $(".list_buy").show();
                    });
            }


            function load_history_card() {
                $(".list_card").hide();
                $("#loading2").show();
                $.post("../assets/ajax/history_card_admin.php", {
                        page2: page2,
                        username: username2
                    })
                    .done(function(data) {
                        $(".list_card").html('');
                        $('.list_card').empty().append(data);
                        $("#loading2").hide();
                        $(".list_card").show();
                    });
            }

            function fitler() {
                id_post = $("#id_post").val();
                username = $("#username").val();
                load_history_buy();
            }

            function fitler2() {

                username2 = $("#username2").val();
                load_history_card();
            }



            load_history_buy();
            load_history_card();

            // chuyen tab
            $('.acc_sold').click(function() {
                $('.tab_gd').find('.open_block').removeClass('open_block')
                $('.list_card').addClass('none')
                $('.list_buy').removeClass('none')
                $('.list_buy').addClass('open_block')
            })

            $('.card_paid').click(function() {
                $('.tab_gd').find('.open_block').removeClass('open_block')
                $('.list_buy').addClass('none')
                $('.list_card').removeClass('none')
                $('.list_card').addClass('open_block')
            })
        </script>

    </div>
</div>