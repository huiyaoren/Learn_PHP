<?php
// 1、打印出前一天的时间格式是“年-月-日 时：分：秒”,并保存为时间数组
function solution_1(){
	date_default_timezone_set('PRC');
	$time = time();
	echo date('Y-m-d H:i:s', $time);
	$time_array =  getDate($time);
	$time_array

	echo $time,"<br>";
}
solution_1();

// 2、编写代码实现随即产生40个字符的字符串，当中所有的字符串在a-z之间
//     1）把以上字符串中的e或者s加粗
//     2）统计里面有几个字符a
//     3) 查找里面有没有字符串“ab”
//     4) 去除字符串末尾5个字母
//     5）只显示字符串前10字符，后补省略号





?>