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
include "client/function/function.php";
//$id = getId("qjkobe");
//echo $id;
$sql = "select * from client where username='qjkobe'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['CID'];
    }
    $conn->close();
} else {
    echo "没有";
    $conn->close();
}
//$conn->close();