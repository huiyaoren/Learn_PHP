<?php


echo "hello world<br><br>";


// 1.四个整数，输出其中最大的数与次大数
function solution_1($list){
	rsort($list);
	echo "最大数：{$list[0]}， 最小数：{$list[1]}<br><br>";	
}

$num_list = [67, 100, 15, 31];
solution_1($num_list);


// 2.五门学科的成绩，计算出总分与平均分，平均保留一位小数输出结果。根据平均分划分等级（使用 if 和 switch 分别实现）
function solution_2($list){
	$sum = array_sum($list);
	$avg = round($sum/count($list), 2);
	// if 实现
	if($avg <= 59){
		$rank = "E";
	}else if($avg <=69){
		$rank = "D";
	}else if($avg <=79){
		$rank = "C";
	}else if($avg <=89){
		$rank = "B";
	}else {
		$rank = "A";
	}
	// switch 实现
	switch (floor($avg/10)) {
		case 10:
			$rank = "A";
			break;
		case 9:
			$rank = "A";
			break;
		case 8:
			$rank = "B";
			break;
		case 7:
			$rank = "C";
			break;
		case 6:
			$rank = "D";
			break;
		default:
			$rank = "E";
			break;
	}
	echo "总分：{$sum}，平均分：{$avg}，等级：{$rank}<br><br>";
};

$mark_list = [60, 76, 70, 90, 68];
solution_2($mark_list);


// 3.一个不少于5位的正整数，求出它是几位数：分别打印每一位数字，按逆序输出各位上的数字。
$int = 4567324;
function solution_3($int){
	$count = strlen($int);
	echo "{$int}是{$count}位数<br>";
	settype( $int, string);
	for($i=0;$i<$count;$i++){
		$n = $int[$count-$i-1];
		echo "{$n}<br>";
	}
	echo "<br>";
}

solution_3($int);


// 4.输出 1~100 之间的偶数，5个数字一行输出
function solution_4(){
	for($i=0;$i<100;$i++){
		if($i % 2 == 0){
			$n += 1;
			echo "{$i} ";
			if($n == 5){
				$n = 0;
				echo"<br>";
			}
		}
	}
	echo"<br>";
}

solution_4();


// 5.求 1!+2!+3!+...+10! 的值
function solution_5(){
	function factorial($int){
		if($int == 0){
			$result = 1;
		}else{
			$result = 1;
			for($i = 0;$i < $int;$i ++){
				$result *= ($i + 1);
			}
		}
		return $result;
	}
	
	for ($i = 0;$i < 10;$i ++){
		$sum += factorial($i + 1);
	}
	echo "{$sum}<br><br>";
}

solution_5();



// 6.输出该服务器的根目录，服务器名，端口，IP地址
function solution_6(){
	echo "服务器根目录：{$_SERVER['DOCUMENT_ROOT']}<br>";
	echo "服务器 IP 地址：{$_SERVER['SERVER_ADDR']}<br>";
	echo "服务器端口：{$_SERVER['SERVER_PORT']}<br>";
	echo "服务器名：{$_SERVER['SERVER_NAME']}<br>";
}

solution_6();


?>