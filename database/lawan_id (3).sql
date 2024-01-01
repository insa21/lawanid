-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2024 pada 00.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawan_id`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nisn` char(19) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nisn`, `password`, `nama`) VALUES
('0001', 'admin', 'indra saepudinxxx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(30) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `foto` varchar(550) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `foto`, `isi`, `tanggal`) VALUES
(58, 'kekerasan seksual  vvvvv', '20190916_103728-768x616.jpg', 'wkwkwk', '2023-12-14'),
(59, 'kekerasan seksual', '20190916_103728-768x616.jpg', 'sasa', '2023-12-14'),
(60, 'kekerasan seksual', '20190916_103728-768x616.jpg', 'bebassss', '2023-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `lokasi_kejadian` varchar(200) NOT NULL,
  `tanggal_kejadian` varchar(50) NOT NULL,
  `deskripsi` varchar(550) NOT NULL,
  `bukti_kejadian` varchar(200) NOT NULL,
  `nisn` char(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `judul`, `foto`, `lokasi_kejadian`, `tanggal_kejadian`, `deskripsi`, `bukti_kejadian`, `nisn`, `id_status`, `created_at`) VALUES
(25, 'kekerasan seksual', '', 'belakang rumah', '2023-12-20', 'test', '20190916_103728-768x616.jpg', '0001', 25, '2023-12-29 08:31:47'),
(26, 'bullying', '', 'sekolah', '2023-12-22', 'pada zaman dahulu kala disebuqah rumah', 'cid.jpg', '0001', 26, '2023-12-29 08:32:56'),
(27, 'bullying', '', 'sekolah', '2024-01-11', 'kenapaaa ?', '20190916_103728-768x616.jpg', 'A123', 27, '2024-01-01 22:37:04'),
(28, 'bulliying', '', 'Taman', '2024-01-01', 'bebasss', '20190916_103728-768x616.jpg', 'AB234', 28, '2024-01-01 22:52:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(16) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `kelas` varchar(35) NOT NULL,
  `jurusan` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(35) NOT NULL,
  `no_hp` varchar(35) NOT NULL,
  `alamat` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `foto`, `password`, `nama`, `kelas`, `jurusan`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
('0001', 'yogi.jpg', 'siswa', 'indra saepudin xxx', '', '', '', '', ''),
('A123', '2018-07-17_220151 (1).jpg', 'siswa', 'udinnnnnn', '12', 'Teknik informatika', 'laki-laki', '+6289655029147', 'wkwk'),
('AB234', 'yogi.jpg', 'fitroh123', 'Fitrohh', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_laporan`
--

CREATE TABLE `status_laporan` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'terkirim',
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_laporan`
--

INSERT INTO `status_laporan` (`id_status`, `status`, `feedback`) VALUES
(11, 'approve', 'gw uproap yahh'),
(12, 'approve', 'okeee'),
(13, 'unapprove', 'delete yahh'),
(14, 'unapprove', 'delete dong'),
(15, 'approve', 'wokeeee'),
(16, 'approve', 'asasas'),
(17, 'terkirim', ' '),
(18, 'terkirim', ' '),
(19, 'terkirim', ' '),
(20, 'terkirim', ' '),
(21, 'terkirim', ' '),
(22, 'terkirim', ' '),
(23, 'approve', 'okeeee'),
(24, 'unapprove', 'gagal'),
(25, 'approve', 'disetujui'),
(26, 'terkirim', ' '),
(27, 'terkirim', ' '),
(28, 'terkirim', ' ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `status_laporan`
--
ALTER TABLE `status_laporan`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `status_laporan`
--
ALTER TABLE `status_laporan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status_laporan` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
