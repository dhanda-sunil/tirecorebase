-- --------------------------------------------------------

--
-- Alter table `tread_designs`
--

ALTER TABLE  `tread_designs` ADD  `cure_type` ENUM(  'mold',  'pre',  'ring' ) NOT NULL;

-- --------------------------------------------------------

--
-- Table structure for table `material_logs`
--

CREATE TABLE IF NOT EXISTS `material_logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` int(11) NOT NULL,
  `unit_change` int(10) NOT NULL,
  `weight_change` int(10) NOT NULL,
  `units` int(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `created_date` date NOT NULL,
  `create_time` time NOT NULL,
  `event_type` enum('add','remove','adjust') NOT NULL,
  `created_by` smallint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `material_date_event_index` (`material_id`,`created_date`,`event_type`),
  KEY `material_id` (`material_id`),
  KEY `created_date` (`created_date`),
  KEY `event_type` (`event_type`),
  KEY `material_date_index` (`material_id`,`created_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE  `material_logs` CHANGE  `weight_change`  `weight_change` DOUBLE( 7, 1 ) NOT NULL; 
ALTER TABLE  `material_logs` CHANGE  `unit_change`  `unit_change` DOUBLE( 8, 2 ) NOT NULL ,
CHANGE  `weight_change`  `weight_change` DOUBLE( 8, 2 ) NOT NULL ,
CHANGE  `units`  `units` DOUBLE( 8, 2 ) NOT NULL ,
CHANGE  `weight`  `weight` DOUBLE( 8, 2 ) NOT NULL; 

ALTER TABLE  `material_logs` DROP INDEX  `material_date_event_index` ,
ADD INDEX  `material_date_event_index` (  `material_id` ,  `created_date` ,  `event_type` );
ALTER TABLE  `material_logs` CHANGE  `create_time`  `created_time` TIME NOT NULL;

-- --------------------------------------------------------

--
-- Alter table `materials`
--

ALTER TABLE  `materials` ADD  `units` INT( 10 ) NOT NULL , ADD  `weight` DOUBLE( 7, 1 ) NOT NULL;
ALTER TABLE  `materials` CHANGE  `units`  `units` DOUBLE( 8, 2 ) NOT NULL , CHANGE  `weight`  `weight` DOUBLE( 8, 2 ) NOT NULL; 
ALTER TABLE  `materials` ENGINE = INNODB; 
ALTER TABLE  `materials` ADD  `price_per_unit` DOUBLE( 8, 2 ) UNSIGNED NOT NULL DEFAULT  '0' AFTER  `name`; 
ALTER TABLE  `materials` CHANGE  `part_number`  `part_number` VARCHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL; 
ALTER TABLE  `materials` ADD INDEX (  `part_number` );

-- --------------------------------------------------------

--
-- Alter table `batches`
--

ALTER TABLE  `batches` ADD INDEX  `type_active_index` (  `type` ,  `active` );

--//@UNDO