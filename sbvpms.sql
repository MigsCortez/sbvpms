-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 04:41 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbvpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `uname` varchar(20) NOT NULL,
  `password` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`uname`, `password`) VALUES
('admin1', '$2y$12$L23IFpVJYtlbcizw2o.dROpaWAR4J.A01o61k09efCt3LpRTeI34W'),
('admin2', '$2y$12$NhmP/cErV0wn7F6CjqHTRO/98ARgrK7I0A5eCEsakSlILpSlEXImy');

-- --------------------------------------------------------

--
-- Table structure for table `dummystudents`
--

CREATE TABLE `dummystudents` (
  `StudNo` char(30) NOT NULL,
  `fullName` char(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummystudents`
--

INSERT INTO `dummystudents` (`StudNo`, `fullName`) VALUES
('C-1500021', 'Miguel Cortez'),
('C-1500022', 'Joseph Lim'),
('C-1500023', 'Angelo Regala'),
('C-1500024', 'Jodie Umali'),
('C-1500025', NULL),
('C-1500026', NULL),
('C-1500027', NULL),
('C-1500028', 'Kenneth Yason'),
('C-1500029', 'John Kennedy'),
('C-1500030', NULL),
('C-150150', 'Patrick Espedido'),
('C-167823', 'Jose Claudio Cordova');

-- --------------------------------------------------------

--
-- Table structure for table `major_sanctions`
--

CREATE TABLE `major_sanctions` (
  `id` int(11) NOT NULL,
  `description` varchar(1250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major_sanctions`
--

INSERT INTO `major_sanctions` (`id`, `description`) VALUES
(1, 'Disciplinary probation for one semester and automatic suspension for two (2) days or community service of 16 (sixteen) hours depending upon the recommendation of the BOD'),
(2, 'Disciplinary probation for one semester and automatic suspension for 3 (three) days or community service of 24 (twenty-four) hours depending upon the recommendation of the BOD'),
(3, 'Disciplinary probation for one semester and automatic suspension for 4 (four) days or community service of 36 (thirty-six) hours depending upon the recommendation of the BOD'),
(4, 'Discplinary probation for one semester and automatic suspension for the next of the semester'),
(5, 'Disciplinary probation for one semester and non-enrolment for the succeeding semester'),
(6, 'Non-enrolment for two semesters'),
(7, 'Non-enrolment for two semesters and one summer'),
(8, 'Non-enrolment for 3 semesters'),
(9, 'Exclusion (removal for serious breach of school rules)'),
(10, 'Expulsion'),
(11, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `minor_sanctions`
--

CREATE TABLE `minor_sanctions` (
  `id` int(11) NOT NULL,
  `no_offense` char(20) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minor_sanctions`
--

INSERT INTO `minor_sanctions` (`id`, `no_offense`, `description`) VALUES
(1, '1st Offense', 'Admonition by Prefect of Student Discipline and filling of Violation Form with the signature of the Class Adviser'),
(2, '2nd Offense', 'Filling of Violation Form with the signature of the Class Adviser, consultation with the Guidance Counselor and shall submit a letter of apology addressed to the Prefect of Student Discipline'),
(3, '3rd Offense', 'Filling of Violation Form with the signature of the Class Adviser, dialogue with the parents/guardian with the OPSD and shall submit a letter of apology addressed to the Prefect of Student Discipline'),
(4, '4th Offense', 'Filling of Violation Form with the signature of the Class Adviser, community service with a maximum of 8 hours subject to the discretion of prefect of student discipline and shall submit a letter of apology.'),
(5, '5th Offense', 'Considered equivalent to a major offense and automatically elevated to the Board of Discipline');

-- --------------------------------------------------------

--
-- Table structure for table `offenses`
--

CREATE TABLE `offenses` (
  `id` int(11) NOT NULL,
  `name` char(15) DEFAULT NULL,
  `category` char(25) DEFAULT NULL,
  `description` varchar(1250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offenses`
--

INSERT INTO `offenses` (`id`, `name`, `category`, `description`) VALUES
(1, 'A.1.1', 'Minor Offense', 'Causing inconvenience along the stairways, corridors, doors and classrooms during class hours or examination periods.'),
(2, 'A.1.2', 'Minor Offense', 'Sitting on armchairs, tables and other acts that will eventually destroy school properties.'),
(3, 'A.1.3', 'Minor Offense', 'Violations of the prescribed attire (uniform or non-uniform).'),
(4, 'A.1.4', 'Minor Offense', 'Unauthorized use of any school supplies.'),
(5, 'A.1.5', 'Minor Offense', 'Non-presentation of school ID within the college premises upon request of authorities.'),
(6, 'A.1.6', 'Minor Offense', 'Use of cellular phones and other electronic gadgets during class sessions, examination and masses.'),
(7, 'A.1.7', 'Minor Offense', 'Intruding into the privacy of male and female lounges, making malicious catcalls, whistling, boisterous laughter and other nuisances unbecoming of a Bedan.'),
(8, 'A.1.8', 'Minor Offense', 'Breaking of silence in the library; deliberately disarrangement of desks and tables.'),
(9, 'A.1.9', 'Minor Offense', 'Littering/spitting in the classroom, offices and corridors and in the school premises.'),
(10, 'A.1.10', 'Minor Offense', 'Excessive/irresponsible use/wastage of school properties/resources like waterpower or food.'),
(11, 'A.1.11', 'Minor Offense', 'Jeering at any individual during activities participated in by the school like uttering offensive remarks at the referees or cheerleaders of other schools during NCAA and other school functions.'),
(12, 'A.1.12', 'Minor Offense', 'Using dirty finger or lewd gestures to offend or to provoke another person or group in any school functions.'),
(13, 'A.1.13', 'Minor Offense', 'Irreverence in the of disruptive noise, talking and laughing during school community prayer such as angelus, opening and closing prayer and Holy Mass.'),
(14, 'A.1.14', 'Minor Offense', 'Other infractions that the Board of Discipline considers as minor offense.'),
(15, 'B.1.1', 'Major Offense', 'Bringing of harmful substances like pepper spray, tear gas and the like; and deadly weapons like ice picks, blades, knives, knuckles, and the like without surrendering to the guard before entering school premises.'),
(16, 'B.1.2', 'Major Offense', 'Contempt and ridicule of religious celebrations, practices, beliefs and activities such as smoking during the celebration of the Holy Mass, whether done inside or outside the chapel; making fun of liturgical activities and prayers; destroying or defacing religious images/articles.'),
(17, 'B.1.3', 'Major Offense', 'Immoral/scandalous conduct in any activity, in and out of the College premises; acts of lasciviousness inside and outside the campus and deliberate acts against moral ethics.'),
(18, 'B.1.4', 'Major Offense', 'Publications/e-publication, possession, display, sale, or distribution of pornographic or immoral materials within or outside the school premises.'),
(19, 'B.1.5', 'Major Offense', 'Possession or distribution of publications/e-publications, manuscript or other materials considered subversive as interpreted according to the existing laws.'),
(20, 'B.1.6', 'Major Offense', 'Vandalism, destruction of or damage to school property, mutilation of school materials, laboratory materials, abuse of school facilities and equipment; destroying the belongings of any member of the faculty, administration, personnel, staff, students or visitors while inside the campus; destroying decorations in the classroom, tampering of announcements on the Bulletin Board; initiating and participating in burning of school properties.'),
(21, 'B.1.7', 'Major Offense', 'Direct assault upon the person of any member of the faculty, student, administration, and other personnel, without prejudice to his/her criminal prosecution; grave acts if disrespect in words (oral/written/social networks) including publication/electronic publication, or deeds which tend to put any administrator, faculty, student and other personnel, in ridicule or contempt such as uttering words against any faculty member in his/her presence or in public; challenging a faculty member/student to a fist or gun fight; and/or initiating/passing a petition letter against anyone in the school which has anomalous/malicious content.'),
(22, 'B.1.8', 'Major Offense', 'Carrying the following inside the college premises: firearms or ammunition (with or without license); explosives, including firecrackers; guns (such as air, water,plastic, and lighter).'),
(23, 'B.1.9', 'Major Offense', 'Possession, illegal use, sale, or distribution of prohibited drugs inside or outside the school campus or regulated drugs inside the school premises as defined under Rep. Act No. 6425, otherwise known as Dangerous Drugs Law.'),
(24, 'B.1.10', 'Major Offense', 'Robbery, theft, stealing and pick-pocketing.'),
(25, 'B.1.11', 'Major Offense', 'Acts of cheating.'),
(26, 'B.1.12', 'Major Offense', 'Forging/falsifying/tampering and allowing the same acts to be committed by another on academic or any official school record/form including excuse letters from parents or medical certificate, financial reports or documents of any kind.'),
(27, 'B.1.13', 'Major Offense', 'Forging/falsifying/tampering and allowing the same acts to be committed by another on personal documents required of him by the school or its representative.'),
(28, 'B.1.14', 'Major Offense', 'Intellectual dishonesty (plagiarism) whether done directly or indirectly, individually or in-group, in writing research, term paper, reports and feasibility studies.'),
(29, 'B.1.15', 'Major Offense', 'Mere membership in any unauthorized organization such as fraternities and all other groups/organizations, the purposes of which are to use violence or subversion, or which employs as part of any of its ceremonies, rituals or practices, hazing or any act that results in injury to any person through intimidation, intentional force, or reckless imprudence; hazing, violence, intimidation, coercion, extortion and any act that tends to injure, degrade, or which employs as part of any of its ceremonies, rituals or practices, hazing or any act that results in injury to any person through intimidation, intentional force, or reckless imprudent, ; hazing, violence, intimidation, coercion, extortion and any act that tends to injure, degrade, or humiliate any fellow, student or an outsider even in mere conspiracy. '),
(30, 'B.1.16', 'Major Offense', 'Swindling, issuance of bouncing check to any member of the academic community; extortion from someone, group, organization under false pretenses and fraud.'),
(31, 'B.1.17', 'Major Offense', 'Using of the groups, class, organization/Student Council for vested interest.'),
(32, 'B.1.18', 'Major Offense', 'Disrespect toward any national symbol or activity, i.e., walking and talking during the flag ceremonies, singing the anthem with mockery, burning flags, destroying forms of national symbols like statues, etc.'),
(33, 'B.1.19', 'Major Offense', 'Decoding, accessing or altering any computer data or program without authorization from the school, which prevents normal operations, or introducing false information to and from the computer system in any office or Department of SBC.'),
(34, 'B.1.20', 'Major Offense', 'Unauthorized/Unofficial representation of San Beda College that would destroy its good reputation. '),
(35, 'B.1.21', 'Major Offense', 'Usage of school facilities by any individual/group for illicit purposes.'),
(36, 'B.1.22', 'Major Offense', 'Deliberate intent to malign the good name of the College in any form such as e-Publication, Social Network and Blogs.'),
(37, 'B.1.23', 'Major Offense', 'Bribery or offering of anything to induce a person to do something contrary to law, morals, good customs and public policy, including falsifying attendance report in any required activities.'),
(38, 'B.1.24', 'Major Offense', 'Throwing harmful objects and substances at any person that can cause injury to others.'),
(39, 'B.1.25', 'Major Offense', 'Engaging in brawls, fistfights, or any serious trouble-causing activity on or off campus. '),
(40, 'B.1.26', 'Major Offense', 'Entering the College premises/attending a school function under the influence of alcohol.'),
(41, 'B.1.27', 'Major Offense', 'Engaging in any strike, disorderly picket, or demonstration as a means of first resort against the school or any of its departments; boycotting classes or entities, either directly or indirectly by oneself or through others; preventing students from attending classes and inciting them to violate school regulations.'),
(42, 'B.1.28', 'Major Offense', 'Any conduct which threatens or endangers the health or safety of any person inside the College premises, which adversely affects the student\'s suitability as a member of the academic community (i.e., use of poison, gun powder, explosives, sharp objects, tear gas, smoke bomb, laughing gas, poisonous smoke, etc.).'),
(43, 'B.1.29', 'Major Offense', 'Selling tickets, involvement in promotional fund-raising campaign in the name of SBC/Organization without the official approval from the Dean or his representative.'),
(44, 'B.1.30', 'Major Offense', 'Entering in a contract/financial transaction with any outside organization, without the official approval from a duly authorized representative of the school administration, particularly, the prefect of Student Discipline and the Dean.'),
(45, 'B.1.31', 'Major Offense', 'Making false announcements of school programs and activities in the name of the school.'),
(46, 'B.1.32', 'Major Offense', 'Publishing articles, which tend to degrade, embarrass, ridicule the College or any member of the Bedan Community.'),
(47, 'B.1.33', 'Major Offense', 'Recruiting/enticing any member of the Bedan community to immoral, illegal activities such as gambling, prostitution, drug syndicate and fraternity.'),
(48, 'B.1.34', 'Major Offense', 'Bullying'),
(49, 'B.1.35', 'Major Offense', 'Public Display of Physical Intimacy.'),
(50, 'B.1.36', 'Major Offense', 'Smoking including the use of e-cigarette within and outside the school premises in accordance with Republic Act No. 9211 and City Ordinance No. 7748 (to be sanctioned in coordination with the Metro Manila Development Authority). '),
(51, 'B.1.37', 'Major Offense', 'Gambling including variations in any form, or taking part in any game of chance for money, or possession of gambling paraphernalia.'),
(52, 'B.1.38', 'Major Offense', 'Conviction before any court of criminal offense involving moral turpitude against persons or property. '),
(53, 'B.1.39', 'Major Offense', 'Incurred 5 (five) minor offenses');

-- --------------------------------------------------------

--
-- Table structure for table `offensesdetailsstudents`
--

CREATE TABLE `offensesdetailsstudents` (
  `StudNo` char(30) DEFAULT NULL,
  `category` char(20) DEFAULT NULL,
  `name` char(15) DEFAULT NULL,
  `description` varchar(1250) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offensesdetailsstudents`
--

INSERT INTO `offensesdetailsstudents` (`StudNo`, `category`, `name`, `description`, `id`) VALUES
('C-1500026', 'Minor Offense', 'A.1.10', 'Excessive/irresponsible use/wastage of school properties/resources like waterpower or food.', 2),
('C-1500026', 'Minor Offense', 'A.1.13', 'Irreverence in the of disruptive noise, talking and laughing during school community prayer such as angelus, opening and closing prayer and Holy Mass.', 7),
('C-1500026', 'Minor Offense', 'A.1.1', 'Causing inconvenience along the stairways, corridors, doors and classrooms during class hours or examination periods.', 32),
('C-1500026', 'Minor Offense', 'A.1.7', 'Intruding into the privacy of male and female lounges, making malicious catcalls, whistling, boisterous laughter and other nuisances unbecoming of a Bedan.', 33),
('C-1500026', 'Minor Offense', 'A.1.10', 'Excessive/irresponsible use/wastage of school properties/resources like waterpower or food.', 34),
('C-1500026', 'Major Offense', 'B.1.39', 'Incurred 5 (five) minor offenses', 35),
('C-1500026', 'Major Offense', 'B.1.2', 'Contempt and ridicule of religious celebrations, practices, beliefs and activities such as smoking during the celebration of the Holy Mass, whether done inside or outside the chapel; making fun of liturgical activities and prayers; destroying or defacing religious images/articles.', 42),
('C-1500026', 'Major Offense', 'B.1.1', 'Bringing of harmful substances like pepper spray, tear gas and the like; and deadly weapons like ice picks, blades, knives, knuckles, and the like without surrendering to the guard before entering school premises.', 45),
('C-1500024', 'Major Offense', 'B.1.1', 'Bringing of harmful substances like pepper spray, tear gas and the like; and deadly weapons like ice picks, blades, knives, knuckles, and the like without surrendering to the guard before entering school premises.', 46),
('C-1500021', 'Major Offense', 'B.1.35', 'Public Display of Physical Intimacy.', 47),
('C-1500021', 'Minor Offense', 'A.1.9', 'Littering/spitting in the classroom, offices and corridors and in the school premises.', 48),
('C-1500024', 'Minor Offense', 'A.1.9', 'Littering/spitting in the classroom, offices and corridors and in the school premises.', 50),
('C-1500026', 'Minor Offense', 'A.1.9', 'Littering/spitting in the classroom, offices and corridors and in the school premises.', 53),
('C-1500021', 'Minor Offense', 'A.1.11', 'Jeering at any individual during activities participated in by the school like uttering offensive remarks at the referees or cheerleaders of other schools during NCAA and other school functions.', 67),
('C-1500026', 'Minor Offense', 'A.1.12', 'Using dirty finger or lewd gestures to offend or to provoke another person or group in any school functions.', 70),
('C-1500026', 'Major Offense', 'B.1.39', 'Incurred 5 (five) minor offenses', 71),
('C-1500026', 'Major Offense', 'B.1.2', 'Contempt and ridicule of religious celebrations, practices, beliefs and activities such as smoking during the celebration of the Holy Mass, whether done inside or outside the chapel; making fun of liturgical activities and prayers; destroying or defacing religious images/articles.', 72),
('C-1500026', 'Major Offense', 'B.1.39', 'Incurred 5 (five) minor offenses', 73),
('C-1500023', 'Major Offense', 'B.1.16', 'Swindling, issuance of bouncing check to any member of the academic community; extortion from someone, group, organization under false pretenses and fraud.', 74),
('C-1500023', 'Minor Offense', 'A.1.1', 'Causing inconvenience along the stairways, corridors, doors and classrooms during class hours or examination periods.', 75),
('C-150150', 'Minor Offense', 'A.1.12', 'Using dirty finger or lewd gestures to offend or to provoke another person or group in any school functions.', 76),
('C-150150', 'Major Offense', 'B.1.30', 'Entering in a contract/financial transaction with any outside organization, without the official approval from a duly authorized representative of the school administration, particularly, the prefect of Student Discipline and the Dean.', 77),
('C-167823', 'Minor Offense', 'A.1.11', 'Jeering at any individual during activities participated in by the school like uttering offensive remarks at the referees or cheerleaders of other schools during NCAA and other school functions.', 79),
('C-1500021', 'Minor Offense', 'A.1.11', 'Jeering at any individual during activities participated in by the school like uttering offensive remarks at the referees or cheerleaders of other schools during NCAA and other school functions.', 80),
('C-1500022', 'Major Offense', 'B.1.23', 'Bribery or offering of anything to induce a person to do something contrary to law, morals, good customs and public policy, including falsifying attendance report in any required activities.', 81);

-- --------------------------------------------------------

--
-- Table structure for table `students_academic_probation`
--

CREATE TABLE `students_academic_probation` (
  `id` int(11) NOT NULL,
  `StudNo` char(30) DEFAULT NULL,
  `Subjects` char(30) DEFAULT NULL,
  `semester` char(30) DEFAULT NULL,
  `school_year` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_academic_probation`
--

INSERT INTO `students_academic_probation` (`id`, `StudNo`, `Subjects`, `semester`, `school_year`) VALUES
(1, 'C-1500023', 'MTH06', '2nd Semester', '2018 - 2019'),
(2, 'C-1500023', 'ENG01', '2nd Semester', '2018 - 2019'),
(3, 'C-1500023', 'MTH05', '2nd Semester', '2018 - 2019'),
(4, 'C-1500023', 'MTH01', '2nd Semester', '2018 - 2019'),
(5, 'C-1500029', 'MTH01', '2nd Semester', '2015 - 2016'),
(6, 'C-1500029', 'MTH06', '2nd Semester', '2015 - 2016'),
(7, 'C-1500029', 'ICT24', '2nd Semester', '2015 - 2016');

-- --------------------------------------------------------

--
-- Table structure for table `students_major_offense`
--

CREATE TABLE `students_major_offense` (
  `id` int(11) NOT NULL,
  `StudNo` char(30) DEFAULT NULL,
  `name` char(15) DEFAULT NULL,
  `description` varchar(1250) DEFAULT NULL,
  `major_sanction` varchar(1250) DEFAULT NULL,
  `category` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_major_offense`
--

INSERT INTO `students_major_offense` (`id`, `StudNo`, `name`, `description`, `major_sanction`, `category`) VALUES
(19, 'C-1500026', 'B.1.2', 'Contempt and ridicule of religious celebrations, practices, beliefs and activities such as smoking during the celebration of the Holy Mass, whether done inside or outside the chapel; making fun of liturgical activities and prayers; destroying or defacing religious images/articles.', '5', 'Major Offense'),
(22, 'C-1500026', 'B.1.1', 'Bringing of harmful substances like pepper spray, tear gas and the like; and deadly weapons like ice picks, blades, knives, knuckles, and the like without surrendering to the guard before entering school premises.', '1', 'Major Offense'),
(23, 'C-1500024', 'B.1.1', 'Bringing of harmful substances like pepper spray, tear gas and the like; and deadly weapons like ice picks, blades, knives, knuckles, and the like without surrendering to the guard before entering school premises.', '1', 'Major Offense'),
(24, 'C-1500021', 'B.1.35', 'Public Display of Physical Intimacy.', '2', 'Major Offense'),
(25, 'C-1500027', 'B.1.34', 'Bullying', '3', 'Major Offense'),
(26, 'C-1500027', 'B.1.2', 'Contempt and ridicule of religious celebrations, practices, beliefs and activities such as smoking during the celebration of the Holy Mass, whether done inside or outside the chapel; making fun of liturgical activities and prayers; destroying or defacing religious images/articles.', '5', 'Major Offense'),
(29, 'C-1500026', 'B.1.39', 'Incurred 5 (five) minor offenses', '11', 'Major Offense'),
(30, 'C-1500026', 'B.1.2', 'Contempt and ridicule of religious celebrations, practices, beliefs and activities such as smoking during the celebration of the Holy Mass, whether done inside or outside the chapel; making fun of liturgical activities and prayers; destroying or defacing religious images/articles.', '8', 'Major Offense'),
(31, 'C-1500026', 'B.1.39', 'Incurred 5 (five) minor offenses', '11', 'Major Offense'),
(32, 'C-1500023', 'B.1.16', 'Swindling, issuance of bouncing check to any member of the academic community; extortion from someone, group, organization under false pretenses and fraud.', '1', 'Major Offense'),
(33, 'C-150150', 'B.1.30', 'Entering in a contract/financial transaction with any outside organization, without the official approval from a duly authorized representative of the school administration, particularly, the prefect of Student Discipline and the Dean.', '6', 'Major Offense'),
(34, 'C-1500022', 'B.1.23', 'Bribery or offering of anything to induce a person to do something contrary to law, morals, good customs and public policy, including falsifying attendance report in any required activities.', '8', 'Major Offense');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `dummystudents`
--
ALTER TABLE `dummystudents`
  ADD PRIMARY KEY (`StudNo`);

--
-- Indexes for table `major_sanctions`
--
ALTER TABLE `major_sanctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minor_sanctions`
--
ALTER TABLE `minor_sanctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offenses`
--
ALTER TABLE `offenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offensesdetailsstudents`
--
ALTER TABLE `offensesdetailsstudents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `StudNo` (`StudNo`);

--
-- Indexes for table `students_academic_probation`
--
ALTER TABLE `students_academic_probation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `StudNo` (`StudNo`);

--
-- Indexes for table `students_major_offense`
--
ALTER TABLE `students_major_offense`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `major_sanctions`
--
ALTER TABLE `major_sanctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `minor_sanctions`
--
ALTER TABLE `minor_sanctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `offenses`
--
ALTER TABLE `offenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `offensesdetailsstudents`
--
ALTER TABLE `offensesdetailsstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `students_academic_probation`
--
ALTER TABLE `students_academic_probation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `students_major_offense`
--
ALTER TABLE `students_major_offense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `offensesdetailsstudents`
--
ALTER TABLE `offensesdetailsstudents`
  ADD CONSTRAINT `offensesdetailsstudents_ibfk_1` FOREIGN KEY (`StudNo`) REFERENCES `dummystudents` (`StudNo`);

--
-- Constraints for table `students_academic_probation`
--
ALTER TABLE `students_academic_probation`
  ADD CONSTRAINT `students_academic_probation_ibfk_1` FOREIGN KEY (`StudNo`) REFERENCES `dummystudents` (`StudNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
