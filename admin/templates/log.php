<script>
page = 1; 
page2 = 1;
username = "";
username2 = "";
id_post = "";
</script>
<div class="content content-boxed">
<div class="block block-themed">

<ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
<li class="active">
<a href="#buy">Tài Khoản đã bán</a>
</li>
<li>
<a href="#card">Thẻ được nạp</a>
</li>
</ul>


<div class="block-content tab-content">

<div class="tab-pane active" id="buy">
<div class="row">
  <div class="col-lg-4">
    <div class="input-group">
      <input class="form-control" placeholder="Tên người mua" id="username" name="username" value="">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-5">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Mã số" id="id_post" name="id_post">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="fitler();"><i class="si si-magnifier"></i></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<hr/>    
    
                <div style="display: block;" class="list_buy"></div>
                <div id="loading">
                    <img src="../assets/images/loading.gif" />
            </div>
</div>

<div class="tab-pane fade" id="card">
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <input class="form-control" placeholder="Tên người mua" id="username2" name="username2" value="">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="fitler2();"><i class="si si-magnifier"></i></button>
      </span>      
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-5">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Loại thẻ" id="type_card" name="type_card">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="fitler3();"><i class="si si-magnifier"></i></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<hr/>     
                <div style="display: block;" class="list_card"></div>
                <div id="loading2">
                    <img src="../assets/images/loading.gif" />
            </div>
</div>



</div>
</div>
</div>

<script>
           function load_history_buy(){
                $(".list_buy").hide();
                $("#loading").show();
                $.post("../assets/ajax/history_buy_admin.php", { page : page , username : username , id_post : id_post })
                .done(function(data) {
                    $(".list_buy").html('');
                    $('.list_buy').empty().append(data);
                    $("#loading").hide();
                    $(".list_buy").show();   
                }); 
            }


           function load_history_card(){
                $(".list_card").hide();
                $("#loading2").show();
                $.post("../assets/ajax/history_card_admin.php", { page : page2 , username : username2 })
                .done(function(data) {
                    $(".list_card").html('');
                    $('.list_card').empty().append(data);
                    $("#loading2").hide();
                    $(".list_card").show();   
                }); 
            }  
            function fitler(){
                id_post = $("#id_post").val();
                username = $("#username").val();
                load_history_buy();                                                                                                                                          
            }
            function fitler2(){
                
                username2 = $("#username2").val();
                load_history_card();                                                                                                                                          
            }
           
            
            
load_history_buy();
load_history_card();
</script>

</div>
</div>
</div>
