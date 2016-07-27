<?php
/**
 * Created by PhpStorm.
 * User: wslsh
 * Date: 2016/7/26
 * Time: 22:02
 */

if($_GET['action'] == 'check'){
    if($_GET['username'] == "asdasd"){
        echo 'OK';
    }else{
        echo '用户名不存在';
    }
}


if($_GET['action'] == 'sign'){
    if($_GET['username'] == "asdasd"){
        echo '用户名已被使用';
    }else{
        echo '';
    }
}

if($_GET['action'] == 'password'){
    if($_GET['username'] == "asdasd" and $_GET['password'] == "asdasd"){
        echo 'true';
    }else{
        echo 'false';
    }

}