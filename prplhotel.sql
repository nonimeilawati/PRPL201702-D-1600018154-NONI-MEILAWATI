-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 03:46 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prplhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `noHP` varchar(40) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `jumlahinap` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `type_kamar` varchar(50) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nik`, `nama`, `alamat`, `noHP`, `checkin`, `checkout`, `jumlahinap`, `jenis_kelamin`, `type_kamar`, `harga_kamar`, `total`) VALUES
(1, '12345678', 'Noni Mei', '', '08123467189', '2018-05-03', '2018-05-11', 8, '', 'Standard', 1500000, 13200000),
(2, '76594532', 'M. Arif Rahmawan', 'Bima, NTB', '085289374650', '2018-05-16', '2018-05-18', 2, 'Laki - laki', 'VVIP', 1750000, 3850000),
(5, '86743562', 'Ziza Nurjannah', 'Bajarnegara', '08234758674', '2018-06-01', '2018-06-06', 5, 'Perempuan', 'Standard', 1000000, 5500000),
(6, '78656432', 'Indah Sari', 'Makassar', '082267546342', '2018-06-02', '2018-06-03', 1, 'Perempuan', 'VIP', 1500000, 1650000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
