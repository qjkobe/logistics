<?php
/**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/24
 * Time: 14:47
 */

$servername = "localhost";
$username = "root";
$password = "wdnyhghyt";
$dbname="logistics";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
include "staff/function/function.php";
$avatar="avatar/1467945816.jpg";
$name="金鱼";
$username = "qjkobe";
$sql = "update staff set avatar='$avatar', name='金宇'"
    . "where username='qjkobe'";

$conn->query($sql);
echo "完成";
$conn->close();