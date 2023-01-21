<!--Starting PHP Codes to Connect Database -->

<?php
$host="localhost";
$user="root";
$pass="";
$db="interview1";

$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn)
{
    die("Connection Failed");
}
?>

<!--Starting PHP Codes to Connect Database -->


<!-- Starting HTML Codes to Data Entry -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome</title>
</head>
<body>
    
    <?php
    
    if(isset($_REQUEST['edit']))
    {
        $id=$_REQUEST['id'];
        $sql="SELECT *FROM radio_btn WHERE id='".$id."'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
    }
    
    ?>
    
    <form action="" method="POST">

        Name:<input type="text" placeholder="Type Your Name Here" name="name" 
        value="<?php if(isset($row['name'])){echo $row['name'];} ?>">
        <br><br>

        Gender:
        Male<input type="radio" name="gender" value="Male" 
        <?php if(isset($row['gender'])&&($row['gender']=='Male')){echo "checked";} ?>> 
        Female<input type="radio" name="gender" value="Female"
        <?php if(isset($row['gender'])&&($row['gender']=='Female')){echo "checked";} ?>>
        <br><br>

        Please Select Your Country :
        <select name="country">
            <option value="">Select Your Country</option>
            <option value="India" <?php if(isset($row['country'])&&($row['country']=="India")){echo "selected";} ?>> 
            India</option>
            <option value="Pakistan" <?php if(isset($row['country'])&&($row['country']=="Pakistan")){echo "selected";} ?> >
            Pakistan</option>
            <option value="Nepal" <?php if(isset($row['country'])&&($row['country']=="Nepal")){echo "selected";} ?>>
            Nepal</option>
            
        </select>
        <br><br>

        <input type="submit" value="Register" name="reg">
        <input type="submit" value="Show Tables" name="show">
        <input type="hidden" name="srno" value="<?php if(isset($row['id'])) {echo $row['id'];}?>">
        <input type="submit" value="Update" name="update">
    
    </form>
</body>
</html>

<!-- Ending HTML Codes to Data Entry -->

<!-- Starting PHP Codes to insert data -->

<?php

if(isset($_REQUEST['reg']))
{
    if(($_REQUEST['name']=="")||empty($_REQUEST['gender'])|| empty($_REQUEST['country']))
  {
    echo'<script>window.alert("Please Fill all The Fields")</script>';
  }
  
  else
  {
    $name=$_REQUEST['name'];
    $gender=$_REQUEST['gender'];
    $country=$_REQUEST['country'];
    $sql="INSERT INTO info(name,gender,country)VALUES('$name','$gender','$country')";
    
    if(mysqli_query($conn,$sql))
    {
        echo'<script>window.alert("Registration Succesfully")</script>';
    }

    else
    {
        echo'<script>window.alert("Error")</script>';
    }
  }

}
?>

<!-- Starting PHP Codes to insert data -->


<!--Startring PHP Codes to fetch Data -->

<?php

echo"<br><br>";

if (isset($_REQUEST['show'])) 
{
    $sql="SELECT * FROM  info";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)>0)
    {
        echo'<table border="2">';
        echo"<tr>";
        echo"<thead>";
        echo"<th>Name</th>";
        echo"<th>Gender</th>";
        echo"<th>Country</th>";
        echo"<th>Delete</th>";
        echo"<th>Edit</th>";
        echo"</thead>";
        echo"</tr>";
        echo"<tbody>";
        
        while($row=mysqli_fetch_assoc($result))
        {
            echo'<tr>';
            echo"<td>".$row['Name']."</td>";             //Table coulmn heading Name
            echo"<td>".$row['Gender']."</td>";           //Table coulmn heading Gender
            echo"<td>".$row['Country']."</td>";          //Table coulmn heading Country
            echo '<td> <form action="" method="POST" >
            <input type="hidden" name="srno" value='.$row["id"].'>
            <input type="submit" value="Delete" name="del" id="btn">
            </form>
            </td>';
            echo '<td> <form action="" method="POST" >
            <input type="hidden" name="srno" value='.$row["id"].'>
            <input type="submit" value="Edit" name="edit" id="btn">
            </form>
            </td>';
            
            echo "</tr>";
        }
        echo "</tbody>" ;
        echo '</table>' ;
    }

}
?>



<!--------- Starting PHP Codes to Delete Data ------------------->
<?php

if(isset($_REQUEST['del']))
{
  $id = $_REQUEST['id'] ;
  $sql = "DELETE FROM radio_btn WHERE id='".$id."' " ;
  
  if (mysqli_query($conn,$sql))
  {
    echo '<script>window.alert("Data Deleted Succesfully")</script>' ;
    // echo '<script>location.href="12_Crud_radio_btn.php"</script>' ;
  }
  
  else
  {
    echo '<script>window.alert("Unable to Delete Data")</script>'   ; 
  }

}

?>
<!---------Ending PHP Codes to Delete Data----------------------->


<!---------Ending PHP Codes to Update Data----------------------->
<?php

if(isset($_REQUEST['update']))
{
if(($_REQUEST['name']=="")||empty($_REQUEST['gender'])|| empty($_REQUEST['country']))
  {
    echo'<script>window.alert("Please Fill all The Fields")</script>';
  }
  
  else
  {
    $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $gender=$_REQUEST['gender'];
    $country=$_REQUEST['country'];

    $sql="UPDATE radio_btn SET Name='$name', gender='$gender' , country='$country'
    WHERE id ='".$id."' ";

    if(mysqli_query($conn,$sql))
    {
      echo'<script>window.alert("Data Updated Succesfully")</script>';
      echo'<script>location.href="12_Crud_radio_btn.php"</script>';
    }
    
    else
    {
      echo'<script>window.alert("Data Updated Succesfully")</script>';
    }
  }
}

?>
<!---------Ending PHP Codes to Update Data----------------------->
 