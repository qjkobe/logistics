<?php
if($_GET['username'] != null){
    $_SESSION['staffname'] = $_GET['username'];
}
$username = $_SESSION['staffname'];
if($username == null || $username == ""){
    echo "<script>window.location.href = '../index.php'</script>";
}