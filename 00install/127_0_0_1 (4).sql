-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 27-Maio-2016 às 18:40
-- Versão do servidor: 5.5.49-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `painel-relatorios`
--
CREATE DATABASE IF NOT EXISTS `painel-relatorios` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `painel-relatorios`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT '1',
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `r_passos`
--

CREATE TABLE IF NOT EXISTS `r_passos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `estagio` char(1) NOT NULL DEFAULT '0',
  `ok` char(1) NOT NULL DEFAULT '0',
  `setor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `login` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ativo` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 's',
  `administrador` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'n',
  `datacad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'img/noperfil.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
