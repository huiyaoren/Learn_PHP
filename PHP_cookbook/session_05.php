<?php 

// 第五章 变量
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.消除 == 和 = 的困扰
function equal_beset(){
	if(12 === $dwarves){
	}
	// 把常量放在前面能够避免 把 == 误写为 = 时程序依然顺利执行的情况
	// 但如果 0 == $string 时 PHP 会把右侧变量先转换为整型数 
	// 为了避免此类问题 可以使用 0 === $string
}


// ----------------------------------------------------------------------------
// 2.为变量设定默认值
function var_default(){
	$cars = isset($_REQUEST['cars']) ? $_REQUEST['cars'] : $default_cars;

	// 对 0 false 值进行限制
	$cars = $_REQUEST['cars'] ? $_REQUEST['cars'] : $default_cars;
}