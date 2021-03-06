<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/27
 * Time: 12:22
 */
include dirname(__FILE__) . '/../../db/db.php';
function add($username, $password)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "insert into staff(username,password) values('$username','$password')";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "插入成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function delete($username)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "delete from staff where username=$username";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "删除成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function changePass($username, $password)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "update staff set password=$password where username=$username";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function filldata($username, $name, $mail, $phone, $contro)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "update staff set name='$name',mail='$mail',phone='$phone',contro='$contro'"
        . "where username='$username'";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function setavatar($username, $avatar)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "update staff set avatar='$avatar'"
        . "where username='$username'";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getdata($username)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $name=$mail=$phone=$contro=$avatar='';
    $sql = "select * from staff where username='$username'";
    $result = $conn->query($sql);
    $res = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $res['name']=$row['name'];
            $res['mail']=$row['mail'];
            $res['phone']=$row['phone'];
            $res['contro']=$row['contro'];
            $res['avatar']=$row['avatar'];
        }
        $conn->close();
        return $res;
    } else {
        $conn->close();
        return "没有此用户名";
    }
}

function getClientdata($cid)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $company = $mail = $phone = $index = $avatar = "";
    $sql = "select * from client where cid=$cid";
    $result = $conn->query($sql);
    $res = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $res['username'] = $row['username'];
            $res['company']=$row['company'];
            $res['mail']=$row['mail'];
            $res['phone']=$row['phone'];
            $res['index']=$row['pindex'];
            $res['avatar']=$row['avatar'];
        }
        $conn->close();
        return $res;
    } else {
        $conn->close();
        return "没有此用户名";
    }
}

function search($username)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from staff where username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $conn->close();
        return "用户名重复";
    } else {
        $conn->close();
        return "ok";
    }
}

function Slogin($username, $password)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "select * from staff where username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($password == $row["password"]) {
                $conn->close();
                return "登陆成功";
            } else {
                $conn->close();
                return "密码错误";
            }
        }
    } else {
        $conn->close();
        return "没有此用户名";
    }
}

function showClient()
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $name=$mail=$phone=$contro=$avatar='';
    $sql = "select * from client";
    $result = $conn->query($sql);
    $res = array();
    $i=0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $res[$i] = $row['username'];
            $i++;
        }
        $conn->close();
        return $res;
    } else {
        $conn->close();
        return "一个都没有";
    }
}

function getClient($username)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $name=$mail=$phone=$contro=$avatar='';
    $sql = "select * from client where username='$username'";
    $result = $conn->query($sql);
    $res = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $res['company']=$row['company'];
            $res['mail']=$row['mail'];
            $res['phone']=$row['phone'];
            $res['index']=$row['pindex'];
            $res['avatar']=$row['avatar'];
        }
        $conn->close();
        return $res;
    } else {
        $conn->close();
        return "没有此用户名";//此情况不该出现
    }
}


function fillCdata($username, $company, $phone, $index, $mail)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "update client set company='$company',phone='$phone',pindex='$index',mail='$mail'"
        . "where username='$username'";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}


function setCavatar($username, $avatar)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $sql = "update client set avatar='$avatar'"
        . "where username='$username'";
    if ($conn->query($sql) === true) {
        $conn->close();
        return "修改成功";
    } else {
        $conn->close();
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getCId($username)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $id='';
    $sql = "select * from client where username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['cid'];
        }
        $conn->close();
        return $id;
    } else {
        $conn->close();
        return "没有此用户名";
    }
}

//得到自己的id
function getId($username)
{
    $conn = dbconn();
    if ($conn->connect_error) {
        die("Connetction failed: " . $conn->connect_error);
    }
    $id='';
    $sql = "select * from staff where username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['sid'];
        }
        $conn->close();
        return $id;
    } else {
        $conn->close();
        return "没有此用户名";
    }
}