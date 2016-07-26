 <?php


$user_data = [
	['usrnm' => 'admin', 'psw' => 'admin'],
	['usrnm' => 'admin1', 'psw' => 'admin'],
	['usrnm' => 'admin2', 'psw' => 'admin'],
	['usrnm' => 'admin3', 'psw' => 'admin'],
	['usrnm' => 'admin4', 'psw' => 'admin'],
];


$content_menu_data = [
	['id' => 1, 'title' => '菜单1', 'fid' => 0, 'url' => 'www1'],
	['id' => 2, 'title' => '菜单2', 'fid' => 0, 'url' => 'www2'],
	['id' => 3, 'title' => '菜单3', 'fid' => 0, 'url' => 'www3'],
	['id' => 4, 'title' => '子菜单1', 'fid' => 1, 'url' => 'www4'],
	['id' => 5, 'title' => '子菜单2', 'fid' => 1, 'url' => 'www5'],
	['id' => 6, 'title' => '子菜单3', 'fid' => 1, 'url' => 'www6'],
	['id' => 7, 'title' => '子菜单4', 'fid' => 2, 'url' => 'www7'],
	['id' => 8, 'title' => '子菜单5', 'fid' => 2, 'url' => 'www8'],
	['id' => 9, 'title' => '子菜单6', 'fid' => 3, 'url' => 'www9'],
	['id' => 10, 'title' => '子菜单7', 'fid' => 3, 'url' => 'www10'],
	['id' => 11, 'title' => '子菜单8', 'fid' => 3, 'url' => 'www11']
];


$shop_list = [
	[],
];


function block_tag($tag, $attr="", $text=""){

	return "<{$tag} {$attr}>{$text}</{$tag}>\n";
}


function create_menu($list){

	foreach ($list as $key => $menu) {

		if($menu['fid'] == 0){

			echo block_tag(
				'h4', 
				"data-id={$menu['id']} data-url={$menu['url']}", 
				$menu['title']
			);
		}

		foreach ($list as $key => $fmenu) {

			if($fmenu['fid'] == $menu['id']){

				echo block_tag(
					'h6', 
					"data-fid={$fmenu['fid']} data-url={$fmenu['url']}", 
					$fmenu['title']
				);
			}
		}
	}
}

if($_COOKIE['user']['username']){
	require 'view.php';
	return false;
}

if($_POST['username'] and $_POST['password'] and $_POST['captcha']){
	// todo 验证码验证 把验证码存在 session? localstorage?
	if($_POST['captcha'] != $_COOKIE['captcha']){
		require 'login.php';
		echo "<h1>验证码不正确</h1>";
		return false;
	}

	// 账号密码验证
	foreach ($user_data as $data) {
		if($_POST['username'] == $data['usrnm'] and $_POST['password'] == $data['psw']){
			// 用户名 存入 cookie
			setcookie("user[username]", $_POST['username']);
			require 'view.php';
			$user_data_is_right = true;
			break;
		}
	}
	if($user_data_is_right != true){
		echo "账号或密码错误 <a href='login.php'>返回<a>";
	}
}else{
	require 'login.php';
}


?>