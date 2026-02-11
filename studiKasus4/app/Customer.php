<?php

namespace App;

class Customer extends User {
    public function __construct(string $nama)
    {
        return parent::__construct($nama, 3, 0.0);
    }

    public function getRole(): string
    {
        return "Customer";
    }
}