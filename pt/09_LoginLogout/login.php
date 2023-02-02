<?php
include('db.php');
?>

<!-- Starting HTML Codes for login -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>

   
   
    
   body{
      
      margin: 0px;
      padding: 0px ;
      font-family: sans-serif;
      background: #34495e;
     
    }

    .box{
      width: 307px;
      padding: 44px;
      position: absolute ;
      top: 50% ;
      left:50% ;
      transform: translate(-50% , -50%) ;
      background: #000;
      text-align:center;     
      height: 369px;
      box-shadow: 7px 10px 26px 20px #10d0ef;
    }

    .box h1{
      color:white ;
      text-transform: uppercase;
      font-weight: 500;
    }

    .box input[type = "text"] , .box input[type= "password"] , .box input[type= "email"]{
      border: 0;
      background: none;
      margin: 20px  auto ;
      text-align: center;
      border: 2px solid #3498db ;
      padding: 14px 10px ;
      width: 200px ;
      outline: none ;
      color: white;
      border-radius: 24px;
      transition: 0.25s;

    }

    .box input[type = "text"]:focus , .box input[type= "password"]:focus , .box input[type= "email"]:focus{
      width:280px;
      border-color: #2ecc71;
    }

    .box .btn{
      background: none;
      margin: 23px auto;
      text-align: center;
      border: 2px solid #2ecc71 ;
      padding: 14px 40px ;
      outline: none ;
      color: white;
      border-radius: 24px;
      transition: 0.25s;
      cursor:pointer;
    }

    .btn:hover{
      background: #2ecc71 ;
    }

  
  </style>
</head>
<body>
  <div class="main">
    <form action="" method="post" class="box">
      <h1>Log In</h1>
      <input type="email" name="email" id="" placeholder="Type your E-Mail">
      <br> <br>
      <input type="password" name="pass" id="" placeholder="Password">
      <br><br>
      <input type="submit" value="Log In" name="log" class="btn">
      <a href="signup.php"><input type="button" value="Sign Up" class="btn"></a>    
    </form>
  </div>
</body>
</html>

<!-- Ending HTML Codes for login -->

<?php
session_start() ;
if(!isset($_SESSION['islogin']))
{
    if(isset($_REQUEST["log"]))
    {
        if(($_REQUEST["email"]=="") || ($_REQUEST["pass"])=="")
        {
            echo"<script>window.alert('Please enter all fields')</script>";
        }
        else
        {
            $email=$_REQUEST["email"];
            $pass=$_REQUEST["pass"];
            $sql = " select email , pass from signup where email = '".$email."' && pass = '".$pass."' ";
            $result = mysqli_query($conn,$sql);


            $sql1="SELECT * FROM signup where email='".$email."'";
            $result=mysqli_query($conn,$sql1);
            $row=mysqli_fetch_assoc($result);
            $name=$row['name'];
        

            if(mysqli_num_rows($result)==1)
            {
                $_SESSION['email']=$email;
                $_SESSION['name']=$name;
                $_SESSION['islogin']=true;

                $sql1="SELECT * FROM signup where email='".$email."'";
                $result=mysqli_query($conn,$sql1);
                $row=mysqli_fetch_assoc($result);
                $time=$row['time'];
                $time = $time + 1 ;
                $sql2 = " update signup set time = '$time' where email='".$email."'";
                if(mysqli_query($conn , $sql2))
                {
                  echo '<script>location.href="home.php"</script>' ;
                }

              
            }
            else
            {
                echo'<script>window.alert("Wrong Email or Password ")</script>';
            }

        }
    }
}
else
{
    echo'<script>location.href="home.php"</script>';
}
?>