-- --------------------------------------------------------
-- Servidor:                     10.97.46.104
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_mgs
CREATE DATABASE IF NOT EXISTS `db_mgs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_mgs`;

-- Copiando estrutura para tabela db_mgs.tb_certificados
CREATE TABLE IF NOT EXISTS `tb_certificados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `instituicao` varchar(150) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_certificados: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_mgs.tb_empresa
CREATE TABLE IF NOT EXISTS `tb_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) NOT NULL,
  `nome_fantasia` varchar(150) NOT NULL,
  `rzsocial` varchar(150) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `cnpj` char(14) NOT NULL DEFAULT '',
  `cep` varchar(50) NOT NULL DEFAULT '',
  `atuacao` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_tb_empresa_tb_login` (`id_login`),
  CONSTRAINT `FK_tb_empresa_tb_login` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_empresa: ~1 rows (aproximadamente)
INSERT INTO `tb_empresa` (`id`, `id_login`, `nome_fantasia`, `rzsocial`, `telefone`, `complemento`, `cnpj`, `cep`, `atuacao`, `numero`, `ativo`, `data_cadastro`) VALUES
	(17, 36, 'LanziTech Informatica', 'LanziTech', '(78) 26756-', 'Sala', '12.165.482/948', '72867-888', '1', '30', 1, '2026-05-11 21:46:22');

-- Copiando estrutura para tabela db_mgs.tb_formacoes
CREATE TABLE IF NOT EXISTS `tb_formacoes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `curso` varchar(150) DEFAULT NULL,
  `instituicao` varchar(150) DEFAULT NULL,
  `ano_inicio` int(11) DEFAULT NULL,
  `ano_fim` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_formacoes: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_mgs.tb_img_vaga
CREATE TABLE IF NOT EXISTS `tb_img_vaga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `padrao` tinyint(1) NOT NULL DEFAULT 0,
  `id_vaga` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_tb_img_vaga_tb_vagas` (`id_vaga`) USING BTREE,
  CONSTRAINT `FK_tb_img_vaga_tb_vagas` FOREIGN KEY (`id_vaga`) REFERENCES `tb_vagas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_img_vaga: ~9 rows (aproximadamente)
INSERT INTO `tb_img_vaga` (`id`, `imagem`, `data_cadastro`, `ativo`, `padrao`, `id_vaga`) VALUES
	(42, '563c66e772e826b4fc1ceb1bddef5616.png', '2026-05-11 21:46:52', 1, 0, 47),
	(43, 'c80e1cb9f90318d8c2f648c749cdab88.jpg', '2026-05-11 22:00:09', 1, 0, 48),
	(44, '81101f8313c01c9d344a92a7915d0c0d.png', '2026-05-11 22:05:47', 1, 0, 52),
	(45, 'b1d36699dc46b3f1652f72eaf92dd38d.png', '2026-05-11 22:10:23', 1, 0, 53),
	(46, 'ba23a898e7037e41ae41c031c0b05dc9.png', '2026-05-12 19:35:40', 1, 0, 54),
	(47, 'b198e1c10670270aadebbf4f12843937.png', '2026-05-12 19:37:42', 1, 0, 55),
	(48, '8a1ab8c6f377ec7b2ae08b9a7de5aa65.png', '2026-05-12 19:49:20', 1, 0, 56),
	(49, '2e7219383ddd7493c2857ff975a163b2.png', '2026-05-12 19:50:38', 1, 0, 57),
	(50, '0e2bd481c9ff770c373ec62b06d63740.png', '2026-05-13 19:48:55', 1, 0, 58),
	(51, '5188f80f89db63cfdc3f3473194740ee.jpg', '2026-05-13 19:58:37', 1, 0, 59);

-- Copiando estrutura para tabela db_mgs.tb_login
CREATE TABLE IF NOT EXISTS `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `s_temp` tinyint(4) NOT NULL DEFAULT 0,
  `id_nivel` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_tb_login_tb_nivel` (`id_nivel`),
  CONSTRAINT `FK_tb_login_tb_nivel` FOREIGN KEY (`id_nivel`) REFERENCES `tb_nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_login: ~3 rows (aproximadamente)
INSERT INTO `tb_login` (`id`, `email`, `senha`, `data_cadastro`, `ativo`, `s_temp`, `id_nivel`) VALUES
	(35, 'admin@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TTl5cjl1elc3dHQwaHQveg$tzl/Unc+3A5iR4oJFMsSu6J01eGhYRJjHh4Mxfp7+m8', '2026-05-11 21:45:24', 1, 0, 2),
	(36, 'empresa@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$blRaWGk1Zk5RdW9yYUFuMg$s0JRe1fHDfT6TQGglM/Ut3G7UlAR9H1nhnhzy0oWyW4', '2026-05-11 21:45:49', 1, 0, 1),
	(37, 'pmgs@hotmail.com', '$argon2id$v=19$m=65536,t=4,p=1$YXVoTU96bFV2VGtDOGRkSQ$HtkjchjuLHBEf0K8CbeN87mNf59RWG15GllxPD2ukw8', '2026-05-11 21:47:51', 1, 0, 2);

-- Copiando estrutura para tabela db_mgs.tb_nivel
CREATE TABLE IF NOT EXISTS `tb_nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(50) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_nivel: ~2 rows (aproximadamente)
INSERT INTO `tb_nivel` (`id`, `nivel`, `data_cadastro`, `ativo`) VALUES
	(1, 'empresa', '2026-04-06 19:28:19', 1),
	(2, 'usuario', '2026-04-06 19:28:32', 1);

-- Copiando estrutura para tabela db_mgs.tb_perfil_candidato
CREATE TABLE IF NOT EXISTS `tb_perfil_candidato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `sobre` text DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `experiencia` text DEFAULT NULL,
  `projeto` text DEFAULT NULL,
  `certificado` text DEFAULT NULL,
  `id_foto_perfil` varchar(255) DEFAULT NULL,
  `id_foto_banner` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `ativo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_perfil_candidato: ~2 rows (aproximadamente)
INSERT INTO `tb_perfil_candidato` (`id`, `nome`, `email`, `telefone`, `endereco`, `sobre`, `cargo`, `experiencia`, `projeto`, `certificado`, `id_foto_perfil`, `id_foto_banner`, `data_cadastro`, `ativo`) VALUES
	(1, 'pedro', 'pedro1234@hotmail.com', '19989263916', 'Águas da Prata', 'lixo', 'lixeiro', 'dkvnzvz', 'vdn\\dzlknkz', 'afgsgson', NULL, NULL, '2026-05-06 20:54:08', 1),
	(2, 'lara', 'lara@gmail.com', '189899999', 'Águas da Prata', 'jdiadhPAD', 'atendente', 'IHDAPHaaDJ', '', 'gestao de pessoas', NULL, 'b789c96a331273d6310aba57345f714a.png', '2026-05-06 21:13:52', 1),
	(3, 'julia', 'julia@gmail.com', '19989263916', 'Águas da Prata', 'oii', 'atendente', 'fjsihgishgs', 'sgjsihspgks', 'cert_e78a43db88455e8021df2af7c37a15e5.png', '910d56c0f588032b03008391258bc865.png', '35abedf28f74f4ee49a8f4bccfb0285e.png', '2026-05-11 20:27:59', 1);

-- Copiando estrutura para tabela db_mgs.tb_perfil_empresa
CREATE TABLE IF NOT EXISTS `tb_perfil_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `slogan` varchar(255) NOT NULL,
  `quem_somos` varchar(255) NOT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `ativo` tinyint(1) DEFAULT 1,
  `id_perfil_img` varchar(255) DEFAULT NULL,
  `id_capa_img` varchar(255) DEFAULT NULL,
  `id_descricao_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_empresa` (`id_empresa`),
  CONSTRAINT `FK_tb_perfil_empresa_tb_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_perfil_empresa: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_mgs.tb_perfil_empresa_img
CREATE TABLE IF NOT EXISTS `tb_perfil_empresa_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(255) DEFAULT NULL,
  `capa` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `ativo` tinyint(1) DEFAULT 1,
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tb_perfil_empresa_img_tb_empresa` (`id_empresa`),
  CONSTRAINT `FK_tb_perfil_empresa_img_tb_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_perfil_empresa_img: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_mgs.tb_ramoatuacao
CREATE TABLE IF NOT EXISTS `tb_ramoatuacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ramo` varchar(75) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_ramoatuacao: ~12 rows (aproximadamente)
INSERT INTO `tb_ramoatuacao` (`id`, `ramo`, `ativo`, `data_cadastro`) VALUES
	(1, 'Tecnologia e Desenvolvimento', 1, '2026-04-29 20:43:42'),
	(2, 'Tecnologia', 1, '2026-04-29 20:43:57'),
	(3, 'Desenvolvimento', 1, '2026-04-29 20:44:08'),
	(4, 'Autonomo', 1, '2026-04-29 20:44:19'),
	(5, 'Engenharia', 1, '2026-04-29 20:44:28'),
	(6, 'Agricula', 1, '2026-04-29 20:44:36'),
	(7, 'Saúde', 1, '2026-04-29 20:44:46'),
	(8, 'Hospitalar', 1, '2026-04-29 20:44:56'),
	(9, 'Administração', 1, '2026-04-29 20:45:04'),
	(10, 'Vendas', 1, '2026-04-29 20:45:17'),
	(11, 'Industria', 1, '2026-04-29 20:45:23'),
	(12, 'Marketing', 1, '2026-04-29 20:45:30');

-- Copiando estrutura para tabela db_mgs.tb_suporte
CREATE TABLE IF NOT EXISTS `tb_suporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_suporte: ~3 rows (aproximadamente)
INSERT INTO `tb_suporte` (`id`, `nome`, `email`, `descricao`, `ativo`, `data_cadastro`) VALUES
	(2, 'Guilherme', 'guilherme@gmail.com', 'Guilherme com problemas no banco', 0, '2026-04-29 20:37:59'),
	(3, 'Pedro.Azevedo', 'pmgs@hotmail.com', 'teste', 1, '2026-05-05 22:02:12'),
	(4, 'Pedro .C', 'guilhermeUSU@gmail.com', 'teste', 1, '2026-05-05 22:02:43');

-- Copiando estrutura para tabela db_mgs.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `biografia` text DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `foto_perfil` text DEFAULT NULL,
  `foto_banner` text DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_users: ~2 rows (aproximadamente)
INSERT INTO `tb_users` (`id`, `nome`, `cargo`, `email`, `telefone`, `biografia`, `endereco`, `foto_perfil`, `foto_banner`, `data_cadastro`, `ativo`) VALUES
	(4, 'Pedro csacsa', 'Técnico em T.I', 'pedro.azevedo@hotmail.com', 'advav', 'av', 'avda', 'assets/img/perfil-candidato/uploads/69fa90a196231_3984ef9d7ae353bda9fe06297daf458d.png', 'assets/img/perfil-candidato/uploads/69fa90a196c7e_01ddfbcf3f16d1cd4d78f1d977fbfd15.png', '2026-05-06 00:51:02', 1),
	(32, 'joao', 'lixeiro', 'joao@gmail.com', '19999999999', 'oi', '13890000', 'assets/img/perfil-candidato/uploads/69fa96df67d97.png', 'assets/img/perfil-candidato/uploads/69fa96df685aa.png', '2026-05-06 01:18:23', 1);

-- Copiando estrutura para tabela db_mgs.tb_vagas
CREATE TABLE IF NOT EXISTS `tb_vagas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `vaga` varchar(255) NOT NULL,
  `area_atuacao` varchar(255) DEFAULT NULL,
  `modalidade` varchar(100) DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `requisitos` text DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `beneficio` text DEFAULT NULL,
  `carga_horaria` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `ativo` tinyint(1) DEFAULT 1,
  `modelo_de_trabalho` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tb_vagas_tb_empresa` (`id_empresa`),
  CONSTRAINT `FK_tb_vagas_tb_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_vagas: ~9 rows (aproximadamente)
INSERT INTO `tb_vagas` (`id`, `id_empresa`, `vaga`, `area_atuacao`, `modalidade`, `localizacao`, `descricao`, `requisitos`, `salario`, `beneficio`, `carga_horaria`, `data_cadastro`, `ativo`, `modelo_de_trabalho`) VALUES
	(47, 17, 'Tecnico TI', 'TI', 'Presencial', 'São paulo', 'tete', 'tete', 1200.00, 'Vale alimentação', '80', '2026-05-11 21:46:52', 1, 'Presencial'),
	(48, 17, 'Teste', 'Teste', 'Presencial', 'Sj', '/', '/', 1200.00, 'tudo', '1200 semanal', '2026-05-11 22:00:09', 1, 'Presencial'),
	(52, 17, 'sa', 'sa', 'Híbrido', 'sa', 'sa', 'sa', 0.00, 'sa', 'sa', '2026-05-11 22:05:47', 1, 'Híbrido'),
	(53, 17, 'sabrina', 'sabrina', 'Home Office', 'sabrina', 'sabrina', 'sabrina', 0.00, 'sabrina', 'sabrina', '2026-05-11 22:10:23', 1, 'Presencial'),
	(54, 17, 'teste05', 'teste05', 'Home Office', 'teste05', 'teste05', 'teste05', 0.00, 'teste05', 'teste05', '2026-05-12 19:35:40', 1, 'Home Office'),
	(55, 17, 'Teste', 'Teste', 'Presencial', 'Sj', 'tudo', 'tudo', 1200.00, 'tudo', '1200 semanal', '2026-05-12 19:37:42', 1, 'Presencial'),
	(56, 17, 'sabrina', 'sabrina', 'Home Office', 'sabrina', 'sabrina', 'sabrina', 0.00, 'sabrina', 'sabrina', '2026-05-12 19:49:20', 1, 'Presencial'),
	(57, 17, 'donato', 'donato', 'Híbrido', 'donato', 'donato', 'donato', 0.00, 'donato', 'donato', '2026-05-12 19:50:38', 1, 'Presencial'),
	(58, 17, 'testesa', 'testesa', 'Home Office', 'testesa', 'testesa', 'testesa', 0.00, 'testesa', 'testesa', '2026-05-13 19:48:55', 1, 'Presencial'),
	(59, 17, 'Teste', 'Teste', 'Home Office', 'Sj', 'sdfghjkl.', 'wertyuiklç', 1200.00, '34567', '1200 semanal', '2026-05-13 19:58:37', 1, 'Presencial');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
