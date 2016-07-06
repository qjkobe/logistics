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
$username = $company = $mail = $phone = $index = $avatar = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $company = test_input($_POST["company"]);
    $mail = test_input($_POST["mail"]);
    $phone = test_input($_POST["phone"]);
    $index = test_input($_POST["index"]);
    $avatar = "";//图片上传待处理
    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {//正则表达式先不处理了
        $errormsg = "用户名只允许字母和空格";
    } else {
        $result = filldata($username, $company, $phone, $index, $mail, $avatar);
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
    $company = $res['company'];
    $mail = $res['mail'];
    $phone = $res['phone'];
    $index = $res['index'];
    $avatar = $res['avatar'];
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    用户名：<?php echo $_SESSION['username']; ?>
    公司名：<input type="text" name="company" value=<?php echo "\"".$company."\""?>>
    邮箱：<input type="text" name="mail" value=<?php echo "\"".$mail."\""?>>
    电话：<input type="text" name="phone" value=<?php echo "\"".$phone."\""?>>
    个人主页：<input type="text" name="index" value=<?php echo "\"".$index."\""?>>
    头像（暂不支持上传）
    <input type="checkbox" name="remember">记住密码
    <input type="submit">提交</input>
    <br><?php echo $errormsg . $_SESSION['username'] ?>
</form>
</body>
</html>

