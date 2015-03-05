-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2014 at 06:55 AM
-- Server version: 5.5.34
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ortrackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `aproval_stage`
--

CREATE TABLE IF NOT EXISTS `aproval_stage` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `stage_name` varchar(100) NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `Updatedby` int(11) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `Dateupdated` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`author_id`),
  KEY `FK_author_staff` (`staff_id`),
  KEY `FK_author_users` (`created_by`),
  KEY `FK_author_users1` (`last_updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `staff_id`, `date_created`, `created_by`, `date_last_updated`, `last_updated_by`) VALUES
(1, 2, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(2, 3, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(3, 4, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(4, 5, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(6, 2, '2014-11-05 08:08:56', 1, '2014-11-05 08:08:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `author_type`
--

CREATE TABLE IF NOT EXISTS `author_type` (
  `author_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `descriptions` varchar(50) NOT NULL,
  `Details` varchar(150) NOT NULL,
  PRIMARY KEY (`author_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `author_type`
--

INSERT INTO `author_type` (`author_type_id`, `descriptions`, `Details`) VALUES
(1, 'Lead Author', 'Leads the authoring process                                                '),
(2, 'Co-Author', 'Assists the Lead author                                                '),
(3, 'Data Manager', 'Helps with data management roles in the writing process                                                ');

-- --------------------------------------------------------

--
-- Table structure for table `concept`
--

CREATE TABLE IF NOT EXISTS `concept` (
  `concept_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`concept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `concept_sheet_prg`
--

CREATE TABLE IF NOT EXISTS `concept_sheet_prg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prg_id` int(11) NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `prg_descision` int(11) NOT NULL,
  `prg_question` varchar(150) NOT NULL,
  `comments` varchar(150) NOT NULL,
  `created_by` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_concept_sheet_prg_prg` (`prg_id`),
  KEY `FK_concept_sheet_prg_prg_descision` (`prg_descision`),
  KEY `FK_concept_sheet_prg_users` (`created_by`),
  KEY `FK_concept_sheet_prg_users1` (`last_update_by`),
  KEY `FK_concept_sheet_prg_work_item` (`work_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_type`
--

CREATE TABLE IF NOT EXISTS `contact_type` (
  `contact_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `descriptions` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `added_by` datetime NOT NULL,
  PRIMARY KEY (`contact_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`ID`, `Name`) VALUES
(1, 'Councellor');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL,
  `versions` varchar(50) NOT NULL,
  PRIMARY KEY (`document_id`),
  KEY `FK_documents_work_item` (`work_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document_file_path`
--

CREATE TABLE IF NOT EXISTS `document_file_path` (
  `document_path_id` int(11) NOT NULL AUTO_INCREMENT,
  `_file_name` varchar(50) NOT NULL,
  `file_extension` varchar(50) NOT NULL,
  `file_loctation` varchar(150) NOT NULL,
  `document_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`document_path_id`),
  KEY `FK_document_file_path_documents` (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document_submission`
--

CREATE TABLE IF NOT EXISTS `document_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submission_date` datetime NOT NULL,
  `description` varchar(50) NOT NULL,
  `document_id` int(11) NOT NULL,
  `submission_type` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_document_submission_documents` (`document_id`),
  KEY `FK_document_submission_submission_type` (`submission_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `irb`
--

CREATE TABLE IF NOT EXISTS `irb` (
  `irb_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `irb_date` datetime NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  PRIMARY KEY (`irb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'sdsd', 'sddsd', 'sdsdsdfsdff'),
(2, 'sdfs', 'sdfsd', 'sdfsddsdf'),
(3, 'asdasda', 'asdasda', 'asdasda'),
(4, 'asdasda', 'asdasda', 'asdasda'),
(5, 'asdasda', 'asdasda', 'asdasda'),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `output`
--

CREATE TABLE IF NOT EXISTS `output` (
  `output_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` datetime NOT NULL,
  `output_type` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `conference_start_date` datetime DEFAULT NULL,
  `conference_end_date` datetime DEFAULT NULL,
  `conference_venue` int(11) DEFAULT NULL,
  `country` int(11) NOT NULL,
  `conference_organisation` int(11) DEFAULT NULL,
  PRIMARY KEY (`output_id`),
  KEY `FK_output_country` (`country`),
  KEY `FK_output_output_type` (`output_type`),
  KEY `FK_output_users` (`created_by`),
  KEY `FK_output_users1` (`last_update_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `output_type`
--

CREATE TABLE IF NOT EXISTS `output_type` (
  `output_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `descriptions` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`output_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prg`
--

CREATE TABLE IF NOT EXISTS `prg` (
  `prg_id` int(11) NOT NULL AUTO_INCREMENT,
  `prg_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  PRIMARY KEY (`prg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prg_descision`
--

CREATE TABLE IF NOT EXISTS `prg_descision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descision` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `Name`) VALUES
(1, 'TB');

-- --------------------------------------------------------

--
-- Table structure for table `protocol`
--

CREATE TABLE IF NOT EXISTS `protocol` (
  `protocol_id` int(11) NOT NULL AUTO_INCREMENT,
  `irb_protocol_number` varchar(50) NOT NULL,
  `irb_id` int(11) NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  PRIMARY KEY (`protocol_id`),
  KEY `FK_protocol_irb` (`irb_id`),
  KEY `FK_protocol_work_item` (`work_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `right_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  PRIMARY KEY (`right_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`right_id`, `description`, `date_created`, `created_by`, `date_last_updated`, `last_update_by`) VALUES
(1, 'manage work items', '2014-12-01 00:00:00', 1, '2014-12-01 00:00:00', 1),
(2, 'manage reviews', '2014-12-03 00:00:00', 1, '2014-12-01 00:00:00', 1),
(3, 'manage output', '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(4, 'manage processes', '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(5, 'manage authors', '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(7, 'manage documents', '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(8, 'manage settings', '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `description`, `date_created`, `created_by`, `date_last_updated`, `last_update_by`) VALUES
(1, 'Administrator', '2014-12-02 00:00:00', 1, '2014-12-02 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_right`
--

CREATE TABLE IF NOT EXISTS `role_right` (
  `role_right_id` int(11) NOT NULL AUTO_INCREMENT,
  `right_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`role_right_id`),
  KEY `FK_role_right_rights` (`right_id`),
  KEY `FK_role_right_roles` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role_right`
--

INSERT INTO `role_right` (`role_right_id`, `right_id`, `role_id`, `date_created`, `created_by`, `date_last_updated`, `last_updated_by`) VALUES
(1, 1, 1, '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(3, 2, 1, '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(4, 3, 1, '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(5, 5, 1, '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_by`, `date_created`, `last_updated_by`, `last_update_date`) VALUES
(1, 1, 1, 1, '2014-12-03 00:00:00', 1, '2014-12-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `payroll_number` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `FK_staff_Designation` (`designation_id`),
  KEY `FK_staff_Program` (`program`),
  KEY `FK_staff_Station` (`station_id`),
  KEY `FK_staff_users` (`updated_by`),
  KEY `FK_staff_users1` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `second_name`, `last_name`, `designation_id`, `payroll_number`, `station_id`, `date_created`, `created_by`, `date_updated`, `updated_by`, `program`) VALUES
(2, 'James', 'Gachie', 'Gachie', 1, 52322, 1, '2014-10-01 00:00:00', 1, '2014-10-01 00:00:00', 1, 1),
(3, 'Fran', 'Merida', 'Gonzales', 1, 1232, 1, '2014-10-22 00:00:00', 1, '2014-10-22 00:00:00', 1, 1),
(4, 'Roger', 'Miller', 'Thomas', 1, 2132423, 1, '2014-10-22 00:00:00', 1, '2014-10-22 00:00:00', 1, 1),
(5, 'Angel', 'Di', 'Maria', 1, 12123, 1, '2014-10-24 00:00:00', 1, '2014-10-24 00:00:00', 1, 1),
(6, 'Louis', 'Nani', 'Santos', 1, 23232, 1, '2014-11-05 00:00:00', 1, '2014-11-05 00:00:00', 1, 1),
(7, 'James', 'Rodriguez', 'Bajio', 1, 2445456, 1, '2014-11-06 09:01:32', 1, '2014-11-06 09:01:32', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_contact`
--

CREATE TABLE IF NOT EXISTS `staff_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_type` int(11) NOT NULL,
  `contact_value` varchar(50) CHARACTER SET utf8 NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `FK_staff_contact_contact_type` (`contact_type`),
  KEY `FK_staff_contact_staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `stage_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`stage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`stage_id`, `description`) VALUES
(2, 'PRG Review'),
(3, 'Demo Stage');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`ID`, `Name`) VALUES
(1, 'Kisian');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `details` varchar(150) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `description`, `date_created`, `created_by`, `date_last_updated`, `last_updated_by`, `details`) VALUES
(3, 'Complete', '2014-11-20 12:15:06', 1, '2014-11-20 12:15:06', 1, 'Finished'),
(4, 'Started', '2014-11-26 07:08:30', 1, '2014-11-26 07:08:30', 1, 'Status started.');

-- --------------------------------------------------------

--
-- Table structure for table `submission_from`
--

CREATE TABLE IF NOT EXISTS `submission_from` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submission_from` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_updated_date` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sumission_from_document_submission` (`submission_id`),
  KEY `FK_sumission_from_users` (`created_by`),
  KEY `FK_sumission_from_users1` (`last_updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `submission_to`
--

CREATE TABLE IF NOT EXISTS `submission_to` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submission_from_id` int(11) NOT NULL,
  `submision_to` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_submission_to_sumission_from` (`submission_from_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `submission_type`
--

CREATE TABLE IF NOT EXISTS `submission_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submission_type` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `FK_users_staff` (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `staff_id`, `is_deleted`, `username`, `password`, `created_by`, `date_created`, `date_updated`, `last_updated_by`) VALUES
(1, 2, b'0', 'jgachie', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2014-10-01 00:00:00', '2014-10-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_item`
--

CREATE TABLE IF NOT EXISTS `work_item` (
  `work_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `work_type` int(11) NOT NULL,
  `submission_deadline` datetime NOT NULL,
  `creation_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  PRIMARY KEY (`work_item_id`),
  KEY `FK_work_item_users` (`created_by`),
  KEY `FK_work_item_users1` (`last_updated_by`),
  KEY `FK_work_item_work_type` (`work_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_author`
--

CREATE TABLE IF NOT EXISTS `work_item_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `author_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_work_item_author_author` (`author_id`),
  KEY `FK_work_item_author_work_item` (`work_item_id`),
  KEY `author_type` (`author_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_author_end_date`
--

CREATE TABLE IF NOT EXISTS `work_item_author_end_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_item_author_id` int(11) NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `work_item_author_id` (`work_item_author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_output`
--

CREATE TABLE IF NOT EXISTS `work_item_output` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_item_id` int(11) NOT NULL,
  `output_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_work_item_output_work_item` (`work_item_id`),
  KEY `FK_work_item_output_output` (`output_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_stage`
--

CREATE TABLE IF NOT EXISTS `work_item_stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_item_id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `responsible` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_work_item_stage_work_item` (`work_item_id`),
  KEY `FK_work_item_stage_stage` (`stage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_stage_output`
--

CREATE TABLE IF NOT EXISTS `work_item_stage_output` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_item_stage` int(11) NOT NULL,
  `Comments` varchar(150) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `document` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_stage_status`
--

CREATE TABLE IF NOT EXISTS `work_item_stage_status` (
  `id` int(11) NOT NULL,
  `work_item_stage` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_start_date` date NOT NULL,
  `status_end_date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_status`
--

CREATE TABLE IF NOT EXISTS `work_item_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_item_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_work_item_status_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE IF NOT EXISTS `work_type` (
  `work_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`work_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_type_stage`
--

CREATE TABLE IF NOT EXISTS `work_type_stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_type` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_work_type_stage_work_type` (`work_type`),
  KEY `FK_work_type_stage_stage` (`stage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `FK_author_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `FK_author_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_author_users1` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `concept_sheet_prg`
--
ALTER TABLE `concept_sheet_prg`
  ADD CONSTRAINT `FK_concept_sheet_prg_prg` FOREIGN KEY (`prg_id`) REFERENCES `prg` (`prg_id`),
  ADD CONSTRAINT `FK_concept_sheet_prg_prg_descision` FOREIGN KEY (`prg_descision`) REFERENCES `prg_descision` (`id`),
  ADD CONSTRAINT `FK_concept_sheet_prg_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_concept_sheet_prg_users1` FOREIGN KEY (`last_update_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_concept_sheet_prg_work_item` FOREIGN KEY (`work_item_id`) REFERENCES `work_item` (`work_item_id`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `FK_documents_work_item` FOREIGN KEY (`work_item_id`) REFERENCES `work_item` (`work_item_id`);

--
-- Constraints for table `document_file_path`
--
ALTER TABLE `document_file_path`
  ADD CONSTRAINT `FK_document_file_path_documents` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`);

--
-- Constraints for table `document_submission`
--
ALTER TABLE `document_submission`
  ADD CONSTRAINT `FK_document_submission_documents` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`),
  ADD CONSTRAINT `FK_document_submission_submission_type` FOREIGN KEY (`submission_type`) REFERENCES `submission_type` (`id`);

--
-- Constraints for table `output`
--
ALTER TABLE `output`
  ADD CONSTRAINT `FK_output_country` FOREIGN KEY (`country`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `FK_output_output_type` FOREIGN KEY (`output_type`) REFERENCES `output_type` (`output_type_id`),
  ADD CONSTRAINT `FK_output_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_output_users1` FOREIGN KEY (`last_update_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `protocol`
--
ALTER TABLE `protocol`
  ADD CONSTRAINT `FK_protocol_irb` FOREIGN KEY (`irb_id`) REFERENCES `irb` (`irb_id`),
  ADD CONSTRAINT `FK_protocol_work_item` FOREIGN KEY (`work_item_id`) REFERENCES `work_item` (`work_item_id`);

--
-- Constraints for table `role_right`
--
ALTER TABLE `role_right`
  ADD CONSTRAINT `FK_role_right_rights` FOREIGN KEY (`right_id`) REFERENCES `rights` (`right_id`),
  ADD CONSTRAINT `FK_role_right_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_staff_Designation` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`ID`),
  ADD CONSTRAINT `FK_staff_Program` FOREIGN KEY (`program`) REFERENCES `program` (`ID`),
  ADD CONSTRAINT `FK_staff_Station` FOREIGN KEY (`station_id`) REFERENCES `station` (`ID`),
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `staff_contact`
--
ALTER TABLE `staff_contact`
  ADD CONSTRAINT `FK_staff_contact_contact_type` FOREIGN KEY (`contact_type`) REFERENCES `contact_type` (`contact_type_id`),
  ADD CONSTRAINT `FK_staff_contact_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `submission_from`
--
ALTER TABLE `submission_from`
  ADD CONSTRAINT `FK_sumission_from_document_submission` FOREIGN KEY (`submission_id`) REFERENCES `document_submission` (`id`),
  ADD CONSTRAINT `FK_sumission_from_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_sumission_from_users1` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `submission_to`
--
ALTER TABLE `submission_to`
  ADD CONSTRAINT `FK_submission_to_sumission_from` FOREIGN KEY (`submission_from_id`) REFERENCES `submission_from` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `work_item`
--
ALTER TABLE `work_item`
  ADD CONSTRAINT `FK_work_item_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_work_item_users1` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_work_item_work_type` FOREIGN KEY (`work_type`) REFERENCES `work_type` (`work_type_id`);

--
-- Constraints for table `work_item_author`
--
ALTER TABLE `work_item_author`
  ADD CONSTRAINT `FK_work_item_author_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `FK_work_item_author_work_item` FOREIGN KEY (`work_item_id`) REFERENCES `work_item` (`work_item_id`),
  ADD CONSTRAINT `work_item_author_ibfk_1` FOREIGN KEY (`author_type`) REFERENCES `author_type` (`author_type_id`);

--
-- Constraints for table `work_item_author_end_date`
--
ALTER TABLE `work_item_author_end_date`
  ADD CONSTRAINT `work_item_author_end_date_ibfk_1` FOREIGN KEY (`work_item_author_id`) REFERENCES `work_item_author` (`id`);

--
-- Constraints for table `work_item_output`
--
ALTER TABLE `work_item_output`
  ADD CONSTRAINT `FK_work_item_output_output` FOREIGN KEY (`output_id`) REFERENCES `output` (`output_id`),
  ADD CONSTRAINT `FK_work_item_output_work_item` FOREIGN KEY (`work_item_id`) REFERENCES `work_item` (`work_item_id`);

--
-- Constraints for table `work_item_stage`
--
ALTER TABLE `work_item_stage`
  ADD CONSTRAINT `FK_work_item_stage_stage` FOREIGN KEY (`stage`) REFERENCES `stage` (`stage_id`),
  ADD CONSTRAINT `FK_work_item_stage_work_item` FOREIGN KEY (`work_item_id`) REFERENCES `work_item` (`work_item_id`);

--
-- Constraints for table `work_item_status`
--
ALTER TABLE `work_item_status`
  ADD CONSTRAINT `FK_work_item_status_status` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `work_type_stage`
--
ALTER TABLE `work_type_stage`
  ADD CONSTRAINT `FK_work_type_stage_stage` FOREIGN KEY (`stage`) REFERENCES `stage` (`stage_id`),
  ADD CONSTRAINT `FK_work_type_stage_work_type` FOREIGN KEY (`work_type`) REFERENCES `work_type` (`work_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
