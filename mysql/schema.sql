-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 12. okt 2023 ob 09.09
-- Različica strežnika: 10.4.25-MariaDB
-- Različica PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `trello`
--

-- --------------------------------------------------------

--
-- Struktura tabele `dashboardi`
--

CREATE TABLE `dashboardi` (
  `id` int(11) NOT NULL,
  `ime` char(55) NOT NULL,
  `barva` char(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `dashboardi`
--

INSERT INTO `dashboardi` (`id`, `ime`, `barva`) VALUES
(1, 'Prva tabela', '#5cd681'),
(2, 'Druga tabela', '#ff0000'),
(3, 'Druga tabela', '#ff0000'),
(4, 'Tretja', '#d2ad28');

-- --------------------------------------------------------

--
-- Struktura tabele `dashboard_uporabnik`
--

CREATE TABLE `dashboard_uporabnik` (
  `id` int(11) NOT NULL,
  `dashboard_id` int(11) DEFAULT NULL,
  `uporabnik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `dashboard_uporabnik`
--

INSERT INTO `dashboard_uporabnik` (`id`, `dashboard_id`, `uporabnik_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `opravila`
--

CREATE TABLE `opravila` (
  `id` int(11) NOT NULL,
  `ime` char(55) NOT NULL,
  `tip` char(55) DEFAULT NULL,
  `nujnost` char(55) DEFAULT NULL,
  `slika_id` int(11) DEFAULT NULL,
  `dashboard_id` int(11) DEFAULT NULL,
  `uporabnik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `opravila`
--

INSERT INTO `opravila` (`id`, `ime`, `tip`, `nujnost`, `slika_id`, `dashboard_id`, `uporabnik_id`) VALUES
(1, 'TODO', NULL, 'nujno', 4, 1, 1),
(2, 'TODO', 'Strezniki', 'nujno', 5, 1, 1),
(3, 'TODO', 'Strezniki', 'nujno', 6, 3, 1),
(18, 'xtest', 'test', 'test', 21, 3, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `slike`
--

CREATE TABLE `slike` (
  `id` int(11) NOT NULL,
  `url` char(255) NOT NULL,
  `ime` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `slike`
--

INSERT INTO `slike` (`id`, `url`, `ime`) VALUES
(1, '../slike/1697091096_WIN_20230224_10_10_00_Pro.jpg', '1697091096_WIN_20230224_10_10_00_Pro.jpg'),
(2, '../slike/1697091196_WIN_20230224_10_10_00_Pro.jpg', '1697091196_WIN_20230224_10_10_00_Pro.jpg'),
(3, '../slike/1697091233_WIN_20230224_10_10_00_Pro.jpg', '1697091233_WIN_20230224_10_10_00_Pro.jpg'),
(4, '../slike/1697091256_WIN_20230224_10_10_00_Pro.jpg', '1697091256_WIN_20230224_10_10_00_Pro.jpg'),
(5, '../slike/1697091273_WIN_20230224_10_10_00_Pro.jpg', '1697091273_WIN_20230224_10_10_00_Pro.jpg'),
(6, '../slike/1697091325_WIN_20230224_10_10_00_Pro.jpg', '1697091325_WIN_20230224_10_10_00_Pro.jpg'),
(7, '../slike/1697091376_WIN_20230224_10_10_00_Pro.jpg', '1697091376_WIN_20230224_10_10_00_Pro.jpg'),
(8, '../slike/1697091429_WIN_20230224_10_10_00_Pro.jpg', '1697091429_WIN_20230224_10_10_00_Pro.jpg'),
(9, '../slike/1697091486_WIN_20230224_10_10_00_Pro.jpg', '1697091486_WIN_20230224_10_10_00_Pro.jpg'),
(10, '../slike/1697091505_WIN_20230224_10_10_00_Pro.jpg', '1697091505_WIN_20230224_10_10_00_Pro.jpg'),
(11, '../slike/1697091524_WIN_20230224_10_10_00_Pro.jpg', '1697091524_WIN_20230224_10_10_00_Pro.jpg'),
(12, '../slike/1697091544_WIN_20230224_10_10_00_Pro.jpg', '1697091544_WIN_20230224_10_10_00_Pro.jpg'),
(13, '../slike/1697091764_WIN_20230224_10_10_00_Pro.jpg', '1697091764_WIN_20230224_10_10_00_Pro.jpg'),
(14, '../slike/1697091963_WIN_20230224_10_10_00_Pro.jpg', '1697091963_WIN_20230224_10_10_00_Pro.jpg'),
(15, '../slike/1697093052_WIN_20230224_10_10_00_Pro.jpg', '1697093052_WIN_20230224_10_10_00_Pro.jpg'),
(16, '../slike/1697093057_WIN_20230224_10_10_00_Pro.jpg', '1697093057_WIN_20230224_10_10_00_Pro.jpg'),
(17, '../slike/1697093179_WIN_20230224_10_10_00_Pro.jpg', '1697093179_WIN_20230224_10_10_00_Pro.jpg'),
(18, '../slike/1697093208_WIN_20220215_12_57_31_Pro.jpg', '1697093208_WIN_20220215_12_57_31_Pro.jpg'),
(19, '../slike/1697093329_WIN_20220215_12_57_31_Pro.jpg', '1697093329_WIN_20220215_12_57_31_Pro.jpg'),
(20, '../slike/1697093396_WIN_20211227_10_24_52_Pro.jpg', '1697093396_WIN_20211227_10_24_52_Pro.jpg'),
(21, '../slike/1697093508_WIN_20220215_12_57_31_Pro.jpg', '1697093508_WIN_20220215_12_57_31_Pro.jpg');

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki`
--

CREATE TABLE `uporabniki` (
  `id` int(11) NOT NULL,
  `ime` char(55) NOT NULL,
  `priimek` char(55) NOT NULL,
  `up_ime` char(55) NOT NULL,
  `email` char(155) NOT NULL,
  `geslo` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `uporabniki`
--

INSERT INTO `uporabniki` (`id`, `ime`, `priimek`, `up_ime`, `email`, `geslo`) VALUES
(1, 'Deen', 'Primer', 'deen22', 'deen@deen', '$2y$10$0MuJ0vOgHSCYsY9c7qEUMONNS4xmo0rcoNANXSVjZwOc.NfBTTy9u');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `dashboardi`
--
ALTER TABLE `dashboardi`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `dashboard_uporabnik`
--
ALTER TABLE `dashboard_uporabnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship20` (`uporabnik_id`),
  ADD KEY `IX_Relationship21` (`dashboard_id`);

--
-- Indeksi tabele `opravila`
--
ALTER TABLE `opravila`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship15` (`slika_id`),
  ADD KEY `IX_Relationship17` (`dashboard_id`),
  ADD KEY `IX_Relationship18` (`uporabnik_id`);

--
-- Indeksi tabele `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `up_ime` (`up_ime`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `dashboardi`
--
ALTER TABLE `dashboardi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT tabele `dashboard_uporabnik`
--
ALTER TABLE `dashboard_uporabnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT tabele `opravila`
--
ALTER TABLE `opravila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT tabele `slike`
--
ALTER TABLE `slike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `dashboard_uporabnik`
--
ALTER TABLE `dashboard_uporabnik`
  ADD CONSTRAINT `Relationship20` FOREIGN KEY (`uporabnik_id`) REFERENCES `uporabniki` (`id`),
  ADD CONSTRAINT `Relationship21` FOREIGN KEY (`dashboard_id`) REFERENCES `dashboardi` (`id`);

--
-- Omejitve za tabelo `opravila`
--
ALTER TABLE `opravila`
  ADD CONSTRAINT `Relationship15` FOREIGN KEY (`slika_id`) REFERENCES `slike` (`id`),
  ADD CONSTRAINT `Relationship17` FOREIGN KEY (`dashboard_id`) REFERENCES `dashboardi` (`id`),
  ADD CONSTRAINT `Relationship18` FOREIGN KEY (`uporabnik_id`) REFERENCES `uporabniki` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
