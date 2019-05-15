<?php
$input = readline();
$arr = [];
for ($i = 0; $i < strlen($input); $i++) {
    if (!array_key_exists($input[$i], $arr)) {
        $arr[$input[$i]] = 1;
    } else {
        $arr[$input[$i]]++;
    }
}
foreach ($arr as $key => $value) {
    echo "{$key} -> {$value}" . PHP_EOL;
}
