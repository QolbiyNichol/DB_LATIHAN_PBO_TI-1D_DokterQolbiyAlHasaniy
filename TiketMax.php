<?php
// Tiket.php

abstract class Tiket {
    private $idTiket;
    private $judulFilm;
    private $hargaDasar;

    public function __construct($idTiket, $judulFilm, $hargaDasar) {
        $this->idTiket = $idTiket;
        $this->judulFilm = $judulFilm;
        $this->hargaDasar = $hargaDasar;
    }

    // Getter dan Setter Umum
    public function getIdTiket() { return $this->idTiket; }
    public function setIdTiket($idTiket) { $this->idTiket = $idTiket; }

    public function getJudulFilm() { return $this->judulFilm; }
    public function setJudulFilm($judulFilm) { $this->judulFilm = $judulFilm; }

    public function getHargaDasar() { return $this->hargaDasar; }
    public function setHargaDasar($hargaDasar) { $this->hargaDasar = $hargaDasar; }

    // Method Abstract yang WAJIB di-override oleh kelas anak
    abstract public function hitungTotalHarga($jumlahKursi);
}
?>