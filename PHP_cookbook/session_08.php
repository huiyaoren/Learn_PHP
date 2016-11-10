<?php 

// 第八章 Web基础
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.设置 Cookie
function point_1(){
	setcookie('flavor', 'chocolate');

	// 第三个参数 过期时间
	setcookie('flavor', 'chocolate', 3600*24);

	// 第四个参数 路径限制
	setcookie('flavor', 'chocolate', '', '/produncts/');

	// 第五个参数 域名限制
	setcookie('flavor', 'chocolate', '', '', '.example.com');

	// 最后一个可选参数是一个安全标记 true 以 SSL 连接发送 cookie
	// 但别忘了 cookie 还是以明文保存在客户端上
}


// ----------------------------------------------------------------------------
// 2.读取 Cookie 的值
function point_2(){
	// 读取 cookie
	if(isset($_COOKIE['flavor'])){
		print "You ate a {$_COOKIE['flavor']} cookie.";
	}

	// 读取所有 cookie
	foreach ($_COOKIE as $cookie_name => $cookie_value) {
		print "$cookie_name = $cookie_value <br/>";
	}
}


// ----------------------------------------------------------------------------
// 3.删除 Cookie
function point_3(){
	setcookie('flavor', '', 1);
}


// ----------------------------------------------------------------------------
// 4.重定向到一个不同位置
function point_4(){
	header('Location: http://www.example.com/catalog/index.php');
	exit;
}
// 重定向 URL 应该包含协议和主机名 http://  www.example.com


// ----------------------------------------------------------------------------
// 5.检测不同的浏览器
function point_5(){
	$browser = get_browser();
	if($browser->frames){

	} elseif($browser->tables){

	} else{

	}
}
// 浏览器能力对象的属性
// platform 浏览器运行的操作系统
// version 浏览器版本号
// majorver 浏览器主版本号
// minorver 次版本号
// frames 支持框架
// tables 支持表格
// cookies 支持 cookie
// backgrounfsounds 支持 <embed> <bgsound> 添加的背景声音
// vbscipt 支持 VBS
// javascript 支持 js
// javaapplets 支持 Java applets
// activexcontrols 支持 ActiveX


// ----------------------------------------------------------------------------
// 6.建立查询字符串
function point_6(){
	$vars = [
		'name' => 'Oscar the Grouch',
		'color' => 'green',
		'favorite_punctuation' => '#'
	];
	$query_string = http_build_query($vars);
	$url = '/muppet/select.php?'.$query_string;
}
// /muppet/selct.php?name=Oscar+the+Group&color=green&favorite_punctuation=%23
// 特殊字符也按照十六进制编码
// 为避免嵌入的参数被 HTML 错误解析:(&amp => &) 使用 htmlentities($query_string)
