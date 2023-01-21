!-- Staring PHP Codes for database Connection -->

<?php

$host="localhost";
$user="root";
$pass="";
$db="office";
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn)
{
die("Connection Failed");
}
?>

<!-- Ending PHP Codes for database Connection -->

<!-- Starting HTML Codes for Checkbox -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>www.CheckboxCrud.com</title>
</head>
<body>
<?php
$a=[];
$b=[];
if(isset($_REQUEST['edit']))
{
    $srno=$_REQUEST['srno'];
    $sql="SELECT *FROM checkbox WHERE srno='".$srno."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $a=$row['plang'];
    $b=explode(',',$a); 
    //print_r($b);
}
?>
<form action="" method="POST">
    <h1>Skills</h1>

    Name: <input type="text" name="name" placeholder="Write your Name"
    value="<?php if(isset($row['name'])){echo $row['name'];} ?>">

    <br><br>
    
    C<input type="checkbox" name="plang[]" value="C"
    <?php if(in_array("C",$b)){echo "checked";} ?>>
    
    C++<input type="checkbox" name="plang[]" value="C++"
    <?php if(in_array("C++",$b)){echo "checked";} ?>>
    
    Java<input type="checkbox" name="plang[]" value="Java"
    <?php if(in_array("Java",$b)){echo "checked";} ?>>
    
    PHP<input type="checkbox" name="plang[]" value="PHP"
    <?php if(in_array("PHP",$b)){echo "checked";} ?>>
    
    SQL<input type="checkbox" name="plang[]" value="SQL"
    <?php if(in_array("SQL",$b)){echo "checked";} ?>><br><br>
    
    <input type="submit" value="Register" name="reg">
    <input type="submit" value="Show Tables" name="show">
    <input type="hidden" name="srno" value="<?php if(isset($row['srno'])){echo $row['srno'];} ?>">
    <input type="submit" value="Update" name="update">
</form>
</body>
</html>

<!-- Ending HTML Codes for Checkbox -->

<!-- Starting PHP Codes for inserting Data -->
<?php

if(isset($_REQUEST['reg']))
{
if(empty($_REQUEST['plang']))
{
    echo'<script>window.alert("Fill all the Fields")</script>';
}
else
{
    $name = $_REQUEST['name']; 
    $plang=$_REQUEST['plang'];
    //print_r($plang);
    $final_skills=implode(',',$plang);
    //echo $final_skills;
    $sql="INSERT INTO checkbox(name,plang)VALUEs('$name','$final_skills')";
    if(mysqli_query($conn,$sql))
    {
        echo'<script>window.alert("Data Inserted Succesfully")</script>';
    }
    
    else
    {
        echo'<script>window.alert("Unable to Insert Data")</script>';
    }
}

}
?>

<!-- Ending PHP Codes for inserting Data -->

<!-----------------------Start PHP Code For Fetch Data--------------------->
<?php

echo "<br><br>";
if(isset($_REQUEST['show']))
{
    $sql="SELECT *FROM checkbox";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
        echo'<table border="2">';
        echo"<tr>";
        echo"<th>Name</th>";
        echo"<th>Skills</th>";
        echo"<th>Delete</th>";
        echo"<th>Edit</th>";
        echo"</tr>";
        echo"<tbody>";
        while($row=mysqli_fetch_assoc($result))
        {
            echo'<tr>';
            echo"<td>".$row['name']."</td>";
            echo"<td>".$row['plang']."</td>";
            echo'<td><form action="" method="POST">
            <input type="hidden" name="srno" value='.$row["srno"].'>
            <input type="submit" value="Delete" name="del"></form></td>';
            echo'<td><form action="" method="POST">
            <input type="hidden" name="srno" value='.$row["srno"].'>
            <input type="submit" value="Edit" name="edit"></form></td>';
            echo'</tr>';
        }
        echo"</tbody>";
        echo"</table>";
    }
}

?>
<!-----------------------End PHP Code For Fetch Data----------------------->

<!----------------------Start PHP Code For Delete Data--------------------->
<?php

if(isset($_REQUEST['del']))
{
    $srno=$_REQUEST['srno'];
    $sql="DELETE FROM checkbox WHERE srno='".$srno."'";
    if(mysqli_query($conn,$sql))
    {
        echo'<script>window.alert("Data Deleted Succesfully")</script>';
        echo'<script>location.href="13_Checkbox.php"</script>';
    }
    else
    {
        echo'<script>window.alert("Unable to Delete Data")</script>';
    }
}

?>
<!----------------------End PHP Code For Delete Data---------------------->
<!----------------------End PHP Code For Update Data---------------------->
<?php
if(isset($_REQUEST['update']))
{
if(empty($_REQUEST['plang']))
  {
    echo'<script>window.alert("Please Fill all The Fields")</script>';
  }
  
  else
  {
    $srno=$_REQUEST['srno'];
    $name=$_REQUEST['name'];
    $rEdu=$_REQUEST['plang'];
    $rFinalEdu=implode(',',$rEdu);
    $sql="UPDATE checkbox SET plang='$rFinalEdu' , name='$name' WHERE srno='".$srno."'";
    if(mysqli_query($conn,$sql))
    {
        echo'<script>window.alert("Data Updated Succesfully")</script>';
        echo'<script>location.href="13_Checkbox.php"</script>';
    }
    else
    {
        echo'<script>window.alert("Unable to Update Data")</script>';
    }
  }
}

?>
<!----------------------End PHP Code For Update Data---------------------->