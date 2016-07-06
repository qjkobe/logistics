<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/4
 * Time: 15:13
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
if (isset($_SESSION['username']) && $_SESSION['type'] == 1) {
    echo "用户已登录" . $_SESSION['username'];
} else {
    echo "请先登录";
}
include "../order/function/function.php";
$sid = "";
$cid = "";
$gid = "";
$rid = "";
$expense = "";
$xiadantime = "";
$status = "";
$destination = "";
$sid = $_SESSION['id'];
$cid = $_POST['cid'];
$gid = $_POST['gid'];
$rid=1;//路线问题日后处理
if ($_POST['xiadantime'] != "") {
    $expense = test_input($_POST["expense"]);
    if (!preg_match("/^[0-9]*$/",$expense))
    {
        $errormsg = "价格必须是数字";
    } else {
        $xiadantime = $_POST["xiadantime"];
        $status = $_POST["status"];
        $destination = $_POST["destination"];
        $result = addorder($sid, $cid, $gid, $rid, $expense, $xiadantime, $status, $destination);
        if ($result == "插入成功") {
            $errormsg = "插入成功，三秒后转跳回指定页面";
            header("refresh:3;url=index.php");
        }else {
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    客户id: <?php echo $cid;?><input type="hidden" name="cid" value="<?php echo $cid;?>">
    物品id：<?php echo $gid;?><input type="hidden" name="gid" value="<?php echo $gid;?>">
    路线id：<?php echo $rid;?><input type="hidden" name="rid" value="<?php echo $rid;?>">
    价格：<input name="expense" type="text">
    下单时间：<input type="text" name="xiadantime">
    <input type="hidden" name="status" value="0">
    目的地：<input type="text" name="destination">
    <input type="submit">增加订单</input>
    <br><?php echo $errormsg?>
</form>
</body>
</html>


