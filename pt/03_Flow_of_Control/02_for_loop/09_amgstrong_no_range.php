<?php
$starting = 1 ;
$ending = 1000 ;
echo "All the Amstrong Number in range ",$starting," and ",$ending, " are >>> " ;
for ($i=$starting; $i <= $ending ; $i++)
{
    $amg = 0 ;
    $a = $i ;
    for (; $a > 0 ;)
    { 
        $r = $a%10 ;
        $amg = $amg + ($r*$r*$r) ;
        $a = $a/10 ;
    }
    if ($amg == $i)
    {
        echo $i , " : " ;
    }

}


?>    