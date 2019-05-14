<?php
$numbers = explode(" ", readline());
foreach ($numbers as $num) {
    echo "{$num} => " . round($num, 0, PHP_ROUND_HALF_UP) . PHP_EOL;
}
