<!-- <?php
// $host="localhost";
// $user="root";
// $password="";
// $db="interview";

// $con=mysqli_connect($host,$user,$password,$db);

// if(!$con)
// {
//     die("Not Connected");
// }
// else{
//     echo("Connected");
// }
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="" method="POST">
    
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        Salary: <input type="number" name="salary"><br>
        <input type="submit" name="sub" value="Submit Here">
    
    </form>
</body>
</html>

<?php
if(isset($_REQUEST["sub"]))
{
    if( (($_REQUEST["name"])=="") || (($_REQUEST["email"])=="") || (($_REQUEST["salary"])=="") )
    {
        echo("<script>window.alert('Please enter all details')</script>");
    }

    else
    {
        $name=$_REQUEST["name"];
        $email=$_REQUEST["email"];
        $salary=$_REQUEST["salary"];


        echo $salary ;

        if( $salary<=200000)
        {
            echo("No TDS");
        }

        else if( $salary>200000 && $salary<500000)
        {
            echo("TDS = 10%");
        }

        else if($salary>500000)
        {
            echo("TDS = 30%");
        }
        
    }
}
?>