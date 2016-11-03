<?php 

// 第四章 数组
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.定义一个起始元素不为零的数组
function not_zero_array(){
	$president = [
		1 => 'Washington',
		'Adams',
		'Jsfferson',
		'Msdison'
	];
}
// 索引值从 1 开始常常会更有意义


// ----------------------------------------------------------------------------
// 2.用数组中的一个键保存多个元素
function save_multiple_element(){
	// 一个数组保存多个元素
	$friut = [
		'red' => ['strawberry', 'apple'],
		'yellow' => ['banana']
	];

	// 使用一个对象
	$friuts[] = $obj;
}
