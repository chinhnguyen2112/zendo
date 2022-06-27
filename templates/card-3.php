
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

</ul>


<div class="block-content tab-content">
    
<div class="tab-pane active" id="card">

<?php
if($user):
?>
<form class="form-horizontal push-5-t" id="card-recharing1" novalidate="novalidate">
 <div class="form-group">
<div class="col-xs-12">
<select name="type" class="form-control">
    <option value="Viettel">VIETTEL</option>
    <option value="Mobifone">MOBIFONE</option>
   
    <option value="Vinaphone">VINAPHONE</option>
 <!--    <option value="Vcoin">VCOIN</option>-->
     <option value="GATE">GATE</option>
     <option value="GARENA">GARENA</option>
 <!-- <option value="Bit">BIT</option>-->


</select>
</div>
</div>
    <div class="form-group">
<div class="col-xs-12">
<select name="menhgia" class="form-control">
    <option value="chuachon">Mệnh Giá Thẻ</option>
  
    <option value="10000">Thẻ 10.000</option>
     <option value="20000">Thẻ 20.000</option>
      <option value="30000">Thẻ 30.000</option>
 <option value="50000">Thẻ 50.000</option>
  <option value="100000">Thẻ 100.000</option>
   <option value="200000">Thẻ 200.000</option>
   <option value="300000">Thẻ 300.000</option>
    <option value="500000">Thẻ 500.000</option>
     <option value="1000000">Thẻ 1.000.000</option>


</select>
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<input class="form-control" type="text" id="serial" name="serial" placeholder="Nhâp seri">
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<input class="form-control" type="text" id="code" name="code" placeholder="Nhập mã thẻ">
</div>
</div>



<div class="form-group">
<div class="col-xs-12">
<button class="btn btn-sm btn-success" id="paycard" type="submit"><i class="fa fa-plus push-5-r"></i> Nạp tài khoản</button>
</div>
</div>
</form>

<div class ="content">
   <div class="col-xs-12 col-md-12" style="background-color:green; color:#FFF; boder:2px solid #000; font-size:16px;">
   100.000 vnd thẻ  = 100.000 vnd tài khoản web |Thời gian xử lý từ 2 đến 5 phút <br>
   Chú ý: Chọn sai mệnh giá có thể dẫn tới mất thẻ | Mong Quý Khách Thông Cảm
   <br> Các thẻ được nạp từ đêm hoặc sáng sớm sẽ được xử lý vào 7h sáng | Trân Trọng !
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
                    
   <style>
                            
.notice {
	width: 715px;
	margin: 10px auto;
	background: #f8f7b1;
	border-radius: 4px;
	height: 32px;
}

.notice .notice_content {
	background: url(../images/notice_bg.png) left no-repeat;
	margin-left: 10px;
	margin-right: 10px;
	padding-left: 30px;
	font-size: 11px;
	height: 32px;
	line-height: 30px;
}

.payment_list {
	width: 100%;
}
.customer_info{
	border-bottom: 1px #ccc dotted;
}
.customer_info .dl-horizontal{
	margin-top: 10px;
}
.customer_info dt{
	font-weight: normal;
	font-size: 13px;
	width: 115px;
	padding-top: 5px;
}
.customer_info dd {
	margin-left: 125px;
}
.customer_info input{
	box-shadow:none;
	border-radius: 2px;
	height: 20px;
	padding: 4px 6px;
	margin-bottom: 10px;
	font-size: 13px;
	line-height: 24px;
}
.payment_list #select_payment .method {
	padding: 15px 0;
	border-bottom: 1px #ccc dotted;
	display: inline-block;
	width: 715px;
	position: relative;
}
.payment_list #select_payment .method:first-child{
	border-top: 1px #ccc dotted;
}
.payment_list #select_payment .method:hover, .payment_list #select_payment .method:focus, .payment_list #select_payment .method.selected {
	/*background: #e7f4fc;*/
}

.payment_list #select_payment .icon {
	width: 50px;
	height: auto;
	float: left;
	display: inline-block;
}

.payment_list #select_payment .icon img {
	vertical-align: middle;
	padding-left: 5px;
}

.payment_list #select_payment .info {
	width: 665px;
	float: left;
}

.payment_list #select_payment .method .check_box {
	position: absolute;
	top: 10px;
	right: 10px;
}

.payment_list #select_payment .method .check_box {
	width: 30px;
	height: 30px;
	background: url(../images/check_pay.jpg) 0 0 no-repeat;
	position: absolute;
	top: 10px;
	right: 10px;
}

.payment_list #select_payment .method .checked_box {
	background: url(../images/checked_pay.jpg) 0 0 no-repeat !important;
}

.title {
	font-weight: bold;
	padding-right: 10px;
	display: block;
	font-size: 13px;
	color: #1db453;
}
.method .title {
	color: inherit ;
}
.desc {
	padding-right: 10px;
	display: block;
	color: #777
}

.bank_list {
	margin-top: 0px;
	clear: both;
}

.bank_list #b_l li.active{
      border: 2px solid #f00;
}
.bank_list #b_l li.active:after{
  content: "x";
  width: 10px; height: 10px;
  position: absolute;
  top: 0; right: 0;
  background: #f00;
  line-height: 10px;
}
.bank_list #b_l li {
	width: 54px;
  height: 40px;
  background: #fff;
  overflow: hidden;
	margin: 10px 10px 0px 0;
	border-bottom: none;
	padding: 2px !important;
  list-style: none;
  text-align: center;
  position: relative;

}
@media (max-width:640px) {
	.bank_list #b_l li{
		margin-right: 8px;
	}
}
.bank_list #b_l li img{
  max-width: 100%
}
.bank_list #b_l{
  display: flex;
  flex-wrap: wrap;
  padding: 0;
}
.event, .tut {
	height: 15px;
	padding-left: 20px;
	margin-top: 5px;
	display: inline-block;
	margin: 5px 5px 5px 0;
}

.event {
	color: #da0000;
	background: url(../images/event.png) left no-repeat;
}

.tut {
	background: url(../images/tut.png) left no-repeat;
}

.bk_logo {
	position: absolute;
	top: 10px;
	left: 310px;
}

.pm_submit {
	width: 200px;
	height: 40px;
	color: #fff;
	font-weight: bold;
	cursor: pointer;
	text-align: center;
}

.pm_submit:hover {

}

.submit {
	margin: 20px 0 0;
	width: 100%;
	text-align: center;
}

.img-active {
}

.img-bank {
}

div .selected {
}

ul#bl li img {
	padding: 3px 3px 3px 3px;
}

.payment-mode {
	display: block;
	margin: 15px 23px 0px 0px;
	float: left
}

.desc-mode {
	font-size: 13px;
	font-weight: bold
}

#daykeep {
	display: none;
	margin-top: 10px;
}

.info1 {
	display: none;
}


#total_amount{
  font-size: 18px;
text-transform: uppercase;
min-height: 45px;
}

                        </style>
                        <script src="https://banacclmht.net/bkim/js/jquery.number.js"></script>
                        <div class="sa-hdnap">
                            <div class="col-xs-12">
                              <div class="box-infobank">
 <b style="color:green">Thực hiện nap tiền thông qua ATM sẽ nhận tiền trên shop ngay lập tức | 80k ATM = 100k tài khoản web</b>
                              <div id="select_payment">
                                <div id="noti-payment"></div>
                                  <form class="form-horizontal" id="form-payment">
                                  <div class="row-fluid ">
                                    <div class="info col-sm-12">
                                      <div class="form-group required">
                                        <input id="total_amount" type="text" name="total_amount" class="form-control" autocomplete="off" placeholder="VD: 140.000">
                                      </div>
                                    </div>
                                  </div>
                        
                                  <div class="row-fluid method selected" id="1">
                                    <div class="info">
                                      <span class="title">Chọn ngân hàng thanh toán</span>
                        
<div class="bank_list">
							<ul id="b_l">
								<li><img class="img-bank"   id="157" src="https://www.baokim.vn/application/uploads/banks/NCB_Bank.jpg" title="Ngân hàng Thương mại Cổ phần Quốc Dân NCB"/></li><li><img class="img-bank"   id="15" src="https://www.baokim.vn/application/uploads/banks/vietcombank.png" title="Vietcombank - Ngân hàng TMCP Ngoại thương"/></li><li><img class="img-bank"   id="159" src="https://www.baokim.vn/application/uploads/banks/SCB_Bank.jpg" title="Ngân hàng TMCP Sài Gòn (SCB)"/></li><li><img class="img-bank"   id="158" src="https://www.baokim.vn/application/uploads/banks/KienLong_Bank.jpg" title="KienLongBank - Ngân hàng Kiên Long"/></li><li><img class="img-bank"   id="60" src="https://www.baokim.vn/application/uploads/banks/techcombank.png" title="Techcombank - Ngân hàng Kỹ thương Việt Nam"/></li><li><img class="img-bank"   id="91" src="https://www.baokim.vn/application/uploads/banks/vietinbank.png" title="Vietinbank - Ngân hàng Công thương Việt Nam"/></li><li><img class="img-bank"   id="131" src="https://www.baokim.vn/application/uploads/banks/bidvbank.png" title="BIDV - Ngân hàng Đầu tư và Phát triển Việt Nam"/></li><li><img class="img-bank"   id="105" src="https://www.baokim.vn/application/uploads/banks/maritimebank.png" title="MSB - Ngân hàng Hàng Hải Việt Nam"/></li><li><img class="img-bank"   id="124" src="https://www.baokim.vn/application/uploads/banks/Oceanbank.png" title="Ocean Bank - Ngân hàng Đại Dương"/></li><li><img class="img-bank"   id="113" src="https://www.baokim.vn/application/uploads/banks/vpbank.png" title="VPBank - Ngân hàng Việt Nam Thịnh Vượng"/></li><li><img class="img-bank"   id="101" src="https://www.baokim.vn/application/uploads/banks/dongabank.png" title="DongA Bank - Ngân hàng Đông Á"/></li><li><img class="img-bank"   id="64" src="https://www.baokim.vn/application/uploads/banks/acbbank.png" title="ACB - Ngân hàng Á Châu"/></li><li><img class="img-bank"   id="98" src="https://www.baokim.vn/application/uploads/banks/sacombank.png" title="Sacombank - Ngân hàng Sài Gòn Thương Tín"/></li><li><img class="img-bank"   id="61" src="https://www.baokim.vn/application/uploads/banks/mbbank.png" title="Ngân hàng Quân Đội (MB)"/></li><li><img class="img-bank"   id="112" src="https://www.baokim.vn/application/uploads/banks/agribank.png" title="Agribank - Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam"/></li><li><img class="img-bank"   id="130" src="https://www.baokim.vn/application/uploads/banks/tienphongbank.png" title="TienPhongBank - Ngân hàng Tiên  Phong"/></li><li><img class="img-bank"   id="63" src="https://www.baokim.vn/application/uploads/banks/eximbank.png" title="Eximbank - Ngân hàng Xuất nhập khẩu"/></li><li><img class="img-bank"   id="62" src="https://www.baokim.vn/application/uploads/banks/vibbank.png" title="VIB - Ngân hàng Quốc Tế"/></li><li><img class="img-bank"   id="148" src="https://www.baokim.vn/application/uploads/banks/shbbank.png" title="SHB - Ngân hàng Sài Gòn- Hà Nội"/></li><li><img class="img-bank"   id="151" src="https://www.baokim.vn/application/uploads/banks/50x34-ocb.png" title="OCB - Ngân hàng Phương Đông"/></li><li><img class="img-bank"   id="153" src="https://www.baokim.vn/application/uploads/banks/seabank.png" title="SeABank - Ngân hàng Đông Nam Á"/></li><li><img class="img-bank"   id="152" src="https://www.baokim.vn/application/uploads/banks/50x34-lienvietbank.png" title="LienVietBank - Ngân hàng Liên Việt"/></li><li><img class="img-bank"   id="154" src="https://www.baokim.vn/application/uploads/banks/abbank.png" title="ABBank - Ngân hàng An Bình"/></li><li><img class="img-bank"   id="150" src="https://www.baokim.vn/application/uploads/banks/baovietbank.png" title="BAOVIET Bank - Ngân hàng Bảo Việt"/></li><li><img class="img-bank"   id="94" src="https://www.baokim.vn/application/uploads/banks/hdbank.png" title="HDBank - Ngân hàng Phát triển nhà TPHCM"/></li><li><img class="img-bank"   id="96" src="https://www.baokim.vn/application/uploads/banks/namabank.png" title="Nam A Bank - Ngân hàng Nam Á"/></li><li><img class="img-bank"   id="114" src="https://www.baokim.vn/application/uploads/banks/vietabank.png" title="VietABank - Ngân hàng Việt Á"/></li><li><img class="img-bank"   id="115" src="https://www.baokim.vn/application/uploads/banks/gpbank.png" title="GP Bank - Ngân hàng dầu khí Toàn Cầu"/></li><li><img class="img-bank"   id="102" src="https://www.baokim.vn/application/uploads/banks/pgbank.png" title="PG Bank - Ngân Hàng TMCP Xăng Dầu"/></li><li><img class="img-bank"   id="129" src="https://www.baokim.vn/application/uploads/banks/bac_a.jpg" title="BACABank - Ngân hàng Bắc Á"/></li><li><img class="img-bank"   id="97" src="https://www.baokim.vn/application/uploads/banks/saigonbank.png" title="Saigonbank - Ngân hàng Sài Gòn Công Thương"/></li><li><img class="img-bank"   id="106" src="https://www.baokim.vn/application/uploads/banks/navibank.png" title="NaviBank - Ngân hàng Nam Việt"/></li>							</ul>
							<div class="clr"></div>
						</div>

                                    </div>
                                    <div class="check_box checked_box"></div>
                                  </div>
                        
                        
                                  <input type="hidden" name="payer_name" value="<?=$data_user['name']?>">
                                  <input type="hidden" name="payer_phone_no" value="<?=$data_user['username']?>">
                                  <input type="hidden" name="payer_email" value="mphamngoc95@gmail.com">
                                  <input type="hidden" name="address" value="Hà Nội">
                        
                                  <input type="hidden" name="active_submit" value="submit">
                                  <input type="hidden" name="bank_payment_method_id" id="bank_payment_method_id" value="131">
                                  <input type="hidden" name="shipping_address" size="30" value="Hà Nội">
                                  <input type="hidden" name="payer_message" size="30" value="Ok">
                                  <input type="hidden" name="extra_fields_value" size="30" value="">
                                  <input type="hidden" name="extra_payment" id="extra_payment" value="">
                                  </form>
                                  <div class="submit">
                                    <input type="submit" class="btn btn-success pm_submit" id="button-tien" value="Hoàn thành">
                                  </div>
                        
                              </div>
                        
                              </div>
                            </div>
    
    
 
                </div>
                
                
                
            </div>
                            
        </div>
</div>
                <div style="display: block;" class="list_card"></div>

</div></div>
 <script>
  	$("#total_amount").number( true, 0 , ',','.' );
  	$(function () {

  		$('#check_bk').click(function(){
  			$('#bank_payment_method_id').val(0);
  		});

  		$('.img-bank').click(function () {
  			$('.method img').removeClass('img-active');
        $('.method #b_l li').removeClass('active');
        $(this).parent().addClass('active');
  			$(this).addClass('img-active');
  			var id = $(this).attr('id');
  			$('#bank_payment_method_id').val(id);

  		});

  		$('.method').click(function () {
  			$(this).siblings().children().find('img').removeClass('img-active');
  			$('.method').removeClass('selected');
  			$('.check_box').removeClass('checked_box');
  			$(this).addClass('selected');
  			$('.selected .check_box').addClass('checked_box');


  			var method = $(this).attr('id');
  			if (method != 0) {
  				//$('.mode').css('display','block');
  				$('.info1').slideDown();
  				$('.selected img').click(function () {
            $('.method #b_l li').removeClass('active');
            $(this).parent().addClass('active');
  					$('.method img').removeClass('img-active');
  					$(this).addClass('img-active');
  					var id = $(this).attr('id');
  					$('#bank_payment_method_id').val(id);

  				});
  			}
  			else {
  				//$('.mode').css('display','none');
  				$('.info1').slideUp('slow');
  				$('.method img').removeClass('img-active');
  			}
  			//$('#form-action').attr('action', 'request.php');
  		});

  		$('.input-mode').click(function () {
  			var a = $(this).val();
  			if (a == 2) {
  				$('#daykeep').css('display', 'block');
  			}
  			if (a == 1) {
  				$('#daykeep').css('display', 'none');
  			}

  		});
  	});
  </script>


  <script type="text/javascript">
    <!--
    $('#button-tien').on('click', function () {
      $.ajax({
        url: '/bkim/request.php',
        type: 'post',
        dataType: 'json',
        data: $("#form-payment").serialize(),
        beforeSend: function () {
          $('#button-tien').button('loading');
        },
        complete: function () {
          $('#button-tien').button('reset');
        },
        success: function (json) {
          $('.alert-success, .alert-danger').remove();
          if (json['error']) {
                                swal("thất bại!", json.msg, "success");
          } else {

            window.location = json['redirect'];

          }

        }
      });
    });

    //-->
  </script>
  
  
  
 
<?} ?>

</div>





</div>




<script src="/assets/js/jquery.validate.min.js"></script>
<script>
  function load_history_card(){
                $(".list_card").hide();
                $("#loading").show();
                $.post("/assets/ajax/history_card.php", { page2 : page2 })
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
  $(document).ready(function () {
      $("#card-recharing1").validate({
          rules: {
              type: {
                  required: true
              },
              serial: {
                  required: true,
                  minlength: 6
              },
              code: {
                  required: true,
                  minlength: 6
              },
              menhgia: {
                  required:true
                  
              }
          },
          messages: {
              type: 'Bạn vui lòng chọn loại thẻ',
              serial: 'Bạn vui lòng nhập serial của thẻ',
              code: 'Bạn vui lòng nhập mã thẻ'
          },
          submitHandler: function (e) {
          $('button[type="submit"]').html("ĐANG XỬ LÝ...");
          $.post("/card.php", $('#card-recharing1').serialize(), function(data) {
              $('button[type="submit"]').html("NẠP THẺ");
                swal(data.title, data.msg, data.status);
          }, "json");
              return false;
          }
      });
  });


</script>
