-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 15 déc. 2019 à 21:57
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forumdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf16_bin NOT NULL,
  `description` text COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'games', ''),
(2, 'animes', ''),
(3, 'youtube', ''),
(4, 'php', 'codage');

-- --------------------------------------------------------

--
-- Structure de la table `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `body` text COLLATE utf16_bin NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Déchargement des données de la table `replies`
--

INSERT INTO `replies` (`id`, `topic_id`, `user_id`, `body`, `create_date`) VALUES
(10, 10, 26, 'fonction ajax', '2019-12-15 21:31:09');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf16_bin NOT NULL,
  `body` text COLLATE utf16_bin NOT NULL,
  `last_activity` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `user_id`, `title`, `body`, `last_activity`, `create_date`) VALUES
(8, 1, 26, 'Fortnite', 'Need a gampelay', '2019-12-15 22:30:26', '2019-12-15 21:30:26'),
(9, 1, 26, 'dofus', 'I am ready', '2019-12-15 22:30:36', '2019-12-15 21:30:36'),
(10, 4, 26, 'help !!!', 'fonction ajax', '2019-12-15 22:30:54', '2019-12-15 21:30:54'),
(11, 2, 26, 'naruto', 'spoil !!!!!!!!!!!!!!!!!!', '2019-12-15 22:40:06', '2019-12-15 21:40:06'),
(12, 3, 26, 'tuto', 'php tuto', '2019-12-15 22:40:18', '2019-12-15 21:40:18'),
(13, 3, 26, 'tuto', 'php tuto', '2019-12-15 22:43:10', '2019-12-15 21:43:10'),
(14, 3, 26, 'tuto', 'php tuto', '2019-12-15 22:44:50', '2019-12-15 21:44:50'),
(15, 3, 26, 'tuto', 'php tuto', '2019-12-15 22:45:14', '2019-12-15 21:45:14'),
(16, 3, 26, 'tuto', 'php tuto', '2019-12-15 22:45:20', '2019-12-15 21:45:20');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf16_bin NOT NULL,
  `email` varchar(100) COLLATE utf16_bin NOT NULL,
  `avatar` varchar(100) COLLATE utf16_bin NOT NULL,
  `username` varchar(20) COLLATE utf16_bin NOT NULL,
  `password` varchar(64) COLLATE utf16_bin NOT NULL,
  `about` text COLLATE utf16_bin NOT NULL,
  `join_date` text COLLATE utf16_bin,
  `last_activity` text COLLATE utf16_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `username`, `password`, `about`, `join_date`, `last_activity`) VALUES
(26, 'LAMTAOUI mohammed', 'redalamtaoui@gmail.com', 'image/icone/homme.jpg', 'redawa', '$2y$10$tHsYYr4OqTrU2AeG7JqI6uOwfsgNwn0vxo8dMijXfN7crdtbP1zoW', 'Etudiant en iut', '15-12-2019', 'December 15, 2019, 9:22 pm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
