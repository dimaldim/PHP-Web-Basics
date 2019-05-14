<?php
$arr1 = explode(" ", readline());
$arr2 = explode(" ", readline());
$resultArr = max(count($arr1), count($arr2));

for ($i = 0; $i < $resultArr; $i++) {
    $sum = $arr1[$i % count($arr1)] + $arr2[$i % count($arr2)];
    echo $sum . " ";
}
