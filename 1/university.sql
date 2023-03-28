-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Mar 2023, 13:40
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `university`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `hire_date` date NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `employees`
--

INSERT INTO `employees` (`id`, `name`, `occupation`, `hire_date`, `salary`) VALUES
(1, 'WEGLARZ', 'DYREKTOR', '1968-01-01', 1730),
(2, 'BLAZEWICZ', 'PROFESOR', '1973-05-01', 1350),
(3, 'SLOWINSKI', 'PROFESOR', '1977-09-01', 1070),
(4, 'BRZEZINSKI', 'PROFESOR', '1968-07-01', 960),
(5, 'MORZY', 'PROFESOR', '1975-09-15', 830),
(6, 'KROLIKOWSKI', 'ADIUNKT', '1977-09-01', 646),
(7, 'KOSZLAJDA', 'ADIUNKT', '1985-03-01', 590),
(8, 'JEZIERSKI', 'ASYSTENT', '1992-10-01', 440),
(9, 'MATYSIAK', 'ASYSTENT', '1993-09-01', 371),
(10, 'MAREK', 'SEKRETARKA', '1985-02-20', 410),
(11, 'ZAKRZEWICZ', 'STAZYSTA', '1994-07-15', 208),
(12, 'BIALY', 'STAZYSTA', '1993-10-15', 250),
(13, 'KONOPKA', 'ASYSTENT', '1993-10-01', 480),
(14, 'HAPKE', 'ASYSTENT', '1992-09-01', 480);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
