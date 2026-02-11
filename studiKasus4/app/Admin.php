<?php

namespace App;

class Admin extends User {
    public function __construct(string $nama)
    {
        return parent::__construct($nama, PHP_INT_MAX, 0);
    }

    public function getRole(): string
    {
        return "Admin";
    }
}