<?php
include('connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nume_curent = $_POST['nume_curent'];

    if(!empty($nume_curent))
    {
        $queryCheck = "select * from membri where nume = '$nume_curent'";
        $resultCheck = mysqli_query($con,$queryCheck);
        if($resultCheck && mysqli_num_rows($resultCheck)> 0)
        {
            $user_data = mysqli_fetch_assoc($resultCheck);

            if(empty($_POST['data_nastere_noua'])||$_POST['data_nastere_noua']=='0000-00-00')
            {
                $data = $user_data['data_nastere'];
            }
            else
            {
                $data = $_POST['data_nastere_noua'];
            }
            if(empty($_POST['prenume_nou']))
            {
                $prenume = $user_data['prenume'];
            }
            else
            {
                $prenume = $_POST['prenume_nou'];
            }
            if(empty($_POST['descriere_noua']))
            {
                $descriere = $user_data['description'];
            }
            else
            {
                $descriere = $_POST['descriere_noua'];
            }

            $query = "update membri set prenume = '$prenume', data_nastere = '$data', description = '$descriere' where nume = '$nume_curent'";
            $result = mysqli_query($con,$query);
            if($result)
            {
                echo"Member data updated.";
            }
            die;
        }
        echo"Wrong name!";
    }
    echo"Wrong name!";
}
?>