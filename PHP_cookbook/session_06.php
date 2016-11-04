<?php 

// 第六章 函数
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.访问函数的参数
function add_one($number){
	$number++;
}


// ----------------------------------------------------------------------------
// 2.为函数的参数设定默认值
function wrap_html_tag($string, $tag='b'){
	return "<$tag>$string</$tag>";
}


// ----------------------------------------------------------------------------
// 3.传递引用
function wrap_html_tag(&$string, $tag='b'){
	// 把变量传递给函数 并保留对变量的修改
	$string = "<$tag>$string</$tag>";
}


// ----------------------------------------------------------------------------
// 4.使用命名的参数
function name_para(){
	// 让函数接受一个关联数组的参数
	function image($img){
		$tag = '<img src="'.$img['src'].'">';
		return $tag;
	}
	$img = image([
		'src' => 'cow.png', 
		'alt' => 'cows say moo'
	]);
}
// 会使函数中代码变得复杂
// 但能够使调用代码更简单
// 拼错参数名称时 PHP 不会报错 可以对参数设置默认值


// ----------------------------------------------------------------------------
// 5.创建可以接受个数可变参数的函数
function changable_para_function(){
	function mean($number){
		$sum = 0;
		$size = count($numbers);
		for($i=0; $i<$size; $i++){
			$sum += $numbers[$i];
		}
		$average = $sum/$size;
		return $average;
	}
	$mean = mean([96, 93, 97]);
}
// 利用数组实现 或者使用 func_get_arg()


// ----------------------------------------------------------------------------
// 6.返回变量的引用
function return_para(){
	// 把 & 加在函数名前
	function &pc_array_find_value($needle, &$haystack){
		foreach($haystack as $key => $value){
			if($needle == $value){
				return $haystack[$key];
			}
		}
	}
}