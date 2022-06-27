<?php
// Trạng thái website
$sql_get_stt_web = "SELECT * FROM settings";
if ($db->num_rows($sql_get_stt_web)) {
$data_web = $db->fetch_assoc($sql_get_stt_web, 1);
}


?>
<div class="block block-themed">
<div class="block-header bg-info">
<h3 class="block-title">Cài đặt chung</h3>
</div>
<div class="block-content">
<form class="form-horizontal push-5-t" id="site-setting" novalidate="novalidate">

<div class="form-group">
<label class="col-xs-12" for="title">Tiêu đề trang web</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="title" name="title" placeholder="Mua bán acc LMHT uy tín" value="<?php echo $data_web['title']; ?>">
</div>
</div>
<div class="form-group">
<label class="col-xs-12" for="keywords">Từ khóa tìm kiếm</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="keywords" name="keywords" placeholder="Ban acc lmht, acc liên minh giá rẻ, mua bán acc" value="<?php echo $data_web['keywords']; ?>">
</div>
</div>
<div class="form-group">
<label class="col-xs-12" for="descr">Giới thiệu trang web</label>
<div class="col-xs-12">
<textarea class="form-control" id="descr" name="descr" rows="7" placeholder="Nhập giới thiệu trang web (demo: Bán acc liên minh giá rẻ)"><?php echo $data_web['descr']; ?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-xs-12" for="name_admin">Tên Admin</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="name_admin" name="name_admin" placeholder="An Thien" value="<?php echo $data_web['name_admin']; ?>">
</div>
</div>
<div class="form-group">
<label class="col-xs-12" for="fb_admin">Facebook Admin</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="fb_admin" name="fb_admin" placeholder="https://www.facebook.com/hieucms" value="<?php echo $data_web['fb_admin']; ?>">
</div>
</div>
<div class="form-group">
<label class="col-xs-12" for="fanpage">Fanpage Facebook</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="fanpage" name="fanpage" placeholder="https://www.facebook.com/hieucms" value="<?php echo $data_web['fanpage']; ?>">
</div>
</div>

<div class="form-group">
<label class="col-xs-12" for="phone_admin">Số điện thoại Admin</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="phone_admin" name="phone_admin" placeholder="+84.1625.49446" value="<?php echo $data_web['phone_admin']; ?>">
</div>
</div>
<div class="form-group">
<label class="col-xs-12" for="video_home">Video ở trang chủ</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="video_home" name="video_home" placeholder="https://www.youtube.com/embed/MdT68-L-TBU" value="<?php echo $data_web['video_home']; ?>">
</div>
</div>
<div class="form-group">
<label class="col-xs-12" for="video_guide">Video hướng dẫn giao dịch tự động</label>
<div class="col-xs-12">
<input class="form-control" type="text" id="video_guide" name="video_guide" placeholder="http://example.com/assets/video.mp4" value="<?php echo $data_web['video_guide']; ?>">
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<label class="css-input switch switch-sm switch-success">
<?php if ($data_web['status'] == '0'): ?>
<input type="checkbox" id="status" name="status" value="1"><span></span> Mở giao dịch
<?php else: ?>
<input type="checkbox" id="status" name="status" value="0"><span></span> Bảo trì trang web
<?php endif; ?>
</label>
</div>
</div>


<div class="form-group">
<div class="col-xs-12">
<button class="btn btn-sm btn-success" type="submit">Lưu lại</button>
</div>
</div>
</form>
</div>
</div>
</div>

<script>
  $(document).ready(function () {
      $("#site-setting").validate({
          rules: {
              decsr: {
                  required: true
              },
              keywords: {
                  required: true
              },
              title: {
                  required: true
              }
          },
          messages: {
              decsr: 'Vui lòng nhập giới thiệu trang web',
              keywords: 'Vui lòng nhập từ khóa tìm kiếm',
              title: 'Vui lòng nhập tiêu đề trang web'
          },
          submitHandler: function (e) {
          $('button[type="submit"]').html("Đang lưu...");
          $.post("/assets/ajax/settings.php", $('#site-setting').serialize(), function(data) {
              $('button[type="submit"]').html("Lưu lại");
              swal(data.title, data.msg, data.status);
              setTimeout(function () {
              window.location.href = "/admin/?act=setting";
              }, 2000);
          }, "json");
              return false;
          }
      });
  });
</script>