-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Dez-2020 às 14:12
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `almoxarifado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ferramentas`
--

DROP TABLE IF EXISTS `tb_ferramentas`;
CREATE TABLE IF NOT EXISTS `tb_ferramentas` (
  `cod_ferramenta` int NOT NULL AUTO_INCREMENT,
  `nome_ferramenta` varchar(80) NOT NULL,
  `marca_ferramenta` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_ferramenta`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ferramentas`
--

INSERT INTO `tb_ferramentas` (`cod_ferramenta`, `nome_ferramenta`, `marca_ferramenta`) VALUES
(39, 'furadeira', 'bochee'),
(45, 'Martelo', 'Tramontina'),
(46, 'Picareta', 'Tramontina');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
