<?php 
$_GET['action'] = (isset($_GET['action'])) ? $_GET['action'] : 
''; 
if ($_GET['action'] == 'send') { 
if (empty($_POST['name']) || empty($_POST['sender']) || empty($_POST['subject']) || empty($_POST['text'])) 
// Kiểm tra các thông tin trong field 
{ 
echo '<p>Xin vui lòng điền đầy đủ thông tin!</p>'; 
} else if($_POST['name']=='Tên của bạn'){
    echo '<p>Vui lòng nhập lại tên của bạn</p>'; 
}

else if($_POST['sender']=='Email của bạn'){
    echo '<p>Vui lòng nhập lại Email của bạn</p>'; 
}

else if($_POST['subject']=='SĐT của bạn'){
    echo '<p>Vui lòng nhập lại SĐT của bạn</p>'; 
}


else { 
extract($_POST); 
$ip = $_SERVER['REMOTE_ADDR']; 
$email = "mphamngoc95@gmail.com"; 
// Thay đổi thành email của bạn 
$mailmsg = "Name: $name\n"; 
$mailmsg .= "Email: $sender\n"; 
$mailmsg .= "SĐT: $subject\n"; 
$mailmsg .= "IP: $ip\n\n"; 
$mailmsg .= "Message: $text"; 
if (mail($email, $subject, $mailmsg, "From: $sender\n")); 
{ 
print("<p>Thông tin của bạn đã được chuyển đi!</p>"); 
} 
} 
} 
?>