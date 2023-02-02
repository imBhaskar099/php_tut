<?php
$host="localhost";
$user="root";
$password="";
$db="interview";

$conn=mysqli_connect($host,$user,$password,$db);

if(!$conn)
{
    die("Not Connected");
}

// else
// {
//     echo("Connected");
// }
?>

