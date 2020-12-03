-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Dez-2020 às 01:53
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

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
  `codigoDoContratante` int(11) DEFAULT NULL,
  `idDoContratante` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id`, `valor`, `nome`, `descricao`, `dataInicial`, `status`, `codigoDoContratante`, `idDoContratante`) VALUES
(3, 1200, 'Estagiarios2', 'Fazer café toda manhã', '2020-11-26', '', NULL, 0),
(4, 1000, 'Estagiario', 'Fazer café toda manhã', '2020-12-02', '', NULL, 0),
(5, 10000, 'adri', 'Desenvolver nova aplicação contavel', '2020-12-10', 'Disponivel', NULL, 0),
(6, 3000, 'gerenteseses', 'Fazer café toda manhã', '2021-01-08', 'Disponivel', 15, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacionador`
--

CREATE TABLE `transacionador` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `descricao` text NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `escolaridade` enum('Ensino-Médio','Técnico','Graduação','Pós-Graduação','Doutorado','Mestrado') DEFAULT NULL,
  `precoHora` int(6) DEFAULT NULL,
  `status` enum('Disponivel','Ocupado') DEFAULT NULL,
  `arquivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transacionador`
--

INSERT INTO `transacionador` (`id`, `nome`, `email`, `senha`, `descricao`, `dataNascimento`, `escolaridade`, `precoHora`, `status`, `arquivo`) VALUES
(3, 'robson', 'adriel16smo@gmail.com', '123', 'cuidar dos computadores', '2020-11-02', 'Ensino-Médio', 3000, 'Disponivel', 'cd55b9f09847324a58488846b62a1f98.jpg'),
(5, 'sistemas', 'adeilson@gmail.com', '1234', 'sadbasidladh', '2020-11-24', 'Ensino-Médio', 123, 'Disponivel', '1c8ca5e5906366065ffe2fe2bd46e910.jpg'),
(6, 'adriel', 'adriel16smo@gmail.com', '', 'cuida das pessoas', '2020-11-19', 'Ensino-Médio', 123, 'Disponivel', ''),
(7, 'adriel', 'asd@gmail.com', '', 'cuida das pessoas', '2020-11-28', 'Ensino-Médio', 123, 'Disponivel', ''),
(8, 'sistemas', 'asd@gmail.com', '', 'cuida das pessoas', '2020-11-20', 'Ensino-Médio', 123, '', ''),
(9, 'adriel', 'adriel16smo@gmail.com', '', 'cuidar de pessoas', '2020-11-27', 'Ensino-Médio', 1234, 'Disponivel', '492418d0b5ccdf3f63e41e53112de949.jpg'),
(11, 'Estagiario', 'adriel16-smo@gmail.com', '', 'Sou formado em pirueta quadrupla meia carpada ao contrario\r\n\r\nMeus contatos são :\r\n9999999999 - whatsapp\r\n\r\nadriel16-smo@gmail.com \r\nlinkedin e e-mail', '2020-12-02', 'Graduação', 100, '', '4a72bbccd1ae319317165256a475a9f5.jpg'),
(15, 'Adriel', 'adri@gmail.com', '12345', '', '1997-01-04', 'Graduação', 2000, 'Disponivel', '9fca79334fdd65b349fc360c0de1c110.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `transacionador`
--
ALTER TABLE `transacionador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
