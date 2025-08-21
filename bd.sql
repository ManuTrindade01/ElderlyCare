-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/08/2025 às 03:31
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd`
--
CREATE DATABASE IF NOT EXISTS `bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoriacuidador`
--

CREATE TABLE `categoriacuidador` (
  `idcategoria` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contrato`
--

CREATE TABLE `contrato` (
  `idcontrato` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `tipoContrato` int(1) NOT NULL,
  `quantDias` int(11) NOT NULL,
  `dataContrato` date NOT NULL,
  `dataInicialVigencia` date NOT NULL,
  `dataFinalVigencia` date NOT NULL,
  `objContrato` varchar(150) NOT NULL,
  `valorContrato` double NOT NULL,
  `horaEntrada` datetime NOT NULL,
  `horaSaida` datetime NOT NULL,
  `inicioIntervalo` datetime NOT NULL,
  `fimIntervalo` datetime NOT NULL,
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cuidador`
--

CREATE TABLE `cuidador` (
  `idcuidador` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `nomeCompleto` varchar(200) NOT NULL,
  `CPF` int(11) NOT NULL,
  `dataNascimento` datetime NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `certificado` blob NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `horarioInicialDisp` time NOT NULL,
  `horarioFinalDisp` time NOT NULL,
  `foto` blob NOT NULL,
  `antecedentesCriminais` blob NOT NULL,
  `declaracaoVacina` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `idoso`
--

CREATE TABLE `idoso` (
  `ididoso` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `nomeCompleto` varchar(200) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `dataNascimento` varchar(200) NOT NULL,
  `CEP` varchar(20) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(150) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `limitacoesFisicas` varchar(45) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `idresponsavel` int(5) NOT NULL,
  `status` int(11) NOT NULL,
  `nomeCompleto` varchar(200) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `dataNascimento` datetime NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(150) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `idservico` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `exigencias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoriacuidador`
--
ALTER TABLE `categoriacuidador`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Índices de tabela `cuidador`
--
ALTER TABLE `cuidador`
  ADD PRIMARY KEY (`idcuidador`);

--
-- Índices de tabela `idoso`
--
ALTER TABLE `idoso`
  ADD PRIMARY KEY (`ididoso`);

--
-- Índices de tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`idresponsavel`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idservico`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoriacuidador`
--
ALTER TABLE `categoriacuidador`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cuidador`
--
ALTER TABLE `cuidador`
  MODIFY `idcuidador` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `idoso`
--
ALTER TABLE `idoso`
  MODIFY `ididoso` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `idresponsavel` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `idservico` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
