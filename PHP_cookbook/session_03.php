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

