<link rel="stylesheet" href="/css/zendo_css/zendo.css">

<div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">
  <div class="block block-themed">

    <ul class="nav nav-tabs nav-tabs-alt tit_lmht" data-toggle="tabs">
      <li class="active">
        <a href="#lmht">ĐĂNG ACC FREE FIRE</a>
      </li>
    </ul>


    <div class="block-content tab-content padding_chung">

      <div class="tab-pane active" id="lmht">

        <form id="data" method="post" enctype="multipart/form-data" class="form-horizontal push-5-t" novalidate="novalidate">

          <div class="form-group flex_center space_bet mb20">
            <div class="col-xs-4 w33 pr20">
              <label for="username">Tên đăng nhập</label>
              <input class="form-control" type="text" id="username" name="username" placeholder="Tên đăng nhập...">
            </div>
            <div class="col-xs-4 w33 pr20">
              <label for="password">Mật khẩu</label>
              <input class="form-control" type="text" id="password" name="password" placeholder="mật khẩu...">
            </div>
            <div class="col-xs-4 w33"><label for="pet">Pet</label>
              <select class="form-control" name="pet">
                <option>---Mời chọn---</option>
                <option value="0">Không</option>
                <option value="1">Có</option>
              </select>
            </div>
          </div>

          <div class="form-group flex_center space_bet mb20">
            <div class="col-xs-4 w33 pr20"><label for="signup">Đăng ký</label>
              <select class="form-control" name="signup">
                <option>---Mời chọn---</option>
                <option value="0">Facebook</option>
                <option value="1">Vkontakate</option>
              </select>
            </div>
            <div class="col-xs-4 w33 pr20"><label for="card_infinity">Thẻ vô cực</label>
              <select class="form-control" name="card_infinity">
                <option>---Mời chọn---</option>
                <option value="0">Không</option>
                <option value="1">Có</option>
              </select>
            </div>
            <div class="col-xs-4 w33 pr20"><label for="rank">Rank</label>
              <select class="form-control" name="rank">
                <option value="0">Chưa Rank</option>
                <option value="1">Chưa xác định</option>
                <option value="2">Đồng</option>
                <option value="3">Bạc</option>
                <option value="4">Vàng</option>
                <option value="5">Bạch Kim</option>
                <option value="6">Kim Cương</option>
                <option value="7">Huyền Thoại</option>
                <option value="8">Thách Đấu</option>
              </select>
            </div>
            <div class="col-xs-4 w33">
              <label for="code">Code 2fa</label>
              <input class="form-control" type="text" id="code" name="code" placeholder="Mã code 2fa...">
            </div>

          </div>


          <div class="form-group">
            <div class="form-group mb20">
              <label class="col-xs-12" for="thumb">Ảnh minh họa <b data-toggle="tooltip" data-placement="right" title="" data-original-title="Ảnh hiện ở trang ircle"></b></label>
              <div class="col-xs-12">
                <input class="currency form-control" type="file" name="thumb">
              </div>
            </div>

            <div class="form-group mb20">
              <label class="col-xs-12" for="champs">Ảnh thông tin<b data-toggle="tooltip" data-placement="right" title="" data-original-title="Mỗi ảnh sẽ là một bảng ngọc, có thể up nhiều ảnh"></b></label>
              <div class="col-xs-12">
                <input class="currency form-control" type="file" name="champs[]" multiple="">
              </div>
            </div>
            <div class="form-group mb20">
              <label class="col-xs-12" for="note">Ghi chú <b data-toggle="tooltip" data-placement="right" title="" data-original-title="Hiển thị ở trang chủ khi để chuột vào"></b></label>
              <div class="col-xs-12">
                <textarea class="form-control" id="note" name="note" rows="4" placeholder="Enter để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
              </div>
            </div>
            <div class="form-group mb20">
              <label class="col-xs-12" for="note">Giá bán<b data-toggle="tooltip" data-placement="right" title="" data-original-title="Hiển thị ở trang chủ khi để chuột vào"></b></label>
              <div class="col-xs-12">
                <input class="form-control" id="price" name="price" placeholder="nhập giá bán" type="number">
              </div>
            </div>
          </div>
          <br> <br>
          <div class="form-group mb20">
            <label class="col-xs-12" for="type_post">Loại</label>
            <div class="col-xs-12 mt20">
              <label class="css-input css-radio css-radio-warning push-10-r pr20"><input type="radio" name="mega-gender-group" value="3" checked=""><span></span> Bình thường</label> 
              <label class="css-input css-radio css-radio-warning push-10-r pr20"><input type="radio" name="mega-gender-group" value="0" checked=""><span></span> Bình thường</label> 
              <label class="css-input css-radio css-radio-warning pr20"><input type="radio" name="mega-gender-group" value="1"><span></span> Quảng cáo</label>
               <label class="css-input css-radio css-radio-warning"><input type="radio" name="mega-gender-group" value="2"><span></span> Acc ngon</label>
               <label class="css-input css-radio css-radio-warning"><input type="radio" name="mega-gender-group" value="4"><span></span> Acc chưa định giá</label>
            </div>
          </div>


          <div class="form-group mb20">
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

    var formData2 = new FormData($(this)[0]);

    $("#submit").prop('disabled', true);
    $.ajax({
      url: '/assets/ajax/post-ff.php',
      type: 'POST',
      data: formData2,
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
</div>
</div>
</div>
</div>
<script src="/admin/assets/js/js.cookie.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="/admin/assets/js/magnific.js" type="text/javascript"></script>
<script src="/admin/assets/js/bootstrap-table.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/bootstrap-table-export.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/table_export.js" type="text/javascript"></script>

<script src="/admin/assets/js/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="/admin/assets/js/select2.full.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/jquery.bootstrap-growl.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/autosize.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>


<script src="/admin/assets/js/app.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/components-select2.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/table-bootstrap.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/layout.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/demo.min.js" type="text/javascript"></script>
<script src="/admin/assets/js/quick-nav.min.js" type="text/javascript"></script>

<script>
  (function($) {
    $.fn.currencyInput = function() {
      this.each(function() {
        var wrapper = $("<div class='currency-input' />");
        $(this).wrap(wrapper);
        $(this).before("");
        $(this).val(parseFloat($(this).val()).toLocaleString(undefined, {
          minimumFractionDigits: 0,
          maximumFractionDigits: 2
        }));

        $(this).change(function() {
          var min = parseFloat($(this).attr("min"));
          var max = parseFloat($(this).attr("max"));

          var value = parseFloat($(this).val().replace(/,/g, ''));
          if (value < min)
            value = min;
          else if (value > max)
            value = max;
          $(this).val(value.toLocaleString(undefined, {
            minimumFractionDigits: 0,
            maximumFractionDigits: 2
          }));
        });
      });
    };
  })(jQuery);

  $(document).ready(function() {
    $('input.currency').currencyInput();
  });

  $(document).ready(function() {
    $('#clickmewow').click(function() {
      $('#radio1003').attr('checked', 'checked');
    });
  })
  $(document).ready(function() {
    $('.gallery').each(function() { // the containers for all your galleries
      $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled: true
        },
        zoom: {
          enabled: true,
          duration: 30000, // don't foget to change the duration also in CSS
          opener: function(element) {
            return element.find('img');
          }
        }
      });
    });
  })

  $(document).ready(function() {
    $('.zoom-gallery').magnificPopup({
      delegate: 'a',
      type: 'image',
      closeOnContentClick: false,
      closeBtnInside: false,
      mainClass: 'mfp-with-zoom mfp-img-mobile',
      image: {
        //verticalFit: true,
        //                titleSrc: function (item) {
        //                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
        //                }
      },
      gallery: {
        enabled: true
      },
      zoom: {
        enabled: true,
        duration: 30000, // don't foget to change the duration also in CSS
        opener: function(element) {
          return element.find('img');
        }
      }

    });
  });
  $(document).ready(function() {

    $('.ajax-scroll').magnificPopup({
      type: 'ajax',
      alignTop: true,
      overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
    });

    $('.ajax2').magnificPopup({
      type: 'ajax'
    });

  });
  $(document).ready(function() {
    //magnific popup
    $(document).on('mouseover', '.tooltips', function() {
      $(this).tooltip();
    });
    $(document).on('click', '.ajax', function() {

      $(this).magnificPopup({
        type: 'ajax',
        focus: '#focus-blur-loop-select',
      }).magnificPopup('open');
      return false;
    });
  });
</script>
<script>
  function load(url, id, post) {
    $.getJSON(
      url,
      function(data) {
        if (data) {
          var type = data.type;
          var message = data.message;
          if (message != '') {
            $.bootstrapGrowl(message, {
              type: type
            });
          }
          if (data.reload) {
            location.reload();
          }
        }
        return data;
      }
    );
  }
</script>
<script src="/admin/assets/js/components-date-time-pickers.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function() {

    //        $(".time-picker").datetimepicker({format: "DD/MM/YYYY HH:mm:ss", useCurrent: false});
    $('#timebegin').datetimepicker({
      locale: 'vi',
      dayViewHeaderFormat: "dd/mm/yyyy",
      format: "dd/mm/yyyy hh:ii:ss",
      useCurrent: false
    });
    $('#timeend').datetimepicker({
      locale: 'vi',
      dayViewHeaderFormat: "dd/mm/yyyy",
      format: "dd/mm/yyyy hh:ii:ss",
      useCurrent: false
    });

  });
</script>
<script>
  function show(input, id) {
    var e = document.getElementById(id);
    var f = input;
    if (e.style.display === 'block') {
      if (id != 'help') {
        f.innerHTML = '+';
      }
      e.style.display = 'none';
    } else {
      if (id != 'help') {
        f.innerHTML = '-&nbsp;';
      }
      e.style.display = 'block';
    }
  }
</script>
<link rel="stylesheet" type="text/css" href="https://rvera.github.io/image-picker/image-picker/image-picker.css">
<script src="https://rvera.github.io/image-picker/image-picker/image-picker.js" type="text/javascript"></script>

<script>
  jQuery(".selectiamges").imagepicker({
    hide_select: false,
    show_label: true,
  });

  //            $("input").change(function () {
  //                alert("The text has been changed.");
  //            });
  //
  //
  //            var count = $('#foo option:selected').length;
  //
  //            $("#test3").val("Dolly Duck");
</script>


</body>

</html>