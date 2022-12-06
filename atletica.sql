-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2022 às 00:37
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atletica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `IDALUNO` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `RA` longtext NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `TELEFONE` varchar(200) NOT NULL,
  `IMAGEM` longtext NOT NULL,
  `TIPO` varchar(1) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime NOT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`IDALUNO`, `NOME`, `RA`, `EMAIL`, `TELEFONE`, `IMAGEM`, `TIPO`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(1, 'Mateus Xavier', '0200831811038', 'mateusfelipe391@gmail.com', '14990000000', '', 'A', '', '2022-11-29 16:53:02', '', '2022-11-29 16:53:02'),
(2, 'JUNIOR', '1458798748147', 'Junior@gmail.com', '14998754841', '', 'C', '', '2022-11-29 17:00:12', '', '2022-11-29 17:00:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atletas`
--

CREATE TABLE `atletas` (
  `IDATLETA` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `RA` longtext NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `TELEFONE` varchar(200) NOT NULL,
  `IMAGEM` longtext NOT NULL,
  `SITUACAO` varchar(1) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime NOT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atletas`
--

INSERT INTO `atletas` (`IDATLETA`, `NOME`, `RA`, `EMAIL`, `TELEFONE`, `IMAGEM`, `SITUACAO`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(1, 'mateus xavier2', '0200831811038', 'mateus@gmail.com', '14 000000001', 'semfoto.jpg', 'A', 'mateus', '2022-11-04 13:43:00', 'mateus', '2022-11-10 14:43:00'),
(12, 'teste', '999858', 'teste@gmail.com', '(14) 00000-0000', 'semfoto.jpg', 'C', 'mateus', '2022-11-25 15:54:00', 'mateus', '2022-11-25 15:56:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atletas_equipes`
--

CREATE TABLE `atletas_equipes` (
  `IDATLETAEQUIPE` int(11) NOT NULL,
  `IDATLETA` int(11) NOT NULL,
  `IDEQUIPE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atletas_posicoes`
--

CREATE TABLE `atletas_posicoes` (
  `IDATLETAPOSICAO` int(11) NOT NULL,
  `IDATLETA` int(11) NOT NULL,
  `IDPOSICAO` int(11) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime NOT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_site`
--

CREATE TABLE `config_site` (
  `IDCONFIG` int(11) NOT NULL,
  `TITULOSITE` varchar(200) NOT NULL,
  `SITE_META_KEYWORDS` longtext NOT NULL,
  `LOGO_SITE` longtext NOT NULL,
  `ADMIN_LOGO` longtext NOT NULL,
  `CONTATO_SITE` varchar(200) NOT NULL,
  `EMAIL_CONTATO` varchar(200) NOT NULL,
  `EMAIL_REMETENTE` varchar(200) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime NOT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config_site`
--

INSERT INTO `config_site` (`IDCONFIG`, `TITULOSITE`, `SITE_META_KEYWORDS`, `LOGO_SITE`, `ADMIN_LOGO`, `CONTATO_SITE`, `EMAIL_CONTATO`, `EMAIL_REMETENTE`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(1, 'Atlética FATEC JAHU', '', '', '', '', '', '', '', '2022-11-04 13:33:39', '', '2022-11-04 13:33:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
--

CREATE TABLE `equipes` (
  `IDEQUIPE` int(11) NOT NULL,
  `DESCRICAO` varchar(200) NOT NULL,
  `IDMODALIDADEGENERO` int(11) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime NOT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `equipes`
--

INSERT INTO `equipes` (`IDEQUIPE`, `DESCRICAO`, `IDMODALIDADEGENERO`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(1, 'SHARKS', 1, 'mateus', '2022-11-25 11:50:00', 'mateus', '2022-11-25 11:50:00'),
(2, 'SHARKS', 2, 'mateus', '2022-11-25 11:57:00', 'mateus', '2022-11-25 11:57:00'),
(3, 'ALIGATORS', 3, 'mateus', '2022-11-25 11:57:00', 'mateus', '2022-11-25 11:57:00'),
(4, 'ALIGATORS', 4, 'mateus', '2022-11-25 11:57:00', 'mateus', '2022-11-25 11:57:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `IDGENERO` int(11) NOT NULL,
  `DESCRICAO` varchar(1) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime DEFAULT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`IDGENERO`, `DESCRICAO`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(1, 'M', '', NULL, '', NULL),
(2, 'F', '', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades`
--

CREATE TABLE `modalidades` (
  `IDMODALIDADE` int(11) NOT NULL,
  `DESCRICAO` varchar(200) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime NOT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modalidades`
--

INSERT INTO `modalidades` (`IDMODALIDADE`, `DESCRICAO`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(1, 'Basquete', 'mateus', '2022-11-25 10:30:00', 'mateus', '2022-11-25 10:30:00'),
(2, 'Futsal', 'mateus', '2022-11-25 10:30:00', 'mateus', '2022-11-25 10:30:00'),
(3, 'Vôlei', 'mateus', '2022-11-25 10:30:00', 'mateus', '2022-11-25 10:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades_generos`
--

CREATE TABLE `modalidades_generos` (
  `IDMODALIDADEGENERO` int(11) NOT NULL,
  `IDMODALIDADE` int(11) NOT NULL,
  `IDGENERO` int(11) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime DEFAULT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modalidades_generos`
--

INSERT INTO `modalidades_generos` (`IDMODALIDADEGENERO`, `IDMODALIDADE`, `IDGENERO`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(1, 1, 2, '', NULL, '', NULL),
(2, 1, 1, '', NULL, '', NULL),
(3, 2, 2, '', NULL, '', NULL),
(4, 2, 1, '', NULL, '', NULL),
(5, 3, 2, '', NULL, '', NULL),
(6, 3, 1, '', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE `perfis` (
  `IDPERFIL` int(11) NOT NULL,
  `DESCRICAO` varchar(200) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime NOT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`IDPERFIL`, `DESCRICAO`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(1, 'admin', '', '2022-11-04 13:52:57', '', '2022-11-04 13:52:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posicoes`
--

CREATE TABLE `posicoes` (
  `IDPOSICAO` int(11) NOT NULL,
  `DESCRICAO` varchar(200) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime NOT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posicoes`
--

INSERT INTO `posicoes` (`IDPOSICAO`, `DESCRICAO`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(8, 'ALA', 'mateus', '2022-11-25 15:32:00', 'mateus', '2022-11-25 15:32:00'),
(9, 'PIVO', 'mateus', '2022-11-25 15:32:00', 'mateus', '2022-11-25 15:32:00'),
(10, 'FIXO', 'mateus', '2022-11-25 15:32:00', 'mateus', '2022-11-25 15:32:00'),
(11, 'LÍBERO', 'mateus', '2022-11-29 14:26:00', 'mateus', '2022-11-29 14:26:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posicoes_modalidades`
--

CREATE TABLE `posicoes_modalidades` (
  `IDPOSICAOMODALIDADE` int(11) NOT NULL,
  `IDPOSICAO` int(11) NOT NULL,
  `IDMODALIDADE` int(11) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime DEFAULT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posicoes_modalidades`
--

INSERT INTO `posicoes_modalidades` (`IDPOSICAOMODALIDADE`, `IDPOSICAO`, `IDMODALIDADE`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(1, 8, 1, '', NULL, '', NULL),
(2, 8, 2, '', NULL, '', NULL),
(3, 10, 2, '', NULL, '', NULL),
(4, 10, 3, '', NULL, '', NULL),
(5, 9, 2, '', NULL, '', NULL),
(6, 9, 1, '', NULL, '', NULL),
(7, 11, 3, 'mateus', '2022-11-29 15:08:00', 'mateus', '2022-11-29 15:08:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUSUARIO` int(11) NOT NULL,
  `NOME` varchar(200) NOT NULL,
  `LOGIN` varchar(200) NOT NULL,
  `SENHA` varchar(200) NOT NULL,
  `IDPERFIL` int(11) NOT NULL,
  `ATIVO` varchar(1) NOT NULL,
  `USUARIOCAD` varchar(200) NOT NULL,
  `DATACAD` datetime NOT NULL,
  `USUARIOALT` varchar(200) NOT NULL,
  `DATAALT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`IDUSUARIO`, `NOME`, `LOGIN`, `SENHA`, `IDPERFIL`, `ATIVO`, `USUARIOCAD`, `DATACAD`, `USUARIOALT`, `DATAALT`) VALUES
(2, 'mateus', 'mateus', '123', 1, 'S', '', '2022-11-04 13:53:09', '', '2022-11-04 13:53:09');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`IDALUNO`);

--
-- Índices para tabela `atletas`
--
ALTER TABLE `atletas`
  ADD PRIMARY KEY (`IDATLETA`);

--
-- Índices para tabela `atletas_equipes`
--
ALTER TABLE `atletas_equipes`
  ADD PRIMARY KEY (`IDATLETAEQUIPE`);

--
-- Índices para tabela `atletas_posicoes`
--
ALTER TABLE `atletas_posicoes`
  ADD PRIMARY KEY (`IDATLETAPOSICAO`),
  ADD KEY `IDATLETA` (`IDATLETA`),
  ADD KEY `IDPOSICAO` (`IDPOSICAO`);

--
-- Índices para tabela `config_site`
--
ALTER TABLE `config_site`
  ADD PRIMARY KEY (`IDCONFIG`);

--
-- Índices para tabela `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`IDEQUIPE`),
  ADD KEY `IDMODALIDADE` (`IDMODALIDADEGENERO`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`IDGENERO`);

--
-- Índices para tabela `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`IDMODALIDADE`);

--
-- Índices para tabela `modalidades_generos`
--
ALTER TABLE `modalidades_generos`
  ADD PRIMARY KEY (`IDMODALIDADEGENERO`),
  ADD KEY `IDMODALIDADE` (`IDMODALIDADE`),
  ADD KEY `IDGENERO` (`IDGENERO`);

--
-- Índices para tabela `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`IDPERFIL`);

--
-- Índices para tabela `posicoes`
--
ALTER TABLE `posicoes`
  ADD PRIMARY KEY (`IDPOSICAO`);

--
-- Índices para tabela `posicoes_modalidades`
--
ALTER TABLE `posicoes_modalidades`
  ADD PRIMARY KEY (`IDPOSICAOMODALIDADE`),
  ADD KEY `IDPOSICAO` (`IDPOSICAO`),
  ADD KEY `IDMODALIDADE` (`IDMODALIDADE`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUSUARIO`),
  ADD KEY `IDPERFIL` (`IDPERFIL`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `IDALUNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `atletas`
--
ALTER TABLE `atletas`
  MODIFY `IDATLETA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `atletas_equipes`
--
ALTER TABLE `atletas_equipes`
  MODIFY `IDATLETAEQUIPE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atletas_posicoes`
--
ALTER TABLE `atletas_posicoes`
  MODIFY `IDATLETAPOSICAO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `config_site`
--
ALTER TABLE `config_site`
  MODIFY `IDCONFIG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `equipes`
--
ALTER TABLE `equipes`
  MODIFY `IDEQUIPE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `IDGENERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `IDMODALIDADE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `modalidades_generos`
--
ALTER TABLE `modalidades_generos`
  MODIFY `IDMODALIDADEGENERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `IDPERFIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `posicoes`
--
ALTER TABLE `posicoes`
  MODIFY `IDPOSICAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `posicoes_modalidades`
--
ALTER TABLE `posicoes_modalidades`
  MODIFY `IDPOSICAOMODALIDADE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atletas_posicoes`
--
ALTER TABLE `atletas_posicoes`
  ADD CONSTRAINT `atletas_posicoes_ibfk_1` FOREIGN KEY (`IDATLETA`) REFERENCES `atletas` (`IDATLETA`),
  ADD CONSTRAINT `atletas_posicoes_ibfk_2` FOREIGN KEY (`IDPOSICAO`) REFERENCES `posicoes` (`IDPOSICAO`);

--
-- Limitadores para a tabela `equipes`
--
ALTER TABLE `equipes`
  ADD CONSTRAINT `equipes_ibfk_1` FOREIGN KEY (`IDMODALIDADEGENERO`) REFERENCES `modalidades_generos` (`IDMODALIDADEGENERO`);

--
-- Limitadores para a tabela `modalidades_generos`
--
ALTER TABLE `modalidades_generos`
  ADD CONSTRAINT `modalidades_generos_ibfk_1` FOREIGN KEY (`IDMODALIDADE`) REFERENCES `modalidades` (`IDMODALIDADE`),
  ADD CONSTRAINT `modalidades_generos_ibfk_2` FOREIGN KEY (`IDGENERO`) REFERENCES `genero` (`IDGENERO`);

--
-- Limitadores para a tabela `posicoes_modalidades`
--
ALTER TABLE `posicoes_modalidades`
  ADD CONSTRAINT `posicoes_modalidades_ibfk_1` FOREIGN KEY (`IDPOSICAO`) REFERENCES `posicoes` (`IDPOSICAO`),
  ADD CONSTRAINT `posicoes_modalidades_ibfk_2` FOREIGN KEY (`IDMODALIDADE`) REFERENCES `modalidades` (`IDMODALIDADE`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IDPERFIL`) REFERENCES `perfis` (`IDPERFIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
