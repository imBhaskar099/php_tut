<?php

$a = array(10,20,30,40,50) ;
$b = count($a);

for ($i=0; $i < $b ; $i++)
{ 
    $x = $a[$i] ;
    
    echo "The Factors of " , $x , " are >>> " ;
    for ($j=1; $j <= $x ; $j++)
    { 
        if ($x % $j == 0)
        {
            echo $j , ";" ;
        }
        
    }
    echo "<br>" ;
}
?>