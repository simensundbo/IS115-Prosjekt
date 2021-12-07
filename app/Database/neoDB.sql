-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07. Des, 2021 17:22 PM
-- Tjener-versjon: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neo`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT 'NULL',
  `end_date` varchar(255) DEFAULT 'NULL',
  `responsible` int(11) DEFAULT NULL,
  `deputy_responsible` int(11) DEFAULT NULL,
  `finance_responsible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `activities`
--

INSERT INTO `activities` (`id`, `name`, `location`, `start_date`, `end_date`, `responsible`, `deputy_responsible`, `finance_responsible`) VALUES
(13, ' Fotball', NULL, 'NULL', 'NULL', NULL, NULL, NULL),
(14, ' Frisbee', NULL, 'NULL', 'NULL', NULL, NULL, NULL),
(16, ' Frisbee', 'Eg', '2021-12-14', '2021-12-22', 1, 3, 11),
(17, ' Frisbee', 'Krs', '2021-12-07', '2021-12-14', 1, 3, 11),
(18, 'Håndball', 'Søm', '2021-11-30', '2021-12-06', 1, 20, 3);

-- --------------------------------------------------------

--
-- Erstatningsstruktur for visning `activities_view`
-- (See below for the actual view)
--
CREATE TABLE `activities_view` (
`id` int(11)
,`name` varchar(255)
,`location` varchar(255)
,`start_date` varchar(255)
,`end_date` varchar(255)
,`responsible` int(11)
,`deputy_responsible` int(11)
,`finance_responsible` int(11)
,`AnsFname` varchar(255)
,`AnsLname` varchar(255)
,`NestFname` varchar(255)
,`NestLname` varchar(255)
,`MatAnsFname` varchar(255)
,`MatAnsLname` varchar(255)
);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `interests`
--

INSERT INTO `interests` (`id`, `name`) VALUES
(1, 'Fotball'),
(2, 'Basketball'),
(3, 'Frisbee'),
(4, 'Dans'),
(5, 'Gaming'),
(6, 'Musikk'),
(7, 'Svømming'),
(8, 'Løping'),
(9, 'Snowboard'),
(10, 'Ski'),
(11, 'Håndball'),
(12, 'Crossfit'),
(13, 'Koding'),
(14, 'Styrketrening');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `post_code` int(4) DEFAULT NULL,
  `post_area` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_nr` int(11) DEFAULT NULL,
  `contingent_status` varchar(255) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `member_since` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `street_name`, `post_code`, `post_area`, `email`, `mobile_nr`, `contingent_status`, `user_id`, `dob`, `gender`, `member_since`) VALUES
(1, 'Rikke', 'Solvang', 'St. Olavs vei 7', 4631, 'Kristiansand', 'rikke_solvang@hotmail.com', 94197823, '1', NULL, '2012-02-01', 'Dame', '2021-11-23 22:07:39'),
(3, 'Simen', 'Sundbø', 'St. Olavs vei 13', 4631, 'Kristiansand', 'simens@uia.no', 12345678, '1', NULL, '1999-10-12', 'Mann', '2020-11-23 22:07:39'),
(11, 'Pernille', 'Lundquist', 'St. Olavs vei 13C', 4631, 'Kristiansand', 'Pernille.lundquist@gmail.com', 99856423, '0', NULL, '1998-09-27', 'Dame', '2021-11-23 22:07:39'),
(16, 'Andreas', 'Martinsen', 'Urds Vei', 4630, 'Kristiansand', 'Andreas@live.no', 96542132, '0', NULL, '1996-12-01', 'Mann', '2021-12-02 17:32:35'),
(17, 'Simen', 'Tryfoss', 'St. Olavs vei 3C', 4631, 'Kristiansand', 'simZ@live.no', 98562232, '0', NULL, '1999-05-27', 'Mann', '2021-12-02 17:33:40'),
(18, 'Jonas', 'Fidjeland', 'Hyllelien 17', 4631, 'Kristiansand', 'JonasF@outlook.com', 89061025, '1', NULL, '1999-05-23', 'Mann', '2021-12-02 17:34:38'),
(19, 'Maren', 'Lislevand', 'StadioVeien', 4631, 'Kristiansand', 'Maren@test.no', 99852133, '0', NULL, '1999-03-12', 'Mann', '2021-12-02 17:35:47'),
(20, 'Sondre', 'Monge', 'Marviksveien 13', 4631, 'Kristiansand', 'Sondre@live.no', 99556622, '0', NULL, '1999-05-31', 'Mann', '2021-12-02 17:36:46'),
(40, 'Ola', 'Halvorsen', 'St. Olavs vei 13C', 4631, 'Kristiansand', 'Ola@live.no', 99874512, '0', NULL, '2021-12-02', 'Dame', '2021-12-02 17:39:56'),
(41, 'Elias', 'Gauslaa', 'Urds Vei', 4630, 'Kristiansand', 'EliasG@live.no', 12345678, '0', NULL, '2021-12-03', 'Mann', '2021-12-03 15:58:41'),
(42, 'eli', 'Gauslaa', 'Urds Vei', 4630, 'Kristiansand', 'Elias2@live.no', 12345678, '0', NULL, '2021-12-03', 'Mann', '2021-12-03 15:59:01'),
(44, 'k2', 'Sundbø', 'St. Olavs vei 13C', 4631, 'Kristiansand', 'sim123@live.no', 99421023, '0', NULL, '2021-12-03', 'Mann', '2021-12-03 16:01:33');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `mem_activity`
--

CREATE TABLE `mem_activity` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `mem_activity`
--

INSERT INTO `mem_activity` (`id`, `activity_id`, `member_id`) VALUES
(1, 16, 3),
(2, 16, 11);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `mem_interests`
--

CREATE TABLE `mem_interests` (
  `id` int(11) NOT NULL,
  `interest_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `mem_interests`
--

INSERT INTO `mem_interests` (`id`, `interest_id`, `member_id`) VALUES
(1, 3, 3),
(3, 7, 3),
(4, 5, 3),
(5, 5, 1),
(6, 14, 17);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'simen', '$2y$10$al3Fdp2EDfh797apJmooIuhx8Hc.x7dHRarDDSD91Ub8r9JYP9uSK'),
(2, NULL, '$2y$10$7ZZ2Pso3mBnZvBmZWF/dr.A7mrloDYrEzFumHKXHY1Pxk2Zl1/W3O'),
(3, 'rikke', '$2y$10$KVE5u3I.Z34aaHEqXogphOL8Ygjhl0YpHMpkxW9R9TcQQUKKRof36');

-- --------------------------------------------------------

--
-- Visningsstruktur `activities_view`
--
DROP TABLE IF EXISTS `activities_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activities_view`  AS SELECT `activities`.`id` AS `id`, `activities`.`name` AS `name`, `activities`.`location` AS `location`, `activities`.`start_date` AS `start_date`, `activities`.`end_date` AS `end_date`, `activities`.`responsible` AS `responsible`, `activities`.`deputy_responsible` AS `deputy_responsible`, `activities`.`finance_responsible` AS `finance_responsible`, `ansvarlig`.`fname` AS `AnsFname`, `ansvarlig`.`lname` AS `AnsLname`, `nestleder`.`fname` AS `NestFname`, `nestleder`.`lname` AS `NestLname`, `matansvarlig`.`fname` AS `MatAnsFname`, `matansvarlig`.`lname` AS `MatAnsLname` FROM (((`activities` join `members` `ansvarlig` on(`activities`.`responsible` = `ansvarlig`.`id`)) join `members` `nestleder` on(`activities`.`deputy_responsible` = `nestleder`.`id`)) join `members` `matansvarlig` on(`activities`.`finance_responsible` = `matansvarlig`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsible` (`responsible`),
  ADD KEY `deputy_responsible` (`deputy_responsible`),
  ADD KEY `finance_responsible` (`finance_responsible`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bruker_id` (`user_id`);

--
-- Indexes for table `mem_activity`
--
ALTER TABLE `mem_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_id` (`activity_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `mem_interests`
--
ALTER TABLE `mem_interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_id` (`interest_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `mem_activity`
--
ALTER TABLE `mem_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mem_interests`
--
ALTER TABLE `mem_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`responsible`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`deputy_responsible`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `activities_ibfk_3` FOREIGN KEY (`finance_responsible`) REFERENCES `members` (`id`);

--
-- Begrensninger for tabell `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
