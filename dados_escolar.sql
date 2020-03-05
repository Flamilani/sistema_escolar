-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for base_pdo
CREATE DATABASE IF NOT EXISTS `base_pdo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `base_pdo`;

-- Dumping structure for view base_pdo.alunos
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `alunos` (
	`id` INT(11) NOT NULL,
	`nome` VARCHAR(150) NULL COLLATE 'utf8mb4_general_ci',
	`imagem` TEXT NULL COLLATE 'utf8mb4_general_ci',
	`status` INT(1) NULL,
	`turma_id` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view base_pdo.aluno_turma
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `aluno_turma` (
	`id` INT(11) NOT NULL,
	`aluno_id` INT(11) NOT NULL,
	`turma_id` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view base_pdo.conteudos
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `conteudos` (
	`id` INT(11) NOT NULL,
	`tema` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`conteudo` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`turma_id` INT(11) NOT NULL,
	`data_cont` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status` TINYINT(1) NOT NULL,
	`prof_id` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view base_pdo.disciplinas
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `disciplinas` (
	`id` INT(11) UNSIGNED ZEROFILL NOT NULL,
	`titulo` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view base_pdo.plano_aula
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `plano_aula` (
	`id` INT(11) NOT NULL,
	`tema` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`objetivo` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`estrategias` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`recursos` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`avaliacao` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`referencias` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`turma_id` INT(11) NOT NULL,
	`prof_id` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view base_pdo.professores
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `professores` (
	`id` INT(11) NOT NULL,
	`nome` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`imagem` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`status` TINYINT(1) NOT NULL,
	`email` VARCHAR(150) NULL COLLATE 'utf8mb4_general_ci',
	`senha` VARCHAR(80) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view base_pdo.servicos
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `servicos` (
	`id` INT(11) NOT NULL,
	`titulo` VARCHAR(150) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view base_pdo.turmas
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `turmas` (
	`id` INT(11) NOT NULL,
	`titulo` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view base_pdo.usuarios
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `usuarios` (
	`id` INT(11) NOT NULL,
	`nome` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(150) NOT NULL COLLATE 'utf8mb4_general_ci',
	`senha` VARCHAR(80) NOT NULL COLLATE 'utf8mb4_general_ci',
	`status` TINYINT(1) NOT NULL,
	`nivel` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view base_pdo.alunos
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `alunos`;
;

-- Dumping structure for view base_pdo.aluno_turma
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `aluno_turma`;
;

-- Dumping structure for view base_pdo.conteudos
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `conteudos`;
;

-- Dumping structure for view base_pdo.disciplinas
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `disciplinas`;
;

-- Dumping structure for view base_pdo.plano_aula
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `plano_aula`;
;

-- Dumping structure for view base_pdo.professores
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `professores`;
;

-- Dumping structure for view base_pdo.servicos
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `servicos`;
;

-- Dumping structure for view base_pdo.turmas
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `turmas`;
;

-- Dumping structure for view base_pdo.usuarios
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `usuarios`;
;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
