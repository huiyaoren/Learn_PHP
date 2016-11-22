<?php 

// 第十三章 Web 自动化
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.通过 GET 方法定位 URL
function point_1(){
	// 用 file_get_contents() 取得 url 的内容
	$page = file_contents('http://www.example.com/robots.txt');
}
// file_get_contents() 必须要启用 allow_fopen_configuration


// ----------------------------------------------------------------------------
// 2.通过 POST 方法定位 URL
function  point_2(){
	// 通过 POST 方法使用 http 流
	$url = 'http://www.example.com/submit.php';
	// 将提交的数据编码为查询字符串
	// 键值对
	$body = 'monkey=uncle&rhino=aunt';
	$options = array('method'=>'POST', 'content'=>$body);
	// 创建流环境
	$context = stream_context_create(array('http'=>$options));
	// 把环境传递给 file_get_contents()
	print file_get_contents($url, false, $context);

	// 使用 cURL 时使用 POST 方法
	$url = 'http://www.example.com/submit.php';
	$body = 'monkey=uncle&rhino=aunt';
	$c = curl_int($url);
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_POSTFIELDS, $body);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	$page = curl_exec($c);
	curl_close($c);
}