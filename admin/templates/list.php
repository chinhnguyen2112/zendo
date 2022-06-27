<style>
  .btn_excel {
    padding: 15px 20px;
    background: #2ab665;
    border-radius: 5px;
    font-size: 15px;
    color: #fff;
    font-weight: 700;
  }
</style>
<script>
  var page = 1;
  var id = "";
  var name = "";
  var type_acc = "";
</script>
<div class="content content-boxed">
  <div class="block block-themed">
    <div class="block block-themed" style="display:flex">
      <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" style="width: calc(100% - 120px);">
        <li class="active">
          <a href="#acc">Danh sách tài khoản</a>
        </li>
      </ul>
      <div class="xuat_excel" style="    cursor: pointer;">
        <a href="/assets/ajax/xuat_excel.php" class="btn_excel">Xuất Excel</a>
      </div>

    </div>
    <div class="block-content tab-content">

      <div class="tab-pane active" id="acc">
        <div class="row">
          <div class="col-lg-4" style="width:33%:margin-bottom:6px">
            <div class="input-group">
              <input class="form-control" placeholder="Mã số" id="id" name="id" value="">
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
          <div class="col-lg-4" style="width:33%;margin-bottom:6px">
            <div class="input-group">
              <input class="form-control" placeholder="Tên tài khoản" id="name" name="name" value="">
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
          <div class="col-lg-5" style="width:33%; margin-bottom:6px">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Liên Minh Huyền Thoại" id="type_acc" name="type_acc" style="margin-top:0px">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button" onclick="fitler();"><i class="si si-magnifier"></i></button>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <hr />

        <div style="display: block;" class="list_account"></div>
        <div id="loading">
          <img src="../assets/images/loading.gif" />
        </div>
      </div>



    </div>
  </div>
</div>

<script>
  function xuat_excel() {
    alert(1)
    id = $("#id").val();
    type_acc = $("#type_acc").val();
    name = $('#name').val();
    $.post("../assets/ajax/xuat_excel.php", {
        page: page,
        id: id,
        type_acc: type_acc,
        name: name
      })
      .done(function(data) {
        $(".list_account").show();
      });
  }

  function load_acc() {
    $(".list_account").hide();
    $("#loading").show();
    $.post("../assets/ajax/list_acc.php", {
        page: page,
        id: id,
        type_acc: type_acc,
        name: name
      })
      .done(function(data) {
        $(".list_account").html('');
        $('.list_account').empty().append(data);
        $("#loading").hide();
        $(".list_account").show();
      });
  }

  function fitler() {
    id = $("#id").val();
    type_acc = $("#type_acc").val();
    name = $('#name').val();
    load_acc();
  }

  function delete_acc(id) {
    var result = confirm("Bạn có chắc chắn muốn xoá ?");
    if (result) {
      window.location = "/admin/?act=list&tt=delete_acc&id=" + id;
    }
    load_acc();
  }

  load_acc();
</script>

</div>
</div>
</div>