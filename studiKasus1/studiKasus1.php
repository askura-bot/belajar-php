<?php

$mahasiswas = [
    [
        "Nama" => "Kim Dokja",
        "NIM" => "2305090040",
        "Mata Kuliah" => [
            "Pemrograman Web" => ["tugas" => 60, "uts" => 70, "uas" => 90],
            "Pemrograman Game" => ["tugas" => 89, "uts" => 85, "uas" => 95],
            "Jaringan Komputer" => ["tugas" => 87, "uts" => 90, "uas" => 95],
        ]
    ],
    [
        "Nama" => "Yo Jonghyuk",
        "NIM" => "2305090045",
        "Mata Kuliah" => [
            "Pemrograman Web" => ["tugas" => 86, "uts" => 92, "uas" => 97],
            "Pemrograman Game" => ["tugas" => 84, "uts" => 88, "uas" => 90],
            "Jaringan Komputer" => ["tugas" => 81, "uts" => 97, "uas" => 92],
        ]
    ],
    [
        "Nama" => "Han Souyung",
        "NIM" => "2305090050",
        "Mata Kuliah" => [
            "Pemrograman Web" => ["tugas" => 86, "uts" => 90, "uas" => 95],
            "Pemrograman Game" => ["tugas" => 80, "uts" => 88, "uas" => 92],
            "Jaringan Komputer" => ["tugas" => 81, "uts" => 87, "uas" => 94],
        ]
    ],


];

foreach ($mahasiswas as $mahasiswa) {
    echo "Nama: " . $mahasiswa["Nama"] . PHP_EOL;
    echo "NIM: " . $mahasiswa["NIM"] . PHP_EOL;

    foreach ($mahasiswa["Mata Kuliah"] as $namaMatkul => $nilai) {
        $nilaiAkhir = hitungNilaiAkhir(
            $nilai["tugas"],
            $nilai["uts"],
            $nilai["uas"],
        );

        $grade = gradeNilai($nilaiAkhir);

        echo "Matkul: $namaMatkul " . PHP_EOL;
        echo "Nilai : " .number_format($nilaiAkhir, 2). PHP_EOL; 
        echo "Grade : $grade" . PHP_EOL;
    }

    $ipk = hitungIPK($mahasiswa["Mata Kuliah"]);
    echo "IPK: " . number_format($ipk, 2) . PHP_EOL;

    echo "" . PHP_EOL;
}

function hitungNilaiAkhir($tugas, $uts, $uas) {
    return ($tugas*0.2) + ($uts*0.4) + ($uas*0.4);
}

function gradeNilai ($nilai) {
    if ($nilai >= 85 ) return "A";
    if ($nilai >= 75 ) return "B";
    if ($nilai >= 65 ) return "C";
    return "D";
}

function bobotNilai ($nilai) {
    if ($nilai >= 85 ) return 4.0;
    if ($nilai >= 75 ) return 3.0;
    if ($nilai >= 65 ) return 2.0;
    return 1.0;
}

function hitungIPK ($mataKuliah) {
    $totalBobot = 0;
    $jumlahMatkul = count($mataKuliah);

    foreach ($mataKuliah as $nilai) {
        $nilaiAkhir = hitungNilaiAkhir(
            $nilai["tugas"],
            $nilai["uts"],
            $nilai["uas"],
        );

        $bobot = bobotNilai($nilaiAkhir);
        echo "bobot: " . $bobot . PHP_EOL;
        $totalBobot += $bobot;
        echo "total bobot: " . $totalBobot .  PHP_EOL;
    }
    return $totalBobot/$jumlahMatkul;
}