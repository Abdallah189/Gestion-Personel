-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2019 at 09:49 PM
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
-- Database: `partie`
--

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `cin` int(8) NOT NULL,
  `Num_serie` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `age` date NOT NULL,
  `tel` varchar(70) NOT NULL,
  `profession` varchar(70) NOT NULL,
  `sexe` varchar(70) NOT NULL,
  `conver` varchar(50) NOT NULL,
  UNIQUE KEY `Num_serie` (`Num_serie`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`cin`, `Num_serie`, `nom`, `prenom`, `age`, `tel`, `profession`, `sexe`, `conver`) VALUES
(1234, 8, 'lahbib', 'abd', '1955-03-20', '24335620', 'Etudiant', 'Homme', 'Bizerte'),
(1234, 6, 'lahbib', 'abd', '1955-03-20', '24335620', 'Etudiant', 'Homme', 'Bizerte'),
(11234567, 5, 'DFGD', 'SDFSD', '1954-03-04', '234', 'ouvrier', 'Femme', 'Sfax'),
(1234234, 9, 'QSDFDSQ', 'FDSSD', '1930-02-26', '2344', 'Chomage', 'Femme', 'Nabeul'),
(12342, 12, 'lahbib', 'abd', '1955-03-20', '24335620', 'Etudiant', 'Homme', 'Sidi Bouzid'),
(12345, 11, 'lahbib', 'abd', '1955-03-20', '24335620', 'journalier', 'Homme', 'Ariana'),
(123456, 13, 'Hazem', 'Boumnijel', '1999-02-25', '23456788', 'Cadre', 'Homme', 'Sfax'),
(1234567849, 16, 'Hazem', 'abdallah', '1993-02-25', '24335620', 'Etudiant', 'Femme', 'Le Kef');

-- --------------------------------------------------------

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `cin` int(8) NOT NULL,
  `Num_serie` int(30) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `login` varchar(70) NOT NULL,
  `psw` varchar(70) NOT NULL,
  `sexe` varchar(70) NOT NULL,
  PRIMARY KEY (`Num_serie`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responsable`
--

INSERT INTO `responsable` (`cin`, `Num_serie`, `nom`, `prenom`, `email`, `login`, `psw`, `sexe`) VALUES
(234544, 16, 'KARIM', 'Lahbib', 'rachedderwich9@gmail.com', 'Kraim@gmail.com', '1234', 'homme'),
(1345623, 3, 'Haze', 'Taher', 'lahbib.3abdallah98@gmail.com', 'slim 14', '1234', 'Femme'),
(123456, 6, 'abdallah', 'Lahbib', 'abd@gmail.com', 'sdffdss', '123', 'homme'),
(12345, 7, 'lahbib', 'abdallah', 'nessimlimem@hotmail.fr', 'SDFS', '1234', 'homme');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

DROP TABLE IF EXISTS `super_admin`;
CREATE TABLE IF NOT EXISTS `super_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `login`, `pswd`) VALUES
(1, 'Abd', '1234'),
(2, 'partie', 'partie');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
