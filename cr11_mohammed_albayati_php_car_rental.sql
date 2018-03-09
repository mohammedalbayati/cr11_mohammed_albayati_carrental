-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mrz 2018 um 13:31
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_mohammed_albayati_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `image` varchar(55) NOT NULL,
  `Price` int(11) NOT NULL,
  `fk_offices_id` int(11) NOT NULL,
  `fk_address` varchar(55) NOT NULL,
  `available` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cars`
--

INSERT INTO `cars` (`car_id`, `model`, `details`, `image`, `Price`, `fk_offices_id`, `fk_address`, `available`) VALUES
(1, 'Hyundai Elantra', '128-hp, 1.4-liter I-4 (regular gas)', 'img/1.png', 45, 1, '', 'img/t.png'),
(2, 'Dodge Charger', '300-hp, 3.6-liter V-6 (premium)', 'img/2.png', 100, 4, 'simmeringhauptstraße 57', 'img/f.png'),
(3, 'Audi A4', '252-hp, 2.0-liter I-4 (premium)', 'img/3.png', 85, 2, '', 'img/f.png'),
(4, 'Dodge Challenger', '305-hp, 3.6-liter V-6 (regular gas)', 'img/4.png', 110, 3, '', 'img/t.png'),
(5, 'Audi S5', '354-hp, 3.0-liter V-6 (premium)', 'img/5.png', 120, 1, '', 'img/t.png'),
(6, 'Jeep Grand Cherokee', '295-hp, 3.6-liter V-6 (regular gas)', 'img/6.png', 100, 2, '', 'img/f.png'),
(7, 'Lincoln Navigator', '450-hp, 3.5-liter V-6 (premium)', 'img/7.png', 160, 3, '', 'img/t.png'),
(8, 'Volkswagen Tiguan', '184-hp, 2.0-liter I-4 (regular gas)', 'img/8.png', 90, 4, '', 'img/f.png'),
(9, 'Chevrolet Corvette', '460-hp, 6.2-liter V-8 (premium)', 'img/9.png', 160, 3, '', 'img/t.png'),
(10, 'Audi Q7', '252-hp, 2.0-liter I-4 (premium)', 'img/10.png', 115, 3, '', 'img/f.png'),
(11, 'Honda CR-V', '190-hp, 1.5-liter I-4 (regular gas)', 'img/11.png', 85, 4, '', 'img/t.png'),
(12, 'BMW M4', '250-hp, 3.0-liter I-6 (premium)', 'img/12.png', 110, 4, '', 'img/f.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cars_status`
--

CREATE TABLE `cars_status` (
  `cars_status_id` int(11) NOT NULL,
  `fk_current_location_id` int(11) NOT NULL,
  `fk_car_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `offices`
--

CREATE TABLE `offices` (
  `offices_id` int(11) NOT NULL,
  `address` varchar(55) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `offices`
--

INSERT INTO `offices` (`offices_id`, `address`, `city`, `zip`) VALUES
(1, 'Vorgartenstraße 200', 'Wien', '1020'),
(2, 'Schwedenplatz', 'Wien', '1010'),
(3, 'Mariahilfestraße 76', 'Wien', '1060'),
(4, 'simmeringhauptstraße 57', 'Wien', '1110');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `gender`, `birthdate`, `user_email`, `user_pass`) VALUES
(1, 'Khaled', 'Ahmad', '', NULL, 'khaled@ahmad.com', '224466'),
(3, 'Omar', 'Marie', '', NULL, 'omar@marie.com', '224466'),
(4, 'Tanja', 'Kosic', '', NULL, 'kosic@gmail.com', '123456'),
(5, 'nina', 'smo', '', NULL, 'nina@smo.com', '123456'),
(6, 'omar', 'deeb', '', NULL, 'omar@deeb.com', '123456'),
(7, 'khaled', 'ahmad', '', NULL, 'khaled@fares.com', '224466'),
(8, 'mohd', 'fares', '', NULL, 'mohd@fares.com', '224466'),
(9, 'mohd', 'fares', '', NULL, 'moh@fares.com', '224466'),
(10, 'mohd', 'fares', '', NULL, 'moh@fares1.com', '224466'),
(11, 'mohd', 'fares', '', NULL, 'moh@fares2.com', '224466');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_offices_id` (`fk_offices_id`);

--
-- Indizes für die Tabelle `cars_status`
--
ALTER TABLE `cars_status`
  ADD PRIMARY KEY (`cars_status_id`),
  ADD KEY `fk_current_location_id` (`fk_current_location_id`),
  ADD KEY `fk_car_id` (`fk_car_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indizes für die Tabelle `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`offices_id`,`address`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `offices`
--
ALTER TABLE `offices`
  MODIFY `offices_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_offices_id`) REFERENCES `offices` (`offices_id`);

--
-- Constraints der Tabelle `cars_status`
--
ALTER TABLE `cars_status`
  ADD CONSTRAINT `cars_status_ibfk_2` FOREIGN KEY (`fk_car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `cars_status_ibfk_3` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
