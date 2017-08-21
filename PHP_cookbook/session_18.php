<?php

// 第十三章 安全和加密
if ($_GET['a']) $_GET['a']();


// ----------------------------------------------------------------------------
// 1.防止会话固定攻击
function point_1()
{
    // 用户权限发生变化时, 如成功登录之后, 重新生成会话标识符
    session_regenerate_id();
    $_SESSION['logged_in'] = true;
}


// ----------------------------------------------------------------------------
// 2.防范表单欺骗 <CSRF>
function point_2()
{
    // 增加一个隐藏表单, 包含一个一次性 token, 将这个 token 储存在用户会话中
    session_start();
    $_SESSION['token'] = md5(uniqid(mt_rand(), true));

    // 接受到一个表示表单提交的额请求时, 检查 token 确保他们是匹配的
    session_start();
    if ((!isset($_SESSION['token'])) or ($_POST['token'] != $_SESSION['token'])) {
        // 提示用户提供密码
    } else {
        // 继续
    }
}


// ----------------------------------------------------------------------------
// 3.确保过滤输出
function point_3()
{
    // 初始化一个空数组 证实数据合法之后 将数据储存在这个数组中
    $filters = [
        'name' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[a-z]+$/i'],
        ],
        'age' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 13],
        ],
    ];

    // 将 $clean 初始化为一个空数组 可以确保必须显式地增加数据
    $clean = filter_input_array(INPUT_POST, $filters);
}


// ----------------------------------------------------------------------------
// 4.避免跨站点脚本攻击
function point_4()
{
    // 用 htmlentities() 对所有 HTML 输出转义, 一定要指定正确的字符编码

    /* 指示字符编码 */
    header('Content-Type: text/html; charset=UTF-8');

    /* 为转义的数据初始化一个数组 */
    $html = [];

    /* 转义过滤的数据 */
    $html['username'] = htmlentities($clean['username'], ENT_QUOTES, 'UTF-8');
    echo "<p>Welcome back, {$html['username']}.</p>";
}


// ----------------------------------------------------------------------------
// 5.消除 SQL 注入
function point_5()
{
    // 使用一个处理数据库的库 如 PDO 对数据库完成适当的转义
    $statement = $db->prepare("INSERT INTO users (username, password) VALUE (:username, :password)");
    $statemetn->bindParam(':username', $clean['username']);
    $statement->bindParam(':password'. $clean['password']);
    $statement->execute();
}

