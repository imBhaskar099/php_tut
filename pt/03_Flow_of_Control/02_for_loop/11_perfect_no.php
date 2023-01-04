<?php

$a = 6  ;
$j = 0;

for($i=1;$i<=$a;$i++)
{
    if($a % $i == 0)
    {
        $j = $j + $i ;
    }
}

$b = $a * 2 ;

if ($j == $b )
{
    echo $a , " is a Perfect Number " ;
}

else
{
    echo $a , " is not a Perfect Number " ;
}

?>