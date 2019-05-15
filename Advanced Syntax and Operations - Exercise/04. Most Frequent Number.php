<?php
$input = explode(" ", readline());
$maxFrequent = 0;
$output = '';
foreach (array_count_values($input) as $key => $value) {
    if ($value > $maxFrequent) {
        $maxFrequent = $value;
        $output = $key;
    }
}
echo $output;
