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


// ----------------------------------------------------------------------------
// 3.通过 Cookie 定位 URL
function point_3(){
	// 通过 cURL 发送 cookie
	$c = curl_init('http://www.example.com/needs-cookies.php');
	curl_setopt($c, CURLOPT_COOKIE, 'user=ellen; activity=swimming');
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	$page = curl_exec($c);
	curl_close($c);

	// 通过 HTTP_Request 发送 cookie
	require 'HTTP/Request.php';
	$r = new HTTP_Request('http://www.example.com/needs-cookies.php');
	$r->addHeader('Cookie', 'user=ellen; activity=swimming');
	$r->dendRequst();
	$page = $r->getResponseBody();
}


// ----------------------------------------------------------------------------
// 4.通过任意头部信息定位 URL
function point_4(){
	// 通过 http 流来发送头部信息
	$url = 'http://www.example.com/special-header.php';
	$header = "X-Factor: 12\r\nMy-Header: Bob";
	$options = array('header' => $header);
	// 创建流环境
	$context = stream_context_create(array('http'=>$options));
	// 把环境传递给 file_get_contents($url, false, $context);
	print file_get_contents($url, false, $context);

	// 通过 cURL 来发送头部信息
	$c = curl_init('http://www.example.com/special-header.php');
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, array('X-Factor: 12', 'My-Header:Bob'));
	$page = curl_exec($c);
	curl_close($c);

	// 通过 HTTP_Request 发送头部信息
	require 'HTTP/Request.php';
	$r = new HTTP_Request('http://www.example.com/special-header.php');
	$r->addHeader('X-Factor', 12);
	$r->addHeader('My-Header', 'Bob');
	$r->sendRequest();
	$page = $r->getResponseBody();
}