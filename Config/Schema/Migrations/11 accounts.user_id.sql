ALTER TABLE  `accounts` ADD  `user_id` SMALLINT( 4 ) UNSIGNED NOT NULL AFTER  `account_type_id` ,
ADD INDEX (  `user_id` );

--//@UNDO