<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "place";
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
    include_once "common/left.php";
    ?>
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        地点列表 <small>欢迎你<?php echo $_SESSION['adminname']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-6">
                    <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            地点距离
                        </div>
                        <button class="btn btn-primary add-distance" data-toggle="modal" data-target="#myModal" style="margin:10px 0 0 10px">
                            添加距离
                        </button>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTables3-example">
                                    <thead>
                                    <tr>
                                        <th>地点A</th>
                                        <th>地点B</th>
                                        <th>距离</th>
                                        <th>编辑</th>
                                    </tr>
                                    </thead>
                                    <tbody id="place_list">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Basic Table  -->
                </div>

                <div class="col-md-6">
                    <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            地点信息
                        </div>
                        <button class="btn btn-primary add_position" data-toggle="modal" data-target="#PlaceModal" style="margin:10px 0 0 10px">
                            添加地点
                        </button>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTables2-example">
                                    <thead>
                                    <tr>
                                        <th style="display: none"></th>
                                        <th>地点名</th>
                                        <th>频度</th>
                                        <th>状态</th>
                                        <th>编辑</th>
                                    </tr>
                                    </thead>
                                    <tbody id="position_list">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Basic Table  -->
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
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/place/showPosition",
            data: {},
            dataType: "json",
            success: function(data){
                temp = eval(data);
                var strhtml = "";
                for(var i = 0; i < temp.place.length; i++){
                    strhtml = strhtml + "<tr>";
                    strhtml = strhtml + "<td style='display: none;'>" + temp.place[i].id + "</td>";
                    strhtml = strhtml + "<td>" + temp.place[i].name + "</td>";
                    strhtml = strhtml + "<td>" + temp.place[i].frequence + "</td>";
                    if(temp.place[i].isdelete == 0){
                        strhtml = strhtml + "<td style='color: green'>" + "<strong>开启</strong>" + "</td>";
                    }else if(temp.place[i].isdelete == 1){
                        strhtml = strhtml + "<td style='color: red'>" + "<strong>关闭</strong>" + "</td>";
                    }

                    strhtml = strhtml + "<td>" + "<button class='btn btn-primary' onclick='editPosition($(this));' data-toggle='modal' data-target='#PlaceModal'>"
                        + "<i class='fa fa-edit'></i>编辑" + "</button>" + "</td>";
                    strhtml = strhtml + "</tr>";
                }
                $("#position_list").html(strhtml);
                $('#dataTables2-example').dataTable();
            },
            error: function(){
                alert("错误");
            }
        });
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/place/showPlace",
            data: {},
            dataType: "json",
            success: function(data){
                temp = eval(data);
                var strhtml = "";
                for(var i = 0; i < temp.place.length; i++){
                    strhtml = strhtml + "<tr>";
                    strhtml = strhtml + "<td style='display: none;'>" + temp.place[i].pid + "</td>";
                    strhtml = strhtml + "<td>" + temp.place[i].namex + "</td>";
                    strhtml = strhtml + "<td>" + temp.place[i].namey + "</td>";
                    strhtml = strhtml + "<td>" + temp.place[i].distance + "</td>";

                    strhtml = strhtml + "<td>" + "<button class='btn btn-primary' onclick='editDistance($(this));' data-toggle='modal' data-target='#myModal'>"
                        + "<i class='fa fa-edit'></i>编辑" + "</button>" + "</td>";
                    strhtml = strhtml + "</tr>";
                }
                $("#place_list").html(strhtml);
                $('#dataTables3-example').dataTable();
            },
            error: function(){
                alert("错误");
            }
        });
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/place/avaiPosition",
            data: {},
            dataType: "json",
            success: function(data){
                temp = eval(data);
                var strhtml = "";
                for(var i = 0; i < temp.place.length; i++){
                    strhtml = strhtml + "<option>";
                    strhtml = strhtml + temp.place[i].name;
                    strhtml = strhtml + "</option>";
                }
                $(".chose-posi").html(strhtml);
            },
            error: function(){
                alert("错误");
            }
        });
        $(".add_position").click(function(){
            $("#Posi-actionFlag").val("add");
            $("#Posi-id").val("");
            $("#Posi-frequence").val("0");
            $("#Posi-frequence2").val("0");
            $("#Posi-name").val("");
            $("#Posi-isdelete").bootstrapSwitch("state", false);
        });
        $(".add-distance").click(function(){
            $("#Place-actionFlag").val("add");
            $("#Place-id").val("");
            $("#namex").val("");
            $("#namey").val("");
            $("#distance").val("");
        });

        $("#save_position").click(function(){
            $.ajax({
                type: "POST",
                url: "http://localhost:8080/place/editPosition",
                data: $("#edit_position").serialize(),
                dataType: "json",
                success: function(data){
                    temp = eval(data);
                    if(temp.state == "error"){
                        alert("保存失败！");
                    }else if(temp.state == "success"){
                        alert("保存成功！");
                        window.location.href = "placeList.php";
                    }
                },
                error: function(){
                    alert("错误");
                }
            })
        });
        $("#save_place").click(function(){
            $.ajax({
                type: "POST",
                url: "http://localhost:8080/place/editPlace",
                data: $("#edit_Place").serialize(),
                dataType: "json",
                success: function(data){
                    temp = eval(data);
                    if(temp.state == "error"){
                        alert("保存失败！");
                    }else if(temp.state == "success"){
                        alert("保存成功！");
                        window.location.href = "placeList.php";
                    }
                },
                error: function(){
                    alert("错误");
                }
            })
        });
    });
    function editPosition(obj){
        $("#Posi-actionFlag").val("update");
        $("#Posi-id").val(obj.parent().parent().children("td").eq(0).html());
        $("#Posi-frequence").val(obj.parent().parent().children("td").eq(2).html());
        $("#Posi-frequence2").val(obj.parent().parent().children("td").eq(2).html());
        $("#Posi-name").val(obj.parent().parent().children("td").eq(1).html());
        var del = obj.parent().parent().children("td").eq(3).html();
        if(del == "0"){
            $("#Posi-isdelete").bootstrapSwitch("state", true);
        }else{
            $("#Posi-isdelete").bootstrapSwitch("state", false);
        }
    }
    function editDistance(obj){
        $("#Place-actionFlag").val("update");
        $("#Place-id").val(obj.parent().parent().children("td").eq(0).html());
        $("#namex").val(obj.parent().parent().children("td").eq(1).html());
        $("#namey").val(obj.parent().parent().children("td").eq(2).html());
        $("#distance").val(obj.parent().parent().children("td").eq(3).html());
    }
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加</h4>
            </div>
            <div class="modal-body">
                <form action="" id="edit_Place">
                    <input type="hidden" name="id" id="Place-id" value="">
                    <input type="hidden" name="actionFlag" id="Place-actionFlag">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Selects</label>
                                <select class="form-control chose-posi" id="namex" name="namex" >

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Selects</label>
                                <select class="form-control chose-posi" id="namey" name="namey">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>距离</label>
                                <input class="form-control" placeholder="请输入距离" id="distance" name="distance">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" id="save_place" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="PlaceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加</h4>
            </div>
            <div class="modal-body">
                <form action="" id="edit_position">
                    <input type="hidden" name="id" id="Posi-id" value="">
                    <input type="hidden" name="actionFlag" id="Posi-actionFlag" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>地名</label>
                                <input class="form-control" name="name" id="Posi-name" placeholder="请输入地名">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>频度</label>
                                <input type="hidden" id="Posi-frequence2" name="frequence" value="0">
                                <input class="form-control" type="number" placeholder="" id="Posi-frequence" value="0" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="switch">
                                <label for="Posi-isdelete">状态</label>
                                <input type="checkbox" name="isdelete" id="Posi-isdelete" value="1"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" id="save_position" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</div>
<?php
include_once "common/footjs.php"
?>
<script>
    
</script>
</body>
</html>
