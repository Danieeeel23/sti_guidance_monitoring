-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 11:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
(64, 0, 1432034986, 0, 'abello@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$L3VYcW9DWVoyVkZIS1RTcg$4+yUcvdpNmx2dyywyoTwp+RqR4DADBqXKzlafgZwT0s', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`Credential_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `Credential_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
