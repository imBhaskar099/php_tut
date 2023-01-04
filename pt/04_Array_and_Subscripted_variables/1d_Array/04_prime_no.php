<?php

$a = array(11,20,31,40,53) ;
$b = count($a) ;
echo "All the Prime no's in the arrray are  >>> " ;
for($i=0 ; $i < $b ; $i++)
{
    $x = $a[$i] ;
    $c = 0 ;
    
    for ($j=1; $j <= $x ; $j++)
    { 
       if ($x % $j === 0)
       {
           $c = $c + 1 ;
       } 
    }
    if ($c == 2)
    {
        echo $x , " ; ";
    }
}
?>