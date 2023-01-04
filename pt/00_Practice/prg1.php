
<!-- start of table -->

<?php
$host="localhost";
$user="root";
$password="";
$db="university";

$con=mysqli_connect($host,$user,$password,$db);

// $sql="CREATE TABLE details
//     (
//     S_no int(10) AUTO_INCREMENT primary key,
//     Name char(50),
//     Address varchar(100),
//     Phone_no int(30)

//     )";

// if(mysqli_query($con,$sql))
// {
//     echo"<br> Table Created <br>";
// }    

// else{
//     echo"<br> Table Not Created <br>";
// }
?>
<!-- end of table -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrations Open</title>
</head>
<body>
    <form action="" method="POST">
        Name: <input type="text" name="name"><br>
        Address: <input type="text" name="address"><br>
        Phone: <input type="number" name="phone"><br>
        <input type="submit" name="reg" value="Register">
    </form>
</body>
</html>

<?php
if(isset($_REQUEST['reg']))
{
    if(($_REQUEST['name']=='')||($_REQUEST['address']=='')||($_REQUEST['phone']==''))
    {
        echo "<script>window.alert('Fill all the fields')</script>";
    }

    else
    {
        $name=$_REQUEST["name"];
        $address=$_REQUEST["address"];
        $phone=$_REQUEST["phone"];

        $sql= "INSERT INTO details (Name,Address,Phone_no) VALUES ('$name','$address','$phone')";
        if(mysqli_query($con,$sql))
        {
            echo "<script>window.alert('Form Submited Successfully')</script>";
        }
        else
        {
            echo "<script>window.alert('Form Submition Failed')</script>";
        }
    }

}
?>