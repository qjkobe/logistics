<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/8
 * Time: 10:17
 */ 
session_start();
include "function/function.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
//定义变量并默认设置为空值
$errormsg = "";
$username = $name = $mail = $phone = $contro = $avatar = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $name = test_input($_POST["name"]);
    $mail = test_input($_POST["mail"]);
    $phone = test_input($_POST["phone"]);
    $contro = test_input($_POST["contro"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {//正则表达式先不处理了
        $errormsg = "用户名只允许字母和空格";
    } else {
        $result = filldata($username, $name, $mail, $phone, $contro);
        if ($result == "修改成功") {
            $errormsg = "修改成功";
        } else {
            $errormsg = "数据库出错，联系管理员";
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

$_SESSION['errormsg'] = $errormsg;
header("refresh:0;url=../staff/info.php");
?>

</body>
</html>


