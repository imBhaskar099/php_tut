<?php

$a = array(10,20,30,40,50,60) ;
$b = count($a) ;
$c = 20 ;
for ($i=0; $i < $b ; $i++) 
{ 
  if ($a[$i] == 20 ) 
  {
    echo " Yes it is present <br> " ;
    echo "position in array = " , $i+1 ;
  }
}

?>