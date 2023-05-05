  -- phpMyAdmin SQL Dump
  -- version 5.2.0
  -- https://www.phpmyadmin.net/
  --
  -- Host: 127.0.0.1
  -- Generation Time: Apr 29, 2023 at 05:54 AM
  -- Server version: 10.4.27-MariaDB
  -- PHP Version: 8.2.0

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Database: `sql9615618`
  --

  -- --------------------------------------------------------

  --
  -- Table structure for table `accounts`
  --

  CREATE TABLE `accounts` (
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `uid` int(11) NOT NULL,
    `email` varchar(255) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `accounts`
  --

  INSERT INTO `accounts` (`username`, `password`, `uid`, `email`) VALUES
  ('doanlng', '16119192315184', 3, 'doanlng1@gmail.com'),
  ('doangrant', '162315184', 0, 'doangrant@gmail.com');

  -- --------------------------------------------------------

  --
  -- Table structure for table `album`
  --

  CREATE TABLE `album` (
    `AlID` int(11) NOT NULL,
    `AID` int(11) NOT NULL,
    `Length` time DEFAULT NULL,
    `Name` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `album`
  --

  INSERT INTO `album` (`AlID`, `AID`, `Length`, `Name`) VALUES
  (1, 15, '00:03:50', 'Jack'),
  (2, 3, '00:04:18', 'Jin'),
  (3, 10, '00:02:03', 'Chase'),
  (4, 9, '00:01:20', 'Vivi'),
  (5, 13, '00:01:50', 'Rob'),
  (6, 20, '00:02:56', 'Mike'),
  (7, 19, '00:00:00', 'Nick'),
  (8, 16, '00:02:43', 'Gardia'),
  (9, 14, '00:00:00', 'Mars'),
  (10, 12, '00:00:00', 'Vamsi'),
  (11, 1, '00:01:12', 'Hody'),
  (12, 1, '00:00:07', 'Jones'),
  (13, 2, '00:00:45', 'Jordan'),
  (14, 11, '00:01:01', 'Vast'),
  (15, 14, '00:01:07', 'Belle'),
  (16, 17, '00:05:10', 'Gordon'),
  (17, 3, '00:04:10', 'Deem'),
  (18, 8, '00:00:00', 'Dustin'),
  (19, 15, '00:00:00', 'Drake'),
  (20, 18, '00:00:00', 'Jagon');

  -- --------------------------------------------------------

  --
  -- Table structure for table `artist`
  --

  CREATE TABLE `artist` (
    `AID` int(11) NOT NULL,
    `VERIFIED` tinyint(1) DEFAULT 0,
    `ABOUT` varchar(250) DEFAULT 'No bio',
    `NEXT_TOUR_DATE` datetime DEFAULT NULL,
    `NEXT_TOUR_LOCATION` varchar(10) DEFAULT NULL,
    `Name` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `artist`
  --

  INSERT INTO `artist` (`AID`, `VERIFIED`, `ABOUT`, `NEXT_TOUR_DATE`, `NEXT_TOUR_LOCATION`, `Name`) VALUES
  (1, 1, 'Digitized 3rd generation productivity', '0000-00-00 00:00:00', 'San Pablo', 'Kozey, Wuckert and Wilkinson'),
  (2, 0, 'Stand-alone logistical solution', '0000-00-00 00:00:00', 'New York', 'Cartwright'),
  (3, 0, 'Profound asymmetric support', '0000-00-00 00:00:00', 'Dallas', 'O\'Kon, Gerlach and Sporer'),
  (4, 0, 'Cloned empowering throughput', '0000-00-00 00:00:00', 'Iwo', 'Lueilwitz Band'),
  (5, 1, 'Universal cohesive success', '0000-00-00 00:00:00', 'Houston', 'Kovacek-Oberbrunner'),
  (6, 0, 'Digitized mission-critical projection', '0000-00-00 00:00:00', 'Portland', 'Crooks, Sanford and Daniel'),
  (7, 0, 'Multi-layered leading edge projection', '0000-00-00 00:00:00', 'Geldrop', 'Rolfson-Ryan'),
  (8, 0, 'Open-architected needs-based strategy', '0000-00-00 00:00:00', 'Mexico Cit', 'Frami-Wisoky'),
  (9, 0, 'Front-line dedicated solution', '0000-00-00 00:00:00', 'Dzhebariki', 'Corkery Kids'),
  (10, 0, 'Function-based explicit intranet', '0000-00-00 00:00:00', 'London', 'Walker, Weissnat and Pouros'),
  (11, 0, 'Right-sized uniform application', '0000-00-00 00:00:00', 'Magarao', 'Buckridge'),
  (12, 0, 'Multi-channelled eco-centric implementation', '0000-00-00 00:00:00', 'Los Angele', 'Reinger'),
  (13, 0, 'Reduced encompassing challenge', '0000-00-00 00:00:00', 'Hudong', 'The Rice Gang'),
  (14, 1, 'Implemented asynchronous algorithm', '0000-00-00 00:00:00', 'Bang Rak', 'Mueller, Davis and Goldner'),
  (15, 0, 'Multi-lateral human-resource open architecture', '0000-00-00 00:00:00', 'Kunwi', 'Kautzer-Stoltenberg'),
  (16, 0, 'Down-sized leading edge workforce', '0000-00-00 00:00:00', 'Ronggui', 'Flatley Flats'),
  (17, 0, 'Innovative 3rd generation customer loyalty', '0000-00-00 00:00:00', 'Wanzhai', 'Crooks and Sons'),
  (18, 0, 'Inverse composite superstructure', '0000-00-00 00:00:00', 'Nangka', 'Maggio, Lynch and Botsford'),
  (19, 0, 'Organized hybrid capability', '0000-00-00 00:00:00', 'Chicago', 'Feil and Sons'),
  (20, 1, 'Progressive tertiary migration', '0000-00-00 00:00:00', 'Haarlem', 'Larkin Barkin');

  -- --------------------------------------------------------

  --
  -- Table structure for table `befriends`
  --

  CREATE TABLE `befriends` (
    `UID_1` int(11) NOT NULL,
    `UID_2` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `befriends`
  --

  INSERT INTO `befriends` (`UID_1`, `UID_2`) VALUES
  (8, 2),
  (16, 6);

  -- --------------------------------------------------------

  --
  -- Table structure for table `collaborate`
  --

  CREATE TABLE `collaborate` (
    `AID1` int(11) NOT NULL,
    `AID2` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `collaborate`
  --

  INSERT INTO `collaborate` (`AID1`, `AID2`) VALUES
  (17, 16),
  (2, 12);

  -- --------------------------------------------------------

  --
  -- Table structure for table `follows`
  --

  CREATE TABLE `follows` (
    `UID` int(11) NOT NULL,
    `AID` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `follows`
  --

  INSERT INTO `follows` (`UID`, `AID`) VALUES
  (18, 7),
  (13, 20);

  -- --------------------------------------------------------

  --
  -- Table structure for table `listener`
  --

  CREATE TABLE `listener` (
    `UID` int(11) NOT NULL,
    `Time_stamp` time DEFAULT NULL,
    `Name` varchar(255) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `listener`
  --

  INSERT INTO `listener` (`UID`, `Time_stamp`, `Name`) VALUES
  (1, '00:07:46', 'Barbra Tayloe'),
  (2, '00:00:00', 'Gratia Cains'),
  (3, '00:00:14', 'Augie Basson'),
  (4, '00:00:00', 'Kylie Murton'),
  (5, '00:03:31', 'Hurleigh Joesbury'),
  (6, '00:07:12', 'Tandie Roblett'),
  (7, '00:00:00', 'Deeann Allanby'),
  (8, '00:06:50', 'Henrieta Lerohan'),
  (9, '00:01:17', 'Nathanil Eldritt'),
  (10, '00:00:00', 'Tremain Maynell'),
  (11, '00:05:21', 'Stephannie Shepperd'),
  (12, '00:00:00', 'Regan Kiellor'),
  (13, '00:08:29', 'Reggi Marnane'),
  (14, '00:08:42', 'Wilhelm Zanni'),
  (15, '00:00:00', 'Olympie Aggs'),
  (16, '00:00:00', 'Lincoln Mawby'),
  (17, '00:04:06', 'Emmi Rotham'),
  (18, '00:00:19', 'Cicily Imlock'),
  (19, '00:00:00', 'Munroe Planks'),
  (20, '00:00:00', 'Angele Stoddart');

  -- --------------------------------------------------------

  --
  -- Table structure for table `personal_library`
  --

  CREATE TABLE `personal_library` (
    `OWNUSER` int(11) NOT NULL,
    `AVAILABLE_OFFLINE` tinyint(1) NOT NULL DEFAULT 0
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `personal_library`
  --

  INSERT INTO `personal_library` (`OWNUSER`, `AVAILABLE_OFFLINE`) VALUES
  (1, 1),
  (11, 0);

  -- --------------------------------------------------------

  --
  -- Table structure for table `playlist`
  --

  CREATE TABLE `playlist` (
    `PLAYLIST_ID` int(10) UNSIGNED NOT NULL,
    `NAME` varchar(50) NOT NULL,
    `OWNING_USER` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `playlist`
  --

  INSERT INTO `playlist` (`PLAYLIST_ID`, `NAME`, `OWNING_USER`) VALUES
  (1, 'Nathanil\'s Playlist', 9),
  (2, 'Cool Regan Playlist', 12),
  (3, 'Augie\'s Playlist', 3),
  (4, 'Kylie\'s Playlist', 4);

  -- --------------------------------------------------------

  --
  -- Table structure for table `podcast`
  --

  CREATE TABLE `podcast` (
    `PID` int(11) NOT NULL,
    `AID` int(11) NOT NULL,
    `length` time DEFAULT NULL,
    `bookmark` time DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `podcast`
  --

  INSERT INTO `podcast` (`PID`, `AID`, `length`, `bookmark`) VALUES
  (1, 2, '00:06:39', '00:03:43'),
  (2, 15, '00:05:42', '00:02:34'),
  (3, 14, '00:05:43', '00:02:11'),
  (4, 12, '00:04:09', '00:03:13'),
  (5, 16, '00:04:14', '00:02:16');

  -- --------------------------------------------------------

  --
  -- Table structure for table `song`
  --

  CREATE TABLE `song` (
    `TID` int(10) UNSIGNED NOT NULL,
    `LENGTH` time NOT NULL DEFAULT '00:00:00',
    `GENRE` varchar(50) DEFAULT NULL,
    `AID` int(11) NOT NULL,
    `RELEASE_DATE` datetime NOT NULL,
    `Name` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `song`
  --

  INSERT INTO `song` (`TID`, `LENGTH`, `GENRE`, `AID`, `RELEASE_DATE`, `Name`) VALUES
  (1, '00:03:32', 'Electronic', 1, '2022-05-30 21:13:40', 'Bytecard'),
  (2, '00:04:54', 'Reggae', 2, '2022-08-17 16:07:03', 'Zoolab'),
  (3, '00:00:00', 'Electronic', 3, '2022-08-06 00:52:25', 'Voltsillam'),
  (4, '00:05:26', 'Pop', 4, '2022-10-27 00:30:22', 'Subin'),
  (5, '00:02:57', 'Rock', 5, '2022-10-19 14:40:47', 'It'),
  (6, '00:00:00', 'Pop', 6, '2022-08-16 23:06:25', 'Lotlux'),
  (7, '00:00:07', 'Rock', 7, '2022-12-07 18:39:10', 'Rank'),
  (8, '00:01:06', 'Reggae', 8, '2023-01-16 17:34:52', 'Mat Lam Tam'),
  (9, '00:07:53', 'Electronic', 9, '2023-01-28 13:43:18', 'Namfix'),
  (10, '00:00:00', 'Reggae', 10, '2023-02-11 11:51:48', 'Pannier'),
  (11, '00:07:20', 'Electronic', 11, '2023-02-05 15:11:38', 'Voltsillam'),
  (12, '00:07:17', 'Pop', 12, '2022-10-09 14:35:05', 'Matsoft'),
  (13, '00:06:53', 'Pop', 13, '2022-12-06 19:19:52', 'Sonair'),
  (14, '00:04:57', 'Rock', 14, '2022-08-13 22:29:19', 'Matsoft'),
  (15, '00:00:00', 'Reggae', 15, '2022-05-26 21:01:41', 'Hatity'),
  (16, '00:00:09', 'Electronic', 16, '2022-12-21 13:30:21', 'Cookley'),
  (17, '00:02:35', 'Pop', 17, '2023-03-03 23:04:38', 'Latlux'),
  (18, '00:00:00', 'Rock', 18, '2022-07-01 10:26:27', 'Cardguard'),
  (19, '00:06:52', 'Reggae', 19, '2023-03-06 19:46:56', 'Viva'),
  (20, '00:00:00', 'Reggae', 20, '2023-01-16 16:53:51', 'Asoka');

  -- --------------------------------------------------------

  --
  -- Table structure for table `song_playlist`
  --

  CREATE TABLE `song_playlist` (
    `song` int(10) UNSIGNED DEFAULT NULL,
    `playlist` int(10) UNSIGNED DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

  --
  -- Dumping data for table `song_playlist`
  --

  INSERT INTO `song_playlist` (`song`, `playlist`) VALUES
  (1, 1),
  (2, 1),
  (3, 1),
  (4, 1),
  (5, 1),
  (2, 1),
  (2, 2),
  (3, 3),
  (4, 4),
  (5, 5),
  (6, 5),
  (7, 5),
  (8, 6);

  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `accounts`
  --
  ALTER TABLE `accounts`
    ADD UNIQUE KEY `email` (`email`),
    ADD KEY `uid` (`uid`);

  --
  -- Indexes for table `album`
  --
  ALTER TABLE `album`
    ADD PRIMARY KEY (`AlID`),
    ADD KEY `AID` (`AID`);

  --
  -- Indexes for table `artist`
  --
  ALTER TABLE `artist`
    ADD PRIMARY KEY (`AID`);

  --
  -- Indexes for table `befriends`
  --
  ALTER TABLE `befriends`
    ADD KEY `UID_1` (`UID_1`),
    ADD KEY `UID_2` (`UID_2`);

  --
  -- Indexes for table `collaborate`
  --
  ALTER TABLE `collaborate`
    ADD KEY `AID1` (`AID1`),
    ADD KEY `AID2` (`AID2`);

  --
  -- Indexes for table `follows`
  --
  ALTER TABLE `follows`
    ADD KEY `UID` (`UID`),
    ADD KEY `AID` (`AID`);

  --
  -- Indexes for table `listener`
  --
  ALTER TABLE `listener`
    ADD PRIMARY KEY (`UID`);

  --
  -- Indexes for table `personal_library`
  --
  ALTER TABLE `personal_library`
    ADD PRIMARY KEY (`OWNUSER`);

  --
  -- Indexes for table `playlist`
  --
  ALTER TABLE `playlist`
    ADD PRIMARY KEY (`PLAYLIST_ID`),
    ADD KEY `OWNING_USER` (`OWNING_USER`);

  --
  -- Indexes for table `podcast`
  --
  ALTER TABLE `podcast`
    ADD PRIMARY KEY (`PID`),
    ADD KEY `AID` (`AID`);

  --
  -- Indexes for table `song`
  --
  ALTER TABLE `song`
    ADD PRIMARY KEY (`TID`),
    ADD KEY `AID` (`AID`);
  ALTER TABLE `song` ADD FULLTEXT KEY `GENRE` (`GENRE`);
  ALTER TABLE `song` ADD FULLTEXT KEY `GENRE_2` (`GENRE`);

  --
  -- Indexes for table `song_playlist`
  --
  ALTER TABLE `song_playlist`
    ADD KEY `song` (`song`),
    ADD KEY `playlist` (`playlist`);

  --
  -- AUTO_INCREMENT for dumped tables
  --

  --
  -- AUTO_INCREMENT for table `artist`
  --
  ALTER TABLE `artist`
    MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

  --
  -- AUTO_INCREMENT for table `playlist`
  --
  ALTER TABLE `playlist`
    MODIFY `PLAYLIST_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

  --
  -- AUTO_INCREMENT for table `song`
  --
  ALTER TABLE `song`
    MODIFY `TID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

  --
  -- Constraints for dumped tables
  --

  --
  -- Constraints for table `album`
  --
  ALTER TABLE `album`
    ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `artist` (`AID`);

  --
  -- Constraints for table `befriends`
  --
  ALTER TABLE `befriends`
    ADD CONSTRAINT `befriends_ibfk_1` FOREIGN KEY (`UID_1`) REFERENCES `listener` (`UID`),
    ADD CONSTRAINT `befriends_ibfk_2` FOREIGN KEY (`UID_2`) REFERENCES `listener` (`UID`);

  --
  -- Constraints for table `collaborate`
  --
  ALTER TABLE `collaborate`
    ADD CONSTRAINT `collaborate_ibfk_1` FOREIGN KEY (`AID1`) REFERENCES `artist` (`AID`),
    ADD CONSTRAINT `collaborate_ibfk_2` FOREIGN KEY (`AID2`) REFERENCES `artist` (`AID`);

  --
  -- Constraints for table `follows`
  --
  ALTER TABLE `follows`
    ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `listener` (`UID`),
    ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`AID`) REFERENCES `artist` (`AID`);

  --
  -- Constraints for table `personal_library`
  --
  ALTER TABLE `personal_library`
    ADD CONSTRAINT `personal_library_ibfk_1` FOREIGN KEY (`OWNUSER`) REFERENCES `listener` (`UID`);

  --
  -- Constraints for table `playlist`
  --
  ALTER TABLE `playlist`
    ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`OWNING_USER`) REFERENCES `listener` (`UID`);

  --
  -- Constraints for table `podcast`
  --
  ALTER TABLE `podcast`
    ADD CONSTRAINT `podcast_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `artist` (`AID`);

  --
  -- Constraints for table `song`
  --
  ALTER TABLE `song`
    ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `artist` (`AID`);
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
