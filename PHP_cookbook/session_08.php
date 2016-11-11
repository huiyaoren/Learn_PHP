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


// ----------------------------------------------------------------------------
// 7.读取 Post 请求的主体
function point_7(){
	$body = file_get_contents('php://input');
}


// ----------------------------------------------------------------------------
// 8.生成交替样式的 HTML 表格
function point_8(){
	$style = ['even-row', 'odd-row'];
	$db = new PDO('sqlite:alrow.db');
	foreach($db->query('SELECT quantity,ingredient FROM ingredients') as $i=>$row){
	// <tr class="<?php echo $style[$i%2];">
	// 	<td></td>
	// 	<td></td>
	// </tr>
	// </table>
	}
}


// ----------------------------------------------------------------------------
// 9.使用 HTTP 的基本或摘要认证
function point_9(){
	header('WWW-Authienticate: Basic realm="My Website"');
	header('HTTP/1.0 401 Unauthorized');
	echo "You need to enter a valid username and password";
	exit();
}
function pc_validate($user, $pass){
	// 可用检查一个数据库替换
	$users = [
		'david'=>'asdf',
		'adam'=>'sdf'
	];
	if(isset($users['$user']) and ($users[$user] == $pass)){
		return true;
	}else{
		return false;
	}
}
// 全局变量 $SERVER['PHP_AUTH_USER'] $_SERVER['PHP_AUTH_PW'] 包含用户提供的用户名和密码
// 当浏览器收到 401 头部信息时 会弹出一个要求输入用户名和密码的对话框
// 然而并没有测试成功


// ----------------------------------------------------------------------------
// 10.使用 Cookie 认证
function point_10(){
	// 使用 Cookie 认证
	$secret_word = 'if i ate spinach';
	if(pc_validate($_POST['username'], $_POST['password'])){
		setcookie(
			'login',
			$_POST['username'].','.md5($_POST['username'].$secret_word)
		);
	}

	// 验证登陆 Cookie
	unset($username);
	if($_COOKIE['login']){
		list($c_username, $cookie_hash) = splite(',',$_COOKIE['login']);
		if(md5($c_username.$secret_word) == $cookie_hash){
			$username = $c_username;
		} else{
			print "You have sent a bad cookie.";
		}
	}
	if($username){
		print "Welcome , $username";
	} else{
		print "Welcome, anoymous user";
	}

	// 在 session 中保存登陆信息
	if(pc_validate($_POST['username'], $_POST['password'])){
		$_SESSION['login'] = $_POST['username'].','.md5($_POST['username'].$secret_word);
	}

	// 验证 session 信息
	if(isset($_SESSION['login'])){
		list($c_username, $cookie_hash) = explode(',', $_SESSION['login']);
		if(md5($c_username.$secret_word) == $cookie_hash){
			$username = $c_username;
		}else{
			print "You have tampered with your session";
		}
	}

	// 连接注销和登陆的使用
	if(pc_validate($_POST['username'], $_POST['password'])){
		$_SESSION['login'] = $_POST['username'].','.md5($_POST['username'].$secret_word);
		error_log('Session id'. session_id().' log in as '. $_REQUEST['username']);
		// 会向错误日志中加入一条信息
	}
}


// ----------------------------------------------------------------------------
// 11.把输出冲刷（Flusing）到浏览器
function point_11(){
	print 'Finding identical snowflakes...';
	flush();
	$sth = $dbh->query(
		'SELECT shape, COUNT(*) AS c FROM snowflakes GROUP BY shape HAVING c > 1'
	)	
}
// PHP 的缓存机制
// 当缓存未满或程序未计入的情况下 PHP 不会返回请求
// flush() 在缓存为满的情况下把先前缓存内的内容发送给客户端
// ？缓存是服务端的缓存还是客户端的缓存


// ----------------------------------------------------------------------------
// 12.缓存到浏览器的输出
function point_12(){

}


// ----------------------------------------------------------------------------
// 13.压缩 Web 输出
function point_13(){
	// 在 php.ini 中设置 zlib.output_compression=1
}


// ----------------------------------------------------------------------------
// 14.读取环境变量
function point_14(){
	$name = $_ENV['USER'];

	$path = getenv('PATH');
}


// ----------------------------------------------------------------------------
// 15.设置环境变量
function point_15(){
	// 设置一个环境变量
	putenv('ORACLE_SID=ORACLE');

	// 在 Apache 配置文件中设置一个环境变量
	// 这种方式设置的变量会出现在 $_SERVER 中而不是 $_ENV
	SetEnv DATABASE_PASSWORD password

	// 基于环境变量调整行为
	$version = $_SERVER['SITE_VERSION'];
	// 如果用户未正确登陆 则重定向
	if('members' == $version){
		if(!authenticate_user($_POST['username'], $_POST['password'])){
			header('Location: http://guest.example.com/');
			exit;
		}
	}
	include_once "${version}_header"; // 加载自定义的页眉
}


// ----------------------------------------------------------------------------
// 16.在 Apache 服务器内部通信
function point_16(){
	// 取值
	$session = apache_note('session');
	// 设置
	apache_note('session', $session);
	// 取得 session ID ,并将其添加到 Apache 的记录中
	apache_note('session_id', session_id());
}


// ----------------------------------------------------------------------------
// 17.编程：网站账户（反）激活
function point_17(){
	// 创建用户验证表的 SQL 语句
	$sql = 'CREATE TABLE users (
		eamil VARCHAR(255) NOT NULL,
		created_on DATETIME NOT NULL,
		verify_string VARCHAR(16) NOT NULL,
		verified TINYINT UNSIGNED
	)'

	// 连接到数据库
	$db = new PDO('sqlite:users.db');
	$email = 'david';

	// 生成验证字符串
	$verify_string = '';
	for ($i = 0;  $i < 16; $i++){
		$verify_string.= chr(mt_rand(32, 126));		
	}

	// 把用户信息插入到数据库
	// 其中使的是 SQLite 的 datetime() 函数
	$sth = $db->prepare(
		"INSERT INTO users ".
		"(email, created_on, verify_string, verified)".
		"VALUES (?, datetime('now'), ? ,0)"
	);
	$sth->execute([$email, $verify_string]);

	$verify_string = urlencode($verify_string);
	$safe_email = urlencode($email);

	$verify_url = "http://www.example.com/verifiy-user.php";

	$mail_body = <<<_MAIL_
	To $email:

	Please click on the following link to verify your account createtion:

	$verify_url?email=$safe_email&verify_string=$verify_string

	If you do not verify your account in the next seven days, it will be deleted.
_MAIL_;

	// mail($email, "User Verification", $mail_body);
	print "$email, $mail_body";

}

?>