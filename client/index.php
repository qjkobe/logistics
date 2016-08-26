<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
include "function/function.php";
$menu = "index";
$id = getId($_SESSION['username']);
$_SESSION['id'] = $id;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>管理员后台管理界面</title>
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
<div id="wrapper">
    <?php
    include_once "common/header.php"
    ?>
    <!--/. NAV TOP  -->
    <?php
    include_once "common/left.php"
    ?>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">


            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        仪表盘 <small>欢迎你<?php echo $_GET['username']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <div class="row">


                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bar Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Donut Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            我的订单信息
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <?php
                                include "../order/function/function.php";
                                $oid=clientsearch($_SESSION['id']);
                                if ($oid == "尚未有订单") {
                                    echo "<div class=\"alert alert-warning\">";
                                    echo "<strong>啊呀！</strong> 您尚未有订单</div>";
                                }else{
                                    for ($i = 0; $i < count($oid)&&$i<7; $i++) {
                                        $Orderinfo = searchOrder($oid[$i]);
                                        echo '<a href="#" class="list-group-item">';
                                        echo '<span class="badge">';
                                        echo $Orderinfo['xiadantime'];
                                        echo '</span>';
                                        echo '<i class="fa fa-fw fa-truck"></i>';
                                        echo $oid[$i];
                                        echo '</a>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="text-right">
                                <a href="orderlist.php">更多订单 <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            我的物品
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>物品id</th>
                                        <th>重量</th>
                                        <th>类型</th>
                                        <th>待运状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../goods/function.php";
                                    $gid = showGoods($id);
                                    if ($gid == "尚未添加物品") {
                                        echo "<div class=\"alert alert-warning\">";
                                        echo "<strong>啊呀！</strong> 尚未添加物品！</div>";
                                    } else {
                                        for ($i = 0; $i < count($gid)&&$i<5; $i++) {
                                            echo "<tr>";
                                            $res = getGoods($gid[$i]);
                                            echo "<td>".$gid[$i]."</td>";
                                            echo "<td>".$res['weight']."</td>";
                                            echo "<td>".$res['tid']."</td>";
                                            echo "<td>".$res['status']."</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right">
                                <a href="goodslist.php">更多 <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

            <footer><p>版权所有 <a href="http://qjkobe.com">qjkobe</a></p></footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>


</body>

</html>