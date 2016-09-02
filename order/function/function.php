<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/27
 * Time: 12:22
 */
include_once dirname(__FILE__).'/../../db/db.php';
function addorder($sid, $cid,$gid,$rid,$expense,$xiadantime,$status,$destination)
{
    $conn=dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="insert into orderlist(sid,cid,gid,rid,expense,xiadantime,status,destination) values('$sid','$cid','$gid','$rid','$expense','$xiadantime','$status','$destination')";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "插入成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function deleteorder($oid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "delete from orderlist where oid=$oid";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "删除成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function changeOinfo($oid,$gid,$rid,$expense,$status,$destination)
{//客户员工和下单时间不能修改
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "update orderlist set gid=$gid,rid=$rid,expense=$expense,status=$status,destination=$destination where oid=$oid";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function changeOstatus($oid,$status)
{//客户员工和下单时间不能修改
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "update orderlist set status=$status where oid=$oid";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

//无用函数，先保留
function fillOdata($username,$company, $phone, $index)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql="update client set company=$company,phone=$phone,index=$index"
        ."where username=$username";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}


function staffsearch($sid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from orderlist where sid=$sid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $oid = array();
        $index=0;
        while ($row = $result->fetch_assoc()) {
            $oid[$index] = $row["oid"];
            $index++;
        }
        $conn->close();
        return $oid;
    } else {
        $conn->close();
        return "尚未有订单";
    }
}

function clientsearch($cid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from orderlist where cid=$cid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $oid = array();
        $index=0;
        while ($row = $result->fetch_assoc()) {
            $oid[$index] = $row["oid"];
            $index++;
        }
        $conn->close();
        return $oid;
    } else {
        $conn->close();
        return "尚未有订单";
    }
}

function showOrder()
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from orderlist";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $res[0] = "";
        $in=0;
        while ($row = $result->fetch_assoc()) {
            $res[$in] = $row['oid'];
            $in++;
        }
        $conn->close();
        return $res;
    } else {
        $conn->close();
        return "没有任何订单";
    }
}

function searchOrder($oid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from orderlist where oid='$oid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $orderlist = array();
        while ($row = $result->fetch_assoc()) {
            $orderlist['oid'] = $oid;
            $orderlist['sid'] = $row['sid'];
            $orderlist['cid'] = $row['cid'];
            $orderlist['gid'] = $row['gid'];
            $orderlist['rid'] = $row['rid'];
            $orderlist['expense'] = $row['expense'];
            $orderlist['xiadantime'] = $row['xiadantime'];
            $orderlist['status'] = $row['status'];
            $orderlist['destination'] = $row['destination'];
        }
        $conn->close();
        return $orderlist;
    } else {
        $conn->close();
        return "查无此订单";
    }
}

//无用函数，先保留
function loginO($username, $password)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from client where username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($password == $row["password"]) {
                return "登陆成功";
            } else {
                return "密码错误";
            }
        }
        $conn->close();
    } else {
        $conn->close();
        return "没有此用户名";
    }
}
