<?php


require 'simple_html_dom.php';
$result = curl('https://thecaosieure.com/EncryptionServlet?generateKeypair=true',false,'');

$cookie = getcookie($result[0]);

$json = json_decode($result[1],true);
$json['cookie'] = $cookie;
echo json_encode($json);
?>