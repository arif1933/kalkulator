<?php

$kata = "2+3+6x7+(3+5)";
echo $kata. "<br>";
$pos1 = strpos ($kata, '(') + 1;
$pos2 = strpos ($kata, ')');
echo $pos1."<br/>"; 
echo $pos2."<br/>"; 

$startIndex = min($pos1, $pos2);
$length = abs($pos1 - $pos2);

$qwe = substr($kata, $startIndex, $length);

echo $qwe ."<br/>";


$pos3 = strpos ($qwe, '+') ;

echo $pos3 ."<br/>";

$angka1 = substr($qwe, 0, $pos3);

echo $angka1 ."<br/>";


$angka2 = substr($qwe, $pos3 +1);    
echo $angka2 ."<br/>";

$hasil = $angka1 + $angka2;

echo $hasil ."<br/>";

$kata = substr_replace($kata, $hasil,  $pos1 -1, $pos2);
echo $kata ."<br>";

$pos4 = strpos($kata, 'x');
echo $pos4."<br/>";

$angka1 = substr($kata, $pos4-1, 1 );    
echo $angka1 ."<br/>";

$angka2 = substr($kata, $pos4 +1,1);    
echo $angka2 ."<br/>";

$hasil = $angka1 * $angka2;

echo $hasil ."<br/>";


$kata = substr_replace($kata, $hasil,  $pos4 -1, $pos4 -2);
echo $kata ."<br>";





?>