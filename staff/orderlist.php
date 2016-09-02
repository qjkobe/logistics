<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "orderlist";
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
                            我负责的全部订单
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>订单号</th>
                                        <th>客户号</th>
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
                                    $oid=staffsearch($_SESSION['id']);
                                    if ($oid == "尚未有订单") {
                                        echo "<div class=\"alert alert-warning\">";
                                        echo "<strong>遗憾！</strong> 您尚未有订单</div>";
                                    }else{
                                        for ($i = 0; $i < count($oid)&&$i<7; $i++) {
                                            $Orderinfo = searchOrder($oid[$i]);
                                            if($i%2==0){
                                                echo '<tr class="odd">';
                                            }else{
                                                echo '<tr class="even">';
                                            }
                                            echo '<td>'.$oid[$i].'</td>';
                                            echo '<td>'.$Orderinfo['cid'].'</td>';
                                            echo '<td>'.$Orderinfo['gid'].'</td>';
                                            echo '<td>'.$Orderinfo['rid'].'</td>';
                                            echo '<td>'.$Orderinfo['expense'].'</td>';
                                            echo '<td>'.$Orderinfo['xiadantime'].'</td>';
                                            if($Orderinfo['status'] == 0)
                                                echo '<td>'. '<strong style="color: #ff8269">等待接收</strong>' .'</td>';
                                            if($Orderinfo['status'] == 1)
                                                echo '<td>'. '<strong style="color: #a6c5ff">正在进行</strong>' .'</td>';
                                            if($Orderinfo['status'] == 2)
                                                echo '<td>'.'<strong style="color: green">执行完成</strong>'.'</td>';
                                            echo '<td>'.$Orderinfo['destination'].'</td>';
                                            echo '</tr>';
                                        }
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