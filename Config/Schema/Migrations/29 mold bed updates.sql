-- --------------------------------------------------------

--
-- Change bead_plate to bead_plate_id
--


ALTER TABLE  `mold_types`
CHANGE  `bead_plate`  `bead_plate_id` int(10) unsigned DEFAULT NULL,
CHANGE  `code`  `code` varchar(10) DEFAULT "";

--//@UNDO