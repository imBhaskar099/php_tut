<?php

$starting = 1 ;
$ending = 20 ;
$c = 0 ;

echo " The Largest Prime number between the range " , $starting , " and " , $ending , " is >>> " ;

for ($i=$ending; $i >= $starting ; $i--)
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
        break ;
    }  
}
?>