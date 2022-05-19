<?php
    $servername = "localhost";
    $dbusername = "root";
    $password = "";
    $dbname = "ta22mk934_db";

    $conn = mysqli_connect($servername, $dbusername, $password, $dbname);

    if (!$conn){
        echo "connection failed" . mysqli_connect_error();
    }
?>