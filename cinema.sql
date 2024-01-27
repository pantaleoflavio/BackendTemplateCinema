-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 25, 2024 alle 18:10
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `seats` int(3) DEFAULT 100,
  `cover_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `halls`
--

INSERT INTO `halls` (`id`, `name`, `code`, `seats`, `cover_path`) VALUES
(1, 'mars', NULL, 100, 'mars.jpg'),
(2, 'uranus', NULL, 110, 'uranus.jpg'),
(3, 'saturn', NULL, 94, 'saturn.png'),
(4, 'mercury', NULL, 60, 'mercury.png'),
(5, 'jupiter', NULL, 140, 'jupiter.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `release_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `trailer` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `cover_path` varchar(255) NOT NULL,
  `director` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `movies`
--

INSERT INTO `movies` (`id`, `name`, `code`, `description`, `duration`, `release_date`, `trailer`, `image_path`, `cover_path`, `director`) VALUES
(1, 'Frozen', '', 'When the newly crowned Queen Elsa accidentally uses her power to turn things into ice to curse her home in infinite winter, her sister Anna teams up with a mountain man, his playful reindeer, and a snowman to change the weather condition.', 120, '2024-01-25 13:04:12', 'sample_mp4.mp4', 'frozen.jpg', 'frozen-cover.png', 'Chris Buck e Jennifer Lee'),
(2, 'Tolo Tolo', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec suscipit condimentum risus, at elementum ex tempor at. Mauris vel sapien vitae tortor faucibus porta a in turpis. Proin ultrices, enim ac tincidunt ullamcorper, libero ante sodales enim, eget pharetra nisi sapien eget metus.', 111, '2024-01-25 13:04:12', 'sample_mp4.mp4', 'tolotolo.jpg', 'tolotolo-cover.jpg', 'Checco Zalone'),
(3, 'Pinocchio', '', 'Pellentesque fermentum ante sem, ac congue nisi aliquet sit amet. Curabitur tempus consectetur purus, sed auctor sapien commodo ac.', 132, '2024-01-25 13:04:12', 'sample_mp4.mp4', 'pinocchio.jpg', 'pinocchio.cover.jpg', 'Chris Buck'),
(4, 'Star Wars', '', 'Curabitur ultrices aliquam varius. In maximus libero at porta pretium. Etiam sagittis nec quam ac ullamcorper. Sed quam justo, tempor ut rhoncus nec, elementum et orci', 145, '2024-01-25 13:04:12', 'sample_mp4.mp4', 'starwars.jpg', 'starwars-cover.jpg', 'Cennifer Lee'),
(5, 'Jumanji', '', 'Praesent lobortis pretium ligula. Proin in enim eu enim euismod lobortis in non libero.', 99, '2024-01-25 13:04:12', 'sample_mp4.mp4', 'jumanji.jpg', 'jumanji-cover.jpg', 'Buck Lee'),
(6, 'Spies under Cover', '', 'Mauris tincidunt non tellus ac finibus. Vivamus mollis id tortor eget consequat.', 120, '2024-01-25 13:04:12', 'sample_mp4.mp4', 'spiesundercover.jpg', 'spiesundercover-cover.jpg', 'Chris Lee'),
(7, 'La Bella Addormentata', '', 'Maecenas rutrum, nisl et scelerisque malesuada, sem purus vehicula mauris, faucibus tincidunt magna ante eu lorem. Praesent varius erat ac mi sollicitudin volutpat.', 91, '2024-01-25 13:04:12', 'sample_mp4.mp4', 'labellaaddormentata.jpg', 'labellaaddormentata-cover.jpg', 'Chris Buckennifer'),
(8, 'Last Christmas', '', 'Nunc tempor, nisi eget scelerisque pellentesque, justo est mattis est, id sagittis purus felis vel velit.', 120, '2024-01-25 13:04:12', 'sample_mp4.mp4', 'lastchristmas.jpg', 'lastchristmas-cover.jpg', 'Chris Jennifer'),
(9, 'La Dea Fortuna', '', 'Etiam in venenatis nunc. Integer dignissim ante nec dapibus imperdiet.', 100, '2024-01-25 13:04:12', 'sample_mp4.mp4', 'ladeafortuna.jpg', 'ladeafortuna-cover.jpg', 'Jun Lee'),
(10, 'Il Primo Natale', '', 'Etiam in venenatis nunc. Integer dignissim ante nec dapibus imperdiet.', 103, '2024-01-25 13:11:07', 'sample_mp4.mp4', 'ilprimonatale.jpg', 'ilprimonatale-cover.webp', 'Gerry Scotti');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
