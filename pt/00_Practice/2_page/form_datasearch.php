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
        echo "<td>".$row['S_no']."</td>";
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['Address']."</td>";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Datasearch</title>
</head>
<body>
    <h1>Search Your Details</h1>
    Enter your ID: <input type="number"> <br>
    <input type="submit" name="sub" value="Search">
</body>
</html>