-- --------------------------------------------------------

--
-- ALTER structure for table `retread_template_preferences`
--
ALTER TABLE  `retread_template_preferences` ADD INDEX (  `retread_template_id` ); 
ALTER TABLE  `retread_template_preferences` ADD INDEX  `template_tiresize` (  `retread_template_id` ,  `tire_size_id` ); 

--//@UNDO