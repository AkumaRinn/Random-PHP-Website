<?php
include("connect.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nume = $_POST['numeDel'];
    if(!empty($nume))
    {
        $queryCheck = "select * from membri where nume = '$nume'";
        $resultCheck = mysqli_query($con,$queryCheck);
        
        if($resultCheck && mysqli_num_rows($resultCheck)> 0)
        {
            $user_data = mysqli_fetch_assoc($resultCheck);
            if($user_data['nume'] === $nume)
            {
                $query = "delete from membri where nume = '$nume'";
                $result = mysqli_query($con,$query);
                if($result)
                {
                    echo "Member deleted!";
                    die;
                }
            }
                
        }
        echo "Wrong member name!";   
    }
    else
    {
        echo "Wrong member name!";
    }
}


?>