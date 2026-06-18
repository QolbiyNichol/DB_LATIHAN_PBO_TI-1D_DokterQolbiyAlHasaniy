<?php
// TiketIMAX.php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    private $kacamata3dId;    
    private $efekGerakFitur;  

    public function __construct($idTiket, $judulFilm, $hargaDasar, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Getter & Setter Spesifik IMAX
    public function getKacamata3dId() { return $this->kacamata3dId; }
    public function setKacamata3dId($kacamata3dId) { $this->kacamata3dId = $kacamata3dId; }

    public function getEfekGerakFitur() { return $this->efekGerakFitur; }
    public function setEfekGerakFitur($efekGerakFitur) { $this->efekGerakFitur = $efekGerakFitur; }

    // Tahap 5: Overriding hitungTotalHarga (+ Rp 35.000 flat)
    public function hitungTotalHarga($jumlahKursi) {
        return ($jumlahKursi * $this->getHargaDasar()) + 35000;
    }
}
?>