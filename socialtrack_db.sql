-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 10, 2023 alle 14:09
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

--
-- Dump dei dati per la tabella `follow`
--

INSERT INTO `follow` (`FOL_Username`, `Username`) VALUES
('GiammaC', 'Gluca_68'),
('GiammaC', 'LoryBart'),
('GiammaC', 'mario46'),
('LoryBart', 'GiammaC'),
('LoryBart', 'Gluca_68'),
('LoryBart', 'mario46'),
('mario46', 'GiammaC'),
('vale_rossi', 'GiammaC');

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

--
-- Dump dei dati per la tabella `post`
--

INSERT INTO `post` (`PostID`, `Post_timestamp`, `Post_text`, `Post_image`, `Username`) VALUES
('1', '2023-02-10 14:01:00', 'Ciao mondo!!', 'upload/post6.jpg', 'GiammaC'),
('2', '2023-02-10 14:07:33', 'Il mio Primo post', 'upload/post2.jpg', 'LoryBart');

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

--
-- Dump dei dati per la tabella `track`
--

INSERT INTO `track` (`TrackID`, `Text_description`, `Track_type`, `Track_timestamp`, `Track_length`, `Region`, `FileGPX`, `Track_image`, `Username`) VALUES
('1', 'MURAGLIONE', 'Dual', '2023-02-10 14:02:54', 70, 'Centro', 'upload/GPX_template.gpx', 'upload/track1_muraglione.PNG', 'GiammaC'),
('2', 'LA ROTTA', 'Off-Road', '2023-02-10 14:06:17', 120, 'Sud', 'upload/GPX_template.gpx', 'upload/track2_mottarone.jfif', 'GiammaC'),
('3', 'IL TONALE', 'Road', '2023-02-10 14:08:19', 140, 'Nord', 'upload/GPX_template.gpx', 'upload/track3_tonale.png', 'LoryBart');

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
('giorgia23', 'giorgia@gmail.com', 'dbaa1f9fc8777f29e8130c087ef6f0539350c61ae81e4cb2b55d65de17bc67bf3e1f23e809bebb031bd7ac93a9a72f8d955c261ab065e63f33bed02e3e0f6328', '0', '0', 'upload/login-default.jpg', 'ab8f3b6079edcba79c4bd9cafb99af94ce906f1b5b04afd09a1d61ccd3ecf1e81080167af78ef93fb481872faff505868743ad5a43b9f852edc828b4d17f603c'),
('Gluca_68', 'luca@gmail.com', '0716d1fe3855de2310e0752415340fd1f2475b6fc49a6aa409da23402871152d01039673ee3cc3d90e2cdc85bf6051917a45298cf0ece6662b4ed8a477c5fec8', '0', '0', 'upload/login-default.jpg', 'bf7842c11e8b179e1dcbbc3b0cc0c60d9a3215b34bad90648d6ebf0ff5da1a6dc76b37f610a760a97ef30e4ef42b13e10cf1de60c34005dfedd0bce2405ac092'),
('LoryBart', 'lori@gmailcom', '236c690a1072c8c48ca3caf363b396d2f1b3023c10a611922b123ef19f9ed8b8a276ef6422050493198e8059819198f3d1f8007bd38898c2dc2509483faf4b2c', '0', '0', 'upload/login-default.jpg', '671fb569539a4ac3a663c960b8e8bf10781c81efda4ebde7470fcd9bcd637d7aeaa3110b39d28f5ac8d4c9d5d064298bf1086c9ab45e292d4cb4e64308d92f8f'),
('mario46', 'mario46@gmail.com', 'b6d0319117738b7c600643966f9c717677e4f7b1bc556091bc948ebe3108d543af99b0547c1abf6d797358a0ed8dd82804989581a2fa3968596a0e1d8990c701', '0', '0', 'upload/login-default.jpg', '55115d2bd58ecb352bf1f0db79a6277266b2f4e9de7012dcb1b9b546db134c7b917c6014b9e4e3795ac71c824cdf782bcffc3d39f43843e4c70f4c037131fcff'),
('marto99', 'marto@gmail.com', '55682d64429b76d74cc05cac271124dcb0599d104b531dfd741f2a33cbc21189e75398774e39ea08a99e7f299c59e3517bb578c8f5f5c8db91dced68328918e4', '0', '0', 'upload/login-default.jpg', 'aa3144727c91a6798b59e9a43978d3e1b1b5bab9e981253faed247cfdd8cf3280aed98c2e5e49a5a93a63afec5b2f14f3350ef1bb811e99a45b6eee0e260e462'),
('vale_rossi', 'vale@gmail.com', 'a947f90800defde642e204270aae7db54d89d0284df6690a7933ad6a7fdbc2ccaaa33f4edd3f5eb7abe4008474a7c683d053390cbbab71c7e364930539312118', '0', '0', 'upload/login-default.jpg', 'f2361c2e434ced2396078fb633d8870b8051a985a2ee3a8b8f35e38c3c0dc0512fecfd26c0fe40a3c73486b9668a0f6186f1243cd96372d89533a574d232e8b0');

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
