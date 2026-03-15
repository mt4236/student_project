<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "student_project";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("Database connection failed");
}

?>