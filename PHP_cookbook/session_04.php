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