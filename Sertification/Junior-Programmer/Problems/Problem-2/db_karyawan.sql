-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2019 pada 11.42
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karyawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(32) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`) VALUES
(5, '123154', 'm rizal'),
(6, '123141241', 'Sayaka siapa ya tidak tau'),
(8, '532141', 'Saiyaku');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
