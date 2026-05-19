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

-- Copiando dados para a tabela db_mgs.tb_certificacoes: ~0 rows (aproximadamente)

-- Copiando dados para a tabela db_mgs.tb_certificado: ~0 rows (aproximadamente)

-- Copiando dados para a tabela db_mgs.tb_certificados: ~0 rows (aproximadamente)

-- Copiando dados para a tabela db_mgs.tb_empresa: ~3 rows (aproximadamente)
INSERT INTO `tb_empresa` (`id`, `id_login`, `nome_fantasia`, `rzsocial`, `telefone`, `complemento`, `cnpj`, `cep`, `atuacao`, `numero`, `ativo`, `data_cadastro`) VALUES
	(17, 36, 'LanziTech Informatica', 'LanziTech', '(78) 26756-', 'Sala', '12.165.482/948', '72867-888', '1', '30', 1, '2026-05-11 21:46:22'),
	(20, 58, 'teste', 'lanzitechoficina', '(46) 13463-', 'Casa', '43.643.634/636', '23634-623', '3', '6432', 1, '2026-05-16 18:11:01'),
	(21, 59, 'teste', 'teste', '(32) 59352-', 'Casa', '45.059.346/396', '63406-934', '12', '25', 1, '2026-05-16 18:17:27'),
	(22, 60, 'teste', 'teste', '(52) 35235-3252', 'Casa', '35.252.352/352', '45634-263', '2', '4634', 1, '2026-05-16 18:30:05'),
	(23, 62, 'Amazon Brasil', 'Amazon Serviços de Varejo do Brasil Ltda.', '(11) 39570-000', 'Bloco B', '15.436.940/000', '04538-133', '2', '3000', 1, '2026-05-18 21:30:28');

-- Copiando dados para a tabela db_mgs.tb_img_certificado: ~0 rows (aproximadamente)

-- Copiando dados para a tabela db_mgs.tb_img_vaga: ~12 rows (aproximadamente)
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
	(51, '5188f80f89db63cfdc3f3473194740ee.jpg', '2026-05-13 19:58:37', 1, 0, 59),
	(53, 'f2eb4e28d9ae32c2dc447417d86151b3.png', '2026-05-18 21:28:25', 1, 0, 61),
	(55, '690c51e649a17fa6e91371a808071221.png', '2026-05-18 22:22:06', 1, 0, 63);

-- Copiando dados para a tabela db_mgs.tb_login: ~16 rows (aproximadamente)
INSERT INTO `tb_login` (`id`, `email`, `senha`, `data_cadastro`, `ativo`, `s_temp`, `id_nivel`) VALUES
	(35, 'admin@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TTl5cjl1elc3dHQwaHQveg$tzl/Unc+3A5iR4oJFMsSu6J01eGhYRJjHh4Mxfp7+m8', '2026-05-11 21:45:24', 1, 0, 2),
	(36, 'empresa@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$blRaWGk1Zk5RdW9yYUFuMg$s0JRe1fHDfT6TQGglM/Ut3G7UlAR9H1nhnhzy0oWyW4', '2026-05-11 21:45:49', 1, 0, 1),
	(37, 'pmgs@hotmail.com', '$argon2id$v=19$m=65536,t=4,p=1$YXVoTU96bFV2VGtDOGRkSQ$HtkjchjuLHBEf0K8CbeN87mNf59RWG15GllxPD2ukw8', '2026-05-11 21:47:51', 1, 0, 2),
	(46, 'guilhermeUSU@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$VjNRTEpsRmVIb1E0UmhJMg$tYypgvoTGFFO4z7mtkyGYF71t1Vx5Mfj9AnlYpHGYNY', '2026-05-16 17:21:03', 1, 0, 2),
	(53, 'teste100@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$UWJ0WVhmY1VYNjdZTzhWQw$i6sMtole0O56uKZYMXPmH2yBTGUzgiy7hsWqQzEkL+0', '2026-05-16 17:51:20', 1, 0, 2),
	(54, 'teste600@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$aTEvcWpabnNpL01sb3Y2YQ$8mm9xM47p6lPM7hpq1auOoB7joeiBBsadv43o1CcLtk', '2026-05-16 18:01:48', 1, 0, 2),
	(55, 'guilhermeUSU4@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$WUZaajV6VWJSbG1wMGlMVA$DxVLLK3ZHLOsbimLtPJATfR250w5uOoIe3GASRZ+ZQ8', '2026-05-16 18:03:56', 1, 0, 2),
	(56, 'guilhermeUSU3@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$MUYvRzFjNTNYSkYxcW5xRA$DDy9sYeNHe/hR+jC5uustF4nNjoXFDT/QwprnywoBbI', '2026-05-16 18:05:32', 1, 0, 2),
	(57, 'sabrinateste@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$M0wzRUhqNWVGeW9aNFZvZg$0evK99cMxaUTC8rxAh85qfoNvKwVutcaY6URGjNQG1o', '2026-05-16 18:09:19', 1, 0, 2),
	(58, 'lanzites@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$aUdDd1JDZXpDUHFkcTlvag$w2h/+i+ltsVwkSFXg1GwSS53bcIAqANzktgG7XfRvl4', '2026-05-16 18:09:40', 1, 0, 1),
	(59, 'empresaofc@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$WXhKcmtFUER0M2VWaUNtVg$fYgXXGyhGK39RbfMYptNV7gdXMUikfyQfMFL3g4Qa68', '2026-05-16 18:16:48', 1, 0, 1),
	(60, 'empresSabrina@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$Vm9CR2xDZHYvbEtrdmNlQg$g7wX16e/f7ywCRLt456xVcIg4Huu25pGNU6EBHVYU4I', '2026-05-16 18:29:51', 1, 0, 1),
	(61, 'Pedro1@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$U0dTMGYxaDdkZVpNOGRBbA$yLdFnch3zAGuLndpqYJE1HRMc+qY75aB1XrGiPrsJdw', '2026-05-18 20:12:13', 1, 0, 2),
	(62, 'amazon@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$VmpaZlAwdER0WWQ5RDVCQg$GZOdU2OSA734VArYc3Kxali7X6rB6aaxqTnrt+bw05Y', '2026-05-18 21:29:14', 1, 0, 1),
	(63, 'donato@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$QWozdTNUb3pHbGtXVi56MQ$TJJrDQUqCoJnxazrmJJWdjGs87JGqCceqBNTPXPowuU', '2026-05-18 22:01:40', 1, 0, 2),
	(64, 'pedro2@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$aXNMckdSWXlsWXFZbjk4Rw$2sURRfvDxWL+GsDmQmi2riT02Uwzqv46lL5/YikWKR4', '2026-05-18 22:02:41', 1, 0, 2);

-- Copiando dados para a tabela db_mgs.tb_match: ~11 rows (aproximadamente)
INSERT INTO `tb_match` (`id`, `id_usuario`, `id_vaga`, `data_match`) VALUES
	(1, 35, 59, '2026-05-16 20:44:06'),
	(2, 35, 58, '2026-05-18 23:24:09'),
	(3, 35, 57, '2026-05-18 23:24:12'),
	(4, 35, 61, '2026-05-19 00:30:22'),
	(6, 35, 56, '2026-05-19 00:30:27'),
	(7, 35, 55, '2026-05-19 00:30:28'),
	(8, 35, 54, '2026-05-19 00:30:29'),
	(9, 35, 53, '2026-05-19 00:30:30'),
	(10, 35, 52, '2026-05-19 00:30:31'),
	(11, 35, 48, '2026-05-19 00:30:32'),
	(12, 35, 47, '2026-05-19 00:30:33');

-- Copiando dados para a tabela db_mgs.tb_nivel: ~2 rows (aproximadamente)
INSERT INTO `tb_nivel` (`id`, `nivel`, `data_cadastro`, `ativo`) VALUES
	(1, 'empresa', '2026-04-06 19:28:19', 1),
	(2, 'usuario', '2026-04-06 19:28:32', 1);

-- Copiando dados para a tabela db_mgs.tb_perfil_candidato: ~8 rows (aproximadamente)
INSERT INTO `tb_perfil_candidato` (`id`, `id_login`, `nome`, `telefone`, `endereco`, `data_cadastro`, `ativo`) VALUES
	(5, 46, 'Guilherme', '(19) 98989-5325', 'Brasil, SP, São João da Boa Vista, José Quero Robles Filho, 96, Jardim das Flores', '2026-05-16 17:21:03', 1),
	(9, 53, 'teste', '(45) 32535-2352', '354254253453145431', '2026-05-16 17:51:20', 1),
	(10, 54, 'teste', '(45) 23454-5543', '53252352352523', '2026-05-16 18:01:48', 1),
	(11, 55, 'teste', '(45) 43543-5435', '5453434534', '2026-05-16 18:03:56', 1),
	(12, 56, 'teste4359', '(49) 54354-3534', 'fhaugwuh', '2026-05-16 18:05:32', 1),
	(13, 57, 'Sabrina Sodre', '(32) 53252-3523', 'casa', '2026-05-16 18:09:19', 1),
	(14, 61, 'Pedro', '(19) 99999-9999', 'Teste Teste', '2026-05-18 20:12:13', 1),
	(15, 64, 'Pedro Azevedo', '(19) 99999-9999', 'Águas da Prata,SP,Teste,200', '2026-05-18 22:02:41', 1);

-- Copiando dados para a tabela db_mgs.tb_perfil_empresa: ~2 rows (aproximadamente)
INSERT INTO `tb_perfil_empresa` (`id`, `id_empresa`, `slogan`, `quem_somos`, `data_cadastro`, `ativo`) VALUES
	(4, 22, 'Desde 2026.', 'Uma empresa especializada em tecnologia e inovação, oferecendo soluções em desenvolvimento de sistemas, suporte técnico e infraestrutura de TI para empresas de diversos segmentos. Nosso objetivo é ajudar negócios a crescerem através da tecnologia, garanti', '2026-05-18 21:59:37', 1),
	(5, 23, 'De A a Z.', 'A Amazon é uma das maiores empresas de tecnologia e comércio eletrônico do mundo, atuando nos setores de vendas online, serviços em nuvem, streaming e logística. Fundada por Jeff Bezos, a empresa tem como objetivo oferecer praticidade, inovação e excelênc', '2026-05-18 22:12:42', 1);

-- Copiando dados para a tabela db_mgs.tb_perfil_empresa_img: ~2 rows (aproximadamente)
INSERT INTO `tb_perfil_empresa_img` (`id`, `perfil`, `capa`, `descricao`, `data_cadastro`, `ativo`, `id_empresa`) VALUES
	(3, '135bdb515c17aedf52ea75e3a18cb41b.png', '8ccd0812e08110e2f7ca769d9e335103.png', 'be4e78df8cb58aa7546291d86b57066f.png', '2026-05-18 21:59:37', 1, NULL),
	(4, '8d18560517a46c7a85e8bd264f199730.png', '9985d3e597633646602e1a4628caae9d.png', '7382ce16d32d42cc718581e0e9a984de.png', '2026-05-18 22:12:42', 1, NULL);

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

-- Copiando dados para a tabela db_mgs.tb_suporte: ~3 rows (aproximadamente)
INSERT INTO `tb_suporte` (`id`, `nome`, `email`, `descricao`, `ativo`, `data_cadastro`) VALUES
	(2, 'Guilherme', 'guilherme@gmail.com', 'Guilherme com problemas no banco', 0, '2026-04-29 20:37:59'),
	(3, 'Pedro.Azevedo', 'pmgs@hotmail.com', 'teste', 1, '2026-05-05 22:02:12'),
	(4, 'Pedro .C', 'guilhermeUSU@gmail.com', 'teste', 1, '2026-05-05 22:02:43');

-- Copiando dados para a tabela db_mgs.tb_users: ~2 rows (aproximadamente)
INSERT INTO `tb_users` (`id`, `nome`, `cargo`, `email`, `telefone`, `biografia`, `endereco`, `foto_perfil`, `foto_banner`, `data_cadastro`, `ativo`) VALUES
	(4, 'Pedro csacsa', 'Técnico em T.I', 'pedro.azevedo@hotmail.com', 'advav', 'av', 'avda', 'assets/img/perfil-candidato/uploads/69fa90a196231_3984ef9d7ae353bda9fe06297daf458d.png', 'assets/img/perfil-candidato/uploads/69fa90a196c7e_01ddfbcf3f16d1cd4d78f1d977fbfd15.png', '2026-05-06 00:51:02', 1),
	(32, 'joao', 'lixeiro', 'joao@gmail.com', '19999999999', 'oi', '13890000', 'assets/img/perfil-candidato/uploads/69fa96df67d97.png', 'assets/img/perfil-candidato/uploads/69fa96df685aa.png', '2026-05-06 01:18:23', 1);

-- Copiando dados para a tabela db_mgs.tb_vagas: ~13 rows (aproximadamente)
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
	(59, 17, 'Teste', 'Teste', 'Home Office', 'Sj', 'sdfghjkl.', 'wertyuiklç', 1200.00, '34567', '1200 semanal', '2026-05-13 19:58:37', 1, 'Presencial'),
	(61, 22, 'Analista de Suporte Técnico Júnior', 'Tecnologia da Informação', 'Presencial', 'São João da Boa Vista - SP', 'Estamos em busca de um Analista de Suporte Técnico Júnior para atuar no atendimento aos usuários internos, realizando suporte técnico em computadores, impressoras, redes e sistemas corporativos. O profissional será responsável por auxiliar na manutenção preventiva e corretiva de equipamentos, instalação de softwares e acompanhamento de chamados técnicos.', 'Ensino técnico ou superior cursando em TI\r\nConhecimento básico em redes e manutenção de computadores\r\nConhecimento em Windows e pacote Office\r\nBoa comunicação e trabalho em equipe\r\nExperiência com atendimento ao usuário será um diferencial', 0.00, 'Vale Alimentação, Vale Transporte, Convênio Médico e Seguro de Vida', '44 horas semanais', '2026-05-18 21:28:25', 1, 'Home Office'),
	(62, 23, 'Analista de Logística', 'Logística e Operações', 'Presencial', 'Cajamar - SP', 'A Amazon Brasil está em busca de um Analista de Logística para atuar no acompanhamento das operações do centro de distribuição, garantindo eficiência nos processos de recebimento, armazenamento e expedição de produtos. O profissional será responsável por monitorar indicadores, apoiar a equipe operacional e contribuir para a melhoria contínua dos processos logísticos.', 'Ensino superior completo ou cursando em Logística, Administração ou áreas correlatas\r\nConhecimento em Excel intermediário\r\nBoa capacidade analítica e organização\r\nExperiência com operações logísticas será um diferencial\r\nFacilidade para trabalhar em equipe e em ambiente dinâmico', 0.00, 'Vale Refeição, Vale Transporte, Assistência Médica, Assistência Odontológica, Seguro de Vida e Participação nos Lucros', '44 horas semanais', '2026-05-18 21:32:23', 1, 'Presencial'),
	(63, 23, 'Teste', 'Teste', 'Presencial', 'Teste', 'Teste', 'Teste', 0.00, 'Teste', 'Teste', '2026-05-18 22:22:06', 1, 'Home Office');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
