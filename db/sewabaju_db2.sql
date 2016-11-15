-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2016 at 09:21 AM
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
  `rent_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `partner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_accessories`
--

INSERT INTO `m_accessories` (`id`, `code`, `name`, `rent_price`, `sale_price`, `partner`) VALUES
(1, 'AS00001', 'Kalung', 10000, 50000, 8);

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
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_appointment`
--

INSERT INTO `m_appointment` (`id`, `code`, `date`, `customer_id`, `note`, `status`, `deleted`) VALUES
(1, 'APP00001', '2016-11-15 13:30:00', 2, 'Konsultasi', 3, 0),
(2, 'APP00002', '2016-11-18 13:50:00', 3, 'Konsultasi', 2, 0),
(3, 'APP00003', '2016-11-16 10:00:00', 1, 'Konsultasi', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_baju`
--

CREATE TABLE `m_baju` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `colour` varchar(10) NOT NULL,
  `kategori` int(11) NOT NULL,
  `hpp_price` int(11) NOT NULL,
  `rent_price` int(11) NOT NULL,
  `production_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `partner` int(11) NOT NULL DEFAULT '0',
  `image` varchar(100) NOT NULL,
  `note` text,
  `new_item` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_baju`
--

INSERT INTO `m_baju` (`id`, `code`, `name`, `colour`, `kategori`, `hpp_price`, `rent_price`, `production_price`, `sale_price`, `qty`, `partner`, `image`, `note`, `new_item`, `status`) VALUES
(1, 'BA00001', 'AUSTIN', 'RED', 2, 0, 3000000, 0, 0, 0, 0, 'baju-AUSTIN-1479177385.jpg', '', 0, 1),
(2, 'BA00002', 'ADDISON', 'RED', 2, 0, 2500000, 0, 0, 0, 0, 'baju-Kebayak_Wisuda-1478144097.jpg', '', 0, 1),
(3, 'BA00003', 'FLYNN', 'RED', 2, 0, 3000000, 0, 0, 0, 0, 'baju-FLYNN-1479177436.jpg', '', 0, 1),
(4, 'BA00004', 'JUDE', 'RED', 2, 0, 3000000, 0, 0, 0, 0, 'baju-JUDE-1479177462.jpg', '', 0, 1),
(5, 'BA00005', 'ROCCO', 'RED', 2, 0, 3000000, 0, 0, 0, 0, 'baju-ROCCO-1479177492.jpg', '', 0, 1);

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
(1, 'Sewa Baju', '085895986529', 'Jl Nginden Jaya 1 No 20 Sukolilo Surabaya', 'mokhamad27@gmail.com', 'logo.jpg', '<ol><li>Untuk booking MINIMUM <b>DP 50%</b>. Tanpa uang muka barang tidak bisa disimpan.</li><li><b>Penggantian tipe baju</b> yang sudah dibook dikenakan denda <b>Rp. 500.000,-/baju</b>.</li><li><b>Pembatalan booking baju</b> dikenakan denda <b>Rp. 1.000.000,-/baju</b>.</li><li><b>Keterlambatan pengambilan baju</b> dikenakan denda <b>Rp. 100.000,-/hari</b>.</li><li>Kerusakan / Kehilangan baju yang disewakan dikenakan biaya perbaikan / penggantian sesuai dengan keputusan pihak SOIREEGOWN.</li><li>Pembayaran dapat ditransfer ke rekening <b>BCA 3883378888 a/n Devina Kamandhanu</b>. Setelah melakukan pembayaran mohon memberikan konfirmasi. Apabila pembayaran tidak dilakukan dalam waktu <b>24 jam</b> maka dianggap batal.</li><li>Pembayaran yang telah dilakukan tidak dapat dibatalkan dan <b>uang tidak dapat dikembalikan</b>.</li><li>Barang tidak dapat diambil atau dikirim sebelum melakukan pelunasan pembayaran.</li><li>Modal gown untuk <b>customade</b> yang telah disetujui tidak dapat berubah. Jika terdapat perubahan maka akan dikenakan pergantian biaya sesuai yang ditentukan oleh pihak SOIREEGOWN.</li></ol>');

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
  `status` tinyint(1) DEFAULT '1',
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
(1, 'CUS00001', 'Juniar Sandra', '1993-06-10', '085895986529', 'Surabaya', 1, NULL, NULL, NULL, NULL, 0, NULL),
(2, 'CUS00002', 'Wayan', '1993-06-03', '085895986529', 'Surabaya', 1, NULL, NULL, NULL, NULL, 0, NULL),
(3, 'CUS00003', 'Rizky Febrianto', '1992-08-12', '085895986529', 'Surabaya', 1, NULL, NULL, NULL, NULL, 0, NULL);

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
  `fitting` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_deal`
--

INSERT INTO `m_deal` (`id`, `appointment_id`, `customer_id`, `date_borrow`, `date_back`, `date_fitting`, `down_payment`, `date_dp`, `pay_dp`, `remaining_payment`, `date_rp`, `pay_rp`, `total`, `deposit`, `shipping`, `shipping_cost`, `shipping_address`, `note`, `process`, `fitting`) VALUES
(1, 1, 2, '2016-11-18', '2016-11-22', '2016-11-16', 3000000, '2016-11-15', 1, 3000000, '2016-11-15', 1, 6000000, 2000000, 1, NULL, NULL, 'Cocok', 1, 1),
(2, 2, 3, '2016-11-27', '2016-11-30', '2016-11-24', 1500000, '2016-11-15', 1, 4500000, '2016-11-15', 1, 6000000, 1000000, 1, NULL, NULL, 'Deal bagus', 1, NULL),
(3, 3, 1, '2016-11-19', '2016-12-01', '2016-11-17', 1500000, '2016-11-15', 1, 1510000, '2016-11-15', 1, 3010000, 800000, 1, NULL, NULL, 'Deal suka', 1, 1);

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
(1, 'Admin'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kategori`
--

INSERT INTO `m_kategori` (`id`, `name`) VALUES
(1, 'BALLGOWN'),
(2, 'A LINE'),
(3, 'LONGDRESS'),
(4, 'MERMAID'),
(5, 'MINIDRESS');

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`id`, `slug`, `name`) VALUES
(1, 'super admin', 'Super Admin'),
(2, 'admin', 'Admin'),
(3, 'kasir', 'Kasir'),
(4, 'pimpinan', 'Pimpinan');

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
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
(6, 'PA00006', 'Linda Febri', '1994-06-07', '085895986529', 'Jl Nginden Jaya 1 No 20 Sukolilo', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'PA00009', 'Rizky Febrianto', '1994-06-15', '085895986529', 'Benowo Surabaya', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'PA00008', 'Nuraeni', '1992-07-07', '085895986529', 'Jl Lontar 1 Surabaya', 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_promo`
--

CREATE TABLE `m_promo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `disc` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_promo`
--

INSERT INTO `m_promo` (`id`, `name`, `disc`, `note`) VALUES
(1, 'Promo Natal', 20000, 'Promo Natal');

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
(1, 2, 1, 1, 1, 1, 1),
(2, 2, 2, 1, 1, 1, 1),
(3, 2, 3, 1, 1, 0, 0),
(4, 2, 4, 1, 1, 0, 0),
(5, 2, 5, 1, 0, 0, 0),
(6, 2, 6, 0, 0, 0, 0),
(7, 2, 7, 0, 0, 0, 0),
(8, 2, 8, 0, 0, 0, 0),
(9, 2, 9, 0, 0, 0, 0);

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
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 1, 1, '2016-11-15 10:42:51'),
(2, 'Mokhamad Ariadi', 'addeye', '9ac9eea9811866dd5c520099a889c091', 1, 1, '2016-11-04 14:01:58');

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

--
-- Dumping data for table `tr_accessories`
--

INSERT INTO `tr_accessories` (`id`, `appointment_id`, `deal_id`, `customer_id`, `accessories_id`, `qty`, `price`, `total`) VALUES
(1, 3, 0, 1, 1, 1, 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tr_item`
--

CREATE TABLE `tr_item` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `baju_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_item`
--

INSERT INTO `tr_item` (`id`, `appointment_id`, `deal_id`, `customer_id`, `baju_id`, `qty`, `price`, `total`) VALUES
(1, 1, 0, 2, 5, 1, 3000000, 3000000),
(2, 1, 0, 2, 4, 1, 3000000, 3000000),
(13, 2, 0, 3, 4, 1, 3000000, 3000000),
(14, 2, 0, 3, 3, 1, 3000000, 3000000),
(15, 3, 0, 1, 1, 1, 3000000, 3000000);

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
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_accessories`
--
ALTER TABLE `m_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_appointment`
--
ALTER TABLE `m_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_baju`
--
ALTER TABLE `m_baju`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_company`
--
ALTER TABLE `m_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_customer`
--
ALTER TABLE `m_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_deal`
--
ALTER TABLE `m_deal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_group`
--
ALTER TABLE `m_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_partner`
--
ALTER TABLE `m_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `m_promo`
--
ALTER TABLE `m_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_role`
--
ALTER TABLE `m_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tr_accessories`
--
ALTER TABLE `tr_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_item`
--
ALTER TABLE `tr_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
