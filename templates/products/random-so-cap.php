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



                   <div class ="content">

              
                 <div style="display: block;" class="fitler">
                    <div class="content-search">
                      <h1 style="text-align:center;font-size:20px;margin:0;">Bán Acc Liên Quân 20k</h1>
                      <br>
                      <p>100% trắng thông tin, chắc chắn acc có 10 tướng trở lên, tối đa là 40 tướng |
                      Lienquanmobile.vn là <b>Shop liên quân giá rẻ 20k</b> mà chất lượng nhất!</p>
                    
                      
                 <hr style="border-top:2px solid #1fc31d !important;">
                </div>

                      <h2 style="color:#313131;text-align:center;font-size:16px;margin:0;">Danh sách acc liên quân 20k</h2>
               </div>
             
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
    <script src="/assets/js/jquery-ui.min.js"></script>
   

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
                $.post("../assets/ajax/random-so-cap.php", { status : status , min_price : min_price , max_price : max_price , int_1 : int_1 , int_2 : int_2 , int_3 : int_3 , int_4 : int_4 , int_5 : int_5 , int_6 : int_6 , high_light : high_light , varchar_1 : varchar_1 , varchar_2 : varchar_2 , varchar_3 : varchar_3 , varchar_4 : varchar_4 , varchar_5 : varchar_5 , longtext_1 : longtext_1 , longtext_2 : longtext_2 , longtext_3 : longtext_3 , server : server , page : page })
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
