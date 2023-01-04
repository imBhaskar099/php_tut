<?php

$a = array(10,20,30,0, 1, 153, 370, 371, 407) ;
$amg=0 ;
$b = count($a) ;
  
 echo " The Amgstrong Numbers are >> ";
  
  for($i=0;$i<$b;$i++)
  {
    $amg = 0;
    $c = $a[$i] ;
    for(;$c>0;)
    {
      $r = $c % 10 ;
      $amg = $amg + $r*$r*$r ;
      $c = $c/10 ;      
    }
    if($amg == $a[$i])
    {
      echo  $a[$i] , " ; " ;
    }
  }
  
?>