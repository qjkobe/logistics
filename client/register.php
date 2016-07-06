<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/6
 * Time: 18:01
 */
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$errormsg = "";
include "function/function.php";
$res=search($username);
if($res=="用户名重复"){
    $errormsg="用户名重复";
}else{
    $res = add($username, $password);
    if ($res == "插入成功") {
        header("refresh:0;url=../index.php");
    }else{
        $errormsg = "数据库错误，请联系管理员";
    }
}
$_SESSION['errormsg'] = $errormsg;
header("refresh:0;url=../reg.php");
?>
</body>
</html>


