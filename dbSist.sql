-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Fev 14, 2014 as 12:13 AM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `base`
--


CREATE TABLE IF NOT EXISTS `base` (
  `idbase` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` int(11) NOT NULL,
  `duracao` int(11) NOT NULL,
  `semana` int(5) DEFAULT NULL,
  `curso` int(11) NOT NULL,
  `nome_base` varchar(100) NOT NULL,
  PRIMARY KEY (`idbase`),
  KEY `fk_base_curso1_idx` (`curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `base`
--

INSERT INTO `base` (`idbase`, `modulo`, `duracao`, `semana`, `curso`, `nome_base`) VALUES
(1, 2, 15, 3, 1, 'Segurança da informação'),
(2, 1, 10, 5, 2, 'PIC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(254) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('d9a63dfd0c09a2469db0417cf904aa6f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36', 1392336744, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudos`
--

CREATE TABLE IF NOT EXISTS `conteudos` (
  `idconteudos` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(2000) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `turma` int(11) NOT NULL,
  PRIMARY KEY (`idconteudos`),
  KEY `fk_conteudos_planos_ensino1_idx` (`turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `conteudos`
--

INSERT INTO `conteudos` (`idconteudos`, `titulo`, `numero`, `turma`) VALUES
(5, 'asd', 1, 3),
(6, 'vamo testar né pco', 1, 2),
(22, 'asd', 2, 2),
(23, 'dsa', 3, 2),
(24, 'asd', 1, 1),
(25, 'asd', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(50) NOT NULL,
  `eixo` varchar(100) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcurso`),
  UNIQUE KEY `eletronica_UNIQUE` (`nome_curso`),
  KEY `fk_curso_usuario1_idx` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idcurso`, `nome_curso`, `eixo`, `idusuario`) VALUES
(1, 'Técnico em Informática', 'eixo', 3),
(2, 'Técnico em Eletronica', 'não sei', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_especificas`
--

CREATE TABLE IF NOT EXISTS `c_especificas` (
  `idc_especificas` int(11) NOT NULL AUTO_INCREMENT,
  `conteudos` int(11) NOT NULL,
  `conhecimento` text NOT NULL,
  `fazer` text NOT NULL,
  `agir` text NOT NULL,
  `ser` text NOT NULL,
  `estrategiasEnsino` text NOT NULL,
  `numAulas` int(11) NOT NULL,
  `semanaDatas` varchar(100) NOT NULL,
  PRIMARY KEY (`idc_especificas`),
  KEY `fk_CompetenciaEspecifica_Conteudos1_idx` (`conteudos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `c_especificas`
--

INSERT INTO `c_especificas` (`idc_especificas`, `conteudos`, `conhecimento`, `fazer`, `agir`, `ser`, `estrategiasEnsino`, `numAulas`, `semanaDatas`) VALUES
(1, 5, 'asd', 'asd', 'sad', 'sad1', 'sad', 0, 'sad'),
(2, 6, 'asduahsduhasdasd', 'uhsaudhuasdasd', 'uhsauhuasdasd', 'huahsduhasdasd', 'husahusadasd', 320, '30/09/1992\r\n'),
(18, 22, 'asd', 'sa', '', '', 'a', 0, 'sad'),
(19, 23, 'dsa', 'xca', 'sad', 'sad', 'sad', 0, 'asdasd'),
(20, 24, 'asd', 'sad', 'qsad', 'sad', 'qs', 0, 'sad'),
(21, 25, 'asd', 'as', 'sa', 'sa', 'sa', 0, 'sad');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos_aula`
--

CREATE TABLE IF NOT EXISTS `planos_aula` (
  `idplanos_aula` int(11) NOT NULL AUTO_INCREMENT,
  `competencias` text NOT NULL,
  `conteudo` text NOT NULL,
  `metodologia` text NOT NULL,
  `recursos` text NOT NULL,
  `ambientes` text NOT NULL,
  `avaliacao` text NOT NULL,
  `turma` int(11) NOT NULL,
  `tema_central` varchar(200) NOT NULL,
  `data_plano` datetime NOT NULL,
  PRIMARY KEY (`idplanos_aula`),
  KEY `fk_planos_aula_professores_cursos1_idx` (`turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `planos_aula`
--

INSERT INTO `planos_aula` (`idplanos_aula`, `competencias`, `conteudo`, `metodologia`, `recursos`, `ambientes`, `avaliacao`, `turma`, `tema_central`, `data_plano`) VALUES
(1, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asd', 'asdasd', 1, 'asdsdasd', '2013-12-25 11:48:17'),
(2, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 1, 'asdasd', '2013-12-26 07:45:10'),
(3, 'asdasdasdsad', 'adasdsad', 'asdasd', 'asdasdasd', 'asdasd', 'asdasdasdsada', 1, 'asdasdasdasdasd', '2013-12-26 07:46:58'),
(4, 'asddsa', 'saddasd', 'sadasd', 'sadasd', 'saddsda', 'sadasdasd', 4, 'thruehtuhsuhu', '2014-01-17 01:51:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos_ensino`
--

CREATE TABLE IF NOT EXISTS `planos_ensino` (
  `turma` int(11) NOT NULL AUTO_INCREMENT,
  `competencias` text NOT NULL,
  `recursos` text NOT NULL,
  `avaliacao` text NOT NULL,
  `instrumentos` text NOT NULL,
  `acompanhamento` text NOT NULL,
  `referencias` text NOT NULL,
  `data_plano` datetime NOT NULL,
  PRIMARY KEY (`turma`),
  KEY `fk_PlanoEnsino_turma1_idx` (`turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `planos_ensino`
--

INSERT INTO `planos_ensino` (`turma`, `competencias`, `recursos`, `avaliacao`, `instrumentos`, `acompanhamento`, `referencias`, `data_plano`) VALUES
(1, 'competencias', 'recursos', 'avaliacao', 'instrumentos', 'acompanhamento', 'referencias', '0000-00-00 00:00:00'),
(2, 'usadfuahsdfuhausdfhu', 'uhsadufhuasdhfuhasd', 'uhfsaduhuasd', 'hfusdhuhssfsf', 'ufhsdusdhuhasdasd', 'uhfsduahfuhsadfuhasdufuasd', '2014-01-09 05:59:33'),
(3, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '2014-01-04 02:57:43'),
(4, 'asdusahdusahu', 'huashuadhsudhusad', 'huhsauhsadudhusad', 'usahdaushduhsad', 'uhsaudhuashduhsad', 'uhsauhushduahduhsa', '2014-01-15 05:07:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `idturma` int(11) NOT NULL AUTO_INCREMENT,
  `curso` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `periodo` varchar(6) NOT NULL,
  `base` int(11) NOT NULL,
  `turno` varchar(45) NOT NULL,
  PRIMARY KEY (`idturma`),
  KEY `fk_professores_has_cursos_cursos1_idx` (`curso`),
  KEY `fk_professores_cursos_base1_idx` (`base`),
  KEY `fk_turma_usuario1_idx` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`idturma`, `curso`, `usuario`, `periodo`, `base`, `turno`) VALUES
(1, 1, 4, '2014.1', 1, 'manha'),
(2, 2, 4, '2014.1', 2, 'noite'),
(3, 2, 5, '2014.1', 2, 'noite'),
(4, 2, 5, '2014.1', 2, 'noite');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  `data_cadastro` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `telefone`, `login`, `senha`, `perfil`, `data_cadastro`) VALUES
(3, 'Jammerson Fernando', 'jammersonf@gmail.com', '8396506662', 'jamm', '123', 'coordenador', ''),
(4, 'Jammerson Fernando', 'jammerson.muniz@aec.com.br', '8386608624', 'jammerson', '123', 'professor', ''),
(5, 'asd', 'asd@asd.com', 'asd', 'asd', 'asd', 'professor', '2013-12-26 07:57:13');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `base`
--
ALTER TABLE `base`
  ADD CONSTRAINT `fk_base_curso1` FOREIGN KEY (`curso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD CONSTRAINT `fk_conteudos_planos_ensino1` FOREIGN KEY (`turma`) REFERENCES `planos_ensino` (`turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `c_especificas`
--
ALTER TABLE `c_especificas`
  ADD CONSTRAINT `c_especificas_ibfk_1` FOREIGN KEY (`conteudos`) REFERENCES `conteudos` (`idconteudos`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para a tabela `planos_aula`
--
ALTER TABLE `planos_aula`
  ADD CONSTRAINT `fk_planos_aula_professores_cursos1` FOREIGN KEY (`turma`) REFERENCES `turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `planos_ensino`
--
ALTER TABLE `planos_ensino`
  ADD CONSTRAINT `planos_ensino_ibfk_1` FOREIGN KEY (`turma`) REFERENCES `turma` (`idturma`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_professores_cursos_base1` FOREIGN KEY (`base`) REFERENCES `base` (`idbase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professores_has_cursos_cursos1` FOREIGN KEY (`curso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
