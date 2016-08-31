<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
include "function/function.php";
$menu = "goods";
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
                        我的物品 <small>欢迎你<?php echo $_SESSION['clientname']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            我的全部物品
                        </div>
                        <button class="btn btn-primary add_goods" data-toggle="modal" data-target="#GoodsModal" style="margin:10px 0 0 10px">
                            添加物品
                        </button>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>物品id</th>
                                        <th>重量</th>
                                        <th>类型</th>
                                        <th>状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../order/function/function.php";
                                    include "../goods/function.php";
                                    $gid = showGoods($id);
                                    if (showGoods($id) == "尚未添加物品") {
                                        echo "<div class=\"alert alert-warning\">";
                                        echo "<strong>遗憾！</strong> 你还没有添加物品哦！</div>";
                                    }else{
                                        for ($i = 0; $i < count($gid); $i++) {
                                            $res = getGoods($gid[$i]);
                                            echo "<tr>";
                                            echo '<td>'.$gid[$i].'</td>';
                                            echo '<td>'.$res['weight'].'</td>';
                                            echo '<td>'.$res['tid'].'</td>';
                                            echo '<td>'.$res['status'].'</td>';
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
    $(function(){
        $(".add_goods").click(function(){
            $("#id").val("");
            $("#actionFlag").val("add");
            $("#weight").val("");
            $("#type").val("");
            $("#isdelete").bootstrapSwitch("state", false);
        });
        $("#save_goods").click(function(){
            $.ajax({
                type: "POST",
                url: "http://localhost:8080/client/editGoods",
                data: $("#edit_Goods").serialize(),
                dataType: "json",
                success: function(data){
                    temp = eval(data);
                    if(temp.state == "error"){
                        alert("保存失败");
                    }else if(temp.state == "success"){
                        alert("保存成功");
                        window.location.href = "goodslist.php";
                    }
                },
                error: function(){
                    alert("错误");
                }
            })
        })
    });

</script>

<div class="modal fade" id="GoodsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加</h4>
            </div>
            <div class="modal-body">
                <form action="" id="edit_Goods">
                    <input type="hidden" name="id" id="id" value="">
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