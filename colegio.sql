-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.36 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6392
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para colegio_db
CREATE DATABASE IF NOT EXISTS `colegio_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `colegio_db`;

-- Copiando estrutura para tabela colegio_db.alunos
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `data_nasci` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=557 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela colegio_db.alunos: 4 rows
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` (`id`, `nome`, `matricula`, `data_nasci`) VALUES
	(555, 'Aline', '26070132', '1999-05-01'),
	(552, 'Arthur', '23456', '2000-05-04'),
	(556, 'Wanda', '26070132', '1999-05-01'),
	(548, 'Yuri', '123456', '1997-05-04');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;

-- Copiando estrutura para tabela colegio_db.professor
CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `disciplina` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela colegio_db.professor: 1 rows
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` (`id`, `nome`, `disciplina`) VALUES
	(1, 'Osvaldo', 'Matematica');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
