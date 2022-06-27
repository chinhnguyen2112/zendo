<script>
page = 1; 
username = "";
idus = "";
</script>
<div class="content content-boxed">
<div class="block block-themed">

<ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
<li class="active">
<a href="#member">Danh sách thành viên</a>
</li>
</ul>


<div class="block-content tab-content">

<div class="tab-pane active" id="member">
<div class="row">
  <div class="col-lg-4">
    <div class="input-group">
      <input class="form-control" placeholder="Tên thành viên" id="username" name="username" value="">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-5">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="ID thành viên" id="idus" name="idus">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="fitler();"><i class="si si-magnifier"></i></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<hr/>    
    
                <div style="display: block;overflow: scroll;" class="list_account"></div>
                <div id="loading">
                    <img src="../assets/images/loading.gif" />
            </div>
</div>



</div>
</div>
</div>

<script>
           function load_account_member(){
                $(".list_account").hide();
                $("#loading").show();
                $.post("../assets/ajax/member.php", { page : page , username : username , idus : idus })
                .done(function(data) {
                    $(".list_account").html('');
                    $('.list_account').empty().append(data);
                    $("#loading").hide();
                    $(".list_account").show();   
                }); 
            }

            function fitler(){
                idus = $("#idus").val();
                username = $("#username").val();
                load_account_member();                                                                                                                                          
            }

            
load_account_member();
</script>

</div>
</div>
</div>
