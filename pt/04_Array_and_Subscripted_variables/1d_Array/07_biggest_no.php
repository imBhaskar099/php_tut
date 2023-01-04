<?php

$a = array(10,20,30,40,50) ;
$b = count($a) ;
$big = $a[0] ;

for ($i=0; $i < $b ; $i++)
{
    $c = $a[$i] ; 
    if($c > $big)
    {
        $big = $c ;
    }

}

echo "The Biggest number among the array is = ", $big ;

?>