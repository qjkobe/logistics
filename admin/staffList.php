<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 15:27
 */
session_start();
$menu = "staff";
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
                        员工列表 <small>欢迎你<?php echo $_SESSION['adminname']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            全部员工
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>员工id</th>
                                        <th>用户名</th>
                                        <th>真名</th>
                                        <th>邮箱</th>
                                        <th>电话</th>
                                        <th>自我介绍</th>
                                        <th>头像</th>
                                        <th>修改</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "function/function.php";
                                    $res=showStaff();
                                    for ($i = 0; $i < count($res); $i++) {
                                        echo "<tr>";
                                        $res2 = getStaff($res[$i]);
                                        $sid[$i]=getSId($res[$i]);
                                        echo "<td><a href='#'>".$sid[$i]."</a></td>";//点击这里可以查看详细信息并进行修改
                                        echo "<td>".$res[$i]."</td>";
                                        echo "<td>".$res2['name']."</td>";
                                        echo "<td>".$res2['mail']."</td>";
                                        echo "<td>".$res2['phone']."</td>";
                                        echo "<td>".$res2['contro']."</td>";
                                        echo "<td>".'<img src="../'.$res2['avatar'].'" width=35 height=35>'."</td>";
                                        echo "<td>"."<form action='staffsavemid.php' method='post'><input type='hidden' name='staff' value='$res[$i]'>".
                                            "<input type='submit' class='btn btn-info' value='info'>".
                                            "</form>"."</td>";
                                        echo "</tr>";
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
