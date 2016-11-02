<?php
// 1、产生一个由10个元素组成的一维数组并输出，数组元素由随机数（0-99）构成。求该数组的最大值、最小值、总和和平均值并输出。
function solution_1(){
	$arr = [];
	for($i = 0;$i < 10;$i++){
		$arr[$i] = rand(0, 99);
	}
	var_dump($arr);
	echo '<br>';
	echo '最大值：',max($arr),'<br>';
	echo '最小值：',min($arr),'<br>';
	echo '总和：',array_sum($arr);
	echo '平均数：',array_sum($arr)/count($arr),'<br><br>';
}
solution_1();


// 2、做个二维数组，存储图书馆图书信息，书（名称，类别，出品时间，作者，价格）
//    1）初始化5本
//    2）往中间插入一本书（PHP，计算机，。。。）；
//    3）循环打印出所有书的信息---封装成函数
//    4）替换
//    5）删除
function solution_2(){

	//    1）初始化5本
	$book_list = [
		[
			'name' => '人月神话', 
			'class' => '软件开发', 
			'production_time' => '2002-11' ,
			'author' => 'FrederickP.Brooks.Jr.', 
			'price' => 29.80
		],
		[
			'name' => '代码大全', 
			'class' => '软件构建', 
			'production_time' => '2006-03' ,
			'author' => 'Steve McConnell', 
			'price' => 98.00
		],
		[
			'name' => '算法导论', 
			'class' => '计算机理论', 
			'production_time' => '2006-9' ,
			'author' => 'Thomas H.Cormen、Charles E.Leiserson、Ronald L.Rivest、Clifford Stein', 
			'price' => 128.00
		],
		[
			'name' => '黑客与画家', 
			'class' => '计算机技术', 
			'production_time' => '2011-04' ,
			'author' => 'paul graham', 
			'price' => 49.00
		],
		[
			'name' => '菊与刀', 
			'class' => '人文社科', 
			'production_time' => '2016-07' ,
			'author' => '鲁思·本尼迪克特', 
			'price' => 35.00
		]
	];

	//    2）往中间插入一本书（PHP，计算机，。。。）；
	array_splice($book_list, 2, 0, [[
			'name' => 'PHP 经典实例', 
			'class' => '计算机', 
			'production_time' => '2009-10' ,
			'author' => '斯克拉', 
			'price' => 98.00
		]]
	);

	// var_dump($book_list);

	//    3）循环打印出所有书的信息---封装成函数
	function print_array($list){
		foreach($list as $book){
			foreach ($book as $key => $val) {
				echo $key,':',$val,'<br>';
			}
			echo '<br>';
		}
	}
	// todo 62 行插入数据后函数会出现警告 ( 插入时未处理好列表嵌套 [[]] -> [] )
	print_array($book_list);

	//    4）替换
	array_splice($book_list, 2, 1, [[
			'name' => '深入理解计算机系统', 
			'class' => '计算机', 
			'production_time' => '2006-07' ,
			'author' => 'Randal E.Bryant', 
			'price' => 89.00
		]]
	);
	// print_array($book_list);

	//    5）删除
	array_splice($book_list, 2, 1);
	// print_array($book_list);
}
solution_2();
   
   
// 3、一行字符，统计大写字母、小写字母、数字以及其他字符个数。
function solution_3(){
	$str = 'Python3 Web 开发';
	echo $str,'<br>';

	for($i = 0;$i < strlen($str);$i++){
		if(ord($str[$i]) >= 65 and ord($str[$i]) <= 90){
			$big_count += 1;
		}elseif (ord($str[$i]) >= 98 and ord($str[$i]) <= 122) {
			$small_count += 1;
		}elseif (ord($str[$i]) >= 48 and ord($str[$i]) <= 57) {
			$num_count += 1;
		}else{
			$other_count += 1;
		}
	}
	echo '大写字母：',$big_count;
	echo '小写字母：',$small_count;
	echo '数字：',$num_count;
	echo '其他：',$other_count;
	
	// todo 尝试用 foreach 实现 ?
}
solution_3();

// 越野机车后台管理系统
// 菜单  多维数组
?>