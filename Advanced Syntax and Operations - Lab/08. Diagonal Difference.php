<?php
$rows = intval(readline());
$matrix = fillMatrix($rows);

findDiagonalDiff($matrix);

function findDiagonalDiff($matrix)
{
    $primary = 0;
    $secondary = 0;
    for ($i = 0; $i < count($matrix); $i++) {
        $primary += $matrix[$i][$i];
    }
    for ($j = 0; $j < count($matrix); $j++) {
        $secondary += $matrix[$j][count($matrix) - $j - 1];
    }
    echo abs($secondary - $primary);
}

function fillMatrix($size)
{
    $arr = [];
    for ($i = 0; $i < $size; $i++) {
        $arr[] = explode(" ", readline());
    }
    return $arr;
}
