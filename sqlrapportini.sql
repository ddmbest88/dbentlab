-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.1.21-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win32
-- HeidiSQL Versione:            9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dump della struttura del database rapportini
CREATE DATABASE IF NOT EXISTS `rapportini` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rapportini`;

-- Dump della struttura di tabella rapportini.campi
CREATE TABLE IF NOT EXISTS `campi` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `stato` tinytext,
  `data_rich` date DEFAULT NULL,
  `tecnico` tinytext,
  `modello` tinytext,
  `matricola` tinytext,
  `desc.modello` tinytext,
  `rsociale` tinytext,
  `indirizzo` tinytext,
  `localita` tinytext,
  `telefono` tinytext,
  `mail` tinytext,
  `cliente` tinytext,
  `indirizzodest` tinytext,
  `localitadest` tinytext,
  `tipoint` tinytext,
  `guastodichiarato` tinytext,
  `lavoroeseguito` tinytext,
  `note` tinytext,
  `dataintervento` date DEFAULT NULL,
  `ore1` int(11) DEFAULT NULL,
  `ore2` int(11) DEFAULT NULL,
  `km1` int(11) DEFAULT NULL,
  `ore3` int(11) DEFAULT NULL,
  `ore4` int(11) DEFAULT NULL,
  `ore5` int(11) DEFAULT NULL,
  `ore6` int(11) DEFAULT NULL,
  `note2` tinytext,
  `#113` int(11) DEFAULT NULL,
  `#301` int(11) DEFAULT NULL,
  `#501` int(11) DEFAULT NULL,
  `funzionalita` int(1) DEFAULT NULL,
  `conformita` int(1) DEFAULT NULL,
  `completato` int(1) DEFAULT NULL,
  `ftecnico` text,
  `fcliente` text,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- L’esportazione dei dati non era selezionata.
-- Dump della struttura di tabella rapportini.tecnici
CREATE TABLE IF NOT EXISTS `tecnici` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `username` tinytext,
  `password` tinytext,
  `real_name` tinytext,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- L’esportazione dei dati non era selezionata.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
