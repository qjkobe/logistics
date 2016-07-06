<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/1
 * Time: 14:43
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
include 'function/function.php';
$staff = $_SESSION['staff'];
$res = getStaff($staff);
?>
用户ID：尚不显示 <br>
用户名：<?php echo $staff; ?><br>
真名：<?php echo $res['name']; ?><br>
邮箱：<?php echo $res['mail']; ?><br>
手机：<?php echo $res['phone']; ?><br>
介绍：<?php echo $res['contro']; ?><br>
头像：<?php echo $res['avatar']; ?><br>
</body>
</html>


