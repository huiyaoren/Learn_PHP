<?php
// 1、打印出前一天的时间格式是“年-月-日 时：分：秒”,并保存为时间数组
function solution_1(){

	date_default_timezone_set('PRC');

	$time = time();
	echo date('Y-m-d H:i:s', $time),"<br>";

	$time -= 24*60*60;
	echo date('Y-m-d H:i:s', $time),"<br>";

	// var_dump(getDate($time));

	return getDate($time);	
}

solution_1();


// 2、编写代码实现随即产生40个字符的字符串，当中所有的字符串在a-z之间
//     1）把以上字符串中的e或者s加粗
//     2）统计里面有几个字符a
//     3) 查找里面有没有字符串“ab”
//     4) 去除字符串末尾5个字母
//     5）只显示字符串前10字符，后补省略号
function solution_2(){
	for($i = 0;$i < 40;$i ++){
		$str .= chr(rand(97, 122));
	}
	echo $str,"<br>";

	$str_new = str_replace("s", "<strong>s</strong>", $str);
	$str_new = str_replace("e", "<strong>e</strong>", $str);
	echo $str_new,"<br>";

	echo "字符 a 出现了",substr_count($str, "a"),"次<br>";

	echo substr_count($str, "ab")?"含有":"不含有","字符串 \"ab\"<br>";

	echo substr($str, 0, -5),"<br>";

	echo str_replace(substr($str, 10), "...", $str);
}

solution_2();

?>