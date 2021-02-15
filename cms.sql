-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 feb 2021 om 13:42
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aboutme`
--

CREATE TABLE `aboutme` (
  `id` int(7) NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `aboutme`
--

INSERT INTO `aboutme` (`id`, `text`) VALUES
(1, '<p>Mijn naam is Niels Segaar en ik ben student bij het Grafisch Lyceum Rotterdam en ik doen de opleiding Mediatechnologie. Pellentesque sit amet orci arcu. Donec maximus lacus nunc, sed sagittis arcu tristique non. Cras pulvinar, libero non mollis malesuada, tellus magna cursus leo, commodo consequat ipsum lacus vel neque. Morbi sagittis congue ante vel aliquam.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://upload.wikimedia.org/wikipedia/commons/2/2f/Glr.jpg\" alt=\"Grafisch Lyceum Rotterdam\" width=\"232\" height=\"215\" /></p>\r\n<p>Morbi finibus elit justo, vel gravida lectus elementum ullamcorper. Quisque dapibus sollicitudin tincidunt. Nam rutrum sem sed arcu tempus sodales. Suspendisse ullamcorper eget mi quis lobortis. Donec condimentum aliquam ipsum, quis accumsan massa placerat in. Suspendisse libero nulla, accumsan sed quam eget, maximus iaculis erat.</p>');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(7) NOT NULL,
  `title` varchar(64) NOT NULL,
  `subtext` longtext NOT NULL,
  `text` longtext NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `headimage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `projects`
--

INSERT INTO `projects` (`id`, `title`, `subtext`, `text`, `date`, `headimage`) VALUES
(1, '100 op de snelweg!', '<p>Morbi non eros massa. Nam erat sem, congue at sem ac, mollis rutrum turpis. Phasellus iaculis convallis nunc eget luctus. Quisque lectus lacus, efficitur vitae ex eleifend, dapibus pellentesque sapien. Praesent quis erat sed sem dictum commodo. Sed ultrices orci vitae aliquet pulvinar. Nam sodales sapien est, id gravida ex pharetra eu.</p>', '<p>Morbi non eros massa. Nam erat sem, congue at sem ac, mollis rutrum turpis. Phasellus iaculis convallis nunc eget luctus. Quisque lectus lacus, efficitur vitae ex eleifend, dapibus pellentesque sapien. Praesent quis erat sed sem dictum commodo. Sed ultrices orci vitae aliquet pulvinar. Nam sodales sapien est, id gravida ex pharetra eu.</p>', '2020-05-25', 'images/100.jpg'),
(2, 'Halfmoon', '<p>Een bootstrap framework met built-in night mode</p>', '<p>In dit document ga ik het hebben over halfmoon, wat is halfmoon en waarom is het beter om te gebruiken dan bootstrap. Dat zal ik zelf hier vertelen.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://i0.wp.com/css-tricks.com/wp-content/uploads/2020/07/halfmoon.png?fit=1200%2C600&amp;ssl=1\" alt=\"\" width=\"598\" height=\"299\" /></p>\r\n<p>&nbsp;</p>', '2021-02-15', 'uploads/afbeelding_2021-02-15_115913.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `profile` text NOT NULL,
  `openname` text NOT NULL,
  `adres` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `profile`, `openname`, `adres`, `phone`, `email`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'uploads/profile/Segaar.jpg', 'Niels Segaar', 'Heer Broekstraat 48', '+31-06958737273', 'Segaar86@Gmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aboutme`
--
ALTER TABLE `aboutme`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
