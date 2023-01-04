<?php

$a = array(10,20) ;
$b = count($a) ;

echo " All the Perfect numbers are >>> ";

for ( $i = 0 ; $i <= $b ; $i++)
{
    $c = 0 ;
    $x = $a[$i] ;

    for( $j = 1; $j <= $x; $j++)
    {
        if ($x % $j == 0 )
            {
                $c = $c+$j;
            }    
    }
        
    $d = $x * 2 ;
        
    if ( $c == $d)    
    {
        echo  $a[$i] ;
    }
}

?>