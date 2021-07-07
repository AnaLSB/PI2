-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Dez-2019 às 17:14
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `integrador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carona`
--

CREATE TABLE `carona` (
  `IDCARONA` int(11) NOT NULL,
  `ORIGEM` varchar(80) NOT NULL,
  `DESTINO` varchar(80) NOT NULL,
  `DATAOR` date NOT NULL,
  `HORAOR` time NOT NULL,
  `DATADEST` date DEFAULT NULL,
  `HORADEST` time DEFAULT NULL,
  `PRECO` decimal(10,2) NOT NULL,
  `VAGAS` int(11) NOT NULL,
  `IDAVOLTA` varchar(10) DEFAULT NULL,
  `IDUSUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carona`
--

INSERT INTO `carona` (`IDCARONA`, `ORIGEM`, `DESTINO`, `DATAOR`, `HORAOR`, `DATADEST`, `HORADEST`, `PRECO`, `VAGAS`, `IDAVOLTA`, `IDUSUARIO`) VALUES
(1, 'Berilo', 'AraÃ§uaÃ­', '2019-12-12', '11:20:00', NULL, NULL, '30.00', 1, NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carona`
--
ALTER TABLE `carona`
  ADD PRIMARY KEY (`IDCARONA`),
  ADD KEY `FK_IDUSUARIO` (`IDUSUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carona`
--
ALTER TABLE `carona`
  MODIFY `IDCARONA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carona`
--
ALTER TABLE `carona`
  ADD CONSTRAINT `FK_IDUSUARIO` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`IDUSUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
