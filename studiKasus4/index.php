<?php

use App\Admin;
use App\Customer;
use App\Member;
use App\Package;
use App\User;

require_once "app/User.php";
require_once "app/Customer.php";
require_once "app/Member.php";
require_once "app/Admin.php";
require_once "app/Package.php";

echo "Pilih Role:" . PHP_EOL;
echo "1. Customer" . PHP_EOL;
echo "2. Member" . PHP_EOL;
echo "3. Admin" . PHP_EOL;
echo "Pilih Role anda: ";
$role = trim(fgets(STDIN));

echo "Masukkan Nama: ";
$nama = trim(fgets(STDIN));

$user = match ($role) {
    '2' => new Admin($nama),
    '3' => new Member($nama),
    default => new Customer($nama)
};

echo "Selamat datang {$user->getRole()} {$user->getName()}" . PHP_EOL;
 $paket1 = new Package("Laptop", 4);
 $paket2 = new Package("Televisi", 8);

 $user->kirimPaket($paket1);
 $user->kirimPaket($paket2);

 echo "Total Biaya: " . number_format($user->hitungTotalBiayan(), 0) . PHP_EOL;