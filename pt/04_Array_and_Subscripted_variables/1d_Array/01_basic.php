<?php

// To store array we need array function 
$a = array(10,20,30,40,50) ;

// Count Function helps to find how many elements are there inside an array
$b = count($a) ;

echo "Number Of array ", $b ;
echo "<br> All the numbers in the array are >>> " ;

// This loop help to print the all the numbers in the array 
for ($i=0; $i < $b ; $i++)
{ 
    echo $a[$i] , ";" ;
}

?>