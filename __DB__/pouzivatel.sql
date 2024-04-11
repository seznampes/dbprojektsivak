-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 11.Apr 2024, 11:35
-- Verzia serveru: 10.4.27-MariaDB
-- Verzia PHP: 8.2.0

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
(72, 'asd123', '$2y$10$494XAO62u3yF0kIdZ/2ereQSFnPzVcNOGvlo5nG.Y3KXQrNulpMPG');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `pouzivatel`
--
ALTER TABLE `pouzivatel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `pouzivatel`
--
ALTER TABLE `pouzivatel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
