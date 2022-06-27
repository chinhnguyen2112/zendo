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

<form id="data" method="post" enctype="multipart/form-data" class="form-horizontal push-5-t" novalidate="novalidate" >

<div class="form-group">
<div class="col-xs-4">
<label for="username">Tên đăng nhập</label>
<input class="form-control" type="text" id="username" name="username" placeholder="Tên đăng nhập Garena">
</div>
<div class="col-xs-4">
<label for="password">Mật khẩu</label>
<input class="form-control" type="text" id="password" name="password" placeholder="Nhap Pass">
</div>

</div>


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


	               
	                
	                 
	                 <option value="Liên Quân Mobile Random">
	                    Liên Quân Mobile RanDom
	                </option>
	                 <option value="Liên Quân Mobile Random Sơ Cấp">
	                    Liên Quân Mobile RanDom Sơ Cấp
	                </option>
	                 <option value="Liên Quân Mobile Random Trung Cấp">
	                    Liên Quân Mobile RanDom Trung Cấp
	                </option>
	                 <option value="Liên Quân Mobile Random Cao Cấp">
	                    Liên Quân Mobile RanDom Cao Cấp
	                </option>
	                 <option value="Liên Quân Mobile Random Siêu Cấp">
	                    Liên Quân Mobile RanDom Siêu Cấp
	                </option>
	                
	            </select></div>
</select></div>
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
$("form#data").submit(function(){

    var formData = new FormData($(this)[0]);

    $("#submit").prop('disabled', true);
    $.ajax({
        url: '/assets/ajax/post-random.php',
        type: 'POST',
        data: formData,
        async: false,
        dataType: 'json',
        success: function (data) {
        swal(data.title, data.msg, data.status);
        setTimeout(function () {
        window.location.href = "/admin/?act=post-random";
        }, 3000);
        },
        cache: false,
        contentType: false,
        processData: false
    });

    
    return false;
});
</script>