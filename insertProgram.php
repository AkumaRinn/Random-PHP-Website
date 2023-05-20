<?php
include("connect.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $locatie = $_POST['locatie'];
    $data = $_POST['data_spectacol'];
    $ora = $_POST['ora_spectacol'];

    
}

if(!empty($locatie)&&!empty($data)&&!empty($ora))
{
    $query = "insert into program (locatie,data_spectacol,ora_spectacol) VALUES ('$locatie','$data','$ora')";
    mysqli_query($con,$query);
    echo "Data inserted successfully.";
    die;
}


?>