-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 06:53 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewabaju_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_accessories`
--

CREATE TABLE `m_accessories` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rent_price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `partner` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_accessories`
--

INSERT INTO `m_accessories` (`id`, `code`, `name`, `rent_price`, `sale_price`, `partner`, `status`) VALUES
(1, 'AS00001', 'Kalung Mutiara', 1000000, NULL, 0, 0),
(2, 'AS00002', 'Pin Perak', 500000, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_appointment`
--

CREATE TABLE `m_appointment` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `cancel` text,
  `returned` date DEFAULT NULL,
  `pickuped` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_appointment`
--

INSERT INTO `m_appointment` (`id`, `code`, `date`, `customer_id`, `note`, `status`, `deleted`, `cancel`, `returned`, `pickuped`, `created_at`, `updated_at`) VALUES
(1, 'APP00001', '2016-12-06 09:35:00', 8, 'Deal', 2, 0, NULL, NULL, NULL, '2016-12-05', NULL),
(2, 'APP00002', '2016-12-07 09:25:00', 4, 'Konsultasi', 1, 0, NULL, NULL, NULL, '2016-12-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_baju`
--

CREATE TABLE `m_baju` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `colour` varchar(10) NOT NULL,
  `type` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `hpp_price` int(11) DEFAULT NULL,
  `hpp_first` int(11) NOT NULL,
  `rent_price` int(11) DEFAULT NULL,
  `production_price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `partner` int(11) NOT NULL DEFAULT '0',
  `konsinyasi` int(11) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `note` text,
  `new_item` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_baju`
--

INSERT INTO `m_baju` (`id`, `code`, `name`, `colour`, `type`, `kategori`, `hpp_price`, `hpp_first`, `rent_price`, `production_price`, `sale_price`, `qty`, `partner`, `konsinyasi`, `image`, `note`, `new_item`, `status`) VALUES
(1, 'BA00001', 'ANGELINA ', 'BLACK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(2, 'BA00002', 'CARA', 'BLACK', 1, 1, 10000000, 10000000, 2500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(3, 'BA00003', 'CELINE', 'BLACK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(4, 'BA00004', 'KEYLA', 'BLACK', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(5, 'BA00005', 'ANGELINA', 'BLUE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(6, 'BA00006', 'ARIEL', 'BLUE', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(7, 'BA00007', 'BERNETTA', 'BLUE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(8, 'BA00008', 'BETH', 'BLUE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(9, 'BA00009', 'COLLIN', 'BLUE', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(10, 'BA00010', 'ESME', 'BLUE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(11, 'BA00011', 'GWYNETH', 'BLUE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(12, 'BA00012', 'KARLA', 'BLUE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(13, 'BA00013', 'KEYLA', 'BLUE', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', 'ELECTRIC', 0, 0),
(14, 'BA00014', 'KEYLA', 'BLUE', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', 'DUSTY', 0, 0),
(15, 'BA00015', 'RAISA', 'BLUE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(16, 'BA00016', 'TRACEY', 'BLUE', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(17, 'BA00017', 'WINNY', 'BLUE', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(18, 'BA00018', 'ADRIANA', 'CHAMPAGNE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(19, 'BA00019', 'JOAN', 'CHAMPAGNE', 1, 1, 10000000, 10000000, 4000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(20, 'BA00020', 'KIKI', 'CHAMPAGNE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(21, 'BA00021', 'SERENA', 'CHAMPAGNE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(22, 'BA00022', 'ANGELINA', 'CREAM', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(23, 'BA00023', 'CARA', 'CREAM', 1, 1, 10000000, 10000000, 2500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(24, 'BA00024', 'CARA', 'CREAM', 1, 1, 10000000, 10000000, 2500000, NULL, 5000000, 1, 0, 0, 'default.jpg', 'LIGHT', 0, 0),
(25, 'BA00025', 'CHIARA', 'CREAM', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(26, 'BA00026', 'KATE', 'CREAM', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(27, 'BA00027', 'LUCY', 'CREAM', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(28, 'BA00028', 'MIRANDA', 'CREAM', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(29, 'BA00029', 'CELESTE', 'GOLD', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(30, 'BA00030', 'HEATHER', 'GOLD', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(31, 'BA00031', 'INGGRID', 'GOLD', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(32, 'BA00032', 'IRIS', 'GOLD', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(33, 'BA00033', 'KYRA', 'GOLD', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(34, 'BA00034', 'MARTHA', 'GOLD', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(35, 'BA00035', 'MELAINE', 'GOLD', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(36, 'BA00036', 'RACHEL', 'GOLD', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(37, 'BA00037', 'SASA', 'GOLD', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(38, 'BA00038', 'VIVIAN', 'GOLD', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(39, 'BA00039', 'KEYLA', 'GREEN', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', 'EMERALD', 0, 0),
(40, 'BA00040', 'KEYLA', 'GREEN', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', 'LIME', 0, 0),
(41, 'BA00041', 'LUCY', 'GREEN', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(42, 'BA00042', 'ODETTE', 'GREEN', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(43, 'BA00043', 'AGATHA', 'GREY', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(44, 'BA00044', 'AVENTIE', 'GREY', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(45, 'BA00045', 'CARA', 'GREY', 1, 1, 10000000, 10000000, 2500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(46, 'BA00046', 'CARTIER', 'GREY', 1, 1, 10000000, 10000000, 4000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(47, 'BA00047', 'FLEUR', 'GREY', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(48, 'BA00048', 'FRANCETTE', 'GREY', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(49, 'BA00049', 'GEORGINA', 'GREY', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(50, 'BA00050', 'JOAQUIN', 'GREY', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(51, 'BA00051', 'MANDY', 'GREY', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(52, 'BA00052', 'RENNE', 'GREY', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(53, 'BA00053', 'ANGELINA', 'PINK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(54, 'BA00054', 'ARIA', 'PINK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(55, 'BA00055', 'CALISTA', 'PINK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(56, 'BA00056', 'CARA', 'PINK', 1, 1, 10000000, 10000000, 2500000, NULL, 5000000, 1, 0, 0, 'default.jpg', 'FUCHIA', 0, 0),
(57, 'BA00057', 'CARA', 'PINK', 1, 1, 10000000, 10000000, 2500000, NULL, 5000000, 1, 0, 0, 'default.jpg', 'SALMON', 0, 0),
(58, 'BA00058', 'CARA', 'PINK', 1, 1, 10000000, 10000000, 2500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(59, 'BA00059', 'CASSIA', 'PINK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(60, 'BA00060', 'CLARA', 'PINK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(61, 'BA00061', 'EMMA', 'PINK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(62, 'BA00062', 'GEORGINA', 'PINK', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(63, 'BA00063', 'JULIE', 'PINK', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(64, 'BA00064', 'LADY', 'PINK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(65, 'BA00065', 'MAUREEN', 'PINK', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(66, 'BA00066', 'NANCY', 'PINK', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(67, 'BA00067', 'NARA', 'PINK', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(68, 'BA00068', 'ROYALE', 'PINK', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(69, 'BA00069', 'SCARLETTE', 'PINK', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(70, 'BA00070', 'LAVEN ', 'PURPLE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(71, 'BA00071', 'LILAC', 'PURPLE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(72, 'BA00072', 'MIRANDA', 'PURPLE', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(73, 'BA00073', 'ADINA', 'RED', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(74, 'BA00074', 'BETH', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(75, 'BA00075', 'CARA', 'RED', 1, 1, 10000000, 10000000, 2500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(76, 'BA00076', 'CATHERINE', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', 'VALENTINO RED', 0, 0),
(77, 'BA00077', 'CATHERINE', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(78, 'BA00078', 'CELINE', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(79, 'BA00079', 'CINDY', 'RED', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(80, 'BA00080', 'EMMA', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(81, 'BA00081', 'FEBRINA', 'RED', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(82, 'BA00082', 'GWYNETH', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(83, 'BA00083', 'KEYLA', 'RED', 1, 1, 10000000, 10000000, 3500000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(84, 'BA00084', 'LIZZIE', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(85, 'BA00085', 'LUCY', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(86, 'BA00086', 'MARIA', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(87, 'BA00087', 'MARRIOT', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(88, 'BA00088', 'MEGAN', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(89, 'BA00089', 'NIA', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(90, 'BA00090', 'VERA', 'RED', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0),
(91, 'BA00091', 'ISABELLE', 'YELLOW', 1, 1, 10000000, 10000000, 3000000, NULL, 5000000, 1, 0, 0, 'default.jpg', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_company`
--

CREATE TABLE `m_company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `term_condition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_company`
--

INSERT INTO `m_company` (`id`, `name`, `phone`, `address`, `email`, `logo`, `term_condition`) VALUES
(1, 'Sewa Baju', '085895986529', 'Jl Nginden Jaya 1 No 20 Sukolilo Surabaya', 'mokhamad27@gmail.com', 'logo.png', '<ol><li>Untuk booking MINIMUM <b>DP 50%</b>. Tanpa uang muka barang tidak bisa disimpan.</li><li><b>Penggantian tipe baju</b> yang sudah dibook dikenakan denda <b>Rp. 500.000,-/baju</b>.</li><li><b>Pembatalan booking baju</b> dikenakan denda <b>Rp. 1.000.000,-/baju</b>.</li><li><b>Keterlambatan pengambilan baju</b> dikenakan denda <b>Rp. 100.000,-/hari</b>.</li><li>Kerusakan / Kehilangan baju yang disewakan dikenakan biaya perbaikan / penggantian sesuai dengan keputusan pihak SOIREEGOWN.</li><li>Pembayaran dapat ditransfer ke rekening <b>BCA 3883378888 a/n Devina Kamandhanu</b>. Setelah melakukan pembayaran mohon memberikan konfirmasi. Apabila pembayaran tidak dilakukan dalam waktu <b>24 jam</b> maka dianggap batal.</li><li>Pembayaran yang telah dilakukan tidak dapat dibatalkan dan <b>uang tidak dapat dikembalikan</b>.</li><li>Barang tidak dapat diambil atau dikirim sebelum melakukan pelunasan pembayaran.</li><li>Modal gown untuk <b>customade</b> yang telah disetujui tidak dapat berubah. Jika terdapat perubahan maka akan dikenakan pergantian biaya sesuai yang ditentukan oleh pihak SOIREEGOWN.</li></ol>');

-- --------------------------------------------------------

--
-- Table structure for table `m_customer`
--

CREATE TABLE `m_customer` (
  `id` int(11) NOT NULL,
  `card` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `revised` int(11) DEFAULT '0',
  `ip_address` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_customer`
--

INSERT INTO `m_customer` (`id`, `card`, `name`, `born_date`, `phone`, `address`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `revised`, `ip_address`) VALUES
(1, 'CUS00001', 'Mokhamad Ariadi', '1993-01-27', '81217807622', 'Mojoagung Jombang', 0, NULL, NULL, NULL, NULL, 0, NULL),
(2, 'CUS00002', 'Juniar Sandra', '1993-01-01', '81217807623', 'Surabaya', 0, NULL, NULL, NULL, NULL, 0, NULL),
(3, 'CUS00003', 'Amirul Arbi', '1993-01-02', '81217807624', 'Tulungagung', 0, NULL, NULL, NULL, NULL, 0, NULL),
(4, 'CUS00004', 'Satria Hernanda', '1993-01-03', '81217807625', 'Surabaya', 0, NULL, NULL, NULL, NULL, 0, NULL),
(5, 'CUS00005', 'Punggawa Cipto', '1993-01-04', '81217807626', 'Sidoarjo', 0, NULL, NULL, NULL, NULL, 0, NULL),
(6, 'CUS00006', 'Saiful Rizal', '1993-01-05', '81217807627', 'Bojonegoro', 0, NULL, NULL, NULL, NULL, 0, NULL),
(7, 'CUS00007', 'Muslim Ahmad', '1993-01-06', '81217807628', 'Krian', 0, NULL, NULL, NULL, NULL, 0, NULL),
(8, 'CUS00008', 'Noviagati Pramudia', '1992-11-06', '085895986529', 'Pacitan', 0, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_deal`
--

CREATE TABLE `m_deal` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_borrow` date DEFAULT NULL,
  `date_back` date DEFAULT NULL,
  `date_fitting` date DEFAULT NULL,
  `down_payment` int(11) NOT NULL,
  `date_dp` date DEFAULT NULL,
  `pay_dp` tinyint(1) DEFAULT NULL,
  `remaining_payment` int(11) DEFAULT NULL,
  `date_rp` date DEFAULT NULL,
  `pay_rp` tinyint(1) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `shipping` tinyint(1) DEFAULT NULL,
  `shipping_cost` int(11) DEFAULT NULL,
  `shipping_address` text,
  `note` text,
  `process` tinyint(1) DEFAULT NULL,
  `fitting` tinyint(1) DEFAULT '0',
  `return_note` text NOT NULL,
  `deposit_final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_deal`
--

INSERT INTO `m_deal` (`id`, `appointment_id`, `customer_id`, `date_borrow`, `date_back`, `date_fitting`, `down_payment`, `date_dp`, `pay_dp`, `remaining_payment`, `date_rp`, `pay_rp`, `total`, `deposit`, `shipping`, `shipping_cost`, `shipping_address`, `note`, `process`, `fitting`, `return_note`, `deposit_final`) VALUES
(1, 1, 8, '2016-12-15', '2016-12-22', '2016-12-07', 1499999, '2016-12-05', 1, 7500001, '2016-12-05', 1, 9000000, 1000000, 1, NULL, NULL, 'Deal', 1, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_group`
--

CREATE TABLE `m_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_group`
--

INSERT INTO `m_group` (`id`, `name`) VALUES
(1, 'Owner'),
(2, 'Admin'),
(3, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`id`, `name`, `status`) VALUES
(1, 'SOIREEGOWN', 0),
(2, 'SOIREEWHITE', 0),
(3, 'SOIREEBRIDE', 0),
(4, 'HAIRPIECE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_partner`
--

CREATE TABLE `m_partner` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(60) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(60) DEFAULT NULL,
  `revised` int(11) DEFAULT NULL,
  `ip_address` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_partner`
--

INSERT INTO `m_partner` (`id`, `code`, `name`, `born_date`, `phone`, `address`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `revised`, `ip_address`) VALUES
(1, 'PA00001', 'Silvia Kurnia TM', '1992-03-12', '85895986529', 'Surabaya', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PA00002', 'Auliani TM', '1992-03-13', '85895986530', 'Malang', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PA00003', 'Pramudia TM', '1992-03-14', '85895986531', 'Bojonegoro', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'PA00004', 'Indri Mekar Sari TM', '1992-03-15', '85895986532', 'Banten', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'PA00005', 'Putri Ayu Lia TM', '1992-03-16', '85895986533', 'Sidoarjo', 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_promo`
--

CREATE TABLE `m_promo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `disc` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `note` text,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_promo`
--

INSERT INTO `m_promo` (`id`, `name`, `disc`, `qty`, `kategori`, `note`, `status`) VALUES
(1, 'Promo Soireegown', 8100000, 3, 1, 'Promo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_role`
--

CREATE TABLE `m_role` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `modul` int(11) NOT NULL,
  `c` tinyint(1) NOT NULL DEFAULT '0',
  `r` tinyint(1) NOT NULL DEFAULT '0',
  `u` tinyint(1) NOT NULL DEFAULT '0',
  `d` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_role`
--

INSERT INTO `m_role` (`id`, `group_id`, `modul`, `c`, `r`, `u`, `d`) VALUES
(1, 3, 1, 0, 0, 0, 0),
(2, 3, 2, 0, 0, 0, 0),
(3, 3, 3, 0, 0, 0, 0),
(4, 3, 4, 0, 0, 0, 0),
(5, 3, 5, 0, 0, 0, 0),
(6, 3, 6, 0, 0, 0, 0),
(7, 3, 7, 0, 0, 0, 0),
(8, 3, 8, 0, 0, 0, 0),
(9, 3, 9, 0, 0, 0, 0),
(10, 3, 10, 0, 0, 0, 0),
(11, 3, 13, 1, 1, 1, 1),
(12, 3, 14, 1, 1, 1, 1),
(13, 3, 11, 0, 0, 0, 0),
(14, 3, 12, 0, 0, 0, 0),
(15, 1, 1, 1, 1, 1, 1),
(16, 1, 2, 1, 1, 1, 1),
(17, 1, 3, 1, 1, 1, 1),
(18, 1, 4, 1, 1, 1, 1),
(19, 1, 5, 1, 1, 1, 1),
(20, 1, 6, 1, 1, 1, 1),
(21, 1, 7, 1, 1, 1, 1),
(22, 1, 8, 1, 1, 1, 1),
(23, 1, 9, 1, 1, 1, 1),
(24, 1, 10, 1, 1, 1, 1),
(25, 1, 13, 1, 1, 1, 1),
(26, 1, 14, 1, 1, 1, 1),
(27, 1, 11, 1, 1, 1, 1),
(28, 1, 12, 1, 1, 1, 1),
(29, 2, 1, 0, 0, 0, 0),
(30, 2, 2, 0, 0, 0, 0),
(31, 2, 3, 0, 0, 0, 0),
(32, 2, 4, 1, 1, 1, 1),
(33, 2, 5, 1, 1, 1, 1),
(34, 2, 6, 1, 1, 1, 1),
(35, 2, 7, 1, 1, 1, 1),
(36, 2, 8, 1, 1, 1, 1),
(37, 2, 9, 1, 1, 1, 1),
(38, 2, 10, 1, 1, 1, 1),
(39, 2, 13, 1, 1, 1, 1),
(40, 2, 14, 1, 1, 1, 1),
(41, 2, 11, 0, 0, 0, 0),
(42, 2, 12, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_type`
--

CREATE TABLE `m_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_type`
--

INSERT INTO `m_type` (`id`, `name`, `status`) VALUES
(1, 'BALLGOWN', 0),
(2, 'MERMAID', 0),
(3, 'LONGDRESS', 0),
(4, 'MINIDRESS', 0),
(5, 'A LINE', 0),
(6, 'MERMIAD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `group_id` int(11) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id`, `name`, `username`, `password`, `active`, `group_id`, `log_time`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2016-12-06 09:14:30'),
(2, 'Mokhamad Ariadi', 'addeye', '9ac9eea9811866dd5c520099a889c091', 1, 2, '2016-12-06 09:09:48'),
(3, 'Sales', 'sales', '9ed083b1436e5f40ef984b28255eef18', 1, 3, '2016-12-06 12:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `tr_accessories`
--

CREATE TABLE `tr_accessories` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `accessories_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_item`
--

CREATE TABLE `tr_item` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `deal_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `baju_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `returned` tinyint(1) DEFAULT NULL,
  `promo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_item`
--

INSERT INTO `tr_item` (`id`, `appointment_id`, `deal_id`, `customer_id`, `baju_id`, `qty`, `price`, `total`, `returned`, `promo`) VALUES
(1, 1, NULL, 8, 91, 1, 3000000, 3000000, NULL, 0),
(2, 1, NULL, 8, 90, 1, 3000000, 3000000, NULL, 0),
(3, 1, NULL, 8, 89, 1, 3000000, 3000000, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_jobs`
--

CREATE TABLE `tr_jobs` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `job` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_made`
--

CREATE TABLE `tr_made` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `disc` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_accessories`
--
ALTER TABLE `m_accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_appointment`
--
ALTER TABLE `m_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_baju`
--
ALTER TABLE `m_baju`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_company`
--
ALTER TABLE `m_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_customer`
--
ALTER TABLE `m_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_deal`
--
ALTER TABLE `m_deal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_group`
--
ALTER TABLE `m_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_partner`
--
ALTER TABLE `m_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_promo`
--
ALTER TABLE `m_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_role`
--
ALTER TABLE `m_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_type`
--
ALTER TABLE `m_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_accessories`
--
ALTER TABLE `tr_accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_item`
--
ALTER TABLE `tr_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_jobs`
--
ALTER TABLE `tr_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_made`
--
ALTER TABLE `tr_made`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_accessories`
--
ALTER TABLE `m_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_appointment`
--
ALTER TABLE `m_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_baju`
--
ALTER TABLE `m_baju`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `m_company`
--
ALTER TABLE `m_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_customer`
--
ALTER TABLE `m_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `m_deal`
--
ALTER TABLE `m_deal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_group`
--
ALTER TABLE `m_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_partner`
--
ALTER TABLE `m_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_promo`
--
ALTER TABLE `m_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_role`
--
ALTER TABLE `m_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `m_type`
--
ALTER TABLE `m_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tr_accessories`
--
ALTER TABLE `tr_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_item`
--
ALTER TABLE `tr_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tr_jobs`
--
ALTER TABLE `tr_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_made`
--
ALTER TABLE `tr_made`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
