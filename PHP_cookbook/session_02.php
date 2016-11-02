<?php 

// 第二章 数字
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.检查变量中是否包含有效的数字
function is_valid_number(){
	if(is_numeric(5)) { /* true */ }
	if(is_numeric('5')) { /* true */ }
	if(is_numeric("05")) { /* true */ }
	if(is_numeric('five')) { /* false */ }
	if(is_numeric(0xDECAFBAD)) { /* true */ } // 十六进制
	if(is_numeric("10e200")) { /* true */ } // 科学计数法
	if(is_numeric(str_replace($number, ',', ''))) { /*  */ } // 去掉千分位分隔符
	// is_double()/is_real() is_int()/is_integer() is_long()
}


// ----------------------------------------------------------------------------
// 2.比较浮点型数字
function compare_float(){
	// 使用一个小增量 检查两个数的差是否比这个增量小
	$delta = 0.00001;

	$a = 1.00000001;
	$b = 1.00000000;

	if(abs($a - $b) < $delta){ /* $a 和 $b 相等 */ }
}


// ----------------------------------------------------------------------------
// 3.对浮点型数取整
function fix_float(){
	// 取整为最接近的整型数
	$number = round(2.4); // $number = 2
	// 向上取整
	$number = ceil(2.4); // $number = 3
	// 向下取整
	$number = floor(2.4); // $number = 2

	// 两整数中间数 向远离 0 的方向取整
	$number = round(2.5); // $number = 3
	$number = round(-2.5); // $number = -3

	// round() 接受表示精度的参数
	$number = round(56.9415, 2); // $number = 56.94
}


// ----------------------------------------------------------------------------
// 4.操纵一系列连续的整数
function range_int(){
	$range = range($start, $end);
	// $start 可以比 $end 大
}


// ----------------------------------------------------------------------------
// 5.在一个范围内生成随机数
function range_random(){
	// 生成大于等于 lower 小于等于 upper 的随机数
	$random_number = mt_rand($lower, $upper);
}
// mt_rand() 速度比 rand() 快


// ----------------------------------------------------------------------------
// 6.生成有偏随机数
function weighted_random(){
	$ads = [
		'ford' => 12234,
		'att' => 33412,
		'ibm' => 15823
	];

	function pc_rand_weighted($numbers){
		$total = 0;
		foreach($numbers as $number => $weight){
			$total += $weight;
			$distribution[$number] = $total;
		}
		$rand = mt_rand(0, $total-1);
		foreach($distribution as $number => $weight){
			if($rand < $weight){
				print $number;
				break;
			}
		}
	}
	pc_rand_weighted($ads);
}
