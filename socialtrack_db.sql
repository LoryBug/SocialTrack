-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 12, 2023 alle 00:23
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

--
-- Dump dei dati per la tabella `comment`
--

INSERT INTO `comment` (`CommentID`, `Comment_text`, `Comment_date`, `PostID`, `Username`) VALUES
('1', 'Veramente una bella gara.', '2023-02-11 23:59:30', '9', 'GiammaC'),
('2', 'wow, incredibile', '2023-02-11 23:59:40', '12', 'GiammaC'),
('3', 'ciao, jorge benvenuto.', '2023-02-11 23:59:53', '10', 'GiammaC'),
('4', 'bellissima foto', '2023-02-12 00:00:03', '4', 'GiammaC');

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
('franco_bello98', 'GiammaC'),
('franco_bello98', 'giorgia23'),
('franco_bello98', 'LoryBart'),
('franco_bello98', 'mario46'),
('GiammaC', 'franco_bello98'),
('GiammaC', 'giorgia23'),
('GiammaC', 'Gluca_68'),
('GiammaC', 'j_lorenzo99'),
('GiammaC', 'LoryBart'),
('GiammaC', 'mario46'),
('GiammaC', 'marto99'),
('giorgia23', 'franco_bello98'),
('Gluca_68', 'franco_bello98'),
('Gluca_68', 'GiammaC'),
('Gluca_68', 'giorgia23'),
('Gluca_68', 'LoryBart'),
('j_lorenzo99', 'franco_bello98'),
('j_lorenzo99', 'GiammaC'),
('j_lorenzo99', 'giorgia23'),
('LoryBart', 'franco_bello98'),
('LoryBart', 'GiammaC'),
('LoryBart', 'giorgia23'),
('LoryBart', 'Gluca_68'),
('LoryBart', 'j_lorenzo99'),
('LoryBart', 'marto99'),
('mario46', 'franco_bello98'),
('mario46', 'GiammaC'),
('mario46', 'giorgia23'),
('mario46', 'LoryBart'),
('mario46', 'marto99'),
('marto99', 'franco_bello98'),
('marto99', 'GiammaC'),
('marto99', 'giorgia23'),
('marto99', 'j_lorenzo99'),
('marto99', 'mario46'),
('vale_rossi', 'franco_bello98'),
('vale_rossi', 'giorgia23'),
('vale_rossi', 'Gluca_68'),
('vale_rossi', 'LoryBart'),
('vale_rossi', 'marto99');

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica`
--

CREATE TABLE `notifica` (
  `NotID` int(10) NOT NULL,
  `CommentID` char(10) DEFAULT NULL,
  `Notific_type` char(100) NOT NULL,
  `ReviewID` char(10) DEFAULT NULL,
  `Notific_text` char(200) NOT NULL,
  `Checked` char(1) NOT NULL,
  `Username` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `notifica`
--

INSERT INTO `notifica` (`NotID`, `CommentID`, `Notific_type`, `ReviewID`, `Notific_text`, `Checked`, `Username`) VALUES
(1, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'franco_bello98'),
(2, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'giorgia23'),
(3, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'Gluca_68'),
(4, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'j_lorenzo99'),
(5, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'LoryBart'),
(6, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'mario46'),
(7, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'marto99'),
(8, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'vale_rossi'),
(9, NULL, 'LoryBart', NULL, 'ha iniziato a seguirti', '0', 'GiammaC'),
(10, NULL, 'LoryBart', NULL, 'ha iniziato a seguirti', '0', 'Gluca_68'),
(11, NULL, 'LoryBart', NULL, 'ha iniziato a seguirti', '0', 'mario46'),
(12, NULL, 'LoryBart', NULL, 'ha iniziato a seguirti', '0', 'vale_rossi'),
(13, NULL, 'LoryBart', NULL, 'ha iniziato a seguirti', '0', 'franco_bello98'),
(14, NULL, 'franco_bello98', NULL, 'ha iniziato a seguirti', '0', 'GiammaC'),
(15, NULL, 'franco_bello98', NULL, 'ha iniziato a seguirti', '0', 'giorgia23'),
(16, NULL, 'franco_bello98', NULL, 'ha iniziato a seguirti', '0', 'Gluca_68'),
(17, NULL, 'franco_bello98', NULL, 'ha iniziato a seguirti', '0', 'j_lorenzo99'),
(18, NULL, 'franco_bello98', NULL, 'ha iniziato a seguirti', '0', 'LoryBart'),
(19, NULL, 'franco_bello98', NULL, 'ha iniziato a seguirti', '0', 'mario46'),
(20, NULL, 'franco_bello98', NULL, 'ha iniziato a seguirti', '0', 'marto99'),
(21, NULL, 'franco_bello98', NULL, 'ha iniziato a seguirti', '0', 'vale_rossi'),
(22, NULL, 'giorgia23', NULL, 'ha iniziato a seguirti', '0', 'franco_bello98'),
(23, NULL, 'giorgia23', NULL, 'ha iniziato a seguirti', '0', 'GiammaC'),
(24, NULL, 'giorgia23', NULL, 'ha iniziato a seguirti', '0', 'Gluca_68'),
(26, NULL, 'giorgia23', NULL, 'ha iniziato a seguirti', '0', 'LoryBart'),
(27, NULL, 'giorgia23', NULL, 'ha iniziato a seguirti', '0', 'mario46'),
(28, NULL, 'giorgia23', NULL, 'ha iniziato a seguirti', '0', 'marto99'),
(29, NULL, 'giorgia23', NULL, 'ha iniziato a seguirti', '0', 'vale_rossi'),
(30, NULL, 'Gluca_68', NULL, 'ha iniziato a seguirti', '0', 'LoryBart'),
(31, NULL, 'Gluca_68', NULL, 'ha iniziato a seguirti', '0', 'vale_rossi'),
(32, NULL, 'Gluca_68', NULL, 'ha iniziato a seguirti', '0', 'GiammaC'),
(33, NULL, 'j_lorenzo99', NULL, 'ha iniziato a seguirti', '0', 'GiammaC'),
(34, NULL, 'j_lorenzo99', NULL, 'ha iniziato a seguirti', '0', 'marto99'),
(35, NULL, 'j_lorenzo99', NULL, 'ha iniziato a seguirti', '0', 'LoryBart'),
(36, NULL, 'mario46', NULL, 'ha iniziato a seguirti', '0', 'GiammaC'),
(37, NULL, 'mario46', NULL, 'ha iniziato a seguirti', '0', 'franco_bello98'),
(38, NULL, 'mario46', NULL, 'ha iniziato a seguirti', '0', 'marto99'),
(39, NULL, 'marto99', NULL, 'ha iniziato a seguirti', '0', 'LoryBart'),
(40, NULL, 'marto99', NULL, 'ha iniziato a seguirti', '0', 'vale_rossi'),
(41, NULL, 'marto99', NULL, 'ha iniziato a seguirti', '0', 'mario46'),
(42, NULL, 'marto99', NULL, 'ha iniziato a seguirti', '0', 'GiammaC'),
(43, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'mario46'),
(44, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'j_lorenzo99'),
(45, '1', 'comment', NULL, 'ha commentato il tuo post', '0', 'Gluca_68'),
(46, '2', 'comment', NULL, 'ha commentato il tuo post', '0', 'marto99'),
(47, '3', 'comment', NULL, 'ha commentato il tuo post', '0', 'j_lorenzo99'),
(48, '4', 'comment', NULL, 'ha commentato il tuo post', '0', 'LoryBart'),
(49, NULL, 'review', '1', 'ha recensito il tuo track', '0', 'mario46'),
(50, NULL, 'review', '2', 'ha recensito il tuo track', '0', 'mario46'),
(51, NULL, 'review', '3', 'ha recensito il tuo track', '0', 'mario46'),
(52, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'franco_bello98'),
(53, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'franco_bello98'),
(54, NULL, 'GiammaC', NULL, 'ha iniziato a seguirti', '0', 'franco_bello98');

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
('1', '2023-02-11 23:09:03', 'Il mio vecchio morini del 1962', 'upload/post1.JPG', 'GiammaC'),
('10', '2023-02-11 23:49:18', 'Ciao a tutti, sono Jorge Lorenzo 99\r\n', 'upload/post7.gif', 'j_lorenzo99'),
('11', '2023-02-11 23:51:34', 'Foto fatta con la GoPRO5', 'upload/post2.jpg', 'mario46'),
('12', '2023-02-11 23:53:06', 'Freestyle e impennate incredibili', 'upload/post9.jpg', 'marto99'),
('2', '2023-02-11 23:09:36', 'Una bella moto da Cross!!', 'upload/post6.jpg', 'GiammaC'),
('3', '2023-02-11 23:09:55', 'Mamma mia che caduta!!', 'upload/post5.gif', 'GiammaC'),
('4', '2023-02-11 23:14:03', 'In sella alla nuova moto!!', 'upload/post2.jpg', 'LoryBart'),
('5', '2023-02-11 23:14:35', 'Sognando un bel viaggio in moto.', 'upload/post8.jpg', 'LoryBart'),
('6', '2023-02-11 23:15:10', 'Guarda mamma!! senza mani... (senza denti)', 'upload/post9.jpg', 'LoryBart'),
('7', '2023-02-11 23:39:41', 'ciao, il mio primo post', 'upload/post3.jpg', 'franco_bello98'),
('8', '2023-02-11 23:43:21', 'jack mi ha rubato il casco haha 😂', 'upload/post10.jpg', 'giorgia23'),
('9', '2023-02-11 23:47:07', 'Che gara, mi ricordo come se fosse ieri!!!', 'upload/post4.gif', 'Gluca_68');

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

--
-- Dump dei dati per la tabella `review`
--

INSERT INTO `review` (`ReviewID`, `Review_text`, `Review_timestamp`, `Review_voto`, `TrackID`, `Username`) VALUES
('1', 'bello', '2023-02-12 00:12:17', '3', '11', 'marto99'),
('2', '', '2023-02-12 00:12:33', '0', '11', 'marto99'),
('3', '', '2023-02-12 00:12:44', '0', '11', 'marto99');

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
('1', 'MURAGLIONE lato Toscana', 'Dual', '2023-02-11 23:10:56', 35, 'Centro', 'upload/GPX_template.gpx', 'upload/track1_muraglione.PNG', 'GiammaC'),
('2', 'IL MOTTARONE', 'Road', '2023-02-11 23:11:33', 120, 'Nord', 'upload/GPX_template.gpx', 'upload/track2_mottarone.jfif', 'GiammaC'),
('3', 'LA CAMPAGNACCIA', 'Off-Road', '2023-02-11 23:12:00', 78, 'Sud', 'upload/GPX_template.gpx', 'upload/track9.png', 'GiammaC'),
('4', 'LA ROTTA', 'Dual', '2023-02-11 23:16:23', 123, 'Nord', 'upload/GPX_template.gpx', 'upload/track4.jpg', 'LoryBart'),
('5', '', 'Road', '2023-02-11 23:16:49', 66, 'Sud', 'upload/GPX_template.gpx', 'upload/track3_tonale.png', 'LoryBart'),
('6', 'Il giro della FOSSA', 'Dual', '2023-02-11 23:17:36', 98, 'Nord', 'upload/GPX_template.gpx', 'upload/track6.jpg', 'LoryBart'),
('7', 'IL BARETTO', 'Road', '2023-02-11 23:40:19', 35, 'Centro', 'upload/GPX_template.gpx', 'upload/track1_muraglione.PNG', 'franco_bello98'),
('8', 'IL giro del DRAGO', 'Dual', '2023-02-11 23:44:38', 198, 'Centro', 'upload/GPX_template.gpx', 'upload/track4.jpg', 'giorgia23'),
('9', 'BUSSECCHIO', 'Off-Road', '2023-02-11 23:47:46', 35, 'Nord', 'upload/GPX_template.gpx', 'upload/track9.png', 'Gluca_68'),
('10', 'IL CURVONE', 'Road', '2023-02-11 23:49:58', 46, 'Sud', 'upload/GPX_template.gpx', 'upload/track6.jpg', 'j_lorenzo99'),
('11', 'IL VELOCISSIMO', 'Dual', '2023-02-11 23:52:06', 14, 'Nord', 'upload/GPX_template.gpx', 'upload/track3_tonale.png', 'mario46'),
('12', 'IL GIROTONDO', 'Dual', '2023-02-11 23:53:39', 176, 'Sud', 'upload/GPX_template.gpx', 'upload/track4.jpg', 'marto99'),
('13', 'RATICOSA', 'Road', '2023-02-12 00:14:03', 30, 'Centro', 'upload/GPX_template.gpx', 'upload/track6.jpg', 'GiammaC');

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
('franco_bello98', 'fbello@gmail.com', 'c4128c79ec9e604bede50e9d696bc0165e38f44e2c8cd92bdfac785ebdef310e806c8e13f593ffa548fd1b6e43dd068b3fc5b8aba8c73dec2e8baec31bd5ac66', '0', '0', 'upload/login-default.jpg', 'b994d368652726e37851cab961ac72d30a45b85fc680be9ccc3f164b754b8333ec003458afd1c0d2b83308d3644a897a05533d1f8c3a548bfbb494fbf149a5a9'),
('GiammaC', 'giamma@gmail.com', '129041054f12420c2ec49356445090e3ac1bce43fc95dd13424a51693e3ab31e3389a2adf18b997b28a19df31dcb706c2de08b235b1d18a824bde18e693681cf', '0', '0', 'upload/login-default.jpg', '6fa0aa7449cd1ca5aa046c9c43c4f3d462a6d41382dfad6406986b8c4f18f205ff5c499d52c55a3144e423396549a86322b7ccce52328a5fbbb73303e79c8c5f'),
('giorgia23', 'giorgia@gmail.com', 'dbaa1f9fc8777f29e8130c087ef6f0539350c61ae81e4cb2b55d65de17bc67bf3e1f23e809bebb031bd7ac93a9a72f8d955c261ab065e63f33bed02e3e0f6328', '0', '0', 'upload/login-default.jpg', 'ab8f3b6079edcba79c4bd9cafb99af94ce906f1b5b04afd09a1d61ccd3ecf1e81080167af78ef93fb481872faff505868743ad5a43b9f852edc828b4d17f603c'),
('Gluca_68', 'luca@gmail.com', '0716d1fe3855de2310e0752415340fd1f2475b6fc49a6aa409da23402871152d01039673ee3cc3d90e2cdc85bf6051917a45298cf0ece6662b4ed8a477c5fec8', '0', '0', 'upload/login-default.jpg', 'bf7842c11e8b179e1dcbbc3b0cc0c60d9a3215b34bad90648d6ebf0ff5da1a6dc76b37f610a760a97ef30e4ef42b13e10cf1de60c34005dfedd0bce2405ac092'),
('j_lorenzo99', 'lorenzo@gmail.com', 'd650614e78e9be5ab0b8701da5b9ab4b1f075ec2a8048ca4661b2fa4db1f0f1a8dcf20b71fb57e04c7a7b7a64b7360aeeda242efc52e555fa8d920a68da0ba3e', '0', '0', 'upload/login-default.jpg', '23ce80925c529d128c29f39493c1a94314e18a16d47f67db7c407ff0469e6042be4f61439bd4ace4e651b807a51ec991e67e96decca1f833c98137ab5e0867da'),
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
