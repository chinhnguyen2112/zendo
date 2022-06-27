<?php
//error_reporting( E_ALL );
//ini_set('display_errors', 1);

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');


    $input = new Input;
    // biến truyền vào
    $page = (int)$input->input_post("page");

    /* $_POST */
    $min_price = !empty($_POST['min_price']) ? (int)$_POST['min_price'] : 0;
    $max_price = !empty($_POST['max_price']) ? (int)$_POST['max_price'] : 10000000;
    $tuong = !empty($_POST['int_1']) ? str_replace('.', '', $_POST['int_1']) : 0;   
    $skin = !empty($_POST['int_2']) ? str_replace('.', '', $_POST['int_2']) : 0;
    $ip = !empty($_POST['int_3']) ? str_replace('.', '', $_POST['int_3']) : 0;
    $bangngoc = !empty($_POST['int_4']) ? str_replace('.', '', $_POST['int_4']) : 0;
    $rank = !empty($_POST['int_5']) ? str_replace('.', '', $_POST['int_5']) : 1;
     $gia = !empty($_POST['int_6']) ? str_replace('.', '', $_POST['int_6']) : 1;
    $khung = !empty($_POST['varchar_1']) ? $_POST['varchar_1'] : -1;



    /* Xử lý tìm kiếm skin */
    $list_skin = !empty($_POST['longtext_1']) ? trim($_POST['longtext_1']) : "";
    $arr_skin = explode(',', $list_skin);
    $arr_cross = array();
    foreach ($arr_skin as $value) {
      $value = trim($value);
      $arr_sub = explode(' ', $value);
      $arr_cross[] = $arr_sub;
    }
    $str_result = "";
    foreach ($arr_cross as $item) {
      $str_result .= "(";
      foreach ($item as $value) {
        if ($value) {
          $value = trim($value);
          $str_result .= "skins LIKE '%$value%' AND ";
        }
      }
      $str_result = trim($str_result, "AND ");
      $str_result .= ")";
      $str_result .= " AND ";
    }
    $str_result = trim($str_result, "AND ");
    if ($str_result == "()") {
      $sql_skin = "";
    } else {
      $str_result .= " AND ";
      $sql_skin = $str_result;
    }
    

    /* Xử lý tìm kiếm champ */
    $list_champs = !empty($_POST['longtext_2']) ? trim($_POST['longtext_2']) : "";
    $arr_champs = explode(',', $list_champs);
    $arr_cross2 = array();
    foreach ($arr_champs as $value2) {
      $value2 = trim($value2);
      $arr_sub2 = explode(' ', $value2);
      $arr_cross2[] = $arr_sub2;
    }
    $str_result2 = "";
    foreach ($arr_cross2 as $item2) {
      $str_result2 .= "(";
      foreach ($item2 as $value2) {
        if ($value2) {
          $value2 = trim($value2);
          $str_result2 .= "champs LIKE '%$value2%' AND ";
        }
      }
      $str_result2 = trim($str_result2, "AND ");
      $str_result2 .= ")";
      $str_result2 .= " AND ";
    }
    $str_result2 = trim($str_result2, "AND ");
    if ($str_result2 == "()") {
      $sql_champs = "";
    } else {
      $str_result2 .= " AND ";
      $sql_champs = $str_result2;
    }
    
    /* END */
    if ($khung == -1) {
      $sql_khung = "";
    } else if ($khung == -2) {
      $sql_khung = "frame = 0 AND ";
    } else {
      $sql_khung = "frame = $khung AND ";
    }
    
    if ($rank == -1) {
        $rank = 0;
    /* Phân ra rank */
    $sql_rank = "";}
    if ($rank == 1) {
       $sql_rank = "";
    } else {
       $sql_rank = "rank = $rank AND";
       
    }
    
    /* END */
   if ($gia == -1) $gia = 0;
    /* Phân ra giá */
    $sql_gia = "";
    if ($gia == 1) {
       $sql_gia = "";
    } else if ($gia == 2) {
      $sql_gia = " price <= 50000 AND ";
    } elseif ($gia == 3) {
       $sql_gia = "price BETWEEN 50000 AND 100000 AND";
    } elseif ($gia == 4) {
       $sql_gia = "price BETWEEN 100000 AND 500000 AND";
    } elseif ($gia == 5) {
       $sql_gia = "price BETWEEN 500000 AND 1000000 AND";
    } elseif ($gia == 6) {
       $sql_gia = "price >= 1000000 AND";
    }
    /* END */
    $total_record = $db->fetch_row("SELECT COUNT(id_post) FROM posts WHERE
      status = 0 AND
      type_account = 'Liên Quân Mobile Random Trung Cấp' AND
      price BETWEEN $min_price AND $max_price AND 
      $sql_rank
       $sql_gia
      gem_count >= $bangngoc AND 
      skins_count >= $skin AND 
      champs_count >= $tuong AND 
      $sql_skin
      $sql_champs
      $sql_khung 
      ip_count >= $ip
    "); // đếm hàng
    

    // config phân trang
    $config = array(
      "current_page" => $page,
      "total_record" => $total_record,
      "limit" => "25",
      "range" => "5",
      "link_first" => "",
      "link_full" => "?page={page}"
    );
    $paging = new Pagination;
    $get_info = new Info;
    $paging->init($config);

    $sql_get_list_acc = "SELECT * FROM posts WHERE
      status = 0 AND
      type_account = 'Liên Quân Mobile Random Trung Cấp' AND
      price BETWEEN $min_price AND $max_price AND 
      $sql_rank
       $sql_gia
      gem_count >= $bangngoc AND 
      skins_count >= $skin AND 
      champs_count >= $tuong AND 
      $sql_skin
      $sql_champs
      $sql_khung 
      ip_count >= $ip
    ORDER BY id_post DESC 
    LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";
?>
<div class="clear"></div>
<ul>
<?php
    // Nếu có tai khoan
    if ($total_record){
        

    foreach ($db->fetch_assoc($sql_get_list_acc, 0) as $key => $data_post){   
        
?>

    
<li>
    <div class="flip-container"> 
        <div class="flipper">
            <div class="front">
                <div class="account_image">
                    <img src="https://lienquanmobile.vn/assets/img/thu-van-may-50k.png" />
                    <div class="account_price"><?php echo number_format($data_post["price"], 0, '.', '.'); ?>đ</div>
                    <?php if($data_post['type_post']=='1'): ?>
                    <div class="tag"><img src="/assets/img/tag_ads.png" /></div>
                    <?php elseif($data_post['type_post']=='2'): ?>
                    <div class="tag"><img src="/assets/img/tag.png" /></div>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
                <div class="account_id">
                    <div class="left">#<?php echo $data_post['id_post']; ?></div>
                    <div class="right"><?php echo date('d-m-Y', strtotime($data_post['date_posted'])); ?></div>
                    <div class="clear"></div>
                </div>
                
            </div>
            <div class="back">
                <div class="account_detail">
                    <p>#<?php echo $data_post['id_post']; ?></p>
                    <?php echo str_replace("\n", "</p>\n<p>", '<p>'.$data_post["note"].'</p>'); ?>
                    <div class="button_div">
                        <a style="color: white;" href="/tai-khoan-<?php echo $data_post['id_post']; ?>.html" target="_blank"><button>Xem chi tiết</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="phone_account_list">
        <div class="account_image">
            <img src="https://lienquanmobile.vn/assets/img/thu-van-may-50k.png" />
            <div class="account_price"><?php echo number_format($data_post["price"]); ?>đ</div>
                    <?php if($data_post['type_post']=='1'): ?>
                    <div class="tag"><img src="/assets/img/tag_ads.png" /></div>
                    <?php elseif($data_post['type_post']=='2'): ?>
                    <div class="tag"><img src="/assets/img/tag.png" /></div>
                    <?php else: ?>
                    <?php endif; ?>
                    </div>
        <div class="account_id">
            <div class="left">#<?php echo $data_post['id_post']; ?></div>
            <div class="right"><?php echo date('d-m-Y', strtotime($data_post['date_posted'])); ?></div>
            <div class="clear"></div>
        </div>
       
        <div class="account_detail">
            <?php echo str_replace("\n", "</p>\n<p>", '<p>'.$data_post["note"].'</p>'); ?>            <div class="button_div">
                <a style="color: black;" href="/tai-khoan-<?php echo $data_post['id_post']; ?>.html" target="_blank"><button>Xem chi tiết</button></a>
            </div>
        </div>
    </div>
</li>
 
 <?php
 } // end show acc
 ?>
 </ul>
    <div class="clear"></div>
<?php
 echo $paging->html_site(); // page
?>           

    <div class="clear"></div>
<?php

} else {
?>
<ul>
<li style="color:#313131;width: 100%;float:none;text-align:center;font-size:16px;text-transform: uppercase;margin:0;">Không có tài khoản phù hợp với điều kiện tìm kiếm</li>
<br /><br /><br />
</ul>
<ul>
<li style="color:#313131;width: 100%;float:none;text-align:center;font-size:16px;text-transform: uppercase;margin:0;">ACCOUNT QUẢNG CÁO</li>

<br /><br /><br />
</ul>
<ul>
<?php
  $sql_get_ads = "SELECT * FROM posts WHERE status ='0' AND type_post = '1' AND type_account = 'Liên Quân Mobile Random Trung Cấp' ORDER BY RAND() DESC LIMIT 5";
  foreach ($db->fetch_assoc($sql_get_ads, 0) as $key => $data_post){ 
?>

<li>
    <div class="flip-container">
        <div class="flipper">
            <div class="front">
                <div class="account_image">
                    <img src="https://lienquanmobile.vn/assets/img/thu-van-may-50k.png" />
                    <div class="account_price"><?php echo number_format($data_post["price"]); ?>đ</div>
                    <?php if($data_post['type_post']=='1'): ?>
                    <div class="tag"><img src="/assets/img/tag_ads.png" /></div>
                    <?php elseif($data_post['type_post']=='2'): ?>
                    <div class="tag"><img src="/assets/img/tag.png" /></div>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
                <div class="account_id">
                    <div class="left">#<?php echo $data_post['id_post']; ?></div>
                    <div class="right"><?php echo date('d-m-Y', strtotime($data_post['date_posted'])); ?></div>
                    <div class="clear"></div>
                </div>
                <div class="account_info">
                    <p><?php echo $data_post['champs_count']; ?> tướng</p>
                    <p><?php echo $data_post['skins_count']; ?> trang phục</p>
                      
                    <div class="account_icon">
                        <img src="<?php echo $get_info->get_icon_rank($data_post['rank']); ?>" />
                    </div>
                </div>
            </div>
            <div class="back">
                <div class="account_detail">
                    <p>#<?php echo $data_post['id_post']; ?></p>
                    <?php echo str_replace("\n", "</p>\n<p>", '<p>'.$data_post["note"].'</p>'); ?>
                    <div class="button_div">
                        <a style="color: white;" href="/tai-khoan-<?php echo $data_post['id_post']; ?>.html" target="_blank"><button>Xem chi tiết</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="phone_account_list">
        <div class="account_image">
            <img src="https://lienquanmobile.vn/assets/img/thu-van-may-50k.png" />
            <div class="account_price"><?php echo number_format($data_post["price"]); ?>đ</div>
                    <?php if($data_post['type_post']=='1'): ?>
                    <div class="tag"><img src="/assets/img/tag_ads.png" /></div>
                    <?php elseif($data_post['type_post']=='2'): ?>
                    <div class="tag"><img src="/assets/img/tag.png" /></div>
                    <?php else: ?>
                    <?php endif; ?>
                    </div>
        <div class="account_id">
            <div class="left">#<?php echo $data_post['id_post']; ?></div>
            <div class="right"><?php echo date('d-m-Y', strtotime($data_post['date_posted'])); ?></div>
            <div class="clear"></div>
        </div>
        <div class="account_info">
            <p><?php echo $data_post['champs_count']; ?> tướng</p>
            <p><?php echo $data_post['skins_count']; ?> trang phục</p>
              
            <div class="account_icon">
                        <img src="<?php echo $get_info->get_icon_rank($data_post['rank']); ?>" />
            </div>
        </div>
        <div class="account_detail">
            <p><?php echo nl2br($data_post["note"]); ?></p>            <div class="button_div">
                <a style="color: black;" href="/tai-khoan-<?php echo $data_post['id_post']; ?>.html" target="_blank"><button>Xem chi tiết</button></a>
            </div>
        </div>
    </div>
</li>




<?php
}
?>
</ul>
<?php
}
?>