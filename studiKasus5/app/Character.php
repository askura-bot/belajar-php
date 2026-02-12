<?php

namespace App;

class Character {
    protected string $nama;
    protected float $HP;
    protected int $attack;

    public function __construct(string $nama, float $HP, int $attack)
    {
        $this->nama = $nama;
        $this->HP = $HP;
        $this->attack = $attack;
    }

    public function getName(): string 
    {
        return $this->nama;
    }

    public function menyerang(Character $musuh): void 
    {
        echo "{$this->nama} menyerang {$musuh->getName()}!!!" . PHP_EOL;
        $musuh->diSerang($this->attack);
    }

    public function diSerang(int $damage): void 
    {
        $this->HP -= $damage;    
        echo "{$this->nama} telah menerima {$damage} damage, sisa nyawa {$this->HP}". PHP_EOL;
    }

    public function isAlive (): bool
    {
        return $this->HP > 0;
    }

    public function __destruct()
    {
        echo "{$this->nama} telah meninggalkan permainan" . PHP_EOL;
    }
}