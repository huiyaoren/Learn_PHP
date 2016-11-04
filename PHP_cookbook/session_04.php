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


// ----------------------------------------------------------------------------
// 5.从数组中删除元素
function delete_array_element(){
	// 删除一个元素
	unset($array[3]);
	unset($array['foo']);

	// 删除多个不连续的元素
	unset($array[3], $array[5]);
	unset($array['foo'], $array['bar']);

	// 删除多个连续的元素
	array_splice($array, $offset, $length);

	// 删除值 保留键
	$array[3] = $array['foo'] = '';
}
// 即使在循环中 unset() PHP 会调整数组以便循环可以正常完成
// 删除数组第一个或最后一个元素 array_shift() array_pop()


// ----------------------------------------------------------------------------
// 6.改变数组大小
function change_array_size(){
	// 最初大小 3
	$array = ['apple', 'banana', 'coconut'];

	// 增大到 5
	$array = $array_pad($array, 5, ''); // 第二个参数可以是负数

	// 减少数组大小 
	array_splice($array, 2);
}


// ----------------------------------------------------------------------------
// 7.将一个数组追加到另一个数组
function array_add_array(){
	$fruits=[1];
	$vegetables=[2=>3];

	$garden = array_merge($fruits, $vegetables); // 适合索引数组

	$garden = $fruits + $vegetables; // 适合关联数组

	var_dump($garden);
}
// 索引重名的情况下 一般右边数组的值会覆盖左边


// ----------------------------------------------------------------------------
// 8.把数组转换成字符串
function array_convert_str(){
	// 生成逗号分隔的列表
	$string = join(',', $array);
}


// ----------------------------------------------------------------------------
// 9.使用逗号来打印数组
function print_array_comma(){

	function pc_array_to_comma_string($array){

		switch (count($array)){
			case 0:
				return '';
			case 1:
				return reset($array);
			case 2:
				return join(' and', $array);
			default:
				$last = array_pop($array);
				return join(', ', $array). ", and $last";
		}
	}
}


// ----------------------------------------------------------------------------
// 10.检查数组中是否存在某个键
function check_array_key(){
	// 用 array_exists() 检查组元素的键
	if(array_key_exists('key', $array)){
	}
}


// ----------------------------------------------------------------------------
// 11.检查数组中是否包含某个元素
function check_array_element(){
	if(in_array($value, $array)){
	}
}
// in_array() 函数在默认情况下使用 == 来比较
// 如果需要用 === 要将 true 作为第三个参数 in_array(0, $array, true)
// 用 in_array()查询项目时所用时间与数组项目数成正比 可以考虑用关联数组代替


// ----------------------------------------------------------------------------
// 12.确定值在数组中的位置
function confirm_value_position(){
	$position = array_search($value, $array);
	if($position !== false){
	}
}
// 用 !== 来避免 0 == false 的情况


// ----------------------------------------------------------------------------
// 13.确定通过某种测试的元素
function confirm_test_element(){
	// 使用 foreach 循环
	$movie = [];
	foreach($movies as $movie){
		if($movie['box_office_gross'] < 50000000){
			$flops[] = $movie;
		}
	}

	// 使用 array_filter()
	$movie = [];
	function flops($movie){
		return ($movie['box_office_gross'])  < 50000000 ? 1 : 0;
	}
	$flops = array_filter($movies, 'flops');
}
// 用 array_filter 无法中途提前退出


// ----------------------------------------------------------------------------
// 14.确定数组中经计算后的最大或最小值
function max_min_array(){
	$largest = max($array);
	$smallest = min($array);
}
// 要获取最大值或最小值的 key 时可以用 asort() 或 arsort() 排序 取第一个元素


// ----------------------------------------------------------------------------
// 15.反转数组
function reverse_array(){
	$array = ['zero', 'one', 'two'];
	$reversed = array_reverse($array);
}


// ----------------------------------------------------------------------------
// 16.数组排序
function array_sort(){
	// 按惯例对数组排序
	$states = ['Delaware', 'Pennsylvania', 'New Jersey'];
	sort($states);

	// 以数字为标准排序
	$scores = [1, 10, 2, 20];
	sort($scores, SORT_NUMERIC);
}
// sort() 不会保留元素间的键值关联 
// asort() 可以保留关联
// natsort() 可以对数组按自然的排序算法排序 即使元素混合了字符串和数字


// ----------------------------------------------------------------------------
// 17.根据可计算字段对数组进行排序
function sort_array_field(){
	function natrsort($a, $b){
		return strnatcmp($b, $a);
	}
	$test = array('test1.php', 'test10.php', 'test11.php', 'test2.php');
	usort($tests, 'natrsort');
	// strnatcmp() 在 $a>$b 时 返回大于 0 的值
	// $b == $a 时 返回 0
	// $a<$b 时返回小于 0 的值
	// 用 usort 对大数组排序较慢
}


// ----------------------------------------------------------------------------
// 18.对多个数组进行排序
function sort_many_array(){
	// 对多个数组排序
	$colors = ['Red', 'White', 'Blue'];
	$cites = ['Boston', 'New York', 'Chicago'];

	array_multisort($colors, $cites);
	print_r($colors);
	print_r($cites);

	// 对一个多维数组进行排序 需要传递相关的数组元素
	$stuff = [
		'color' => ['Red', 'White', 'Blue'],
		'cites' => ['Boston', 'New York', 'Chicago']
	];
	array_multisort($stuff['colors'], $stuff['cites']);
	print_r($stuff);
}
// array_multisort() 可以在数组后传递常量
// SORT_REGULAR 自然排序
// SORT_NUMERIC 数字排序
// SORT_STRING 字符排序
// SORT_ASC 倒序
// SORT_DESC 倒序


// ----------------------------------------------------------------------------
// 19.使用方法而不是函数来对数组进行排序
function sort_by_function(){
	// 传递一个包含类名和方法名来代替函数名
	usort($access_time, ['dates', 'compare']);

	class pc_sort(){
		// 反序字符串比较
		function strrcmp($a, $b){
			return strcmp($b, $a);
		}
	}
	usort($words, ['pc_sort', 'strrcmp']);
}


// ----------------------------------------------------------------------------
// 20.对数组进行随机化处理
function radom_array(){
	shuffle($array);
}


// ----------------------------------------------------------------------------
// 21.删除数组中重复的元素
function delete_repeat_element(){
	$unique = array_unique($array);

	// 在循环中创建
	foreach($_REQUEST['friuts'] as $fruit) {
		if(!in_array($array, $fruit)){
			$array[] = $fruits;
		}
	}

	// 关联数组
	foreach($_REQUEST['fruits'] as $fruit){
		$array[$fruit] = $fruit;
	}
}
// array_unique() 会返回一个只包含唯一元素的新数组