<?php
// booking.php - Komponen Antarmuka Laporan Booking Tiket

// --- 1. JALUR INCLUDE CLASS INDUK DAN ANAK ---
// Pastikan file abstract Tiket dan class turunannya sudah dipanggil
// require_once 'Tiket.php';
// require_once 'TiketTurunan.php';

// --- (OPSIONAL) SIMULASI STRUKTUR CLASS UNTUK MEMASTIKAN DI VIEW JALAN ---
// Catatan: Jika class Tiket, TiketRegular, TiketIMAX, TiketVelvet milikmu sudah di-include di atas, 
// bagian deklarasi class tiruan di bawah ini bisa kamu hapus.

abstract class Tiket {
    private $idTiket;
    private $judulFilm;
    private $hargaDasar;

    public function __construct($idTiket, $judulFilm, $hargaDasar) {
        $this->idTiket = $idTiket;
        $this->judulFilm = $judulFilm;
        $this->hargaDasar = $hargaDasar;
    }

    public function getIdTiket() { return $this->idTiket; }
    public function getJudulFilm() { return $this->judulFilm; }
    public function getHargaDasar() { return $this->hargaDasar; }

    abstract public function hitungTotalHarga($jumlahKursi);
    abstract public function cetakFasilitasUnik(); // Method polimorfik untuk view
}

class TiketRegular extends Tiket {
    private $tipeAudio;     
    private $lokasiBaris;   

    public function __construct($idTiket, $judulFilm, $hargaDasar, $tipeAudio, $lokasiBaris) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    public function hitungTotalHarga($jumlahKursi) {
        return $jumlahKursi * $this->getHargaDasar();
    }

    public function cetakFasilitasUnik() {
        return "🔊 Audio: " . $this->tipeAudio . " | 💺 Baris: " . $this->lokasiBaris;
    }
}

class TiketIMAX extends Tiket {
    private $kacamata3dId;    
    private $efekGerakFitur;  

    public function __construct($idTiket, $judulFilm, $hargaDasar, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function hitungTotalHarga($jumlahKursi) {
        return ($jumlahKursi * $this->getHargaDasar()) + 35000;
    }

    public function cetakFasilitasUnik() {
        $fiturGerak = $this->efekGerakFitur ? "Aktif (Motion 4D)" : "Tidak Ada";
        return "🕶️ Kacamata ID: " . $this->kacamata3dId . " | 🎬 Efek Gerak: " . $fiturGerak;
    }
}

class TiketVelvet extends Tiket {
    private $bantalSelimutPack; 
    private $layananButler;      

    public function __construct($idTiket, $judulFilm, $hargaDasar, $bantalSelimutPack, $layananButler) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function hitungTotalHarga($jumlahKursi) {
        return ($jumlahKursi * $this->getHargaDasar()) * 1.50;
    }

    public function cetakFasilitasUnik() {
        $bantal = $this->bantalSelimutPack ? "Include Premium Pack" : "Tidak";
        $butler = $this->layananButler ? "Tersedia (On-Demand)" : "Tidak";
        return "🛌 Bantal & Selimut: " . $bantal . " | 🤵 Butler Service: " . $butler;
    }
}

// --- 2. DATA DINAMIS HASIL PEMESANAN (CONTOH ARRAY DARI DATABASE) ---
$daftarPesanan = [
    // Array berisi: [ Objek Kelas Anak, Jumlah Kursi yang Dipesan ]
    [new TiketRegular("T-REG-001", "Agak Laen", 35000, "Dolby Atmos", "Baris E"), 2],
    [new TiketRegular("T-REG-002", "Pengabdi Setan", 35000, "Stereo 5.1", "Baris G"), 4],
    
    [new TiketIMAX("T-IMX-001", "Inception", 60000, "IMAX-3D-A89", true), 2],
    [new TiketIMAX("T-IMX-002", "Dune: Part Two", 65000, "IMAX-3D-B12", false), 1],
    
    [new TiketVelvet("T-VVT-001", "Interstellar", 100000, true, true), 2],
    [new TiketVelvet("T-VVT-002", "Exhuma", 110000, true, true), 3],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Booking Tiket</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f7f6;
        }
        /* Sidebar Navigasi */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }
        .sidebar a {
            color: #b8c7ce;
            text-decoration: none;
            padding: 15px 20px;
            margin-bottom: 10px;
            border-radius: 4px;
            display: block;
            transition: all 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #34495e;
            color: white;
            padding-left: 30px;
        }
        /* Area Konten Utama */
        .main-content {
            flex: 1;
            padding: 30px;
        }
        .header {
            background-color: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .header h1 { color: #2c3e50; }
        
        /* Pengelompokan Studio Berdasarkan Kategori */
        .studio-section {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .studio-title {
            font-size: 18px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 3px solid #eee;
        }
        .title-regular { color: #e74c3c; border-bottom-color: #e74c3c; }
        .title-imax { color: #f1c40f; border-bottom-color: #f1c40f; }
        .title-velvet { color: #3498db; border-bottom-color: #3498db; }

        /* Tabel Data */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        th { background-color: #f8f9fa; color: #333; font-weight: 600; }
        tr:hover { background-color: #fdfdfd; }
        
        .badge-fasilitas {
            background-color: #f0f4f8;
            color: #2c3e50;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
            border-left: 3px solid #7f8c8d;
        }
        .harga-total { font-weight: bold; color: #27ae60; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>🎬 BIOSKOP XXI</h2>
        <a href="index.php">🏠 Dashboard</a>
        <a href="film.php">🍿 Menu Film</a>
        <a href="#jadwal">📅 Menu Jadwal</a>
        <a href="booking.php" class="active">🎟️ Menu Booking</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Laporan Penjualan Tiket Bioskop 🎟️</h1>
        </div>

        <div class="studio-section">
            <h2 class="studio-title title-regular">🔴 KATEGORI STUDIO REGULAR</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Tiket</th>
                        <th>Judul Film</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Spesifikasi Fasilitas Studio (Polimorfik)</th>
                        <th>Total Bayar (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftarPesanan as $pesanan): 
                        $tiket = $pesanan[0]; $qty = $pesanan[1];
                        if ($tiket instanceof TiketRegular): ?>
                            <tr>
                                <td><code><?= $tiket->getIdTiket() ?></code></td>
                                <td><b><?= $tiket->getJudulFilm() ?></b></td>
                                <td>Rp <?= number_format($tiket->getHargaDasar(), 0, ',', '.') ?></td>
                                <td><?= $qty ?> Kursi</td>
                                <td><div class="badge-fasilitas" style="border-left-color: #e74c3c;"><?= $tiket->cetakFasilitasUnik() ?></div></td>
                                <td class="harga-total">Rp <?= number_format($tiket->hitungTotalHarga($qty), 0, ',', '.') ?></td>
                            </tr>
                    <?php endif; endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="studio-section">
            <h2 class="studio-title title-imax">🟡 KATEGORI STUDIO IMAX</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Tiket</th>
                        <th>Judul Film</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Spesifikasi Fasilitas Studio (Polimorfik)</th>
                        <th>Total Bayar (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftarPesanan as $pesanan): 
                        $tiket = $pesanan[0]; $qty = $pesanan[1];
                        if ($tiket instanceof TiketIMAX): ?>
                            <tr>
                                <td><code><?= $tiket->getIdTiket() ?></code></td>
                                <td><b><?= $tiket->getJudulFilm() ?></b></td>
                                <td>Rp <?= number_format($tiket->getHargaDasar(), 0, ',', '.') ?></td>
                                <td><?= $qty ?> Kursi</td>
                                <td><div class="badge-fasilitas" style="border-left-color: #f1c40f;"><?= $tiket->cetakFasilitasUnik() ?></div></td>
                                <td class="harga-total">Rp <?= number_format($tiket->hitungTotalHarga($qty), 0, ',', '.') ?></td>
                            </tr>
                    <?php endif; endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="studio-section">
            <h2 class="studio-title title-velvet">🔵 KATEGORI STUDIO VELVET (VIP)</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Tiket</th>
                        <th>Judul Film</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Spesifikasi Fasilitas Studio (Polimorfik)</th>
                        <th>Total Bayar (Polimorfik)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftarPesanan as $pesanan): 
                        $tiket = $pesanan[0]; $qty = $pesanan[1];
                        if ($tiket instanceof TiketVelvet): ?>
                            <tr>
                                <td><code><?= $tiket->getIdTiket() ?></code></td>
                                <td><b><?= $tiket->getJudulFilm() ?></b></td>
                                <td>Rp <?= number_format($tiket->getHargaDasar(), 0, ',', '.') ?></td>
                                <td><?= $qty ?> Kursi</td>
                                <td><div class="badge-fasilitas" style="border-left-color: #3498db;"><?= $tiket->cetakFasilitasUnik() ?></div></td>
                                <td class="harga-total">Rp <?= number_format($tiket->hitungTotalHarga($qty), 0, ',', '.') ?></td>
                            </tr>
                    <?php endif; endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>