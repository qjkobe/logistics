<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/8
 * Time: 13:32
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
$_SESSION['client']=$_POST['client'];
header("refresh:0;url=clientinfo.php");
?>
</body>
</html>


