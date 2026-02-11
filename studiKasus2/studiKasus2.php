<?php

$transaksis = [
    [
        "id_transaksi" => "TR00X1",
        "kasir" => "Kim Dokja",
        "items" => [
            ["barang" => "Laptop", "harga" => 7_500_000, "jumlah" => 1],
            ["barang" => "Mouse", "harga" => 150_000, "jumlah" => 2],
        ]
    ],
    [
        "id_transaksi" => "TR00X2",
        "kasir" => "You Jonghyuk",
        "items" => [
            ["barang" => "Monitor", "harga" => 1_500_000, "jumlah" => 3],
            ["barang" => "Keyboard", "harga" => 250_000, "jumlah" => 1],
        ]
    ],
    [
        "id_transaksi" => "TR00X2",
        "kasir" => "Han Souyung",
        "items" => [
            ["barang" => "Speaker", "harga" => 120_000, "jumlah" => 4],
            ["barang" => "Power Supply", "harga" => 2_000_000, "jumlah" => 2],
        ]
    ],
];

foreach ($transaksis as $transaksi) {

    echo "ID Transaksis: " . $transaksi["id_transaksi"] . PHP_EOL;
    echo "Kasir: " . $transaksi["kasir"] . PHP_EOL;
    echo "Item: ------------- " . PHP_EOL;

    foreach ($transaksi["items"] as $index => $item) {
        echo "Barang: " . $item["barang"] . " Harga: " . $item["harga"] . " jumlah: " . $item["jumlah"] . PHP_EOL;

        $subTotal = hitungSubTotal(
            $item["harga"],
            $item["jumlah"]
        );

        echo "Sub Total: " . number_format($subTotal, 2) . PHP_EOL;

    }

    $totalTransaksi = hitungTotalTransaksi($transaksi["items"]);
    echo "Total: " . number_format($totalTransaksi, 2) . PHP_EOL;
    echo "" . PHP_EOL;

}

function hitungSubTotal ($harga, $jumlah) {
    return $harga * $jumlah;
}

function hitungTotalTransaksi ($items) {
    $totalTransaksi = 0;
    foreach ($items as $item) {
        $total = hitungSubTotal(
            $item["harga"],
            $item["jumlah"]
        );

        $totalTransaksi += $total;
    }
    return $totalTransaksi;
}