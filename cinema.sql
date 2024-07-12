-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 10, 2024 alle 18:10
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.18

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
-- Struttura della tabella `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_notes` text DEFAULT NULL,
  `total` int(11) NOT NULL,
  `orderList` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `deliveryStatus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `bills`
--

INSERT INTO `bills` (`id`, `customer`, `adress`, `email`, `order_notes`, `total`, `orderList`, `user_id`, `deliveryStatus`, `created_at`) VALUES
(13, 'Mary Jane', 'via parma 23', 'mary@jane.com', 'test generally functionality, mail sender and pdf ticket generator', 50, '{\"movieTitle\":\"Frozen\",\"hallName\":\"mars\",\"showDetails\":\"13:00:00, 2023-01-01\",\"seats\":\"1A, 2A, 3A, 4A, 5A, \"}', 2, 0, '2024-03-28 10:18:53'),
(14, 'Mary Jane', 'via parma 23', 'flavio.pantaleo@yahoo.com', 'group cinema', 90, '{\"movieTitle\":\"Frozen\",\"hallName\":\"mars\",\"showDetails\":\"13:00:00, 2023-01-01\",\"seats\":\"6A, 7A, 8A, 6B, 7B, 8B, 6C, 7C, 8C, \"}', 2, 0, '2024-03-28 12:51:46'),
(16, 'Mary Jane', 'via parma 23', 'flavio.pantaleo@yahoo.com', 'test file env', 130, '{\"movieTitle\":\"Tolo Tolo\",\"hallName\":\"uranus\",\"showDetails\":\"15:00:00, 2023-01-02\",\"seats\":\"1A, 2A, 3A, 4A, 5A, 1B, 2B, 3B, 5B, 1C, 2C, 3C, 5C, \"}', 2, 0, '2024-04-01 14:51:12'),
(17, 'Mary Jane', 'via parma 23', 'flavio.pantaleo@yahoo.com', 'final test', 60, '{\"movieTitle\":\"Frozen\",\"hallName\":\"mars\",\"showDetails\":\"17:00:00, 2023-01-01\",\"seats\":\"1A, 2A, 9A, 4B, 9B, 4C, \"}', 2, 0, '2024-04-01 15:16:06'),
(18, 'Mary Jane', 'via parma 23', 'flavio.pantaleo@yahoo.com', 'final test', 60, '{\"movieTitle\":\"Frozen\",\"hallName\":\"mars\",\"showDetails\":\"17:00:00, 2023-01-01\",\"seats\":\"1A, 2A, 9A, 4B, 9B, 4C, \"}', 2, 0, '2024-04-01 15:16:09'),
(19, 'Mary Jane', 'via parma 23', 'flavio.pantaleo@yahoo.com', '', 60, '{\"movieTitle\":\"Tolo Tolo\",\"hallName\":\"uranus\",\"showDetails\":\"15:00:00, 2023-01-02\",\"seats\":\"6A, 7A, 6B, 7B, 6C, 7C, \"}', 2, 0, '2024-04-01 15:18:32'),
(20, 'Mary Jane', 'via veneto', 'flavio.pantaleo@yahoo.com', 'test', 20, '{\"movieTitle\":\"Tolo Tolo\",\"hallName\":\"mars\",\"showDetails\":\"2023-01-01, 17:00:00\",\"seats\":\"6A, 6B, \"}', 2, 0, '2024-04-16 11:52:10'),
(21, 'Mary Jane', 'via veneto', 'flavio.pantaleo@yahoo.com', 'test', 20, '{\"movieTitle\":\"Tolo Tolo\",\"hallName\":\"mars\",\"showDetails\":\"2023-01-01, 17:00:00\",\"seats\":\"6A, 6B, \"}', 2, 0, '2024-04-16 11:54:18'),
(22, 'Mary Jane', 'via veneto', 'flavio.pantaleo@yahoo.com', 'test', 20, '{\"movieTitle\":\"Tolo Tolo\",\"hallName\":\"mars\",\"showDetails\":\"2023-01-01, 17:00:00\",\"seats\":\"6A, 6B, \"}', 2, 0, '2024-04-16 11:55:32'),
(23, 'Mary Jane', 'via veneto', 'flavio.pantaleo@yahoo.com', 'Test with PDF Ticket generator and Email Sender', 50, '{\"movieTitle\":\"Tolo Tolo\",\"hallName\":\"mars\",\"showDetails\":\"2023-01-01, 17:00:00\",\"seats\":\"1A, 2A, 3A, 8C, 9C, \"}', 2, 0, '2024-04-21 13:59:37'),
(24, 'John Dean', 'via veneto', 'flavio.pantaleo@yahoo.com', 'test', 20, '{\"movieTitle\":\"Frozen\",\"hallName\":\"mars\",\"showDetails\":\"2023-01-01, 13:00:00\",\"seats\":\"3B, 3C, \"}', 4, 0, '2024-05-06 13:59:24'),
(25, 'John Dean', 'via veneto', 'flavio.pantaleo@yahoo.com', '', 10, '{\"movieTitle\":\"Frozen\",\"hallName\":\"mars\",\"showDetails\":\"2023-01-01, 13:00:00\",\"seats\":\"5C, \"}', 4, 0, '2024-05-06 14:01:34'),
(26, 'John Dean', 'via veneto', 'flavio.pantaleo@yahoo.com', '', 10, '{\"movieTitle\":\"Frozen\",\"hallName\":\"mars\",\"showDetails\":\"2023-01-01, 13:00:00\",\"seats\":\"5C, \"}', 4, 0, '2024-05-06 14:01:58');

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `show_time_id` int(11) NOT NULL,
  `seat_ids` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `seats` int(3) DEFAULT 100,
  `cover_path` varchar(255),
  `services` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `halls`
--

INSERT INTO `halls` (`id`, `name`, `code`, `seats`, `cover_path`, `services`) VALUES
(1, 'mars', NULL, 100, 'mars.jpg', 'aria condizionata, sedili reclinabili, bagno delux'),
(2, 'uranus', NULL, 110, 'uranus.jpg', 'aria condizionata, sedili reclinabili'),
(3, 'saturn', NULL, 94, 'saturn.png', 'aria condizionata, sedili reclinabili, bagno delux, 3D, poggia bevande'),
(4, 'mercury', NULL, 60, 'mercury.png', 'aria condizionata, 3D, poggia bevande'),
(5, 'jupiter', NULL, 140, 'jupiter.jpg', 'aria condizionata'),
(13, 'Neptune', NULL, 39, 'neptune.jpg', 'No services');

-- --------------------------------------------------------

--
-- Struttura della tabella `hall_images`
--

CREATE TABLE `hall_images` (
  `id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `hall_images`
--

INSERT INTO `hall_images` (`id`, `hall_id`, `image_path`) VALUES
(2, 1, 'mars1.png'),
(3, 1, 'mars2.png'),
(4, 1, 'mars3.jpg'),
(5, 4, 'mercury.jpg'),
(6, 3, 'saturn.png'),
(7, 2, 'uranus.jpg'),
(8, 5, 'jupiter.jpg'),
(10, 5, 'jupiter2.jpg'),
(11, 5, 'jupiter3.jpg'),
(12, 1, 'mars4.jpg'),
(13, 1, 'mars5.jpg'),
(14, 2, 'uranus1.jpg'),
(15, 2, 'uranus2.jpg'),
(16, 2, 'uranus3.jpg'),
(17, 3, 'saturn1.jpg'),
(18, 3, 'saturn2.jpg'),
(19, 3, 'saturn3.jpg'),
(20, 1, 'mars.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `release_date` date DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `cover_path` varchar(255) DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `movies`
--

INSERT INTO `movies` (`id`, `name`, `description`, `duration`, `release_date`, `trailer`, `image_path`, `cover_path`, `director`) VALUES
(1, 'Frozen', 'When the newly crowned Queen Elsa accidentally uses her power to turn things into ice to curse her home in infinite winter, her sister Anna teams up with a mountain man, his playful reindeer, and a snowman to change the weather condition.', 120, '2024-01-25', NULL, 'frozen.jpg', 'frozen-cover.png', 'Chris Buck e Jennifer Lee'),
(2, 'Tolo Tolo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec suscipit condimentum risus, at elementum ex tempor at. Mauris vel sapien vitae tortor faucibus porta a in turpis. Proin ultrices, enim ac tincidunt ullamcorper, libero ante sodales enim, eget pharetra nisi sapien eget metus.', 111, '2024-01-25', 'sample_mp4.mp4', 'tolotolo.jpg', 'tolotolo-cover.jpg', 'Checco Zalone'),
(3, 'Pinocchio', 'Pellentesque fermentum ante sem, ac congue nisi aliquet sit amet. Curabitur tempus consectetur purus, sed auctor sapien commodo ac.', 132, '2024-01-25', 'sample_mp4.mp4', 'pinocchio.jpg', 'pinocchio.cover.jpg', 'Chris Buck'),
(4, 'Star Wars', 'Curabitur ultrices aliquam varius. In maximus libero at porta pretium. Etiam sagittis nec quam ac ullamcorper. Sed quam justo, tempor ut rhoncus nec, elementum et orci', 145, '2024-01-25', 'sample_mp4.mp4', 'starwars.jpg', 'starwars-cover.jpg', 'Cennifer Lee'),
(5, 'Jumanji', 'Praesent lobortis pretium ligula. Proin in enim eu enim euismod lobortis in non libero.', 99, '2024-01-25', 'sample_mp4.mp4', 'jumanji.jpg', 'jumanji-cover.jpg', 'Buck Lee'),
(7, 'La Bella Addormentata', 'Maecenas rutrum, nisl et scelerisque malesuada, sem purus vehicula mauris, faucibus tincidunt magna ante eu lorem. Praesent varius erat ac mi sollicitudin volutpat.', 91, '2024-01-25', 'sample_mp4.mp4', 'labellaaddormentata.jpg', 'labellaaddormentata-cover.jpg', 'Chris Buckennifer'),
(8, 'Last Christmas', 'Nunc tempor, nisi eget scelerisque pellentesque, justo est mattis est, id sagittis purus felis vel velit.', 120, '2024-01-25', 'sample_mp4.mp4', 'lastchristmas.jpg', 'lastchristmas-cover.jpg', 'Chris Jennifer'),
(9, 'La Dea Fortuna', 'Etiam in venenatis nunc. Integer dignissim ante nec dapibus imperdiet.', 100, '2024-01-25', 'sample_mp4.mp4', 'ladeafortuna.jpg', 'ladeafortuna-cover.jpg', 'Jun Lee'),
(10, 'Il Primo Natale', 'Etiam in venenatis nunc. Integer dignissim ante nec dapibus imperdiet.', 103, '2024-01-25', 'sample_mp4.mp4', 'ilprimonatale.jpg', 'ilprimonatale-cover.webp', 'Gerry Scotti'),
(14, 'Spies under Cover', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. In sed exercitationem tempora adipisci nemo provident molestias? Eligendi, sint minima deserunt consequuntur quo voluptatum reprehenderit omnis?', 86, '2024-06-27', 'videos/sample_mp4.mp4', 'spiesundercover.jpg', 'spiesundercover-cover.jpg', 'Incredible Hulk');

-- --------------------------------------------------------

--
-- Struttura della tabella `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `show_date` date DEFAULT NULL,
  `show_time` time DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `hall_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `shows`
--

INSERT INTO `shows` (`id`, `show_date`, `show_time`, `movie_id`, `hall_id`) VALUES
(1, '2023-01-01', '13:00:00', 1, 1),
(2, '2023-01-02', '15:00:00', 2, 2),
(3, '2023-01-03', '17:00:00', 3, 3),
(4, '2023-01-04', '19:00:00', 4, 4),
(5, '2023-01-05', '21:00:00', 5, 5),
(7, '2023-01-07', '15:00:00', 7, 2),
(8, '2023-01-08', '17:00:00', 8, 3),
(9, '2023-01-09', '19:00:00', 9, 4),
(10, '2023-01-10', '21:00:00', 10, 5),
(11, '2023-01-01', '17:00:00', 1, 1),
(12, '2023-01-01', '17:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `show_seats`
--

CREATE TABLE `show_seats` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `seat_number` varchar(10) NOT NULL,
  `row` varchar(5) NOT NULL,
  `price` int(5) NOT NULL DEFAULT 10,
  `is_booked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `show_seats`
--

INSERT INTO `show_seats` (`id`, `show_id`, `seat_number`, `row`, `price`, `is_booked`) VALUES
(1, 1, '1', 'A', 10, 0),
(2, 1, '2', 'A', 10, 0),
(3, 1, '3', 'A', 10, 0),
(4, 1, '4', 'A', 10, 0),
(5, 1, '5', 'A', 10, 0),
(6, 1, '6', 'A', 10, 0),
(7, 1, '7', 'A', 10, 0),
(8, 1, '8', 'A', 10, 0),
(9, 1, '9', 'A', 10, 0),
(10, 1, '10', 'A', 10, 0),
(11, 1, '1', 'B', 10, 0),
(12, 1, '2', 'B', 10, 0),
(13, 1, '3', 'B', 10, 0),
(14, 1, '4', 'B', 10, 0),
(15, 1, '5', 'B', 10, 0),
(16, 1, '6', 'B', 10, 0),
(17, 1, '7', 'B', 10, 0),
(18, 1, '8', 'B', 10, 0),
(19, 1, '9', 'B', 10, 0),
(20, 1, '10', 'B', 10, 0),
(21, 1, '1', 'C', 10, 0),
(22, 1, '2', 'C', 10, 0),
(23, 1, '3', 'C', 10, 0),
(24, 1, '4', 'C', 10, 0),
(25, 1, '5', 'C', 10, 0),
(26, 1, '6', 'C', 10, 0),
(27, 1, '7', 'C', 10, 0),
(28, 1, '8', 'C', 10, 0),
(29, 1, '9', 'C', 10, 0),
(30, 1, '10', 'C', 10, 0),
(31, 11, '1', 'A', 10, 0),
(32, 11, '2', 'A', 10, 0),
(33, 11, '3', 'A', 10, 0),
(34, 11, '4', 'A', 10, 0),
(35, 11, '5', 'A', 10, 0),
(36, 11, '6', 'A', 10, 0),
(37, 11, '7', 'A', 10, 0),
(38, 11, '8', 'A', 10, 0),
(39, 11, '9', 'A', 10, 0),
(40, 11, '10', 'A', 10, 0),
(41, 11, '1', 'B', 10, 0),
(42, 11, '2', 'B', 10, 0),
(43, 11, '3', 'B', 10, 0),
(44, 11, '4', 'B', 10, 0),
(45, 11, '5', 'B', 10, 0),
(46, 11, '6', 'B', 10, 0),
(47, 11, '7', 'B', 10, 0),
(48, 11, '8', 'B', 10, 0),
(49, 11, '9', 'B', 10, 0),
(50, 11, '10', 'B', 10, 0),
(51, 11, '1', 'C', 10, 0),
(52, 11, '2', 'C', 10, 0),
(53, 11, '3', 'C', 10, 0),
(54, 11, '4', 'C', 10, 0),
(55, 11, '5', 'C', 10, 0),
(56, 11, '6', 'C', 10, 0),
(57, 11, '7', 'C', 10, 0),
(58, 11, '8', 'C', 10, 0),
(59, 11, '9', 'C', 10, 0),
(60, 11, '10', 'C', 10, 0),
(61, 12, '1', 'A', 10, 0),
(62, 12, '2', 'A', 10, 0),
(63, 12, '3', 'A', 10, 0),
(64, 12, '4', 'A', 10, 0),
(65, 12, '5', 'A', 10, 0),
(66, 12, '6', 'A', 10, 0),
(67, 12, '7', 'A', 10, 0),
(68, 12, '8', 'A', 10, 0),
(69, 12, '9', 'A', 10, 0),
(70, 12, '10', 'A', 10, 0),
(71, 12, '1', 'B', 10, 0),
(72, 12, '2', 'B', 10, 0),
(73, 12, '3', 'B', 10, 0),
(74, 12, '4', 'B', 10, 0),
(75, 12, '5', 'B', 10, 0),
(76, 12, '6', 'B', 10, 0),
(77, 12, '7', 'B', 10, 0),
(78, 12, '8', 'B', 10, 0),
(79, 12, '9', 'B', 10, 0),
(80, 12, '10', 'B', 10, 0),
(81, 12, '1', 'C', 10, 0),
(82, 12, '2', 'C', 10, 0),
(83, 12, '3', 'C', 10, 0),
(84, 12, '4', 'C', 10, 0),
(85, 12, '5', 'C', 10, 0),
(86, 12, '6', 'C', 10, 0),
(87, 12, '7', 'C', 10, 0),
(88, 12, '8', 'C', 10, 0),
(89, 12, '9', 'C', 10, 0),
(90, 12, '10', 'C', 10, 0),
(91, 2, '1', 'A', 10, 0),
(92, 2, '2', 'A', 10, 0),
(93, 2, '3', 'A', 10, 0),
(94, 2, '4', 'A', 10, 0),
(95, 2, '5', 'A', 10, 0),
(96, 2, '6', 'A', 10, 0),
(97, 2, '7', 'A', 10, 0),
(98, 2, '8', 'A', 10, 0),
(99, 2, '9', 'A', 10, 0),
(100, 2, '10', 'A', 10, 0),
(101, 2, '1', 'B', 10, 0),
(102, 2, '2', 'B', 10, 0),
(103, 2, '3', 'B', 10, 0),
(104, 2, '4', 'B', 10, 0),
(105, 2, '5', 'B', 10, 1),
(106, 2, '6', 'B', 10, 1),
(107, 2, '7', 'B', 10, 1),
(108, 2, '8', 'B', 10, 0),
(109, 2, '9', 'B', 10, 1),
(110, 2, '10', 'B', 10, 0),
(111, 2, '1', 'C', 10, 1),
(112, 2, '2', 'C', 10, 0),
(113, 2, '3', 'C', 10, 1),
(114, 2, '4', 'C', 10, 0),
(115, 2, '5', 'C', 10, 1),
(116, 2, '6', 'C', 10, 0),
(117, 2, '7', 'C', 10, 1),
(118, 2, '8', 'C', 10, 0),
(119, 2, '9', 'C', 10, 1),
(120, 2, '10', 'C', 10, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `image_path` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(11) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `image_path`, `password`, `role`, `created_at`) VALUES
(2, 'Mary Jane', 'mary@jane.com', 'maryjane99', 'mary.jpg', '$2y$10$qurgKX3bwzsIAGMsBOta7.uthNosaXcmcyhxwAlzELz8tktVnfZ6.', 'user', '2024-03-14 16:28:23'),
(3, 'Peter Parker', 'peter@parker.com', 'spiderman', 'spidey.jpg', '$2y$10$a9Y5PNfIkU2uv9gxf077s.93RLKwIgAaWbLjaoQCn1vKcLA9IUU7C', 'user', '2024-03-28 12:53:20'),
(4, 'John Dean', 'john@dean.com', 'johndean', 'user.jpg', '$2y$10$0cQQWEFcsidGh.WPF.dGbudAI8oacdYTwyMPt5RdFDqxI6AIni2Q.', 'admin', '2024-04-05 13:00:23'),
(5, 'Bruce Wayne', 'bat@man.com', 'batman', 'user.jpg', '$2y$10$Om08E95BtPYQX484hGv6Me6Kxg4Srnmiaoz4XXWOlQfPtvq4uOjLG', 'user', '2024-04-16 12:19:26');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indici per le tabelle `hall_images`
--
ALTER TABLE `hall_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indici per le tabelle `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indici per le tabelle `show_seats`
--
ALTER TABLE `show_seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT per la tabella `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `hall_images`
--
ALTER TABLE `hall_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `show_seats`
--
ALTER TABLE `show_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `hall_images`
--
ALTER TABLE `hall_images`
  ADD CONSTRAINT `hall_images_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `show_seats`
--
ALTER TABLE `show_seats`
  ADD CONSTRAINT `show_seats_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
