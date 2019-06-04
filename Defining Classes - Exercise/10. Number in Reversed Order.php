<?php

/**
 * Class DecimalNumber
 */
class DecimalNumber
{
    /**
     * @var string
     */
    private $num;

    /**
     * DecimalNumber constructor.
     * @param $num
     */
    public function __construct($num)
    {
        $this->num = $num;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return strrev($this->num);
    }
}

$number = new DecimalNumber(readline());

echo $number;
