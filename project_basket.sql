-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2025 pada 05.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_basket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemain`
--

CREATE TABLE `pemain` (
  `id_pemain` int(11) NOT NULL,
  `nama_pemain` varchar(100) NOT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `tinggi_cm` int(11) DEFAULT NULL,
  `berat_kg` int(11) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_punggung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemain`
--

INSERT INTO `pemain` (`id_pemain`, `nama_pemain`, `posisi`, `tinggi_cm`, `berat_kg`, `tanggal_lahir`, `nomor_punggung`) VALUES
(27, 'Andi Wijaya', 'Point Guard', 188, 90, '2002-04-10', 100),
(28, 'Budi Santoso', 'Shooting Guard', 183, 76, '2001-01-21', 11),
(29, 'Citra Dewi', 'Small Forward', 175, 65, '2003-09-15', 7),
(30, 'Dimas Pratama', 'Power Forward', 188, 82, '2000-06-02', 15),
(31, 'Eko Ramadhan', 'Center', 195, 90, '1999-12-28', 22),
(32, 'Fajar Hidayat', 'Point Guard', 172, 68, '2004-03-11', 5),
(33, 'Gilang Mahendra', 'Small Forward', 180, 72, '2002-11-08', 9),
(34, 'Rizky Saputra', 'Center', 198, 94, '2001-07-19', 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertandingan`
--

CREATE TABLE `pertandingan` (
  `id_pertandingan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lawan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertandingan`
--

INSERT INTO `pertandingan` (`id_pertandingan`, `tanggal`, `lawan`) VALUES
(7, '2025-01-10', 'Dragons'),
(8, '2025-01-17', 'Warriors'),
(9, '2025-01-25', 'Thunder'),
(10, '2025-02-02', 'Falcons'),
(11, '2025-02-09', 'Lightning'),
(12, '2025-01-20', 'Dragons'),
(13, '2024-11-20', 'Lakers');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE `statistik` (
  `id_statistik` int(11) NOT NULL,
  `id_pemain` int(11) NOT NULL,
  `id_pertandingan` int(11) NOT NULL,
  `poin` int(11) DEFAULT 0,
  `assist` int(11) DEFAULT 0,
  `rebound` int(11) DEFAULT 0,
  `steal` int(11) DEFAULT 0,
  `block` int(11) DEFAULT 0,
  `turnover` int(11) DEFAULT 0,
  `fga` int(11) DEFAULT 0,
  `fgm` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`id_statistik`, `id_pemain`, `id_pertandingan`, `poin`, `assist`, `rebound`, `steal`, `block`, `turnover`, `fga`, `fgm`) VALUES
(1, 27, 7, 15, 6, 4, 1, 0, 2, 12, 6),
(82, 28, 7, 18, 3, 5, 1, 1, 1, 14, 7),
(83, 29, 8, 10, 2, 7, 1, 0, 2, 9, 4),
(84, 30, 8, 22, 4, 9, 2, 2, 3, 18, 9),
(85, 31, 9, 20, 1, 11, 0, 3, 2, 16, 8),
(86, 32, 9, 12, 7, 3, 2, 0, 1, 10, 5),
(87, 27, 10, 14, 6, 4, 2, 0, 1, 12, 6),
(88, 33, 10, 11, 3, 5, 1, 1, 2, 9, 4),
(89, 34, 10, 22, 2, 12, 0, 4, 3, 18, 9),
(90, 28, 11, 17, 4, 6, 1, 0, 2, 13, 12),
(91, 29, 11, 9, 2, 5, 1, 0, 0, 7, 3),
(92, 30, 12, 16, 3, 8, 1, 1, 2, 13, 6),
(93, 31, 12, 23, 0, 10, 0, 2, 3, 19, 9),
(94, 32, 13, 12, 5, 2, 1, 0, 1, 9, 4),
(95, 33, 13, 18, 3, 6, 1, 1, 2, 14, 7),
(102, 34, 13, 39, 6, 8, 4, 3, 6, 20, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin1', 'admin1@gmail.com', '$2y$10$y6f1jPxCKgDf4ToWTA5kPuN1NPZS/aaCBNBnpvpywiKGGov0.Ae0.', 'admin'),
(15, 'indra', 'indra@gmail.com', '$2y$10$7O/ykld7inerkyodD3ezPeRxywPocizEKFq.MuroiTH79g8LMQyB6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id_pemain`);

--
-- Indeks untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`id_pertandingan`);

--
-- Indeks untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id_statistik`),
  ADD KEY `id_pemain` (`id_pemain`),
  ADD KEY `id_pertandingan` (`id_pertandingan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id_pemain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `id_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD CONSTRAINT `statistik_ibfk_1` FOREIGN KEY (`id_pemain`) REFERENCES `pemain` (`id_pemain`) ON DELETE CASCADE,
  ADD CONSTRAINT `statistik_ibfk_2` FOREIGN KEY (`id_pertandingan`) REFERENCES `pertandingan` (`id_pertandingan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
