<?php
include("connect.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $denumire = $_POST['denumireDel'];
    if(!empty($denumire))
    {
        $queryCheck = "select * from repertoriu where denumire = '$denumire'";
        $resultCheck = mysqli_query($con,$queryCheck);
        
        if($resultCheck && mysqli_num_rows($resultCheck)> 0)
        {
            $user_data = mysqli_fetch_assoc($resultCheck);
            if($user_data['denumire'] === $denumire)
            {
                $query = "delete from repertoriu where denumire = '$denumire'";
                $result = mysqli_query($con,$query);
                if($result)
                {
                    echo "Play deleted!";
                    die;
                }
            }
                
        }
        echo "Wrong play name!";   
    }
    else
    {
        echo "Wrong play name!";
    }
}


?>