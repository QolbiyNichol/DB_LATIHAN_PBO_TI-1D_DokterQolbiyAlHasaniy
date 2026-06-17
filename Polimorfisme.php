<?php

/**
 * 1. Overriding pada TiketRegular
 */
class TiketRegular extends Tiket {
    private $tipeAudio;     
    private $lokasiBaris;   

    public function __construct($idTiket, $judulFilm, $hargaDasar, $tipeAudio, $lokasiBaris) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Melakukan METHOD OVERRIDING sesuai logika bisnis gambar
    public function hitungTotalHarga($jumlahKursi) {
        // Tarif standar murni tanpa biaya tambahan fasilitas
        return $jumlahKursi * $this->getHargaDasar();
    }
}

/**
 * 2. Overriding pada TiketIMAX
 */
class TiketIMAX extends Tiket {
    private $kacamata3dId;    
    private $efekGerakFitur;  

    public function __construct($idTiket, $judulFilm, $hargaDasar, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Melakukan METHOD OVERRIDING sesuai logika bisnis gambar
    public function hitungTotalHarga($jumlahKursi) {
        // Ditambah biaya flat teknologi layar lebar & audio Rp 35.000
        return ($jumlahKursi * $this->getHargaDasar()) + 35000;
    }
}

/**
 * 3. Overriding pada TiketVelvet
 */
class TiketVelvet extends Tiket {
    private $bantalSelimutPack; 
    private $layananButler;      

    public function __construct($idTiket, $judulFilm, $hargaDasar, $bantalSelimutPack, $layananButler) {
        parent::__construct($idTiket, $judulFilm, $hargaDasar);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Melakukan METHOD OVERRIDING sesuai logika bisnis gambar
    public function hitungTotalHarga($jumlahKursi) {
        // Dikenakan surcharge / biaya tambahan kelas premium sebesar 50% (dikali 1.50)
        return ($jumlahKursi * $this->getHargaDasar()) * 1.50;
    }
}