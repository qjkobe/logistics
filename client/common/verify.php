<?php
if($_GET['username'] != null){
    $_SESSION['clientname'] = $_GET['username'];
}
$username = $_SESSION['clientname'];
if($username == null || $username == ""){
    echo "<script>window.location.href = '../index.php'</script>";
}