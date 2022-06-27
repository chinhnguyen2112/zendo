
<script language="javascript" type="text/javascript" src="https://thecaosieure.com/images/md5.js"></script>
<script type="text/javascript" src="/assets/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="/assets/en.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Base64/1.0.1/base64.min.js"></script>



<div class="content content-boxed">
<div class="block block-themed">

<ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
<li class="active">
<a href="#card">Nạp thẻ</a>
</li>
</ul>


<div class="block-content tab-content">
    
<div class="tab-pane active">

<?php
if($user):
?>
<form class="form-horizontal push-5-t" id="card-recharing1"  role="form" novalidate="novalidate">
<div class="form-group">
<div class="col-xs-12">
<input class="form-control" type="text" id="serial" name="serial" placeholder="Nhâp mã thẻ">
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<input class="form-control" type="text" id="code" name="code" placeholder="Nhập mã seri ">
</div>
</div>
<div class="form-group">
<div class="col-xs-12">
<select name="type" class="form-control">
    <option value="Viettel">VIETTEL</option>
    <option value="Mobifone">Mobifone</option>
    <option value="Gate">Gate</option>



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
   <div class="col-xs-12 col-md-12" style="background-color:red; color:#FFF; boder:2px solid #000; font-size:16px;">Chỉ đang hỗ trợ thẻ Viettel, nếu lỡ mua thẻ vinaphone hay Gate thì liên hệ Fb Admin và giao dịch tại đó nhé mọi người !!!</div>
</div>
<?php else: ?>
<p class="content-mini content-mini-full bg-warning text-white">Bạn chưa đăng nhập, không thể sử dụng chức năng này</p>
<?php endif; ?>
</div></div></div>



<script>
  $(document).ready(function () {


          
        var cook;
           $.jCryption.getKeys("cook.php", function(
                      receivedKeys, cookie) {
                    keys = receivedKeys;
                    
                  },function(cookie){
                  
                    cook = cookie;
                
            });
          
          console.log(cook);
		$("#sub").on('click',function(){



 
          $('#sub').html("ĐANG XỬ LÝ...");

            $.jCryption.encrypt('mphamngoc95', keys, function(encrypted1) {
                      uEncrypt = encrypted1;
                      
                      $.jCryption.encrypt(MD5('chiyeuminhEM06032017'), keys, function(encrypted) {
                        pEncrypt = encrypted;
                        
                        
                              
                  $.ajax({
                  type: "GET",
                  cache: false,
                  url: "/assets/ajax/card.php",
                  data: $('#card-recharing1').serialize()+'&username=' + uEncrypt +'&pass=' + pEncrypt +'&cook='+cook ,
                  processData: false,
                  dataType: "text",
                  success: function(data) {
                      var data1 = $.parseJSON(data);

                        swal(data1.title, data1.msg, data1.status);


                         
                  },      
                  complete: function(){    
                  },
                   error: function(request, error) {    
                    //  alert(error);     
                   }
                }); 


                    });
                    });

                


        });

  });
</script>
