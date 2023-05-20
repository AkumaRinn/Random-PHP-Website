<?php
include("connect.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $denumire = $_POST['denumire'];
    
}

if(!empty($denumire))
{
    $query = "insert into repertoriu (denumire) VALUES ('$denumire')";
    mysqli_query($con,$query);
    echo "Data inserted successfully.";
    die;
}


?>