<?php

require 'helpers/Autoload.php';

use App\Book;
use App\Student;
use App\Lecturer;

echo "Login sebagai:" . PHP_EOL;
echo "1. Mahasiswa" . PHP_EOL;
echo "2. Dosen" . PHP_EOL;
echo "Pilih: ";
$role = trim(fgets(STDIN));
echo PHP_EOL;

echo "Masukkan Nama: ";
$name = trim(fgets(STDIN));

if ($role == '1') {
    $user = new Student($name);
} else if ($role == '2') {
    $user = new Lecturer($name);
} else {
    echo "Pilhan tidak ada" . PHP_EOL;
}

$books = [
    new Book("Laut Bercerita", 4),
    new Book("Telah lama pergi", 2),
    new Book("Babel", 4),
    new Book("Malam malam putih", 4),
    new Book("The Ways of Survival", 1),
];

function showMenus($user): void {
    echo PHP_EOL;
    echo "===== PERPUSTAKAAN CLI =====" . PHP_EOL;
    echo "Selamat datang {$user->getRole()} {$user->getNamae()} di Perpustakaan" . PHP_EOL; 
    echo "1. Lihat daftar buku" . PHP_EOL;
    echo "2. Pinjam buku" . PHP_EOL;
    echo "3. Lihat buku dipinjam" . PHP_EOL;
    echo "4. Keluar" . PHP_EOL;
    echo "Pilih menu: ";
}

while (true) {
    showMenus($user);
    $pilihan = trim(fgets(STDIN));

    switch ($pilihan) {
        case '1':
            echo "Daftar Buku: " . PHP_EOL;
            foreach ($books as $index=>$book) {
                echo ($index+1) . ". " . "Buku " . $book->info() . PHP_EOL;
            }
            break;
        case "2":
            echo "Pilih nomer Buku: ";
            $nomor = (int) trim(fgets(STDIN)) - 1;
            if (!isset($books[$nomor])) {
                echo "Nomer Buku tidak ditemukan" . PHP_EOL;
                break;
            }
            $user->pinjamBuku($books[$nomor]);
            break;
        case '3':
            echo $user->bukuDiPinjam() . PHP_EOL;
            break; 
        case '4':
            echo "Terima Kasih" . PHP_EOL;
            exit;
        default:
            echo "Menu tidak ditemukan" . PHP_EOL;
    }
}