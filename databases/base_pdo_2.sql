/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : base_pdo

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2020-04-25 10:08:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for aluno_turma
-- ----------------------------
DROP TABLE IF EXISTS `aluno_turma`;
CREATE TABLE `aluno_turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of aluno_turma
-- ----------------------------

-- ----------------------------
-- Table structure for conteudos
-- ----------------------------
DROP TABLE IF EXISTS `conteudos`;
CREATE TABLE `conteudos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(150) NOT NULL,
  `conteudo` text NOT NULL,
  `turma_id` int(11) NOT NULL,
  `data_cont` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `prof_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of conteudos
-- ----------------------------
INSERT INTO `conteudos` VALUES ('1', '', 'teste', '1', '07/03/2020', '1', '1');
INSERT INTO `conteudos` VALUES ('2', '', 'teste 23', '1', '08/03/2020', '1', '1');

-- ----------------------------
-- Table structure for departamentos
-- ----------------------------
DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(150) DEFAULT NULL,
  `sigla` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of departamentos
-- ----------------------------
INSERT INTO `departamentos` VALUES ('1', 'Desabi', 'DEBASI');
INSERT INTO `departamentos` VALUES ('2', 'DDPCH', 'DDPCH');

-- ----------------------------
-- Table structure for disciplinas
-- ----------------------------
DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of disciplinas
-- ----------------------------

-- ----------------------------
-- Table structure for plano_aula
-- ----------------------------
DROP TABLE IF EXISTS `plano_aula`;
CREATE TABLE `plano_aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(150) NOT NULL,
  `objetivo` text NOT NULL,
  `estrategias` text NOT NULL,
  `recursos` text NOT NULL,
  `avaliacao` text NOT NULL,
  `referencias` text NOT NULL,
  `turma_id` int(11) NOT NULL,
  `prof_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of plano_aula
-- ----------------------------
INSERT INTO `plano_aula` VALUES ('1', 'teste', 'teste teste', 'teste teste', '', '', '', '0', null);

-- ----------------------------
-- Table structure for professores
-- ----------------------------
DROP TABLE IF EXISTS `professores`;
CREATE TABLE `professores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `imagem` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of professores
-- ----------------------------

-- ----------------------------
-- Table structure for servicos
-- ----------------------------
DROP TABLE IF EXISTS `servicos`;
CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of servicos
-- ----------------------------

-- ----------------------------
-- Table structure for turmas
-- ----------------------------
DROP TABLE IF EXISTS `turmas`;
CREATE TABLE `turmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of turmas
-- ----------------------------
INSERT INTO `turmas` VALUES ('1', '123');
INSERT INTO `turmas` VALUES ('2', '670');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `nivel` int(11) NOT NULL,
  `depart_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Nelson', 'npcastro6@gmail.com', '4297f44b13955235245b2497399d7a93', '1', '1', '1');
INSERT INTO `usuarios` VALUES ('2', 'Gabriel', 'gabriel@gmail.com', '4297f44b13955235245b2497399d7a93', '1', '2', '2');
INSERT INTO `usuarios` VALUES ('3', 'Flavio', 'aluno@gmail.com', '180a26a9aef9ee13cc3d2361feb43c5a', '1', '3', null);
