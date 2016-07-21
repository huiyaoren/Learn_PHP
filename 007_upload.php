<?php

// 3、编写上传文件，程序方式控制上传文件大小（不超过2M），文件格式(只能上传rar文件)，并且给出相应提示（上传文件信息，上传成功或失败）
// 多文件上传

if($file = $_FILES['file']){


	echo "===================================","<br>";
	echo "文件名：",$file['name'],"<br>";
	echo "文件类型：",$file['type'],"<br>";
	echo "文件临时目录：",$file['tmp_name'],"<br>";
	echo "文件错误：",$file['error'],"<br>";
	echo "文件大小：",$file['size'],"<br>";
	echo "===================================","<br>";

	if($file['error']!='0'){
		echo "上传失败";
		return;
	}

	move_uploaded_file($file["tmp_name"], "upload/".$file["name"]);

	echo "上传成功<br>";
	// error_log($php_erromsg);
}


// 4、编写程序实现创建.txt文件，插入内容格式key1=value1
// key2=value2
// ...
// 然后编写程序实现使用某个key值查找文件中对应的value并打印出

$config = [
	'name1' => 'bob1',
	'name2' => 'bob2',
	'name3' => 'bob3',
	'name4' => 'bob4',
	'name5' => 'bob5',
	'name6' => 'bob6'
];

function config($list){
	$f = fopen('config.txt', 'w+');
	foreach ($list as $key => $value) {
		fwrite($f, $key." = ".$value."\r\n");
	}
	fclose($f);
}

function find_config($file, $config){
	$f = fopen('config.txt', 'r+');
	// rewind()
	while(!feof($f)){
		$l = fgets($f);
		// echo $l,'<br>';
		$line = explode("=",$l);
		if($config == trim($line[0])){
			echo trim($line[1]);
			return;
		}
	}
}
// config($config);
find_config('config.txt', 'name2');

?>