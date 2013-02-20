-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: development.treadtracks.tcsgeeks.com
-- Generation Time: Oct 25, 2012 at 09:46 PM
-- Server version: 5.5.24
-- PHP Version: 5.4.6-1ubuntu1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `treadtracks`
--
-- CREATE DATABASE `treadtracks` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
-- USE `treadtracks`;

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

DROP TABLE IF EXISTS `account_types`;
CREATE TABLE IF NOT EXISTS `account_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `account_type_id` int(10) unsigned NOT NULL,
  `number` varchar(20) NOT NULL,
  `desc` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `order` smallint(6) NOT NULL,
  `default_bill_to_id` int(11) NOT NULL,
  `default_ship_to_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`customer_id`,`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ref_id` int(10) NOT NULL,
  `ref_table` varchar(64) NOT NULL,
  `name` varchar(100) NOT NULL,
  `attn` varchar(255) NOT NULL,
  `line1` varchar(64) NOT NULL,
  `line2` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `state` varchar(64) NOT NULL,
  `zip` varchar(11) NOT NULL,
  `is_billing` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_shipping` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime NOT NULL,
  `deleted_by` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `resource_id` (`ref_id`,`ref_table`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `adjustment_types`
--

DROP TABLE IF EXISTS `adjustment_types`;
CREATE TABLE IF NOT EXISTS `adjustment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE IF NOT EXISTS `alerts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(50) NOT NULL,
  `row_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(100) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `buff_spec_manufacturer_product_lines_tire_sizes`
--

DROP TABLE IF EXISTS `buff_spec_manufacturer_product_lines_tire_sizes`;
CREATE TABLE IF NOT EXISTS `buff_spec_manufacturer_product_lines_tire_sizes` (
  `id` int(11) NOT NULL,
  `buff_spec_id` int(11) NOT NULL,
  `tire_size_id` int(11) NOT NULL,
  `manufacturer_product_line_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `buff_spec_id` (`buff_spec_id`,`tire_size_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buff_specs`
--

DROP TABLE IF EXISTS `buff_specs`;
CREATE TABLE IF NOT EXISTS `buff_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_ref` int(4) NOT NULL,
  `name` varchar(45) NOT NULL,
  `tire_size_id` int(11) NOT NULL,
  `retread_method_id` int(11) NOT NULL,
  `diameter` decimal(10,3) DEFAULT NULL,
  `crown_width` decimal(10,3) DEFAULT NULL,
  `radius` decimal(10,3) DEFAULT NULL,
  `machine_setting` decimal(10,3) DEFAULT NULL,
  `shoulder_radius` decimal(10,3) DEFAULT NULL,
  `shoulder_length` decimal(10,3) DEFAULT NULL,
  `shoulder_angle` decimal(10,3) DEFAULT NULL,
  `steel_belt` decimal(10,3) DEFAULT NULL,
  `shoulder_brushing` decimal(10,3) DEFAULT NULL,
  `bead_width` decimal(10,3) DEFAULT NULL,
  `mold_type_id` int(11) DEFAULT NULL,
  `bead_plate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `cake_sessions`
--

DROP TABLE IF EXISTS `cake_sessions`;
CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `data` text,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `casing_log_events`
--

DROP TABLE IF EXISTS `casing_log_events`;
CREATE TABLE IF NOT EXISTS `casing_log_events` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `casing_logs`
--

DROP TABLE IF EXISTS `casing_logs`;
CREATE TABLE IF NOT EXISTS `casing_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checkpoint_id` tinyint(2) unsigned DEFAULT NULL,
  `nrt_code_id` int(11) DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `casing_log_event_id` tinyint(3) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `nrt_code_id` (`nrt_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `casing_repairs`
--

DROP TABLE IF EXISTS `casing_repairs`;
CREATE TABLE IF NOT EXISTS `casing_repairs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casing_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `casings`
--

DROP TABLE IF EXISTS `casings`;
CREATE TABLE IF NOT EXISTS `casings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_plant_id` int(11) DEFAULT NULL,
  `tire_size_id` int(11) DEFAULT NULL,
  `manufacturer_product_line_id` int(11) DEFAULT NULL,
  `production_week` int(4) DEFAULT NULL COMMENT 'format: WWYY',
  `barcode` int(20) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_tag` varchar(10) DEFAULT NULL,
  `rfid` int(20) DEFAULT NULL COMMENT 'future',
  `tread_design_id` int(11) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `checking` varchar(2) NOT NULL DEFAULT '',
  `previous_caps` int(2) DEFAULT NULL,
  `remaining_tread` decimal(4,2) DEFAULT NULL,
  `tread_width_id` int(11) DEFAULT NULL,
  `mold_type_id` int(11) DEFAULT NULL,
  `buff_radius` decimal(10,4) DEFAULT NULL COMMENT 'Estimated Buff Spec',
  `nrt_code_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `checkpoints`
--

DROP TABLE IF EXISTS `checkpoints`;
CREATE TABLE IF NOT EXISTS `checkpoints` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0  ;

-- --------------------------------------------------------

--
-- Table structure for table `co_item_statuses`
--

DROP TABLE IF EXISTS `co_item_statuses`;
CREATE TABLE IF NOT EXISTS `co_item_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `co_item_type_categories`
--

DROP TABLE IF EXISTS `co_item_type_categories`;
CREATE TABLE IF NOT EXISTS `co_item_type_categories` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `co_item_types`
--

DROP TABLE IF EXISTS `co_item_types`;
CREATE TABLE IF NOT EXISTS `co_item_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `co_item_type_category_id` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `co_items`
--

DROP TABLE IF EXISTS `co_items`;
CREATE TABLE IF NOT EXISTS `co_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `co_id` int(13) unsigned NOT NULL,
  `line_number` int(5) NOT NULL,
  `line_suffix` varchar(1) NOT NULL DEFAULT '',
  `casing_id` int(11) NOT NULL COMMENT 'One casing migh belong to many CoItems, a CoItem can also be a service and don''t have a casing',
  `desc` text NOT NULL,
  `co_item_status_id` int(11) NOT NULL DEFAULT '1',
  `co_item_type_id` int(11) DEFAULT NULL,
  `modified` datetime NOT NULL,
  `modified_by` mediumint(8) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`co_item_status_id`),
  KEY `co_id` (`co_id`),
  KEY `created` (`created`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `co_statuses`
--

DROP TABLE IF EXISTS `co_statuses`;
CREATE TABLE IF NOT EXISTS `co_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ref_id` varchar(16) NOT NULL,
  `ref_table` varchar(64) NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL,
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `priority` smallint(2) unsigned NOT NULL DEFAULT '0',
  `value` text NOT NULL,
  `valid_start` date DEFAULT NULL,
  `valid_end` date DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `can_set_active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_id` (`ref_id`,`ref_table`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `addr1` varchar(255) NOT NULL,
  `addr2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(4) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `fiscal_year_month` int(2) NOT NULL,
  `tax_year_month` int(2) NOT NULL,
  `cash_account_id` int(10) unsigned NOT NULL,
  `fee_rate` decimal(6,3) unsigned NOT NULL,
  `fee_grace_period` tinyint(3) unsigned NOT NULL,
  `fee_description` varchar(255) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_methods`
--

DROP TABLE IF EXISTS `contact_methods`;
CREATE TABLE IF NOT EXISTS `contact_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contact_id` int(10) unsigned NOT NULL,
  `method` varchar(100) NOT NULL COMMENT 'Could be things like ''Phone'',''Fax'',''Email'',''Pager'',''IM''',
  `type` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `primary` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_table` varchar(64) NOT NULL,
  `ref_id` int(10) unsigned NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `label` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `primary` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `common` tinyint(1) unsigned NOT NULL,
  `note` tinytext NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `core_logs`
--

DROP TABLE IF EXISTS `core_logs`;
CREATE TABLE IF NOT EXISTS `core_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(127) NOT NULL,
  `field` varchar(127) NOT NULL,
  `ref_id` bigint(20) unsigned NOT NULL,
  `pre_value` varchar(255) NOT NULL,
  `cur_value` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created` (`created`),
  KEY `created_by` (`created_by`),
  KEY `model` (`model`,`field`,`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `cos`
--

DROP TABLE IF EXISTS `cos`;
CREATE TABLE IF NOT EXISTS `cos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ref` varchar(20) NOT NULL COMMENT 'Inside the TreadTracks WorkOrder tis is called "Work Oder Number"',
  `account_id` int(11) unsigned NOT NULL,
  `user_id` smallint(4) unsigned NOT NULL,
  `type` tinyint(2) unsigned NOT NULL DEFAULT '45',
  `term_id` smallint(6) unsigned DEFAULT NULL,
  `co_status_id` tinyint(2) NOT NULL,
  `bill_address_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'refers to the accounts table',
  `ship_address_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'refers to the accounts table',
  `is_national_account` tinyint(1) NOT NULL,
  `notes` text NOT NULL,
  `requestor` varchar(100) NOT NULL COMMENT 'This is a name (string) and refers to the person who requested the co',
  `requester_id` int(11) NOT NULL,
  `requester_phone_id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL DEFAULT '',
  `pickup_date` date NOT NULL,
  `authorized` datetime DEFAULT NULL,
  `authorized_by` int(10) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`account_id`),
  KEY `created` (`created`),
  KEY `po_number` (`po_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_locations`
--

DROP TABLE IF EXISTS `customer_locations`;
CREATE TABLE IF NOT EXISTS `customer_locations` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `customer_group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_national_accounts`
--

DROP TABLE IF EXISTS `customer_national_accounts`;
CREATE TABLE IF NOT EXISTS `customer_national_accounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `account_number` varchar(25) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime NOT NULL,
  `deleted_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone_number` varchar(64) NOT NULL,
  `fax_number` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `tax_number` varchar(64) NOT NULL,
  `tax_number_expiration` date NOT NULL,
  `is_company` tinyint(1) unsigned NOT NULL,
  `customer_location_id` tinyint(3) unsigned NOT NULL,
  `walk_in` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `keywords` text NOT NULL,
  `deleted` datetime NOT NULL,
  `deleted_by` int(10) NOT NULL,
  `notes` text,
  PRIMARY KEY (`id`),
  KEY `user_id` (`customer_location_id`,`deleted_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `customers_pricing_groups`
--

DROP TABLE IF EXISTS `customers_pricing_groups`;
CREATE TABLE IF NOT EXISTS `customers_pricing_groups` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `pricing_group_id` int(10) NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `pricing_group_id` (`pricing_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `file_images`
--

DROP TABLE IF EXISTS `file_images`;
CREATE TABLE IF NOT EXISTS `file_images` (
  `id` char(14) NOT NULL,
  `binary` mediumblob NOT NULL,
  `name` varchar(255) NOT NULL,
  `mime` char(40) NOT NULL,
  `size` int(8) NOT NULL,
  `width` mediumint(8) NOT NULL,
  `height` mediumint(8) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `finished_goods`
--

DROP TABLE IF EXISTS `finished_goods`;
CREATE TABLE IF NOT EXISTS `finished_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casing_id` int(11) NOT NULL,
  `fg_code` varchar(14) NOT NULL,
  `stock_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Should this be counted in Location\\''s sellable inventory?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ref_id` int(10) unsigned NOT NULL,
  `ref_table` varchar(75) NOT NULL,
  `file_image_id` char(14) NOT NULL,
  `thumb_id` char(14) NOT NULL,
  `default` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_sessions`
--

DROP TABLE IF EXISTS `inventory_sessions`;
CREATE TABLE IF NOT EXISTS `inventory_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` tinyint(2) unsigned NOT NULL,
  `json_data` text NOT NULL,
  `scan_count` decimal(10,3) unsigned NOT NULL,
  `product_count` decimal(10,3) unsigned NOT NULL,
  `executed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` smallint(5) unsigned NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` smallint(5) unsigned NOT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `jockeys`
--

DROP TABLE IF EXISTS `jockeys`;
CREATE TABLE IF NOT EXISTS `jockeys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `location_types`
--

DROP TABLE IF EXISTS `location_types`;
CREATE TABLE IF NOT EXISTS `location_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location_group_id` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `location_type_id` tinyint(2) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `log_statuses`
--

DROP TABLE IF EXISTS `log_statuses`;
CREATE TABLE IF NOT EXISTS `log_statuses` (
  `save_session` char(15) NOT NULL,
  `table` varchar(50) NOT NULL,
  `model` varchar(60) NOT NULL,
  `ref_id` char(13) NOT NULL,
  `user_id` int(10) NOT NULL,
  `insert` tinyint(1) unsigned NOT NULL,
  `from_status` varchar(30) DEFAULT NULL,
  `to_status` varchar(30) DEFAULT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `params` tinytext NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer_plant_sizes`
--

DROP TABLE IF EXISTS `manufacturer_plant_sizes`;
CREATE TABLE IF NOT EXISTS `manufacturer_plant_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_plant_id` int(11) DEFAULT NULL,
  `tire_size_id` int(11) DEFAULT NULL,
  `size_code` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer_plants`
--

DROP TABLE IF EXISTS `manufacturer_plants`;
CREATE TABLE IF NOT EXISTS `manufacturer_plants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_id` int(11) NOT NULL,
  `code` varchar(2) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer_product_line_groups`
--

DROP TABLE IF EXISTS `manufacturer_product_line_groups`;
CREATE TABLE IF NOT EXISTS `manufacturer_product_line_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `manufacturer_id` (`manufacturer_id`,`name`),
  KEY `order` (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer_product_lines`
--

DROP TABLE IF EXISTS `manufacturer_product_lines`;
CREATE TABLE IF NOT EXISTS `manufacturer_product_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_plant_id` int(11) NOT NULL,
  `manufacturer_product_line_group_id` int(11) NOT NULL,
  `is_material` tinyint(1) DEFAULT NULL,
  `dot_code` varchar(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` smallint(5) unsigned NOT NULL,
  `material_size_list` varchar(255) NOT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manufacturer_id` (`manufacturer_plant_id`,`name`),
  KEY `deleted` (`deleted`),
  KEY `order` (`order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dot_code` varchar(2) NOT NULL,
  `website` varchar(255) NOT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `material_types`
--

DROP TABLE IF EXISTS `material_types`;
CREATE TABLE IF NOT EXISTS `material_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uom_id` tinyint(2) NOT NULL,
  `material_type_id` tinyint(2) NOT NULL,
  `vendor_item_id` int(11) NOT NULL,
  `repair_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `part_number` varchar(50) NOT NULL,
  `manf_part_number` varchar(60) NOT NULL,
  `tread_width_id` int(11) NOT NULL,
  `tread_width_uom_id` tinyint(2) NOT NULL,
  `dot_code` varchar(3) DEFAULT NULL,
  `density` decimal(10,3) DEFAULT NULL COMMENT 'Used to calculate weight/ft',
  `tread_design_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `material_measurement_id` (`uom_id`),
  KEY `repair_type_id` (`repair_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` mediumtext NOT NULL,
  `type` int(1) NOT NULL,
  `created_user_id` int(10) NOT NULL,
  `due` datetime DEFAULT NULL,
  `completed` datetime DEFAULT NULL,
  `read` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `created_user_id` (`created_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `mold_types`
--

DROP TABLE IF EXISTS `mold_types`;
CREATE TABLE IF NOT EXISTS `mold_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tread_design_id` int(11) NOT NULL,
  `tire_size_id` int(11) NOT NULL,
  `code` varchar(3) NOT NULL,
  `stock_status` tinyint(1) NOT NULL DEFAULT '1',
  `description` varchar(45) DEFAULT NULL,
  `lifetime` int(4) NOT NULL,
  `bead_plate` varchar(2) DEFAULT NULL,
  `mold_cavity` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `molds`
--

DROP TABLE IF EXISTS `molds`;
CREATE TABLE IF NOT EXISTS `molds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mold_type_id` int(11) NOT NULL,
  `uses` int(4) NOT NULL DEFAULT '0',
  `in_service` date NOT NULL,
  `last_used` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `nrt_code_categories`
--

DROP TABLE IF EXISTS `nrt_code_categories`;
CREATE TABLE IF NOT EXISTS `nrt_code_categories` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `nrt_codes`
--

DROP TABLE IF EXISTS `nrt_codes`;
CREATE TABLE IF NOT EXISTS `nrt_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abbr` varchar(5) NOT NULL,
  `nrt_code_category_id` tinyint(2) NOT NULL,
  `name` varchar(45) NOT NULL,
  `ordering` smallint(4) unsigned NOT NULL DEFAULT '200',
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `pdfs`
--

DROP TABLE IF EXISTS `pdfs`;
CREATE TABLE IF NOT EXISTS `pdfs` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(32) NOT NULL,
  `view` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

DROP TABLE IF EXISTS `phone_numbers`;
CREATE TABLE IF NOT EXISTS `phone_numbers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_id` int(10) NOT NULL,
  `ref_table` varchar(64) NOT NULL,
  `value` varchar(64) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'Work' COMMENT '''Mobile'',''Work'',''Home'',''Pager'',''Fax'',''Other''',
  `primary` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `resource_id` (`ref_id`,`ref_table`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
CREATE TABLE IF NOT EXISTS `preferences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `key_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` text,
  `value_type` varchar(20) DEFAULT NULL COMMENT '''int'',''string'',''float'',''array'',''obj''',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `repair_actuals`
--

DROP TABLE IF EXISTS `repair_actuals`;
CREATE TABLE IF NOT EXISTS `repair_actuals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casing_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `repair_estimates`
--

DROP TABLE IF EXISTS `repair_estimates`;
CREATE TABLE IF NOT EXISTS `repair_estimates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casing_id` int(11) NOT NULL,
  `repair_type_id` int(11) NOT NULL,
  `existing` int(2) NOT NULL DEFAULT '0',
  `new` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `repair_types`
--

DROP TABLE IF EXISTS `repair_types`;
CREATE TABLE IF NOT EXISTS `repair_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `retread_adjustments`
--

DROP TABLE IF EXISTS `retread_adjustments`;
CREATE TABLE IF NOT EXISTS `retread_adjustments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `co_item_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `adjustement_type_id` tinyint(2) NOT NULL,
  `measure_1` decimal(5,2) DEFAULT NULL,
  `measure_2` decimal(5,2) DEFAULT NULL,
  `measure_3` decimal(5,2) DEFAULT NULL,
  `measure_4` decimal(5,2) DEFAULT NULL,
  `nrt_code_id` int(11) DEFAULT NULL,
  `is_retreadable` tinyint(1) NOT NULL,
  `adjustor_id` int(11) DEFAULT NULL,
  `adj_retread` decimal(7,3) DEFAULT NULL,
  `adj_repair` decimal(7,3) DEFAULT NULL,
  `adj_casing` decimal(7,3) DEFAULT NULL,
  `adjustment_pct` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `retread_methods`
--

DROP TABLE IF EXISTS `retread_methods`;
CREATE TABLE IF NOT EXISTS `retread_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `system_setting_categories`
--

DROP TABLE IF EXISTS `system_setting_categories`;
CREATE TABLE IF NOT EXISTS `system_setting_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `order` smallint(5) unsigned NOT NULL,
  `name` varchar(127) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`,`order`),
  KEY `order` (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `system_setting_definitions`
--

DROP TABLE IF EXISTS `system_setting_definitions`;
CREATE TABLE IF NOT EXISTS `system_setting_definitions` (
  `key` varchar(255) NOT NULL,
  `name` varchar(127) NOT NULL,
  `ref_table` varchar(127) NOT NULL,
  `default_value` varchar(127) NOT NULL,
  `max_level` tinyint(4) NOT NULL,
  `system_setting_category_id` mediumint(9) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `system_setting_catigory_id` (`system_setting_category_id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

DROP TABLE IF EXISTS `system_settings`;
CREATE TABLE IF NOT EXISTS `system_settings` (
  `key` varchar(255) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `value` varchar(128) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` smallint(6) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` smallint(6) NOT NULL,
  `deleted` datetime NOT NULL,
  `deleted_by` smallint(6) NOT NULL,
  PRIMARY KEY (`key`,`ref_id`,`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tire_sizes`
--

DROP TABLE IF EXISTS `tire_sizes`;
CREATE TABLE IF NOT EXISTS `tire_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `two_char_code` varchar(2) DEFAULT NULL,
  `size_code` int(3) DEFAULT NULL,
  `tread_width_id` int(10) DEFAULT NULL,
  `aspect_ratio` int(3) DEFAULT NULL,
  `diameter` decimal(4,1) DEFAULT NULL,
  `construction_code` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `tread_design_tread_widths`
--

DROP TABLE IF EXISTS `tread_design_tread_widths`;
CREATE TABLE IF NOT EXISTS `tread_design_tread_widths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tread_design_id` int(11) NOT NULL,
  `tread_width_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `tread_designs`
--

DROP TABLE IF EXISTS `tread_designs`;
CREATE TABLE IF NOT EXISTS `tread_designs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tread_abb` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `xref` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `stock_status` tinyint(1) DEFAULT '1',
  `vendor_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `tread_widths`
--

DROP TABLE IF EXISTS `tread_widths`;
CREATE TABLE IF NOT EXISTS `tread_widths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size_standard` decimal(4,2) NOT NULL,
  `size_mm` int(3) NOT NULL,
  `suffix` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `uoms`
--

DROP TABLE IF EXISTS `uoms`;
CREATE TABLE IF NOT EXISTS `uoms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `symbol` varchar(20) NOT NULL COMMENT 'Symbol to be displayed (e.g. ", '', lbs. ...etc)',
  `suffix_or_prefix` varchar(1) NOT NULL COMMENT 's for suffix, p for prefix',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` tinytext,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `user_prefs`
--

DROP TABLE IF EXISTS `user_prefs`;
CREATE TABLE IF NOT EXISTS `user_prefs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` smallint(4) unsigned NOT NULL,
  `object` varchar(255) NOT NULL,
  `option` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` smallint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`object`,`option`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `shop_checkpoint_pref_id` int(1) unsigned DEFAULT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `language_id` tinyint(2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `login_hash` binary(32) DEFAULT NULL,
  `login_ip` double DEFAULT NULL,
  `last_ui` varchar(255) NOT NULL,
  `change_password` datetime DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL,
  `active` varchar(45) NOT NULL,
  `admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `current_location` tinyint(3) unsigned NOT NULL,
  `current_till` int(10) unsigned NOT NULL,
  `location_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `company_id` tinyint(2) unsigned NOT NULL,
  `deleted` datetime DEFAULT NULL,
  `deleted_by` mediumint(8) unsigned DEFAULT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `login_hash` (`login_hash`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_items`
--

DROP TABLE IF EXISTS `vendor_items`;
CREATE TABLE IF NOT EXISTS `vendor_items` (
  `id` int(10) unsigned NOT NULL,
  `vendor_id` int(10) unsigned NOT NULL,
  `is_material` tinyint(1) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `upc` varchar(200) NOT NULL,
  `price` float(8,2) NOT NULL,
  `weight` decimal(8,3) unsigned NOT NULL DEFAULT '0.000',
  `created` datetime NOT NULL,
  `created_by` mediumint(8) unsigned NOT NULL,
  `modified_by` mediumint(8) unsigned NOT NULL,
  `inactive` tinyint(1) NOT NULL,
  `is_tread` tinyint(1) NOT NULL DEFAULT '0',
  `tread_design_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `tax_number` varchar(100) NOT NULL,
  `tax_number_expiration` date NOT NULL,
  `sets_basis` tinyint(1) unsigned NOT NULL,
  `manufacturer_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `default_term_id` mediumint(6) unsigned DEFAULT NULL,
  `activant_seller_id` int(11) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` datetime DEFAULT NULL,
  `deleted_by` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `active` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8  ;



DROP TABLE IF EXISTS changelog;
CREATE TABLE changelog (
  change_number BIGINT NOT NULL,
  delta_set VARCHAR(10) NOT NULL,
  start_dt TIMESTAMP NOT NULL,
  complete_dt TIMESTAMP NULL,
  applied_by VARCHAR(100) NOT NULL,
  description VARCHAR(500) NOT NULL
);

ALTER TABLE changelog ADD CONSTRAINT Pkchangelog PRIMARY KEY (change_number);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
