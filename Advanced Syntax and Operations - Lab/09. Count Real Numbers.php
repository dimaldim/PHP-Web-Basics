<?php
$numbers = explode(" ", readline());
$arr = [];
foreach ($numbers as $num) {
    if (!array_key_exists($num, $arr)) {
        $arr[$num] = 1;
    } else {
        $arr[$num] += 1;
    }
}
ksort($arr);
foreach ($arr as $num => $value) {
    echo "{$num} -> {$value}" . PHP_EOL;
}
