<?php
$months = [
    "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
];
$input = readline();

if ($input >= 1 && $input <= 12) {
    echo $months[$input - 1];
} else {
    echo "Invalid Month!";
}
