<?php
$num = readline();
$commands = explode(", ", readline());
foreach ($commands as $command) {
    $num = cook_num($num, $command);
    echo $num . PHP_EOL;
}
function cook_num(&$num, $action)
{
    if ($action == 'chop') return $num /= 2;
    else if ($action == 'dice') return sqrt($num);
    else if ($action == 'spice') return $num += 1;
    else if ($action == 'bake') return $num *= 3;
    else if ($action == 'fillet') return $num *= 0.8;
}
