<?php
$input = explode(" ", readline());
$length = count($input);
$countSeq = 0;
$startSeq = 0;
$maxSeqCount = 0;
$maxSeqStart = 0;
for ($i = 1; $i < $length; $i++) {
    if ($input[$i] - $input[$i - 1] >= 1) {
        $countSeq++;
        $startSeq = $i - $countSeq;
        if ($countSeq > $maxSeqCount) {
            $maxSeqCount = $countSeq;
            $maxSeqStart = $startSeq;
        }
    } else {
        $countSeq = 0;
    }
}
for ($j = $maxSeqStart; $j <= ($maxSeqStart + $maxSeqCount); $j++) {
    echo "{$input[$j]} ";
}
