<?php
// // 链接
// $link = mysql_connect(
// 	"{$config[server]}", 
// 	"{$config[name]}", 
// 	"{$config[password]}"
// );

// // 选择
// mysql_select_db("mydb_1", $link);

// // 操作
// $sql = "select * from tb_student";
// $rs = mysql_query($sql, $link);

// // 处理
// $n = mysql_fetch_assoc($rs);
// var_dump($n);

// // 关闭
// mysql_free_result($rs);
// mysql_close($link);

// 封装
class Database {
	private $server;
	private $port;
	private $name;
	private $password;

	private $link;
	private $rs;

	private $rs_arr;

	private static $instance;

	// 构造
	function __construct($config){
		$this->server = $config['server'];
		$this->port = $config['port'];
		$this->name = $config['name'];
		$this->password = $config['password'];

		// 链接
		$link = mysql_connect(
			"{$config[server]}", 
			"{$config[name]}", 
			"{$config[password]}"
		);
		$this->link = $link;

		// 选择
		mysql_select_db("mydb_1", $link);
	}

	// 析构
	function __destruct(){

		// 关闭
		mysql_free_result($this->rs);
		mysql_close($this->link);
	}

	// 单例 toddo
	static function getinstance($config){
		if(self::$instance == null){
			self::$instance == true;
			return new Database($config);
		}
	}

	// 查询
	function select($select='*', $from, $where='true'){
		$sql = "select {$select} from {$from} where {$where};";

		$rs = mysql_query($sql);
		$this->rs = $rs;

		$rs_arr = [];
		while($arr=mysql_fetch_assoc($rs)){
			$rs_arr[] = $arr;
			print_r($arr);
		}
		$this->rs_arr = $rs_arr;

		return $rs_arr;
	}

	// 修改
	function update($update, $set, $where){
		$sql = "update {$update} set {$set} where {$where};";
		mysql_query($sql);
	}

	// // 删除
	// function delete(){}

	// // 插入
	// function insert(){
	// 	$sql = "insert into {$insert} values({});"
	// }
}
?>