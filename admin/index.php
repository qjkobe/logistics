<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "index";
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
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>8,457</h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                            日访问量

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-primary text-center no-boder bg-color-blue">
                        <div class="panel-body">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                            <h3>52,160 </h3>
                        </div>
                        <div class="panel-footer back-footer-blue">
                            总业绩

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="fa fa fa-comments fa-5x"></i>
                            <h3>15,823 </h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            消息总数

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-primary text-center no-boder bg-color-brown">
                        <div class="panel-body">
                            <i class="fa fa-users fa-5x"></i>
                            <h3>36,752 </h3>
                        </div>
                        <div class="panel-footer back-footer-brown">
                            总访问量

                        </div>
                    </div>
                </div>
            </div>


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
                            订单信息
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <?php
                                include "../order/function/function.php";
                                $orderlist=showOrder();
                                for ($i = 0; $i < count($orderlist)&&$i<7; $i++) {
                                    $Orderinfo=searchOrder($orderlist[$i]);
                                    echo '<a href="#" class="list-group-item">';
                                    echo '<span class="badge">';
                                    echo $Orderinfo['xiadantime'];
                                    echo '</span>';
                                    echo '<i class="fa fa-fw fa-truck"></i>';
                                    echo $orderlist[$i];
                                    echo '</a>';
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
                            员工信息
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>用户名</th>
                                        <th>真名</th>
                                        <th>电话</th>
                                        <th>邮箱</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "function/function.php";
                                    $res=showStaff();
                                    for ($i = 0; $i < count($res)&&$i<5; $i++) {
                                        echo "<tr>";
                                        $res2 = getStaff($res[$i]);
                                        $sid[$i]=getSId($res[$i]);
                                        echo "<td><a href='#'>".$sid[$i]."</a></td>";//点击这里可以查看详细信息并进行修改
                                        echo "<td>".$res[$i]."</td>";
                                        echo "<td>".$res2['name']."</td>";
                                        echo "<td>".$res2['phone']."</td>";
                                        echo "<td>".$res2['mail']."</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right">
                                <a href="staffList.php">更多 <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 col-md-offset-4 col-sm-12 col-xs-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            客户信息
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>C No.</th>
                                        <th>用户名</th>
                                        <th>公司</th>
                                        <th>电话</th>
                                        <th>邮箱</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $res=showClient();
                                    for ($i = 0; $i < count($res)&&$i<5; $i++) {
                                        echo "<tr>";
                                        $res2 = getClient($res[$i]);
                                        $cid[$i]=getCId($res[$i]);
                                        echo "<td><a href='#'>".$cid[$i]."</a></td>";//点击这里可以查看详细信息并进行修改
                                        echo "<td>".$res[$i]."</td>";
                                        echo "<td>".$res2['company']."</td>";
                                        echo "<td>".$res2['phone']."</td>";
                                        echo "<td>".$res2['mail']."</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right">
                                <a href="clientList.php">更多 <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /. ROW  -->
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