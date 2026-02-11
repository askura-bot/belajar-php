<?php

namespace App;

class Member extends User {
    public function __construct(string $nama)
    {
        return parent::__construct($nama, 10, 0.10);
    }

    public function getRole(): string
    {
        return "Member";
    }
}