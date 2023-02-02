<?php
include('db.php');

session_start();

if(isset($_SESSION['islogin']))
{
    // Passing the Name from Login page to Home Page and Display It 
    echo "<h1> Welcome &nbsp;".$_SESSION['name']."</h1>";
}

else{
  echo'<script>location.href="login.php"</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome !</title>
  <style>
     #btn{
            background: none;
            margin: 23px auto;
            text-align: center;
            border: 2px solid #2ecc71 ;
            padding: 14px 40px ;
            outline: none ;
            color: black;
            border-radius: 24px;
            transition: 0.25s;
            cursor:pointer;
        }
  </style>
</head>
<body>
  <a href="logout.php"><input type="button" value="Log Out" id="btn"></a>
  
</body>
</html>