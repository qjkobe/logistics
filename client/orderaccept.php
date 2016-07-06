<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/5
 * Time: 15:51
 */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
$oid = $_POST['oid'];
$gid = $_POST['gid'];
include "../goods/function.php";
changeGstatus($gid,1);
include "../order/function/function.php";
changeOstatus($oid,1);
echo "<script>alert('接受成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
?>
</body>
</html>


