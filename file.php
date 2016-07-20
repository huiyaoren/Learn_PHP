<?php

require 'check_file.php';

if($_GET[$next = 'next']){
	check_file($_GET[$next = 'next']);
}

?>