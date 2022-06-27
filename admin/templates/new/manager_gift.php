<?php
error_reporting(1);
$data_web = 0;

?>

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

<link rel="stylesheet" href="/css/zendo_css/zendo.css">

<div class="block block-themed padding_chung">
    <div class="block block-themed title_manager_blog" style="display:flex;align-items: center;">
        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" style="width: calc(100% - 120px);">
            <li class="active">
                <a class="main_title" href="#acc">Danh sách Phần quà</a>
            </li>
        </ul>
        <div class="xuat_excel" style="    cursor: pointer;">
            <a href="?act=add_blog" target="_blank" class="btn_excel">Thêm mới</a>
        </div>

    </div>
    <div class="block-content tab-content">

        <div class="tab-pane active" id="acc">
            <hr style="display: none;">

            <div style="display: block;" class="list_account">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">STT</th>
                            <th class="text-center" style="width: 50px;">ID</th>
                            <th class="text-center">Name</th>
                            <!-- <th class="text-center">Image</th> -->
                            <th class="text-center" style="width: 50px;">Type</th>
                            <th class="text-center" style="width: 50px;">Vip</th>
                            <th class="text-center" style="width: 50px;">Vị trí</th>
                            <th class="text-center" style="width: 50px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>1</td>
                            <td>Voucher giảm 100.000đ khi mua acc từ 500.000đ</td>
                            <!-- <td><a href="/assets/img_gift/500 1.png" target="_blank">assets/img_gift/500 1.png</a></td> -->
                            <td>luotquay</td>
                            <td>16.8</td>
                            <td>1</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="?act=add_gift&amp;id=1" target="_blank">
                                        <p class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Sửa phần thưởng"><i class="fa fa-pencil"></i> Sửa</p>
                                    </a>
                                    <span onclick="delete_gift(1)">
                                        <p class="btn btn-xs btn-default" type="button" onclick="delete_gift(1)" data-toggle="tooltip" title="" data-original-title="Xóa phần thưởng"><i class="fa fa-times"></i>Xóa</p>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
                <div class="page_account">
                    <p onclick="page=1;load_acc()" class="active">1</p>
                    <p onclick="page=2;load_acc()">2</p>
                    <p onclick="page=2;load_acc()"><i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                </div>



            </div>
            <div id="loading" style="display: none;">
                <img src="../assets/images/loading.gif">
            </div>
        </div>



    </div>
</div>

<script>
    function load_acc() {
        $(".list_account").hide();
        $("#loading").show();
        $.post("/assets/ajax/list_blog.php", {
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