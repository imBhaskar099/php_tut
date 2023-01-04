<?php
$host="localhost";
$user="root";
$password="";
$db="university";

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
    <title>Registration Form</title>
    <style>
        body{
            text-align: center;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            line-height: 10px;
        }
        .input_area{
            padding: 20px;
        }

        form{
            margin: 100px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <div class="input_area">
        Name: <input type="text" name="name" placeholder="Insert Your Name Here"><br>
        Address: <input type="text" name="add" placeholder="Insert Your Address Here"><br>
        Phone: <input type="number" name="phone" placeholder="Insert Your Phone Here"><br><br>
        <input type="submit" value="Submit here" name="sub">
        <input type="submit" value="Show table" name="show">
        </div>
    </form>
</body>
</html>

<?php
if(isset($_REQUEST['sub']))
{
    if(($_REQUEST['name']=="") || ($_REQUEST['add']=="") || ($_REQUEST['phone']==""))
    {
        echo "<script>window.alert('Fill all the fields')</script>";
    }


    else{

        $name=$_REQUEST["name"];

        $address=$_REQUEST["add"];

        $phone=$_REQUEST["phone"];


        $sql="INSERT INTO details (Name, Address, Phone_no)
        VALUES('$name','$address','$phone')";

            if(mysqli_query($con,$sql))
                {
                    echo "<script>window.alert('Data Entred Successfully')</script>";
                }

            else
                {
                    echo "<script>window.alert('Data Submition Failed')</script>";
                }
        }
}
?>

<?php

$sql  = " SELECT * FROM details ";

$result = mysqli_query($con,$sql);

$not = mysqli_num_rows($result);

echo '<h1> Total number of Rows are = " '.$not.' "</h1>';

if(mysqli_num_rows($result)>0)
{
    echo '<table  border="3" style="padding: 6px; margin: auto; text-align: center; width: 350px; ">';
    echo '<tr>';
    echo '<thead>';

    echo "<th>ID</th>";
    echo"<th>Name</th>";
    echo"<th>Address</th>";
    echo"<th>Fees</th>";
    echo "</thead>";
    echo"<tr>";
    echo"<tbody>";

    while($row = mysqli_fetch_assoc($result))
    {
        echo"<tr>" ;
        echo"<td>".$row['S_no']."</td>" ;
        echo"<td>".$row['Name']."</td>" ;
        echo"<td>".$row['Address']."</td>" ;
        echo"<td>".$row['Phone_no']."</td>" ;
        
        echo "</tr>" ;
    }
    echo"</tbody>";
    echo"</table>";
}
else
{
    echo"No Data Found";
}




?>