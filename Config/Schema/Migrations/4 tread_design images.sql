ALTER TABLE  `tread_designs` CHANGE  `image`  `image` BLOB NOT NULL,
ADD `image_type` VARCHAR( 10 ) NOT NULL;

--//@UNDO