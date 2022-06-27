<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">


<div class="row row_member">
    <div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">
        <script>
            page = 1;
            username = "";
            idus = "";
        </script>
        <div class="content content-boxed">
            <div class="block block-themed">

                <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                    <li class="active">
                        <a href="#member">Danh sách thành viên</a>
                    </li>
                </ul>


                <div class="block-content tab-content">

                    <div class="tab-pane active" id="member">
                        <div class="row flex_center">
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Tên thành viên" id="username" name="username" value="">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ID thành viên" id="idus" name="idus">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->

                            <span class="input-group-btn mt7">
                                <button class="btn btn-default white_text" type="button" onclick="fitler();"><i class="si si-magnifier"></i>Tìm kiếm</button>
                            </span>
                        </div><!-- /.row -->
                        <hr>

                        <div style="display: block; overflow: scroll;" class="list_account">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Cash</th>
                                        <th>Ngày tạo</th>
                                        <th class="text-center" style="width: 100px;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>

                            <div class="page_account">
                                <p onclick="page=1;load_account_member()" class="active">1</p>
                                <p onclick="page=2;load_account_member()">2</p>
                                <p onclick="page=3;load_account_member()">3</p>
                                <p onclick="page=4;load_account_member()">4</p>
                                <p onclick="page=5;load_account_member()">5</p>
                                <p onclick="page=91;load_account_member()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                            </div>



                        </div>
                        <div id="loading" style="display: none;">
                            <img src="../assets/images/loading.gif">
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <script>
            function load_account_member() {
                $(".list_account").hide();
                $("#loading").show();
                $.post("../assets/ajax/member.php", {
                        page: page,
                        username: username,
                        idus: idus
                    })
                    .done(function(data) {
                        $(".list_account").html('');
                        $('.list_account').empty().append(data);
                        $("#loading").hide();
                        $(".list_account").show();
                    });
            }

            function fitler() {
                idus = $("#idus").val();
                username = $("#username").val();
                load_account_member();
            }


            load_account_member();
        </script>

    </div>
</div>