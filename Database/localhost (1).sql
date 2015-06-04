-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 02, 2014 at 03:44 AM
-- Server version: 5.0.41
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `teacher information system`
-- 
CREATE DATABASE `teacher information system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teacher information system`;

-- --------------------------------------------------------

-- 
-- Table structure for table `activity_type`
-- 

CREATE TABLE `activity_type` (
  `activity_type_id` int(10) NOT NULL auto_increment,
  `activity_type` varchar(255) NOT NULL,
  PRIMARY KEY  (`activity_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `activity_type`
-- 

INSERT INTO `activity_type` (`activity_type_id`, `activity_type`) VALUES 
(1, 'Professional Body Membership'),
(2, 'Social Body Membership');

-- --------------------------------------------------------

-- 
-- Table structure for table `award`
-- 

CREATE TABLE `award` (
  `award_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `award_name` varchar(55) NOT NULL,
  `award_for_activity` varchar(55) NOT NULL,
  `award_amount` int(7) default NULL,
  `event_title` varchar(255) NOT NULL,
  `event_type_id` int(10) NOT NULL,
  `event_level_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `organized_by` varchar(55) NOT NULL,
  `sponsored_by` varchar(55) default NULL,
  `location` varchar(1000) NOT NULL,
  PRIMARY KEY  (`award_id`),
  KEY `employee_id` (`employee_id`),
  KEY `event_type_id` (`event_type_id`),
  KEY `event_level_id` (`event_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `award`
-- 

INSERT INTO `award` (`award_id`, `employee_id`, `award_name`, `award_for_activity`, `award_amount`, `event_title`, `event_type_id`, `event_level_id`, `date`, `organized_by`, `sponsored_by`, `location`) VALUES 
(1, 1, 'Best Paper Award', 'Present Paper', NULL, ' ETA – 2005', 4, 4, '2005-05-01', ' ETA – 2005', NULL, 'Rajkot'),
(2, 1, 'Best Paper Award', 'Present Paper', NULL, 'Tech Symposia - 2006', 4, 4, '2006-01-01', 'Tech Symposia - 2006', NULL, 'Anand'),
(3, 1, 'Second Best Research Paper Award', 'Research Project', NULL, 'NCIIRP – 2006', 4, 4, '2006-01-05', 'NCIIRP – 2006', NULL, 'Bardoli'),
(4, 1, 'Reviewed several research papers', 'Research Paper', NULL, 'Reviewed several research papers for national conferences organized by GCET', 4, 4, '2010-01-01', 'ADIT and BVM', NULL, 'Anand'),
(5, 2, 'Best Paper Award', 'Present Paper', 10000, 'Orientation Programme', 2, 5, '2011-05-01', 'Academic Staff College, S. P. Uni.', 'UGC', 'V.V. nagar');

-- --------------------------------------------------------

-- 
-- Table structure for table `contact_type`
-- 

CREATE TABLE `contact_type` (
  `contact_type_id` int(10) NOT NULL auto_increment,
  `type` varchar(55) NOT NULL,
  PRIMARY KEY  (`contact_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `contact_type`
-- 

INSERT INTO `contact_type` (`contact_type_id`, `type`) VALUES 
(1, 'E-Mail'),
(2, 'Cell'),
(3, 'Landline'),
(4, 'Website URL');

-- --------------------------------------------------------

-- 
-- Table structure for table `degree`
-- 

CREATE TABLE `degree` (
  `degree_id` int(10) NOT NULL auto_increment,
  `degree_name` varchar(55) NOT NULL,
  PRIMARY KEY  (`degree_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `degree`
-- 

INSERT INTO `degree` (`degree_id`, `degree_name`) VALUES 
(1, 'SSC'),
(2, 'HSC'),
(3, 'BCA'),
(4, 'MCA'),
(5, 'Msc.IT'),
(6, 'Ph.D'),
(7, 'B.Sc.It'),
(8, 'B.Sc.'),
(9, 'PGDBA'),
(10, 'DLP'),
(11, 'Ph.D.'),
(12, 'B.Sc. Mathemation'),
(13, 'M. Phil');

-- --------------------------------------------------------

-- 
-- Table structure for table `delivered_lectures`
-- 

CREATE TABLE `delivered_lectures` (
  `delivered_lectures_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `lecture_subject` varchar(55) NOT NULL,
  `event_title` varchar(55) default NULL,
  `event_type_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `organized_by` varchar(55) NOT NULL,
  `sponsored_by` varchar(55) default NULL,
  `event_level_id` int(10) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `API_score` varchar(2) default NULL,
  PRIMARY KEY  (`delivered_lectures_id`),
  KEY `employee_id` (`employee_id`),
  KEY `event_type_id` (`event_type_id`),
  KEY `event_level_id` (`event_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `delivered_lectures`
-- 

INSERT INTO `delivered_lectures` (`delivered_lectures_id`, `employee_id`, `lecture_subject`, `event_title`, `event_type_id`, `date`, `organized_by`, `sponsored_by`, `event_level_id`, `location`, `API_score`) VALUES 
(1, 1, 'Computer Software', 'Orientation Programme', 2, '2010-02-01', 'Academic Staff College, S. P. Uni.', NULL, 4, 'V.V. nagar', '5'),
(2, 1, 'Computer Software', 'Orientation Programme', 2, '2010-05-25', 'Academic Staff College, S. P. Uni.', NULL, 4, ' V. V. Nagar', '5'),
(3, 1, 'Computer Software', 'Orientation Programme', 2, '2010-05-26', 'Academic Staff College, S. P. Uni.', NULL, 4, 'V.V. nagar', '5'),
(4, 1, 'Computer Software', 'Orientation Programme', 2, '2010-05-26', 'Academic Staff College, S. P. Uni.', NULL, 4, 'V.V. Nagar', '5'),
(5, 1, 'Microsoft Word', 'Orientation Programme', 2, '2010-05-31', 'Academic Staff College, S. P. Uni.', NULL, 4, 'V.V. nagar', '5'),
(6, 1, 'Microsoft Word', 'Orientation Programme', 2, '2010-05-31', 'Academic Staff College, S. P. Uni.', NULL, 4, ' V. V. Nagar', '5'),
(7, 2, 'temp', 'Reviewed several research papers for national conferenc', 2, '2009-05-01', 'Academic Staff College, S. P. Uni.', 'UGC', 5, 'V.V. nagar', '7.');

-- --------------------------------------------------------

-- 
-- Table structure for table `department`
-- 

CREATE TABLE `department` (
  `department_id` int(10) NOT NULL auto_increment,
  `institute_id` int(10) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`department_id`),
  KEY `institute_id` (`institute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `department`
-- 

INSERT INTO `department` (`department_id`, `institute_id`, `department_name`) VALUES 
(1, 1, 'MCA'),
(2, 1, 'Msc.IT'),
(3, 1, 'Administrator');

-- --------------------------------------------------------

-- 
-- Table structure for table `designation`
-- 

CREATE TABLE `designation` (
  `designation_id` int(10) NOT NULL auto_increment,
  `designation_name` varchar(55) NOT NULL,
  PRIMARY KEY  (`designation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `designation`
-- 

INSERT INTO `designation` (`designation_id`, `designation_name`) VALUES 
(1, 'Director'),
(2, 'HOD'),
(3, 'Clerk'),
(4, 'Teacher'),
(5, 'Visiting Lecturer'),
(6, 'Assistant Professor');

-- --------------------------------------------------------

-- 
-- Table structure for table `employee`
-- 

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL auto_increment,
  `department_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `DOB` date default NULL,
  `place_of_birth` varchar(55) default NULL,
  `gender` varchar(55) default NULL,
  `marital_status` varchar(55) default NULL,
  `nationality` varchar(55) default NULL,
  `social_category_id` int(10) default NULL,
  `local_address_line1` varchar(1000) default NULL,
  `local_address_line2` varchar(1000) default NULL,
  `local_address_line3` varchar(1000) default NULL,
  `local_area` varchar(55) default NULL,
  `local_city` varchar(55) default NULL,
  `loacl_state` varchar(55) default NULL,
  `local_pin_code` int(10) default NULL,
  `permanent_address_line1` varchar(1000) default NULL,
  `permanent_address_line2` varchar(1000) default NULL,
  `permanent_address_line3` varchar(1000) default NULL,
  `permanent_area` varchar(55) default NULL,
  `permanent_city` varchar(55) default NULL,
  `permanent_state` varchar(55) default NULL,
  `permanent_pin_code` int(10) default NULL,
  PRIMARY KEY  (`employee_id`),
  KEY `department_id` (`department_id`),
  KEY `social_category_id` (`social_category_id`),
  KEY `social_category_id_2` (`social_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `employee`
-- 

INSERT INTO `employee` (`employee_id`, `department_id`, `name`, `DOB`, `place_of_birth`, `gender`, `marital_status`, `nationality`, `social_category_id`, `local_address_line1`, `local_address_line2`, `local_address_line3`, `local_area`, `local_city`, `loacl_state`, `local_pin_code`, `permanent_address_line1`, `permanent_address_line2`, `permanent_address_line3`, `permanent_area`, `permanent_city`, `permanent_state`, `permanent_pin_code`) VALUES 
(1, 1, 'Dr. Kamlesh M. Vaishnav', '1973-06-17', 'Dhandhuka', 'Male', 'Married', 'Indian', 2, '34, Part-2, Riddhi Siddhi Twin Bunglows', 'Opp. Nanadalaya Haveli', 'Bh. Raghuvir Chamber', 'Vallabh Vidyanagar ', 'Anand', 'Gujarat', 388120, '34, Part-2, Riddhi Siddhi Twin Bunglows', 'Opp. Nanadalaya Haveli', 'Bh. Raghuvir Chamber', 'Vallabh Vidyanagar ', 'Anand', 'Gujarat', 388120),
(2, 1, 'Dr. Parag M. Moteria', '1981-03-21', 'Gondal', 'Male', 'Married', 'Indian', 1, '201, Radha Govind Appt.,', 'B/H ISCKON Temple', 'Mota Bazar', 'Vallabh Vidhyanagar', 'Anand', 'Guajarat', 388120, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'Pravin Hadiya', '1991-09-11', 'Surat', 'male', 'not Marit', 'Indian', 2, '4-Jalaram nivash', 'N/R Nest Hostel', 'Mota Bazar', 'V.V. Nagar', 'Anand', 'Gujarat', 388120, '125-Vivekanand Soc.', 'Puna gam to Bombai market Road', 'N/R Archna school', 'Puna gam', 'Surat', 'Gujarat', 395010),
(5, 1, 'mm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, 'pravin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, 'pravin hadiya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_contact`
-- 

CREATE TABLE `employee_contact` (
  `employee_contact_id` int(10) NOT NULL auto_increment,
  `employee_id` int(11) NOT NULL,
  `contact_type_id` int(10) NOT NULL,
  `contact_value` varchar(255) NOT NULL,
  PRIMARY KEY  (`employee_contact_id`),
  KEY `employee_id` (`employee_id`),
  KEY `contact_type_id` (`contact_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `employee_contact`
-- 

INSERT INTO `employee_contact` (`employee_contact_id`, `employee_id`, `contact_type_id`, `contact_value`) VALUES 
(1, 1, 1, 'kamleshvaishnav@yahoo.com'),
(2, 1, 1, 'kamleshvaishnav@gmail.com'),
(3, 1, 3, '02692-231715'),
(4, 1, 4, 'www.kmvportal.co.in\r\n'),
(5, 2, 1, 'paragmoteria@gmail.com'),
(6, 2, 2, '8980218263');

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_experience`
-- 

CREATE TABLE `employee_experience` (
  `employee_experience_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `phone_no` int(25) default NULL,
  `email_id` varchar(255) default NULL,
  `website_name` varchar(255) default NULL,
  `type_of_experience_id` int(10) NOT NULL,
  `type_of_nature_of_work_id` int(10) NOT NULL,
  `no_of_months` int(2) default NULL,
  `designation_id` int(10) NOT NULL,
  `gross_monthly_salary` int(7) NOT NULL,
  `joining_date` date NOT NULL,
  `leavin_date` date default NULL,
  `reason_of_leaving` varchar(1000) default NULL,
  PRIMARY KEY  (`employee_experience_id`),
  KEY `employee_id` (`employee_id`),
  KEY `type_of_experience_id` (`type_of_experience_id`),
  KEY `type_of_nature_of_work_id` (`type_of_nature_of_work_id`),
  KEY `designation_id` (`designation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `employee_experience`
-- 

INSERT INTO `employee_experience` (`employee_experience_id`, `employee_id`, `organization_name`, `address`, `city`, `state`, `pin_code`, `phone_no`, `email_id`, `website_name`, `type_of_experience_id`, `type_of_nature_of_work_id`, `no_of_months`, `designation_id`, `gross_monthly_salary`, `joining_date`, `leavin_date`, `reason_of_leaving`) VALUES 
(1, 1, 'Kamani Science College & Prataprai Arts College', 'Amrreli', 'Amrreli', 'Gujarat', 365601, NULL, NULL, NULL, 1, 1, 2, 5, 3000, '1996-08-01', '1996-10-15', 'To join Teaching Position'),
(2, 1, 'NVPAS', 'n/r MotaBazar. Vallabh Vidyanagar', 'Anand', 'Gujarat', 388120, NULL, NULL, NULL, 1, 1, 12, 4, 8000, '1998-07-18', '2001-08-20', 'NA'),
(3, 1, 'N.V. Patel College of Pure and Applied Sciences ', 'Vallabh Vidyanagar', 'Anand', 'Gujarat', 388120, NULL, NULL, NULL, 1, 1, 24, 2, 15000, '2001-09-01', '2003-09-01', 'nternal Requirement'),
(4, 1, 'Institute of Science and Technology for Advanced Studies and Research (ISTAR)', 'Vallabh Vidyanagar', 'Anand', 'Gujarat', 388120, NULL, NULL, 'istar.co.in', 1, 1, NULL, 6, 41000, '2004-10-01', NULL, NULL),
(5, 2, 'ISTAR', 'Mota Bazar, Villabbh Vidhyanagar', 'Anand', 'Gujarat', 388120, NULL, NULL, 'www.istar.ac.in', 1, 1, NULL, 6, 40000, '2010-06-01', NULL, NULL),
(6, 2, 'Shree R.P. Bhalodia College', 'Rajkot', 'Rajkot', 'Gujarat', 388120, NULL, NULL, NULL, 1, 1, 24, 6, 30000, '2006-11-01', '2010-06-30', NULL),
(7, 2, 'Shree R.P. Bhalodia College', 'Rajkot', 'Rajkot', 'Gujarat', 388120, NULL, NULL, NULL, 1, 1, 24, 5, 20000, '2004-08-31', '2006-08-01', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_hobby`
-- 

CREATE TABLE `employee_hobby` (
  `employee_hobby_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `hobby_id` int(10) NOT NULL,
  PRIMARY KEY  (`employee_hobby_id`),
  KEY `employee_id` (`employee_id`),
  KEY `hobby_id` (`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `employee_hobby`
-- 

INSERT INTO `employee_hobby` (`employee_hobby_id`, `employee_id`, `hobby_id`) VALUES 
(1, 1, 1),
(2, 1, 1),
(3, 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_interest`
-- 

CREATE TABLE `employee_interest` (
  `employee_interest_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `interest_type_id` int(10) NOT NULL,
  `interest_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`employee_interest_id`),
  KEY `employee_id` (`employee_id`),
  KEY `interest_type_id` (`interest_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `employee_interest`
-- 

INSERT INTO `employee_interest` (`employee_interest_id`, `employee_id`, `interest_type_id`, `interest_name`) VALUES 
(1, 1, 1, 'Database Systems'),
(2, 1, 2, 'Semantic Web'),
(3, 1, 2, 'Information Retrieval'),
(4, 1, 2, 'Machine Learning'),
(5, 1, 2, 'NLP');

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_language`
-- 

CREATE TABLE `employee_language` (
  `employee_language_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `language_id` int(10) NOT NULL,
  `read_capability` varchar(5) NOT NULL,
  `speak_capability` varchar(5) NOT NULL,
  `write_capability` varchar(5) NOT NULL,
  `examination_pass` varchar(255) default NULL,
  PRIMARY KEY  (`employee_language_id`),
  KEY `employee_id` (`employee_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `employee_language`
-- 

INSERT INTO `employee_language` (`employee_language_id`, `employee_id`, `language_id`, `read_capability`, `speak_capability`, `write_capability`, `examination_pass`) VALUES 
(1, 1, 1, 'yes', 'yes', 'yes', NULL),
(2, 1, 2, 'yes', 'yes', 'yes', NULL),
(3, 1, 3, 'yes', 'yes', 'yes', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_membership`
-- 

CREATE TABLE `employee_membership` (
  `employee_membership_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `organization_type` varchar(255) NOT NULL,
  `type_of_nature_of_work_id` int(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  PRIMARY KEY  (`employee_membership_id`),
  KEY `type_of_nature_of_work_id` (`type_of_nature_of_work_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `employee_membership`
-- 

INSERT INTO `employee_membership` (`employee_membership_id`, `employee_id`, `organization_name`, `organization_type`, `type_of_nature_of_work_id`, `from_date`, `to_date`) VALUES 
(1, 1, 'temp', 'temp', 1, '2014-07-03', '2014-07-17'),
(2, 1, 'temp', 'temp', 2, '2014-07-18', '2014-07-21'),
(3, 2, 'ISTAR', 'temp', 1, '2007-03-26', '2007-03-30'),
(4, 1, 'ISTAR', 'temp', 1, '2007-03-26', '2007-03-30');

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_participation`
-- 

CREATE TABLE `employee_participation` (
  `employee_participation_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `event_title_subject` varchar(255) NOT NULL,
  `event_type_id` int(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `organized_by` varchar(255) NOT NULL,
  `sponsored_by` varchar(255) default NULL,
  `location_address` varchar(255) NOT NULL,
  `API_score` int(2) default NULL,
  PRIMARY KEY  (`employee_participation_id`),
  KEY `employee_id` (`employee_id`),
  KEY `event_type_id` (`event_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `employee_participation`
-- 

INSERT INTO `employee_participation` (`employee_participation_id`, `employee_id`, `event_title_subject`, `event_type_id`, `from_date`, `to_date`, `organized_by`, `sponsored_by`, `location_address`, `API_score`) VALUES 
(1, 1, 'Refresher Course in Computer Science', 6, '2001-12-17', '2002-01-05', 'G. H. Patel Post Graduate Department of Computer Science and Technology, Sardar Patel University', 'UGC', 'Vallabh Vidyanagar', 10),
(2, 1, 'AICTE-ISTE approved One week Short Term Training Program on Emerging Trends in Network Security', 8, '2007-12-24', '2007-12-28', 'SCET (Sarvajanik College of Engineering and Technology)', 'VNSGU', 'Surat', 10),
(3, 1, 'AICTE-ISTE sponsored One week Short Term Training Program on Cryptography and Security', 8, '2007-03-26', '2007-03-30', 'GCET (G. H. Patel College of Engineering and Technology)', 'UGC', 'Vallabh Vidyanagar', 10),
(4, 1, 'Advanced .Net technology', 3, '2009-08-28', '2009-08-29', 'IEEE ISTAR Student Branch', 'UGC', 'Vallabh Vidyanagar', 10),
(5, 1, 'UML (Unified Modeling Language)', 3, '2009-05-01', '2009-05-01', 'Department of Computer Science, SPU.', 'UGC', 'Vallabh Vidyanagar', 10),
(6, 1, 'Advanced .NET', 3, '2009-04-25', '2009-04-26', 'C. U. Shah College of Communication and technology', 'UGC', ' Wadhwan  ', 10),
(7, 1, 'Advanced Developer Technologies', 3, '2009-04-17', '2009-04-17', 'Microsoft Corporation and Gujarat Informatics Limited at L. D. Engineering College', 'Microsoft', ' Ahmedabad', 10),
(8, 1, 'Artificial Neural Network and its Application', 2, '2009-04-20', '2009-04-20', 'IEEE ISTAR Student Branch, ISTAR.', 'UGC', 'Vallabh Vidyanagar', 10),
(9, 1, 'Advanced DBMS', 3, '2009-01-02', '2009-01-03', 'SVIT (Sardar Vallabhbhai Patel Institute of Technology)', 'UGC', 'Vasad', 10),
(10, 1, 'NetBeans', 4, '2008-09-17', '2009-09-17', 'IEEE ISTAR Student Branch and Sun Microsystems at GCET.', NULL, 'Vallabh Vidyanagar', 10),
(11, 1, 'Right To Information (RTI)', 2, '2008-03-10', '2008-03-10', 'Department of Instrumentation and Control Engineering – Faculty of Technology under World Bank TEQIP Networking Activity at DDU.', NULL, 'Nadiad', 10),
(12, 1, 'Advanced Microsoft .NET and ASP .NET Web Development', 3, '2008-02-11', '2008-02-15', 'Microsoft and Gujarat Informatics Limited (GIL), Government of Gujarat at AIIS', NULL, 'Anand', 10),
(13, 1, '.NET Technology', 3, '2007-10-13', '2007-10-14', 'CSI, GDCST', NULL, 'Vallabh Vidyanagar', 10),
(14, 1, 'Techno Sampark', 1, '2007-08-04', '2007-08-04', 'IEEE Student Brach, ISTAR.', NULL, 'Vallabh Vidyanagar', 10),
(15, 1, 'Accreditation Awareness Programme', 2, '2007-03-10', '2007-03-10', 'Mudra Institute of Communication Ahmedabad (MICA) (with collaboration with AICTE)', NULL, 'Ahmedabad', 10),
(16, 1, 'DOT NET Training program', 3, '2007-02-28', '2007-03-03', 'Education Department, Science and Technology, Government of Gujarat At GDCST/AIIS', NULL, 'Anand', 10),
(17, 1, 'J2EE', 3, '2006-09-16', '2006-09-17', 'IEEE Student Branch, ISTAR', NULL, 'Vallabh Vidyanagar', 10),
(18, 1, 'Getting Mileage through Industrial Tours & Visits', 3, '2006-09-14', '2006-09-14', 'Electrical Engineering Department, ADIT (A. D. Patel Institute of Technology)', 'ISTE Chapter and ADIT', 'Vallabh Vidyanagar', 10),
(19, 1, 'Dot Net Technology', 3, '2006-06-01', '2006-06-05', 'conducted by BSP, Ahmedabad at ISTAR', NULL, 'Vallabh Vidyanagar', 10),
(20, 1, 'Education Seminar', 2, '2005-08-08', '2005-08-08', 'T M System Pvt. Ltd.', NULL, 'AHMEDABAD', 10),
(21, 1, 'Intellectual Property Rights – Policy, Education, and Public Outreach', 2, '2005-10-03', '2005-10-04', 'Sardar Patel University', 'Ministry of Human Resource Development, Government of Inida, NEW DELHI', 'Vallabh Vidyanagar', 10),
(22, 1, 'Dot Net Technology', 3, '2004-11-01', '2004-11-02', 'ISTAR', NULL, 'Vallabh Vidyanagar', 10),
(23, 2, 'temp', 2, '2007-03-26', '2007-03-30', 'Academic Staff College, S. P. Uni.', 'UGC', 'Vallabh Vidyanagar', 10);

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_presented_paper`
-- 

CREATE TABLE `employee_presented_paper` (
  `employee_presented_paper_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `title_of_presented_paper` varchar(255) NOT NULL,
  `title_of_conference_seminar` varchar(255) NOT NULL,
  `organized_by` varchar(255) default NULL,
  `sponsored_by` varchar(255) default NULL,
  `date` date NOT NULL,
  `event_level_id` int(10) NOT NULL,
  `co_author` varchar(55) default NULL,
  `rank_if_any` varchar(25) default NULL,
  `API_score` int(2) NOT NULL,
  `event_type_id` int(10) default NULL,
  PRIMARY KEY  (`employee_presented_paper_id`),
  KEY `employee_id` (`employee_id`),
  KEY `event_level_id` (`event_level_id`),
  KEY `event_type_id` (`event_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `employee_presented_paper`
-- 

INSERT INTO `employee_presented_paper` (`employee_presented_paper_id`, `employee_id`, `title_of_presented_paper`, `title_of_conference_seminar`, `organized_by`, `sponsored_by`, `date`, `event_level_id`, `co_author`, `rank_if_any`, `API_score`, `event_type_id`) VALUES 
(1, 1, 'Information Retrieval and Information Mining Techniques', 'XIXth Gujarat Science Congress', 'Sardar Patel University, Vallabh Vidyanagar', NULL, '2005-02-19', 4, NULL, NULL, 8, 1),
(2, 1, 'The Vector Space Model, an Information Retrieval Technique', '2nd National Symposium on Data and Knowledge Engineering', 'A. D. Patel Institute of Technology, Vallabh Vidyanagar, ', NULL, '2005-09-25', 4, NULL, NULL, 8, 2),
(3, 1, 'Text Mining – knowledge discovery from textual data  (Best Paper Award)', 'National Conference on Emerging Technologies and Applications (ETA)', 'Computer Science Department, Saurashtra University, Rajkot, and Amoghsiddhi Education Society, Sangali. ', NULL, '2005-10-01', 4, 'Binod Kumar', NULL, 8, 4),
(4, 1, 'Trio Mining : Leveraging The Business Intelligence', 'E-Biz Summit', ' SEMCOM, V. V. Nagar.', NULL, '2006-01-07', 4, '3', NULL, 8, 4),
(5, 1, 'RMMM – Managing the Risk in Software Projects (Best Paper Award)', 'Tech Symposia', 'Anand Institute of Information Science.', NULL, '2006-02-26', 4, NULL, 'Best Paper Award', 8, 1),
(6, 1, 'Text Mining for Finding Irregular Abbreviations and Their Definitions', 'NCICT', 'D. J. Sanghvi College of Engineering', NULL, '2006-02-01', 4, NULL, NULL, 8, 2),
(7, 1, 'Educational Portal: Sharing the Knowledge across the Globe', 'XX Gujarat Science Congress 2006', 'Gujarat Science Academy  at Ahmedabad Management Association (AMA)', NULL, '2006-03-26', 4, NULL, NULL, 8, 3),
(8, 1, 'Web Usage Mining for Web Human Interface Improvement', 'NCIIRP-2006', 'Shrimad Rajchandra Institute of Management and Computer Application and CSI.', NULL, '2006-04-29', 4, NULL, NULL, 8, 1),
(9, 1, 'Intelligent Information Retrieval System: Need, Issues, and Challenges  ', 'NCIIRP – 2006', 'Shrimad Rajchandra Institute of Management and Computer Application and CSI', NULL, '2006-04-29', 4, NULL, '2nd Best Research Paper', 8, 2),
(10, 1, 'Service Oriented Architecture and its implementation using Windows Communication Foundation', 'Tech Symposia', 'Anand Institute of Information Science', NULL, '2008-03-01', 4, NULL, NULL, 8, 1),
(11, 1, 'Knowledge Representation in Distributed Environment using Ontology Representation Languages', 'E-Biz Summit', 'Swarnim Gujarat Management Conclave, SEMCOM', NULL, '2009-01-08', 4, NULL, NULL, 8, 2),
(12, 1, 'Integrated Mobile Solution to Naïve users for Communication in English', 'First Annual National Conference on Technology in ELT', 'CITC, Changa', NULL, '2009-01-29', 4, NULL, NULL, 8, 3),
(13, 1, 'An effectiveness of Web Services in Knowledge Sharing among the Web Application', 'Current Trends in Information and Communication Technology (CTICT) 2009', 'Department of Computer Science, SPU, V. V. Nagar', NULL, '2009-02-14', 4, NULL, NULL, 8, 2),
(14, 1, 'Modeling the Domain Ontology for Academic Institutes for Efficient and Semantic Retrieval', 'Current Trends in Information and Communication Technology (CTICT) 2009', 'Department of Computer Science, SPU, V. V. Nagar', NULL, '2009-02-14', 4, NULL, NULL, 8, 2),
(15, 1, 'The Semantic Web: Next Generation Web Architecture for Intelligent Information Storage and Retrieval', 'XXIII Gujarat Science Congress', 'Gujarat Science Academy, Ahmedabad and Veer Narmad South Gujarat University, Surat', NULL, '2009-02-15', 4, NULL, NULL, 8, NULL),
(16, 1, 'The Deep Web: A treasures of Invisible Information  (Poster)', 'XXIII Gujarat Science Congress', 'Gujarat Science Academy, Ahmedabad and Veer Narmad South Gujarat University, Surat', NULL, '2009-02-15', 4, NULL, NULL, 8, 4),
(17, 1, 'The Role of Intelligent Agent in Semantic Web', 'National Symposium on “INDIAN IT@CROXROADS” (Sponsored by AICTE)', 'S. K. Patel Institute of Management and Computer Studies, Gandhinagar', NULL, '2009-08-08', 4, NULL, NULL, 8, 4),
(18, 1, 'A comparative study of data modeling and ontology modeling and DOGMA approach for ontology engineering', 'GCET', 'GCET, V. V. Nagar', NULL, '2009-12-12', 4, 'Ms. S P Patel, Ms. P S Swaminarayan', NULL, 8, 4),
(19, 1, 'Study of ontology engineering methodologies and developing university ontology by using METHONTOLOGY', 'ETKDM-09', 'SVIT, Vasad ', NULL, '2009-12-26', 4, 'Ms. P S Swaminarayan, Dr. P V Virparia', NULL, 8, 4),
(20, 2, 'temp', 'temp', 'temp', 'temp', '2013-08-14', 2, 'temp', '8', 8, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_published_books_chapters`
-- 

CREATE TABLE `employee_published_books_chapters` (
  `employee_published_books_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `ISBN_no` varchar(55) NOT NULL,
  `book_chapter_name` varchar(55) NOT NULL,
  `book_or_chapter` varchar(25) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `co_authors` varchar(255) default NULL,
  `date_of_publication` date NOT NULL,
  `price` int(7) NOT NULL,
  `no_of_page` int(7) NOT NULL,
  `edition` int(5) NOT NULL,
  `API_score` int(2) NOT NULL,
  PRIMARY KEY  (`employee_published_books_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `employee_published_books_chapters`
-- 

INSERT INTO `employee_published_books_chapters` (`employee_published_books_id`, `employee_id`, `ISBN_no`, `book_chapter_name`, `book_or_chapter`, `publisher`, `co_authors`, `date_of_publication`, `price`, `no_of_page`, `edition`, `API_score`) VALUES 
(1, 1, '111', 'temp', 'book', 'temp', 'www', '2014-07-17', 1000, 50, 1, 8),
(2, 1, 'tempt', 'temp', 'book', 'temp', 'www', '2009-04-01', 1000, 50, 0, 10),
(3, 2, '1', '1', 'chapter', '', 'www', '2011-01-01', 1000, 50, 1, 8);

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_published_paper`
-- 

CREATE TABLE `employee_published_paper` (
  `employee_publication_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `title_of_research_paper` varchar(255) NOT NULL,
  `name_of_journal_conference_proceeding` varchar(255) NOT NULL,
  `event_level_id` int(10) NOT NULL,
  `ISSN_no` varchar(55) NOT NULL,
  `volume_no` int(10) NOT NULL,
  `issue_no` int(10) NOT NULL,
  `page_no` int(10) NOT NULL,
  `event_type_id` int(10) NOT NULL,
  `date_of_publication` date NOT NULL,
  `name_of_co_authors` varchar(255) default NULL,
  `API_score` int(5) NOT NULL,
  PRIMARY KEY  (`employee_publication_id`),
  KEY `employee_id` (`employee_id`),
  KEY `event_level_id` (`event_level_id`),
  KEY `type_of_publication_id` (`event_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `employee_published_paper`
-- 

INSERT INTO `employee_published_paper` (`employee_publication_id`, `employee_id`, `title_of_research_paper`, `name_of_journal_conference_proceeding`, `event_level_id`, `ISSN_no`, `volume_no`, `issue_no`, `page_no`, `event_type_id`, `date_of_publication`, `name_of_co_authors`, `API_score`) VALUES 
(1, 1, 'Ontology Mapping Techniques – An Overview', 'International Journal of Research in Computer Science and Management', 5, '2321-8088', 1, 1111, 1, 1, '2013-01-01', 'Virparia P. V.', 8),
(2, 1, 'An Overview of Service Oriented Architecture and Technologies for its Implementation', 'International Journal of Information and Computing Technology', 5, '0976-5999', 3, 1111, 1, 1, '2013-12-01', 'Swaminarayan Priya', 8),
(3, 1, 'An Overview of Ontology Mapping Projects', 'International Journal of Information and Computing Technology', 5, '0976-5999', 2, 1111, 2, 1, '2012-12-01', 'Virparia P. V.', 8),
(4, 1, 'Ontology Mapping: Need, Issues and Challenges', 'International Journal of Information and Computing Technology', 5, ' 0976-5999', 1, 1111, 2, 2, '2011-05-01', 'Virparia P. V.', 8),
(5, 1, 'Improving the process of generating Business Intelligence using Web Usage mining and restructuring of Website', 'International Journal of Emerging Technologies and Applications in Engineering, Technology and Sciences', 5, '0974-3588', 4, 270, 1, 4, '2011-01-01', NULL, 8),
(6, 1, 'Engineering the Domain Ontology of Academic Institutes for Semantic Retrieval', 'International Journal of Computer Applications in Engineering, Technology & Sciences', 5, '0974-3596', 2, 270, 1, 4, '2010-03-01', 'Swaminarayan P. S., Virparia P. V.', 8),
(7, 1, 'A comparative study of Data Modeling & Ontology Modeling and DOGMA Approach for Ontology Engineering', 'ADIT Journal of Engineering', 1, '0973-3663', 7, 3, 1, 1, '2009-01-01', NULL, 8),
(8, 1, 'Architecture of Multi-agent based E-Learning System by Integrating Domain Ontology', 'International Journal of Computer Science, Systems Engineering & Information Technology', 5, '0974-5807', 1, 97, 3, 1, '2009-06-01', 'Patel S. P., Swaminarayan P. S., Sajja P. S.', 8),
(10, 1, 'MATHONTOLOGY based Implementation & Semantic Query Retrieval for Academic Institute Ontology using Protégé and SPRQL', 'Journal of Advance Research in Computer Engineering', 3, '0974-4320', 3, 283, 2, 1, '2009-05-01', 'Patel S. P., Swaminarayan P. S., Rathod V. R.', 8),
(11, 1, 'The comparative study of query retrieval methods in Database Management System and Semantic Web', 'PRAJNA, Journal of Pure and Applied Sciences', 5, '0975-2595', 17, 125, 1, 5, '2009-06-01', 'Swaminarayan P. S., Virparia P. V.', 8),
(12, 1, 'The Semantic Web: Next Generation Web Architecture for Intelligent Information Storage and Retrieval', 'Veer Narmad South Gujarat University Journal of Science & Technology', 3, '0975-5440/6', 1, 283, 1, 1, '2009-04-01', 'Swaminarayan P. S., Virparia P. V.', 8),
(13, 1, 'An Interoperable Knowledge Representation in Distributed Environment', 'International journal of Computational Intelligence Research', 5, '0973-1873', 5, 223, 3, 4, '2009-06-01', 'Patel S. P., Swaminarayan P. S.', 8),
(14, 1, 'Integrated Mobile Solution to Naïve users for Communication in English', 'Technology in ELT', 4, '0974-8008', 1, 30, 1, 1, '2009-04-01', 'Patel S. P., Swaminarayan P. S.', 8),
(15, 1, 'A Study of XML support in various Relational Database Management Systems', 'Proceeding of Second National Conference on Emerging Trends in Information Communication Technologies (NCETICT)', 3, '0974-3580', 2, 19, 1, 2, '2009-04-19', 'Swaminarayan P. S. ', 8),
(16, 2, 'Analysis and Design Interestingness Measure of Correlation From Association Mining to Correlation Analysis', 'National Conference on Computer Science and Security', 4, '978-81-923462-0-5', 1, 11, 1, 2, '2013-04-05', NULL, 8),
(17, 3, 'MATHONTOLOGY based Implementation & Semantic Query Retrieval for Academic Institute Ontology using Protégé and SPRQL', 'Journal of Advance Research in Computer Engineering', 4, '0974-4320', 1, 1111, 1, 2, '2009-04-01', 'Patel S. P., Swaminarayan P. S., Rathod V. R.', 10);

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_qualification`
-- 

CREATE TABLE `employee_qualification` (
  `employee_qualification_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `degree_id` int(10) NOT NULL,
  `name_of_board_university` varchar(255) NOT NULL,
  `name_of_institute` varchar(255) default NULL,
  `class_grade_division` varchar(25) NOT NULL,
  `major_subject_of_degree_thesis_title` varchar(255) default NULL,
  `passing_year` int(5) NOT NULL,
  `no_of_attemot` int(2) NOT NULL,
  `total_marks` int(5) NOT NULL,
  `obtained_marks` int(5) NOT NULL,
  PRIMARY KEY  (`employee_qualification_id`),
  KEY `employee_id` (`employee_id`),
  KEY `degree_id` (`degree_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `employee_qualification`
-- 

INSERT INTO `employee_qualification` (`employee_qualification_id`, `employee_id`, `degree_id`, `name_of_board_university`, `name_of_institute`, `class_grade_division`, `major_subject_of_degree_thesis_title`, `passing_year`, `no_of_attemot`, `total_marks`, `obtained_marks`) VALUES 
(1, 1, 1, 'GSEB Gandhinagar\r\n', NULL, 'Two', 'Science', 1988, 1, 700, 415),
(2, 1, 2, 'GSEB Gandhinagar', NULL, 'Two', 'Science', 1990, 1, 800, 429),
(3, 1, 8, 'Sardar Patel University (SPU)\r\n', NULL, 'First class', 'Mathematics', 1993, 1, 1080, 781),
(4, 1, 4, 'Sardar Patel University (SPU)', NULL, 'First class', 'Computer Application', 1996, 1, 3300, 2025),
(5, 1, 9, 'Sardar Patel University (SPU)\r\n', NULL, 'First', 'Business Administration', 2003, 1, 400, 240),
(6, 1, 10, 'Sardar Patel University (SPU)\r\n', NULL, 'Second class', 'Labour Laws and Practice', 2004, 1, 300, 168),
(7, 1, 11, 'Sardar Patel University (SPU)\r\n', NULL, 'First class', 'Computer Science', 2013, 1, 800, 600),
(8, 2, 12, 'S.P. University', 'V.P. Science College', 'First Class', 'Maths ', 2001, 1, 700, 550),
(9, 2, 4, 'Saurashtra University', 'Atmiya College', 'First Class', 'Computer Application', 2004, 1, 700, 500),
(10, 2, 13, 'Madurai Kamraj University', NULL, 'Second Class', 'Computer Science', 2008, 1, 700, 500);

-- --------------------------------------------------------

-- 
-- Table structure for table `event_level`
-- 

CREATE TABLE `event_level` (
  `event_level_id` int(10) NOT NULL auto_increment,
  `event_level` varchar(255) NOT NULL,
  PRIMARY KEY  (`event_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `event_level`
-- 

INSERT INTO `event_level` (`event_level_id`, `event_level`) VALUES 
(1, 'Local'),
(2, 'Regional'),
(3, 'Sate'),
(4, 'National'),
(5, 'International');

-- --------------------------------------------------------

-- 
-- Table structure for table `event_type`
-- 

CREATE TABLE `event_type` (
  `event_type_id` int(10) NOT NULL auto_increment,
  `event_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`event_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `event_type`
-- 

INSERT INTO `event_type` (`event_type_id`, `event_name`) VALUES 
(1, 'Conference'),
(2, 'Seminar'),
(3, 'Workshop'),
(4, 'Symposium'),
(5, 'FDP'),
(6, 'RC'),
(7, 'OP'),
(8, 'STTP');

-- --------------------------------------------------------

-- 
-- Table structure for table `examination_duties`
-- 

CREATE TABLE `examination_duties` (
  `examination_duties_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `type_of_examination_duty_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `examination_body` varchar(255) default NULL,
  `institute_name` varchar(255) NOT NULL,
  `location` varchar(1000) NOT NULL,
  PRIMARY KEY  (`examination_duties_id`),
  KEY `employee_id` (`employee_id`),
  KEY `type_of_examination_duty_id` (`type_of_examination_duty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `examination_duties`
-- 

INSERT INTO `examination_duties` (`examination_duties_id`, `employee_id`, `type_of_examination_duty_id`, `date`, `examination_body`, `institute_name`, `location`) VALUES 
(1, 1, 4, '2013-05-01', NULL, 'Parul Group institute', 'Baroda'),
(2, 2, 4, '2009-01-01', 'temp', 'Parul Group institute', 'V.V. nagar');

-- --------------------------------------------------------

-- 
-- Table structure for table `hobby`
-- 

CREATE TABLE `hobby` (
  `hobby_id` int(10) NOT NULL auto_increment,
  `hobby` varchar(55) NOT NULL,
  PRIMARY KEY  (`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `hobby`
-- 

INSERT INTO `hobby` (`hobby_id`, `hobby`) VALUES 
(1, 'Reding News Paper');

-- --------------------------------------------------------

-- 
-- Table structure for table `institute`
-- 

CREATE TABLE `institute` (
  `institute_id` int(10) NOT NULL auto_increment,
  `institute_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`institute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `institute`
-- 

INSERT INTO `institute` (`institute_id`, `institute_name`) VALUES 
(1, 'ISTAR');

-- --------------------------------------------------------

-- 
-- Table structure for table `interest_type`
-- 

CREATE TABLE `interest_type` (
  `interest_type_id` int(10) NOT NULL auto_increment,
  `interest_type` varchar(55) NOT NULL,
  PRIMARY KEY  (`interest_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `interest_type`
-- 

INSERT INTO `interest_type` (`interest_type_id`, `interest_type`) VALUES 
(1, 'Teaching'),
(2, 'Research');

-- --------------------------------------------------------

-- 
-- Table structure for table `invited_as_resource_person`
-- 

CREATE TABLE `invited_as_resource_person` (
  `invited_as_resource_person` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `event_name` varchar(255) default NULL,
  `event_type_id` int(10) default NULL,
  `type_of_nature_of_work_id` int(10) NOT NULL,
  `organized_by` varchar(255) NOT NULL,
  `sponsored` varchar(255) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`invited_as_resource_person`),
  KEY `employee_id` (`employee_id`),
  KEY `event_type_id` (`event_type_id`),
  KEY `type_of_nature_of_work_id` (`type_of_nature_of_work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `invited_as_resource_person`
-- 

INSERT INTO `invited_as_resource_person` (`invited_as_resource_person`, `employee_id`, `event_name`, `event_type_id`, `type_of_nature_of_work_id`, `organized_by`, `sponsored`, `location`, `date`) VALUES 
(1, 1, 'temp', 1, 3, 'temp', 'temp', 'Baroda', '2005-10-01'),
(2, 1, 'temp', 1, 3, 'Academic Staff College, S. P. Uni.', 'temp', 'V.V. nagar', '2006-10-01'),
(3, 1, 'temp', 3, 1, 'Academic Staff College, S. P. Uni.', 'temp', 'V.V. nagar', '2006-01-01'),
(4, 2, 'temp', 2, 1, 'Academic Staff College, S. P. Uni.', 'temp', 'V.V. nagar', '2009-01-01');

-- --------------------------------------------------------

-- 
-- Table structure for table `language`
-- 

CREATE TABLE `language` (
  `language_id` int(10) NOT NULL auto_increment,
  `language_name` varchar(55) NOT NULL,
  PRIMARY KEY  (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `language`
-- 

INSERT INTO `language` (`language_id`, `language_name`) VALUES 
(1, 'Gujarati'),
(2, 'Hindi'),
(3, 'English');

-- --------------------------------------------------------

-- 
-- Table structure for table `login`
-- 

CREATE TABLE `login` (
  `login_id` varchar(255) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  `employee_id` int(10) NOT NULL,
  PRIMARY KEY  (`login_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `login`
-- 

INSERT INTO `login` (`login_id`, `login_password`, `employee_id`) VALUES 
('admin', 'admin', 3),
('me@kmv.com', 'kmv', 1),
('me@parag.com', 'parag', 2),
('pravin.com', 'temp', 6),
('pravin.hadiya', 'temp', 7);

-- --------------------------------------------------------

-- 
-- Table structure for table `login_security`
-- 

CREATE TABLE `login_security` (
  `login_id` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(55) NOT NULL,
  `last_login_date` date NOT NULL,
  PRIMARY KEY  (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `login_security`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `login_status`
-- 

CREATE TABLE `login_status` (
  `login_id` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL,
  `reason` varchar(55) NOT NULL,
  `counter` int(2) NOT NULL,
  PRIMARY KEY  (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `login_status`
-- 

INSERT INTO `login_status` (`login_id`, `status`, `reason`, `counter`) VALUES 
('admin', 'on', 'on', 1),
('me@kmv.com', 'on', 'on', 0),
('me@parag.com', 'on', 'on', 1),
('pravin.com', 'off', 'off', 0),
('pravin.hadiya', 'off', 'off', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `meeting_attended`
-- 

CREATE TABLE `meeting_attended` (
  `meeting_attended_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `location_address` varchar(1000) NOT NULL,
  `meeting_agenda` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `duration_in_minutes` int(5) NOT NULL,
  `organized_by` varchar(255) NOT NULL,
  PRIMARY KEY  (`meeting_attended_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `meeting_attended`
-- 

INSERT INTO `meeting_attended` (`meeting_attended_id`, `employee_id`, `location_address`, `meeting_agenda`, `date`, `duration_in_minutes`, `organized_by`) VALUES 
(1, 1, 'Gandhinagar', '•	Attended Several Meetings of College to Career Program', '2009-01-01', 150, 'BISAG Studio'),
(2, 1, 'AHMEDABAD', 'Attended Several Meetings of GTU for Placement', '2010-01-01', 150, 'GTU'),
(3, 2, 'temp', 'temp', '2009-05-01', 150, 'Academic Staff College, S. P. Uni.');

-- --------------------------------------------------------

-- 
-- Table structure for table `other_activity`
-- 

CREATE TABLE `other_activity` (
  `activity_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `activity_type_id` int(10) NOT NULL,
  `event_level_id` int(10) NOT NULL,
  `organized_by` varchar(255) NOT NULL,
  `sponsored_by` varchar(255) NOT NULL,
  `loaction` varchar(1000) NOT NULL,
  `type_of_nature_of_work_id` int(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  PRIMARY KEY  (`activity_id`),
  KEY `employee_id` (`employee_id`),
  KEY `activity_type_id` (`activity_type_id`),
  KEY `event_level_id` (`event_level_id`),
  KEY `type_of_nature_of_work_id` (`type_of_nature_of_work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `other_activity`
-- 

INSERT INTO `other_activity` (`activity_id`, `employee_id`, `activity_name`, `activity_type_id`, `event_level_id`, `organized_by`, `sponsored_by`, `loaction`, `type_of_nature_of_work_id`, `from_date`, `to_date`) VALUES 
(1, 1, 'temp', 1, 1, 'temp', 'temp', 'surat', 1, '2014-05-06', '2014-07-01'),
(2, 1, 'temp', 1, 4, 'Academic Staff College, S. P. Uni.', 'UGC', 'surat', 1, '2007-03-26', '2007-03-30'),
(3, 2, 'temp', 1, 4, 'Academic Staff College, S. P. Uni.', 'UGC', 'surat', 1, '2007-03-26', '2007-03-30'),
(4, 1, 'temp', 2, 1, 'Academic Staff College, S. P. Uni.', 'UGC', 'surat', 1, '2011-12-17', '2011-12-18');

-- --------------------------------------------------------

-- 
-- Table structure for table `research_project`
-- 

CREATE TABLE `research_project` (
  `research_project_id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `submitted_to_body_funding_agency` varchar(255) NOT NULL,
  `submitted_on_date` date default NULL,
  `approved_date` date default NULL,
  `start_date` date default NULL,
  `completion_date` date default NULL,
  `status` varchar(55) NOT NULL,
  `budger_amount` int(10) NOT NULL,
  `principal_investigator_id` int(10) default NULL,
  `secondary_investiigator_id` int(10) default NULL,
  `member_name` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `API_score` int(2) NOT NULL,
  PRIMARY KEY  (`research_project_id`),
  KEY `employee_id` (`employee_id`),
  KEY `principal_investigator_id` (`principal_investigator_id`),
  KEY `secondary_investiigator_id` (`secondary_investiigator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `research_project`
-- 

INSERT INTO `research_project` (`research_project_id`, `employee_id`, `project_title`, `submitted_to_body_funding_agency`, `submitted_on_date`, `approved_date`, `start_date`, `completion_date`, `status`, `budger_amount`, `principal_investigator_id`, `secondary_investiigator_id`, `member_name`, `remark`, `API_score`) VALUES 
(1, 1, 'Development of Web-based District Information system for persistent data management of “Masik-Patrak” in Education System', 'GUJCOST', '2013-05-13', NULL, NULL, NULL, 'Complete', 2, 2, 2, 'Dr. K. M. Vaishnav, Dr. Priya Swaminarayan', 'Minor Research Project Submitted (in process)', 8),
(2, 1, 'Development of on-line Drug Information System to assist  needy people of the society to find out affordable alternative medicines', 'UGC', '2013-05-11', NULL, NULL, NULL, 'Complete', 1, NULL, NULL, 'Dr. Priya Swaminarayan, Dr. K. M. Vaishnav', 'Minor Research Project  Submitted (in process)', 8),
(3, 1, 'AICTE MODROBs Application', 'AICTE', '2012-08-07', NULL, NULL, NULL, 'Working', 50000, NULL, NULL, 'Dr. K. M. Vaishnav, Dr. Priya Swaminarayan', 'Funding Project', 8),
(4, 2, 'AICTE MODROBs Application', 'AICTE', '2013-08-05', '2014-02-03', '2014-04-07', '2014-08-20', 'Complete', 50000, 1, 1, 'Dr. K. M. Vaishnav, Dr. Priya Swaminarayan', 'Funding Project', 8);

-- --------------------------------------------------------

-- 
-- Table structure for table `role`
-- 

CREATE TABLE `role` (
  `role_id` int(10) NOT NULL auto_increment,
  `role_name` varchar(55) NOT NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `role`
-- 

INSERT INTO `role` (`role_id`, `role_name`) VALUES 
(1, 'Admin'),
(2, 'Directer'),
(3, 'Cleck'),
(4, 'HOD'),
(5, 'Faculty');

-- --------------------------------------------------------

-- 
-- Table structure for table `social_category`
-- 

CREATE TABLE `social_category` (
  `category_id` int(10) NOT NULL auto_increment,
  `category` varchar(55) NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `social_category`
-- 

INSERT INTO `social_category` (`category_id`, `category`) VALUES 
(1, 'Open'),
(2, 'OBC'),
(3, 'SC'),
(4, 'ST');

-- --------------------------------------------------------

-- 
-- Table structure for table `supporting_information`
-- 

CREATE TABLE `supporting_information` (
  `supporting_information_id` int(10) NOT NULL auto_increment,
  `table_name` varchar(55) NOT NULL,
  `table_primary_key` varchar(55) NOT NULL,
  `column_name` varchar(55) NOT NULL,
  `column_value` varchar(55) NOT NULL,
  `employee_qualification_id` int(10) NOT NULL,
  PRIMARY KEY  (`supporting_information_id`),
  KEY `employee_qualification_id` (`employee_qualification_id`),
  KEY `employee_qualification_id_2` (`employee_qualification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `supporting_information`
-- 

INSERT INTO `supporting_information` (`supporting_information_id`, `table_name`, `table_primary_key`, `column_name`, `column_value`, `employee_qualification_id`) VALUES 
(1, 'Supporting Information', 'Ph. D. Registration No.', 'Ph. D. Registration No.', '101', 7),
(2, 'Supporting Information', 'Ph. D. Registration No.', 'Ph. D. Registration Date', '2012-01-01', 7),
(3, 'Supporting Information', 'Ph. D. Registration No.', 'Ph. D. Completion Date', '2014-1-1', 7),
(4, 'Supporting Information', 'Ph. D. Registration No.', 'Ph. D. Guide Detail', 'DR. P. V. Virparia', 7),
(5, 'Supporting Information', 'Ph. D. Registration No.', 'Ph. D. Title', 'An Integrated Approach to Improve Ontology Mapping Proc', 7);

-- --------------------------------------------------------

-- 
-- Table structure for table `type_of_examination_duty`
-- 

CREATE TABLE `type_of_examination_duty` (
  `type_of_examination_duty_id` int(10) NOT NULL auto_increment,
  `type_of_examination_duty` varchar(255) NOT NULL,
  PRIMARY KEY  (`type_of_examination_duty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `type_of_examination_duty`
-- 

INSERT INTO `type_of_examination_duty` (`type_of_examination_duty_id`, `type_of_examination_duty`) VALUES 
(1, 'Sr. Supervisor'),
(2, 'Examiner'),
(3, 'Paper Setting'),
(4, 'Jr. Supervisor'),
(5, 'Center Coordinator');

-- --------------------------------------------------------

-- 
-- Table structure for table `type_of_experience`
-- 

CREATE TABLE `type_of_experience` (
  `type_of_experience_id` int(10) NOT NULL auto_increment,
  `type` varchar(55) NOT NULL,
  PRIMARY KEY  (`type_of_experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `type_of_experience`
-- 

INSERT INTO `type_of_experience` (`type_of_experience_id`, `type`) VALUES 
(1, 'Teaching'),
(2, 'Industry'),
(3, 'Resrarch');

-- --------------------------------------------------------

-- 
-- Table structure for table `type_of_publication`
-- 

CREATE TABLE `type_of_publication` (
  `type_of_publication_id` int(10) NOT NULL auto_increment,
  `type_of_publication` varchar(255) NOT NULL,
  PRIMARY KEY  (`type_of_publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `type_of_publication`
-- 

INSERT INTO `type_of_publication` (`type_of_publication_id`, `type_of_publication`) VALUES 
(1, 'Published Paper in Journal'),
(2, 'Full Paper in Conference Proceeding');

-- --------------------------------------------------------

-- 
-- Table structure for table `types_of_nature_of_work`
-- 

CREATE TABLE `types_of_nature_of_work` (
  `type_of_nature_of_work_id` int(10) NOT NULL auto_increment,
  `type_of_nature_of_work` varchar(55) NOT NULL,
  PRIMARY KEY  (`type_of_nature_of_work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `types_of_nature_of_work`
-- 

INSERT INTO `types_of_nature_of_work` (`type_of_nature_of_work_id`, `type_of_nature_of_work`) VALUES 
(1, 'Teaching'),
(2, 'Managerial'),
(3, 'Clerical'),
(4, 'Adjudged Event'),
(5, 'Chair Person');

-- --------------------------------------------------------

-- 
-- Table structure for table `uesr_role`
-- 

CREATE TABLE `uesr_role` (
  `login_id` varchar(255) NOT NULL,
  `role_id` int(10) NOT NULL,
  PRIMARY KEY  (`login_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `uesr_role`
-- 

INSERT INTO `uesr_role` (`login_id`, `role_id`) VALUES 
('admin', 1),
('me@kmv.com', 1),
('me@parag.com', 1),
('pravin.hadiya', 5);

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `award`
-- 
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `award_ibfk_2` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`event_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `award_ibfk_3` FOREIGN KEY (`event_level_id`) REFERENCES `event_level` (`event_level_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `delivered_lectures`
-- 
ALTER TABLE `delivered_lectures`
  ADD CONSTRAINT `delivered_lectures_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delivered_lectures_ibfk_2` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`event_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delivered_lectures_ibfk_3` FOREIGN KEY (`event_level_id`) REFERENCES `event_level` (`event_level_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `department`
-- 
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `institute` (`institute_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee`
-- 
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`social_category_id`) REFERENCES `social_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_contact`
-- 
ALTER TABLE `employee_contact`
  ADD CONSTRAINT `employee_contact_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_contact_ibfk_2` FOREIGN KEY (`contact_type_id`) REFERENCES `contact_type` (`contact_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_experience`
-- 
ALTER TABLE `employee_experience`
  ADD CONSTRAINT `employee_experience_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_experience_ibfk_2` FOREIGN KEY (`type_of_experience_id`) REFERENCES `type_of_experience` (`type_of_experience_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_experience_ibfk_3` FOREIGN KEY (`type_of_nature_of_work_id`) REFERENCES `types_of_nature_of_work` (`type_of_nature_of_work_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_experience_ibfk_4` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`designation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_hobby`
-- 
ALTER TABLE `employee_hobby`
  ADD CONSTRAINT `employee_hobby_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_hobby_ibfk_2` FOREIGN KEY (`hobby_id`) REFERENCES `hobby` (`hobby_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_interest`
-- 
ALTER TABLE `employee_interest`
  ADD CONSTRAINT `employee_interest_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_interest_ibfk_2` FOREIGN KEY (`interest_type_id`) REFERENCES `interest_type` (`interest_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_language`
-- 
ALTER TABLE `employee_language`
  ADD CONSTRAINT `employee_language_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_membership`
-- 
ALTER TABLE `employee_membership`
  ADD CONSTRAINT `employee_membership_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_membership_ibfk_2` FOREIGN KEY (`type_of_nature_of_work_id`) REFERENCES `types_of_nature_of_work` (`type_of_nature_of_work_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_participation`
-- 
ALTER TABLE `employee_participation`
  ADD CONSTRAINT `employee_participation_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_participation_ibfk_2` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`event_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_presented_paper`
-- 
ALTER TABLE `employee_presented_paper`
  ADD CONSTRAINT `employee_presented_paper_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_presented_paper_ibfk_2` FOREIGN KEY (`event_level_id`) REFERENCES `event_level` (`event_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_presented_paper_ibfk_3` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`event_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_published_books_chapters`
-- 
ALTER TABLE `employee_published_books_chapters`
  ADD CONSTRAINT `employee_published_books_chapters_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_published_paper`
-- 
ALTER TABLE `employee_published_paper`
  ADD CONSTRAINT `employee_published_paper_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_published_paper_ibfk_2` FOREIGN KEY (`event_level_id`) REFERENCES `event_level` (`event_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_published_paper_ibfk_3` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`event_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `employee_qualification`
-- 
ALTER TABLE `employee_qualification`
  ADD CONSTRAINT `employee_qualification_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_qualification_ibfk_2` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`degree_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `examination_duties`
-- 
ALTER TABLE `examination_duties`
  ADD CONSTRAINT `examination_duties_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_duties_ibfk_2` FOREIGN KEY (`type_of_examination_duty_id`) REFERENCES `type_of_examination_duty` (`type_of_examination_duty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `invited_as_resource_person`
-- 
ALTER TABLE `invited_as_resource_person`
  ADD CONSTRAINT `invited_as_resource_person_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invited_as_resource_person_ibfk_2` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`event_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invited_as_resource_person_ibfk_3` FOREIGN KEY (`type_of_nature_of_work_id`) REFERENCES `types_of_nature_of_work` (`type_of_nature_of_work_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `login`
-- 
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `login_security`
-- 
ALTER TABLE `login_security`
  ADD CONSTRAINT `login_security_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `login_status`
-- 
ALTER TABLE `login_status`
  ADD CONSTRAINT `login_status_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `meeting_attended`
-- 
ALTER TABLE `meeting_attended`
  ADD CONSTRAINT `meeting_attended_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `other_activity`
-- 
ALTER TABLE `other_activity`
  ADD CONSTRAINT `other_activity_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `other_activity_ibfk_2` FOREIGN KEY (`activity_type_id`) REFERENCES `activity_type` (`activity_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `other_activity_ibfk_3` FOREIGN KEY (`event_level_id`) REFERENCES `event_level` (`event_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `other_activity_ibfk_4` FOREIGN KEY (`type_of_nature_of_work_id`) REFERENCES `types_of_nature_of_work` (`type_of_nature_of_work_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `research_project`
-- 
ALTER TABLE `research_project`
  ADD CONSTRAINT `research_project_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `research_project_ibfk_2` FOREIGN KEY (`principal_investigator_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `research_project_ibfk_3` FOREIGN KEY (`secondary_investiigator_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `supporting_information`
-- 
ALTER TABLE `supporting_information`
  ADD CONSTRAINT `supporting_information_ibfk_1` FOREIGN KEY (`employee_qualification_id`) REFERENCES `employee_qualification` (`employee_qualification_id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `uesr_role`
-- 
ALTER TABLE `uesr_role`
  ADD CONSTRAINT `uesr_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uesr_role_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;
