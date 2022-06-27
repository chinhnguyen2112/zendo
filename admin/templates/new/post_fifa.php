<link rel="stylesheet" href="/css/zendo_css/zendo.css">

<div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">

  <div class="block block-themed">

    <ul class="nav nav-tabs nav-tabs-alt tit_lmht" data-toggle="tabs">
      <li class="active">
        <a href="#lmht">Fifa online 4</a>
      </li>
    </ul>


    <div class="block-content tab-content">

      <div class="tab-pane active padding_chung" id="lmht">

        <form id="data" method="post" enctype="multipart/form-data" class="form-horizontal push-5-t" novalidate="novalidate">

          <div class="form-group flex_center space_bet mb20">
            <div class="col-xs-4 pr20">
              <label for="username">Tên đăng nhập</label>
              <input class="form-control" type="text" id="username" name="username" placeholder="Tên đăng nhập Garena">
            </div>
            <div class="col-xs-4 pr20">
              <label for="password">Mật khẩu</label>
              <input class="form-control" type="text" id="password" name="password" placeholder="Nhap Pass">
            </div>
            <div class="col-xs-4">
              <label for="price">Giá tiền</label>
              <input class="currency form-control" type="number" id="price" name="price" value="">
            </div>
          </div>

          <div class="form-group mb20">
            <label class="col-xs-12" for="thumb">Ảnh đại diện <b data-toggle="tooltip" data-placement="right" title="" data-original-title="Ảnh hiện ở trang chủ"><i class="fa fa-question-circle"></i></b></label>
            <div class="col-xs-12">
              <input class="currency form-control" type="file" name="thumb">
            </div>
          </div>

          <div class="form-group mb20">
            <label class="col-xs-12" for="data">Ảnh thông tin<b data-toggle="tooltip" data-placement="right" title="" data-original-title="Mỗi ảnh sẽ là một thông tin, có thể up nhiều ảnh"><i class="fa fa-question-circle"></i></b></label>
            <div class="col-xs-12">
              <input class="currency form-control" type="file" name="data[]" multiple="">
            </div>
          </div>


          <div class="form-group mb20">
            <label class="col-xs-12" for="skins">Giá trị đội hình<b data-toggle="tooltip" data-placement="right" title="" data-original-title="Phẩy để xuống dòng"><i class="fa fa-question-circle"></i></b></label>
            <div class="col-xs-12">
              <textarea class="form-control" id="skins" name="skins" rows="4" placeholder="Giá trị đội hình" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
            </div>
          </div>

          <div class="form-group mb20">
            <label class="col-xs-12" for="champs">BP hiện có <b data-toggle="tooltip" data-placement="right" title="" data-original-title="Phẩy xuống dòng"><i class="fa fa-question-circle"></i></b></label>
            <div class="col-xs-12">
              <textarea class="form-control" id="champs" name="champs" rows="4" placeholder="RP hiện có" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
            </div>
          </div>

          <div class="form-group mb20">
            <label class="col-xs-12" for="note">Ghi chú <b data-toggle="tooltip" data-placement="right" title="" data-original-title="Hiển thị ở trang chủ khi để chuột vào"><i class="fa fa-question-circle"></i></b></label>
            <div class="col-xs-12">
              <textarea class="form-control" id="note" name="note" rows="4" placeholder="Enter để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
            </div>
          </div>
      </div>
      <br> <br>
      <div class="form-group padding_chung mb20">
        <label class="col-xs-12" for="type_post">Loại</label>
        <div class="col-xs-12 mt20">
          <label class="css-input css-radio css-radio-warning push-10-r pr20">
            <input type="radio" name="type_post" value="3" checked="">
            <span></span> Bình thường
          </label>
          <label class="css-input css-radio css-radio-warning pr20">
            <input type="radio" name="type_post" value="0">
            <span></span> Quảng cáo</label>
          <label class="css-input css-radio css-radio-warning pr20">
            <input type="radio" name="type_post" value="1">
            <span></span> Acc vip</label>
          <label class="css-input css-radio css-radio-warning">
            <input type="radio" name="type_post" value="2">
            <span></span> Acc ngon
          </label>
          <label class="css-input css-radio css-radio-warning">
            <input type="radio" name="type_post" value="4">
            <span></span> Acc chưa định giá
          </label>
        </div>
      </div>


      <div class="form-group padding_chung mb20">
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
      url: '/assets/ajax/post-fifa.php',
      type: 'POST',
      data: formData,
      async: false,
      dataType: 'json',
      success: function(data) {
        swal(data.title, data.msg, data.status);
        setTimeout(function() {
          if (data.status == 'success') {
            window.location.href = "/sitemap.php?type=account";
          }
        }, 3000);
      },
      cache: false,
      contentType: false,
      processData: false
    });


    return false;
  });
</script>