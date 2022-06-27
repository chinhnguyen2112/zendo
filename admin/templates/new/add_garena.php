<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">
<link rel="stylesheet" href="/assets/css/admin.css" type="text/css" />


<div class="content-inner1 row_add_gift padding_chung">
    <h3 class="header">Thêm thẻ Garena</h3>
    <form name="frmtintuc" action="" method="post" enctype="multipart/form-data">

        <div class="gray">
            <table width="100%">
                <tr class="second">
                    <td><strong>Loại thẻ</strong></td>
                    <td><select type="number" name="value">
                            <option <?= (!empty($_POST['value']) && $_POST['value'] == 20000 )? 'selected' : '' ?> value="20000">20.000đ</option>
                            <option <?= (!empty($_POST['value']) && $_POST['value'] == 50000 )? 'selected' : '' ?> value="50000">50.000đ</option>
                            <option <?= (!empty($_POST['value']) && $_POST['value'] == 100000 )? 'selected' : '' ?> value="100000">100.000đ</option>
                            <option <?= (!empty($_POST['value']) && $_POST['value'] == 200000 )? 'selected' : '' ?> value="200000">200.000đ</option>
                            <option <?= (!empty($_POST['value']) && $_POST['value'] == 500000 )? 'selected' : '' ?> value="500000">500.000đ</option>
                        </select></td>
                </tr>
                <tr class="second">
                    <td><strong>Mã thẻ</strong></td>
                    <td><input type="number" name="code" value="<?= (!empty($_POST['code']))? $_POST['code'] : '' ?>"></td>
                </tr>
                <tr class="second">
                    <td><strong>Seri</strong></td>
                    <td><input type="number" name="seri"  value="<?= (!empty($_POST['seri']))? $_POST['seri'] : '' ?>"></td>
                </tr>


            </table>
        </div>
        <div class="gray">
        </div>
        <div class="gray">
            <center>

                <input class="button" type="submit" name="submit" value="Thêm" />

            </center>
        </div>
    </form>
    <div class="clr"></div>
</div>
<?php
if ($_POST['code'] > 0) {
    echo 'fffff';
    echo $_POST['seri'];
    if ($_POST['seri'] > 0) {
        $code = $_POST['code'];
        $seri = $_POST['seri'];
        $value = $_POST['value'];
        $time = time();
        $sql_amount = "SELECT * FROM card_garena WHERE code = $code";
        $check_amount = $db->num_rows($sql_amount);
        echo $check_amount;
        if ($check_amount > 0) {
            echo '<script>alert(`Thẻ đã tồn tại`)</script>';
        } else {
            $db->query("INSERT INTO `card_garena` (code,seri,value,status,created_at,updated_at) VALUES ('$code','$seri','$value',0,'$time','$time')"); //  thêm thẻ 
            echo '<script>alert(`Thêm thành công`)</script>';
            new Redirect('/admin/?act=post_garena'); // Trở về trang index
            exit;
        }
    } else {
        echo '<script>alert(`Chưa nhập đủ thông tin`)</script>';
    }
}
?>
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