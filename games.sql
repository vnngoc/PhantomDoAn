-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220521.3d3010916e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 06:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc`
--

CREATE TABLE `acc` (
  `userID` int(11) NOT NULL,
  `userName` varchar(500) NOT NULL,
  `userEmail` varchar(500) NOT NULL,
  `userPass` varchar(500) NOT NULL,
  `userType` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc`
--

INSERT INTO `acc` (`userID`, `userName`, `userEmail`, `userPass`, `userType`) VALUES
(2, 'kusogaki', 'votanbao1912@gmail.com', '$2y$10$jUpDCUzY6UHa5tyCctZlDOd1RfjhkigETQqRQx3ezswFUc9mTBCnO', 'admin'),
(3, 'admin', 'votanbao1912@gmail.com', '$2y$10$w0BXnIBAPKFDIcYpHQGhxuvsR7E.1IR8Uef5ZMbwZMMX0Y6DNtZN6', 'admin'),
(4, 'chimchichchoe', 'chimhoinon@gmail.com', '$2y$10$MPKAimkKHmAZL6v9PJkHQO3hCL3hpnbtedYp5YXfW9Jr359f3N10y', 'user'),
(6, 'dangkhoa', 'dankkoa@gmail.com', '$2y$10$Imnp4ZnWNLCJ8c2TIYWZg.1ArsTokUxU/d1Oyrh.g8NqfjO4W33uq', 'admin'),
(7, 'minhngoc', 'bluepearl@gmail.com', '$2y$10$PHBo7FiHCT/nHLeLUuL5aOCMtPvVek0ijuFSssLBnvRE1gfRelbzK', 'admin'),
(8, 'giahan', 'hangia132@gmail.com', '$2y$10$wRhQSBPYko1fdZjfjfLBQOllXIBzym8yhyZIC7N5Ie3CArWYNlhwu', 'admin'),
(9, 'fakename', 'fkaeemail@gmail.com', '$2y$10$E5i7Dm2Il8m/XVMQ4FG9PO35n9539hroxShrTo06s3Px52y4QHrD.', 'user'),
(10, 'anotherfake', 'fakeanother@gmail.com', '$2y$10$p7fUYq5uzP7ltZ9jUlDY5.o.rdaEE0zeTtNck862VM4FNFX1Mvf7e', 'user'),
(11, 'matkhau', 'password444@gmail.com', '$2y$10$R4nyE3RCMvw5mgF2DDzFzeW2JaZhSXFGY6De6otNBW.fJwjRWvRZa', 'user'),
(12, 'CoDon', 'DonCoiMonMoi@gmail.com', '$2y$10$PW3Ri/ZDQbw/v7YrXTeyvOpK9EaXnEZsFnXNzQWXBaICOvCa17Ta6', 'admin'),
(14, 'taikhoanmoi', 'taikhoan@gmail.com', '$2y$10$nzebcuRaMj7/iy5AumRRl.s6lHoiwFbgElexpEdtcdQXLjoEwj.36', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `all-games`
--

CREATE TABLE `all-games` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `Tags` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'popular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all-games`
--

INSERT INTO `all-games` (`id`, `name`, `Tags`, `image`, `link`, `type`) VALUES
(18, 'Elden Ring', 'Adventure', 'https://i.imgur.com/q3mbLGE.png', 'EldenRing', 'trend'),
(19, 'Ghost of Tsushima', 'RPG', 'https://i.imgur.com/9XxuFVt.png', 'GOT', 'trend'),
(20, 'Metal Gear Rising:Revengeance', 'RPG', 'https://i.imgur.com/VyUTwW4.png', 'MGR', 'trend'),
(22, 'The Last Of Us', 'RPG', 'https://i.imgur.com/MWwjehp.png', 'TLOU', 'popular'),
(23, 'UNCHARTED 4', 'RPG', 'https://i.imgur.com/xbSXYt2.png', 'U4', 'popular'),
(24, 'Assasin Creed:Rogue', 'Action', 'https://i.imgur.com/uyKW6NR.png', 'AScreed', 'popular'),
(25, 'UnderTale', 'RPG', 'https://i.imgur.com/HTAJINb.png', 'Undertale', 'popular'),
(26, 'Deltarune', 'RPG', 'https://i.imgur.com/gIUHPgb.png', 'Deltarune', 'popular'),
(27, 'MegamanX', 'Action', 'https://i.imgur.com/n93bZx2.png', 'Mgman', 'popular'),
(28, 'Guilty Gear X2', 'Action', 'https://i.imgur.com/RQkR0SJ.png', 'GGXX', 'popular'),
(30, 'Portal 2', 'Puzzle', 'https://i.imgur.com/eUPTL5u.png', NULL, 'popular'),
(31, 'Muse Dash', 'Rhythm', 'https://i.imgur.com/xzdGklV.png', NULL, 'trend'),
(32, 'The Pink Poyo~', 'Horror', 'https://i.imgur.com/j2lJxiC.png', NULL, 'trend'),
(33, 'Gunny', 'FPS', 'https://i.imgur.com/RgqnbSN.png', NULL, 'trend'),
(35, 'Contra', 'FPS', 'https://i.imgur.com/1Zju3GQ.png', NULL, 'trend'),
(36, 'Half-life', 'FPS', 'https://i.imgur.com/VCjuqtO.png', NULL, 'trend'),
(37, 'Pokemon Emeral', 'RPG', 'https://i.imgur.com/eAYhVVr.png', NULL, 'trend'),
(38, 'Zingspeed', 'Rhythm', 'https://i.imgur.com/o992lgk.png', NULL, 'trend'),
(41, 'Friday Night Funkin', 'Rhythm', 'https://i.imgur.com/m8e3chu.png', NULL, 'popular'),
(42, 'Five Nights at Freddy\'s', 'Horror', 'https://i.imgur.com/HH2nQHs.png', NULL, 'popular'),
(43, 'Wii Sport', 'Sport', 'https://i.imgur.com/twzWQZ1.png', NULL, 'popular'),
(44, 'ARKNIGHTS', 'Strategy', 'https://i.imgur.com/5NHpSNo.png', NULL, 'popular'),
(45, 'PowerWash Simulator', 'Simulator', 'https://i.imgur.com/5JQXqP5.png', NULL, 'popular'),
(47, 'HaLo:Combat Evolved', 'FPS', 'https://i.imgur.com/fJo4SP9.png', '', 'popular'),
(48, 'We Were Here Together', 'Puzzle', 'https://i.imgur.com/THfvNkG.png', '', 'popular'),
(55, 'GTA V', 'RPG', 'https://i.imgur.com/l6JJQav.png', NULL, 'popular'),
(56, 'GTA 4', 'RPG', 'https://i.imgur.com/J6GC7lt.png', NULL, 'trend'),
(57, 'Nino Kuni', 'RPG', 'https://i.imgur.com/AgJl1b4.png', NULL, 'popular'),
(58, 'Hades', 'Action', 'https://i.imgur.com/TBjJATo.png', NULL, 'popular'),
(60, 'Minecraft', 'Horror', 'https://i.imgur.com/8Y45BFA.png', NULL, 'popular'),
(61, 'Ghostrunner', 'Action', 'https://i.imgur.com/SaWlbwG.png', NULL, 'popular'),
(62, 'Oblivion', 'RPG', 'https://i.imgur.com/cvZ7QN6.png', NULL, 'popular'),
(63, 'Skyrim', 'Adventure', 'https://i.imgur.com/OhJJjj5.png', NULL, 'popular'),
(64, 'Farcry 4', 'RPG', 'https://i.imgur.com/w1XO3bR.png', NULL, 'popular'),
(65, 'Outlast', 'Horror', 'https://i.imgur.com/Rz5fkgn.png', NULL, 'popular'),
(66, 'Outlast 2', 'Horror', 'https://i.imgur.com/asaHo0u.png', NULL, 'popular'),
(67, 'Resident Evil 8', 'Action', 'https://i.imgur.com/AC86xbX.png', NULL, 'popular'),
(68, 'Thief Simulator', 'Simulator', 'https://i.imgur.com/OdtcRqF.png', NULL, 'popular'),
(70, 'The forest', 'Survival', 'https://i.imgur.com/DWmwJnR.png', '', 'trend'),
(71, 'W2K22', 'Action', 'https://i.imgur.com/Uz4g0Jd.png', NULL, 'trend'),
(72, 'FIFA', 'Sport', 'https://i.imgur.com/J3NEabk.png', NULL, 'popular'),
(73, 'Hero 3', 'Strategy', 'https://i.imgur.com/D9rTnJx.png', NULL, 'popular'),
(74, 'Bloodborne', 'RPG', 'https://i.imgur.com/KFivDV5.png', '', 'popular'),
(76, 'Scorn', 'Strategy', 'https://i.imgur.com/efolvCQ.png', '', 'popular'),
(77, 'DokiDoki BigBang', 'Eroge', 'https://i.imgur.com/QFQXewq.png', '', 'popular');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `TagName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `TagName`) VALUES
(3, 'Action'),
(7, 'Adventure'),
(15, 'Eroge'),
(2, 'FPS'),
(4, 'Horror'),
(9, 'Puzzle'),
(12, 'Rhythm'),
(1, 'RPG'),
(8, 'Simulator'),
(5, 'Sport'),
(6, 'Strategy'),
(16, 'Survival');

-- --------------------------------------------------------

--
-- Table structure for table `countviews`
--

CREATE TABLE `countviews` (
  `ID` int(11) NOT NULL,
  `Dates` date NOT NULL,
  `VIEWS` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countviews`
--

INSERT INTO `countviews` (`ID`, `Dates`, `VIEWS`) VALUES
(1, '2022-12-06', 9),
(2, '2022-12-07', 4),
(3, '2022-12-08', 5),
(4, '2022-12-09', 10),
(5, '2022-12-10', 3),
(6, '2022-12-11', 4),
(7, '2022-12-12', 2),
(8, '2022-12-05', 8),
(9, '2022-12-13', 18),
(10, '2022-12-14', 7);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `idAcc` int(11) NOT NULL,
  `Title` varchar(500) DEFAULT NULL,
  `Content` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `all-games`
--
ALTER TABLE `all-games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AG` (`Tags`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `TagName` (`TagName`);

--
-- Indexes for table `countviews`
--
ALTER TABLE `countviews`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Dates` (`Dates`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Email` (`idAcc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc`
--
ALTER TABLE `acc`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `all-games`
--
ALTER TABLE `all-games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countviews`
--
ALTER TABLE `countviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `all-games`
--
ALTER TABLE `all-games`
  ADD CONSTRAINT `FK_AG` FOREIGN KEY (`Tags`) REFERENCES `category` (`TagName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `FK_Email` FOREIGN KEY (`idAcc`) REFERENCES `acc` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



