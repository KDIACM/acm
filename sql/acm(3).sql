-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2011 at 06:26 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.8

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
  `garentee` mediumtext NOT NULL,
  `close_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sys_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`account_id`),
  KEY `account_FKIndex1` (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `customer_id`, `account_number`, `amount`, `rate`, `open_date`, `garentee`, `close_date`, `update_date`, `status`, `sys_date`) VALUES
(1, 2, '1234', '23000.00', '10', '2011-05-27', 'Charola\r\nWistika', NULL, '0000-00-00', 1, '2011-05-21 11:53:49'),
(2, 1, '1222', '34000', '10', '2011-05-27', 'This is a test', NULL, NULL, 1, '2011-05-21 12:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction`
--

CREATE TABLE IF NOT EXISTS `account_transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `owner` enum('me','customer') NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `account_transaction`
--

INSERT INTO `account_transaction` (`transaction_id`, `account_id`, `amount`, `owner`, `updated_date`, `created_date`) VALUES
(1, 1, '20000.00', 'me', '2011-05-21 11:53:49', '2011-05-21 11:53:49'),
(2, 1, '2000.00', 'me', '2011-05-21 11:55:17', '2011-05-21 11:55:17'),
(3, 1, '4000.00', 'me', '2011-05-21 11:55:33', '2011-05-21 11:55:33'),
(4, 1, '-3000.00', 'customer', '2011-05-21 11:55:53', '2011-05-21 11:55:53'),
(5, 2, '34000.00', 'me', '2011-05-21 12:30:17', '2011-05-21 12:30:17');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `user_name`, `user_password`, `status`, `sys_date`) VALUES
(11, 'desha', '5f1970f5bf52909ee77cd8f8c50bdd9f', 1, '2011-04-23 08:34:59'),
(12, 'fffff', 'adbc91a43e988a3b5b745b8529a90b61', 1, '2011-05-19 21:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(50) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `nick_name` varchar(200) DEFAULT NULL,
  `nic_number` int(10) unsigned DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `image_ext` varchar(10) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sys_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_code` (`customer_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_code`, `first_name`, `last_name`, `nick_name`, `nic_number`, `address`, `contact_no`, `image_ext`, `status`, `sys_date`) VALUES
(1, '1', 'Upul', 'kumara', 'lokumahathaya', 4294967295, 'matara', '12345678', '', 1, '2011-05-08 12:40:43'),
(2, '768', 'hkjhkjh', 'hkh', 'mbmbmnb', 737373, 'addadasasas', '78798', 'jpg', 1, '2011-05-18 20:47:06'),
(3, '1111', 'fname', 'lname', 'nick name', 2282828, 'address', '838383', 'jpg', 1, '2011-05-18 22:56:35'),
(4, '3333', 'hkhh', 'hkjh', 'khk', 0, 'kjhkhkh', 'hkhkjhk', 'jpg', 1, '2011-05-18 22:58:08');

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
  `paid_date` date DEFAULT NULL,
  `paid_amount` varchar(100) NOT NULL DEFAULT '0',
  `last_month_amount` varchar(100) NOT NULL DEFAULT '0',
  `rest_amount` varchar(100) NOT NULL DEFAULT '0',
  `extra_interest` varchar(100) NOT NULL DEFAULT '0',
  `sys_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`),
  KEY `payment_FKIndex1` (`account_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `account_id`, `payment_amount`, `extra_amount`, `status`, `payment_date`, `paid_date`, `paid_amount`, `last_month_amount`, `rest_amount`, `extra_interest`, `sys_date`) VALUES
(1, 0, '', '', 1, '0000-00-00', '0000-00-00', '', '', '0', '', '2011-05-21 12:38:58'),
(2, 2, '2300', '', 1, '2011-06-27', NULL, '0', '0', '320', '0', '2011-05-21 18:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `payment_option`
--

CREATE TABLE IF NOT EXISTS `payment_option` (
  `payment_option_id` int(20) NOT NULL AUTO_INCREMENT,
  `payment_id` int(20) NOT NULL,
  `paid_amount` varchar(100) NOT NULL DEFAULT '0',
  `paid_date` date DEFAULT NULL,
  `extra_amount` varchar(100) NOT NULL,
  `extra_Interest` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`payment_option_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_option`
--

INSERT INTO `payment_option` (`payment_option_id`, `payment_id`, `paid_amount`, `paid_date`, `extra_amount`, `extra_Interest`) VALUES
(1, 2, '1000', '2011-06-28', '', ''),
(2, 2, '1000', '2011-05-23', '20', '');
