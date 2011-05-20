-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2011 at 01:18 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acm`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  `open_date` date DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sys_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`account_id`),
  KEY `account_FKIndex1` (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `customer_id`, `account_number`, `amount`, `rate`, `open_date`, `close_date`, `update_date`, `status`, `sys_date`) VALUES
(1, 0, '', '', '', '0000-00-00', NULL, NULL, 1, '0000-00-00 00:00:00'),
(2, 0, '', '', '', '0000-00-00', NULL, NULL, 1, '0000-00-00 00:00:00'),
(3, 0, '', '', '', '0000-00-00', NULL, NULL, 1, '0000-00-00 00:00:00'),
(4, 0, '', '', '', '0000-00-00', NULL, NULL, 1, '0000-00-00 00:00:00'),
(5, 0, '', '', '', '0000-00-00', NULL, NULL, 1, '0000-00-00 00:00:00'),
(6, 0, '', '', '', '0000-00-00', NULL, NULL, 1, '0000-00-00 00:00:00'),
(7, 0, '', '', '', '0000-00-00', NULL, NULL, 1, '0000-00-00 00:00:00'),
(8, 0, '', '', '', '0000-00-00', NULL, NULL, 1, '0000-00-00 00:00:00'),
(9, 0, '', '', '', '0000-00-00', NULL, NULL, 1, '2011-04-23 12:32:06'),
(10, 2, '1111', '1222', '34', '0000-00-00', NULL, NULL, 1, '2011-04-23 12:36:22'),
(11, 0, '1111111', '111', '2', '0000-00-00', NULL, NULL, 1, '2011-04-23 12:45:54'),
(12, 0, '33.33', '333.33', '33', '1222-12-22', NULL, NULL, 1, '2011-04-23 13:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sys_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `user_name`, `user_password`, `status`, `sys_date`) VALUES
(1, 'sdssf', '57f231b1ec41dc6641270cb09a56f897', 0, '0000-00-00 00:00:00'),
(8, 'sdfsd', '6fbfd5e68d3306e51350bea0232f8fa5', 1, '0000-00-00 00:00:00'),
(4, 'dfdgdgf', '642bbca5e907f455bb502c54a9591b00', -1, '0000-00-00 00:00:00'),
(5, 'gdfgfdgdg', '6dc01a486ee915b00c0954b621bbfdea', 0, '0000-00-00 00:00:00'),
(9, 'adad', 'e99a18c428cb38d5f260853678922e03', 1, '0000-00-00 00:00:00'),
(10, 'asdasd', '47bce5c74f589f4867dbd57e9ca9f808', 1, '2011-04-22 22:16:34'),
(11, 'desha', 'e99a18c428cb38d5f260853678922e03', 1, '2011-04-23 08:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `nick_name` varchar(200) DEFAULT NULL,
  `nic_number` int(10) unsigned DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `image_ext` varchar(10) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sys_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `nick_name`, `nic_number`, `address`, `image_ext`, `status`, `sys_date`) VALUES
(1, '', '', '', 0, '', '', -1, '0000-00-00 00:00:00'),
(2, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '0000-00-00 00:00:00'),
(3, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-22 23:46:04'),
(4, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 09:56:52'),
(5, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 10:02:39'),
(6, '', '', '', 0, '', '', -1, '2011-04-23 11:20:17'),
(7, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:17'),
(8, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:17'),
(9, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:17'),
(10, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:17'),
(11, '', '', '', 0, '', '', -1, '2011-04-23 11:20:20'),
(12, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:20'),
(13, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:20'),
(14, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:20'),
(15, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:20'),
(16, '', '', '', 0, '', '', -1, '2011-04-23 11:20:22'),
(17, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:22'),
(18, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:22'),
(19, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:22'),
(20, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:22'),
(21, '', '', '', 0, '', '', -1, '2011-04-23 11:20:23'),
(22, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:23'),
(23, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:23'),
(24, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:23'),
(25, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:23'),
(26, '', '', '', 0, '', '', -1, '2011-04-23 11:20:25'),
(27, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:25'),
(28, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:25'),
(29, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:25'),
(30, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:25'),
(31, '', '', '', 0, '', '', -1, '2011-04-23 11:20:26'),
(32, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:26'),
(33, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:26'),
(34, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:26'),
(35, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:26'),
(36, '', '', '', 0, '', '', -1, '2011-04-23 11:20:27'),
(37, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:27'),
(38, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:27'),
(39, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:27'),
(40, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:27'),
(41, '', '', '', 0, '', '', -1, '2011-04-23 11:20:29'),
(42, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:29'),
(43, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:29'),
(44, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:29'),
(45, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:29'),
(46, '', '', '', 0, '', '', -1, '2011-04-23 11:20:30'),
(47, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:30'),
(48, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:30'),
(49, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:30'),
(50, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:30'),
(51, '', '', '', 0, '', '', -1, '2011-04-23 11:20:32'),
(52, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:32'),
(53, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:32'),
(54, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:32'),
(55, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:32'),
(56, '', '', '', 0, '', '', -1, '2011-04-23 11:20:34'),
(57, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:34'),
(58, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:34'),
(59, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:34'),
(60, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:34'),
(61, '', '', '', 0, '', '', -1, '2011-04-23 11:20:40'),
(62, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:40'),
(63, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:40'),
(64, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:40'),
(65, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:40'),
(66, '', '', '', 0, '', '', -1, '2011-04-23 11:20:42'),
(67, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:42'),
(68, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:42'),
(69, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:42'),
(70, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:42'),
(71, '', '', '', 0, '', '', -1, '2011-04-23 11:20:43'),
(72, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:43'),
(73, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:43'),
(74, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:43'),
(75, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:43'),
(76, '', '', '', 0, '', '', -1, '2011-04-23 11:20:44'),
(77, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:44'),
(78, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:44'),
(79, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:44'),
(80, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:44'),
(81, '', '', '', 0, '', '', -1, '2011-04-23 11:20:46'),
(82, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:46'),
(83, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:46'),
(84, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:46'),
(85, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:46'),
(86, '', '', '', 0, '', '', -1, '2011-04-23 11:20:47'),
(87, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:47'),
(88, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:47'),
(89, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:47'),
(90, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:47'),
(91, '', '', '', 0, '', '', -1, '2011-04-23 11:20:49'),
(92, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:49'),
(93, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:49'),
(94, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:49'),
(95, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:49'),
(96, '', '', '', 0, '', '', -1, '2011-04-23 11:20:50'),
(97, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:50'),
(98, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:50'),
(99, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:50'),
(100, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:50'),
(101, '', '', '', 0, '', '', -1, '2011-04-23 11:20:51'),
(102, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:51'),
(103, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:51'),
(104, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:51'),
(105, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:51'),
(106, '', '', '', 0, '', '', -1, '2011-04-23 11:20:52'),
(107, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:52'),
(108, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:52'),
(109, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:52'),
(110, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:52'),
(111, '', '', '', 0, '', '', -1, '2011-04-23 11:20:54'),
(112, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:54'),
(113, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:54'),
(114, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:54'),
(115, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:54'),
(116, '', '', '', 0, '', '', -1, '2011-04-23 11:20:55'),
(117, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:55'),
(118, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:55'),
(119, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:55'),
(120, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:55'),
(121, '', '', '', 0, '', '', -1, '2011-04-23 11:20:57'),
(122, 'aaaaaaa', 'bbbbbb', 'cccccccc', 444, 'aaaaaaaaa', '', 1, '2011-04-23 11:20:57'),
(123, 'kjljljklj', 'ljljk', 'jljljl', 77777, 'jhkjhkjk', '', -1, '2011-04-23 11:20:57'),
(124, 'dasdassdas', 'sasdf', 'sdfsfsdf', 0, 'sfsfsfsf', 'DSCF1416.J', 1, '2011-04-23 11:20:57'),
(125, 'asdasd1', 'sdfdsfs1', 'sdfsdfs1', 11, 'fsdfdsfsf1', 'JPG', 1, '2011-04-23 11:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned NOT NULL,
  `payment_amount` varchar(100) NOT NULL,
  `extra_amount` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `payment_date` date DEFAULT NULL,
  `sys_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`),
  KEY `payment_FKIndex1` (`account_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `account_id`, `payment_amount`, `extra_amount`, `status`, `payment_date`, `sys_date`) VALUES
(1, 0, '', '', 1, '0000-00-00', '2011-04-23 12:37:39'),
(2, 0, '1111', '234', 1, '0000-00-00', '2011-04-23 12:41:47'),
(3, 10, '1111', '234', 1, '0000-00-00', '2011-04-23 12:46:10'),
(4, 0, '', '', 1, '0000-00-00', '2011-04-23 12:59:59'),
(5, 10, '22.22', '333', 1, '1982-03-12', '2011-04-23 13:09:11');
