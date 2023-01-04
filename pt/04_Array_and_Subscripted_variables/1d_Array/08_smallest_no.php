<?php

$a = array(10,20,30,40,50) ;
$b = count($a) ;
$small = $a[0] ;

for ($i=0; $i < $b ; $i++)
{
    $c = $a[$i] ; 
    if($c < $small)
    {
        $small = $c ;
    }

}

echo "The Smallest number among the array is = ", $small ;

?>