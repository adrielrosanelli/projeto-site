-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2020 às 01:47
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto-site-teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `areadoprofissional`
--

CREATE TABLE `areadoprofissional` (
  `areaId` int(11) NOT NULL,
  `profissionalId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `areadoprojeto`
--

CREATE TABLE `areadoprojeto` (
  `areaId` int(11) NOT NULL,
  `vagaProfissionalId` int(11) NOT NULL,
  `vagaContratanteId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

CREATE TABLE `formacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacaodoprofissional`
--

CREATE TABLE `formacaodoprofissional` (
  `formacaoId` int(11) NOT NULL,
  `profissionalId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `valor` int(6) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `dataInicial` date DEFAULT NULL,
  `status` enum('Disponivel','Negociando','fechado') DEFAULT NULL,
  `codigoDoContratante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacionador`
--

CREATE TABLE `transacionador` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `descricao` text NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `escolaridade` enum('0','1','2','3','4','5') DEFAULT NULL,
  `precoHora` int(6) DEFAULT NULL,
  `status` enum('Disponivel','Ocupado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transacionador`
--

INSERT INTO `transacionador` (`id`, `nome`, `email`, `descricao`, `dataNascimento`, `escolaridade`, `precoHora`, `status`) VALUES
(1, 'adriel', 'adriel16smo@gmail.com', '', '2020-11-11', '2', 1234, 'Disponivel'),
(2, 'adriel', 'adriel16smo@gmail.com', 'Bacon ipsum dolor amet meatball tenderloin pork chop ground round shankle venison. Alcatra ground round ball tip andouille cupim. Shankle beef ribs frankfurter, chislic ball tip turkey pig short ribs porchetta burgdoggen prosciutto fatback. Fatback hamburger pancetta pork belly rump.', '2020-11-20', '1', 12441, 'Disponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `profissionalId` int(11) NOT NULL,
  `vagaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `areadoprofissional`
--
ALTER TABLE `areadoprofissional`
  ADD PRIMARY KEY (`areaId`,`profissionalId`),
  ADD KEY `fk_area_has_profissional_profissional1` (`profissionalId`);

--
-- Índices para tabela `areadoprojeto`
--
ALTER TABLE `areadoprojeto`
  ADD PRIMARY KEY (`areaId`,`vagaProfissionalId`,`vagaContratanteId`);

--
-- Índices para tabela `formacao`
--
ALTER TABLE `formacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `formacaodoprofissional`
--
ALTER TABLE `formacaodoprofissional`
  ADD PRIMARY KEY (`formacaoId`,`profissionalId`),
  ADD KEY `fk_formacao_has_profissional_profissional` (`profissionalId`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Projeto_profissional` (`codigoDoContratante`);

--
-- Índices para tabela `transacionador`
--
ALTER TABLE `transacionador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`profissionalId`,`vagaId`),
  ADD KEY `fk_profissional_has_vaga_vaga1` (`vagaId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `areadoprojeto`
--
ALTER TABLE `areadoprojeto`
  MODIFY `areaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formacao`
--
ALTER TABLE `formacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transacionador`
--
ALTER TABLE `transacionador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `areadoprofissional`
--
ALTER TABLE `areadoprofissional`
  ADD CONSTRAINT `fk_area_has_profissional_area` FOREIGN KEY (`areaId`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_area_has_profissional_profissional1` FOREIGN KEY (`profissionalId`) REFERENCES `transacionador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `areadoprojeto`
--
ALTER TABLE `areadoprojeto`
  ADD CONSTRAINT `fk_area_has_vaga_area1` FOREIGN KEY (`areaId`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `formacaodoprofissional`
--
ALTER TABLE `formacaodoprofissional`
  ADD CONSTRAINT `fk_formacao_has_profissional_formacao` FOREIGN KEY (`formacaoId`) REFERENCES `formacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_formacao_has_profissional_profissional` FOREIGN KEY (`profissionalId`) REFERENCES `transacionador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `fk_Projeto_profissional` FOREIGN KEY (`codigoDoContratante`) REFERENCES `transacionador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vaga`
--
ALTER TABLE `vaga`
  ADD CONSTRAINT `fk_profissional_has_vaga_profissional` FOREIGN KEY (`profissionalId`) REFERENCES `transacionador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profissional_has_vaga_vaga1` FOREIGN KEY (`vagaId`) REFERENCES `projeto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
