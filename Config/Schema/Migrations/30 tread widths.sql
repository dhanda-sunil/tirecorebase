-- --------------------------------------------------------

--
-- Add 'size' to tread_widths table
--

ALTER TABLE `tread_widths`  ADD `size` INT NOT NULL AFTER `size_mm`;

--//@UNDO