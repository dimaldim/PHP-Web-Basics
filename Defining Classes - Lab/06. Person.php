<?php

class Person
{
    public $name;
    public $age;
}

$person = new Person();
echo count(get_object_vars($person));
