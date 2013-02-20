-- --------------------------------------------------------

--
-- Alter table `molds`
--
ALTER TABLE  `molds` ADD  `barcode` VARCHAR( 32 ) NOT NULL AFTER  `mold_type_id`; 
ALTER TABLE  `molds` CHANGE  `in_service`  `in_service` DATE NULL; 
ALTER TABLE  `molds` ADD INDEX (  `barcode` ); 
ALTER TABLE  `molds` ADD INDEX (  `mold_type_id` ); 

--//@UNDO