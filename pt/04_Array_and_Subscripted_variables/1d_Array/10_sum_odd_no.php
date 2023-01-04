<?php

$a = array(10,20,37,41,50,60) ;
$b = count($a) ;
$c = 0 ;

for ($i=0; $i < $b ; $i++) 
{ 
  $d = $a[$i] ;
  if ($d%2 != 0 ) 
  {
    $c = $c + $d ; 
  }
}
echo "<br> sum of all odd number = " , $c ;

?>