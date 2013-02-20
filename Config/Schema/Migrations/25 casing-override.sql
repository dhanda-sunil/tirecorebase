-- --------------------------------------------------------

--
-- Alter table `casings`
--
ALTER TABLE  `casings` ADD  `manager_override` SMALLINT( 4 ) UNSIGNED NOT NULL; 

-- --------------------------------------------------------

--
-- Alter table `casing_log_events`
--

-- INSERT INTO  `casing_log_events` (
-- `id` ,
-- `name`
-- )
-- VALUES (
-- NULL ,  'Override'
-- );



--//@UNDO