<?php
// TiketVelvet.php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    private $bantalSelimutPack; 
    private $layananButler;      

    public function __construct($idTiket, $judulFilm, $hargaDasar, $bantalSelimutPack, $layananButler) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Getter & Setter Spesifik Velvet
    public function getBantalSelimutPack() { return $this->bantalSelimutPack; }
    public function setBantalSelimutPack($bantalSelimutPack) { $this->bantalSelimutPack = $bantalSelimutPack; }

    public function getLayananButler() { return $this->layananButler; }
    public function setLayananButler($layananButler) { $this->layananButler = $layananButler; }

    // Tahap 5: Overriding hitungTotalHarga (Surcharge 50% atau dikali 1.50)
    public function hitungTotalHarga($jumlahKursi) {
        return ($jumlahKursi * $this->getHargaDasar()) * 1.50;
    }
}
?>