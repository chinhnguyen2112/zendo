<?php
// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
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

    #page-loader {
            display: none !important;
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
        <div class="block block-themed" style="display:flex;align-items: center;">
            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" style="width: calc(100% - 120px);">
                <li class="active">
                    <a href="#acc">Danh sách Blog</a>
                </li>

                <li class="active">
                    <select name="" id="">
                    <option selected value="0">Tất cả bài viết</option>
                        <?php foreach($count as $key => $val) { ?>
                            <option value="<?=$val['id']?>"><?=$val['name']?></option>
                       <?php } ?>
                    </select>
                </li>
            </ul>

            <div class="xuat_excel" style="    cursor: pointer;">
                <a href="?act=add_blog" target="_blank" class="btn_excel">Thêm mới</a>
            </div>

        </div>
        <div class="block-content tab-content">

            <div class="tab-pane active" id="acc">
                <hr />

                <div style="display: block;" class="list_account"></div>
                <div id="loading">
                    <img src="../assets/images/loading.gif" />
                </div>
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

</div>
</div>
</div>