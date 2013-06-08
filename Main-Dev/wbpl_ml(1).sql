-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2013 at 10:55 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wbpl_ml`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya_kirim`
--

CREATE TABLE IF NOT EXISTS `biaya_kirim` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(30) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `biaya_kirim`
--

INSERT INTO `biaya_kirim` (`id_kota`, `nama_kota`, `biaya`) VALUES
(2, 'Semarang', 120),
(3, 'Bandung', 14000),
(4, 'Jakarta', 10000),
(6, 'Ambon', 39000),
(7, 'Jayapura', 60000),
(8, 'Medan', 21000),
(9, 'Pekan Baru', 19000),
(10, 'Malang', 9000),
(11, 'Pontianak', 20000),
(12, 'Balikpapan', 28000),
(13, 'Samarinda', 31500),
(14, 'Sumbawa', 31500),
(15, 'Surabaya', 17000),
(16, 'cilacap', 2000),
(17, 'qqq', 111),
(18, 'qq', 11);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `kd_pemesan` varchar(20) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `kd_pos` char(5) NOT NULL,
  `No_telp` varchar(12) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kd_pesan` varchar(6) NOT NULL,
  PRIMARY KEY (`kd_pemesan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kd_pemesan`, `Nama`, `Alamat`, `kd_pos`, `No_telp`, `Email`, `id_kota`, `kd_pesan`) VALUES
('C001', 'haryanto', 'jl jant', '12244', '2343443', 'haryanto@gmail.com', 6, 'P002'),
('C002', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 6, 'P003'),
('C003', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 6, 'P004'),
('C004', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 6, 'P005'),
('C005', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 15, 'P006'),
('C006', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 6, 'P007'),
('C007', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 2, 'P008'),
('C008', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 6, 'P009'),
('C009', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 6, 'P010'),
('C010', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 6, 'P011'),
('C011', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 4, 'P012'),
('C012', ' Budi Hermawan', ' Jakarta', '', ' 62856', 'budi03@gmail.com', 6, 'P013');

-- --------------------------------------------------------

--
-- Table structure for table `det_pesan`
--

CREATE TABLE IF NOT EXISTS `det_pesan` (
  `no_det_pesan` int(4) NOT NULL AUTO_INCREMENT,
  `no_pesan` varchar(20) NOT NULL,
  `kd_buku` varchar(6) NOT NULL,
  `total_pesan` int(11) NOT NULL,
  PRIMARY KEY (`no_det_pesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `det_pesan`
--

INSERT INTO `det_pesan` (`no_det_pesan`, `no_pesan`, `kd_buku`, `total_pesan`) VALUES
(1, 'P001', 'B0001', 1),
(12, 'P003', 'P0001', 9),
(13, 'P004', 'P0001', 1),
(14, 'P004', 'P0004', 1),
(15, 'P005', 'P0004', 1),
(16, 'P006', 'P0002', 1),
(17, 'P007', 'P0003', 1),
(18, 'P008', 'P0001', 1),
(19, 'P009', 'P0001', 1),
(20, 'P010', 'P0003', 1),
(21, 'P011', 'P0001', 1),
(22, 'P012', 'P0001', 100),
(23, 'P013', 'P0002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `kd_pesan` varchar(30) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  PRIMARY KEY (`kd_pesan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`kd_pesan`, `tgl_pesan`, `total_bayar`) VALUES
('P001', '2012-08-04 13:15:41', 220000),
('P002', '2012-08-04 14:15:40', 60000),
('P003', '2013-05-07 12:23:03', 54000000),
('P004', '2013-05-09 22:02:54', 6000000),
('P005', '2013-05-09 22:05:14', 0),
('P006', '2013-05-09 22:06:59', 12),
('P007', '2013-05-09 22:09:44', 1),
('P008', '2013-05-09 22:10:38', 6000000),
('P009', '2013-05-09 22:14:31', 6000000),
('P010', '2013-05-09 22:30:33', 1),
('P011', '2013-05-09 22:33:57', 6000000),
('P012', '2013-05-14 14:22:24', 600000000),
('P013', '2013-05-30 19:18:32', 12);

-- --------------------------------------------------------

--
-- Table structure for table `wbpl_brand`
--

CREATE TABLE IF NOT EXISTS `wbpl_brand` (
  `kd_brand` varchar(50) NOT NULL,
  `nama_brand` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_brand`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wbpl_brand`
--

INSERT INTO `wbpl_brand` (`kd_brand`, `nama_brand`) VALUES
('B01', 'Ibanez'),
('B02', 'Yamaha'),
('B03', 'Fender');

-- --------------------------------------------------------

--
-- Table structure for table `wbpl_detail`
--

CREATE TABLE IF NOT EXISTS `wbpl_detail` (
  `ProductID` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `InstrumentType` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `SubTotal` varchar(50) NOT NULL,
  `TotalPrice` int(50) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wbpl_instype`
--

CREATE TABLE IF NOT EXISTS `wbpl_instype` (
  `kd_instype` varchar(50) NOT NULL,
  `nama_instype` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_instype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wbpl_instype`
--

INSERT INTO `wbpl_instype` (`kd_instype`, `nama_instype`) VALUES
('I01', 'Acoustic'),
('I02', 'Electric'),
('I03', 'Acoustic-Electric');

-- --------------------------------------------------------

--
-- Table structure for table `wbpl_member`
--

CREATE TABLE IF NOT EXISTS `wbpl_member` (
  `kd_member` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wbpl_member`
--

INSERT INTO `wbpl_member` (`kd_member`, `name`, `username`, `password`, `gender`, `address`, `phone`, `email`) VALUES
('M0002', 'Budi Hermawan', 'a', '0cc175b9c0f1b6a831c399e269772661', 'Male', 'Jakarta', 0, ''),
('M0001', 'Budi Hermawan', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Male', 'Jakarta', 62856, 'budi03@gmail.com'),
('M0005', 'edc', 'edc', 'c630dd16135d2a82b0518e1cd3b5d36f', '', '', 0, ''),
('M0003', 'qaz', 'qaz', '4eae18cf9e54a0f62b44176d074cbe2f', '', '', 0, ''),
('M0006', 'rfv', 'rfv', '116e055b63d8698142614628d179f5f9', '', '', 0, ''),
('M0007', 'rio', 'riorio', 'e10adc3949ba59abbe56e057f20f883e', 'Female', 'fg', 925226, 'laijfa@akfnha.com');

-- --------------------------------------------------------

--
-- Table structure for table `wbpl_product`
--

CREATE TABLE IF NOT EXISTS `wbpl_product` (
  `kd_product` varchar(50) NOT NULL,
  `nama_product` varchar(60) NOT NULL,
  `kd_brand` varchar(50) NOT NULL,
  `nama_brand` varchar(50) NOT NULL,
  `kd_instype` varchar(50) NOT NULL,
  `nama_instype` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `stock` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `deskripsi` longtext NOT NULL,
  PRIMARY KEY (`kd_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wbpl_product`
--

INSERT INTO `wbpl_product` (`kd_product`, `nama_product`, `kd_brand`, `nama_brand`, `kd_instype`, `nama_instype`, `price`, `stock`, `image`, `deskripsi`) VALUES
('P0001', 'Ibanez AFB205 5-String Bass (AFB205 5-String Dark)', '', 'Ibanez', '', 'Electric', '6000000', '100', '', '<p><em>A 5-string hollowbody built for the player that wants the thunderous hollowbody sound with a solidbody feel.</em></p>\r\n'),
('P0002', 'brbsgfde', '', 'Fender', '', 'Acoustic', '12', '12', '', ' g tg tg t'),
('P0003', 'aad', '', 'Fender', '', 'Acoustic', '1', '1', '', 'qqqqqqqqqqqq'),
('P0004', 'asa', '', 'as', '', 'as', 'as', 'as', '', 'asas'),
('P0005', 'efwew', '', 'Fender', '', 'Acoustic', '43', '43', '', '<p>egsg</p>\r\n'),
('P0006', 'sgs', '', 'Ibanez', '', 'Acoustic', '53', '53', '', '<p>fafa</p>\r\n'),
('P0007', 'geg', '', 'Ibanez', '', 'Electric', '454', '54', '', '<p>dsgsg</p>\r\n'),
('P0008', 'tet', '', 'Ibanez', '', 'Acoustic', '53', '767', '', '<p>eetew</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `wbpl_testimony`
--

CREATE TABLE IF NOT EXISTS `wbpl_testimony` (
  `kd_testimony` varchar(10) NOT NULL,
  `testimony_isi` longtext NOT NULL,
  `testimony_status` varchar(10) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`kd_testimony`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wbpl_testimony`
--

INSERT INTO `wbpl_testimony` (`kd_testimony`, `testimony_isi`, `testimony_status`) VALUES
('T0006', 'Product that you could have prices below average of other stores. Please enter your testimonial in columm below.\r\nPlease enter your testimonial in columm below.\r\nPlease enter your testimonial in colum', 'approved'),
('T0007', 'dwd', 'approved'),
('T0008', 'aaa', 'pending'),
('T0009', 'jiji', 'pending'),
('T0010', 'rrgrg', 'pending'),
('T0011', 'Saya mencoba untuk menulis testy.', 'approved');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
