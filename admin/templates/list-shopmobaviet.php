<script>
page = 1; 
id = "";
type_acc = "";
</script>
<div class="content content-boxed">
<div class="block block-themed">

<ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
<li class="active">
<a href="#acc">Danh sách tài khoản</a>
</li>
</ul>


<div class="block-content tab-content">

<div class="tab-pane active" id="acc">
<div class="row">
  <div class="col-lg-4">
    <div class="input-group">
      <input class="form-control" placeholder="Mã số" id="id" name="id" value="">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-5">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Liên Minh Huyền Thoại" id="type_acc" name="type_acc">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="fitler();"><i class="si si-magnifier"></i></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<hr/>    
    
                <div style="display: block;" class="list_account"></div>
                <div id="loading">
                    <img src="../assets/images/loading.gif" />
            </div>
</div>



</div>
</div>
</div>

<script>
           function load_acc(){
                $(".list_account").hide();
                $("#loading").show();
                $.post("../assets/ajax/list-shopmobaviet.php", { page : page , id : id , type_acc : type_acc })
                .done(function(data) {
                    $(".list_account").html('');
                    $('.list_account').empty().append(data);
                    $("#loading").hide();
                    $(".list_account").show();   
                }); 
            }

            function fitler(){
                id = $("#id").val();
                type_acc = $("#type_acc").val();
                load_acc();                                                                                                                                          
            }
            
            function delete_acc(id) {
                var result = confirm("Bạn có chắc chắn muốn xoá ?");
                if (result) {
                    window.location = "/admin/?act=list&tt=delete_acc&id="+id;
                }
                load_acc();
            }
            
load_acc();
</script>

</div>
</div>
</div>
