<?php



namespace App;

class Book {
    private string $judul;
    private int $stock;

    public function __construct($judul, $stock)
    {
        $this->judul = $judul;
        $this->stock = $stock;

    }

    public function getJudul(): string {
        return $this->judul;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function pinjamBuku():bool {
        if ($this->stock <= 0) {
            return false;
        } else {
            $this->stock--;
            return true;
        }
    }

    public function kembalikanBuku():void {
        $this->stock++;
    }

    public function info(): string {
        return "{$this->judul} (Stock: {$this->stock})";
    }
}