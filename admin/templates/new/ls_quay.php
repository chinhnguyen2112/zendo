




<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">

<div class="row row_ls_quay padding_chung">
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
                            <a href="#acc">Danh sách lịch sử quay</a>
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
                                    <input class="form-control" placeholder="ID Người dùng" id="id_user" name="id_user" value="">
                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                            <div class="col-lg-4" style="width:33%;margin-bottom:6px">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Tên phần thưởng" id="name_gift" name="name_gift" value="">
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
                                        <th style="width: 90px;">ID</th>
                                        <th class="text-center" style="width: 70px;">Loại vòng quay</th>
                                        <th>Phần thưởng</th>
                                        <th style="width: 100px;">ID Gift</th>
                                        <th class="text-center" style="width: 100px;">Thời gian quay</th>

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
    </div>
</div>

<script>
    
    load_acc();
    var page = 1;
            var id = "";
            var  id_user = '';
            var  name_gift = '';
    function fitler() {
        id_user = $("#id_user").val();
        name_gift = $('#name_gift').val();
        load_acc();
    }

    function load_acc() {
        // $(".list_account").hide();
        // $("#loading").show();
        $.post("../assets/ajax/ls_quay.php", {
                page: page,
                id_user: id_user,
                name_gift: name_gift,
            })
            .done(function(data) {
                $(".list_account").html('');
                $('.list_account').empty().append(data);
                $("#loading").hide();
                $(".list_account").show();
            });
    }
</script>