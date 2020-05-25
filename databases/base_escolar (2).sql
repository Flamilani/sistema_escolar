-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 25-Maio-2020 às 19:02
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `base_escolar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sobrenome` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nasc` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL,
  `data_gravado` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `sobrenome`, `email`, `senha`, `login`, `cpf`, `celular`, `data_nasc`, `status`, `nivel`, `prof_id`, `data_gravado`) VALUES
(1, 'Flavio', 'Teste Milani', 'flaviomilani@gmail.com', '63ee451939ed580ef3c4b6f0109d1fd0', 'flamilani1234', '314324343234', '12331321323', '11/05/2020', 1, 3, 2, '2020-05-13 13:52:27'),
(2, 'Dani', 'Eli', 'daneli@gmail.com', '63ee451939ed580ef3c4b6f0109d1fd0', 'daneli', '1313232331', '313132321', '12/05/2020', 0, 3, 2, '2020-05-13 13:52:27'),
(3, 'Erica', 'Milani', 'erica@gmail.com', '63ee451939ed580ef3c4b6f0109d1fd0', 'erica', '1232132', '232132321', '12/05/2020', 1, 3, 2, '2020-05-13 13:52:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_turma`
--

CREATE TABLE `aluno_turma` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL,
  `data_gravado` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `aluno_turma`
--

INSERT INTO `aluno_turma` (`id`, `aluno_id`, `turma_id`, `prof_id`, `data_gravado`) VALUES
(7, 3, 2, 2, '2020-05-13 14:31:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_vinculado`
--

CREATE TABLE `aluno_vinculado` (
  `id` int(11) NOT NULL,
  `aluno_cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prof_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `aluno_vinculado`
--

INSERT INTO `aluno_vinculado` (`id`, `aluno_cpf`, `prof_id`) VALUES
(1, '314324343234', 2),
(2, '314324343234', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anos`
--

CREATE TABLE `anos` (
  `id` int(11) NOT NULL,
  `ano` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `id` int(11) NOT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `data_cont` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL,
  `data_gravado` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `conteudos`
--

INSERT INTO `conteudos` (`id`, `conteudo`, `data_cont`, `status`, `turma_id`, `prof_id`, `data_gravado`) VALUES
(1, 'teste', '07/03/2020', 1, 1, 1, '2020-05-13 13:50:54'),
(2, 'teste 23', '08/03/2020', 1, 1, 1, '2020-05-13 13:50:54'),
(3, 'teste', '13/05/2020', 1, 1, 2, '2020-05-13 13:50:54'),
(4, 'teste teste', '06/05/2020', 2, 1, 2, '2020-05-13 13:50:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `departamento` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sigla` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`, `sigla`) VALUES
(6, 'Direção Geral', 'DIRGE'),
(7, 'Departamento de Planejamento e Administração', 'DEPA'),
(9, 'Departamento de Ensino Superior', 'DESU'),
(14, 'Departamento de Educação Básica', 'DEBASI'),
(15, 'Departamento de Desenvolvimento Humano, Científico e Tecnológico', 'DDHCT'),
(16, 'Divisão de Qualificação e Encaminhamento', 'DIEPRO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `imagem` text COLLATE utf8mb4_unicode_ci,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano_aula`
--

CREATE TABLE `plano_aula` (
  `id` int(11) NOT NULL,
  `tema` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `objetivo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `atividade` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `estrategias` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `recursos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `avaliacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `referencias` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `turma_id` int(11) DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL,
  `data_gravado` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `plano_aula`
--

INSERT INTO `plano_aula` (`id`, `tema`, `conteudo`, `objetivo`, `atividade`, `estrategias`, `recursos`, `avaliacao`, `referencias`, `turma_id`, `prof_id`, `data_gravado`) VALUES
(1, 'teste', NULL, 'teste teste', NULL, 'teste teste', '', '', '', 0, NULL, '2020-05-13 13:51:41'),
(2, 'Aula 1', NULL, 'teste 2', NULL, 'teste 3', 'teste 4', 'tete 5', 'teste 6', 1, 2, '2020-05-13 13:51:41'),
(3, 'aula 2', NULL, 'testeteste', NULL, 'teste', 'teste', 'teste', 'teste', 1, 2, '2020-05-13 13:51:41'),
(4, 'aula 3', NULL, 'teste', NULL, 'teste', 'teste', 'teste', 'teste', 1, 2, '2020-05-13 13:51:41'),
(5, 'aula 3 432432', NULL, 'teste 42432', NULL, 'teste 423 43', 'teste 432432', 'teste 42', 'teste 432', 1, 2, '2020-05-13 13:51:41'),
(6, 'aula 3', NULL, 'teste', NULL, 'teste', 'teste', 'teste', 'teste', 1, 2, '2020-05-13 13:51:41'),
(7, 'teste5', NULL, 'teste teste', NULL, '', '', '', '', 1, 2, '2020-05-13 13:51:41'),
(8, 'teste123', NULL, 'teste teste', NULL, 'teste', 'teste', '', '', 1, 2, '2020-05-13 13:51:41'),
(16, 'novo tema', NULL, 'objetivo 1', NULL, 'teste 2', 'teste 3', 'teste 4', 'teste 5', 1, 2, '2020-05-13 18:28:43'),
(15, 'teste', NULL, 'teste', NULL, 'teste', 'teste', 'teste', 'teste', 3, 2, '2020-05-13 15:16:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `senha` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `serie` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prof_id` int(11) DEFAULT NULL,
  `disciplina_id` int(11) DEFAULT NULL,
  `servico_id` int(11) DEFAULT NULL,
  `ano_id` int(11) DEFAULT NULL,
  `serie_id` int(11) DEFAULT NULL,
  `data_gravado` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `titulo`, `prof_id`, `disciplina_id`, `servico_id`, `ano_id`, `serie_id`, `data_gravado`) VALUES
(1, '12354', 2, NULL, NULL, NULL, NULL, '2020-05-13 20:24:58'),
(2, '670', 2, NULL, NULL, NULL, NULL, '2020-05-13 20:24:58'),
(3, '345', 2, NULL, NULL, NULL, NULL, '2020-05-13 20:24:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sobrenome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `senha` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cpf` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `celular` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `data_nasc` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `nivel` int(11) NOT NULL,
  `depart_id` int(11) DEFAULT NULL,
  `data_gravado` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `senha`, `login`, `cpf`, `celular`, `data_nasc`, `status`, `nivel`, `depart_id`, `data_gravado`) VALUES
(1, 'Nelson', 'Teste', 'npcastro6@gmail.com', '63ee451939ed580ef3c4b6f0109d1fd0', '', '', '21212121', '05/05/2020', 1, 1, 1, '2020-05-13 13:58:09'),
(2, 'Gabriel', 'teste', 'gabriel@gmail.com', '63ee451939ed580ef3c4b6f0109d1fd0', '', '', '43432432432', '05/05/2020', 1, 2, 6, '2020-05-13 13:58:09'),
(4, 'Milani', '', 'milani@gmail.com', '63ee451939ed580ef3c4b6f0109d1fd0', '', '', NULL, NULL, 0, 2, 0, '2020-05-13 13:58:09'),
(5, 'Teste', 'Teste 2', 'teste@gmail.com', '63ee451939ed580ef3c4b6f0109d1fd0', '', '', '12331321323', '', 1, 2, 7, '2020-05-13 13:58:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_departamento`
--

CREATE TABLE `usuario_departamento` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `depart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TurmaAluno` (`aluno_id`);

--
-- Índices para tabela `aluno_vinculado`
--
ALTER TABLE `aluno_vinculado`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `anos`
--
ALTER TABLE `anos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `plano_aula`
--
ALTER TABLE `plano_aula`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Índices para tabela `usuario_departamento`
--
ALTER TABLE `usuario_departamento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `aluno_vinculado`
--
ALTER TABLE `aluno_vinculado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `anos`
--
ALTER TABLE `anos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `plano_aula`
--
ALTER TABLE `plano_aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario_departamento`
--
ALTER TABLE `usuario_departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `FK_TurmaAluno` FOREIGN KEY (`aluno_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
