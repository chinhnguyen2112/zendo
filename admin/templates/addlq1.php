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
<link href="/admin/assets/css/simple-line-icons.min.css" rel="stylesheet" typ   e="text/css" />
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
    .groupBy td, .rowdate {
        padding-bottom: 2px!important;
        padding-top: 2px!important;
        background: #F7F7F7!important;
        font-weight: 700;
    }
    body{
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
                <img src="" alt="logo" class="logo-default" style="height: 14px"/> </a>
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
    
    function count_champ(input)
    {
        var options = input.options;
        var count = 0;
        for (var i = 0; i < options.length; i++) {
            if (options[i].selected){
                count++;
            }
        }

        document.getElementById('champs_count').value = count;
    }
    
    function count_skin(input)
    {
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
        <form id="lq" action="" method="POST"  enctype="multipart/form-data">

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
                <hr/>
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
                            for ($i = 0; $i < 29; $i++){
                                echo '<option value="'.$i.'">'.$select->get_string_rank($i).'</option>';
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
                    ul.thumbnails.image_picker_selector{
                        margin-top: 20px!important;
                    }
                    ul.thumbnails.image_picker_selector li .thumbnail {
                        padding: 4px!important;
                    }
                    ul.thumbnails.image_picker_selector li .thumbnail p{
                        padding-top: 5px;
                        margin-bottom: 0px;
                        font-weight: 700;
                        text-align: center;
                    }
                    .thumbnail {
                        margin-bottom: 0px;
                    }
                    ul.thumbnails.image_picker_selector li .thumbnail.selected {
                        background: #F50057!important;
                        color:#fff!important;
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
                         <option value="35" data-img-src="/assets/data/8/champ/35.jpg"  >Toro</option>
                         <option value="15" data-img-src="/assets/data/8/champ/15.jpg"  >Krixi</option>
                         <option value="41" data-img-src="/assets/data/8/champ/41.jpg"  >Zephys</option>
                         <option value="9" data-img-src="/assets/data/8/champ/9.jpg"  >Gildur</option>
                                 <option value="38" data-img-src="/assets/data/8/champ/38.jpg"  >Veera</option>
                         <option value="13" data-img-src="/assets/data/8/champ/13.jpg"  >Kahlii</option>
                             <option value="39" data-img-src="/assets/data/8/champ/39.jpg"  >Violet</option>
                             <option value="40" data-img-src="/assets/data/8/champ/40.jpg"  >Yorn</option>
                              <option value="5" data-img-src="/assets/data/8/champ/5.jpg"  >Chaugnar</option>
                               <option value="26" data-img-src="/assets/data/8/champ/26.jpg"  >Omega</option>
                                <option value="12" data-img-src="/assets/data/8/champ/12.jpg"  >Jinna</option>
                                  <option value="4" data-img-src="/assets/data/8/champ/4.jpg"  >Butterfly</option>
                                       <option value="27" data-img-src="/assets/data/8/champ/27.jpg"  >Ormarr</option>
                          <option value="2" data-img-src="/assets/data/8/champ/2.jpg"  >Alice</option>
                            <option value="20" data-img-src="/assets/data/8/champ/20.jpg"  >Mganga</option> 
                                  <option value="21" data-img-src="/assets/data/8/champ/21.jpg"  >Mina</option>
                                        <option value="19" data-img-src="/assets/data/8/champ/19.jpg"  >Maloch</option>
                             <option value="45" data-img-src="/assets/data/8/champ/45.jpg"  >Ignis</option>
                        <option value="3" data-img-src="/assets/data/8/champ/3.jpg"  >Azzen'Ka</option>
                        <option value="17" data-img-src="/assets/data/8/champ/17.jpg"  >Lữ Bố</option>
                              <option value="36" data-img-src="/assets/data/8/champ/36.jpg" selected >Triệu Vân</option>
                        <option value="43" data-img-src="/assets/data/8/champ/43.jpg"  >airi</option>
                           <option value="37" data-img-src="/assets/data/8/champ/37.jpg"  selected>Valhein</option>
                         <option value="31" data-img-src="/assets/data/8/champ/31.jpg"  >Skud</option>
                         <option value="34" data-img-src="/assets/data/8/champ/34.jpg"  >Thane</option>
                          <option value="11" data-img-src="/assets/data/8/champ/11.jpg"  >Ilumia</option> 
                      <option value="56" data-img-src="/assets/data/8/champ/56.jpg"  >Kil'Groth</option> 
                        <option value="16" data-img-src="/assets/data/8/champ/16.jpg"  >Lauriel</option>
                          <option value="33" data-img-src="/assets/data/8/champ/33.jpg"  >Taara</option>
                          <option value="47" data-img-src="/assets/data/8/champ/47.jpg"  >ZILL</option>
                        <option value="29" data-img-src="/assets/data/8/champ/29.jpg"  >Preyta</option>
                                  <option value="55" data-img-src="/assets/data/8/champ/55.jpg"  >Xeniel</option>
                        <option value="23" data-img-src="/assets/data/8/champ/23.jpg"  >Nakroth</option>
                               <option value="7" data-img-src="/assets/data/8/champ/7.jpg"  >Điêu Thuyền</option>
                        <option value="1" data-img-src="/assets/data/8/champ/1.jpg"  >Aleister</option>
                          <option value="14" data-img-src="/assets/data/8/champ/14.jpg"  >Kriknak</option>
                         <option value="50" data-img-src="/assets/data/8/champ/50.jpg"  >Ryoma</option>
                             <option value="22" data-img-src="/assets/data/8/champ/22.jpg"  >Arthur</option>
                                <option value="25" data-img-src="/assets/data/8/champ/25.jpg"  >Ngộ Không</option>
                                     <option value="32" data-img-src="/assets/data/8/champ/32.jpg"  >Slimz</option>
                                      <option value="57" data-img-src="/assets/data/8/champ/57.jpg"  >Moren</option> 
                                     <option value="6" data-img-src="/assets/data/8/champ/6.jpg"  >Cresht</option>
                                 <option value="10" data-img-src="/assets/data/8/champ/10.jpg"  >Grakk</option> 
                                  <option value="59" data-img-src="/assets/data/8/champ/59.jpg"  >Lindis</option>
                          <option value="42" data-img-src="/assets/data/8/champ/42.jpg"  >batman</option>
                      <option value="49" data-img-src="/assets/data/8/champ/49.jpg"  >Joker</option>
                           <option value="53" data-img-src="/assets/data/8/champ/53.jpg"  >Superman</option> 
                        <option value="8" data-img-src="/assets/data/8/champ/8.jpg"  >Fennik</option>
                   <option value="46" data-img-src="/assets/data/8/champ/46.jpg"  >MURAD</option>
                    <option value="18" data-img-src="/assets/data/8/champ/18.jpg"  >Lumburr</option>
                      <option value="24" data-img-src="/assets/data/8/champ/24.jpg"  >Natalya</option>
                       <option value="48" data-img-src="/assets/data/8/champ/48.jpg"  >Arduin</option> 
                      <option value="30" data-img-src="/assets/data/8/champ/30.jpg"  >Raz</option>      
                       <option value="63" data-img-src="/assets/data/8/champ/63.jpg"  >Max</option>
                        <option value="28" data-img-src="/assets/data/8/champ/28.jpg"  >Payna</option>
                         <option value="58" data-img-src="/assets/data/8/champ/58.jpg"  >TeeMee</option>
                          <option value="66" data-img-src="/assets/data/8/champ/66.jpg"  >Arum</option>
                         <option value="61" data-img-src="/assets/data/8/champ/61.jpg"  >Tulen</option>
                         <option value="52" data-img-src="/assets/data/8/champ/52.jpg"  >Tel'Annas</option> 
                        <option value="51" data-img-src="/assets/data/8/champ/51.jpg"  >Astrid</option>
                       <option value="44" data-img-src="/assets/data/8/champ/44.jpg"  >zuka</option>
                        <option value="54" data-img-src="/assets/data/8/champ/54.jpg"  >Wonder Woman</option>
                             
                        
                        
                         <option value="60" data-img-src="/assets/data/8/champ/60.jpg"  >Omen</option>
                         
                         <option value="64" data-img-src="/assets/data/8/champ/64.jpg"  >The Flash</option>
                           <option value="62" data-img-src="/assets/data/8/champ/62.jpg"  >Liliana</option>
                            <option value="65" data-img-src="/assets/data/8/champ/65.jpg"  >Wisp</option>
                            <option value="67" data-img-src="/assets/data/8/champ/67.jpg"  >Rourke</option>
                         <option value="68" data-img-src="/assets/data/8/champ/68.jpg"  >Marja</option>
              
                        
                    </select>
                </div>
            </div>
             <div class="col-xs-12">
                <div class="form-group">
                    <label>Danh Sách Tướng</label>
                    <textarea class="form-control" id="champ" name="champ" rows="4" placeholder="Enter để xuống dòng" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"></textarea>
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
                              <option value="37" data-img-src="/assets/data/8/skins/xs/37.jpg" selected>Hoàng Tử Quạ</option> 
                           <option value="67" data-img-src="/assets/data/8/skins/xs/67.jpg" >Quang vinh (Triệu Vân)</option>
                            <option value="33" data-img-src="/assets/data/8/skins/xs/33.jpg" >Quang Vinh (Thane)</option>
                            
                                <option value="3" data-img-src="/assets/data/8/skins/xs/3.jpg" >Thủy thủ</option>
                        <option value="4" data-img-src="/assets/data/8/skins/xs/4.jpg" >Ác mộng sinh hóa</option>
                           <option value="5" data-img-src="/assets/data/8/skins/xs/5.jpg" >Thợ sửa đứt cáp</option>
                           
                                <option value="7" data-img-src="/assets/data/8/skins/xs/7.jpg" >Nhà thám hiểm</option>
                        <option value="8" data-img-src="/assets/data/8/skins/xs/8.jpg" >Phượt thủ</option>
                         <option value="20" data-img-src="/assets/data/8/skins/xs/20.jpg" >Hề cung đình</option>
                        <option value="21" data-img-src="/assets/data/8/skins/xs/21.jpg" >Tiểu thư đoạt hồn</option>
                        <option value="22" data-img-src="/assets/data/8/skins/xs/22.jpg" >Quân đoàn địa ngục</option>
                        <option value="34" data-img-src="/assets/data/8/skins/xs/34.jpg" >Đặc cảnh NYPD</option>
                              <option value="31" data-img-src="/assets/data/8/skins/xs/31.jpg" >THỏ thợ mỏ</option>
                            <option value="41" data-img-src="/assets/data/8/skins/xs/41.jpg" >Nữ đặc cảnh</option>
                          <option value="43" data-img-src="/assets/data/8/skins/xs/43.jpg" >Cung thủ bóng đêm</option>
                                <option value="44" data-img-src="/assets/data/8/skins/xs/44.jpg" >Oán linh</option>
                               <option value="47" data-img-src="/assets/data/8/skins/xs/47.jpg" >Đại phú ông</option>
                           <option value="55" data-img-src="/assets/data/8/skins/xs/55.jpg" >Tiệc bánh kẹo</option>
                        <option value="56" data-img-src="/assets/data/8/skins/xs/56.jpg" >Khô lâu đại tướng</option>
                        <option value="57" data-img-src="/assets/data/8/skins/xs/57.jpg" >Hoàng kim cốt</option>
                             <option value="78" data-img-src="/assets/data/8/skins/xs/78.jpg" >Tiệc bánh kẹo(Mina)</option>
                        
                          <option value="13" data-img-src="/assets/data/8/skins/xs/13.jpg" >Bọ cánh bạc</option>
                        <option value="14" data-img-src="/assets/data/8/skins/xs/14.jpg" >Công chúa bướm</option>
                        <option value="92" data-img-src="/assets/data/8/skins/xs/92.jpg" >Aleister Quang Vinh</option>
                           <option value="123" data-img-src="/assets/data/8/skins/xs/123.jpg" >Chaugnar quang vinh     </option>
                        
                        
                        <option value="1" data-img-src="/assets/data/8/skins/xs/1.jpg" >Nhà chiêm tinh</option>
                        <option value="2" data-img-src="/assets/data/8/skins/xs/2.jpg" >Teen nữ công nghệ</option>
                    
                     
                        <option value="6" data-img-src="/assets/data/8/skins/xs/6.jpg" >Nữ vương anh đào</option>
                   
                        <option value="9" data-img-src="/assets/data/8/skins/xs/9.jpg" >Chàng gấu tuyết</option>
                        <option value="10" data-img-src="/assets/data/8/skins/xs/10.jpg" >Nữ chúa tuyết</option>
                        <option value="11" data-img-src="/assets/data/8/skins/xs/11.jpg" >Đại tử tế</option>
                        <option value="12" data-img-src="/assets/data/8/skins/xs/12.jpg" >Cô dâu hắc ám</option>
                      
                        <option value="15" data-img-src="/assets/data/8/skins/xs/15.jpg" >Xứ sở thần tiên</option>
                        <option value="16" data-img-src="/assets/data/8/skins/xs/16.jpg" >Đọa lạc thiên sứ</option>
                        <option value="17" data-img-src="/assets/data/8/skins/xs/17.jpg" >Long kỵ sĩ</option>
                        <option value="18" data-img-src="/assets/data/8/skins/xs/18.jpg" >Dung nham</option>
                        <option value="19" data-img-src="/assets/data/8/skins/xs/19.jpg" >Đại tiệc hóa trang</option>
                       
                        <option value="23" data-img-src="/assets/data/8/skins/xs/23.jpg" >Nghệ nhân lân</option>
                        <option value="24" data-img-src="/assets/data/8/skins/xs/24.jpg" >Quý cô thủy tề</option>
                        <option value="25" data-img-src="/assets/data/8/skins/xs/25.jpg" >Người máy xanh</option>
                        <option value="26" data-img-src="/assets/data/8/skins/xs/26.jpg" >Cựu chiến binh</option>
                        <option value="27" data-img-src="/assets/data/8/skins/xs/27.jpg" >Cảnh vệ rừng</option>
                        <option value="28" data-img-src="/assets/data/8/skins/xs/28.jpg" >Không tặc</option>
                        <option value="29" data-img-src="/assets/data/8/skins/xs/29.jpg" >Đại tù trưởng</option>
                        <option value="30" data-img-src="/assets/data/8/skins/xs/30.jpg" >Sơn tặc</option>
                  
                        <option value="32" data-img-src="/assets/data/8/skins/xs/32.jpg" >Xuân nữ ngổ ngáo</option>
                    
                        
                        <option value="35" data-img-src="/assets/data/8/skins/xs/35.jpg" >Đoạt mệnh thương</option>
                        <option value="36" data-img-src="/assets/data/8/skins/xs/36.jpg" >Quý công tử</option>
                 
                        <option value="38" data-img-src="/assets/data/8/skins/xs/38.jpg" >Vũ Khí Tối Thượng</option>
                        <option value="39" data-img-src="/assets/data/8/skins/xs/39.jpg" >Cô giáo hắc ám</option>
                        <option value="40" data-img-src="/assets/data/8/skins/xs/40.jpg" >Quý cô dơi tuyết</option>
                    
                        <option value="42" data-img-src="/assets/data/8/skins/xs/42.jpg" >Nữ hoàng pháo hoa</option>
                      
                  
                        <option value="45" data-img-src="/assets/data/8/skins/xs/45.jpg" >Kỵ sĩ âm phủ</option>
                        <option value="46" data-img-src="/assets/data/8/skins/xs/46.jpg" >Ninja xanh lá</option>
                   
                        <option value="48" data-img-src="/assets/data/8/skins/xs/48.jpg" >Đại Tù Trưởng</option>
                        <option value="49" data-img-src="/assets/data/8/skins/xs/49.jpg" >Ác ma địa ngục</option>
                        <option value="50" data-img-src="/assets/data/8/skins/xs/50.jpg" >Linh hồn lữ khách</option>
                        <option value="51" data-img-src="/assets/data/8/skins/xs/51.jpg" >Hỏa thuật sư</option>
                        <option value="52" data-img-src="/assets/data/8/skins/xs/52.jpg" >Thợ săn tiền thưởng</option>
                        <option value="53" data-img-src="/assets/data/8/skins/xs/53.jpg" >Nữ quái nổi loạn</option>
                        <option value="54" data-img-src="/assets/data/8/skins/xs/54.jpg" >Lốc địa ngục</option>
                       
                        <option value="58" data-img-src="/assets/data/8/skins/xs/58.jpg" >Lãnh chúa xương</option>
                        <option value="59" data-img-src="/assets/data/8/skins/xs/59.jpg" >Thiếu niên hắc ám</option>
                        <option value="60" data-img-src="/assets/data/8/skins/xs/60.jpg" >bboy công nghệ</option>
                        <option value="61" data-img-src="/assets/data/8/skins/xs/61.jpg" >Đạo tặc</option>
                        <option value="62" data-img-src="/assets/data/8/skins/xs/62.jpg" >Đặc nhiệm SWAT</option>
                        <option value="63" data-img-src="/assets/data/8/skins/xs/63.jpg" >Y tá bạo loạn</option>
                        <option value="64" data-img-src="/assets/data/8/skins/xs/64.jpg" >Cận vệ hoàng gia</option>
                        <option value="65" data-img-src="/assets/data/8/skins/xs/65.jpg" >Đôi cánh đại dương</option>
                        <option value="66" data-img-src="/assets/data/8/skins/xs/66.jpg" >Đặc nhiệm SWAT(Lữ Bố)</option>
                     
                        <option value="68" data-img-src="/assets/data/8/skins/xs/68.jpg" >Trò đùa tử vong</option>
                        <option value="69" data-img-src="/assets/data/8/skins/xs/69.jpg" >Thợ săn tiền thưởng</option>
                        <option value="70" data-img-src="/assets/data/8/skins/xs/70.jpg" >Bạch kiếm tiểu thư</option>
                        <option value="71" data-img-src="/assets/data/8/skins/xs/71.jpg" >Cảnh vệ rừng (Tel'Annas)</option>
                        <option value="72" data-img-src="/assets/data/8/skins/xs/72.jpg" >Thích khách</option>
                        <option value="73" data-img-src="/assets/data/8/skins/xs/73.jpg" >Samurai tử sĩ</option>
                        <option value="74" data-img-src="/assets/data/8/skins/xs/74.jpg" >Hiệp sĩ bí ngô</option>
                        <option value="75" data-img-src="/assets/data/8/skins/xs/75.jpg" >Phù thủy bí ngô</option>
                        <option value="76" data-img-src="/assets/data/8/skins/xs/76.jpg" >Slimz chú thỏ ngọc</option>
                        <option value="77" data-img-src="/assets/data/8/skins/xs/77.jpg" >Tiệc bãi biển</option>
                     
                        <option value="79" data-img-src="/assets/data/8/skins/xs/79.jpg" >Chúa tể công lý</option>
                        <option value="80" data-img-src="/assets/data/8/skins/xs/80.jpg" >Tiệc bánh kẹo(Fennik)</option>
                        <option value="81" data-img-src="/assets/data/8/skins/xs/81.jpg" >Tiệc bãi biển(Krixi)</option>
                        <option value="82" data-img-src="/assets/data/8/skins/xs/82.jpg" >Hồng hoa hậu</option>
                        <option value="83" data-img-src="/assets/data/8/skins/xs/83.jpg" >Thiên sứ hủy diệt</option>
                        <option value="84" data-img-src="/assets/data/8/skins/xs/84.jpg" >Tiệc bãi biển(Lữ Bố)</option>
                        <option value="85" data-img-src="/assets/data/8/skins/xs/85.jpg" >Dũng sĩ đồ long</option>
                        <option value="86" data-img-src="/assets/data/8/skins/xs/86.jpg" >Kil Groth cảnh vệ biển</option>
                        <option value="87" data-img-src="/assets/data/8/skins/xs/87.jpg" >Nakroth chiến binh hỏa ngục</option>
                         <option value="88" data-img-src="/assets/data/8/skins/xs/88.jpg" >Natalya Nhà quái quỉ</option>
                         <option value="89" data-img-src="/assets/data/8/skins/xs/89.jpg" >Ormarr thông thoả thích</option>
                         <option value="90" data-img-src="/assets/data/8/skins/xs/90.jpg" >Moren Chú Thợ Điện</option>
                         <option value="91" data-img-src="/assets/data/8/skins/xs/91.jpg" >Valhein Đại Công Tước</option>
                         
                         <option value="93" data-img-src="/assets/data/8/skins/xs/93.jpg" >Điêu thuyền hoa hậu</option>
                         <option value="94" data-img-src="/assets/data/8/skins/xs/94.jpg" >Lauriel hoả phượng hoàng</option>
                         <option value="95" data-img-src="/assets/data/8/skins/xs/95.jpg" >Lữ bố nam vương</option>
                         <option value="96" data-img-src="/assets/data/8/skins/xs/96.jpg" >Zuka giáo sư sừng sỏ</option>
                         <option value="97" data-img-src="/assets/data/8/skins/xs/97.jpg" >Toro trung phong cắm</option>
                         <option value="98" data-img-src="/assets/data/8/skins/xs/98.jpg" >TeeMee xiếc cung đình</option>
                         <option value="99" data-img-src="/assets/data/8/skins/xs/99.jpg" >Murad M-TP thần tượng học đường</option>
                         <option value="100" data-img-src="/assets/data/8/skins/xs/100.jpg" >Fenik tuần lộc láu lỉnh</option>
                         <option value="101" data-img-src="/assets/data/8/skins/xs/101.jpg" >Ngộ Không hoả nhãn kim tinh</option>
                         <option value="102" data-img-src="/assets/data/8/skins/xs/102.jpg" >Lindis thám tử tư</option>
                         <option value="103" data-img-src="/assets/data/8/skins/xs/103.jpg" >Preyta băng hoả long sư</option>
                          <option value="104" data-img-src="/assets/data/8/skins/xs/104.jpg" >Violet phi công trẻ</option>
                           <option value="105" data-img-src="/assets/data/8/skins/xs/105.jpg" >Yorn thế tử nguyệt tộc</option>
                            <option value="106" data-img-src="/assets/data/8/skins/xs/106.jpg" >Zill dung nham</option>
                             <option value="107" data-img-src="/assets/data/8/skins/xs/107.jpg" >Nakroth siêu việt</option>
                              <option value="108" data-img-src="/assets/data/8/skins/xs/108.jpg" >Arthur si tình kiếm </option>
                              <option value="109" data-img-src="/assets/data/8/skins/xs/109.jpg" >Tulen nhà thám hiểm </option>
                              <option value="110" data-img-src="/assets/data/8/skins/xs/110.jpg" >Telannas chung tình tiễn </option>
                              <option value="111" data-img-src="/assets/data/8/skins/xs/111.jpg" >Violet mèo siêu quậy </option> 
                              <option value="112" data-img-src="/assets/data/8/skins/xs/112.jpg" >Omen sĩ quan viễn chinh </option>
                               <option value="113" data-img-src="/assets/data/8/skins/xs/113.jpg" >Liliana Hồ quý phi</option>
                               <option value="114" data-img-src="/assets/data/8/skins/xs/114.jpg" >Airi cấm vệ nguyệt tộc</option>
                               <option value="115" data-img-src="/assets/data/8/skins/xs/115.jpg" >Ormarr giáo viên thể hình</option>
                               <option value="116" data-img-src="/assets/data/8/skins/xs/116.jpg" >Cresht cá cắn cáp</option>
                               <option value="117" data-img-src="/assets/data/8/skins/xs/117.jpg" >Kirixi cô tiên thỏ</option>
                               <option value="118" data-img-src="/assets/data/8/skins/xs/118.jpg" >Zuka phát tài</option>
                               <option value="119" data-img-src="/assets/data/8/skins/xs/119.jpg" >Wonder Woman thế chiến</option>
                               <option value="120" data-img-src="/assets/data/8/skins/xs/120.jpg" >Max hiệp sĩ nhí</option>
                               <option value="121" data-img-src="/assets/data/8/skins/xs/121.jpg" >Telannas giám thị thân thiện</option>
                               <option value="122" data-img-src="/assets/data/8/skins/xs/122.jpg" >Taara hoả ngọc nữ đế</option>
                                <option value="124" data-img-src="/assets/data/8/skins/xs/124.jpg" >Raz băng quyền quán quân</option>
                                <option value="125" data-img-src="/assets/data/8/skins/xs/125.jpg" >Natalya phó nháy nhí nhảnh</option>
                                  <option value="126" data-img-src="/assets/data/8/skins/xs/126.jpg" >Grakk thuyền trưởng râu đỏ</option>
                                   <option value="127" data-img-src="/assets/data/8/skins/xs/127.jpg" >Joker Vua hề</option>
                                   <option value="128" data-img-src="/assets/data/8/skins/xs/128.jpg" >Kriknak yêu trùng cổ mộ</option>
                                   <option value="129" data-img-src="/assets/data/8/skins/xs/129.jpg" >Ryoma đại tướng nguyệt tộc</option>
                                    <option value="130" data-img-src="/assets/data/8/skins/xs/130.jpg" >Airi kiemono</option>
                                        <option value="131" data-img-src="/assets/data/8/skins/xs/131.jpg" >Tulen tân thần thiên hà</option>
                                         <option value="132" data-img-src="/assets/data/8/skins/xs/132.jpg" >Batman dơi địa ngục</option>
                                          <option value="133" data-img-src="/assets/data/8/skins/xs/133.jpg" >Arum thú vệ cổ mộ</option>
                                          <option value="134" data-img-src="/assets/data/8/skins/xs/134.jpg" >Butterfly quận chúa đế chế</option>
                                          <option value="135" data-img-src="/assets/data/8/skins/xs/135.jpg" >Wisp hải tặc nhí</option>
                                          <option value="136" data-img-src="/assets/data/8/skins/xs/136.jpg" >Zuka gấu nhồi bông</option>
                                           <option value="137" data-img-src="/assets/data/8/skins/xs/137.jpg" >Tulen phù thủy kiến tạo</option>
                                           <option value="138" data-img-src="/assets/data/8/skins/xs/138.jpg" >Murad thiên tài sân cỏ</option>
                                           <option value="139" data-img-src="/assets/data/8/skins/xs/139.jpg" >Xeniel trung vệ thép</option>
                                            <option value="140" data-img-src="/assets/data/8/skins/xs/140.jpg" >Kahlii quàng khăn đỏ</option>
                                            <option value="141" data-img-src="/assets/data/8/skins/xs/141.jpg" >Valhein số 7 thần sầu</option>
                                             <option value="142" data-img-src="/assets/data/8/skins/xs/142.jpg" >Rourke pháo thủ tuộc neo</option>
                                             
                                              <option value="144" data-img-src="/assets/data/8/skins/xs/144.jpg" >Marja linh xà tư tế</option>
                                              <option value="145" data-img-src="/assets/data/8/skins/xs/145.jpg" >Superman bất công lý</option>
                                              <option value="146" data-img-src="/assets/data/8/skins/xs/146.png" >Violet tiệc bãi biển</option>
                                              <option value="147" data-img-src="/assets/data/8/skins/xs/147.png" >Taara tiệc bãi biển</option>
                                              <option value="148" data-img-src="/assets/data/8/skins/xs/148.jpg" >Max găng tay vàng</option>
                                              <option value="149" data-img-src="/assets/data/8/skins/xs/149.png" >Điêu thuyền tiệc bãi biển</option>
                                              <option value="150" data-img-src="/assets/data/8/skins/xs/150.png" >Valhein quang vinh</option>
                                          
                                          
                                          
                               
                               
                         

                    </select>
                </div>
            </div>
            
                <div class="form-actions">
                    <div class="col-xs-12">
                    <button class="btn btn-sm btn-success" type="submit" id="submitlq">Đăng bán</button></div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
$("form#lq").submit(function(){

    var formData2 = new FormData($(this)[0]);

    $("#submitlq").prop('disabled', true);
    $.ajax({
        url: '/assets/ajax/post-lq.php',
        type: 'POST',
        data: formData2,
        async: false,
        dataType: 'json',
        success: function (data) {
        swal(data.title, data.msg, data.status);
        setTimeout(function () {
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
    <div class="page-footer-inner">2017  &copy; An Thiên</div>
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
    (function ($) {
        $.fn.currencyInput = function () {
            this.each(function () {
                var wrapper = $("<div class='currency-input' />");
                $(this).wrap(wrapper);
                $(this).before("");
                $(this).val(parseFloat($(this).val()).toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 2}));

                $(this).change(function () {
                    var min = parseFloat($(this).attr("min"));
                    var max = parseFloat($(this).attr("max"));

                    var value = parseFloat($(this).val().replace(/,/g, ''));
                    if (value < min)
                        value = min;
                    else if (value > max)
                        value = max;
                    $(this).val(value.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 2}));
                });
            });
        };
    })(jQuery);

    $(document).ready(function () {
        $('input.currency').currencyInput();
    });
    
    $(document).ready(function ()
    {
        $('#clickmewow').click(function ()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
    $(document).ready(function ()
    {
        $('.gallery').each(function () { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300, // don't foget to change the duration also in CSS
                    opener: function (element) {
                        return element.find('img');
                    }
                }
            });
        });
    })

    $(document).ready(function () {
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
                duration: 300, // don't foget to change the duration also in CSS
                opener: function (element) {
                    return element.find('img');
                }
            }

        });
    });
    $(document).ready(function () {

        $('.ajax-scroll').magnificPopup({
            type: 'ajax',
            alignTop: true,
            overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });

        $('.ajax2').magnificPopup({
            type: 'ajax'
        });

    });
    $(document).ready(function () {
        //magnific popup
        $(document).on('mouseover', '.tooltips', function () {
            $(this).tooltip();
        });
        $(document).on('click', '.ajax', function () {

            $(this).magnificPopup({
                type: 'ajax',
                focus: '#focus-blur-loop-select',
            }).magnificPopup('open');
            return false;
        });
    });</script>
<script>
    function load(url, id, post) {
        $.getJSON(
                url, function (data) {
                    if (data) {
                        var type = data.type;
                        var message = data.message;
                        if (message != '') {
                            $.bootstrapGrowl(message, {type: type});
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
<script type="text/javascript">$(function () {

//        $(".time-picker").datetimepicker({format: "DD/MM/YYYY HH:mm:ss", useCurrent: false});
        $('#timebegin').datetimepicker({locale: 'vi', dayViewHeaderFormat: "dd/mm/yyyy", format: "dd/mm/yyyy hh:ii:ss", useCurrent: false});
        $('#timeend').datetimepicker({locale: 'vi', dayViewHeaderFormat: "dd/mm/yyyy", format: "dd/mm/yyyy hh:ii:ss", useCurrent: false});

    });</script>
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