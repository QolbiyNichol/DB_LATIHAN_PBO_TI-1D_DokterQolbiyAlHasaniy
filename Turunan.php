<?php
// Pastikan file abstract class Tiket sudah di-require jika terpisah
// require_once 'Tiket.php';

/**
 * 1. Subclass TiketRegular
 */
class TiketRegular extends Tiket {
    // Properti tambahan spesifik Regular
    private $tipeAudio;     // Contoh: "Dolby Atmos", "Stereo 5.1"
    private $lokasiBaris;   // Contoh: "A", "B", "C" (Baris depan/belakang)

    // Constructor Kelas Anak
    public function __construct($idTiket, $judulFilm, $hargaDasar, $tipeAudio, $lokasiBaris) {
        // Memanggil constructor dari abstract class induk (Tiket)
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        
        // Inisialisasi properti spesifik kelas ini
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Getter dan Setter untuk properti tambahan
    public function getTipeAudio() { return $this->tipeAudio; }
    public function setTipeAudio($tipeAudio) { $this->tipeAudio = $tipeAudio; }

    public function getLokasiBaris() { return $this->lokasiBaris; }
    public function setLokasiBaris($lokasiBaris) { $this->lokasiBaris = $lokasiBaris; }

    // Mengimplementasikan method abstract wajib dari parent (jika ada)
    public function hitungHargaAkhir() {
        // Contoh logika: Regular tidak ada biaya tambahan, hanya harga dasar
        return $this->getHargaDasar();
    }
}

/**
 * 2. Subclass TiketIMAX
 */
class TiketIMAX extends Tiket {
    // Properti tambahan spesifik IMAX
    private $kacamata3dId;    // Contoh: "IMAX-3D-082"
    private $efekGerakFitur;  // Boolean: true jika ada fitur motion/vibrasi, false jika tidak

    public function __construct($idTiket, $judulFilm, $hargaDasar, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function getKacamata3dId() { return $this->kacamata3dId; }
    public function setKacamata3dId($kacamata3dId) { $this->kacamata3dId = $kacamata3dId; }

    public function getEfekGerakFitur() { return $this->efekGerakFitur; }
    public function setEfekGerakFitur($efekGerakFitur) { $this->efekGerakFitur = $efekGerakFitur; }

    public function hitungHargaAkhir() {
        // Contoh logika: IMAX ditambah biaya sewa kacamata dan layar lebar Rp 25.000
        return $this->getHargaDasar() + 25000;
    }
}

/**
 * 3. Subclass TiketVelvet
 */
class TiketVelvet extends Tiket {
    // Properti tambahan spesifik Velvet (Sofa Bed Luxury)
    private $bantalSelimutPack; // Boolean: true jika include paket bantal selimut premium
    private $layananButler;      // Boolean: true jika ada tombol panggil pelayan khusus

    public function __construct($idTiket, $judulFilm, $hargaDasar, $bantalSelimutPack, $layananButler) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function getBantalSelimutPack() { return $this->bantalSelimutPack; }
    public function setBantalSelimutPack($bantalSelimutPack) { $this->bantalSelimutPack = $bantalSelimutPack; }

    public function getLayananButler() { return $this->layananButler; }
    public function setLayananButler($layananButler) { $this->layananButler = $layananButler; }

    public function hitungHargaAkhir() {
        // Contoh logika: Velvet ditambah biaya layanan kelas VIP Rp 50.000
        return $this->getHargaDasar() + 50000;
    }
}
?>