<?php

$a = 31 ;
$c = 0 ;
for ($i=1 ; $i <= $a ; $i++)
{ 
    if ($a % $i == 0)
    {
        $c = $c + 1 ;
    }
}
if ($c == 2)
{
    echo $a , " it a Prime Number " ;
}
else
{
    echo $a , " it is not a Prime Number " ;
}
?>