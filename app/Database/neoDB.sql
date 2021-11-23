-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23. Nov, 2021 22:22 PM
-- Tjener-versjon: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
  `startdato` varchar(255) DEFAULT 'NULL',
  `sluttdato` varchar(255) DEFAULT 'NULL',
  `ansvarlig` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `activities`
--

INSERT INTO `activities` (`id`, `name`, `startdato`, `sluttdato`, `ansvarlig`) VALUES
(1, 'Volleyball', NULL, NULL, NULL),
(2, 'Fotball', '2021-11-12', '2021-11-19', 1),
(6, ' TEST', '2021-11-12', '2021-11-13', 1),
(8, ' TEST2', '2021-11-12', '2021-11-14', 3);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `aktivity_id` int(11) DEFAULT NULL,
  `interest_id` int(11) DEFAULT NULL,
  `contingent_status` varchar(255) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `member_since` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `street_name`, `post_code`, `post_area`, `email`, `mobile_nr`, `aktivity_id`, `interest_id`, `contingent_status`, `user_id`, `dob`, `gender`, `member_since`) VALUES
(1, 'Rikke', 'Solvang', 'St. Olavs vei 7', 4631, 'Kristiansand', 'rikke_solvang@hotmail.com', 94197823, NULL, NULL, NULL, NULL, '2012-02-01', 'Dame', '2021-11-23 22:07:39'),
(3, 'Simen', 'Sundbø', 'St. Olavs vei 13', 4631, 'Kristiansand', 'simens@uia.no', 12345678, NULL, NULL, '1', NULL, '1999-10-12', 'Mann', '2020-11-23 22:07:39'),
(11, 'Pernille', 'Lundquist', 'St. Olavs vei 13C', 4631, 'Kristiansand', 'Pernille.lundquist@gmail.com', 99856423, NULL, NULL, '1', NULL, '1998-09-27', 'Dame', '2021-11-23 22:07:39'),
(13, 'Test', 'Testen', 'St. Olavs vei 13C', 4631, 'Kristiansand', 'test@test.com', 99421022, NULL, NULL, NULL, NULL, '2021-11-23', 'Mann', '2021-11-23 22:07:39'),
(14, 'Elias', 'Gauslaa', 'Urds Vei', 4630, 'Kristiansand', 'EliasG@live.no', 12345678, NULL, NULL, '1', NULL, '2021-11-23', 'Mann', '2021-11-23 22:09:01');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `mem_activity`
--

CREATE TABLE `mem_activity` (
  `activity_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `mem_interests`
--

CREATE TABLE `mem_interests` (
  `interest_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `mem_role`
--

CREATE TABLE `mem_role` (
  `role_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ansvarlig` (`ansvarlig`);

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
  ADD KEY `aktivitet_id` (`aktivity_id`),
  ADD KEY `interesse_id` (`interest_id`),
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
-- Indexes for table `mem_role`
--
ALTER TABLE `mem_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mem_activity`
--
ALTER TABLE `mem_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mem_interests`
--
ALTER TABLE `mem_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mem_role`
--
ALTER TABLE `mem_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`ansvarlig`) REFERENCES `members` (`id`);

--
-- Begrensninger for tabell `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`aktivity_id`) REFERENCES `activities` (`id`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`),
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Begrensninger for tabell `mem_activity`
--
ALTER TABLE `mem_activity`
  ADD CONSTRAINT `mem_activity_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`),
  ADD CONSTRAINT `mem_activity_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Begrensninger for tabell `mem_interests`
--
ALTER TABLE `mem_interests`
  ADD CONSTRAINT `mem_interests_ibfk_1` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`),
  ADD CONSTRAINT `mem_interests_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Begrensninger for tabell `mem_role`
--
ALTER TABLE `mem_role`
  ADD CONSTRAINT `mem_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `mem_role_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
