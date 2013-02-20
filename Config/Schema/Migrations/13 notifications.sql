CREATE TABLE IF NOT EXISTS `user_notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `text` text NOT NULL,
  `type` enum('warning','success','information') NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
ALTER TABLE  `user_notifications` ADD  `viewed` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT  '0' AFTER  `type`;
--//@UNDO
