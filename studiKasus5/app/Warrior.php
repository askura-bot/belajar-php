<?php

namespace App;

class Warrior extends Character {
    public function __construct(string $nama)
    {
        return parent::__construct($nama, 80.0, 10);
    }

    public function menyerang(Character $musuh): void
    {
        echo "Warrior melakukan DOUBLE ATTACK!" . PHP_EOL;
        $musuh->diSerang($this->attack * 2);
    }
}