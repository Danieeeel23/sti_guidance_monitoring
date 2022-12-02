-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 05:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sti guidance monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(255) NOT NULL,
  `Announcement_ID` int(255) NOT NULL,
  `First_Name` varchar(500) NOT NULL,
  `Middle_Name` varchar(500) NOT NULL,
  `Last_Name` varchar(500) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` varchar(200) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Province` varchar(200) NOT NULL,
  `Postcode` int(100) NOT NULL,
  `Telephone_No` int(50) NOT NULL,
  `Mobile_No` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `Announcement_ID` int(255) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Participants` varchar(500) NOT NULL,
  `Category` varchar(500) NOT NULL,
  `Author` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`Announcement_ID`, `Title`, `Participants`, `Category`, `Author`, `Description`, `Start_Date`, `End_Date`, `Image`) VALUES
(1710009766, 'Walang Pasok!!!', 'ICT', 'Ongoing', 'Maggie', 'No Classes due to typhoon.', '2022-11-10', '2022-11-12', '6378ad48079803.91737513.jpg'),
(1710009767, 'Walang Pasok!!!', 'ABM', 'Ongoing', 'Maggie', 'No Classes due to typhoon.', '2022-11-10', '2022-11-12', '6378ad48079803.91737513.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Attendance_ID` int(255) NOT NULL,
  `Class_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Student_First_Name` varchar(255) NOT NULL,
  `Student_Last_Name` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Last Modified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Attendance_ID`, `Class_ID`, `Student_ID`, `Student_First_Name`, `Student_Last_Name`, `Date`, `Status`, `Last Modified`) VALUES
(1, 30, 111630844, 'Erick', 'Toriaga', '2022-12-02', '', ''),
(2, 30, 111630845, 'Arth', 'Toriaga', '2022-12-02', '', ''),
(3, 30, 111630846, 'Bruh', 'Luffy', '2022-12-02', '', ''),
(4, 30, 0, '', '', '2022-12-02', '', ''),
(5, 30, 111630844, 'Erick', 'Toriaga', '2022-12-02', 'Present', ''),
(6, 30, 111630845, 'Arth', 'Toriaga', '2022-12-02', 'Absent', ''),
(7, 30, 111630846, 'Bruh', 'Luffy', '2022-12-02', 'Present', '');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `Strand_ID` int(255) NOT NULL,
  `Section_ID` int(255) NOT NULL,
  `Subject_ID` int(255) NOT NULL,
  `Teacher_Name` varchar(255) NOT NULL,
  `Strand` varchar(255) NOT NULL,
  `Section` varchar(255) NOT NULL,
  `Subject_Name` varchar(255) NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_ID`, `Teacher_ID`, `Strand_ID`, `Section_ID`, `Subject_ID`, `Teacher_Name`, `Strand`, `Section`, `Subject_Name`, `Start_Time`, `End_Time`) VALUES
(14, 0, 0, 0, 0, 'Maureen Royce Sacay', '', '111', 'Physical Science', '06:00:00', '07:00:00'),
(15, 0, 0, 0, 0, 'Anna  Lissa Abello', '', '121', '21st Century Literature\r\n', '14:17:00', '16:17:00'),
(16, 0, 0, 0, 0, 'Maureen Royce Sacay', '', '121', 'Personal Development', '06:00:00', '07:00:00'),
(26, 0, 0, 0, 0, '1703116173:Arth  Toriaga', '', '2:121', '3:General Mathematics', '01:00:00', '01:00:00'),
(27, 1703116173, 0, 2, 26, 'Arth  Toriaga', '', '121', 'Student Org & Clubs G12-1st \r\n', '01:00:00', '01:00:00'),
(28, 1703116173, 0, 1, 5, 'Arth  Toriaga', '', '111', 'Intro to the Philo of Human', '01:00:00', '01:00:00'),
(29, 1703116173, 0, 5, 8, 'Arth  Toriaga', '', '124', 'Organization Management', '01:00:00', '01:00:00'),
(30, 1703116173, 4, 2035993911, 8, 'Arth Hendrick C Toriaga', 'ICTMAWD', '123', 'Organization Management', '03:00:00', '05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `concerns`
--

CREATE TABLE `concerns` (
  `Concern_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `Statement` varchar(500) NOT NULL,
  `Status` varchar(500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concerns`
--

INSERT INTO `concerns` (`Concern_ID`, `Student_ID`, `Name`, `Title`, `Reason`, `Statement`, `Status`, `Date`) VALUES
(1, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'Complaints', 'Grades', 'Passed but failed.', 'Ongoing', '2022-10-31'),
(2, 1001, 'Keane Klyde Rapatan Ribalde', 'Complaint 2', 'Exam', 'The exam is wrong.', 'Ongoing', '2022-10-19'),
(3, 154841052, 'James Piolo Maningo', 'Complaint 3', 'Dirty', 'The room is dirts.', 'Resolved', '2022-11-11'),
(4, 0, 'James Piolo Maningo', 'maingay', 'di makapasok', 'name:william  date: august  section : bsit  cLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\n    pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. \r\n    Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, \r\n    in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent\r\n    per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut \r\n    vestibulum. Maecenas ipsum lacus, laci', 'Ongoing', '2022-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `Credential_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `Parent_ID` int(255) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`Credential_ID`, `Student_ID`, `Teacher_ID`, `Parent_ID`, `Email`, `Password`, `Role`) VALUES
(1, 0, 0, 0, 'admin@admin.com', 'admin', 'Admin'),
(47, 1397811557, 0, 0, 'chipsdelight95@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$SVpYQUV0Tm1oUHRTZ1g2NA$LIODjACJJhcjqsesXJVHRWqyZaXK6RAROUmyQrWj9XE', 'Student'),
(48, 1237735209, 0, 0, 'rusiannielhidalgo@yahoo.com', '$argon2i$v=19$m=65536,t=4,p=1$VWdmN2dVWHJHZzFMU1gyeg$lIk2H5Fis36CSw0/8dFhsIVSRt5CEKR9DjlOWZtXvts', 'Student'),
(49, 1459184339, 0, 0, 'chipsdelight95@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Q0ovcjZxTW0xV0JaaTIuZg$hVKhmURMa5VwavnJQE2NM5Atw6vd2w6L3DGOnnnUVro', 'Student'),
(50, 511144497, 0, 0, 'chipsdelight95@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$cnNzVFpaS2h6cGVoL3dOSA$r7lUPooAelH7EyYVla5IyJhbdU9YH8P/ToC0yjyvdLw', 'Student'),
(51, 0, 0, 0, 'jaytinosa@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$VXpIU204dDVZOWppZy82TQ$tQL5jmg5TsTlCGVkNsHSC1zxHGEyYRhfIGpTda/CiJI', 'Teacher'),
(52, 0, 0, 0, 'mayanntenorio@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$U1Q1cll6Rmo3WnlSUk1vTw$WyrYCXkfPdz71SPHj7eaxbd7RGzyK/05VdxZynBn1Fc', 'Teacher'),
(53, 446644563, 0, 0, 'rusiannielhidalgo@yahoo.com', '$argon2i$v=19$m=65536,t=4,p=1$UzNLQWY3RHhZOU5MMDJ4NQ$oXXDiwpozv8ZdAO44pqt8O0jnXimfWT8fB22q8afuWE', 'Student'),
(58, 1928407020, 0, 1446170271, 'jonathan@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Vkx6RVRidjJOaGZlYUZ0Tw$uHr0Kvekgg4XxtsFyMvCDJbp0UhXU/8bDpDLTAZGeSI', 'Student'),
(59, 1928407020, 0, 1446170271, 'rianajoyce@yahoo.com', '$argon2i$v=19$m=65536,t=4,p=1$NFUydUZQdDh6RXd4am42VA$InjHFA4wU+ajMjG54jpCJClNXZdlAotG0Db0n9agYRw', 'Parent'),
(60, 144922909, 0, 119408805, 'jamespiolo@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$bFpSaHF2UWIyLmd2UU1EMA$sFz7vfwG/IypKA0mZvrbTHQjJ4rdDOuMGwopFaI6eS4', 'Student'),
(61, 144922909, 0, 119408805, 'marinapacheco@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$MjFicnpOdzhCeS5sTFRiVg$i0pFY1Yah0qnR+bWipFKuablsRuIArUEHKyDeyipPAg', 'Parent'),
(62, 0, 0, 0, 'bytes021@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$NXBCVjdIME1weVZCRXI1VA$B+3Mj3+Gcqpz2esu5csHn5WRcXAgHsVQjRWsmIVe/y0', 'Teacher'),
(63, 2001, 0, 3001, 'keaneklyde@gmail.com', 'qwedsa', 'Student'),
(64, 0, 1432034986, 0, 'abello@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$L3VYcW9DWVoyVkZIS1RTcg$4+yUcvdpNmx2dyywyoTwp+RqR4DADBqXKzlafgZwT0s', 'Teacher'),
(65, 0, 4201337, 0, 'teacher@teacher.com', 'teacher', 'Teacher'),
(66, 4201337, 0, 0, 'student@student.com', 'student', 'Student'),
(68, 0, 1703116173, 0, 'arthhendrick.toriaga@cvsu.edu.ph', 'arth', 'Teacher'),
(69, 0, 287845245, 0, 'ericktoriaga@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$ZUxDY1dKVWpDaU14V2kubQ$Srhg+GgTLIn/+tVaW7udmNA5V48dU04JQgBEHtFIf+w', 'Teacher'),
(70, 111630844, 0, 1037416447, 'ericktoriaga@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$THVoWDNERXpaS3hYdGs1cw$lu6moG7/xnePhNHAGGB9BCZol4w5N8jlcir7cysfSyc', 'Student'),
(71, 111630844, 0, 1037416447, 'a@a.com', '$argon2i$v=19$m=65536,t=4,p=1$NklHWXZXUHY1TU9BNzEyVA$r0NX7UZnTsZRHGFmzmGPTGsBGiLhgLuzkc87qNrYjZg', 'Parent');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `Name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department_name`
--

CREATE TABLE `department_name` (
  `Department_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `excel_files`
--

CREATE TABLE `excel_files` (
  `File_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `File_Name` varchar(500) NOT NULL,
  `Type` varchar(500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `excuse letter`
--

CREATE TABLE `excuse letter` (
  `Excuse_Letter_ID` int(255) NOT NULL,
  `Credential_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Names` varchar(500) NOT NULL,
  `Section` varchar(500) NOT NULL,
  `Year_Level` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Sent` datetime NOT NULL,
  `Reason_for_Absence` varchar(500) NOT NULL,
  `Images` varchar(500) NOT NULL,
  `Status` varchar(500) NOT NULL,
  `Strand` varchar(500) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `excuse letter`
--

INSERT INTO `excuse letter` (`Excuse_Letter_ID`, `Credential_ID`, `Student_ID`, `Names`, `Section`, `Year_Level`, `Description`, `Sent`, `Reason_for_Absence`, `Images`, `Status`, `Strand`, `Start_Date`, `End_Date`) VALUES
(21, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', '1.2A', 'Grade 12', 'Appointment sa dentist.', '2022-11-08 21:30:21', 'Appointment', '636a59ed66afa1.51798143.jpg', 'Walang proof.', 'ICT', '2022-11-29', '2022-11-30'),
(22, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', '1.2A', 'Grade 12', 'No money.', '2022-11-08 21:46:33', 'Family Issue', '636a5db9310123.76465034.jpg', 'Accepted', 'ICT', '2022-11-22', '2022-11-29'),
(23, 0, 1459184339, 'Daniel Lois Fernandez Hidalgo', '1.2A', 'Grade 12', 'Walang arep.', '2022-11-09 21:40:20', 'Family Issue', '636badc40fc0f4.61245863.jpg', 'Lack of proofs.', 'ICT', '2022-11-28', '2022-11-30'),
(24, 0, 511144497, 'Keane Klyde Gavino Lara', '1.2A', 'Grade 12', 'malakas yung ambon.', '2022-11-10 15:55:34', 'Bad Weather', '636cae7695eab1.26270593.jpg', 'magpayong.', 'GAS', '2022-11-29', '2022-11-30'),
(25, 0, 144922909, 'James Piolo Maningo', '1.2A', 'Grade 12', 'ako ay nagkasakit.', '2022-11-14 12:24:58', 'Health Related Problem', '6371c31a53f306.80569750.png', 'lack of proof.', 'ICT', '2022-11-30', '2022-11-29'),
(26, 0, 144922909, 'James Piolo Maningo', '1.2A', 'Grade 12', 'ako ay may sakit.', '2022-11-15 08:09:27', 'Health Related Problem', '6372d8b7586003.16782165.jpg', 'Accepted', 'ICT', '2022-11-27', '2022-11-30'),
(27, 0, 144922909, 'James Piolo Maningo', '1.2A', 'Grade 12', 'im sick', '2022-11-15 09:16:16', 'Health Related Problem', '6372e8609e00f7.88092238.jpg', 'not valid', 'ICT', '2022-11-22', '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `failing_grades`
--

CREATE TABLE `failing_grades` (
  `Failing_Grades_ID` int(255) NOT NULL,
  `Class_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Subject_ID` int(255) NOT NULL,
  `First_Name` varchar(500) NOT NULL,
  `Last_Name` varchar(500) NOT NULL,
  `Grades` varchar(500) NOT NULL,
  `Last_Modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `Inquiry_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Parent_ID` int(255) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `Category` varchar(500) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `Reply` varchar(500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `try_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offense`
--

CREATE TABLE `offense` (
  `Offense_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Type_of_Violation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense`
--

INSERT INTO `offense` (`Offense_ID`, `Student_ID`, `Type_of_Violation`) VALUES
(1, 0, 'Bullying');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `Parent_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Credential_ID` int(255) NOT NULL,
  `First_Name` varchar(500) NOT NULL,
  `Middle_Name` varchar(500) NOT NULL,
  `Last_Name` varchar(500) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Province` varchar(200) NOT NULL,
  `Postcode` int(100) NOT NULL,
  `Telephone_No` int(255) NOT NULL,
  `Mobile_No` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`Parent_ID`, `Student_ID`, `Credential_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Birthdate`, `Gender`, `Address`, `City`, `Province`, `Postcode`, `Telephone_No`, `Mobile_No`) VALUES
(119408805, 144922909, 0, 'Marina', 'Ysabelle', 'Pacheco', '0000-00-00', 'Mother', 'Zone 1', 'Dasmarinas', 'Cavite', 4114, 675, 987654321),
(1037416447, 111630844, 0, 'Hello', 'M', 'World', '0000-00-00', 'Guardian', 'Moon', 'Roadtrip', 'Broom', 400, 694201337, 694201337),
(1446170271, 1928407020, 0, 'Riana Joyce', 'Fernandez', 'Hidalgo', '0000-00-00', 'Mother', 'Zone 1', 'Dasmarinas', 'Cavite', 4114, 675, 987654321);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Schedule_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `Section_ID` int(255) NOT NULL,
  `Section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`Section_ID`, `Section`) VALUES
(1, '111'),
(2, '121'),
(3, '122'),
(4, '123'),
(5, '124'),
(6, '125');

-- --------------------------------------------------------

--
-- Table structure for table `send_excuse_letter`
--

CREATE TABLE `send_excuse_letter` (
  `Send_Excuse_Letter_ID` int(255) NOT NULL,
  `Admin_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Strand` varchar(500) NOT NULL,
  `Year_Level` varchar(500) NOT NULL,
  `Section` varchar(500) NOT NULL,
  `Statement` varchar(500) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Proof_of_Absence` varchar(255) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `send_excuse_letter`
--

INSERT INTO `send_excuse_letter` (`Send_Excuse_Letter_ID`, `Admin_ID`, `Teacher_ID`, `Student_ID`, `Name`, `Strand`, `Year_Level`, `Section`, `Statement`, `Reason`, `Comments`, `Status`, `Proof_of_Absence`, `Start_Date`, `End_Date`) VALUES
(1, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', 'The Guidance Office Accepts This Excuse Letter', '', '', '2022-10-01', '2022-10-02'),
(2, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', 'The Guidance Office Accepts This Excuse Letter', '', '', '2022-10-01', '2022-10-02'),
(3, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', 'The Guidance Office Accepts This Excuse Letter', '', '', '2022-10-01', '2022-10-02'),
(4, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', 'The Guidance Office Accepts This Excuse Letter', '', '', '2022-10-01', '2022-10-02'),
(5, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', 'The Guidance Office Accepts This Excuse Letter', '', '', '2022-10-01', '2022-10-02'),
(6, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', 'The Guidance Office Accepts This Excuse Letter', '', '', '2022-10-01', '2022-10-02'),
(7, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', 'Lack of Proof.', '', '', '2022-10-01', '2022-10-02'),
(8, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', 'Lacks.', 'Rejected', '', '2022-10-01', '2022-10-02'),
(9, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', '', 'Rejected', '', '2022-10-01', '2022-10-02'),
(10, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', '', 'Rejected', '', '2022-10-01', '2022-10-02'),
(11, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', '', 'Rejected', '', '2022-10-01', '2022-10-02'),
(12, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', '', 'Accepted', '', '2022-10-01', '2022-10-02'),
(13, 0, 0, 2000190139, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '2.2A', 'Appointment at DFA', '', 'Lacking.', 'Rejected', '', '2022-10-01', '2022-10-02'),
(14, 0, 0, 1225961186, 'Keane Klyde Fernandez Lara', 'ICT', 'Grade 12', '2.2A', 'sumakit ulo ko', '', '', 'Accepted', '', '2022-11-21', '2022-11-22'),
(15, 0, 0, 1225961186, 'Keane Klyde Fernandez Lara', 'ICT', 'Grade 12', '2.2A', 'sumakit tyan ko po', '', 'Not valid yung proof of absence', 'Rejected', '', '2022-11-21', '2022-11-30'),
(25, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'Away.', 'Family Issue', '', 'Accepted', '636a567e8dfde6.06256500.jpg', '2022-11-21', '2022-11-30'),
(26, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'Financial problem.', 'Family Issue', '', 'Accepted', '636a57b03c5b92.89145592.jpg', '2022-11-21', '2022-11-30'),
(27, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'Appointment sa dentist.', '', 'The Guidance Office Accepts This Excuse Letter', 'Accepted', '636a5d1088ec50.51716771.', '2022-11-29', '2022-11-30'),
(28, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'Appointment sa dentist.', '', 'Lack of Proof of Absence', 'Rejected', '', '2022-11-29', '2022-11-30'),
(29, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'The Guidance Office Accepts This Excuse Letter', 'Accepted', '636a5de1ae8cc7.34010782.', '2022-11-22', '2022-11-29'),
(30, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'Lack of Proof', 'Rejected', '', '2022-11-22', '2022-11-29'),
(31, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'The Guidance Office Accepts This Excuse Letter', 'Accepted', '636a5e5d920467.38505152.', '2022-11-22', '2022-11-29'),
(32, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'Deym', 'Rejected', '', '2022-11-22', '2022-11-29'),
(33, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'The Guidance Office Accepts This Excuse Letter', 'Accepted', '636a5f28a13a32.65241149.', '2022-11-22', '2022-11-29'),
(34, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'Lack of Proofs.', 'Rejected', '', '2022-11-22', '2022-11-29'),
(35, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'Panget.', 'Rejected', '', '2022-11-22', '2022-11-29'),
(36, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'ugly', 'Rejected', '', '2022-11-22', '2022-11-29'),
(37, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'The Guidance Office Accepts This Excuse Letter', 'Accepted', '636a64aa290e18.53953536.', '2022-11-22', '2022-11-29'),
(38, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'No money.', '', 'The Guidance Office Accepts This Excuse Letter', 'Accepted', '636a652f1ad333.53218904.', '2022-11-22', '2022-11-29'),
(39, 0, 0, 1397811557, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'Appointment sa dentist.', '', 'Walang proof.', 'Rejected', '', '2022-11-29', '2022-11-30'),
(40, 0, 0, 1459184339, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'Wala lang.', 'Family Issue', '', 'Accepted', '636bac24a1abf5.29281339.jpg', '2022-11-23', '2022-11-30'),
(41, 0, 0, 1459184339, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'Walang arep.', '', 'The Guidance Office Accepts This Excuse Letter', 'Accepted', '636badda246d30.83412380.', '2022-11-28', '2022-11-30'),
(42, 0, 0, 1459184339, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'Walang arep.', '', 'Lack of proofs.', 'Rejected', '', '2022-11-28', '2022-11-30'),
(43, 0, 0, 1459184339, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'ayaw.', 'Health Related Problem', '', 'Accepted', '636baebf8a5e04.27999087.jpg', '2022-11-21', '2022-11-28'),
(44, 0, 0, 1459184339, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'bagyo', 'Bad Weather', '', 'Accepted', '636bb27b4dc154.72258728.jpg', '2022-11-29', '2022-11-30'),
(45, 0, 0, 1459184339, 'Daniel Lois Fernandez Hidalgo', 'ICT', 'Grade 12', '1.2A', 'awts', 'Family Issue', '', 'Accepted', '636bb3c0a59601.06135238.jpg', '2022-11-27', '2022-11-28'),
(46, 0, 0, 511144497, 'Keane Klyde Gavino Lara', 'GAS', 'Grade 12', '1.2A', 'gumana ka.', 'Health Related Problem', '', 'Accepted', '636bb52097b393.50458414.jpg', '2022-11-29', '2022-11-30'),
(47, 0, 0, 511144497, 'Keane Klyde Gavino Lara', 'GAS', 'Grade 12', '1.2A', 'gumana ka.', 'Family Issue', '', 'Accepted', '636bb57e071e52.80013212.jpg', '2022-11-28', '2022-11-29'),
(48, 0, 0, 511144497, 'Keane Klyde Gavino Lara', 'GAS', 'Grade 12', '1.2A', 'malakas yung ambon.', '', 'magpayong.', 'Rejected', '', '2022-11-29', '2022-11-30'),
(49, 0, 0, 144922909, 'James Piolo Maningo', 'ICT', 'Grade 12', '1.2A', 'ako ay nagkasakit.', '', 'lack of proof.', 'Rejected', '', '2022-11-30', '2022-11-29'),
(50, 0, 0, 144922909, 'James Piolo Maningo', 'ICT', 'Grade 12', '1.2A', 'ako ay may sakit.', '', 'The Guidance Office Accepts This Excuse Letter', 'Accepted', '6372d8d353d188.83484009.', '2022-11-27', '2022-11-30'),
(51, 0, 0, 144922909, 'James Piolo Maningo', 'ICT', 'Grade 12', '1.2A', 'im sick', '', 'not valid', 'Rejected', '', '2022-11-22', '2022-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `send_failing_grades`
--

CREATE TABLE `send_failing_grades` (
  `Send_Failing_Grades_ID` int(255) NOT NULL,
  `Admin_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `Subject_ID` int(255) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Section` varchar(500) NOT NULL,
  `Grades` varchar(500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `strand`
--

CREATE TABLE `strand` (
  `Strand_ID` int(255) NOT NULL,
  `Subject_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strand`
--

INSERT INTO `strand` (`Strand_ID`, `Subject_ID`, `Teacher_ID`, `Student_ID`, `Name`) VALUES
(799168913, 0, 0, 0, 'ICT'),
(2035993909, 0, 0, 0, 'ABM'),
(2035993910, 0, 0, 0, 'HECA'),
(2035993911, 0, 0, 0, 'ICTMAWD');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(255) NOT NULL,
  `Parent_ID` int(255) NOT NULL,
  `First_Name` varchar(500) NOT NULL,
  `Middle_Name` varchar(500) NOT NULL,
  `Last_Name` varchar(500) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Birthdate` date NOT NULL,
  `Strand` varchar(500) NOT NULL,
  `Year_Level` varchar(500) NOT NULL,
  `Section` varchar(500) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Province` varchar(200) NOT NULL,
  `Postcode` int(255) NOT NULL,
  `Telephone_No` int(255) NOT NULL,
  `Mobile_No` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `Parent_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Gender`, `Birthdate`, `Strand`, `Year_Level`, `Section`, `Address`, `City`, `Province`, `Postcode`, `Telephone_No`, `Mobile_No`) VALUES
(111630844, 1037416447, 'Erick', 'C', 'Toriaga', 'Male', '2001-05-16', 'ICTMAWD', 'Grade 12', '123', 'Burol 3', 'Dasma', 'Cavite', 4114, 694201337, 694201337),
(111630845, 1037416447, 'Arth', 'C', 'Toriaga', 'Male', '2001-05-16', 'ICTMAWD', 'Grade 12', '123', 'Burol 3', 'Dasma', 'Cavite', 4114, 694201337, 694201337),
(111630846, 1037416447, 'Bruh', 'D', 'Luffy', 'Male', '2001-05-16', 'ICTMAWD', 'Grade 12', '123', 'Burol 3', 'Dasma', 'Cavite', 4114, 694201337, 694201337),
(144922909, 119408805, 'James', 'Piolo', 'Maningo', 'Male', '2022-11-08', 'ICT', 'Grade 12', '1.2A', 'Area C', 'Dasmarinas', 'Cavite', 4114, 683, 2147483647),
(1928407020, 1446170271, 'Jonathan', 'Magdangan', 'Gacos', 'Male', '2022-11-14', 'ABM', 'Grade 12', '1.2A', 'Area C', 'Tagaytay', 'Cavite', 4114, 683, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_ID` int(255) NOT NULL,
  `Teacher_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Subject_Name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_ID`, `Teacher_ID`, `Student_ID`, `Subject_Name`) VALUES
(1, 0, 0, 'Media and Information Literacy '),
(3, 0, 0, 'General Mathematics'),
(4, 0, 0, '21st Century Literature\r\n'),
(5, 0, 0, 'Intro to the Philo of Human'),
(6, 0, 0, 'Business Mathematics'),
(7, 0, 0, 'Oral Communication'),
(8, 0, 0, 'Organization Management'),
(9, 0, 0, 'Physical Education & Health 1'),
(10, 0, 0, 'Homeroom G11 - 1st Term'),
(11, 0, 0, 'Student Org & Clubs - G11-1st\r\n'),
(12, 0, 0, 'Personal Development \r\n'),
(14, 0, 0, 'Pagbasa at Pagsusuri\r\n'),
(16, 0, 0, 'Physical Science\r\n'),
(17, 0, 0, 'Fil sa piling Larang (Tech)\r\n'),
(18, 0, 0, 'English for Academic & Prof\r\n'),
(19, 0, 0, 'Practical Research 2'),
(24, 0, 0, 'Funds of Accountancy\'s, BM 2\r\n'),
(25, 0, 0, 'Home room G12 - 1st Term\r\n'),
(26, 0, 0, 'Student Org & Clubs G12-1st \r\n'),
(27, 0, 0, 'Physical Education & Health 3\r\n'),
(29, 0, 0, 'Basic Food Production 101\r\n'),
(31, 0, 0, 'Intro to Culinary Operation '),
(32, 0, 0, 'Local & International Cuisine \r\n'),
(33, 0, 0, 'Computer/Web Programming 1\r\n'),
(35, 0, 0, 'Computer/Web Programming 2\r\n'),
(36, 0, 0, 'General Mathematics\r\n'),
(38, 0, 0, 'Computer/Web Programming 4\r\n'),
(39, 0, 0, 'Computer/Web Programming 5\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_ID` int(255) NOT NULL,
  `First_Name` varchar(500) NOT NULL,
  `Middle_Initial` varchar(500) NOT NULL,
  `Last_Name` varchar(500) NOT NULL,
  `Department` varchar(500) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Province` varchar(200) NOT NULL,
  `Postcode` int(100) NOT NULL,
  `Telephone_No` int(50) NOT NULL,
  `Mobile_No` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_ID`, `First_Name`, `Middle_Initial`, `Last_Name`, `Department`, `Gender`, `Address`, `City`, `Province`, `Postcode`, `Telephone_No`, `Mobile_No`) VALUES
(2000145, 'Maureen', 'Royce', 'Sacay', 'ICT', 'Female', 'STI', 'Dasmarinas', 'Cavite', 4114, 232, 2147483647),
(2000146, 'Patricia', 'N.', 'Padlan', '', 'Female', '', '', '', 0, 0, 0),
(2000147, 'Mary Grace', '\r\n', 'Niegas', '', 'Female', '', '', '', 0, 0, 0),
(2000148, 'Allaine Joy', 'L.', 'Banting', '', 'Female', '', '', '', 0, 0, 0),
(2000150, 'Micaela', 'B.', 'Cabansag', '', 'Female', '', '', '', 0, 0, 0),
(2000151, 'Rose Anne ', 'Y.', 'Rodrigo', '', 'Female', '', '', '', 0, 0, 0),
(2000152, 'MA.Cristina', '', 'Galve', '', 'Female', '', '', '', 0, 0, 0),
(2000153, 'Jennifer Kirsten', '', 'Rapirap', '', 'Female', '', '', '', 0, 0, 0),
(2000154, 'Irene ', 'G.', 'Peñalosa', '', 'Female', '', '', '', 0, 0, 0),
(2000155, 'Elgent', 'P.', 'Tanggalang', '', 'Male', '', '', '', 0, 0, 0),
(287845245, 'Erick', '', 'Toriaga', 'ICT', 'Male', 'Burol 3', 'Dasma', 'Cavite', 4114, 694201337, 694201337),
(353635588, 'Marvin', 'Fortades', 'Tamayo', 'ICT', '', 'BlkQ Lot10 Santa C', 'Dasma', 'Cavite', 4111, 0, 2147483647),
(669776209, 'May ', 'Ann', 'Tenorio', 'HECA', 'Female', 'fas', 'sfsf', 'vxvx', 35353, 52353, 5353),
(1012901848, 'Jay ', 'T', 'Tinosa', 'ICT', 'Male', 'dggdhgd', 'hdfhf', 'dhdfhfd', 363643, 5335343, 4636464),
(1432034986, 'Anna ', 'Lissa', 'Abello', 'ABM', 'Female', 'Dasma', 'Dasma', 'Cavite', 4114, 455, 646646),
(1703116173, 'Arth Hendrick', 'C', 'Toriaga', 'ICT', 'Male', 'Burol 3', 'Dasma', 'Cavite', 4114, 694201337, 694201337);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `Term_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Section_ID` int(255) NOT NULL,
  `Year_Level` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

CREATE TABLE `violation` (
  `Violation_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Strand` varchar(500) NOT NULL,
  `Year_Level` varchar(500) NOT NULL,
  `Section` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Type_of_Violation` varchar(500) NOT NULL,
  `Type_of_Offense` varchar(500) NOT NULL,
  `Level_of_Offense` varchar(500) NOT NULL,
  `Images` varchar(500) NOT NULL,
  `Status` varchar(500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `violation`
--

INSERT INTO `violation` (`Violation_ID`, `Student_ID`, `Name`, `Strand`, `Year_Level`, `Section`, `Description`, `Type_of_Violation`, `Type_of_Offense`, `Level_of_Offense`, `Images`, `Status`, `Date`) VALUES
(2, 0, 'Jonathan Magdangan Gacos', 'GAS', 'Grade 12', '1.2A', 'name:william  date: august  section : bsit  cLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\n    pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. \r\n    Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, \r\n    in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent\r\n    per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut \r\n    vestibulum. Maecenas ipsum lacus, laci', 'Smoking', 'Minor Offense', 'First Offense', '6367be6f5a0657.95843582.jpg', 'Ongoing', '2022-11-22'),
(3, 278176916, 'Jonathan Magdangan Gacos', 'GAS', 'Grade 12', '1.2A', 'name:william  date: august  section : bsit  cLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, \r\n    pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. \r\n    Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, \r\n    in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent\r\n    per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut \r\n    vestibulum. Maecenas ipsum lacus, laci', 'Vandalism', 'Major Offense A', 'Second Offense', '6367bfb78da516.86147023.jpg', 'Ongoing', '2022-11-16'),
(4, 1225961186, 'Keane Klyde Fernandez Lara', 'ICT', 'Grade 12', '2.2A', 'nakabasag ng bintana', 'Others', 'Minor Offense', 'First Offense', '6368aa4cd9ffc6.98834442.jpg', 'Resolved', '2022-11-23'),
(5, 144922909, 'James Piolo Maningo', 'ICT', 'Grade 12', '1.2A', 'may papel', 'Cheating', 'Minor Offense', 'First Offense', '6372daf88b4f13.18717952.jpg', 'Resolved', '2022-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `year_level`
--

CREATE TABLE `year_level` (
  `Year_Level_ID` int(255) NOT NULL,
  `Section_ID` int(255) NOT NULL,
  `Year_Level` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year_level`
--

INSERT INTO `year_level` (`Year_Level_ID`, `Section_ID`, `Year_Level`) VALUES
(1, 0, 'Grade 11'),
(2, 0, 'Grade 12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`Announcement_ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Attendance_ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_ID`);

--
-- Indexes for table `concerns`
--
ALTER TABLE `concerns`
  ADD PRIMARY KEY (`Concern_ID`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`Credential_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `department_name`
--
ALTER TABLE `department_name`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `excel_files`
--
ALTER TABLE `excel_files`
  ADD PRIMARY KEY (`File_ID`);

--
-- Indexes for table `excuse letter`
--
ALTER TABLE `excuse letter`
  ADD PRIMARY KEY (`Excuse_Letter_ID`);

--
-- Indexes for table `failing_grades`
--
ALTER TABLE `failing_grades`
  ADD PRIMARY KEY (`Failing_Grades_ID`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`Inquiry_ID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offense`
--
ALTER TABLE `offense`
  ADD PRIMARY KEY (`Offense_ID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`Parent_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Schedule_ID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`Section_ID`);

--
-- Indexes for table `send_excuse_letter`
--
ALTER TABLE `send_excuse_letter`
  ADD PRIMARY KEY (`Send_Excuse_Letter_ID`);

--
-- Indexes for table `send_failing_grades`
--
ALTER TABLE `send_failing_grades`
  ADD PRIMARY KEY (`Send_Failing_Grades_ID`);

--
-- Indexes for table `strand`
--
ALTER TABLE `strand`
  ADD PRIMARY KEY (`Strand_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teacher_ID`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`Term_ID`);

--
-- Indexes for table `violation`
--
ALTER TABLE `violation`
  ADD PRIMARY KEY (`Violation_ID`);

--
-- Indexes for table `year_level`
--
ALTER TABLE `year_level`
  ADD PRIMARY KEY (`Year_Level_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `Announcement_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1710009768;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `Attendance_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `concerns`
--
ALTER TABLE `concerns`
  MODIFY `Concern_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `Credential_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Department_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_name`
--
ALTER TABLE `department_name`
  MODIFY `Department_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `excel_files`
--
ALTER TABLE `excel_files`
  MODIFY `File_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `excuse letter`
--
ALTER TABLE `excuse letter`
  MODIFY `Excuse_Letter_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failing_grades`
--
ALTER TABLE `failing_grades`
  MODIFY `Failing_Grades_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `Inquiry_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `offense`
--
ALTER TABLE `offense`
  MODIFY `Offense_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `Parent_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1754385590;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `Schedule_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `Section_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `send_excuse_letter`
--
ALTER TABLE `send_excuse_letter`
  MODIFY `Send_Excuse_Letter_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `send_failing_grades`
--
ALTER TABLE `send_failing_grades`
  MODIFY `Send_Failing_Grades_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strand`
--
ALTER TABLE `strand`
  MODIFY `Strand_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2035993914;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000190153;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1703116175;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `Term_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `violation`
--
ALTER TABLE `violation`
  MODIFY `Violation_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `year_level`
--
ALTER TABLE `year_level`
  MODIFY `Year_Level_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
