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


// ----------------------------------------------------------------------------
// 7.返回多个值
function return_many_parament(){
	// 返回一个数组 再用 list() 分离
	function averages($state){
		return [$median, $mean, $mode];
	}
	list($median, $mean, $mode) = averages($states);
}


// ----------------------------------------------------------------------------
// 8.跳跃选择返回的值
function jump_chose_para(){
	function time_parts($time){
		return explode(':', $time);
	}
	list(, $minute,) = time_part('12:23:34');

	// or
	while(list(,,$rank,,) = fgetcsv($fh, 4096)){
		print $rank;
	}
}
// 不要写错逗号个数


// ----------------------------------------------------------------------------
// 9.返回失败信息
function return_false(){
	function lookup($name){
		if(empty($name)) {return false;}
	}
}
// 尽量避免用 0 '' 来代替 false


// ----------------------------------------------------------------------------
// 10.调用可变函数
function invoke_changable_function(){
	// 使用 call_user_func()
	function get_file($filename) { return file_get_contents($filename); }

	$function = 'get_file';
	$filename = 'graphic.png';

	call_user_func($function, $filename);

	// 如果函数接受不同个数参数 可以使用 call_user_func_array()
	function get_file($filename){ return file_get_contents($filename); }
	function put_file($filename, $data){ return file_put_contents($filename, $data); }

	if($action == 'get_file'){
		$function = 'get_file';
		$args = ['graphic.png'];
	} elseif($action == 'put') {
		$function = 'put_file';
		$args = ['graphic.png', $graphic];
	}
	
	call_user_func_array($function, $args);
}


// ----------------------------------------------------------------------------
// 11.在函数内部访问全局变量
function access_global_var(){
	function eat_fruit(){
		global $chew_count;

		for($i=$chew_count;$i>0;$i--){
		}
		for($i=$GLOBALS['chew_count'];$i>0;$i--){
		}

		unset($chew_count); // 只会在该函数中删除变量
		unset($GLOBALS['chew_out']); // 在全局作用域下删除
	}
}


// ----------------------------------------------------------------------------
// 12.创建动态函数
function create_dynamic_function(){
	$add = create_function('$i,$j', 'return $i+$j');
	$add(1, 1);
}