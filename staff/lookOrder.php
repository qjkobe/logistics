<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/1
 * Time: 15:06
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
include "../order/function/function.php";
$errormsg = "";
$oid=staffsearch($_SESSION['id']);
echo "id等于:" . $_SESSION['id'];
$cid[0] = "";
$gid[0] = "";
$rid[0] = "";
$expense[0] = "";
$xiadantime[0] = "";
$status[0] = "";
$destination[0] = "";
if ($oid == "尚未有订单") {
    $errormsg = "您尚未有订单";
    $oid[0] = "";
}else{
    for ($i = 0; $i < count($oid); $i++) {
        $res = searchOrder($oid[$i]);
        $cid[$i] = $res['cid'];
        $gid[$i] = $res['gid'];
        $rid[$i] = $res['rid'];
        $expense[$i] = $res['expense'];
        $xiadantime[$i] = $res['xiadantime'];
        $status[$i] = $res['status'];
        $destination[$i] = $res['destination'];
    }
}
?>

<table border="1">
    <tr>
        <td>订单id</td>
        <td>客户id</td>
        <td>物品id</td>
        <td>路线id</td>
        <td>价格</td>
        <td>下单时间</td>
        <td>订单状态</td>
        <td>目的地</td>
    </tr>
    <?php
    for ($i = 0; $i < count($oid); $i++) {
        echo "<tr>";
        echo "<td>" . $oid[$i] . "</td>";
        echo "<td>" . $cid[$i] . "</td>";
        echo "<td>" . $gid[$i] . "</td>";
        echo "<td>" . $rid[$i] . "</td>";
        echo "<td>" . $expense[$i] . "</td>";
        echo "<td>" . $xiadantime[$i] . "</td>";
        echo "<td>" . $status[$i] . "</td>";
        echo "<td>" . $destination[$i] . "</td>";
        echo "</tr>";
    }
    echo $errormsg;
    ?>
</table>
添加订单 <a href="goodslist.php">add</a>
修改订单（点击订单号可进行修改）
</body>
</html>


