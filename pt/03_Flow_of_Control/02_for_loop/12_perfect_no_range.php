<?php

$a = 1 ;
$b = 2 ;

for( $i = $a ; $i = $b ; $i++ )
{
    $c = 0;
    for($j = 1 ; $j <= $i ; $j++ )
    {
        if ($i % $j == 0)
        {
            $c = $c + $j ;
        }
    }
    if ($c == $i*2)
    {
        echo  $i ;
    }
}


?>
