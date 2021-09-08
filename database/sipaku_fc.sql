-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2021 pada 16.26
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipaku_fc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_kasus`
--

CREATE TABLE `basis_kasus` (
  `id_bk` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_diagnosa`
--

CREATE TABLE `detail_diagnosa` (
  `id_detail` int(11) NOT NULL,
  `id_diagnosa` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_diagnosa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_gejala`
--

CREATE TABLE `mst_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(225) NOT NULL,
  `ket_gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_penyakit`
--

CREATE TABLE `mst_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `ket_penyakit` text NOT NULL,
  `saran_pengobatan` text NOT NULL,
  `url_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_perawatan`
--

CREATE TABLE `mst_perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `metode_perawatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `basis_kasus`
--
ALTER TABLE `basis_kasus`
  ADD PRIMARY KEY (`id_bk`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_diagnosa` (`id_diagnosa`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `mst_gejala`
--
ALTER TABLE `mst_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `mst_penyakit`
--
ALTER TABLE `mst_penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `mst_perawatan`
--
ALTER TABLE `mst_perawatan`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_akses` (`id_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basis_kasus`
--
ALTER TABLE `basis_kasus`
  MODIFY `id_bk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_gejala`
--
ALTER TABLE `mst_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_penyakit`
--
ALTER TABLE `mst_penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_perawatan`
--
ALTER TABLE `mst_perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `basis_kasus`
--
ALTER TABLE `basis_kasus`
  ADD CONSTRAINT `basis_kasus_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `mst_penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basis_kasus_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `mst_gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD CONSTRAINT `detail_diagnosa_ibfk_1` FOREIGN KEY (`id_diagnosa`) REFERENCES `diagnosa` (`id_diagnosa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_diagnosa_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `mst_gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD CONSTRAINT `diagnosa_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `mst_penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnosa_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mst_perawatan`
--
ALTER TABLE `mst_perawatan`
  ADD CONSTRAINT `mst_perawatan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `mst_penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
