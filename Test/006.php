<?php

// 1、实现对文件夹或文件删除（注意：文件夹内部可包含其他文件夹或文件）
function delete_file($file){

	// 判断是目录还是文件
	if(is_dir($file)){
		
		$f = scandir($file);
		foreach ($f as $filename) {

			if($filename!='.' and $filename!='..'){

				// 递归删除文件内的文件或目录
				delete_file($file."/".$filename); // ??
			}
		} 

		// 删除目录
		echo @rmdir($file);
	
	}
	// 删除文件
	else{

		if(file_exists($file)){

			unlink($file);
		}
	}


}


// 新建待删文件、目录
@mkdir('test', 0777, true);
fopen('test/test.txt', 'w');

// delete_file('./test');



// 2、制作简单文件查看器（根据不同格式显示不同小图标，如果是目录可进入目录查看） 

function check_file($filename){
	// 查找目录
	$dir = @scandir($filename);

	foreach ($dir as $key => $value) {
		// var_dump(pathinfo($value));
		header("Content-Type:text/html;charset=gb2312");
		// iconv() // 转码
		echo "<br>";

		if(is_dir($filename."/".$value)){
			$file_next = $filename."/".$value;
			echo "<a href='javascript:void(0);' onclick=\"window.location.href='006.php?next={$file_next}'\"";

			// check_file($filename."/".$value); 

			echo "';\" >",$value,"</a><br>";	
		}else{
			echo $value,"<br>";	
		}
	}


}

if($_GET[$next = 'next']){
	// $a=@(10/0);
	// error_log($php_errormsg);
	check_file($_GET[$next = 'next']);
}else{
	check_file('./test');
}


?>