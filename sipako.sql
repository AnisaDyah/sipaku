-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 01:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipako`
--

CREATE Database u6029100_sipako;

-- --------------------------------------------------------

--
-- Table structure for table `basiskasus`
--

CREATE TABLE `basiskasus` (
  `id_basiskasus` int(5) NOT NULL,
  `kd_kasus` varchar(255) NOT NULL,
  `fk_hamapenyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basiskasus`
--

INSERT INTO `basiskasus` (`id_basiskasus`, `kd_kasus`, `fk_hamapenyakit`) VALUES
(1, 'K01', 1),
(2, 'K02', 1),
(3, 'K03', 1),
(4, 'K04', 1),
(5, 'K05', 2),
(6, 'K06', 2),
(7, 'K07', 2),
(8, 'K08', 2),
(9, 'K09', 3),
(10, 'K10', 3),
(11, 'K11', 3),
(12, 'K12', 3),
(13, 'K13', 3),
(14, 'K14', 3),
(15, 'K15', 3),
(16, 'K16', 4),
(17, 'K17', 4),
(18, 'K18', 4),
(19, 'K19', 4),
(20, 'K20', 5),
(21, 'K21', 5),
(22, 'K22', 5),
(23, 'K23', 6),
(24, 'K24', 6),
(25, 'K25', 7),
(26, 'K26', 8),
(27, 'K27', 8),
(28, 'K28', 8),
(29, 'K29', 9),
(30, 'K30', 9),
(31, 'K31', 10),
(32, 'K32', 11),
(33, 'K33', 11),
(37, 'KD001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `bobot`) VALUES
(1, 1),
(2, 3),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kasus`
--

CREATE TABLE `detail_kasus` (
  `id_detailkasus` int(11) NOT NULL,
  `fk_kasus` int(11) NOT NULL,
  `fk_gejala` int(11) NOT NULL,
  `fk_bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kasus`
--

INSERT INTO `detail_kasus` (`id_detailkasus`, `fk_kasus`, `fk_gejala`, `fk_bobot`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 2, 1),
(5, 2, 3, 1),
(6, 2, 4, 1),
(7, 3, 4, 1),
(8, 3, 5, 1),
(9, 3, 6, 1),
(10, 3, 7, 1),
(11, 4, 1, 1),
(12, 4, 2, 1),
(13, 4, 3, 1),
(14, 4, 4, 1),
(15, 4, 5, 1),
(16, 4, 6, 1),
(17, 4, 7, 1),
(18, 5, 1, 1),
(19, 5, 2, 1),
(20, 5, 4, 1),
(21, 5, 8, 1),
(22, 6, 4, 1),
(23, 6, 6, 1),
(24, 6, 8, 1),
(25, 6, 9, 1),
(26, 7, 6, 1),
(27, 7, 8, 1),
(28, 7, 9, 1),
(29, 8, 1, 1),
(30, 8, 2, 1),
(31, 8, 4, 1),
(32, 8, 6, 1),
(33, 8, 8, 1),
(34, 8, 9, 1),
(35, 9, 11, 1),
(36, 9, 18, 1),
(37, 10, 6, 1),
(38, 10, 11, 1),
(39, 10, 18, 1),
(40, 11, 10, 1),
(41, 11, 11, 1),
(42, 11, 18, 1),
(43, 12, 6, 1),
(44, 12, 10, 1),
(45, 12, 14, 1),
(46, 13, 10, 1),
(47, 13, 11, 1),
(48, 13, 12, 1),
(49, 13, 36, 1),
(50, 14, 10, 1),
(51, 14, 11, 1),
(52, 14, 13, 1),
(53, 15, 6, 1),
(54, 15, 10, 1),
(55, 15, 11, 1),
(56, 15, 12, 1),
(57, 15, 13, 1),
(58, 15, 14, 1),
(59, 15, 18, 1),
(60, 15, 36, 1),
(61, 16, 15, 1),
(62, 16, 16, 1),
(63, 16, 17, 1),
(64, 17, 6, 1),
(65, 17, 11, 1),
(66, 17, 17, 1),
(67, 18, 6, 1),
(68, 18, 15, 1),
(69, 18, 16, 1),
(70, 18, 17, 1),
(71, 19, 6, 1),
(72, 19, 11, 1),
(73, 19, 15, 1),
(74, 19, 16, 1),
(75, 19, 17, 1),
(76, 20, 6, 1),
(77, 20, 11, 1),
(78, 20, 18, 1),
(79, 20, 19, 1),
(80, 21, 6, 1),
(81, 21, 11, 1),
(82, 21, 18, 1),
(83, 21, 20, 1),
(84, 21, 21, 1),
(85, 22, 6, 1),
(86, 22, 11, 1),
(87, 22, 18, 1),
(88, 22, 22, 1),
(89, 22, 23, 1),
(90, 23, 24, 1),
(91, 23, 25, 1),
(92, 24, 24, 1),
(93, 24, 25, 1),
(94, 24, 26, 1),
(95, 25, 28, 1),
(96, 25, 29, 1),
(97, 25, 36, 1),
(98, 26, 5, 1),
(99, 26, 11, 1),
(100, 26, 30, 1),
(101, 26, 37, 1),
(102, 27, 5, 1),
(103, 27, 10, 1),
(104, 27, 27, 1),
(105, 27, 30, 1),
(106, 27, 37, 1),
(107, 28, 5, 1),
(108, 28, 10, 1),
(109, 28, 11, 1),
(110, 28, 27, 1),
(111, 28, 30, 1),
(112, 28, 37, 1),
(113, 29, 30, 1),
(114, 29, 36, 1),
(115, 29, 38, 1),
(116, 30, 10, 1),
(117, 30, 27, 1),
(118, 30, 30, 1),
(119, 30, 36, 1),
(120, 30, 38, 1),
(121, 31, 31, 1),
(122, 31, 32, 1),
(123, 32, 5, 1),
(124, 32, 6, 1),
(125, 32, 18, 1),
(126, 32, 34, 1),
(127, 33, 5, 1),
(128, 33, 6, 1),
(129, 33, 18, 1),
(130, 33, 33, 1),
(131, 33, 34, 1),
(132, 33, 35, 1),
(138, 37, 1, 1),
(139, 37, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `id_detailkonsul` int(11) NOT NULL,
  `fk_konsul` int(11) NOT NULL,
  `fk_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_konsultasi`
--

INSERT INTO `detail_konsultasi` (`id_detailkonsul`, `fk_konsul`, `fk_gejala`) VALUES
(1, 14, 5),
(2, 14, 6),
(3, 14, 7),
(4, 1, 8),
(5, 15, 5),
(6, 15, 6),
(7, 15, 7),
(8, 15, 8),
(9, 16, 1),
(10, 16, 35),
(11, 16, 36),
(12, 16, 37),
(13, 16, 38),
(14, 17, 1),
(15, 17, 35),
(16, 17, 36),
(17, 17, 37),
(18, 17, 38),
(19, 18, 1),
(20, 18, 30),
(21, 18, 31),
(22, 18, 32),
(23, 18, 35),
(24, 18, 36),
(25, 18, 37),
(26, 18, 38),
(27, 19, 1),
(28, 19, 30),
(29, 19, 31),
(30, 19, 32),
(31, 19, 35),
(32, 19, 36),
(33, 19, 37),
(34, 19, 38),
(35, 20, 3),
(36, 20, 4),
(37, 21, 24),
(38, 22, 2),
(39, 22, 3),
(40, 22, 5),
(41, 22, 7),
(42, 23, 2),
(43, 23, 3),
(44, 23, 5),
(45, 23, 7),
(46, 24, 2),
(47, 24, 3),
(48, 24, 5),
(49, 24, 7),
(50, 25, 2),
(51, 25, 3),
(52, 25, 5),
(53, 25, 7),
(54, 26, 5),
(55, 26, 6),
(56, 26, 18),
(57, 26, 33),
(58, 26, 34),
(59, 26, 35),
(60, 27, 1),
(61, 27, 2),
(62, 40, 1),
(63, 40, 2),
(64, 40, 3),
(65, 41, 1),
(66, 41, 2),
(67, 41, 3),
(68, 42, 1),
(69, 42, 2),
(70, 42, 3),
(71, 43, 1),
(72, 43, 2),
(73, 43, 3),
(74, 44, 1),
(75, 44, 2),
(76, 44, 3),
(77, 45, 1),
(78, 45, 2),
(79, 45, 3),
(80, 46, 1),
(81, 46, 2),
(82, 46, 3),
(83, 47, 1),
(84, 47, 2),
(85, 47, 3),
(86, 49, 1),
(87, 49, 2),
(88, 49, 3),
(89, 50, 1),
(90, 50, 2),
(91, 50, 3),
(92, 51, 1),
(93, 51, 2),
(94, 51, 3),
(95, 52, 1),
(96, 52, 2),
(97, 52, 3),
(98, 53, 1),
(99, 53, 2),
(100, 53, 3),
(101, 54, 1),
(102, 54, 2),
(103, 54, 3),
(104, 55, 1),
(105, 55, 2),
(106, 55, 3),
(107, 55, 4),
(108, 56, 1),
(109, 56, 2),
(110, 56, 3),
(111, 56, 4),
(112, 57, 3),
(113, 57, 4),
(114, 58, 3),
(115, 58, 4),
(116, 59, 3),
(117, 59, 4),
(118, 60, 3),
(119, 60, 4),
(120, 61, 3),
(121, 61, 4),
(122, 62, 3),
(123, 62, 4),
(124, 63, 3),
(125, 63, 4),
(126, 64, 3),
(127, 64, 4),
(128, 65, 3),
(129, 65, 4),
(130, 66, 3),
(131, 66, 4),
(132, 67, 3),
(133, 67, 4),
(134, 68, 3),
(135, 68, 4),
(136, 70, 1),
(137, 70, 2),
(138, 70, 3),
(139, 71, 1),
(140, 71, 2),
(141, 71, 3),
(142, 72, 1),
(143, 72, 2),
(144, 72, 3),
(145, 73, 1),
(146, 73, 2),
(147, 73, 3),
(148, 74, 1),
(149, 74, 2),
(150, 74, 3),
(151, 75, 1),
(152, 75, 2),
(153, 75, 3),
(154, 76, 1),
(155, 76, 2),
(156, 76, 3),
(157, 77, 1),
(158, 77, 2),
(159, 77, 3),
(160, 78, 1),
(161, 78, 2),
(162, 78, 3),
(163, 79, 1),
(164, 79, 2),
(165, 79, 3),
(166, 80, 1),
(167, 80, 2),
(168, 80, 3),
(169, 81, 1),
(170, 81, 2),
(171, 81, 3),
(172, 82, 1),
(173, 82, 2),
(174, 82, 3),
(175, 83, 1),
(176, 83, 2),
(177, 83, 3),
(178, 84, 1),
(179, 84, 2),
(180, 84, 3),
(181, 85, 1),
(182, 85, 2),
(183, 85, 3),
(184, 86, 1),
(185, 86, 2),
(186, 86, 3),
(187, 87, 1),
(188, 87, 2),
(189, 87, 3),
(190, 88, 1),
(191, 88, 2),
(192, 88, 3),
(193, 89, 1),
(194, 89, 2),
(195, 89, 3),
(196, 90, 1),
(197, 90, 2),
(198, 90, 3),
(199, 91, 1),
(200, 91, 2),
(201, 91, 3),
(202, 92, 1),
(203, 92, 2),
(204, 92, 3),
(205, 93, 17),
(206, 93, 18),
(207, 93, 20),
(208, 94, 35),
(209, 94, 36),
(210, 94, 37),
(211, 94, 38),
(212, 95, 17),
(213, 95, 18),
(214, 95, 20),
(215, 96, 1),
(216, 96, 2),
(217, 96, 3),
(218, 96, 4),
(219, 96, 5),
(220, 96, 6),
(221, 96, 7),
(222, 96, 8),
(223, 96, 9),
(224, 96, 10),
(225, 96, 11),
(226, 96, 12),
(227, 96, 13),
(228, 96, 14),
(229, 96, 15),
(230, 96, 16),
(231, 96, 17),
(232, 96, 18),
(233, 96, 19),
(234, 96, 20),
(235, 96, 21),
(236, 96, 22),
(237, 96, 23),
(238, 96, 24),
(239, 96, 25),
(240, 96, 26),
(241, 96, 27),
(242, 96, 28),
(243, 96, 29),
(244, 96, 30),
(245, 96, 31),
(246, 96, 32),
(247, 96, 33),
(248, 96, 34),
(249, 96, 35),
(250, 96, 36),
(251, 96, 37),
(252, 96, 38);

-- --------------------------------------------------------

--
-- Table structure for table `detail_revise`
--

CREATE TABLE `detail_revise` (
  `id_detailrevise` int(11) NOT NULL,
  `fk_revise` int(11) NOT NULL,
  `fk_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_revise`
--

INSERT INTO `detail_revise` (`id_detailrevise`, `fk_revise`, `fk_gejala`) VALUES
(1, 60, 28),
(2, 60, 33),
(3, 61, 28),
(4, 61, 33),
(5, 62, 19),
(6, 62, 20),
(7, 62, 21),
(8, 62, 22),
(9, 64, 38),
(10, 72, 38),
(11, 73, 38),
(12, 74, 38),
(13, 75, 38),
(14, 76, 38),
(15, 77, 38),
(16, 78, 38),
(17, 79, 36),
(18, 80, 38),
(19, 81, 1),
(20, 82, 1),
(21, 83, 1),
(22, 84, 1),
(23, 85, 1),
(24, 86, 1),
(25, 87, 1),
(26, 88, 1),
(27, 89, 1),
(28, 90, 1),
(29, 91, 1),
(30, 92, 1),
(31, 93, 1),
(32, 94, 1),
(33, 95, 1),
(34, 96, 1),
(35, 97, 1),
(36, 98, 1),
(37, 99, 1),
(38, 100, 1),
(39, 101, 1),
(40, 102, 1),
(41, 103, 38);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(5) NOT NULL,
  `kd_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kd_gejala`, `nama_gejala`) VALUES
(1, 'G001', 'Bercak kuning bagian atas daun'),
(2, 'G002', 'Bercak kuning bagian bawah daun'),
(3, 'G003', 'Bercak kuning seperti serbuk'),
(4, 'G004', 'Bercak kuning menjadi coklat'),
(5, 'G005', 'Daun mengering'),
(6, 'G006', 'Daun rontok'),
(7, 'G007', 'Tanaman gundul'),
(8, 'G008', 'Bercak bulat pada daun'),
(9, 'G009', 'Bercak kuning timbul (tembus pada daun)'),
(10, 'G010', 'Tanaman kerdil'),
(11, 'G011', 'Daun berwarna kuning'),
(12, 'G012', 'Pertumbuhan bunga sedikit'),
(13, 'G013', 'Akar serabut mudah terkelupas ketika dicabut'),
(14, 'G014', 'Cabang tidak tumbuh'),
(15, 'G015', 'Benang putih pada batang / ranting'),
(16, 'G016', 'Kumpulan jamur berwarna putih pada batang / ranting'),
(17, 'G017', 'Cabang atau ranting layu mendadak'),
(18, 'G018', 'Daun layu'),
(19, 'G019', 'Jamur berwarna putih berada di permukaan akar'),
(20, 'G020', 'Jamur berwarna coklat pada pangkal batang'),
(21, 'G021', 'Akar tertutup kerak berupa butiran tanah'),
(22, 'G022', 'Jamur berwarna hitam pada pangkal batang'),
(23, 'G023', 'Jamur berwarna hitam pada akar'),
(24, 'G024', 'Bekas luka memar pada pangkal batang'),
(25, 'G025', 'Pangkal batang busuk'),
(26, 'G026', 'Pangkal batang mengering berbentuk lekukan'),
(27, 'G027', 'Buah berkerut dan matang sebelum waktu'),
(28, 'G028', 'Buah berlubang bagian diskus'),
(29, 'G029', 'Buah kopi kosong'),
(30, 'G030', 'Pada daun dan buah terdapat cendawan jelaga'),
(31, 'G031', 'Lubang pada cabang'),
(32, 'G032', 'Cabang layu kering'),
(33, 'G033', 'Lubang pada batang'),
(34, 'G034', 'Lubang melingkari batang'),
(35, 'G035', 'Batang putus seperti tergergaji'),
(36, 'G036', 'Buah gugur'),
(37, 'G037', 'Permukaan bawah daun berwarna hitam'),
(38, 'G038', 'Koloni kutu berwarna putih');

-- --------------------------------------------------------

--
-- Table structure for table `hamapenyakit`
--

CREATE TABLE `hamapenyakit` (
  `id_hamapenyakit` int(5) NOT NULL,
  `kd_hamapenyakit` varchar(5) NOT NULL,
  `nama_hamapenyakit` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hamapenyakit`
--

INSERT INTO `hamapenyakit` (`id_hamapenyakit`, `kd_hamapenyakit`, `nama_hamapenyakit`, `gambar`, `keterangan`) VALUES
(1, 'P01', 'Karat Daun', '', ''),
(2, 'P02', 'Bercak Daun', '', ''),
(3, 'P03', 'Nematoda', '', ''),
(4, 'P04', 'Jamur Upas', '', ''),
(5, 'P05', 'Jamur Akar', '', ''),
(6, 'P06', 'Rebah Batang Kopi', '', ''),
(7, 'P07', 'PBKo', '', ''),
(8, 'P08', 'Kutu Hijau', '', ''),
(9, 'P09', 'Kutu Putih', '', ''),
(10, 'P10', 'Penggerek Cabang', '', ''),
(11, 'P11', 'Penggerek Batang', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_hamapenyakit` int(11) NOT NULL,
  `persentase` float NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_hamapenyakit`, `persentase`, `tanggal`) VALUES
(1, 2, 0, '2020-06-28'),
(2, 2, 0, '2020-06-28'),
(3, 2, 0, '2020-06-28'),
(4, 2, 0, '2020-06-28'),
(5, 2, 0, '2020-06-28'),
(6, 2, 67, '2020-06-28'),
(7, 2, 67, '2020-06-28'),
(8, 2, 67, '2020-06-28'),
(9, 2, 67, '2020-06-28'),
(10, 6, 100, '0000-00-00'),
(11, 6, 100, '0000-00-00'),
(12, 6, 100, '0000-00-00'),
(13, 6, 100, '0000-00-00'),
(14, 1, 75, '2020-06-28'),
(15, 1, 75, '2020-06-28'),
(16, 9, 66.67, '2020-06-29'),
(17, 9, 66.67, '2020-06-29'),
(18, 10, 100, '2020-06-29'),
(19, 10, 100, '2020-06-29'),
(20, 1, 66.67, '2020-06-29'),
(21, 6, 50, '2020-06-29'),
(22, 1, 66.67, '2020-06-29'),
(23, 1, 66.67, '2020-06-29'),
(24, 1, 66.67, '2020-07-03'),
(25, 1, 66.67, '2020-07-03'),
(26, 11, 100, '2020-07-03'),
(27, 1, 100, '2020-07-04'),
(40, 1, 100, '2020-07-04'),
(41, 1, 100, '2020-07-04'),
(42, 1, 100, '2020-07-04'),
(43, 1, 100, '2020-07-04'),
(44, 1, 100, '2020-07-04'),
(45, 1, 100, '2020-07-04'),
(46, 1, 100, '2020-07-04'),
(47, 1, 100, '2020-07-04'),
(49, 1, 100, '2020-07-04'),
(50, 1, 100, '2020-07-04'),
(51, 1, 100, '2020-07-04'),
(52, 1, 100, '2020-07-04'),
(53, 1, 100, '2020-07-04'),
(54, 1, 100, '2020-07-04'),
(55, 1, 100, '2020-07-04'),
(56, 1, 100, '2020-07-04'),
(57, 1, 66.67, '2020-07-04'),
(58, 1, 66.67, '2020-07-04'),
(59, 1, 66.67, '2020-07-04'),
(60, 1, 66.67, '2020-07-04'),
(61, 1, 66.67, '2020-07-04'),
(62, 1, 66.67, '2020-07-04'),
(63, 1, 66.67, '2020-07-04'),
(64, 1, 66.67, '2020-07-04'),
(65, 1, 66.67, '2020-07-04'),
(66, 1, 66.67, '2020-07-04'),
(67, 1, 66.67, '2020-07-04'),
(68, 1, 66.67, '2020-07-04'),
(70, 1, 100, '2020-07-04'),
(71, 1, 100, '2020-07-04'),
(72, 1, 100, '2020-07-05'),
(73, 1, 100, '2020-07-06'),
(74, 1, 100, '2020-07-06'),
(75, 1, 100, '2020-07-06'),
(76, 1, 100, '2020-07-06'),
(77, 1, 100, '2020-07-06'),
(78, 1, 100, '2020-07-06'),
(79, 1, 100, '2020-07-06'),
(80, 1, 100, '2020-07-06'),
(81, 1, 100, '2020-07-06'),
(82, 1, 100, '2020-07-06'),
(83, 1, 100, '2020-07-06'),
(84, 1, 100, '2020-07-06'),
(85, 1, 100, '2020-07-06'),
(86, 1, 100, '2020-07-06'),
(87, 1, 100, '2020-07-06'),
(88, 1, 100, '2020-07-06'),
(89, 1, 100, '2020-07-07'),
(90, 1, 100, '2020-07-07'),
(91, 1, 100, '2020-07-07'),
(92, 1, 100, '2020-07-07'),
(93, 3, 50, '2020-07-07'),
(94, 9, 66.67, '2020-07-07'),
(95, 3, 50, '2020-07-07'),
(96, 1, 100, '2020-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `revise`
--

CREATE TABLE `revise` (
  `id_re` int(11) NOT NULL,
  `fk_hamapenyakit` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `persentase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revise`
--

INSERT INTO `revise` (`id_re`, `fk_hamapenyakit`, `tanggal`, `persentase`) VALUES
(55, 7, '2020-06-28', 0),
(56, 7, '2020-06-28', 0),
(57, 5, '2020-06-28', 0),
(58, 5, '2020-06-28', 0),
(59, 5, '2020-06-28', 0),
(60, 7, '2020-06-28', 33.33),
(61, 7, '2020-06-28', 33.33),
(62, 5, '2020-06-28', 40),
(64, 9, '2020-06-28', 33.33),
(72, 9, '2020-06-28', 33.33),
(73, 9, '2020-06-28', 33.33),
(74, 9, '2020-06-28', 33.33),
(75, 9, '2020-06-28', 33.33),
(76, 9, '2020-06-28', 33.33),
(77, 9, '2020-06-28', 33.33),
(78, 9, '2020-06-28', 33.33),
(79, 9, '2020-06-29', 33.33),
(80, 9, '2020-06-29', 33.33),
(81, 1, '2020-06-29', 33.33),
(82, 1, '2020-06-29', 33.33),
(83, 1, '2020-06-29', 33.33),
(84, 1, '2020-06-29', 33.33),
(85, 1, '2020-06-29', 33.33),
(86, 1, '2020-06-29', 33.33),
(87, 1, '2020-06-29', 33.33),
(88, 1, '2020-06-29', 33.33),
(89, 1, '2020-06-29', 33.33),
(90, 1, '2020-06-29', 33.33),
(91, 1, '2020-06-29', 33.33),
(92, 1, '2020-06-29', 33.33),
(93, 1, '2020-06-29', 33.33),
(94, 1, '2020-06-29', 33.33),
(95, 1, '2020-06-29', 33.33),
(96, 1, '2020-06-29', 33.33),
(97, 1, '2020-06-29', 33.33),
(98, 1, '2020-06-29', 33.33),
(99, 1, '2020-06-29', 33.33),
(100, 1, '2020-06-29', 33.33),
(101, 1, '2020-06-29', 33.33),
(102, 1, '2020-06-29', 33.33),
(103, 9, '2020-07-02', 33.33);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` int(11) NOT NULL,
  `kd_solusi` varchar(5) NOT NULL,
  `fk_hamapenyakit` int(5) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `kd_solusi`, `fk_hamapenyakit`, `solusi`) VALUES
(1, 'S001', 1, 'Lakukan penyiangan, pemupukan, pemangkasan, dan pengelolaan naungan. Pengendalian dengan kultur teknis jika dilakukan dengan benar dapat menurunkan intensitas serangan karat daun                                        '),
(2, 'S002', 2, 'Lakukan sanitasi dengan menggunting daun yang sakit kemudian dibakar atau dibenamkam di dalam tanah. Penyakit pada buah dapat dikurangi dengan mengatur peneduh                                        '),
(3, 'S003', 3, '<P>1.	Membersihkan kebun dan gulma khususnya gulma yang merupakan inang alternatif nematoda.</P>\r\n<P>2.	Membongkar pohon kopi yang terserang berat dan dibakar, lubang bekas galian di taburi belerang Cirrus.</P>\r\n<P>3.	Membuat pant isolasi di sekeliling tanaman terserang berat.\r\n<P/>                                        '),
(4, 'S004', 4, 'kelembapan dikurangi dengan memangkas tanaman kopi dan pengaturan pohon penaung dan pada batang atau cabang yang besar yang terserang jamur upas dilumas dengan fungisida                                        '),
(5, 'S005', 5, '<P>1.	Sanitasi dengan membongkar tanaman yang sakit bersama akar-akarnya sampai bersih, kemudian dibakar.</P>\r\n<P>2.	Fungisida dioleskan pada pangkal batang/akar tanaman sakit atau sebagai tindakan preventif dapat menggunakan agens hayati Trichoderma sp.</P>\r\n<P>3.	Membuat parit isolasi sedalam 60–90 cm, untuk mencegah penyebaran pada tanaman disekitarnya.</P>\r\n<P>4.	Pengendalian juga dapat menggunakan belerang atau kapur 300 g/ pohon.\r\n</P>                                        '),
(6, 'S006', 6, 'mengurangi kelembapan di pembibitan melalui penebaran benih yang tidak terlalu rapat, diusahakan mendapatkan cahaya matahari secepat mungkin, dan diatur frekuensi penyiraman dan tanaman yang terinfeksi segera dikeluarkan dari kebun dan dibakar                                        '),
(7, 'S007', 7, 'Lakukan pemupukan dilakukan secara berkala sesuai dosis anjuran, untuk memicu waktu pembungaan yang relatif seragam sehingga dapat memutus siklus hidup PBKo                                        '),
(8, 'S008', 8, 'Pengendalian secara kultur teknis ditekankan pada pemangkasan dan pengaturan tanaman penaung agar tidak terlalu rimbun                                        '),
(9, 'S009', 9, '<P>1.	Kultur teknis : Pengaturan naungan yang optimal. Naungan yang dianjurkan adalah Iamtoro L2 dengan kerapatan 400-600 pohon per ha. Dengan naungan yang cukup maka kelembaban kebun akan cukup tinggi sehingga sangat mendukung perkembangan cendawan musuh alami kutu putih.\r\n</P>\r\n<P>2.	Biologis : kumbang biru, Curinus coeruleus sebagai predator kutu putih dan kutu loncat.\r\n</P>                                        '),
(10, 'S010', 10, 'Pemotongan dan pemusnahan bagian tanaman telah terserang, kemudian dibakar agar telur, larva dan imago yang masih ada di dalamnya mati.                                        '),
(11, 'S011', 11, 'Pada bagian tanaman yang telah terserang, dipotong dan dimusnahkan, kemudian dibakar agar telur, larva, dan imago yang masih ada di dalamnya mati.                                                                                ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'ekaputril', 'ssss'),
(4, 'admin1', 'admin1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basiskasus`
--
ALTER TABLE `basiskasus`
  ADD PRIMARY KEY (`id_basiskasus`),
  ADD KEY `fk_kasus_hama` (`fk_hamapenyakit`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `detail_kasus`
--
ALTER TABLE `detail_kasus`
  ADD PRIMARY KEY (`id_detailkasus`),
  ADD KEY `fk_detail_kasus` (`fk_kasus`),
  ADD KEY `fk_detail_gejala` (`fk_gejala`),
  ADD KEY `fk_detail_bobot` (`fk_bobot`);

--
-- Indexes for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD PRIMARY KEY (`id_detailkonsul`),
  ADD KEY `fk_konsul` (`fk_konsul`),
  ADD KEY `fk_gejala` (`fk_gejala`);

--
-- Indexes for table `detail_revise`
--
ALTER TABLE `detail_revise`
  ADD PRIMARY KEY (`id_detailrevise`),
  ADD KEY `fk_detail_revise` (`fk_revise`),
  ADD KEY `fk_gejala` (`fk_gejala`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`),
  ADD UNIQUE KEY `kd_gejala` (`kd_gejala`),
  ADD KEY `kd_gejala_2` (`kd_gejala`);

--
-- Indexes for table `hamapenyakit`
--
ALTER TABLE `hamapenyakit`
  ADD PRIMARY KEY (`id_hamapenyakit`),
  ADD UNIQUE KEY `kd_hamapenyakit` (`kd_hamapenyakit`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `id_hamapenyakit` (`id_hamapenyakit`);

--
-- Indexes for table `revise`
--
ALTER TABLE `revise`
  ADD PRIMARY KEY (`id_re`),
  ADD KEY `id_hamapenyakit` (`fk_hamapenyakit`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`),
  ADD UNIQUE KEY `kd_solusi` (`kd_solusi`),
  ADD KEY `fk_solusi_penyakit` (`fk_hamapenyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basiskasus`
--
ALTER TABLE `basiskasus`
  MODIFY `id_basiskasus` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_kasus`
--
ALTER TABLE `detail_kasus`
  MODIFY `id_detailkasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  MODIFY `id_detailkonsul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `detail_revise`
--
ALTER TABLE `detail_revise`
  MODIFY `id_detailrevise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `hamapenyakit`
--
ALTER TABLE `hamapenyakit`
  MODIFY `id_hamapenyakit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `revise`
--
ALTER TABLE `revise`
  MODIFY `id_re` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `id_solusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basiskasus`
--
ALTER TABLE `basiskasus`
  ADD CONSTRAINT `fk_kasus_hama` FOREIGN KEY (`fk_hamapenyakit`) REFERENCES `hamapenyakit` (`id_hamapenyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_kasus`
--
ALTER TABLE `detail_kasus`
  ADD CONSTRAINT `fk_detail_bobot` FOREIGN KEY (`fk_bobot`) REFERENCES `bobot` (`id_bobot`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_gejala` FOREIGN KEY (`fk_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_kasus` FOREIGN KEY (`fk_kasus`) REFERENCES `basiskasus` (`id_basiskasus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD CONSTRAINT `fk_detail_konsul` FOREIGN KEY (`fk_konsul`) REFERENCES `konsultasi` (`id_konsultasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_revise`
--
ALTER TABLE `detail_revise`
  ADD CONSTRAINT `fk_detail_revise` FOREIGN KEY (`fk_revise`) REFERENCES `revise` (`id_re`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id_hamapenyakit`) REFERENCES `hamapenyakit` (`id_hamapenyakit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revise`
--
ALTER TABLE `revise`
  ADD CONSTRAINT `revise_ibfk_1` FOREIGN KEY (`fk_hamapenyakit`) REFERENCES `hamapenyakit` (`id_hamapenyakit`);

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `fk_solusi_penyakit` FOREIGN KEY (`fk_hamapenyakit`) REFERENCES `hamapenyakit` (`id_hamapenyakit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
