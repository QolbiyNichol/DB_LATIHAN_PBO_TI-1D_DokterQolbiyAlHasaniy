<?php

// Mendeklarasikan class sebagai abstract
abstract class Tiket {
    
    // Properti/Atribut Terenkapsulasi (protected)
    // Nilai-nilai ini wajib dipetakan dari kolom 'tabel_tiket' di database MySQL
    protected int $idTiket;
    protected string $namaFilm;
    protected string $jadwalTayang; // Disimpan sebagai string format DATETIME (Y-m-d H:i:s)
    protected int $jumlahKursi;
    protected float $hargaDasarTiket;

    // Constructor untuk menginisialisasi atribut saat objek dibuat (mapping dari DB)
    public function __construct(int $idTiket, string $namaFilm, string $jadwalTayang, int $jumlahKursi, float $hargaDasarTiket) {
        $this->idTiket = $idTiket;
        $this->namaFilm = $namaFilm;
        $this->jadwalTayang = $jadwalTayang;
        $this->jumlahKursi = $jumlahKursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // =========================================================================
    // METODE ABSTRAK (Wajib Diimplementasikan/Override oleh Kelas Anak)
    // =========================================================================
    
    /**
     * Menghitung total harga tiket berdasarkan jumlah kursi 
     * dan tambahan biaya fasilitas spesifik masing-masing studio.
     * @return float
     */
    abstract public function hitungTotalHarga(): float;

    /**
     * Menampilkan informasi fasilitas spesifik yang didapatkan
     * sesuai dengan jenis studio (Regular, IMAX, atau Velvet).
     * @return void
     */
    abstract public function tampilkanInfoFasilitas(): void;

    // =========================================================================
    // GETTER (Untuk mengambil data dari luar class secara aman)
    // =========================================================================
    public function getIdTiket(): int { return $this->idTiket; }
    public function getNamaFilm(): string { return $this->namaFilm; }
    public function getJadwalTayang(): string { return $this->jadwalTayang; }
    public function getJumlahKursi(): int { return $this->jumlahKursi; }
    public function getHargaDasarTiket(): float { return $this->hargaDasarTiket; }
}