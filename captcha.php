<?php

require 'Captcha.class.php';
$captcha = new Captcha(); 

echo $captcha -> create();


?>