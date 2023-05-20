<?php
include('connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $denumire = $_POST['denumire'];
    $new_denumire = $_POST['new_denumire'];

    if(!empty($denumire))
    {
        $queryCheck = "select * from repertoriu where denumire = '$denumire'";
        $resultCheck = mysqli_query($con,$queryCheck);
        if($resultCheck && mysqli_num_rows($resultCheck)> 0)
        {
            $user_data = mysqli_fetch_assoc($resultCheck);
            $query = "update repertoriu set denumire = '$new_denumire' where denumire = '$denumire'";
            $result = mysqli_query($con,$query);
            if($result)
            {
                echo"Repertory data updated.";
            }
            die;
        }
        echo"Wrong data!";
    }
    echo"Wrong data!";
}
?>