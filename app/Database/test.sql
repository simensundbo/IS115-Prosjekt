-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11. Okt, 2021 13:34 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `aktiviteter`
--

CREATE TABLE `aktiviteter` (
  `id` int(11) NOT NULL,
  `navn` varchar(200) NOT NULL,
  `ansvarlig` varchar(200) NOT NULL,
  `start` date DEFAULT NULL,
  `slutt` date DEFAULT NULL,
  `beskrivelse` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `aktiviteter`
--

INSERT INTO `aktiviteter` (`id`, `navn`, `ansvarlig`, `start`, `slutt`, `beskrivelse`) VALUES
(1, 'Tennis', 'Simen Sundbø', '2021-10-20', '2021-10-30', 'Tennis Turnering'),
(2, 'Frisbee Golf', 'Elias Gauslaa', '2021-10-14', '2021-10-17', 'Frisbee Turnering'),
(3, 'Fotball', 'Andreas Martinsen', '2021-10-20', '2021-10-30', 'Fotball for ungdommer under 18år'),
(4, 'styrketrening', 'Simen Sundbø', '2021-05-20', '2021-05-21', 'Styrke med gutta!'),
(5, 'Bordtennis', 'Jonas F', '2021-11-20', '2021-11-20', 'Turnering'),
(7, 'Sykling', 'Simen Sundbø', '2021-10-01', '2021-10-01', 'Tur'),
(8, 'Gåtur', 'Simen Sundbø', '2021-09-30', '2021-10-01', 'Gåtur');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `brukere`
--

CREATE TABLE `brukere` (
  `id` int(11) NOT NULL,
  `bruker_navn` varchar(200) NOT NULL,
  `bruker_passord` varchar(200) NOT NULL,
  `medlem_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `brukere`
--

INSERT INTO `brukere` (`id`, `bruker_navn`, `bruker_passord`, `medlem_id`) VALUES
(8, 'simsun', '$2y$10$h0lYvtltClxKC/xw5qpbbuiXnBLuzuWY62b6LJ2.5tL/biwd6ZMj.', NULL),
(9, 'simen', '$2y$10$NVxF6hX1s4IJfp9gv7EFLe6apMVNPMgHR4B0kibp5I3R/PQ2DjPJK', NULL),
(10, 'Jonas', '$2y$10$fEEFgyaUsoRRPjpf0CuLzOSFa4YmivdVXmvyt03R7vMc5FQ.cECIS', NULL),
(11, 'Elias', '$2y$10$Yg9k.cfIwotTw2/mH9QvU.UEpt2DJejYcEEl25C1bByQSmGkyqOgm', NULL),
(12, 'ola', '$2y$10$xow7sPwC0pmb9i8NEv3Pget3EGsHz95soTqro13TcMNvPaz04f4.S', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `interesser`
--

CREATE TABLE `interesser` (
  `id` int(11) NOT NULL,
  `navn` varchar(100) NOT NULL,
  `medlemmsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `interesser`
--

INSERT INTO `interesser` (`id`, `navn`, `medlemmsId`) VALUES
(1, 'Tennis', 1),
(2, 'Frisbee', 1),
(3, 'Gaming', 2),
(4, 'Trening', 2),
(5, 'Løping', 3),
(6, 'Lesing', 3),
(7, 'Frisbee', 3),
(8, 'Frisbee', 4),
(9, 'Fiske', 4),
(10, 'Fotball', 5),
(11, 'Frisbee', 5);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `medlemmer`
--

CREATE TABLE `medlemmer` (
  `id` int(11) NOT NULL,
  `fornavn` varchar(254) NOT NULL,
  `etternavn` varchar(254) NOT NULL,
  `epost` varchar(254) NOT NULL,
  `mobilnr` int(8) NOT NULL,
  `adresse` varchar(254) NOT NULL,
  `postnr` int(4) NOT NULL,
  `poststed` varchar(254) NOT NULL,
  `fødselsdato` date NOT NULL,
  `kjønn` varchar(10) NOT NULL,
  `betalt` int(1) DEFAULT 0,
  `medlemsdato` timestamp NOT NULL DEFAULT current_timestamp(),
  `brukernavn` varchar(50) NOT NULL,
  `passord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `medlemmer`
--

INSERT INTO `medlemmer` (`id`, `fornavn`, `etternavn`, `epost`, `mobilnr`, `adresse`, `postnr`, `poststed`, `fødselsdato`, `kjønn`, `betalt`, `medlemsdato`, `brukernavn`, `passord`) VALUES
(1, 'Simen', 'Sundbø', 'test@test.no', 99543212, 'Test 13', 6566, 'Kristiansand', '1999-10-12', 'Mann', 1, '2021-09-28 20:47:33', 'Simen', 'test'),
(2, 'Simen', 'Tryfoss', 'test@test', 99776623, 'Test 12', 2122, 'Kristiansand', '1999-05-26', 'Mann', 0, '2021-09-28 20:48:56', 'SimenT', 'test'),
(3, 'Jonas', 'Fidjeland', 'test@test', 99776623, 'Test 12', 2122, 'Kristiansand', '1998-05-26', 'Mann', 0, '2021-09-28 20:52:51', 'JonasS', 'test'),
(4, 'Elias', 'Gauslaa', 'w@l.no', 99554433, 'q', 1234, 'KRISTIANSAND S', '2021-09-29', 'Mann', 0, '2021-09-29 11:35:27', 'Elias1', 'wasd'),
(5, 'Andreas', 'Martinsen', 'andreas@test.no', 99554433, 'Test 12', 2122, 'KRISTIANSAND S', '1996-09-30', 'Mann', 1, '2021-09-28 20:52:51', 'Andreas1', 'pass'),
(13, 'Simen2', 'Sundbø', 'sim123@live.no', 7895544, 'St. Olavs vei 13C', 4561, 'KRISTIANSAND S', '2021-10-01', 'Mann', 0, '2021-10-01 15:09:27', 'sim', 'wasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktiviteter`
--
ALTER TABLE `aktiviteter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brukere`
--
ALTER TABLE `brukere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brukere_bruker_navn_uindex` (`bruker_navn`),
  ADD KEY `medlem_id` (`medlem_id`);

--
-- Indexes for table `interesser`
--
ALTER TABLE `interesser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medlemmsId` (`medlemmsId`);

--
-- Indexes for table `medlemmer`
--
ALTER TABLE `medlemmer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktiviteter`
--
ALTER TABLE `aktiviteter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brukere`
--
ALTER TABLE `brukere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `interesser`
--
ALTER TABLE `interesser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `medlemmer`
--
ALTER TABLE `medlemmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `brukere`
--
ALTER TABLE `brukere`
  ADD CONSTRAINT `brukere_ibfk_1` FOREIGN KEY (`medlem_id`) REFERENCES `medlemmer` (`id`);

--
-- Begrensninger for tabell `interesser`
--
ALTER TABLE `interesser`
  ADD CONSTRAINT `interesser_ibfk_1` FOREIGN KEY (`medlemmsId`) REFERENCES `medlemmer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
