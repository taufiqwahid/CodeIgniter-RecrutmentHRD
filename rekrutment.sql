-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2020 pada 07.17
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekrutment`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`nama_lengkap`, `username`, `password`, `level`) VALUES
('Charlie Y Aguilar', 'aa', 'aa', 'peserta'),
('admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `jumlahSoal` int(11) NOT NULL,
  `jbenar` int(11) NOT NULL,
  `jsalah` int(11) NOT NULL,
  `nilaiHasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `jml_jwb` int(11) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `keahlihan` text NOT NULL,
  `pengalaman` text NOT NULL,
  `cv_portofolio` varchar(100) NOT NULL,
  `surat_lamaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `foto`, `username`, `password`, `nama_lengkap`, `tgl_lahir`, `alamat`, `bidang`, `jml_jwb`, `pendidikan`, `keahlihan`, `pengalaman`, `cv_portofolio`, `surat_lamaran`) VALUES
('1120a4bc-b943-4a69-be77-b919d3d3a2d0', 'apel.jpg', 'aa', 'aa', 'Charlie Y Aguilar', '2019-12-30', 'paccinongan', '', 0, 's1 TELKOM', 'a', 'a', 'Rekrutment.pdf', '1_en_id.pdf'),
('49815c59-146b-411e-ad88-b6e300ca065f', 'apel3.jpg', 'admin', 'admin', 'admin', '2019-12-31', 'paccinongan', '', 0, '12121', 'A', 'A', '1_en_id.pdf', '1_en_id.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_test`
--

CREATE TABLE `tb_test` (
  `id_test` varchar(50) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `test` varchar(100) NOT NULL,
  `pilihan_a` varchar(100) NOT NULL,
  `pilihan_b` varchar(100) NOT NULL,
  `pilihan_c` varchar(100) NOT NULL,
  `pilihan_d` varchar(100) NOT NULL,
  `kjawaban` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testdasar`
--

CREATE TABLE `tb_testdasar` (
  `id_test` int(50) NOT NULL,
  `test` varchar(100) NOT NULL,
  `pilihan_a` varchar(100) NOT NULL,
  `pilihan_b` varchar(100) NOT NULL,
  `pilihan_c` varchar(100) NOT NULL,
  `pilihan_d` varchar(100) NOT NULL,
  `kjawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `tb_test`
--
ALTER TABLE `tb_test`
  ADD PRIMARY KEY (`id_test`);

--
-- Indeks untuk tabel `tb_testdasar`
--
ALTER TABLE `tb_testdasar`
  ADD PRIMARY KEY (`id_test`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_testdasar`
--
ALTER TABLE `tb_testdasar`
  MODIFY `id_test` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
