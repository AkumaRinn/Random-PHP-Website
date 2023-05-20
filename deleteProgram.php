<?php
include("connect.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $locatie = $_POST['locatieDel'];
    $data = $_POST['data_spectacolDel'];
    $ora = $_POST['ora_spectacolDel'];

    if(!empty($locatie&&!empty($data)&&!empty($ora)))
    {
        $queryCheck = "select * from program where locatie = '$locatie'";
        $resultCheck = mysqli_query($con,$queryCheck);
        
        if($resultCheck && mysqli_num_rows($resultCheck)> 0)
        {
            $user_data = mysqli_fetch_assoc($resultCheck);
            if($user_data['locatie'] === $locatie)
            {
                $query = "delete from program where locatie = '$locatie' and data_spectacol = '$data' and ora_spectacol = '$ora'";
                $result = mysqli_query($con,$query);
                if($result)
                {
                    echo "Play deleted!";
                    die;
                }
            }
                
        }
        echo "Wrong play information!";   
    }
    else
    {
        echo "Wrong play information!";
    }
}


?>