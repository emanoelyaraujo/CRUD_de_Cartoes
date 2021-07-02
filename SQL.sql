-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.31 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para fasm20213p
CREATE DATABASE IF NOT EXISTS `fasm20213p` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fasm20213p`;

-- Copiando estrutura para tabela fasm20213p.cards
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `number` varchar(16) NOT NULL,
  `date` date NOT NULL,
  `cvv` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`),
  KEY `FK__users` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela fasm20213p.cards: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` (`id`, `idUser`, `number`, `date`, `cvv`) VALUES
	(2, 15, '1212567878668055', '2021-07-24', '123'),
	(3, 16, '5465475543543675', '2021-07-02', '455');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;

-- Copiando estrutura para tabela fasm20213p.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela fasm20213p.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
	(16, 'Esther', 'Peixoto', 'estherpeixoto@gmail.com', '$2y$10$c5IljG9HAmFR1CQIexjUz.sKXqN9omUCAd1wrbtW7NfjXe8R1ZRU.'),
	(20, 'Emanoely', 'Araújo', 'emanoelyaraujo004@gmail.com', '$2y$10$vVdiEXsW7ymqcJqbpxWIBu7tX3ivmmI8lpZfTF9Ry8wJZt9DJFkii');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
