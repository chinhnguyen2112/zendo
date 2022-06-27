<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">
<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id > 0) {
    $sql = "SELECT * FROM discount WHERE $id = id";
    $count = $db->fetch_assoc($sql, 1);
}


?>
<div class="row row_add_category mb20">
    <div class="box_add_category padding_chung">
        <h3 class="mb20">Thêm mã giảm giá</h3>
        <div class="add_category_container">
            <form action="/assets/ajax/add_discount.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $count['id'] ?>">
                <div class="form-group">
                    <label>Mã Giảm Giá</label>
                    <input type="text" class="form-control" id="name_discount" name="name_discount" placeholder="Nhập mã...." required="" value="<?= $count['name'] ?>">
                </div>

                <div class="form-group">
                    <label>Giá Trị</label>
                    <input type="text" class="form-control" id="value" name="value" placeholder="Nhập giá trị..." required="" value="<?= $count['value'] ?>">
                </div>

                <div class="form-group">
                    <label>Giá Trị Áp Dụng</label>
                    <input type="text" class="form-control" id="value_use" name="value_use" placeholder="Nhập giá trị áp dụng..." required="" value="<?= $count['value_use'] ?>">
                </div>

                <div class="form-group">
                    <label>Số Lượng Mã</label>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Nhập số lượng mã..." value="<?= $count['amount'] ?>">
                </div>

                
                <button type="submit" class="add_category_btn mt20" style="padding: 10px 20px; background: green; cursor: pointer;"><?php if ($id > 0) {
                                                                                                                                        echo 'Lưu';
                                                                                                                                    } else {
                                                                                                                                        echo 'Thêm';
                                                                                                                                    } ?></button>
            </form>


        </div>
    </div>

</div>

<script src="/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/jquery.validate.min.js"></script>
<script src="https://zendo.vn/assets/slider/freshslider.min.js"></script>
<link rel="stylesheet" href="/assets/css/admin/vendors/typicons/typicons.css">

<script>


</script>