-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2016 at 04:01 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `product_id`, `image_name`) VALUES
(1, 1, 'test1.png'),
(2, 2, 'test2.png'),
(3, 3, 'test3.png'),
(4, 4, 'test1.png'),
(5, 5, 'test1.png'),
(6, 6, 'test1.png'),
(7, 7, 'test1.png'),
(8, 8, 'test1.png'),
(9, 9, 'test1.png'),
(10, 10, 'test1.png'),
(11, 11, 'test1.png'),
(12, 12, 'test1.png');

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
  `product_category` int(11) NOT NULL,
  `product_subcategory` int(11) NOT NULL,
  `product_sub_subcategory` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `product_name`, `product_description`, `product_price`, `product_category`, `product_subcategory`, `product_sub_subcategory`) VALUES
(1, 'Test product 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '10.00', 1, 2, 0),
(2, 'Test product 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique.', '20.00', 1, 3, 0),
(3, 'Test product 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique.', '30.00', 21, 29, 30),
(4, 'Test product 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '50.00', 21, 29, 30),
(5, 'Test product 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '60.00', 21, 29, 30),
(6, 'Test product 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '60.00', 21, 29, 31),
(7, 'Test product 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '60.30', 1, 4, 0),
(8, 'Test product 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '60.50', 1, 2, 0),
(9, 'Test product 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '60.00', 1, 2, 0),
(10, 'Test product 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '60.00', 1, 2, 0),
(11, 'Test product 11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '60.00', 1, 2, 0),
(12, 'Test product 12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque a luctus ligula, aliquam placerat tortor. Nam at venenatis mi. Integer malesuada leo eget nisl porta, id ultrices magna auctor. Proin laoreet egestas elit non maximus. Morbi sit amet eleifend turpis. Praesent a eros at dolor scelerisque placerat a id nibh. Fusce nec quam id erat facilisis luctus sit amet sit amet enim. Aenean pellentesque vel eros quis tristique. ', '60.00', 1, 2, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `email`, `password`, `company`, `salt`, `active`, `last_login`, `status`) VALUES
(11, '', '', 'savicdragan15@facebook.com', '$2y$12$gAFPfixVUWKUSlUIYXAleOlwIE6JNNy7TyLsy0jlK3XdovseZWDzS', '', '4rmCugjw3oEDTlw8SPGd5N65f129db2558e4312021dfa4c19c4186', 1, '0000-00-00 00:00:00', 2),
(12, 'Pera', 'Peric', 'savicdragan2707@gmail.com', '$2y$12$PyNRbDhmUCFwNFYjd3Rza.vGHUIKQHf/A0BMjvGVJb88kug4FSeaS', '', 'wxcKeTI1oHTd8ExHtJx6Vk2ed049e4e924644fcf54efea55f79c6a', 1, '2016-10-09 15:58:48', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
