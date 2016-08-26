<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "info";
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
                        个人信息 <small>欢迎你<?php echo $_SESSION['username']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            个人信息
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="infosava.php">
                                        <div class="form-group">
                                            <label>用户名</label>
                                            <p class="form-control-static"><?php echo $_SESSION['username']; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>真实姓名</label>
                                            <input class="form-control" name="name" placeholder="真实姓名" value=<?php echo "\"".$name."\""?>>
                                        </div>
                                        <div class="form-group">
                                            <label>邮箱</label>
                                            <input class="form-control" name="mail" placeholder="邮箱" value=<?php echo "\"".$mail."\""?>>
                                        </div>
                                        <div class="form-group">
                                            <label>电话</label>
                                            <input class="form-control" name="phone" placeholder="电话" value=<?php echo "\"".$phone."\""?>>
                                        </div>
                                        <div class="form-group">
                                            <label>个人简介</label>
                                            <textarea class="form-control" name="contro" rows="3"><?php echo $contro?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">保存</button>
                                        <button type="reset" class="btn btn-default">全部重置</button>
                                        <?php
                                        if($_SESSION['errormsg']!==""){
                                            if ($_SESSION['errormsg'] == "修改成功") {
                                                echo '<div class="alert alert-success">';
                                                echo "<strong>完成！</strong>".$_SESSION['errormsg'];
                                                echo "</div>";
                                                $_SESSION['errormsg'] = "";
                                            }else{
                                                echo '<div class="alert alert-danger">';
                                                echo "<strong>错误！</strong>".$_SESSION['errormsg'];
                                                echo "</div>";
                                                $_SESSION['errormsg'] = "";
                                            }
                                        }
                                        ?>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <div class="col-lg-6">
                                    <form role="form" method="post" action="../util/fileupload.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>头像上传</label><br>
                                            <?php echo '<img src="../'.$avatar.'" width=300 height=300>';?>
                                            <input type="file" name="file">
                                        </div>
                                        <button type="submit" class="btn btn-default">保存</button>
                                        <?php
                                        if($_SESSION['uploadError']!=""){
                                                echo '<div class="alert alert-danger">';
                                                echo "<strong>错误！</strong>".$_SESSION['uploadError'];
                                                echo "</div>";
                                            $_SESSION['uploadError']="";
                                        }else if($_SESSION['path']!==""){
                                            echo '<div class="alert alert-success">';
                                            echo "<strong>完成！</strong>"."刷新查看新头像";
                                            echo "</div>";
                                            $tmp=setavatar($_SESSION['username'], $_SESSION['path']);
                                            $_SESSION['path'] = "";
                                        }
                                        ?>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    
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