<?php

$user_count = $db->fetch_row("SELECT COUNT(*) FROM accounts LIMIT 1"); // all
$buy_count = $db->fetch_row("SELECT COUNT(*) FROM posts where `status` ='1' LIMIT 1"); // đã bán
$sell_count = $db->fetch_row("SELECT COUNT(*) FROM posts where `status` ='0' LIMIT 1"); // chưa bán
// đếm time hoạt động
$startTimeStamp = strtotime("2017/02/01"); // ngày mở web
$endTimeStamp = strtotime(date("Y/m/d"));
$timeDiff = abs($endTimeStamp - $startTimeStamp);
$numberDays = $timeDiff/86400;  // 86400 seconds in one day
$numberDays = intval($numberDays);
?></main><div class="all">
        <footer>
     <div class="top">
      <div class="left">
            <h4><font size = 3 color = "#cccccc">Liên Hệ Tư Vấn Miễn phí
</font></h4><br>
            <p><img src="/assets/images/address.png" width="25px" height ="25px"/>  Tổ 6, Mộ Lao, Nguyễn Trãi, Hà Đông, Hà Nội</p>
             <p><img src="/assets/images/call.png" width="25px" height ="25px"/>  0988.347.963 (SĐT zalo)</p>
             <p><img src="/assets/images/mail.png" width="25px" height ="25px"/>  Mphamngoc95@gmail.com</p>
        </div>
        <div class = "mid">
            <h4><font size = 3 color = "#cccccc">Kết nối với chúng tôi</font></h4>
            <br>
           <a href = "https://www.facebook.com/page.lienquanmobile/" target = "_blank" rel = "nofollow"><img src="/assets/images/facebook-footer.png" width="35px" height ="35px"/></a>
           &nbsp;&nbsp;<a href = "https://twitter.com/lienquan360" target = "_blank" rel = "nofollow"><img src="/assets/images/twitter-footer.png" width="35px" height ="35px"/> </a>&nbsp;&nbsp;<a href = "https://www.instagram.com/lienquanmobile.vn/" target = "_blank" rel = "nofollow"><img src="/assets/images/instagram-footer.png" width="35px" height ="35px"/></a>
        </div>
        <div class="right">
            <h4><font size = 3 color = "#cccccc">Thống Kê Giao Dịch</font></h4>
            <br>
            <ul>
                <!--<li><i class="fa fa-calendar-check-o" aria-hidden="true"></i><p><?php echo number_format($numberDays, 0, '.', '.'); ?><br /><span>Ngày hoạt động</span></p></li>-->
                <li><i class="fa fa-users" aria-hidden="true"></i><p><?php echo number_format($user_count); ?><br /><span>Thành viên</span></p></li>
                <li><i class="fa fa-bar-chart" aria-hidden="true"></i><p><?php echo number_format($buy_count); ?><br /><span>&nbsp;&nbsp;Acc đã bán</span></p></li>
                <li><i class="fa fa-tags" aria-hidden="true"></i><p><?php echo number_format($sell_count); ?><br /><span>&nbsp;Acc đang bán</span></p></li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="bottom">
        Copyright © 2018  | All rights reserved | Lienquanmobile.vn | <a href="/chinh-sach-bao-mat" target="_blank" rel="nofollow">Chính sách bảo mật</a>
    </div> 
    <div class="clear"></div>
</footer>
</div>
</div>

<?php if($data_site['status']==0 && $class != 'admin'): ?>
<div class="modal fade" id="modal-thongbao" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-top">
<div class="modal-content">
<div class="block block-themed block-transparent remove-margin-b">
<div class="block-header bg-primary-dark">
<ul class="block-options">
<li>
<button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
</li>
</ul>
<h3 class="block-title">Thông báo</h3>
</div>
<div class="block-content">
<p>BẢO TRÌ NẠP THẺ ONLINE, AE MUA ACC GD QUA ATM ( NGÂN HÀNG Ạ ), 100K ATM = 130K TÀI KHOẢN WEB</p>
</div>
</div>
<div class="modal-footer">
<button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> Đã hiểu</button>
</div>
</div>
</div>
</div>
<?php endif; ?>

<script src="<?php echo $_DOMAIN; ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/sweetalert.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/pages/base_ui_widgets.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/plugins/slick/slick.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.appear.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.countTo.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/jquery.placeholder.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/js.cookie.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/core/bootstrap3-typeahead.min.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/accountSC.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/filter.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/app.js"></script>
<script src="<?php echo $_DOMAIN; ?>assets/js/plugins/magnific-popup/magnific-popup.min.js"></script>


<script type="text/javascript">


</script>
</body>
</html>