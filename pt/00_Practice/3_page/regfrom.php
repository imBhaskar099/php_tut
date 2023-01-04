<?php
$host="localhost";
$user="root";
$password="";
$db="test";

$con=mysqli_connect($host,$user,$password,$db);

if(!$con)
{
    die("Not Connected");
}
// else
// {
//     echo("Connected");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regform</title>
</head>
<body>
 <h1>Registration Form</h1><br>
 <form action="" method="POST">
 Name: <input type="text" name="name"><br>
 Fees: <input type="number" name="fees"><br>
 Email: <input type="text" name="email"><br>
 <a href="verifydetails.php"><input type="submit" name="reg" value="Submit"></a><br><br>

 Click here to check your details:<input type="submit" name="showtable" value="Show Details">
 </form>
</body>
</html>

<!----------------------------------------- Registration Form Starts---------------------------------------------->
<?php
if(isset($_REQUEST["reg"]))
{
    if( (($_REQUEST["name"]=="")) || (($_REQUEST["fees"]=="")) || (($_REQUEST["email"]=="")) )
    {
        echo ("<script>window.alert('Please enter all fields')</script>");
    }

    else
    {
        $name=$_REQUEST["name"];
        $fees=$_REQUEST["fees"];
        $email=$_REQUEST["email"];

        $sql="INSERT INTO info (Name,Fees,Email) values('$name','$fees','$email')";

        if(mysqli_query($con,$sql))
        {
            echo ("<script>window.alert('Data entered successfully')</script>");
            
        }
        else
        {
            echo ("<script>window.alert('Failed to enter data')</script>");
        }
        
    }
}
?>
<!---------------------------------- Registration Form Ends------------------------------------------------------ -->

<!--------------------------------------- Show table starts---------------------------------------------------------->

<?php

if (isset($_REQUEST["showtable"])) {
    $sql = "select * from info";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<table  border="3" style="padding: 6px; margin: auto; text-align: center; width: 350px; ">';
        echo '<thead>';
        echo '<tr>';
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Fees</th>";
        echo "<th>Email</th>";

        echo "<th>Update</th>";
        echo "<th>Remove</th>";
        
        echo "</thead>";
        echo "<tr>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['fees'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";

            echo '<td>
                <form action="" method="POST">
                <input type="hidden" name="id" value='.$row["id"].'>
                <input type="submit" value="Update" name="updt">
                </form>
                </td>';

            echo '<td>
                <form action="" method="POST">
                <input type="hidden" name="id" value='.$row["id"].'>
                <input type="submit" value="Delete" name="dele">
                </form>
                </td>';

            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No Data Found";
    }
}

?>


// <!--------------------------------------- Show table Ends---------------------------------------------------------->


// <!--------------------------------------- Delete Details Starts----------------------------------------------------->


<?php

if(isset($_REQUEST["dele"]))
{   

    $id = $_REQUEST['id'] ;
    $sql = "DELETE FROM info WHERE id='".$id."' " ;

    if (mysqli_query($con,$sql))
    {
        echo '<script>window.alert("Data Deleted Succesfully")</script>' ;
        
    }

    else
    {
        echo '<script>window.alert("Unable to Delete Data")</script>'   ; 
    }
 

}
?>
// <!--------------------------------------- Delete Details Ends------------------------------------------------------>

// <!--------------------------------------- Update Details Starts----------------------------------------------------->
<?php
if(isset($_REQUEST["updt"]))
{
    $id = $_REQUEST["id"] ;
    $sql  = "select * from info where id = '".$id."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $fees = $row['fees'];
    $email = $row['email'] ;

    
    // $sql = "INSERT INTO info WHERE id='".$id."' " ;
    
    echo '<form action="" method="POST">
            <input type="hidden" name="id" value='.$id.'>
            Name: <input type="text" name="name" value="'.$name.'"><br>
            Fees: <input type="number" name="fees" value="'.$fees.'"><br>
            Email: <input type="text" name="email" value="'.$email.'"><br>

            <input type="submit" value="Update Now" name="updt_2">

        </form>';

}
               
    if(isset($_REQUEST["updt_2"]))
    {
                    $name = $_REQUEST["name"];
                    $fees = $_REQUEST["fees"];
                    $email = $_REQUEST["email"];
            
                    $sql = "update info set name='$name' , email='$email' , fees='$fees' where email='".$email."'  ";
            
                    if (mysqli_query($con,$sql))
                    {
                    echo "<script>window.alert('Data Registered Sucessfully')</script>";
                        
                    }
                    else
                    {
                        echo "<script>window.alert('Data Registered Failed')</script>";
                        
            
                    }
    }                
                           
?>