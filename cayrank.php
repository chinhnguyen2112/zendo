<?php
$title = 'Cày Rank Liên Quân | Dịch Vụ Leo Rank Liên Quân';
// Require database & th么ng tin chung
require_once 'core/init.php';

// Require header
require_once 'includes/header-thu-van-may-9k.php';
$arr_rank = rank_arr();
$name_booster_arr = name_booster_arr();

$id = $data_user['id'];
$sql = "SELECT * FROM booster";
$count = $db->fetch_assoc($sql, 0);

$sql_cayrank = "SELECT * FROM cayrank WHERE user_id = $id";
$cayrank = $db->fetch_assoc($sql_cayrank, 1);

?>
<link rel="stylesheet" href="/assets/css/sanacc/cayrank.css?v=<?= time() ?>">
<div id="main_ranking">
    <!-- banner -->
    <div class="banner_ranking">
        <div class="text_banner_ranking">
            <img src="/images/sanacc/cayrank/logo-zendo.png" alt="logo-zendo">
            <p>ZENDO CÀY THUÊ có đội ngũ cày thuê hàng đầu chuyên cày tất cả các bậc hạng của các game như Liên Minh Huyền Thoại, Liên Quân Mobile, v.v...</p>
            <h3>UY TÍN - CHẤT LƯỢNG - BẢO MẬT</h3>
        </div>
    </div>

    <!-- content_ranking -->
    <div class="content_ranking">
        <!-- header -->
        <div class="header_content_ranking">
            <h2>LIÊN QUÂN MOBILE</h2>
            <img src="/images/sanacc/cayrank/title-underline.png" alt="title-underline">
        </div>

        <!-- main content -->
        <form action="" id="hire_ranking">
            <div class="main_content_ranking">
                <div class="box_left">
                    <div class="row_ranking">
                        <div class="row_ranking_container rank_ht">
                            <div class="title_row_ranking">
                                <p class="border_green">1</p>
                                <p>Rank <span>Hiện Tại</span></p>
                            </div>

                            <div class="box_choose_rank">
                                <div class="rank-img">
                                    <img name="image1" src="/assets/img/icon/ranh_dong.png" alt="rank_img">
                                </div>
                                <div class="choose_rank">
                                    <div class="row1">
                                        <div class="col_ranking mr-40">
                                            <label for="">Rank</label>
                                            <select class="select_ranking_1" name="select_ranking_1" id="">
                                                <option value="1">Đồng</option>
                                                <option value="2">Bạc</option>
                                                <option value="3">Vàng</option>
                                                <option value="4">Bạch Kim</option>
                                                <option value="5">Kim Cương</option>
                                                <option value="6">Tinh Anh</option>
                                                <option value="7">Cao Thủ</option>
                                                <!-- <option value="8">Thách đấu</option> -->
                                            </select>

                                        </div>


                                        <div class="col_ranking">
                                            <label for="">Bậc</label>
                                            <select class="get_rank_1 bronze_1 none active_select_1" name="" id="">
                                                <option value="0" selected>Đồng III</option>
                                                <option value="21000">Đồng II</option>
                                                <option value="43500">Đồng I</option>
                                            </select>
                                            <select class="get_rank_1 silver_1 none" name="" id="">
                                                <option value="68500" selected>Bạc III</option>
                                                <option value="94500">Bạc II</option>
                                                <option value="123500">Bạc I</option>
                                            </select>
                                            <select class="get_rank_1 gold_1 none" name="" id="">
                                                <option value="156000" selected>Vàng IV</option>
                                                <option value="195000">Vàng III</option>
                                                <option value="237000">Vàng II</option>
                                                <option value="282000">Vàng I</option>
                                            </select>
                                            <select class="get_rank_1 platinum_1 none" name="" id="">
                                                <option value="331000" selected>Bạch Kim V</option>
                                                <option value="380000">Bạch Kim IV</option>
                                                <option value="432000">Bạch Kim III</option>
                                                <option value="487000">Bạch Kim II</option>
                                                <option value="545000">Bạch Kim I</option>
                                            </select>
                                            <select class="get_rank_1 diamond_1 none" name="" id="">
                                                <option value="606000" selected>Kim Cương V</option>
                                                <option value="672500">Kim Cương IV</option>
                                                <option value="743500">Kim Cương III</option>
                                                <option value="819000">Kim Cương II</option>
                                                <option value="899000">Kim Cương I</option>
                                            </select>
                                            <select class="get_rank_1 elite_1 none" name="" id="">
                                                <option value="983500" selected>Tinh Anh V</option>
                                                <option value="1068000">Tinh Anh IV</option>
                                                <option value="1154000">Tinh Anh III</option>
                                                <option value="1241500">Tinh Anh II</option>
                                                <option value="1330500">Tinh Anh I</option>
                                            </select>

                                            <select class="get_rank_1 master_1 none" name="" id="">
                                                <option value="1423000" selected>Cao Thủ</option>
                                            </select>

                                            <!-- <select class="get_rank_1 challegen_1 none" name="" id="">
                                                <option value="2000" selected>Thách Đấu</option>
                                            </select> -->

                                        </div>

                                    </div>

                                    <div class="row2">
                                        <label for="">Hàng Chờ</label>
                                        <select name="" onchange="" id="chedo_rank_ht">
                                            <option value="0">Rank Đơn/Đôi</option>
                                            <option value="1">Rank Linh Hoạt</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row_ranking">
                        <div class="row_ranking_container rank_mm">
                            <div class="title_row_ranking">
                                <p class="border_green">2</p>
                                <p>Rank <span>Mong Muốn</span></p>
                            </div>

                            <div class="box_choose_rank">
                                <div class="rank-img">
                                    <img name="image2" src="/assets/img/icon/ranh_dong.png" alt="rank_img">
                                </div>
                                <div class="choose_rank">
                                    <div class="row1">
                                        <div class="col_ranking mr-40">
                                            <label for="">Rank</label>
                                            <select class="select_ranking_2" name="select_ranking_2" id="">
                                                <option value="1">Đồng</option>
                                                <option value="2">Bạc</option>
                                                <option value="3">Vàng</option>
                                                <option value="4">Bạch Kim</option>
                                                <option value="5">Kim Cương</option>
                                                <option value="6">Tinh Anh</option>
                                                <option value="7">Cao Thủ</option>
                                                <!-- <option value="8">Thách đấu</option> -->
                                            </select>
                                        </div>

                                        <div class="col_ranking">
                                            <label for="">Bậc</label>
                                            <select class="get_rank_2 bronze_2 none active_select_2" name="" id="">
                                                <option value="0" selected>Đồng III</option>
                                                <option value="21000">Đồng II</option>
                                                <option value="43500">Đồng I</option>
                                            </select>
                                            <select class="get_rank_2 silver_2 none" name="" id="">
                                                <option value="68500" selected>Bạc III</option>
                                                <option value="94500">Bạc II</option>
                                                <option value="123500">Bạc I</option>
                                            </select>
                                            <select class="get_rank_2 gold_2 none" name="" id="">
                                                <option value="156000" selected>Vàng IV</option>
                                                <option value="195000">Vàng III</option>
                                                <option value="237000">Vàng II</option>
                                                <option value="282000">Vàng I</option>
                                            </select>
                                            <select class="get_rank_2 platinum_2 none" name="" id="">
                                                <option value="331000" selected>Bạch Kim V</option>
                                                <option value="380000">Bạch Kim IV</option>
                                                <option value="432000">Bạch Kim III</option>
                                                <option value="487000">Bạch Kim II</option>
                                                <option value="545000">Bạch Kim I</option>
                                            </select>
                                            <select class="get_rank_2 diamond_2 none" name="" id="">
                                                <option value="606000" selected>Kim Cương V</option>
                                                <option value="672500">Kim Cương IV</option>
                                                <option value="743500">Kim Cương III</option>
                                                <option value="819000">Kim Cương II</option>
                                                <option value="899000">Kim Cương I</option>
                                            </select>
                                            <select class="get_rank_2 elite_2 none" name="" id="">
                                                <option value="983500" selected>Tinh Anh V</option>
                                                <option value="1068000">Tinh Anh IV</option>
                                                <option value="1154000">Tinh Anh III</option>
                                                <option value="1241500">Tinh Anh II</option>
                                                <option value="1330500">Tinh Anh I</option>
                                            </select>
                                            <select class="get_rank_2 master_2 none" name="" id="">
                                                <option value="1423000" selected>Cao Thủ</option>
                                            </select>

                                            <!-- <select class="get_rank_2 challegen_2 none" name="" id="">
                                                <option value="2000" selected>Thách Đấu</option>
                                            </select> -->

                                        </div>

                                    </div>

                                    <div class="row2">
                                        <label for="">Hàng Chờ</label>
                                        <select name="" id="chedo_rank_mm" disabled>
                                            <option value="0">Rank Đơn/Đôi</option>
                                            <option value="1">Rank Linh Hoạt</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- option -->
                    <div class="row_ranking">
                        <div class="option">
                            <div class="title_row_ranking">
                                <p class="border_green">3</p>
                                <p>Tùy chọn</p>
                            </div>

                            <div class="option_input">
                                <div class="main_text col-half mr-20 sao_ht">
                                    <label for="">Số sao hiện tại*</label>
                                    <input type="text" name="sao_ht" id="star_now">
                                </div>

                                <div class="main_text col-half sao_mm">
                                    <label for="">Số sao mong muốn*</label>
                                    <input type="text" name="sao_mm" id="star_end">
                                </div>
                            </div>

                            <div class="option_ex">
                                <p>Tùy chọn mở rộng</p>
                                <div class="option_checkbox date_checkbox">
                                    <input type="checkbox" name="date_input" id="date_input">
                                    <span>Đặt lịch cày</span>
                                    <img src="/images/sanacc/cayrank/important.svg" alt="important">
                                </div>
                                <!-- chon lich cay -->
                                <div class="choose_date option_none mt20 mb20">
                                    <div class="main_text col-half mr-20">
                                        <label for="">Ngày bắt đầu*</label>
                                        <input type="date" name="time_start" id="time_start">
                                    </div>

                                    <div class="main_text col-half">
                                        <label for="">Ngày kết thúc</label>
                                        <input type="date" name="time_end" id="time_end">
                                    </div>
                                </div>

                                <div class="option_checkbox">
                                    <input type="checkbox" name="" id="champ_input">
                                    <span>Chọn tướng +30.00%</span>
                                    <img src="/images/sanacc/cayrank/important.svg" alt="important">
                                </div>

                                <div class="choose_champ option_none">
                                    <input type="text" class="champ_name ui-autocomplete-input" name="champ" placeholder="Aleister, Alice, Điêu Thuyền..." id="champ">
                                </div>

                                <div class="option_checkbox">
                                    <input type="checkbox" name="flash_play" id="flash_input" value="1">
                                    <span>Cày siêu tốc +35.00%</span>
                                    <img src="/images/sanacc/cayrank/important.svg" alt="important">
                                </div>

                                <div class="option_checkbox">
                                    <input type="checkbox" name="" id="dual_input" value="1">
                                    <span>Chơi cùng Booster +50.00%</span>
                                    <img src="/images/sanacc/cayrank/important.svg" alt="important">
                                </div>

                                <div class="option_checkbox">
                                    <input type="checkbox" name="" id="booster_input">
                                    <span>Chọn Booster</span>
                                </div>

                                <div class="choose_booster name_booster_none">
                                    <input type="text" name="name_booster" id="name_booster" value="">
                                </div>
                            </div>

                            <div class="enter_acc">
                                <div class="info1 mb20">
                                    <p for="">Để bảo mật, chúng tôi sẽ nhận thông tin tài khoản Liên quân của bạn qua tin nhắn. Để lại Facebook hoặc Zalo của bạn, chúng tôi sẽ chủ động liên hệ.</p>
                                </div>

                                <div class="info2">
                                    <div class="col_info2 mr-20 account_input">
                                        <p for="">Facebook của bạn*</p>
                                        <input type="text" name="your_account" placeholder="Nhập link Facebook" id="your_account">
                                    </div>

                                    <div class="col_info2 password_input">
                                        <p for="">Zalo của bạn*</p>
                                        <input type="number" name="your_password" placeholder="Nhập số Zalo" id="your_password">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="box_right">
                    <div class="box_right_container">
                        <div class="row1_box_right">
                            <div class="tit_row1">
                                <p>4</p>
                                <span>Thanh Toán</span>
                            </div>

                            <div class="body_row1">
                                <div class="list_text_pay">
                                    <span>Booster</span>
                                    <div class="value_cores">
                                        <img src="/images/sanacc/cayrank/dot-green.svg" alt="dot-green">
                                        <p>Sẵn sàng</p>
                                    </div>
                                </div>

                                <div class="list_text_pay">
                                    <span>Chế độ cày</span>
                                    <div class="value_cores">
                                        <img src="/images/sanacc/cayrank/dot-green.svg" alt="dot-green">
                                        <p>Luôn ẩn danh</p>
                                    </div>
                                </div>

                                <div class="list_text_pay">
                                    <span>Tài khoản</span>
                                    <div class="value_cores">
                                        <img src="/images/sanacc/cayrank/dot-green.svg" alt="dot-green">
                                        <p>Bảo mật thông tin</p>
                                    </div>
                                </div>

                                <div class="list_text_pay">
                                    <span>Đơn hàng</span>
                                    <div class="value_cores">
                                        <img src="/images/sanacc/cayrank/dot-green.svg" alt="dot-green">
                                        <a href="/tien-do-cay-rank/">Theo dõi đơn hàng</a>
                                    </div>
                                </div>

                                <div class="list_text_pay">
                                    <span>Hỗ trợ viên</span>
                                    <div class="value_cores">
                                        <img src="/images/sanacc/cayrank/dot-green.svg" alt="dot-green">
                                        <p>Hoạt động 24/7</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row2_box_right">
                            <p>Tích để chọn ưu đãi</p>
                            <div class="row_check_box">
                                <input type="checkbox" class="check_box_voucher" name="" id="">
                                <p>Ưu đãi từ Zendo</p>
                            </div>

                            <div class="price_notice">
                                <p>Báo giá</p>
                                <p class="tong_tien"><span class="card_money">0</span>đ Card <span>hoặc</span> <span class="atm_money">0</span>đ ATM/Momo</p>
                            </div>

                            <button type="submit" class="pay_btn">
                                Đăng ký
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>

    <!-- commitment -->
    <div class="commit">
        <div class="commit_container">
            <div class="header_content_ranking">
                <h2>CHÚNG TÔI CAM KẾT</h2>
                <img src="/images/sanacc/cayrank/title-underline.png" alt="title-underline">
            </div>

            <div class="content_commit">
                <div class="commit_cate">
                    <img src="/images/sanacc/cayrank/sield1.png" alt="sield1">
                    <p>Đảm bảo về bảo mật tài khoản</p>
                </div>

                <div class="commit_cate">
                    <img src="/images/sanacc/cayrank/sield2.png" alt="sield2">
                    <p>Tiến độ cày Rank nhanh chóng</p>
                </div>

                <div class="commit_cate">
                    <img src="/images/sanacc/cayrank/sield3.png" alt="sield3">
                    <p>Kiểm tra đơn hàng 24/7</p>
                </div>

                <div class="commit_cate">
                    <img src="/images/sanacc/cayrank/sield4.png" alt="sield4">
                    <p>Thanh toán linh hoạt qua ATM/Momo</p>
                </div>
            </div>

        </div>
    </div>

    <!-- result ex -->

    <div class="result_ex">
        <div class="result_ex_container">
            <h2>KẾT QUẢ CÀY RANK LIÊN QUÂN TỪ PLAYER</h2>
            <div class="text_result">
                <p>Là một trong những team hàng đầu về dịch vụ về cày thuê Liên Quân, với lượng khách hàng lên tới hàng trăm mỗi tháng. Chúng tôi luôn cố gắng update những kết quả mới nhất cho các bạn thấy cái nhìn trực quan nhất.</p>
                <p>Chúng tôi luôn tự tin và giữ vững tín chỉ là đơn vị cày thuê Liên Quân uy tín và giá rẻ hàng đầu thị trường. Không chỉ cày thuê Liên Quân giá rẻ, chúng tôi cày thuê Liên Quân uy tín hàng đầu được hàng trăm khách hàng gắn bó và tin tưởng.</p>
                <p>Tuy nhiên, chúng tôi chỉ cung cấp ảnh chụp màn hình với các biệt danh mờ để bảo vệ danh tính của khách hàng. Có rất nhiều khách hàng khác nhau được chúng tôi “cải thiện rank” tuy nhiên. Đây là một số khách hàng tiêu biểu với nhiều rank khác nhau để tham khảo.</p>
            </div>

            <div class="list_img_result">
                <div class="result_img">
                    <img src="/images/sanacc/cayrank/result1.png" alt="result1">
                    <img src="/images/sanacc/cayrank/result2.png" alt="result2">
                    <img src="/images/sanacc/cayrank/result3.png" alt="result3">
                    <img src="/images/sanacc/cayrank/result4.png" alt="result4">
                    <img src="/images/sanacc/cayrank/result5.png" alt="result5">
                </div>
            </div>
        </div>
    </div>

</div>

<!-- popup voucher -->
<div class="popup_voucher_ranking voucher_ranking_none">
    <div class="main_popup_voucher">
        <div class="title_popup_voucher">
            <p>Voucher Zendo</p>
        </div>


        <div class="body_voucher_ranking">
            <div class="box_voucher_ranking">

                <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="dis_10_percent">
                    <p>Giảm 10% cho tất cả các đơn hàng </p>
                </div>

                <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="dis_20k">
                    <p>Giảm 20.000đ cho đơn hàng đầu tiên </p>
                </div>

                <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="dis_19k">
                    <p>Giảm 19.000đ cho đơn hàng từ 199.000đ </p>
                </div>

                <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="dis_25k">
                    <p>Giảm 25.000đ cho đơn hàng từ 250.000đ</p>
                </div>

                <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="dis_30k">
                    <p>Giảm 30.000đ cho đơn hàng tối thiểu 300.000đ</p>
                </div>


                <!-- <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="give_vqqh">
                    <p>Đơn hàng từ 500.000đ tặng 1 vòng quay Quân huy</p>
                </div>

                <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="give_vqa">
                    <p>Đơn hàng từ 600.000đ tặng 1 Vòng quay acc</p>
                </div> -->

                <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="give_qhuy">
                    <p>Đơn hàng trên 500.000 tặng quân huy bằng 10%</p>
                </div>

                <!-- <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="give_200qh">
                    <p>Đơn hàng trên 1.000.000 tặng 200 quân huy</p>
                </div> -->

                <!-- <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="5_percent_zen">
                    <p>Hoàn 5% Zen khi mua hàng từ 99.000đ</p>
                </div>

                <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="7_percent_zen">
                    <p>Hoàn 7% Zen khi mua hàng từ 299.000đ</p>
                </div>

                <div class="voucher_nav">
                    <input type="checkbox" class="voucher_zendo" name="" id="10_percent_zen">
                    <p>Hoàn 10% Zen khi mua hàng từ 499.000đ</p>
                </div> -->


            </div>
        </div>

        <div class="voucher_ranking_btn">
            <span class="close_voucher_popup">Đóng</span>
            <span class="add_voucher_popup">Áp dụng</span>
        </div>

    </div>
</div>

<?php
// Require footer
require_once 'includes/footer.php';

?>

<!-- modal confirm -->
<div class="modal_confirm none_modal">
    <div class="modal_confirm_container">
        <!-- header modal -->
        <div class="modal_confirm_box">
            <div class="modal_header">
                <div class="back_button">
                    <img src="/images/sanacc/cayrank/arrow_left.svg" alt="arrow_icon">
                </div>
                <h2>CHECK OUT</h2>
            </div>
            <!-- end header modal -->

            <div class="modal_main">
                <div class="modal_body">
                    <table>
                        <tr class="header_table_modal">
                            <th class="item1">NỘI DUNG LỰA CHỌN</th>
                            <th class="item2 text_center">ĐÃ CHỌN</th>
                            <th class="item3">CHI TIẾT</th>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Rank Hiện Tại</td>
                            <td class="text_center"></td>
                            <td class="rank_now"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Rank mong muốn</td>
                            <td class="text_center"></td>
                            <td class="rank_end"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Chế độ rank</td>
                            <td class="text_center"></td>
                            <td class="type_rank"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Số sao hiện tại</td>
                            <td class="text_center">
                                <img class="star_now_tick" src="/images/sanacc/cayrank/tick-circle.svg" alt="tick">
                                <img class="star_now_close" src="/images/sanacc/cayrank/close-circle.svg" alt="close">
                            </td>
                            <td class="star_now"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Số sao mong muốn</td>
                            <td class="text_center">
                                <img class="star_end_tick" src="/images/sanacc/cayrank/tick-circle.svg" alt="tick">
                                <img class="star_end_close" src="/images/sanacc/cayrank/close-circle.svg" alt="close">
                            </td>
                            <td class="star_end"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Thời gian bắt đầu cày</td>
                            <td class="text_center">
                                <img class="time_start_tick" src="/images/sanacc/cayrank/tick-circle.svg" alt="tick">
                                <img class="time_start_close" src="/images/sanacc/cayrank/close-circle.svg" alt="close">
                            </td>
                            <td class="time_start"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Thời gian kết thúc cày</td>
                            <td class="text_center">
                                <img class="time_end_tick" src="/images/sanacc/cayrank/tick-circle.svg" alt="tick">
                                <img class="time_end_close" src="/images/sanacc/cayrank/close-circle.svg" alt="close">
                            </td>
                            <td class="time_end"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Chọn tướng cày +30% </td>
                            <td class="text_center">
                                <img class="champ_tick" src="/images/sanacc/cayrank/tick-circle.svg" alt="tick">
                                <img class="champ_close" src="/images/sanacc/cayrank/close-circle.svg" alt="close">
                            </td>
                            <td class="champ"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Cày siêu tốc +35%</td>
                            <td class="text_center">
                                <img class="flash_play_tick" src="/images/sanacc/cayrank/tick-circle.svg" alt="tick">
                                <img class="flash_play_close" src="/images/sanacc/cayrank/close-circle.svg" alt="close">
                            </td>
                            <td class="flash_play"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Chơi cùng Booster +50%</td>
                            <td class="text_center">
                                <img class="dual_booster_tick" src="/images/sanacc/cayrank/tick-circle.svg" alt="tick">
                                <img class="dual_booster_close" src="/images/sanacc/cayrank/close-circle.svg" alt="close">
                            </td>
                            <td class="dual_booster"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Tên Booster</td>
                            <td class="text_center">
                                <img class="name_booster_tick" src="/images/sanacc/cayrank/tick-circle.svg" alt="tick">
                                <img class="name_booster_close" src="/images/sanacc/cayrank/close-circle.svg" alt="close">
                            </td>
                            <td class="name_booster"></td>
                        </tr>

                        <!-- <tr class="body_table_modal">
                            <td>Loại tài khoản</td>
                            <td class="text_center"></td>
                            <td class="style_account"></td>
                        </tr> -->

                        <tr class="body_table_modal">
                            <td>Link Facebook</td>
                            <td class="text_center"></td>
                            <td class="your_account"></td>
                        </tr>

                        <tr class="body_table_modal">
                            <td>Zalo</td>
                            <td class="text_center"></td>
                            <td class="your_password"></td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="modal_submit">
                <div class="price_notice">
                    <p>Báo giá</p>
                    <p class="tong_tien"><span class="card_money">0</span>₫ Card <span>hoặc</span> <span class="atm_money">0</span>₫ ATM</p>
                </div>

                <div class="modal_submit_btn">
                    <p class="submit_data_btn">Thanh Toán</p>
                </div>

                <div class="method_pay">
                    <img src="/images/sanacc/cayrank/atm_pay.png" alt="atm_pay">
                    <img src="/images/sanacc/cayrank/visa_pay.png" alt="visa_pay">
                    <img src="/images/sanacc/cayrank/paypal_pay.png" alt="paypal_pay">
                    <img src="/images/sanacc/cayrank/momo_pay.png" alt="momo_pay">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal confirm -->

<!-- popup booster -->
<div class="popup_booster booster_none">
    <div class="popup_booster_box">
        <!-- header -->
        <div class="modal_header mb0">
            <div class="back_button out_booster">
                <img src="/images/sanacc/cayrank/arrow_left.svg" alt="arrow_icon">
            </div>
            <h2>CHỌN BOOSTER</h2>
        </div>

        <!-- body -->
        <div class="popup_booster_main">
            <div class="popup_booster_body body_popup_none">
                <table>
                    <tr class="header_table_booster">
                        <th class="id_col text_center">#</th>
                        <th class="ava_col text_center">ẢNH ĐẠI DIỆN</th>
                        <th class="shared_col">HỌ TÊN</th>
                        <th class="shared_col">TRẠNG THÁI</th>
                        <th class="shared_col">ĐÁNH GIÁ</th>
                    </tr>

                    <?php foreach ($count as $key => $val) { ?>
                        <tr class="body_table_booster" data-id="<?= $val['id'] ?>">
                            <td class="text_center">
                                <div class="id_col"><?= $val['id'] ?></div>
                                <img class="choose_booster_img icon_check_none" src="/images/sanacc/cayrank/cd.svg" alt="cd_icon">
                            </td>
                            </td>
                            <td class="ava_col text_center">
                                <img src="/images/sanacc/cayrank/ava_booster.png" alt="avatar">
                            </td>
                            <td class="shared_col col_name_booster"><?= $val['name_booster'] ?></td>
                            <td class="shared_col">
                                <div class="booster_free">
                                    <?php if ($val['status'] == 0) {
                                        echo '<img src="/images/sanacc/cayrank/free.svg" alt="status">';
                                        echo '<span>Đang rảnh</span>';
                                    } else {
                                        echo '<img src="/images/sanacc/cayrank/busy.svg" alt="status">';
                                        echo '<span>Đang cày</span>';
                                    } ?>
                                </div>
                            </td>
                            <td class="shared_col vote_star">
                                <?php if ($val['vote'] == 0) {
                                    echo ' <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">';
                                } else if ($val['vote'] == 1) {
                                    echo ' <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">';
                                } else if ($val['vote'] == 2) {
                                    echo ' <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">';
                                } else if ($val['vote'] == 3) {
                                    echo ' <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">';
                                } else if ($val['vote'] == 4) {
                                    echo ' <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/star.svg" alt="star">';
                                } else {
                                    echo ' <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">
                                <img src="/images/sanacc/cayrank/gold_star.svg" alt="gold_star">';
                                } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <!-- popup on mobile -->
            <div class="popup_booster_mobile popup_booster_body">
                <table>
                    <tr class="header_table_booster">
                        <th class="id_col text_center">#</th>
                        <th class="shared_col">HỌ TÊN</th>
                    </tr>
                    <?php foreach ($count as $key => $val) { ?>
                        <tr class="table_booster_mobile">
                            <td class="text_center">
                                <div class="id_col"><?= $val['id'] ?></div>
                                <img class="choose_booster_img icon_check_none" src="/images/sanacc/cayrank/cd.svg" alt="cd_icon">
                            </td>
                            <td class="shared_col">
                                <span class="col_name_booster" data-id="<?= $val['name_booster'] ?>"><?= $val['name_booster'] ?></span>
                                <img class="export_info" data-id="<?= $val['id'] ?>" src="/images/sanacc/cayrank/export.svg" alt="icon export">
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

        </div>

        <div class="choose_booster_name">
            <span>XÁC NHẬN CHỌN</span>
        </div>

    </div>
</div>

<div class="info_booster_popup popup_booster info_booster_none">
    <div class="info_booster_box popup_booster_box">
        <div class="modal_header mb0">
            <div class="out_info_booster">
                <img src="/images/sanacc/cayrank/arrow_left.svg" alt="arrow_icon">
            </div>
            <h2>CHỌN BOOSTER</h2>
        </div>

        <div class="info_booster_body">
            <img class="ava_booster" src="/images/sanacc/cayrank/ava_booster.png" alt="ava_booster">
            <p class="info_name_booster"></p>

            <p class="green_text mt16">TRẠNG THÁI</p>
            <div class="info_status_booster">

            </div>
            <p class="green_text">ĐÁNH GIÁ</p>
            <div class="shared_col vote_star_mobile">

            </div>

        </div>

    </div>
</div>
<script src="https://zendo.vn/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/jquery.validate.min.js"></script>
<link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
<script src="/assets/js/jquery-ui.min.js"></script>
<script>
    var val_rank_1 = 0;
    var val_rank_2 = 0;
    var tien_chon_rank = 0;
    var tong_tien = 0;
    var tam_tuong = 0;
    var tam_tocdo = 0;
    var tam_booster = 0;
    var data = 0;
    // js change choose ranking

    // rank hien tai
    $('.select_ranking_1').change(function() {
        var value_select_1 = $('.select_ranking_1').val();
        var nameImg = 'ranh_dong';
        if (value_select_1 == 1) {
            nameImg = 'ranh_dong';
            $('.active_select_1').removeClass('active_select_1')
            $('.bronze_1').addClass('active_select_1')
        } else if (value_select_1 == 2) {
            nameImg = 'ranh_bac';
            $('.active_select_1').removeClass('active_select_1')
            $('.silver_1').addClass('active_select_1')
        } else if (value_select_1 == 3) {
            nameImg = 'ranh_vang';
            $('.active_select_1').removeClass('active_select_1')
            $('.gold_1').addClass('active_select_1')
        } else if (value_select_1 == 4) {
            nameImg = 'ranh_bk';
            $('.active_select_1').removeClass('active_select_1')
            $('.platinum_1').addClass('active_select_1')
        } else if (value_select_1 == 5) {
            nameImg = 'ranh_kc';
            $('.active_select_1').removeClass('active_select_1')
            $('.diamond_1').addClass('active_select_1')
        } else if (value_select_1 == 6) {
            nameImg = 'ranh_ta';
            $('.active_select_1').removeClass('active_select_1')
            $('.elite_1').addClass('active_select_1')
        } else if (value_select_1 == 7) {
            nameImg = 'rank_ct';
            $('.active_select_1').removeClass('active_select_1')
            $('.master_1').addClass('active_select_1')
        } else if (value_select_1 == 8) {
            nameImg = 'rank_ct';
            $('.active_select_1').removeClass('active_select_1')
            $('.challegen_1').addClass('active_select_1')
        }
        document.images['image1'].src = '/assets/img/icon/' + nameImg + '.png';
        val_rank_1 = $('.active_select_1').val();

        if (val_rank_2 != 0) {
            run();
        }

    })

    // rank mong muon
    $('.select_ranking_2').change(function() {
        var value_select_2 = $('.select_ranking_2').val();
        var nameImg = 'ranh_dong';
        if (value_select_2 == 1) {
            nameImg = 'ranh_dong';
            $('.active_select_2').removeClass('active_select_2')
            $('.bronze_2').addClass('active_select_2')

        } else if (value_select_2 == 2) {
            nameImg = 'ranh_bac';
            $('.active_select_2').removeClass('active_select_2')
            $('.silver_2').addClass('active_select_2')
        } else if (value_select_2 == 3) {
            nameImg = 'ranh_vang';
            $('.active_select_2').removeClass('active_select_2')
            $('.gold_2').addClass('active_select_2')
        } else if (value_select_2 == 4) {
            nameImg = 'ranh_bk';
            $('.active_select_2').removeClass('active_select_2')
            $('.platinum_2').addClass('active_select_2')
        } else if (value_select_2 == 5) {
            nameImg = 'ranh_kc';
            $('.active_select_2').removeClass('active_select_2')
            $('.diamond_2').addClass('active_select_2')
        } else if (value_select_2 == 6) {
            nameImg = 'ranh_ta';
            $('.active_select_2').removeClass('active_select_2')
            $('.elite_2').addClass('active_select_2')
        } else if (value_select_2 == 7) {
            nameImg = 'rank_ct';
            $('.active_select_2').removeClass('active_select_2')
            $('.master_2').addClass('active_select_2')
        } else if (value_select_2 == 8) {
            nameImg = 'rank_ct';
            $('.active_select_2').removeClass('active_select_2')
            $('.challegen_2').addClass('active_select_2')
        }
        document.images['image2'].src = '/assets/img/icon/' + nameImg + '.png';
        val_rank_2 = $('.active_select_2').val();
        run();

    })
    // co dinh che do rank
    $('#chedo_rank_ht').change(function() {
        var gtri_rank_ht = $(this).val();
        $('#chedo_rank_mm').val(gtri_rank_ht).change();
    });

    // tinh gia cay thue
    $('.get_rank_1').change(function() {
        val_rank_1 = $(this).val();
        if (val_rank_2 != 0) {
            run();
        }
    });

    $('.get_rank_2').change(function() {
        val_rank_2 = $(this).val();
        run();
    });

    function run() {
        if (parseInt(val_rank_1) >= parseInt(val_rank_2)) {
            alert('Rank cần thuê phải cao hơn !');
        } else {
            tong_tien = tien_chon_rank = (val_rank_2 - val_rank_1);
            text_money();
        }
    }

    function text_money() {

        $('.card_money').text(tong_tien.toLocaleString('en-US'));
        $('.atm_money').text((tong_tien * 80 / 100).toLocaleString('en-US'));
    };

    // tong tien sau khi them tuy chon
    $('#date_input').click(function() {
        if ($(this).prop('checked')) {
            $('.choose_date').addClass('option_active')
        } else {
            $('.choose_date').removeClass('option_active')
        }
    });

    $('#champ_input').click(function() {
        if ($(this).prop('checked')) {
            if (tong_tien > 0) {
                $('.choose_champ').addClass('option_active');
                tam_tuong = tien_chon_rank * 30 / 100;
                tong_tien = tong_tien + tam_tuong;
            } else {
                $('.popup_rank_mm').show()
                $(this).prop('checked', false)
            }

        } else {
            $('.choose_champ').removeClass('option_active');
            tong_tien = tong_tien - tam_tuong;
        }
        text_money();
    });

    $('#flash_input').click(function() {
        if ($(this).prop('checked')) {
            if (tong_tien > 0) {
                tam_tocdo = tien_chon_rank * 35 / 100;
                tong_tien = tong_tien + tam_tocdo;
            } else {
                $('.popup_rank_mm').show()
                $(this).prop('checked', false)
            }
        } else {

            tong_tien = tong_tien - tam_tocdo;

        }
        text_money();
    });

    $('#dual_input').click(function() {
        if ($(this).prop('checked')) {
            if (tong_tien > 0) {
                tam_booster = tien_chon_rank * 50 / 100;
                tong_tien = tong_tien + tam_booster;
            } else {
                $('.popup_rank_mm').show()
                $(this).prop('checked', false)
            }
        } else {
            tong_tien = tong_tien - tam_booster;
        }
        text_money();
    });


    // click checkbox chon booster

    $('#booster_input').click(function() {
        if ($(this).prop('checked')) {
            $('.booster_none').removeClass('booster_none') //bat popup booster
            $('.popup_booster').addClass('booster_open')
            $('.choose_booster').removeClass('option_none') // hien thi input name booster
            $('.choose_booster').addClass('option_active')
        } else {
            $('.choose_booster').removeClass('option_active') // tat input name booster
            $('.choose_booster').addClass('option_none')
        }
    });

    // tat booster popup
    $('.out_booster').click(function() {
        $('.popup_booster').removeClass('booster_open')
        $('.popup_booster').addClass('booster_none')
    });

    // chon booster trong popup
    $('.body_table_booster, .table_booster_mobile').click(function() {

        $('.border_click').removeClass('border_click')
        $('.icon_check_open').removeClass('icon_check_open')
        $('.choose_booster_img').addClass('icon_check_none')
        $('.id_none').removeClass('id_none')
        $(this).addClass('border_click')
        $('.border_click').find('.id_col').addClass('id_none')
        $('.border_click').find('.icon_check_none').removeClass('icon_check_none')
        $('.border_click').find('.choose_booster_img').addClass('icon_check_open')
        var name_booster = $(this).find('.col_name_booster').text();
        var status_booster = $(this).find('.booster_free').html();
        console.log(status_booster)
        $('#name_booster').val(name_booster);
        $('.info_name_booster').text(name_booster)
        $('.info_status_booster').html(status_booster)

    });

    $('.choose_booster_name').click(function() {
        if ($('.body_table_booster, .table_booster_mobile').hasClass('border_click')) {
            $('.popup_booster').removeClass('booster_open')
            $('.popup_booster').addClass('booster_none')
        }
    });


    // hien popup booster mobile
    $('.export_info').click(function() {
        $('.info_booster_popup').removeClass('info_booster_none')
        $('.info_booster_popup').addClass('info_booster_open')
        var id = $(this).data('id');
        var status_booster = "";
        var vote_star = "";
        $('.body_table_booster').each(function() {
            if ($(this).data('id') == id) {
                status_booster = $(this).find('.booster_free').html();
                vote_star = $(this).find('.vote_star').html();
            }
        })
        $('.info_status_booster').html(status_booster)
        $('.vote_star_mobile').html(vote_star)

    });

    // close popup booster_mobile
    $('.out_info_booster').click(function() {
        $('.info_booster_popup').removeClass('info_booster_open')
        $('.info_booster_popup').addClass('info_booster_none')
    });


    // tu dong chon tuong
    $(document).on("focus", '.champ_name', function(e) {
        if (!$(this).data("autocomplete")) {
            var list_champ = ["Aleister", "Alice", "Azzen Ka", "Butterfly", "Chaugnar", "Cresht", "Điêu Thuyền", "Fennik", "Gildur", "Grakk", "Ilumia", "Jinna", "Kahlii", "Kriknak", "Krixi", "Lauriel", "Lữ Bố", "Lumburr", "Maloch", "Mganga", "Mina", "Arthur", "Nakroth", "Natalya", "Ngộ Không", "Omega", "Ormarr", "Payna", "Preyta", "Raz", "Skud", "Slimz", "Taara", "Thane", "Toro", "Triệu Vân", "Valhein", "Veera", "Violet", "Yorn", "Zephys", "Batman", "Airi", "Zuka", "Ignis", "MURAD", "ZILL", "Arduin", "Joker", "Ryoma", "Astrid", "Tel Annas", "Superman", "Wonder Woman", "Xeniel", "Kil Groth", "Moren", "TeeMee", "Lindis", "Omen", "Tulen", "Liliana", "Max", "The Flash", "Wisp", "Arum", "Rourke", "Marja", "Roxie", "Baldum", "Annette", "Amily", "Ybneth", "Rourke", "Roxie", "Baldum", "Annette", "Elsu", "Quillen", "Sephera", "Richter", "Florentino", "D'Arcy", "Wiro", "Veres", "Hayate", "Capheny", "Errol", "Yena", "Enzo", "Zip", "Qi", "Celica", "Volkath", "Krizzix", "Eland`orr", "Ishar", "Dirak", "Keera", "Ata", "Paine", "Laville", "Rouie", "Zata", "Allain", "Thorne", "Sinestrea", "Dextra", "Lorion", "Bright", "IGGY", "AOI"];
            $(this).autocomplete({
                source: list_champ
            });
        }
    });

    $('.pay_btn').click(function() {
        if (tong_tien > 0) {

        }
    })

    // gui du lieu len database
    $("#hire_ranking").validate({
        onclick: false,
        rules: {
            "select_ranking_2": {
                required: true,
            },

            "sao_ht": {
                number: true,
            },

            "sao_mm": {
                number: true,
            },

            "date_input": {
                required: true,
            },

            "your_password": {
                minlength: 10,
                maxlength: 11,
            },
        },

        messages: {
            "select_ranking_2": {
                required: "Bạn chưa chọn rank cần thuê",
            },

            "sao_ht": {
                number: "Bạn chỉ cần nhập số",
            },

            "sao_mm": {
                number: "Bạn chỉ cần nhập số",
            },

            "date_input": {
                required: "Bạn chưa chọn lịch cày",
            },

            "your_password": {
                minlength: "Số điện thoại tối thiểu phải có 10 số",
                maxlength: "Số điện thoại tối đa có 11 số",
            },

        },

        submitHandler: function() {
            data = new FormData();
            data.append('rank_now', $('.active_select_1').val());
            var rank_now = $(".active_select_1").children("option").filter(":selected").text(); //hien thi gia tri da chon tren popup
            $('.rank_now').text(rank_now);

            data.append('rank_end', $('.active_select_2').val());
            var rank_end = $(".active_select_2").children("option").filter(":selected").text();
            $('.rank_end').text(rank_end);

            data.append('type_rank', $('#chedo_rank_ht').val());
            if ($('#chedo_rank_ht').val() == 0) {
                $('.type_rank').text('Rank Đơn/Đôi');
            } else {
                $('.type_rank').text('Rank Linh Hoạt');
            }

            data.append('star_now', $('#star_now').val());
            $('.star_now').text($('#star_now').val());
            if ($('#star_now').val() != "") { //hien thi tick trong modal
                $('.star_now_tick').removeClass('none_tick')
                $('.star_now_close').addClass('none_tick')
            } else {
                $('.star_now_close').removeClass('none_tick')
                $('.star_now_tick').addClass('none_tick')
            }

            data.append('star_end', $('#star_end').val());
            $('.star_end').text($('#star_end').val());
            if ($('#star_end').val() != "") { //hien thi tick trong modal
                $('.star_end_tick').removeClass('none_tick')
                $('.star_end_close').addClass('none_tick')
            } else {
                $('.star_end_close').removeClass('none_tick')
                $('.star_end_tick').addClass('none_tick')
            }

            data.append('time_start', $('#time_start').val());
            $('.time_start').text($('#time_start').val());
            if ($('#time_start').val() != "") { //hien thi tick trong modal
                $('.time_start_tick').removeClass('none_tick')
                $('.time_start_close').addClass('none_tick')
            } else {
                $('.time_start_close').removeClass('none_tick')
                $('.time_start_tick').addClass('none_tick')
            }

            data.append('time_end', $('#time_end').val());
            $('.time_end').text($('#time_end').val());
            if ($('#time_start').val() < $('#time_end').val()) {
                if ($('#time_end').val() != "") { //hien thi tick trong modal
                    $('.time_end_tick').removeClass('none_tick')
                    $('.time_end_close').addClass('none_tick')
                } else {
                    $('.time_end_close').removeClass('none_tick')
                    $('.time_end_tick').addClass('none_tick')
                }

            } else {
                alert('Bạn phải chọn ngày kết thúc lớn hơn ngày bắt đầu');
                return false;
            }

            data.append('champ', $('#champ').val());
            $('.champ').text($('#champ').val());
            if ($('#champ').val() != "") { //hien thi tick trong modal
                $('.champ_tick').removeClass('none_tick')
                $('.champ_close').addClass('none_tick')
            } else {
                $('.champ_close').removeClass('none_tick')
                $('.champ_tick').addClass('none_tick')
            }

            if ($('#flash_input').prop('checked')) {
                data.append('flash_play', 1);
                $('.flash_play').text('Có');
                $('.flash_play_tick').removeClass('none_tick') //hien thi tick trong modal
                $('.flash_play_close').addClass('none_tick')
            } else {
                data.append('flash_play', 0);
                $('.flash_play').text('Không');
                $('.flash_play_close').removeClass('none_tick')
                $('.flash_play_tick').addClass('none_tick')
            }

            if ($('#dual_input').prop('checked')) {
                data.append('dual_booster', 1);
                $('.dual_booster').text('Có');
                $('.dual_booster_tick').removeClass('none_tick') //hien thi tick trong modal
                $('.dual_booster_close').addClass('none_tick')
            } else {
                data.append('dual_booster', 0);
                $('.dual_booster').text('Không');
                $('.dual_booster_close').removeClass('none_tick')
                $('.dual_booster_tick').addClass('none_tick')
            }

            if ($('#booster_input').prop('checked')) {
                data.append('name_booster', $('#name_booster').val());
                var name_booster = $("#name_booster").val();
                $('.name_booster').text(name_booster);
                $('.name_booster_tick').removeClass('none_tick') //hien thi tick trong modal
                $('.name_booster_close').addClass('none_tick')
            } else {
                $('.name_booster').text('');
                $('.name_booster_close').removeClass('none_tick')
                $('.name_booster_tick').addClass('none_tick')
            }

            data.append('your_account', $('#your_account').val());
            $('.your_account').text($('#your_account').val());

            data.append('your_password', $('#your_password').val());
            $('.your_password').text($('#your_password').val());

            data.append('style_account', $('#style_account').val());
            if ($('#style_account').val() == 0) {
                $('.style_account').text('Garena');
            } else {
                $('.style_account').text('Facebook');
            }

            data.append('price', tong_tien);

            // kiem tra dang nhap cua khach
            var user_name = '<?php if (isset($data_user['username'])) {
                                    echo $data_user['username'];
                                } else {
                                    echo 0;
                                }
                                ?>';

            if (user_name == 0) {
                $('.popup_required_login').show();
                // window.location.reload();
            } else {
                if (tong_tien > 0) {
                    var facebook = $('.your_account').text();
                    var zalo = $('.your_password').text();
                    if (facebook != "" || zalo != "") {
                        $('.modal_confirm').removeClass('none_modal');
                        $('.modal_confirm').addClass('open_modal');
                    } else {
                        $('.popup_required_info').show()
                    }
                } else {
                    $('.popup_rank_mm').show()
                }
            }

            // tat modal

            $('.back_button').click(function() {
                $('.modal_confirm').removeClass('open_modal');
                $('.modal_confirm').addClass('none_modal');
            });

        }



    });



    // gui form data sang ajax
    var cash = '<?php echo $data_user['cash'] ?>';

    $('.submit_data_btn').click(function() {
        if (parseInt(cash) >= tong_tien) {
            $.ajax({
                type: 'post',
                url: '/assets/ajax/ranking.php',
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: data,

                success: function(feedback) {
                    if (feedback.status == 0) {
                        alert(feedback.mess)
                    } else {
                        $('.popup_succes_ranking').show();
                        // window.location.reload();
                    }

                }
            });
        } else {
            $('.popup_error_ranking').show();

        }
        $('.modal_confirm').removeClass('open_modal');
        $('.modal_confirm').addClass('none_modal');
    });

    // check_box_voucher
    $('.check_box_voucher').click(function() {
        if ($(this).prop('checked')) {
            if (tong_tien > 0) {
                $('.popup_voucher_ranking').removeClass('voucher_ranking_none')
                $('.popup_voucher_ranking').addClass('voucher_ranking_open')

                $('#dis_10_percent').click(function() {
                    if ($(this).prop('checked')) {
                        tam_voucher = tong_tien * 10 / 100;
                        tong_tien_tam = tong_tien - tam_voucher;
                        $('.card_money').text(tong_tien_tam.toLocaleString('en-US'))
                        $('.atm_money').text((tong_tien_tam * 80 / 100).toLocaleString('en-US'))
                    } else {
                        text_money();
                    }

                });

                $('#dis_20k').click(function() {
                    if ($(this).prop('checked')) {
                        data = new FormData();
                        data.append('type', 1);
                        data.append('tien_chon_rank', tong_tien);

                        $.ajax({
                            type: 'post',
                            url: '/assets/ajax/voucher.php',
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            data: data,

                            success: function(feedback) {
                                if (feedback.status == 0) {
                                    $('.popup_voucher_fail').show();
                                } else {
                                    $('.card_money').text((feedback.dis_20k).toLocaleString('en-US'))
                                    $('.atm_money').text((feedback.dis_20k * 80 / 100).toLocaleString('en-US'))
                                }

                            }
                        });

                    } else {
                        text_money();
                        $('.voucher_zendo').prop('checked', false);
                    }
                });

                $('#dis_19k').click(function() {
                    if ($(this).prop('checked')) {
                        if (parseInt(tong_tien) >= 199000) {
                            tong_tien_tam = tong_tien - 19000;
                            $('.card_money').text(tong_tien_tam.toLocaleString('en-US'))
                            $('.atm_money').text((tong_tien_tam * 80 / 100).toLocaleString('en-US'))
                        } else {
                            $('.popup_voucher_fail').show();
                            $('.voucher_zendo').prop('checked', false);
                        }

                    } else {
                        text_money();
                    }
                })

                $('#dis_25k').click(function() {
                    if ($(this).prop('checked')) {
                        if (parseInt(tong_tien) >= 250000) {
                            tong_tien_tam = tong_tien - 25000;
                            $('.card_money').text(tong_tien_tam.toLocaleString('en-US'))
                            $('.atm_money').text((tong_tien_tam * 80 / 100).toLocaleString('en-US'))
                        } else {
                            $('.popup_voucher_fail').show();
                            $('.voucher_zendo').prop('checked', false);
                        }

                    } else {
                        text_money();
                    }
                })

                $('#dis_30k').click(function() {
                    if ($(this).prop('checked')) {
                        if (parseInt(tong_tien) >= 300000) {
                            tong_tien_tam = tong_tien - 30000;
                            $('.card_money').text(tong_tien_tam.toLocaleString('en-US'))
                            $('.atm_money').text((tong_tien_tam * 80 / 100).toLocaleString('en-US'))
                        } else {
                            $('.popup_voucher_fail').show();
                            $('.voucher_zendo').prop('checked', false);
                        }

                    } else {
                        text_money();
                    }
                })

                $('#give_qhuy').click(function() {
                    if ($(this).prop('checked') && parseInt(tong_tien) >= 500000) {
                        $('.popup_give_qhuy').show();
                    } else {
                        $('.popup_voucher_fail').show();
                        $('.voucher_zendo').prop('checked', false);
                    }
                });
            } else {
                $('.popup_rank_mm').show()
                $(this).prop('checked', false)
            }
        } else {
            text_money();
        }
    });

    $('.add_voucher_popup').click(function() {
        $('.popup_voucher_ranking').removeClass('voucher_ranking_open')
        $('.popup_voucher_ranking').addClass('voucher_ranking_none')
    })

    $('.close_voucher_popup').click(function() {
        $('.popup_voucher_ranking').removeClass('voucher_ranking_open')
        $('.popup_voucher_ranking').addClass('voucher_ranking_none')
        text_money();
        $('.check_box_voucher').prop('checked', false);
        $('.voucher_zendo').prop('checked', false);
    });

    //setup chi duoc chon mot voucher
    $('.voucher_zendo').click(function() {
        if ($(this).prop('checked')) {

            $(".voucher_zendo").prop('checked', false);
            $(this).prop('checked', true);

        }
    });
</script>