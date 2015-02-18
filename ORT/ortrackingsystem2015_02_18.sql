-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2015 at 02:22 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `staff_id`, `date_created`, `created_by`, `date_last_updated`, `last_updated_by`) VALUES
(1, 2, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(2, 3, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(3, 4, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(4, 5, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(6, 2, '2014-11-05 08:08:56', 1, '2014-11-05 08:08:56', 1),
(7, 6, '2015-01-23 07:13:29', 1, '2015-01-23 07:13:29', 1);

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
  `country_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `Name`, `country_code`) VALUES
(1, 'Kenya', ''),
(2, 'United States of America', '');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`ID`, `Name`) VALUES
(1, 'Councellor'),
(2, 'Data Manager'),
(3, 'Researcher');

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
  `date_received` datetime NOT NULL,
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
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `organisation_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `country` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `date_last_upadated` datetime NOT NULL,
  PRIMARY KEY (`organisation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`organisation_id`, `name`, `description`, `country`, `created_by`, `date_created`, `last_updated_by`, `date_last_upadated`) VALUES
(1, 'JKUAT', 'University', 1, 1, '2015-02-18 00:00:00', 1, '2015-02-18 00:00:00'),
(2, 'Kenyatta university', 'University', 1, 1, '2015-02-18 00:00:00', 2, '2015-02-18 00:00:00');

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
-- Table structure for table `reason_for_submission`
--

CREATE TABLE IF NOT EXISTS `reason_for_submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reason_for_submission`
--

INSERT INTO `reason_for_submission` (`id`, `description`) VALUES
(1, 'Storage'),
(2, 'Review by ERC'),
(3, 'Review By PRG'),
(4, 'Clearence for Presentation'),
(5, 'Clearence For Publication'),
(6, 'Return To PI');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

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
(8, 'manage settings', '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(9, 'list work items', '2015-01-06 00:00:00', 1, '2015-01-06 00:00:00', 1),
(10, 'list work item types', '2015-01-06 00:00:00', 1, '2015-01-06 00:00:00', 1),
(11, 'list stages', '2015-01-06 00:00:00', 1, '2015-01-06 00:00:00', 1),
(12, 'list work item type stage', '2015-01-06 00:00:00', 1, '2015-01-06 00:00:00', 1),
(13, 'list authors', '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(14, 'list author types', '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(15, 'list work item author', '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(16, 'list status', '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(17, 'list work item status', '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(18, 'list work item stage', '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(19, 'list work item stage status', '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(20, 'list outputs', '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(21, 'list work item stage outputs', '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `description`, `date_created`, `created_by`, `date_last_updated`, `last_update_by`) VALUES
(1, 'Administrator', '2014-12-02 00:00:00', 1, '2014-12-02 00:00:00', 1),
(2, 'Data Clerk', '2015-01-06 00:00:00', 1, '2015-01-06 00:00:00', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `role_right`
--

INSERT INTO `role_right` (`role_right_id`, `right_id`, `role_id`, `date_created`, `created_by`, `date_last_updated`, `last_updated_by`) VALUES
(1, 1, 1, '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(3, 2, 1, '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(4, 3, 1, '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(5, 5, 1, '2014-12-05 00:00:00', 1, '2014-12-05 00:00:00', 1),
(6, 4, 1, '2014-12-10 00:00:00', 1, '2014-12-10 00:00:00', 1),
(7, 1, 2, '2015-01-06 00:00:00', 1, '2015-01-06 00:00:00', 1),
(8, 9, 2, '2015-01-06 00:00:00', 1, '2015-01-06 00:00:00', 1),
(9, 15, 2, '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(10, 15, 1, '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(11, 14, 1, '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(12, 13, 1, '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(13, 5, 2, '2015-01-07 00:00:00', 1, '2015-01-07 00:00:00', 1),
(14, 17, 2, '2015-01-08 00:00:00', 1, '2015-01-08 00:00:00', 1),
(15, 18, 2, '2015-01-01 00:00:00', 1, '2015-01-08 00:00:00', 1),
(16, 19, 2, '2015-01-08 00:00:00', 1, '2015-01-08 00:00:00', 1),
(17, 21, 2, '2015-01-08 00:00:00', 1, '2015-01-08 00:00:00', 1),
(18, 4, 2, '2015-01-08 00:00:00', 1, '2015-01-08 00:00:00', 1),
(19, 17, 1, '2015-01-14 00:00:00', 1, '2015-01-14 00:00:00', 1),
(20, 18, 1, '2015-01-14 00:00:00', 1, '2015-01-14 00:00:00', 1),
(21, 19, 1, '2015-01-14 00:00:00', 1, '2015-01-14 00:00:00', 1),
(22, 21, 1, '2015-01-14 00:00:00', 1, '2015-01-14 00:00:00', 1),
(23, 10, 1, '2015-01-14 00:00:00', 1, '2015-01-14 00:00:00', 1),
(24, 9, 1, '2015-01-14 00:00:00', 1, '2015-01-14 00:00:00', 1),
(25, 12, 1, '2015-01-28 00:00:00', 1, '2015-01-28 00:00:00', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_by`, `date_created`, `last_updated_by`, `last_update_date`) VALUES
(1, 1, 1, 1, '2014-12-03 00:00:00', 1, '2014-12-02 00:00:00'),
(2, 2, 2, 1, '2015-01-06 00:00:00', 1, '2015-01-06 00:00:00');

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
  `payroll_number` int(11) DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `program` int(11) DEFAULT NULL,
  `title` int(11) NOT NULL,
  `organisation` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `FK_staff_Designation` (`designation_id`),
  KEY `FK_staff_Program` (`program`),
  KEY `FK_staff_Station` (`station_id`),
  KEY `FK_staff_users` (`updated_by`),
  KEY `FK_staff_users1` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `second_name`, `last_name`, `designation_id`, `payroll_number`, `station_id`, `date_created`, `created_by`, `date_updated`, `updated_by`, `program`, `title`, `organisation`, `country`) VALUES
(2, 'James', 'Gachie', 'Gachie', 1, 52322, 1, '2014-10-01 00:00:00', 1, '2014-10-01 00:00:00', 1, 1, 0, 0, 0),
(3, 'Fran', 'Merida', 'Gonzales', 1, 1232, 1, '2014-10-22 00:00:00', 1, '2014-10-22 00:00:00', 1, 1, 0, 0, 0),
(4, 'Roger', 'Miller', 'Thomas', 1, 2132423, 1, '2014-10-22 00:00:00', 1, '2014-10-22 00:00:00', 1, 1, 0, 0, 0),
(5, 'Angel', 'Di', 'Maria', 1, 12123, 1, '2014-10-24 00:00:00', 1, '2014-10-24 00:00:00', 1, 1, 0, 0, 0),
(6, 'Louis', 'Nani', 'Santos', 1, 23232, 1, '2014-11-05 00:00:00', 1, '2014-11-05 00:00:00', 1, 1, 0, 0, 0),
(7, 'James', 'Rodriguez', 'Bajio', 1, 2445456, 1, '2014-11-06 09:01:32', 1, '2014-11-06 09:01:32', 1, 1, 0, 0, 0),
(11, 'Mike', 'Okoth', 'Aono', 3, NULL, NULL, '2015-02-18 13:50:00', 2, '2015-02-18 13:50:00', 2, NULL, 1, 1, 1),
(12, 'Mike', 'Okoth', 'Aono', 3, NULL, NULL, '2015-02-18 13:50:16', 2, '2015-02-18 13:50:16', 2, NULL, 1, 1, 1),
(13, 'Mike', 'Okoth', 'Aono', 3, NULL, NULL, '2015-02-18 13:54:16', 2, '2015-02-18 13:54:16', 2, NULL, 1, 1, 1);

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
-- Table structure for table `staff_title`
--

CREATE TABLE IF NOT EXISTS `staff_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff_title`
--

INSERT INTO `staff_title` (`id`, `description`) VALUES
(1, 'Mr'),
(2, 'Mrs');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `stage_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`stage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`stage_id`, `description`) VALUES
(2, 'PRG Review'),
(3, 'Branch Chief Review'),
(4, 'DGHA Activity Manager Review'),
(5, 'CDC Senior Science and Ethics Office Review'),
(6, 'CDC Atlanta Approval'),
(7, 'Concurrence From Co Authors'),
(8, 'Dissemination To Intended Audience');

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
-- Table structure for table `uploaded_document`
--

CREATE TABLE IF NOT EXISTS `uploaded_document` (
  `upload_document_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_type` varchar(50) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `full_path` varchar(250) NOT NULL,
  `raw_name` varchar(50) NOT NULL,
  `orig_name` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `file_ext` varchar(50) NOT NULL,
  `upload_path` varchar(250) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  `description` varchar(100) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `voided` tinyint(1) NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`upload_document_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `uploaded_document`
--

INSERT INTO `uploaded_document` (`upload_document_id`, `file_type`, `file_path`, `full_path`, `raw_name`, `orig_name`, `client_name`, `file_ext`, `upload_path`, `created_by`, `date_created`, `last_update_by`, `date_updated`, `description`, `file_name`, `voided`, `version`) VALUES
(1, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'aonocv12', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Manuscript/2015/01/Balon d''or/aonocv12.doc', 2, '2015-01-21 12:02:33', 2, '2015-01-21 12:02:33', 'aonocv.doc', 'aonocv12.doc', 1, 1),
(2, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'conflict5', 'conflict.doc', 'conflict.doc', '', 'uploads/Manuscript/2015/01/Balon d''or/conflict5.do', 2, '2015-01-21 12:05:09', 2, '2015-01-21 12:05:09', 'conflict.doc', 'conflict5.doc', 0, 1),
(3, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'conflict6', 'conflict.doc', 'conflict.doc', '', 'uploads/Manuscript/2015/01/Balon d''or/conflict6.do', 2, '2015-01-21 12:05:45', 2, '2015-01-21 12:05:45', 'conflict.doc', 'conflict6.doc', 1, 1),
(4, 'image/png', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'clinic_logo1', 'clinic_logo.png', 'clinic logo.png', '', 'uploads/Manuscript/2015/01/Balon d''or/clinic_logo1', 2, '2015-01-21 12:08:19', 2, '2015-01-21 12:08:19', 'clinic logo.png', 'clinic_logo1.png', 0, 1),
(5, 'image/png', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'clinic_logo2', 'clinic_logo.png', 'clinic logo.png', '', 'uploads/Manuscript/2015/01/Balon d''or/clinic_logo2', 2, '2015-01-21 12:09:17', 2, '2015-01-21 12:09:17', 'clinic logo.png', 'clinic_logo2.png', 0, 1),
(6, 'image/png', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'clinic_logo3', 'clinic_logo.png', 'clinic logo.png', '', 'uploads/Manuscript/2015/01/Balon d''or/clinic_logo3', 2, '2015-01-21 12:10:22', 2, '2015-01-21 12:10:22', 'clinic logo.png', 'clinic_logo3.png', 0, 1),
(7, 'image/png', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'C:/Program Files (x86)/VertrigoServ/www/ORT/upload', 'clinic_logo4', 'clinic_logo.png', 'clinic logo.png', '', 'uploads/Manuscript/2015/01/Balon d''or/clinic_logo4', 2, '2015-01-21 12:10:46', 2, '2015-01-21 12:10:46', 'clinic logo.png', 'clinic_logo4.png', 0, 1),
(8, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy1.pdf', 'Materials_12AS_FraudCaseStudy1', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 06:27:37', 2, '2015-01-28 06:27:37', 'output description', 'Materials_12AS_FraudCaseStudy1.pdf', 0, 2),
(9, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy2.pdf', 'Materials_12AS_FraudCaseStudy2', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 06:32:05', 2, '2015-01-28 06:32:05', 'output description', 'Materials_12AS_FraudCaseStudy2.pdf', 0, 2),
(10, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy3.pdf', 'Materials_12AS_FraudCaseStudy3', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 06:33:56', 2, '2015-01-28 06:33:56', 'Output Description', 'Materials_12AS_FraudCaseStudy3.pdf', 0, 2),
(11, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy4.pdf', 'Materials_12AS_FraudCaseStudy4', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 06:35:28', 2, '2015-01-28 06:35:28', 'Comments', 'Materials_12AS_FraudCaseStudy4.pdf', 0, 2),
(12, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy5.pdf', 'Materials_12AS_FraudCaseStudy5', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 06:35:50', 2, '2015-01-28 06:35:50', 'Comments', 'Materials_12AS_FraudCaseStudy5.pdf', 0, 2),
(13, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy6.pdf', 'Materials_12AS_FraudCaseStudy6', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 06:36:23', 2, '2015-01-28 06:36:23', 'Comments', 'Materials_12AS_FraudCaseStudy6.pdf', 0, 2),
(14, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy7.pdf', 'Materials_12AS_FraudCaseStudy7', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 06:38:03', 2, '2015-01-28 06:38:03', 'work-item', 'Materials_12AS_FraudCaseStudy7.pdf', 0, 2),
(15, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy8.pdf', 'Materials_12AS_FraudCaseStudy8', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 06:40:06', 2, '2015-01-28 06:40:06', 'work-item', 'Materials_12AS_FraudCaseStudy8.pdf', 0, 2),
(16, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy9.pdf', 'Materials_12AS_FraudCaseStudy9', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 06:41:16', 2, '2015-01-28 06:41:16', 'output description', 'Materials_12AS_FraudCaseStudy9.pdf', 0, 2),
(17, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/aonocv13.doc', 'aonocv13', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Manuscript/2015/01/Balon d''or/aonocv.doc', 2, '2015-01-28 06:42:56', 2, '2015-01-28 06:42:56', 'sdsgs', 'aonocv13.doc', 0, 2),
(18, 'image/png', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/clinic_logo5.png', 'clinic_logo5', 'clinic_logo.png', 'clinic logo.png', '', 'uploads/Manuscript/2015/01/Balon d''or/clinic logo.png', 2, '2015-01-28 06:44:00', 2, '2015-01-28 06:44:00', '1', 'clinic_logo5.png', 0, 2),
(19, 'image/png', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/clinic_logo6.png', 'clinic_logo6', 'clinic_logo.png', 'clinic logo.png', '', 'uploads/Manuscript/2015/01/Balon d''or/clinic logo.png', 2, '2015-01-28 06:47:06', 2, '2015-01-28 06:47:06', 'dtyet', 'clinic_logo6.png', 0, 1),
(20, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/aonocv14.doc', 'aonocv14', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Manuscript/2015/01/Balon d''or/aonocv.doc', 2, '2015-01-28 07:41:11', 2, '2015-01-28 07:41:11', 'zsda', 'aonocv14.doc', 0, 12),
(21, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/aonocv15.doc', 'aonocv15', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Manuscript/2015/01/Balon d''or/aonocv.doc', 2, '2015-01-28 07:46:39', 2, '2015-01-28 07:46:39', 'gfghgfg', 'aonocv15.doc', 0, 2),
(22, 'image/png', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/clinic_logo7.png', 'clinic_logo7', 'clinic_logo.png', 'clinic logo.png', '', 'uploads/Manuscript/2015/01/Balon d''or/clinic logo.png', 2, '2015-01-28 08:03:22', 2, '2015-01-28 08:03:22', 'dffffffffgdf', 'clinic_logo7.png', 0, 2),
(23, 'image/png', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/clinic_logo11.png', 'clinic_logo11', 'clinic_logo1.png', 'clinic logo1.png', '', 'uploads/Manuscript/2015/01/Balon d''or/clinic logo1.png', 2, '2015-01-28 08:06:19', 2, '2015-01-28 08:06:19', 'Output Description', 'clinic_logo11.png', 0, 2),
(24, 'image/png', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/clinic_logo12.png', 'clinic_logo12', 'clinic_logo1.png', 'clinic logo1.png', '', 'uploads/Manuscript/2015/01/Balon d''or/clinic logo1.png', 2, '2015-01-28 08:09:00', 2, '2015-01-28 08:09:00', 'Output Description', 'clinic_logo12.png', 0, 2),
(25, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy10.pdf', 'Materials_12AS_FraudCaseStudy10', 'Materials_12AS_FraudCaseStudy.pdf', 'Materials_12AS_FraudCaseStudy.pdf', '', 'uploads/Manuscript/2015/01/Balon d''or/Materials_12AS_FraudCaseStudy.pdf', 2, '2015-01-28 11:08:18', 2, '2015-01-28 11:08:18', 'MMMM', 'Materials_12AS_FraudCaseStudy10.pdf', 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `staff_id`, `is_deleted`, `username`, `password`, `created_by`, `date_created`, `date_updated`, `last_updated_by`) VALUES
(1, 2, b'0', 'jgachie', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2014-10-01 00:00:00', '2014-10-01 00:00:00', 1),
(2, 6, b'0', 'nani', '02ea2ae2a237c042285e093e6972eaa9', 1, '2015-01-06 00:00:00', '2015-01-06 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_item`
--

CREATE TABLE IF NOT EXISTS `work_item` (
  `work_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) NOT NULL,
  `work_type` int(11) NOT NULL,
  `submission_deadline` datetime NOT NULL,
  `creation_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `details` varchar(250) NOT NULL,
  PRIMARY KEY (`work_item_id`),
  KEY `FK_work_item_users` (`created_by`),
  KEY `FK_work_item_users1` (`last_updated_by`),
  KEY `FK_work_item_work_type` (`work_type`),
  KEY `WIndex` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `work_item`
--

INSERT INTO `work_item` (`work_item_id`, `description`, `work_type`, `submission_deadline`, `creation_date`, `created_by`, `date_last_updated`, `last_updated_by`, `reference_number`, `details`) VALUES
(1, 'Balon d''or', 1, '2014-12-11 00:00:00', '2014-12-10 11:33:07', 1, '2015-01-27 06:08:26', 2, '', ''),
(2, 'January Expenditures', 1, '2015-01-23 00:00:00', '2015-01-05 09:22:04', 1, '2015-01-22 14:31:56', 2, '', ''),
(3, 'Bamba 50', 2, '2015-01-24 00:00:00', '2015-01-22 14:35:05', 2, '2015-02-17 13:05:08', 2, 'A-03-20155', 'Bamba 50'),
(4, 'mike', 2, '2015-01-29 00:00:00', '2015-01-29 08:32:33', 2, '2015-02-17 13:13:34', 2, 'A-03-20', 'details'),
(5, 'Open MRS', 2, '2015-01-29 09:23:47', '2015-01-29 09:23:47', 2, '2015-01-29 09:23:47', 2, '', ''),
(6, 'OOP', 2, '2015-01-29 09:24:35', '2015-01-29 09:24:35', 2, '2015-01-29 09:24:35', 2, '', ''),
(7, 'hivss', 4, '2015-01-29 09:30:03', '2015-01-29 09:30:03', 2, '2015-01-29 09:30:03', 2, '', ''),
(8, 'HBCT', 1, '2015-01-29 09:31:12', '2015-01-29 09:31:12', 2, '2015-01-29 09:31:12', 2, '', ''),
(9, 'Bet 365', 3, '2015-01-29 09:33:36', '2015-01-29 09:33:36', 2, '2015-01-29 09:33:36', 2, '', ''),
(10, 'test results', 2, '2015-01-29 09:37:25', '2015-01-29 09:37:25', 2, '2015-01-29 09:37:25', 2, '', ''),
(11, 'fghfh', 1, '2015-01-29 09:43:39', '2015-01-29 09:43:39', 2, '2015-01-29 09:43:39', 2, '', ''),
(12, 'gjfghg', 2, '2015-01-29 09:51:18', '2015-01-29 09:51:18', 2, '2015-01-29 09:51:18', 2, '', ''),
(13, 'ghfghjgh', 1, '2015-01-29 09:52:00', '2015-01-29 09:52:00', 2, '2015-01-29 09:52:00', 2, '', ''),
(14, '87', 2, '2015-01-29 12:04:59', '2015-01-29 12:04:59', 2, '2015-01-29 12:04:59', 2, '', ''),
(15, 'PEV', 3, '2015-01-29 12:31:11', '2015-01-29 12:31:11', 2, '2015-01-29 12:31:11', 2, '', ''),
(16, 'Post Election Violence', 2, '2015-01-29 12:35:33', '2015-01-29 12:35:33', 2, '2015-01-29 12:35:33', 2, '', ''),
(17, 'kenya', 2, '2015-01-29 12:37:09', '2015-01-29 12:37:09', 2, '2015-01-29 12:37:09', 2, '', ''),
(18, 'Wasilwa is a Genius', 2, '2015-01-29 12:41:13', '2015-01-29 12:41:13', 2, '2015-01-29 12:41:13', 2, '', ''),
(19, 'New work item Name', 2, '2015-02-02 08:45:02', '2015-02-02 08:45:02', 2, '2015-02-02 08:45:02', 2, '', ''),
(20, 'New work item Name', 2, '2015-02-02 08:49:41', '2015-02-02 08:49:41', 2, '2015-02-02 08:49:41', 2, '', ''),
(21, 'New work item Name', 2, '2015-02-02 08:54:10', '2015-02-02 08:54:10', 2, '2015-02-02 08:54:10', 2, '', ''),
(22, 'New work item Name', 2, '2015-02-02 08:58:31', '2015-02-02 08:58:31', 2, '2015-02-02 08:58:31', 2, '', ''),
(23, 'New work item Name', 2, '2015-02-02 09:03:03', '2015-02-02 09:03:03', 2, '2015-02-02 09:03:03', 2, '', ''),
(24, 'New work item Name', 2, '2015-02-02 09:06:34', '2015-02-02 09:06:34', 2, '2015-02-02 09:06:34', 2, '', ''),
(25, 'work item 2', 3, '2015-02-02 09:09:44', '2015-02-02 09:09:44', 2, '2015-02-02 09:09:44', 2, '', ''),
(26, 'work item 2', 3, '2015-02-02 09:10:27', '2015-02-02 09:10:27', 2, '2015-02-02 09:10:27', 2, '', ''),
(27, 'work item 2', 3, '2015-02-02 09:10:45', '2015-02-02 09:10:45', 2, '2015-02-02 09:10:45', 2, '', ''),
(28, 'work item 2', 3, '2015-02-02 09:15:50', '2015-02-02 09:15:50', 2, '2015-02-02 09:15:50', 2, '', ''),
(29, 'Kenya EMR', 1, '2015-02-02 09:24:22', '2015-02-02 09:24:22', 2, '2015-02-02 09:24:22', 2, '', ''),
(30, 'Kenya EMR', 1, '2015-02-02 09:25:26', '2015-02-02 09:25:26', 2, '2015-02-02 09:25:26', 2, '', ''),
(31, 'Kenya EMR', 1, '2015-02-02 09:26:13', '2015-02-02 09:26:13', 2, '2015-02-02 09:26:13', 2, '', ''),
(32, 'Kenya EMR', 1, '2015-02-02 09:26:51', '2015-02-02 09:26:51', 2, '2015-02-02 09:26:51', 2, '', ''),
(33, 'Kenya EMR', 1, '2015-02-02 09:32:19', '2015-02-02 09:32:19', 2, '2015-02-02 09:32:19', 2, '', ''),
(34, 'Kenya EMR', 1, '2015-02-02 09:32:30', '2015-02-02 09:32:30', 2, '2015-02-02 09:32:30', 2, '', ''),
(35, 'Kenya EMR', 1, '2015-02-02 09:37:44', '2015-02-02 09:37:44', 2, '2015-02-02 09:37:44', 2, '', ''),
(36, 'Kenya EMR', 1, '2015-02-02 09:38:38', '2015-02-02 09:38:38', 2, '2015-02-02 09:38:38', 2, '', ''),
(37, 'Kenya EMR', 1, '2015-02-02 09:39:11', '2015-02-02 09:39:11', 2, '2015-02-02 09:39:11', 2, '', ''),
(38, 'Kenya EMR', 1, '2015-02-02 09:40:55', '2015-02-02 09:40:55', 2, '2015-02-02 09:40:55', 2, '', ''),
(39, 'Kenya EMR', 1, '2015-02-02 09:42:59', '2015-02-02 09:42:59', 2, '2015-02-02 09:42:59', 2, '', ''),
(40, 'Kenya EMR', 1, '2015-02-02 09:45:43', '2015-02-02 09:45:43', 2, '2015-02-02 09:45:43', 2, '', ''),
(41, 'Kenya EMR', 1, '2015-02-02 11:20:44', '2015-02-02 11:20:44', 2, '2015-02-02 11:20:44', 2, '', ''),
(42, 'lake house', 2, '2015-02-02 11:51:16', '2015-02-02 11:51:16', 2, '2015-02-02 11:51:16', 2, '', ''),
(43, 'lake house', 2, '2015-02-02 11:55:12', '2015-02-02 11:55:12', 2, '2015-02-02 11:55:12', 2, '', ''),
(44, 'lake house', 2, '2015-02-02 11:57:51', '2015-02-02 11:57:51', 2, '2015-02-02 11:57:51', 2, '', ''),
(45, 'lake house', 2, '2015-02-02 12:01:37', '2015-02-02 12:01:37', 2, '2015-02-02 12:01:37', 2, '', ''),
(46, 'lake house', 2, '2015-02-02 12:02:09', '2015-02-02 12:02:09', 2, '2015-02-02 12:02:09', 2, '', ''),
(47, 'lake house', 2, '2015-02-02 12:03:18', '2015-02-02 12:03:18', 2, '2015-02-02 12:03:18', 2, '', ''),
(48, 'lake house', 2, '2015-02-02 12:17:57', '2015-02-02 12:17:57', 2, '2015-02-02 12:17:57', 2, '', ''),
(49, 'work item 3', 4, '2015-02-02 12:20:28', '2015-02-02 12:20:28', 2, '2015-02-02 12:20:28', 2, '', ''),
(50, 'work item 3', 4, '2015-02-02 12:20:45', '2015-02-02 12:20:45', 2, '2015-02-02 12:20:45', 2, '', ''),
(51, 'work item 56', 4, '2015-02-02 12:32:19', '2015-02-02 12:32:19', 2, '2015-02-02 12:32:19', 2, '', ''),
(52, 'work item 67', 2, '2015-02-02 13:53:24', '2015-02-02 13:53:24', 2, '2015-02-02 13:53:24', 2, '', ''),
(53, 'work item 67', 2, '2015-02-02 13:56:07', '2015-02-02 13:56:07', 2, '2015-02-02 13:56:07', 2, '', ''),
(54, 'work item 67', 2, '2015-02-02 14:28:54', '2015-02-02 14:28:54', 2, '2015-02-02 14:28:54', 2, '', ''),
(55, 'work item 67', 2, '2015-02-02 14:32:32', '2015-02-02 14:32:32', 2, '2015-02-02 14:32:32', 2, '', ''),
(56, 'work item 67', 2, '2015-02-02 14:54:26', '2015-02-02 14:54:26', 2, '2015-02-02 14:54:26', 2, '', ''),
(57, 'work item 67', 2, '2015-02-02 14:55:08', '2015-02-02 14:55:08', 2, '2015-02-02 14:55:08', 2, '', ''),
(58, 'work item 67', 2, '2015-02-02 14:59:54', '2015-02-02 14:59:54', 2, '2015-02-02 14:59:54', 2, '', ''),
(59, 'work ite 54', 2, '2015-02-02 15:00:57', '2015-02-02 15:00:57', 2, '2015-02-02 15:00:57', 2, '', ''),
(60, 'work ite 54', 2, '2015-02-02 15:04:25', '2015-02-02 15:04:25', 2, '2015-02-02 15:04:25', 2, '', ''),
(61, 'work ite 54', 2, '2015-02-02 15:10:37', '2015-02-02 15:10:37', 2, '2015-02-02 15:10:37', 2, '', ''),
(62, 'work ite 54', 2, '2015-02-02 15:11:37', '2015-02-02 15:11:37', 2, '2015-02-02 15:11:37', 2, '', ''),
(63, 'work ite 54', 2, '2015-02-02 15:12:24', '2015-02-02 15:12:24', 2, '2015-02-02 15:12:24', 2, '', ''),
(64, 'work ite 54', 2, '2015-02-02 15:22:23', '2015-02-02 15:22:23', 2, '2015-02-02 15:22:23', 2, '', ''),
(65, 'work ite 54', 2, '2015-02-02 15:23:34', '2015-02-02 15:23:34', 2, '2015-02-02 15:23:34', 2, '', ''),
(66, 'work item 56', 4, '2015-02-02 15:25:03', '2015-02-02 15:25:03', 2, '2015-02-02 15:25:03', 2, '', ''),
(67, 'work item 56', 4, '2015-02-02 15:26:07', '2015-02-02 15:26:07', 2, '2015-02-02 15:26:07', 2, '', ''),
(68, 'work item 56', 4, '2015-02-02 15:50:42', '2015-02-02 15:50:42', 2, '2015-02-02 15:50:42', 2, '', ''),
(69, 'Kenya college', 1, '2015-02-02 18:15:39', '2015-02-02 18:15:39', 2, '2015-02-02 18:15:39', 2, '', ''),
(70, 'Fifa World Cup 2015', 4, '2015-02-02 19:10:21', '2015-02-02 19:10:21', 2, '2015-02-02 19:10:21', 2, '', ''),
(71, 'Fifa World Cup 2015', 4, '2015-02-02 19:31:14', '2015-02-02 19:31:14', 2, '2015-02-02 19:31:14', 2, '', ''),
(72, 'Fifa World Cup 2015', 4, '2015-02-02 19:37:06', '2015-02-02 19:37:06', 2, '2015-02-02 19:37:06', 2, '', ''),
(73, 'Fifa World Cup 2015', 4, '2015-02-02 19:38:51', '2015-02-02 19:38:51', 2, '2015-02-02 19:38:51', 2, '', ''),
(74, 'Dreezy Drake', 4, '2015-02-03 05:52:40', '2015-02-03 05:52:40', 2, '2015-02-03 05:52:40', 2, '', ''),
(75, 'Dreezy Drake', 4, '2015-02-03 06:09:32', '2015-02-03 06:09:32', 2, '2015-02-03 06:09:32', 2, '', ''),
(76, 'Data Tables', 1, '2015-02-03 06:12:32', '2015-02-03 06:12:32', 2, '2015-02-03 06:12:32', 2, '', ''),
(77, 'Data Tables', 1, '2015-02-03 06:30:52', '2015-02-03 06:30:52', 2, '2015-02-03 06:30:52', 2, '', ''),
(78, 'Data Tables', 1, '2015-02-03 06:31:51', '2015-02-03 06:31:51', 2, '2015-02-03 06:31:51', 2, '', ''),
(79, 'Data Tables', 1, '2015-02-03 06:33:49', '2015-02-03 06:33:49', 2, '2015-02-03 06:33:49', 2, '', ''),
(80, 'Data Tables', 1, '2015-02-03 06:35:32', '2015-02-03 06:35:32', 2, '2015-02-03 06:35:32', 2, '', ''),
(81, 'Data Tables', 1, '2015-02-03 06:39:21', '2015-02-03 06:39:21', 2, '2015-02-03 06:39:21', 2, '', ''),
(82, 'Data Tables', 1, '2015-02-03 07:09:52', '2015-02-03 07:09:52', 2, '2015-02-03 07:09:52', 2, '', ''),
(83, 'Data Tables', 1, '2015-02-03 07:10:15', '2015-02-03 07:10:15', 2, '2015-02-03 07:10:15', 2, '', ''),
(84, 'Data Tables Work ', 4, '2015-02-03 08:32:29', '2015-02-03 08:32:29', 2, '2015-02-03 08:32:29', 2, '', ''),
(85, 'Data Tables Work 1', 3, '2015-02-03 08:36:18', '2015-02-03 08:36:18', 2, '2015-02-03 08:36:18', 2, '', ''),
(86, 'Dreezy Drake 4', 2, '2015-02-03 08:36:44', '2015-02-03 08:36:44', 2, '2015-02-03 08:36:44', 2, '', ''),
(87, 'Dreezy Drake 5', 2, '2015-02-03 08:40:43', '2015-02-03 08:40:43', 2, '2015-02-03 08:40:43', 2, '', ''),
(88, 'Dreezy Drake 5', 2, '2015-02-03 09:16:19', '2015-02-03 09:16:19', 2, '2015-02-03 09:16:19', 2, '', ''),
(89, 'Dreezy Drake 5', 2, '2015-02-03 09:18:54', '2015-02-03 09:18:54', 2, '2015-02-03 09:18:54', 2, '', ''),
(90, 'Dreezy Drake 5', 2, '2015-02-03 09:21:05', '2015-02-03 09:21:05', 2, '2015-02-03 09:21:05', 2, '', ''),
(91, 'Dreezy Drake 5', 2, '2015-02-03 09:21:38', '2015-02-03 09:21:38', 2, '2015-02-03 09:21:38', 2, '', ''),
(92, 'Dreezy Drake 5', 2, '2015-02-03 09:27:22', '2015-02-03 09:27:22', 2, '2015-02-03 09:27:22', 2, '', ''),
(93, 'work item 24', 3, '2015-02-03 09:32:50', '2015-02-03 09:32:50', 2, '2015-02-03 09:32:50', 2, '', ''),
(94, 'work item 24', 3, '2015-02-03 09:51:18', '2015-02-03 09:51:18', 2, '2015-02-03 09:51:18', 2, '', ''),
(95, 'work item 25', 3, '2015-02-03 09:52:08', '2015-02-03 09:52:08', 2, '2015-02-03 09:52:08', 2, '', ''),
(96, 'work item 26', 3, '2015-02-03 09:53:59', '2015-02-03 09:53:59', 2, '2015-02-03 09:53:59', 2, '', ''),
(97, 'work item 27', 4, '2015-02-03 09:58:33', '2015-02-03 09:58:33', 2, '2015-02-03 09:58:33', 2, '', ''),
(98, 'work item 28', 2, '2015-02-03 09:59:30', '2015-02-03 09:59:30', 2, '2015-02-03 09:59:30', 2, '', ''),
(99, 'work item 29', 2, '2015-02-03 10:01:38', '2015-02-03 10:01:38', 2, '2015-02-03 10:01:38', 2, '', ''),
(100, 'work item 30', 2, '2015-02-03 11:27:38', '2015-02-03 11:27:38', 2, '2015-02-03 11:27:38', 2, '', ''),
(101, 'work item 30', 2, '2015-02-03 11:48:08', '2015-02-03 11:48:08', 2, '2015-02-03 11:48:08', 2, '', ''),
(102, 'work item 30', 2, '2015-02-03 11:49:53', '2015-02-03 11:49:53', 2, '2015-02-03 11:49:53', 2, '', ''),
(103, 'work item 30', 2, '2015-02-03 11:50:25', '2015-02-03 11:50:25', 2, '2015-02-03 11:50:25', 2, '', ''),
(104, 'work item 31', 2, '2015-02-03 11:53:21', '2015-02-03 11:53:21', 2, '2015-02-03 11:53:21', 2, '', ''),
(105, 'work item 31', 1, '2015-02-03 11:55:52', '2015-02-03 11:55:52', 2, '2015-02-03 11:55:52', 2, '', ''),
(106, 'work item 31', 1, '2015-02-03 11:57:34', '2015-02-03 11:57:34', 2, '2015-02-03 11:57:34', 2, '', ''),
(107, 'work item 31', 1, '2015-02-03 11:57:59', '2015-02-03 11:57:59', 2, '2015-02-03 11:57:59', 2, '', ''),
(108, 'work item 35', 2, '2015-02-03 12:00:27', '2015-02-03 12:00:27', 2, '2015-02-03 12:00:27', 2, '', ''),
(109, 'work item 35', 2, '2015-02-03 12:04:41', '2015-02-03 12:04:41', 2, '2015-02-03 12:04:41', 2, '', ''),
(110, '123', 1, '2015-02-03 12:07:16', '2015-02-03 12:07:16', 2, '2015-02-03 12:07:16', 2, '', ''),
(111, '1233', 1, '2015-02-03 12:10:16', '2015-02-03 12:10:16', 2, '2015-02-03 12:10:16', 2, '', ''),
(112, '123345', 1, '2015-02-03 12:10:57', '2015-02-03 12:10:57', 2, '2015-02-03 12:10:57', 2, '', ''),
(113, '123345', 1, '2015-02-03 12:11:51', '2015-02-03 12:11:51', 2, '2015-02-03 12:11:51', 2, '', ''),
(121, 'Create Work Item', 1, '2015-02-03 15:24:22', '2015-02-03 15:24:22', 2, '2015-02-03 15:24:22', 2, '', ''),
(122, 'Create Work Item', 1, '2015-02-03 15:25:17', '2015-02-03 15:25:17', 2, '2015-02-03 15:25:17', 2, '', ''),
(123, 'Reference Number', 1, '2015-02-04 07:38:31', '2015-02-04 07:38:31', 2, '2015-02-04 07:38:31', 2, '', ''),
(124, 'January Expenditures Trail', 2, '2015-02-04 07:39:53', '2015-02-04 07:39:53', 2, '2015-02-04 07:39:53', 2, '', ''),
(125, 'January Expenditures Trail', 2, '2015-02-04 07:43:15', '2015-02-04 07:43:15', 2, '2015-02-04 07:43:15', 2, '', ''),
(126, 'Lets get away', 4, '2015-02-05 13:53:39', '2015-02-05 13:53:39', 2, '2015-02-05 13:53:39', 2, '', ''),
(127, 'ghjghj', 2, '2015-02-06 14:01:00', '2015-02-06 14:01:00', 2, '2015-02-06 14:01:00', 2, '', ''),
(128, 'Document Title', 2, '2015-02-09 13:03:44', '2015-02-09 13:03:44', 2, '2015-02-09 13:03:44', 2, '', ''),
(129, 'Document Title', 2, '2015-02-09 13:17:21', '2015-02-09 13:17:21', 2, '2015-02-09 13:17:21', 2, '', ''),
(130, 'Document Title One', 2, '2015-02-09 13:19:01', '2015-02-09 13:19:01', 2, '2015-02-09 13:19:01', 2, '', ''),
(131, 'Document Title One Two Three', 2, '2015-02-09 13:33:40', '2015-02-09 13:33:40', 2, '2015-02-09 13:33:40', 2, '', ''),
(132, 'Trailer', 2, '2015-02-09 13:38:00', '2015-02-09 13:38:00', 2, '2015-02-09 13:38:00', 2, '', ''),
(133, 'Nicho Stories', 3, '0000-00-00 00:00:00', '2015-02-17 07:29:58', 2, '2015-02-17 07:29:58', 2, '', ''),
(134, 'Nicho Stories', 3, '0000-00-00 00:00:00', '2015-02-17 07:35:40', 2, '2015-02-17 07:35:40', 2, '', ''),
(135, 'Kibera Slums', 4, '2015-01-28 00:00:00', '2015-02-17 07:56:41', 2, '2015-02-17 07:56:41', 2, '', 'kibera slums'),
(136, 'Kibera Slums', 4, '2015-01-28 00:00:00', '2015-02-17 08:01:42', 2, '2015-02-17 08:01:42', 2, 'J/01/15', 'kibera slums'),
(137, 'Clinical Trial on the effectiveness of Point of Care malaria test kit', 3, '2015-02-03 00:00:00', '2015-02-17 13:22:11', 2, '2015-02-17 13:22:11', 2, 'Pr-2356-2014', 'Clinical trial at JOOTRH'),
(138, 'Using  Point of Care System to improve data quality', 1, '2015-02-04 00:00:00', '2015-02-17 13:26:15', 2, '2015-02-17 13:26:15', 2, 'M-2054-2014', 'OpenMRSl at JOOTRH');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `work_item_stage`
--

INSERT INTO `work_item_stage` (`id`, `work_item_id`, `stage`, `date_created`, `created_by`, `last_update_date`, `last_update_by`, `responsible`) VALUES
(1, 1, 3, '2014-12-10 11:34:39', 1, '2014-12-10 11:34:39', 1, ''),
(2, 1, 2, '2014-12-10 11:35:11', 1, '2014-12-10 11:35:11', 1, ''),
(3, 1, 2, '2014-12-10 11:50:27', 1, '2014-12-10 11:50:27', 1, '');

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
  `voided` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `work_item_stage_output`
--

INSERT INTO `work_item_stage_output` (`id`, `work_item_stage`, `Comments`, `created_by`, `date_created`, `last_updated_by`, `last_update_date`, `document`, `voided`) VALUES
(1, 2, '0', 2, '2015-01-21 12:09:17', 2, '2015-01-21 12:09:17', 5, 1),
(2, 2, '0', 2, '2015-01-21 12:10:22', 2, '2015-01-21 12:10:22', 6, 1),
(3, 2, '0', 2, '2015-01-21 12:10:47', 2, '2015-01-21 12:10:47', 7, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `work_item_status`
--

INSERT INTO `work_item_status` (`id`, `work_item_id`, `status`, `created_by`, `date_created`, `last_updated_by`, `date_last_updated`) VALUES
(1, 1, 4, 1, '2015-01-07 14:30:25', 1, '2015-01-07 14:30:25'),
(2, 3, 4, 2, '2015-01-26 11:41:36', 2, '2015-01-26 11:41:36'),
(3, 49, 3, 2, '2015-02-05 13:52:54', 2, '2015-02-05 13:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE IF NOT EXISTS `work_type` (
  `work_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`work_type_id`),
  UNIQUE KEY `description` (`description`),
  UNIQUE KEY `uc_description` (`description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`work_type_id`, `description`) VALUES
(2, 'Abstract'),
(4, 'Journal'),
(1, 'Manuscript'),
(3, 'Protocol');

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
  ADD CONSTRAINT `FK_work_item_author_author` FOREIGN KEY (`author_id`) REFERENCES `staff` (`staff_id`),
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
