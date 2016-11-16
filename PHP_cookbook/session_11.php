<?php 

// 第十一章 Session 和数据库保持
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.使用 Session 跟踪
function point_1(){
	session_start();
	$_SESSION['visits']++;
	print 'You have visited here'. $_SESSION['visits'].' times';
}
// session_start 函数通过发布带有随机生成的 sessionID 的 cookie 来掌握用户信息
