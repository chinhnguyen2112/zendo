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
<div class="content content-boxed row_category padding_chung">
    <div class="block block-themed">
        <div class="block block-themed" style="display:flex;align-items: center;">
            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" style="width: calc(100% - 120px);">
                <li class="active">
                    <a href="#acc">Danh sách mã giảm giá</a>
                </li>
            </ul>
            <div class="xuat_excel" style="    cursor: pointer;">
                <a href="?act=add_discount" target="_blank" class="btn_excel">Thêm mới</a>
            </div>

        </div>
        <div class="block-content tab-content">

            <div class="tab-pane active" id="acc">
                <hr />
                <div style="display: block;" class="list_account">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">STT</th>
                                <th style="width: 90px;">ID</th>
                                <th class="text-center" style="width: 70px;">Mã Giảm Giá</th>
                                <th class="text-center" style="width: 70px;">Giá Trị</th>
                                <th class="text-center" style="width: 70px;">Giá Trị Áp Dụng</th>
                                <th style="width: 100px;">Ngày tạo</th>
                                <th style="width: 30px;">Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sql = "SELECT * FROM discount";
                            $count = $db->fetch_assoc($sql, 0);
                            foreach ($count as $key => $val) { ?>
                                <tr>
                                    <th class="text-center" style="width: 50px;"><?= ++$key ?></th>
                                    <th style="width: 90px;"><?= $val['id'] ?></th>
                                    <th class="text-center" style="width: 70px;"><?= $val['name'] ?></th>
                                    <th class="text-center" style="width: 70px;"><?= $val['value'] ?></th>
                                    <th class="text-center" style="width: 70px;"><?= $val['value_use'] ?></th>
                                    <th style="width: 100px;"><?= date('d-m-Y', $val['created_at']) ?></th>
                                    <th style="width: 30px; cursor: pointer;">
                                    <div class="btn-group">
                            <a href="?act=add_discount&id=<?=$val['id']?>" target="_blank">
                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sửa mã giảm giá"><i class="fa fa-pencil"></i>Sửa</button>
                            </a>

                        </div>
                                </th>

                                </tr>
                            <?php }
                            ?>

                        </tbody>

                    </table>


                </div>



            </div>
        </div>
    </div>

</div>
</div>
</div>