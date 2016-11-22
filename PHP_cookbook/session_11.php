<?php 

// 第十一章 Session 和数据库保持
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.使用 Session 跟踪
function point_1(){
	session_start();
	$_SESSION['visits']++;
	print 'You have visited here'. $_SESSION['visits'].' times';

	// 禁用 cookie 时自己添加 sessionID 到 Location 头
	$redirect_url = 'http://www.example.com/areplane.php';
	if(defined('SID') and (!isset($_COOKIE[session_name()]))){
		$redirect_url .= '?' . SID;
	} 
	header("Lacation: $redirect_url");
}
// session_start 函数通过发布带有随机生成的 sessionID 的 cookie 来掌握用户信息
// session.auto_start = 1 就不需要调用 session_start() 函数
// session.use_trans_sid 启用时 用户不接受 cookie 时会把 sessionID 添加到 URL 和表单中


// ----------------------------------------------------------------------------
// 2.预防 session 劫持
function point_2(){
	// 用 cookie 来传递 sessionID 同时生成一个 URL 传递的 session token
	// 只有当请求包含有的 sessionID 和有效的 session token 时 才可以访问 session

	ini_set('session.use_only_cookies', true);
	session_start();

	$salt = 'YourSpecialValueHere';
	$tokenstr = (str) date('W').$salt;
	$token = md5($tokenstr);

	if(!isset($_REQUEST['token']) or $_REQUEST['token']!= $token){
		exit;
	}

	$_SESSION['token'] = $token;
	output_add_rewrite_var('token', $token);
}


// ----------------------------------------------------------------------------
// 3.预防 session 定置
function point_3(){
	ini_set('session.use_only_cookie', true);
	session_start();
	if(!isset($_SESSION['genrated']) or $_SESSION['generated']) < (time() - 30){
		session_regenerate_id();
		$_SESSION['generated'] = time();
	}
}
// 1.定期生成新 sessionID
//		sessionID 频繁改变 攻击者难有时机获取有效的 sessionID
// 2.session 行为设置只能使用 cookie
// 		session.use_only_cookie 设置 不会有 cookie 留在浏览器的历史记录和服务器中


// ----------------------------------------------------------------------------
// 4.在数据库中保持 session
function point_4(){
	// 使用 PEAR 的 Http_session 包就可以方便地实现在数据库中储存 session
	require_once 'HTTP/Session/Container/DB.php';

	$s = new HTTP_Session_Container_DB('mysql://user:password@localhost/db');
	ini_get('session.auto_start') or session_start();
}


// ----------------------------------------------------------------------------
// 5.在共享内存中保存 session
function point_5(){
	$s = new pc_Shm_Session();
	ini_get('session.auto_start') or session_start();
}


// ----------------------------------------------------------------------------
// 6.在共享内存中保存独立数据
function point_6(){
	// 存
	$shm = new pc_Shm();
	$secret_code = 'land shark';
	$shm->save('mysecret', $secret_code);

	// 取
	$shm = new pc_Shm();
	print $shm->fetch('mysecret');
}
// 如果 Web 服务器的磁盘 I/O 繁忙时 shmop 函数实现高性能信息存储和检索十分有意义
// 默认情况下 pc_Shm 类为每个值分配了 16kb 的空间


// ----------------------------------------------------------------------------
// 7.在摘要表中缓存计算结果
function point_7(){
	$st = $db->prepare('SELECT COUNT(*) FROM searchsummary WHERE sdate = ?');
	$st->execute(array(date('Y-m-d', strtotime('yesterday'))));
	$row = $st->fetch();

	// 缓存中没有匹配的信息
	if($row[0] == 0){
		$st2 = $db->prepare('SELECT searchterm, source, FROM_DAYS(TO_DAYS(dt)) AS sdate, COUNT(*) as searches WHERE TO_DAYS(dt)  = ?');
		$st2->execute(array(date('Y-m-d', strtotime('yesterday'))));
		$stInsert = $db->prepare('INSERT INTO searchsummary (searchterm, source, sdate, searches) VALUES (?,?,?,?)');
		while($row->fetch(PDO::FETCH_NUM)){
			$stInsert->execute($row);
		}
	}
}