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