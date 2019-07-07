<?php

interface Person
{
    function setName(string $name);

    function setAge(int $age);
}

interface Identifiable
{
    function setId(string $id);
}

interface Birthable
{
    function setBirthdate($birthDate);
}

class Citizen implements Person
{
    private $name;
    private $age;
    private $id;
    private $birthDate;

    public function __construct($name, $age, $id, $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthDate($birthDate);
    }

    function setName(string $name)
    {
        $this->name = $name;
    }

    function setAge(int $age)
    {
        $this->age = $age;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function __toString()
    {
        return "{$this->name}" . PHP_EOL . "{$this->age}" . PHP_EOL . "{$this->id}" . PHP_EOL . "{$this->birthDate}";
    }
}

$name = readline();
$age = readline();
$id = readline();
$birthdate = readline();
$citizen = new Citizen($name, $age, $id, $birthdate);
echo $citizen;
