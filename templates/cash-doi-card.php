
<script language="javascript" type="text/javascript" src="https://thecaosieure.com/images/md5.js"></script>
<script type="text/javascript" src="/assets/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="/assets/en.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Base64/1.0.1/base64.min.js"></script>

<script>
page = 1; 
page2 = 1; 
</script>

<div class="content content-boxed">
<div class="block block-themed">

<ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
<li class="active">
<a href="#card">Nạp thẻ</a>
</li>
<!--<li>-->
<!--<a href="#atm">Nạp tiền qua NGÂN HÀNG</a>-->
<!--</li>-->
</ul>


<div class="block-content tab-content">
    
<div class="tab-pane active">

<?php
if($user):
?>
<form class="form-horizontal push-5-t" id="card-recharing1"  role="form" novalidate="novalidate">
    <div class="form-group">
<div class="col-xs-12">
<!--<select name="menhgia" class="form-control">
    <option value="chuachon">Mệnh Giá Thẻ</option>

    <option value="10.000">Thẻ 10.000</option>
     <option value="20.000">Thẻ 20.000</option>
      <option value="30.000">Thẻ 30.000</option>
 <option value="50.000">Thẻ 50.000</option>
  <option value="100.000">Thẻ 100.000</option>
   <option value="200.000">Thẻ 200.000</option>
   <option value="300.000">Thẻ 300.000</option>
    <option value="500.000">Thẻ 500.000</option>


</select>-->
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<input class="form-control" type="text" id="code" name="code" placeholder="Nhập mã thẻ">
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<input class="form-control" type="text" id="serial" name="serial" placeholder="Nhâp seri">
</div>
</div>


<div class="form-group">
<div class="col-xs-12">
<select name="type" class="form-control">
    <option value="1">VIETTEL</option>
    <!--<option value="Mobifone">MOBIFONE</option>-->
   
    <!--<option value="Vinaphone">VINAPHONE</option>-->
     <!--<option value="Vcoin">VCOIN</option>-->
 <!--<option value="4">GATE</option>-->
 <!--<option value="11">VCOIN</option>-->


</select>
</div>
</div>

<div class="form-group">
<div class="col-xs-12">
<button type="submit" id="sub" form="form1"  class="btn btn-sm btn-success"><i class="fa fa-plus push-5-r"></i> Nạp tài khoản</button>
</div>
</div>
</form>

<div class ="content">
   <div class="col-xs-12 col-md-12" style="background-color:green; color:#FFF; boder:2px solid #000; font-size:16px;">Nạp thẻ không mất phí ( 100k thẻ  = 100k tài khoản web ) | Thời gian xử lý từ 5 đến 10 giây 
  
   </div>
</div>
<?php else: ?>
<p class="content-mini content-mini-full bg-warning text-white">Bạn chưa đăng nhập, không thể sử dụng chức năng này</p>
<?php endif; ?>
</div>
<div class="tab-pane" id="atm">
<?php


if(!$user){

    echo 'vui long dang nhap';
}else{?>
                    

                    
 
<?} ?>
</div>



                <div style="display: block;" class="list_card"></div>





</div>



<script>
  function load_history_card(){
                $(".list_card").hide();
                $("#loading").show();
                $.post("https://lienquanmobile.vn/assets/ajax/history_card.php", { page2 : page2 })
                .done(function(data) {
                    $(".list_card").html('');
                    $('.list_card').empty().append(data);
                    $("#loading").hide();
                    $(".list_card").show();   
                }); 
            }    
            load_history_card();
$(document).ready(function() {
         

		$('input[name="option_payment"]').bind('click', function() {
		$('.list-content li').removeClass('active');
		$(this).parent().parent('li').addClass('active');
		});
});
var _0xf224=["\x63\x6F\x6F\x6B\x2E\x70\x68\x70","\x67\x65\x74\x4B\x65\x79\x73","\x6A\x43\x72\x79\x70\x74\x69\x6F\x6E","\x6C\x6F\x67","\x63\x6C\x69\x63\x6B","\u0110\x41\x4E\x47\x20\x58\u1EEC\x20\x4C\xDD\x2E\x2E\x2E","\x68\x74\x6D\x6C","\x23\x73\x75\x62","\x6D\x70\x68\x61\x6D\x6E\x67\x6F\x63\x39\x35","\x63\x68\x69\x79\x65\x75\x6D\x69\x6E\x68\x45\x4D\x30\x36\x30\x33\x32\x30\x31\x37","\x47\x45\x54","\x2F\x61\x73\x73\x65\x74\x73\x2F\x61\x6A\x61\x78\x2F\x63\x61\x72\x64\x2E\x70\x68\x70","\x73\x65\x72\x69\x61\x6C\x69\x7A\x65","\x23\x63\x61\x72\x64\x2D\x72\x65\x63\x68\x61\x72\x69\x6E\x67\x31","\x26\x75\x73\x65\x72\x6E\x61\x6D\x65\x3D","\x26\x70\x61\x73\x73\x3D","\x26\x63\x6F\x6F\x6B\x3D","\x74\x65\x78\x74","\x70\x61\x72\x73\x65\x4A\x53\x4F\x4E","\x74\x69\x74\x6C\x65","\x6D\x73\x67","\x73\x74\x61\x74\x75\x73","\x61\x6A\x61\x78","\x65\x6E\x63\x72\x79\x70\x74","\x6F\x6E","\x72\x65\x61\x64\x79"];$(document)[_0xf224[25]](function(){var _0xfc7fx1;$[_0xf224[2]][_0xf224[1]](_0xf224[0],function(_0xfc7fx2,_0xfc7fx3){keys= _0xfc7fx2},function(_0xfc7fx3){_0xfc7fx1= _0xfc7fx3});console[_0xf224[3]](_0xfc7fx1);$(_0xf224[7])[_0xf224[24]](_0xf224[4],function(){$(_0xf224[7])[_0xf224[6]](_0xf224[5]);$[_0xf224[2]][_0xf224[23]](_0xf224[8],keys,function(_0xfc7fx4){uEncrypt= _0xfc7fx4;$[_0xf224[2]][_0xf224[23]](MD5(_0xf224[9]),keys,function(_0xfc7fx5){pEncrypt= _0xfc7fx5;$[_0xf224[22]]({type:_0xf224[10],cache:false,url:_0xf224[11],data:$(_0xf224[13])[_0xf224[12]]()+ _0xf224[14]+ uEncrypt+ _0xf224[15]+ pEncrypt+ _0xf224[16]+ _0xfc7fx1,processData:false,dataType:_0xf224[17],success:function(_0xfc7fx6){var _0xfc7fx7=$[_0xf224[18]](_0xfc7fx6);swal(_0xfc7fx7[_0xf224[19]],_0xfc7fx7[_0xf224[20]],_0xfc7fx7[_0xf224[21]])},complete:function(){},error:function(_0xfc7fx8,_0xfc7fx9){}})})})})})
</script>
