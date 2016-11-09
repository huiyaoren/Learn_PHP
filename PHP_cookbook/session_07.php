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


// ----------------------------------------------------------------------------
// 15.使用方法的多态性
function combine($a, $b){
	// 根据传递给方法的参数数量和类型来决定执行不同的代码
	if(is_int($a, $b)){
		return $a + $b;
	} 
	if(is_float($a) and is_float($b)){
		return $a + $b;
	}
	if(is_string($a) and is_string($b)){
		return "$a$b";
	}
	if(is_array($a) and is_array($b)){
		return array_merge($a, $b);
	}
}


// ----------------------------------------------------------------------------
// 16.定义类常量
class Math{
	const pi = 3.14159;
	const e = 2.71828;
}
$area = math::pi * $radius * $radius;
// 在每个类的基础上定义常量
// 本质上来说 这些常量其实是 final 属性
// 与访问静态属性类似 访问常量也不用先实例化类
// 在同一个类中访问需要 加上 self::var
// 不能把一个表达式的值赋给常量


// ----------------------------------------------------------------------------
// 17.定义静态属性和方法
class Format{
	public static function number($number, $decimals=2, $decimal=',', $thousands='.'){
		return number_format($number, $decimals, $decimal, $thousands);
	}
}
print Format::number(123.567);


// ----------------------------------------------------------------------------
// 18.控制对象的序列化
class LogFile{
	protected $filename;
	protected $handle;

	public function __construct($filename){
		$this->filename = $filename;
		$this->open();
	}

	private function open(){
		$this->handle=fopen($this->filename, 'a');
	}

	public function __destruct(){
		fclose($this->handle);
	}

	// 当对象序列化时调用
	// 返回一个可序列化的对象属性的值
	public function __sleep(){
		return array('filename');
	}

	// 当对象反序列化时调用
	public function __wakeUp(){
		$this->open();
	}
}
// 包含句柄的属性在序列化后要重新建立
// 不要再 __sleep() 方法中做妨碍序列化动作的事


// ----------------------------------------------------------------------------
// 19.分析对象
Reflection::export(new ReflectionClass('Car')); // 了解汽车

// or
$car = new ReflectionClass('Car');
if($car->hasMethod('retracTop')){
	// 汽车可以伸缩
}


// ----------------------------------------------------------------------------
// 20.检查某对象是不是一个特定类的技巧(实例)
public function add(Person $person){
	// 将特定类的实例作为参数传递给函数 并指定类名
}

// 可以使用 instanceof 操作符
$media = get_something_from_catalog();
if($media instanceof Book){
	// 
} else if($media instanceof DVD){
	// 
}


// ----------------------------------------------------------------------------
// 21.在对象实例化期间自动加载类文件
function __autoload($class_name){
	include "$class_name.php";
	$person = new Person;
}


// ----------------------------------------------------------------------------
// 22.动态实例化一个对象
$language = $_REQUEST['language'];
$valid_langs = [
	'en-US'=>'US English',
	'en_UK'=>'British English'
]
if(isset($valid_langs[$language]) and class_exists($language)){
	$lang = new $language;
}


// ----------------------------------------------------------------------------
// 23.编程：whereis
function whereis(){
	if($arg < 2){
		print "$argv[0]: classes1.php [,...]\n";
		exit;
	}

	// 包含这些文件
	foreach(array_slice($argv)){
		include_once $filename;
	}

	// 从类开始收集方法和函数的信息
	$methods = array();
	foreach (get_declared_classes() as $class){
		$r = new ReflectionClass($class);
		// 排除内置类
		if($r->isUserDefined()){
			// 排除继承的方法
			if($method->getDeclaringClass()->getName() == $class{
				$signature = "$class::".$method->getName();
				$method[$signature] = $method;
			}
		}
	}

	// 接下来添加函数
	$functions  = [];
	$defined_functions = get_defined_functions();
	foreach($defined_functions['user'] as $function){
		$functions[$function]  = new ReflectionFunction($function);
	}

	// 按类的字母顺序对方法进行排序
	function sort_methods($a, $b){
		list($a_class, $a_method) = explode('::', $a);
		list($b_class, $b_method) = explode('::', $b);

		if($cmp = strcasecmp($a_class, $b_class)){
			return $cmp;
		}

		return strcasecmp($a_method, $b_method);
	}
	uksort($methods, 'sort_methods');

	// 按字母顺序对函数进行排序
	// 从列表中删除方法排序函数
	unset($functions['sort_methods']);
	// 排序
	ksort($functions);

	// 输出信息
	foreach(array_merge($function, $methods) as $name => $reflect){
		$file = $reflect->getfileName();
		$line = $reflect->getStartLine();

		printf("%-255 | %-405 | %6d\n", "$name()",  $file, $line);
	}
}

