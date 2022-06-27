<?php

// Require database
require_once '../../core/init.php';
$select = new Info;
// Nếu đăng nhập
if ($user) {
    // Nếu tài khoản không phải là admin
    if ($data_user['admin'] == 0) {
        new Redirect($_DOMAIN); // Trở về trang index
        exit;
    }
?>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="utf-8" />
        <title>Thêm tài khoản | Liên quân mobile</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/simple-line-icons.min.css" rel="stylesheet" typ e="text/css" />
        <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/magnific.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/admin/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/admin/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" />
        <style>
            .groupBy td,
            .rowdate {
                padding-bottom: 2px !important;
                padding-top: 2px !important;
                background: #F7F7F7 !important;
                font-weight: 700;
            }

            body {
                min-width: 800px;
            }
        </style>
        <script src="/admin/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/bootstrap.min.js" type="text/javascript"></script>
    </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <div class="page-header navbar navbar-fixed-top">
                <div class="page-header-inner ">
                    <div class="page-logo">
                        <a href="/admin.html">
                            <img src="" alt="logo" class="logo-default" style="height: 14px" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <a href="javascript:;" class="menu-toggler responsive-toggler pull-left" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!--<div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="http://webnick.vn/assets/layouts/layout/img/avatar3_small.jpg" />
                        <span class="username username-hide-on-mobile">Thuanla</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="page_user_profile_1.html">
                                <i class="icon-user"></i> admin/lqm/acc/add </a>
                        </li>
                        <li>
                            <a href="app_calendar.html">
                                <i class="icon-calendar"></i> My Calendar </a>
                        </li>
                        <li>
                            <a href="app_inbox.html">
                                <i class="icon-envelope-open"></i> My Inbox
                                <span class="badge badge-danger"> 3 </span>
                            </a>
                        </li>
                        <li>
                            <a href="app_todo.html">
                                <i class="icon-rocket"></i> My Tasks
                                <span class="badge badge-success"> 7 </span>
                            </a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="http://webnick.vn/admin/logout.html">
                                <i class="icon-key"></i> Đăng xuất </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>-->
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="heading">
                                <h3 class="uppercase">Quản lý sản phẩm</h3>
                            </li>
                            <li class="nav-item  active open">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-game-controller"></i>
                                    <span class="title">Liên Quân Mobile</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="#" class="nav-link ">
                                            <span class="title">Danh sách tài khoản</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  active open">
                                        <a href="#" class="nav-link ">
                                            <span class="title">Thêm tài khoản</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="#" class="nav-link ">
                                            <span class="title">Thống kê tài khoản</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <span class="title">Cài đặt chung</span>
                                            <span class="arrow"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item start ">
                                <a href="/admin/home/sell.html" class="nav-link nav-toggle">
                                    <i class="icon-list"></i>
                                    <span class="title">Lịch sử bán nick</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="/admin/home/report.html" class="nav-link nav-toggle">
                                    <i class="icon-graph"></i>
                                    <span class="title">Thống kê nick</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-bar m-b-20">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="#" title="Bảng điều khiển"> Bảng điều khiển</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="#" title="Liên quân mobile"> Liên quân mobile</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="#" title="Thêm tài khoản"> Thêm tài khoản</a>
                                </li>
                            </ul>
                        </div>
                        <script>
                            function updateList(input, filelist) {
                                //var input = document.getElementById('file');
                                var output = document.getElementById(filelist);

                                output.innerHTML = '<div class="m-t-10">';
                                for (var i = 0; i < input.files.length; ++i) {
                                    output.innerHTML += '<span class="label label-info">' + input.files.item(i).name + '</span> ';
                                }
                                output.innerHTML += '</div>';
                            }

                            function count_champ(input) {
                                var options = input.options;
                                var count = 0;
                                for (var i = 0; i < options.length; i++) {
                                    if (options[i].selected) {
                                        count++;
                                    }
                                }

                                document.getElementById('champs_count').value = count;
                            }

                            function count_skin(input) {
                                var options = input.options;
                                var count = 0;
                                for (var i = 0; i < options.length; i++) {
                                    if (options[i].selected)
                                        count++;
                                }
                                document.getElementById('skins_count').value = count;
                            }
                        </script>
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-green-sharp">
                                    <span class="caption-subject bold uppercase">Thêm tài khoản</span>
                                </div>
                            </div>

                            <div class="portlet-body form">
                                <form id="lq" action="" method="POST" enctype="multipart/form-data">

                                    <h4><b>Thông tin tài khoản</b></h4>

                                    <div class="form-body">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>Tài khoản:</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Tài khoản" required="">
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>Mật khẩu:</label>
                                                <input type="text" class="form-control" id="password" name="password" placeholder="Mật khẩu" required="">
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>Giá:</label>
                                                <input type="text" class="form-control" id="price" name="price" placeholder="Giá bán" value="0">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label>Bậc ngọc:</label>
                                                <input type="text" class="form-control" id="ngoc" name="ngoc" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label for="rank">Rank</label>
                                                <select class="form-control" name="rank">
                                                    <?php
                                                    for ($i = 0; $i < 29; $i++) {
                                                        if ($select->get_string_rank($i) != "") {

                                                            echo '<option value="' . $i . '">' . $select->get_string_rank($i) . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label for="type_post">Loại</label>
                                                <select class="form-control" name="type_post">
                                                    <option value="3"> Bình Thường</option>
                                                    <option value="0"> Quảng Cáo</option>
                                                    <option value="2"> Acc NGON</option>
                                                    <option value="1"> Acc VIP</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Số tướng:</label>
                                                <input type="text" class="form-control" id="champs_count" name="champs_count">
                                            </div>

                                            <style>
                                                ul.thumbnails.image_picker_selector {
                                                    margin-top: 20px !important;
                                                }

                                                ul.thumbnails.image_picker_selector li .thumbnail {
                                                    padding: 4px !important;
                                                }

                                                ul.thumbnails.image_picker_selector li .thumbnail p {
                                                    padding-top: 5px;
                                                    margin-bottom: 0px;
                                                    font-weight: 700;
                                                    text-align: center;
                                                }

                                                .thumbnail {
                                                    margin-bottom: 0px;
                                                }

                                                ul.thumbnails.image_picker_selector li .thumbnail.selected {
                                                    background: #F50057 !important;
                                                    color: #fff !important;
                                                    font-weight: 700;
                                                }

                                                ul.thumbnails.image_picker_selector li .thumbnail img {
                                                    height: 75px;
                                                }
                                            </style>
                                            <div class="col-xs-6">
                                                <label for="thumb">Ảnh minh hoạ</label>
                                                <div class="form-group">
                                                    <input class="currency form-control" type="file" name="thumb" />
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="champs">Hình ảnh thông tin</label>
                                                    <input class="currency form-control" type="file" name="champs[]" multiple />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="champ" class="control-label">Danh sách tướng</label>
                                                <select id="champ" name="champ[]" class="form-control select2-multiple m-b-20 selectiamges" multiple onchange="count_champ(this);">
                                                    <option value="37" data-img-src="/assets/data/8/champ/37.jpg" selected>Valhein</option>
                                                    <option value="34" data-img-src="/assets/data/8/champ/34.jpg">Thane</option>
                                                    <option value="38" data-img-src="/assets/data/8/champ/38.jpg">Veera</option>
                                                    <option value="17" data-img-src="/assets/data/8/champ/17.jpg">Lữ Bố</option>
                                                    <option value="21" data-img-src="/assets/data/8/champ/21.jpg">Mina</option>
                                                    <option value="15" data-img-src="/assets/data/8/champ/15.jpg">Krixi</option>
                                                    <option value="20" data-img-src="/assets/data/8/champ/20.jpg">Mganga</option>
                                                    <option value="36" data-img-src="/assets/data/8/champ/36.jpg" selected>Triệu Vân</option>
                                                    <option value="26" data-img-src="/assets/data/8/champ/26.jpg">Omega</option>
                                                    <option value="13" data-img-src="/assets/data/8/champ/13.jpg">Kahlii</option>
                                                    <option value="41" data-img-src="/assets/data/8/champ/41.jpg">Zephys</option>
                                                    <option value="7" data-img-src="/assets/data/8/champ/7.jpg">Điêu Thuyền</option>
                                                    <option value="5" data-img-src="/assets/data/8/champ/5.jpg">Chaugnar</option>
                                                    <option value="39" data-img-src="/assets/data/8/champ/39.jpg">Violet</option>
                                                    <option value="4" data-img-src="/assets/data/8/champ/4.jpg">Butterfly</option>
                                                    <option value="27" data-img-src="/assets/data/8/champ/27.jpg">Ormarr</option>
                                                    <option value="3" data-img-src="/assets/data/8/champ/3.jpg">Azzen'Ka</option>
                                                    <option value="2" data-img-src="/assets/data/8/champ/2.jpg">Alice</option>
                                                    <option value="9" data-img-src="/assets/data/8/champ/9.jpg">Gildur</option>
                                                    <option value="40" data-img-src="/assets/data/8/champ/40.jpg">Yorn</option>
                                                    <option value="35" data-img-src="/assets/data/8/champ/35.jpg">Toro</option>
                                                    <option value="33" data-img-src="/assets/data/8/champ/33.jpg">Taara</option>
                                                    <option value="23" data-img-src="/assets/data/8/champ/23.jpg">Nakroth</option>
                                                    <option value="10" data-img-src="/assets/data/8/champ/10.jpg">Grakk</option>
                                                    <option value="1" data-img-src="/assets/data/8/champ/1.jpg">Aleister</option>
                                                    <option value="8" data-img-src="/assets/data/8/champ/8.jpg">Fennik</option>
                                                    <option value="18" data-img-src="/assets/data/8/champ/18.jpg">Lumburr</option>
                                                    <option value="24" data-img-src="/assets/data/8/champ/24.jpg">Natalya</option>
                                                    <option value="6" data-img-src="/assets/data/8/champ/6.jpg">Cresht</option>
                                                    <option value="12" data-img-src="/assets/data/8/champ/12.jpg">Jinna</option>
                                                    <option value="28" data-img-src="/assets/data/8/champ/28.jpg">Payna</option>
                                                    <option value="19" data-img-src="/assets/data/8/champ/19.jpg">Maloch</option>
                                                    <option value="25" data-img-src="/assets/data/8/champ/25.jpg">Ngộ Không</option>
                                                    <option value="14" data-img-src="/assets/data/8/champ/14.jpg">Kriknak</option>
                                                    <option value="22" data-img-src="/assets/data/8/champ/22.jpg">Arthur</option>
                                                    <option value="32" data-img-src="/assets/data/8/champ/32.jpg">Slimz</option>
                                                    <option value="11" data-img-src="/assets/data/8/champ/11.jpg">Ilumia</option>
                                                    <option value="29" data-img-src="/assets/data/8/champ/29.jpg">Preyta</option>
                                                    <option value="31" data-img-src="/assets/data/8/champ/31.jpg">Skud</option>
                                                    <option value="30" data-img-src="/assets/data/8/champ/30.jpg">Raz</option>
                                                    <option value="16" data-img-src="/assets/data/8/champ/16.jpg">Lauriel</option>
                                                    <option value="42" data-img-src="/assets/data/8/champ/42.jpg">Batman</option>
                                                    <option value="43" data-img-src="/assets/data/8/champ/43.jpg">Airi</option>
                                                    <option value="44" data-img-src="/assets/data/8/champ/44.jpg">Zuka</option>
                                                    <option value="45" data-img-src="/assets/data/8/champ/45.jpg">Ignis</option>
                                                    <option value="46" data-img-src="/assets/data/8/champ/46.jpg">Murad</option>
                                                    <option value="47" data-img-src="/assets/data/8/champ/47.jpg">Zill</option>
                                                    <option value="48" data-img-src="/assets/data/8/champ/48.jpg">Arduin</option>
                                                    <option value="49" data-img-src="/assets/data/8/champ/49.jpg">Joker</option>
                                                    <option value="50" data-img-src="/assets/data/8/champ/50.jpg">Ryoma</option>
                                                    <option value="51" data-img-src="/assets/data/8/champ/51.jpg">Astrid</option>
                                                    <option value="52" data-img-src="/assets/data/8/champ/52.jpg">Tel'Annas</option>
                                                    <option value="53" data-img-src="/assets/data/8/champ/53.jpg">Superman</option>
                                                    <option value="54" data-img-src="/assets/data/8/champ/54.jpg">Wonder Woman</option>
                                                    <option value="55" data-img-src="/assets/data/8/champ/55.jpg">Xeniel</option>
                                                    <option value="56" data-img-src="/assets/data/8/champ/56.jpg">Kil'Groth</option>
                                                    <option value="57" data-img-src="/assets/data/8/champ/57.jpg">Moren</option>
                                                    <option value="58" data-img-src="/assets/data/8/champ/58.jpg">TeeMee</option>
                                                    <option value="59" data-img-src="/assets/data/8/champ/59.jpg">Lindis</option>
                                                    <option value="60" data-img-src="/assets/data/8/champ/60.jpg">Omen</option>
                                                    <option value="61" data-img-src="/assets/data/8/champ/61.jpg">Tulen</option>
                                                    <option value="62" data-img-src="/assets/data/8/champ/62.jpg">Liliana</option>
                                                    <option value="63" data-img-src="/assets/data/8/champ/63.jpg">Max</option>
                                                    <option value="64" data-img-src="/assets/data/8/champ/64.jpg">The Flash</option>
                                                    <option value="65" data-img-src="/assets/data/8/champ/65.jpg">Wisp</option>
                                                    <option value="66" data-img-src="/assets/data/8/champ/66.jpg">Arum</option>
                                                    <option value="67" data-img-src="/assets/data/8/champ/67.jpg">Rourke</option>
                                                    <option value="68" data-img-src="/assets/data/8/champ/68.jpg">Marja</option>
                                                    <option value="69" data-img-src="/assets/data/8/champ/69.jpg">Roxie</option>
                                                    <option value="70" data-img-src="/assets/data/8/champ/70.jpg">Baldum</option>
                                                    <option value="71" data-img-src="/assets/data/8/champ/71.jpg">Annette</option>
                                                    <option value="72" data-img-src="/assets/data/8/champ/72.jpg">Amily</option>
                                                    <option value="73" data-img-src="/assets/data/8/champ/73.jpg">Y'bneth</option>
                                                    <option value="74" data-img-src="/assets/data/8/champ/74.jpg">Elsu</option>
                                                    <option value="77" data-img-src="/assets/data/8/champ/77.jpg">Richter</option>
                                                    <option value="80" data-img-src="/assets/data/8/champ/80.jpg">Wiro</option>
                                                    <option value="75" data-img-src="/assets/data/8/champ/75.jpg">Quillen</option>
                                                    <option value="76" data-img-src="/assets/data/8/champ/76.jpg">Sephera</option>
                                                    <option value="78" data-img-src="/assets/data/8/champ/78.jpg">Florentino</option>
                                                    <option value="82" data-img-src="/assets/data/8/champ/82.jpg">Veres</option>
                                                    <option value="79" data-img-src="/assets/data/8/champ/79.jpg">D'Arcy</option>
                                                    <option value="83" data-img-src="/assets/data/8/champ/83.jpg">Hayate</option>
                                                    <option value="84" data-img-src="/assets/data/8/champ/84.jpg">Capheny</option>
                                                    <option value="85" data-img-src="/assets/data/8/champ/85.jpg">Errol</option>
                                                    <option value="86" data-img-src="/assets/data/8/champ/86.jpg">Yena</option>
                                                    <option value="87" data-img-src="/assets/data/8/champ/87.jpg">Enzo</option>
                                                    <option value="88" data-img-src="/assets/data/8/champ/88.jpg">Zip</option>
                                                    <option value="89" data-img-src="/assets/data/8/champ/89.jpg">Qi</option>
                                                    <option value="90" data-img-src="/assets/data/8/champ/90.jpg">Celica</option>
                                                    <option value="91" data-img-src="/assets/data/8/champ/91.jpg">Volkath</option>
                                                    <option value="92" data-img-src="/assets/data/8/champ/92.jpg">Krizzix</option>
                                                    <option value="93" data-img-src="/assets/data/8/champ/93.jpg">Eland'orr</option>
                                                    <option value="94" data-img-src="/assets/data/8/champ/94.jpg">Ishar</option>
                                                    <option value="95" data-img-src="/assets/data/8/champ/95.jpg">Dirak</option>
                                                    <option value="96" data-img-src="/assets/data/8/champ/96.jpg">Keera</option>
                                                    <option value="97" data-img-src="/assets/data/8/champ/97.jpg">Ata</option>
                                                    <option value="98" data-img-src="/assets/data/8/champ/98.jpg">Paine</option>
                                                    <option value="99" data-img-src="/assets/data/8/champ/99.jpg">Laville</option>
                                                    <option value="100" data-img-src="/assets/data/8/champ/100.jpg">Rouie</option>
                                                    <option value="101" data-img-src="/assets/data/8/champ/101.jpg">Zata</option>
                                                    <option value="102" data-img-src="/assets/data/8/champ/102.jpg">Allain</option>
                                                    <option value="103" data-img-src="/assets/data/8/champ/103.jpg">Thorne</option>
                                                    <option value="104" data-img-src="/assets/data/8/champ/104.jpg">Sinestrea</option>
                                                    <option value="105" data-img-src="/assets/data/8/champ/105.jpg">Dextra</option>
                                                    <option value="106" data-img-src="/assets/data/8/champ/106.jpg">Lorion</option>
                                                    <option value="107" data-img-src="/assets/data/8/champ/107.jpg">Bright</option>
                                                    <option value="108" data-img-src="/assets/data/8/champ/108.jpg">IGGY</option>
                                                    <option value="109" data-img-src="/assets/data/8/champ/109.jpg">AOI</option>
                                                    <option value="110" data-img-src="/assets/data/8/champ/110.jpg">Aya</option>
                                                    <option value="111" data-img-src="/assets/data/8/champ/111.jpg">Tachi</option>
                                                    <option value="112" data-img-src="/assets/data/8/champ/112.jpg">Yue</option>





                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>Ghi Chú</label>
                                                <textarea class="form-control" id="note" name="note" rows="4" placeholder="Enter để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
                                            </div>
                                        </div>



                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Số skin:</label>
                                                <input type="text" class="form-control" id="skins_count" name="skins_count">
                                            </div>
                                            <div class="form-group">
                                                <label for="skin" class="control-label">Danh sách skin</label>
                                                <select id="skin" name="skin[]" class="form-control select2-multiple m-b-20 selectiamges" multiple onchange="count_skin(this);">
                                                    <option value="">Chọn skill</option>
                                                    <option value="1" data-img-src="/assets/data/8/skins/img_skill/1.png">
                                                        valhein hoàng tử quạ</option>
                                                    <option value="2" data-img-src="/assets/data/8/skins/img_skill/2.png">
                                                        valhein vũ khí tối thượng</option>
                                                    <option value="3" data-img-src="/assets/data/8/skins/img_skill/3.png">
                                                        valhein đại công tước</option>
                                                    <option value="4" data-img-src="/assets/data/8/skins/img_skill/4.png">
                                                        valhein quang vinh</option>
                                                    <option value="5" data-img-src="/assets/data/8/skins/img_skill/5.png">
                                                        valhein số 7 thần sầu</option>
                                                    <option value="6" data-img-src="/assets/data/8/skins/img_skill/6.png">
                                                        valhein khiêu chiến</option>
                                                    <option value="7" data-img-src="/assets/data/8/skins/img_skill/7.png">
                                                        valhein cá mập nghiêm túc</option>
                                                    <option value="8" data-img-src="/assets/data/8/skins/img_skill/8.png">
                                                        valhein hoàng tử băng</option>
                                                    <option value="9" data-img-src="/assets/data/8/skins/img_skill/9.png">
                                                        valhein thần tài</option>
                                                    <option value="10" data-img-src="/assets/data/8/skins/img_skill/10.png">
                                                        thane kẻ hủy diệt</option>
                                                    <option value="11" data-img-src="/assets/data/8/skins/img_skill/11.png">
                                                        thane quang vinh</option>
                                                    <option value="12" data-img-src="/assets/data/8/skins/img_skill/12.png">
                                                        thane mật vụ</option>
                                                    <option value="13" data-img-src="/assets/data/8/skins/img_skill/13.png">
                                                        veera cô giáo hắc ám</option>
                                                    <option value="14" data-img-src="/assets/data/8/skins/img_skill/14.png">
                                                        veera góa phụ giả kim</option>
                                                    <option value="15" data-img-src="/assets/data/8/skins/img_skill/15.png">
                                                        veera nàng dơi tuyết</option>
                                                    <option value="16" data-img-src="/assets/data/8/skins/img_skill/16.png">
                                                        veera y tá bạo loạn</option>
                                                    <option value="17" data-img-src="/assets/data/8/skins/img_skill/17.png">
                                                        veera thiên nga đen</option>
                                                    <option value="18" data-img-src="/assets/data/8/skins/img_skill/18.png">
                                                        veera vũ hội bóng đêm</option>
                                                    <option value="19" data-img-src="/assets/data/8/skins/img_skill/19.png">
                                                        lữ bố tiệc bãi biển</option>
                                                    <option value="20" data-img-src="/assets/data/8/skins/img_skill/20.png">
                                                        lữ bố nam vương</option>
                                                    <option value="21" data-img-src="/assets/data/8/skins/img_skill/21.png">
                                                        lữ bố long kỵ sĩ</option>
                                                    <option value="22" data-img-src="/assets/data/8/skins/img_skill/22.png">
                                                        lữ bố kỵ sĩ âm phủ</option>
                                                    <option value="23" data-img-src="/assets/data/8/skins/img_skill/23.png">
                                                        lữ bố đặc nhiệm swat</option>
                                                    <option value="24" data-img-src="/assets/data/8/skins/img_skill/24.png">
                                                        lữ bố tư lệnh robot</option>
                                                    <option value="25" data-img-src="/assets/data/8/skins/img_skill/25.png">
                                                        lữ bố hỏa long chiến thần</option>
                                                    <option value="26" data-img-src="/assets/data/8/skins/img_skill/26.png">
                                                        lữ bố ichigo kurosaki</option>
                                                    <option value="27" data-img-src="/assets/data/8/skins/img_skill/27.png">
                                                        lữ bố thần ngọc</option>
                                                    <option value="28" data-img-src="/assets/data/8/skins/img_skill/28.png">
                                                        mina tiệc bánh kẹo</option>
                                                    <option value="29" data-img-src="/assets/data/8/skins/img_skill/29.png">
                                                        mina kẹo hay ghẹo</option>
                                                    <option value="30" data-img-src="/assets/data/8/skins/img_skill/30.png">
                                                        mina lưỡi hái hoàng kim</option>
                                                    <option value="31" data-img-src="/assets/data/8/skins/img_skill/31.png">
                                                        mina đào tạo siêu sao</option>
                                                    <option value="32" data-img-src="/assets/data/8/skins/img_skill/32.png">
                                                        mina chị đại lắm chiêu</option>
                                                    <option value="33" data-img-src="/assets/data/8/skins/img_skill/33.png">
                                                        mina tiểu thư đoạt hồn</option>
                                                    <option value="34" data-img-src="/assets/data/8/skins/img_skill/34.png">
                                                        krixi công chúa bướm</option>
                                                    <option value="35" data-img-src="/assets/data/8/skins/img_skill/35.png">
                                                        krixi xứ sở thần tiên</option>
                                                    <option value="36" data-img-src="/assets/data/8/skins/img_skill/36.png">
                                                        krixi tiệc bãi biển</option>
                                                    <option value="37" data-img-src="/assets/data/8/skins/img_skill/37.png">
                                                        krixi cô tiên thỏ</option>
                                                    <option value="38" data-img-src="/assets/data/8/skins/img_skill/38.png">
                                                        krixi phó văn nghệ</option>
                                                    <option value="39" data-img-src="/assets/data/8/skins/img_skill/39.png">
                                                        krixi tiểu yêu nữ</option>
                                                    <option value="40" data-img-src="/assets/data/8/skins/img_skill/40.png">
                                                        krixi nữ hoàng thiên nga</option>
                                                    <option value="41" data-img-src="/assets/data/8/skins/img_skill/41.png">
                                                        krixi thần thoại hy lạp</option>
                                                    <option value="42" data-img-src="/assets/data/8/skins/img_skill/42.png">
                                                        krixi thủy thủ</option>
                                                    <option value="43" data-img-src="/assets/data/8/skins/img_skill/43.png">
                                                        krixi terrible tornado</option>
                                                    <option value="44" data-img-src="/assets/data/8/skins/img_skill/44.png">
                                                        mganga hề cung đình</option>
                                                    <option value="45" data-img-src="/assets/data/8/skins/img_skill/45.png">
                                                        mganga tiệc bánh kẹo</option>
                                                    <option value="46" data-img-src="/assets/data/8/skins/img_skill/46.png">
                                                        mganga pháp sư mèo</option>
                                                    <option value="47" data-img-src="/assets/data/8/skins/img_skill/47.png">
                                                        triệu vân đoạt mệnh thương</option>
                                                    <option value="48" data-img-src="/assets/data/8/skins/img_skill/48.png">
                                                        triệu vân quý công tử</option>
                                                    <option value="49" data-img-src="/assets/data/8/skins/img_skill/49.png">
                                                        triệu vân dũng sĩ đồ long</option>
                                                    <option value="50" data-img-src="/assets/data/8/skins/img_skill/50.png">
                                                        triệu vân quang vinh</option>
                                                    <option value="51" data-img-src="/assets/data/8/skins/img_skill/51.png">
                                                        triệu vân chiến tướng mùa đông</option>
                                                    <option value="52" data-img-src="/assets/data/8/skins/img_skill/52.png">
                                                        triệu vân kỵ sĩ tận thế</option>
                                                    <option value="53" data-img-src="/assets/data/8/skins/img_skill/53.png">
                                                        triệu vân cẩm y vệ: hỏa long</option>
                                                    <option value="54" data-img-src="/assets/data/8/skins/img_skill/54.png">
                                                        omega người máy xanh</option>
                                                    <option value="55" data-img-src="/assets/data/8/skins/img_skill/55.png">
                                                        omega cỗ máy siêu tốc</option>
                                                    <option value="56" data-img-src="/assets/data/8/skins/img_skill/56.png">
                                                        kahlii cô dâu hắc ám</option>
                                                    <option value="57" data-img-src="/assets/data/8/skins/img_skill/57.png">
                                                        kahlii quaàng khăn đỏ</option>
                                                    <option value="58" data-img-src="/assets/data/8/skins/img_skill/58.png">
                                                        kahlii kim cô giáo chủ</option>
                                                    <option value="59" data-img-src="/assets/data/8/skins/img_skill/59.png">
                                                        kahlii siêu đầu bếp</option>
                                                    <option value="60" data-img-src="/assets/data/8/skins/img_skill/60.png">
                                                        kahlii vũ hội bóng đêm</option>
                                                    <option value="61" data-img-src="/assets/data/8/skins/img_skill/61.png">
                                                        zephys oán linh</option>
                                                    <option value="62" data-img-src="/assets/data/8/skins/img_skill/62.png">
                                                        zephys hiệp sĩ bí ngô</option>
                                                    <option value="63" data-img-src="/assets/data/8/skins/img_skill/63.png">
                                                        zephys dung nham</option>
                                                    <option value="64" data-img-src="/assets/data/8/skins/img_skill/64.png">
                                                        zephys siêu việt</option>
                                                    <option value="65" data-img-src="/assets/data/8/skins/img_skill/65.png">
                                                        zephys phi thương</option>
                                                    <option value="66" data-img-src="/assets/data/8/skins/img_skill/66.png">
                                                        zephys tư lệnh viễn chinh</option>
                                                    <option value="67" data-img-src="/assets/data/8/skins/img_skill/67.png">
                                                        zephys hắc vô thường</option>
                                                    <option value="68" data-img-src="/assets/data/8/skins/img_skill/68.png">
                                                        điêu thuyền nữ vương anh đào</option>
                                                    <option value="69" data-img-src="/assets/data/8/skins/img_skill/69.png">
                                                        điêu thuyền tiệc bãi biển</option>
                                                    <option value="70" data-img-src="/assets/data/8/skins/img_skill/70.png">
                                                        điêu thuyền nữ y tá</option>
                                                    <option value="71" data-img-src="/assets/data/8/skins/img_skill/71.png">
                                                        điêu thuyền wave</option>
                                                    <option value="72" data-img-src="/assets/data/8/skins/img_skill/72.png">
                                                        điêu thuyền hoa hậu</option>
                                                    <option value="73" data-img-src="/assets/data/8/skins/img_skill/73.png">
                                                        điêu thuyền phù thủy bí ngô</option>
                                                    <option value="74" data-img-src="/assets/data/8/skins/img_skill/74.png">
                                                        điêu thuyền vũ điệu nghê thường</option>
                                                    <option value="75" data-img-src="/assets/data/8/skins/img_skill/75.png">
                                                        điêu thuyền tà linh pháp trượng</option>
                                                    <option value="76" data-img-src="/assets/data/8/skins/img_skill/76.png">
                                                        điêu thuyền mèo công nghệ</option>
                                                    <option value="77" data-img-src="/assets/data/8/skins/img_skill/77.png">
                                                        điêu thuyền thần ngọc</option>
                                                    <option value="78" data-img-src="/assets/data/8/skins/img_skill/78.png">
                                                        chaugnar ác mộng sinh hóa</option>
                                                    <option value="79" data-img-src="/assets/data/8/skins/img_skill/79.png">
                                                        chaugnar quang vinh</option>
                                                    <option value="80" data-img-src="/assets/data/8/skins/img_skill/80.png">
                                                        violet nữ hoàng pháo hoa</option>
                                                    <option value="81" data-img-src="/assets/data/8/skins/img_skill/81.png">
                                                        violet nữ đặc cảnh</option>
                                                    <option value="82" data-img-src="/assets/data/8/skins/img_skill/82.png">
                                                        violet phi công trẻ</option>
                                                    <option value="83" data-img-src="/assets/data/8/skins/img_skill/83.png">
                                                        violet mèo siêu quậy</option>
                                                    <option value="84" data-img-src="/assets/data/8/skins/img_skill/84.png">
                                                        violet tiệc bãi biển</option>
                                                    <option value="85" data-img-src="/assets/data/8/skins/img_skill/85.png">
                                                        violet phó học tập</option>
                                                    <option value="86" data-img-src="/assets/data/8/skins/img_skill/86.png">
                                                        violet thứ nguyên vệ thần</option>
                                                    <option value="87" data-img-src="/assets/data/8/skins/img_skill/87.png">
                                                        violet phá hoa neon</option>
                                                    <option value="88" data-img-src="/assets/data/8/skins/img_skill/88.png">
                                                        violet đặc dị</option>
                                                    <option value="89" data-img-src="/assets/data/8/skins/img_skill/89.png">
                                                        violet vợ người ta</option>
                                                    <option value="90" data-img-src="/assets/data/8/skins/img_skill/90.png">
                                                        violet tay súng siêu phàm</option>
                                                    <option value="91" data-img-src="/assets/data/8/skins/img_skill/91.png">
                                                        violet huy chương vàng</option>
                                                    <option value="92" data-img-src="/assets/data/8/skins/img_skill/92.png">
                                                        violet huyết ma thần</option>
                                                    <option value="93" data-img-src="/assets/data/8/skins/img_skill/93.png">
                                                        violet lam tước</option>
                                                    <option value="94" data-img-src="/assets/data/8/skins/img_skill/94.png">
                                                        violet thần long tỷ tỷ</option>
                                                    <option value="95" data-img-src="/assets/data/8/skins/img_skill/95.png">
                                                        butterfly xuân nữ ngổ ngáo</option>
                                                    <option value="96" data-img-src="/assets/data/8/skins/img_skill/96.png">
                                                        butterfly thủy thủ</option>
                                                    <option value="97" data-img-src="/assets/data/8/skins/img_skill/97.png">
                                                        butterfly teen nữ công nghệ</option>
                                                    <option value="98" data-img-src="/assets/data/8/skins/img_skill/98.png">
                                                        butterfly nữ quái nổi loạn</option>
                                                    <option value="99" data-img-src="/assets/data/8/skins/img_skill/99.png">
                                                        butterfly quận chúa đế chế</option>
                                                    <option value="100" data-img-src="/assets/data/8/skins/img_skill/100.png">
                                                        butterfly đông êm đềm</option>
                                                    <option value="101" data-img-src="/assets/data/8/skins/img_skill/101.png">
                                                        butterfly phượng cửu thiên</option>
                                                    <option value="102" data-img-src="/assets/data/8/skins/img_skill/102.png">
                                                        butterfly cẩm y vệ: chu tước</option>
                                                    <option value="103" data-img-src="/assets/data/8/skins/img_skill/103.png">
                                                        butterfly asuna tia chớp</option>
                                                    <option value="104" data-img-src="/assets/data/8/skins/img_skill/104.png">
                                                        butterfly stacia</option>
                                                    <option value="105" data-img-src="/assets/data/8/skins/img_skill/105.png">
                                                        Ormarr cựu chiến binh</option>
                                                    <option value="106" data-img-src="/assets/data/8/skins/img_skill/106.png">
                                                        Ormarr thông thỏa thích</option>
                                                    <option value="107" data-img-src="/assets/data/8/skins/img_skill/107.png">
                                                        Ormarr giáo viên thể hình</option>
                                                    <option value="108" data-img-src="/assets/data/8/skins/img_skill/108.png">
                                                        Azzen`Ka linh hồn lữ khách</option>
                                                    <option value="109" data-img-src="/assets/data/8/skins/img_skill/109.png">
                                                        Azzen`Ka kẹo hay ghẹo</option>
                                                    <option value="110" data-img-src="/assets/data/8/skins/img_skill/110.png">
                                                        Azzen`Ka quỷ diện lãng khách</option>
                                                    <option value="111" data-img-src="/assets/data/8/skins/img_skill/111.png">
                                                        Alice nhà chiêm tinh</option>
                                                    <option value="112" data-img-src="/assets/data/8/skins/img_skill/112.png">
                                                        Alice bé gấu tuyết</option>
                                                    <option value="113" data-img-src="/assets/data/8/skins/img_skill/113.png">
                                                        Alice xứ sở thần tiên</option>
                                                    <option value="114" data-img-src="/assets/data/8/skins/img_skill/114.png">
                                                        Alice dạ hội</option>
                                                    <option value="115" data-img-src="/assets/data/8/skins/img_skill/115.png">
                                                        Alice tiểu quỷ bí ngô</option>
                                                    <option value="116" data-img-src="/assets/data/8/skins/img_skill/116.png">
                                                        Alice bé du xuân</option>
                                                    <option value="117" data-img-src="/assets/data/8/skins/img_skill/117.png">
                                                        Alice tiểu tiên tử</option>
                                                    <option value="118" data-img-src="/assets/data/8/skins/img_skill/118.png">
                                                        Gildur tiệc bãi biển</option>
                                                    <option value="119" data-img-src="/assets/data/8/skins/img_skill/119.png">
                                                        Gildur phượt thủ</option>
                                                    <option value="120" data-img-src="/assets/data/8/skins/img_skill/120.png">
                                                        Gildur đại gia học viện</option>
                                                    <option value="121" data-img-src="/assets/data/8/skins/img_skill/121.png">
                                                        Gildur đại võ sư</option>
                                                    <option value="122" data-img-src="/assets/data/8/skins/img_skill/122.png">
                                                        Gildur thuyền trưởng râu bạc</option>
                                                    <option value="123" data-img-src="/assets/data/8/skins/img_skill/123.png">
                                                        Yorn cung thủ bóng đêm</option>
                                                    <option value="124" data-img-src="/assets/data/8/skins/img_skill/124.png">
                                                        Yorn thế tử nguyệt tộc</option>
                                                    <option value="125" data-img-src="/assets/data/8/skins/img_skill/125.png">
                                                        Yorn đặc nhiệm swat</option>
                                                    <option value="126" data-img-src="/assets/data/8/skins/img_skill/126.png">
                                                        Yorn phá vân tiễn</option>
                                                    <option value="127" data-img-src="/assets/data/8/skins/img_skill/127.png">
                                                        Yorn long thần soái</option>
                                                    <option value="128" data-img-src="/assets/data/8/skins/img_skill/128.png">
                                                        Yorn nam thần giáng sinh</option>
                                                    <option value="129" data-img-src="/assets/data/8/skins/img_skill/129.png">
                                                        Yorn soái ca học đường</option>
                                                    <option value="130" data-img-src="/assets/data/8/skins/img_skill/130.png">
                                                        Yorn thần thoại hy lạp</option>
                                                    <option value="131" data-img-src="/assets/data/8/skins/img_skill/131.png">
                                                        Toro đặc cảnh nypd</option>
                                                    <option value="132" data-img-src="/assets/data/8/skins/img_skill/132.png">
                                                        Toro trung phong cắm</option>
                                                    <option value="133" data-img-src="/assets/data/8/skins/img_skill/133.png">
                                                        Toro thần thoại hy lạp</option>
                                                    <option value="134" data-img-src="/assets/data/8/skins/img_skill/134.png">
                                                        Taara đại tù trưởng</option>
                                                    <option value="135" data-img-src="/assets/data/8/skins/img_skill/135.png">
                                                        Taara hỏa ngọc nữ đế</option>
                                                    <option value="136" data-img-src="/assets/data/8/skins/img_skill/136.png">
                                                        Taara tiệc bãi biển</option>
                                                    <option value="137" data-img-src="/assets/data/8/skins/img_skill/137.png">
                                                        Taara hồng môn đường chủ</option>
                                                    <option value="138" data-img-src="/assets/data/8/skins/img_skill/138.png">
                                                        Taara tư lệnh hải âu</option>
                                                    <option value="139" data-img-src="/assets/data/8/skins/img_skill/139.png">
                                                        Nakroth chiến binh hỏa ngục</option>
                                                    <option value="140" data-img-src="/assets/data/8/skins/img_skill/140.png">
                                                        Nakroth quân đoàn địa ngục</option>
                                                    <option value="141" data-img-src="/assets/data/8/skins/img_skill/141.png">
                                                        Nakroth bboy công nghệ</option>
                                                    <option value="142" data-img-src="/assets/data/8/skins/img_skill/142.png">
                                                        Nakroth khiêu chiến</option>
                                                    <option value="143" data-img-src="/assets/data/8/skins/img_skill/143.png">
                                                        Nakroth quán quân</option>
                                                    <option value="144" data-img-src="/assets/data/8/skins/img_skill/144.png">
                                                        Nakroth lôi quang sứ</option>
                                                    <option value="145" data-img-src="/assets/data/8/skins/img_skill/145.png">
                                                        Nakroth tiệc bãi biển</option>
                                                    <option value="146" data-img-src="/assets/data/8/skins/img_skill/146.png">
                                                        Nakroth thứ nguyên vệ thần</option>
                                                    <option value="147" data-img-src="/assets/data/8/skins/img_skill/147.png">
                                                        Nakroth siêu việt</option>
                                                    <option value="148" data-img-src="/assets/data/8/skins/img_skill/148.png">
                                                        Grakk thuyền trưởng râu đỏ</option>
                                                    <option value="149" data-img-src="/assets/data/8/skins/img_skill/149.png">
                                                        Grakk khô lâu đại tướng</option>
                                                    <option value="150" data-img-src="/assets/data/8/skins/img_skill/150.png">
                                                        Grakk chàng gấu tuyết</option>
                                                    <option value="151" data-img-src="/assets/data/8/skins/img_skill/151.png">
                                                        Grakk mèo thần tài</option>
                                                    <option value="152" data-img-src="/assets/data/8/skins/img_skill/152.png">
                                                        Grakk sumo</option>
                                                    <option value="153" data-img-src="/assets/data/8/skins/img_skill/153.png">
                                                        Grakk tiệc bãi biển</option>
                                                    <option value="154" data-img-src="/assets/data/8/skins/img_skill/154.png">
                                                        Aleister thiếu niên hắc ám</option>
                                                    <option value="155" data-img-src="/assets/data/8/skins/img_skill/155.png">
                                                        Aleister quang vinh</option>
                                                    <option value="156" data-img-src="/assets/data/8/skins/img_skill/156.png">
                                                        Aleister quỷ soái nguyệt tộc</option>
                                                    <option value="157" data-img-src="/assets/data/8/skins/img_skill/157.png">
                                                        Aleister siêu sao bóng rổ</option>
                                                    <option value="158" data-img-src="/assets/data/8/skins/img_skill/158.png">
                                                        Aleister âm dương sư</option>
                                                    <option value="159" data-img-src="/assets/data/8/skins/img_skill/159.png">
                                                        Fennik nhà thám hiểm</option>
                                                    <option value="160" data-img-src="/assets/data/8/skins/img_skill/160.png">
                                                        Fennik tiệc bánh kẹo</option>
                                                    <option value="161" data-img-src="/assets/data/8/skins/img_skill/161.png">
                                                        Fennik tuần lộ láu lỉnh</option>
                                                    <option value="162" data-img-src="/assets/data/8/skins/img_skill/162.png">
                                                        Fennik phi hành gia</option>
                                                    <option value="163" data-img-src="/assets/data/8/skins/img_skill/163.png">
                                                        Fennik tay đua f1</option>
                                                    <option value="164" data-img-src="/assets/data/8/skins/img_skill/164.png">
                                                        Lumburr dung nham</option>
                                                    <option value="165" data-img-src="/assets/data/8/skins/img_skill/165.png">
                                                        Lumburr cự thần viễn cổ</option>
                                                    <option value="166" data-img-src="/assets/data/8/skins/img_skill/166.png">
                                                        Natalya nghệ nhân lân</option>
                                                    <option value="167" data-img-src="/assets/data/8/skins/img_skill/167.png">
                                                        Natalya quý cô thủy tề</option>
                                                    <option value="168" data-img-src="/assets/data/8/skins/img_skill/168.png">
                                                        Natalya phó nháy nhí nhảnh</option>
                                                    <option value="169" data-img-src="/assets/data/8/skins/img_skill/169.png">
                                                        Natalya quà quái quỷ</option>
                                                    <option value="170" data-img-src="/assets/data/8/skins/img_skill/170.png">
                                                        Natalya nghiệp hỏa yêu hậu</option>
                                                    <option value="171" data-img-src="/assets/data/8/skins/img_skill/171.png">
                                                        Natalya băng tâm thần nữ</option>
                                                    <option value="172" data-img-src="/assets/data/8/skins/img_skill/172.png">
                                                        Natalya nữ quái công nghệ</option>
                                                    <option value="173" data-img-src="/assets/data/8/skins/img_skill/173.png">
                                                        Cresht thợ sửa cáp</option>
                                                    <option value="174" data-img-src="/assets/data/8/skins/img_skill/174.png">
                                                        Cresht cá cắn cáp</option>
                                                    <option value="175" data-img-src="/assets/data/8/skins/img_skill/175.png">
                                                        Cresht đại sư sushi</option>
                                                    <option value="176" data-img-src="/assets/data/8/skins/img_skill/176.png">
                                                        Jinna đại tư tế</option>
                                                    <option value="177" data-img-src="/assets/data/8/skins/img_skill/177.png">
                                                        Jinna dạ xoa vương</option>
                                                    <option value="178" data-img-src="/assets/data/8/skins/img_skill/178.png">
                                                        Jinna hỏa nhãn ma vương</option>
                                                    <option value="179" data-img-src="/assets/data/8/skins/img_skill/179.png">
                                                        Payna cảnh vệ rừng</option>
                                                    <option value="180" data-img-src="/assets/data/8/skins/img_skill/180.png">
                                                        Payna nghìn lẻ một đêm</option>
                                                    <option value="181" data-img-src="/assets/data/8/skins/img_skill/181.png">
                                                        Maloch ác ma địa ngục</option>
                                                    <option value="182" data-img-src="/assets/data/8/skins/img_skill/182.png">
                                                        Maloch tiệc hóa trang</option>
                                                    <option value="183" data-img-src="/assets/data/8/skins/img_skill/183.png">
                                                        Maloch samurai tử sĩ</option>
                                                    <option value="184" data-img-src="/assets/data/8/skins/img_skill/184.png">
                                                        Maloch đại tướng rô bốt</option>
                                                    <option value="185" data-img-src="/assets/data/8/skins/img_skill/185.png">
                                                        Maloch ông kẹ bí ngô</option>
                                                    <option value="186" data-img-src="/assets/data/8/skins/img_skill/186.png">
                                                        Maloch ác nhân vô tuyến</option>
                                                    <option value="187" data-img-src="/assets/data/8/skins/img_skill/187.png">
                                                        Maloch vũ hội bóng đêm</option>
                                                    <option value="188" data-img-src="/assets/data/8/skins/img_skill/188.png">
                                                        Ngộ Không đạo tặc</option>
                                                    <option value="189" data-img-src="/assets/data/8/skins/img_skill/189.png">
                                                        Ngộ Không hỏa nhãn kim tinh</option>
                                                    <option value="190" data-img-src="/assets/data/8/skins/img_skill/190.png">
                                                        Ngộ Không siêu việt</option>
                                                    <option value="191" data-img-src="/assets/data/8/skins/img_skill/191.png">
                                                        Ngộ Không ngộ khá trẩu</option>
                                                    <option value="192" data-img-src="/assets/data/8/skins/img_skill/192.png">
                                                        Ngộ Không siêu việt 2.0</option>
                                                    <option value="193" data-img-src="/assets/data/8/skins/img_skill/193.png">
                                                        Ngộ Không đặc vụ băng hầu</option>
                                                    <option value="194" data-img-src="/assets/data/8/skins/img_skill/194.png">
                                                        Ngộ Không nhóc tì bá đạo</option>
                                                    <option value="195" data-img-src="/assets/data/8/skins/img_skill/195.png">
                                                        Ngộ Không tề thiên ma hầu</option>
                                                    <option value="196" data-img-src="/assets/data/8/skins/img_skill/196.png">
                                                        Kriknak bọ cánh bạc</option>
                                                    <option value="197" data-img-src="/assets/data/8/skins/img_skill/197.png">
                                                        Kriknak yêu trùng cổ mộ</option>
                                                    <option value="198" data-img-src="/assets/data/8/skins/img_skill/198.png">
                                                        Kriknak st.l-162</option>
                                                    <option value="199" data-img-src="/assets/data/8/skins/img_skill/199.png">
                                                        Kriknak bọ cánh cam</option>
                                                    <option value="200" data-img-src="/assets/data/8/skins/img_skill/200.png">
                                                        Arthur hoàng kim cốt</option>
                                                    <option value="201" data-img-src="/assets/data/8/skins/img_skill/201.png">
                                                        Arthur lãnh chúa xương</option>
                                                    <option value="202" data-img-src="/assets/data/8/skins/img_skill/202.png">
                                                        Arthur si tình kiếm</option>
                                                    <option value="203" data-img-src="/assets/data/8/skins/img_skill/203.png">
                                                        Arthur siêu sao cricket</option>
                                                    <option value="204" data-img-src="/assets/data/8/skins/img_skill/204.png">
                                                        Arthur đặc cảnh băng lôi</option>
                                                    <option value="205" data-img-src="/assets/data/8/skins/img_skill/205.png">
                                                        Arthur hiệp sĩ trăng khuyết</option>
                                                    <option value="206" data-img-src="/assets/data/8/skins/img_skill/206.png">
                                                        Arthur siêu việt</option>
                                                    <option value="207" data-img-src="/assets/data/8/skins/img_skill/207.png">
                                                        Slimz thỏ thợ mỏ</option>
                                                    <option value="208" data-img-src="/assets/data/8/skins/img_skill/208.png">
                                                        Slimz chú thỏ ngọc</option>
                                                    <option value="209" data-img-src="/assets/data/8/skins/img_skill/209.png">
                                                        Slimz xứ sở thần tiên</option>
                                                    <option value="210" data-img-src="/assets/data/8/skins/img_skill/210.png">
                                                        Slimz thỏ nhồi bông</option>
                                                    <option value="211" data-img-src="/assets/data/8/skins/img_skill/211.png">
                                                        Ilumia nữ chúa tuyết</option>
                                                    <option value="212" data-img-src="/assets/data/8/skins/img_skill/212.png">
                                                        Ilumia thần mặt trời</option>
                                                    <option value="213" data-img-src="/assets/data/8/skins/img_skill/213.png">
                                                        Ilumia hồng hoa hậu</option>
                                                    <option value="214" data-img-src="/assets/data/8/skins/img_skill/214.png">
                                                        Ilumia thiên nữ áo dài</option>
                                                    <option value="215" data-img-src="/assets/data/8/skins/img_skill/215.png">
                                                        Ilumia nữ hoàng khí giới</option>
                                                    <option value="216" data-img-src="/assets/data/8/skins/img_skill/216.png">
                                                        Preyta không tặc</option>
                                                    <option value="217" data-img-src="/assets/data/8/skins/img_skill/217.png">
                                                        Preyta băng hỏa long sư</option>
                                                    <option value="218" data-img-src="/assets/data/8/skins/img_skill/218.png">
                                                        Preyta phi cơ f1</option>
                                                    <option value="219" data-img-src="/assets/data/8/skins/img_skill/219.png">
                                                        Skud sơn tặc</option>
                                                    <option value="220" data-img-src="/assets/data/8/skins/img_skill/220.png">
                                                        Skud quang vinh</option>
                                                    <option value="221" data-img-src="/assets/data/8/skins/img_skill/221.png">
                                                        Skud tà linh ma tướng</option>
                                                    <option value="222" data-img-src="/assets/data/8/skins/img_skill/222.png">
                                                        Raz đại tù trưởng</option>
                                                    <option value="223" data-img-src="/assets/data/8/skins/img_skill/223.png">
                                                        Raz băng quyền quán quân</option>
                                                    <option value="224" data-img-src="/assets/data/8/skins/img_skill/224.png">
                                                        Raz chiến thân muay thái</option>
                                                    <option value="225" data-img-src="/assets/data/8/skins/img_skill/225.png">
                                                        Raz siêu việt</option>
                                                    <option value="226" data-img-src="/assets/data/8/skins/img_skill/226.png">
                                                        Raz siêu cấp tin tặc</option>
                                                    <option value="227" data-img-src="/assets/data/8/skins/img_skill/227.png">
                                                        Raz saitama cosplay</option>
                                                    <option value="228" data-img-src="/assets/data/8/skins/img_skill/228.png">
                                                        Lauriel đọa lạc thiên sứ</option>
                                                    <option value="229" data-img-src="/assets/data/8/skins/img_skill/229.png">
                                                        Lauriel hỏa phượng hoàng</option>
                                                    <option value="230" data-img-src="/assets/data/8/skins/img_skill/230.png">
                                                        Lauriel phù thủy bí ngô</option>
                                                    <option value="231" data-img-src="/assets/data/8/skins/img_skill/231.png">
                                                        Lauriel thánh quang sứ</option>
                                                    <option value="232" data-img-src="/assets/data/8/skins/img_skill/232.png">
                                                        Lauriel hoa khôi giáng sinh</option>
                                                    <option value="233" data-img-src="/assets/data/8/skins/img_skill/233.png">
                                                        Lauriel lạc thần</option>
                                                    <option value="234" data-img-src="/assets/data/8/skins/img_skill/234.png">
                                                        Lauriel tinh vân sứ</option>
                                                    <option value="235" data-img-src="/assets/data/8/skins/img_skill/235.png">
                                                        Lauriel tiệc bãi biển</option>
                                                    <option value="236" data-img-src="/assets/data/8/skins/img_skill/236.png">
                                                        Lauriel thiên sứ công nghệ</option>
                                                    <option value="237" data-img-src="/assets/data/8/skins/img_skill/237.png">
                                                        Batman đôi cánh đại dương</option>
                                                    <option value="238" data-img-src="/assets/data/8/skins/img_skill/238.png">
                                                        Batman dơi địa ngục</option>
                                                    <option value="239" data-img-src="/assets/data/8/skins/img_skill/239.png">
                                                        Airi thích khách</option>
                                                    <option value="240" data-img-src="/assets/data/8/skins/img_skill/240.png">
                                                        Airi ninja xanh lá</option>
                                                    <option value="241" data-img-src="/assets/data/8/skins/img_skill/241.png">
                                                        Airi quái xế công nghệ</option>
                                                    <option value="242" data-img-src="/assets/data/8/skins/img_skill/242.png">
                                                        Airi cấm vệ nguyệt tộc</option>
                                                    <option value="243" data-img-src="/assets/data/8/skins/img_skill/243.png">
                                                        Airi kiemono</option>
                                                    <option value="244" data-img-src="/assets/data/8/skins/img_skill/244.png">
                                                        Airi bạch kiemono</option>
                                                    <option value="245" data-img-src="/assets/data/8/skins/img_skill/245.png">
                                                        Airi phó kiếm đạo</option>
                                                    <option value="246" data-img-src="/assets/data/8/skins/img_skill/246.png">
                                                        Airi tiệc bãi biển</option>
                                                    <option value="247" data-img-src="/assets/data/8/skins/img_skill/247.png">
                                                        Airi mỵ hồ</option>
                                                    <option value="248" data-img-src="/assets/data/8/skins/img_skill/248.png">
                                                        Airi đặc công tử điệp</option>
                                                    <option value="249" data-img-src="/assets/data/8/skins/img_skill/249.png">
                                                        Airi bích hải thánh nữ</option>
                                                    <option value="250" data-img-src="/assets/data/8/skins/img_skill/250.png">
                                                        Airi lễ hội mùa xuân</option>
                                                    <option value="251" data-img-src="/assets/data/8/skins/img_skill/251.png">
                                                        Zuka đại phú ông</option>
                                                    <option value="252" data-img-src="/assets/data/8/skins/img_skill/252.png">
                                                        Zuka giáo sư sừng sỏ</option>
                                                    <option value="253" data-img-src="/assets/data/8/skins/img_skill/253.png">
                                                        Zuka phát tài</option>
                                                    <option value="254" data-img-src="/assets/data/8/skins/img_skill/254.png">
                                                        Zuka gấu nhồi bông</option>
                                                    <option value="255" data-img-src="/assets/data/8/skins/img_skill/255.png">
                                                        Zuka diệt nguyệt nguyên soái</option>
                                                    <option value="256" data-img-src="/assets/data/8/skins/img_skill/256.png">
                                                        Zuka đầu bếp hoàng cung</option>
                                                    <option value="257" data-img-src="/assets/data/8/skins/img_skill/257.png">
                                                        Zuka mãnh hổ</option>
                                                    <option value="258" data-img-src="/assets/data/8/skins/img_skill/258.png">
                                                        Ignis hỏa thuật sư</option>
                                                    <option value="259" data-img-src="/assets/data/8/skins/img_skill/259.png">
                                                        Ignis quang vinh</option>
                                                    <option value="260" data-img-src="/assets/data/8/skins/img_skill/260.png">
                                                        Ignis bắc băng vương</option>
                                                    <option value="261" data-img-src="/assets/data/8/skins/img_skill/261.png">
                                                        Ignis thầy tế mặt trời</option>
                                                    <option value="262" data-img-src="/assets/data/8/skins/img_skill/262.png">
                                                        Murad thợ săn tiền thưởng</option>
                                                    <option value="263" data-img-src="/assets/data/8/skins/img_skill/263.png">
                                                        Murad m-tp thần tượng học đường</option>
                                                    <option value="264" data-img-src="/assets/data/8/skins/img_skill/264.png">
                                                        Murad đồ thần đao</option>
                                                    <option value="265" data-img-src="/assets/data/8/skins/img_skill/265.png">
                                                        Murad siêu việt</option>
                                                    <option value="266" data-img-src="/assets/data/8/skins/img_skill/266.png">
                                                        Murad thiên tài sân cỏ</option>
                                                    <option value="267" data-img-src="/assets/data/8/skins/img_skill/267.png">
                                                        Murad điệp viên anubis</option>
                                                    <option value="268" data-img-src="/assets/data/8/skins/img_skill/268.png">
                                                        Murad đặc dị</option>
                                                    <option value="269" data-img-src="/assets/data/8/skins/img_skill/269.png">
                                                        Murad siêu việt 2.0</option>
                                                    <option value="270" data-img-src="/assets/data/8/skins/img_skill/270.png">
                                                        Murad chí tôn thần kiếm</option>
                                                    <option value="271" data-img-src="/assets/data/8/skins/img_skill/271.png">
                                                        Murad dược sĩ tình yêu</option>
                                                    <option value="272" data-img-src="/assets/data/8/skins/img_skill/272.png">
                                                        Murad byakuya kuchiki</option>
                                                    <option value="273" data-img-src="/assets/data/8/skins/img_skill/273.png">
                                                        Zill lốc địa ngục</option>
                                                    <option value="274" data-img-src="/assets/data/8/skins/img_skill/274.png">
                                                        Zill dung nham</option>
                                                    <option value="275" data-img-src="/assets/data/8/skins/img_skill/275.png">
                                                        Zill cựu thần thiên hà</option>
                                                    <option value="276" data-img-src="/assets/data/8/skins/img_skill/276.png">
                                                        Zill diệt nguyệt tử sĩ</option>
                                                    <option value="277" data-img-src="/assets/data/8/skins/img_skill/277.png">
                                                        Zill thần mộng mị</option>
                                                    <option value="278" data-img-src="/assets/data/8/skins/img_skill/278.png">
                                                        Arduin cận vệ hoàng gia</option>
                                                    <option value="279" data-img-src="/assets/data/8/skins/img_skill/279.png">
                                                        Arduin quang vinh</option>
                                                    <option value="280" data-img-src="/assets/data/8/skins/img_skill/280.png">
                                                        Arduin tà linh hiệp sĩ</option>
                                                    <option value="281" data-img-src="/assets/data/8/skins/img_skill/281.png">
                                                        Arduin chiến binh cổ đại</option>
                                                    <option value="282" data-img-src="/assets/data/8/skins/img_skill/282.png">
                                                        Joker trò đùa tử vong</option>
                                                    <option value="283" data-img-src="/assets/data/8/skins/img_skill/283.png">
                                                        Joker vua hề</option>
                                                    <option value="284" data-img-src="/assets/data/8/skins/img_skill/284.png">
                                                        Ryoma thợ săn tiền thưởng</option>
                                                    <option value="285" data-img-src="/assets/data/8/skins/img_skill/285.png">
                                                        Ryoma đại tướng nguyệt tộc</option>
                                                    <option value="286" data-img-src="/assets/data/8/skins/img_skill/286.png">
                                                        Ryoma thanh long bang chủ</option>
                                                    <option value="287" data-img-src="/assets/data/8/skins/img_skill/287.png">
                                                        Ryoma samurai huyền thoại</option>
                                                    <option value="288" data-img-src="/assets/data/8/skins/img_skill/288.png">
                                                        Ryoma dạ hội</option>
                                                    <option value="289" data-img-src="/assets/data/8/skins/img_skill/289.png">
                                                        Ryoma chiến binh cyborg</option>
                                                    <option value="290" data-img-src="/assets/data/8/skins/img_skill/290.png">
                                                        Ryoma ultraman</option>
                                                    <option value="291" data-img-src="/assets/data/8/skins/img_skill/291.png">
                                                        Ryoma đặc nhiệm giáng sinh</option>
                                                    <option value="292" data-img-src="/assets/data/8/skins/img_skill/292.png">
                                                        Astrid bạch kiếm tiểu thư</option>
                                                    <option value="293" data-img-src="/assets/data/8/skins/img_skill/293.png">
                                                        Astrid siêu sao bóng chày</option>
                                                    <option value="294" data-img-src="/assets/data/8/skins/img_skill/294.png">
                                                        Astrid tổ trưởng học đường</option>
                                                    <option value="295" data-img-src="/assets/data/8/skins/img_skill/295.png">
                                                        Astrid thần thoại hy lạp</option>
                                                    <option value="296" data-img-src="/assets/data/8/skins/img_skill/296.png">
                                                        Tel`Annas cảnh vệ rừng</option>
                                                    <option value="297" data-img-src="/assets/data/8/skins/img_skill/297.png">
                                                        Tel`Annas giám thị thân thiện</option>
                                                    <option value="298" data-img-src="/assets/data/8/skins/img_skill/298.png">
                                                        Tel`Annas chung tình tiễn</option>
                                                    <option value="299" data-img-src="/assets/data/8/skins/img_skill/299.png">
                                                        Tel`Annas thánh nữ mật hội</option>
                                                    <option value="300" data-img-src="/assets/data/8/skins/img_skill/300.png">
                                                        Tel`Annas thần sứ F.e.e-x1</option>
                                                    <option value="301" data-img-src="/assets/data/8/skins/img_skill/301.png">
                                                        Tel`Annas cẩm y vệ: phi ưng</option>
                                                    <option value="302" data-img-src="/assets/data/8/skins/img_skill/302.png">
                                                        Tel`Annas dạ hội</option>
                                                    <option value="303" data-img-src="/assets/data/8/skins/img_skill/303.png">
                                                        Tel`Annas thứ nguyên vệ thần</option>
                                                    <option value="304" data-img-src="/assets/data/8/skins/img_skill/304.png">
                                                        Tel`Annas công chúa mộng mơ</option>
                                                    <option value="305" data-img-src="/assets/data/8/skins/img_skill/305.png">
                                                        Tel`Annas vũ khúc yêu hồ</option>
                                                    <option value="306" data-img-src="/assets/data/8/skins/img_skill/306.png">
                                                        Tel`Annas tân niên vệ thần</option>
                                                    <option value="307" data-img-src="/assets/data/8/skins/img_skill/307.png">
                                                        Superman chúa tể công lý</option>
                                                    <option value="308" data-img-src="/assets/data/8/skins/img_skill/308.png">
                                                        Superman bất công lý</option>
                                                    <option value="309" data-img-src="/assets/data/8/skins/img_skill/309.png">
                                                        Wonder Woman thế chiến</option>
                                                    <option value="310" data-img-src="/assets/data/8/skins/img_skill/310.png">
                                                        Xeniel thiên sứ hủy diệt</option>
                                                    <option value="311" data-img-src="/assets/data/8/skins/img_skill/311.png">
                                                        Xeniel trung vệ thép</option>
                                                    <option value="312" data-img-src="/assets/data/8/skins/img_skill/312.png">
                                                        Xeniel kim sí điểu</option>
                                                    <option value="313" data-img-src="/assets/data/8/skins/img_skill/313.png">
                                                        Xeniel tổng lãnh tinh hệ</option>
                                                    <option value="314" data-img-src="/assets/data/8/skins/img_skill/314.png">
                                                        Xeniel thần thoại hy lạp</option>
                                                    <option value="315" data-img-src="/assets/data/8/skins/img_skill/315.png">
                                                        Kil`Groth cảnh vệ biển</option>
                                                    <option value="316" data-img-src="/assets/data/8/skins/img_skill/316.png">
                                                        Kil`Groth quang vinh</option>
                                                    <option value="317" data-img-src="/assets/data/8/skins/img_skill/317.png">
                                                        Moren anh thợ điện</option>
                                                    <option value="318" data-img-src="/assets/data/8/skins/img_skill/318.png">
                                                        Moren lính cứu hỏa</option>
                                                    <option value="319" data-img-src="/assets/data/8/skins/img_skill/319.png">
                                                        TeeMee xiếc cung đình</option>
                                                    <option value="320" data-img-src="/assets/data/8/skins/img_skill/320.png">
                                                        TeeMee tay đua siêu tốc</option>
                                                    <option value="321" data-img-src="/assets/data/8/skins/img_skill/321.png">
                                                        TeeMee thần thoại hy lạp</option>
                                                    <option value="322" data-img-src="/assets/data/8/skins/img_skill/322.png">
                                                        Lindis thám tử tư</option>
                                                    <option value="323" data-img-src="/assets/data/8/skins/img_skill/323.png">
                                                        Lindis quang thánh tiễn</option>
                                                    <option value="324" data-img-src="/assets/data/8/skins/img_skill/324.png">
                                                        Lindis quang vinh</option>
                                                    <option value="325" data-img-src="/assets/data/8/skins/img_skill/325.png">
                                                        Lindis nữ vương pháo hoa</option>
                                                    <option value="326" data-img-src="/assets/data/8/skins/img_skill/326.png">
                                                        Lindis dạ tiệc</option>
                                                    <option value="327" data-img-src="/assets/data/8/skins/img_skill/327.png">
                                                        Lindis đồng phục shihakusho</option>
                                                    <option value="328" data-img-src="/assets/data/8/skins/img_skill/328.png">
                                                        Omen sĩ quan viễn chinh</option>
                                                    <option value="329" data-img-src="/assets/data/8/skins/img_skill/329.png">
                                                        Omen ám tử đao</option>
                                                    <option value="330" data-img-src="/assets/data/8/skins/img_skill/330.png">
                                                        Omen quỷ nguyệt tướng</option>
                                                    <option value="331" data-img-src="/assets/data/8/skins/img_skill/331.png">
                                                        Omen đao phủ tận thế</option>
                                                    <option value="332" data-img-src="/assets/data/8/skins/img_skill/332.png">
                                                        Omen chiến binh trăng khuyết</option>
                                                    <option value="333" data-img-src="/assets/data/8/skins/img_skill/333.png">
                                                        Omen thuyền trưởng hải tặc</option>
                                                    <option value="334" data-img-src="/assets/data/8/skins/img_skill/334.png">
                                                        Omen nhạc sĩ huyền thoại</option>
                                                    <option value="335" data-img-src="/assets/data/8/skins/img_skill/335.png">
                                                        Tulen nhà thám hiểm</option>
                                                    <option value="336" data-img-src="/assets/data/8/skins/img_skill/336.png">
                                                        Tulen tân thần thiên hà</option>
                                                    <option value="337" data-img-src="/assets/data/8/skins/img_skill/337.png">
                                                        Tulen phù thủy kiến tạo</option>
                                                    <option value="338" data-img-src="/assets/data/8/skins/img_skill/338.png">
                                                        Tulen đông êm đềm</option>
                                                    <option value="339" data-img-src="/assets/data/8/skins/img_skill/339.png">
                                                        Tulen phó kỷ luật</option>
                                                    <option value="340" data-img-src="/assets/data/8/skins/img_skill/340.png">
                                                        Tulen tân thần hoàng kim</option>
                                                    <option value="341" data-img-src="/assets/data/8/skins/img_skill/341.png">
                                                        Tulen chí tôn kiếm thiên</option>
                                                    <option value="342" data-img-src="/assets/data/8/skins/img_skill/342.png">
                                                        Tulen dạ hội</option>
                                                    <option value="343" data-img-src="/assets/data/8/skins/img_skill/343.png">
                                                        Tulen thần sứ stl-79</option>
                                                    <option value="344" data-img-src="/assets/data/8/skins/img_skill/344.png">
                                                        Tulen hỏa long thần tộc</option>
                                                    <option value="345" data-img-src="/assets/data/8/skins/img_skill/345.png">
                                                        Tulen tân niên vệ thần</option>
                                                    <option value="346" data-img-src="/assets/data/8/skins/img_skill/346.png">
                                                        Liliana hồ quý phi</option>
                                                    <option value="347" data-img-src="/assets/data/8/skins/img_skill/347.png">
                                                        Liliana thần tượng âm nhạc</option>
                                                    <option value="348" data-img-src="/assets/data/8/skins/img_skill/348.png">
                                                        Liliana nguyệt mị ly</option>
                                                    <option value="349" data-img-src="/assets/data/8/skins/img_skill/349.png">
                                                        Liliana tiểu thơ anh đào</option>
                                                    <option value="350" data-img-src="/assets/data/8/skins/img_skill/350.png">
                                                        Liliana tân nguyệt mị ly</option>
                                                    <option value="351" data-img-src="/assets/data/8/skins/img_skill/351.png">
                                                        Liliana nữ thần f1</option>
                                                    <option value="352" data-img-src="/assets/data/8/skins/img_skill/352.png">
                                                        Liliana thủy thủ hồ ly</option>
                                                    <option value="353" data-img-src="/assets/data/8/skins/img_skill/353.png">
                                                        Liliana wave</option>
                                                    <option value="354" data-img-src="/assets/data/8/skins/img_skill/354.png">
                                                        Max hiệp sĩ nhí</option>
                                                    <option value="355" data-img-src="/assets/data/8/skins/img_skill/355.png">
                                                        Max găng tay vàng</option>
                                                    <option value="356" data-img-src="/assets/data/8/skins/img_skill/356.png">
                                                        Max quang vinh</option>
                                                    <option value="357" data-img-src="/assets/data/8/skins/img_skill/357.png">
                                                        Max thần đồng sinh hóa</option>
                                                    <option value="358" data-img-src="/assets/data/8/skins/img_skill/358.png">
                                                        Max thần thoại hy lạp</option>
                                                    <option value="359" data-img-src="/assets/data/8/skins/img_skill/359.png">
                                                        The Flash tia chớp tương lai</option>
                                                    <option value="360" data-img-src="/assets/data/8/skins/img_skill/360.png">
                                                        Wisp hải tặc nhí</option>
                                                    <option value="361" data-img-src="/assets/data/8/skins/img_skill/361.png">
                                                        Wisp thỏ siêu quậy</option>
                                                    <option value="362" data-img-src="/assets/data/8/skins/img_skill/362.png">
                                                        Wisp ếch nhồi bông</option>
                                                    <option value="363" data-img-src="/assets/data/8/skins/img_skill/363.png">
                                                        Wisp máy phát quà</option>
                                                    <option value="364" data-img-src="/assets/data/8/skins/img_skill/364.png">
                                                        Arum thú vệ cổ mộ</option>
                                                    <option value="365" data-img-src="/assets/data/8/skins/img_skill/365.png">
                                                        Arum vũ khúc long hổ</option>
                                                    <option value="366" data-img-src="/assets/data/8/skins/img_skill/366.png">
                                                        Arum linh tượng vu nữ</option>
                                                    <option value="367" data-img-src="/assets/data/8/skins/img_skill/367.png">
                                                        Arum vũ khúc thần sứ</option>
                                                    <option value="368" data-img-src="/assets/data/8/skins/img_skill/368.png">
                                                        Arum thỏ may mắn</option>
                                                    <option value="369" data-img-src="/assets/data/8/skins/img_skill/369.png">
                                                        Arum nữ hoàng gấu xám</option>
                                                    <option value="370" data-img-src="/assets/data/8/skins/img_skill/370.png">
                                                        Arum quản lý tài năng</option>
                                                    <option value="371" data-img-src="/assets/data/8/skins/img_skill/371.png">
                                                        Rourke pháo thủ tuộc neo</option>
                                                    <option value="372" data-img-src="/assets/data/8/skins/img_skill/372.png">
                                                        Rourke biệt đội siêu hùng</option>
                                                    <option value="373" data-img-src="/assets/data/8/skins/img_skill/373.png">
                                                        Rourke cuồng tặc</option>
                                                    <option value="374" data-img-src="/assets/data/8/skins/img_skill/374.png">
                                                        Marja linh xà tư tế</option>
                                                    <option value="375" data-img-src="/assets/data/8/skins/img_skill/375.png">
                                                        Marja hỏa ngọc nữ vương</option>
                                                    <option value="376" data-img-src="/assets/data/8/skins/img_skill/376.png">
                                                        Roxie thám tử tập sự</option>
                                                    <option value="377" data-img-src="/assets/data/8/skins/img_skill/377.png">
                                                        Roxie kèn ái tình</option>
                                                    <option value="378" data-img-src="/assets/data/8/skins/img_skill/378.png">
                                                        Roxie hầu gái</option>
                                                    <option value="379" data-img-src="/assets/data/8/skins/img_skill/379.png">
                                                        Roxie tiệc bánh kẹo</option>
                                                    <option value="380" data-img-src="/assets/data/8/skins/img_skill/380.png">
                                                        Baldum chú thợ ống nước</option>
                                                    <option value="381" data-img-src="/assets/data/8/skins/img_skill/381.png">
                                                        Baldum liệt hỏa dung nham</option>
                                                    <option value="382" data-img-src="/assets/data/8/skins/img_skill/382.png">
                                                        Baldum thần thoại hy lạp</option>
                                                    <option value="383" data-img-src="/assets/data/8/skins/img_skill/383.png">
                                                        Baldum thế giới kẹo ngọt</option>
                                                    <option value="384" data-img-src="/assets/data/8/skins/img_skill/384.png">
                                                        Annette nữ quản ga</option>
                                                    <option value="385" data-img-src="/assets/data/8/skins/img_skill/385.png">
                                                        Annette xứ sở thần tiên</option>
                                                    <option value="386" data-img-src="/assets/data/8/skins/img_skill/386.png">
                                                        Annette thần tượng âm nhạc</option>
                                                    <option value="387" data-img-src="/assets/data/8/skins/img_skill/387.png">
                                                        Annette tiệc bãi biển</option>
                                                    <option value="388" data-img-src="/assets/data/8/skins/img_skill/388.png">
                                                        Annette vân mộng tiên tử</option>
                                                    <option value="389" data-img-src="/assets/data/8/skins/img_skill/389.png">
                                                        Annette nữ sinh trung học</option>
                                                    <option value="390" data-img-src="/assets/data/8/skins/img_skill/390.png">
                                                        Amily đặc ảnh nypd</option>
                                                    <option value="391" data-img-src="/assets/data/8/skins/img_skill/391.png">
                                                        Amily đặc công nhện đỏ</option>
                                                    <option value="392" data-img-src="/assets/data/8/skins/img_skill/392.png">
                                                        Amily thư ký</option>
                                                    <option value="393" data-img-src="/assets/data/8/skins/img_skill/393.png">
                                                        Amily thỏ may mắn</option>
                                                    <option value="394" data-img-src="/assets/data/8/skins/img_skill/394.png">
                                                        Amily võ thần thiên hà</option>
                                                    <option value="395" data-img-src="/assets/data/8/skins/img_skill/395.png">
                                                        Amily amily quang vinh</option>
                                                    <option value="396" data-img-src="/assets/data/8/skins/img_skill/396.png">
                                                        Y`bneth hạt trưởng kiểm lâm</option>
                                                    <option value="397" data-img-src="/assets/data/8/skins/img_skill/397.png">
                                                        Y`bneth chiến binh lục bảo</option>
                                                    <option value="398" data-img-src="/assets/data/8/skins/img_skill/398.png">
                                                        Elsu cảnh vệ thảo nguyên</option>
                                                    <option value="399" data-img-src="/assets/data/8/skins/img_skill/399.png">
                                                        Elsu mafia</option>
                                                    <option value="400" data-img-src="/assets/data/8/skins/img_skill/400.png">
                                                        Elsu guitar tình ái</option>
                                                    <option value="401" data-img-src="/assets/data/8/skins/img_skill/401.png">
                                                        Elsu chiến binh bóng tối</option>
                                                    <option value="402" data-img-src="/assets/data/8/skins/img_skill/402.png">
                                                        Elsu sứ giả tận thế</option>
                                                    <option value="403" data-img-src="/assets/data/8/skins/img_skill/403.png">
                                                        Elsu tuyết ưng</option>
                                                    <option value="404" data-img-src="/assets/data/8/skins/img_skill/404.png">
                                                        Richter bá tước</option>
                                                    <option value="405" data-img-src="/assets/data/8/skins/img_skill/405.png">
                                                        Richter thống soái kháng chiến</option>
                                                    <option value="406" data-img-src="/assets/data/8/skins/img_skill/406.png">
                                                        Richter dạ hội</option>
                                                    <option value="407" data-img-src="/assets/data/8/skins/img_skill/407.png">
                                                        Richter thần kiếm susanoo</option>
                                                    <option value="408" data-img-src="/assets/data/8/skins/img_skill/408.png">
                                                        Quillen trưởng ngoại khoa</option>
                                                    <option value="409" data-img-src="/assets/data/8/skins/img_skill/409.png">
                                                        Quillen đặc công mãng xà</option>
                                                    <option value="410" data-img-src="/assets/data/8/skins/img_skill/410.png">
                                                        Quillen thống soái đế chế</option>
                                                    <option value="411" data-img-src="/assets/data/8/skins/img_skill/411.png">
                                                        Quillen huyết thủ nguyệt tộc</option>
                                                    <option value="412" data-img-src="/assets/data/8/skins/img_skill/412.png">
                                                        Quillen sao đỏ học đường</option>
                                                    <option value="413" data-img-src="/assets/data/8/skins/img_skill/413.png">
                                                        Quillen tà linh ma đao</option>
                                                    <option value="414" data-img-src="/assets/data/8/skins/img_skill/414.png">
                                                        Quillen hoàng kim soái vương</option>
                                                    <option value="415" data-img-src="/assets/data/8/skins/img_skill/415.png">
                                                        Quillen nghịch thiên long đế</option>
                                                    <option value="416" data-img-src="/assets/data/8/skins/img_skill/416.png">
                                                        Sephera quý tiểu thư</option>
                                                    <option value="417" data-img-src="/assets/data/8/skins/img_skill/417.png">
                                                        Sephera chiêm tinh gia</option>
                                                    <option value="418" data-img-src="/assets/data/8/skins/img_skill/418.png">
                                                        Sephera thần tượng âm nhạc</option>
                                                    <option value="419" data-img-src="/assets/data/8/skins/img_skill/419.png">
                                                        Sephera phi vụ thế kỷ</option>
                                                    <option value="420" data-img-src="/assets/data/8/skins/img_skill/420.png">
                                                        Sephera thần thoại hy lạp</option>
                                                    <option value="421" data-img-src="/assets/data/8/skins/img_skill/421.png">
                                                        Florentino vũ kiếm sư</option>
                                                    <option value="422" data-img-src="/assets/data/8/skins/img_skill/422.png">
                                                        Florentino giám sát tinh hệ</option>
                                                    <option value="423" data-img-src="/assets/data/8/skins/img_skill/423.png">
                                                        Florentino kiếm sĩ olympic</option>
                                                    <option value="424" data-img-src="/assets/data/8/skins/img_skill/424.png">
                                                        Florentino thần thoại hy lạp</option>
                                                    <option value="425" data-img-src="/assets/data/8/skins/img_skill/425.png">
                                                        Florentino seven</option>
                                                    <option value="426" data-img-src="/assets/data/8/skins/img_skill/426.png">
                                                        Florentino tà long kiếm sĩ</option>
                                                    <option value="427" data-img-src="/assets/data/8/skins/img_skill/427.png">
                                                        Veres đạo tặc</option>
                                                    <option value="428" data-img-src="/assets/data/8/skins/img_skill/428.png">
                                                        Veres gián điệp tinh hệ</option>
                                                    <option value="429" data-img-src="/assets/data/8/skins/img_skill/429.png">
                                                        Veres thần thoại hy lạp</option>
                                                    <option value="430" data-img-src="/assets/data/8/skins/img_skill/430.png">
                                                        Veres chị đại học đường</option>
                                                    <option value="431" data-img-src="/assets/data/8/skins/img_skill/431.png">
                                                        Veres thủy thần kiều diễm</option>
                                                    <option value="432" data-img-src="/assets/data/8/skins/img_skill/432.png">
                                                        D`arcy nam tước</option>
                                                    <option value="433" data-img-src="/assets/data/8/skins/img_skill/433.png">
                                                        D`arcy đô đốc tinh hệ</option>
                                                    <option value="434" data-img-src="/assets/data/8/skins/img_skill/434.png">
                                                        D`arcy pháp sư hỏa long</option>
                                                    <option value="435" data-img-src="/assets/data/8/skins/img_skill/435.png">
                                                        Hayate bạch ảnh</option>
                                                    <option value="436" data-img-src="/assets/data/8/skins/img_skill/436.png">
                                                        Hayate chiến binh trăng khuyết</option>
                                                    <option value="437" data-img-src="/assets/data/8/skins/img_skill/437.png">
                                                        Hayate ngân lang</option>
                                                    <option value="438" data-img-src="/assets/data/8/skins/img_skill/438.png">
                                                        Hayate tử thần vũ trụ</option>
                                                    <option value="439" data-img-src="/assets/data/8/skins/img_skill/439.png">
                                                        Hayate quỷ diện</option>
                                                    <option value="440" data-img-src="/assets/data/8/skins/img_skill/440.png">
                                                        Hayate kim ưng sát thủ</option>
                                                    <option value="441" data-img-src="/assets/data/8/skins/img_skill/441.png">
                                                        Hayate bạch vô thường</option>
                                                    <option value="442" data-img-src="/assets/data/8/skins/img_skill/442.png">
                                                        Capheny hầu gái</option>
                                                    <option value="443" data-img-src="/assets/data/8/skins/img_skill/443.png">
                                                        Capheny thần tượng âm nhạc</option>
                                                    <option value="444" data-img-src="/assets/data/8/skins/img_skill/444.png">
                                                        Capheny toán hóa sinh</option>
                                                    <option value="445" data-img-src="/assets/data/8/skins/img_skill/445.png">
                                                        Capheny kimono</option>
                                                    <option value="446" data-img-src="/assets/data/8/skins/img_skill/446.png">
                                                        Capheny siêu cấp tin tặc</option>
                                                    <option value="447" data-img-src="/assets/data/8/skins/img_skill/447.png">
                                                        Capheny harley quinn</option>
                                                    <option value="448" data-img-src="/assets/data/8/skins/img_skill/448.png">
                                                        Errol vượt ngục</option>
                                                    <option value="449" data-img-src="/assets/data/8/skins/img_skill/449.png">
                                                        Errol diệt nguyệt tiên phong</option>
                                                    <option value="450" data-img-src="/assets/data/8/skins/img_skill/450.png">
                                                        Errol genos</option>
                                                    <option value="451" data-img-src="/assets/data/8/skins/img_skill/451.png">
                                                        Yena khuyên bạc</option>
                                                    <option value="452" data-img-src="/assets/data/8/skins/img_skill/452.png">
                                                        Yena thỏ may mắn</option>
                                                    <option value="453" data-img-src="/assets/data/8/skins/img_skill/453.png">
                                                        Yena chiến binh nguyệt tộc</option>
                                                    <option value="454" data-img-src="/assets/data/8/skins/img_skill/454.png">
                                                        Yena hoạt náo viên</option>
                                                    <option value="455" data-img-src="/assets/data/8/skins/img_skill/455.png">
                                                        Yena nữ hoàng thể thao</option>
                                                    <option value="456" data-img-src="/assets/data/8/skins/img_skill/456.png">
                                                        Yena dạ nguyệt thánh nữ</option>
                                                    <option value="457" data-img-src="/assets/data/8/skins/img_skill/457.png">
                                                        Yena giảng viên tình ái</option>
                                                    <option value="458" data-img-src="/assets/data/8/skins/img_skill/458.png">
                                                        Yena wave</option>
                                                    <option value="459" data-img-src="/assets/data/8/skins/img_skill/459.png">
                                                        Enzo phẩm chất quý tộc</option>
                                                    <option value="460" data-img-src="/assets/data/8/skins/img_skill/460.png">
                                                        Enzo chiến binh trăng khuyết</option>
                                                    <option value="461" data-img-src="/assets/data/8/skins/img_skill/461.png">
                                                        Enzo thần thoại hy lạp</option>
                                                    <option value="462" data-img-src="/assets/data/8/skins/img_skill/462.png">
                                                        Enzo hồng hạc thị vệ</option>
                                                    <option value="463" data-img-src="/assets/data/8/skins/img_skill/463.png">
                                                        Zip gà siêu quậy</option>
                                                    <option value="464" data-img-src="/assets/data/8/skins/img_skill/464.png">
                                                        Zip tiểu đệ hổ báo</option>
                                                    <option value="465" data-img-src="/assets/data/8/skins/img_skill/465.png">
                                                        Qi tiểu long</option>
                                                    <option value="466" data-img-src="/assets/data/8/skins/img_skill/466.png">
                                                        Qi đặc vụ cáo tuyết</option>
                                                    <option value="467" data-img-src="/assets/data/8/skins/img_skill/467.png">
                                                        Qi quán quân</option>
                                                    <option value="468" data-img-src="/assets/data/8/skins/img_skill/468.png">
                                                        Qi thiếu nữ pháo hoa</option>
                                                    <option value="469" data-img-src="/assets/data/8/skins/img_skill/469.png">
                                                        Celica nữ cao bồi</option>
                                                    <option value="470" data-img-src="/assets/data/8/skins/img_skill/470.png">
                                                        Volkath dạ huyết tộc</option>
                                                    <option value="471" data-img-src="/assets/data/8/skins/img_skill/471.png">
                                                        Volkath ma kỵ tử sĩ</option>
                                                    <option value="472" data-img-src="/assets/data/8/skins/img_skill/472.png">
                                                        Volkath xung thiên thần tướng</option>
                                                    <option value="473" data-img-src="/assets/data/8/skins/img_skill/473.png">
                                                        Volkath tư lệnh viễn chinh</option>
                                                    <option value="474" data-img-src="/assets/data/8/skins/img_skill/474.png">
                                                        Krizzix cún siêu quậy</option>
                                                    <option value="475" data-img-src="/assets/data/8/skins/img_skill/475.png">
                                                        Krizzix đội đặc nhiệm</option>
                                                    <option value="476" data-img-src="/assets/data/8/skins/img_skill/476.png">
                                                        Eland`orr soái tặc</option>
                                                    <option value="477" data-img-src="/assets/data/8/skins/img_skill/477.png">
                                                        Eland`orr pphi vụ thế kỷ</option>
                                                    <option value="478" data-img-src="/assets/data/8/skins/img_skill/478.png">
                                                        Eland`orr học viện carano</option>
                                                    <option value="479" data-img-src="/assets/data/8/skins/img_skill/479.png">
                                                        Eland`orr siêu thám tử</option>
                                                    <option value="480" data-img-src="/assets/data/8/skins/img_skill/480.png">
                                                        Ishar giấc mơ ngọt ngào</option>
                                                    <option value="481" data-img-src="/assets/data/8/skins/img_skill/481.png">
                                                        Ishar tiểu thư kẹo ngọt</option>
                                                    <option value="482" data-img-src="/assets/data/8/skins/img_skill/482.png">
                                                        Ishar tiểu thư gấu trúc</option>
                                                    <option value="483" data-img-src="/assets/data/8/skins/img_skill/483.png">
                                                        Ishar lễ hội ma quái</option>
                                                    <option value="484" data-img-src="/assets/data/8/skins/img_skill/484.png">
                                                        Dirak cảnh vệ bầu trời</option>
                                                    <option value="485" data-img-src="/assets/data/8/skins/img_skill/485.png">
                                                        Dirak pháp sư trăng khuyết</option>
                                                    <option value="486" data-img-src="/assets/data/8/skins/img_skill/486.png">
                                                        Dirak quý tộc norman</option>
                                                    <option value="487" data-img-src="/assets/data/8/skins/img_skill/487.png">
                                                        Dirak ông bầu showbiz</option>
                                                    <option value="488" data-img-src="/assets/data/8/skins/img_skill/488.png">
                                                        Keera y tá lạ</option>
                                                    <option value="489" data-img-src="/assets/data/8/skins/img_skill/489.png">
                                                        Keera học viện karano</option>
                                                    <option value="490" data-img-src="/assets/data/8/skins/img_skill/490.png">
                                                        Keera sát thủ bí ngô</option>
                                                    <option value="491" data-img-src="/assets/data/8/skins/img_skill/491.png">
                                                        Keera thủy thủ</option>
                                                    <option value="492" data-img-src="/assets/data/8/skins/img_skill/492.png">
                                                        Keera tiệc bãi biển</option>
                                                    <option value="493" data-img-src="/assets/data/8/skins/img_skill/493.png">
                                                        Ata tân thủy thủ</option>
                                                    <option value="494" data-img-src="/assets/data/8/skins/img_skill/494.png">
                                                        Ata cao bồi</option>
                                                    <option value="495" data-img-src="/assets/data/8/skins/img_skill/495.png">
                                                        Ata quang vinh</option>
                                                    <option value="496" data-img-src="/assets/data/8/skins/img_skill/496.png">
                                                        Paine khúc nhạc tử vong</option>
                                                    <option value="497" data-img-src="/assets/data/8/skins/img_skill/497.png">
                                                        Paine phi vụ thế kỷ</option>
                                                    <option value="498" data-img-src="/assets/data/8/skins/img_skill/498.png">
                                                        Paine công tước máu</option>
                                                    <option value="499" data-img-src="/assets/data/8/skins/img_skill/499.png">
                                                        Laville tay đua đường phố</option>
                                                    <option value="500" data-img-src="/assets/data/8/skins/img_skill/500.png">
                                                        Laville tay súng diệt thần</option>
                                                    <option value="501" data-img-src="/assets/data/8/skins/img_skill/501.png">
                                                        Laville tay súng vô địch</option>
                                                    <option value="502" data-img-src="/assets/data/8/skins/img_skill/502.png">
                                                        Laville xạ thần tinh vệ</option>
                                                    <option value="503" data-img-src="/assets/data/8/skins/img_skill/503.png">
                                                        Laville kim quy thần vương</option>
                                                    <option value="504" data-img-src="/assets/data/8/skins/img_skill/504.png">
                                                        Rouie sứ giả vũ trụ</option>
                                                    <option value="505" data-img-src="/assets/data/8/skins/img_skill/505.png">
                                                        Rouie tuần lộc đáng yêu</option>
                                                    <option value="506" data-img-src="/assets/data/8/skins/img_skill/506.png">
                                                        Zata tư lệnh viễn chinh</option>
                                                    <option value="507" data-img-src="/assets/data/8/skins/img_skill/507.png">
                                                        Zata sứ giả tinh hệ</option>
                                                    <option value="508" data-img-src="/assets/data/8/skins/img_skill/508.png">
                                                        Zata thần mặt trời</option>
                                                    <option value="509" data-img-src="/assets/data/8/skins/img_skill/509.png">
                                                        Allain hắc kiếm sĩ kirito</option>
                                                    <option value="510" data-img-src="/assets/data/8/skins/img_skill/510.png">
                                                        Allain kirito</option>
                                                    <option value="511" data-img-src="/assets/data/8/skins/img_skill/511.png">
                                                        Allain thần mặt trời</option>
                                                    <option value="512" data-img-src="/assets/data/8/skins/img_skill/512.png">
                                                        Thorne cận vệ hoàng gia</option>
                                                    <option value="513" data-img-src="/assets/data/8/skins/img_skill/513.png">
                                                        Thorne giả kim thuật sư</option>
                                                    <option value="514" data-img-src="/assets/data/8/skins/img_skill/514.png">
                                                        Sinestrea giấc mơ trưa</option>
                                                    <option value="515" data-img-src="/assets/data/8/skins/img_skill/515.png">
                                                        Sinestrea tiểu thư băng giá</option>
                                                    <option value="516" data-img-src="/assets/data/8/skins/img_skill/516.png">
                                                        Sinestrea wave</option>
                                                    <option value="517" data-img-src="/assets/data/8/skins/img_skill/517.png">
                                                        Dextra chiến binh quyến rũ</option>
                                                    <option value="518" data-img-src="/assets/data/8/skins/img_skill/518.png">
                                                        Dextra quận chúa tuyết</option>
                                                    <option value="519" data-img-src="/assets/data/8/skins/img_skill/519.png">
                                                        Dextra quý cô tuổi dần</option>
                                                    <option value="520" data-img-src="/assets/data/8/skins/img_skill/520.png">
                                                        Lorion chiến giáp hắc ám</option>
                                                    <option value="521" data-img-src="/assets/data/8/skins/img_skill/521.png">
                                                        Bright soái ca thánh điện</option>
                                                    <option value="522" data-img-src="/assets/data/8/skins/img_skill/522.png">
                                                        Bright khiêu chiến</option>
                                                    <option value="523" data-img-src="/assets/data/8/skins/img_skill/523.png">
                                                        Bright toshiro hitsugaya</option>
                                                    <option value="524" data-img-src="/assets/data/8/skins/img_skill/524.png">
                                                        AOI sát thủ đô thị</option>
                                                    <option value="525" data-img-src="/assets/data/8/skins/img_skill/525.png">
                                                        AOI hoàng kim công chúa</option>
                                                    <option value="526" data-img-src="/assets/data/8/skins/img_skill/526.png">
                                                        IGGY tiểu hoàng đế</option>
                                                    <option value="527" data-img-src="/assets/data/8/skins/img_skill/527.png">
                                                        tachi lãng khách</option>
                                                    <option value="528" data-img-src="/assets/data/8/skins/img_skill/528.png">
                                                        aya hoạt náo viên</option>
                                                    <option value="529" data-img-src="/assets/data/8/skins/img_skill/529.png">
                                                        YUE tiểu công chúa
                                                    </option>








                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-success" type="submit" id="submitlq">Đăng bán</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <script>
                            $("form#lq").submit(function() {

                                var formData2 = new FormData($(this)[0]);

                                $("#submitlq").prop('disabled', true);
                                $.ajax({
                                    url: '/assets/ajax/post-lq.php',
                                    type: 'POST',
                                    data: formData2,
                                    async: false,
                                    dataType: 'json',
                                    success: function(data) {
                                        swal(data.title, data.msg, data.status);
                                        setTimeout(function() {
                                            window.location.href = "/admin/templates/addlq.php";
                                        }, 3000);
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false
                                });


                                return false;
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="page-footer">
                <div class="page-footer-inner">2017 &copy; An Thiên</div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
        <script src="/admin/assets/js/js.cookie.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <script src="/admin/assets/js/magnific.js" type="text/javascript"></script>
        <script src="/admin/assets/js/bootstrap-table.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/bootstrap-table-export.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/table_export.js" type="text/javascript"></script>

        <script src="/admin/assets/js/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="/admin/assets/js/select2.full.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/jquery.bootstrap-growl.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/autosize.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>


        <script src="/admin/assets/js/app.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/components-select2.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/table-bootstrap.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/layout.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/demo.min.js" type="text/javascript"></script>
        <script src="/admin/assets/js/quick-nav.min.js" type="text/javascript"></script>

        <script>
            (function($) {
                $.fn.currencyInput = function() {
                    this.each(function() {
                        var wrapper = $("<div class='currency-input' />");
                        $(this).wrap(wrapper);
                        $(this).before("");
                        $(this).val(parseFloat($(this).val()).toLocaleString(undefined, {
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 2
                        }));

                        $(this).change(function() {
                            var min = parseFloat($(this).attr("min"));
                            var max = parseFloat($(this).attr("max"));

                            var value = parseFloat($(this).val().replace(/,/g, ''));
                            if (value < min)
                                value = min;
                            else if (value > max)
                                value = max;
                            $(this).val(value.toLocaleString(undefined, {
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 2
                            }));
                        });
                    });
                };
            })(jQuery);

            $(document).ready(function() {
                $('input.currency').currencyInput();
            });

            $(document).ready(function() {
                $('#clickmewow').click(function() {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
            $(document).ready(function() {
                $('.gallery').each(function() { // the containers for all your galleries
                    $(this).magnificPopup({
                        delegate: 'a', // the selector for gallery item
                        type: 'image',
                        gallery: {
                            enabled: true
                        },
                        zoom: {
                            enabled: true,
                            duration: 30000, // don't foget to change the duration also in CSS
                            opener: function(element) {
                                return element.find('img');
                            }
                        }
                    });
                });
            })

            $(document).ready(function() {
                $('.zoom-gallery').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    closeOnContentClick: false,
                    closeBtnInside: false,
                    mainClass: 'mfp-with-zoom mfp-img-mobile',
                    image: {
                        //verticalFit: true,
                        //                titleSrc: function (item) {
                        //                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
                        //                }
                    },
                    gallery: {
                        enabled: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 30000, // don't foget to change the duration also in CSS
                        opener: function(element) {
                            return element.find('img');
                        }
                    }

                });
            });
            $(document).ready(function() {

                $('.ajax-scroll').magnificPopup({
                    type: 'ajax',
                    alignTop: true,
                    overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
                });

                $('.ajax2').magnificPopup({
                    type: 'ajax'
                });

            });
            $(document).ready(function() {
                //magnific popup
                $(document).on('mouseover', '.tooltips', function() {
                    $(this).tooltip();
                });
                $(document).on('click', '.ajax', function() {

                    $(this).magnificPopup({
                        type: 'ajax',
                        focus: '#focus-blur-loop-select',
                    }).magnificPopup('open');
                    return false;
                });
            });
        </script>
        <script>
            function load(url, id, post) {
                $.getJSON(
                    url,
                    function(data) {
                        if (data) {
                            var type = data.type;
                            var message = data.message;
                            if (message != '') {
                                $.bootstrapGrowl(message, {
                                    type: type
                                });
                            }
                            if (data.reload) {
                                location.reload();
                            }
                        }
                        return data;
                    }
                );
            }
        </script>
        <script src="/admin/assets/js/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {

                //        $(".time-picker").datetimepicker({format: "DD/MM/YYYY HH:mm:ss", useCurrent: false});
                $('#timebegin').datetimepicker({
                    locale: 'vi',
                    dayViewHeaderFormat: "dd/mm/yyyy",
                    format: "dd/mm/yyyy hh:ii:ss",
                    useCurrent: false
                });
                $('#timeend').datetimepicker({
                    locale: 'vi',
                    dayViewHeaderFormat: "dd/mm/yyyy",
                    format: "dd/mm/yyyy hh:ii:ss",
                    useCurrent: false
                });

            });
        </script>
        <script>
            function show(input, id) {
                var e = document.getElementById(id);
                var f = input;
                if (e.style.display === 'block') {
                    if (id != 'help') {
                        f.innerHTML = '+';
                    }
                    e.style.display = 'none';
                } else {
                    if (id != 'help') {
                        f.innerHTML = '-&nbsp;';
                    }
                    e.style.display = 'block';
                }
            }
        </script>
        <link rel="stylesheet" type="text/css" href="https://rvera.github.io/image-picker/image-picker/image-picker.css">
        <script src="https://rvera.github.io/image-picker/image-picker/image-picker.js" type="text/javascript"></script>

        <script>
            jQuery(".selectiamges").imagepicker({
                hide_select: false,
                show_label: true,
            });

            //            $("input").change(function () {
            //                alert("The text has been changed.");
            //            });
            //
            //
            //            var count = $('#foo option:selected').length;
            //
            //            $("#test3").val("Dolly Duck");
        </script>


    </body>

    </html>
<?php
} else {
    new Redirect($_DOMAIN); // Trở về trang index
} ?>