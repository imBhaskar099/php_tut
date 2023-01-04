<?php

$a = 1500 ;

echo " All the Factors of ", $a ," are - >>> " ;

for ($i=1; $i <= $a ; $i++)
{ 
    if ($a % $i == 0)
    {
        echo  $i , " ; " ;
    }
}

?>