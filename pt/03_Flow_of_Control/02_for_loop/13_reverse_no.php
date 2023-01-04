<?php

$a = 123;
$rev = 0 ;

for (; $a>0 ;)
{ 
    $r = $a % 10 ;
    $rev = $rev*10 + $r ;
    $a = $a/10 ;
}

echo "After reversing the number " , $rev ;

?>
