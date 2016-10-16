-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 05:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `all_shine_out`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `product_id`, `image_name`) VALUES
(1, 1, '580383ba3c09d2016-10-16.jpg'),
(2, 2, '580384add557c2016-10-16.jpg'),
(3, 3, '580385229c9fa2016-10-16.jpg'),
(4, 4, '5803862e76dc22016-10-16.jpg'),
(5, 5, '580391594b3cf2016-10-16.jpg'),
(6, 6, '5803923b56b202016-10-16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `subparent` tinyint(1) NOT NULL DEFAULT '0',
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `id_subparent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`ID`, `name`, `link`, `sort`, `parent`, `subparent`, `id_parent`, `id_subparent`) VALUES
(1, 'Exterior', '', 1, 1, 0, 0, 0),
(2, 'Wäsche', '', 1, 0, 0, 1, 0),
(3, 'Versiegelungen', '', 2, 0, 0, 1, 0),
(4, 'Felgen & Reifen', '', 3, 0, 0, 1, 0),
(5, 'Reiniger', '', 4, 0, 0, 1, 0),
(6, 'Wachse', '', 5, 0, 0, 1, 0),
(7, 'Glas', '', 6, 0, 0, 1, 0),
(8, 'Lackreinigung', '', 7, 0, 0, 1, 0),
(9, 'Quick Detailer', '', 8, 0, 0, 1, 0),
(10, 'Metall', '', 9, 0, 0, 1, 0),
(11, 'Polituren', '', 10, 0, 0, 1, 0),
(12, 'Kunststoff & Gummi', '', 11, 0, 0, 1, 0),
(13, 'Verdeck', '', 12, 0, 0, 1, 0),
(14, 'Interior', '', 2, 1, 0, 0, 0),
(15, 'Kunststoff', '', 1, 0, 0, 14, 0),
(16, 'Lufterfrischer', '', 2, 0, 0, 14, 0),
(17, 'Stoff', '', 3, 0, 0, 14, 0),
(18, 'Leder', '', 4, 0, 0, 14, 0),
(19, 'Glas', '', 5, 0, 0, 14, 0),
(20, 'Microfaser', '', 3, 1, 0, 0, 0),
(21, 'Zubehör', '', 4, 1, 0, 0, 0),
(22, 'Applikatoren', '', 1, 0, 0, 21, 0),
(23, 'Bürsten', '', 2, 0, 0, 21, 0),
(24, 'Schwämme', '', 3, 0, 0, 21, 0),
(25, 'Aufbewahrung', '', 4, 0, 0, 21, 0),
(26, 'Polier-Pads', '', 5, 0, 0, 21, 0),
(27, 'Sprühflaschen', '', 6, 0, 0, 21, 0),
(28, 'Misc', '', 5, 0, 0, 21, 0),
(29, 'Maschinen', '', 6, 0, 1, 21, 0),
(30, 'Poliermaschinen', '', 1, 0, 0, 21, 29),
(31, 'Sauger', '', 2, 0, 0, 21, 29),
(32, 'Akku-Schrauber', '', 3, 0, 0, 21, 29),
(33, 'Schleifen', '', 4, 0, 0, 21, 29),
(34, 'Sets', '', 5, 1, 0, 0, 0),
(35, 'Merchandise', '', 6, 1, 0, 0, 0),
(36, 'Gutscheine', '', 7, 1, 0, 0, 0),
(37, 'Hautschutz', '', 8, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(20,2) NOT NULL,
  `product_quantity` tinyint(4) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_subcategory` int(11) NOT NULL,
  `product_sub_subcategory` int(11) NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `product_name`, `product_description`, `product_price`, `product_quantity`, `product_category`, `product_subcategory`, `product_sub_subcategory`, `product_status`) VALUES
(1, 'Konzerva', 'Konzerva', '50.00', 10, 1, 2, 0, 1),
(2, 'Konzerva1111', '<p>KonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzerva</p>\n<p>KonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzerva</p>\n<p>KonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzerva</p>\n<p>KonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzervaKonzerva</p>', '50.00', 10, 1, 2, 0, 1),
(3, 'Girl', '<p>KonzervaKonzerva</p>', '100.00', 10, 1, 2, 0, 1),
(4, 'Mikrofiber', '<p>Mikrofiber</p>', '150.00', 50, 1, 2, 0, 1),
(5, 'Test new', '<p>opis</p>', '100.00', 10, 1, 2, 0, 1),
(6, 'Probaaa', '<p>sadsadsadsadsasadas</p>', '50.00', 10, 1, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `company` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 - admin 2 - user',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `email`, `password`, `company`, `salt`, `active`, `last_login`, `status`) VALUES
(11, '', '', 'savicdragan15@facebook.com', '$2y$12$gAFPfixVUWKUSlUIYXAleOlwIE6JNNy7TyLsy0jlK3XdovseZWDzS', '', '4rmCugjw3oEDTlw8SPGd5N65f129db2558e4312021dfa4c19c4186', 1, '0000-00-00 00:00:00', 2),
(13, '', '', 'savicdragan2707@gmail.com', '$2y$12$NldVbmRDZGRYNlRyUmZSceraucNc4pGYgBPZG1s260WpFJleRrexi', '', 'aCpMLzu41S2ymSHxyDupRL27bdc63b4bb93bf490a8172ae35bbf60', 1, '2016-10-16 15:51:58', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
