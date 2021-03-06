
RewriteEngine on
RewriteCond %{HTTPS} off
RewriteCond %{HTTP:X-Forwarded-SSL} !on
RewriteCond %{HTTP_HOST} ^zendo\.vn$ [OR]
RewriteCond %{HTTP_HOST} ^www\.zendo\.vn$
RewriteRule ^/?$ "https\:\/\/zendo\.vn\/" [R=301,L]




RewriteRule ^logout.html$ logout.php [L]
RewriteRule ^logout/$ logout.php [L]
RewriteRule ^lich-su-mua-hang/$ history.php [L]
RewriteRule ^lich-su-mua-hang$ history.php [L] 
RewriteRule ^nap-the/$ recharge.php [L]
RewriteRule ^nap-the$ recharge.php [L]
RewriteRule ^recharge1.html$ recharge1.php [L]

RewriteRule ^xac-thuc-tai-khoan$ active.php [L]
RewriteRule ^xac-thuc-tai-khoan/$ active.php [L]

RewriteRule ^dang-ky/$ register.php [L]
RewriteRule ^dang-ky$ register.php [L]

RewriteRule ^test-([0-9]+).html$ view_test.php?id=$1 [L]


RewriteRule ^admin$ admin/index_new.php [L]
RewriteRule ^admin/$ admin/index_new.php [L]

RewriteRule ^dang-nhap/$ login_tk.php [L]
RewriteRule ^dang-nhap$ login_tk.php [L]\

RewriteRule ^gio-hang/$ giohang.php [L]
RewriteRule ^gio-hang$ giohang.php [L]

# RewriteRule ^lat-hinh/$ lat_hinh.php [L]
# RewriteRule ^lat-hinh$ lat_hinh.php [L]

RewriteRule ^quan-ly-tai-khoan/$ quanly.php [L]
RewriteRule ^quan-ly-tai-khoan$ quanly.php [L]

RewriteRule ^cay-thue-lien-quan/$ cayrank.php [L]
RewriteRule ^cay-thue-lien-quan$ cayrank.php [L]

RewriteRule ^the-game-garena/$ card_garena.php [L]
RewriteRule ^the-game-garena/$ card_garena.php [L]

RewriteRule ^tien-do-cay-rank/$ tiendo_cayrank.php [L]
RewriteRule ^tien-do-cay-rank$ tiendo_cayrank.php [L]

RewriteRule ^kho-do/$ khodo.php [L]
RewriteRule ^kho-do$ khodo.php [L]

RewriteRule ^vong-quay-lien-quan/$ vongquay_new.php [L]
RewriteRule ^vong-quay-lien-quan$ vongquay_new.php [L]

RewriteRule ^shop-lien-quan$ shop-lien-quan.php [L]
RewriteRule ^shop-lien-quan/$ shop-lien-quan.php [L]

RewriteRule ^thu-van-may-lien-quan/$ vong_quay_lq.php [L]
RewriteRule ^thu-van-may-lien-quan$ vong_quay_lq.php [L]

RewriteRule ^shop-free-fire$ shop-acc-ff.php [L]
RewriteRule ^shop-free-fire/$ shop-acc-ff.php [L]

RewriteRule ^shop-dot-kich$ shop-cf.php [L]
RewriteRule ^shop-dot-kich/$ shop-cf.php [L]

RewriteRule ^shop-lien-minh-toc-chien$ shop-lmtc.php [L]
RewriteRule ^shop-lien-minh-toc-chien/$ shop-lmtc.php [L] 

RewriteRule ^shop-fifa-online$ shop-fifa.php [L]  
RewriteRule ^shop-fifa-online/$ shop-fifa.php [L]

RewriteRule ^shop-pubg-mobile$ shop-pubg.php [L]
RewriteRule ^shop-pubg-mobile/$ shop-pubg.php [L] 

RewriteRule ^shop-lien-minh-huyen-thoai$ shop-lmht.php [L]
RewriteRule ^shop-lien-minh-huyen-thoai/$ shop-lmht.php [L]

RewriteRule ^shop-acc-lmht-viet/$ shop-lmht.php [L]
RewriteRule ^shop-acc-lmht-viet$ shop-lmht.php [L]

RewriteRule ^shop-acc-lmht-han-quoc/$ shop-lmht.php [L]
RewriteRule ^shop-acc-lmht-han-quoc$ shop-lmht.php [L]

RewriteRule ^shop-acc-lmht-na/$ shop-lmht.php [L]
RewriteRule ^shop-acc-lmht-na$ shop-lmht.php [L]

RewriteRule ^shop-acc-lmht-pbe/$ shop-lmht.php [L]
RewriteRule ^shop-acc-lmht-pbe$ shop-lmht.php [L]

RewriteRule ^thu-van-may-lmht-9k/$ shop-lmht.php [L]
RewriteRule ^thu-van-may-lmht-9k$ shop-lmht.php [L]

RewriteRule ^thu-van-may-lmht-20k/$ shop-lmht.php [L]
RewriteRule ^thu-van-may-lmht-20k$ shop-lmht.php [L]

RewriteRule ^thu-van-may-lmht-50k/$ shop-lmht.php [L]
RewriteRule ^thu-van-may-lmht-50k$ shop-lmht.php [L]

RewriteRule ^thu-van-may-lmht-100k/$ shop-lmht.php [L]
RewriteRule ^thu-van-may-lmht-100k$ shop-lmht.php [L]

RewriteRule ^thu-van-may-lmht-200k/$ shop-lmht.php [L]
RewriteRule ^thu-van-may-lmht-200k$ shop-lmht.php [L]



RewriteRule ^acc-lien-quan-tu-chon$ shop-lien-quan.php [L]
RewriteRule ^acc-lien-quan-tu-chon/$ shop-lien-quan.php [L]
RewriteRule ^thu-van-may-lien-quan-9k$ thu-van-may-lien-quan-9k.php [L]
RewriteRule ^thu-van-may-lien-quan-20k$ thu-van-may-lien-quan-20k.php [L]
RewriteRule ^thu-van-may-lien-quan-50k$ thu-van-may-lien-quan-50k.php [L]
RewriteRule ^thu-van-may-lien-quan-100k$ thu-van-may-lien-quan-100k.php [L]
RewriteRule ^thu-van-may-lien-quan-200k$ thu-van-may-lien-quan-200k.php [L]
RewriteRule ^thu-van-may-lien-quan-500k$ thu-van-may-lien-quan-500k.php [L]
RewriteRule ^thu-van-may-lien-quan-9k/$ thu-van-may-lien-quan-9k.php [L]
RewriteRule ^thu-van-may-lien-quan-20k/$ thu-van-may-lien-quan-20k.php [L]
RewriteRule ^thu-van-may-lien-quan-50k/$ thu-van-may-lien-quan-50k.php [L]
RewriteRule ^thu-van-may-lien-quan-100k/$ thu-van-may-lien-quan-100k.php [L]
RewriteRule ^thu-van-may-lien-quan-200k/$ thu-van-may-lien-quan-200k.php [L]
RewriteRule ^thu-van-may-lien-quan-500k/$ thu-van-may-lien-quan-500k.php [L]

RewriteRule ^acc-free-fire-tu-chon$ shop-acc-ff.php [L]
RewriteRule ^thu-van-may-free-fire-20k$ ff-20k.php [L]
RewriteRule ^thu-van-may-free-fire-70k$ ff-70k.php [L]
RewriteRule ^thu-van-may-free-fire-100k$ ff-100k.php [L]
RewriteRule ^thu-van-may-free-fire-200k$ ff-200k.php [L]
RewriteRule ^acc-free-fire-tu-chon/$ shop-acc-ff.php [L]
RewriteRule ^thu-van-may-free-fire-20k/$ ff-20k.php [L]
RewriteRule ^thu-van-may-free-fire-70k/$ ff-70k.php [L]
RewriteRule ^thu-van-may-free-fire-100k/$ ff-100k.php [L]
RewriteRule ^thu-van-may-free-fire-200k/$ ff-200k.php [L]

RewriteRule ^acc-lien-minh-toc-chien-tu-chon$ shop-acc-toc-chien.php [L]
RewriteRule ^thu-van-may-lien-minh-toc-chien-20k$ lmtc-20k.php [L]
RewriteRule ^thu-van-may-lien-minh-toc-chien-50k$ lmtc-50k.php [L]
RewriteRule ^thu-van-may-lien-minh-toc-chien-100k$ lmtc-100k.php [L]
RewriteRule ^acc-lien-minh-toc-chien-tu-chon/$ shop-acc-toc-chien.php [L]
RewriteRule ^thu-van-may-lien-minh-toc-chien-20k/$ lmtc-20k.php [L]
RewriteRule ^thu-van-may-lien-minh-toc-chien-50k/$ lmtc-50k.php [L]
RewriteRule ^thu-van-may-lien-minh-toc-chien-100k/$ lmtc-100k.php [L]

RewriteRule ^thu-van-may-9k.html$ thu-van-may-9k.php [L]
RewriteRule ^thu-van-may-9k.html/$ thu-van-may-9k.php [L]

RewriteRule ^ban-acc-lien-quan-20k.html$ random-so-cap.php [L]
RewriteRule ^ban-acc-lien-quan-20k.html/$ random-so-cap.php [L]

RewriteRule ^ban-acc-lien-quan-50k.html$ random-trung-cap.php [L]
RewriteRule ^ban-acc-lien-quan-50k.html/$ random-trung-cap.php [L]

RewriteRule ^thu-van-may-75k.html$ random-cao-cap.php [L] 
RewriteRule ^thu-van-may-75k.html/$ random-cao-cap.php [L]

RewriteRule ^thu-van-may-120k.html$ thu-van-may-120k.php [L]
RewriteRule ^thu-van-may-120k.html/$ thu-van-may-120k.php [L]

RewriteRule ^thu-van-may-250k.html$ random-sieu-cap.php [L]
RewriteRule ^thu-van-may-250k.html/$ random-sieu-cap.php [L]

RewriteRule ^thu-van-may-500k.html$ thu-van-may-500k.php [L]
RewriteRule ^thu-van-may-500k.html/$ thu-van-may-500k.php [L]

RewriteRule ^chinh-sach-bao-mat$ chinh-sach-bao-mat.php [L]
RewriteRule ^chinh-sach-bao-mat/$ chinh-sach-bao-mat.php [L]

RewriteRule ^about$ about.php [L]
RewriteRule ^about/$ about.php [L]
RewriteRule ^contact contact.php [L]
RewriteRule ^contact/$ contact.php [L]

RewriteRule ^results.html$ templates/products/results.php [L]

RewriteRule ^tai-khoan-([0-9]+)$ view.php?id=$1 [L]
RewriteRule ^tai-khoan-([0-9]+)/$ view.php?id=$1 [L]
RewriteRule ^tai-khoan-([0-9]+).html$ view.php?id=$1 [L]
RewriteRule ^tai-khoan-([0-9]+).html/$ view.php?id=$1 [L]

RewriteRule ^blog$ blog.php [L]
RewriteRule ^blog/$ blog.php [L]

RewriteRule ^blog/([^/]+)$ chuyenmuc.php [L]
RewriteRule ^blog/([^/]+)/$ chuyenmuc.php [L]


RewriteRule ^([^/]+)/$ chi_tiet_blog.php [L]


;; # ErrorDocument 404 https://zendo.vn/404.php
RewriteCond %{HTTPS} off
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [L,R]

<Files 403.shtml>
order allow,deny
allow from all
</Files>
php_value post_max_size 64M
php_value upload_max_filesize 64M
php_value max_file_uploads 128M
php_value max_input_vars 5000
deny from 123.23.166.143
RewriteCond %{HTTP_HOST} ^zendo\.vn\.chonsongbac\.com$
RewriteRule ^/?$ "https\:\/\/zendo\.vn\/" [R=301,L]
RewriteRule ^([^.]*)$ https://zendo.vn/$1/ [L,R=301]

# BEGIN cPanel-generated php ini directives, do not edit
# Manual editing of this file may result in unexpected behavior.
# To make changes to this file, use the cPanel MultiPHP INI Editor (Home >> Software >> MultiPHP INI Editor)
# For more information, read our documentation (https://go.cpanel.net/EA4ModifyINI)
<IfModule php7_module>
   php_flag display_errors Off
   php_value max_execution_time 30
   php_value max_input_time 60
   php_value max_input_vars 1000
   php_value memory_limit 128M
   php_value post_max_size 64M
   php_value session.gc_maxlifetime 1440
   php_value session.save_path "/var/cpanel/php/sessions/ea-php74"
   php_value upload_max_filesize 64M
   php_flag zlib.output_compression Off
</IfModule>
<IfModule lsapi_module>
   php_flag display_errors Off
   php_value max_execution_time 30
   php_value max_input_time 60
   php_value max_input_vars 1000
   php_value memory_limit 128M
   php_value post_max_size 64M
   php_value session.gc_maxlifetime 1440
   php_value session.save_path "/var/cpanel/php/sessions/ea-php74"
   php_value upload_max_filesize 64M
   php_flag zlib.output_compression Off
</IfModule>
# END cPanel-generated php ini directives, do not edit
