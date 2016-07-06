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
    echo "用户已登录".$_SESSION['username'];
} else {
    echo "请先登录";
}
include "function/function.php";
include "../goods/function.php";
$errormsg = "";
$cid = getId($_SESSION['username']);
$gid = showGoods($cid);
echo "id等于:".$cid;
$weight[0] = "";
$tid[0] = "";
$status[0] = "";
if (showGoods($cid) == "尚未添加物品") {
    $errormsg = "您尚未添加物品";
    $gid[0] = "";
}else{
    for ($i = 0; $i < count($gid); $i++) {
        $res = getGoods($gid[$i]);
        $weight[$i] = $res['weight'];
        $tid[$i] = $res['tid'];
        $status[$i] = $res['status'];
    }
}

?>
<table border="1">
    <tr>
        <td>物品id</td>
        <td>重量</td>
        <td>类型</td>
        <td>待运状态</td>
    </tr>
    <?php
    for ($i = 0; $i < count($gid); $i++) {
        echo "<tr>";
        echo "<td>" . $gid[$i] . "</td>";
        echo "<td>" . $weight[$i] . "</td>";
        echo "<td>" . $tid[$i] . "</td>";
        echo "<td>" . $status[$i] . "</td>";
        echo "</tr>";
    }
    echo $errormsg;
    ?>
</table>
</body>
</html>


