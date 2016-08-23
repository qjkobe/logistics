<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
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
if(isset($_SESSION['username'])&&$_SESSION['type']==0){
    echo "用户已登录";
}else{
    echo "请先登录";
}
?>
<b><?php echo $_SESSION['username']; ?>个人中心</b>
修改员工信息；<a href="staffList.php">list</a>
查看订单；
查看客户信息；<a href="clientList.php">list</a>
查看物品信息；
查看路线信息；
</body>
</html>


