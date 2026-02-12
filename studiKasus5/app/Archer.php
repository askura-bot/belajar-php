<?php

namespace App;

class Archer extends Character {
    public function __construct(string $nama)
    {
        return parent::__construct($nama, 50.0, 18);
    }

    public function menyerang(Character $musuh): void
    {
        $critical = rand(1, 100) <= 30;

        if ($critical) {
            echo "CRITICAL HIT" . PHP_EOL;
            $musuh->diSerang($this->attack * 2);
        } else {
            parent::menyerang($musuh);
        }
        
    }
}