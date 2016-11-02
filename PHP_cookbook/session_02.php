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


// ----------------------------------------------------------------------------
// 7.取对数
function get_log(){

	// e 为底的自然对数
	$log = log(10); // 2.30258092994

	// 10 为底的对数
	$log = log10(10); // 1

	// 其他对数将底作为第二个参数
	$log = log(10, 2); // 3.219280946674

	// log() 只针对大于 0 的数而设计 小于等于 0 将返回 NAN 即 Not A Number
}


// ----------------------------------------------------------------------------
// 8.计算指数
function compute_pow(){
	// 某数的 e 次幂
	$exp = exp(2);

	// 任意次幂
	$pow = pow(2, 10); // 1024
}
// 常量 M_E 约等于 e
// PHP 允许的最大数值大概是 1.8e308 超出范围会返回 INF 错误返回 NAN


// ----------------------------------------------------------------------------
// 9.格式化数字
function format_number(){
	$number = 1234.56;

	// 插入小数点和千位分隔符
	print number_format($number); // 1,234
	print number_format($number, 2); // 1,234.56
	// 可指定参数
	print number_format($number, 2, '@', '#') // 1#234@56
	// 在不知道小数位数时 保留格式化的数字
	list($int, $dec) = explode('.', $number);
	print number_format($number, strlen($dec));
}


// ----------------------------------------------------------------------------
// 10.格式化货币值
function format_currency(){
	$number = 1234.56;
	setlocale(LC_MONETARY, 'en_US');
	print money_format('%n', $number); // $1,234.56
	// 国际化货币格式
	print money_format('%i', $number); // USD 1,234.56
}


// ----------------------------------------------------------------------------
// 11.正确打印复数
function print_complex_number(){
	$number = 4;
	print "Your search return $number ".($number == 1 ? 'hit' : 'hits').'.';
}