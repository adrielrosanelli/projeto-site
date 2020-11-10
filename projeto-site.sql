-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2020 às 00:45
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto-site`
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
-- Estrutura da tabela `contratante`
--

CREATE TABLE `contratante` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `detalhes` varchar(100) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

CREATE TABLE `formacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` int(6) DEFAULT NULL,
  `profissional_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `descricao` varchar(200) NOT NULL,
  `idade` int(2) DEFAULT NULL,
  `escolaridade` enum('0','1','2','3','4','5') DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `preco` int(6) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`id`, `nome`, `descricao`, `idade`, `escolaridade`, `area_id`, `preco`, `status`) VALUES
(1, 'adriel', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum corrupti officia exercitationem labore atque deserunt alias inventore similique commodi iure, molestiae consectetur dicta vel eveni', 24, '3', 1, 2500, '0'),
(2, 'Gledson', 'Atuo na área á exatamente 1/16 avos de um ano', 27, '2', 3, 6000, '0'),
(3, 'çabola', 'jdgbhsuidjgbsjkdçgbdçfb', 35, '4', 2, 7500, NULL),
(4, 'Cleber', 'sdasdasdadsadad', 17, '1', 7, 1500, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `profissional_id` int(11) NOT NULL,
  `contratante_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `valor` int(6) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `dataInicial` date DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT NULL
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
-- Índices para tabela `contratante`
--
ALTER TABLE `contratante`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `formacao`
--
ALTER TABLE `formacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`profissional_id`,`contratante_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
