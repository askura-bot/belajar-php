<?php

namespace App;

class Transaction {
    private User $user;
    private Book $buku;
    private string $tanggal;

    public function __construct($user, $buku)
    {
        $this->user = $user;
        $this->buku = $buku;
        $this->tanggal = date('Y-m-d');
    }

    public function info (): void {
        echo "Info Transaksi" . PHP_EOL;
        echo "User   : " . $this->user->getNamae() . PHP_EOL;
        echo "Buku   : " . $this->buku->getJudul() . PHP_EOL;
        echo "Tanggal: " . $this->tanggal . PHP_EOL;
        echo PHP_EOL;
    }
}