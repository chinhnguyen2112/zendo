<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">
<link rel="stylesheet" href="/assets/css/admin.css" type="text/css" />


<div class="content-inner1 row_add_gift padding_chung">
    <?php if (isset($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM gift WHERE id ='$id'";
        $row_gift = $db->fetch_assoc($sql, 1);
    } ?>

    <h3 class="header">Thêm bài viết</h3>
    <form name="frmtintuc" action="/assets/ajax/add_gift.php" method="post" enctype="multipart/form-data">

        <div class="gray">
            <table width="100%">
                <input type="hidden" name="id" hidden value="<?= (isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0; ?>" />
                <tr>
                    <td width="150"><strong>name</strong></td>
                    <td><input type="text" name="name" value="<?= (isset($row_gift)) ? $row_gift['name'] : ''; ?>" /></td>
                </tr>
                <tr class="second">
                    <td><strong>Ảnh phần quà</strong></td>
                    <td>
                        <img src="/<?= (isset($row_gift)) ? $row_gift['image'] : ''; ?>" id="img_gift" alt="Img" class="q-header-logo img-max">
                        <input id="image" name="image" class="fileupload img_random" onchange="preview_image(event, this);" type="file">
                    </td>
                </tr>
                <tr class="second">
                    <td><strong>Type</strong></td>
                    <td><select type="number" name="type" value="<?= (isset($row_gift)) ? $row_gift['type'] : ''; ?>">
                            <option <?= (isset($row_gift) && $row_gift['type'] == 'luotquay_free') ?  "selected" : '' ?> value="luotquay_free">Lượt quay free</option>
                            <option <?= (isset($row_gift) && $row_gift['type'] == 'luotquay') ?  "selected" : '' ?> value="luotquay">Lượt quay acc</option>
                            <option <?= (isset($row_gift) && $row_gift['type'] == 'luotquay9k') ?  "selected" : '' ?> value="luotquay9k">Lượt quay quân huy</option>
                            <option <?= (isset($row_gift) && $row_gift['type'] == 'luotquay20k') ?  "selected" : '' ?> value="luotquay20k">Lượt quya skins</option>
                        </select></td>
                </tr>
                <tr class="second">
                    <td><strong>Tỉ lệ (%)</strong></td>
                    <td><input type="text" name="vip" value="<?= (isset($row_gift)) ? $row_gift['vip'] : ''; ?>"></td>
                </tr>
                <tr class="second">
                    <td><strong>Số thứ tự</strong></td>
                    <td><input type="number" name="stt" value="<?= (isset($row_gift)) ? $row_gift['stt'] : ''; ?>"></td>
                </tr>

                <tr class="second">
                    <td><strong>Giá bán Zen</strong></td>
                    <td><input type="number" name="zen" value="<?= (isset($row_gift)) ? $row_gift['zen'] : 0; ?>"></td>
                </tr>

                <tr class="second">
                    <td><strong>Mức áp dụng (áp dụng với các loại voucher hoặc số lượng mảnh đổi đổi quà) </strong></td>
                    <td><input type="number" name="value_use" value="<?= (isset($row_gift)) ? $row_gift['value_use'] : 0; ?>"></td>
                </tr>
                <tr class="second">
                    <td><strong>Giá trị áp dụng (áp dụng với các loại voucher...) </strong></td>
                    <td><input type="number" name="value" value="<?= (isset($row_gift)) ? $row_gift['value'] : 0; ?>"></td>
                </tr>
                <tr class="second">
                    <td><strong>Loại vật phẩm (1 là vật phẩm trong game, 2 là vật phẩm ngoài game, 0 là vật phẩm không hiển thị như lượt quay, zen ... ) </strong></td>
                    <td><input type="number" name="type_item" value="<?= (isset($row_gift)) ? $row_gift['type_item'] : 0; ?>"></td>
                </tr>
                <tr class="second">
                    <td><strong>Mô tả </strong></td>
                    <td><textarea style="width:100%;height:200px" name="des" value=""><?= (isset($row_gift)) ? $row_gift['des'] : ""; ?></textarea></td>
                </tr>

            </table>
        </div>
        <div class="gray">
        </div>
        <div class="gray">
            <center>

                <input class="button" type="submit" name="submit" value="Cập nhật" />

            </center>
        </div>
    </form>
    <div class="clr"></div>
</div>
<script>
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
                        $('#img_gift').attr("src", image);
                    };
                })(file);
                reader.readAsDataURL(file);
            }
        }
    }
</script>