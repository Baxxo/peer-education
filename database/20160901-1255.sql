-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Set 01, 2016 alle 12:54
-- Versione del server: 10.1.13-MariaDB
-- Versione PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peer`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `corso`
--

CREATE TABLE `corso` (
  `id` int(11) NOT NULL,
  `idTutor` int(11) NOT NULL,
  `scuola` int(7) NOT NULL,
  `idMateria` int(8) NOT NULL,
  `giorno` varchar(45) NOT NULL,
  `ora` varchar(30) NOT NULL,
  `permesso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `corso`
--

INSERT INTO `corso` (`id`, `idTutor`, `scuola`, `idMateria`, `giorno`, `ora`, `permesso`) VALUES
(1, 1, 1, 1, 'MartedÃ¬', '14:00:00', 1),
(3, 2, 2, 5, 'LunedÃ¬', '13:45:00', 0),
(4, 2, 1, 9, 'VenerdÃ¬', '16:30:00', 0),
(5, 3, 1, 14, 'LunedÃ¬', '05:59:00', 0),
(6, 2, 1, 3, 'MartedÃ¬', '15:30:00', 0),
(7, 3, 2, 4, 'MartedÃ¬', '15:30:00', 0),
(10, 1, 1, 3, 'LunedÃ¬<br>MartedÃ¬<br>', '15:00<br>13:45<br>', 0),
(11, 1, 1, 7, 'MartedÃ¬<br>MercoledÃ¬<br>', '14:30<br>13:45<br>', 0),
(12, 1, 1, 3, 'LunedÃ¬<br>MartedÃ¬<br>VenerdÃ¬<br>', '13:30<br>14:00<br>13:42<br>', 0),
(13, 1, 1, 1, 'LunedÃ¬<br>MartedÃ¬<br>', '14:00<br>13:45<br>', 0),
(14, 1, 1, 16, 'LunedÃ¬<br>', '15:00<br>', 0),
(15, 1, 3, 1, 'LunedÃ¬<br>', '16:00<br>', 0),
(16, 6, 3, 2, 'LunedÃ¬<br>', '16:00<br>', 0),
(17, 7, 1, 4, 'LunedÃ¬<br>MercoledÃ¬<br>', '14:30<br>14:00<br>', 0),
(18, 1, 1, 15, 'VenerdÃ¬<br>', '13:55<br>', 0),
(20, 1, 1, 9, 'MartedÃ¬<br>', '15:00<br>', 0),
(24, 1, 1, 1, 'LunedÃ¬<br>', '14:00<br>', 0),
(25, 1, 1, 2, 'LunedÃ¬<br>', '13:45<br>', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `iscrizioni`
--

CREATE TABLE `iscrizioni` (
  `idCorso` int(11) NOT NULL,
  `idStudente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `iscrizioni`
--

INSERT INTO `iscrizioni` (`idCorso`, `idStudente`) VALUES
(4, 2),
(3, 1),
(6, 1),
(5, 1),
(4, 6),
(1, 4),
(2, 4),
(10, 4),
(10, 3),
(1, 5),
(2, 5),
(10, 5),
(12, 5),
(3, 1),
(3, 1),
(3, 1),
(3, 1),
(1, 7),
(13, 7),
(4, 1),
(7, 1),
(16, 1),
(17, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `lezione`
--

CREATE TABLE `lezione` (
  `id` int(11) NOT NULL,
  `idCorso` int(11) NOT NULL,
  `data` date NOT NULL,
  `Argomento` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `lezione`
--

INSERT INTO `lezione` (`id`, `idCorso`, `data`, `Argomento`) VALUES
(33, 1, '2016-06-23', 'Chek'),
(34, 1, '2016-06-23', 'Chek2'),
(35, 1, '2016-06-23', 'Prova'),
(36, 1, '2016-06-24', 'Order By data'),
(37, 1, '2016-06-24', 'Le derivate');

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `id` int(11) NOT NULL,
  `materia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `materie`
--

INSERT INTO `materie` (`id`, `materia`) VALUES
(1, 'Matematica'),
(2, 'Storia'),
(3, 'Informatica'),
(4, 'Inglese'),
(5, 'Italiano'),
(6, 'TPS'),
(7, 'Sistemi'),
(8, 'Ed. Fisica'),
(9, 'Geografia'),
(10, 'Francese'),
(11, 'Tedesco'),
(12, 'Spagnolo'),
(13, 'Telecomunicazioni'),
(14, 'Fisica'),
(15, 'Chimica'),
(16, 'Scienze'),
(17, 'Diritto'),
(18, 'Economia');

-- --------------------------------------------------------

--
-- Struttura della tabella `presenze`
--

CREATE TABLE `presenze` (
  `id` int(11) NOT NULL,
  `idLezione` int(11) NOT NULL,
  `idStudente` int(11) NOT NULL,
  `presente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `presenze`
--

INSERT INTO `presenze` (`id`, `idLezione`, `idStudente`, `presente`) VALUES
(5, 33, 4, 1),
(6, 33, 5, 0),
(7, 34, 4, 1),
(8, 34, 5, 1),
(9, 35, 4, 1),
(10, 35, 5, 0),
(11, 36, 4, 0),
(12, 36, 5, 1),
(13, 37, 4, 1),
(14, 37, 5, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `scuole`
--

CREATE TABLE `scuole` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `scuole`
--

INSERT INTO `scuole` (`id`, `nome`) VALUES
(1, 'Einaudi'),
(2, 'Scarpa'),
(3, 'Liceo Levi');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `scuola` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `nascita` date NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nome`, `cognome`, `classe`, `scuola`, `email`, `telefono`, `nascita`, `password`) VALUES
(0, 'admin', 'Admin', '', 0, 'admin', '', '0000-00-00', 'admin'),
(1, 'Oleksandr', 'Demian', '4B Inf', 0, 'oleksandrovsky@gmail.com', '3423118025', '1995-03-17', 'password'),
(2, 'fabio', 'biscaro', 'nessuna', 0, 'fabio.biscaro@gmail.com', '3471474457', '1974-05-04', 'fabio'),
(3, 'allah', 'popo', '6^fre', 0, 'allahcdcd@arabia.com', '66666666666666', '0001-12-25', 'jesucristo'),
(4, 'Matteo', 'Basso', '4b inf', 0, 'matteobasso9@gmail.com', '34206', '1998-09-06', 'Ciaone'),
(5, 'Qualcuno', 'Ciaone', '4b inf', 1, 'ciaone', '4564', '2016-06-09', 'ciao'),
(6, 'Stracane Ciao', 'Bovis', '4oÃ²pja', 3, 'acaso@chiociola.com', '12321', '2029-06-15', 'asdawdawd'),
(7, 'Ray', 'Obivan', '3B Inf', 1, 'ray.obivan@gmail.com', '3423118025', '1998-01-14', 'parol');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `corso`
--
ALTER TABLE `corso`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `lezione`
--
ALTER TABLE `lezione`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `presenze`
--
ALTER TABLE `presenze`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `scuole`
--
ALTER TABLE `scuole`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `corso`
--
ALTER TABLE `corso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT per la tabella `lezione`
--
ALTER TABLE `lezione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT per la tabella `materie`
--
ALTER TABLE `materie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT per la tabella `presenze`
--
ALTER TABLE `presenze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT per la tabella `scuole`
--
ALTER TABLE `scuole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
