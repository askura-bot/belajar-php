<?php

namespace App;

class Mage extends Character {
    public function __construct(string $nama)
    {
        return parent::__construct($nama, 60.0, 15);
    }

    public function menyerang(Character $musuh): void
    {
        echo "Mage menggunakan FIREBALL!" . PHP_EOL;
        $musuh->diSerang($this->attack + 15);
    }
}