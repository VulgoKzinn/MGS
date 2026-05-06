-- --------------------------------------------------------
-- Servidor:                     10.97.46.111
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_empresa: ~6 rows (aproximadamente)
INSERT INTO `tb_empresa` (`id`, `id_login`, `nome_fantasia`, `rzsocial`, `telefone`, `complemento`, `cnpj`, `cep`, `atuacao`, `numero`, `ativo`, `data_cadastro`) VALUES
	(8, 13, 'Sport', 'Sport', '2435892', 'Estádio', '0942429529', '49258395', '4', '25', 1, '2026-04-29 21:40:39'),
	(9, 14, 'Futebol', 'Futebol', '16370396', 'Estádio', '473747483', '3969396', '4', '99', 1, '2026-04-29 21:41:30'),
	(10, 19, 'Teste', 'teste', '3456787654', 'Casa', '234567', '456788765', '5', '45678765', 1, '2026-04-29 22:25:49'),
	(11, 20, 'Teste300', 'teste9999', '23456787654', 'Casa', '3456787654', '2345678765', '7', '70', 1, '2026-04-29 22:32:36'),
	(13, 27, '', 'teste', '(45) 67765-', 'Caasa', '34.567.876/5', '34567-887', '3', '2345', 1, '2026-05-04 21:42:59'),
	(14, 29, 'Testenovo1', 'Testenovo1', '(34) 5678', 'Casa', '23.456.7', '23456-7', '3', '2345', 1, '2026-05-04 21:51:40'),
	(15, 30, 'testeteste', 'testeteste', '(12) 34567-', 'Casa', '23.456.789/0', '23456-789', '4', '1234', 1, '2026-05-04 22:09:08');

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

-- Copiando estrutura para tabela db_mgs.tb_img_perfil
CREATE TABLE IF NOT EXISTS `tb_img_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `padrao` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_img_perfil: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_img_vaga: ~1 rows (aproximadamente)
INSERT INTO `tb_img_vaga` (`id`, `imagem`, `data_cadastro`, `ativo`, `padrao`, `id_vaga`) VALUES
	(11, '3c9b358ebe72c480cfe3818268bc2af7.png', '2026-05-05 22:23:17', 1, 0, 22),
	(12, '3ed87075a0d1435fddaf256947b02432.jpg', '2026-05-05 22:26:22', 1, 0, 23),
	(13, 'a5b803b6ea3ddad700866d0856c8cb08.png', '2026-05-05 22:31:15', 1, 0, 24);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_login: ~16 rows (aproximadamente)
INSERT INTO `tb_login` (`id`, `email`, `senha`, `data_cadastro`, `ativo`, `s_temp`, `id_nivel`) VALUES
	(1, 'kaualanzieri@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QXUyL1BpcTVMcFUwLmdiVQ$Adg7SmEZ0eIJtJAiv26GAXe/PUEpdajFBF9uKImw7ZU', '2026-04-06 19:14:32', 1, 0, 2),
	(2, 'admin@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TUpqL2pGSVBUTnhlc01pWg$q8XzEsYNLRJxObhE+yq56RwMxyP5ynjgaQFMm9i8J9Q', '2026-04-07 19:55:43', 1, 0, 1),
	(4, 'pmgs@hotmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UllKUWhTQWE0OUd1UElEcA$DxDUy1mvo25fp42UnlgajQX7VV0gU8J78yJt9b+u/uc', '2026-04-29 20:24:07', 1, 0, 2),
	(13, 'SantosFC@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$eld1VUhCNUpJNERtbTdvVw$2YmJCYyahnSvD6L9SNAW/0z23e7Y7XwM7h/F9942Hhk', '2026-04-29 21:40:08', 1, 0, 1),
	(14, 'CorinthiansSCCP@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$dUtOanJwV25qU0RJWVh6eQ$/l+IFC23FlGsovhK44A9lhSniRzONzKjr6vHcCDC/Iw', '2026-04-29 21:41:05', 1, 0, 1),
	(15, 'teste99@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$clFmcjE3UXBQWk52bFV0Zg$ovtkE+h56qPxK7K834m0GLZLA4/+Xn/Hg4zNQKc30nE', '2026-04-29 21:57:50', 1, 0, 2),
	(16, 'teste50@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$bG9EMnZBWVJpVkhHRjFOaA$5u23iWSzJ6rw0Cpy6P/XjwyG1D2ZMSYnJAU7TUnzFns', '2026-04-29 22:17:37', 1, 0, 2),
	(17, 'teste53@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$WlduaXlDZ2FjejlrNm5jVA$YaXseM/GAephbdIO3tVs5NRd3G27L8Nb79VFTdoV42g', '2026-04-29 22:22:52', 1, 0, 2),
	(18, 'teste80@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$azZVeVpzS25VMUp4LlpPRQ$C25dO5eF124C2q1PvWbiznD4281MyyscP98WP3o8cP8', '2026-04-29 22:24:38', 1, 0, 2),
	(19, 'testeEmp@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZG9rQVZnU2pHWldRV1FEWQ$rkpOjsKCE9g9CCUUXdJCvCUAxZSaotjlan5SE5LHLis', '2026-04-29 22:25:29', 1, 0, 1),
	(20, 'teste999@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$MDg3NU9TTi9HTjdaMG5zVg$GMd3gtwKGAo4N7VAIPuvf6dWyFu2ua6IGO2Kx45E7oM', '2026-04-29 22:32:20', 1, 0, 1),
	(24, 'guilherme@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$MkV4dHNBdzdtVXB6WlJjVg$iyPbWdW/ovYxgr2RyK2kv6erhr15RVLJGLWBKWj27pc', '2026-05-04 19:56:53', 1, 0, 2),
	(27, 'teste300@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ekhHZ21CbzVSV2ZyVm1XMw$E7PdTYIIkBSN5vmMmRiG2kwtYgDHRj5IOcCLuc6fT7Q', '2026-05-04 21:42:47', 1, 0, 1),
	(28, 'testenovo1@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$M0QwQ3BORVI4eHpYSlpWZQ$6uUQMY68lkZS7lvYq8Wu1VsuIIghxHWoXqaGaz2VY7k', '2026-05-04 21:46:21', 1, 0, 1),
	(29, 'testenovo2@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UlhIQ3ZSWHBnT1hCNWdndA$mEjN5p5F63E91EizGPgKyYwnIxARHPT5nS+8M6ldlWg', '2026-05-04 21:51:18', 1, 0, 1),
	(30, 'teste777@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$cWVRNGxlT2d4TzR4Z0Y3Mg$QsveHwGcbJw+rCQmCX/e5Wudtbx4Yxk96nuaBFYiMic', '2026-05-04 22:08:49', 1, 0, 1),
	(31, 'guilhermeUSU@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UXFwZDJac05rNHFpb1NPZw$AdjE20UwRonVuSJst+EYqkUHLF6ouvVmNsP43FC7zZc', '2026-05-05 19:22:17', 1, 0, 2),
	(32, 'PedroUSU@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$YVZldEJHSDFPZm42NjQ2WA$agQNW7q1RwOYWDJKbb1vD/h4fX7P5f4CHxUpMeMy9zc', '2026-05-05 21:47:13', 1, 0, 2);

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

-- Copiando estrutura para tabela db_mgs.tb_perfil_empresa
CREATE TABLE IF NOT EXISTS `tb_perfil_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `ativo` tinyint(1) DEFAULT 1,
  `id_img_perfil` int(11) DEFAULT NULL,
  `id_img_capa` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `id_img_sobre` int(11) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_perfil_empresa: ~0 rows (aproximadamente)

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_vagas: ~1 rows (aproximadamente)
INSERT INTO `tb_vagas` (`id`, `vaga`, `area_atuacao`, `modalidade`, `localizacao`, `descricao`, `requisitos`, `salario`, `beneficio`, `carga_horaria`, `data_cadastro`, `ativo`, `modelo_de_trabalho`) VALUES
	(22, 'TESTEEEEEEE', 'TESTEEEEEEE', 'Home Office', 'TESTEEEEEEE', 'TESTEEEEEEE', 'TESTEEEEEEE', 0.00, 'TESTEEEEEEE', 'TESTEEEEEEE', '2026-05-05 22:23:17', 1, 'Presencial'),
	(23, 'testeeeeeeeeeeeee', 'testeeeeeeeeeeeee', 'Home Office', 'testeeeeeeeeeeeee', 'testeeeeeeeeeeeee', 'testeeeeeeeeeeeee', 0.00, 'testeeeeeeeeeeeee', 'testeeeeeeeeeeeee', '2026-05-05 22:26:22', 1, 'Presencial'),
	(24, 'testeeeeeeee', 'teste', 'Presencial', 'testeeeeeeee', 'testeeeeeeee', 'testeeeeeeee', 0.00, 'testeeeeeeee', 'testeeeeeeee', '2026-05-05 22:31:15', 1, 'Home Office');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
