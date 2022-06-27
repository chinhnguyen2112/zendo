<?php

// Nếu đăng nhập
if ($user)
{
require_once 'sidebar/user_info.php';
require_once 'sidebar/cash.php';
 
}
// Nếu không đăng nhập
else
{

require_once 'sidebar/login.php';

}
?>