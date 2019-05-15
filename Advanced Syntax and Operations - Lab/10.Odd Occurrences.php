<?php
$input = explode(" ", strtolower(readline()));
$odd = '';
foreach (array_count_values($input) as $word => $val) {
    if ($val % 2 !== 0) {
        $odd .= ", {$word}";
    }
}
echo ltrim($odd, ", ");
