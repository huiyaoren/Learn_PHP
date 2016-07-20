<?php


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



require 'view.php';

?>