<link rel="stylesheet" href="/assets/css/lat_hinh_css.css">
<link rel="stylesheet" href="/assets/css/popup.css">
<style>
    .none_page {
        display: none;
    }
</style>
<?php 
if ($user && $data_user['id'] > 0) {
     $id =$data_user['id'];
    $sql_acc = "SELECT * FROM accounts  WHERE id = ' ".$id."'";
        if ($db->num_rows($sql_acc)) {
            $data_acc = $db->fetch_assoc($sql_acc, 1);
        }
         $sql_his_1 = "SELECT history_gift.*, name FROM history_gift INNER JOIN gift ON history_gift.id_gift = gift.vip  WHERE id_user = '".$id."'";
        if ($db->num_rows($sql_his_1)) {
            $data_his = $db->fetch_assoc($sql_his_1,0);
        }
        
}
    $sql_gift = "SELECT * FROM gift ";
        if ($db->num_rows($sql_gift)) {
            $data_gift = $db->fetch_assoc($sql_gift, 0);
        }
?>
<div class="content_boby">
    <div class="container_body">
        <div class="title_ch">
            <span>LẬT BÀI TRÚNG THƯỞNG</span>
        </div>
        <div class="list_btn">
            <div class="btn_ch btn_ch_1 " onclick="show_popup(1)">
                <span>Hướng dẫn</span>
            </div>
            <div class="btn_ch btn_ch_2" onclick="show_popup(2)">
                <span>Nhận thêm lượt</span>
            </div>
            <div class="btn_ch btn_ch_3" onclick="show_popup(3)">
                <span>Hướng dẫn nhận thưởng</span>
            </div>
        </div>
        <div class="list_gift">
            <?php foreach($data_gift as $key => $val) { ?>
                <div class="div_gift" data-id="<?= $val['id'] ?>" onclick="show_click(this)">
                    <img class="img_hide" src="/assets/images/fav_logo.png">
                    <img class="img_click_gift" src="/assets/images/click_gift.png">
                    <div class="flip_show">
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="list_btn_user">
            <div class="div_btn_user btn_user_1 btn_user_pc">
                <div class="div_top_user">
                    <span>Số lượt quay: <span class="num_gift"><?= (isset($id))? $data_acc['luotquay']: 0 ?></span></span>
                </div>
                <!--<div class="btn_add_num">-->
                <!--    <span class="span_add_num">Hướng dẫn nhận thêm lượt quay</span>-->
                <!--</div>-->
            </div>
            <div class="div_btn_user btn_user_2" onclick="show_gift(1)">
                <span class="show_gift">Lật bài</span>
            </div>
            <div class="div_btn_user btn_user_3" onclick="show_gift(2)">
                <span class="span_reload">Làm mới</span>
            </div>
            <div class="div_btn_user btn_user_1 btn_user_mb">
                <div class="btn_user_nav">
                    <div class="div_top_user">
                        <span>Số lượt quay: <span class="num_gift"><?= (isset($id))? $data_acc['luotquay']: 0 ?></span></span>
                    </div>
                    <!--<div class="btn_add_num">-->
                    <!--    <span class="span_add_num">Hướng dẫn nhận thêm lượt quay</span>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="list_data_gift">
            <div class="table_data_gift">
                <table class="table_history_gift">
                    <tr class="title_table">
                        <td class="stt_table">STT</td>
                        <td class="time_table">Thời gian</td>
                        <td>Phần thưởng</td>
                    </tr>
                    <?php foreach($data_his as $key => $val) { ?>
                        <tr class="data_table">
                            <td><?= ++$key; ?></td>
                            <td><?= date('d-m-Y H:i:s',$val['created_at']) ?></td>
                            <td><?= $val['name'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!--///// popup//-->
<div class="body_popup body_popup_1">
    <div class="content_popup">
        <div class="title_popup">
            <span class="text_title">HƯỚNG DẪN</span>
            <img src="/assets/images/close_icon.png" class="nav_close" onclick="show_popup(0)">
        </div>
        <div class="container_popup">
     <b> Tham gia lật bài:</b>
<li>B1: Chọn lá bài may mắn của bạn</li>
<li>B2: Nhấn nút lật bài</li>
<li>B3: Chọn làm mới và thực hiện lại b2 để chơi tiếp</li>
<li>B4: Chụp màn hình và nhắn tin cho <a href="https://www.facebook.com/sanacc.vn/" target="_blank" style="color:#0056b3">Fanpage Sanacc.vn</a> để nhận phần thưởng</li>
<b>Điều khoản:</b>
<li>Mỗi tài khoản Sanacc.vn tương ứng với 1 tài khoản Facebook và 1 tài khoản Liên Quân Mobile.</li>
<li>Khi có bất kỳ thắc mắc nào liên quan đến chương trình, vui lòng nhắn tin vào fanpage Sanacc.vn</li>
<li>Chương trình sẽ kết thúc khi hết ngân sách khuyến mại hoặc vào hạn cuối chương trình, tùy vào điều kiện nào đến trước nhất.</li>
<li>Các khiếu nại liên quan đến chương trình phải được gửi tới fanpage Sanacc.vn trong vòng 7 ngày kể từ khi phát sinh lỗi. Sau thời hạn này, Sanacc.vn không tiếp nhận các khiếu nại.</li>
<li>Nếu tranh chấp phát sinh trong toàn bộ chương trình sẽ được xử lý theo quy định của pháp luật. Sanacc.vn có quyền từ chối trao thưởng cho những người dùng không đáp ứng đủ các điều kiện tham gia chương trình hoặc gian lận để trúng thưởng.</li>
        </div>
    </div>
</div>
<div class="body_popup body_popup_2">
    <div class="content_popup">
        <div class="title_popup">
            <span class="text_title">Nhận thêm lượt:</span>
            <img src="/assets/images/close_icon.png" class="nav_close" onclick="show_popup(0)">
        </div>
        <div class="container_popup">
     <b> Nhận thêm lượt:</b></br>
<li>
    <a href="https://sanacc.vn/recharge.html" target="_blank" style="color:#0056b3">Nạp thẻ</a> 20k được thêm 1 lượt quay
</li>
<li>
   Click để like, share <a href="https://www.facebook.com/sanacc.vn/posts/126031686651855" target="_blank" style="color:#0056b3">bài viết</a> nhận ngay 2 lượt quay!
</li>
        </div>
    </div>
</div>
<div class="body_popup body_popup_3">
    <div class="content_popup">
        <div class="title_popup">
            <span class="text_title">Hướng dẫn nhận thưởng</span>
            <img src="/assets/images/close_icon.png" class="nav_close" onclick="show_popup(0)">
        </div>
        <div class="container_popup">
     <b>Hướng dẫn nhận thưởng:</b>
     <br>
Khi các bạn trúng phần thưởng bất kỳ, hãy chụp lại màn hình có tên tài khoản và lịch sử lật hình rồi inbox hình ảnh đó về cho <a href="https://www.facebook.com/sanacc.vn/" target="_blank" style="color:#0056b3">Fanpage Sanacc.vn</a> . Đội ngũ hỗ trợ sẽ gửi quà đến các bạn.

        </div>
    </div>
</div>
<script>
    var vtri = "";

    function show_click(e) {
        $('.img_click_gift').hide();
        $('.show_shadow').removeClass('show_shadow');
        $(e).addClass('show_shadow');
        $(e).find('.img_click_gift').show();
        vtri = $(e).data('id');
    }

    function show_gift(type) {
        if(vtri == ""){
            alert('Bạn cần chọn 1 ô để tiếp tục !')
        }else{
        if (type == 1) {
            $.ajax({
                url: '/assets/ajax/random_lucky.php',
                type: 'POST',
                data: 1,
                async: false,
                dataType: 'json',
                success: function(data) {
                    // if (data.status == 0) {
                    //     alert('Vui lòng đăng nhập để thực hiện chức năng này!')
                    //     window.location.href = "/dang-nhap/";
                    //     return false;
                    // } else if(data.status == 2){
                    //      alert('Số lượt quay của đã hết, vui lòng kiểm tra lại !')
                    //     // window.location.href = "/recharge.html";
                    //     return false;
                    // }else {
                        var img_flip = `<img src="/images/sanacc/vqlq/diamond.svg" alt="diamond">`;
                        $('.div_gift').each(function(index) {
                            if ($(this).data('id') == vtri) {
                                $(this).find('.flip_show').html(img_flip)
                            }
                        });
                        $('.text_title').text('Phần thưởng !');
                        $('.container_popup').html(data.html);
                        $('.div_gift').addClass('hover_flip');
                        // $('.body_popup').show(100);
                        
                    // }
                },
                cache: false,
                contentType: false,
                processData: false
            });

        } else {
            $('.div_gift').removeClass('hover_flip');
        }
        }
    }

    function show_popup(type) {
        if (type == 0) {
            $('.body_popup').hide(100);
            window.location.href ="/lat-hinh/"
        } else if(type == 1) {
            $('.body_popup_1').show(100);
        }
        else if(type == 2) {
            $('.body_popup_2').show(100);
        }
        else if(type == 3) {
            $('.body_popup_3').show(100);
        }
    }
</script>