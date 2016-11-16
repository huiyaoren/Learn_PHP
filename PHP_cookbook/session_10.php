<?php 

// 第十章 访问数据库
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.使用 DBM 数据库
function point_1(){
	$dbh = dba_open('fish.db', 'c', 'gdbm') or die($php_errormsg);

	// 取得并修改值
	if(dba_exists('flounder', $dbh)){
		$flounder_count = dba_fetch('flounder', $dbh);
		$flounder_count++;
		dba_replace('flounder', $flounder_count, $dbh);
		print "Updated the flounder count";
	} else {
		dba_insert('flounder', 1, $dbh);
		print "Started the flounder count";
	} 

	// 没有罗非鱼了
	dba_delete('tilapia', $dbh);

	// 还有什么鱼
	for($key = dba_fiestkey($dbh);$key!== false; $key =dba_nextkey($dbh)){
		$value = dba_fetch($key, $dbh);
		print "$key:$value\n";
	}

	dba_close($dbh);
}


// ----------------------------------------------------------------------------
// 2.使用 SQLite 数据库
function point_2(){
	$db = new PDO('sqlite:/usr/local/zodiac');

	// 创建表并自动插入数据
	$db->beginTransaction();
	// 试着查找名为 zodiac 的表
	$q = $db->query("SELECT name FROM sqlite_master WHERE type = 'table'"."AND name='zodiac'");
	// 如果查询中没有返回结果行 就创建这个表并插入数据
	if($q->fetch() === false){
		$db->exec(<<<_SQL_
			CREATE TABLE zodiac (
				id INT UNSIGNED NOT NULL
			)
_SQL_;
			);
		// 独立的 SQL 语句
		$sql = <<<_SQL_
		INSERT INTO zodiac VALUS (2);
		INSERT INTO zodiac VALUS (3);
_SQL_;

		// 将 SQL 语句按行分割并逐一执行
		foreach(explode("\n", trim($sql)) as $q){
			$db->exec(trim($q));
		}
		$db->commit();
	} else {
		// 结束事务
		$db->rollback();
	}
}


// ----------------------------------------------------------------------------
// 3.连接到 SQL 数据库
function point_3(){
	// MySQL 希望在字符串中嵌入参数
	$mysql = new PDO('mysql:host=db.example.com', $user, $password);
	// 用 ; 分隔多个参数
	$mysql = new PDO('mysql:host=db.example.com;port=31075;dbname=food', $user, $password);
	// 连接到本地 Mysql 服务器
	$mysql = new PDO('mysql:unix_socket=/tmp/mysql.sock', $user, $password);

	// postgreSQL
	// Oracle
	// Sybase
	// ODBC
}


// ----------------------------------------------------------------------------
// 4.查询一个 SQL 数据库
function point_4(){
	$st = $db->query('SELECT symbol, planet FROM zodiac', PDO::FETCH_BOUND);
	foreach($st->fetchAll() as $row){
		print "{$row['symbol']} goes with {$row['planet']} <br/>\n";
	}
}


// ----------------------------------------------------------------------------
// 5.不通过循环抽取记录
function point_5(){
	$st = $db->query('SELECT planet, element FROM zodiac');
	$results = $st->fetchAll();
	foreach ($results as $i => $result) {
		print "Planet $i is {$result['planet']} <br/>\n";
	}
}


// ----------------------------------------------------------------------------
// 6.修改 SQL 数据库中的数据
function point_6(){
	$db->exec("INSERT INTO family (id, name) VALUES(1, 'vito')");
	$db->exec("DELETE FROM family WHERE name LIKE 'Fredo'");
	$db->exec("UPDATE family SET is_naive = 1 WHERE name LIKE 'Kay'");
	$st = $db->prepare('INSERT INTO family (id,name) VALUES (?,?)');
	$st->execute([1, 'Fredo']);
}


// ----------------------------------------------------------------------------
// 7.有效地重复查询
function point_7(){
	// 准备
	$st = $db->prepare("SELECT sign FROM zodiac WHERE element LIKE ?");
	// 执行一次
	$st = execute(['fire']);
	while($row = $st->fetch()){
		print $row[0]."<br/>\n";
	}
	// 在执行一次
	$st->execute(['water']);
	while ($row = $st->fetch()){
		print $row[0]. "<br/> \n";
	}

	// 使用命名的占位符
	$st =  $db->prepare(
		"SELECT sign FROM zodiac WHERE element LIKE :element OR planet LIKE :planet"
	);
	$st->execute(['planet'=>'Mars', 'element'=>'earth']);
	$row = $st->fetch();
	// 也可以通过 binkParam() 函数绑定参数
}


// ----------------------------------------------------------------------------
// 8.确定查询返回的行数
function point_8(){
	// PDO::exec() 发送 INSERT UPDATE DELETE 时 exec() 方法的返回找就是被更新的行数
	// PDO::prepare() 和 PDOStatement::execute() 来发送时通过 PDOStatement::rowCount() 来获取
	$st = $db->prepare('DELETE FROM family WHERE name LIKE ?');
	$st->execute(['Fredo']);
	print "Deleted rows:". $st->rowCount();
	$st->execute(['Sonny']);
	print "Deleted rows:". $st->rowCount();
}
// 并非所有数据库会提供 rowCount() 信息 不应该过度依赖这一特性


// ----------------------------------------------------------------------------
// 9.转义引号
function point_9(){
	$safe = $db->quote($_GET['searchTerm']);
	$sate = strstr($sate, ['_'=>'\_',  '%'=>'\%']);
	$st = $db->query("SELECT * zodiac WHERE planet LIKE $safe");

	// 检查魔术引号
	// magic_quotes_sybase 的行为也是一个影响因素
	if(get_magic_quotes_gpc() and (! ini_get('magic_quotes_sybase'))){
		$fruit = $_GET['fruit'];
	}
	$st = $db->prepare('UPDATE orchard SET trees = trees - 1 WHERE fruit = ?');
	$st->execute([$fruit]);
}


// ----------------------------------------------------------------------------
// 10.记录调试信息和错误
function point_10(){
	// 操作失败后使用 PDO::errorCode() PDOStatement::errorCode() 获得相应错误代码
	// 对应的 errorInfo() 方法则会返回关于错误的更多信息

	// 输出错误信息
	$st = $db->prepare('SELECT * FROM imaginary_table');
	if(! $st){
		$error = $db->errorInfo();
		print "Problem ({$error[2]})";
	}

}


// ----------------------------------------------------------------------------
// 11.创建唯一的标识符
function point_11(){
	$st = $db->perpare('INSERT INTO users (id, name) VALUS(?, ?)');
	$st->execute([uniqid(), 'Jacob']);
	$st->execute([md5(uniqid()), 'Ruby']);	
}
// 也可以使用 autoincrement


// ----------------------------------------------------------------------------
// 12.以程序化的方式建立查询
function point_12(){
	// 一个字段名列表
	$fields = ['symbol', 'planet', 'element'];

	$update_fields = [];
	$update_values = [];
	foreach ($fields as $field) {
		$update_values[] = "field = ?";
		// 假定数据来自表单
		$update_values[] = $_POST[$field];
	}
	$st = $db->prepare("UPDATE zodiac SET". implode(',', $update_fields).'WHERE sign = ?');
	// 把 'sign' 的值添加到值数组中
	$update_values[] = $_GET['sign'];
	// 执行查询
	$st->execute($update_values);
}