<?php

function check_file($filename){
	// 查找目录
	$dir = @scandir($filename);

	foreach ($dir as $key => $value) {
		// var_dump(pathinfo($value));
		header("Content-Type:text/html;charset=gb2312");
		echo "<br>";

		if(is_dir($filename."/".$value)){
			$file_next = $filename."/".$value;
			echo "<a href='javascript:void(0);' onclick=\"window.location.href='file.php?next={$file_next}'\"";

			// check_file($filename."/".$value); 

			echo "';\" >",$value,"</a><br>";	
		}else{
			echo $value,"<br>";	
		}
	}


}

?>