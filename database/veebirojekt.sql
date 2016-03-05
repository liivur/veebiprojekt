-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2016 at 03:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `veebirojekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `erakonnad`
--

CREATE TABLE IF NOT EXISTS `erakonnad` (
  `erak_id` int(11) NOT NULL,
  `erak_nimi` varchar(100) NOT NULL,
  PRIMARY KEY (`erak_id`),
  UNIQUE KEY `erak_id` (`erak_id`),
  KEY `erak_id_2` (`erak_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `erakonnad`
--

INSERT INTO `erakonnad` (`erak_id`, `erak_nimi`) VALUES
(1, 'Eesti Keskerakond	');

-- --------------------------------------------------------

--
-- Table structure for table `inimesed`
--

CREATE TABLE IF NOT EXISTS `inimesed` (
  `in_id` int(2) NOT NULL,
  `nimi` varchar(23) NOT NULL,
  `erakond` varchar(1) DEFAULT NULL,
  `maakond` int(2) NOT NULL,
  `on valinud` int(1) NOT NULL,
  PRIMARY KEY (`in_id`),
  UNIQUE KEY `in_id_2` (`in_id`),
  KEY `COL 4` (`maakond`),
  KEY `COL 5` (`on valinud`),
  KEY `COL 1` (`in_id`),
  KEY `in_id` (`in_id`),
  KEY `on valinud` (`on valinud`),
  KEY `maakond` (`maakond`),
  KEY `erakond` (`erakond`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inimesed`
--

INSERT INTO `inimesed` (`in_id`, `nimi`, `erakond`, `maakond`, `on valinud`) VALUES
(1, 'ELINA AAB', '1', 1, 0),
(3, 'RAIVO AAB', '1', 3, 0),
(4, '?LLE AADUSSOO', '1', 4, 0),
(5, 'EDGAR AAL', '1', 5, 0),
(6, 'TAIVO AAL', '1', 6, 0),
(7, 'AASA AALISTE', '1', 7, 0),
(8, 'TOIVO AALMANN', '1', 8, 0),
(9, 'KATRIN AALPERE', '1', 9, 0),
(10, 'KAIRE AAMISEPP', '1', 10, 0),
(11, 'KOIT AAMISEPP', '1', 11, 0),
(12, 'ANGELA AAN', '1', 12, 0),
(13, 'MAIE AAN', '1', 13, 0),
(14, 'MARTIN AAN', '1', 14, 0),
(15, 'Anne Aan', '1', 15, 0),
(16, 'VILMI AARDE', '1', 1, 0),
(17, 'K?LLI AARDMA', '1', 2, 0),
(18, 'ANTS AARE', '1', 3, 0),
(19, 'HELIISA AARE', '1', 4, 0),
(20, 'JEVGENI AARE', '1', 5, 0),
(21, 'KALLE AARE', '1', 6, 0),
(22, 'LEMBIT AARE', '1', 7, 0),
(23, 'MART AARE', '1', 8, 0),
(24, 'VALENTINA AARE', '1', 9, 0),
(25, 'SIRLI AARI', '1', 10, 0),
(26, 'ALEKSEI ANTOHHA', '2', 11, 0),
(27, 'KRISTINA ANTOHHA', '2', 12, 0),
(28, 'AARE ANTON', '2', 13, 0),
(29, 'ARLE ANTON', '2', 14, 0),
(30, 'ARNO ANTON', '2', 15, 0),
(31, 'KALLE ANTON', '2', 1, 0),
(32, 'KALMER ANTON', '2', 2, 0),
(33, 'MARE ANTON', '2', 3, 0),
(34, 'MARIS ANTON', '2', 4, 0),
(35, 'SILVI ANTON', '2', 5, 0),
(36, 'KATRIN ANTONOV', '2', 6, 0),
(37, 'KRISTEL ANTONOV', '2', 7, 0),
(38, 'SIRLI ANTSMAA', '2', 8, 0),
(39, 'ALLAR-RAUL ANTSON', '2', 9, 0),
(40, 'HANNA ANTSON', '2', 10, 0),
(41, 'VIKTORIA ANU?OVA', '2', 11, 0),
(42, 'ANTI ANVELT', '2', 12, 0),
(43, 'MARJU ANVELT', '2', 13, 0),
(44, 'JAANUS AOMERE', '2', 14, 0),
(45, 'MARIANNA APALKOVA', '2', 15, 0),
(46, 'MAIRE APPO', '2', 1, 0),
(47, 'JULIA APURINA', '2', 2, 0),
(48, 'ANDRES ARAK', '2', 3, 0),
(49, 'ITTA ARAK', '2', 4, 0),
(50, 'LIIS ARAK', '2', 5, 0),
(51, 'URMAS ARAK', '2', 6, 0),
(52, 'ELBE ARBEITER', '2', 7, 0),
(53, 'ELMA AREN', '2', 8, 0),
(54, 'JULIA ARESTEGUI BERECHE', '2', 9, 0),
(55, 'KALEV ARGE', '2', 10, 0),
(56, 'KRISTJAN ARGE', '2', 11, 0),
(57, 'MADIS ARGE', '2', 12, 0),
(58, 'MAREK ARGE', '2', 13, 0),
(59, 'MARKO ARGE', '2', 14, 0),
(60, 'MARTIN ARGE', '2', 15, 0),
(61, 'MAIDO ARGEL', '2', 1, 0),
(62, 'ARTJOM ARHANGELSKI', '2', 2, 0),
(63, 'RENA ARHIPOV', '2', 3, 0),
(64, 'TOIVO ARHIPOV', '2', 4, 0),
(65, 'MARIKA ARHIPOVA', '2', 5, 0),
(66, 'LEA ARIKAINEN', '2', 6, 0),
(67, 'PEETER ARIKO', '2', 7, 0),
(68, 'HELVI ARKLIN?', '2', 8, 0),
(69, 'AIVI ARMULIK', '2', 9, 0),
(70, 'REBECCA LIIS ARMUS', '2', 10, 0),
(71, 'KAJA ARNIM', '2', 11, 0),
(72, 'INGE ARNOLD', '2', 12, 0),
(73, 'ANDRES ARO', '2', 13, 0),
(74, 'LIISA ARO', '2', 14, 0),
(75, 'RIINA-ESTER ARO', '2', 15, 0),
(76, 'KRISTO AROELLA', '2', 1, 0),
(77, 'MILVI AROLD', '2', 2, 0),
(78, 'ALLAR ARON', '2', 3, 0),
(79, 'AIRE AROS', '2', 4, 0),
(80, 'SILVER AROS', '2', 5, 0),
(81, 'EVELY ARP', '2', 6, 0),
(82, 'GERDA ARR', '2', 7, 0),
(83, 'TIIU ARR', '2', 8, 0),
(84, 'UUNO ARR', '2', 9, 0),
(85, 'ANNIKA ARRAS', '2', 10, 0),
(86, 'HENRI ARRAS', '2', 11, 0),
(87, 'JOEL ARRAS', '2', 12, 0),
(88, 'J?RI ARRAS', '2', 13, 0),
(89, 'TIIU ARRAS', '2', 14, 0),
(90, 'KADRI MOKS', '', 3, 0),
(91, 'SANDER SATS', '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `maakonnad`
--

CREATE TABLE IF NOT EXISTS `maakonnad` (
  `mk_id` int(2) NOT NULL DEFAULT '0',
  `nimi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mk_id`),
  KEY `COL 1` (`mk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maakonnad`
--

INSERT INTO `maakonnad` (`mk_id`, `nimi`) VALUES
(1, '?Harju maakond'),
(2, '?Ida-Viru maakond'),
(3, '?Tartu maakond'),
(4, '?P?rnu maakond'),
(5, '?L??ne-Viru maakond'),
(6, '?Viljandi maakond'),
(7, '?Rapla maakond'),
(8, '?V?ru maakond'),
(9, '?Saare maakond'),
(10, '?J?geva maakond'),
(11, '?J?rva maakond'),
(12, '?Valga maakond'),
(13, '?P?lva maakond'),
(14, '?L??ne maakond'),
(15, '?Hiiu maakond');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inimesed`
--
ALTER TABLE `inimesed`
  ADD CONSTRAINT `inimesed_ibfk_1` FOREIGN KEY (`maakond`) REFERENCES `maakonnad` (`mk_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
