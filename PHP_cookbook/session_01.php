<?php 

// 第一章 字符串


// ----------------------------------------------------------------------------
// 1.访问子字符串
function access_string(){
	$email = 'adminexmaple.com';
	if(strpos($email, '@') === false){
		print 'There is no @ in the e-mail address!<br>';
	}
}
// access_string();

// strpos() 返回 查找项在字符串中的起始位置，如果没有找到该项,则返回 false
// 当查找项在首位时会返回 0，易与 false 混淆
// 所以 不应使用 相等操作符（==），而应该使用 等同操作符（===）


// ----------------------------------------------------------------------------
// 2.提取字符串
function extract_string(){
	$string = ':admin';
	$username = substr($username, 1, 5);
	print $username;
}
// extract_string();

// $substring = substr($str, $start, $length)
// $start 和 $length 是正值时：从 $start 开始 返回 $length 个字符
// 略去 $length 时：返回从 $start 到结尾的字符串
// $start 大于字符串的长度时：返回 flase
// $start + $length 大于总长时：返回从 $start 到结尾的字符串
// $length 小于0 时：$length 不再代表长度，而是表示结束位置


// ----------------------------------------------------------------------------
// 3.替换字符串

?>