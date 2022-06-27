<link rel="stylesheet" href="/assets/css/admin/zendo_css/zendo.css">

<?php

$input = new Input;
$id = (int)$input->input_get("id");
$sql_get = "SELECT * FROM accounts where `id` = {$id} LIMIT 1";
if ($db->num_rows($sql_get)) {
    $data = $db->fetch_assoc($sql_get, 1);
} else {
    new Redirect("/admin/?act=member");
}


?>
<div class="block block-themed row_edit_member padding_chung">
    <div class="block-header bg-info">
        <h3 class="block-title">Chỉnh sửa thông tin tài khoản</h3>
    </div>
    <div class="block-content">
        <form class="form-horizontal push-5-t" id="edit" novalidate="novalidate">


            <div class="form-group">
                <div class="col-xs-4" style="margin-bottom: 20px;">
                    <label for="username">ID</label>
                    <input class="form-control" type="text" id="username" name="username" value="<?php echo $data['username']; ?>" disabled>
                </div>
                <div class="col-xs-4" style="margin-bottom: 20px;">
                    <label for="name">Tên</label>
                    <input class="form-control" type="name" id="name" name="name" value="<?php echo $data['name']; ?>">
                </div>
                <div class="col-xs-4">
                    <label for="admin">Quyền <b data-toggle="tooltip" data-placement="right" title="0 là member, 1 là admin"><i class="fa fa-question-circle"></i></b></label>
                    <input class="currency form-control" type="number" id="admin" name="admin" value="<?php echo $data['admin']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="email">Email</label>
                <div class="col-xs-12">
                    <input class="form-control" type="text" id="email" name="email" value="<?php echo $data['email']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="cash">Cash</label>
                <div class="col-xs-12">
                    <input class="form-control" type="text" id="cash" name="cash" value="<?php echo $data['cash']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12" for="free_spin">Lượt Quay Free</label>
                <div class="col-xs-12">
                    <input class="form-control" type="text" id="free_spin" name="free_spin" value="<?php echo $data['luotquay_free']; ?>">
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" type="submit">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $("#edit").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true
                }
            },
            messages: {
                name: 'Tên không thể trống',
                email: 'Email không thể trống'
            },
            submitHandler: function(e) {
                $('button[type="submit"]').html("Đang lưu...");
                $.post("/assets/ajax/edit_member.php", $('#edit').serialize(), function(data) {
                    $('button[type="submit"]').html("Lưu lại");
                    swal(data.title, data.msg, data.status);
                    setTimeout(function() {
                        window.location.href = "/admin/?act=member";
                    }, 2000);
                }, "json");
                return false;
            }
        });
    });
</script>