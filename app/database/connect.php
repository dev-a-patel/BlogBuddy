<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "blog";

    $conn = mysqli_connect("$host","$user","$pass","$db_name");

    // Check connection
    if (mysqli_connect_errno()) 
    {
        die("Failed to connect to MySQL: " . mysqli_connect_error()) ;
        exit();
    }

    /* else
        echo "success"; */
?>