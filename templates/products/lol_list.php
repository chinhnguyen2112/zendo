<script>
                status = 1;
                int_1 = 0;
                int_2 = 0;
                int_3 = 0;
                int_4 = 0;
                int_5 = 0;
                int_6 = 0;
                high_light = "";
                varchar_1 = "";
                varchar_2 = "";
                varchar_3 = "";
                varchar_4 = "";
                varchar_5 = "";
                longtext_1 = "";
                longtext_2 = "";
                longtext_3 = "";
                server = 1;
                game = 1;
                page = 1; 
</script>

<div class="all">
<section class="content homepage content-boxed">

<div class="clip_pr">
                  <div class="col-xs-12 col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p class="panel-title"><h1>Shop Liên Quân</h1></p>
                      <center>  <p><font size= "2.5">Cùng với nhu cầu cần nơi <b>mua bán acc liên quân mobile</b> ngày càng lớn của các game thủ. </font>LIENQUANMOBILE.VN được thành lập và sẽ tuân thủ 3 tiêu chí vàng sau:<br> <font color= "green" size= "2.5" style="font-weight:700;">Uy Tín | Giá Rẻ | Bảo Hành Vĩnh Viễn </font> </p></center>
                    </div>
                 
                    <div class="panel-body">
                       <h2 style="color:blue;text-align:center;font-size:16px;margin:0;">Mua nick liên quân tại Lienquanmobile.vn với 3 bước:</h2>
                    <p align= "left" ><font color= "#000" size= 2.5>+ Bước 1: Tại <b>trang chủ</b>, click "đăng nhập" để tham gia thành viên shop</font></p>
                    <p align= "left"><font color= "#000" size= 2.5>+ Bước 2: Nạp tiền sao cho đủ giá trị acc muốn mua ( 50k thẻ = 50k tài khoản web, 100k thẻ = 100k tài khoản web...) </font></p>
                    <p align= "left" ><font color= "#000" size= 2.5>+ Bước 3: Click vào tài khoản muốn mua để xem chi tiết về nick và ấn "mua ngay" nếu thực sự thích </font></p>
                    <p align= "left"><font color= "red" size= 2.5 >+ Note: Lienquanmobile.vn là <b>shop acc liên quân giá rẻ</b> mà Youtuber Phong Zhou đang quảng bá hình ảnh.</font></p>
                  
                  <div>
                   
                 
                    </div>
                    </div></div></div>
                    <div class="pr_profile">



                        <div class="banner_auto_buy">
                            <h2>Khách hàng vừa mua acc liên quân</h2>
                            <div class="list_auto_buy">
                                <table id="list_auto_buy">
    <?php                                
    $sql_get_list_buy = "SELECT * FROM `history_buy` ORDER BY `time` DESC LIMIT 15";
    if ($db->num_rows($sql_get_list_buy)){
        foreach ($db->fetch_assoc($sql_get_list_buy, 0) as $key => $data_buy){   
    ?>
                                    <tr>
                                        <td style="width: 40%;"><p><font color = "#5c90d2"><?php echo $data_buy['name']; ?></font></p></td>
                                        <td style="width: 13%;"><font color="#5c90d2">#<?php echo $data_buy['id_post']; ?></font></td>
                                        <td style="width: 22%;"><span><?php echo number_format($data_buy["price"], 0, '.', '.'); ?>đ</span></td>
                                        <td style="width: 25%;"><?php echo date('d-m-Y', strtotime($data_buy['time'])); ?></td>
                                    </tr>
    <?php
    }   }
    ?>
                              </table>
                            </div>
                        </div>
                        <img style="margin: 0;margin-top: -15px;" src="assets/img/header/list.png" alt = "khung-anh" title = "khung-anh"/>






                    </div>
                    <div class="clear"></div>
                </div>

                   <div class ="content">
<!--   <div class="col-xs-12 col-md-12" style="background-color:#EE0000; color:#FFF; boder:2px solid #000; font-size:16px;">BẢO TRÌ NẠP THẺ ONLINE, AE MUA ACC GD QUA ATM ( NGÂN HÀNG Ạ ), 100K ATM = 130K TÀI KHOẢN WEB</div>-->
<!--</div>-->
<br>
                <div class="menu_top" style="margin-top:0px;">
                    <div class="middle">
                        <ul>
                              
                            <!--<li onclick="location.href='https://lienquanmobile.vn/'" class=""><strong>Liên Quân Mobile</strong></li>-->
                            <!--<li onclick="location.href='https://lienquanmobile.vn/shop-acc-lmht.html'" class="">SHOP ACC LMHT</li>-->
                            <!--<li onclick="location.href='https://lienquanmobile.vn/acc-random-lien-quan.html'" target = "_blank" class="">Thử Vận May Với Acc Liên Quân Random</li>-->
                             <li onclick="location.href='https://lienquanmobile.vn/recharge.html'" rel="nofollow" class=""><strong>NẠP TIỀN ( THẺ ĐT HOẶC ATM )</strong></li>
                            
                                                        <div class="clear"></div>
                                                        
                        </ul>
                    </div>
                    <!--<div class="right">-->
                    <!--    <button class="active" onclick="fitler_div(this)">Bộ Lọc</button>-->
                    <!--</div>-->
                    <div class="clear"></div>
                </div>

                <div style="display: block;" class="fitler">
                      <h2 style="text-align:center;font-size:16px;margin:0;">Cách Tìm Kiếm Acc Liên Quân Phù Hợp</h2>
                      <br>
                      <p>Mỗi ngày bên mình đều đăng thêm khoảng 50 đến 100 tài khoản mới lên <b>shop liên quân</b>. Shop cung cấp đầy đủ loại từ <b>bán acc liên quân 10k, 20k hoặc 50</b>đến <b>bán acc liên quân vip</b> nhất server (giá từ 1 triệu trở lên) . Dưới đây là công cụ lọc acc theo yêu cầu để cho quý khách tiện tìm kiếm acc phù hợp nhất. Trân trọng !</p>
                      <br>
                    <ul>
                        <li style="color:blue;display:block;width: 100%;margin-right:0"><p>Mức giá</p><div id="ranged-value" style="width: 100%;"></div></li>
                    </ul>
                    
                    <ul>
                            <li>
                                <p>Rank tối thiểu</p>
                                <select id="int_5" name="int_5">
                                    <option value="0">Không cần rank</option>
                                    <option  value="2">Đồng</option>
                                    <option  value="3">Bạc</option>
                                    <option  value="4">Vàng</option>
                                    <option  value="5">Bạch Kim</option>
                                    <option  value="6">Kim Cương</option>
                                    <option  value="7">Cao Thủ</option>
                                    <option  value="8">Thách Đấu</option>
                                </select>
                            </li>
                            <li><p>Sỡ hữu trang phục</p><input type="text" class="skin_name ui-autocomplete-input" placeholder="Nakroth quân đoàn địa ngục, Ngộ không đạo tặc..." id="longtext_1" value="" /></li>
                            <li><p>Sỡ hữu tướng </p><input type="text" class="champ_name ui-autocomplete-input" placeholder="Aleister, Alice, Điêu Thuyền..." name="champ_name" id="longtext_2" value="" /></li>
                            <li>
                                <p>Chọn Theo Giá</p>
                                <select id="int_6" name="int_6">
                                    <option value="0">Chọn Giá</option>
                                    <option value="2">Dưới 50k</option>
                                    <option  value="3">Từ 50k Đến 100k</option>
                                    <option  value="4">Từ 100k Đến 500k</option>
                                    <option  value="5">Từ 500k Đến 1Tr</option>
                                    <option  value="6">Trên 1Tr</option>
                                </select>
                            </li>
                                           </ul>
                    <div class="clear"></div>
                    <button onclick="fitler();" class="button_fitler hover_red">Tìm kiếm</button>
                    <div class="clear"></div>
                </div>
                
            
                <h2 style="color:#313131;text-align:center;font-size:16px;margin:0;">ACC LIÊN QUÂN UPDATE HÀNG NGÀY</h2>
             
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <script src="/assets/js/jquery-ui.min.js"></script>
    <script>
    $(document).on("focus", '.skin_name', function (e) {
        if (!$(this).data("autocomplete")) {
    
            var list_skin = ["Alice Nhà chiêm tinh","Butterfly Teen nữ công nghệ","Butterfly Thủy thủ","Chaugnar Ác mộng sinh hóa","Cresht Thợ sửa đứt cáp","Điêu thuyền Nữ vương anh đào","Fenik Nhà thám hiểm","Gildur Phượt thủ","Grakk Chàng gấu tuyết","iLumia Nữ chúa tuyết","Jinna Đại tư tế","Veera Cô dâu hắc ám","Kriknak Bọ cánh bạc","Krixi Công chúa bướm","Krixi Xứ sở thần tiên","Ilumia Đọa lạc thiên sứ","Lữ Bố Long kỵ sĩ","Lumburr Dung nham","Maloch Đại tiệc hóa trang","Mganga Hề cung đình","Mina Tiểu thư đoạt hồn","Nakroth Quân đoàn địa ngục","Natalya Nghệ nhân lân","Natalya Quý cô thủy tề","Omega Người máy xanh","Ormarr Cựu chiến binh","Payna Cảnh vệ rừng","Preyta Không tặc","Raz Đại tù trưởng","Skud Sơn tặc","Slimz THỏ thợ mỏ","Butterfly Xuân nữ ngổ ngáo","Thane Quang Vinh","Toro Đặc cảnh NYPD","Triệu vân Đoạt mệnh thương","Triệu vân Quý công tử","Valhein Hoàng Tử Quạ","Valhein Vũ Khí Tối Thượng","Veera Cô giáo hắc ám","Veera Quý cô dơi tuyết","Violet Nữ đặc cảnh","Violet Nữ hoàng pháo hoa","Yorn Cung thủ bóng đêm","Zephys Oán linh","Lữ Bố Kỵ sĩ âm phủ","Airi Ninja xanh lá","Zuka Đại phú ông","Taara Đại Tù Trưởng","Maloch Ác ma địa ngục","Azzenka Linh hồn lữ khách","Ignis Hỏa thuật sư","Murad Thợ săn tiền thưởng","Butterfly Nữ quái nổi loạn","Zill Lốc địa ngục","Mganga  Tiệc bánh kẹo","Grakk Khô lâu đại tướng","Arthur Hoàng kim cốt","Arthur Lãnh chúa xương","Aleister Thiếu niên hắc ám","Nakroth bboy công nghệ","Ngộ Không Đạo tặc","Yorn Đặc nhiệm SWAT","Veera Y tá bạo loạn","Arduin Cận vệ hoàng gia","Batman Đôi cánh đại dương","Lữ Bố Đặc nhiệm SWAT","Triệu Vân Quang vinh","Joker Trò đùa tử vong","Ryoma Thợ săn tiền thưởng","Astrid Bạch kiếm tiểu thư","TelAnnas Cảnh vệ rừng","Airi Thích khách","Maloch Samurai tử sĩ","Zephys Hiệp sĩ bí ngô","Lauriel Phù thủy bí ngô","Slimz chú thỏ ngọc","Gildur  Tiệc bãi biển","Mina Tiệc bánh kẹo","Superman Chúa tể công lý","Fenik Tiệc bánh kẹo","Krixi Tiệc bãi biển","Ilumia Hồng hoa hậu","Xeniel Thiên sứ hủy diệt","Lữ Bố Tiệc bãi biển","Triệu vân Dũng sĩ đồ long","KilGroth cảnh vệ biển","Nakroth chiến binh hỏa ngục", "Natalya Nhà quái quỉ","Ormarr thông thoả thích", "Moren Chú Thợ Điện", "Valhein Đại Công Tước", "Aleister Quang Vinh", "Điêu thuyền hoa hậu","Lauriel hoả phượng hoàng","Lữ bố nam vương","Zuka giáo sư sừng sỏ","Toro trung phong cắm","TeeMee xiếc cung đình","Murad M-TP thần tượng học đường","Fenik tuần lộc láu lỉnh","Ngộ Không hoả nhãn kim tinh","Lindis thám tử tư","Preyta băng hoả long sư","Violet phi công trẻ","Yorn thế tử nguyệt tộc","Zill dung nham","Nakroth siêu việt","Arthur si tình kiếm","Tulen nhà thám hiểm", "Telannas chung tình tiễn","Violet mèo siêu quậy","Omen sĩ quan viễn chinh","Liliana Hồ quý phi","Airi cấm vệ nguyệt tộc","Ormarr giáo viên thể hình","Cresht cá cắn cáp","Krixi cô tiên thỏ","Wonder Woman thế chiến","Max hiệp sĩ nhí","Telannas giám thị thân thiện","Taara hoả ngọc nữ đế","Chaugnar quang vinh","Raz băng quyền quán quân","Natalya phó nháy nhí nhảnh","Grakk thuyền trưởng râu đỏ","Joker Vua hề","Kriknak yêu trùng cổ mộ","Ryoma đại tướng nguyệt tộc", "Airi kiemono","Tulen tân thần thiên hà","Batman dơi địa ngục","Arum thú vệ cổ mộ","Butterfly quận chúa đế chế","Wisp hải tặc nhí","Zuka gấu nhồi bông","Tulen phù thủy kiến tạo","Murad thiên tài sân cỏ","Xeniel trung vệ thép","Kahlii quàng khăn đỏ","Valhein số 7 thần sầu","Rourke pháo thủ tuộc neo","Marja linh xà tư tế","Superman bất công lý","Violet tiệc bãi biển","Taara tiệc bãi biển","Max găng tay vàng","Điêu thuyền tiệc bãi biển","Valhein quang vinh"];
            $(this).autocomplete({source: list_skin});
        }
    });
    $(document).on("focus", '.champ_name', function (e) {
        if (!$(this).data("autocomplete")) {
    
            var list_champ = ["Aleister","Alice","Azzen Ka","Butterfly","Chaugnar","Cresht","Điêu Thuyền","Fennik","Gildur","Grakk","Ilumia","Jinna","Kahlii","Kriknak","Krixi","Lauriel","Lữ Bố","Lumburr","Maloch","Mganga","Mina","Arthur","Nakroth","Natalya","Ngộ Không","Omega","Ormarr","Payna","Preyta","Raz","Skud","Slimz","Taara","Thane","Toro","Triệu Vân","Valhein","Veera","Violet","Yorn","Zephys","Batman","Airi","Zuka","Ignis","MURAD","ZILL","Arduin","Joker","Ryoma","Astrid","Tel Annas","Superman","Wonder Woman","Xeniel","Kil Groth","Moren","TeeMee","Lindis","Omen","Tulen","Liliana","Max","The Flash","Wisp","Arum","Rourke","Marja"];
            $(this).autocomplete({source: list_champ});
        }
    });
    </script>

                <div style="display: block;" class="list_account"></div>
                <div id="loading">
                    <img src="assets/images/loading.gif" alt = "loading" title = "loading"/>
                </div>
            </div>
</section>
</div>
        <script>
            $(".game_opt_"+server).show();
            var s3 = $("#ranged-value").freshslider({
                range: true,
                step:50000,
                max:10000000,
                value:[0, 10000000],
                onchange:function(low, high){
                    min_price = low;
                    max_price = high;
                    $('.fss-left').text(addCommas($('.fss-left').text()+"đ"));
                    $('.fss-right').text(addCommas($('.fss-right').text()+"đ"));
                }
            });
            min_price = 0;
            max_price = 10000000;
            function fitler_div(button){
                    if($(".fitler").css("display") == "block"){
                        $(button).removeClass("active");
                        $(".fitler").slideUp(1000);
                    } else {
                        $(button).addClass("active");
                        $(".fitler").slideDown(1000);
                    }
                
            }
            function load_account(){
                $(".list_account").hide();
                $("#loading").show();
                $.post("../assets/ajax/lqm.php", { status : status , min_price : min_price , max_price : max_price , int_1 : int_1 , int_2 : int_2 , int_3 : int_3 , int_4 : int_4 , int_5 : int_5 , int_6 : int_6 , high_light : high_light , varchar_1 : varchar_1 , varchar_2 : varchar_2 , varchar_3 : varchar_3 , varchar_4 : varchar_4 , varchar_5 : varchar_5 , longtext_1 : longtext_1 , longtext_2 : longtext_2 , longtext_3 : longtext_3 , server : server , page : page })
                .done(function(data) {
                    $(".list_account").html('');
                    $('.list_account').empty().append(data);
                    $("#loading").hide();
                    $(".list_account").show();   
                }); 
            }
            function format_price(div) {
                x = $(div).val();
                x = x.replace(/\./g,'');
                num = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                $(div).val(num);
            }
            function fitler(){
                int_1 = $("#int_1").val();
                int_2 = $("#int_2").val();
                int_3 = $("#int_3").val();
                int_4 = $("#int_4 option:selected").val();
                int_5 = $("#int_5 option:selected").val();
                int_6 = $("#int_6 option:selected").val();
                varchar_1 = $("#varchar_1 option:selected").val();
                longtext_1 = $("#longtext_1").val();
                longtext_2 = $("#longtext_2").val();
                load_account();                                                                                                                                          
            }
            $(document).ready(function (){
                $(".only_num").keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                         // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) || 
                         // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                             // let it happen, don't do anything
                             return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
                $(".middle ul li").click(function(){
                    $(".middle ul li").removeClass("active");
                    $(this).addClass("active");
                    status = $(this).attr("target");
                    load_account();
                });
            });

            load_account();
        </script>
