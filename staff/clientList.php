<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "clientinfo";
include "function/function.php";
$id = getId($_SESSION['username']);
$_SESSION['id']=$id;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>员工后台管理界面</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
<?php
$username = $name = $mail = $phone = $contro = $avatar = "";
$res = getdata($_SESSION["username"]);
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
                        订单详细 <small>欢迎你<?php echo $_SESSION['username']; ?></small>
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
        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>


</body>
</html>
