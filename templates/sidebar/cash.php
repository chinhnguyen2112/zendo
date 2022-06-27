

<div class="push"><div class="font-s13 font-w600">Số cash đang có</div><div class="font-s13 font-w400 text-muted"><?php echo number_format($data_user['cash'], 0, '.', '.'); ?> <sup class="text-muted">vnđ</sup></div></div>
<!--<div class="block pull-r-l"><div class="bg-gray-lighter block-header"><ul class="block-options"><li><button type="button" data-action="content_toggle" data-toggle="block-option"></button></ul><h3 class=block-title>Nạp Tài khoản</h3></div><div class="block-content">-->


<!--<form class="form-horizontal push-5-t" id="card-charing" novalidate="novalidate">-->
<!--<div class="form-group">-->
<!--<div class="col-xs-12">-->
<!--<input class="form-control" type="text" id="serial" name="serial" placeholder="Nhập mã seri">-->
<!--</div>-->
<!--</div>-->
<!--<div class="form-group">-->
<!--<div class="col-xs-12">-->
<!--<input class="form-control" type="text" id="code" name="code" placeholder="Nhập mã pin">-->
<!--</div>-->
<!--</div>-->
<!--<div class="form-group">-->
<!--<div class="col-xs-12">-->
<!--<select name="type" class="form-control">-->
<!--    <option value="viettel">VIETTEL</option>-->
<!--    <option value="mobi">MOBIPHONE</option>-->
<!--    <option value="vina">VINAPHONE</option>-->
<!--    <option value="vnmobile">VNMOBILE</option>-->
<!--    <option value="vcoin">VCOIN</option>-->
<!--    <option value="bit">BIT</option>-->
<!--    <option value="gate">GATE</option>-->
<!--    <option value="megacard">MEGACARD</option>-->
<!--</select>-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group">-->
<!--<div class="col-xs-12">-->
<!--<button class="btn btn-sm btn-success" id="paycard" type="submit"><i class="fa fa-plus push-5-r"></i> Nạp tài khoản</button>-->
<!--</div>-->
<!--</div>-->
<!--</form>-->
<!--</div></div>-->

<!--<script>-->
<!--  $(document).ready(function () {-->
<!--      $("#card-charing").validate({-->
<!--          rules: {-->
<!--              type: {-->
<!--                  required: true-->
<!--              },-->
<!--              serial: {-->
<!--                  required: true,-->
<!--                  minlength: 6-->
<!--              },-->
<!--              code: {-->
<!--                  required: true,-->
<!--                  minlength: 6-->
<!--              }-->
<!--          },-->
<!--          messages: {-->
<!--              type: 'Bạn vui lòng chọn loại thẻ',-->
<!--              serial: 'Bạn vui lòng nhập serial của thẻ',-->
<!--              code: 'Bạn vui lòng nhập mã thẻ'-->
<!--          },-->
<!--          submitHandler: function (e) {-->
<!--          $('button[type="submit"]').html("ĐANG XỬ LÝ...");-->
<!--          $.post("/assets/ajax/card.php", $('#card-charing').serialize(), function(data) {-->
<!--              $('button[type="submit"]').html("NẠP THẺ");-->
<!--                swal(data.title, data.msg, data.status);-->
<!--          }, "json");-->
<!--              return false;-->
<!--          }-->
<!--      });-->
<!--  });-->
<!--</script>-->