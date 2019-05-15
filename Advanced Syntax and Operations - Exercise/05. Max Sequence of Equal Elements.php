<?php
$input = explode(" ", readline());
$countMax = 0;
$startMax = 0;
$count = 0;
for ($i = 0; $i < count($input) - 1; $i++) {
    $count = 0;
    while ($input[$i + $count] == $input[$i + 1 + $count]) {
        $count++;
        if ($i + 1 + $count > count($input) - 1) {
            break;
        }
    }
    if ($count > $countMax) {
        $countMax = $count;
        $startMax = $i;
    }
}

for ($i = $startMax; $i <= $startMax + $countMax; $i++) {
    echo "{$input[$i]} ";
}
