<?php
include('connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $locatie = $_POST['locatie'];
    $data_spectacol = $_POST['data_spectacol'];
    $ora_spectacol = $_POST['ora_spectacol'];

    if(!empty($locatie)&&!empty($data_spectacol)&&!empty($ora_spectacol))
    {
        $queryCheck = "select * from program where locatie = '$locatie' and data_spectacol = ' $data_spectacol' and ora_spectacol = '$ora_spectacol'";
        $resultCheck = mysqli_query($con,$queryCheck);
        if($resultCheck && mysqli_num_rows($resultCheck)> 0)
        {
            $user_data = mysqli_fetch_assoc($resultCheck);

            if(empty($_POST['locatie_noua']))
            {
                $locatie_noua = $user_data['locatie'];
            }
            else
            {
                $locatie_noua = $_POST['locatie_noua'];
            }
            if(empty($_POST['data_spectacol_noua'])||$_POST['data_spectacol_noua'] =='0000-00-00')
            {
                $data_spectacol_noua = $user_data['data_spectacol'];
            }
            else
            {
                $data_spectacol_noua = $_POST['data_spectacol_noua'];
            }
            if(empty($_POST['ora_spectacol_noua']))
            {
                $ora_spectacol_noua = $user_data['ora_spectacol'];
            }
            else
            {
                $ora_spectacol_noua = $_POST['ora_spectacol_noua'];
            }

            $query = "update program set locatie = '$locatie_noua', data_spectacol = '$data_spectacol_noua', ora_spectacol = '$ora_spectacol_noua ' where locatie = '$locatie' and data_spectacol = ' $data_spectacol' and ora_spectacol = '$ora_spectacol'";
            $result = mysqli_query($con,$query);
            if($result)
            {
                echo"Program data updated.";
            }
            die;
        }
        echo"Wrong data!";
    }
    echo"Wrong data!";
}
?>