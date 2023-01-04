<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "test";

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    die("Not Connected");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="" method="POST">
        Name: <input type="text" name="name" placeholder="Enter name here" required><br>
        Fees: <input type="number" name="fees" placeholder="Enter fees here" required><br>
        Address: <input type="text" name="address" placeholder="Enter address here" required><br>
        <input type="submit" name="reg" value="Submit here">
    </form>
</body>

</html>

<?php




if (isset($_REQUEST['reg'])) {
    if (($_REQUEST['name'] == "")  || ($_REQUEST['fees'] == "") || ($_REQUEST['address'] == "")) {
        echo "<script>window.alert('Fill all fields')</script>";
    } else {
        $name = $_REQUEST["name"];
        $address = $_REQUEST["address"];
        $fees = $_REQUEST["fees"];

        $sql = " insert into info (name , fees , address) values ('$name','$fees','$address') ; ";

        if (mysqli_query($con, $sql)) {
            echo "<script>window.alert('Data register successfully')</script>";
        } else {
            echo "<script>window.alert('Data register failed')</script>";
        }
    }
}
?>

<!-- Datasearch -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datasearch</title>
</head>

<body>

    <h1>Search Your ID</h1>
    <form action="" method="POST">
        <p>
            Click here to search IDs:<input type="submit" value="Show Details" name="search">
        </p>
    </form>

</body>

</html>

<?php

if (isset($_REQUEST["search"])) {
    $sql = "select * from info";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<table  border="3" style="padding: 6px; margin: auto; text-align: center; width: 350px; ">';
        echo '<thead>';
        echo '<tr>';
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Fees</th>";
        echo "<th>Address</th>";
        echo "<th>Remove</th>";
        echo "</thead>";
        echo "<tr>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['fees'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
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


<!-- Datasearch ends -->

<!-- Deletion of Data -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
</head>

<body>

    <h1>Delete user data</h1>
    <form action="" method="POST">
        <p>
            Enter your ID: <input type="number" name="id_num"> <br>
            <input type="submit" value="Delete Data" name="del">
        </p>
    </form>

</body>

</html>

<?php

if (isset($_REQUEST["del"])) {
    if ($_REQUEST["id_num"] == "") {
        echo ("<script>window.alert('Enter the id')</script>");
    } else {
        $id = $_REQUEST["id_num"];

        $sql = "delete from info where id='" . $id . "'";

        $result = mysqli_query($con, $sql);

        if ($result > 0) {
            echo ("<script>window.alert('Data deleted successfully')</script>");
        } else {
            echo ("<script>window.alert('Failed to delete data')</script>");
        }
    }
}



?>