<?php

namespace App;

class Student extends User {

    public function getMaxPinjam(): int
    {
        return 2;
    }

    public function getRole(): string
    {
        return "Mahasiswa";
    }
}