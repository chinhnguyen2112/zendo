<link rel="stylesheet" href="/assets/css/admin.css" type="text/css" />
<?php if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM baiviet WHERE id ='$id'";
    $row = $db->fetch_assoc($sql, 1);
} ?>
<h3 class="header">Thêm bài viết</h3>
<div class="content-inner1">
    <form name="frmtintuc" action="/assets/ajax/add_blog.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" hidden value="<?= (isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0; ?>" />
        <div class="gray">
            <table width="100%">
                <tr>
                    <td width="150"><strong> H1 (50 > 70 kí tự)</strong></td>
                    <td><input type="text" name="title" value="<?= (isset($row)) ? $row['title'] : ''; ?>" /></td>
                </tr>
                <tr>
                    <td width="150"><strong>Title (50 > 60 kí tụ)</strong></td>
                    <td><input type="text" name="meta_title" value="<?= (isset($row)) ? $row['meta_title'] : ''; ?>" /></td>
                </tr>
                <tr>
                    <td width="150"><strong>Keyword</strong></td>
                    <td><input type="text" name="meta_key" id="meta_key" value="<?= (isset($row)) ? $row['meta_key'] : ''; ?>" oninput="show_alias(this.value)"></td>
                </tr>
                <tr class="second">
                    <td><strong>Đường dẫn thân thiện</strong></td>
                    <td><input type="text" name="alias" value="<?= (isset($row)) ? $row['alias'] : ''; ?>" id="alias" readonly /></td>
                </tr>
                <tr>
                    <td width="150"><strong>SEO Description (140 > 155 kí tự)</strong></td>
                    <td><textarea rows="4" cols="70" name="meta_des"> <?= (isset($row)) ? $row['meta_des'] : ''; ?></textarea></td>
                </tr>
                <tr class="second">
                    <td><strong>Ảnh đại diện</strong></td>
                    <td><input type="file" name="image" value=""></td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Mô tả</strong><br />
                        <textarea rows="5" cols="90" name="sapo" id="sapo" /><?= (isset($row)) ? $row['sapo'] : ''; ?></textarea>
                    </td>
                <tr>
                    <td colspan="2">
                        <strong>Nội dung</strong>
                        <textarea rows="5" cols="70" name="content" id="editor" /><?= (isset($row)) ? $row['content'] : ''; ?>"</textarea>
                    </td>
                </tr>

            </table>
        </div>
        <div class="gray">
        </div>
        <div class="gray">
            <center>

                <input class="button" type="submit" name="submit" value="Đăng bài" />


            </center>
        </div>
    </form>
    <div class="clr"></div>
</div>
<script src="https://chonaccngon.com/assets/js/core/jquery.min.js"></script>
<script src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    jQuery(function($) {

        $.datepicker.regional['vi'] = {

            closeText: 'Đóng',

            prevText: '&#x3c;Trước',

            nextText: 'Tiếp&#x3e;',

            currentText: 'Hôm nay',

            monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',

                'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'
            ],

            monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',

                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
            ],

            dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],

            dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

            dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],

            weekHeader: 'Tu',

            dateFormat: 'dd-mm-yy',

            firstDay: 0,

            isRTL: false,

            showMonthAfterYear: false,

            yearSuffix: ''
        };

        $.datepicker.setDefaults($.datepicker.regional['vi']);
    });
    $(function() {
        $("#created_day").datepicker();
        $.datepicker.setDefaults($.datepicker.regional['vi']);
        $('#findkey').keypress(function(e) {
            if (e.which === 13) {
                e.preventDefault();
                $.ajax({

                    url: "/admin/ajaxgetlistarticle",
                    type: "POST",
                    data: {
                        findkey: $('#findkey').val()
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $("#boxLoading").show();
                    },
                    success: function(obj) {
                        var result = obj;
                        if (result.length > 0) {
                            var strhtml = '';
                            for (var i = 0; i < result.length; i++) {
                                strhtml += "<li><a href='" + result[i].alias + "-b" + result[i].id + ".html'>" + result[i].title + "</a></li>";


                            }
                            document.getElementById('listnewest').innerHTML = strhtml;
                        }

                    },
                    error: function(xhr) {
                        alert("error");
                    },
                    complete: function() {
                        $("#boxLoading").hide();
                    }
                });
            }
        });
    });

    function get_alias(str) {
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
        str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
        str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
        str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
        str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
        str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
        str = str.replace(/Đ/g, "D");
        str = str.replace(/[^0-9a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ\s]/gi, ' ');
        str = str.replace(/\s+/g, '-');
        str = str.toLowerCase();
        return str;
    }

    function show_alias(str) {
        var alias = get_alias(str);
        $("#alias").val(alias);
    }
</script>
<!-- Tích hợp jck soạn thảo-->
<script defer type="text/javascript">
    //<![CDATA[
    CKEDITOR.replace('editor');
    //]]>
</script>
<script defer type="text/javascript">
    //<![CDATA[
    CKEDITOR.replace('content_suggest');
    //]]>
</script>
<script defer type="text/javascript">
    //<![CDATA[
    CKEDITOR.replace('sapo');
    //]]>
</script>