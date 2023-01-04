<?php
$host= "localhost";
$user="root";
$password="";
$db="university";

$con=mysqli_connect($host, $user, $password, $db);

if (!$con)
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
    <title>Datasearch</title>
</head>
<body>

<h1>REGISTRATION FORM</h1>
<form action="" method="POST">
    <p>
        Search: <input type="text" placeholder="enter your id here" name="id">
        <input type="submit" value="search" name="reg">
    </p>
</form>
    
</body>
</html>

<?php

if(isset($_REQUEST["reg"]))
{
    if($_REQUEST['id']=="")

    {
        echo ("<script>window.alert('Please Enter The ID')</script>");
    }

    else
    {
        $id=$_REQUEST["id"];

        $sql="select * from info where ID ='".$id."' ";

        $result = mysqli_query($con , $sql);
        if (mysqli_num_rows($result)>0)
        {
            echo '<table  border="3" style="padding: 6px; margin: auto; text-align: center; width: 350px; ">';
            echo '<thead>';
            echo '<tr>';
            echo "<th>ID</th>";
            echo"<th>Name</th>";
            echo"<th>Fees</th>";
            echo "</thead>";
            echo"<tr>";
            echo"<tbody>";
        
            while($row = mysqli_fetch_assoc($result))
            {
                echo"<tr>" ;
                echo"<td>".$row['ID']."</td>" ;
                echo"<td>".$row['Name']."</td>" ;
                echo"<td>".$row['Fees']."</td>" ;
                echo "</tr>" ;
            }
            echo"</tbody>";
            echo"</table>";
        }
        else
        {
            echo"No Data Found";
        }
           

    }
}

?>