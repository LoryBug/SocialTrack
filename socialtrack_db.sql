-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 03:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialtrack_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` char(10) NOT NULL,
  `Comment_text` char(200) NOT NULL,
  `Comment_date` datetime NOT NULL,
  `PostID` char(10) NOT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `FOL_Username` char(50) NOT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifica`
--

CREATE TABLE `notifica` (
  `NotID` char(10) NOT NULL,
  `CommentID` char(10) DEFAULT NULL,
  `Notific_type` char(100) NOT NULL,
  `ReviewID` char(10) DEFAULT NULL,
  `Notific_text` char(200) NOT NULL,
  `Checked` char(1) NOT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostID` char(10) NOT NULL,
  `Post_timestamp` datetime NOT NULL,
  `Post_text` char(200) NOT NULL,
  `Post_image` char(100) DEFAULT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` char(10) NOT NULL,
  `Review_text` char(200) NOT NULL,
  `Review_timestamp` datetime NOT NULL,
  `Review_voto` decimal(2,0) NOT NULL,
  `TrackID` decimal(10,0) NOT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `TrackID` decimal(10,0) NOT NULL,
  `Text_description` char(200) NOT NULL,
  `Track_type` char(30) NOT NULL,
  `Track_timestamp` datetime NOT NULL,
  `Track_length` float NOT NULL,
  `Region` char(40) DEFAULT NULL,
  `FileGPX` char(200) NOT NULL,
  `Track_image` char(100) DEFAULT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` char(50) NOT NULL,
  `Email` char(50) NOT NULL,
  `User_password` char(30) NOT NULL,
  `nFollow` decimal(10,0) NOT NULL,
  `nFollower` decimal(10,0) NOT NULL,
  `ProfileImg` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Email`, `User_password`, `nFollow`, `nFollower`, `ProfileImg`) VALUES
('LoryBart', 'lory.leoni@gmail.com', 'ciao', '10', '10', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.begingroup.net%2Fessere-bart-simpson%2F&psig=A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `fk_Comm_Post` (`PostID`),
  ADD KEY `fk_Comm_User` (`Username`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`FOL_Username`,`Username`),
  ADD KEY `fk_Follow_User_1` (`Username`);

--
-- Indexes for table `notifica`
--
ALTER TABLE `notifica`
  ADD PRIMARY KEY (`NotID`),
  ADD KEY `fk_Notif_User` (`Username`),
  ADD KEY `fk_Notif_Comment` (`CommentID`),
  ADD KEY `fk_Notif_Review` (`ReviewID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `fk_Post_User` (`Username`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `fk_Rev_Track` (`TrackID`),
  ADD KEY `fk_Rev_User` (`Username`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`TrackID`),
  ADD KEY `fk_Track_User` (`Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_Comm_Post` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`),
  ADD CONSTRAINT `fk_Comm_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `fk_Follow_User` FOREIGN KEY (`FOL_Username`) REFERENCES `user` (`Username`),
  ADD CONSTRAINT `fk_Follow_User_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Constraints for table `notifica`
--
ALTER TABLE `notifica`
  ADD CONSTRAINT `fk_Notif_Comment` FOREIGN KEY (`CommentID`) REFERENCES `comment` (`CommentID`),
  ADD CONSTRAINT `fk_Notif_Review` FOREIGN KEY (`ReviewID`) REFERENCES `review` (`ReviewID`),
  ADD CONSTRAINT `fk_Notif_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_Post_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_Rev_Track` FOREIGN KEY (`TrackID`) REFERENCES `track` (`TrackID`),
  ADD CONSTRAINT `fk_Rev_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Constraints for table `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `fk_Track_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
