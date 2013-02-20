RENAME TABLE  `tread_design_tread_widths` TO `tread_design_details`;

ALTER TABLE  `tread_design_details`
ADD  `mrf_item_no` VARCHAR( 255 ) NOT NULL DEFAULT  '',
ADD  `tread_depth` DECIMAL( 7, 2 ) NOT NULL DEFAULT  '0',
ADD  `roll_weight` DECIMAL( 10, 2 ) NOT NULL DEFAULT  '0',
ADD  `weight_per_foot` DECIMAL( 5, 2 ) NOT NULL DEFAULT  '0',
ADD  `usage_uom_id` INT NOT NULL;

--//@UNDO

ALTER TABLE  `tread_design_details`
DROP  `mrf_item_no` ,
DROP  `tread_depth`,
DROP  `roll_weight`,
DROP  `weight_per_foot` ,
DROP  `usage_uom_id` ;

RENAME TABLE `tread_design_details` TO `tread_design_tread_widths` ;
