<?php

namespace App;

class Lecturer extends User {
    public function getMaxPinjam(): int
    {
        return 5;
    }

    public function getRole(): string
    {
        return "Dosen";
    }
}

