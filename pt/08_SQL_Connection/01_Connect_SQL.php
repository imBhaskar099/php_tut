<?php

$host = "localhost" ;
$user = "root" ;
$pass = "";

$conn = mysqli_connect($host , $user , $pass);

if($conn)
{
    
    echo '<p style="text-align:center ;">connected</p>' ;
}

else
{
    echo " 404 Server Not Found ";

}



?>