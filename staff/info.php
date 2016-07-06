<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/1
 * Time: 9:53
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
include "function/function.php";
//定义变量并默认设置为空值
$errormsg = "";
$username = $name = $mail = $phone = $contro = $avatar = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $name = test_input($_POST["name"]);
    $mail = test_input($_POST["mail"]);
    $phone = test_input($_POST["phone"]);
    $contro = test_input($_POST["contro"]);
    $avatar = "";//图片上传待处理
    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {//正则表达式先不处理了
        $errormsg = "用户名只允许字母和空格";
    } else {
        $result = filldata($username, $name, $mail, $phone, $contro, $avatar);
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    用户名：<?php echo $_SESSION['username']; ?>
    真实姓名：<input type="text" name="name" value=<?php echo "\"".$name."\""?>>
    邮箱：<input type="text" name="mail" value=<?php echo "\"".$mail."\""?>>
    电话：<input type="text" name="phone" value=<?php echo "\"".$phone."\""?>>
    个人介绍：<textarea name="contro"><?php echo $contro?></textarea>
    头像（暂不支持上传）
    <input type="checkbox" name="remember">记住密码
    <input type="submit">提交</input>
    <br><?php echo $errormsg . $_SESSION['username'] ?>
</form>
</body>
</html>

