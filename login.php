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
        //read from db
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con,$query);

        if($result)
        {
            if($result && mysqli_num_rows($result)> 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password']===$password)
                {
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: index.php");
                    die;
                }
            }

        }

        echo "Wrong username or password";
    }
    else
    {
        echo "Wrong username or password";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;">Login</div>
        <br>
        <input type="text" name="user_name"><br><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Login"><br><br>
        <p>or</p>
        <a href="signup.php">click to Signup</a>
    </form>

    </div>
</body>
</html>

