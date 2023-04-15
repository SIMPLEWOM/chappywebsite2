-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 09:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chappy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_payments`
--

CREATE TABLE `customer_payments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `txn_id` varchar(200) NOT NULL,
  `payment_goss` float(10,2) NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `payer_id` varchar(20) NOT NULL,
  `payer_name` varchar(11) NOT NULL,
  `payer_email` varchar(50) NOT NULL,
  `payer_country` varchar(5) NOT NULL,
  `payment_status` varchar(11) NOT NULL DEFAULT 'Active',
  `created` timestamp(6) NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_materials`
--

CREATE TABLE `item_materials` (
  `ID` int(11) NOT NULL,
  `material` varchar(100) NOT NULL,
  `price` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_materials`
--

INSERT INTO `item_materials` (`ID`, `material`, `price`) VALUES
(1, 'White Vinyl Sticker non laminated', '.50'),
(2, 'Satin Sticker', '.25'),
(3, 'Clear vinyl Sticker non laminated', '.50'),
(4, 'White Vinyl Sticker laminated glossy/matte', '1.50');

-- --------------------------------------------------------

--
-- Table structure for table `item_shape`
--

CREATE TABLE `item_shape` (
  `ID` int(11) NOT NULL,
  `shape` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_shape`
--

INSERT INTO `item_shape` (`ID`, `shape`, `price`) VALUES
(1, 'Rectangle', '50'),
(2, 'Circle', '60'),
(3, 'Square', '70');

-- --------------------------------------------------------

--
-- Table structure for table `item_size`
--

CREATE TABLE `item_size` (
  `ID` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_size`
--

INSERT INTO `item_size` (`ID`, `size`, `price`) VALUES
(1, '1x1', '.25'),
(2, '2x2', '1.50'),
(3, '3x3', '4.50');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `brand_name`, `qty`, `date_added`) VALUES
(19, 'Satin Sticker', 400, '2023-04-08 21:17:17'),
(36, 'Wall', 13, '2023-04-08 15:24:09'),
(42, 'satin sticker', 100, '2023-04-08 17:53:14'),
(43, 'vinyl sticker', 200, '2023-04-08 17:53:30'),
(44, 'white vinyl sticker', 200, '2023-04-08 17:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_form`
--

CREATE TABLE `order_form` (
  `ID` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `shape` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `processing` varchar(255) NOT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `custom_image` blob DEFAULT NULL,
  `payment_total_amount` float NOT NULL,
  `status` varchar(25) CHARACTER SET latin1 NOT NULL DEFAULT 'Yet to be approved',
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_form`
--

INSERT INTO `order_form` (`ID`, `order_id`, `customer_id`, `payer_name`, `shape`, `size`, `material`, `processing`, `qty`, `custom_image`, `payment_total_amount`, `status`, `date_order`) VALUES
(51, 0, 0, 'Sample', 'rectangle', '1x1', 'Photosticker', '4_Business_Days', '50', 0x746573745f75706c6f61642f747265652d3733363838355f5f3438302e6a7067, 7500, 'Approved', '2023-03-19 22:53:36'),
(52, 0, 0, 'Sample', 'rectangle', '1x1', 'Photosticker', '4_Business_Days', '50', 0x746573745f75706c6f61642f646f776e6c6f61642e6a666966, 7500, 'Approved', '2023-03-19 22:55:20'),
(53, 0, 0, 'Sample', 'rectangle', '1x1', 'Photosticker', '4_Business_Days', '50', 0x746573745f75706c6f61642f70686f746f2d313537353933363132333435322d6236376333323033633335372e6a666966, 7500, 'Approved', '2023-03-19 22:58:10'),
(58, 0, 0, 'joo', 'circle', '2x2', 'Satin Sticker', '3_Business_Days', '58', 0x746573745f75706c6f61642f6368617070795f6c6f676f2e706e67, 10440, 'Approved', '2023-03-21 16:44:10'),
(59, 0, 0, 'joo', 'rectangle', '1x1', 'Photosticker', '4_Business_Days', '50', 0x746573745f75706c6f61642f416e63686f722e6a7067, 7500, 'Approved', '2023-03-21 20:56:01'),
(60, 0, 0, 'joo', 'Rectangle', '1x1', 'Photosticker', '4 Business Days', '50', 0x746573745f75706c6f61642f737461727475702d69636f6e2d696e746572666163652d69636f6e2d73657474696e67732d696e746572666163652d73696c686f75657474652d69636f6e2d43653966736844792e6a7067, 7500, 'Approved', '2023-03-21 21:54:50'),
(61, 0, 0, 'joo', 'Rectangle', '1x1', 'Photosticker', '4 Business Days', '50', 0x746573745f75706c6f61642f3332373130363238375f313236313839313935383030373230385f3233333634383737323433363138353330345f6e2e6a7067, 7500, 'Approved', '2023-03-23 15:13:49'),
(63, 0, 0, 'joo', 'Rectangle', '1x1', 'Photosticker', '4 Business Days', '50', 0x746573745f75706c6f61642f3332363836343333335f3935313630383539393037353939305f313333393737363336383032353339393432325f6e2e6a7067, 7500, 'Cancelled by Admin', '2023-03-23 16:29:56'),
(64, 0, 0, 'joo', 'Rectangle', '1x1', 'Photosticker', '4 Business Days', '50', 0x746573745f75706c6f61642f3332363836343333335f3935313630383539393037353939305f313333393737363336383032353339393432325f6e2e6a7067, 7500, 'Approved', '2023-03-23 16:38:21'),
(65, 0, 0, 'joo', 'Rectangle', '1x1', 'Photosticker', '4 Business Days', '50', 0x746573745f75706c6f61642f3332363836343333335f3935313630383539393037353939305f313333393737363336383032353339393432325f6e2e6a7067, 7500, 'Approved', '2023-03-23 16:39:12'),
(66, 0, 0, 'joo', 'Rectangle', '1x1', 'Photosticker', '4 Business Days', '50', 0x746573745f75706c6f61642f3332363836343333335f3935313630383539393037353939305f313333393737363336383032353339393432325f6e2e6a7067, 7500, 'Approved', '2023-03-23 16:43:56'),
(67, 0, 0, 'Sample', 'Circle', '2x2', 'Photosticker', '4 Business Days', '64', 0x746573745f75706c6f61642f70686f746f2d313537353933363132333435322d6236376333323033633335372e6a666966, 0, 'Cancelled by Admin', '2023-03-26 17:15:34'),
(68, 0, 0, 'Sample', 'Circle', '2x2', 'Photosticker', '4 Business Days', '64', 0x746573745f75706c6f61642f3332363836343333335f3935313630383539393037353939305f313333393737363336383032353339393432325f6e2e6a7067, 10880, 'Approved', '2023-03-26 17:17:41'),
(69, 0, 0, 'Sample', 'Rectangle', '1x1', 'Photosticker', '4 Business Days', '50', 0x746573745f75706c6f61642f3332363836343333335f3935313630383539393037353939305f313333393737363336383032353339393432325f6e2e6a7067, 7500, 'Cancelled by Admin', '2023-03-26 19:34:57'),
(70, 0, 0, 'Sample', 'Rectangle', '1x1', 'Photosticker', '4 Business Days', '50', 0x746573745f75706c6f61642f3332363836343333335f3935313630383539393037353939305f313333393737363336383032353339393432325f6e2e6a7067, 7500, 'Cancelled by Admin', '2023-03-26 19:38:21'),
(71, 0, 0, 'shane', 'Rectangle', '2x2', 'Satin Sticker', '3 Business Days', '71', 0x746573745f75706c6f61642f62672d696e6465782e6a7067, 224.25, 'Cancelled by Admin', '2023-04-07 17:36:24'),
(113, 0, 0, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f7465616d322e6a706567, 37.5, 'Cancelled by Admin', '2023-04-08 22:33:40'),
(114, 0, 0, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6772616469656e74322e6a7067, 37.5, 'Cancelled by Admin', '2023-04-08 22:39:05'),
(115, 0, 0, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6772616469656e74322e6a7067, 37.5, 'Cancelled by Admin', '2023-04-08 22:39:40'),
(116, 0, 0, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6772616469656e74322e6a7067, 37.5, 'Cancelled by Admin', '2023-04-08 22:41:17'),
(117, 0, 0, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6772616469656e74322e6a7067, 37.5, 'Cancelled by Admin', '2023-04-08 22:42:18'),
(118, 0, 0, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6772616469656e74322e6a7067, 37.5, 'Cancelled by Admin', '2023-04-08 22:42:40'),
(119, 0, 0, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f7465616d322e6a706567, 37.5, 'Approved', '2023-04-08 22:42:59'),
(120, 9, 0, 'shane', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6e6577205361746f6d626f2e76697461652e6a7067, 37.5, 'Cancelled by Admin', '2023-04-09 01:04:15'),
(121, 631, 0, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f62696c6c2e6a7067, 37.5, 'Yet to be approved', '2023-04-09 01:05:11'),
(122, 3256, 0, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f62696c6c2e6a7067, 37.5, 'Yet to be approved', '2023-04-09 01:19:00'),
(123, 0, 17, 'shane', 'Rectangle', '1x1', 'White Vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6e657742696c6c2e76697461652e6a7067, 37.5, 'Cancelled by customer', '2023-04-09 10:33:36'),
(124, 0, 17, 'shane', 'Rectangle', '1x1', 'White Vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6e6577205361746f6d626f2e76697461652e6a7067, 37.5, 'Cancelled by customer', '2023-04-09 10:39:56'),
(125, 0, 31, 'test1', 'Rectangle', '1x1', 'White Vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f70686f746f2d313537353933363132333435322d623637633332303363333537202831292e6a666966, 37.5, 'Cancelled by Admin', '2023-04-09 13:13:30'),
(126, 0, 0, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f62696c6c2e6a7067, 37.5, 'Approved', '2023-04-09 13:41:06'),
(127, 0, 0, 'test1', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f747265652d3733363838355f5f3438302e6a7067, 37.5, 'Yet to be approved', '2023-04-09 13:42:31'),
(128, 0, 36, 'kath', 'Rectangle', '1x1', 'White Vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f766563746f722d726574726f2d6c6f676f2d74656d706c6174652e6a7067, 37.5, 'Cancelled by customer', '2023-04-09 13:43:30'),
(129, 38, 0, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f747265652d3733363838355f5f3438302e6a7067, 37.5, 'Approved', '2023-04-09 13:46:30'),
(130, 4, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f747265652d3733363838355f5f3438302e6a7067, 37.5, 'Approved', '2023-04-09 13:48:58'),
(131, 0, 31, 'test1', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f666967757265732e706e67, 37.5, 'Approved', '2023-04-09 13:49:44'),
(132, 7, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '1000', 0x746573745f75706c6f61642f6a6f736570682e6a7067, 750, 'Cancelled by customer', '2023-04-09 13:53:35'),
(133, 0, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6c6162656c312e706e67, 37.5, 'Cancelled by customer', '2023-04-09 13:54:14'),
(134, 4, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6c6162656c322e706e67, 37.5, 'Cancelled by customer', '2023-04-09 13:54:53'),
(135, 0, 35, 'test', 'Rectangle', '1x1', 'White Vinyl Sticker laminated glossy/matte', '4 Business Days', '1000', 0x746573745f75706c6f61642f6368617070795f6c6f676f2e706e67, 1750, 'Yet to be approved', '2023-04-09 13:56:23'),
(136, 0, 35, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '75', 0x746573745f75706c6f61642f62696c6c2e6a7067, 56.25, 'Yet to be approved', '2023-04-09 13:59:12'),
(137, 523, 35, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f62672d696e6465782e6a7067, 37.5, 'Yet to be approved', '2023-04-09 13:59:43'),
(138, 7, 35, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6272616e64496d67342e706e67, 37.5, 'Cancelled by Admin', '2023-04-09 14:00:08'),
(139, 92, 35, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f4368617070792d4c6f676f2e706e67, 37.5, 'Cancelled by Admin', '2023-04-09 14:00:34'),
(140, 434, 33, 'test', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f4368617070792d4c6f676f2e706e67, 37.5, 'Approved', '2023-04-09 14:12:11'),
(141, 4021, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f7465616d2e706e67, 37.5, 'Approved', '2023-04-09 14:15:10'),
(142, 1, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f7465616d2e706e67, 37.5, 'Cancelled by customer', '2023-04-09 19:15:46'),
(143, 16, 36, 'kath', 'Square', '2x2', 'White Vinyl Sticker non laminated', '4 Business Days', '750', 0x746573745f75706c6f61642f62672d6c6f67696e2e6a7067, 1500, 'Cancelled by Admin', '2023-04-09 23:02:47'),
(144, 0, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f7465616d2e706e67, 37.5, 'Cancelled by customer', '2023-04-10 00:06:58'),
(145, 6, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f6272616e64496d67312e706e67, 37.5, 'Cancelled by customer', '2023-04-10 00:10:18'),
(146, 5619, 31, 'test1', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f4465736572742e6a7067, 37.5, 'Approved', '2023-04-14 12:57:28'),
(147, 252, 36, 'kath', 'Square', '3x3', 'Satin Sticker', '2 Business Days', '1000', 0x746573745f75706c6f61642f54756c6970732e6a7067, 4850, 'Cancelled by customer', '2023-04-14 14:36:23'),
(148, 59, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f48796472616e676561732e6a7067, 37.5, 'Cancelled by Admin', '2023-04-14 14:38:12'),
(149, 7391, 36, 'kath', 'Rectangle', '1x1', 'Clear vinyl Sticker non laminated', '4 Business Days', '50', 0x746573745f75706c6f61642f4c69676874686f7573652e6a7067, 37.5, 'Cancelled by Admin', '2023-04-14 15:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'User',
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`ID`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`, `user_type`, `date_added`) VALUES
(1, 'Jomarie', 'Atadero', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09158326162', 'L. wood Street Brgy. San Isidro, Taytay, Rizal', 'admin', '2023-02-10 22:52:10'),
(2, 'newsample', 'newprinting', 'newsample@gmail.com', '12345', '1234567890', 'sampleAdress', 'user', '2023-02-10 23:03:25'),
(9, 'Jomarie', 'Atadero', 'jomarie@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '09701022897', 'Don Mariano Ave. San Isidro, Angono, Rizal', 'user', '2023-02-12 07:50:32'),
(10, 'joseph', 'rizal', 'rizal@gmail.com', 'cb07901c53218323c4ceacdea4b23c98', '12312321312', 'sample address', 'user', '2023-03-09 15:56:19'),
(11, 'joo', 'jojo', 'jo@gmail.com', '54533eebc61004baa7a6f12b90785816', '12312321312', 'sample address', 'user', '2023-03-21 16:42:20'),
(12, 'markjoseph', 'lebaquin', 'joseph@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0923283677817', 'josephAddress', 'user', '2023-03-27 14:01:38'),
(14, 'seph', 'rizal', 'seph@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12312321312', 'sample address', 'user', '2023-03-27 14:21:54'),
(15, 'lebaquin', 'lebaquin', 'lebaquin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '12312321312', 'sample address', 'user', '2023-03-27 14:26:47'),
(16, 'joseph', 'trinidad', 'trinidad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234567890', 'sampleAdress', 'user', '2023-03-27 14:39:48'),
(17, 'shane', 'trinidad', 'trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 21:48:25'),
(18, 'shane', 'trinidad', 'trinidad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1234567890', 'sampleAdress', 'user', '2023-03-27 21:53:37'),
(19, 'shane', 'trinidad', 'trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 21:53:54'),
(20, 'shane', 'trinidad', 'trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 21:54:13'),
(21, 'shane', 'trinidad', 'trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:02:30'),
(22, 'shane', 'trinidad', 'trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:05:10'),
(23, 'shane', 'trinidad', 'newtrinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:07:36'),
(24, 'shane', 'trinidad', 'newtrinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:08:06'),
(25, 'shane', 'trinidad', 'new2trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:09:59'),
(26, 'shane', 'trinidad', 'new2trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:10:14'),
(27, 'shane', 'trinidad', 'new2trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:18:34'),
(28, 'shane', 'trinidad', 'new2trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:20:29'),
(29, 'shane', 'trinidad', 'new2trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:20:42'),
(30, 'shane', 'trinidad', 'new3trinidad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', 'sampleAdress', 'user', '2023-03-27 22:41:56'),
(31, 'test1', 'test1 last name', 'test1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '12345678901', 'test1 address', 'user', '2023-03-28 12:47:32'),
(32, 'test1', 'test1 last name', 'test1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345678901', 'test1 address', 'user', '2023-03-28 12:49:30'),
(33, 'test', 'test1 last name', 'test2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '12345678901', 'test1 address', 'user', '2023-03-28 12:55:06'),
(34, 'asd', 'asdasd', 'email@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123123213', '', '', '2023-04-02 14:02:22'),
(35, 'test', 'test1 last name', 'test223@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '12345678901', 'qweqwe', 'user', '2023-04-02 14:37:26'),
(36, 'kath', 'lebaquin', 'kath@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123456', 'sampleaddress', 'user', '2023-04-09 13:38:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_materials`
--
ALTER TABLE `item_materials`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item_shape`
--
ALTER TABLE `item_shape`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item_size`
--
ALTER TABLE `item_size`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_form`
--
ALTER TABLE `order_form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_materials`
--
ALTER TABLE `item_materials`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_shape`
--
ALTER TABLE `item_shape`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_size`
--
ALTER TABLE `item_size`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `order_form`
--
ALTER TABLE `order_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
