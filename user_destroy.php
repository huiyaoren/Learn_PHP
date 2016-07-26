<?php
	setcookie("username");
	session_destroy();
	require "login.php";

?>