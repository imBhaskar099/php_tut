<?php
include ('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <style>
        html
        {
            background-image: url(1bg.jpg) ;
            background-repeat: no-repeat;
            background-size:100% auto ;
            
            
        }
        *{
            text-align: center;
        }

        #form{
            /* display: flex; */
            /* flex-wrap: wrap; */
            border: black 2px solid;
            margin:50px ;
            margin-top: 100px;
            margin-left:200px ;
            margin-right:200px ;
            padding: 30px;
            background-color: white;
            /* line-height: 44px; */
        }
    </style>
</head>
<body>
    <div id="form">
    <form action="" method="POST">
        <h1>Registrastion Form</h1>
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="mail"><br>
        Password: <input type="password" name="pass"><br><br>
        <input type="submit" name="sign" value="Sign Up"> <br><br>
        Already Signed up? Click here to login: <br>
        <input type="submit" name="log" value="Login"> 
    </form>
    </div>
</body>
</html>

<?php
if(isset($_REQUEST["sign"]))
{

    if(($_REQUEST["name"]=="") || ($_REQUEST["mail"]=="") || ($_REQUEST["pass"]==""))
    {
        echo "<script>window.alert('Please enter all the fields')</script>";
    }

    else
    {
        $name=$_REQUEST["name"];
        $email=$_REQUEST["mail"];
        $pass=$_REQUEST["pass"];

        $sql="INSERT INTO signup(name,email,pass) values('$name','$email','$pass')";

        if(mysqli_query($conn,$sql))
        {
            echo "<script>window.alert('Signup Successful!')</script>";
        }

        else{
            echo "<script>window.alert('Failed to sign up!')</script>";
        }

    }
    
}

else if(isset($_REQUEST["log"]))
{
    // if(($_REQUEST["name"]=="") || ($_REQUEST["mail"]=="") || ($_REQUEST["pass"]==""))
    // {
    //     echo "<script>window.alert('Please enter all the fields')</script>";
    // }

        echo '<script>location.href="login.php"</script>';
}
?>

