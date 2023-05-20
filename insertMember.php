<?php
include("connect.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $data_nastere = $_POST['data_nastere'];
    $description = $_POST['description'];
}

if(!empty($nume)&&!empty($prenume)&&!empty($data_nastere)&&!empty($description))
{
    $query = "insert into membri (nume, prenume, data_nastere, description) VALUES ('$nume', '$prenume', '$data_nastere','$description')";
    mysqli_query($con,$query);
    echo "Data inserted successfully.";
    die;
}


?>