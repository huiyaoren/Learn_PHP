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
?><?php


// ----------------------------------------------------------------------------
// 2.验证码表单输入：必填字段
function point_2(){
	if(!strlen($_POST['flavor'])){
		print 'You must enter your favorite ice cream flavor';
	}

	// 严格的表单验证
	// 检查是否存在 $_POST['flavor'] 是否存在
	if(!(isset($_POST['flavor']) and strlen($_POST['flavor']))){
		print 'You must enter your favorite ice cream flavor';
	}
	// $_POST['color'] 是可选的 但如果不留空就必须大于 5 个字符
	if(isset($_POST['color']) and (strlen($_POST['color'])<=5)){
		print 'Color must be more than 5 characters';
	}
	// 确保 $_POST['choices'] 存在并且是一个数组
	if(!(isset($_POST['choices']) and is_array($_POST['choices']))){
		print 'You must select some choices';
	}
}
// 避免把 0 误认为 false 应该用 strlen 验证而不是 empty

