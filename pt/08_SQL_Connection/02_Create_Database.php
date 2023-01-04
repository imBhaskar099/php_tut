<!-- Starting PHP Codes to Connect -->
<?php
$host = "localhost";
$user = "root";
$pass = "";

$con = mysqli_connect($host, $user, $pass);

if (!$con) {
    die("Not Connected");
} else {
    echo ("Connected <br>");
}

?>
<!-- Ending PHP Codes to Connect -->


<!-- starting php for creating Database  -->

<?php

$sql = " create database College ";

if (mysqli_query($con, $sql))
{
    echo " Database has been created ";
} 
else 
{
    echo "404 Error";
}


?>

<!-- Ending php for creating Database  -->