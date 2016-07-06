<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:28
 */
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_SESSION['username'])&&$_SESSION['type']==1){
    echo "用户已登录";
}else{
    echo "请先登录";
}
include "function/function.php";
$id = getId($_SESSION['username']);
$_SESSION['id']=$id;
?>
<b><?php echo $_SESSION['username']?>个人中心</b>
修改个人信息 <a href="info.php">info</a>
查看自己负责的订单 <a href="lookOrder.php">order</a>
查看客户信息(admin已实现)
查看待处理物品 <a href="goodslist.php">goods</a>
</body>
</html>


