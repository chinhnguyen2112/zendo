<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');

error_reporting(1);
$data_web = 0;


$sql = "SELECT * FROM chuyenmuc";
$count = $db->fetch_assoc($sql, 0);


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

    .select_category select {
        border-radius: 5px;
        background: #2ab665;
        color: #fff;
        padding: 12px;
        font-weight: bold;
    }

    
</style>
<script>
    var page = 1;
    var id = "";
    var name = "";
    var type_acc = "";
    var id_category = 0;
</script>

<link rel="stylesheet" href="/css/zendo_css/zendo.css">

<div class="block block-themed padding_chung">
    <div class="block block-themed title_manager_blog" style="display:flex;align-items: center; justify-content: space-between;">
        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
            <li class="active">
                <a class="main_title" href="#acc">Danh sách Blog</a>
            </li>

        </ul>

        <ul style="margin-bottom: 0 !important; list-style-type: none !important;">
            <li class="select_category" style="width: 200px;">
                <select name="op_category" id="op_category" onchange="fitler()">
                <option selected value="0">Tất cả bài viết</option>
                    <?php foreach ($count as $key => $val) { ?>
                        <option class="" value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                    <?php } ?>
                </select>
            </li>
        </ul>
        <div class="xuat_excel" style="cursor: pointer;">
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
                            <th style="width: 90px;">ID</th>
                            <th class="text-center" style="width: 70px;">Title</th>
                            <th style="width: 100px;">Ngày đăng</th>
                            <th style="width: 30px;">Sửa</th>

                        </tr>

                    </thead>
                    <tbody>


                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">3362</td>
                            <td><a class="link_blog" href="/cach-doi-so-dien-thoai-tai-khoan-garena/" target="_blank">Bỏ túi cách thay đổi số điện thoại tài khoản garena hiệu quả</a></td>
                            <td>09/04/2022</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="?act=add_blog&amp;id=3362" target="_blank">
                                        Sửa
                                    </a>
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
                id_category: id_category
            })
            .done(function(data) {
                $(".list_account").html('');
                $('.list_account').empty().append(data);
                $("#loading").hide();
                $(".list_account").show();
            });
    }

    function change_category() {
        
    }

    function fitler() {
        id_category = $('#op_category').val();
        load_acc();
    }


    load_acc();
</script>