<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/4
 * Time: 13:33
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
    echo "用户已登录" . $_SESSION['username'];
} else {
    echo "请先登录";
}
include "function/function.php";
include "../order/function/function.php";
$errormsg = "";
$cid = getId($_SESSION['username']);
echo "id等于:" . $cid;
$sid[0] = "";
$gid[0] = "";
$rid[0] = "";
$expense[0] = "";
$xiadantime[0] = "";
$status[0] = "";
$destination[0] = "";
$oid = clientsearch($cid);
if ($oid == "尚未有订单") {
    $errormsg = "您尚未有订单";
    $oid[0] = "";
} else {
    for ($i = 0; $i < count($oid); $i++) {
        $res = searchOrder($oid[$i]);
        $sid[$i] = $res['sid'];
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
        <td>员工id</td>
        <td>物品id</td>
        <td>路线id</td>
        <td>价格</td>
        <td>下单时间</td>
        <td>订单状态</td>
        <td>目的地</td>
        <td>接收订单</td>
    </tr>
    <?php
    for ($i = 0; $i < count($oid); $i++) {
        echo "<tr>";
        echo "<td>" . $oid[$i] . "</td>";
        echo "<td>" . $sid[$i] . "</td>";
        echo "<td>" . $gid[$i] . "</td>";
        echo "<td>" . $rid[$i] . "</td>";
        echo "<td>" . $expense[$i] . "</td>";
        echo "<td>" . $xiadantime[$i] . "</td>";
        echo "<td>" . $status[$i] . "</td>";
        echo "<td>" . $destination[$i] . "</td>";
        echo "<td><form method='post' action='orderaccept.php'>" .
            "<input type='hidden' name='oid' value='$oid[$i]'>" .
            "<input type='hidden' name='gid' value='$gid[$i]'>" .
            "<input type='submit' value='接受'>" .
            "</form></td>";
        echo "</tr>";
    }
    echo $errormsg;
    ?>
</table>
客户看到订单以后，将可以选择是否接收该订单（因为很多员工都可以向用户申请订单）<br>
然后订单状态就由0变为1，物品状态就由0变为1，这时其他员工就无法看到该物品了
目的地信息由客户和员工商谈决定。可做成在线商谈。客户只能接受订单，修改订单需要在员工处执行
</body>
</html>


