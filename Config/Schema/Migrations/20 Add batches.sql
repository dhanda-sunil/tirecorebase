-- --------------------------------------------------------


--
-- Table structure for table `batches`
--

CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('shipping','receiving','inventory') NOT NULL,
  `created` datetime NOT NULL,
  `exported` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `data` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--//@UNDO