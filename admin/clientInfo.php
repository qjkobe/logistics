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
$client = $_SESSION['client'];
$res = getClient($client);
?>
用户ID：尚不显示 <br>
用户名：<?php echo $client; ?><br>
公司：<?php echo $res['company']; ?><br>
电话：<?php echo $res['phone']; ?><br>
主页：<?php echo $res['index']; ?><br>
邮箱：<?php echo $res['mail']; ?><br>
头像：<?php echo $res['avatar']; ?><br>
</body>
</html>


