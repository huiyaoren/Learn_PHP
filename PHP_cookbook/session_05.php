<?php 

// 第五章 变量
if($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.消除 == 和 = 的困扰
function equal_beset(){
	if(12 === $dwarves){
	}
	// 把常量放在前面能够避免 把 == 误写为 = 时程序依然顺利执行的情况
	// 但如果 0 == $string 时 PHP 会把右侧变量先转换为整型数 
	// 为了避免此类问题 可以使用 0 === $string
}


// ----------------------------------------------------------------------------
// 2.为变量设定默认值
function var_default(){
	$cars = isset($_REQUEST['cars']) ? $_REQUEST['cars'] : $default_cars;

	// 对 0 false 值进行限制
	$cars = $_REQUEST['cars'] ? $_REQUEST['cars'] : $default_cars;
}


// ----------------------------------------------------------------------------
// 3.不使用临时变量而实现变量值的交换
function switch_value(){
	list($a, $b) = [$b, $a];
}
// 这种方不如用临时变量快
// 用速度换取代码可读性


// ----------------------------------------------------------------------------
// 4.动态创建变量名
function create_var_name(){
	// 使用 PHP 中 可变变量 的语法
	$animal = 'turtles';
	$turtles = 103;
	print $$animal;
}
// 遇到 $$ 时 PHP 会废弃右边的变量 取值将该值作为正真变量的名称


// ----------------------------------------------------------------------------
// 5.使用静态变量
function static_var(){
	// 让一个本地变量在两个函数调用间保留自己的值
	static $i = 0;
	$i++;
	return $i;
}
// 能被函数记住值得变量 只能被定义一次 不会被重定义
// 反复执行上面函数会使 $i 值递增


// ----------------------------------------------------------------------------
// 6.在进程间共享变量
function share_var(){
	// 使用 shmop 共享内存功能
	// 创建键
	$shmop_key = ftok(__FILE__, 'p');

	// 创建 16384 字节的共享内存块
	$shmop_id = shmop_open($shmop_key, 'c', 0600, 16384);

	// 取得全部内存片段中的数据
	$population = shmop_read($shmop_id, 0, 0);

	// 生成数据
	$population += ($births + $immigrants - $deaths - $emigrants);

	// 将生成的数据回写入共享内存片段
	$shmop_bytes_written = shmop_write($shmop_id, $population, 0);

	// 检查会写长度是否符合
	if($shmop_bytes_written != strlen($population)){
		echo "Can't write the all of: $population\n";
	}
	// 关闭句柄
	shmop_close($shmop_id);


	// 使用 system V 共享内存功能
	$semaphoer_id = 100;
	$segment_id = 200;

	// 获取一个我们想取得共享内存关联的信号句柄
	$sem = sem_get($semaphoer_id, 1, 0600);

	// 确保对信号的独占访问
	sem_acquire($sem) or die("Can't acquire semaphore");

	// 获取共享内存片段的句柄
	$shm = shm_attach($segment_id, 16384, 0600);

	// 从共享内存片段中取回值
	$population = shm_get_var($shm, 'population');

	// 生成值
	$population += ($births + $immigrants - $deaths - $emigrants);

	// 把生成值存回写到共享内存片段中
	shm_put_var($shm, 'population', $population);

	// 释放对共享内存的句柄
	shm_detach($shm);

	// 释放信号 以便其他进程可以捕获它
	sem_release($sem);
}
// shmop 类似文件操作的接口
// 0600 含义是 创建这个内存块的用户可以从中读取或向其中写入数据
// 用户也包括具有相同 ID 的其他进程

// shmop_open() 标志:
// a 只读权限打开
// c 创建新片段 如果已存在以可读权限打开
// w 可写权限打开
// n 创建新片段 如果已存在则失败

// $population = shmop_read($shmop_id, 0, 0) 解读：
// 第二个参数表示开始读取的位置
// 第三个参数表示要读取的长度 0 表示到该内存的结尾

// System V 共享内存的行为类似数组
// 需要你自己来控制内存访问的锁定

// $sem = sem_get($semaphore_id, 1, 0600)
// 第二个参数表示进程可以访问这个信号的最大值
// 第三个参数代表对这个信号的权限
// sem_get() 会返回一个指向潜在的系统信号的标识符

// 共享内存的最大好处是速度非常快
// windows 平台上不能使用 System V共享内存
// 还有一种方式 APC

