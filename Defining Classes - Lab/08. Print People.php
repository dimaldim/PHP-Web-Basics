<?php

class Person
{
    public $name;
    public $age;
    public $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    public function __toString()
    {
        return $this->name . ' - age: ' . $this->age . ', occupation: ' . $this->occupation . PHP_EOL;
    }
}

$people = [];
while (1) {
    $input = explode(' ', trim(readline()));
    if ($input[0] == 'END') break;
    $name = $input[0];
    $age = $input[1];
    $occupation = $input[2];
    $people[] = new Person($name, $age, $occupation);
}
usort($people, function ($a, $b) {
    return $a->getAge() > $b->getAge();
});
foreach ($people as $person) {
    echo $person;
}
