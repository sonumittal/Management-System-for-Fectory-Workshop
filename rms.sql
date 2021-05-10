-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2020 at 06:24 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_remaining_paid_to_seller_record`
--

DROP TABLE IF EXISTS `advance_remaining_paid_to_seller_record`;
CREATE TABLE IF NOT EXISTS `advance_remaining_paid_to_seller_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paid_date` date NOT NULL,
  `seller_profile_s_no_id` varchar(30) NOT NULL,
  `seller_name` varchar(30) NOT NULL,
  `seller_code` varchar(30) NOT NULL,
  `company_factory_other_name` varchar(40) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `advance_remainning_paid` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advance_remaining_paid_to_seller_record`
--

INSERT INTO `advance_remaining_paid_to_seller_record` (`id`, `paid_date`, `seller_profile_s_no_id`, `seller_name`, `seller_code`, `company_factory_other_name`, `remark`, `advance_remainning_paid`) VALUES
(5, '2020-05-17', '12', 'Gyandu Khatiwora', '3798524', 'Gd Enterprise', 'Remaining Paid', '17000');

-- --------------------------------------------------------

--
-- Table structure for table `employee_advance_remaining_recored`
--

DROP TABLE IF EXISTS `employee_advance_remaining_recored`;
CREATE TABLE IF NOT EXISTS `employee_advance_remaining_recored` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paid_date` date NOT NULL,
  `employee_profile_s_no_id` varchar(10) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_code` varchar(30) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `advance_remainning_paid` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_advance_remaining_recored`
--

INSERT INTO `employee_advance_remaining_recored` (`id`, `paid_date`, `employee_profile_s_no_id`, `emp_name`, `emp_code`, `remark`, `advance_remainning_paid`) VALUES
(21, '2020-05-17', '41', 'Sandeep Biswas', '3373695', 'For Beer', '1000'),
(20, '2020-05-17', '40', 'ASHIM MONDAL', '8265323', 'Remaining Paid', '0500');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance_salary`
--

DROP TABLE IF EXISTS `employee_attendance_salary`;
CREATE TABLE IF NOT EXISTS `employee_attendance_salary` (
  `date_record_id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `employee_profile_s_no_id` int(10) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_code` varchar(30) NOT NULL,
  `attendance` varchar(30) NOT NULL,
  `one_day_salary` varchar(30) NOT NULL,
  `paid_unpaid_salary` varchar(30) NOT NULL,
  PRIMARY KEY (`date_record_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_attendance_salary`
--

INSERT INTO `employee_attendance_salary` (`date_record_id`, `date`, `employee_profile_s_no_id`, `emp_name`, `emp_code`, `attendance`, `one_day_salary`, `paid_unpaid_salary`) VALUES
(26, '2020-05-17', 41, 'Sandeep Biswas', '3373695', 'Present', '500', 'Paid'),
(25, '2020-05-17', 40, 'ASHIM MONDAL', '8265323', 'Present', '500', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `employee_bonus_record`
--

DROP TABLE IF EXISTS `employee_bonus_record`;
CREATE TABLE IF NOT EXISTS `employee_bonus_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paid_date` date NOT NULL,
  `employee_profile_s_no_id` varchar(10) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_code` varchar(30) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `paid_bonus` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_bonus_record`
--

INSERT INTO `employee_bonus_record` (`id`, `paid_date`, `employee_profile_s_no_id`, `emp_name`, `emp_code`, `remark`, `paid_bonus`) VALUES
(1, '2020-05-17', '41', 'Sandeep Biswas', '3373695', 'Bonus Diwali', '500'),
(2, '2020-05-17', '41', 'Sandeep Biswas', '3373695', 'Bonus', '0'),
(3, '2020-05-17', '40', 'ASHIM MONDAL', '8265323', 'Bonus', '600'),
(4, '2020-05-17', '40', 'ASHIM MONDAL', '8265323', 'Bonus', '500'),
(5, '2020-05-17', '41', 'Sandeep Biswas', '3373695', 'Bonus kela', '10');

-- --------------------------------------------------------

--
-- Table structure for table `employee_profile`
--

DROP TABLE IF EXISTS `employee_profile`;
CREATE TABLE IF NOT EXISTS `employee_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(30) NOT NULL,
  `emp_first_name` varchar(30) NOT NULL,
  `emp_last_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(20) NOT NULL,
  `emp_contact_no` varchar(30) NOT NULL,
  `emp_full_address` varchar(50) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `joining_date_time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_profile`
--

INSERT INTO `employee_profile` (`id`, `emp_code`, `emp_first_name`, `emp_last_name`, `gender`, `age`, `emp_contact_no`, `emp_full_address`, `experience`, `joining_date_time`) VALUES
(41, '3373695', 'Sandeep', 'Biswas', 'Male', '25', '1234567890', 'Tinisukia', '5 Year', '2020-05-17'),
(40, '8265323', 'ASHIM', 'MONDAL', 'Male', '25', '7896495647', 'Barpeta,Assam', '1 Year', '2020-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_time` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_name`, `password`, `date_time`) VALUES
(1, 'sonu_mittal', 'sonu1', '2020-05-05 22:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `purchaing_from_seller`
--

DROP TABLE IF EXISTS `purchaing_from_seller`;
CREATE TABLE IF NOT EXISTS `purchaing_from_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `seller_profile_s_no_id` varchar(30) NOT NULL,
  `seller_name` varchar(30) NOT NULL,
  `seller_code` varchar(30) NOT NULL,
  `company_factory_other_name` varchar(50) NOT NULL,
  `goods_name` varchar(40) NOT NULL,
  `goods_in_unit` varchar(50) NOT NULL,
  `rate_per_unit` varchar(20) NOT NULL,
  `total_money_of_purchase` varchar(40) NOT NULL,
  `quality_percent_of_goods` varchar(20) NOT NULL,
  `paid_money_to_seller_at_purchasing_time` varchar(30) NOT NULL,
  `remark` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaing_from_seller`
--

INSERT INTO `purchaing_from_seller` (`id`, `date`, `seller_profile_s_no_id`, `seller_name`, `seller_code`, `company_factory_other_name`, `goods_name`, `goods_in_unit`, `rate_per_unit`, `total_money_of_purchase`, `quality_percent_of_goods`, `paid_money_to_seller_at_purchasing_time`, `remark`) VALUES
(8, '2020-05-17', '12', 'Gyandu Khatiwora', '3798524', 'Gd Enterprise', 'Raw Tea', '200', '150', '30000', '30', '15000', 'Tea Purchasing'),
(7, '2020-05-17', '12', 'Gyandu Khatiwora', '3798524', 'Gd Enterprise', 'Raw Tea', '100', '120', '12000', '25', '10000', 'Tea Purchasing');

-- --------------------------------------------------------

--
-- Table structure for table `seller_profile`
--

DROP TABLE IF EXISTS `seller_profile`;
CREATE TABLE IF NOT EXISTS `seller_profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `seller_profile_uniqe_code` varchar(10) NOT NULL,
  `seller_first_name` varchar(30) NOT NULL,
  `seller_last_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(20) NOT NULL,
  `seller_company_factory_other_name` varchar(40) NOT NULL,
  `seller_contact_no` varchar(15) NOT NULL,
  `seller_full_address` varchar(50) NOT NULL,
  `seller_profile_creation_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_profile`
--

INSERT INTO `seller_profile` (`id`, `seller_profile_uniqe_code`, `seller_first_name`, `seller_last_name`, `gender`, `age`, `seller_company_factory_other_name`, `seller_contact_no`, `seller_full_address`, `seller_profile_creation_date`) VALUES
(12, '3798524', 'Gyandu', 'Khatiwora', 'Female', '24', 'Gd Enterprise', '0000000000000', 'Dibrugarh', '2020-05-17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
