<?php 

// 第三章 日期和时间
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.查出当前的时间和日期
function get_current_time(){
	// 查出当前时间和日期
	print strftime('%c');
	print "/n";
	print date('r');
	print '<br />';

	// 查出时间部件
	$now_1 = getdate();
	$now_2 = localtime();
	print "{$now_1['hours']}:{$now_1['minutes']}:{$now_1['seconds']}\n</br>";
	print "$now_2[2]:$now_2[1]:$now_2[0]";
}
// strftime() date() 可以生成多种格式的时间和日期字符串
// localtime() getdate() 返回一个保存日期时间各部分的数组 后者为键值对
// seconds 秒
// minutes 分
// hours 小时
// mday 一月中的第几天
// wday 一周中的第几天
// mon 月份
// year 年份
// yday 一年中的第几天
// weekday 周几 Friday
// month 月份 January
// 0 自纪元起的秒数


// ----------------------------------------------------------------------------
// 2.将时间和日期部件转换为纪元时间戳
function convert_time_stamp(){
	// 获得特定纪元时间戳
	$then = mktime(19, 45, 3, 3, 10, 1975);

	// 使用纪元时间戳
	print $then.'<br/>';
	print strftime('%c', $then);
}


// ----------------------------------------------------------------------------
// 3.将纪元时间戳转换为时间和日期部件
function convert_time_part(){
	$time_parts = getdate(163727110);
}


// ----------------------------------------------------------------------------
// 4.以特定格式打印日期和时间
function print_format_time(){
	print strftime('%c');
	print date('m/d/Y'); // 12/03/2007
}
// 适用于 date() strftime() 的格式化字符串：查表


// ----------------------------------------------------------------------------
// 5.计算两个日期之间的时间差
function diff_between_dates(){
	$epoch_1 = mktime(19, 32, 56, 5, 10, 1965);
	$epoch_2 = mktime(4, 29, 11, 11, 20, 1962);

	$diff_seconds = $epoch_1 - $epoch_2;

	$diff_weeks = floor($diff_seconds/604800);
	$diff_days = floor($diff_seconds/86400);
	$diff_hours = floor($diff_seconds/3600);
	$diff_minutes = floor($diff_seconds/60);
}
// 由于月与年有可变的长度 所以无法准确表达对时差计算的结果


// ----------------------------------------------------------------------------
// 6.用儒略日计算两个日期时间的时间差
// 略


// ----------------------------------------------------------------------------
// 7.找到周、月或者年中的某一天
function find_someday(){
	print strftime("Today is day %d of the mouth and $j of the year");
	print "Today id day ".date('d').'of the mouth and '.date('z').' of the year.';
}


// ----------------------------------------------------------------------------
// 8.验证日期
function validate_date(){
	$valid = checkdate($month, $day, $year);
}
// checkdate() 能够正确处理闰年


// ----------------------------------------------------------------------------
// 9.从字符串中解析日期和时间
function resolve_date(){
	$a = strtotime('march 10');
	$a = strtotime('last thursday');
	$a = strtotime('now + 3 mouths');
	$a = strtotime('today');
}


// ----------------------------------------------------------------------------
// 10.对日期进行加减运算
function compute_date(){
	// 用 strtotime() 计算时间间隔
	$birthday = 'March 10, 1975';
	$whoopee_mode = strtotime("$birthday - 9 mouths ago");
}