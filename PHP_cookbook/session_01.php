<?php 

// 第一章 字符串
if($_GET['a']){
	$_GET['a']();
}
// ----------------------------------------------------------------------------
// 1.访问子字符串
function access_string(){
	$email = 'adminexmaple.com';
	if(strpos($email, '@') === false){
		print 'There is no @ in the e-mail address!<br>';
	}
}
// access_string();

// strpos() 返回 查找项在字符串中的起始位置，如果没有找到该项,则返回 false
// 当查找项在首位时会返回 0，易与 false 混淆
// 所以 不应使用 相等操作符（==），而应该使用 等同操作符（===）


// ----------------------------------------------------------------------------
// 2.提取字符串
function extract_string(){
	$string = ':admin';
	$username = substr($username, 1, 5);
	print $username;
}
// extract_string();

// $substring = substr($str, $start, $length)
// $start 和 $length 是正值时：从 $start 开始 返回 $length 个字符
// 略去 $length 时：返回从 $start 到结尾的字符串
// $start 大于字符串的长度时：返回 flase
// $start + $length 大于总长时：返回从 $start 到结尾的字符串
// $length 小于0 时：$length 不再代表长度，而是表示结束位置


// ----------------------------------------------------------------------------
// 3.替换字符串
function replace_string(){
	$str = 'hello word';
	echo substr_replace($str, 'PHP', 6, 4),'<br>';

	$str_too_long = "Today, I have a dream.But, balabalabalabalabalabalabalabalabalabalabalabala";
	echo substr_replace($str_too_long, '...', 25);
}
// replace_string();

// 方法参数设置与 substr() 类似
// 可以实现删除($str, '', 6, 4)、替换($str, 'PHP', 6, 4)、插入($str, 'PHP', 0, 0)
// 可用于省略显示长文本


// ----------------------------------------------------------------------------
// 4.逐字节处理字符
function for_string(){

	// 计算元音字母数量
	$str = 'Today, I have a dream.';
	for ($i = 0; $i < strlen($str); $i++) {
		if (strstr('AEIOUaeiou', $str[$i])) {
			$vowels++;
		}
	}
	echo $vowels;
}
// for_string();

// 就是 for 循环没什么可说的


// ----------------------------------------------------------------------------
// 5.按字或按字节反转字符串
function reverse_string(){
	$str = 'Today, I have a dream.';

	// 按字符
	echo strrev($str),'<br>';
	// 按字
	$words = explode(' ', $str);
	$words = array_reverse($words);
	$str_r = implode(' ', $words);
	echo $str_r, '<br>';
 		// or
 	echo implode(' ', array_reverse(explode(' ', $str)));
}
// reverse_string();


// ----------------------------------------------------------------------------
// 6.扩展和压缩制表符
// 略


// ----------------------------------------------------------------------------
// 7.控制大小写
function b_s_control(){
	$str = 'Today, I have a dream.';

	// 将字符串中的第一个字母转成大写
	echo ucfirst($str), '<br>';
	// 将字符串中每个单词的首字母转成大写
	echo ucwords($str), '<br>';
	// 全转大写
	echo strtoupper($str), '<br>';
	// 全转小写
	echo strtolower($str), '<br>';
}
// b_s_control();


// ----------------------------------------------------------------------------
// 8.在字符串中插入函数和表达式
// 略 {}


// ----------------------------------------------------------------------------
// 9.删除字符串两端的空白符
function delete_empty(){
	$str = "<h1>\n + balabala + \n</h1>";

	// 删除开始和结束处
	echo trim($str), '<br>';
	// 删除开始处
	echo ltrim($str), '<br>';
	// 删除结尾处
	echo rtrim($str), '<br>';
}
// delete_empty();
// 空白符包括：换行符、回车符、空格符、制表符、以及 Null


// ----------------------------------------------------------------------------
// 10.生成逗号分隔的数据
function create_csv(){

	$sales = [
		['NE', '2005-01-01', '2005-01-01', 12.54],
		['NW', '2005-01-01', '2005-01-01', 546.33],
		['SE', '2005-01-01', '2005-01-01', 93.26],
		['SW', '2005-01-01', '2005-01-01', 945.21],
		['All Regious', '--', '--', 1597.34]
	];

	// 写入数据到 csv 文件中
	function create_csv_in_file($sales){
		$fh = fopen('sales.csv', 'w') or die("Can't open sales.csv");
		foreach ($sales as $sales_line){
			if(fputcsv($fh, $sales_line) === false){
				die("Can't write CSV line");
			}
		}
		fclose($fh) or die("Can't close sale.csv");
	}

	// 写入特殊的输出流 php://output 中
	function create_csv_in_data($sales){
		$fh = fopen('php://output', 'w');
		foreach ($sales as $sales_line){
			if(fputcsv($fh, $sales_line) === false){
				die("Can't write CSV line");
			}
		}
		fclose($fh);
	} 

	// 写到字符串中
	function create_csv_in_str($sales){
		ob_start();
		$fh = fopen('php://output', 'w') or die("Can't open php://output");
		foreach($sales as $sales_line){
			if(fputcsv($fh, $sales_line) === 1){
				die("Can't write CSV line");
			}
		}
		fclose($fh) or die("Can't close php://output");
		$output = ob_get_contents();
		ob_end_clean();
	}


	create_csv_in_file($sales);
	// create_csv_in_data($sales);
	// create_csv_in_str($sales);
}


// ----------------------------------------------------------------------------
// 11.解析逗号分隔的数据
function decode_csv_in_html_table(){
	create_csv();

	$fp = fopen('sales.csv', 'r') or die("can't open file");
	print "<table>\n";
	while($csv_line = fgetcsv($fp)){
		print '<tr>';
		for($i = 0, $j = count($csv_line); $i<$j;$i++){
			print '<td>'.htmlentities($csv_line[$i]).'</td>';
		}
		print "</tr>\n";
	}
	print "</table>\n";
	fclose($fp) or die("can't close file");
}

// fgetcsv() 提供第二个参数 是一个大于 CSV 文件中最长一行的值 
// 如果不指定 函数会读取一整行数据
// 当平均长度超过 8192 字节时，指定明确的行长度会使运行速度加快
// 避免用 explode() 按照逗号解析


// ----------------------------------------------------------------------------
// 12.生成字段宽度固定的数据记录
function create_pack(){
	$books = [
		['Elmer Gantry', 'Sinclar Lewis', 1927],
		['The Scarlatte Inhertance', 'Robert Ludlum', 1972],
		['The Parsifal Mosaic', 'William Styron', 1979]
	];

	// 1-32 生成固定宽度字段的数据记录
	function create_pack_with_pack($books){
		foreach ($books as $book){
			// A25A15A4 告诉 pack() 把后面的参数分别转换成 25 14 4 个字符长以空格填充的字符串
			print pack('A25A15A4', $book[0], $book[1], $book[2])."\n";
		}	
	}

	// 1-33 不用 pack 函数生成固定宽度字段的数据记录
	function create_pack_without_pack($books){
		foreach($books as $book){
			// 使用 substr() 来确保每个字段不会过长
			// 使用 str_pad() 来保证每个字段不会过短
			$title = str_pad(substr($book[0], 0, 25), 25, '.');
			$author = str_pad(substr($book[1], 0, 15), 15, '.');
			$year = str_pad(substr($book[2], 0, 4), 4, '.');
			print "{$title}{$author}{$year}\n";
		}
	}
	create_pack_without_pack($books);
}


// ----------------------------------------------------------------------------
// 13.解析字段宽度固定的数据记录
function decode_pack(){
	// 1-34 用 substr() 函数解析固定宽度的记录
	function decode_pack_with_substr(){
		$fp = fopen('fixed-with-records.txt'. 'r') or die("can't open file");
		while($s = $fgets($fp, 1024)){
			$fields[0] = substr($s, 0, 10);
			$fields[1] = substr($s, 10, 5);
			$fields[2] = substr($s, 15, 12);
			// 调用对这个数组进行处理的函数
			process_fields($fields);
		}
		fclose($fp) or die("cna't close file");
	}

	// 1-35 用 unpack() 函数解析固定宽度的记录
	function decode_pack_with_unpack(){
		$fp = fopen('fixed-with-records.txt'. 'r') or die("can't open file");
		while($s = $fgets($fp, 1024)){
			$fields = unpack('A25title/A15author/A4publication_year', $s);
			// 调用对这个数组进行处理的函数
			process_fields($fields);
		}
		fclose($fp) or die("cna't close file");
	}

	// 如果把字段名和宽度分别以独立数组的形式传递给一个解析函数

	// 1-36 pc_fixed_width_substr() 函数
	function pc_fixed_width_substr($fields, $data){
		$r = [];
		for($i=0,$j=count($data);$i<$j;$i++){
			$line_pos = 0;
			foreach($fields as $field_name => $field_length){
				$rs[$i][$field_name] = rtrim(subtr($data[$i], $line_pos, $field_length));
				$line_pos += $fields_length;				
			}
		}
		return $rs;
	}

	$book_fields = [
		'title' => 25,
		'author' => 14,
		'publication_year' => 4
	]
	$book_array = pc_fixed_width_substr($book_fields, $books);

	// 1-37 pc_fixed_width_unpack() 函数
	function pc_fixed_width_unpack($format_string, $data){
		$r = [];
		for($i = 0 ,$j=count($data);$i<$j;$i++){
			$r[$i] = unpack($format_string[$i])
		}
		return $r
	}

	$book_array = pc_fixed_width_unpack('A25title/A15author/A4publication_year', $books);

	// 1-38 用 str_split() 分割字符串
	function pack_split(){
		$fields = str_split($line_of_data, 32);
		// $fields[0] 保存 0-31 字节
		// $fields[1] 保存 32-63 字节
		// 以此类推
	}
}


// ----------------------------------------------------------------------------
// 14.分离字符串
function split_sting(){
	// 用固定字符串作为分隔符 使用 explode() 函数
	$words = explode(' ', 'My sentence is not very complicated');
	// 用正则表达式描述分隔符 使用 split() 或 reg_split()
	$words = split(' +', 'This  sentence  has  extra  whitespace  in it.');
	$words = preg_split('/\d\. /', 'my day: 1. get up 2. get dressed 3. eat toast');
	$lines = preg_split('/[\n\r]+/', $_REQUST['textarea']);
	// /i 标志表示匹配的分隔符不区分大小写
	$words = spliti(' x ', '31 inches x 22 inches X 9 inches');
	$words = preg_split('/ x /i', '31 inches x 22 inches X 9 inches');
}


// ----------------------------------------------------------------------------
// 15.使文本在特定长度换行
function text_wrap(){
	$s = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	// 默认情况 wordwrap() 按照 75 字符自动换行
	print "<pre>".wordwrap($s)."\n</pre>";
	// 第二个参数指定不同行长度
	print wordwrap($s, 50);
	// 第三个参数可指定其他换行符
	print wordwrap($s, 50, "\n\n");
	// 第四个参数控制对比指定长度更长的单词的处理方式 值为 1 时超出长度的单词会换行 否则保留原来长度
}


// ----------------------------------------------------------------------------
// 16.在字符串中储存二进制数据
function save_data_in_str(){
	// 使用 pack() 把二进制数据保存到一个字符串中
	$packed = pack('S4', 1974, 106, 28225, 32725);
	// 使用 unpack() 从一个字符串中抽取二进制数据
	$num = unpack('S4', $packed);
}


?>