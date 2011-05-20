-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2011 at 04:12 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

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
  `account_id` int(10) unsigned NOT NULL auto_increment,
  `customer_id` int(10) unsigned NOT NULL,
  `account_number` varchar(50) default NULL,
  `amount` varchar(100) default NULL,
  `rate` varchar(100) default NULL,
  `open_date` date default NULL,
  `close_date` date default NULL,
  `update_date` date default NULL,
  `status` tinyint(4) NOT NULL default '1',
  `sys_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`account_id`),
  KEY `account_FKIndex1` (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `customer_id`, `account_number`, `amount`, `rate`, `open_date`, `close_date`, `update_date`, `status`, `sys_date`) VALUES
(1, 1, '1', '25000', '10', '2011-02-08', NULL, NULL, 1, '2011-05-08 13:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `user_name` varchar(200) default NULL,
  `user_password` varchar(200) default NULL,
  `status` tinyint(4) NOT NULL default '1',
  `sys_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `user_name`, `user_password`, `status`, `sys_date`) VALUES
(11, 'desha', 'e99a18c428cb38d5f260853678922e03', 1, '2011-04-23 08:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) unsigned NOT NULL auto_increment,
  `customer_code` varchar(50) default NULL,
  `first_name` varchar(200) default NULL,
  `last_name` varchar(200) default NULL,
  `nick_name` varchar(200) default NULL,
  `nic_number` int(10) unsigned default NULL,
  `address` varchar(200) default NULL,
  `contact_no` varchar(100) default NULL,
  `image_ext` varchar(10) default NULL,
  `status` tinyint(4) NOT NULL default '1',
  `sys_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`customer_id`),
  UNIQUE KEY `customer_code` (`customer_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_code`, `first_name`, `last_name`, `nick_name`, `nic_number`, `address`, `contact_no`, `image_ext`, `status`, `sys_date`) VALUES
(1, '1', 'Upul', 'kumara', 'lokumahathaya', 4294967295, 'matara', '12345678', '', 1, '2011-05-08 12:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(10) unsigned NOT NULL auto_increment,
  `account_id` int(10) unsigned NOT NULL,
  `payment_amount` varchar(100) NOT NULL,
  `extra_amount` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL default '1',
  `payment_date` date default NULL,
  `paid_date` date default NULL,
  `paid_amount` varchar(100) NOT NULL default '0',
  `last_month_amount` varchar(100) NOT NULL default '0',
  `rest_amount` varchar(100) NOT NULL default '0',
  `extra_interest` varchar(100) NOT NULL default '0',
  `sys_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`payment_id`),
  KEY `payment_FKIndex1` (`account_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `account_id`, `payment_amount`, `extra_amount`, `status`, `payment_date`, `paid_date`, `paid_amount`, `last_month_amount`, `rest_amount`, `extra_interest`, `sys_date`) VALUES
(1, 0, '', '', 1, '0000-00-00', '0000-00-00', '', '', '0', '', '2011-05-08 13:57:47'),
(2, 0, '', '', 1, '0000-00-00', '0000-00-00', '', '', '0', '', '2011-05-08 13:59:40'),
(3, 0, '', '', 1, '0000-00-00', '0000-00-00', '', '', '0', '', '2011-05-08 14:00:14'),
(4, 0, '', '', 1, '0000-00-00', '0000-00-00', '', '', '0', '', '2011-05-08 14:01:58'),
(5, 1, '2500', '250', 1, '2011-03-08', '0000-00-00', '', '', '2750', '', '2011-05-08 14:07:29'),
(6, 0, '', '', 1, '0000-00-00', '0000-00-00', '', '', '0', '', '2011-05-08 14:08:18'),
(7, 1, '2500', '500', 1, '2011-04-08', '2011-04-05', '500', '2750', '5250', '', '2011-05-08 14:10:31'),
(8, 0, '', '', 1, '0000-00-00', '0000-00-00', '', '', '0', '', '2011-05-08 14:10:57'),
(9, 1, '2500', '0', 1, '2011-05-08', '2011-04-30', '750', '5250', '7000', '', '2011-05-08 14:14:38'),
(10, 0, '', '', 1, '0000-00-00', '0000-00-00', '', '', '0', '', '2011-05-08 14:33:09'),
(11, 0, '', '', 1, '0000-00-00', '0000-00-00', '', '', '0', '', '2011-05-08 14:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `payment_option`
--

CREATE TABLE IF NOT EXISTS `payment_option` (
  `payment_option` int(20) NOT NULL auto_increment,
  `paid_amount` varchar(100) NOT NULL default '0',
  `paid_date` date default NULL,
  `extra_Interest` varchar(100) NOT NULL default '0',
  PRIMARY KEY  (`payment_option`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payment_option`
--

