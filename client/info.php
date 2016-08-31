<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/1
 * Time: 9:53
 */
session_start();
$menu = "info";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>客户后台管理界面</title>
    <?php
    include_once "common/headjs.php"
    ?>
</head>
<?php
include_once "common/verify.php"
?>
<body>
<?php
include "function/function.php";
//定义变量并默认设置为空值
$errormsg = "";
$username = $company = $mail = $phone = $index = $avatar = "";
$res = getdata($_SESSION["clientname"]);
if ($res == "没有此用户名") {
    echo "黑客异常";
}else{
    $company = $res['company'];
    $mail = $res['mail'];
    $phone = $res['phone'];
    $index = $res['index'];
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
                        个人信息 <small>欢迎你<?php echo $_SESSION['clientname']; ?></small>
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
                                            <p class="form-control-static"><?php echo $_SESSION['clientname']; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>公司名</label>
                                            <input class="form-control" name="name" placeholder="公司名" value=<?php echo "\"".$company."\""?>>
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
                                            <label>个人主页</label>
                                            <textarea class="form-control" name="contro" rows="3"><?php echo "\"".$index."\""?></textarea>
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
                                            echo "<strong>完成！</strong>"."<a onclick='window.location.reload();'>刷新</a>查看新头像";
                                            echo "</div>";
                                            $tmp=setavatar($_SESSION['clientname'], $_SESSION['path']);
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
            <footer><p>版权所有 <a href="http://qjkobe.com">qjkobe</a></p></footer>
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

