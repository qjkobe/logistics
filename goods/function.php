<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/27
 * Time: 12:22
 */
include_once "../db/db.php";
/**
 * 声明：此处物品类型用逗号分割，一个物品可以有多种类型。
 * 在添加物品类型的时候，使用chexkbox进行多选。
 * 或者使用按钮，为每个按钮添加事件，点击按钮就会添加类型，再次点击就取消
 */
function addgoods($cid, $weight,$tid,$status)
{
    $conn=dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="insert into goods(cid,weight,tid,status) values($cid,$weight,'$tid',$status)";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "插入成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function showGoods($cid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from goods where cid='$cid'";
    $result = $conn->query($sql);
    $res = array();
    $in=0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $res[$in] = $row['gid'];
            $in++;
        }
        $conn->close();
        return $res;
    } else {
        $conn->close();
        return "尚未添加物品";
    }
}

function getGoods($gid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from goods where gid='$gid'";
    $result = $conn->query($sql);
    $res = array();
    $in=0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $res['cid'] = $row['cid'];
            $res['weight'] = $row['weight'];
            $res['tid'] = $row['tid'];
            $res['status'] = $row['status'];
        }
        $conn->close();
        return $res;
    } else {
        $conn->close();
        return "没有此物品";
    }
}

function showSGoods()
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from goods where status=0";
    $result = $conn->query($sql);
    $res = array();
    $in=0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $res[$in] = $row['gid'];
            $in++;
        }
        $conn->close();
        return $res;
    } else {
        $conn->close();
        return "尚未待处理物品";
    }
}

function deletegoods($gid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "delete from goods where gid='$gid'";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "删除成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function changeGinfo($gid, $weight,$tid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "update goods set weight='$weight',tid='$tid' where gid='$gid'";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function changeGstatus($gid, $status)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "update goods set status='$status' where gid='$gid'";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

//function gettype($str)
//{
//    $conn = dbconn();
//    if ($conn->connect_error) {
//        die("Connetction failed: " . $conn->connect_error);
//    }
//    $sql = "select * from gtype where type='$str'";
//    $result = $conn->query($sql);
//    if ($result->num_rows > 0) {
//        while ($row = $result->fetch_assoc()) {
//            $conn->close();
//            return $row["tid"];
//        }
//    } else {
//        $conn->close();
//        return "没有此物品类型";
//    }
//}

