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
//     echo ("Connected");
// }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Yourself</title>
    <style>

        html{
            background-color: beige;
            text-align: center;
        }

        #regform{
            font-size: 15px;
            text-align: center;
            
        }
        
        body{
            text-align: center;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            line-height: 10px;
        }
        #regform{
            padding: 20px;
        }

        form{
            margin: 100px;
            padding: 20px;
        }
    
    </style>
</head>
<body>
    <h1>Enter your Details Below</h1><br>
    <form action="" method="POST">
        <div id="regform">
        Name: <input type="text" name="name" placeholder="Enter your name here" required> <br>
        Phone Number: <input type="number" name="phone" placeholder="Enter your phone here" required> <br>
        Address: <input type="text" name="address" placeholder="Enter your address here" required> <br> <br>
        
        <input type="submit" name="reg" value="Register">
        </div>
    </form>
</body>
</html>

<?php



if(isset($_REQUEST['reg']))
{
    if( ($_REQUEST['name']=="")|| ($_REQUEST['address']=="")||($_REQUEST['phone']=="")   )
    {
        echo "<script>window.alert('Fill all the Fields')</script>";
    }

    else
    {
        $name = $_REQUEST["name"];
        $address = $_REQUEST["address"];
        $phone = $_REQUEST["phone"];

        $sql = "INSERT INTO details (Name , Address , Phone_no) VALUES('$name','$address','$phone')";

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

<?php
$sql="select * from details";
$result = mysqli_query($con,$sql);
$not = mysqli_num_rows($result);

echo '<h1> Total no. of rows is "'.$not.'"</h1>';

if(mysqli_num_rows($result)>0)
{
    echo '<table>';
    echo '<tr>';
    echo '<thead>';

    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Address</th>';
    echo '<th>Phone Number</th>';
    echo '</thead>';

    echo '</tr>';
    echo '<tbody>';

    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>".$row['ID']."</td>";
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['Addresss']."</td>";
        echo "<td>".$row['Phone_no']."</td>";

        echo "</td>";
    }

    echo "</tbody>";
    echo "</table>";
}

else{
    echo "DATA NOT FOUND";
}
?>