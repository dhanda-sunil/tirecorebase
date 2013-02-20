-- --------------------------------------------------------

--
-- Alter table `customers`
--
ALTER TABLE `customers`
  DROP `first_name`,
  DROP `last_name`;

ALTER TABLE  `customers` CHANGE  `phone_number`  `phone_number` VARCHAR( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
CHANGE  `fax_number`  `fax_number` VARCHAR( 20 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
CHANGE  `tax_number`  `tax_number` VARCHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

-- --------------------------------------------------------

--
-- Alter table `contacts`
--
ALTER TABLE  `contacts` ADD  `phone_number` VARCHAR( 14 ) NOT NULL AFTER  `label`;

-- --------------------------------------------------------

--
-- Alter table `users`
--
ALTER TABLE  `users` CHANGE  `shop_checkpoint_pref_id`  `checkpoint_id` INT( 1 ) UNSIGNED NULL DEFAULT NULL;
ALTER TABLE  `users` CHANGE  `location_id`  `location_id` TINYINT( 3 ) UNSIGNED NULL; 
--//@UNDO