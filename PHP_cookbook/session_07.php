<?php 

// 第七章 类和对象
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.技巧化对象
class user{
	function load_info($username){
	}
}
$user = new user;


// ----------------------------------------------------------------------------
// 2.定义对象构造器
class user{
	// PHP5
	function __construct($username, $password){
		if($this->validate_user($username, $password)){
			$this->username = $username;
		}
	}
	// PHP4
	function user($username, $password){
		if($this->validate_user($username, $password)){
			$this->username = $username;
		}
	}
}


// ----------------------------------------------------------------------------
// 3.定义对象解构器
class car{
	function __destruct(){
		db_close($this->handle);
	}
}


// ----------------------------------------------------------------------------
// 4.实现控制访问
class Person{
	public $name; // 任意地方可以访问
	protected $age; // 在类和子类中可以访问
	private $salary; // 只能在特定类中可以访问
}


// ----------------------------------------------------------------------------
// 5.防止修改类和方法
final class Mysql{
	final public function connect($server, $username, $password){

	}
}
// 最终类不能被子类化
// 最终方法不能在子类中被重写


// ----------------------------------------------------------------------------
// 6.定义字符串化的对象
class Person{
	public function __toString(){
		return "$this->name <$this->email>";
	}
}
// 可用 echo print 输出


// ----------------------------------------------------------------------------
// 7.定义接口
interface Nameable{
	public function getName();
	public function setName($name);
}

class Book implements Nameable {
	private $name;

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		return $this->name = $name;
	}
}
// 接口定义一个对象必须实现的方法
// 只定义方法 不实现


// ----------------------------------------------------------------------------
// 8.创建抽象的基类
abstract class Database{
	abstract public function connect(){};
	abstract public function query();
	abstract public function fetch();
	abstract public function close();
}
// 一个包含抽象方法的类必须是抽象类
// 抽象类可以包括非抽象方法
// 如果子类没有实现父类的所有抽象方法 这个子类依然是抽象的
// 抽象方法不能定义为 private 或 final


// ----------------------------------------------------------------------------
// 9.传递对象引用
function turn_obj(){
	$adam = new user;
	$dave = $adam;	
}
// 使用 = 进行对象赋值时 只是传递了对对象的引用
// 修改了一个 另一个也会被修改


// ----------------------------------------------------------------------------
// 10.克隆对象
function clone_obj(){
	// 引用
	$rasmus = $zeev;

	// 拷贝对象的值
	$rasmus = clone $zeev;

	// 深度拷贝
	public function __clone(){
		$this->address = clone $this->address;
	}
}
// clone 默认为浅克隆 类中类不会被克隆 依旧是引用


// ----------------------------------------------------------------------------
// 11.重要的属性访问
class Person {
	private $__data = [];

	public function __get($property){
		if(isset($this->__data[$property])){
			return $this->__data[$property];
		} else {
			return false;
		}
	}

	public function __set($property, $value){
		$this->__data[$property] = $value;
	}
}
// 用 __get() __set() 拦截对属性的请求


// ----------------------------------------------------------------------------
// 12.调用由另一个方法返回对象的方法
function point_12(){
	$orange = $fruit->get('citrus')->peel();
}


// ----------------------------------------------------------------------------
// 13.聚合对象
class Address{
	protected $city;

	public function setCity($city){
		$this->city = $city;
	}

	public function getCity(){
		return $this->city;
	}
}

class Person {
	protected $name;
	protected $address;

	public function __construct(){
		$this->address = new Address;
	}
}


// ----------------------------------------------------------------------------
// 14.访问被覆盖的方法
class shape{
	function draw(){}
}

class circle extends shape{
	function draw($origin, $radius){
		if ($radius > 0){
			if($radius > 0){
				parent::draw();
				return true;
			}
			return false;
		}
	}
}
// 用 parent::function() 在子类中访问已被覆盖的父类中的方法
// 对构造函数一样适用
