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


// ----------------------------------------------------------------------------
// 3.用一个整数范围来初始化数组
function init_array_range(){
	$cards = range(1, 52);

	$odd = range(1, 52, 2);
	$even = range(2, 52, 2);
}


// ----------------------------------------------------------------------------
// 4.遍历数组
function go_through_array(){
	$array = [];

	foreach($array as $value){
	}

	foreach($array as $key => $value){
	}

	for($key=0; $size=count($array);  $key++){
	}

	reset($array);
	while (list($key, $value) = each($array)){
	}
}
// 迭代数组元素时用 foreach 语句更整洁
// 使用 foreach 语句时 PHP 迭代的是相应数组的一个副本 不是数组本身
// 使用 for语句 和 each()函数时 PHP 迭代的是原始的数组
// 如果在循环内部修改数组 不应该使用 foreach
// each() 返回的变量不是数组中的原始值 而是一个副本
// 使用 each() 时 指针越过数组末端将返回 false