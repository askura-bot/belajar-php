<?php

namespace App;

abstract class User {
    protected string $nama;
    protected array $bukuDiPinjam = [];
    protected string $ketRole;

    public function __construct(string $nama)
    {
        $this->nama = $nama;
    }

    abstract public function getMaxPinjam(): int;

    public function getNamae(): string {
        return $this->nama;
    }

    public function getRole(): string {
        return "User";
    }

    public function pinjamBuku(Book $buku): bool {
        if (count($this->bukuDiPinjam) >= $this-> getMaxPinjam()) {
            echo "Batas peminjaman buku mencapai batas" . PHP_EOL;
            return false;
        } 

        if (!$buku->pinjamBuku()) {
            echo "Stock Buku Habis" . PHP_EOL;
            return false;
        }

        $this->bukuDiPinjam[] = $buku;
        echo $this->nama . "berhasil meminjam " . $buku->getJudul() . PHP_EOL;
        return true;
    }

    public function kembalikaBuku(Book $book): bool {
        foreach ($this->bukuDiPinjam as $index => $buku) {
            if ($buku === $book) {
                $book->kembalikanBuku();
                unset($this->bukuDiPinjam[$index]);
                $this->bukuDiPinjam = array_values($this->bukuDiPinjam);
                echo "{$this->nama} berhasil mengembalikan Buku {$book->getJudul()}" . PHP_EOL;
                echo PHP_EOL;
                return true;
            }
        }

        echo "Buku {$book->getJudul()} tidak ditemuka di daftar pinjaman anda";
        echo PHP_EOL;
        return false;
    }

    public function bukuDiPinjam(): void {
        echo "List Buku yang dipinjam {$this->nama} (" . count($this->bukuDiPinjam) . ") : " . PHP_EOL;

        foreach ($this->bukuDiPinjam as $buku) {
            echo "- " . $buku->getJudul() . PHP_EOL;
        }
    }
    
}