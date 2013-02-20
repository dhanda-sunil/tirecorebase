ALTER TABLE  `user_prefs` CHANGE  `object`  `object` VARCHAR( 64 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
CHANGE  `option`  `option` VARCHAR( 64 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
CHANGE  `value`  `value` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE  `user_prefs` CHANGE  `modified_by`  `modified_by` SMALLINT( 4 ) UNSIGNED NOT NUL;