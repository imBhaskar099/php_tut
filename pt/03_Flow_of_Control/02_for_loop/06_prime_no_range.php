<?php

$starting = 1 ;
$ending = 20 ;
$c = 0 ;

echo " All the Prime numbers between the range " , $starting , " and " , $ending , " are >>> " ;

for ($i=$starting; $i <= $ending ; $i++)
{ 
    $c = 0 ;
    
    for ($j = 1; $j <= $i ; $j++)
    { 
        if($i % $j == 0)
        {
            $c = $c + 1 ;
        }
    }

    if ($c == 2)
    {
        echo $i , " ; " ;
    }  
}
?>