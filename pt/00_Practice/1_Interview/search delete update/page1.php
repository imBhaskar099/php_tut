<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "interview1";

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    die("Not connected");
}
//  else {
//     echo ("Connected");
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
 Email: <input type="text" name="email"><br>
 Fees: <input type="number" name="fees"><br>
 Password: <input type="text" name="pass"><br>
 <input type="submit" name="reg" value="Submit"><br><br>
 </form>
</body>
</html>

<!----------------------------------------- Registration Form Starts---------------------------------------------->
<?php
if(isset($_REQUEST["reg"]))
{
    if( (($_REQUEST["name"]=="")) || (($_REQUEST["fees"]=="")) || (($_REQUEST["email"]=="")) || (($_REQUEST["pass"]=="")) )
    {
        echo ("<script>window.alert('Please enter all fields')</script>");
    }

    else
    {
        $name=$_REQUEST["name"];
        $fees=$_REQUEST["fees"];
        $email=$_REQUEST["email"];
        $password=$_REQUEST["pass"];

        $sql="INSERT INTO info (Name,Fees,Email,Password) values('$name','$fees','$email','$password')";

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



<!--------------------------------------Datasearch---------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Search Page</title>
</head>

<body>
    <h1>Search your Details</h1>
    <form action="" method="POST">
        Email: <input type="text" name="email" placeholder="Enter your email here"> <br>
        Password: <input type="password" name="pass" placeholder="Enter your password here"><br>
        <input type="submit" name="showtable" value="Submit">
    </form>
</body>

</html>

<?php
if(isset($_REQUEST["showtable"]))
{
    if((($_REQUEST["pass"]=="")) || (($_REQUEST["email"]=="")))
    {
        echo ("<script>window.alert('Please enter all fields')</script>");
    }

    else
    {
        $email=$_REQUEST["email"];
        $password=$_REQUEST["pass"];
        

        $sql= "select * from info where Email='".$email."' and Password='".$password."'";
        {
        $result=mysqli_query($con,$sql);
        }
        if (mysqli_num_rows($result)==1)     //result equals to 1 means the value is present
        {
            echo ("Email already registered");
            // echo ("Password already registered"); 
            
            // if (isset($_REQUEST["showtable"])) {
                $sql = "select * from info";
            
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) 
                {
                    echo '<table  border="3" style="padding: 6px; margin: auto; text-align: center; width: 350px; ">';
                    echo '<thead>';
                    echo '<tr>';
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Fees</th>";
                    echo "<th>Email</th>";
                    echo "<th>Password</th>";
            
                    echo "<th>Update</th>";
                    echo "<th>Remove</th>";
                    
                    echo "</thead>";
                    echo "<tr>";
                    echo "<tbody>";
            
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['fees'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['pass'] . "</td>";
            
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
                }
                    
        }
        
        else 
        {
        echo "No Data Found";
        }
     
    
    
    }

        

    
}
?>

<!-- -----------------------------Data search ends------------------------------------------------ -->

<!--------------------------------------- Show table starts---------------------------------------------------------->

<?php



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
    $password = $row['pass'] ;

    
    // $sql = "INSERT INTO info WHERE id='".$id."' " ;
    
    echo '<form action="" method="POST">
            <input type="hidden" name="id" value='.$id.'>
            Name: <input type="text" name="name" value="'.$name.'"><br>
            Fees: <input type="number" name="fees" value="'.$fees.'"><br>
            Email: <input type="text" name="email" value="'.$email.'"><br>
            Password: <input type="text" name="pass" value="'.$password.'"><br>

            <input type="submit" value="Update Now" name="updt_2">

        </form>';

}
               
    if(isset($_REQUEST["updt_2"]))
    {
                    $name = $_REQUEST["name"];
                    $fees = $_REQUEST["fees"];
                    $email = $_REQUEST["email"];
                    $password = $_REQUEST["pass"];
            
                    $sql = "update info set name='$name' , email='$email' , fees='$fees', pass='$passwords' where email='".$email."'  ";
            
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

