-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Pi 17.Máj 2024, 14:23
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `tretiaci`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazov`) VALUES
(1, 'Herná myš'),
(2, 'Herná klávesnica'),
(3, 'Herná podložka');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `pouzivatel`
--

CREATE TABLE `pouzivatel` (
  `id` int(11) NOT NULL,
  `meno` varchar(255) NOT NULL,
  `heslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `pouzivatel`
--

INSERT INTO `pouzivatel` (`id`, `meno`, `heslo`) VALUES
(73, 'as', '$2y$10$Sh6vHcZWswD4n6jCqImIA.Itiwa/JDSjmIWSZFADlheTM.YMRU0qC'),
(74, 'eyo', '$2y$10$V885eaeHocakj5DhqvDXR.nmhD8Ioyg7L9TQW3G6Af1Bfwne97d3C'),
(75, 'kk', '$2y$10$RUxDKGXowIGpRq8/K9qdY.lpPAG2sU5D3M2l2voCbpCh7241ET1Ue'),
(76, 'asd123', '$2y$10$zJ5pDaeiLfm2qyYPQV4HCOuy9dm4hghAJlMAwprJGAU.UqnX0xfLi'),
(77, '123', '$2y$10$lVm6ShMeTR57/gSDMLmpd.CUEgVbcw9warkZ8yULDATozTmOHn.0e'),
(78, 'asdada', '$2y$10$5dcW/06lB9nrIqc0jsxn0.9J1Pgz9HjO52RnwRt4Ynzqrd02hspea'),
(79, 'zzbwu', '$2y$10$9oaOxqiYWSderADMafjfTe13NnNDjLCctU7lxvD/Ea37GCi4vq/Xq'),
(80, 'sdsdg', '$2y$10$LHlORIm.X8KpCfrPAUcA5OSsIoNagrt4Z7wm.9BWt7b2YDFQGnABG'),
(81, 'cau', '$2y$10$pvKEjFjV2oEQTsNTLOaUbeHuBGsxDN8Pfhm1SQHflRCGea14AC7cm'),
(82, 'a', '$2y$10$w18hLARbpLDYuChRK7CqheDEV8sFRWj1ojGHw6kRIfcCl0ls9gKcq'),
(83, 'n', '$2y$10$AY9NSyMtvLOHpSz9mufZj.Lhz9b9AUiHbubz70KhwjjorwpwkfBHa'),
(84, 'd', '$2y$10$SKGIeXC3gRpHpYzeCdbw9uz4Il6rpxX7wKGK9vgH9JHpg2cQ092O.'),
(85, 's', '$2y$10$8tJ2zk4.0x.aCOz/XBi5zOBKCk27S6864720aAsY8v1Pvf2PMuosq'),
(86, 'ads', '$2y$10$ebr12F1xgPp1zRS6yddG6O2sVmJQ6XSJGLufjpbjsj12FiswcMX8a'),
(87, 'f', '$2y$10$lQrCocEVSlYUAXBgkeTOJuvOg3d3HtfbYfrGAEmUbrVHYy93d.OhW');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazov` varchar(100) NOT NULL,
  `popis` varchar(500) NOT NULL,
  `cena` float NOT NULL,
  `kategoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `produkty`
--

INSERT INTO `produkty` (`id`, `nazov`, `popis`, `cena`, `kategoria_id`) VALUES
(1, 'Logitech G Pro X Superlight', 'Herná myš', 129.99, 1),
(2, 'LAMZU Atlantis Pro', 'Herná klávesnica', 199.99, 2),
(3, 'LAMZU MAYA 4K', 'Herná myš\r\nso 4K HZ', 159.99, 1),
(4, 'LAMZU Tachi', 'Herná myš kompatibilná s 8K Donglom', 169.99, 1),
(5, 'LAMZU Thorn', 'Herná myš s 4K Hz', 139.99, 1),
(6, 'LAMZU x FNATIC Thorn ', 'Herná myš v spolupráci s tímom Fnatic', 145.99, 1),
(7, 'LAMZU Atlantis Mini', 'Herná myš Atlantis vo verzii mini', 135.99, 1),
(8, 'LAMZU Atlantis Mini 4K', 'Herná myš Atlantis vo verzii mini s 4K Hz', 159.99, 1),
(9, 'LAMZU Atlantis OG V2 4K', 'Herná myš Atlantis OG v novšej verzii s 4K Hz', 165.99, 1),
(10, 'Artisan FX HAYATEOTSU NINJABLACK', 'Herná podložka (Veľkosť L)', 69.99, 3);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `pouzivatel`
--
ALTER TABLE `pouzivatel`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `pouzivatel`
--
ALTER TABLE `pouzivatel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pre tabuľku `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
