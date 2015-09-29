-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Set-2015 às 11:50
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `minitest`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `function` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `task_count` int(111) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `members`
--

INSERT INTO `members` (`id`, `name`, `function`, `username`, `password`, `task_count`) VALUES
(1, 'Celso', 'Programador', 'kaze94phoenix', '27b4cb63', 5),
(2, 'Aminissa', 'Administadora de Base de Dados', 'amysupeta', 'dmi2015', 2),
(3, 'Frenque', 'Web Designer', 'flowzzy', 'dmi2015', 2),
(4, 'Sheila', 'Programador', 'sheyla', 'dmi2015', 1),
(5, 'Osvaldo', 'Programador', 'osvaldoM', 'dmi2015', 0),
(6, 'adadw', 'awdawdaw', 'awdawdwad', 'asdawdaw', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(100) NOT NULL,
  `descricao` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`id`, `designacao`, `descricao`) VALUES
(1, 'MutiTalentos', 'Jovens Programadores do ensino universitario'),
(2, 'GDG', 'Desenvolvedores da google');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `created`) VALUES
(1, 'Admin', '2015-09-21 06:19:50'),
(2, 'Regular', '2015-09-21 06:20:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `deadline` date NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `deadline`, `member_id`, `project_id`) VALUES
(1, 'Gestao de eventos', 'uma simples descricao\r\n', '2015-09-07', 1, 1),
(2, 'Cursos de IT', 'outra simples descricao', '2019-02-07', 1, 2),
(3, 'sadsa', 'awdawd', '2015-09-07', 2, 0),
(4, 'asdad', 'asdawdwd', '2015-01-07', 3, 0),
(5, 'sadasdasda', 'asdadsa', '2015-09-08', 2, 0),
(6, 'wewadasdasd', 'asdsadas', '2015-09-08', 3, 0),
(7, 'ldasdaasda', 'asasdasd', '2015-09-10', 4, 2),
(8, 'adadw', 'asdawdawd', '2015-09-11', 1, 0),
(9, 'hh', 'h', '2015-09-22', 1, 1),
(10, 'Amy', 'eu sei', '2015-09-22', 1, 1),
(11, 'sdsdsdsd', 'dd', '2015-01-01', NULL, 0),
(12, 'sdsdsdsd', 'dd', '2015-01-01', NULL, 0),
(13, 'sdsdsdsd', 'dd', '2015-01-01', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `member_id`, `role_id`, `image`) VALUES
(32, 'kaze', '588ba4b683a4ea1edf1c6b755c040c60c3cb6e74', 1, 1, 0x3339353133315f31303135313933393330383235323133375f3835303938323235325f6e2e6a7067),
(33, 'asd', '0a5aed2314dfe5f7d66e42454471eefe8743db6f', 2, 0, ''),
(35, 'sas', '0a5aed2314dfe5f7d66e42454471eefe8743db6f', 2, 0, ''),
(37, 'sheyla', 'd40b3d0f5895ff43563b4b29912c6ab8efd8fed6', 4, 2, 0x31313730373631355f3933383036353938393630303432355f383430303131333537333639353439333837345f6e2e6a7067),
(38, 'abacome', '588ba4b683a4ea1edf1c6b755c040c60c3cb6e74', 6, 1, 0x31323033363734395f3732323031363633343539353437325f353336323432323830353238333230313632305f6e2e6a7067);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
