<?php /**
 * Created by PhpStorm.
 * User: qjkobe
 * Date: 2016/6/27
 * Time: 12:27
 */
function dbconn()
{
    $servername = "localhost";
    $username = "root";
    $password = "wdnyhghyt";
    $dbname="logistics";

    $conn = new mysqli($servername, $username, $password,$dbname);
    return $conn;
}


