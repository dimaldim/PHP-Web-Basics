<?php

class Person
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

class Family
{
    public $people = [];

    public function add($person)
    {
        $this->people[] = $person;
        usort($this->people, function ($a, $b) {
            return $b->age <=> $a->age;
        });
    }

    public function getOldestPerson()
    {
        return $this->people[0];
    }
}

$n = intval(readline());
$family = new Family();
for ($i = 1; $i <= $n; $i++) {
    list($name, $age) = explode(" ", readline());
    $family->add(new Person($name, $age));
}
$result = $family->getOldestPerson();
echo "{$result->name} {$result->age}";


