<?php

$content_menu_data = [
	['id' => 1, 'title' => '菜单一', 'fid' => '0'],
	['id' => 2, 'title' => '菜单二', 'fid' => '0'],
	['id' => 3, 'title' => '菜单三', 'fid' => '0'],
	['id' => 4, 'title' => '子菜单', 'fid' => '1'],
	['id' => 5, 'title' => '子菜单', 'fid' => '1'],
	['id' => 6, 'title' => '子菜单', 'fid' => '1'],
	['id' => 7, 'title' => '子菜单', 'fid' => '2'],
	['id' => 8, 'title' => '子菜单', 'fid' => '2'],
	['id' => 9, 'title' => '子菜单', 'fid' => '3'],
	['id' => 10, 'title' => '子菜单', 'fid' => '3'],
	['id' => 11, 'title' => '子菜单', 'fid' => '3']
];

$menu_doc = new DOMDocument();
// $menu_doc -> formatOutput = true;
for($i=0;$i<count($content_menu_data);$i++){


	if($content_menu_data[$i]['fid'] == '0'){

		$menu = $menu_doc -> createElement('div');

		$menu_class = $menu_doc -> createAttribute('class');
		$menu_class -> value ='content_menu_list';
		// $menu_class_text = $menu_doc -> createTextNode('content_menu_list');
		// $menu_class -> appendChild($menu_class_text);

		$menu_data = $menu_doc -> createAttribute('id');
		$menu_data -> value = $content_menu_data[$i]['id'];
		// $menu_data_text = $menu_doc -> createTextNode($content_menu_data[$i]['id']);
		// $menu_data -> appendChild($menu_data_text);

		$menu_text = $menu_doc -> createTextNode($content_menu_data[$i]['title']);
		$menu -> appendChild($menu_text);
		$menu -> appendChild($menu_data);
		$menu -> appendChild($menu_class);
		$menu_doc -> appendChild($menu);


	}else{
		// $content_menu_data[$i]['fid']
		$menu = $menu_doc -> getElementById($content_menu_data[$i]['fid']);

		$menu_list = $menu_doc -> createElement('div');
		
		$menu -> appendChild($menu_list);
		$menu_doc -> appendChild($menu);
	}
	
}


$menu_text = $menu_doc -> createTextNode('asdg');

$menu_doc -> save('content_menu.xml');
// echo $menu_doc -> saveHTML();

require 'view.php';

?>