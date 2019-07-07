<?php

interface Car
{
    function pushBrakes();

    function pushGasPedal();

    function setDriver($driver);

}

class Ferrari implements Car
{
    private $model = "488-Spider";
    private $driver;

    public function __construct($driver)
    {
        $this->setDriver($driver);
    }

    /**
     * @return mixed
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    function pushBrakes()
    {
        return "Brakes!";
    }

    function pushGasPedal()
    {
        return "Zadu6avam sA!";
    }

    function setDriver($driver)
    {
        $this->driver = $driver;
    }
}

$name = readline();

$car = new Ferrari($name);

printf("%s/%s/%s/%s", $car->getModel(), $car->pushBrakes(), $car->pushGasPedal(), $car->getDriver());
