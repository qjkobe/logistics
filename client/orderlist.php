<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "orderlist";
include "function/function.php";
$id = getId($_SESSION['clientname']);
$_SESSION['id']=$id;
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
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        我的订单 <small>欢迎你<?php echo $_SESSION['clientname']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            我的订单
                        </div>
<!--                        <button class="btn btn-primary add_order" data-toggle="modal" data-target="#OrderModal" style="margin:10px 0 0 10px">-->
<!--                            申请订单-->
<!--                        </button>-->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>订单id</th>
                                        <th>员工id</th>
                                        <th>物品id</th>
                                        <th>路线id</th>
                                        <th>价格</th>
                                        <th>下单时间</th>
                                        <th>订单状态</th>
                                        <th>目的地</th>
                                        <th>接收订单</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../order/function/function.php";
                                    $oid = clientsearch($id);
                                    if ($oid == "尚未有订单") {
                                        $errormsg = "您尚未有订单";
                                        $oid[0] = "";
                                    }else{
                                        for ($i = 0; $i < count($oid); $i++) {
                                            $res = searchOrder($oid[$i]);
                                            echo "<tr>";
                                            echo '<td>'.$oid[$i].'</td>';
                                            echo '<td>'.$res['sid'].'</td>';
                                            echo '<td>'.$res['gid'].'</td>';
                                            echo '<td>'.$res['rid'].'</td>';
                                            echo '<td>'.$res['expense'].'</td>';
                                            echo '<td>'.$res['xiadantime'].'</td>';
                                            if($res['status'] == 0)
                                                echo '<td>'. '<strong style="color: #ff8269">等待接收</strong>' .'</td>';
                                            if($res['status'] == 1)
                                                echo '<td>'. '<strong style="color: #a6c5ff">正在进行</strong>' .'</td>';
                                            if($res['status'] == 2)
                                                echo '<td>'.'<strong style="color: green">执行完成</strong>'.'</td>';
                                            echo '<td>'.$res['destination'].'</td>';
                                            if($res['status'] == 1)
                                                echo "<td><button class='btn btn-info' id='orderinfo'>正在进行</button></td>";
                                            if($res['status'] == 0)
                                                echo "<td><form method='post' action='orderaccept.php'>" .
                                                    "<input type='hidden' name='oid' value='$oid[$i]'>" .
                                                    "<input type='hidden' name='gid' value='$gid[$i]'>" .
                                                    "<input type='submit' class='btn btn-success' value='接受'>" .
                                                    "</form></td>";
                                            if($res['status'] == 2)
                                                echo "<td><button class='btn btn-success' disabled>已完成</button></td>";
                                            echo "</tr>";
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
<script>
    $(".add_order").click(function(){

    })
</script>
<div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加</h4>
            </div>
            <div class="modal-body">
                <form action="" id="edit_Goods">
                    <input type="hidden" name="oid" id="oid" value="">
                    <input type="hidden" name="sid" id="sid" value="">
                    <input type="hidden" name="clientName" value="<?php echo $_SESSION["clientname"] ?>">
                    <input type="hidden" name="actionFlag" id="actionFlag">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>重量</label>
                                <input class="form-control" placeholder="请输入重量" id="weight" name="weight">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>物品类型(ctrl多选)</label>
                                <select multiple class="form-control chose-posi" id="type" name="type">
                                    <option>易燃</option>
                                    <option>易碎</option>
                                    <option>易污</option>
                                    <option>易腐</option>
                                    <option>有毒</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="switch">
                                <label for="isdelete">状态</label>
                                <input type="checkbox" name="isdelete" id="isdelete" value="1"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" id="save_goods" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</div>
<?php
include_once "common/footjs.php"
?>


</body>
</html>