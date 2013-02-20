ALTER TABLE  `casings`
ADD  `tread_depth` SMALLINT( 4 ) UNSIGNED NOT NULL DEFAULT 0,
ADD  `vehicle_number` VARCHAR( 50 ) NOT NULL DEFAULT '',
ADD  `brand_number` VARCHAR( 50 )  NOT NULL DEFAULT '';

--//@UNDO

ALTER TABLE `casings`
  DROP `tread_depth`,
  DROP `vehicle_number`,
  DROP `brand_number`;
