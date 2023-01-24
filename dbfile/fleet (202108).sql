-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2021 at 08:51 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleet`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_management`
--

DROP TABLE IF EXISTS `account_management`;
CREATE TABLE IF NOT EXISTS `account_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job_destination` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(6) NOT NULL,
  `created_at` timestamp(6) NOT NULL,
  `updated_by` int(6) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_id` varchar(255) NOT NULL,
  `equipment_category` int(11) NOT NULL,
  `equipment_type` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year_model` varchar(255) DEFAULT NULL,
  `chassis_number` varchar(255) DEFAULT NULL,
  `plate_number` varchar(255) DEFAULT NULL,
  `engine_model` varchar(255) DEFAULT NULL,
  `purchase_amount` decimal(20,2) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `odometer_on_register` decimal(20,2) DEFAULT '0.00',
  `net_capacity` text,
  `other_descriptors` text,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pms_type` int(5) DEFAULT NULL,
  `current_location` varchar(255) DEFAULT NULL,
  `current_odometer` decimal(20,2) DEFAULT '0.00',
  `current_km` decimal(20,2) DEFAULT '0.00',
  `current_hr` decimal(20,2) DEFAULT '0.00',
  `running_odometer` decimal(20,2) NOT NULL DEFAULT '0.00',
  `running_km` decimal(20,2) NOT NULL DEFAULT '0.00',
  `running_hr` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pms_status` varchar(255) NOT NULL DEFAULT 'Not Yet' COMMENT '0=Not Yet, 1=Needs PMS, 2=On Going',
  `last_pms` date DEFAULT NULL,
  `pms_last_used` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment_id`, `equipment_category`, `equipment_type`, `brand`, `model`, `year_model`, `chassis_number`, `plate_number`, `engine_model`, `purchase_amount`, `purchase_date`, `odometer_on_register`, `net_capacity`, `other_descriptors`, `created_at`, `created_by`, `updated_by`, `updated_at`, `pms_type`, `current_location`, `current_odometer`, `current_km`, `current_hr`, `running_odometer`, `running_km`, `running_hr`, `pms_status`, `last_pms`, `pms_last_used`, `status`) VALUES
(1, 'T-D20217-897WS3FN', 1, 2, 'Isuzu', 'Model One', '2008', 'CH001', 'PN001', 'EM001', '800000.00', '2021-07-28', '25.00', '50 tons', 'White', '2021-07-28 20:00:47', 1, NULL, NULL, 2, '', '345.00', '345.00', '7.00', '345.00', '345.00', '7.00', 'Not Yet', '2021-07-29', 4, 'Active'),
(2, 'T-D20217-WT2ES3A', 1, 2, 'Man', 'Model 2', '2020', 'CN002', 'PN002', 'EM002', '1000000.00', '2021-07-27', '20.00', '100 Tons', 'White Blue', '2021-07-28 20:02:55', 1, NULL, NULL, 2, '2', '219.00', '219.00', '5.00', '219.00', '219.00', '5.00', 'Not Yet', NULL, NULL, 'Active'),
(3, 'F20217-QSFTR208', 2, 5, 'Toyota', 'Model 3', '2021', 'CN003', 'PN003', 'EM003', '340000.00', '2021-07-26', '5.00', '8 Tons', 'red', '2021-07-28 20:04:55', 1, NULL, NULL, 1, '2', '14.00', '14.00', '4.00', '14.00', '14.00', '4.00', 'Not Yet', NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_category`
--

DROP TABLE IF EXISTS `equipment_category`;
CREATE TABLE IF NOT EXISTS `equipment_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `plate_number` varchar(255) DEFAULT 'No',
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_category`
--

INSERT INTO `equipment_category` (`id`, `type`, `plate_number`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Transport Equipment', 'Yes', 0, 1, '2021-07-15 18:24:36', 1, '2021-07-19 16:26:17'),
(2, 'Construction Equipment', 'No', 0, 1, '2021-07-15 18:27:53', NULL, NULL),
(3, 'Storage and Equipment', 'No', 0, 1, '2021-07-15 18:28:27', NULL, NULL),
(4, 'Processing Plant', 'No', 0, 1, '2021-07-15 18:30:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_type`
--

DROP TABLE IF EXISTS `equipment_type`;
CREATE TABLE IF NOT EXISTS `equipment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_category` int(11) NOT NULL COMMENT 'fleet_type_id',
  `equipment_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_type`
--

INSERT INTO `equipment_type` (`id`, `equipment_category`, `equipment_type`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 'Asphalt Distributor', 0, 1, '2021-07-20 00:42:32', NULL, NULL),
(2, 1, 'Truck - Dump', 0, 1, '2021-07-20 00:44:04', NULL, NULL),
(3, 1, 'Truck - Fuel', 0, 1, '2021-07-20 00:44:31', NULL, NULL),
(4, 2, 'Asphalt Paver', 0, 1, '2021-07-20 01:03:47', NULL, NULL),
(5, 2, 'Forklift', 0, 1, '2021-07-20 01:04:08', NULL, NULL),
(6, 3, 'Container', 0, 1, '2021-07-20 01:04:46', NULL, NULL),
(7, 4, 'Crusher', 1, 1, '2021-07-20 01:05:06', 1, '2021-07-20 01:11:22'),
(8, 4, 'Asphalt Melter', 0, 1, '2021-07-20 01:05:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fleet_maintenance_cost`
--

DROP TABLE IF EXISTS `fleet_maintenance_cost`;
CREATE TABLE IF NOT EXISTS `fleet_maintenance_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fleet_equipment` int(11) NOT NULL,
  `job_order_id` int(11) NOT NULL,
  `maintenance_cost` decimal(20,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

DROP TABLE IF EXISTS `job_order`;
CREATE TABLE IF NOT EXISTS `job_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnostics_id` varchar(255) DEFAULT NULL,
  `pms_used` int(11) DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `equipment_category` int(11) DEFAULT NULL,
  `equipment_type` int(11) DEFAULT NULL,
  `reported_by` int(11) DEFAULT NULL,
  `reported_date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `labor_type` varchar(255) DEFAULT NULL,
  `running_km` decimal(20,2) DEFAULT NULL,
  `running_hr` decimal(20,2) DEFAULT NULL,
  `problems_encountered` text,
  `inspected_by` int(11) DEFAULT NULL,
  `details_of_work_done` text,
  `conducted_by` int(11) DEFAULT NULL,
  `labor_date_started` date DEFAULT NULL,
  `labor_time_started` time DEFAULT NULL,
  `labor_date_completed` date DEFAULT NULL,
  `labor_time_completed` time DEFAULT NULL,
  `trial_result` text,
  `trial_personnel` int(11) DEFAULT NULL,
  `trial_at` datetime DEFAULT NULL,
  `accepted_by` int(11) DEFAULT NULL,
  `accepted_at` datetime DEFAULT NULL,
  `noted_by` int(11) DEFAULT NULL,
  `noted_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Created',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`id`, `diagnostics_id`, `pms_used`, `equipment_id`, `equipment_category`, `equipment_type`, `reported_by`, `reported_date`, `location`, `labor_type`, `running_km`, `running_hr`, `problems_encountered`, `inspected_by`, `details_of_work_done`, `conducted_by`, `labor_date_started`, `labor_time_started`, `labor_date_completed`, `labor_time_completed`, `trial_result`, `trial_personnel`, `trial_at`, `accepted_by`, `accepted_at`, `noted_by`, `noted_at`, `status`) VALUES
(1, 'DI20217-C3SNDOBD', 4, 1, 1, 2, 3, '2021-07-29', '1', 'Auto Electrical', '345.00', '7.00', 'pe', 2, 'dwd', 2, '2021-01-29', '04:00:00', '2021-01-30', '05:00:00', 'ok1', 1, '2021-07-29 07:01:00', 1, '2021-07-29 05:50:26', 1, '2021-07-29 06:09:25', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `job_order_backup`
--

DROP TABLE IF EXISTS `job_order_backup`;
CREATE TABLE IF NOT EXISTS `job_order_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fleet_equipment` int(11) NOT NULL,
  `job_order_date` date DEFAULT NULL,
  `driver_operator` int(11) DEFAULT NULL,
  `job_order_no` varchar(255) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `labor_type` varchar(255) DEFAULT NULL,
  `problems_encountered` text,
  `inspected_by` int(11) DEFAULT NULL,
  `details_of_work_done` text,
  `conducted_by` int(11) DEFAULT NULL,
  `labor_date_started` date DEFAULT NULL,
  `labor_date_completed` date DEFAULT NULL,
  `labor_time_started` time DEFAULT NULL,
  `labor_time_completed` time DEFAULT NULL,
  `trial_personnel` int(11) DEFAULT NULL,
  `trial_date` date DEFAULT NULL,
  `trial_result` text,
  `accepted_by` int(11) DEFAULT NULL,
  `accepted_date` date DEFAULT NULL,
  `noted_by` int(11) DEFAULT NULL,
  `noted_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'On Going',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_order_item`
--

DROP TABLE IF EXISTS `job_order_item`;
CREATE TABLE IF NOT EXISTS `job_order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jo_main` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `purchased_price` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_order_item`
--

INSERT INTO `job_order_item` (`id`, `jo_main`, `item_id`, `qty`, `unit`, `purchased_price`) VALUES
(1, 1, 1, 1, 'bottle', '1000.00'),
(5, 1, 5, 1, 'bottle', '555.00'),
(3, 1, 3, 1, 'bottle', '300.00'),
(4, 1, 4, 1, 'bottle', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `job_order_item_backup`
--

DROP TABLE IF EXISTS `job_order_item_backup`;
CREATE TABLE IF NOT EXISTS `job_order_item_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jo_main` int(11) NOT NULL,
  `pms_type_item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `reference_id` varchar(255) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp(6) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'TGY1 - Tagaytay Site 1', 1, '2021-07-15 18:09:39.000000', NULL, NULL),
(2, 'MOQ - Main Office Quezon City', 1, '2021-07-15 18:10:05.000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_04_15_055743_add_role_to_users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `module_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `requested_action` varchar(255) NOT NULL,
  `requested_by` int(11) NOT NULL,
  `requested_at` datetime NOT NULL,
  `done_by` int(11) DEFAULT NULL,
  `done_at` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `module`, `module_id`, `url`, `tag`, `requested_action`, `requested_by`, `requested_at`, `done_by`, `done_at`, `status`) VALUES
(1, 'Operations and Utilization Report', 1, 'viewDispatchTripping=mcukBsRETf1LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq', NULL, 'Completed', 2, '2021-07-28 20:22:04', 1, '2021-07-28 21:04:29', 'Completed'),
(2, 'Operations and Utilization Report', 1, 'viewDispatchTripping=mcukBsRETf1LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq', NULL, 'Completed', 1, '2021-07-28 20:22:14', 1, '2021-07-28 21:04:29', 'Completed'),
(3, 'Preventive Maintenance Warning', 1, 'preventivemaintenance', NULL, 'Completed', 1, '2021-07-28 21:04:29', 1, '2021-07-29 04:02:05', 'Completed'),
(4, 'Ongoing JO', 1, 'viewJobOrder=kgTcLtGsKT1HmYYKpuQykDbTVqaWGFfPnMKncnxTmbutcMexHe', ' for Isuzu-T-D20217-897WS3FN', 'For Checking', 1, '2021-07-29 04:02:05', 1, '2021-07-29 05:50:26', 'Completed'),
(5, 'Ongoing JO', 1, 'viewJobOrder=kgTcLtGsKT1HmYYKpuQykDbTVqaWGFfPnMKncnxTmbutcMexHe', 'for Isuzu-T-D20217-897WS3FN', 'For Review', 1, '2021-07-29 05:50:26', 1, '2021-07-29 06:09:25', 'Completed'),
(6, 'Equipment Maintenance Successful', 1, 'equipmentRegister', 'for Isuzu-T-D20217-897WS3FN', 'Maintenance Completed', 1, '2021-07-29 06:09:25', 1, '2021-07-29 06:09:25', 'Completed'),
(7, 'Operations and Utilization Report', 2, 'viewDispatchTripping=mcukBsRETf2LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq', NULL, 'Completed', 2, '2021-07-29 08:40:38', 1, '2021-07-29 08:40:52', 'Completed'),
(8, 'Operations and Utilization Report', 2, 'viewDispatchTripping=mcukBsRETf2LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq', NULL, 'Completed', 1, '2021-07-29 08:40:48', 1, '2021-07-29 08:40:52', 'Completed'),
(9, 'Operations and Utilization Report', 3, 'viewDispatchTripping=mcukBsRETf3LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq', NULL, 'Completed', 2, '2021-07-29 19:05:00', 1, '2021-07-29 19:05:15', 'Completed'),
(10, 'Operations and Utilization Report', 3, 'viewDispatchTripping=mcukBsRETf3LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq', NULL, 'Completed', 1, '2021-07-29 19:05:10', 1, '2021-07-29 19:05:15', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `operations_dispatch_tripping_main`
--

DROP TABLE IF EXISTS `operations_dispatch_tripping_main`;
CREATE TABLE IF NOT EXISTS `operations_dispatch_tripping_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_type` int(11) DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `odt_date` date DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `fuel_consumption` decimal(20,2) DEFAULT NULL,
  `odometer_start` decimal(20,2) DEFAULT NULL,
  `odometer_end` decimal(20,2) DEFAULT NULL,
  `odometer_total` decimal(20,2) DEFAULT NULL,
  `equipment_concern_issue` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `checked_by` int(11) DEFAULT NULL,
  `checked_at` datetime DEFAULT NULL,
  `reviewed_by` int(11) DEFAULT NULL,
  `reviewed_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Created',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operations_dispatch_tripping_main`
--

INSERT INTO `operations_dispatch_tripping_main` (`id`, `equipment_type`, `equipment_id`, `odt_date`, `location`, `operator`, `fuel_consumption`, `odometer_start`, `odometer_end`, `odometer_total`, `equipment_concern_issue`, `created_by`, `created_at`, `updated_by`, `updated_at`, `checked_by`, `checked_at`, `reviewed_by`, `reviewed_at`, `status`) VALUES
(1, 2, 1, '2021-07-28', 1, 2, '55.00', '25.00', '355.00', '330.00', 'none', 1, '2021-07-28 20:22:04', NULL, NULL, 1, '2021-07-28 20:22:14', 1, '2021-07-28 21:04:29', 'Reviewed'),
(2, 2, 2, '2021-05-29', 2, 2, '105.00', '1.00', '200.00', '199.00', 'none', 1, '2021-07-29 08:40:38', NULL, NULL, 1, '2021-07-29 08:40:48', 1, '2021-07-29 08:40:52', 'Reviewed'),
(3, 5, 3, '2021-01-12', 2, 2, '3.00', '1.00', '10.00', '9.00', 'none', 1, '2021-07-29 19:05:00', NULL, NULL, 1, '2021-07-29 19:05:10', 1, '2021-07-29 19:05:15', 'Reviewed');

-- --------------------------------------------------------

--
-- Table structure for table `operations_dispatch_tripping_secondary`
--

DROP TABLE IF EXISTS `operations_dispatch_tripping_secondary`;
CREATE TABLE IF NOT EXISTS `operations_dispatch_tripping_secondary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `odtm_main` int(11) NOT NULL,
  `hourly_stamp` varchar(255) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `remarks` text,
  `checker_review_remarks` text,
  `checker_review_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operations_dispatch_tripping_secondary`
--

INSERT INTO `operations_dispatch_tripping_secondary` (`id`, `odtm_main`, `hourly_stamp`, `activity`, `remarks`, `checker_review_remarks`, `checker_review_status`, `status`) VALUES
(1, 1, '12:00-1:00 am', NULL, NULL, NULL, 'Approved', 0),
(2, 1, '1:00-2:00 am', NULL, NULL, NULL, 'Approved', 0),
(3, 1, '2:00-3:00 am', NULL, NULL, NULL, 'Approved', 0),
(4, 1, '3:00-4:00 am', NULL, NULL, NULL, 'Approved', 0),
(5, 1, '4:00-5:00 am', NULL, NULL, NULL, 'Approved', 0),
(6, 1, '5:00-6:00 am', NULL, NULL, NULL, 'Approved', 0),
(7, 1, '6:00-7:00 am', 'Operational', 'a', NULL, 'Approved', 0),
(8, 1, '7:00-8:00 am', 'Operational', 'b', NULL, 'Approved', 0),
(9, 1, '8:00-9:00 am', 'Operational', 'c', NULL, 'Approved', 0),
(10, 1, '9:00-10:00 am', 'Operational', 'd', NULL, 'Approved', 0),
(11, 1, '10:00-11:00 am', 'Standby', 'e', NULL, 'Approved', 0),
(12, 1, '11:00-12:00 pm', 'Operational', 'f', NULL, 'Approved', 0),
(13, 1, '12:00-1:00 pm', 'Operational', 'g', NULL, 'Approved', 0),
(14, 1, '1:00-2:00 pm', 'Operational', 'h', NULL, 'Approved', 0),
(15, 1, '2:00-3:00 pm', NULL, NULL, NULL, 'Approved', 0),
(16, 1, '3:00-4:00 pm', NULL, NULL, NULL, 'Approved', 0),
(17, 1, '4:00-5:00 pm', NULL, NULL, NULL, 'Approved', 0),
(18, 1, '5:00-6:00 pm', NULL, NULL, NULL, 'Approved', 0),
(19, 1, '6:00-7:00 pm', NULL, NULL, NULL, 'Approved', 0),
(20, 1, '7:00-8:00 pm', NULL, NULL, NULL, 'Approved', 0),
(21, 1, '8:00-9:00 pm', NULL, NULL, NULL, 'Approved', 0),
(22, 1, '9:00-10:00 pm', NULL, NULL, NULL, 'Approved', 0),
(23, 1, '10:00-11:00 pm', NULL, NULL, NULL, 'Approved', 0),
(24, 1, '11:00-12:00 am', NULL, NULL, NULL, 'Approved', 0),
(25, 2, '12:00-1:00 am', NULL, NULL, NULL, 'Approved', 0),
(26, 2, '1:00-2:00 am', NULL, NULL, NULL, 'Approved', 0),
(27, 2, '2:00-3:00 am', NULL, NULL, NULL, 'Approved', 0),
(28, 2, '3:00-4:00 am', NULL, NULL, NULL, 'Approved', 0),
(29, 2, '4:00-5:00 am', NULL, NULL, NULL, 'Approved', 0),
(30, 2, '5:00-6:00 am', NULL, NULL, NULL, 'Approved', 0),
(31, 2, '6:00-7:00 am', NULL, NULL, NULL, 'Approved', 0),
(32, 2, '7:00-8:00 am', 'Operational', '1', NULL, 'Approved', 0),
(33, 2, '8:00-9:00 am', 'Operational', '2', NULL, 'Approved', 0),
(34, 2, '9:00-10:00 am', 'Operational', '3', NULL, 'Approved', 0),
(35, 2, '10:00-11:00 am', 'Operational', '4', NULL, 'Approved', 0),
(36, 2, '11:00-12:00 pm', 'Operational', '5', NULL, 'Approved', 0),
(37, 2, '12:00-1:00 pm', 'Breakdown/Repair', '6', NULL, 'Approved', 0),
(38, 2, '1:00-2:00 pm', NULL, NULL, NULL, 'Approved', 0),
(39, 2, '2:00-3:00 pm', NULL, NULL, NULL, 'Approved', 0),
(40, 2, '3:00-4:00 pm', NULL, NULL, NULL, 'Approved', 0),
(41, 2, '4:00-5:00 pm', NULL, NULL, NULL, 'Approved', 0),
(42, 2, '5:00-6:00 pm', NULL, NULL, NULL, 'Approved', 0),
(43, 2, '6:00-7:00 pm', NULL, NULL, NULL, 'Approved', 0),
(44, 2, '7:00-8:00 pm', NULL, NULL, NULL, 'Approved', 0),
(45, 2, '8:00-9:00 pm', NULL, NULL, NULL, 'Approved', 0),
(46, 2, '9:00-10:00 pm', NULL, NULL, NULL, 'Approved', 0),
(47, 2, '10:00-11:00 pm', NULL, NULL, NULL, 'Approved', 0),
(48, 2, '11:00-12:00 am', NULL, NULL, NULL, 'Approved', 0),
(49, 3, '12:00-1:00 am', NULL, NULL, NULL, 'Approved', 0),
(50, 3, '1:00-2:00 am', NULL, NULL, NULL, 'Approved', 0),
(51, 3, '2:00-3:00 am', NULL, NULL, NULL, 'Approved', 0),
(52, 3, '3:00-4:00 am', NULL, NULL, NULL, 'Approved', 0),
(53, 3, '4:00-5:00 am', NULL, NULL, NULL, 'Approved', 0),
(54, 3, '5:00-6:00 am', 'Operational', '1', NULL, 'Approved', 0),
(55, 3, '6:00-7:00 am', 'Operational', '1', NULL, 'Approved', 0),
(56, 3, '7:00-8:00 am', 'Operational', '1', NULL, 'Approved', 0),
(57, 3, '8:00-9:00 am', 'Operational', '1', NULL, 'Approved', 0),
(58, 3, '9:00-10:00 am', NULL, NULL, NULL, 'Approved', 0),
(59, 3, '10:00-11:00 am', NULL, NULL, NULL, 'Approved', 0),
(60, 3, '11:00-12:00 pm', NULL, NULL, NULL, 'Approved', 0),
(61, 3, '12:00-1:00 pm', NULL, NULL, NULL, 'Approved', 0),
(62, 3, '1:00-2:00 pm', NULL, NULL, NULL, 'Approved', 0),
(63, 3, '2:00-3:00 pm', NULL, NULL, NULL, 'Approved', 0),
(64, 3, '3:00-4:00 pm', NULL, NULL, NULL, 'Approved', 0),
(65, 3, '4:00-5:00 pm', NULL, NULL, NULL, 'Approved', 0),
(66, 3, '5:00-6:00 pm', NULL, NULL, NULL, 'Approved', 0),
(67, 3, '6:00-7:00 pm', NULL, NULL, NULL, 'Approved', 0),
(68, 3, '7:00-8:00 pm', NULL, NULL, NULL, 'Approved', 0),
(69, 3, '8:00-9:00 pm', NULL, NULL, NULL, 'Approved', 0),
(70, 3, '9:00-10:00 pm', NULL, NULL, NULL, 'Approved', 0),
(71, 3, '10:00-11:00 pm', NULL, NULL, NULL, 'Approved', 0),
(72, 3, '11:00-12:00 am', NULL, NULL, NULL, 'Approved', 0);

-- --------------------------------------------------------

--
-- Table structure for table `operations_dispatch_tripping_summary`
--

DROP TABLE IF EXISTS `operations_dispatch_tripping_summary`;
CREATE TABLE IF NOT EXISTS `operations_dispatch_tripping_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `odtm_main` int(11) NOT NULL,
  `equipment_category` int(11) NOT NULL,
  `equipment_type` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `gas` decimal(20,2) DEFAULT '0.00',
  `km` decimal(20,2) DEFAULT '0.00',
  `operational` decimal(20,2) DEFAULT '0.00',
  `standby` decimal(20,2) DEFAULT '0.00',
  `breakdown` decimal(20,2) DEFAULT '0.00',
  `location_used` int(11) NOT NULL,
  `date_used` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operations_dispatch_tripping_summary`
--

INSERT INTO `operations_dispatch_tripping_summary` (`id`, `odtm_main`, `equipment_category`, `equipment_type`, `equipment_id`, `gas`, `km`, `operational`, `standby`, `breakdown`, `location_used`, `date_used`) VALUES
(1, 1, 1, 2, 1, '55.00', '330.00', '7.00', '1.00', '0.00', 1, '2021-07-28'),
(2, 2, 1, 2, 2, '105.00', '199.00', '5.00', '0.00', '1.00', 2, '2021-05-29'),
(3, 3, 2, 5, 3, '3.00', '9.00', '4.00', '0.00', '0.00', 2, '2021-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pms_main_var`
--

DROP TABLE IF EXISTS `pms_main_var`;
CREATE TABLE IF NOT EXISTS `pms_main_var` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pms_main` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_main_var`
--

INSERT INTO `pms_main_var` (`id`, `pms_main`, `status`) VALUES
(1, 'Per Hour', 0),
(2, 'Per Kilometer', 0),
(3, 'Specific Date', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pms_type`
--

DROP TABLE IF EXISTS `pms_type`;
CREATE TABLE IF NOT EXISTS `pms_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pms_main_var` int(255) NOT NULL,
  `pms_milestone` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_type`
--

INSERT INTO `pms_type` (`id`, `pms_main_var`, `pms_milestone`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, '200', 1, '2021-07-19 08:35:05', NULL, NULL),
(2, 1, '300', 1, '2021-07-19 08:46:17', NULL, NULL),
(3, 2, '250', 1, '2021-07-19 08:46:36', NULL, NULL),
(4, 2, '350', 1, '2021-07-19 08:48:21', NULL, NULL),
(5, 3, '2026-07-19', 1, '2021-07-19 08:49:00', NULL, NULL),
(6, 1, '400', 1, '2021-07-19 08:51:52', NULL, NULL),
(7, 1, '500', 1, '2021-07-19 08:51:59', NULL, NULL),
(8, 1, '600', 1, '2021-07-19 08:52:08', NULL, NULL),
(9, 1, '700', 1, '2021-07-19 08:52:16', NULL, NULL),
(10, 1, '800', 1, '2021-07-19 08:52:23', NULL, NULL),
(11, 1, '900', 1, '2021-07-19 08:52:30', NULL, NULL),
(12, 2, '450', 1, '2021-07-19 08:52:49', NULL, NULL),
(13, 2, '550', 1, '2021-07-19 08:52:55', NULL, NULL),
(14, 2, '650', 1, '2021-07-19 08:53:02', NULL, NULL),
(15, 2, '750', 1, '2021-07-19 08:53:07', NULL, NULL),
(16, 2, '850', 1, '2021-07-19 08:53:14', NULL, NULL),
(17, 2, '950', 1, '2021-07-19 08:53:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pms_type_item`
--

DROP TABLE IF EXISTS `pms_type_item`;
CREATE TABLE IF NOT EXISTS `pms_type_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pms_id` int(11) NOT NULL,
  `warehouse_item` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_type_item`
--

INSERT INTO `pms_type_item` (`id`, `pms_id`, `warehouse_item`, `amount`, `remarks`, `updated_by`, `updated_at`, `status`) VALUES
(1, 1, 1, '1', NULL, NULL, NULL, '0'),
(2, 2, 1, '1', NULL, NULL, NULL, '0'),
(3, 2, 2, '1', NULL, NULL, NULL, '0'),
(4, 6, 1, '1', NULL, NULL, NULL, '0'),
(5, 6, 2, '1', NULL, NULL, NULL, '0'),
(6, 6, 3, '1', NULL, NULL, NULL, '0'),
(7, 7, 1, '1', NULL, NULL, NULL, '0'),
(8, 7, 2, '1', NULL, NULL, NULL, '0'),
(9, 7, 3, '1', NULL, NULL, NULL, '0'),
(10, 7, 4, '1', NULL, NULL, NULL, '0'),
(11, 8, 1, '1', NULL, NULL, NULL, '0'),
(12, 8, 2, '1', NULL, NULL, NULL, '0'),
(13, 8, 3, '1', NULL, NULL, NULL, '0'),
(14, 8, 4, '1', NULL, NULL, NULL, '0'),
(15, 8, 5, '1', NULL, NULL, NULL, '0'),
(16, 9, 1, '1', NULL, NULL, NULL, '0'),
(17, 9, 2, '1', NULL, NULL, NULL, '0'),
(18, 9, 3, '1', NULL, NULL, NULL, '0'),
(19, 9, 4, '1', NULL, NULL, NULL, '0'),
(20, 9, 5, '1', NULL, NULL, NULL, '0'),
(21, 9, 6, '1', NULL, NULL, NULL, '0'),
(22, 10, 1, '1', NULL, NULL, NULL, '0'),
(23, 10, 2, '1', NULL, NULL, NULL, '0'),
(24, 10, 3, '1', NULL, NULL, NULL, '0'),
(25, 10, 4, '1', NULL, NULL, NULL, '0'),
(26, 10, 5, '1', NULL, NULL, NULL, '0'),
(27, 10, 6, '1', NULL, NULL, NULL, '0'),
(28, 10, 7, '1', NULL, NULL, NULL, '0'),
(29, 3, 1, '1', NULL, NULL, NULL, '0'),
(30, 3, 2, '1', NULL, NULL, NULL, '0'),
(31, 4, 1, '1', NULL, NULL, NULL, '0'),
(32, 4, 2, '1', NULL, NULL, NULL, '0'),
(33, 4, 3, '1', NULL, NULL, NULL, '0'),
(34, 12, 1, '1', NULL, NULL, NULL, '0'),
(35, 12, 2, '1', NULL, NULL, NULL, '0'),
(36, 12, 3, '1', NULL, NULL, NULL, '0'),
(37, 12, 4, '1', NULL, NULL, NULL, '0'),
(38, 13, 1, '1', NULL, NULL, NULL, '0'),
(39, 13, 2, '1', NULL, NULL, NULL, '0'),
(40, 13, 3, '1', NULL, NULL, NULL, '0'),
(41, 13, 4, '1', NULL, NULL, NULL, '0'),
(42, 13, 5, '1', NULL, NULL, NULL, '0'),
(43, 14, 1, '1', NULL, NULL, NULL, '0'),
(44, 14, 2, '1', NULL, NULL, NULL, '0'),
(45, 14, 3, '1', NULL, NULL, NULL, '0'),
(46, 14, 4, '1', NULL, NULL, NULL, '0'),
(47, 14, 5, '1', NULL, NULL, NULL, '0'),
(48, 14, 6, '1', NULL, NULL, NULL, '0'),
(49, 5, 1, '1', NULL, NULL, NULL, '0'),
(50, 5, 2, '1', NULL, NULL, NULL, '0'),
(51, 5, 3, '1', NULL, NULL, NULL, '0'),
(52, 5, 4, '1', NULL, NULL, NULL, '0'),
(53, 5, 5, '1', NULL, NULL, NULL, '0'),
(54, 5, 6, '1', NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `approver` varchar(11) NOT NULL COMMENT '1 = Yes , 0 = \r\nNo',
  `created_by` int(6) NOT NULL,
  `updated_by` int(6) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `approver`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Motorpool Head', '1', 1, 1, '2021-04-28 17:21:40.000000', '2021-07-21 21:16:29.000000'),
(2, 'Project Engineer', '1', 1, NULL, '2021-04-28 17:21:54.000000', NULL),
(3, 'Management', '1', 1, NULL, '2021-04-28 17:22:07.000000', NULL),
(4, 'Driver/Operator', '0', 1, NULL, '2021-04-28 17:22:16.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approver` int(11) DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `created_by`, `updated_at`, `updated_by`, `role`, `approver`, `job`, `status`) VALUES
(1, 'Allan Anthony', 'Magno', 'Granados', 'aagranados@gmail.com', NULL, '$2y$10$8Nzz81/BBXz9b7rit7TYVeXPWjQYohb2s1Jj1caBjWGaTC.zChvsi', NULL, '2021-04-14 00:28:33', 0, '2021-04-28 17:45:22', 1, '1', 1, 'Project Engineer', 0),
(2, 'Jose', 'De', 'Calderon', 'jdc@gmail.com', NULL, '$2y$10$4lfLhmbGmKBH3HOCecy/5OpRj60HRakSSmo9h7n4v2cayLge.8EHG', NULL, '2021-04-29 13:56:22', 1, NULL, NULL, '4', 0, 'Driver/Operator', 0),
(3, 'Linus', 'X', 'Sebastian', 'ltt@gmail.com', NULL, '$2y$10$wIHER1W.Vc7stp7M4WxhXe3G1X7NQkhcFXggnh4e3kPfLYxdaJhOa', NULL, '2021-06-07 15:03:45', 1, NULL, NULL, '4', 0, 'Driver/Operator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_inventory`
--

DROP TABLE IF EXISTS `warehouse_inventory`;
CREATE TABLE IF NOT EXISTS `warehouse_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(255) DEFAULT NULL,
  `serial_id` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `conditions` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `qty` decimal(20,2) DEFAULT NULL,
  `moving_qty` decimal(20,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0=active 1=inactive',
  `purchased_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_inventory`
--

INSERT INTO `warehouse_inventory` (`id`, `item_id`, `serial_id`, `item_name`, `brand`, `conditions`, `unit`, `location`, `qty`, `moving_qty`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`, `purchased_price`) VALUES
(1, 'WI2021-7UE9J8P', 'serialid1', 'item1', 'brand1', 'New', 'bottle', 2, '5.00', '5.00', 1, '2021-07-16 02:52:22', NULL, NULL, 0, '1000.00'),
(2, 'WI2021-ZKXWAO4', 'serialid2', 'item2', 'brand2', 'new', 'bottle', 2, '3.00', '3.00', 1, '2021-07-16 02:53:34', NULL, NULL, 0, '500.00'),
(3, 'WI2021-UN3M70HG', 'serialid3', 'item3', 'brand3', 'new', 'bottle', 2, '15.00', '15.00', 1, '2021-07-19 23:34:55', NULL, NULL, 0, '300.00'),
(4, 'WI2021-E2P5V3SB', 'serialid4', 'item4', 'brand4', 'new', 'bottle', 2, '30.00', '30.00', 1, '2021-07-19 23:35:23', NULL, NULL, 0, '10000.00'),
(5, 'WI2021-H1OYS8L8', 'serialid5', 'item5', 'brand5', 'new', 'bottle', 2, '33.00', '33.00', 1, '2021-07-19 23:35:50', NULL, NULL, 0, '30000.00'),
(6, 'WI2021-K77SQ35', 'serialid6', 'item6', 'brand6', 'new', 'box', 2, '55.00', '55.00', 1, '2021-07-19 23:36:18', NULL, NULL, 0, '3000.00'),
(7, 'WI2021-IK79AGV', 'serialid7', 'item7', 'brand7', 'new', 'box', 2, '88.00', '88.00', 1, '2021-07-19 23:36:57', NULL, NULL, 0, '22000.00'),
(8, 'WI2021-UYPXE2EQ', 'serialid8', 'item8', 'brand8', 'new', 'bottle', 2, '24.00', '24.00', 1, '2021-07-19 23:37:53', NULL, NULL, 0, '8000.00'),
(9, 'WI2021-07T3RDHO', 'serialid9', 'item9', 'brand9', 'new', 'box', 2, '110.00', '110.00', 1, '2021-07-19 23:38:32', NULL, NULL, 0, '4500.00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
