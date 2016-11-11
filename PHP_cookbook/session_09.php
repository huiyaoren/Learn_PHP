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


// ----------------------------------------------------------------------------
// 3.验证码表单输入：数字
function point_3(){
	// 大于等于 0 的整数
	if(! ctype_digit($_POST['age'])){
		print 'Your age must be a number bigger than or equal to zero.';
	}

	// 用类型转换法验证整数
	if($_POST['rating'] != strval(intval($_POST['rating']))){
		print 'Your rating must be an integer';
	}

	// 用类型转换法验证小数
	if($_POST['temperature']!=strval(floatval($_POST['temperature']))){
		print 'Your temperature must be a number'
	}
}
// is_number 会将 0xCAFE 和 10e40 都识别为数字
// intval('-6 week') => -6
// intval('30px') => 30
// 不包含数字时 返回 0 可作为过滤器
// 可用于获取 css 属性值 


// ----------------------------------------------------------------------------
// 4.验证码表单输入：电子邮件地址
// 略


// ----------------------------------------------------------------------------
// 5.验证码表单输入：下拉菜单
function point_5(){
	// 生成下拉菜单
	$choices = ['Eggs', 'Toast', 'Coffee'];
	echo "<select name='food'>\n";
	foreach ($choices as $choice) {
		echo "<option>$choice</option>\n";		
	}
	echo "</select>";

	// 验证菜单项目
	if(! in_array($_POST['food'], $choices)){
		echo "You must select a valid choice";
	}
}
// 参数是 关联数组时将 in_array() 换成 array_key_exists()


// ----------------------------------------------------------------------------
// 6.验证表单输入：单选按钮
function point_6(){
	// 生成单选按钮
	$choices = [
		'eggs' => 'Eggs Bendict',
		'toast' => 'Buttered Toast with Jam',
		'coffee' => 'Piping Hot Coffee'
	];
	foreach ($choices as $key => $choice){
		echo "<input type='radio' name='food' value='$key'/> $choice \n";
	}
	// 验证提交的单选按钮
	if(! array_key_exists($_POST['food'], $choices)){
		echo "You must select a valid choice.";
	}
}


// ----------------------------------------------------------------------------
// 7.验证表单输入：复选框
function point_7(){
	// 生成一个复选框
	$value = 'yes';
	echo "<input type='checkbox' name='subscribe' value='yes' /> Subscribe?";

	// 验证复选框
	if(isset($_POST['subscribe'])){
		// 所提供的值是正确的
		if($_POST['subscribe'] == $value){
			$subscribe = true;
		} else {
			// 所提供的值不正确
			$subscribe = false;
			print 'Invalid checkbox'
		}
	} else{
		// 没有提供值
		$subscribe =  false;
	}

	if($subscribe){
		print 'You are subscribed';
	}else{
		print 'You are not subscribed';
	}

	// 生成复选框
	$choices  = [
		'eggs'=>'Eggs Benedict',
		'toast' => 'Buttered Toast with Jim',
		'coffee' => 'Piping Hot Coffee'
	];
	foreach ($choise as $key => $choice) {
		echo "<input type='checkbox' name='food[]' value='$key' /> $choice \n";
	}
	// 验证复选框的值
	if(array_intersect($_POST['food'], array_keys($choice)) != $_POST['food']){
		echo "You must select only valid choice";
	}
}
// array_intersect() 函数用于筛选出两个数组的共同元素


// ----------------------------------------------------------------------------
// 8.验证表单输入：日期和时间
function point_8(){
	if(! checkdate($_POST['month'], $_POST['day'], $_POST['years'])){
		print "The date you entered doesn't exist!";
	}

	// 信用卡失效月份的初始时刻
	$expires = mktime(0, 0, 0, $_POST['month'], 1, $_POST['year']);
	// 下个月的初始时刻
	// 如果 date('n') + 1 == 13, mktime() 正常执行并使用
	// 下一年的一月份
	$nextMonth = mktime(0, 0, 0, date('n') + 1, 1);
	if($expires < $nextMonth){
		print "Sorry, that credit card expires too soon.";
	}
}


// ----------------------------------------------------------------------------
// 9.验证表单输入：信用卡
// 略


// ----------------------------------------------------------------------------
// 10.预防跨站点脚本
function point_10(){
	print 'The comment was';
	print htmlentities($_POST['comment']);
}
// 避免评论中的 HTML 或 JS 导致问题

