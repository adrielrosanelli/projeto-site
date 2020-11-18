-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2020 às 00:55
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
  `status` enum('Disponivel','Ocupado') DEFAULT NULL,
  `arquivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transacionador`
--

INSERT INTO `transacionador` (`id`, `nome`, `email`, `descricao`, `dataNascimento`, `escolaridade`, `precoHora`, `status`, `arquivo`) VALUES
(3, 'robson', 'adriel16smo@gmail.com', 'cuidar dos computadores', '2020-11-02', '1', 3000, '', '35cbf7a945f76c32330ad3793f9a66d8.jpg'),
(5, 'sistemas', 'asdasdsa@dsadasd.com', 'sadbasidladh', '2020-11-24', '1', 123, 'Disponivel', '1c8ca5e5906366065ffe2fe2bd46e910.jpg'),
(6, 'adriel', 'adriel16smo@gmail.com', 'cuida das pessoas', '2020-11-19', '1', 123, 'Disponivel', ''),
(7, 'adriel', 'asd@gmail.com', 'cuida das pessoas', '2020-11-28', '1', 123, 'Disponivel', ''),
(8, 'sistemas', 'asd@gmail.com', 'cuida das pessoas', '2020-11-20', '1', 123, '', ''),
(9, 'adriel', 'adriel16smo@gmail.com', 'cuidar de pessoas', '2020-11-27', '1', 1234, 'Disponivel', '492418d0b5ccdf3f63e41e53112de949.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`email`, `senha`) VALUES
('adriel16smo@gmail.com', '123');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
