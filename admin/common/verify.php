<?php
if($_GET['username'] != null){
    $_SESSION['adminname'] = $_GET['username'];
}
$username = $_SESSION['adminname'];
if($username == null || $username == ""){
    echo "<script>window.location.href = '../index.php'</script>";
}