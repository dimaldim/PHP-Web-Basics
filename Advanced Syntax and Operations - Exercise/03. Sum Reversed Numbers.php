<?php
$input = explode(" ", readline());
$sum = 0;
foreach ($input as $number) {
    $sum += intval(strrev($number));
}
echo $sum;
