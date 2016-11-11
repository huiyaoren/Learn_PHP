<?php 

// 第九章 表单
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 0.
function point_0(){
	// $_REQUEST 变量包含 $_GET $_POST $_FILES $_COOKIE $_SERVER $_ENV 的内容
	// php.ini 下 默认 variavles_order = EGPCS 时
	// $_REQUEST 的添加顺序是 ENV GET POST COOKIE SERVER
}


// ----------------------------------------------------------------------------
// 1.处理表单的输入
function point_1(){}?>
<?php if($_SERVER['REQUEST_METHOD'] == 'GET'){?>
<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
	What is your first name?
	<input type="text" name="first_name" />
	<input type="submit" value="Say Hello" />
</form>
<?php } else{
	echo 'Hello, '.$_POST['first_name'].'|';
}
?>

