<?php

namespace App;

class User {
    protected string $nama;
    protected array $pakets = [];
    protected int $batasPaket;
    protected float $diskon;

    public function __construct(string $nama, int $batasPaket, float $diskon)
    {
        $this->nama = $nama;
        $this->batasPaket = $batasPaket;
        $this->diskon = $diskon;
    }

    public function kirimPaket(Package $package): void 
    {
        if (count($this->pakets) >= $this->batasPaket) {
            echo "Batas paket anda telah mencapai batas" . PHP_EOL;
            return;
        }

        $this->pakets[] = $package;
        echo "Barang {$package->getNamaBarang()} berhasil dikirim" . PHP_EOL;
    }

    public function hitungTotalBiayan(): float 
    {
        $totalBiaya = 0;
        foreach ($this->pakets as $paket) {
            $totalBiaya += $paket->getBiaya();
        }

        return $totalBiaya - ($totalBiaya * $this->diskon);
    }

    public function getRole(): string
    {
        return "User";
    }

    public function getName(): string
    {
        return $this->nama;
    }
}