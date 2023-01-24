-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2021 at 02:01 AM
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
-- Table structure for table `dispatch_main`
--

DROP TABLE IF EXISTS `dispatch_main`;
CREATE TABLE IF NOT EXISTS `dispatch_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fleet_type` int(11) NOT NULL,
  `fleet_unit` int(11) NOT NULL,
  `date_coverage_start` date NOT NULL,
  `date_coverage_end` date DEFAULT NULL,
  `driver_operator` int(11) NOT NULL,
  `remarks` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Open',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispatch_main`
--

INSERT INTO `dispatch_main` (`id`, `fleet_type`, `fleet_unit`, `date_coverage_start`, `date_coverage_end`, `driver_operator`, `remarks`, `created_by`, `created_at`, `updated_by`, `status`) VALUES
(1, 1, 1, '2021-06-02', '2021-06-09', 2, NULL, 1, '2021-06-01 22:58:10', NULL, 'Completed'),
(2, 1, 3, '2021-06-13', NULL, 3, NULL, 1, '2021-06-07 23:22:42', NULL, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_secondary`
--

DROP TABLE IF EXISTS `dispatch_secondary`;
CREATE TABLE IF NOT EXISTS `dispatch_secondary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `operating_hours_start` time NOT NULL,
  `operating_hours_end` time NOT NULL,
  `operating_kms_start` int(11) NOT NULL,
  `operating_kms_end` int(11) NOT NULL,
  `total_hours` int(11) NOT NULL,
  `total_kms` int(11) NOT NULL,
  `running_hours` int(11) DEFAULT NULL,
  `running_kms` int(11) DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `consumption` decimal(20,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `validated_by` int(11) DEFAULT NULL,
  `validated_at` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending for Approval',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispatch_secondary`
--

INSERT INTO `dispatch_secondary` (`id`, `trip_id`, `location`, `operating_hours_start`, `operating_hours_end`, `operating_kms_start`, `operating_kms_end`, `total_hours`, `total_kms`, `running_hours`, `running_kms`, `verified_by`, `consumption`, `created_by`, `created_at`, `updated_by`, `updated_at`, `validated_by`, `validated_at`, `status`, `date`) VALUES
(1, 1, '4', '17:40:00', '19:40:00', 123, 321, 2, 198, NULL, NULL, NULL, '5.00', 1, '2021-05-05 05:49:57', 1, '2021-05-05 06:18:22', 1, '2021-05-08 16:06:16', 'Approved', '2021-06-05'),
(2, 1, '4', '16:42:00', '20:42:00', 0, 500, 4, 500, NULL, NULL, NULL, '5.00', 1, '2021-05-05 06:43:02', 1, '2021-05-08 16:07:39', 1, '2021-05-08 16:09:47', 'Approved', '2021-06-06'),
(3, 1, '5', '00:10:00', '12:10:00', 0, 2000, 12, 2000, NULL, NULL, NULL, '1000.00', 1, '2021-05-08 16:11:07', NULL, NULL, 1, '2021-05-08 16:22:25', 'Approved', '2021-06-07'),
(4, 2, '5', '07:22:00', '19:22:00', 50, 100, 12, 50, NULL, NULL, NULL, '30.00', 1, '2021-06-07 23:23:27', NULL, NULL, 1, '2021-06-07 23:28:17', 'Approved', '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

DROP TABLE IF EXISTS `fleet`;
CREATE TABLE IF NOT EXISTS `fleet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipment_id` varchar(255) NOT NULL,
  `fleet_type` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `plate_number` varchar(255) DEFAULT NULL,
  `chassis_number` varchar(255) NOT NULL,
  `odometer_on_register` decimal(20,2) DEFAULT '0.00',
  `color` varchar(255) DEFAULT NULL,
  `gas_type` varchar(255) NOT NULL,
  `registered_branch` varchar(255) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `purchase_vendor_branch` varchar(255) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_amount` decimal(20,2) DEFAULT NULL,
  `pms_type` varchar(255) NOT NULL,
  `pms_kilometer` varchar(255) DEFAULT NULL,
  `pms_hour` varchar(255) DEFAULT NULL,
  `pms_date` date DEFAULT NULL,
  `pms_odometer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `current_location` varchar(255) DEFAULT NULL,
  `odometer_current` decimal(20,2) DEFAULT '0.00',
  `km_current` decimal(20,2) DEFAULT '0.00',
  `hr_current` decimal(20,2) DEFAULT '0.00',
  `running_odometer` decimal(20,2) NOT NULL DEFAULT '0.00',
  `running_km` decimal(20,2) NOT NULL DEFAULT '0.00',
  `running_hr` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pms_status` varchar(255) NOT NULL DEFAULT 'Not Yet' COMMENT '0=Not Yet, 1=Needs PMS, 2=On Going',
  `last_pms` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleet`
--

INSERT INTO `fleet` (`id`, `equipment_id`, `fleet_type`, `model`, `plate_number`, `chassis_number`, `odometer_on_register`, `color`, `gas_type`, `registered_branch`, `registration_date`, `expiration`, `purchase_vendor_branch`, `purchase_date`, `purchase_amount`, `pms_type`, `pms_kilometer`, `pms_hour`, `pms_date`, `pms_odometer`, `created_at`, `updated_at`, `current_location`, `odometer_current`, `km_current`, `hr_current`, `running_odometer`, `running_km`, `running_hr`, `pms_status`, `last_pms`, `status`) VALUES
(1, 'EQ2021-9YNEPIN', 1, 'Backhoe C600', NULL, 'CH-001', NULL, NULL, 'Diesel', NULL, NULL, NULL, 'Fukai', '2021-04-30', '5000000.00', '2', '2500', '500', '2021-04-30', '5500', '2021-04-29 13:15:08', '2021-04-29 21:37:54', NULL, '0.00', '0.00', '0.00', '2698.00', '2698.00', '18.00', 'Not Yet', NULL, 'Active'),
(2, 'EQ2021-7M0VZCZ', 2, 'Mazda 3 CVR', 'PL1232', 'CH-002', '0.00', 'Black', 'Gasoline', 'East Avenue', '2021-04-30', '2026-04-30', 'Mazda Edsa', '2021-04-30', '2000000.00', '1', '12000', '4000', '2023-04-30', '10000', '2021-04-29 13:41:38', NULL, NULL, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Not Yet', NULL, 'Active'),
(3, 'EQ2021-UCGR499', 1, 'Loaders', NULL, 'CH-001002002', '0.00', NULL, 'Diesel', NULL, NULL, NULL, 'CAT EDSA', '2000-06-08', '3000000.00', '2', '500', '100', '2022-06-08', '550', '2021-06-07 15:18:14', NULL, NULL, '0.00', '0.00', '0.00', '50.00', '50.00', '12.00', 'Not Yet', NULL, 'Active');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleet_maintenance_cost`
--

INSERT INTO `fleet_maintenance_cost` (`id`, `fleet_equipment`, `job_order_id`, `maintenance_cost`, `date`) VALUES
(1, 1, 1, '5000.00', '2021-06-10'),
(2, 1, 2, '500.00', '2021-06-11'),
(3, 2, 3, '1500.00', '2021-06-12'),
(4, 3, 4, '3750.00', '2021-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `fleet_type`
--

DROP TABLE IF EXISTS `fleet_type`;
CREATE TABLE IF NOT EXISTS `fleet_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleet_type`
--

INSERT INTO `fleet_type` (`id`, `type`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Heavy Equipment', 0, 1, '2021-04-28 17:58:34', NULL, NULL),
(2, 'Light Equipment', 0, 1, '2021-04-28 17:58:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

DROP TABLE IF EXISTS `job_order`;
CREATE TABLE IF NOT EXISTS `job_order` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`id`, `fleet_equipment`, `job_order_date`, `driver_operator`, `job_order_no`, `location`, `labor_type`, `problems_encountered`, `inspected_by`, `details_of_work_done`, `conducted_by`, `labor_date_started`, `labor_date_completed`, `labor_time_started`, `labor_time_completed`, `trial_personnel`, `trial_date`, `trial_result`, `accepted_by`, `accepted_date`, `noted_by`, `noted_date`, `status`) VALUES
(1, 1, '2021-06-07', 2, 'JO2021-TMBMNF8R', 3, 'Preventive Maintenance', 'AC', 2, 'AC', NULL, '2021-06-10', '2021-06-10', '10:15:00', '11:15:00', 2, '2021-06-10', 'AC', 2, '2021-06-10', 2, '2021-06-10', 'Completed'),
(2, 1, '2021-06-07', 2, 'JO2021-KA3GAHNG', 3, 'Auto Electrical', 'zx', 2, 'zx', NULL, '2021-06-11', '2021-06-11', '10:16:00', '11:16:00', 2, '2021-06-11', 'zx', 2, '2021-06-11', 2, '2021-06-07', 'Completed'),
(3, 2, '2021-06-07', 2, 'JO2021-1PMDRDO7', 4, 'Machine Shop', 'Body repair', 2, 'ab', 2, '2021-06-12', '2021-06-12', '10:18:00', '23:18:00', 2, '2021-06-12', 'abc', 2, '2021-06-12', 2, '2021-06-07', 'Completed'),
(4, 3, '2021-06-07', 3, 'JO2021-LNWW6QA8', 5, 'Auto Electrical', 'Headlights Change', 2, 'Rewire and change bulb', NULL, '2021-06-11', '2021-06-11', '07:42:00', '11:42:00', 2, '2021-06-08', 'Working', 2, '2021-06-12', 3, '2021-06-12', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `job_order_item`
--

DROP TABLE IF EXISTS `job_order_item`;
CREATE TABLE IF NOT EXISTS `job_order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jo_main` int(11) NOT NULL,
  `pms_type_item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `reference_id` varchar(255) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_order_item`
--

INSERT INTO `job_order_item` (`id`, `jo_main`, `pms_type_item_id`, `qty`, `unit`, `reference_id`, `amount`) VALUES
(1, 1, 1, 1, 'bottle', 'WI2021-OO17EID', '5000.00'),
(2, 2, 2, 1, 'can', 'WI2021-C0DD7K8W', '500.00'),
(3, 3, 4, 1, 'bottle', 'WI2021-IEGXXM8Q', '1500.00'),
(4, 4, 5, 2, 'pcs', 'WI2021-37Q3CT8S', '3750.00');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'WH1: Port One Tondo', 1, '2021-04-28 18:08:39.000000', NULL, NULL),
(2, 'WH2: Port Two Caloocan', 1, '2021-04-28 18:08:51.000000', NULL, NULL),
(3, 'CPQ: Quezon City', 1, '2021-04-28 18:09:14.000000', 1, '2021-06-06 16:27:00.000000'),
(4, 'ST1: Imus Cavite', 1, '2021-04-28 18:16:10.000000', NULL, NULL),
(5, 'ST2: Tagaytay', 1, '2021-04-28 18:16:42.000000', NULL, NULL);

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
-- Table structure for table `pms_type`
--

DROP TABLE IF EXISTS `pms_type`;
CREATE TABLE IF NOT EXISTS `pms_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pms_type` varchar(255) NOT NULL COMMENT '0=perkm 1=perhour 2=defineddate 3=odometer',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_type`
--

INSERT INTO `pms_type` (`id`, `pms_type`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Per KM', 4, '2021-04-22 07:07:02', 4, '2021-04-22 11:25:36'),
(2, 'Per Hour', 4, '2021-04-22 07:20:46', 4, '2021-04-22 11:25:42'),
(3, 'Defined Date', 4, '2021-04-22 07:24:26', 4, '2021-04-22 11:25:49'),
(4, 'Odometer', 4, '2021-04-22 11:22:54', 4, '2021-04-22 11:25:54');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pms_type_item`
--

INSERT INTO `pms_type_item` (`id`, `pms_id`, `warehouse_item`, `amount`, `remarks`, `updated_by`, `updated_at`, `status`) VALUES
(1, 1, 2, '1', NULL, NULL, NULL, '0'),
(2, 1, 3, '1', NULL, NULL, NULL, '0'),
(3, 1, 4, '1', NULL, NULL, NULL, '0'),
(4, 2, 1, '1', NULL, NULL, NULL, '0'),
(5, 2, 2, '1', NULL, NULL, NULL, '0'),
(6, 2, 3, '1', NULL, NULL, NULL, '0');

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
(1, 'Motorpool Head', '1', 1, NULL, '2021-04-28 17:21:40.000000', NULL),
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
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0=active 1=inactive',
  `purchased_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse_inventory`
--

INSERT INTO `warehouse_inventory` (`id`, `item_id`, `serial_id`, `item_name`, `brand`, `conditions`, `unit`, `location`, `qty`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`, `purchased_price`) VALUES
(1, 'WI2021-OO17EID', '001', 'Freon', 'Yellow Brand', 'New', 'bottle', 2, '1.00', 1, '2021-04-29 02:52:47', 1, '2021-04-29 03:11:07', 0, '5000.00'),
(2, 'WI2021-C0DD7K8W', '002', 'Gear Lubricants', 'WD-40', 'New', 'can', 2, '1.00', 1, '2021-04-29 03:12:07', NULL, NULL, 0, '500.00'),
(3, 'WI2021-HCJY32JR', '003', 'Coolant', 'Prestone', 'New', 'bottle', 2, '1.00', 1, '2021-04-29 03:12:47', NULL, NULL, 0, '3500.00'),
(4, 'WI2021-IEGXXM8Q', '004', 'Synthetic Engine Oil', 'Shell Helix', 'New', 'bottle', 2, '1.00', 1, '2021-04-29 03:14:13', NULL, NULL, 0, '1500.00'),
(5, 'WI2021-37Q3CT8S', '005', 'LED Headlights 120W', 'Novsight', 'New', 'pcs', 1, '2.00', 1, '2021-06-07 23:15:32', NULL, NULL, 0, '3750.00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
