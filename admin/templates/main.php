<?php

// bộ đếm người dùng
$user_last_6day = $db->fetch_row("SELECT COUNT(*) FROM accounts WHERE time >= DATE_ADD(CURDATE(), INTERVAL -6 DAY);"); // 6 ngay truoc
$user_today = $db->fetch_row("SELECT COUNT(*) FROM accounts WHERE time >= DATE_ADD(CURDATE(), INTERVAL 0 DAY);"); // hom nay
$user_month = $db->fetch_row("SELECT COUNT(*) FROM accounts WHERE time > DATE_SUB(NOW(), INTERVAL 1 MONTH);"); // thang nay
$user_count = $db->fetch_row("SELECT COUNT(*) FROM accounts"); // all
// bộ đếm giao dịch
$buy_last_6day = $db->fetch_row("SELECT COUNT(*) FROM history_buy WHERE time >= DATE_ADD(CURDATE(), INTERVAL -6 DAY);"); // 6 ngay truoc
$buy_today = $db->fetch_row("SELECT COUNT(*) FROM history_buy WHERE time >= DATE_ADD(CURDATE(), INTERVAL 0 DAY);"); // giao dịch hôm nay
$buy_month = $db->fetch_row("SELECT COUNT(*) FROM history_buy WHERE time >= DATE_ADD(NOW(), INTERVAL 1 MONTH);"); // giao dịch tháng này
$buy_count_cash = $db->fetch_row("SELECT SUM(price) FROM history_buy WHERE time >= DATE_ADD(CURDATE(), INTERVAL 0 DAY);"); // all giao dịch

$card_today = $db->fetch_row("SELECT COUNT(*) FROM history_card WHERE status = 5 AND time >= DATE_ADD(CURDATE(), INTERVAL 0 DAY);"); // giao dịch hôm nay
$card_count_cash = $db->fetch_row("SELECT SUM(menhgia) FROM history_card WHERE status = 5 AND time >= DATE_ADD(CURDATE(), INTERVAL 0 DAY);"); // all giao dịch
$card_last_6day = $db->fetch_row("SELECT SUM(menhgia) FROM history_card WHERE status = 5 AND time >= DATE_ADD(CURDATE(), INTERVAL -6 DAY);"); // 6 ngay truoc
$card_month = $db->fetch_row("SELECT SUM(menhgia) FROM history_card WHERE status = 5 AND time >= DATE_ADD(NOW(), INTERVAL 1 MONTH);"); // giao dịch tháng này

?>


<div class="row">
    <div class="col-lg-4">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Người dùng <b data-toggle="tooltip" data-placement="right" title="6 ngày trước, hôm nay, tháng này"><i class="fa fa-question-circle"></i></b></h3>
            </div>
            <div class="block-content block-content-full text-center bg-gray-lighter">
                <span class="js-widget-line1"><?= $user_last_6day ?>,<?= $user_today ?>,<?= $user_month ?></span>
            </div>
            <div class="block-content">
                <div class="row items-push text-center">
                    <div class="col-xs-6">
                        <div class="push-5"><i class="si si-graph fa-2x"></i></div>
                        <div class="h5 font-w300 text-muted"><?= $user_count ?> Người</div>
                    </div>
                    <div class="col-xs-6">
                        <div class="push-5"><i class="si si-users fa-2x"></i></div>
                        <div class="h5 font-w300 text-muted" data-toggle="countTo" data-to="<?= $user_month ?>">+ <?= $user_month ?> Tháng này</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Giao dịch <b data-toggle="tooltip" data-placement="right" title="6 ngày trước, hôm nay, tháng này"><i class="fa fa-question-circle"></i></b></h3>
            </div>
            <div class="block-content block-content-full text-center bg-gray-lighter">
                <span class="js-widget-line2"><?= $buy_last_6day ?>,<?= $buy_today ?>,<?= $buy_month ?></span>
            </div>
            <div class="block-content">
                <div class="row items-push text-center">
                    <div class="col-xs-6">
                        <div class="push-5"><i class="si si-basket fa-2x"></i></div>
                        <div class="h5 font-w300 text-muted" data-toggle="tooltip" data-placement="right" title="Hôm nay"><?= $buy_today ?></div>
                    </div>
                    <div class="col-xs-6">
                        <div class="push-5"><i class="si si-check fa-2x" data-toggle="tooltip" data-placement="right" title="Hôm nay"></i></div>
                        <div class="h5 font-w300 text-muted">+<?php echo number_format($buy_count_cash, 0, '.', '.'); ?>đ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Nạp thẻ <b data-toggle="tooltip" data-placement="right" title="6 ngày trước, hôm nay, tháng này"><i class="fa fa-question-circle"></i></b></h3>
            </div>
            <div class="block-content block-content-full text-center bg-gray-lighter">
                <span class="js-widget-line3"><?= $card_last_6day ?>,<?php echo $card_count_cash; ?>,<?= $card_month ?></span>
            </div>
            <div class="block-content">
                <div class="row items-push text-center">
                    <div class="col-xs-6">
                        <div class="push-5"><i class="si si-wallet fa-2x" data-toggle="tooltip" data-placement="right" title="Hôm nay"></i></div>
                        <div class="h5 font-w300 text-muted"><?php echo $card_today; ?></div>
                    </div>
                    <div class="col-xs-6">
                        <div class="push-5"><i class="si si-graph fa-2x" data-toggle="tooltip" data-placement="right" title="Hôm nay"></i></div>
                        <div class="h5 font-w300 text-muted">+<?php echo number_format($card_count_cash, 0, '.', '.'); ?>đ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block">
    <div class="block-header">
        <h3 class="block-title">Bảo hành</h3>
    </div>
    <div class="block-content block-content-full text-left bg-gray-lighter">
        <table class="table table-borderless table-striped font-s13">
            <tbody>
                <tr>
                    <td class="font-w600" style="width: 30%;">Liên hệ</td>
                    <td><a href="https://www.facebook.com/mphamngoc95">Ngọc Mạnh</a> nếu gặp lỗi, chỉ hỗ trợ sửa lỗi miễn phí cho các trường hợp do code gặp bug</td>
                </tr>
                <tr>
                    <td class="font-w600">Điều khoản</td>
                    <td>Nếu tự ý hoặc để người khác chỉnh sửa thì bạn sẽ không được sửa lỗi code nữa</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>