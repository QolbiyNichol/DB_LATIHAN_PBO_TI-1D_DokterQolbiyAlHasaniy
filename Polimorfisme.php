<?php
// test_polimorfisme.php

// 1. Include semua class anak yang sudah dipisah tadi
require_once 'TiketRegular.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

echo "<h2>🎭 Pengujian Polimorfisme (Tahap 5)</h2>";
echo "<hr>";

// Jumlah kursi yang disimulasikan untuk dibeli
$jumlahKursiYangDibeli = 2; 

// 2. Instansiasi Objek dari masing-masing kelas anak
$tiket1 = new TiketRegular("T-REG-01", "Agak Laen", 35000, "Dolby Atmos", "Baris E");
$tiket2 = new TiketIMAX("T-IMX-01", "Inception", 60000, "IMAX-3D-A89", true);
$tiket3 = new TiketVelvet("T-VVT-01", "Interstellar", 100000, true, true);

// 3. Eksekusi Method Overriding hitungTotalHarga()
echo "<b>1. Tiket Regular</b><br>";
echo "Film: " . $tiket1->getJudulFilm() . "<br>";
echo "Harga Dasar: Rp " . number_format($tiket1->getHargaDasar(), 0, ',', '.') . "<br>";
echo "Total Harga (" . $jumlahKursiYangDibeli . " Kursi): <b>Rp " . number_format($tiket1->hitungTotalHarga($jumlahKursiYangDibeli), 0, ',', '.') . "</b> (Tarif Standar)<br><br>";

echo "<b>2. Tiket IMAX</b><br>";
echo "Film: " . $tiket2->getJudulFilm() . "<br>";
echo "Harga Dasar: Rp " . number_format($tiket2->getHargaDasar(), 0, ',', '.') . "<br>";
echo "Total Harga (" . $jumlahKursiYangDibeli . " Kursi): <b>Rp " . number_format($tiket2->hitungTotalHarga($jumlahKursiYangDibeli), 0, ',', '.') . "</b> (Ditambah Biaya Flat Fasilitas Rp 35.000)<br><br>";

echo "<b>3. Tiket Velvet (VIP)</b><br>";
echo "Film: " . $tiket3->getJudulFilm() . "<br>";
echo "Harga Dasar: Rp " . number_format($tiket3->getHargaDasar(), 0, ',', '.') . "<br>";
echo "Total Harga (" . $jumlahKursiYangDibeli . " Kursi): <b>Rp " . number_format($tiket3->hitungTotalHarga($jumlahKursiYangDibeli), 0, ',', '.') . "</b> (Dikenakan Surcharge Kelas Premium 50%)<br><br>";
?>