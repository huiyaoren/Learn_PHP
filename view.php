<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="index.css" rel="stylesheet">
</head>
<script src="jquery-1.12.0.min.js"></script>
<script>
    $(function(){

        $(".content_menu")
            .children("[data-fid]")
            .hide();

        $(".content_menu")
            .children("[data-id]")
            .click(function(){

                $(".content_menu")
                    .children("[data-fid="+$(this).attr("data-id")+"]")
                    .toggle();
            })

        $(".content_menu")
            .children("[data-fid]")
            .click(function(){
                alert($(this).attr("data-url"));
            })

        // timer = window.setInterval(function(){
        //     $(".header").children("span").html();
        // }, 1000)


            
    })
</script>
<body>
    <div class="container">
        <div class="header">
        	<h1>越野机车后台管理系统</h1>
            <span><?php
                echo $_COOKIE['user']['username'],"，你好！"
            ?></span>
        </div>
        <div class="content">
        	<div class="content_menu">
             
                <?php 
                    create_menu($content_menu_data);
                ?>
            
        	</div>
        	<div class="content_main">
                <table>
                    <tr>
                        <td><h1>商品1</h1></td>
                        <td><h1><a href="shop.php?item=1">购买</a></h1></td>
                    </tr>
                    <tr>
                        <td><h1>商品2</h1></td>
                        <td><h1><a href="shop.php?item=2">购买</a></h1></td>
                    </tr>
                    <tr>
                        <td><h1>商品3</h1></td>
                        <td><h1><a href="shop.php?item=3">购买</a></h1></td>
                    </tr>
                </table>
                <h1><br></h1>
                <br>
                <table>
                    <tr>
                        <td><h1>已购买：</h1></td>
                    </tr>
                    <?php 
                        session_start();
                        foreach($_SESSION['buy_item'] as $item){
                            echo "<tr><td><h1>商品{$item}</h1></td></tr>";
                        } 
                    ?>
                </table>
        	</div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>