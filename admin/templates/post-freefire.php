<?php
$select = new Info;
?>

<div class="block block-themed">

    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
        <li class="active">
            <a href="#lmht">LMHT</a>
        </li>
    </ul>


    <div class="block-content tab-content">

        <div class="tab-pane active" id="lmht">

            <form id="data" method="post" enctype="multipart/form-data" class="form-horizontal push-5-t" novalidate="novalidate">

                <div class="form-group">
                    <div class="col-xs-4">
                        <label for="username">Tên đăng nhập</label>
                        <input class="form-control" type="text" id="username" name="username" placeholder="Tên đăng nhập...">
                    </div>
                    <div class="col-xs-4">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" type="text" id="password" name="password" placeholder="mật khẩu...">
                    </div>
                     <div class="col-xs-4"><label for="pet">Pet</label>
                        <select class="form-control" name="pet">
                            <option>---Mời chọn---</option>
                            <option value="0">Không</option>
                            <option value="1">Có</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                      <div class="col-xs-4"><label for="signup">Đăng ký</label>
                        <select class="form-control" name="signup">
                            <option>---Mời chọn---</option>
                            <option value="0">Facebook</option>
                            <option value="1">Vkontakate</option>
                        </select>
                    </div>
                     <div class="col-xs-4"><label for="rank">Rank</label>
                        <select class="form-control" name="rank">
                            <?php
                            for ($i = 0; $i < 9; $i++) {
                                echo '<option value="' . $i . '">' . $select->get_string_rank($i) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label for="code">Code 2fa</label>
                        <input class="form-control" type="text" id="code" name="code" placeholder="Mã code 2fa...">
                    </div>

                </div>


                <div class="form-group">
                    <div class="form-group">
                        <label class="col-xs-12" for="thumb">Ảnh minh họa <b data-toggle="tooltip" data-placement="right" title="Ảnh hiện ở trang ircle"></i></b></label>
                        <div class="col-xs-12">
                            <input class="currency form-control" type="file" name="thumb" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-12" for="gem">Ảnh thông tin<b data-toggle="tooltip" data-placement="right" title="Mỗi ảnh sẽ là một bảng ngọc, có thể up nhiều ảnh"></i></b></label>
                        <div class="col-xs-12">
                            <input class="currency form-control" type="file" name="gem[]" multiple />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12" for="note">Ghi chú <b data-toggle="tooltip" data-placement="right" title="Hiển thị ở trang chủ khi để chuột vào"></i></b></label>
                        <div class="col-xs-12">
                            <textarea class="form-control" id="note" name="note" rows="4" placeholder="Enter để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-xs-12" for="note">Giá bán<b data-toggle="tooltip" data-placement="right" title="Hiển thị ở trang chủ khi để chuột vào"></i></b></label>
                        <div class="col-xs-12">
                            <input class="form-control" id="price" name="price" placeholder="nhập giá bán" type="number" >
                        </div>
                    </div>
                </div>
                <br> <br>
                <div class="form-group">
                    <label class="col-xs-12" for="type_post">Loại</label>
                    <div class="col-xs-12">
                        <label class="css-input css-radio css-radio-warning push-10-r"><input type="radio" name="mega-gender-group" name="type_post" value="0" checked><span></span> Bình thường</label> <label class="css-input css-radio css-radio-warning"><input type="radio" name="mega-gender-group" name="type_post" value="1"><span></span> Quảng cáo</label> <label class="css-input css-radio css-radio-warning"><input type="radio" name="mega-gender-group" name="type_post" value="2"><span></span> Acc ngon</label>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-xs-12">
                        <button class="btn btn-sm btn-success" type="submit" id="submit">Đăng bán</button>
                    </div>
                </div>
            </form>



        </div>

    </div>
</div>
</div>

<script>
    $("form#data").submit(function() {

        var formData = new FormData($(this)[0]);

        $("#submit").prop('disabled', true);
        $.ajax({
            url: '/assets/ajax/post-ff.php',
            type: 'POST',
            data: formData,
            async: false,
            dataType: 'json',
            success: function(data) {
                swal(data.title, data.msg, data.status);
                setTimeout(function() {
                    window.location.href = "/admin/?act=post";
                }, 3000);
            },
            cache: false,
            contentType: false,
            processData: false
        });


        return false;
    });
</script>