-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Fev-2021 às 14:13
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formacaophp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `socio`
--

DROP TABLE IF EXISTS `socio`;
CREATE TABLE IF NOT EXISTS `socio` (
  `id_socio` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `apelido` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `qpagas` varchar(1) NOT NULL,
  PRIMARY KEY (`id_socio`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `socio`
--

INSERT INTO `socio` (`id_socio`, `Nome`, `apelido`, `sexo`, `qpagas`) VALUES
(1, 'Rui Brotas', 'brotas', 'M', 'S'),
(2, 'José', 'António', 'M', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

DROP TABLE IF EXISTS utilizadores;
CREATE TABLE IF NOT EXISTS utilizadores (
  id_utilizador int(11) NOT NULL AUTO_INCREMENT,
  nome_utilizador varchar(75) NOT NULL,
  palavra_chave varchar(20) NOT NULL,
  email varchar(75) NOT NULL,
  PRIMARY KEY (id_utilizador)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO utilizadores (id_utilizador, nome_utilizador, palavra_chave, email) VALUES
(1, 'Rui', 'rui', 'ruibrotas@sapo.pt'),
(2, 'admin', 'admin', 'admin@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
