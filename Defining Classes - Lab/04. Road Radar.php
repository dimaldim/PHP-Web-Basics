<?php
$currentSpeed = intval(readline());
$area = readline();

echo checkSpeed($currentSpeed, $area);
function checkSpeed(int $currentSpeed, string $area)
{
    $speedLimit = getSpeedLimit($area);
    $speedDiff = $currentSpeed - $speedLimit;
    if ($speedDiff >= 0 && $speedDiff <= 20) return 'speeding';
    else if ($speedDiff > 20 && $speedDiff <= 40) return 'excessive speeding';
    else if ($speedDiff > 40) return 'reckless driving';
}

function getSpeedLimit(string $area)
{
    if ($area == 'motorway') return 130;
    else if ($area == 'interstate') return 90;
    else if ($area == 'city') return 50;
    else if ($area == 'residential') return 20;
    else echo "Not a Valid Input" . PHP_EOL;
    return 1000;
}
