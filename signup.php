<?php
session_start();
include("connect.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_name =$_POST['user_name'];
    $password =$_POST['password'];

    if(!empty($user_name)&&!empty($password) && !is_numeric($user_name))
    {
        //save to db
        
        $query = "insert into users (user_name,password) values ('$user_name','$password')";
        mysqli_query($con,$query);

        header("Location: login.php");
        die;
    }
    else
    {
        echo "Please enter valid info";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>
    <div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;">Signup</div>
        <br>
        <input type="text" name="user_name"><br><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Signup"><br><br>
        <p>Already Signed up?</p>
        <a href="login.php">click to Login</a>
    </form>

    </div>
</body>
</html>

