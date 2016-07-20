<?php


Class Captcha {
	private $width;
	private $height;
	private $code;
	private $count;
	private $img;
	private $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";


	function __construct($width=80, $height=25, $count=4){
		$this -> width = $width;
		$this -> height = $height;
		$this -> count = $count;
	}

	function create(){
		header("content-type:image/png");

		$this -> img = imagecreate($this -> width, $this -> height);
		$bgcolor = imagecolorallocate($this -> img,  mt_rand(0,100),  mt_rand(0, 100),  mt_rand(0, 100));
		
		for($i=0;$i<$this->count;$i++){

			$textcolor = imagecolorallocate($this -> img,  mt_rand(150, 255),  mt_rand(150, 255),  mt_rand(150, 255));

			$ch = $this -> charset[mt_rand(0, strlen($this -> charset))];
			$this -> code .= $ch;
			imagettftext($this -> img, 14, mt_rand(-50,50),  5+20*$i, 20, $textcolor, './SIMLI.TTF', $ch);
		}
		
		imagepng($this -> img);

	}

	function __destruct(){
		imagedestroy($this -> img);
	}

	function __tostring(){
		return $this -> code;
	}
}


?>