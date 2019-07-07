<?php

interface Person
{
    function setName(string $name);

    function setAge(int $age);
}

class Citizen implements Person
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

    function setAge(int $age)
    {
        $this->age = $age;
    }

    public function __toString()
    {
        return "{$this->name}" . PHP_EOL . "{$this->age}";
    }
}

$name = readline();
$age = readline();
$citizen = new Citizen($name, $age);
echo $citizen;
