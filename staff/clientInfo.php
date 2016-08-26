<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
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
    <?php
    include_once "common/headjs.php"
    ?>
</head>
<?php
include_once "common/verify.php"
?>
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
                        客户信息 <small>欢迎你<?php echo $_SESSION['staffname']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            客户信息
                        </div>
                        <?php
                        $client = $_SESSION['client'];
                        $Cres = getClient($client);
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="clientsave.php">
                                        <div class="form-group">
                                            <label>客户id</label>
                                            <p class="form-control-static"><?php echo getCId($client);; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>用户名</label>
                                            <p class="form-control-static"><?php echo $client; ?></p>
                                        </div>
                                        <input type="hidden" name="Cusername" value="<?php echo $client; ?>">
                                        <div class="form-group">
                                            <label>公司</label>
                                            <input class="form-control" name="company" placeholder="真实姓名" value=<?php echo "\"".$Cres['company']."\""?>>
                                        </div>
                                        <div class="form-group">
                                            <label>电话</label>
                                            <input class="form-control" name="phone" placeholder="邮箱" value=<?php echo "\"".$Cres['phone']."\""?>>
                                        </div>
                                        <div class="form-group">
                                            <label>主页</label>
                                            <input class="form-control" name="index" placeholder="电话" value=<?php echo "\"".$Cres['index']."\""?>>
                                        </div>
                                        <div class="form-group">
                                            <label>邮箱</label>
                                            <input class="form-control" name="mail" placeholder="电话" value=<?php echo "\"".$Cres['mail']."\""?>>
                                        </div>
                                        <button type="submit" class="btn btn-default">保存</button>
                                        <button type="reset" class="btn btn-default">全部重置</button>
                                        <?php
                                        if($_SESSION['Cerrormsg']!==""){
                                            if ($_SESSION['Cerrormsg'] == "修改成功") {
                                                echo '<div class="alert alert-success">';
                                                echo "<strong>完成！</strong>".$_SESSION['Cerrormsg'];
                                                echo "</div>";
                                                $_SESSION['Cerrormsg'] = "";
                                            }else{
                                                echo '<div class="alert alert-danger">';
                                                echo "<strong>错误！</strong>".$_SESSION['Cerrormsg'];
                                                echo "</div>";
                                                $_SESSION['Cerrormsg'] = "";
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
                                            <?php echo '<img src="../'.$Cres['avatar'].'" width=300 height=300>';?>
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
                                            $tmp=setavatar($client, $_SESSION['path']);
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
<?php
include_once "common/footjs.php"
?>


</body>
</html>