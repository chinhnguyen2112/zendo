<link rel="stylesheet" href="/assets/css/sanacc/css_list.css">
<?php
$arr_skin = arr_skin();
$arr_tuong = arr_tuong();
?>
<div class="content_list">
    <div class="container_list">
        <div class="img_bn_danhmuc">
            <img src="/images/sanacc/danhmuc/banner.png" alt="banner">
        </div>
        <div class="breadcrump">
            <div class="box_count_rsl">
                <span>250 kết quả</span>
            </div>
            <div class="box_xx_list">
                <select name="xap_xep" id="xap_xep" onchange="order_rsl(this)">
                    <option value="0">Sắp xếp</option>
                    <option value="1">Giá từ thấp tới cao</option>
                    <option value="2">Giá từ cao tới thấp</option>
                </select>
            </div>
        </div>
        <div class="body_list">
            <div class="box_fillter">
                <div class="box_fillter_mb" onclick="show_filter(this,1)">
                    <img alt="bộ lọc" src="/images/sanacc/list/filter.svg"> <span>Lọc sản phẩm</span>
                </div>

                <div class="box_ms">
                    <div class="title_search" onclick="show_gia_ff(this,1)">
                        <span>Mã số</span>
                        <img src="/images/sanacc/list/crow_top.svg" alt="xem thêm">
                    </div>
                    <div class="content_search">
                        <span>Nhập mã</span>
                        <input type="text" name="id_acc" id="id_ac" placeholder="Nhập mã số...">
                        <img onclick=search_id(this) src="/images/sanacc/list/search.svg" alt="tim kiếm">
                    </div>

                </div>
                <div class="box_price">
                    <div class="title_search" onclick="show_box_skin(this,1)">
                        <span>Đăng ký</span>
                        <img src="/images/sanacc/list/crow_top.svg" alt="xem thêm">
                    </div>
                    <div class="content_search">
                        <div class="box_nav_price">
                            <input type="checkbox" data-source="1" name="facebook" id="facebook" class="source_signup">
                            <span>Facebook</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-source="2" name="playgame" id="playgame" class="source_signup">
                            <span>Play game</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-source="3" name="gamecenter" id="gamecenter" class="source_signup">
                            <span>Game center</span>
                        </div>
                    </div>
                </div>
                <div class="box_price">
                    <div class="title_search" onclick="show_gia_ff(this,1)">
                        <span>Pet</span>
                        <img src="/images/sanacc/list/crow_top.svg" alt="xem thêm">
                    </div>
                    <div class="content_search">
                        <div class="box_nav_price">
                            <input type="checkbox" data-pet="1" name="co" id="co" class="pet_list">
                            <span>Có</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-pet="0" name="khong" id="khong" class="pet_list">
                            <span>Không</span>
                        </div>
                    </div>
                </div>
                <div class="box_price">
                    <div class="title_search" onclick="show_gia_ff(this,1)">
                        <span>Mức giá</span>
                        <img src="/images/sanacc/list/crow_top.svg" alt="xem thêm">
                    </div>
                    <div class="content_search" data-type="gia">
                        <div class="box_nav_price">
                            <input type="checkbox" name="gia" data-min="0" data-max="100000" id="100" class="gia_list">
                            <span>0k - 100k</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" name="gia" data-min="100000" data-max="200000" id="200" class="gia_list">
                            <span>100k - 200k</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" name="gia" data-min="200000" data-max="400000" id="400" class="gia_list">
                            <span>200k - 400k</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" name="gia" data-min="400000" data-max="600000" id="600" class="gia_list">
                            <span>400k - 600k</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" name="gia" data-min="600000" data-max="800000" id="800" class="gia_list">
                            <span>600k -800k</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" name="gia" data-min="800000" data-max="1000000" id="1000" class="gia_list">
                            <span>800k - 1000k</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" name="gia" data-min="1000000" data-max="100000000" id="1100" class="gia_list">
                            <span>Trên 1000k</span>
                        </div>
                    </div>
                </div>
                <div class="box_price">
                    <div class="title_search" onclick="show_gia_ff(this,1)">
                        <span>Rank</span>
                        <img src="/images/sanacc/list/crow_top.svg" alt="xem thêm">
                    </div>
                    <div class="content_search">
                        <div class="box_nav_price">
                            <input type="checkbox" data-rank="2" name="dong" class="rank_list">
                            <span>Đồng đoàn</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-rank="3" name="bac" class="rank_list">
                            <span>Bạc đoàn</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-rank="4" name="vang" class="rank_list">
                            <span>Vàng đoàn</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-rank="5" name="bachkim" class="rank_list">
                            <span>Bạch kim</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-rank="6" name="kimcuong" class="rank_list">
                            <span>Kim cương</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-rank="7" name="caothu" class="rank_list">
                            <span>Cao thủ</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-rank="8" name="quanquan" class="rank_list">
                            <span>Quán quân</span>
                        </div>
                        <div class="box_nav_price">
                            <input type="checkbox" data-rank="9" name="chiton" class="rank_list">
                            <span>Chí tôn</span>
                        </div>
                    </div>
                </div>
                <div class="box_close_fillter">
                    <span onclick="fitler(0)">Xóa bộ lọc</span>
                </div>



            </div>
            <div class="box_list_content">
                <div class="list_result">

                </div>
                <!--<div class="pagenation"></div>-->
                <div id="loading">
                    <img src="/assets/images/loading.gif" alt="loading" title="loading" />
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var rank = "";
    var min_price = 0; // mức giá
    var max_price = 100000000; // mức giá 
    var page = 1; // số trang
    var ms = ""; //id tài khoản
    var pet = "";  // thú cưng
    var source_signup = ""; // nguồn đăng ký
    function setCookies(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function fitler_div(button) {
        if ($(".fitler").css("display") == "block") {
            $(button).removeClass("active");
            $(".fitler").slideUp(1000);
        } else {
            $(button).addClass("active");
            $(".fitler").slideDown(1000);
        }

    }

    function load_account() {
        $(".list_result").hide();
        $("#loading").show();
        $.post("../assets/ajax/pubg.php", {
                min_price: min_price,
                max_price: max_price,
                pet:pet,
                source_signup: source_signup,
                rank: rank,
                page: page
            })
            .done(function(data) {
                $(".list_result").html('');
                $('.list_result').empty().append(data);
                $("#loading").hide();
                $(".list_result").show();
                $(".box_count_rsl").focus();
                if ($('.tam_count').text() == '2 kết quả') {
                    $(".list_result").css({
                        'display': 'flex',
                        'flex-wrap': 'wrap'
                    })
                } else {
                    $(".list_result").css({
                        'display': 'grid'
                    })
                }
                var text_count = '<span>' + $('.tam_count').text() + '</span>'
                $('.box_count_rsl').html(text_count);
            });
    }

    function search_id(e) {
        ms = $('#id_ac').val();
        $("input[type='checkbox']").prop('checked', false);
        load_account_full();
    }

    function load_account_full() {
        $(".list_result").hide();
        $("#loading").show();
        $.post("../assets/ajax/pubg.php", {

                ms: ms,
            })
            .done(function(data) {
                $(".list_result").html('');
                $('.list_result').empty().append(data);
                $("#loading").hide();
                $(".list_result").show();
                var text_count = '<span>' + $('.tam_count').text() + '</span>'
                $('.box_count_rsl').html(text_count);
            });
    }

    function format_price(div) {
        x = $(div).val();
        x = x.replace(/\./g, '');
        num = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        $(div).val(num);
    }

    function fitler(type) {
        ms = $('#id_ac').val();
        price = $("#price").val();
        source_signup = $("#source").val();
        int_5 = $("#int_5 option:selected").val();
        longtext_1 = $("#longtext_1").val();
        longtext_2 = $("#longtext_2").val();
        min_price = 0;
        max_price = 10000000;
        rank = "";
        pet ="";
        source_signup = "";
        if (type == 1) {
            load_account();
        } else {
            setCookies('list_buy', 0, 1);
            location.reload();
        }
    }
    $(document).ready(function() {
        $(".only_num").keydown(function(e) {
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
        $(".middle ul li").click(function() {
            $(".middle ul li").removeClass("active");
            $(this).addClass("active");
            status = $(this).attr("target");
            load_account();
        });
    });
    load_account();

    $('.gia_list').click(function() {
        if ($(this).prop('checked')) {
            $(".gia_list").prop('checked', false);
            $(this).prop('checked', true);
            min_price = $(this).data('min');
            max_price = $(this).data('max');
        } else {
            min_price = 0;
            max_price = 100000000;
        }
        ms = 0;
        $('#id_ac').val('');
        load_account();
    });
    $('.rank_list').click(function() {
        if ($(this).prop('checked')) {
            $(".rank_list").prop('checked', false);
            $(this).prop('checked', true);
            rank = $(this).data('rank');
        } else {
            rank = 0;
        }
        ms = 0;
        $('#id_ac').val('');
        load_account();
    });
    $('.source_signup').click(function() {
        if ($(this).prop('checked')) {
            $(".source_signup").prop('checked', false);
            $(this).prop('checked', true);
            source_signup = $(this).data('source');
        } else {
            source_signup = "";
        }
        ms = 0;
        $('#id_ac').val('');
        load_account();
    });

    $('.pet_list').click(function() {
        if ($(this).prop('checked')) {
            $(".pet_list").prop('checked', false);
            $(this).prop('checked', true);
            pet = $(this).data('pet');
        } else {
            pet = "";
        }
        ms = 0;
        $('#id_ac').val('');
        load_account();
    });


    function show_gia_ff(e, type) {
        if (type == 1) {
            $(e).parent().find('.content_search').hide();
            $(e).attr('onclick', 'show_gia_ff(this,2)')
        } else {
            $(e).parent().find('.content_search').show();
            $(e).attr('onclick', 'show_gia_ff(this,1)')
        }
    }



    // / show lọc mobile
    function show_filter(e, type) {
        if (type == 1) {
            $('.box_price, .box_ms, .box_close_fillter').show();
            $(e).attr('onclick', 'show_filter(this,2)');
        } else {
            $('.box_price, .box_ms, .box_close_fillter').hide();
            $(e).attr('onclick', 'show_filter(this,1)');
        }
    }

    function order_rsl(e) {
        order = $('#xap_xep').val();
        load_account();
    }
</script>