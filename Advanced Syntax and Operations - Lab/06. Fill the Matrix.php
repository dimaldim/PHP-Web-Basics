<?php
list($matrixSize, $pattern) = explode(", ", readline());

if (strtoupper($pattern) == 'A') {
    $matrix = createMatrixPatternA($matrixSize);
} elseif (strtoupper($pattern) == 'B') {
    $matrix = createMatrixPatternB($matrixSize);
}

printMatrix($matrix);

function printMatrix($matrix)
{
    for ($row = 0; $row < count($matrix); $row++) {
        for ($col = 0; $col < count($matrix); $col++) {
            echo "{$matrix[$row][$col]} ";
        }
        echo PHP_EOL;
    }
}

function createMatrixPatternA($size)
{
    $arr = [];
    $num = 1;
    for ($col = 0; $col < $size; $col++) {
        for ($row = 0; $row < $size; $row++) {
            $arr[$row][$col] = $num;
            $num++;
        }
    }
    return $arr;
}

function createMatrixPatternB($size)
{
    $arr = [];
    $num = 1;
    for ($col = 0; $col < $size; $col++) {
        if ($col % 2 == 0) {
            for ($row = 0; $row < $size; $row++) {
                $arr[$row][$col] = $num;
                $num++;
            }
        } else {
            for ($row = $size - 1; $row >= 0; $row--) {
                $arr[$row][$col] = $num;
                $num++;
            }
        }
    }
    return $arr;
}
