<?php

namespace App;

class Package {
    private string $namaBarang;
    private int $berat;
    private int $hargaPerBarang = 10_000;

    public function __construct(string $namaBarang, int $berat)
    {
        $this->namaBarang = $namaBarang;
        $this->berat = $berat;
    }

    public function getBiaya(): int 
    {
        return $this->berat * $this->hargaPerBarang;
    }

    public function getNamaBarang(): string
    {
        return $this->namaBarang;
    }
}