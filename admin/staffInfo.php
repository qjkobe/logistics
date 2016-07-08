<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
include "function/function.php";
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
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">后台管理</a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <div>
                                <strong>金大仙</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                            </div>
                            <div>以后会做成提醒类型的消息</div>
                        </a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <li>
                        <a href="#">
                            <div>
                                <p>
                                    <strong>订单1</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-tasks -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 min</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a href="index1.php"><i class="fa fa-dashboard"></i> 首页仪表盘</a>
                </li>
                <li>
                    <a class="active-menu" href="staffList.php"><i class="fa fa-desktop"></i> 员工信息</a>
                </li>
                <li>
                    <a href="clientList.php"><i class="fa fa-bar-chart-o"></i> 客户信息</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-qrcode"></i> 地点信息</a>
                </li>

                <li>
                    <a href="orderlist.php"><i class="fa fa-table"></i> 订单详细</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> 个人信息修改 </a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>

                            </ul>

                        </li>
                    </ul>
                </li>
                <li>
                    <a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                </li>
            </ul>

        </div>

    </nav>

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        员工信息 <small>欢迎你<?php echo $_SESSION['username']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            员工信息
                        </div>
                        <?php
                        $staff = $_SESSION['staff'];
                        $Sres = getStaff($staff);
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="staffsave.php">
                                        <div class="form-group">
                                            <label>员工id</label>
                                            <p class="form-control-static"><?php echo getSId($staff); ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>用户名</label>
                                            <p class="form-control-static"><?php echo $staff; ?></p>
                                        </div>
                                        <input type="hidden" name="Susername" value="<?php echo $staff; ?>">
                                        <div class="form-group">
                                            <label>真实姓名</label>
                                            <input class="form-control" name="name" placeholder="真实姓名" value=<?php echo "\"".$Sres['name']."\""?>>
                                        </div>
                                        <div class="form-group">
                                            <label>邮箱</label>
                                            <input class="form-control" name="mail" placeholder="邮箱" value=<?php echo "\"".$Sres['mail']."\""?>>
                                        </div>
                                        <div class="form-group">
                                            <label>电话</label>
                                            <input class="form-control" name="phone" placeholder="电话" value=<?php echo "\"".$Sres['phone']."\""?>>
                                        </div>
                                        <div class="form-group">
                                            <label>个人简介</label>
                                            <textarea class="form-control" name="contro" rows="3"><?php echo $Sres['contro']?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">保存</button>
                                        <button type="reset" class="btn btn-default">全部重置</button>
                                        <?php
                                        if($_SESSION['Serrormsg']!==""){
                                            if ($_SESSION['Serrormsg'] == "修改成功") {
                                                echo '<div class="alert alert-success">';
                                                echo "<strong>完成！</strong>".$_SESSION['Serrormsg'];
                                                echo "</div>";
                                                $_SESSION['Serrormsg'] = "";
                                            }else{
                                                echo '<div class="alert alert-danger">';
                                                echo "<strong>错误！</strong>".$_SESSION['Serrormsg'];
                                                echo "</div>";
                                                $_SESSION['Serrormsg'] = "";
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
                                            <?php echo '<img src="../'.$Sres['avatar'].'" width=300 height=300>';?>
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
                                            $tmp=setSavatar($staff, $_SESSION['path']);
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


