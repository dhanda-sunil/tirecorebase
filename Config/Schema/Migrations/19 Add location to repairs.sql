-- --------------------------------------------------------

--
-- ALTER structure for  `repair_actuals` & `repair_estimates`
--
ALTER TABLE  `repair_actuals` ADD  `location` ENUM(  'crown',  'small-crown',  'shoulder',  'sidewall',  'bead' ) NOT NULL DEFAULT  'crown',
ADD INDEX (  `location` );
ALTER TABLE  `repair_estimates` ADD  `location` ENUM(  'crown',  'small-crown',  'shoulder',  'sidewall',  'bead' ) NOT NULL DEFAULT  'crown',
ADD INDEX (  `location` );
--//@UNDO