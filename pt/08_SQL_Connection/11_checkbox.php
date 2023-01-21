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
    <title>Skills</title>
</head>

<body>
    <form action="" method="POST">
        <h1>Skills</h1>
        Name: <input type="text" name="name"> <br><br>
        Skills<br>
        C<input type="checkbox" name="skill[]" value="c">
        C++<input type="checkbox" name="skill[]" value="c++">
        Java<input type="checkbox" name="skill[]" value="java">
        <br><br>    
        <input type="submit" value="Done" name="reg">

    </form>
</body>

</html>

<?php

if (isset($_REQUEST['reg'])) {
    if (empty($_REQUEST['skill']) || ($_REQUEST['name'] == "")) {
        echo '<script>window.alert("Fill all the Fields")</script>';
    } else {
        $name = $_REQUEST["name"];
        echo $name;
        $skill = $_REQUEST['skill'];

        $fskill = implode(',', $skill);

        $sql = "insert into info( Name , Skills) values ('$name','$fskill') ";

        if (mysqli_query($conn, $sql)) {
            echo '<script>window.alert("Data Inserted Succesfully")</script>';
            // echo '<script>location.href="01_Connect_SQL.php"</script>' ;
        } else {
            echo '<script>window.alert("Unable to Insert Data")</script>';
        }
    }
}

?>