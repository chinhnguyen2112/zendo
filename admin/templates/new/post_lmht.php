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
                        <input class="form-control" type="text" id="username" name="username" placeholder="Tên đăng nhập Garena">
                    </div>
                    <div class="col-xs-4">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" type="text" id="password" name="password" placeholder="Nhap Pass">
                    </div>
                    <div class="col-xs-4">
                        <label for="price">Giá tiền</label>
                        <input class="currency form-control" type="number" id="price" name="price" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="skins_count">Số skin</label>
                        <input class="form-control" type="number" id="skins_count" name="skins_count" placeholder="">
                    </div>
                    <div class="col-xs-6">
                        <label for="champs_count">Số tướng</label>
                        <input class="form-control" type="champs_count" id="champs_count" name="champs_count" placeholder="">
                    </div>

                </div>


                <div class="form-group">
                    <div class="col-xs-4"><label for="rank">Rank</label>
                        <select class="form-control" name="rank">
                            <?php
                            for ($i = 0; $i < 9; $i++) {
                                echo '<option value="' . $i . '">' . $select->get_string_rank($i) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4"><label for="frame">Khung</label>
                            <select class="form-control" name="frame">
                                <?php
                                for ($i = 0; $i < 9; $i++) {
                                    echo '<option value="' . $i . '">' . $select->get_string_frame($i) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4">
                                <label for="ip_count">IP hiện có</label>
                                <input class="currency form-control" type="number" id="ip_count" name="ip_count" value="">

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-12" for="thumb">Ảnh minh họa <b data-toggle="tooltip" data-placement="right" title="Ảnh hiện ở trang chủ"><i class="fa fa-question-circle"></i></b></label>
                        <div class="col-xs-12">
                            <input class="currency form-control" type="file" name="thumb" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-12" for="gem">Ảnh thông tin<b data-toggle="tooltip" data-placement="right" title="Mỗi ảnh sẽ là một bảng ngọc, có thể up nhiều ảnh"><i class="fa fa-question-circle"></i></b></label>
                        <div class="col-xs-12">
                            <input class="currency form-control" type="file" name="gem[]" multiple />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-xs-12" for="skins">Nhập danh sách tên Skins <b data-toggle="tooltip" data-placement="right" title="Phẩy để xuống dòng"><i class="fa fa-question-circle"></i></b></label>
                        <div class="col-xs-12">
                            <textarea class="form-control" id="skins" name="skins" rows="4" placeholder="Nhập danh sách tên vào đây, mỗi tên cách nhau bởi dấu phẩy để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-12" for="champs">Nhập danh sách tên Champs <b data-toggle="tooltip" data-placement="right" title="Phẩy xuống dòng"><i class="fa fa-question-circle"></i></b></label>
                        <div class="col-xs-12">
                            <textarea class="form-control" id="champs" name="champs" rows="4" placeholder="Nhập danh sách tên vào đây, mỗi tên cách nhau bởi dấu phẩy để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-12" for="note">Ghi chú <b data-toggle="tooltip" data-placement="right" title="Hiển thị ở trang chủ khi để chuột vào"><i class="fa fa-question-circle"></i></b></label>
                        <div class="col-xs-12">
                            <textarea class="form-control" id="note" name="note" rows="4" placeholder="Enter để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12"><label for="type_account">Loại Nick</label>
                        <select class="form-control" name="type_account" id="type_account">

                            <option value="Liên Minh Huyền Thoại Việt">
                                Liên Minh Huyền Thoại Việt
                            </option>
                            <option value="Liên Minh Huyền Thoại Hàn Quốc">
                                Liên Minh Huyền Thoại Hàn Quốc
                            </option>
                            <option value="Liên Minh Huyền Thoại NA">
                                Liên Minh Huyền Thoại NA
                            </option>
                            <option value="Liên Minh Huyền Thoại PBE">
                                Liên Minh Huyền Thoại PBE
                            </option>

                        </select>
                    </div>
                    </select>
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
            url: '/assets/ajax/post-lol.php',
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