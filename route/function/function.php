<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/27
 * Time: 12:22
 */
include dirname(__FILE__).'/../../db/db.php';
function init($place1, $place2, $daodatime)
{
    $conn=dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $place=$place1.",".$place2;
    $sql = "insert into route(place,daodatime) values('$place','$daodatime')";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "插入成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function add($rid,$place1,$daodatime1)
{
    $place=placesearch($rid);
    $daodatime = timesearch($rid);
    $conn=dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $place = $place . "," . $place1;
    $daodatime = $daodatime . "," . $daodatime1;
    $sql = "update route set place=$place,daodatime=$daodatime where rid=$rid";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "地点更新成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function delete($rid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "delete from route where rid=$rid";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "删除成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

//把字符串变成数组
function convert($str)
{
    $result = explode(",", $str);
    return $result;
}

function placesearch($rid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * from route where rid=$rid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $place = $row["place"];
        }
        $conn->close();
        return $place;
    } else {
        $conn->close();
        return "查无此路线";
    }
}

function timesearch($rid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * from route where rid=$rid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $daodatime = $row["daodatime"];
        }
        $conn->close();
        return $daodatime;
    } else {
        $conn->close();
        return "查无此路线";
    }
}


