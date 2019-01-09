<?php

$dbName = "ajax";
$dbUser = "root";
$dbPass = "";
$host = "localhost";


$conn = new mysqli($host,$dbUser,$dbPass,$dbName);


if($conn->connect_error)
{

    die("connection failed".$conn->connect_error);

}
//    $conn =  mysqli_connect($host,$dbUser,$dbPass,$dbName);

//if($conn)
//{
//
//    echo "Connection Successfull Connected";
//
//}
//
//else
//
//    {
//
//        echo "Fail connection" ."<br>". mysqli_connect_error();
//
//    }