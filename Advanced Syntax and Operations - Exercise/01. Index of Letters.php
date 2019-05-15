<?php
$input = strtolower(readline());
$alphabet = range('a', 'z');

for ($i = 0; $i < strlen($input); $i++) {
    $position = array_search($input[$i], $alphabet);
    echo "{$input[$i]} -> {$position}" . PHP_EOL;
}

