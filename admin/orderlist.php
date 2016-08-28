<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "orderlist";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>管理员后台管理界面</title>
    <?php
    include_once "common/headjs.php"
    ?>

</head>
<?php
include_once "common/verify.php"
?>
<body>
<div id="wrapper">
    <?php
    include_once "common/header.php"
    ?>
    <!--/. NAV TOP  -->
    <?php
    include_once "common/left.php"
    ?>
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        订单详细 <small>欢迎你<?php echo $_SESSION['adminname']; ?></small>
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
                                        <th>订单号</th>
                                        <th>客户号</th>
                                        <th>员工号</th>
                                        <th>物品号</th>
                                        <th>路线号</th>
                                        <th>金额</th>
                                        <th>下单时间</th>
                                        <th>订单状态</th>
                                        <th>目的地</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../order/function/function.php";
                                    $orderlist=showOrder();
                                    for ($i = 0; $i < count($orderlist); $i++) {
                                        $Orderinfo=searchOrder($orderlist[$i]);
                                        if($i%2==0){
                                            echo '<tr class="odd">';
                                        }else{
                                            echo '<tr class="even">';
                                        }
                                        echo '<td>'.$orderlist[$i].'</td>';
                                        echo '<td>'.$Orderinfo['cid'].'</td>';
                                        echo '<td>'.$Orderinfo['sid'].'</td>';
                                        echo '<td>'.$Orderinfo['gid'].'</td>';
                                        echo '<td>'.$Orderinfo['rid'].'</td>';
                                        echo '<td>'.$Orderinfo['expense'].'</td>';
                                        echo '<td>'.$Orderinfo['xiadantime'].'</td>';
                                        echo '<td>'.$Orderinfo['status'].'</td>';
                                        echo '<td>'.$Orderinfo['destination'].'</td>';
                                        echo '</tr>';
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>

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
