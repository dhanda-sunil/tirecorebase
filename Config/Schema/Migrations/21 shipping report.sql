-- --------------------------------------------------------

--
-- Dumping data for table `user_groups`
--

-- INSERT INTO `user_groups` (`id`, `name`, `description`, `modified`, `created`) VALUES
-- (4, 'Sales', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Alter table `co_items`
--

ALTER TABLE  `co_items` ADD  `completed_date` DATETIME NOT NULL ,
ADD INDEX (  `completed_date` ); 

ALTER TABLE  `co_items` ADD  `shipped_date` DATETIME NOT NULL; 

--//@UNDO