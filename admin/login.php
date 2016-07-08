<?php/**
* Created by PhpStorm.
* User: qjkobe
* Date: 2016/6/24
* Time: 15:11
*/?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    .error{
        color: #F00;;}
</style>
<body>
<?php
include "function/function.php";
//定义变量并默认设置为空值
$errormsg = "";
$username = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$username))
    {
        $errormsg = "用户名只允许字母和空格";
    } else {
        $password = $_POST["password"];
        $result=Alogin($username,$password);
        if ($result == "登陆成功") {
            $errormsg = "登陆成功，三秒后转跳到指定页面";
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['type']=0;
            header("refresh:3;url=index1.php");
        }else if ($result=="没有此用户名") {
            $errormsg = "用户名不存在";
        } else {
            $errormsg = "密码错误";
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    用户名：<input name="username" type="text">
    密码：<input type="password" name="password">
    <input type="checkbox" name="remember">记住密码
    <input type="submit">登录(转跳到个人中心)</input>
    <br><?php echo $errormsg?>
</form>

</body>
</html>

