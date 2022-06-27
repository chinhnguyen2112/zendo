<div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">
    <div class="block block-themed">

        <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
            <li class="active">
                <a href="#lmht">Đăng acc CF</a>
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
                        <div class="form-group">
                            <label class="col-xs-12" for="thumb">Ảnh minh họa <b data-toggle="tooltip" data-placement="right" title="Ảnh hiện ở trang chủ"><i class="fa fa-question-circle"></i></b></label>
                            <div class="col-xs-12">
                                <input class="currency form-control" type="file" name="thumb" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12" for="gem">Ảnh thông tin<b data-toggle="tooltip" data-placement="right" title="Mỗi ảnh sẽ là một bảng ngọc, có thể up nhiều ảnh"><i class="fa fa-question-circle"></i></b></label>
                            <div class="col-xs-12">
                                <input class="currency form-control" type="file" name="data[]" multiple />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12" for="note">Ghi chú <b data-toggle="tooltip" data-placement="right" title="Hiển thị ở trang chủ khi để chuột vào"><i class="fa fa-question-circle"></i></b></label>
                            <div class="col-xs-12">
                                <textarea class="form-control" id="note" name="note" rows="4" placeholder="Enter để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
                            </div>
                        </div>
                    </div>
                    <br> <br>
                    <div class="form-group">
                        <label class="col-xs-12" for="type_post">Loại</label>
                        <div class="col-xs-12">
                            <label class="css-input css-radio css-radio-warning push-10-r"><input type="radio" name="mega-gender-group" name="type_post" value="3" checked><span></span> Bình thường</label>
                            <label class="css-input css-radio css-radio-warning"><input type="radio" name="mega-gender-group" name="type_post" value="0"><span></span> Acc vip</label>
                            <label class="css-input css-radio css-radio-warning"><input type="radio" name="mega-gender-group" name="type_post" value="1"><span></span> Quảng cáo</label>
                            <label class="css-input css-radio css-radio-warning"><input type="radio" name="mega-gender-group" name="type_post" value="2"><span></span> Acc ngon</label>
                            <label class="css-input css-radio css-radio-warning"><input type="radio" name="mega-gender-group" name="type_post" value="4"><span></span> Acc chưa định giá</label>
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
            url: '/assets/ajax/post-cf.php',
            type: 'POST',
            data: formData,
            async: false,
            dataType: 'json',
            success: function(data) {
                if (data.status == 'success') {
                    swal(data.title, data.msg, data.status);
                    setTimeout(function() {
                        if (data.status = 'success') {
                            window.location.href = "/sitemap.php?type=account";
                        }
                    }, 3000);

                } else if (data.status == 'error') {

                    swal(data.title, data.msg, data.status);

                }
            },
            cache: false,
            contentType: false,
            processData: false
        });


        return false;
    });
</script>