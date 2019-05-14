<?php
$numbers = intval(readline());
$arr = [];
for ($i = 1; $i <= $numbers; $i++) {
    $num = intval(readline());
    $arr[] = $num;
}
echo implode(" ", array_reverse($arr));
