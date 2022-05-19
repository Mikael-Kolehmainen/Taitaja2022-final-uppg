<?php
    $servername = "localhost";
    $dbusername = "ta22mk934_user";
    $password = "niepahy4Chai";
    $dbname = "ta22mk934_DB";

    $conn = mysqli_connect($servername, $dbusername, $password, $dbname);

    if (!$conn){
        echo "connection failed" . mysqli_connect_error();
    }
?>