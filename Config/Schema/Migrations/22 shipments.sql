-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE IF NOT EXISTS `shipments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `created_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipment_goods`
--

CREATE TABLE IF NOT EXISTS `shipment_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shipment_id` int(10) unsigned NOT NULL,
  `finished_good_id` int(10) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `created_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Alter table `finished_goods`
--
ALTER TABLE  `finished_goods` CHANGE  `stock_status`  `stock_status` ENUM(  'In Stock',  'Shipped' ) NOT NULL DEFAULT  'In Stock' COMMENT  'Should this be counted in Location\\''s sellable inventory?'; 


-- --------------------------------------------------------

--
-- Alter table `co_items`
--
ALTER TABLE `co_items` DROP COLUMN `shipped_date`; 

-- --------------------------------------------------------

--
-- Alter table `casings`
--
ALTER TABLE  `casings` ADD  `shipped_date` DATETIME NULL DEFAULT NULL;

--//@UNDO