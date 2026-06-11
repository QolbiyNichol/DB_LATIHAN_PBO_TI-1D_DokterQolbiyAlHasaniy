-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2026 at 07:16 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti-1d_dokterqolbiyalhasaniy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(150) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(5) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Java Programming Part I', '2026-06-12 13:00:00', 2, '40000.00', 'Regular', 'Dolby Digital 5.1', 'G', NULL, NULL, NULL, NULL),
(2, 'Avatar: The Next Code', '2026-06-12 16:30:00', 1, '75000.00', 'IMAX', 'Dolby Atmos', 'D', 'K-IMAX-0982', 'Efek Getar Ringan', NULL, NULL),
(3, 'The Master of OOP', '2026-06-12 20:00:00', 2, '150000.00', 'Velvet', 'DTS:X Ultra', 'A', NULL, NULL, 'Premium Silk Package', 'Full Service Butler Call Button'),
(4, 'The Rise of Data Structure', '2026-06-13 10:00:00', 3, '70000.00', 'IMAX', 'Dolby Atmos', 'C', NULL, 'Efek Getar Standar', NULL, NULL),
(5, 'Inheritance: Secrets of OOP', '2026-06-13 21:15:00', 2, '160000.00', 'Velvet', 'DTS:X Ultra', 'B', NULL, NULL, 'Executive Blanket & Pillow Pack', 'Welcome Drink & Food Order Service'),
(6, 'Java Programming Part I', '2026-06-12 13:00:00', 2, '40000.00', 'Regular', 'Dolby Digital 5.1', 'G', NULL, NULL, NULL, NULL),
(7, 'Detektif Koding: Bug Misterius', '2026-06-12 15:15:00', 1, '40000.00', 'Regular', 'Dolby Digital 5.1', 'E', NULL, NULL, NULL, NULL),
(8, 'Algoritma Cinta', '2026-06-12 18:30:00', 4, '45000.00', 'Regular', 'Standard Stereo', 'F', NULL, NULL, NULL, NULL),
(9, 'The Cyber Attack', '2026-06-13 12:00:00', 2, '40000.00', 'Regular', 'Dolby Digital 5.1', 'D', NULL, NULL, NULL, NULL),
(10, 'Mengejar Deadline Skripsi', '2026-06-13 14:45:00', 3, '40000.00', 'Regular', 'Standard Stereo', 'H', NULL, NULL, NULL, NULL),
(11, 'Kisah Sukses Startup', '2026-06-14 11:00:00', 1, '45000.00', 'Regular', 'Dolby Digital 5.1', 'C', NULL, NULL, NULL, NULL),
(12, 'Misteri Array Dimensi Tiga', '2026-06-14 16:20:00', 2, '45000.00', 'Regular', 'Dolby Digital 5.1', 'F', NULL, NULL, NULL, NULL),
(13, 'Avatar: The Next Code', '2026-06-12 16:30:00', 1, '75000.00', 'IMAX', 'Dolby Atmos', 'D', 'K-IMAX-0982', 'Efek Getar Ringan', NULL, NULL),
(14, 'The Rise of Data Structure', '2026-06-13 10:00:00', 3, '70000.00', 'IMAX', 'Dolby Atmos', 'C', NULL, 'Efek Getar Standar', NULL, NULL),
(15, 'Interstellar: Black Hole Query', '2026-06-13 15:00:00', 2, '70000.00', 'IMAX', 'Dolby Atmos', 'B', 'K-IMAX-1140', 'Simulasi Ruang Angkasa', NULL, NULL),
(16, 'Jurassic Code: Dinosaur Exception', '2026-06-13 19:30:00', 2, '75000.00', 'IMAX', 'Dolby Atmos', 'E', 'K-IMAX-0541', 'Efek Guncangan Berat', NULL, NULL),
(17, 'Matrix: Recoding the World', '2026-06-14 13:00:00', 1, '75000.00', 'IMAX', 'Dolby Atmos', 'D', 'K-IMAX-0229', 'Efek Getar Ringan', NULL, NULL),
(18, 'The Avengers: Age of Framework', '2026-06-14 17:00:00', 5, '80000.00', 'IMAX', 'Dolby Atmos', 'A', NULL, 'Efek Ledakan Guncang', NULL, NULL),
(19, 'Inception: Loop Within Loop', '2026-06-14 20:45:00', 2, '80000.00', 'IMAX', 'Dolby Atmos', 'C', 'K-IMAX-0773', 'Simulasi Jatuh Bebas', NULL, NULL),
(20, 'The Master of OOP', '2026-06-12 20:00:00', 2, '150000.00', 'Velvet', 'DTS:X Ultra', 'A', NULL, NULL, 'Premium Silk Package', 'Full Service Butler Call Button'),
(21, 'Inheritance: Secrets of OOP', '2026-06-13 21:15:00', 2, '160000.00', 'Velvet', 'DTS:X Ultra', 'B', NULL, NULL, 'Executive Blanket & Pillow Pack', 'Welcome Drink & Food Order Service'),
(22, 'Polymorphism: Many Faces of Code', '2026-06-13 23:45:00', 2, '150000.00', 'Velvet', 'DTS:X Ultra', 'A', NULL, NULL, 'Standard Bed Set', 'Snack & Drink Delivery'),
(23, 'The Godfather of Refactoring', '2026-06-14 14:00:00', 2, '150000.00', 'Velvet', 'DTS:X Ultra', 'C', NULL, NULL, 'Standard Bed Set', 'Hanya Tombol Panggilan'),
(24, 'Breakfast at Coffee Shop API', '2026-06-14 16:30:00', 2, '150000.00', 'Velvet', 'DTS:X Ultra', 'B', NULL, NULL, 'Premium Silk Package', 'Termasuk Makan Siang Mewah'),
(25, 'Silicon Valley Journey', '2026-06-14 19:15:00', 2, '160000.00', 'Velvet', 'DTS:X Ultra', 'A', NULL, NULL, 'Executive Blanket & Pillow Pack', 'Welcome Drink & Food Order Service'),
(26, 'Midnight Coding Session', '2026-06-14 22:00:00', 2, '160000.00', 'Velvet', 'DTS:X Ultra', 'B', NULL, NULL, 'Premium Silk Package', 'Full Service Butler Call Button');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
