-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2018 at 01:13 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iznajmljivanje_auta`
--

-- --------------------------------------------------------

--
-- Table structure for table `automobili`
--

DROP TABLE IF EXISTS `automobili`;
CREATE TABLE IF NOT EXISTS `automobili` (
  `idauta` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  `dimenzije` int(11) NOT NULL,
  `cijena` varchar(45) NOT NULL,
  `broj_vrata` int(11) NOT NULL,
  `broj_brzina` int(11) NOT NULL,
  `vrsta_goriva` char(20) NOT NULL,
  `opis_auta` varchar(500) NOT NULL,
  `grad_id_grad` int(11) NOT NULL,
  `vrsta_auta_id_vrsta_auta` int(11) NOT NULL,
  `zupanija_id_zupanija` int(11) NOT NULL,
  PRIMARY KEY (`idauta`,`grad_id_grad`,`vrsta_auta_id_vrsta_auta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `automobili`
--

INSERT INTO `automobili` (`idauta`, `naziv`, `dimenzije`, `cijena`, `broj_vrata`, `broj_brzina`, `vrsta_goriva`, `opis_auta`, `grad_id_grad`, `vrsta_auta_id_vrsta_auta`, `zupanija_id_zupanija`) VALUES
(1, 'Tiguan', 100, '10000', 5, 6, 'dizel', 'Auto je iznimno očuvan i ima servisnu knjigu.', 1, 2, 0),
(2, 'Golf II', 3, '250', 3, 4, 'benzin', 'Auto je solidno očuvan.', 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

DROP TABLE IF EXISTS `grad`;
CREATE TABLE IF NOT EXISTS `grad` (
  `id_grad` int(11) NOT NULL AUTO_INCREMENT,
  `ime_grada` varchar(45) DEFAULT NULL,
  `zupanija_id_zupanija` int(11) NOT NULL,
  PRIMARY KEY (`id_grad`,`zupanija_id_zupanija`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id_grad`, `ime_grada`, `zupanija_id_zupanija`) VALUES
(1, 'Posušje', 1),
(2, 'Mostar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `idkorisnik` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `kontakt_broj` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `oib` int(11) NOT NULL,
  `lozinka` varchar(45) NOT NULL,
  `razina` int(11) DEFAULT NULL,
  `grad_id_grad` int(11) NOT NULL,
  PRIMARY KEY (`idkorisnik`,`grad_id_grad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idkorisnik`, `ime`, `prezime`, `kontakt_broj`, `email`, `oib`, `lozinka`, `razina`, `grad_id_grad`) VALUES
(1, 'Ivan', 'Dragoja', '063984479', 'ivan.dragoja@hotmail.com', 12345678, '123', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

DROP TABLE IF EXISTS `rezervacija`;
CREATE TABLE IF NOT EXISTS `rezervacija` (
  `idrezervacija` int(11) NOT NULL AUTO_INCREMENT,
  `pocetni_datum_rezervacije` date NOT NULL,
  `krajnji_datum_rezervacije` date NOT NULL,
  `datum_rezervacije` varchar(45) DEFAULT NULL,
  `cijena` int(11) DEFAULT NULL,
  `korisnik_idkorisnik` int(11) NOT NULL,
  `auto_idauto` int(11) NOT NULL,
  PRIMARY KEY (`idrezervacija`,`korisnik_idkorisnik`,`auto_idauto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

DROP TABLE IF EXISTS `slike`;
CREATE TABLE IF NOT EXISTS `slike` (
  `idslike` int(11) NOT NULL AUTO_INCREMENT,
  `lokacija` varchar(250) DEFAULT NULL,
  `auto_idauta` int(11) NOT NULL,
  PRIMARY KEY (`idslike`,`auto_idauta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`idslike`, `lokacija`, `auto_idauta`) VALUES
(1, 'img/slider/merc.jpg', 1),
(2, 'img/slider/bmw.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_auta`
--

DROP TABLE IF EXISTS `vrsta_auta`;
CREATE TABLE IF NOT EXISTS `vrsta_auta` (
  `id_vrsta_auta` int(11) NOT NULL AUTO_INCREMENT,
  `tip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_vrsta_auta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrsta_auta`
--

INSERT INTO `vrsta_auta` (`id_vrsta_auta`, `tip`) VALUES
(1, 'Kabriolet'),
(2, 'Karavan'),
(3, 'Limuzina'),
(4, 'Kombi');

-- --------------------------------------------------------

--
-- Table structure for table `zupanija`
--

DROP TABLE IF EXISTS `zupanija`;
CREATE TABLE IF NOT EXISTS `zupanija` (
  `id_zupanija` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_zupanije` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_zupanija`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zupanija`
--

INSERT INTO `zupanija` (`id_zupanija`, `naziv_zupanije`) VALUES
(1, 'Zapadno-hercegovacka'),
(2, 'Hercegovačko-neretvanska');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
