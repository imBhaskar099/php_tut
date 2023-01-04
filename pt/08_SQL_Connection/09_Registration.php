<?php
$host= "localhost";
$user= "root";
$password="";
$db="test";

$con=mysqli_connect($host,$user,$password,$db);

if(!$con)
{
    die("Not Connected");
}

// else
// {
//     echo "Connected";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reg Form</title>
</head>
<body>
    <form action="" method="POST">
        Name: <input type="text" name="name"><br>
        Fees: <input type="number" name="fees"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" name="reg" value="Sumbit here">
    </form>
</body>
</html>

<?php
if(isset($_REQUEST["reg"]))
{
    if((($_REQUEST["name"]=="")) || (($_REQUEST["fees"]=="")) || (($_REQUEST["email"]=="")))
    {
        echo ("<script>window.alert('Please enter all fields')</script>");
    }

    else
    {
        $name=$_REQUEST["name"];
        $fees=$_REQUEST["fees"];
        $email=$_REQUEST["email"];

        $sql= "select email from info where email='".$email."'";{
        $result=mysqli_query($con,$sql);
        }
        if (mysqli_num_rows($result)==1)
        {
            echo ("Email already registered");   
        }

        else
        {
            $sql="INSERT INTO info (Name, Fees, Email) VALUES('$name', '$fees' , '$email')";
            if(mysqli_query($con,$sql))
            {
                echo("<script>window.alert('Data entered successfully')</script>");
            }

            else
            {
                echo("<script>window.alert('Failed to enter data')</script>");
            }

        }
    }
}
?>