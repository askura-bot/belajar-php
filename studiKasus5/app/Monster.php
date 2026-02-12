<?php

namespace App;

class Monster extends Character {
    public function __construct()
    {
        return parent::__construct("Monster", 200, 10);
    }
}