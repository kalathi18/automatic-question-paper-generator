-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 05:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseCode` varchar(10) NOT NULL,
  `courseTitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseCode`, `courseTitle`) VALUES
('CA101', 'samplesubject1'),
('CA102', 'samplesubject2'),
('CA608', 'CLOUD COMPUTING'),
('CA609', 'WEB APPLICATION USING ASP.NET');

-- --------------------------------------------------------

--
-- Table structure for table `generatedquestion`
--

CREATE TABLE `generatedquestion` (
  `id` int(11) NOT NULL,
  `questionBody` varchar(5000) NOT NULL,
  `courseTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generatedquestion`
--

INSERT INTO `generatedquestion` (`id`, `questionBody`, `courseTitle`) VALUES
(1, '<center><b>PART-A</b></center><br>1.What is HTML server control?<br>2.Exapansion for ASP.<br>3.Waht is ASP.NET?<br><center><b>PART-B</b></center><br>1.What is bin directory?<br>2.Difference between InnerHtml and InnerText.<br>3.Write about problem with Response.Write.<br><center><b>PART-C</b></center><br>1.What is view state. Write the difference in view state between ASP and ASP.NET.<br>2.Write a ASP.NET program to create scientific calculator.<br>3.Write about assessing Code-Behind<br>', 'WEB APPLICATION USING ASP.NET'),
(2, '<center><b>PART-A</b></center><br>1.what is server utility class?<br>2.write briefly about web.config file.<br>3.Waht is ASP.NET?<br>4.Definition of ASP.NET application.<br><center><b>PART-B</b></center><br>1.Draw the diagram for nessted configuration.<br>2.A simple application start from end.<br>3.What is calendar control? How to format a calendar control.<br>4.What is Application Updates?<br><center><b>PART-C</b></center><br>1.Write a ASP.NET program to create scientific calculator.<br>2.Write about the ASP.NET file types.<br>', 'WEB APPLICATION USING ASP.NET'),
(3, '<center><b>PART-A</b></center><br>1.Exapansion for ASP.<br>2.Mention some validation controls.<br>3.What is Web server control?<br><center><b>PART-B</b></center><br>1.Write the features of HTML controls.<br>2.What are the three ways to code web forms?<br><center><b>PART-C</b></center><br>1.Write a ASP.NET program to generate a simple greeting card.<br>', 'WEB APPLICATION USING ASP.NET'),
(4, '<center><b>PART-A</b></center><br>1.What is HTML server control?<br><center><b>PART-B</b></center><br>1.Write a ASP.NET program to create simple currency converter.<br><center><b>PART-C</b></center><br>1.What is IIS. Draw the architecture of IIS.<br>', 'WEB APPLICATION USING ASP.NET');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `section` varchar(5) NOT NULL,
  `courseTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `section`, `courseTitle`) VALUES
(1, 'What is cloud computing?', 'C', 'samplesubject2'),
(2, 'Sample question..............', 'B', 'samplesubject1'),
(3, 'sample question2', 'A', 'samplesubject2'),
(4, 'Question1', 'B', 'samplesubject2'),
(5, 'Question2', 'A', 'samplesubject1'),
(6, 'Question3', 'A', 'samplesubject1'),
(10, 'Question1', 'A', 'samplesubject1'),
(11, 'Question4', 'A', 'samplesubject1'),
(12, 'Question5', 'B', 'samplesubject1'),
(13, 'Question6', 'B', 'samplesubject1'),
(14, 'Question7', 'A', 'samplesubject1'),
(15, 'Question8', 'A', 'samplesubject1'),
(16, 'Question9', 'A', 'samplesubject1'),
(17, 'Question10', 'A', 'samplesubject1'),
(18, 'Waht is ASP.NET?', 'A', 'WEB APPLICATION USING ASP.NET'),
(19, 'Exapansion for ASP.', 'A', 'WEB APPLICATION USING ASP.NET'),
(20, 'Definition of ASP.NET application.', 'A', 'WEB APPLICATION USING ASP.NET'),
(21, 'Write about the ASP.NET file types.', 'C', 'WEB APPLICATION USING ASP.NET'),
(22, 'What is bin directory?', 'B', 'WEB APPLICATION USING ASP.NET'),
(23, 'What is Application Updates?', 'B', 'WEB APPLICATION USING ASP.NET'),
(24, 'Write about the following updates. 1)Page Updates 2)Component Updates', 'B', 'WEB APPLICATION USING ASP.NET'),
(25, 'Write a ASP.NET program to generate a simple greeting card.', 'C', 'WEB APPLICATION USING ASP.NET'),
(26, 'Write a ASP.NET program to create scientific calculator.', 'C', 'WEB APPLICATION USING ASP.NET'),
(27, 'What is code behind?', 'A', 'WEB APPLICATION USING ASP.NET'),
(29, 'Write about assessing Code-Behind', 'C', 'WEB APPLICATION USING ASP.NET'),
(34, 'Write a ASP.NET program to create simple currency converter.', 'B', 'WEB APPLICATION USING ASP.NET'),
(35, 'What is namespace?', 'A', 'WEB APPLICATION USING ASP.NET'),
(36, 'What are the three ways to code web forms?', 'B', 'WEB APPLICATION USING ASP.NET'),
(37, 'Write about Application Events.', 'C', 'WEB APPLICATION USING ASP.NET'),
(38, 'write briefly about web.config file.', 'A', 'WEB APPLICATION USING ASP.NET'),
(39, 'Draw the diagram for nessted configuration.', 'B', 'WEB APPLICATION USING ASP.NET'),
(40, 'What is IIS. Draw the architecture of IIS.', 'C', 'WEB APPLICATION USING ASP.NET'),
(41, 'What are the server controls?', 'A', 'WEB APPLICATION USING ASP.NET'),
(42, 'Write about problem with Response.Write.', 'B', 'WEB APPLICATION USING ASP.NET'),
(43, 'What is view state. Write the difference in view state between ASP and ASP.NET.', 'C', 'WEB APPLICATION USING ASP.NET'),
(44, 'What is HTML server control?', 'A', 'WEB APPLICATION USING ASP.NET'),
(45, 'Write the features of HTML controls.', 'B', 'WEB APPLICATION USING ASP.NET'),
(46, 'Explain about page class property.', 'C', 'WEB APPLICATION USING ASP.NET'),
(47, 'What is Web server control?', 'A', 'WEB APPLICATION USING ASP.NET'),
(48, 'Difference between InnerHtml and InnerText.', 'B', 'WEB APPLICATION USING ASP.NET'),
(49, 'What is HTTPRequest class. Briefly explain their properties. ', 'C', 'WEB APPLICATION USING ASP.NET'),
(50, 'Mention some validation controls.', 'A', 'WEB APPLICATION USING ASP.NET'),
(51, 'What is calendar control? How to format a calendar control.', 'B', 'WEB APPLICATION USING ASP.NET'),
(52, 'Explain abot the following controls.  1)Ad-Rotator 2}Calendar control', 'C', 'WEB APPLICATION USING ASP.NET'),
(53, 'what is server utility class?', 'A', 'WEB APPLICATION USING ASP.NET'),
(54, 'A simple application start from end.', 'B', 'WEB APPLICATION USING ASP.NET'),
(55, 'Create a registration form using  ASP.NET with the validation controls.', 'C', 'WEB APPLICATION USING ASP.NET'),
(56, 'Define is Cloud computing?', 'A', 'CLOUD COMPUTING'),
(57, 'What are the types of cloud computing? ', 'A', 'CLOUD COMPUTING'),
(58, 'What is Cloud Computing and Explain in detail about types of cloud computing.', 'C', 'CLOUD COMPUTING'),
(59, 'Explain about cloud service models.', 'B', 'CLOUD COMPUTING'),
(60, 'Elaborate the history of cloud computing.', 'C', 'CLOUD COMPUTING'),
(61, 'What are the characteristics of cloud computing?', 'B', 'CLOUD COMPUTING'),
(62, 'Explain about cloud computer architecture.', 'C', 'CLOUD COMPUTING'),
(63, 'Write a short note about historical developments in cloud.', 'B', 'CLOUD COMPUTING'),
(64, 'How to build the cloud computing environment.', 'B', 'CLOUD COMPUTING'),
(65, 'Draw and Explain the cloud architecture', 'C', 'CLOUD COMPUTING'),
(66, 'What are the advantages of cloud computing', 'B', 'CLOUD COMPUTING'),
(67, 'What are the disadvantages of cloud computing.', 'B', 'CLOUD COMPUTING'),
(68, 'What is virtualization?', 'A', 'CLOUD COMPUTING'),
(69, 'Explain about the concept behind the virtualization. ', 'C', 'CLOUD COMPUTING'),
(70, 'What are the types of virtualization?', 'A', 'CLOUD COMPUTING'),
(71, 'Explain with diagrams about virtualization.', 'C', 'CLOUD COMPUTING'),
(72, 'Differentiate between Cloud Computing vs Virtualization.', 'B', 'CLOUD COMPUTING'),
(73, 'Write the advantages of virtualization.', 'A', 'CLOUD COMPUTING'),
(74, 'Write the disadvantages of virtualization.', 'A', 'CLOUD COMPUTING'),
(75, 'Explain about virtualization environment.', 'C', 'CLOUD COMPUTING'),
(76, 'What is Aneka Framework?', 'A', 'CLOUD COMPUTING'),
(77, 'Explain the Anatomy of aneka container with a neat diagram.', 'C', 'CLOUD COMPUTING'),
(78, 'Write the steps involved in building aneka clouds.', 'C', 'CLOUD COMPUTING'),
(79, 'Explain about cloud programming and management.', 'B', 'CLOUD COMPUTING'),
(80, 'What is Threading?', 'A', 'CLOUD COMPUTING'),
(81, 'Whart is Multihtreading?', 'A', 'CLOUD COMPUTING'),
(82, 'Explain about Programming application with thread.', 'C', 'CLOUD COMPUTING'),
(83, 'Explain briefly about Multi Threading with Aneka.', 'B', 'CLOUD COMPUTING'),
(84, 'Give a note on Thread Life Cycle.', 'C', 'CLOUD COMPUTING'),
(85, 'Write any two cloud platforms.', 'A', 'CLOUD COMPUTING'),
(86, 'What is SQL Azure?', 'A', 'CLOUD COMPUTING'),
(87, 'Explain in detail about AWS.', 'C', 'CLOUD COMPUTING'),
(88, 'Explain in detail about Google App Engine.', 'C', 'CLOUD COMPUTING'),
(89, 'Explain about MS Azure.', 'B', 'CLOUD COMPUTING');

-- --------------------------------------------------------

--
-- Table structure for table `selected1`
--

CREATE TABLE `selected1` (
  `id` int(10) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `courseTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `selected2`
--

CREATE TABLE `selected2` (
  `id` int(10) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `courseTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `selected3`
--

CREATE TABLE `selected3` (
  `id` int(10) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `courseTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `username`, `password`, `email`, `phone`, `dob`, `role`) VALUES
('Admin', 'Admin', 'admin', 'admin1', 'admin@gmail.com', '9342240750', '2003-07-12', 'Admin'),
('Kalathi', 'M', 'kalathi01', 'asdf', 'kalathi032@gmail.com', '9432240750', '2023-03-13', 'Teacher'),
('sample', 'sampless', 'sample1', 's01', 's1@gmail.com', '1111111111', '2023-01-12', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseCode`);

--
-- Indexes for table `generatedquestion`
--
ALTER TABLE `generatedquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected1`
--
ALTER TABLE `selected1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected2`
--
ALTER TABLE `selected2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected3`
--
ALTER TABLE `selected3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generatedquestion`
--
ALTER TABLE `generatedquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `selected1`
--
ALTER TABLE `selected1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selected2`
--
ALTER TABLE `selected2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selected3`
--
ALTER TABLE `selected3`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
