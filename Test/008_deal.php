<?php
	if($_POST){
		echo '用户名：',$_POST['username'],'<br>';
		echo '密码：',$_POST['password'],'<br>';
		echo '性别：',$_POST['sex'],'<br>';
		echo '爱好1：',$_POST['hobby1'],'<br>';
		echo '爱好2：',$_POST['hobby2'],'<br>';
		echo '爱好3：',$_POST['hobby3'],'<br>';
		echo '学历：',$_POST['qualification'],'<br>';
		echo '自我介绍：',$_POST['balabala'],'<br>';
		echo "========================================<br>";
		echo '头像图片名：',$_FILES['head']['name'],'<br>';
		echo '头像图片临时地址：',$_FILES['head']['tmp_name'],'<br>';
		echo '头像图片类型：',$_FILES['head']['type'],'<br>';
		echo '头像图片大小：',$_FILES['head']['size'],'<br>';
		// var_dump($_FILES['head']['name']);
	}
?>