<?php

$a = array(10,20,30,40,50) ;
$sum = 0 ;
$b = count($a);

for ($i=0; $i < $b; $i++)
{ 
    $sum = $sum + $a[$i] ;
}

echo " The sum of all the numbers in array = " , $sum ;

?>