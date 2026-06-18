<?php
// TiketRegular.php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    private $tipeAudio;     
    private $lokasiBaris;   

    public function __construct($idTiket, $judulFilm, $hargaDasar, $tipeAudio, $lokasiBaris) {
        // Meneruskan data ke constructor parent
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Getter & Setter Spesifik Regular
    public function getTipeAudio() { return $this->tipeAudio; }
    public function setTipeAudio($tipeAudio) { $this->tipeAudio = $tipeAudio; }

    public function getLokasiBaris() { return $this->lokasiBaris; }
    public function setLokasiBaris($lokasiBaris) { $this->lokasiBaris = $lokasiBaris; }

    // Tahap 5: Overriding hitungTotalHarga
    public function hitungTotalHarga($jumlahKursi) {
        return $jumlahKursi * $this->getHargaDasar();
    }
}
?>