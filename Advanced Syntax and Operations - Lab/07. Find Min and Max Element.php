<?php
list($rows, $cols) = explode(", ", readline());
$matrix = fillMatrix($rows);

findMinAndMax($matrix);

function fillMatrix($rows)
{
    $arr = [];
    for ($i = 0; $i < $rows; $i++) {
        $arr[$i] = explode(", ", readline());
    }
    return $arr;
}

function findMinAndMax($matrix)
{
    $min = PHP_INT_MAX;
    $max = PHP_INT_MIN;
    foreach ($matrix as $key => $val) {
        foreach ($val as $num) {
            if ($num > $max) {
                $max = intval($num);
            }
            if ($num < $min) {
                $min = intval($num);
            }
        }
    }
    echo "Min: {$min}" . PHP_EOL;
    echo "Max: {$max}" . PHP_EOL;
}
