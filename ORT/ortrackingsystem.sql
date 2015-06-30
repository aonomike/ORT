-- phpMyAdmin SQL Dump
-- version 4.3.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2015 at 07:14 AM
-- Server version: 5.6.23
-- PHP Version: 5.4.39

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
-- Table structure for table `action_request`
--

CREATE TABLE IF NOT EXISTS `action_request` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_request`
--

INSERT INTO `action_request` (`id`, `description`) VALUES
(1, 'PRG Review'),
(2, 'ERC Review'),
(3, 'Publication Clearence'),
(4, 'Presentation Clearence'),
(5, 'Review and Update Collection'),
(6, 'Storage');

-- --------------------------------------------------------

--
-- Table structure for table `aproval_stage`
--

CREATE TABLE IF NOT EXISTS `aproval_stage` (
  `ID` int(11) NOT NULL,
  `stage_name` varchar(100) NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `Updatedby` int(11) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `Dateupdated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `staff_id`, `date_created`, `created_by`, `date_last_updated`, `last_updated_by`) VALUES
(1, 2, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(2, 3, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(3, 4, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(4, 5, '0000-00-00 00:00:00', 1, '2014-11-05 00:00:00', 1),
(6, 2, '2014-11-05 08:08:56', 1, '2014-11-05 08:08:56', 1),
(7, 6, '2015-01-23 07:13:29', 1, '2015-01-23 07:13:29', 1),
(16, 22, '2015-02-18 15:33:29', 2, '2015-02-18 15:33:29', 2),
(17, 23, '2015-02-18 15:36:19', 2, '2015-02-18 15:36:19', 2),
(18, 24, '2015-02-19 06:45:49', 2, '2015-02-19 06:45:49', 2),
(19, 25, '2015-02-19 06:47:38', 2, '2015-02-19 06:47:38', 2),
(20, 26, '2015-02-19 07:02:46', 2, '2015-02-19 07:02:46', 2),
(21, 27, '2015-02-19 07:04:03', 2, '2015-02-19 07:04:03', 2),
(22, 28, '2015-02-19 07:05:56', 2, '2015-02-19 07:05:56', 2),
(23, 29, '2015-02-19 07:08:46', 2, '2015-02-19 07:08:46', 2),
(24, 30, '2015-02-19 07:10:08', 2, '2015-02-19 07:10:08', 2),
(25, 31, '2015-02-19 07:22:12', 2, '2015-02-19 07:22:12', 2),
(26, 32, '2015-02-19 07:23:58', 2, '2015-02-19 07:23:58', 2),
(27, 33, '2015-02-19 07:25:42', 2, '2015-02-19 07:25:42', 2),
(28, 34, '2015-02-19 07:27:06', 2, '2015-02-19 07:27:06', 2),
(29, 35, '2015-02-19 07:28:47', 2, '2015-02-19 07:28:47', 2),
(30, 36, '2015-02-19 07:30:03', 2, '2015-02-19 07:30:03', 2),
(31, 37, '2015-02-19 07:31:34', 2, '2015-02-19 07:31:34', 2),
(32, 38, '2015-02-19 07:32:49', 2, '2015-02-19 07:32:49', 2),
(33, 39, '2015-02-19 07:37:12', 2, '2015-02-19 07:37:12', 2),
(34, 40, '2015-02-19 07:38:29', 2, '2015-02-19 07:38:29', 2),
(35, 41, '2015-02-19 07:39:50', 2, '2015-02-19 07:39:50', 2),
(36, 42, '2015-02-27 07:18:21', 2, '2015-02-27 07:18:21', 2),
(37, 49, '2015-03-04 09:43:34', 2, '2015-03-04 09:43:34', 2),
(38, 50, '2015-03-04 09:47:05', 2, '2015-03-04 09:47:05', 2),
(39, 51, '2015-05-13 05:24:45', 2, '2015-05-13 05:24:45', 2);

-- --------------------------------------------------------

--
-- Table structure for table `author_type`
--

CREATE TABLE IF NOT EXISTS `author_type` (
  `author_type_id` int(11) NOT NULL,
  `descriptions` varchar(50) NOT NULL,
  `Details` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author_type`
--

INSERT INTO `author_type` (`author_type_id`, `descriptions`, `Details`) VALUES
(1, 'Lead Author', 'Leads the authoring process                                                '),
(2, 'Co-Author', 'Assists the Lead author                                                '),
(3, 'Data Manager', 'Helps with data management roles in the writing process                                                ');

-- --------------------------------------------------------

--
-- Table structure for table `contact_type`
--

CREATE TABLE IF NOT EXISTS `contact_type` (
  `contact_type_id` int(11) NOT NULL,
  `descriptions` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_type`
--

INSERT INTO `contact_type` (`contact_type_id`, `descriptions`, `date_added`, `added_by`) VALUES
(1, 'Cell Phone', '2015-03-04 00:00:00', 2),
(2, 'Email', '2015-03-04 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `Name`) VALUES
(3, 'Afghanistan'),
(4, 'Albania'),
(5, 'Algeria'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Antigua and Barbuda'),
(9, 'Argentina'),
(10, 'Armenia'),
(11, 'Australia'),
(12, 'Austria'),
(13, 'Azerbaijan'),
(14, 'Bahamas, The'),
(15, 'Bahrain'),
(16, 'Bangladesh'),
(17, 'Barbados'),
(18, 'Belarus'),
(19, 'Belgium'),
(20, 'Belize'),
(21, 'Benin'),
(22, 'Bhutan'),
(23, 'Bolivia'),
(24, 'Bosnia and Herzegovina'),
(25, 'Botswana'),
(26, 'Brazil'),
(27, 'Brunei'),
(28, 'Bulgaria'),
(29, 'Burkina Faso'),
(30, 'Burma'),
(31, 'Burundi'),
(32, 'Cambodia'),
(33, 'Cameroon'),
(34, 'Canada'),
(35, 'Cape Verde'),
(36, 'Central Africa'),
(37, 'Chad'),
(38, 'Chile'),
(39, 'China'),
(40, 'Colombia'),
(41, 'Comoros'),
(42, 'Congo, Democratic Republic of the'),
(43, 'Costa Rica'),
(44, 'Cote dIvoire'),
(45, 'Crete'),
(46, 'Croatia'),
(47, 'Cuba'),
(48, 'Cyprus'),
(49, 'Czech Republic'),
(50, 'Denmark'),
(51, 'Djibouti'),
(52, 'Dominican Republic'),
(53, 'East Timor'),
(54, 'Ecuador'),
(55, 'Egypt'),
(56, 'El Salvador'),
(57, 'Equatorial Guinea'),
(58, 'Eritrea'),
(59, 'Estonia'),
(60, 'Ethiopia'),
(61, 'Fiji'),
(62, 'Finland'),
(63, 'France'),
(64, 'Gabon'),
(65, 'Gambia, The'),
(66, 'Georgia'),
(67, 'Germany'),
(68, 'Ghana'),
(69, 'Greece'),
(70, 'Grenada'),
(71, 'Guadeloupe'),
(72, 'Guatemala'),
(73, 'Guinea'),
(74, 'Guinea-Bissau'),
(75, 'Guyana'),
(76, 'Haiti'),
(77, 'Holy See'),
(78, 'Honduras'),
(79, 'Hong Kong'),
(80, 'Hungary'),
(81, 'Iceland'),
(82, 'India'),
(83, 'Indonesia'),
(84, 'Iran'),
(85, 'Iraq'),
(86, 'Ireland'),
(87, 'Israel'),
(88, 'Italy'),
(89, 'Ivory Coast'),
(90, 'Jamaica'),
(91, 'Japan'),
(92, 'Jordan'),
(93, 'Kazakhstan'),
(94, 'Kenya'),
(95, 'Kiribati'),
(96, 'Korea, North'),
(97, 'Korea, South'),
(98, 'Kosovo'),
(99, 'Kuwait'),
(100, 'Kyrgyzstan'),
(101, 'Laos'),
(102, 'Latvia'),
(103, 'Lebanon'),
(104, 'Lesotho'),
(105, 'Liberia'),
(106, 'Libya'),
(107, 'Liechtenstein'),
(108, 'Lithuania'),
(109, 'Macau'),
(110, 'Macedonia'),
(111, 'Madagascar'),
(112, 'Malawi'),
(113, 'Malaysia'),
(114, 'Maldives'),
(115, 'Mali'),
(116, 'Malta'),
(117, 'Marshall Islands'),
(118, 'Mauritania'),
(119, 'Mauritius'),
(120, 'Mexico'),
(121, 'Micronesia'),
(122, 'Moldova'),
(123, 'Monaco'),
(124, 'Mongolia'),
(125, 'Montenegro'),
(126, 'Morocco'),
(127, 'Mozambique'),
(128, 'Namibia'),
(129, 'Nauru'),
(130, 'Nepal'),
(131, 'Netherlands'),
(132, 'New Zealand'),
(133, 'Nicaragua'),
(134, 'Niger'),
(135, 'Nigeria'),
(136, 'North Korea'),
(137, 'Norway'),
(138, 'Oman'),
(139, 'Pakistan'),
(140, 'Palau'),
(141, 'Panama'),
(142, 'Papua New Guinea'),
(143, 'Paraguay'),
(144, 'Peru'),
(145, 'Philippines'),
(146, 'Poland'),
(147, 'Portugal'),
(148, 'Qatar'),
(149, 'Romania'),
(150, 'Russia'),
(151, 'Rwanda'),
(152, 'Saint Lucia'),
(153, 'Saint Vincent and the Grenadines'),
(154, 'Samoa'),
(155, 'San Marino'),
(156, 'Sao Tome and Principe'),
(157, 'Saudi Arabia'),
(158, 'Scotland'),
(159, 'Senegal'),
(160, 'Serbia'),
(161, 'Seychelles'),
(162, 'Sierra Leone'),
(163, 'Singapore'),
(164, 'Slovakia'),
(165, 'Slovenia'),
(166, 'Solomon Islands'),
(167, 'Somalia'),
(168, 'South Africa'),
(169, 'South Korea'),
(170, 'Spain'),
(171, 'Sri Lanka'),
(172, 'Sudan'),
(173, 'Suriname'),
(174, 'Swaziland'),
(175, 'Sweden'),
(176, 'Switzerland'),
(177, 'Syria'),
(178, 'Taiwan'),
(179, 'Tajikistan'),
(180, 'Tanzania'),
(181, 'Thailand'),
(182, 'Tibet'),
(183, 'Timor-Leste'),
(184, 'Togo'),
(185, 'Tonga'),
(186, 'Trinidad and Tobago'),
(187, 'Tunisia'),
(188, 'Turkey'),
(189, 'Turkmenistan'),
(190, 'Tuvalu'),
(191, 'Uganda'),
(192, 'Ukraine'),
(193, 'United Arab Emirates'),
(194, 'United Kingdom'),
(195, 'United States'),
(196, 'Uruguay'),
(197, 'Uzbekistan'),
(198, 'Vanuatu'),
(199, 'Venezuela'),
(200, 'Vietnam'),
(201, 'Yemen'),
(202, 'Zambia'),
(203, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`ID`, `Name`) VALUES
(1, 'Councellor'),
(2, 'Data Manager'),
(3, 'Researcher'),
(4, 'ICT Officer'),
(5, 'vnbv'),
(6, 'ZXCZXC'),
(7, 'DOCTOR');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `document_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL,
  `versions` varchar(50) NOT NULL,
  `date_received` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document_file_path`
--

CREATE TABLE IF NOT EXISTS `document_file_path` (
  `document_path_id` int(11) NOT NULL,
  `_file_name` varchar(50) NOT NULL,
  `file_extension` varchar(50) NOT NULL,
  `file_loctation` varchar(150) NOT NULL,
  `document_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document_submission`
--

CREATE TABLE IF NOT EXISTS `document_submission` (
  `id` int(11) NOT NULL,
  `submission_date` datetime NOT NULL,
  `description` varchar(50) NOT NULL,
  `document_id` int(11) NOT NULL,
  `submission_type` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `label_for_worlk_item_crucial_dates_caption`
--

CREATE TABLE IF NOT EXISTS `label_for_worlk_item_crucial_dates_caption` (
  `caption_id` int(11) NOT NULL,
  `work_item_type` int(11) NOT NULL,
  `caption` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `label_for_worlk_item_crucial_dates_caption`
--

INSERT INTO `label_for_worlk_item_crucial_dates_caption` (`caption_id`, `work_item_type`, `caption`) VALUES
(1, 3, 'Expiry Date'),
(2, 4, 'Expected Completion Date'),
(3, 1, 'Publication Submission Deadline'),
(4, 5, 'Conference Deadline'),
(5, 6, 'Conference Deadline'),
(6, 2, 'Conference Deadline');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `organisation_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `date_last_upadated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`organisation_id`, `name`, `created_by`, `date_created`, `last_updated_by`, `date_last_upadated`) VALUES
(1, 'JKUAT', 1, '2015-02-18 00:00:00', 1, '2015-02-18 00:00:00'),
(2, 'Kenyatta university', 1, '2015-02-18 00:00:00', 2, '2015-02-18 00:00:00'),
(3, 'KEMRI', 2, '2015-03-05 11:13:14', 2, '2015-03-05 11:13:14'),
(4, 'Maseno University', 2, '2015-03-05 11:16:48', 2, '2015-03-05 11:16:48'),
(5, 'sdgdf', 2, '2015-03-05 13:01:45', 2, '2015-03-05 13:01:45'),
(6, 'sdfgf', 2, '2015-03-05 13:02:49', 2, '2015-03-05 13:02:49'),
(7, 'xcvx5676', 2, '2015-03-05 13:05:32', 2, '2015-03-05 13:05:32'),
(8, 'vbn', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, 'bnmbnm', 2, '2015-03-05 13:14:51', 2, '2015-03-05 13:14:51'),
(10, 'dfgdfgdfgdf', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(11, 'dfgdfgdfgdf', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(12, 'dfgdfgdfgdf', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(13, 'bnmbnmdfg', 2, '2015-03-05 13:16:09', 2, '2015-03-05 13:16:09'),
(14, 'dfgdfgdfgdf', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(15, 'dfgdfgdfgdf', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(16, 'JKUATZCC', 2, '2015-03-05 13:18:24', 2, '2015-03-05 13:18:24'),
(17, 'dfgdfgdfgdf', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(18, 'UNIVERSITY OF NAIROBI', 2, '2015-05-08 06:42:06', 2, '2015-05-08 06:42:06'),
(19, 'GARISSA UNIVERSITY', 2, '2015-05-13 09:09:02', 2, '2015-05-13 09:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `output`
--

CREATE TABLE IF NOT EXISTS `output` (
  `output_id` int(11) NOT NULL,
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
  `conference_organisation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `output_type`
--

CREATE TABLE IF NOT EXISTS `output_type` (
  `output_type_id` int(11) NOT NULL,
  `descriptions` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `Name`) VALUES
(1, 'TB');

-- --------------------------------------------------------

--
-- Table structure for table `reason_for_submission`
--

CREATE TABLE IF NOT EXISTS `reason_for_submission` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
  `right_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

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
  `role_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `role_right_id` int(11) NOT NULL,
  `right_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

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
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `payroll_number` int(11) DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `program` int(11) DEFAULT NULL,
  `title` int(11) NOT NULL,
  `organisation` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

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
(13, 'Mike', 'Okoth', 'Aono', 3, NULL, NULL, '2015-02-18 13:54:16', 2, '2015-02-18 13:54:16', 2, NULL, 1, 1, 1),
(14, 'Tyler', 'Mike', 'Hawi', 1, NULL, NULL, '2015-02-18 14:53:24', 2, '2015-02-18 14:53:24', 2, NULL, 1, 1, 1),
(15, 'Louis', 'Van', 'Gaal', 1, NULL, NULL, '2015-02-18 14:55:34', 2, '2015-02-18 14:55:34', 2, NULL, 1, 1, 1),
(16, 'Robert', 'Lewandowski', 'Danielle', 2, NULL, NULL, '2015-02-18 14:57:47', 2, '2015-02-18 14:57:47', 2, NULL, 1, 2, 1),
(17, 'Lwam', 'Bekele', 'Odinga', 1, NULL, NULL, '2015-02-18 14:58:45', 2, '2015-02-18 14:58:45', 2, NULL, 2, 1, 2),
(18, 'Munga', 'M', 'Munga', 1, NULL, NULL, '2015-02-18 14:59:35', 2, '2015-02-18 14:59:35', 2, NULL, 2, 1, 2),
(19, 'Jennie', 'A', 'Smith', 2, NULL, NULL, '2015-02-18 15:01:03', 2, '2015-02-18 15:01:03', 2, NULL, 2, 2, 1),
(20, 'Jeannie', 'Allot', 'Badrock', 2, NULL, NULL, '2015-02-18 15:02:32', 2, '2015-02-18 15:02:32', 2, NULL, 2, 2, 1),
(21, 'Janet', 'Barguley', 'Scott', 1, NULL, NULL, '2015-02-18 15:03:56', 2, '2015-02-18 15:03:56', 2, NULL, 1, 1, 2),
(22, 'Angela', 'Banks', 'Osbourne', 1, NULL, NULL, '2015-02-18 15:33:29', 2, '2015-02-18 15:33:29', 2, NULL, 2, 1, 1),
(23, 'Amanda', 'Barr', 'Ladeley', 1, NULL, NULL, '2015-02-18 15:36:19', 2, '2015-02-18 15:36:19', 2, NULL, 2, 1, 1),
(24, 'Stephany ', 'Keys', 'Winner', 1, NULL, NULL, '2015-02-19 06:45:49', 2, '2015-02-19 06:45:49', 2, NULL, 2, 1, 1),
(25, 'Gerard ', 'Buttler', 'Hunna', 1, NULL, NULL, '2015-02-19 06:47:38', 2, '2015-02-19 06:47:38', 2, NULL, 1, 1, 1),
(26, 'Kenya', 'Uganda', 'Tanzania', 1, NULL, NULL, '2015-02-19 07:02:46', 2, '2015-02-19 07:02:46', 2, NULL, 1, 1, 1),
(27, 'Luo', 'Kamba', 'Kikuyu', 1, NULL, NULL, '2015-02-19 07:04:03', 2, '2015-02-19 07:04:03', 2, NULL, 0, 2, 1),
(28, 'Sofia', 'leanne', 'Champ', 2, NULL, NULL, '2015-02-19 07:05:56', 2, '2015-02-19 07:05:56', 2, NULL, 2, 2, 2),
(29, 'Pauline', 'Cope', 'Couper', 2, NULL, NULL, '2015-02-19 07:08:46', 2, '2015-02-19 07:08:46', 2, NULL, 1, 2, 2),
(30, 'Rebeca', 'Junior ', 'Smallz', 2, NULL, NULL, '2015-02-19 07:10:08', 2, '2015-02-19 07:10:08', 2, NULL, 2, 2, 2),
(31, 'Gemma ', 'Davison', 'Clap', 2, NULL, NULL, '2015-02-19 07:22:12', 2, '2015-02-19 07:22:12', 2, NULL, 2, 2, 2),
(32, 'Kann', 'Davies', 'Dollar', 1, NULL, NULL, '2015-02-19 07:23:58', 2, '2015-02-19 07:23:58', 2, NULL, 1, 1, 1),
(33, 'Karma', 'Is', 'Ab', 2, NULL, NULL, '2015-02-19 07:25:42', 2, '2015-02-19 07:25:42', 2, NULL, 2, 2, 2),
(34, 'Romour', 'Has', 'Adelle', 1, NULL, NULL, '2015-02-19 07:27:06', 2, '2015-02-19 07:27:06', 2, NULL, 1, 1, 1),
(35, 'Tyle', 'Dollar', 'Sign', 1, NULL, NULL, '2015-02-19 07:28:47', 2, '2015-02-19 07:28:47', 2, NULL, 1, 2, 2),
(36, 'Nicky', 'Odhiambo', 'Okeyo', 2, NULL, NULL, '2015-02-19 07:30:03', 2, '2015-02-19 07:30:03', 2, NULL, 1, 2, 2),
(37, 'Kenneth ', 'Omondi', 'Ochieng', 1, NULL, NULL, '2015-02-19 07:31:34', 2, '2015-02-19 07:31:34', 2, NULL, 1, 1, 1),
(38, 'Stanslaus', 'Omondi', 'Odhiambo', 2, NULL, NULL, '2015-02-19 07:32:49', 2, '2015-02-19 07:32:49', 2, NULL, 1, 2, 2),
(39, 'Loraine', 'Dobb', 'Dobble', 2, NULL, NULL, '2015-02-19 07:37:11', 2, '2015-02-19 07:37:11', 2, NULL, 2, 2, 2),
(40, 'Hellen', 'Doyle', 'Gk', 1, NULL, NULL, '2015-02-19 07:38:28', 2, '2015-02-19 07:38:28', 2, NULL, 2, 1, 1),
(41, 'Koriata', 'Patric', 'Tuyaa', 1, NULL, NULL, '2015-02-19 07:39:50', 2, '2015-02-19 07:39:50', 2, NULL, 1, 1, 1),
(42, 'MUTUKU', 'MUTUKU', 'MUTUKU', 1, NULL, NULL, '2015-02-27 07:18:21', 2, '2015-02-27 07:18:21', 2, NULL, 1, 1, 1),
(44, 'ghj', 'gfhj', NULL, NULL, NULL, NULL, '2015-03-04 09:31:38', 2, '2015-03-04 09:31:38', 2, NULL, 1, NULL, NULL),
(45, 'ghj', 'fghj', NULL, NULL, NULL, NULL, '2015-03-04 09:35:16', 2, '2015-03-04 09:35:16', 2, NULL, 2, NULL, NULL),
(46, 'zxxz', 'zcxz', NULL, NULL, NULL, NULL, '2015-03-04 09:36:10', 2, '2015-03-04 09:36:10', 2, NULL, 1, NULL, NULL),
(47, '243234', '2423', NULL, NULL, NULL, NULL, '2015-03-04 09:40:51', 2, '2015-03-04 09:40:51', 2, NULL, 1, NULL, NULL),
(48, 'dgdf', 'dfgdf', NULL, NULL, NULL, NULL, '2015-03-04 09:41:46', 2, '2015-03-04 09:41:46', 2, NULL, 2, NULL, NULL),
(49, 'dgdg', 'dgfdg', NULL, NULL, NULL, NULL, '2015-03-04 09:43:34', 2, '2015-03-04 09:43:34', 2, NULL, 1, NULL, NULL),
(50, 'gfdf', 'dfgfd', NULL, NULL, NULL, NULL, '2015-03-04 09:47:05', 2, '2015-03-04 09:47:05', 2, NULL, 1, NULL, NULL),
(51, 'MARK', 'MASAI', NULL, NULL, NULL, NULL, '2015-05-13 05:24:45', 2, '2015-05-13 05:24:45', 2, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_contact`
--

CREATE TABLE IF NOT EXISTS `staff_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_type` int(11) NOT NULL,
  `contact_value` varchar(50) CHARACTER SET utf8 NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_contact`
--

INSERT INTO `staff_contact` (`contact_id`, `contact_type`, `contact_value`, `staff_id`) VALUES
(1, 2, 'AONO@GMAIL.COM', 48),
(2, 1, '35', 48),
(3, 2, 'aonomike@gmail.com', 49),
(4, 1, '34543', 49),
(5, 2, '678676', 50),
(6, 1, '6768', 50),
(7, 2, 'aonomike@gmail.com', 51),
(8, 1, '23424', 51),
(9, 2, 'dsfdfs', 5),
(10, 1, '34534535', 5);

-- --------------------------------------------------------

--
-- Table structure for table `staff_title`
--

CREATE TABLE IF NOT EXISTS `staff_title` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `stage_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `status_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `details` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `description`, `date_created`, `created_by`, `date_last_updated`, `last_updated_by`, `details`) VALUES
(3, 'Cleared for Publication', '2014-11-20 12:15:06', 1, '2014-11-20 12:15:06', 1, 'Finished'),
(4, 'Cleared for Presentation', '2014-11-26 07:08:30', 1, '2014-11-26 07:08:30', 1, 'Status started.'),
(5, 'Cleared for Implementation', '2015-02-05 00:00:00', 2, '2015-02-03 00:00:00', 2, 'asa'),
(6, 'ERC Review Complete', '2015-02-12 00:00:00', 2, '2015-02-12 00:00:00', 2, 'as'),
(7, 'PRG Review Complete', '2015-02-04 00:00:00', 2, '2015-02-04 00:00:00', 2, 'kj'),
(8, 'Co-Author Riview Complete', '2015-02-19 00:00:00', 2, '0000-00-00 00:00:00', 2, '2'),
(9, 'PRG Review Complete', '2015-02-04 00:00:00', 2, '2015-02-04 00:00:00', 2, 'kj'),
(10, 'Co-Author Riview Complete', '2015-02-19 00:00:00', 2, '2015-02-19 00:00:00', 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `submission_from`
--

CREATE TABLE IF NOT EXISTS `submission_from` (
  `id` int(11) NOT NULL,
  `submission_from` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_updated_date` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submission_to`
--

CREATE TABLE IF NOT EXISTS `submission_to` (
  `id` int(11) NOT NULL,
  `submission_from_id` int(11) NOT NULL,
  `submision_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submission_type`
--

CREATE TABLE IF NOT EXISTS `submission_type` (
  `id` int(11) NOT NULL,
  `submission_type` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_document`
--

CREATE TABLE IF NOT EXISTS `uploaded_document` (
  `upload_document_id` int(11) NOT NULL,
  `file_type` varchar(250) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `full_path` varchar(250) NOT NULL,
  `raw_name` varchar(250) NOT NULL,
  `orig_name` varchar(250) NOT NULL,
  `client_name` varchar(250) NOT NULL,
  `file_ext` varchar(250) NOT NULL,
  `upload_path` varchar(250) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `date_updated` datetime NOT NULL,
  `description` varchar(100) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `voided` tinyint(1) NOT NULL,
  `version` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded_document`
--

INSERT INTO `uploaded_document` (`upload_document_id`, `file_type`, `file_path`, `full_path`, `raw_name`, `orig_name`, `client_name`, `file_ext`, `upload_path`, `created_by`, `date_created`, `last_update_by`, `date_updated`, `description`, `file_name`, `voided`, `version`) VALUES
(51, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/Health_Information_Systems_(2009)_-_(Malestrom).pdf', 'Health_Information_Systems_(2009)_-_(Malestrom)', 'Health_Information_Systems_(2009)_-_(Malestrom).pd', 'Health Information Systems (2009) - (Malestrom).pd', '', 'uploads/Abstract/2015/02//Health_Information_Systems_(2009)_-_(Malestrom).pdf', 2, '2015-02-24 12:28:11', 2, '2015-02-24 12:28:11', '0', 'Health_Information_Systems_(2009)_-_(Malestrom).pdf', 0, '1'),
(52, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/Final_Data_Clerk_Letter.pdf', 'Final_Data_Clerk_Letter', 'Final_Data_Clerk_Letter.pdf', 'Final Data Clerk Letter.pdf', '', 'uploads/Abstract/2015/02//Final_Data_Clerk_Letter.pdf', 2, '2015-02-24 12:57:55', 2, '2015-02-24 12:57:55', '0', 'Final_Data_Clerk_Letter.pdf', 0, '1'),
(53, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/Ref 65632/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/Ref 65632/37416295_31189813_Order_20_(1)_3.doc', '37416295_31189813_Order_20_(1)_3', '37416295_31189813_Order_20_(1)_3.doc', '37416295_31189813_Order_20_(1)_3.doc', '', 'uploads/Abstract/2015/02/Ref 65632/37416295_31189813_Order_20_(1)_3.doc', 2, '2015-02-25 06:30:55', 2, '2015-02-25 06:30:55', '0', '37416295_31189813_Order_20_(1)_3.doc', 0, '1'),
(54, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/Ref 65632/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/Ref 65632/Final_Data_Clerk_Letter.pdf', 'Final_Data_Clerk_Letter', 'Final_Data_Clerk_Letter.pdf', 'Final Data Clerk Letter.pdf', '', 'uploads/Abstract/2015/02/Ref 65632/Final_Data_Clerk_Letter.pdf', 2, '2015-02-25 06:31:39', 2, '2015-02-25 06:31:39', '0', 'Final_Data_Clerk_Letter.pdf', 0, '1'),
(55, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Protocol/2015/02/Pr-2356-2014/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Protocol/2015/02/Pr-2356-2014/desilting_research.pdf', 'desilting_research', 'desilting_research.pdf', 'desilting research.pdf', '', 'uploads/Protocol/2015/02/Pr-2356-2014/desilting_research.pdf', 2, '2015-02-25 06:34:36', 2, '2015-02-25 06:34:36', '0', 'desilting_research.pdf', 0, '1'),
(56, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/02/Effect_of_wind_on_structure_141.pdf', 'Effect_of_wind_on_structure_141', 'Effect_of_wind_on_structure_141.pdf', 'Effect_of_wind_on_structure_141.pdf', '', 'uploads/Abstract/2015/02//Effect_of_wind_on_structure_141.pdf', 2, '2015-02-25 06:36:21', 2, '2015-02-25 06:36:21', '0', 'Effect_of_wind_on_structure_141.pdf', 0, '1'),
(57, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/02/1234/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/02/1234/aonocv.doc', 'aonocv', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Concept Sheet/2015/02/1234/aonocv.doc', 2, '2015-02-27 07:46:40', 2, '2015-02-27 07:46:40', '0', 'aonocv.doc', 0, '1'),
(58, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/02/1234/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/02/1234/aonocv1.doc', 'aonocv1', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Concept Sheet/2015/02/1234/aonocv1.doc', 2, '2015-02-27 07:51:15', 2, '2015-02-27 07:51:15', '0', 'aonocv1.doc', 0, '1'),
(59, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/566752/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/566752/aonocv.doc', 'aonocv', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Abstract/2015/03/566752/aonocv.doc', 2, '2015-03-02 05:46:04', 2, '2015-03-02 05:46:04', '0', 'aonocv.doc', 0, '1'),
(60, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/566752/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/566752/conflict.doc', 'conflict', 'conflict.doc', 'conflict.doc', '', 'uploads/Abstract/2015/03/566752/conflict.doc', 2, '2015-03-02 05:46:36', 2, '2015-03-02 05:46:36', '0', 'conflict.doc', 0, '3'),
(61, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/232478356/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/232478356/aonocv.doc', 'aonocv', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Abstract/2015/03/232478356/aonocv.doc', 2, '2015-03-02 06:03:26', 2, '2015-03-02 06:03:26', '0', 'aonocv.doc', 0, '1'),
(62, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/08989978/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/08989978/aonocv.doc', 'aonocv', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Abstract/2015/03/08989978/aonocv.doc', 2, '2015-03-02 11:19:34', 2, '2015-03-02 11:19:34', '0', 'aonocv.doc', 0, '1'),
(63, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/08989978/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/03/08989978/aonocv1.doc', 'aonocv1', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Abstract/2015/03/08989978/aonocv1.doc', 2, '2015-03-02 11:20:15', 2, '2015-03-02 11:20:15', '0', 'aonocv1.doc', 0, '1'),
(64, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/03/345276-fgr67-453/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Manuscript/2015/03/345276-fgr67-453/aonocv.doc', 'aonocv', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Manuscript/2015/03/345276-fgr67-453/aonocv.doc', 2, '2015-03-02 11:47:07', 2, '2015-03-02 11:47:07', '0', 'aonocv.doc', 0, '2'),
(65, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Poster/2015/03/dsg/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Poster/2015/03/dsg/aonocv.doc', 'aonocv', 'aonocv.doc', 'aonocv.doc', '', 'uploads/Poster/2015/03/dsg/aonocv.doc', 2, '2015-03-05 07:17:02', 2, '2015-03-05 07:17:02', '0', 'aonocv.doc', 0, '1'),
(66, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/DE/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/DE/Awareness_Systems_Advances_in_Theory,_Methodology_and_Design.pdf', 'Awareness_Systems_Advances_in_Theory,_Methodology_and_Design', 'Awareness_Systems_Advances_in_Theory,_Methodology_and_Design.pdf', 'Awareness Systems Advances in Theory, Methodology and Design.pdf', '.pdf', 'uploads/Abstract/2015/05/DE/Awareness_Systems_Advances_in_Theory,_Methodology_and_Design.pdf', 2, '2015-05-13 07:03:53', 2, '2015-05-13 07:03:53', '0', 'Awareness_Systems_Advances_in_Theory,_Methodology_and_Design.pdf', 0, '456'),
(67, 'application/msword', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/DE/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/DE/OS_last_class.doc', 'OS_last_class', 'OS_last_class.doc', 'OS last class.doc', '.doc', 'uploads/Abstract/2015/05/DE/OS_last_class.doc', 2, '2015-05-13 08:57:51', 2, '2015-05-13 08:57:51', '0', 'OS_last_class.doc', 0, '798'),
(68, 'application/vnd.ms-powerpoint', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/sddf/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/sddf/Mass_Storage_devices1.ppt', 'Mass_Storage_devices1', 'Mass_Storage_devices.ppt', 'Mass Storage devices.ppt', '.ppt', 'uploads/Abstract/2015/05/sddf/Mass_Storage_devices1.ppt', 2, '2015-05-13 09:12:14', 2, '2015-05-13 09:12:14', '0', 'Mass_Storage_devices1.ppt', 0, 'DF5'),
(69, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/74hhs/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/74hhs/85N8PYVL0000.pdf', '85N8PYVL0000', '85N8PYVL0000.pdf', '85N8PYVL0000.pdf', '.pdf', 'uploads/Concept Sheet/2015/05/74hhs/85N8PYVL0000.pdf', 2, '2015-05-13 09:29:47', 2, '2015-05-13 09:29:47', '0', '85N8PYVL0000.pdf', 0, 'fd54'),
(70, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/2015/05/sddf345ss/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/2015/05/sddf345ss/5137-14924-1-PB1.pdf', '5137-14924-1-PB1', '5137-14924-1-PB.pdf', '5137-14924-1-PB.pdf', '.pdf', 'uploads//2015/05/sddf345ss/5137-14924-1-PB1.pdf', 2, '2015-05-25 06:24:37', 2, '2015-05-25 06:24:37', '0', '5137-14924-1-PB1.pdf', 0, 'fghf'),
(71, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/2015/05/sddf345ss/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/2015/05/sddf345ss/5137-14924-1-PB2.pdf', '5137-14924-1-PB2', '5137-14924-1-PB.pdf', '5137-14924-1-PB.pdf', '.pdf', 'uploads//2015/05/sddf345ss/5137-14924-1-PB2.pdf', 2, '2015-05-25 06:30:47', 2, '2015-05-25 06:30:47', '0', '5137-14924-1-PB2.pdf', 0, 'fghf'),
(72, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/sddf345ss/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/sddf345ss/5137-14924-1-PB.pdf', '5137-14924-1-PB', '5137-14924-1-PB.pdf', '5137-14924-1-PB.pdf', '.pdf', 'uploads/Concept Sheet/2015/05/sddf345ss/5137-14924-1-PB.pdf', 2, '2015-05-25 06:31:17', 2, '2015-05-25 06:31:17', '0', '5137-14924-1-PB.pdf', 0, 'fghf'),
(73, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Poster/2015/05/yiu/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Poster/2015/05/yiu/5137-14924-1-PB1.pdf', '5137-14924-1-PB1', '5137-14924-1-PB1.pdf', '5137-14924-1-PB1.pdf', '.pdf', 'uploads/Poster/2015/05/yiu/5137-14924-1-PB1.pdf', 2, '2015-05-25 09:32:33', 2, '2015-05-25 09:32:33', '0', '5137-14924-1-PB1.pdf', 0, 'tf'),
(74, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/yiu6/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/yiu6/5137-14924-1-PB.pdf', '5137-14924-1-PB', '5137-14924-1-PB.pdf', '5137-14924-1-PB.pdf', '.pdf', 'uploads/Concept Sheet/2015/05/yiu6/5137-14924-1-PB.pdf', 2, '2015-05-25 09:50:46', 2, '2015-05-25 09:50:46', '0', '5137-14924-1-PB.pdf', 0, '54'),
(75, 'application/pdf', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/yiuyy4/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/yiuyy4/5137-14924-1-PB.pdf', '5137-14924-1-PB', '5137-14924-1-PB.pdf', '5137-14924-1-PB.pdf', '.pdf', 'uploads/Concept Sheet/2015/05/yiuyy4/5137-14924-1-PB.pdf', 2, '2015-05-25 10:07:19', 2, '2015-05-25 10:07:19', '0', '5137-14924-1-PB.pdf', 0, '7'),
(76, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/456465r/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/456465r/Busia_County_Depts.xlsx', 'Busia_County_Depts', 'Busia_County_Depts.xlsx', 'Busia County Depts.xlsx', '.xlsx', 'uploads/Abstract/2015/05/456465r/Busia_County_Depts.xlsx', 2, '2015-05-25 11:15:08', 2, '2015-05-25 11:15:08', '0', 'Busia_County_Depts.xlsx', 0, '54'),
(77, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/43tfgb/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/43tfgb/Busia_County_Depts_(1).xlsx', 'Busia_County_Depts_(1)', 'Busia_County_Depts_(1).xlsx', 'Busia County Depts (1).xlsx', '.xlsx', 'uploads/Concept Sheet/2015/05/43tfgb/Busia_County_Depts_(1).xlsx', 2, '2015-05-25 11:17:41', 2, '2015-05-25 11:17:41', '0', 'Busia_County_Depts_(1).xlsx', 0, '675'),
(78, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/ghGJH/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/ghGJH/Busia_County_Depts_(1).xlsx', 'Busia_County_Depts_(1)', 'Busia_County_Depts_(1).xlsx', 'Busia County Depts (1).xlsx', '.xlsx', 'uploads/Concept Sheet/2015/05/ghGJH/Busia_County_Depts_(1).xlsx', 2, '2015-05-25 13:07:56', 2, '2015-05-25 13:07:56', '0', 'Busia_County_Depts_(1).xlsx', 0, 'f45'),
(79, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/W456DE/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/W456DE/Busia_County_Depts_(1).xlsx', 'Busia_County_Depts_(1)', 'Busia_County_Depts_(1).xlsx', 'Busia County Depts (1).xlsx', '.xlsx', 'uploads/Abstract/2015/05/W456DE/Busia_County_Depts_(1).xlsx', 2, '2015-05-25 13:17:53', 2, '2015-05-25 13:17:53', '0', 'Busia_County_Depts_(1).xlsx', 0, 'E3'),
(80, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/43tfgb/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Concept Sheet/2015/05/43tfgb/Busia_County_Depts_(1)1.xlsx', 'Busia_County_Depts_(1)1', 'Busia_County_Depts_(1).xlsx', 'Busia County Depts (1).xlsx', '.xlsx', 'uploads/Concept Sheet/2015/05/43tfgb/Busia_County_Depts_(1)1.xlsx', 2, '2015-05-25 13:30:24', 2, '2015-05-25 13:30:24', '0', 'Busia_County_Depts_(1)1.xlsx', 0, 'C'),
(81, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Poster/2015/05/UUJJ/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Poster/2015/05/UUJJ/Busia_County_Depts_(1).xlsx', 'Busia_County_Depts_(1)', 'Busia_County_Depts_(1).xlsx', 'Busia County Depts (1).xlsx', '.xlsx', 'uploads/Poster/2015/05/UUJJ/Busia_County_Depts_(1).xlsx', 2, '2015-05-25 13:34:21', 2, '2015-05-25 13:34:21', '0', 'Busia_County_Depts_(1).xlsx', 0, '66'),
(82, 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/4455654/', 'C:/Program Files (x86)/VertrigoServ/www/ORT/uploads/Abstract/2015/05/4455654/Busia_County_Depts_(1).xlsx', 'Busia_County_Depts_(1)', 'Busia_County_Depts_(1).xlsx', 'Busia County Depts (1).xlsx', '.xlsx', 'uploads/Abstract/2015/05/4455654/Busia_County_Depts_(1).xlsx', 2, '2015-05-26 07:23:07', 2, '2015-05-26 07:23:07', '0', 'Busia_County_Depts_(1).xlsx', 0, 'ty');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `is_deleted` bit(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `work_item_id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `work_type` int(11) NOT NULL,
  `submission_deadline` datetime NOT NULL,
  `creation_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `details` varchar(250) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_item`
--

INSERT INTO `work_item` (`work_item_id`, `description`, `work_type`, `submission_deadline`, `creation_date`, `created_by`, `date_last_updated`, `last_updated_by`, `reference_number`, `details`, `is_deleted`) VALUES
(1, 'Balon d''or', 1, '2014-12-11 00:00:00', '2014-12-10 11:33:07', 1, '2015-03-05 07:47:04', 2, '3453', '345345', NULL),
(2, 'January Expenditures', 1, '2015-01-23 00:00:00', '2015-01-05 09:22:04', 1, '2015-01-22 14:31:56', 2, '', '', NULL),
(3, 'Bamba 50', 2, '2015-01-24 00:00:00', '2015-01-22 14:35:05', 2, '2015-02-17 13:05:08', 2, 'A-03-20155', 'Bamba 50', NULL),
(4, 'mike', 2, '2015-01-29 00:00:00', '2015-01-29 08:32:33', 2, '2015-02-17 13:13:34', 2, 'A-03-20', 'details', NULL),
(5, 'Open MRS', 2, '2015-01-29 00:00:00', '2015-01-29 09:23:47', 2, '2015-02-19 08:45:06', 2, 'A-03-212', 'About Open MRS', NULL),
(6, 'OOP', 2, '2015-01-29 00:00:00', '2015-01-29 09:24:35', 2, '2015-02-20 09:56:55', 2, 'Ref 65632', 'fdhgd', NULL),
(7, 'hivss', 4, '2015-01-29 09:30:03', '2015-01-29 09:30:03', 2, '2015-01-29 09:30:03', 2, '', '', NULL),
(8, 'HBCT', 1, '2015-01-29 09:31:12', '2015-01-29 09:31:12', 2, '2015-01-29 09:31:12', 2, '', '', NULL),
(9, 'Bet 365', 3, '2015-01-29 09:33:36', '2015-01-29 09:33:36', 2, '2015-01-29 09:33:36', 2, '', '', NULL),
(10, 'test results', 2, '2015-01-29 00:00:00', '2015-01-29 09:37:25', 2, '2015-02-23 14:11:37', 2, 'B613', 'B613', NULL),
(11, 'fghfh', 1, '2015-01-29 09:43:39', '2015-01-29 09:43:39', 2, '2015-01-29 09:43:39', 2, '', '', NULL),
(12, 'gjfghg', 2, '2015-01-29 00:00:00', '2015-01-29 09:51:18', 2, '2015-02-25 06:42:37', 2, '4579', 'Kenya EMR', NULL),
(13, 'ghfghjgh', 1, '2015-01-29 09:52:00', '2015-01-29 09:52:00', 2, '2015-01-29 09:52:00', 2, '', '', NULL),
(14, '87', 2, '2015-01-29 00:00:00', '2015-01-29 12:04:59', 2, '2015-03-04 08:12:40', 2, '456456', '45654654645', NULL),
(15, 'PEV', 3, '2015-01-29 12:31:11', '2015-01-29 12:31:11', 2, '2015-01-29 12:31:11', 2, '', '', NULL),
(16, 'Post Election Violence', 2, '2015-01-29 00:00:00', '2015-01-29 12:35:33', 2, '2015-03-02 12:10:56', 2, '7988966', 'jhkkjb', NULL),
(17, 'kenya', 2, '2015-01-29 00:00:00', '2015-01-29 12:37:09', 2, '2015-03-04 08:13:14', 2, '45645576', 'ghdfhdhfddfh', NULL),
(18, 'Wasilwa is a Genius', 2, '2015-01-29 00:00:00', '2015-01-29 12:41:13', 2, '2015-03-05 07:51:53', 2, '43243234234', 'sdfsfds', NULL),
(19, 'New work item Name', 2, '2015-02-02 08:45:02', '2015-02-02 08:45:02', 2, '2015-02-02 08:45:02', 2, '', '', NULL),
(20, 'New work item Name', 2, '2015-02-02 08:49:41', '2015-02-02 08:49:41', 2, '2015-02-02 08:49:41', 2, '', '', NULL),
(21, 'New work item Name', 2, '2015-02-02 08:54:10', '2015-02-02 08:54:10', 2, '2015-02-02 08:54:10', 2, '', '', NULL),
(22, 'New work item Name', 2, '2015-02-02 08:58:31', '2015-02-02 08:58:31', 2, '2015-02-02 08:58:31', 2, '', '', NULL),
(23, 'New work item Name', 2, '2015-02-02 09:03:03', '2015-02-02 09:03:03', 2, '2015-02-02 09:03:03', 2, '', '', NULL),
(24, 'New work item Name', 2, '2015-02-02 09:06:34', '2015-02-02 09:06:34', 2, '2015-02-02 09:06:34', 2, '', '', NULL),
(25, 'work item 2', 3, '2015-02-02 09:09:44', '2015-02-02 09:09:44', 2, '2015-02-02 09:09:44', 2, '', '', NULL),
(26, 'work item 2', 3, '2015-02-02 09:10:27', '2015-02-02 09:10:27', 2, '2015-02-02 09:10:27', 2, '', '', NULL),
(27, 'work item 2', 3, '2015-02-02 09:10:45', '2015-02-02 09:10:45', 2, '2015-02-02 09:10:45', 2, '', '', NULL),
(28, 'work item 2', 3, '2015-02-02 09:15:50', '2015-02-02 09:15:50', 2, '2015-02-02 09:15:50', 2, '', '', NULL),
(29, 'Kenya EMR', 1, '2015-02-02 09:24:22', '2015-02-02 09:24:22', 2, '2015-02-02 09:24:22', 2, '', '', NULL),
(30, 'Kenya EMR', 1, '2015-02-02 09:25:26', '2015-02-02 09:25:26', 2, '2015-02-02 09:25:26', 2, '', '', NULL),
(31, 'Kenya EMR', 1, '2015-02-02 09:26:13', '2015-02-02 09:26:13', 2, '2015-02-02 09:26:13', 2, '', '', NULL),
(32, 'Kenya EMR', 1, '2015-02-02 09:26:51', '2015-02-02 09:26:51', 2, '2015-02-02 09:26:51', 2, '', '', NULL),
(33, 'Kenya EMR', 1, '2015-02-02 09:32:19', '2015-02-02 09:32:19', 2, '2015-02-02 09:32:19', 2, '', '', NULL),
(34, 'Kenya EMR', 1, '2015-02-02 09:32:30', '2015-02-02 09:32:30', 2, '2015-02-02 09:32:30', 2, '', '', NULL),
(35, 'Kenya EMR', 1, '2015-02-02 09:37:44', '2015-02-02 09:37:44', 2, '2015-02-02 09:37:44', 2, '', '', NULL),
(36, 'Kenya EMR', 1, '2015-02-02 09:38:38', '2015-02-02 09:38:38', 2, '2015-02-02 09:38:38', 2, '', '', NULL),
(37, 'Kenya EMR', 1, '2015-02-02 09:39:11', '2015-02-02 09:39:11', 2, '2015-02-02 09:39:11', 2, '', '', NULL),
(38, 'Kenya EMR', 1, '2015-02-02 09:40:55', '2015-02-02 09:40:55', 2, '2015-02-02 09:40:55', 2, '', '', NULL),
(39, 'Kenya EMR', 1, '2015-02-02 09:42:59', '2015-02-02 09:42:59', 2, '2015-02-02 09:42:59', 2, '', '', NULL),
(40, 'Kenya EMR', 1, '2015-02-02 09:45:43', '2015-02-02 09:45:43', 2, '2015-02-02 09:45:43', 2, '', '', NULL),
(41, 'Kenya EMR', 1, '2015-02-02 11:20:44', '2015-02-02 11:20:44', 2, '2015-02-02 11:20:44', 2, '', '', NULL),
(42, 'lake house', 2, '2015-02-02 11:51:16', '2015-02-02 11:51:16', 2, '2015-02-02 11:51:16', 2, '', '', NULL),
(43, 'lake house', 2, '2015-02-02 11:55:12', '2015-02-02 11:55:12', 2, '2015-02-02 11:55:12', 2, '', '', NULL),
(44, 'lake house', 2, '2015-02-02 11:57:51', '2015-02-02 11:57:51', 2, '2015-02-02 11:57:51', 2, '', '', NULL),
(45, 'lake house', 2, '2015-02-02 12:01:37', '2015-02-02 12:01:37', 2, '2015-02-02 12:01:37', 2, '', '', NULL),
(46, 'lake house', 2, '2015-02-02 12:02:09', '2015-02-02 12:02:09', 2, '2015-02-02 12:02:09', 2, '', '', NULL),
(47, 'lake house', 2, '2015-02-02 12:03:18', '2015-02-02 12:03:18', 2, '2015-02-02 12:03:18', 2, '', '', NULL),
(48, 'lake house', 2, '2015-02-02 12:17:57', '2015-02-02 12:17:57', 2, '2015-02-02 12:17:57', 2, '', '', NULL),
(49, 'work item 3', 4, '2015-02-02 12:20:28', '2015-02-02 12:20:28', 2, '2015-02-02 12:20:28', 2, '', '', NULL),
(50, 'work item 3', 4, '2015-02-02 12:20:45', '2015-02-02 12:20:45', 2, '2015-02-02 12:20:45', 2, '', '', NULL),
(51, 'work item 56', 4, '2015-02-02 12:32:19', '2015-02-02 12:32:19', 2, '2015-02-02 12:32:19', 2, '', '', NULL),
(52, 'work item 67', 2, '2015-02-02 13:53:24', '2015-02-02 13:53:24', 2, '2015-02-02 13:53:24', 2, '', '', NULL),
(53, 'work item 67', 2, '2015-02-02 13:56:07', '2015-02-02 13:56:07', 2, '2015-02-02 13:56:07', 2, '', '', NULL),
(54, 'work item 67', 2, '2015-02-02 14:28:54', '2015-02-02 14:28:54', 2, '2015-02-02 14:28:54', 2, '', '', NULL),
(55, 'work item 67', 2, '2015-02-02 14:32:32', '2015-02-02 14:32:32', 2, '2015-02-02 14:32:32', 2, '', '', NULL),
(56, 'work item 67', 2, '2015-02-02 14:54:26', '2015-02-02 14:54:26', 2, '2015-02-02 14:54:26', 2, '', '', NULL),
(57, 'work item 67', 2, '2015-02-02 14:55:08', '2015-02-02 14:55:08', 2, '2015-02-02 14:55:08', 2, '', '', NULL),
(58, 'work item 67', 2, '2015-02-02 14:59:54', '2015-02-02 14:59:54', 2, '2015-02-02 14:59:54', 2, '', '', NULL),
(59, 'work ite 54', 2, '2015-02-02 15:00:57', '2015-02-02 15:00:57', 2, '2015-02-02 15:00:57', 2, '', '', NULL),
(60, 'work ite 54', 2, '2015-02-02 15:04:25', '2015-02-02 15:04:25', 2, '2015-02-02 15:04:25', 2, '', '', NULL),
(61, 'work ite 54', 2, '2015-02-02 15:10:37', '2015-02-02 15:10:37', 2, '2015-02-02 15:10:37', 2, '', '', NULL),
(62, 'work ite 54', 2, '2015-02-02 15:11:37', '2015-02-02 15:11:37', 2, '2015-02-02 15:11:37', 2, '', '', NULL),
(63, 'work ite 54', 2, '2015-02-02 15:12:24', '2015-02-02 15:12:24', 2, '2015-02-02 15:12:24', 2, '', '', NULL),
(64, 'work ite 54', 2, '2015-02-02 15:22:23', '2015-02-02 15:22:23', 2, '2015-02-02 15:22:23', 2, '', '', NULL),
(65, 'work ite 54', 2, '2015-02-02 15:23:34', '2015-02-02 15:23:34', 2, '2015-02-02 15:23:34', 2, '', '', NULL),
(66, 'work item 56', 4, '2015-02-02 15:25:03', '2015-02-02 15:25:03', 2, '2015-02-02 15:25:03', 2, '', '', NULL),
(67, 'work item 56', 4, '2015-02-02 15:26:07', '2015-02-02 15:26:07', 2, '2015-02-02 15:26:07', 2, '', '', NULL),
(68, 'work item 56', 4, '2015-02-02 15:50:42', '2015-02-02 15:50:42', 2, '2015-02-02 15:50:42', 2, '', '', NULL),
(69, 'Kenya college', 1, '2015-02-02 18:15:39', '2015-02-02 18:15:39', 2, '2015-02-02 18:15:39', 2, '', '', NULL),
(70, 'Fifa World Cup 2015', 4, '2015-02-02 19:10:21', '2015-02-02 19:10:21', 2, '2015-02-02 19:10:21', 2, '', '', NULL),
(71, 'Fifa World Cup 2015', 4, '2015-02-02 19:31:14', '2015-02-02 19:31:14', 2, '2015-02-02 19:31:14', 2, '', '', NULL),
(72, 'Fifa World Cup 2015', 4, '2015-02-02 19:37:06', '2015-02-02 19:37:06', 2, '2015-02-02 19:37:06', 2, '', '', NULL),
(73, 'Fifa World Cup 2015', 4, '2015-02-02 19:38:51', '2015-02-02 19:38:51', 2, '2015-02-02 19:38:51', 2, '', '', NULL),
(74, 'Dreezy Drake', 4, '2015-02-03 05:52:40', '2015-02-03 05:52:40', 2, '2015-02-03 05:52:40', 2, '', '', NULL),
(75, 'Dreezy Drake', 4, '2015-02-03 06:09:32', '2015-02-03 06:09:32', 2, '2015-02-03 06:09:32', 2, '', '', NULL),
(76, 'Data Tables', 1, '2015-02-03 06:12:32', '2015-02-03 06:12:32', 2, '2015-02-03 06:12:32', 2, '', '', NULL),
(77, 'Data Tables', 1, '2015-02-03 06:30:52', '2015-02-03 06:30:52', 2, '2015-02-03 06:30:52', 2, '', '', NULL),
(78, 'Data Tables', 1, '2015-02-03 06:31:51', '2015-02-03 06:31:51', 2, '2015-02-03 06:31:51', 2, '', '', NULL),
(79, 'Data Tables', 1, '2015-02-03 06:33:49', '2015-02-03 06:33:49', 2, '2015-02-03 06:33:49', 2, '', '', NULL),
(80, 'Data Tables', 1, '2015-02-03 06:35:32', '2015-02-03 06:35:32', 2, '2015-02-03 06:35:32', 2, '', '', NULL),
(81, 'Data Tables', 1, '2015-02-03 06:39:21', '2015-02-03 06:39:21', 2, '2015-02-03 06:39:21', 2, '', '', NULL),
(82, 'Data Tables', 1, '2015-02-03 07:09:52', '2015-02-03 07:09:52', 2, '2015-02-03 07:09:52', 2, '', '', NULL),
(83, 'Data Tables', 1, '2015-02-03 07:10:15', '2015-02-03 07:10:15', 2, '2015-02-03 07:10:15', 2, '', '', NULL),
(84, 'Data Tables Work ', 4, '2015-02-03 08:32:29', '2015-02-03 08:32:29', 2, '2015-02-03 08:32:29', 2, '', '', NULL),
(85, 'Data Tables Work 1', 3, '2015-02-03 08:36:18', '2015-02-03 08:36:18', 2, '2015-02-03 08:36:18', 2, '', '', NULL),
(86, 'Dreezy Drake 4', 2, '2015-02-03 08:36:44', '2015-02-03 08:36:44', 2, '2015-02-03 08:36:44', 2, '', '', NULL),
(87, 'Dreezy Drake 5', 2, '2015-02-03 08:40:43', '2015-02-03 08:40:43', 2, '2015-02-03 08:40:43', 2, '', '', NULL),
(88, 'Dreezy Drake 5', 2, '2015-02-03 09:16:19', '2015-02-03 09:16:19', 2, '2015-02-03 09:16:19', 2, '', '', NULL),
(89, 'Dreezy Drake 5', 2, '2015-02-03 09:18:54', '2015-02-03 09:18:54', 2, '2015-02-03 09:18:54', 2, '', '', NULL),
(90, 'Dreezy Drake 5', 2, '2015-02-03 09:21:05', '2015-02-03 09:21:05', 2, '2015-02-03 09:21:05', 2, '', '', NULL),
(91, 'Dreezy Drake 5', 2, '2015-02-03 09:21:38', '2015-02-03 09:21:38', 2, '2015-02-03 09:21:38', 2, '', '', NULL),
(92, 'Dreezy Drake 5', 2, '2015-02-03 09:27:22', '2015-02-03 09:27:22', 2, '2015-02-03 09:27:22', 2, '', '', NULL),
(93, 'work item 24', 3, '2015-02-03 09:32:50', '2015-02-03 09:32:50', 2, '2015-02-03 09:32:50', 2, '', '', NULL),
(94, 'work item 24', 3, '2015-02-03 09:51:18', '2015-02-03 09:51:18', 2, '2015-02-03 09:51:18', 2, '', '', NULL),
(95, 'work item 25', 3, '2015-02-03 09:52:08', '2015-02-03 09:52:08', 2, '2015-02-03 09:52:08', 2, '', '', NULL),
(96, 'work item 26', 3, '2015-02-03 09:53:59', '2015-02-03 09:53:59', 2, '2015-02-03 09:53:59', 2, '', '', NULL),
(97, 'work item 27', 4, '2015-02-03 09:58:33', '2015-02-03 09:58:33', 2, '2015-02-03 09:58:33', 2, '', '', NULL),
(98, 'work item 28', 2, '2015-02-03 09:59:30', '2015-02-03 09:59:30', 2, '2015-02-03 09:59:30', 2, '', '', NULL),
(99, 'work item 29', 2, '2015-02-03 10:01:38', '2015-02-03 10:01:38', 2, '2015-02-03 10:01:38', 2, '', '', NULL),
(100, 'work item 30', 2, '2015-02-03 11:27:38', '2015-02-03 11:27:38', 2, '2015-02-03 11:27:38', 2, '', '', NULL),
(101, 'work item 30', 2, '2015-02-03 11:48:08', '2015-02-03 11:48:08', 2, '2015-02-03 11:48:08', 2, '', '', NULL),
(102, 'work item 30', 2, '2015-02-03 11:49:53', '2015-02-03 11:49:53', 2, '2015-02-03 11:49:53', 2, '', '', NULL),
(103, 'work item 30', 2, '2015-02-03 11:50:25', '2015-02-03 11:50:25', 2, '2015-02-03 11:50:25', 2, '', '', NULL),
(104, 'work item 31', 2, '2015-02-03 11:53:21', '2015-02-03 11:53:21', 2, '2015-02-03 11:53:21', 2, '', '', NULL),
(105, 'work item 31', 1, '2015-02-03 11:55:52', '2015-02-03 11:55:52', 2, '2015-02-03 11:55:52', 2, '', '', NULL),
(106, 'work item 31', 1, '2015-02-03 11:57:34', '2015-02-03 11:57:34', 2, '2015-02-03 11:57:34', 2, '', '', NULL),
(107, 'work item 31', 1, '2015-02-03 11:57:59', '2015-02-03 11:57:59', 2, '2015-02-03 11:57:59', 2, '', '', NULL),
(108, 'work item 35', 2, '2015-02-03 12:00:27', '2015-02-03 12:00:27', 2, '2015-02-03 12:00:27', 2, '', '', NULL),
(109, 'work item 35', 2, '2015-02-03 12:04:41', '2015-02-03 12:04:41', 2, '2015-02-03 12:04:41', 2, '', '', NULL),
(110, '123', 1, '2015-02-03 12:07:16', '2015-02-03 12:07:16', 2, '2015-02-03 12:07:16', 2, '', '', NULL),
(111, '1233', 1, '2015-02-03 00:00:00', '2015-02-03 12:10:16', 2, '2015-02-20 09:31:20', 2, 'M-7634-76634', 'Details', NULL),
(112, '123345', 1, '2015-02-03 12:10:57', '2015-02-03 12:10:57', 2, '2015-02-03 12:10:57', 2, '', '', NULL),
(113, '123345', 1, '2015-02-03 12:11:51', '2015-02-03 12:11:51', 2, '2015-02-03 12:11:51', 2, '', '', NULL),
(121, 'Create Work Item', 1, '2015-02-03 15:24:22', '2015-02-03 15:24:22', 2, '2015-02-03 15:24:22', 2, '', '', NULL),
(122, 'Create Work Item', 1, '2015-02-03 15:25:17', '2015-02-03 15:25:17', 2, '2015-02-03 15:25:17', 2, '', '', NULL),
(123, 'Reference Number', 1, '2015-02-04 07:38:31', '2015-02-04 07:38:31', 2, '2015-02-04 07:38:31', 2, '', '', NULL),
(124, 'January Expenditures Trail', 2, '2015-02-04 07:39:53', '2015-02-04 07:39:53', 2, '2015-02-04 07:39:53', 2, '', '', NULL),
(125, 'January Expenditures Trail', 2, '2015-02-04 07:43:15', '2015-02-04 07:43:15', 2, '2015-02-04 07:43:15', 2, '', '', NULL),
(126, 'Lets get away', 4, '2015-02-05 13:53:39', '2015-02-05 13:53:39', 2, '2015-02-05 13:53:39', 2, '', '', NULL),
(127, 'ghjghj', 2, '2015-02-06 14:01:00', '2015-02-06 14:01:00', 2, '2015-02-06 14:01:00', 2, '', '', NULL),
(128, 'Document Title', 2, '2015-02-09 13:03:44', '2015-02-09 13:03:44', 2, '2015-02-09 13:03:44', 2, '', '', NULL),
(129, 'Document Title', 2, '2015-02-09 13:17:21', '2015-02-09 13:17:21', 2, '2015-02-09 13:17:21', 2, '', '', NULL),
(130, 'Document Title One', 2, '2015-02-09 13:19:01', '2015-02-09 13:19:01', 2, '2015-02-09 13:19:01', 2, '', '', NULL),
(131, 'Document Title One Two Three', 2, '2015-02-09 13:33:40', '2015-02-09 13:33:40', 2, '2015-02-09 13:33:40', 2, '', '', NULL),
(132, 'Trailer', 2, '2015-02-09 13:38:00', '2015-02-09 13:38:00', 2, '2015-02-09 13:38:00', 2, '', '', NULL),
(133, 'Nicho Stories', 3, '0000-00-00 00:00:00', '2015-02-17 07:29:58', 2, '2015-02-17 07:29:58', 2, '', '', NULL),
(134, 'Nicho Stories', 3, '0000-00-00 00:00:00', '2015-02-17 07:35:40', 2, '2015-02-17 07:35:40', 2, '', '', NULL),
(135, 'Kibera Slums', 4, '2015-01-28 00:00:00', '2015-02-17 07:56:41', 2, '2015-02-17 07:56:41', 2, '', 'kibera slums', NULL),
(136, 'Kibera Slums', 4, '2015-01-28 00:00:00', '2015-02-17 08:01:42', 2, '2015-02-17 08:01:42', 2, 'J/01/15', 'kibera slums', NULL),
(137, 'Clinical Trial on the effectiveness of Point of Care malaria test kit', 3, '2015-02-03 00:00:00', '2015-02-17 13:22:11', 2, '2015-02-17 13:22:11', 2, 'Pr-2356-2014', 'Clinical trial at JOOTRH', NULL),
(138, 'Using  Point of Care System to improve data quality', 1, '2015-02-04 00:00:00', '2015-02-17 13:26:15', 2, '2015-02-17 13:26:15', 2, 'M-2054-2014', 'OpenMRSl at JOOTRH', NULL),
(139, 'Daily Nation', 3, '2015-01-29 00:00:00', '2015-02-19 11:49:35', 2, '2015-02-19 11:49:35', 2, '18214', '3erttytyhj', NULL),
(140, 'DSDFDF', 4, '0000-00-00 00:00:00', '2015-02-24 06:13:40', 2, '2015-02-24 06:13:40', 2, 'DFSF', 'SDFS', NULL),
(141, 'Title 1', 2, '2015-02-02 00:00:00', '2015-02-24 07:00:23', 2, '2015-02-24 07:00:23', 2, '877', 'random', NULL),
(142, 'Keep mine', 4, '2015-01-27 00:00:00', '2015-02-24 07:01:43', 2, '2015-02-24 07:01:43', 2, '2323', '2', NULL),
(143, 'KENYA MPYA', 4, '2015-01-28 00:00:00', '2015-02-27 06:58:43', 2, '2015-02-27 06:58:43', 2, '1234', 'MUTUKS', NULL),
(144, 'test', 2, '2015-02-12 00:00:00', '2015-02-27 08:30:22', 2, '2015-02-27 08:30:22', 2, '56', 'test', NULL),
(145, 'test1', 2, '2015-01-27 00:00:00', '2015-02-27 08:31:07', 2, '2015-02-27 08:31:07', 2, '767', 'jhhjgjh', NULL),
(146, 'test', 2, '2015-02-04 00:00:00', '2015-02-27 08:36:16', 2, '2015-02-27 08:36:16', 2, 'test', 'test', NULL),
(147, 'True Kenyan', 2, '2015-02-04 00:00:00', '2015-02-27 08:41:29', 2, '2015-02-27 08:41:29', 2, '54', 'Details', NULL),
(148, 'True Kenyan Link', 4, '2015-02-04 00:00:00', '2015-02-27 08:43:46', 2, '2015-02-27 08:43:46', 2, '544', 'jaja', NULL),
(149, 'True Kenyan Link Ted', 2, '2015-02-04 00:00:00', '2015-02-27 08:45:25', 2, '2015-02-27 08:45:25', 2, '5456', 'Description', NULL),
(150, 'Mike Mlafi', 2, '2015-02-12 00:00:00', '2015-02-27 09:21:25', 2, '2015-02-27 09:21:25', 2, '2345134', 'R4', NULL),
(151, 'kenya kenya', 1, '2015-02-04 00:00:00', '2015-02-27 09:29:21', 2, '2015-02-27 09:29:21', 2, '898', 'KENYA', NULL),
(152, 'kenya kenya clean', 2, '2015-02-27 00:00:00', '2015-02-27 09:30:32', 2, '2015-02-27 09:30:32', 2, 'kaka', 'kenya', NULL),
(153, 'JANA', 2, '2015-01-09 00:00:00', '2015-02-27 09:32:22', 2, '2015-02-27 09:32:22', 2, '3244345', 'hehe', NULL),
(154, 'Kisian Team', 2, '2015-01-28 00:00:00', '2015-02-27 09:39:56', 2, '2015-02-27 09:39:56', 2, '6776565', 'Kenya', NULL),
(155, 'Data Presentation', 2, '2015-02-07 00:00:00', '2015-02-27 09:45:09', 2, '2015-02-27 09:45:09', 2, '32420', 'Kenya', NULL),
(156, 'kisumu', 2, '2015-01-29 00:00:00', '2015-02-27 10:34:40', 2, '2015-02-27 10:34:40', 2, '6364', 'jmhjk', NULL),
(157, 'Item', 2, '2015-01-27 00:00:00', '2015-02-27 10:38:22', 2, '2015-02-27 10:38:22', 2, '23458', 'task', NULL),
(158, 'Modems', 1, '2015-01-29 00:00:00', '2015-02-27 10:39:16', 2, '2015-02-27 10:39:16', 2, '1', '1', NULL),
(159, 'KAIS 2012', 2, '2015-01-29 00:00:00', '2015-02-27 10:45:16', 2, '2015-02-27 10:45:16', 2, '786768', 'MIKK', NULL),
(160, 'THE MATTER', 1, '2015-03-17 00:00:00', '2015-03-02 05:32:45', 2, '2015-03-02 05:32:45', 2, '123456', 'THE MATTER', NULL),
(161, 'MATERIAL STUFF', 4, '2015-03-10 00:00:00', '2015-03-02 05:33:28', 2, '2015-03-02 05:33:28', 2, '78637567836', 'OR', NULL),
(162, 'MUTUKU', 2, '2015-03-18 00:00:00', '2015-03-02 05:45:35', 2, '2015-03-02 05:45:35', 2, '566752', 'FGH', NULL),
(163, 'TEST MATERIAL', 2, '2015-03-25 00:00:00', '2015-03-02 05:52:47', 2, '2015-03-02 05:52:47', 2, '232478356', 'bxvbxhjcvbxj', NULL),
(164, 'strata', 4, '2015-03-10 00:00:00', '2015-03-02 11:12:53', 2, '2015-03-02 11:12:53', 2, 'jjhjgh', 'dfghfghf', NULL),
(165, 'TEST MATERIAL', 2, '2015-03-13 00:00:00', '2015-03-02 11:19:10', 2, '2015-03-02 11:19:10', 2, '08989978', 'dgsfg', NULL),
(166, 'SNOMED', 1, '2015-04-25 00:00:00', '2015-03-02 11:40:07', 2, '2015-03-02 11:40:07', 2, '345276-fgr67-453', 'ewewewrwr', NULL),
(167, 'MENO YAKE', 5, '2015-03-20 00:00:00', '2015-03-03 11:13:20', 2, '2015-03-03 11:13:20', 2, '23434', 'DESCRIPTION', NULL),
(168, 'MENO YAKE yawa', 2, '2015-03-20 00:00:00', '2015-03-03 11:30:44', 2, '2015-03-03 11:30:44', 2, '23434zcxzcz', 'yawa', NULL),
(169, 'Mike test', 4, '2015-02-27 00:00:00', '2015-03-03 11:36:03', 2, '2015-03-03 11:36:03', 2, 'test101', 'vbvbvbv', NULL),
(170, 'TESTS TESTS', 4, '2015-03-20 00:00:00', '2015-03-03 12:04:12', 2, '2015-03-03 12:04:12', 2, 'HJKHKJHK', 'SDFSFS', NULL),
(171, 'TESTS TESTS', 1, '2015-03-20 00:00:00', '2015-03-03 12:07:47', 2, '2015-03-03 12:07:47', 2, 'HJKHKJHK3545', '45456456', NULL),
(172, 'sg', 2, '2015-03-08 00:00:00', '2015-03-03 13:27:18', 2, '2015-03-03 13:27:18', 2, 'sd', 'sds', NULL),
(173, 'Mike Fise', 2, '2015-03-23 00:00:00', '2015-03-03 14:20:50', 2, '2015-03-03 14:20:50', 2, '5767', 'mike', NULL),
(174, 'mutumbo', 2, '2015-03-19 00:00:00', '2015-03-03 14:32:23', 2, '2015-03-03 14:32:23', 2, '354345', 'description', NULL),
(175, 'kenyatta', 2, '2015-03-12 00:00:00', '2015-03-03 14:36:36', 2, '2015-03-03 14:36:36', 2, '56465456456', 'ccccvcvbcvb', NULL),
(176, 'management', 4, '2015-03-27 00:00:00', '2015-03-03 14:47:15', 2, '2015-03-03 14:47:15', 2, '87686', 'sdfdf', NULL),
(177, 'management', 1, '2015-03-27 00:00:00', '2015-03-03 14:48:16', 2, '2015-03-03 14:48:16', 2, '87686sf', 'sfsdfsf', NULL),
(178, 'management', 4, '2015-03-27 00:00:00', '2015-03-03 14:49:27', 2, '2015-03-03 14:49:27', 2, '87686sf5756', '6576', NULL),
(179, '3453', 2, '2015-02-23 00:00:00', '2015-03-03 14:50:47', 2, '2015-03-03 14:50:47', 2, '3534', '3453453', NULL),
(180, '54dertfd', 4, '2015-02-04 00:00:00', '2015-03-03 14:51:58', 2, '2015-03-03 14:51:58', 2, '24324', 'sfdssdfds', NULL),
(181, 'kijana', 4, '2015-03-26 00:00:00', '2015-03-03 14:53:32', 2, '2015-03-03 14:53:32', 2, '786786', '45654646', NULL),
(182, 'dsfdgf', 5, '2015-03-04 00:00:00', '2015-03-03 15:01:24', 2, '2015-03-03 15:01:24', 2, 'dsg', 'sddgdfg', NULL),
(183, 'nhhdggd', 4, '2015-03-27 00:00:00', '2015-03-03 15:10:24', 2, '2015-03-03 15:10:24', 2, 'jkljkjdkfg', 'fghfghfdh', NULL),
(184, 'erte', 4, '2015-02-23 00:00:00', '2015-03-03 15:13:36', 2, '2015-03-03 15:13:36', 2, 'eter', 'ertetre', NULL),
(185, 'Pumba and Timon', 2, '2015-03-11 00:00:00', '2015-03-04 08:16:02', 2, '2015-03-04 08:16:02', 2, 'p45646', 'fdwgsdgsg', NULL),
(186, 'ertet', 4, '2015-03-10 00:00:00', '2015-03-04 08:30:26', 2, '2015-03-04 08:30:26', 2, 'dgd', 'dgdfg', NULL),
(187, 'yu4ey', 1, '2015-02-23 00:00:00', '2015-03-04 08:30:55', 2, '2015-03-04 08:30:55', 2, 'tryety', 'eryrbdg', NULL),
(188, '43535', 5, '2015-03-09 00:00:00', '2015-03-04 08:33:34', 2, '2015-03-04 08:33:34', 2, '34535', '54345', NULL),
(189, 'erterte', 4, '2015-02-24 00:00:00', '2015-03-04 08:38:36', 2, '2015-03-04 08:38:36', 2, 'etrtet', 'erter', NULL),
(190, 'karguf', 4, '2015-03-05 00:00:00', '2015-03-04 09:07:53', 2, '2015-03-04 09:07:53', 2, 'k,hmngbmngvmn', 'bvbvjvgf', NULL),
(191, 'sdgd', 2, '2015-03-11 00:00:00', '2015-03-04 09:10:10', 2, '2015-03-04 09:10:10', 2, 'sdgd', 'sdgd', NULL),
(192, 'eterte', 2, '2015-03-04 00:00:00', '2015-03-04 09:14:54', 2, '2015-03-04 09:14:54', 2, 'ertert', 'erterererererert', NULL),
(193, 'xbxbx', 4, '2015-03-12 00:00:00', '2015-03-04 09:16:19', 2, '2015-03-04 09:16:19', 2, 'x', 'xbc', NULL),
(194, '324535', 2, '2015-03-18 00:00:00', '2015-03-04 09:22:20', 2, '2015-03-04 09:22:20', 2, 'werwe', 'dgdgdfg', NULL),
(195, '324535', 2, '2015-03-18 00:00:00', '2015-03-04 09:28:01', 2, '2015-03-04 09:28:01', 2, 'werwem nbm', 'bmtgfh', NULL),
(196, '324535', 2, '2015-03-18 00:00:00', '2015-03-04 09:28:15', 2, '2015-03-04 09:28:15', 2, 'werwe45', 'dgdgdfg', NULL),
(197, '324535', 5, '2015-03-18 00:00:00', '2015-03-04 09:31:20', 2, '2015-03-04 09:31:20', 2, 'werwe45456', '45645645', NULL),
(198, 'trg', 5, '2015-03-01 00:00:00', '2015-03-04 09:34:55', 2, '2015-03-04 09:34:55', 2, 'dgs', 'sdgf', NULL),
(199, '5464', 2, '2015-02-23 00:00:00', '2015-03-04 09:35:52', 2, '2015-03-04 09:35:52', 2, '4565464', '46', NULL),
(200, 'jnklkhjkhjksdfhgdf', 4, '2015-03-19 00:00:00', '2015-03-04 09:40:40', 2, '2015-03-04 09:40:40', 2, '23432434', '234234234', NULL),
(201, 'jnklkhjkhjksdfhgdf', 1, '2015-03-19 00:00:00', '2015-03-04 09:41:29', 2, '2015-03-04 09:41:29', 2, '23432434ghf', 'dfgdgdfg', NULL),
(202, 'uiyus', 2, '2015-03-11 00:00:00', '2015-03-04 09:43:21', 2, '2015-03-04 09:43:21', 2, 'gbgf', 'dsfg', NULL),
(203, 'uiyus', 2, '2015-03-11 00:00:00', '2015-03-04 09:46:51', 2, '2015-03-04 09:46:51', 2, 'gbgfvbn', 'vbnvnvb', NULL),
(204, '456456', 4, '2015-03-10 00:00:00', '2015-03-04 09:51:53', 2, '2015-03-04 09:51:53', 2, '4565464456', '456546', NULL),
(205, 'jajahjg', 2, '2015-03-25 00:00:00', '2015-03-05 06:42:07', 2, '2015-03-05 06:42:07', 2, '56454', 'sdfdsfsd', NULL),
(206, 'Kibera Slums', 2, '2015-03-30 00:00:00', '2015-03-05 08:17:00', 2, '2015-03-05 08:17:00', 2, 'i9w593485789', 'dsfsfgfdg', NULL),
(207, 'Kibera Slums', 2, '2015-03-30 00:00:00', '2015-03-05 08:21:01', 2, '2015-03-05 08:21:01', 2, 'fgfghf', 'dfhg', NULL),
(208, 'adyfasfd', 4, '2015-03-12 00:00:00', '2015-03-05 08:33:04', 2, '2015-03-05 08:33:04', 2, 'BJHVHV', 'SFVXCVXCVXCV', NULL),
(209, 'YHDJKGFVDJ', 4, '2015-03-04 00:00:00', '2015-03-05 08:34:05', 2, '2015-03-05 08:34:05', 2, 'MVBVN', 'XV XVNXBCVV', NULL),
(210, 'GHFHF', 2, '2015-03-01 00:00:00', '2015-03-05 08:35:17', 2, '2015-03-05 08:35:17', 2, 'FHHF', 'FGHFG', NULL),
(211, 'GHFHF', 5, '2015-03-01 00:00:00', '2015-03-05 08:44:53', 2, '2015-03-05 08:44:53', 2, 'FHHFzxvxzv', 'zxvzxvzx', NULL),
(212, '8w89e7r8w7e', 4, '2015-03-16 00:00:00', '2015-03-05 09:58:23', 2, '2015-03-05 09:58:23', 2, 'vvbnvbhfghf', 'xvcxcvxcv', NULL),
(213, 'thd', 4, '2015-03-10 00:00:00', '2015-03-05 10:01:35', 2, '2015-03-05 10:01:35', 2, '1234dg', 'dfgdgd', NULL),
(214, 'thd', 6, '2015-03-10 00:00:00', '2015-03-05 10:03:49', 2, '2015-03-05 10:03:49', 2, '1234dgfghfg', 'fghfhgdfhg', NULL),
(215, 'thd', 5, '2015-02-25 00:00:00', '2015-03-05 10:04:59', 2, '2015-03-05 10:04:59', 2, '1234dgfghfgghhd', 'dfghfghfg', NULL),
(216, 'thd', 1, '2015-02-25 00:00:00', '2015-03-05 10:05:56', 2, '2015-03-05 10:05:56', 2, 'vcnc', 'vcnvn', NULL),
(217, 'thd', 1, '2015-02-25 00:00:00', '2015-03-05 10:07:34', 2, '2015-03-05 10:07:34', 2, 'vcncxvxcv', 'xcvxvxxv', NULL),
(218, 'thd', 4, '2015-02-25 00:00:00', '2015-03-05 10:13:18', 2, '2015-03-05 10:13:18', 2, 'vcncxvxcvfgh', 'fhfghfh', NULL),
(219, 'hjfj', 4, '2015-03-17 00:00:00', '2015-03-05 10:15:11', 2, '2015-03-05 10:15:11', 2, 'fjhjgj', 'fghj', NULL),
(220, 'bnfgdf', 2, '2015-03-04 00:00:00', '2015-03-05 11:13:05', 2, '2015-03-05 11:13:05', 2, 'dfhfghf', 'dfghggfhfg', NULL),
(221, 'bnfgdf', 1, '2015-03-04 00:00:00', '2015-03-05 11:16:34', 2, '2015-03-05 11:16:34', 2, 'dfhfghfcbcvb', 'cbcbvcvb', NULL),
(222, 'dfsggsdfg', 2, '2015-02-22 00:00:00', '2015-03-05 13:01:21', 2, '2015-03-05 13:01:21', 2, 'sdfgsd', 'sdfgdfgdf', NULL),
(223, 'dfsggsdfg', 1, '2015-02-22 00:00:00', '2015-03-05 13:02:39', 2, '2015-03-05 13:02:39', 2, 'sdfgsdsdgd', 'dsfgdgf', NULL),
(224, 'dfsggsdfg', 1, '2015-02-22 00:00:00', '2015-03-05 13:05:07', 2, '2015-03-05 13:05:07', 2, 'sdfgsdsdgdxcvxc', 'xcvx', NULL),
(225, 'dfsggsdfg', 4, '2015-02-22 00:00:00', '2015-03-05 13:14:32', 2, '2015-03-05 13:14:32', 2, 'sdfgsdsdgdxcvxcbnmv', 'bmnnm', NULL),
(226, 'Testing Testing', 4, '2015-05-07 00:00:00', '2015-05-07 09:37:15', 2, '2015-05-07 09:37:15', 2, 'vfd455a', 'mike', NULL),
(227, 'Testing Testing 122', 1, '2015-05-20 00:00:00', '2015-05-07 09:38:33', 2, '2015-05-07 09:38:33', 2, 'vfd455agg', '', NULL),
(228, 'jump tested', 4, '2015-05-22 00:00:00', '2015-05-07 11:22:29', 2, '2015-05-07 11:22:29', 2, '34ffd', 'test test', 1),
(229, 'Testing Testing 12254', 4, '2015-05-23 00:00:00', '2015-05-07 13:02:16', 2, '2015-05-07 13:02:16', 2, 'W456D', 'DHGF', 0),
(230, 'Testing Testing 123', 2, '2015-05-22 00:00:00', '2015-05-08 06:19:47', 2, '2015-05-08 06:19:47', 2, '675as5d', 'sada', 0),
(231, 'Testing Testing 123', 4, '2015-05-22 00:00:00', '2015-05-08 06:37:42', 2, '2015-05-08 06:37:42', 2, '675', 'DGHFHF', 0),
(232, 'Testing Testing 123', 4, '2015-05-22 00:00:00', '2015-05-08 06:39:29', 2, '2015-05-08 06:39:29', 2, '675SDF', 'X', 0),
(233, 'test test test`', 2, '2015-05-30 00:00:00', '2015-05-08 07:26:28', 2, '2015-05-08 07:26:28', 2, '4455654', 'hjhjhjgjgh', 0),
(234, 'test test test`', 4, '2015-05-30 00:00:00', '2015-05-08 07:38:52', 2, '2015-05-08 07:38:52', 2, '4455654ds', '', 0),
(235, 'MIKE', 2, '2015-05-13 00:00:00', '2015-05-13 05:23:37', 2, '2015-05-13 05:23:37', 2, 'DE', '', 0),
(236, 'ricky test', 2, '2015-05-13 00:00:00', '2015-05-13 09:06:48', 2, '2015-05-13 09:06:48', 2, 'sdf', 'd', 0),
(237, 'Mark test', 2, '2015-05-13 00:00:00', '2015-05-13 09:08:09', 2, '2015-05-13 09:08:09', 2, 'sddf', '756', 0),
(238, 'Tolbert Test', 4, '2015-05-13 00:00:00', '2015-05-13 09:27:20', 2, '2015-05-13 09:27:20', 2, '74hhs', 'sdfsf', 0),
(239, 'nishikie', 4, '2015-05-14 00:00:00', '2015-05-13 13:37:46', 2, '2015-05-13 13:37:46', 2, 'sdd344', 'er', 0),
(240, 'test test test today', 4, '2015-05-14 00:00:00', '2015-05-14 05:50:46', 2, '2015-05-14 05:50:46', 2, 'er45653', 'wewe', 0),
(241, 'KENYA EMR', 1, '2015-05-14 00:00:00', '2015-05-14 08:01:29', 2, '2015-05-14 08:01:29', 2, 'KE6737', 'GD', 0),
(242, 'JUMP START', 1, '2015-05-14 00:00:00', '2015-05-14 08:02:32', 2, '2015-05-14 08:02:32', 2, 'ME78', 'FGH', 0),
(243, 'Masamaro in the building', 2, '2015-05-14 00:00:00', '2015-05-14 08:12:30', 2, '2015-05-14 08:12:30', 2, '545tasf', 'rapapa', 0),
(244, 'tyson gaay doping claims', 4, '2015-05-28 00:00:00', '2015-05-14 09:33:59', 2, '2015-05-14 09:33:59', 2, 're4t', 'vbvb', 0),
(245, 'tyson gaay doping claims', 2, '2028-05-15 00:00:00', '2015-05-14 09:36:59', 2, '2015-05-14 09:45:05', 2, 're4t.''op', 'xvxgfdgfd', 0),
(246, 'verbal message', 5, '2015-05-15 00:00:00', '2015-05-14 09:53:22', 2, '2015-05-14 09:53:22', 2, 'hg77786', 'ghjgj', 0),
(247, 'making plans', 5, '2014-05-15 00:00:00', '2015-05-14 11:32:50', 2, '2015-05-14 11:32:56', 2, 'tr453e', 'truu', 0),
(248, 'questions', 4, '2014-05-15 00:00:00', '2015-05-14 11:34:10', 2, '2015-05-14 11:34:14', 2, 'placs08098', 'sfsdf', 0),
(249, 'pass hooker', 2, '2015-05-14 00:00:00', '2015-05-14 11:36:42', 2, '2015-05-14 11:41:26', 2, 'thrhdh4353', 'nn', 0),
(250, 'test heritage', 1, '2015-05-18 00:00:00', '2015-05-18 09:25:44', 2, '2015-05-18 09:25:44', 2, '43t', 'fdfd', 1),
(251, 'test heritage', 4, '2015-05-18 00:00:00', '2015-05-18 09:26:40', 2, '2015-05-18 09:26:40', 2, '43tfgb', 'gfbfg', 0),
(252, 'ghf', 2, '2015-05-14 00:00:00', '2015-05-19 06:12:12', 2, '2015-05-19 06:12:12', 2, 'dfh674', 'yrtr', 0),
(253, 'ghf', 1, '2015-05-14 00:00:00', '2015-05-19 06:14:46', 2, '2015-05-19 06:14:46', 2, 'dfh674x', 'dffgdg', 0),
(254, 'ghf', 4, '2015-05-14 00:00:00', '2015-05-19 06:15:21', 2, '2015-05-19 06:15:21', 2, 'dfh674xg', 'vgfm', 0),
(255, 'ghf', 1, '2015-05-14 00:00:00', '2015-05-19 06:29:28', 2, '2015-05-19 06:29:28', 2, 'dfh674xggbg', 'vcb', 0),
(256, 'ghf', 4, '2015-05-14 00:00:00', '2015-05-19 06:32:18', 2, '2015-05-19 06:32:18', 2, 'dfh674xggbgf', 'dfdfdfdfdfgh', 0),
(257, 'ghf', 1, '2015-05-14 00:00:00', '2015-05-19 06:36:58', 2, '2015-05-19 06:36:58', 2, 'dfh674xggbgfx', '', 0),
(258, 'ghf', 4, '2015-05-14 00:00:00', '2015-05-19 06:40:08', 2, '2015-05-19 06:40:08', 2, 'dfh674xggbgfxb', '', 0),
(259, 'ghf', 1, '2015-05-14 00:00:00', '2015-05-19 06:45:13', 2, '2015-05-19 06:45:13', 2, 'dfh674xggbgfxbxvc', '', 0),
(260, 'ghf', 1, '2015-05-14 00:00:00', '2015-05-19 06:59:13', 2, '2015-05-19 06:59:13', 2, 'dfh674xggbgfxbxvcd', 'fddf', 0),
(261, 'ghf', 1, '2015-05-14 00:00:00', '2015-05-19 07:01:05', 2, '2015-05-19 07:01:05', 2, 'dfh674xggbgfxbxvcddg', '', 0),
(262, 'ghf', 5, '2015-05-14 00:00:00', '2015-05-19 07:20:58', 2, '2015-05-19 07:20:58', 2, 'dfh674xggbgfxbxvcddgf', 'd', 0),
(263, 'ghf', 5, '2015-05-14 00:00:00', '2015-05-19 07:26:55', 2, '2015-05-19 07:26:55', 2, 'zzzx', '', 0),
(264, 'ghf', 3, '2015-05-14 00:00:00', '2015-05-19 07:31:25', 2, '2015-05-19 07:31:25', 2, 'zzzxgh', '', 0),
(265, 'ghfv', 4, '2015-05-14 00:00:00', '2015-05-19 07:39:37', 2, '2015-05-19 07:39:37', 2, 'zzzxghv', '', 0),
(266, 'ghfv', 4, '2015-05-14 00:00:00', '2015-05-19 07:40:42', 2, '2015-05-19 07:40:42', 2, 'zzzxghvc', '', 0),
(267, 'cghfv', 2, '2015-05-14 00:00:00', '2015-05-19 07:41:28', 2, '2015-05-19 07:41:28', 2, 'zzzxghcvc', '', 0),
(268, 'cghfv', 4, '2015-05-14 00:00:00', '2015-05-19 07:42:55', 2, '2015-05-19 07:42:55', 2, 'zzzxghcvcj', '', 0),
(269, 'cghfv', 4, '2015-05-19 00:00:00', '2015-05-19 07:44:46', 2, '2015-05-19 07:44:46', 2, 'zzzxghcvcj[', '', 0),
(270, 'cghfvdf', 1, '2015-05-19 00:00:00', '2015-05-19 07:50:19', 2, '2015-05-19 07:50:19', 2, 'zzzxghcvcj[d', 'd', 0),
(271, 'cghfvdfvc', 2, '2015-05-19 00:00:00', '2015-05-19 08:50:17', 2, '2015-05-19 08:50:17', 2, 'zzzxghcvcj[dc', '', 0),
(272, 'cghfvdfvc', 1, '2015-05-19 00:00:00', '2015-05-19 08:51:22', 2, '2015-05-19 08:51:22', 2, 'zzzxghcvcj[dcc', '', 0),
(273, 'cghfvdfvc', 4, '2015-05-19 00:00:00', '2015-05-19 08:54:35', 2, '2015-05-19 08:54:35', 2, 'zzzxghcvcj[ddcc', '', 0),
(274, 'cghfvdfvc', 1, '2015-05-19 00:00:00', '2015-05-19 08:55:43', 2, '2015-05-19 08:55:43', 2, 'xzzzxghcvcj[ddcc', '', 0),
(275, 'cghfvdfvc', 6, '2015-05-19 00:00:00', '2015-05-19 08:57:11', 2, '2015-05-19 08:57:11', 2, 'xzzzxghcvcj[ddcch', '', 0),
(276, 'cghfvdfvc', 4, '2015-05-19 00:00:00', '2015-05-19 08:59:04', 2, '2015-05-19 08:59:04', 2, 'xzzzxghcvcj[ddcchd', '', 0),
(277, 'cghfvdfvcfgd', 4, '2015-05-19 00:00:00', '2015-05-19 09:34:34', 2, '2015-05-19 09:34:34', 2, 'xzzzxghcvcj[ddcchdd', '', 0),
(278, 'cbfghg', 4, '2015-05-19 00:00:00', '2015-05-19 14:40:27', 2, '2015-05-19 14:40:27', 2, 'fghfgh', 'fh', 0),
(279, 'cbfghg', 1, '2015-05-19 00:00:00', '2015-05-19 14:57:10', 2, '2015-05-19 14:57:10', 2, 'fghfghf', '', 0),
(280, 'dgs', 5, '2015-05-05 00:00:00', '2015-05-19 14:58:49', 2, '2015-05-19 14:58:49', 2, 'sddfd', 'd', 0),
(281, 'udemy test', 2, '2015-05-19 00:00:00', '2015-05-19 19:23:44', 2, '2015-05-19 19:23:44', 2, 'KE67373', 'ja', 0),
(282, 'test monday', 1, '2015-05-25 00:00:00', '2015-05-25 05:56:12', 2, '2015-05-25 05:56:12', 2, 'adase3', 'werwer', 0),
(283, 'tyson gaay doping claims tests', 1, '2015-05-25 00:00:00', '2015-05-25 06:09:25', 2, '2015-05-25 06:09:25', 2, 'sddf345', 'scd', 0),
(284, 'y', 4, '2015-05-11 00:00:00', '2015-05-25 06:11:40', 2, '2015-05-25 06:11:40', 2, 'y', 'yy', 0),
(285, 'hulog', 4, '2015-05-25 00:00:00', '2015-05-25 06:18:34', 2, '2015-05-25 06:18:34', 2, 'sddf345ss', 'fgfg', 0),
(286, 'ghfvg', 1, '2015-05-13 00:00:00', '2015-05-25 06:32:32', 2, '2015-05-25 06:32:32', 2, 'ghhr53', 'sfwdf', 0),
(287, 'jkjkkt', 4, '2027-05-15 00:00:00', '2015-05-25 07:26:25', 2, '2015-05-25 07:27:09', 2, 'vb', 'cv', 0),
(288, 'iopio', 5, '2015-05-25 00:00:00', '2015-05-25 07:34:28', 2, '2015-05-25 07:34:28', 2, 'io09', 'iopi', 0),
(289, 'tyson gaay doping claims gf', 4, '2025-05-15 00:00:00', '2015-05-25 08:48:32', 2, '2015-05-25 09:11:04', 2, 'fghfghfff9', 'fggf', 0),
(290, 'uiyiu', 5, '2015-05-27 00:00:00', '2015-05-25 09:31:53', 2, '2015-05-25 09:31:53', 2, 'yiu', 'yuiyu', 0),
(291, 'uiyiu', 4, '2015-05-27 00:00:00', '2015-05-25 09:49:41', 2, '2015-05-25 09:49:41', 2, 'yiu6', 'r', 0),
(292, 'yuyuyu', 4, '2015-05-26 00:00:00', '2015-05-25 09:58:09', 2, '2015-05-25 09:58:09', 2, 'yiuyy', 'yuy', 0),
(293, 'yuyuyu', 4, '2015-05-26 00:00:00', '2015-05-25 10:03:26', 2, '2015-05-25 10:03:26', 2, 'yiuyy4', 'e', 0),
(294, 'Testing Testing 123ff', 2, '2025-05-15 00:00:00', '2015-05-25 11:14:24', 2, '2015-05-25 13:36:56', 2, '456465r', 'FGHFH', 0),
(295, 'ooo', 2, '2026-05-15 00:00:00', '2015-05-25 11:18:37', 2, '2015-05-25 11:18:41', 2, 'ooo', 'o999', 0),
(296, 'yttyu', 2, '2015-05-25 00:00:00', '2015-05-25 11:24:21', 2, '2015-05-25 11:24:21', 2, 'tytyu', 'tu', 0),
(297, 'h', 4, '2025-05-15 00:00:00', '2015-05-25 11:30:43', 2, '2015-05-25 11:31:25', 2, '5', 'ds', 0),
(298, 'dgf', 4, '2025-05-15 00:00:00', '2015-05-25 11:34:15', 2, '2015-05-25 11:34:22', 2, 'dffgx', 'df', 0),
(299, 'GHJ', 4, '2015-05-25 00:00:00', '2015-05-25 13:05:43', 2, '2015-05-25 13:05:43', 2, 'ghGJH', 'GHJGJ', 0),
(300, 'test heritage', 2, '2015-05-12 00:00:00', '2015-05-25 13:17:29', 2, '2015-05-25 13:17:29', 2, 'W456DE', 'W', 0),
(301, 'OKJJ', 5, '2015-05-25 00:00:00', '2015-05-25 13:33:49', 2, '2015-05-25 13:33:49', 2, 'UUJJ', 'JJ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_item_author`
--

CREATE TABLE IF NOT EXISTS `work_item_author` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `author_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `institution_of_affiliation` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `Designation` int(11) DEFAULT NULL,
  `retire` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_item_author`
--

INSERT INTO `work_item_author` (`id`, `author_id`, `work_item_id`, `author_type`, `created_by`, `date_created`, `last_updated_by`, `date_last_updated`, `institution_of_affiliation`, `country`, `Designation`, `retire`) VALUES
(1, 18, 5, 2, 2, '2015-02-19 07:53:12', 2, '2015-02-19 07:53:12', NULL, NULL, NULL, 0),
(2, 2, 5, 1, 2, '2015-02-19 07:53:45', 2, '2015-02-19 07:53:45', NULL, NULL, NULL, 0),
(3, 36, 137, 1, 2, '2015-02-19 08:46:59', 2, '2015-02-19 08:46:59', NULL, NULL, NULL, 0),
(4, 12, 137, 2, 2, '2015-02-19 08:48:49', 2, '2015-02-19 08:48:49', NULL, NULL, NULL, 0),
(5, 3, 6, 2, 2, '2015-02-19 09:48:20', 2, '2015-02-19 09:48:20', NULL, NULL, NULL, 0),
(6, 5, 139, 1, 2, '2015-02-19 11:50:33', 2, '2015-02-19 11:50:33', NULL, NULL, NULL, 0),
(7, 3, 6, 2, 2, '2015-02-20 09:21:42', 2, '2015-02-20 09:21:42', NULL, NULL, NULL, 0),
(8, 2, 14, 2, 2, '2015-02-25 06:43:23', 2, '2015-02-25 06:43:23', NULL, NULL, NULL, 1),
(9, 4, 143, 2, 2, '2015-02-27 07:17:17', 2, '2015-02-27 07:17:17', NULL, NULL, NULL, 0),
(10, 36, 143, 1, 2, '2015-02-27 07:18:30', 2, '2015-02-27 07:18:30', NULL, NULL, NULL, 0),
(11, 36, 143, 1, 2, '2015-02-27 07:18:50', 2, '2015-02-27 07:18:50', NULL, NULL, NULL, 0),
(12, 42, 143, 2, 2, '2015-02-27 07:21:48', 2, '2015-02-27 07:21:48', NULL, NULL, NULL, 0),
(13, 2, 158, 1, 2, '2015-02-27 10:39:30', 2, '2015-02-27 10:39:30', NULL, NULL, NULL, 0),
(14, 3, 155, 1, 2, '2015-02-27 10:43:06', 2, '2015-02-27 10:43:06', NULL, NULL, NULL, 0),
(15, 4, 159, 1, 2, '2015-02-27 10:45:30', 2, '2015-02-27 10:45:30', NULL, NULL, NULL, 0),
(16, 5, 161, 1, 2, '2015-03-02 05:34:32', 2, '2015-03-02 05:34:32', NULL, NULL, NULL, 0),
(17, 5, 162, 1, 2, '2015-03-02 05:45:46', 2, '2015-03-02 05:45:46', NULL, NULL, NULL, 0),
(18, 5, 163, 1, 2, '2015-03-02 06:03:06', 2, '2015-03-02 06:03:06', NULL, NULL, NULL, 0),
(19, 5, 140, 1, 2, '2015-03-02 06:04:09', 2, '2015-03-02 06:04:09', NULL, NULL, NULL, 1),
(20, 5, 140, 1, 2, '2015-03-02 07:59:43', 2, '2015-03-02 07:59:43', NULL, NULL, NULL, 0),
(21, 5, 140, 1, 2, '2015-03-02 09:08:18', 2, '2015-03-02 09:08:18', NULL, NULL, NULL, 1),
(22, 5, 140, 1, 2, '2015-03-02 09:10:55', 2, '2015-03-02 09:10:55', NULL, NULL, NULL, 1),
(23, 5, 140, 1, 2, '2015-03-02 09:11:47', 2, '2015-03-02 09:11:47', NULL, NULL, NULL, 1),
(24, 3, 165, 2, 2, '2015-03-02 11:19:18', 2, '2015-03-02 11:19:18', NULL, NULL, NULL, 0),
(25, 4, 165, 2, 2, '2015-03-02 11:22:42', 2, '2015-03-02 11:22:42', NULL, NULL, NULL, 0),
(26, 18, 165, 1, 2, '2015-03-02 11:23:40', 2, '2015-03-02 11:23:40', NULL, NULL, NULL, 1),
(27, 3, 166, 1, 2, '2015-03-02 11:41:45', 2, '2015-03-02 11:41:45', NULL, NULL, NULL, 0),
(28, 5, 181, 1, 2, '2015-03-03 14:57:49', 2, '2015-03-03 14:57:49', NULL, NULL, NULL, 0),
(29, 5, 181, 1, 2, '2015-03-03 14:58:09', 2, '2015-03-03 14:58:09', NULL, NULL, NULL, 0),
(30, 5, 181, 1, 2, '2015-03-03 15:01:09', 2, '2015-03-03 15:01:09', NULL, NULL, NULL, 0),
(31, 4, 221, 2, 2, '2015-03-05 11:17:57', 2, '2015-03-05 11:17:57', NULL, NULL, NULL, 0),
(32, 4, 233, 1, 2, '2015-05-08 07:34:05', 2, '2015-05-25 13:36:24', 18, 10, 7, 0),
(33, 4, 233, 1, 2, '2015-05-08 07:34:56', 2, '2015-05-08 07:34:56', 18, 6, 7, 1),
(34, 4, 234, 2, 2, '2015-05-08 07:39:04', 2, '2015-05-08 07:39:04', 1, 11, 1, 0),
(35, 4, 234, 2, 2, '2015-05-08 07:46:02', 2, '2015-05-08 07:46:02', 1, 11, 1, 0),
(36, 4, 234, 2, 2, '2015-05-08 08:42:50', 2, '2015-05-08 08:42:50', 1, 11, 1, 0),
(37, 4, 234, 2, 2, '2015-05-08 08:50:40', 2, '2015-05-08 08:50:40', 1, 11, 1, 0),
(38, 4, 234, 2, 2, '2015-05-08 09:05:34', 2, '2015-05-08 09:05:34', 1, 11, 1, 0),
(39, 4, 234, 2, 2, '2015-05-08 09:06:16', 2, '2015-05-08 09:06:16', 1, 11, 1, 0),
(40, 4, 234, 2, 2, '2015-05-08 09:07:29', 2, '2015-05-08 09:07:29', 1, 11, 1, 0),
(41, 4, 234, 2, 2, '2015-05-08 09:08:40', 2, '2015-05-08 09:08:40', 1, 11, 1, 0),
(42, 37, 235, 2, 2, '2015-05-13 05:24:03', 2, '2015-05-13 05:24:03', 3, 13, 7, 0),
(43, 39, 235, 2, 2, '2015-05-13 05:24:56', 2, '2015-05-13 05:24:56', 3, 13, 7, 0),
(44, 39, 235, 2, 2, '2015-05-13 05:35:52', 2, '2015-05-13 05:35:52', 3, 13, 7, 0),
(45, 39, 235, 2, 2, '2015-05-13 05:43:31', 2, '2015-05-13 05:43:31', 3, 13, 7, 0),
(46, 39, 235, 2, 2, '2015-05-13 05:59:15', 2, '2015-05-13 05:59:15', 3, 13, 7, 0),
(47, 39, 235, 2, 2, '2015-05-13 06:10:44', 2, '2015-05-13 06:10:44', 3, 13, 7, 0),
(48, 39, 237, 1, 2, '2015-05-13 09:09:02', 2, '2015-05-13 09:09:02', 19, 193, 2, 0),
(49, 19, 238, 1, 2, '2015-05-13 09:27:33', 2, '2015-05-13 09:27:33', 2, 8, 3, 0),
(50, 19, 238, 1, 2, '2015-05-13 09:28:24', 2, '2015-05-13 09:28:24', 2, 8, 3, 0),
(51, 25, 228, 2, 2, '2015-05-13 10:05:02', 2, '2015-05-13 10:05:02', 18, 8, 2, 0),
(52, 37, 228, 2, 2, '2015-05-13 10:18:13', 2, '2015-05-13 10:18:13', 18, 14, 4, 0),
(53, 16, 228, 1, 2, '2015-05-13 10:18:49', 2, '2015-05-13 10:18:49', 2, 10, 2, 0),
(54, 16, 228, 1, 2, '2015-05-13 11:25:52', 2, '2015-05-13 11:25:52', 2, 10, 2, 0),
(55, 16, 233, 2, 2, '2015-05-13 11:26:56', 2, '2015-05-25 13:36:42', 19, 5, 3, 0),
(57, 35, 233, 2, 2, '2015-05-13 11:43:26', 2, '2015-05-13 11:43:26', 1, 47, 7, 0),
(58, 4, 240, 2, 2, '2015-05-14 05:51:32', 2, '2015-05-14 05:51:32', 3, 15, 4, 0),
(59, 34, 249, 2, 2, '2015-05-14 11:41:49', 2, '2015-05-14 11:41:49', 19, 176, 7, 0),
(60, 34, 249, 2, 2, '2015-05-14 11:49:12', 2, '2015-05-14 11:49:12', 19, 176, 7, 0),
(61, 25, 280, 2, 2, '2015-05-19 15:05:47', 2, '2015-05-19 15:05:47', 4, 12, 3, 0),
(62, 2, 281, 1, 2, '2015-05-19 19:24:51', 2, '2015-05-19 19:24:51', 2, 17, 2, 0),
(63, 2, 281, 2, 2, '2015-05-19 19:37:14', 2, '2015-05-19 19:37:14', 1, 20, 3, 0),
(64, 17, 281, 2, 2, '2015-05-19 19:52:55', 2, '2015-05-19 19:52:55', 4, 17, 1, 0),
(65, 17, 281, 2, 2, '2015-05-19 19:54:29', 2, '2015-05-19 19:54:29', 4, 17, 1, 0),
(66, 17, 281, 2, 2, '2015-05-19 19:55:08', 2, '2015-05-19 19:55:08', 4, 17, 1, 0),
(67, 17, 281, 2, 2, '2015-05-19 19:56:15', 2, '2015-05-19 19:56:15', 4, 17, 1, 0),
(68, 17, 281, 2, 2, '2015-05-19 19:57:50', 2, '2015-05-19 19:57:50', 4, 17, 1, 0),
(69, 2, 282, 1, 2, '2015-05-25 05:57:11', 2, '2015-05-25 05:57:11', 1, 14, 3, 0),
(70, 2, 282, 1, 2, '2015-05-25 05:59:57', 2, '2015-05-25 05:59:57', 1, 14, 3, 0),
(71, 2, 282, 1, 2, '2015-05-25 06:00:23', 2, '2015-05-25 06:00:23', 1, 14, 3, 0),
(72, 2, 282, 1, 2, '2015-05-25 06:02:17', 2, '2015-05-25 06:02:17', 1, 14, 3, 0),
(73, 2, 282, 1, 2, '2015-05-25 06:03:43', 2, '2015-05-25 06:03:43', 1, 14, 3, 0),
(74, 2, 282, 1, 2, '2015-05-25 06:04:18', 2, '2015-05-25 06:04:18', 1, 14, 3, 0),
(75, 16, 283, 1, 2, '2015-05-25 06:09:43', 2, '2015-05-25 06:09:43', 3, 6, 2, 0),
(76, 17, 284, 1, 2, '2015-05-25 06:12:04', 2, '2015-05-25 06:12:04', 16, 50, 2, 0),
(77, 16, 285, 3, 2, '2015-05-25 06:18:54', 2, '2015-05-25 06:18:54', 10, 11, 4, 0),
(78, 16, 288, 2, 2, '2015-05-25 07:35:06', 2, '2015-05-25 07:35:06', 7, 5, 5, 0),
(79, 25, 290, 3, 2, '2015-05-25 09:32:20', 2, '2015-05-25 09:32:20', 19, 11, 7, 0),
(80, 2, 291, 2, 2, '2015-05-25 09:50:33', 2, '2015-05-25 09:50:33', 1, 11, 7, 0),
(81, 4, 293, 3, 2, '2015-05-25 10:07:01', 2, '2015-05-25 10:07:01', 16, 4, 3, 0),
(82, 17, 294, 1, 2, '2015-05-25 11:14:51', 2, '2015-05-25 11:14:51', 16, 21, 1, 0),
(83, 25, 251, 1, 2, '2015-05-25 11:16:47', 2, '2015-05-25 11:16:47', 3, 7, 2, 0),
(84, 17, 299, 1, 2, '2015-05-25 13:06:10', 2, '2015-05-25 13:06:10', 19, 5, 4, 0),
(85, 17, 299, 1, 2, '2015-05-25 13:07:38', 2, '2015-05-25 13:07:38', 19, 5, 4, 0),
(86, 17, 300, 2, 2, '2015-05-25 13:17:40', 2, '2015-05-25 13:17:40', 19, 4, 1, 0),
(87, 17, 251, 2, 2, '2015-05-25 13:29:49', 2, '2015-05-25 13:29:49', 19, 173, 1, 1),
(88, 16, 301, 1, 2, '2015-05-25 13:34:10', 2, '2015-05-25 13:34:10', 13, 8, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_item_author_end_date`
--

CREATE TABLE IF NOT EXISTS `work_item_author_end_date` (
  `id` int(11) NOT NULL,
  `work_item_author_id` int(11) NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_output`
--

CREATE TABLE IF NOT EXISTS `work_item_output` (
  `id` int(11) NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `output_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_relation`
--

CREATE TABLE IF NOT EXISTS `work_item_relation` (
  `relation_id` int(11) NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `related_to` int(11) NOT NULL,
  `relation_type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_item_relation`
--

INSERT INTO `work_item_relation` (`relation_id`, `work_item_id`, `related_to`, `relation_type`) VALUES
(8, 4455654, 10, 1),
(9, 4455654, 197, 1),
(10, 233, 50, 2),
(11, 233, 50, 2),
(12, 233, 50, 2),
(13, 233, 50, 2),
(14, 233, 51, 2),
(15, 233, 51, 2),
(16, 240, 1, 1),
(17, 230, 66, 1),
(18, 230, 28, 1),
(19, 230, 188, 2),
(20, 278, 8, 2),
(21, 279, 21, 2),
(22, 279, 66, 1),
(23, 280, 51, 2),
(24, 280, 51, 2),
(25, 280, 51, 2),
(26, 280, 51, 2),
(27, 280, 51, 2),
(28, 280, 51, 2),
(29, 281, 66, 1),
(30, 281, 31, 1),
(31, 281, 31, 1),
(32, 282, 4, 1),
(33, 282, 31, 1),
(34, 283, 50, 2),
(35, 284, 275, 1),
(36, 285, 50, 1),
(37, 286, 32, 1),
(38, 288, 51, 1),
(39, 290, 7, 1),
(40, 291, 8, 2),
(41, 293, 4, 2),
(42, 250, 6, 1),
(43, 251, 15, 1),
(44, 298, 49, 1),
(45, 299, 5, 1),
(46, 301, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_item_relation_type`
--

CREATE TABLE IF NOT EXISTS `work_item_relation_type` (
  `relation_type_id` int(11) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_item_relation_type`
--

INSERT INTO `work_item_relation_type` (`relation_type_id`, `Description`) VALUES
(1, 'Child'),
(2, 'Parent');

-- --------------------------------------------------------

--
-- Table structure for table `work_item_stage`
--

CREATE TABLE IF NOT EXISTS `work_item_stage` (
  `id` int(11) NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_item_stage`
--

INSERT INTO `work_item_stage` (`id`, `work_item_id`, `stage`, `date_created`, `created_by`, `last_update_date`, `last_update_by`) VALUES
(1, 1, 3, '2014-12-10 11:34:39', 1, '2014-12-10 11:34:39', 1),
(2, 1, 2, '2014-12-10 11:35:11', 1, '2014-12-10 11:35:11', 1),
(3, 1, 2, '2014-12-10 11:50:27', 1, '2014-12-10 11:50:27', 1),
(4, 6, 2, '2015-02-20 06:57:26', 2, '2015-02-20 06:57:26', 2),
(5, 6, 2, '2015-02-20 06:58:19', 2, '2015-02-20 06:58:19', 2),
(6, 6, 2, '2015-02-20 06:58:28', 2, '2015-02-20 06:58:28', 2),
(7, 6, 2, '2015-02-20 06:58:48', 2, '2015-02-20 06:58:48', 2),
(8, 6, 2, '2015-02-20 06:59:27', 2, '2015-02-20 06:59:27', 2),
(9, 6, 2, '2015-02-20 07:00:15', 2, '2015-02-20 07:00:15', 2),
(10, 6, 2, '2015-02-20 07:10:04', 2, '2015-02-20 07:10:04', 2),
(11, 6, 2, '2015-02-20 07:11:39', 2, '2015-02-20 07:11:39', 2),
(12, 6, 2, '2015-02-20 07:37:52', 2, '2015-02-20 07:37:52', 2),
(13, 6, 2, '2015-02-20 08:08:59', 2, '2015-02-20 08:08:59', 2),
(14, 6, 2, '2015-02-20 08:09:31', 2, '2015-02-20 08:09:31', 2),
(15, 6, 2, '2015-02-20 08:10:07', 2, '2015-02-20 08:10:07', 2),
(16, 6, 2, '2015-02-20 08:10:32', 2, '2015-02-20 08:10:32', 2),
(17, 6, 2, '2015-02-20 08:25:40', 2, '2015-02-20 08:25:40', 2),
(18, 6, 2, '2015-02-20 08:26:33', 2, '2015-02-20 08:26:33', 2),
(19, 6, 2, '2015-02-20 08:28:12', 2, '2015-02-20 08:28:12', 2),
(20, 6, 2, '2015-02-20 08:28:57', 2, '2015-02-20 08:28:57', 2),
(21, 6, 2, '2015-02-20 08:32:14', 2, '2015-02-20 08:32:14', 2),
(22, 6, 2, '2015-02-20 08:33:24', 2, '2015-02-20 08:33:24', 2),
(23, 6, 2, '2015-02-20 08:34:28', 2, '2015-02-20 08:34:28', 2),
(24, 6, 2, '2015-02-20 08:37:22', 2, '2015-02-20 08:37:22', 2),
(25, 6, 2, '2015-02-20 08:43:00', 2, '2015-02-20 08:43:00', 2),
(26, 6, 2, '2015-02-20 08:44:34', 2, '2015-02-20 08:44:34', 2),
(27, 6, 2, '2015-02-20 08:45:35', 2, '2015-02-20 08:45:35', 2),
(28, 6, 2, '2015-02-20 08:47:18', 2, '2015-02-20 08:47:18', 2),
(29, 6, 2, '2015-02-20 08:47:52', 2, '2015-02-20 08:47:52', 2),
(30, 6, 2, '2015-02-20 08:48:14', 2, '2015-02-20 08:48:14', 2),
(31, 6, 2, '2015-02-20 08:48:42', 2, '2015-02-20 08:48:42', 2),
(32, 6, 2, '2015-02-20 08:49:09', 2, '2015-02-20 08:49:09', 2),
(33, 6, 2, '2015-02-20 08:52:20', 2, '2015-02-20 08:52:20', 2),
(34, 6, 2, '2015-02-20 08:53:06', 2, '2015-02-20 08:53:06', 2),
(35, 6, 2, '2015-02-20 08:56:15', 2, '2015-02-20 08:56:15', 2),
(36, 6, 2, '2015-02-20 08:56:32', 2, '2015-02-20 08:56:32', 2),
(37, 6, 2, '2015-02-20 08:58:48', 2, '2015-02-20 08:58:48', 2),
(38, 6, 2, '2015-02-20 08:59:37', 2, '2015-02-20 08:59:37', 2),
(39, 6, 2, '2015-02-20 09:00:06', 2, '2015-02-20 09:00:06', 2),
(40, 6, 2, '2015-02-20 09:00:22', 2, '2015-02-20 09:00:22', 2),
(41, 6, 2, '2015-02-20 09:01:28', 2, '2015-02-20 09:01:28', 2),
(42, 6, 2, '2015-02-20 09:05:48', 2, '2015-02-20 09:05:48', 2),
(43, 6, 2, '2015-02-20 09:06:19', 2, '2015-02-20 09:06:19', 2),
(44, 6, 2, '2015-02-20 09:06:56', 2, '2015-02-20 09:06:56', 2),
(45, 6, 2, '2015-02-20 09:07:24', 2, '2015-02-20 09:07:24', 2),
(46, 6, 2, '2015-02-20 09:08:52', 2, '2015-02-20 09:08:52', 2),
(47, 6, 2, '2015-02-20 09:12:26', 2, '2015-02-20 09:12:26', 2),
(48, 6, 2, '2015-02-20 09:15:45', 2, '2015-02-20 09:15:45', 2),
(49, 6, 2, '2015-02-20 09:19:48', 2, '2015-02-20 09:19:48', 2),
(50, 137, 2, '2015-02-20 09:33:07', 2, '2015-02-20 09:33:07', 2),
(51, 137, 2, '2015-02-20 09:40:17', 2, '2015-02-20 09:40:17', 2),
(52, 142, 2, '2015-02-24 07:15:36', 2, '2015-02-24 07:15:36', 2),
(53, 142, 2, '2015-02-24 07:31:40', 2, '2015-02-24 07:31:40', 2),
(54, 142, 3, '2015-02-24 07:33:32', 2, '2015-02-24 07:33:32', 2),
(55, 138, 3, '2015-02-24 07:40:11', 2, '2015-02-24 07:40:11', 2),
(56, 138, 3, '2015-02-24 07:49:25', 2, '2015-02-24 07:49:25', 2),
(57, 137, 3, '2015-02-24 08:33:29', 2, '2015-02-24 08:33:29', 2),
(58, 137, 3, '2015-02-24 09:01:58', 2, '2015-02-24 09:01:58', 2),
(59, 137, 4, '2015-02-24 09:03:02', 2, '2015-02-24 09:03:02', 2),
(60, 137, 2, '2015-02-24 09:04:02', 2, '2015-02-24 09:04:02', 2),
(61, 137, 2, '2015-02-24 09:45:14', 2, '2015-02-24 09:45:14', 2),
(62, 137, 2, '2015-02-24 09:47:12', 2, '2015-02-24 09:47:12', 2),
(63, 137, 2, '2015-02-24 09:48:23', 2, '2015-02-24 09:48:23', 2),
(64, 137, 2, '2015-02-24 09:48:59', 2, '2015-02-24 09:48:59', 2),
(65, 137, 2, '2015-02-24 09:51:27', 2, '2015-02-24 09:51:27', 2),
(66, 6, 2, '2015-02-24 09:59:35', 2, '2015-02-24 09:59:35', 2),
(67, 6, 2, '2015-02-24 11:42:21', 2, '2015-02-24 11:42:21', 2),
(68, 6, 2, '2015-02-24 11:42:33', 2, '2015-02-24 11:42:33', 2),
(69, 6, 3, '2015-02-24 11:44:19', 2, '2015-02-24 11:44:19', 2),
(70, 6, 3, '2015-02-24 12:06:21', 2, '2015-02-24 12:06:21', 2),
(71, 12, 3, '2015-02-24 12:28:11', 2, '2015-02-24 12:28:11', 2),
(72, 12, 3, '2015-02-24 12:31:37', 2, '2015-02-24 12:31:37', 2),
(73, 12, 3, '2015-02-24 12:32:32', 2, '2015-02-24 12:32:32', 2),
(74, 12, 3, '2015-02-24 12:57:55', 2, '2015-02-24 12:57:55', 2),
(75, 12, 3, '2015-02-24 13:10:09', 2, '2015-02-24 13:10:09', 2),
(76, 12, 3, '2015-02-24 13:11:04', 2, '2015-02-24 13:11:04', 2),
(77, 12, 3, '2015-02-24 13:12:37', 2, '2015-02-24 13:12:37', 2),
(78, 6, 2, '2015-02-25 06:30:55', 2, '2015-02-25 06:30:55', 2),
(79, 6, 4, '2015-02-25 06:31:39', 2, '2015-02-25 06:31:39', 2),
(80, 137, 3, '2015-02-25 06:33:54', 2, '2015-02-25 06:33:54', 2),
(81, 137, 3, '2015-02-25 06:34:36', 2, '2015-02-25 06:34:36', 2),
(82, 14, 3, '2015-02-25 06:36:21', 2, '2015-02-25 06:36:21', 2),
(83, 143, 7, '2015-02-27 07:46:40', 2, '2015-02-27 07:46:40', 2),
(84, 143, 3, '2015-02-27 07:51:15', 2, '2015-02-27 07:51:15', 2),
(85, 162, 2, '2015-03-02 05:46:04', 2, '2015-03-02 05:46:04', 2),
(86, 162, 4, '2015-03-02 05:46:36', 2, '2015-03-02 05:46:36', 2),
(87, 163, 3, '2015-03-02 06:03:26', 2, '2015-03-02 06:03:26', 2),
(88, 165, 2, '2015-03-02 11:19:34', 2, '2015-03-02 11:19:34', 2),
(89, 165, 6, '2015-03-02 11:20:15', 2, '2015-03-02 11:20:15', 2),
(90, 166, 4, '2015-03-02 11:44:41', 2, '2015-03-02 11:44:41', 2),
(91, 166, 6, '2015-03-02 11:47:07', 2, '2015-03-02 11:47:07', 2),
(92, 182, 4, '2015-03-05 07:17:02', 2, '2015-03-05 07:17:02', 2),
(93, 233, 3, '2015-05-08 07:35:38', 2, '2015-05-08 07:35:38', 2),
(94, 233, 3, '2015-05-08 07:36:05', 2, '2015-05-08 07:36:05', 2),
(95, 233, 3, '2015-05-08 07:37:38', 2, '2015-05-08 07:37:38', 2),
(96, 233, 3, '2015-05-08 07:38:39', 2, '2015-05-08 07:38:39', 2),
(97, 228, 3, '2015-05-08 09:27:22', 2, '2015-05-08 09:27:22', 2),
(98, 228, 6, '2015-05-08 09:30:46', 2, '2015-05-08 09:30:46', 2),
(99, 235, 3, '2015-05-13 06:15:23', 2, '2015-05-13 06:15:23', 2),
(100, 235, 3, '2015-05-13 06:22:52', 2, '2015-05-13 06:22:52', 2),
(101, 235, 3, '2015-05-13 06:26:06', 2, '2015-05-13 06:26:06', 2),
(102, 235, 3, '2015-05-13 06:26:39', 2, '2015-05-13 06:26:39', 2),
(103, 235, 3, '2015-05-13 06:27:57', 2, '2015-05-13 06:27:57', 2),
(104, 235, 3, '2015-05-13 06:30:00', 2, '2015-05-13 06:30:00', 2),
(105, 235, 5, '2015-05-13 06:31:27', 2, '2015-05-13 06:31:27', 2),
(106, 235, 5, '2015-05-13 06:45:25', 2, '2015-05-13 06:45:25', 2),
(107, 235, 5, '2015-05-13 06:45:39', 2, '2015-05-13 06:45:39', 2),
(108, 235, 5, '2015-05-13 07:03:39', 2, '2015-05-13 07:03:39', 2),
(109, 235, 5, '2015-05-13 07:03:45', 2, '2015-05-13 07:03:45', 2),
(110, 235, 3, '2015-05-13 07:03:53', 2, '2015-05-13 07:03:53', 2),
(113, 235, 3, '2015-05-13 07:31:52', 2, '2015-05-13 07:31:52', 2),
(114, 235, 4, '2015-05-13 08:57:51', 2, '2015-05-13 08:57:51', 2),
(115, 237, 2, '2015-05-13 09:09:24', 2, '2015-05-13 09:09:24', 2),
(116, 237, 2, '2015-05-13 09:12:13', 2, '2015-05-13 09:12:13', 2),
(117, 238, 5, '2015-05-13 09:27:55', 2, '2015-05-13 09:27:55', 2),
(118, 238, 5, '2015-05-13 09:28:15', 2, '2015-05-13 09:28:15', 2),
(119, 238, 6, '2015-05-13 09:28:36', 2, '2015-05-13 09:28:36', 2),
(120, 238, 6, '2015-05-13 09:29:47', 2, '2015-05-13 09:29:47', 2),
(121, 249, 3, '2015-05-14 13:22:19', 2, '2015-05-14 13:22:19', 2),
(122, 249, 2, '2015-05-14 13:23:20', 2, '2015-05-14 13:23:20', 2),
(129, 284, 4, '2015-05-25 06:18:08', 2, '2015-05-25 06:18:08', 2),
(130, 285, 2, '2015-05-25 06:19:06', 2, '2015-05-25 06:19:06', 2),
(131, 285, 2, '2015-05-25 06:20:22', 2, '2015-05-25 06:20:22', 2),
(132, 285, 2, '2015-05-25 06:21:02', 2, '2015-05-25 06:21:02', 2),
(133, 285, 2, '2015-05-25 06:22:03', 2, '2015-05-25 06:22:03', 2),
(134, 285, 2, '2015-05-25 06:22:27', 2, '2015-05-25 06:22:27', 2),
(135, 285, 2, '2015-05-25 06:22:50', 2, '2015-05-25 06:22:50', 2),
(136, 285, 2, '2015-05-25 06:23:29', 2, '2015-05-25 06:23:29', 2),
(137, 285, 2, '2015-05-25 06:23:38', 2, '2015-05-25 06:23:38', 2),
(138, 285, 2, '2015-05-25 06:24:11', 2, '2015-05-25 06:24:11', 2),
(139, 285, 2, '2015-05-25 06:24:37', 2, '2015-05-25 06:24:37', 2),
(140, 285, 2, '2015-05-25 06:30:47', 2, '2015-05-25 06:30:47', 2),
(141, 285, 2, '2015-05-25 06:31:17', 2, '2015-05-25 06:31:17', 2),
(142, 290, 3, '2015-05-25 09:32:33', 2, '2015-05-25 09:32:33', 2),
(143, 291, 3, '2015-05-25 09:50:46', 2, '2015-05-25 09:50:46', 2),
(144, 293, 3, '2015-05-25 10:07:19', 2, '2015-05-25 10:07:19', 2),
(145, 294, 5, '2015-05-25 11:15:08', 2, '2015-05-25 11:15:08', 2),
(146, 251, 3, '2015-05-25 11:17:41', 2, '2015-05-25 11:17:41', 2),
(147, 299, 6, '2015-05-25 13:07:55', 2, '2015-05-25 13:07:55', 2),
(148, 300, 3, '2015-05-25 13:17:53', 2, '2015-05-25 13:17:53', 2),
(149, 251, 4, '2015-05-25 13:30:24', 2, '2015-05-25 13:30:24', 2),
(150, 301, 4, '2015-05-25 13:34:21', 2, '2015-05-25 13:34:21', 2),
(151, 233, 3, '2015-05-26 07:23:07', 2, '2015-05-26 07:23:07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `work_item_stage_output`
--

CREATE TABLE IF NOT EXISTS `work_item_stage_output` (
  `id` int(11) NOT NULL,
  `work_item_stage` int(11) NOT NULL,
  `user_remarks` varchar(150) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `document` int(11) NOT NULL,
  `voided` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_item_stage_output`
--

INSERT INTO `work_item_stage_output` (`id`, `work_item_stage`, `user_remarks`, `created_by`, `date_created`, `last_updated_by`, `last_update_date`, `document`, `voided`) VALUES
(21, 74, '0', 2, '2015-02-24 12:57:55', 2, '2015-02-24 12:57:55', 52, 0),
(22, 78, '0', 2, '2015-02-25 06:30:55', 2, '2015-02-25 06:30:55', 53, 0),
(23, 79, '0', 2, '2015-02-25 06:31:39', 2, '2015-02-25 06:31:39', 54, 0),
(24, 81, '0', 2, '2015-02-25 06:34:36', 2, '2015-02-25 06:34:36', 55, 0),
(25, 82, '0', 2, '2015-02-25 06:36:21', 2, '2015-02-25 06:36:21', 56, 0),
(26, 83, '0', 2, '2015-02-27 07:46:40', 2, '2015-02-27 07:46:40', 57, 0),
(27, 84, '0', 2, '2015-02-27 07:51:15', 2, '2015-02-27 07:51:15', 58, 0),
(28, 85, '0', 2, '2015-03-02 05:46:04', 2, '2015-03-02 05:46:04', 59, 0),
(29, 86, '0', 2, '2015-03-02 05:46:36', 2, '2015-03-02 05:46:36', 60, 0),
(30, 87, '0', 2, '2015-03-02 06:03:26', 2, '2015-03-02 06:03:26', 61, 0),
(31, 88, '0', 2, '2015-03-02 11:19:35', 2, '2015-03-02 11:19:35', 62, 0),
(32, 89, '0', 2, '2015-03-02 11:20:15', 2, '2015-03-02 11:20:15', 63, 0),
(33, 91, '0', 2, '2015-03-02 11:47:07', 2, '2015-03-02 11:47:07', 64, 0),
(34, 92, '0', 2, '2015-03-05 07:17:02', 2, '2015-03-05 07:17:02', 65, 0),
(35, 110, '0', 2, '2015-05-13 07:03:53', 2, '2015-05-13 07:03:53', 66, 0),
(36, 114, '0', 2, '2015-05-13 08:57:51', 2, '2015-05-13 08:57:51', 67, 0),
(37, 116, '0', 2, '2015-05-13 09:12:14', 2, '2015-05-13 09:12:14', 68, 0),
(38, 120, '0', 2, '2015-05-13 09:29:47', 2, '2015-05-13 09:29:47', 69, 0),
(39, 139, '0', 2, '2015-05-25 06:24:37', 2, '2015-05-25 06:24:37', 70, 0),
(40, 140, '0', 2, '2015-05-25 06:30:47', 2, '2015-05-25 06:30:47', 71, 0),
(41, 141, '0', 2, '2015-05-25 06:31:17', 2, '2015-05-25 06:31:17', 72, 0),
(42, 142, '0', 2, '2015-05-25 09:32:33', 2, '2015-05-25 09:32:33', 73, 0),
(43, 143, '0', 2, '2015-05-25 09:50:46', 2, '2015-05-25 09:50:46', 74, 0),
(44, 144, '0', 2, '2015-05-25 10:07:19', 2, '2015-05-25 10:07:19', 75, 0),
(45, 145, '0', 2, '2015-05-25 11:15:08', 2, '2015-05-25 11:15:08', 76, 0),
(46, 146, '0', 2, '2015-05-25 11:17:41', 2, '2015-05-25 11:17:41', 77, 0),
(47, 147, '0', 2, '2015-05-25 13:07:56', 2, '2015-05-25 13:07:56', 78, 0),
(48, 148, '0', 2, '2015-05-25 13:17:53', 2, '2015-05-25 13:17:53', 79, 0),
(49, 149, '0', 2, '2015-05-25 13:30:24', 2, '2015-05-25 13:30:24', 80, 0),
(50, 150, '0', 2, '2015-05-25 13:34:21', 2, '2015-05-25 13:34:21', 81, 0),
(51, 151, '0', 2, '2015-05-26 07:23:07', 2, '2015-05-26 07:23:07', 82, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_item_stage_output_assignment`
--

CREATE TABLE IF NOT EXISTS `work_item_stage_output_assignment` (
  `id` int(11) NOT NULL,
  `work_item_stage_output_id` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `date_assigned` datetime NOT NULL,
  `date_expected_back` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_item_stage_output_assignment`
--

INSERT INTO `work_item_stage_output_assignment` (`id`, `work_item_stage_output_id`, `assigned_to`, `date_assigned`, `date_expected_back`, `created_by`, `date_created`, `last_updated_by`, `date_last_updated`) VALUES
(1, 23, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 17:27:53', 2, '2015-02-25 17:27:53'),
(2, 23, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 17:30:46', 2, '2015-02-25 17:30:46'),
(3, 23, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 17:37:26', 2, '2015-02-25 17:37:26'),
(4, 23, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 17:42:56', 2, '2015-02-25 17:42:56'),
(5, 23, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 17:46:26', 2, '2015-02-25 17:46:26'),
(6, 23, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 17:48:04', 2, '2015-02-25 17:48:04'),
(7, 23, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 17:49:22', 2, '2015-02-25 17:49:22'),
(8, 23, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 17:49:50', 2, '2015-02-25 17:49:50'),
(9, 23, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 17:53:07', 2, '2015-02-25 17:53:07'),
(10, 25, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-25 20:18:45', 2, '2015-02-25 20:18:45'),
(11, 26, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-02-27 07:47:14', 2, '2015-02-27 07:47:14'),
(12, 32, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, '2015-03-02 11:20:42', 2, '2015-03-02 11:20:42'),
(13, 51, 2, '2015-05-26 00:00:00', '2015-05-26 00:00:00', 2, '2015-05-26 07:23:20', 2, '2015-05-26 07:23:20');

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
  `date_last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work_item_status`
--

CREATE TABLE IF NOT EXISTS `work_item_status` (
  `id` int(11) NOT NULL,
  `work_item_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  `work_type_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`work_type_id`, `description`) VALUES
(2, 'Abstract'),
(4, 'Concept Sheet'),
(1, 'Manuscript'),
(5, 'Poster'),
(6, 'Presentation'),
(3, 'Protocol');

-- --------------------------------------------------------

--
-- Table structure for table `work_type_paret_child_relation`
--

CREATE TABLE IF NOT EXISTS `work_type_paret_child_relation` (
  `id` int(11) NOT NULL,
  `parent_type` int(11) NOT NULL,
  `child_type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_type_paret_child_relation`
--

INSERT INTO `work_type_paret_child_relation` (`id`, `parent_type`, `child_type`) VALUES
(1, 1, 6),
(2, 1, 5),
(3, 3, 2),
(4, 3, 6),
(5, 3, 4),
(6, 2, 3),
(7, 2, 6),
(8, 2, 5),
(10, 4, 2),
(11, 4, 1),
(12, 4, 6),
(13, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `work_type_stage`
--

CREATE TABLE IF NOT EXISTS `work_type_stage` (
  `id` int(11) NOT NULL,
  `work_type` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `last_updated_by` int(11) NOT NULL,
  `date_last_updated` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_request`
--
ALTER TABLE `action_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aproval_stage`
--
ALTER TABLE `aproval_stage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`), ADD KEY `FK_author_staff` (`staff_id`), ADD KEY `FK_author_users` (`created_by`), ADD KEY `FK_author_users1` (`last_updated_by`);

--
-- Indexes for table `author_type`
--
ALTER TABLE `author_type`
  ADD PRIMARY KEY (`author_type_id`);

--
-- Indexes for table `contact_type`
--
ALTER TABLE `contact_type`
  ADD PRIMARY KEY (`contact_type_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`), ADD KEY `FK_documents_work_item` (`work_item_id`);

--
-- Indexes for table `document_file_path`
--
ALTER TABLE `document_file_path`
  ADD PRIMARY KEY (`document_path_id`), ADD KEY `FK_document_file_path_documents` (`document_id`);

--
-- Indexes for table `document_submission`
--
ALTER TABLE `document_submission`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_document_submission_documents` (`document_id`), ADD KEY `FK_document_submission_submission_type` (`submission_type`);

--
-- Indexes for table `label_for_worlk_item_crucial_dates_caption`
--
ALTER TABLE `label_for_worlk_item_crucial_dates_caption`
  ADD PRIMARY KEY (`caption_id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`organisation_id`);

--
-- Indexes for table `output`
--
ALTER TABLE `output`
  ADD PRIMARY KEY (`output_id`), ADD KEY `FK_output_country` (`country`), ADD KEY `FK_output_output_type` (`output_type`), ADD KEY `FK_output_users` (`created_by`), ADD KEY `FK_output_users1` (`last_update_by`);

--
-- Indexes for table `output_type`
--
ALTER TABLE `output_type`
  ADD PRIMARY KEY (`output_type_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reason_for_submission`
--
ALTER TABLE `reason_for_submission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`right_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_right`
--
ALTER TABLE `role_right`
  ADD PRIMARY KEY (`role_right_id`), ADD KEY `FK_role_right_rights` (`right_id`), ADD KEY `FK_role_right_roles` (`role_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`), ADD KEY `FK_staff_Designation` (`designation_id`), ADD KEY `FK_staff_Program` (`program`), ADD KEY `FK_staff_Station` (`station_id`), ADD KEY `FK_staff_users` (`updated_by`), ADD KEY `FK_staff_users1` (`created_by`);

--
-- Indexes for table `staff_contact`
--
ALTER TABLE `staff_contact`
  ADD PRIMARY KEY (`contact_id`), ADD KEY `FK_staff_contact_contact_type` (`contact_type`), ADD KEY `FK_staff_contact_staff` (`staff_id`);

--
-- Indexes for table `staff_title`
--
ALTER TABLE `staff_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`stage_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `submission_from`
--
ALTER TABLE `submission_from`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_sumission_from_document_submission` (`submission_id`), ADD KEY `FK_sumission_from_users` (`created_by`), ADD KEY `FK_sumission_from_users1` (`last_updated_by`);

--
-- Indexes for table `submission_to`
--
ALTER TABLE `submission_to`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_submission_to_sumission_from` (`submission_from_id`);

--
-- Indexes for table `submission_type`
--
ALTER TABLE `submission_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploaded_document`
--
ALTER TABLE `uploaded_document`
  ADD PRIMARY KEY (`upload_document_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`), ADD KEY `FK_users_staff` (`staff_id`);

--
-- Indexes for table `work_item`
--
ALTER TABLE `work_item`
  ADD PRIMARY KEY (`work_item_id`), ADD KEY `FK_work_item_users` (`created_by`), ADD KEY `FK_work_item_users1` (`last_updated_by`), ADD KEY `FK_work_item_work_type` (`work_type`), ADD KEY `WIndex` (`description`);

--
-- Indexes for table `work_item_author`
--
ALTER TABLE `work_item_author`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_work_item_author_author` (`author_id`), ADD KEY `FK_work_item_author_work_item` (`work_item_id`), ADD KEY `author_type` (`author_type`);

--
-- Indexes for table `work_item_author_end_date`
--
ALTER TABLE `work_item_author_end_date`
  ADD PRIMARY KEY (`id`), ADD KEY `work_item_author_id` (`work_item_author_id`);

--
-- Indexes for table `work_item_output`
--
ALTER TABLE `work_item_output`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_work_item_output_work_item` (`work_item_id`), ADD KEY `FK_work_item_output_output` (`output_id`);

--
-- Indexes for table `work_item_relation`
--
ALTER TABLE `work_item_relation`
  ADD PRIMARY KEY (`relation_id`);

--
-- Indexes for table `work_item_relation_type`
--
ALTER TABLE `work_item_relation_type`
  ADD PRIMARY KEY (`relation_type_id`);

--
-- Indexes for table `work_item_stage`
--
ALTER TABLE `work_item_stage`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_work_item_stage_work_item` (`work_item_id`), ADD KEY `FK_work_item_stage_stage` (`stage`);

--
-- Indexes for table `work_item_stage_output`
--
ALTER TABLE `work_item_stage_output`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_item_stage_output_assignment`
--
ALTER TABLE `work_item_stage_output_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_item_stage_status`
--
ALTER TABLE `work_item_stage_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_item_status`
--
ALTER TABLE `work_item_status`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_work_item_status_status` (`status`);

--
-- Indexes for table `work_type`
--
ALTER TABLE `work_type`
  ADD PRIMARY KEY (`work_type_id`), ADD UNIQUE KEY `description` (`description`), ADD UNIQUE KEY `uc_description` (`description`);

--
-- Indexes for table `work_type_paret_child_relation`
--
ALTER TABLE `work_type_paret_child_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_type_stage`
--
ALTER TABLE `work_type_stage`
  ADD PRIMARY KEY (`id`), ADD KEY `FK_work_type_stage_work_type` (`work_type`), ADD KEY `FK_work_type_stage_stage` (`stage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_request`
--
ALTER TABLE `action_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `aproval_stage`
--
ALTER TABLE `aproval_stage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `author_type`
--
ALTER TABLE `author_type`
  MODIFY `author_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
  MODIFY `contact_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document_file_path`
--
ALTER TABLE `document_file_path`
  MODIFY `document_path_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document_submission`
--
ALTER TABLE `document_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `label_for_worlk_item_crucial_dates_caption`
--
ALTER TABLE `label_for_worlk_item_crucial_dates_caption`
  MODIFY `caption_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `organisation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `output`
--
ALTER TABLE `output`
  MODIFY `output_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `output_type`
--
ALTER TABLE `output_type`
  MODIFY `output_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reason_for_submission`
--
ALTER TABLE `reason_for_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `right_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_right`
--
ALTER TABLE `role_right`
  MODIFY `role_right_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `staff_contact`
--
ALTER TABLE `staff_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `staff_title`
--
ALTER TABLE `staff_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `stage_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `submission_from`
--
ALTER TABLE `submission_from`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `submission_to`
--
ALTER TABLE `submission_to`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `submission_type`
--
ALTER TABLE `submission_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uploaded_document`
--
ALTER TABLE `uploaded_document`
  MODIFY `upload_document_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `work_item`
--
ALTER TABLE `work_item`
  MODIFY `work_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=302;
--
-- AUTO_INCREMENT for table `work_item_author`
--
ALTER TABLE `work_item_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `work_item_author_end_date`
--
ALTER TABLE `work_item_author_end_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_item_output`
--
ALTER TABLE `work_item_output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_item_relation`
--
ALTER TABLE `work_item_relation`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `work_item_relation_type`
--
ALTER TABLE `work_item_relation_type`
  MODIFY `relation_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `work_item_stage`
--
ALTER TABLE `work_item_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `work_item_stage_output`
--
ALTER TABLE `work_item_stage_output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `work_item_stage_output_assignment`
--
ALTER TABLE `work_item_stage_output_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `work_item_status`
--
ALTER TABLE `work_item_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `work_type`
--
ALTER TABLE `work_type`
  MODIFY `work_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `work_type_paret_child_relation`
--
ALTER TABLE `work_type_paret_child_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `work_type_stage`
--
ALTER TABLE `work_type_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
