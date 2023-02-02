<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "interview";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection Failed");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image</title>
    <style>
        body {
            text-align: center;
        }

        .tab {
            padding: 10px;
            margin: 20px auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        #btn {
            border: 2px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">

        Name: <input type="text" name="name" placeholder="Name Here">
        <br> <br>
        Image: <input type="file" name="image">
        <br> <br>

        <input type="submit" value="Submit" name="reg">
        <input type="submit" value="Show Tables" name="show">

    </form>
</body>

</html>
<!-- Ending HTML Codes for insering Data -->

<!-- Starting PHP Codes to Insert Data -->
<?php

if (isset($_REQUEST['reg']))
{
    if (($_REQUEST['name'] == "") || empty($_FILES['image']))
    {
        echo '<script>window.alert("PLease Fill ALl Ther Fields")</script>';
    }
    else
    {
        $name = $_REQUEST['name'];
        $image = $_FILES['image'];
        $iName = $_FILES['image']['name'];
        $i_tmp_Name = $_FILES['image']['tmp_name'];
        move_uploaded_file($i_tmp_Name,"save/".$iName);

        $sql = "Insert into profile(name,img)VALUES('$name','$iName')";

        if(mysqli_query($conn,$sql))
        {
            echo '<script>window.alert("Image Uploaded Succesfully")</script>';
        }
        else {
            echo '<script>window.alert("Unable To Upload)</script>';
        }

    }
}
?>

<!-- Show table starts -->

<?php
if(isset($_REQUEST['show']))
{
$sql  = " SELECT * FROM profile ";

$result = mysqli_query($conn,$sql);

$not = mysqli_num_rows($result);

echo '<h1> Total number of Rows are = " '.$not.' "</h1>';

if(mysqli_num_rows($result)>0)
{
    echo '<table  border="3" style="padding: 6px; margin: auto; text-align: center; width: 350px; ">';
    echo '<tr>';
    echo '<thead>';

    echo "<th>ID</th>";
    echo"<th>Name</th>";
    echo"<th>Image Name</th>";
    echo"<th>Image</th>";
    echo"<th>Delete</th>";
    echo "</thead>";
    echo"<tr>";
    echo"<tbody>";

    while($row = mysqli_fetch_assoc($result))
    {
        echo"<tr>" ;
        echo"<td>".$row['id']."</td>" ;
        echo"<td>".$row['name']."</td>" ;
        echo"<td>".$row['img']."</td>" ;
        echo '<td> <img src="save/' . $row['img'] . '" height="100" width="150"> </td>';
        echo'<td> 
        <form action="" method="POST">
        <input type="hidden" name="id" value='.$row["id"].'>
        <input type="submit" value="Delete" name="dele">
        </form>
        </td>';
        
        
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
?>

<?php
if(isset($_REQUEST['dele']))
{
    $id=$_REQUEST['id'];
    $sql= "delete from profile where id='".$id."'";

    if(mysqli_query($conn,$sql))
    {
        echo"<script>window.alert('Data Deleted Successfully')</script>";
    }
    else
    {
        echo"<script>window.alert('Failed to delete data')</script>";
    }


}
?>