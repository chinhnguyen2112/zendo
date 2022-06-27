<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">
<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id > 0) {
    $sql = "SELECT * FROM chuyenmuc WHERE $id = id";
    $count = $db->fetch_assoc($sql, 1);
}


?>
<div class="row row_add_category mb20">
    <div class="box_add_category padding_chung">
        <h3 class="mb20">Thêm chuyên mục</h3>
        <div class="add_category_container">
            <form action="/assets/ajax/add_category.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $count['id'] ?>">
                <div class="form-group">
                    <label>Tên Chuyên Mục</label>
                    <input type="text" class="form-control" id="name_category" name="name_category" placeholder="Tên Chuyên Mục" required="" value="<?= $count['name'] ?>">
                </div>

                <div class="form-group">
                    <label>Đường dẫn</label>
                    <input type="text" class="form-control" id="alias" name="alias" placeholder="Đường dẫn" required="" value="<?= $count['alias'] ?>">
                </div>

                <div class="form-group">
                    <label>Thêm ảnh</label>
                    <input onchange="preview_image(event,this)" type="file" class="form-control" id="image" name="image" <?php if ($count['id'] > 0) {
                                                                                                                                echo '';
                                                                                                                            } else {
                                                                                                                                echo 'required=""';
                                                                                                                            } ?>>
                    <img style="width: 60%; height: auto;" class="category_img mt20" src="/<?= $count['image'] ?>" alt="category_img">
                </div>
                <button type="submit" class="add_category_btn mt20" style="padding: 10px 20px; background: green; cursor: pointer;"><?php if ($id > 0) {
                                                                                                                                        echo 'Lưu';
                                                                                                                                    } else {
                                                                                                                                        echo 'Thêm Chuyên Mục';
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
    // xem truoc anh truoc khi upload

    function preview_image(e, element) {
        var _URL = window.URL || window.webkitURL;
        var file, img;
        preview_before_upload(e, element);
    }

    function preview_before_upload(event, elem) {
        if (typeof FileReader == "undefined") return true;
        var elem = $(elem);
        var files = event.target.files;
        for (var i = 0, file; file = files[i]; i++) {
            if (file.type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(event) {
                        var image = event.target.result;
                        $('.category_img').attr("src", image);
                    };
                })(file);
                reader.readAsDataURL(file);
            }
        }
    }
</script>