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