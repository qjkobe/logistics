<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/8
 * Time: 13:59
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
$_SESSION['staff']=$_POST['staff'];
header("refresh:0;url=staffInfo.php");
?>
</body>
</html>


