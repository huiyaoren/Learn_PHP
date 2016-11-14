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