-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 18 jun 2017 om 13:43
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactgegevens`
--

CREATE TABLE IF NOT EXISTS `contactgegevens` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(25) NOT NULL,
  `achternaam` varchar(30) NOT NULL,
  `straatnaam` varchar(50) NOT NULL,
  `huisnr` varchar(10) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `woonplaats` varchar(60) NOT NULL,
  `telnr` int(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `huisnr` (`huisnr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `contactgegevens`
--

INSERT INTO `contactgegevens` (`ID`, `voornaam`, `achternaam`, `straatnaam`, `huisnr`, `postcode`, `woonplaats`, `telnr`, `email`) VALUES
(1, 'Denny', 'Euverman', 'Dovenetel', '124', '8011AJ', 'Apeldoorn', 620971064, 'deuverman@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hobby`
--

CREATE TABLE IF NOT EXISTS `hobby` (
  `soort` varchar(50) NOT NULL,
  `omschrijving` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `hobby`
--

INSERT INTO `hobby` (`soort`, `omschrijving`) VALUES
('Sport', 'Fitness, spinning, hardlopen, outdoor');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opleiding`
--

CREATE TABLE IF NOT EXISTS `opleiding` (
  `school` varchar(100) NOT NULL,
  `eindjaar` varchar(10) NOT NULL,
  `opleiding` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `opleiding`
--

INSERT INTO `opleiding` (`school`, `eindjaar`, `opleiding`) VALUES
('R.S.G. Steenwijk', '2004', 'VMBO'),
('Friesland College', '2009', 'MBO4 ICT Beheer'),
('Koninklijke Landmacht', '2011', 'Algemene militaire opleiding luchtmobiel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `werkervaring`
--

CREATE TABLE IF NOT EXISTS `werkervaring` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `functie` varchar(100) NOT NULL,
  `beginjaar` varchar(10) NOT NULL,
  `functie_omschrijving` varchar(999) NOT NULL,
  `werkgever_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Gegevens worden uitgevoerd voor tabel `werkervaring`
--

INSERT INTO `werkervaring` (`ID`, `functie`, `beginjaar`, `functie_omschrijving`, `werkgever_id`) VALUES
(1, 'Vakkenvuller', '2003', 'Vakkenvuller', 1),
(2, 'Expeditie medewerker', '2006', 'Het invoeren en plaatsen van producten in het magazijn, vrachtwagens d.m.v. een heftruck.', 2),
(3, 'All-round medewerker en vulploegleider', '2008', 'Op alle afdeling was ik inzetbaar en daarnaast gaf ik leiding aan de vakkenvullers.', 3),
(4, 'Munitie werker 120mm mortieren Luchtmobiel', '2011', 'Boordschutter op een jeep en het gereed maken van mortier munitie.', 4),
(5, 'PZFIII schuuter luchtmobiel', '2011', 'Op divers afstanden gepantserde voertuigen uitschakelen.', 4),
(6, 'Assistent peiler/interceptor', '2013', 'Het uitluisteren en peilen van het elektromagnetisch spectrum.', 4),
(7, 'Local support and installation medewerker', '2016', 'Het installeren en ondersteunen van netwerken in een besloten omgeving.', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `werkgever`
--

CREATE TABLE IF NOT EXISTS `werkgever` (
  `werkgever_id` int(11) NOT NULL AUTO_INCREMENT,
  `werkgevernaam` varchar(50) NOT NULL,
  `vestigingsplaats` varchar(50) NOT NULL,
  `link` varchar(99) NOT NULL,
  PRIMARY KEY (`werkgever_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `werkgever`
--

INSERT INTO `werkgever` (`werkgever_id`, `werkgevernaam`, `vestigingsplaats`, `link`) VALUES
(1, 'Edah', 'Steenwijk', ''),
(2, 'Kornelis Caps and Closures', 'Steenwijk', 'http://www.kornelis.com/nl/'),
(3, 'C1000', 'Steenwijk', ''),
(4, 'Koninklijke landmacht', '''T Harde', 'https://www.defensie.nl/organisatie/landmacht');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
