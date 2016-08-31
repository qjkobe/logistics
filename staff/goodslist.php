<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "goods";
include "function/function.php";
$id = getId($_SESSION['staffname']);
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
                        待处理物品 <small>欢迎你<?php echo $_SESSION['staffname']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            全部待处理物品
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>物品id</th>
                                        <th>客户姓名</th>
                                        <th>重量</th>
                                        <th>类型</th>
                                        <th>待运状态</th>
                                        <th>添加订单</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../goods/function.php";
                                    $gid = showSGoods();
                                    if (showSGoods() == "尚未待处理物品") {
                                        echo "<div class=\"alert alert-warning\">";
                                        echo "<strong>遗憾！</strong> 没有待处理物品啦！</div>";
                                    } else {
                                        for ($i = 0; $i < count($gid)&&$i<5; $i++) {
                                            echo "<tr>";
                                            $res = getGoods($gid[$i]);
                                            $res2 = getClientdata($res['cid']);
                                            echo "<td>".$gid[$i]."</td>";
                                            echo "<td>".$res2['username']."</td>";
                                            echo "<td>".$res['weight']."</td>";
                                            echo "<td>".$res['tid']."</td>";
                                            if($res['status'] == 0)
                                                echo "<td>". "<strong style='color: #ff5f66'>待运</strong>" ."</td>";
                                            echo "<td>"."<input type='button' class='btn btn-default add_order' data-toggle=\"modal\" data-target=\"#OrderModal\" value='添加'>"."</td>";
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
                    <input type="hidden" name="cid" id="cid" value="">
                    <input type="hidden" name="cid" id="rid" value="">
                    <input type="hidden" name="clientName" value="<?php echo $_SESSION["clientname"] ?>">
                    <input type="hidden" name="actionFlag" id="actionFlag">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>重量</label>
                                <input class="form-control" placeholder="请输入金额" id="weight" name="weight">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>选择目的地</label>
                                <input class="form-control" placeholder="请输入目的地" id="destination" name="destination">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>选择系统推荐的路线(ctrl多选)</label>
                                <select multiple class="form-control chose-posi" id="rid" name="rid">
                                    <option>易燃</option>
                                    <option>易碎</option>
                                    <option>易污</option>
                                    <option>易腐</option>
                                    <option>有毒</option>
                                </select>
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


