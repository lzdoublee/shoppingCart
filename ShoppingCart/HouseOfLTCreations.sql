-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2016 at 05:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HouseOfLTCreations`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(100) NOT NULL,
  `itemprice` varchar(100) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `imageurl` varchar(100) NOT NULL,
  `isNew` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `itemname`, `itemprice`, `catagory`, `imageurl`, `isNew`) VALUES
(11, 'isiShweShwe traditional dress', '680', '', 'images/isiShweShwe traditional dress.jpg', 1),
(12, 'Retro Sweetheart Neck Cape Sleeve Floral Print Flare Dress - Light Blue S', '450', '', 'images/Retro Sweetheart Neck Cape Sleeve Floral Print Flare Dress - Light Blue S.jpg', 0),
(13, 'Xhosa men outifit', '960', 'Men', 'images/Xhosa men outifit.jpg', 0),
(24, 'Traditional_Xhosa_Woman_Outfit_2_large', '20', 'Women', 'images/Traditional_Xhosa_Woman_Outfit_2_large.jpg', 1),
(26, 'Daki man shirt', '300', 'Men', 'images/Daki man shirt.jpg', 0),
(28, 'Stripe Doek', '150', 'Women', 'images/Stripe Doek.jpg', 0),
(29, 'maroon dress with slit', '550', 'Women', 'images/maroon dress with slit.jpg', 0),
(30, 'Traditonal xhosa man shirt', '350', 'Men', 'images/Traditonal xhosa man shirt.jpg', 1),
(31, 'Traditonal zulu man shirt', '234', 'Men', 'images/Traditonal zulu man shirt.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderDetailsId` int(100) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(100) NOT NULL,
  `itemPrice` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `orderDate` varchar(100) NOT NULL,
  `orderId` varchar(100) NOT NULL,
  `userId` varchar(100) NOT NULL,
  PRIMARY KEY (`orderDetailsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=325 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderDetailsId`, `itemName`, `itemPrice`, `quantity`, `orderDate`, `orderId`, `userId`) VALUES
(308, 'Daki man shirt', '300', '1', '2016-10-31', 'Ase581696ccc08b1', '19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` varchar(100) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerSurname` varchar(100) NOT NULL,
  `customerAddress` varchar(100) NOT NULL,
  `phoneNumber` varchar(200) NOT NULL,
  `amountDue` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `customerName`, `customerSurname`, `customerAddress`, `phoneNumber`, `amountDue`, `status`) VALUES
('Asa5a0063f282b20', 'Asavela', 'Mzilikazi', '3254 mmeli street makhaza khayelitsha', '0836749030', '20', 'Not delivered');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `customerAddress` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobileNumber` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `customerAddress`, `password`, `mobileNumber`) VALUES
(19, 'Asavela', 'Mzilikazi', 'asamzilikazi@gmal.com', '32254 mmeli street makhaza khayelitsha', 'c01e505a05ddaf475d12dcff5f88c04a', '0836749030'),
(20, 'Lutho', 'Sanda', 'luthosanda@gmail.com', '03 kotze street gardens cape town', 'f6cf4a382e3f95ae817dde4425fe547d', '083 555 9871');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
