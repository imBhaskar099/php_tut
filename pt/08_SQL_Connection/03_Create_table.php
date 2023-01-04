<?php
$host="localhost";
$user="root";
$pass="";
$db="school";

$con=mysqli_connect($host, $user,$pass,$db);

// HUPD
if(!$con)
{
    die("Not Connected");
}

else
{
    echo("Connect OK");
}


?>

<?php

$sql = " CREATE TABLE student
(
     sl_no int(10) AUTO_INCREMENT primary key ,
     Name varchar(30) , 
     Address varchar(40) ,
     Fees dec(10,2)

) " ;

if(mysqli_query($con,$sql))
{
    echo "Table has been created";
}

else 
{
    echo "404 Error";
}

?>