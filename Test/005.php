<?php

// 1、使用构造方法初始化属性年，月，日，时，分，秒，定义一个函数调用打印出（*年*月*日 *时：*分：*秒），重写tostring 打印。
Class Date {
	private $y;
	private $m;
	private $d;
	private $h;
	private $i;
	private $s;

	function __construct($y, $m, $d, $h, $i, $s){
		$this -> y = $y;
		$this -> m = $m;
		$this -> d = $d;
		$this -> h = $h;
		$this -> i = $i;
		$this -> s = $s;
	}
		
	function __tostring(){
		return "{$this->y}年{$this->m}月{$this->d}日 {$this->h}时：{$this->i}分：{$this->s}秒<br>";
	}
}

$date = new Date(2011, 11, 11, 11, 11, 11);
print $date;


// 3.创建一个Vehicle类并将它分别声明为抽象类，普通类。
// 在Vehicle类中声明一个NumOfWheels方法，使它打印一个字符串值。
// 创建两个类Car和Motorbike从Vehicle类分别继承，实现，并在这两个类中实现NumOfWheels方法。
// 在Car类中，应当打印“四轮车”信息；而在Motorbike类中，应当打印“双轮车”信息。(UML图)


abstract Class Vehical {
	abstract function NumOfWheels();
}

Class Car extends Vehical {
	function NumOfWheels(){
		echo "四轮车<br>";
	}
}

Class Motorbike extends Vehical {
	function NumOfWheels(){
		echo "二轮车<br>";
	}	
}

$car = new Car();
$moto = new Motorbike();

$car -> NumOfWheels();
$moto -> NumOfWheels();

?>