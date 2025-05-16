-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 16, 2025 at 12:31 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piekarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `temat` varchar(45) NOT NULL,
  `wiadomosc` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pozycjezamowienia`
--

CREATE TABLE `pozycjezamowienia` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_zamowienie` int(11) DEFAULT NULL,
  `id_produkt` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pozycjezamowienia`
--

INSERT INTO `pozycjezamowienia` (`id`, `id_uzytkownika`, `id_zamowienie`, `id_produkt`, `ilosc`, `cena`) VALUES
(25, 29, 45, 2, 1, 5),
(26, 29, 45, 6, 1, 4.2),
(27, 29, 45, 14, 1, 3.5),
(28, 29, 45, 12, 1, 3),
(29, 29, 46, 19, 4, 3.2),
(30, 29, 46, 22, 1, 3.8),
(31, 29, 47, 4, 1, 3.8),
(32, 29, 47, 5, 1, 5.2),
(33, 29, 47, 2, 1, 5),
(34, 29, 47, 3, 1, 4),
(35, 29, 47, 6, 1, 4.2),
(36, 29, 47, 1, 1, 4.5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL,
  `rodzaj` varchar(45) NOT NULL,
  `opis` text DEFAULT NULL,
  `cena` float NOT NULL,
  `zdiecie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `rodzaj`, `opis`, `cena`, `zdiecie`) VALUES
(1, 'Brownie czekoladowe', 'Ciasto', NULL, 4.5, './img/products/ciasta/brownie.png'),
(2, 'Ciasto z jagodami', 'Ciasto', NULL, 5, './img/products/ciasta/ciasto z jagodami.png'),
(3, 'Jabłkowe ciasto', 'Ciasto', NULL, 4, './img/products/ciasta/jabłkowe ciasto.png'),
(4, 'Ciastko francuskie z jabłkami', 'Ciasto', NULL, 3.8, '../img/products/ciasta/ciastko-francuskie.png'),
(5, 'Ciasto z malinami', 'Ciasto', NULL, 5.2, './img/products/ciasta/ciasto z malinami.png'),
(6, 'Duńskie ciastko z owocami', 'Ciasto', NULL, 4.2, './img/products/ciasta/duńskie ciastko.png'),
(7, 'Czekoladowa babeczka', 'Babeczka', NULL, 3.5, './img/products/babeczki/czekoladowa babeczka.png'),
(8, 'Truskawkowa babeczka', 'Babeczka', NULL, 3.75, './img/products/babeczki/truskawkowa babeczka.png'),
(9, 'Babeczka z białą czekoladą', 'Babeczka', NULL, 4, './img/products/babeczki/Babeczka z białą czekoladą.png'),
(10, 'Babeczka Oreo', 'Babeczka', NULL, 4.25, './img/products/babeczki/babeczka oreo.png'),
(11, 'Malinowa babeczka', 'Babeczka', NULL, 3.75, './img/products/babeczki/malinowa babeczka.png'),
(12, 'Standardowa babeczka z kremem', 'Babeczka', NULL, 3, './img/products/babeczki/standardowa babeczka z kremem.png'),
(13, 'Pistacjowy rogalik', 'Rogalik', NULL, 4, '/img/products/rogaliki/pistacjowy rogalik.png'),
(14, 'Czekoladowy rogalik', 'Rogalik', NULL, 3.5, './img/products/rogaliki/czekoladowy rogalik.png'),
(15, 'Truskawkowy rogalik', 'Rogalik', NULL, 3.75, './img/products/rogaliki/truskawkowy rogalik.png'),
(16, 'Wiśniowy rogalik', 'Rogalik', NULL, 3.75, './img/products/rogaliki/wisniowy rogalik.png'),
(17, 'Standardowy rogalik', 'Rogalik', NULL, 2.5, './img/products/rogaliki/standardowy rogalik.png'),
(18, 'Wanilowy rogalik', 'Rogalik', NULL, 3.25, './img/products/rogaliki/wanilowy rogalik.png'),
(19, 'Kajzerka wieloziarnista', 'Chleb', NULL, 0.8, './img/products/chleb/kajzerka wieloziarnista.png'),
(20, 'Chleb wiejski', 'Chleb', NULL, 3.5, './img/products/chleb/chleb wiejski.png'),
(21, 'Chleb z nadzieniem', 'Chleb', NULL, 4.2, './img/products/chleb/chleb z nadzieniem.png'),
(22, 'Chleb wieloziarnisty', 'Chleb', NULL, 3.8, './img/products/chleb/chleb wieloziarnisty.png'),
(23, 'Chleb czosnkowy', 'Chleb', NULL, 3.9, './img/products/chleb/chleb czosnkowy.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `haslo` varchar(255) DEFAULT NULL,
  `data_rejestracji` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `haslo`, `data_rejestracji`) VALUES
(29, 'Roman', 'Lysak', 'romanlusak40@gmail.com', '$2y$10$vrZ/YZrReFT9DYztKevcueHa3W1gMKnIeLjW3X3bmyBUuj32Szw9a', '2025-05-14 22:17:15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `data_zamowienia` datetime NOT NULL,
  `suma` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zamowienia`
--

INSERT INTO `zamowienia` (`id`, `id_uzytkownik`, `data_zamowienia`, `suma`) VALUES
(45, 29, '2025-05-16 00:50:15', 15.7),
(46, 29, '2025-05-16 00:50:58', 7),
(47, 29, '2025-05-16 01:17:28', 26.7),
(48, 29, '2025-05-16 01:18:23', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UzytkownicyKontakt` (`id_uzytkownik`);

--
-- Indeksy dla tabeli `pozycjezamowienia`
--
ALTER TABLE `pozycjezamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ZamowieniaPozycjezamowienia` (`id_zamowienie`),
  ADD KEY `FK_ProduktPozycjezamowienia` (`id_produkt`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nazwa` (`nazwa`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UzytkownikZamowienia` (`id_uzytkownik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pozycjezamowienia`
--
ALTER TABLE `pozycjezamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD CONSTRAINT `FK_UzytkownicyKontakt` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownicy` (`id`);

--
-- Constraints for table `pozycjezamowienia`
--
ALTER TABLE `pozycjezamowienia`
  ADD CONSTRAINT `FK_ProduktPozycjezamowienia` FOREIGN KEY (`id_produkt`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `FK_ZamowieniaPozycjezamowienia` FOREIGN KEY (`id_zamowienie`) REFERENCES `zamowienia` (`id`);

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `FK_UzytkownikZamowienia` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
