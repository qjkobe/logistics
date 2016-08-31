<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "clientinfo";
include "function/function.php";
$id = getId($_SESSION['staffname']);
$_SESSION['id']=$id;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>员工后台管理界面</title>
    <?php
    include_once "common/headjs.php"
    ?>
</head>
<?php
include_once "common/verify.php"
?>
<body>
<?php
$username = $name = $mail = $phone = $contro = $avatar = "";
$res = getdata($_SESSION["staffname"]);
if ($res == "没有此用户名") {
    echo "黑客异常";
}else{
    $name = $res['name'];
    $mail = $res['mail'];
    $phone = $res['phone'];
    $contro = $res['contro'];
    $avatar = $res['avatar'];
}
?>
<div id="wrapper">
    <?php
    include_once "common/header.php"
    ?>
    <!--/. NAV TOP  -->
    <?php
    include_once "common/left.php"
    ?>
    <!-- /. NAV SIDE  -->

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        订单详细 <small>欢迎你<?php echo $_SESSION['staffname']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            全部订单
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>客户id</th>
                                        <th>用户名</th>
                                        <th>公司</th>
                                        <th>电话</th>
                                        <th>主页</th>
                                        <th>邮箱</th>
                                        <th>头像</th>
                                        <th>修改</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $res=showClient();
                                    for ($i = 0; $i < count($res); $i++) {
                                        echo "<tr>";
                                        $res2 = getClient($res[$i]);
                                        $cid[$i]=getCId($res[$i]);
                                        echo "<td><a href='#'>".$cid[$i]."</a></td>";//点击这里可以查看详细信息并进行修改
                                        echo "<td>".$res[$i]."</td>";
                                        echo "<td>".$res2['company']."</td>";
                                        echo "<td>".$res2['phone']."</td>";
                                        echo "<td>".$res2['index']."</td>";
                                        echo "<td>".$res2['mail']."</td>";
                                        echo "<td>".'<img src="../'.$res2['avatar'].'" width=35 height=35>'."</td>";
                                        echo "<td>"."<form action='clientsavemid.php' method='post'><input type='hidden' name='staff' value='$res[$i]'>".
                                            "<input type='submit' class='btn btn-info' value='info'>".
                                            "</form>"."</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <script language="JavaScript">
                                function saveClient(){
                                <?php
                                    $_SESSION['client']=$res[$i];
                                    ?>
                                }
                            </script>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


        </div>
        <footer><p>版权所有 <a href="http://qjkobe.com">qjkobe</a></p></footer>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<?php
include_once "common/footjs.php"
?>

</body>
</html>
