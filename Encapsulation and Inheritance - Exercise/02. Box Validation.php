<?php

class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct($length, $width, $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @param mixed $height
     * @throws Exception
     */
    private function setHeight($height)
    {
        if ($height <= 0) {
            throw new Exception("Height cannot be zero or negative.");
        }
        $this->height = $height;
    }

    /**
     * @param mixed $width
     * @throws Exception
     */
    private function setWidth($width)
    {
        if ($width <= 0) {
            throw new Exception("Width cannot be zero or negative.");
        }
        $this->width = $width;
    }

    /**
     * @param mixed $length
     * @throws Exception
     */
    private function setLength($length)
    {
        if ($length <= 0) {
            throw new Exception("Length cannot be zero or negative.");
        }
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return round($this->length * $this->width * $this->height, 2);
    }

    /**
     * @return float
     */
    public function getSurfaceArea()
    {
        $surfaceArea = (2 * $this->length * $this->width) + (2 * $this->length * $this->height)
            + (2 * $this->width * $this->height);
        return round($surfaceArea, 2);
    }

    /**
     * @return float
     */
    public function getLateralSurfaceArea()
    {
        $areaBasis = (2 * $this->length * $this->height) + (2 * $this->width * $this->height);
        return round($areaBasis, 2);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf("Surface Area - %.2f\nLateral Surface Area - %.2f\nVolume - %.2f",
            $this->getSurfaceArea(),
            $this->getLateralSurfaceArea(),
            $this->getVolume());
    }
}

$length = readline();
$width = readline();
$height = readline();
try {
    $box = new Box($length, $width, $height);
    echo $box;
} catch (Exception $e) {
    echo $e->getMessage();
}
