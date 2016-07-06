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
if (isset($_SESSION['username']) && $_SESSION['type'] == 2) {
    echo "用户已登录".$_SESSION['username'];
} else {
    echo "请先登录";
}

include "function/function.php";
include "../goods/function.php";
//定义变量并默认设置为空值
$errormsg = "";
$cid = $weight = $tid = $status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = test_input($_POST["weight"]);
    if (!preg_match("/^[0-9]*$/", $username)) {
        $errormsg = "重量只能是数字";
    } else {
        $type = $_POST["type"];
        $tid=$type[0];
        for ($i = 1; $i < count($type); $i++) {
            $tid = "," . $type[$i];
        }
        $cid = getId($_SESSION['username']);
        $status = $_POST["status"];
        $result = addgoods($cid, $weight, $tid, $status);
        if ($result == "插入成功") {
            $errormsg = "添加成功";
        } else {
            $errormsg = "数据库错误";
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<b>个人中心</b>
修改个人信息<a href="info.php">info</a>
添加物品（添加物品后，会显示为待运，这时，会被员工优先看到，可以进行订单交易）
查看自己的订单）
<br>
我的物品 <a href="mygoods.php">goods</a>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    重量：<input type="text" name="weight">
    物品类型：易碎<input type="checkbox" name="type[]" value="易碎">
    易燃<input type="checkbox" name="type[]" value="易燃">
    <input type="hidden" name="status" value="0">
    <input type="submit" value="提交">
    <br><?php echo $errormsg?>
</form>
我的订单 <a href="myorder.php">order</a>
</body>
</html>


