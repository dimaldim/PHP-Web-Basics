<?php
$str = readline();
function isPalindrome($str)
{
    return $str === strrev($str);
}

if (isPalindrome($str)) {
    echo "true" . PHP_EOL;
} else {
    echo "false" . PHP_EOL;
}
