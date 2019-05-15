<?php
$input = explode(", ", readline());
$arr = [];
for ($i = 1; $i < count($input); $i += 2) {
    $town = $input[$i - 1];
    $income = $input[$i];
    if (!array_key_exists($town, $arr)) {
        $arr[$town] = $income;
    } else {
        $arr[$town] += $income;
    }
}

foreach ($arr as $town => $income) {
    echo "{$town} => {$income}" . PHP_EOL;
}
