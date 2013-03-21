-- phpMyAdmin SQL Dump
-- version 4.0.0-beta2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2013 at 02:03 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wbpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_brand` varchar(50) NOT NULL,
  `product_instrument_type` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_stock` varchar(50) NOT NULL,
  `product_image` varchar(50) NOT NULL,
  PRIMARY KEY (`product_brand`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_brand`, `product_instrument_type`, `product_price`, `product_stock`, `product_image`) VALUES
('Bening Audio', 'Pop', '100000', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id_user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `user_level` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'guest',
  `user_gender` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_address` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_phone` varchar(15) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id_user`, `user_password`, `user_email`, `user_level`, `user_gender`, `user_address`, `user_phone`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'admin', 'male', 'Jakarta', '838'),
('member', 'member', 'member@admin.com', 'member', 'male', 'jakarta', '838'),
('guest', 'guest', 'guest@gmail.com', 'guest', 'male', 'jakarta', '838');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
