-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2020 at 07:20 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `globechem_db`
--
-- CREATE DATABASE IF NOT EXISTS `globechem_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
-- USE `globechem_db`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_desc` varchar(1000) DEFAULT NULL,
  `category_icon` varchar(50) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `category_icon`, `created_on`, `updated_on`) VALUES
(1, 'MASONRY MORTARS', 'For each project we establish relationships with partners who we know will help us create added value for your project. As well as bringing together the public and private sectors, we make sector-overarching links to gather knowledge and to learn from each other. The way we undertake projects is based on permanently applying.', 'builder.png', '2020-08-10 23:44:51', '2020-08-10 23:44:51'),
(2, 'TILE ADHESIVES', 'For each project we establish relationships with partners who we know will help us create added value for your project. As well as bringing together the public and private sectors, we make sector-overarching links to gather knowledge and to learn from each other. The way we undertake projects is based on permanently applying.', 'construction.png', '2020-08-10 23:45:34', '2020-08-10 23:45:34'),
(3, 'WATERPROOFING', 'For each project we establish relationships with partners who we know will help us create added value for your project. As well as bringing together the public and private sectors, we make sector-overarching links to gather knowledge and to learn from each other. The way we undertake projects is based on permanently applying.', 'home.png', '2020-08-10 23:46:20', '2020-08-10 23:46:20'),
(4, 'ADMIXTURE', 'ADMIXTURE is an innovative multi-purpose super plasticizer based on polycarboxylic ether polymers, specially developed for pavers blocks', 'construction-worker.png', '2020-08-10 23:47:16', '2020-08-10 23:47:16'),
(5, 'WATER REPELLENT COATING', 'Water repellent spray, nano glass coating reduces pollution, acid rains and icing on glass and ceramic surfaces. Powerful solution for glass and ceramic surfaces. Repels water and stains. ... Nasiol nano coatings are so far apart from wax- or oil-based products--they only stay on the surface and wipe or wear off.', 'wall.png', '2020-08-10 23:47:57', '2020-08-10 23:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `clients_logo`
--

CREATE TABLE IF NOT EXISTS `clients_logo` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(30) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `clients_logo`
--

INSERT INTO `clients_logo` (`client_id`, `client_name`, `logo`) VALUES
(3, 'client-1', 'client-1.png'),
(4, 'client-2', 'client-2.png'),
(5, 'client-3', 'client-3.png'),
(6, 'client-4', 'client-4.png'),
(7, 'client-5', 'client-5.png'),
(8, 'client-6', 'client-6.png'),
(9, 'client-7', 'client-7.png'),
(10, 'client-8', 'client-8.png');

-- --------------------------------------------------------

--
-- Table structure for table `counts_config`
--

CREATE TABLE IF NOT EXISTS `counts_config` (
  `count_id` int(11) NOT NULL AUTO_INCREMENT,
  `count_name` varchar(30) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`count_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `counts_config`
--

INSERT INTO `counts_config` (`count_id`, `count_name`, `count`) VALUES
(1, 'Clients', 321),
(2, 'Projects', 512),
(3, 'Products', 100),
(4, 'Workers', 12);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(1000) DEFAULT NULL,
  `product_features` varchar(1000) DEFAULT NULL,
  `product_usage` varchar(1000) DEFAULT NULL,
  `product_dataset` varchar(100) DEFAULT NULL,
  `product_video_link` varchar(100) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_desc`, `product_features`, `product_usage`, `product_dataset`, `product_video_link`, `created_on`, `updated_on`) VALUES
(14, 1, 'product 1', 'this is first product', 'Feature 1 \r\nFeature 2', 'use 1\r\nuse 2', 'sample.pdf', 'www.youtube.com/hsfteijd', '2020-08-11 00:24:39', '2020-08-11 00:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_image_link` varchar(100) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_image_id`, `product_id`, `product_image_link`, `created_on`, `updated_on`) VALUES
(4, 5, 'Chrysanthemum1596736018.jpg', '2020-08-06 23:16:58', '2020-08-06 23:16:58'),
(5, 5, 'Desert1596736018.jpg', '2020-08-06 23:16:58', '2020-08-06 23:16:58'),
(6, 5, 'Hydrangeas1596736018.jpg', '2020-08-06 23:16:58', '2020-08-06 23:16:58'),
(13, 4, 'Lighthouse.jpg', '2020-08-06 23:54:49', '2020-08-06 23:54:49'),
(14, 4, 'Penguins.jpg', '2020-08-06 23:54:49', '2020-08-06 23:54:49'),
(15, 4, 'Tulips.jpg', '2020-08-06 23:54:49', '2020-08-06 23:54:49'),
(16, 11, 'Lighthouse.jpg', '2020-08-10 13:56:43', '2020-08-10 13:56:43'),
(17, 11, 'Penguins.jpg', '2020-08-10 13:56:43', '2020-08-10 13:56:43'),
(18, 11, 'Tulips.jpg', '2020-08-10 13:56:43', '2020-08-10 13:56:43'),
(19, 14, 'Chrysanthemum.jpg', '2020-08-11 00:24:40', '2020-08-11 00:24:40'),
(20, 14, 'Desert.jpg', '2020-08-11 00:24:40', '2020-08-11 00:24:40'),
(21, 14, 'Hydrangeas.jpg', '2020-08-11 00:24:40', '2020-08-11 00:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE IF NOT EXISTS `user_credentials` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '243e61e9410a9f577d2d662c67025ee9');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
