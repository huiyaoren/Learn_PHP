<?php

require 'Captcha.class.php';
$captcha = new Captcha(); 

echo $captcha -> create();


session_start();
$_SESSION['captcha'] = $captcha -> __tostring();
setcookie("captcha", $captcha -> __tostring());

// var_dump($_COOKIE['name']) ;	


?>