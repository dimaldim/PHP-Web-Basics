<?php
$input = explode(", ", readline());
$unique = [];
foreach (array_count_values($input) as $word => $count) {
    if ($count == 1) {
        $unique[] = $word;
    }
}
echo implode($unique, " ");
