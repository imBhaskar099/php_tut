<!-- starting php codes for connecting database -->
<?php
$host="localhost";
$user="root";
$password="";
$db="school";

$con=mysqli_connect($host,$user,$password,$db);

if(!$con)
{
    die("Not Connected");
}

// else
// {
//     echo ("Connected");
// }
?>
<!-- Ending php codes for connecting database -->

<!-- starting html codes for input data -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Open</title>
    <style>
        body{
            text-align: center;
            font-family: cursive;
            font-size: 2em;
        }

        #btn{
            padding: 20px;

        }

        #btn:hover{
            color: white;
            background-color: black;
            padding: 30px;
            font-size: 35px;
            
        }
    </style>
</head>
<body>

<h1>Admission Form</h1>
    <form action="" method="POST">
        <div>
            Name : <input type="text" name="name" placeholder="Enter your name">
        </div>
        <br><br>
        
        <div>
        Address : <input type="text" name="address" placeholder="Enter your address" >
        </div>
        <br><br>
        
        <div>
            Fees : <input type="number" name="fee" placeholder="Enter the fees">
        </div>
        <br><br>

        <input type="submit" value="Register Now" name="reg" id="btn">

        
    </form>
</body>
</html>


<!-- ending html codes for input data -->

<!-- Starting codes fo input data in database -->
<?php

if(isset($_REQUEST['reg']))
{
    if( ($_REQUEST['name']=="")|| ($_REQUEST['address']=="")||($_REQUEST['fee']=="")   )
    {
        echo "<script>window.alert('Fill all the Fields')</script>";
    }

    else
    {
        $name = $_REQUEST["name"];
        $address = $_REQUEST["address"];
        $fee = $_REQUEST["fee"];

        $sql = "INSERT INTO student (Name , Address , Fees) VALUES('$name','$address','$fee')";

        if (mysqli_query($con,$sql))
        {
        echo "<script>window.alert('Data Registered Sucessfully')</script>";
            
        }
        else
        {
            echo "<script>window.alert('Data Registered Failed')</script>";
            

        }
    }
}



?>

<!-- Ending codes fo input data in database -->