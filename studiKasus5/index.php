<?php

use App\Archer;
use App\Mage;
use App\Monster;
use App\Warrior;

require_once "app/Character.php";
require_once "app/Warrior.php";
require_once "app/Mage.php";
require_once "app/Archer.php";
require_once "app/Monster.php";

echo "Pilih karakter:" . PHP_EOL;
echo "1. Warrior" . PHP_EOL;
echo "2. Mage" . PHP_EOL;
echo "3. Archer" . PHP_EOL;
echo "Pilih: ";
$pilih = trim(fgets(STDIN));

echo "Masukkan Nama: ";
$nama = trim(fgets(STDIN));

$player = match ($pilih) {
    '2' => new Mage($nama),
    '3' => new Archer($nama),
    default => new Warrior($nama),
};

$monster = new Monster();

while ($player->isAlive() && $monster->isAlive()) {
    $player->menyerang($monster);

    if ($monster->isAlive()) {
        $monster->menyerang($player);
    }

    echo PHP_EOL;
}

echo "Pertarungan Selesai" . PHP_EOL;