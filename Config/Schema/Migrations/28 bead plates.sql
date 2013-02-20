-- --------------------------------------------------------

--
-- Table structure for table `bead_plates`
--

CREATE TABLE IF NOT EXISTS `bead_plates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref` varchar(4) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--//@UNDO