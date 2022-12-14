-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum2
DROP DATABASE IF EXISTS `forum2`;
CREATE DATABASE IF NOT EXISTS `forum2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum2`;

-- Listage des données de la table forum2.categorie : ~6 rows (environ)
DELETE FROM `categorie`;
INSERT INTO `categorie` (`id_categorie`, `title`) VALUES
	(1, 'Back-end'),
	(2, 'Front-end'),
	(3, 'Design'),
	(4, 'Graphiste'),
	(5, 'SEO'),
	(6, 'Autre');

-- Listage des données de la table forum2.post : ~7 rows (environ)
DELETE FROM `post`;
INSERT INTO `post` (`id_post`, `text`, `creationdate`, `user_id`, `topic_id`) VALUES
	(2, 'Ceci est un test', '2022-11-23 09:08:51', 3, 2),
	(3, 'test', '2022-11-23 09:09:04', 4, 2),
	(5, 'hjhj', '2022-11-23 15:11:29', 3, 2),
	(6, 'bonjour', '2022-11-23 15:11:34', 3, 2),
	(7, 'bonjour', '2022-11-23 15:13:10', 3, 2),
	(8, 'Hello', '2022-11-23 15:13:38', 3, 15);

-- Listage des données de la table forum2.topic : ~8 rows (environ)
DELETE FROM `topic`;
INSERT INTO `topic` (`id_topic`, `title`, `creationdate`, `closed`, `user_id`, `categorie_id`) VALUES
	(2, 'test', '2022-11-15 11:52:17', 0, 3, 3),
	(3, 'test2', '2022-11-15 16:38:42', 0, 3, 3),
	(4, 'test3', '2022-11-21 10:22:50', 0, 3, 1),
	(5, 'test4', '2022-11-21 10:23:06', 0, 4, 2),
	(7, 'test6', '2022-11-21 10:23:42', 0, 3, 5),
	(8, 'test7', '2022-11-21 10:23:53', 0, 3, 6),
	(14, 'lua', '2022-11-23 14:20:55', 0, 3, 1),
	(15, 'lua', '2022-11-23 14:22:00', 0, 3, 1);

-- Listage des données de la table forum2.user : ~3 rows (environ)
DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `pseudonyme`, `email`, `password`, `role`, `registerdate`, `status`) VALUES
	(3, 'arthur', 'arthurhiller@gmail.com', '$2y$10$AgxE.f8HtjzdspyYApRdnu2AdRC4l9/HiH6yJTkSB08ZWmftN7Ihm', 'ROLE_USER', '2022-11-21 15:11:21', 0),
	(4, 'test', 'test@gmail.com', '$2y$10$0pIVgWNs84oXHANrHnpWgunkh7.PKMJviKj.Fy4vIo0rMe.E/DDwm', 'ROLE_ADMIN', '2022-11-21 15:11:22', 0),
	(6, 'arthurdeux', 'hillerartahur.ha@gmail.com', '$2y$10$OnfNLm4tPdAKv4oLLQQft.oBEVKgpoINzi9zkXZMQObxU5/LUDD..', NULL, '2022-11-24 17:10:22', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
