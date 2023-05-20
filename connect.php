<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "web";

if(!$con = mysqli_connect($host,$user,$pass,$db_name))
{
    die("Failed to connect!");
}


?>