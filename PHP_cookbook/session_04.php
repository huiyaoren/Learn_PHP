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