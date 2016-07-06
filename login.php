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
echo '<img src="images/404.jpg" alt="你能看到这条提示？我服" width="100%" height="100%">';
//定义变量并默认设置为空值
$errormsg = "";
$username = $password =$type= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$username))
    {
        $errormsg = "用户名只允许字母和空格";
        echo "<script type=\"text/javascript\">alert(\"$errormsg\");location.href=\"index.php\"</script>";
    } else {
        $password = $_POST["password"];
        $type = $_POST['type'];
        if($type==0){
            include "admin/function/function.php";
            $result=Alogin($username,$password);
            if ($result == "登陆成功") {
                $errormsg = "登陆成功，三秒后转跳到指定页面";
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['type']=$type;
                echo "nice";
                header("refresh:0;url=admin/index.php");
            }else if ($result=="没有此用户名") {
                $errormsg = "用户名不存在";
                echo "<script type=\"text/javascript\">alert(\"$errormsg\");location.href=\"index.php\"</script>";
            } else {
                $errormsg = "密码错误";
                echo "<script type=\"text/javascript\">alert(\"$errormsg\");location.href=\"index.php\"</script>";
            }
        }else if($type==1){
            include "staff/function/function.php";
            $result=Slogin($username,$password);
            if ($result == "登陆成功") {
                $errormsg = "登陆成功，三秒后转跳到指定页面";
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['type']=$type;
                header("refresh:0;url=staff/index.php");
            }else if ($result=="没有此用户名") {
                $errormsg = "用户名不存在";
                echo "<script type=\"text/javascript\">alert(\"$errormsg\");location.href=\"index.php\"</script>";
            } else {
                $errormsg = "密码错误";
                echo "<script type=\"text/javascript\">alert(\"$errormsg\");location.href=\"index.php\"</script>";
            }
        }else{
            include "client/function/function.php";
            $result=Clogin($username,$password);
            if ($result == "登陆成功") {
                $errormsg = "登陆成功，三秒后转跳到指定页面";
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['type']=$type;
                header("refresh:0;url=client/index.php");
            }else if ($result=="没有此用户名") {
                $errormsg = "用户名不存在";
                echo "<script type=\"text/javascript\">alert(\"$errormsg\");location.href=\"index.php\"</script>";
            } else {
                $errormsg = "密码错误";
                echo "<script type=\"text/javascript\">alert(\"$errormsg\");location.href=\"index.php\"</script>";
            }
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


</body>
</html>

