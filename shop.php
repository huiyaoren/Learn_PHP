<?php

// // echo $_GET['item'];
session_start();
$_SESSION['buy_item'][] = $_GET['item'];

echo "<script type='text/javascript'>history.go(-1)</script>";
// echo "上页的地址为:"."<a href={$_SERVER[HTTP_REFERER]}>返回</a>";

?>