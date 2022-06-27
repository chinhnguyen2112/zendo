<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">

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

<?php
$sql = "SELECT * FROM gift";
$arr_gift = $db->fetch_assoc($sql, 0);
?>


<div class="content content-boxed row_gift">
    <div class="block block-themed padding_chung">
        <div class="block block-themed mb20" style="display:flex;align-items: center;">
            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" style="width: calc(100% - 120px);">
                <li class="active">
                    <a href="#acc">Danh sách phần thưởng</a>
                </li>
            </ul>
            <div class="xuat_excel" style="    cursor: pointer;">
                <a href="?act=add_gift" target="_blank" class="btn_excel">Thêm mới</a>
            </div>

        </div>
        <div class="block-content tab-content">

            <div class="tab-pane active" id="acc">
                <div class="row flex_center">
                    <div class="col-lg-4" style="width:33%;margin-bottom:6px">
                        <div class="input-group">
                            <input class="form-control" placeholder="ID Phần Quà" id="id" name="id" value="">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-4" style="width:33%;margin-bottom:6px">
                        <div class="input-group flex_center">
                            <input class="form-control mr20" placeholder="Tên Phần Quà" id="name" name="name" value="">
                            <span class="input-group-btn mt7">
                                <button class="btn btn-default" type="button" onclick="fitler();"><i class="si si-magnifier"></i> Tìm Kiếm</button>
                            </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <hr />

                <div style="display: block;" class="list_account"></div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">stt</th>
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
                        <?php foreach ($arr_gift as $key => $val) { ?>
                            <tr>
                                <td class="text-center"><?= ++$key ?></td>
                                <td><?= $val['id'] ?></td>
                                <td><?= $val['name'] ?></td>
                                <!-- <td><a href="/<?= $val['image'] ?>" target="_blank"><?= $val['image'] ?></a></td> -->
                                <td><?= $val['type'] ?></td>
                                <td><?= $val['vip'] ?></td>
                                <td><?= $val['stt'] ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="?act=add_gift&id=<?= $val['id'] ?>" target="_blank">
                                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sửa phần thưởng"><i class="fa fa-pencil"></i>Sửa</button>
                                        </a>
                                        <span onclick="delete_gift(<?= $val['id'] ?>)">
                                            <button class="btn btn-xs btn-default" type="button" onclick="delete_gift(<?= $val['id'] ?>)" data-toggle="tooltip" title="Xóa phần thưởng"><i class="fa fa-times"></i> Xóa</button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
                <div id="loading">
                    <img src="../assets/images/loading.gif" />
                </div>
            </div>



        </div>
    </div>
</div>


</div>
</div>
</div>
<script>
    function delete_gift(id) {
        var result = confirm("Bạn có chắc chắn muốn xoá ?");
        if (result) {
            window.location = "/assets/ajax/delete_gift.php?id=" + id;
        }
    }
</script>