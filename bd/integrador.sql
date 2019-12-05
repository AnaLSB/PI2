-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Dez-2019 às 16:16
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
  `DATA` date NOT NULL,
  `HORARIO` time NOT NULL,
  `PRECO` decimal(10,2) NOT NULL,
  `VAGAS` int(11) NOT NULL,
  `IDAVOLTA` varchar(11) DEFAULT NULL,
  `IDUSUARIO` int(11) NOT NULL,
  `DATAVOLTA` date DEFAULT NULL,
  `HORAVOLTA` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carona`
--

INSERT INTO `carona` (`IDCARONA`, `ORIGEM`, `DESTINO`, `DATA`, `HORARIO`, `PRECO`, `VAGAS`, `IDAVOLTA`, `IDUSUARIO`, `DATAVOLTA`, `HORAVOLTA`) VALUES
(1, 'AraÃ§uaÃ­', 'Virgem da Lapa', '2019-11-28', '12:00:00', '20.00', 0, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `IDSOLICITACAO` int(11) NOT NULL,
  `IDCARONA` int(11) NOT NULL,
  `IDSOLICITANTE` int(11) NOT NULL,
  `ESTADO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicitacao`
--

INSERT INTO `solicitacao` (`IDSOLICITACAO`, `IDCARONA`, `IDSOLICITANTE`, `ESTADO`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `IDUSUARIO` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `PROFILEPIC` varchar(255) DEFAULT NULL,
  `DATANASC` date NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `SENHA` varchar(32) NOT NULL,
  `DDD` varchar(2) NOT NULL,
  `TELEFONE` varchar(9) NOT NULL,
  `AVALIACAO` int(11) DEFAULT NULL,
  `FACEBOOK` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`IDUSUARIO`, `NOME`, `PROFILEPIC`, `DATANASC`, `EMAIL`, `SENHA`, `DDD`, `TELEFONE`, `AVALIACAO`, `FACEBOOK`) VALUES
(1, 'Wellington', NULL, '2019-12-04', 'wds@gmail.com', '202cb962ac59075b964b07152d234b70', '33', '999602957', NULL, ''),
(2, 'Breno Cota', NULL, '2019-11-25', 'breno@gmail.com', '202cb962ac59075b964b07152d234b70', '33', '123123132', NULL, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carona`
--
ALTER TABLE `carona`
  ADD PRIMARY KEY (`IDCARONA`),
  ADD KEY `IDUSUARIO` (`IDUSUARIO`);

--
-- Índices para tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`IDSOLICITACAO`),
  ADD KEY `IDCARONA` (`IDCARONA`),
  ADD KEY `IDSOLICITANTE` (`IDSOLICITANTE`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUSUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carona`
--
ALTER TABLE `carona`
  MODIFY `IDCARONA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `IDSOLICITACAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carona`
--
ALTER TABLE `carona`
  ADD CONSTRAINT `carona_ibfk_1` FOREIGN KEY (`IDUSUARIO`) REFERENCES `usuario` (`IDUSUARIO`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD CONSTRAINT `solicitacao_ibfk_1` FOREIGN KEY (`IDCARONA`) REFERENCES `carona` (`IDCARONA`) ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitacao_ibfk_2` FOREIGN KEY (`IDSOLICITANTE`) REFERENCES `usuario` (`IDUSUARIO`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
