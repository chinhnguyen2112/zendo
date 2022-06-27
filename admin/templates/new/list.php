<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">

<div class="row row_acc">
    <div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4 full_width">
        <style>
            .btn_excel {
                padding: 15px 20px;
                background: #2ab665;
                border-radius: 5px;
                font-size: 15px;
                color: #fff;
                font-weight: 700;
            }
        </style>
        <script>
            var page = 1;
            var id = "";
            var name = "";
            var type_acc = "";
        </script>
        <div class="content content-boxed">
            <div class="block block-themed">
                <div class="block block-themed mb20" style="display:flex">
                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" style="width: calc(100% - 120px);">
                        <li class="active">
                            <a href="#acc">Danh sách tài khoản</a>
                        </li>
                    </ul>
                    <div class="xuat_excel" style="    cursor: pointer;">
                        <a href="/assets/ajax/xuat_excel.php" class="btn_excel">Xuất Excel</a>
                    </div>

                </div>
                <div class="block-content tab-content">

                    <div class="tab-pane active" id="acc">
                        <div class="row flex_center">
                            <div class="col-lg-4" style="width:33%; margin-bottom:6px">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Mã số" id="id" name="id" value="">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-4" style="width:33%;margin-bottom:6px">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Tên tài khoản" id="name" name="name" value="">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->

                            <span class="input-group-btn">
                                <button class="btn btn-default white_text" type="button" onclick="fitler();"><i class="si si-magnifier"></i> Tìm kiếm</button>
                            </span>

                        </div><!-- /.row -->
                        <hr>

                        <div style="display: block;" class="list_account">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th style="width: 90px;">Mã Số</th>
                                        <th class="text-center" style="width: 70px;">Username/Pwd</th>
                                        <th>Loại</th>
                                        <th>Giá bán</th>
                                        <th style="width: 100px;">Ngày đăng</th>
                                        <th class="text-center" style="width: 100px;">Thao tác</th>

                                    </tr>
                                </thead>
                                <tbody>



                                </tbody>

                            </table>

                            <div class="page_account">
                                <p onclick="page=1;load_acc()" class="active">1</p>
                                <p onclick="page=2;load_acc()">2</p>
                                <p onclick="page=3;load_acc()">3</p>
                                <p onclick="page=4;load_acc()">4</p>
                                <p onclick="page=5;load_acc()">5</p>
                                <p onclick="page=14;load_acc()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
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
            function xuat_excel() {
                alert(1)
                id = $("#id").val();
                type_acc = $("#type_acc").val();
                name = $('#name').val();
                $.post("../assets/ajax/xuat_excel.php", {
                        page: page,
                        id: id,
                        type_acc: type_acc,
                        name: name
                    })
                    .done(function(data) {
                        $(".list_account").show();
                    });
            }

            function load_acc() {
                $(".list_account").hide();
                $("#loading").show();
                $.post("../assets/ajax/list_acc.php", {
                        page: page,
                        id: id,
                        type_acc: type_acc,
                        name: name
                    })
                    .done(function(data) {
                        $(".list_account").html('');
                        $('.list_account').empty().append(data);
                        $("#loading").hide();
                        $(".list_account").show();
                    });
            }

            function fitler() {
                id = $("#id").val();
                type_acc = $("#type_acc").val();
                name = $('#name').val();
                load_acc();
            }

            function delete_acc(id) {
                var result = confirm("Bạn có chắc chắn muốn xoá ?");
                if (result) {
                    window.location = "/admin/?act=list&tt=delete_acc&id=" + id;
                }
                load_acc();
            }

            load_acc();
        </script>

    </div>
</div>