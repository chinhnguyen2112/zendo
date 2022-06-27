<link rel="stylesheet" href="/css/zendo_css/zendo.css">

<div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">

  <div class="block block-themed">

    <ul class="nav nav-tabs nav-tabs-alt tit_lmht" data-toggle="tabs">
      <li class="active">
        <a href="#lmht">LIÊN MINH TỐC CHIẾN</a>
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

          <div class="form-group flex_center mb20">
            <div class="col-xs-6 pr20">
              <label for="skins_count">Số skin</label>
              <input class="form-control" type="number" id="skins_count" name="skins_count" placeholder="">
            </div>
            <div class="col-xs-6">
              <label for="champs_count">Số tướng</label>
              <input class="form-control" type="champs_count" id="champs_count" name="champs_count" placeholder="">
            </div>

          </div>


          <div class="form-group flex_center space_bet mb20">
            <div class="col-xs-4"><label for="rank">Rank</label>
              <select class="form-control" name="rank">
                <option value="0">Chưa Rank</option>
                <option value="1">Chưa xác định</option>
                <option value="2">Đồng</option>
                <option value="3">Bạc</option>
                <option value="4">Vàng</option>
                <option value="5">Bạch Kim</option>
                <option value="6">Kim Cương</option>
                <option value="7">Cao Thủ</option>
                <option value="8">Thách Đấu</option>
              </select>
            </div>
            <div class="col-xs-4"><label for="frame">Khung</label>
              <select class="form-control" name="frame">
                <option value="0">Không Khung</option>
                <option value="1">Khung Bạc</option>
                <option value="2">Khung Vàng</option>
                <option value="3">Khung Bạch Kim</option>
                <option value="4">Khung Kim Cương</option>
                <option value="5">Khung Cao Thủ</option>
                <option value="6">Khung Thách Đấu</option>
                <option value="7">Khung Tinh Anh</option>
                <option value="8">Chưa Xác Định</option>
              </select>
            </div>

              <div class="col-xs-4">
                <label for="ip_count">IP hiện có</label>
                <input class="currency form-control" type="number" id="ip_count" name="ip_count" value="">

              </div>
          </div>

          <div class="form-group mb20">
            <label class="col-xs-12" for="thumb">Ảnh minh họa <b data-toggle="tooltip" data-placement="right" title="" data-original-title="Ảnh hiện ở trang chủ"><i class="fa fa-question-circle"></i></b></label>
            <div class="col-xs-12">
              <input class="currency form-control" type="file" name="thumb">
            </div>
          </div>

          <div class="form-group mb20">
            <label class="col-xs-12" for="gem">Ảnh thông tin<b data-toggle="tooltip" data-placement="right" title="" data-original-title="Mỗi ảnh sẽ là một bảng ngọc, có thể up nhiều ảnh"><i class="fa fa-question-circle"></i></b></label>
            <div class="col-xs-12">
              <input class="currency form-control" type="file" name="gem[]" multiple="">
            </div>
          </div>


          <div class="form-group mb20">
            <label class="col-xs-12" for="skins">Nhập danh sách tên Skins <b data-toggle="tooltip" data-placement="right" title="" data-original-title="Phẩy để xuống dòng"><i class="fa fa-question-circle"></i></b></label>
            <div class="col-xs-12">
              <textarea class="form-control" id="skins" name="skins" rows="4" placeholder="Nhập danh sách tên vào đây, mỗi tên cách nhau bởi dấu phẩy để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
            </div>
          </div>

          <div class="form-group mb20">
            <label class="col-xs-12" for="champs">Nhập danh sách tên Champs <b data-toggle="tooltip" data-placement="right" title="" data-original-title="Phẩy xuống dòng"><i class="fa fa-question-circle"></i></b></label>
            <div class="col-xs-12">
              <textarea class="form-control" id="champs" name="champs" rows="4" placeholder="Nhập danh sách tên vào đây, mỗi tên cách nhau bởi dấu phẩy để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
            </div>
          </div>

          <div class="form-group mb20">
            <label class="col-xs-12" for="note">Ghi chú <b data-toggle="tooltip" data-placement="right" title="" data-original-title="Hiển thị ở trang chủ khi để chuột vào"><i class="fa fa-question-circle"></i></b></label>
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
      </div>
      <br> <br>
      <div class="form-group padding_chung mb20">
        <label class="col-xs-12" for="type_post">Loại</label>
        <div class="col-xs-12 mt20">
          <label class="css-input css-radio css-radio-warning push-10-r pr20"><input type="radio" name="mega-gender-group" value="0" checked=""><span></span> Bình thường</label> <label class="css-input css-radio css-radio-warning pr20"><input type="radio" name="mega-gender-group" value="1"><span></span> Quảng cáo</label> <label class="css-input css-radio css-radio-warning"><input type="radio" name="mega-gender-group" value="2"><span></span> Acc ngon</label>
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