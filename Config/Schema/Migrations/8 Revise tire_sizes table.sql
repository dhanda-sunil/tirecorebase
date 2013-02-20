ALTER TABLE  `tire_sizes` DROP  `two_char_code`,
CHANGE  `construction_code`  `name` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
ADD  `buffed_circumference` DECIMAL( 7, 3 ) NOT NULL DEFAULT  '0' ;

--//@UNDO