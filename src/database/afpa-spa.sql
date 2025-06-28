-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 17 juil. 2023 à 23:31
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

CREATE TABLE `animals` (
  `ani_id` int(11) NOT NULL,
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
  `ani_weight` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`ani_id`, `ani_name`, `ani_sex`, `ani_reserved`, `ani_birthdate`, `ani_adoptiondate`, `ani_arrivaldate`, `ani_microchipped`, `ani_tattooed`, `ani_vaccinated`, `ani_description`, `ani_picture`, `col_id`, `spe_id`, `bre_id`, `ani_weight`) VALUES
(6, 'AZEAZE', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 1, 1, 'azeaze', 'dog.webp', 1, 1, 1, 1234),
(7, 'Betty', 'f', 0, '2023-07-12', NULL, '2023-07-11', 1, 1, 1, 'azeaze', 'cat.webp', 1, 1, 1, 500),
(8, 'Totoro', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 1, 1, 'Super Gentil', 'dog.webp', 1, 1, 1, 1664),
(9, 'Ecco', 'm', 0, '2023-07-06', NULL, '2023-07-11', 1, 0, 1, 'retertert', 'dog.webp', 1, 1, 1, 6000),
(10, 'ertert', 'f', 0, '2023-07-06', NULL, '2023-07-11', 0, 0, 0, 'ertert', 'dog.webp', 1, 1, 1, 7896),
(11, 'Voila', 'm', 0, '2023-07-05', NULL, '2023-07-11', 0, 0, 0, 'qsdqsdqsdqsd', 'dog.webp', 1, 1, 1, 8000),
(12, 'wcxcxwwcxcxw', 'f', 0, '2023-07-12', NULL, '2023-07-11', 0, 1, 0, 'sdddddfg', 'dog.webp', 1, 1, 1, 7878),
(13, 'QSDQSD', 'f', 0, '2023-07-20', NULL, '2023-07-11', 0, 0, 1, 'qsdqsd', 'cat.webp', 3, 2, 8, 8787),
(14, 'azeaze', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 3, 1, 1, 7880),
(15, 'azeaze', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 3, 1, 1, 7880),
(16, 'azeaze', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 3, 1, 1, 7880),
(17, 'azeaze', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 3, 1, 1, 7880),
(18, 'azeaze', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 3, 1, 1, 7880),
(19, 'azeaze', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 3, 1, 1, 7880),
(20, 'azeaze', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 3, 1, 1, 7880),
(21, 'azeaze', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 3, 1, 1, 7880),
(22, 'azeaze', 'm', 0, '2023-07-12', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 3, 1, 1, 7880),
(23, 'aze', 'f', 0, '2023-07-13', NULL, '2023-07-11', 1, 0, 1, 'aze', 'dog.webp', 2, 1, 3, 7898),
(24, 'Dougy', 'f', 0, '2023-07-03', NULL, '2023-07-17', 1, 1, 0, 'Super chien', 'dog.webp', 2, 1, 5, 1245),
(25, 'Toutou', 'm', 0, '2023-07-19', NULL, '2023-07-17', 1, 1, 1, 'aze', 'cat.webp', 7, 2, 8, 8787);

-- --------------------------------------------------------

--
-- Structure de la table `breeds`
--

CREATE TABLE `breeds` (
  `bre_id` int(11) NOT NULL,
  `bre_name` varchar(30) NOT NULL,
  `spe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `colors` (
  `col_id` int(11) NOT NULL,
  `col_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `species` (
  `spe_id` int(11) NOT NULL,
  `spe_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `users` (
  `use_id` int(11) NOT NULL,
  `use_login` varchar(45) NOT NULL,
  `use_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`use_id`, `use_login`, `use_password`) VALUES
(1, 'admin', '$2y$10$qYGC/jv3gWPSVU2EYiLlx..Y2jTfwR0hQjoPfWIx.V3m7X41Zh3MO');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`ani_id`),
  ADD KEY `animals_colors_FK` (`col_id`),
  ADD KEY `animals_species0_FK` (`spe_id`),
  ADD KEY `animals_breed1_FK` (`bre_id`);

--
-- Index pour la table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`bre_id`),
  ADD KEY `breed_species_FK` (`spe_id`);

--
-- Index pour la table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`col_id`);

--
-- Index pour la table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`spe_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`use_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `ani_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `bre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `colors`
--
ALTER TABLE `colors`
  MODIFY `col_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `species`
--
ALTER TABLE `species`
  MODIFY `spe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
