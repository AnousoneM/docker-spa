-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 28 juin 2025 à 19:02
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `afpa-spa`
--
CREATE DATABASE IF NOT EXISTS `afpa-spa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `afpa-spa`;

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `ani_id` int(11) NOT NULL AUTO_INCREMENT,
  `ani_name` varchar(50) NOT NULL,
  `ani_sex` varchar(1) NOT NULL,
  `ani_reserved` tinyint(1) NOT NULL DEFAULT '0',
  `ani_birthdate` date DEFAULT NULL,
  `ani_adoptiondate` date DEFAULT NULL,
  `ani_arrivaldate` date NOT NULL,
  `ani_microchipped` tinyint(1) NOT NULL,
  `ani_tattooed` tinyint(1) NOT NULL,
  `ani_vaccinated` tinyint(1) NOT NULL,
  `ani_description` text NOT NULL,
  `ani_picture` text NOT NULL,
  `col_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL,
  `bre_id` int(11) NOT NULL,
  `ani_weight` int(5) NOT NULL,
  PRIMARY KEY (`ani_id`),
  KEY `animals_colors_FK` (`col_id`),
  KEY `animals_species0_FK` (`spe_id`),
  KEY `animals_breed1_FK` (`bre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`ani_id`, `ani_name`, `ani_sex`, `ani_reserved`, `ani_birthdate`, `ani_adoptiondate`, `ani_arrivaldate`, `ani_microchipped`, `ani_tattooed`, `ani_vaccinated`, `ani_description`, `ani_picture`, `col_id`, `spe_id`, `bre_id`, `ani_weight`) VALUES
(7, 'Betty', 'f', 0, '2023-07-12', NULL, '2023-07-11', 1, 1, 1, 'azeaze', 'cat.webp', 1, 1, 1, 500),
(9, 'Ecco', 'm', 0, '2023-07-06', NULL, '2023-07-11', 1, 0, 1, 'retertert', 'dog.webp', 1, 1, 1, 6000),
(10, 'Herbert', 'f', 0, '2023-07-06', NULL, '2023-07-11', 0, 0, 0, 'Chien tranquille qui aime jouer et les enfants', 'dog.webp', 1, 1, 1, 7896),
(23, 'Daze', 'm', 0, '2023-07-13', NULL, '2023-07-11', 1, 0, 1, 'Gentil Chien affectueux et propre', 'dog.webp', 2, 1, 3, 7898),
(24, 'Dougy', 'f', 0, '2023-07-03', NULL, '2023-07-17', 1, 1, 0, 'Super chien', 'dog.webp', 2, 1, 5, 1245),
(25, 'Toutou', 'm', 0, '2023-07-19', NULL, '2023-07-17', 1, 1, 1, 'aze', 'cat.webp', 7, 2, 8, 8787);

-- --------------------------------------------------------

--
-- Structure de la table `breeds`
--

DROP TABLE IF EXISTS `breeds`;
CREATE TABLE IF NOT EXISTS `breeds` (
  `bre_id` int(11) NOT NULL AUTO_INCREMENT,
  `bre_name` varchar(30) NOT NULL,
  `spe_id` int(11) NOT NULL,
  PRIMARY KEY (`bre_id`),
  KEY `breed_species_FK` (`spe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `breeds`
--

INSERT INTO `breeds` (`bre_id`, `bre_name`, `spe_id`) VALUES
(1, 'akita inu', 1),
(2, 'husky', 1),
(3, 'beagle', 1),
(4, 'berger allemand', 1),
(5, 'boxer', 1),
(6, 'labrador', 1),
(7, 'angora', 2),
(8, 'bengal', 2),
(9, 'chartreux', 2),
(10, 'européen', 2),
(11, 'persan', 2),
(12, 'siamois', 2);

-- --------------------------------------------------------

--
-- Structure de la table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_name` varchar(30) NOT NULL,
  PRIMARY KEY (`col_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `colors`
--

INSERT INTO `colors` (`col_id`, `col_name`) VALUES
(1, 'noir'),
(2, 'blanc'),
(3, 'noir/blanc'),
(4, 'beige'),
(5, 'roux'),
(6, 'gris'),
(7, 'tigré'),
(8, 'sable');

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

DROP TABLE IF EXISTS `species`;
CREATE TABLE IF NOT EXISTS `species` (
  `spe_id` int(11) NOT NULL AUTO_INCREMENT,
  `spe_name` varchar(30) NOT NULL,
  PRIMARY KEY (`spe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `species`
--

INSERT INTO `species` (`spe_id`, `spe_name`) VALUES
(1, 'chien'),
(2, 'chat');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_login` varchar(45) NOT NULL,
  `use_password` varchar(255) NOT NULL,
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`use_id`, `use_login`, `use_password`) VALUES
(1, 'admin', '$2y$10$qYGC/jv3gWPSVU2EYiLlx..Y2jTfwR0hQjoPfWIx.V3m7X41Zh3MO');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_breed1_FK` FOREIGN KEY (`bre_id`) REFERENCES `breeds` (`bre_id`),
  ADD CONSTRAINT `animals_colors_FK` FOREIGN KEY (`col_id`) REFERENCES `colors` (`col_id`),
  ADD CONSTRAINT `animals_species0_FK` FOREIGN KEY (`spe_id`) REFERENCES `species` (`spe_id`);

--
-- Contraintes pour la table `breeds`
--
ALTER TABLE `breeds`
  ADD CONSTRAINT `breed_species_FK` FOREIGN KEY (`spe_id`) REFERENCES `species` (`spe_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
