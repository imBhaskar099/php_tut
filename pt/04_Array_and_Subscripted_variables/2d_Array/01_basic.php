<?php

$a = array( 
    array(10,20,30) ,
    array(40,50,60) , 
    array(70,80,90) 
    ) ;
$b = count($a) ;

for ($i=0; $i < $b ; $i++)
{
    for ($j=0; $j < $b ; $j++)
    { 
        echo $a[$i][$j] ;
    }
    echo "<br>" ;
}

?>