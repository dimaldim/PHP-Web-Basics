<?php
define("DNA", "ATCGTTAGGG");
$input = intval(trim(readline()));
for ($i = 0; $i < $input; ++$i) {
    switch ($i % 4) {
        case 0:
            echo "**" . getLetter() . getLetter() . "**\n";
            break;
        case 1:
            echo "*" . getLetter() . "--" . getLetter() . "*\n";
            break;
        case 2:
            echo getLetter() . "----" . getLetter() . "\n";
            break;
        case 3:
            echo "*" . getLetter() . "--" . getLetter() . "*\n";
    }
}
function getLetter(): string
{
    static $letter = 0;
    return DNA[$letter++ % strlen(DNA)];
}
