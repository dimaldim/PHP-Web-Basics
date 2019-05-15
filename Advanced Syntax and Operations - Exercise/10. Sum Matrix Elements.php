<?php
list($rows, $cols) = explode(", ", readline());
$sum = 0;
for ($i = 0; $i < $rows; $i++) {
    $sum += array_sum(explode(", ", readline()));
}
echo $rows . PHP_EOL;
echo $cols . PHP_EOL;
echo $sum . PHP_EOL;
