<?php
$input = readline();
while (avgValue($input) < 5) {
    $input .= "9";
}
echo $input;

function avgValue($num)
{
    $sum = 0;
    $len = strlen($num);
    for ($i = 0; $i < $len; $i++) {
        $sum += $num[$i];
    }
    return $sum / $len;
}
