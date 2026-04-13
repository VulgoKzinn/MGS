-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
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

-- Copiando estrutura para tabela db_mgs.tb_empresas
CREATE TABLE IF NOT EXISTS `tb_empresas` (
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

-- Copiando dados para a tabela db_mgs.tb_empresas: ~0 rows (aproximadamente)

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

-- Copiando estrutura para tabela db_mgs.tb_imgperfil
CREATE TABLE IF NOT EXISTS `tb_imgperfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `padrao` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_imgperfil: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_mgs.tb_login
CREATE TABLE IF NOT EXISTS `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `s_temp` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_login: ~1 rows (aproximadamente)
INSERT INTO `tb_login` (`id`, `email`, `senha`, `data_cadastro`, `ativo`, `s_temp`) VALUES
	(1, 'kaualanzieri@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QXUyL1BpcTVMcFUwLmdiVQ$Adg7SmEZ0eIJtJAiv26GAXe/PUEpdajFBF9uKImw7ZU', '2026-04-06 19:14:32', 1, 0);

-- Copiando estrutura para tabela db_mgs.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `biografia` text DEFAULT NULL,
  `foto_perfil` text DEFAULT NULL,
  `foto_banner` text DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `ativo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_users: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_mgs.tb_vagas
CREATE TABLE IF NOT EXISTS `tb_vagas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vaga` varchar(255) NOT NULL,
  `data_cadastro` datetime DEFAULT current_timestamp(),
  `ativo` tinyint(1) DEFAULT 1,
  `area_atuacao` varchar(255) DEFAULT NULL,
  `modalidade` varchar(100) DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `requisitos` text DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `beneficio` text DEFAULT NULL,
  `carga_horaria` varchar(100) DEFAULT NULL,
  `id_img_vaga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_mgs.tb_vagas: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
