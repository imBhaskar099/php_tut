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
        $c = echo $a[$i][$j] ;
        $d = 0 ;
        for ($i=1; $i <= $c ; $i++)
        { 
            if ($c % $i == 0)
            {
                $d = $d + 1 ;
            }
        }
        if ($d == 2)
        {
            echo $c ;
        }
    }
}

?>