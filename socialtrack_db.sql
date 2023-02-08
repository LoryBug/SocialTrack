-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 08, 2023 alle 22:07
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

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
-- Struttura della tabella `comment`
--

CREATE TABLE `comment` (
  `CommentID` char(10) NOT NULL,
  `Comment_text` char(200) NOT NULL,
  `Comment_date` datetime NOT NULL,
  `PostID` char(10) NOT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `follow`
--

CREATE TABLE `follow` (
  `FOL_Username` char(50) NOT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica`
--

CREATE TABLE `notifica` (
  `NotID` char(10) NOT NULL,
  `CommentID` char(10) DEFAULT NULL,
  `Notific_type` char(100) NOT NULL,
  `ReviewID` char(10) DEFAULT NULL,
  `Notific_text` char(200) NOT NULL,
  `Checked` char(1) NOT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `post`
--

CREATE TABLE `post` (
  `PostID` char(10) NOT NULL,
  `Post_timestamp` datetime NOT NULL,
  `Post_text` char(200) NOT NULL,
  `Post_image` char(100) DEFAULT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `review`
--

CREATE TABLE `review` (
  `ReviewID` char(10) NOT NULL,
  `Review_text` char(200) NOT NULL,
  `Review_timestamp` datetime NOT NULL,
  `Review_voto` decimal(2,0) NOT NULL,
  `TrackID` decimal(10,0) NOT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `track`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `Username` char(50) NOT NULL,
  `Email` char(50) NOT NULL,
  `User_password` char(128) NOT NULL,
  `nFollow` decimal(10,0) NOT NULL,
  `nFollower` decimal(10,0) NOT NULL,
  `ProfileImg` char(100) DEFAULT NULL,
  `Salt` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`Username`, `Email`, `User_password`, `nFollow`, `nFollower`, `ProfileImg`, `Salt`) VALUES
('GiammaC', 'giamma@gmail.com', '129041054f12420c2ec49356445090e3ac1bce43fc95dd13424a51693e3ab31e3389a2adf18b997b28a19df31dcb706c2de08b235b1d18a824bde18e693681cf', '0', '0', 'upload/login-default.jpg', '6fa0aa7449cd1ca5aa046c9c43c4f3d462a6d41382dfad6406986b8c4f18f205ff5c499d52c55a3144e423396549a86322b7ccce52328a5fbbb73303e79c8c5f'),
('LoryBart', 'lori@gmailcom', '236c690a1072c8c48ca3caf363b396d2f1b3023c10a611922b123ef19f9ed8b8a276ef6422050493198e8059819198f3d1f8007bd38898c2dc2509483faf4b2c', '0', '0', 'upload/login-default.jpg', '671fb569539a4ac3a663c960b8e8bf10781c81efda4ebde7470fcd9bcd637d7aeaa3110b39d28f5ac8d4c9d5d064298bf1086c9ab45e292d4cb4e64308d92f8f');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `fk_Comm_Post` (`PostID`),
  ADD KEY `fk_Comm_User` (`Username`);

--
-- Indici per le tabelle `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`FOL_Username`,`Username`),
  ADD KEY `fk_Follow_User_1` (`Username`);

--
-- Indici per le tabelle `notifica`
--
ALTER TABLE `notifica`
  ADD PRIMARY KEY (`NotID`),
  ADD KEY `fk_Notif_User` (`Username`),
  ADD KEY `fk_Notif_Comment` (`CommentID`),
  ADD KEY `fk_Notif_Review` (`ReviewID`);

--
-- Indici per le tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `fk_Post_User` (`Username`);

--
-- Indici per le tabelle `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `fk_Rev_Track` (`TrackID`),
  ADD KEY `fk_Rev_User` (`Username`);

--
-- Indici per le tabelle `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`TrackID`),
  ADD KEY `fk_Track_User` (`Username`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_Comm_Post` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`),
  ADD CONSTRAINT `fk_Comm_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Limiti per la tabella `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `fk_Follow_User` FOREIGN KEY (`FOL_Username`) REFERENCES `user` (`Username`),
  ADD CONSTRAINT `fk_Follow_User_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Limiti per la tabella `notifica`
--
ALTER TABLE `notifica`
  ADD CONSTRAINT `fk_Notif_Comment` FOREIGN KEY (`CommentID`) REFERENCES `comment` (`CommentID`),
  ADD CONSTRAINT `fk_Notif_Review` FOREIGN KEY (`ReviewID`) REFERENCES `review` (`ReviewID`),
  ADD CONSTRAINT `fk_Notif_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Limiti per la tabella `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_Post_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Limiti per la tabella `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_Rev_Track` FOREIGN KEY (`TrackID`) REFERENCES `track` (`TrackID`),
  ADD CONSTRAINT `fk_Rev_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

--
-- Limiti per la tabella `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `fk_Track_User` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
