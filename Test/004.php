<?php 

// 1、猜数字游戏：一个类A有一个成员变量v，有一个初值100。定义一个类，对A类的成员变量v进行猜。
// 如果大了则提示大了，小了则提示小了。等于则提示猜测成功（使用随机数测试）。
//  。
Class A{

	private $v;

	public function __construct(){
		$this -> v = 100;
	}

	public function __get($param){
		return $this -> $param;
	}
	// 构造函数中给私有变量赋值时 拦截器取不到值(属性赋值漏写了 $this -> v / $v)

}


Class B{

	private $v;

	public function __construct(){
		$this -> v = rand(0, 200);
		// echo $v;
	}

	public function compare_to($obj){
		var_dump($this -> v);
		if($this -> v > $obj -> v){
			echo '大了<br>';
		}elseif ($this -> v == $obj -> v) {
			echo '猜测成功<br>';
		}elseif ($this -> v < $obj -> v) {
			echo '小了<br>';
		}
	}
}

$a = new A();
$b = new B();

$b -> compare_to($a);



// 2.请定义一个交通工具(Vehicle)的类，其中有: 属性：速度(speed)，体积(size)
// 等等方法：移动(move())，设置速度(setSpeed(int speed))，加速speedUp(),减速speedDown()等等
// .最后在测试类Vehicle中的中实例化一个交通工具对象，并通过方法给它初始化
// speed,size的值，并且通过打印出来。另外，调用加速，减速的方法对速度进行改变
Class Vehicle {

	private $speed;

	private $size;

	public function __construct($size=null){
		$this -> size = $size;
	}

	public function __get($param){
		return $this -> $param;
	}

	public function move(){
	}

	public function setSpeed($int){
		$this -> speed = $int;
	}

	public function speedUp(){
		$this -> speed += 1;
	}

	public function speedDown(){
		$this -> speed -= 1;
	}

	public function print_attr(){
		echo "size: {$this -> size}<br>";
		echo "speed: {$this -> speed}<br>";
	}
}

$bike = new Vehicle('bike_size');
$bike -> setSpeed(15);
$bike -> print_attr();
$bike -> speedUp();
$bike -> print_attr();
$bike -> speedDown();
$bike -> print_attr();





// 3、定义名为Number的类，其中有两个整型数据成员n1和n2，应声明为私有。编写构造方法，赋予n1和n2初始值，
// 再为该类定义加（addition）、减（subtration）、乘（multiplication）、除（division）等公有成员方法，
// 分别对两个成员变量执行加、减、乘、除的运算。
Class Number {
	private $n1;
	private $n2;

	public function __construct($int1, $int2){
		$this -> n1 = $int1;
		$this -> n2 = $int2;
	}

	public function add(){
		return $this -> n1 + $this -> n2;
	}

	public function sub(){
		return $this -> n1 - $this -> n2;
	}

	public function mul(){
		return $this -> n1 *  $this -> n2;
	}

	public function div(){
		return $this -> n1 / $this -> n2;
	}
}

$num = new Number(5, 90);
echo $num -> add();
echo $num -> sub();
echo $num -> mul();
echo $num -> div();

?>