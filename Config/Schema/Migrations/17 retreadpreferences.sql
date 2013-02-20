-- --------------------------------------------------------

--
-- ALTER structure for table `customers`
--
ALTER TABLE  `customers` ADD  `retread_template_id` INT( 10 ) UNSIGNED NOT NULL AFTER  `customer_location_id` ,
ADD INDEX (  `retread_template_id` ); 
-- --------------------------------------------------------

--
-- Table structure for table `customer_retread_preferences`
--

CREATE TABLE IF NOT EXISTS `customer_retread_preferences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `preference_id` int(10) unsigned NOT NULL,
  `value` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE  `customer_retread_preferences` ADD INDEX (  `customer_id` );
ALTER TABLE  `customer_retread_preferences` ADD INDEX (  `preference_id` ); 

-- --------------------------------------------------------

--
-- Table structure for table `retread_templates`
--

CREATE TABLE IF NOT EXISTS `retread_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `is_default` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `retread_template_preferences`
--

CREATE TABLE IF NOT EXISTS `retread_template_preferences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `retread_template_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `tire_size_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `patch_location_id` int(1) unsigned DEFAULT NULL,
  `is_default` tinyint(1) unsigned NOT NULL,
  `value` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `composite_key` (`retread_template_id`,`tire_size_id`,`material_id`,`patch_location_id`,`is_default`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patch_locations`
--

CREATE TABLE IF NOT EXISTS `patch_locations` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `patch_locations`
--

-- Moved into base_data

-- INSERT INTO `patch_locations` (`id`, `name`) VALUES
-- (1, 'Bead'),
-- (2, 'Crown'),
-- (3, 'Large Crown'),
-- (4, 'Shoulder'),
-- (5, 'Sidewall'),
-- (6, 'Spot');

--//@UNDO
