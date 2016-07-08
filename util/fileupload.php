<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/7/8
 * Time: 9:05
 */ 
session_start();
$errormsg = "";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 2048000)   // 小于 2 mb
    && in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        $errormsg= "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        $retpath="avatar/" .time(). ".".$extension;
        $path="../".$retpath;
        if (file_exists($path))
        {
            $errormsg= $_FILES["file"]["name"] . " 文件已经存在。 ";
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], $path);
        }
    }
}
else
{
    $errormsg= "非法的文件格式";
}
if ($errormsg !== "") {
    $_SESSION['uploadError'] = $errormsg;
}else{

    $_SESSION['path']=$retpath;
}
echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
?>
</body>
</html>


